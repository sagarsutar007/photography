<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Blog_model','blog');
	}

	public function index()
	{
		
	}

	public function viewAll()
	{
	    if($this->session->has_userdata('logged_in')){

		    $this->load->library('pagination');

			// init params
			$dbblog = [];
			$params = array();
			$limit_per_page = 10;
			$pagenum = $this->uri->segment(3);
			$start_index = (empty($pagenum)) ? 1 : $pagenum;

			if($start_index == 1){
				$getFrom = 0 * $limit_per_page;
			} else {
				$getFrom = ($start_index - 1) * $limit_per_page;
			}

			$total_records = $this->blog->countBlogs();

	      	if ($total_records > 0) 
	      	{
				$dbblog = $this->blog->getCurrentPageRecords($limit_per_page, $getFrom);

				$config['base_url'] = base_url() . 'blog/viewAll/';
				$config['total_rows'] = $total_records;
				$config['per_page'] = $limit_per_page;
				$config["uri_segment"] = 3;

				// custom paging configuration
				$config['num_links'] = 2;
				$config['use_page_numbers'] = TRUE;
				$config['reuse_query_string'] = TRUE;

				$config['full_tag_open'] = '<ul class="pagination pagination-sm m-0 float-right">';
				$config['full_tag_close'] = '</ul>';

				$config['first_link'] = 'First Page';
				$config['first_tag_open'] = '<li class="page-item">';
				$config['first_tag_close'] = '</li>';

				$config['last_link'] = 'Last Page';
				$config['last_tag_open'] = '<li class="page-item">';
				$config['last_tag_close'] = '</li>';

				$config['next_link'] = 'Next Page';
				$config['next_tag_open'] = '<li class="page-item">';
				$config['next_tag_close'] = '</li>';

				$config['prev_link'] = 'Prev Page';
				$config['prev_tag_open'] = '<li class="page-item">';
				$config['prev_tag_close'] = '</li>';

				$config['cur_tag_open'] = '<li class="page-item"><a href="#" class="page-link">';
				$config['cur_tag_close'] = '</a></li>';

				$config['num_tag_open'] = '<li class="page-item">';
				$config['num_tag_close'] = '</li>';

				$config['attributes'] = array('class' => 'page-link');

				$this->pagination->initialize($config);

				// build paging links
				@$data["links"] = $this->pagination->create_links();
			}

			$data['page'] = "blog";
			$data['blog'] = $dbblog;
			$this->load->view('admin/blog',$data);
	    } else {
	      redirect('admin/login');
	    }
	}

	public function new()
	{
	    if($this->session->has_userdata('logged_in')){
	      $data['page'] = "blog";
	      $data['categories'] = $this->blog->getCategories();
	      $this->load->view('admin/add-blog',$data);
	    }else{
	      redirect('admin/logout');
	    }
	}

	public function edit($id=null)
	{
	    if($this->session->has_userdata('logged_in')){
	      if ($id==null) {
	        $this->session->set_flashdata('error_msg','Blog doesn\'t exists!');
	        redirect('blog/viewAll');
	      } else {
	        $blog = $this->blog->getBlog($id);
	        if(empty($blog)){
	          $this->session->set_flashdata('error_msg','Blog doesn\'t exists!');
	          redirect('blog/viewAll');
	        } else {
	          $data['record'] = $blog;
	          $data['page'] = "blog";
		      $data['categories'] = $this->blog->getCategories();
	          $this->load->view('admin/add-blog',$data);
	        }
	      } 
	    }else{
	      redirect('admin/logout');
	    }
	}

	public function save()
	{
		if($this->session->has_userdata('logged_in')){
	      if($this->input->server('REQUEST_METHOD')=='POST'){
	          $data = $this->input->post();
	          $data['text'] = addslashes(htmlspecialchars($data['text']));
	          $update = 0;
	          if(isset($data['id'])){
	            $update = 1;
	            $last_id = $data['id'];
	            $this->blog->updateBlog($data);
	          } else { 
	            $last_id = $this->blog->insertBlog($data);
	          }

	          if($_FILES['file']['name'] != ""){
	            $file_name = basename($_FILES['file']['name'], "." . pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION)) . "-" . $last_id . "." . strtolower(pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION));
	            $config['upload_path'] = 'assets/site/images/';
	            $config['allowed_types'] = 'gif|jpg|png|jpeg';
	            $config['file_name'] = $file_name;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);
	            if ($this->upload->do_upload('file')){
	              $this->blog->updateFile($last_id,$file_name);
	            }
	          } else if(!empty($data['bgimg'])){
	            $this->blog->updateFile($last_id,$data['bgimg']);
	          }

	          if($update==1){
	            $this->session->set_flashdata('success_msg','Blog updated successfully!');
	          } else {
	            $this->session->set_flashdata('success_msg','Blog created successfully!');
	          }
	          redirect('blog/viewAll');
	      }else{
	        redirect('blog/viewAll');
	      }
	    }else{
	      redirect('admin/logout');
	    }
	}

	public function view($id=null)
	{
	    if($this->session->has_userdata('logged_in')){
	      	if ($id==null) {
	        	$this->session->set_flashdata('error_msg','Blog doesn\'t exists!');
	        	redirect('Blog/viewAll');
	      	} else {
	        	$blog = $this->blog->getBlog($id);
	        	if(empty($blog)){
	          		$this->session->set_flashdata('error_msg','Blog doesn\'t exists!');
	          		redirect('blog/viewAll');
	        	} else {
	          		$data['blog'] = $blog;
	          		$data['page'] = "blog";
	          		$this->load->view('admin/view-blog',$data);
	        	}
	      	} 
	    }else{
	      redirect('admin/logout');
	    }
	}

	public function deleteBlogs()
	{
	    if($this->session->has_userdata('logged_in')){
	      if($this->input->server('REQUEST_METHOD')=='POST'){
	        $data = $this->input->post();
	        $ids = json_decode($data['ids'],true);
	        $this->albums->deleteBlogs($ids);
	      }
	    }else{
	      redirect('admin/logout');
	    }
	}

	public function delete($id=NULL)
	{
	    if($this->session->has_userdata('logged_in')){
	      if(empty($id)){
	        $this->session->set_flashdata('error_msg','Blog doesn\'t exists!');
	        redirect('blog/viewAll');
	      } else {
	        if($this->blog->deleteBlog($id)){
	          $this->session->set_flashdata('success_msg','Blog deleted successfully!');
	        }else{
	          $this->session->set_flashdata('error_msg','Something went wrong!');
	        }
	        redirect('blog/viewAll');
	      }
	    }else{
	      redirect('admin/logout');
	    }
	}

}

/* End of file  */
/* Location: ./application/controllers/ */