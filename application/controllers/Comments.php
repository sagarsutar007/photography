<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Comments_model', 'comments');
	}

	public function index($value='')
	{
		if($this->session->has_userdata('logged_in')){
			redirect('comments/viewAll');
		}else{
			redirect('admin/login');
		}
	}

	public function viewAll()
	{
		if($this->session->has_userdata('logged_in')){
			$this->load->library('pagination');
			// init params
			$dbcomments = [];
			$params = array();
			$limit_per_page = 20;
			$pagenum = $this->uri->segment(3);
			$start_index = (empty($pagenum)) ? 1 : $pagenum;

			if($start_index == 1){
				$getFrom = 0 * $limit_per_page;
			} else {
				$getFrom = ($start_index - 1) * $limit_per_page;
			}

			$total_records = $this->comments->countTotalComments();

			if ($total_records > 0) 
			{
				$dbcomments = $this->comments->getCurrentPageComments($limit_per_page, $getFrom);
				  
				$config['base_url'] = base_url() . 'comments/viewAll/';
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
			} else {
				$dbcomments = [];
			}

			$data['page'] = "comments";
			$data['comments'] = $dbcomments;			
			$this->load->view('admin/comments',$data);
		}else{
			redirect('admin/login');
		}
	}

	public function changeStatus($commentid='',$status=0)
	{
		if($this->session->has_userdata('logged_in')){
			$status = ($status==0)?'discarded':'approved';
			$q = $this->comments->changeStatus($commentid,$status);
			if($q){
				$this->session->set_flashdata('success_msg','Comment approved successfully!');
			}else{
				$this->session->set_flashdata('error_msg','Comment discarded!');	
			}
			redirect('comments/viewAll');
		}else{
			redirect('admin/login');
		}
	}

	public function delete($value='')
	{
		if($this->session->has_userdata('logged_in')){
			$q = $this->comments->deleteComment($value);
			if($q){
				$this->session->set_flashdata('success_msg','Comment approved successfully!');
			}else{
				$this->session->set_flashdata('error_msg','Comment discarded!');	
			}
			redirect('comments/viewAll');
		}else{
			redirect('admin/login');
		}
	}

}

/* End of file Comments.php */
/* Location: ./application/controllers/Comments.php */