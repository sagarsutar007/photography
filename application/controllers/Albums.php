<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Albums extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Albums_model', 'albums');
    $this->load->model('Blog_model', 'blog');
  }

  public function index()
  {
    redirect('albums');
  }

  public function viewAll()
  {
    if($this->session->has_userdata('logged_in')){
      $this->load->library('pagination');

      // init params
      $dbalbums = [];
      $params = array();
      $limit_per_page = 10;
      $pagenum = $this->uri->segment(3);
      $start_index = (empty($pagenum)) ? 1 : $pagenum;

      if($start_index == 1){
        $getFrom = 0 * $limit_per_page;
      } else {
        $getFrom = ($start_index - 1) * $limit_per_page;
      }

      $total_records = $this->albums->countTotalAlbums();

      if ($total_records > 0) 
      {
        $dbalbums = $this->albums->getCurrentPageRecords($limit_per_page, $getFrom);
          
        $config['base_url'] = base_url() . 'albums/viewAll/';
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

      $albums = [];
      if(!empty($dbalbums)){
        foreach($dbalbums as $key => $obj){
          $obj['totalPictures'] = $this->albums->countTotalAlbumPictures($obj['id']);
          $albums[] = $obj;
        }
      }
      $data['page'] = "albums";
      $data['albums'] = $albums;
      $this->load->view('admin/albums',$data);
    } else {
      redirect('admin/login');
    }
  }

  public function new()
  {
    if($this->session->has_userdata('logged_in')){
      $data['page'] = "albums";
      $data['categories'] = $this->blog->getCategories();
      $this->load->view('admin/add-album',$data);
    }else{
      redirect('admin/logout');
    }
  }

  public function edit($id=null)
  {
    if($this->session->has_userdata('logged_in')){
      if ($id==null) {
        $this->session->set_flashdata('error_msg','Album doesn\'t exists!');
        redirect('albums/viewAll');
      } else {
        $album = $this->albums->getAlbum($id);
        if(empty($album)){
          $this->session->set_flashdata('error_msg','Album doesn\'t exists!');
          redirect('albums/viewAll');
        } else {
          $data['record'] = $album;
          $data['page'] = "albums";
          $data['categories'] = $this->blog->getCategories();
          $this->load->view('admin/add-album',$data);
        }
      } 
    }else{
      redirect('admin/logout');
    }
  }

  public function view($id=null)
  {
    if($this->session->has_userdata('logged_in')){
      if ($id==null) {
        $this->session->set_flashdata('error_msg','Album doesn\'t exists!');
        redirect('albums/viewAll');
      } else {
        $album = $this->albums->getAlbum($id);
        if(empty($album)){
          $this->session->set_flashdata('error_msg','Album doesn\'t exists!');
          redirect('albums/viewAll');
        } else {
          $photos = $this->albums->getAlbumPics($album['id']);
          $data['record'] = $album;
          $data['photos'] = $photos;
          $data['page'] = "albums";
          $this->load->view('admin/view-album',$data);
        }
      } 
    }else{
      if ($id==null) {
        redirect('albums');
      } else {
        $album = $this->albums->getAlbum($id);
        $photos = $this->albums->getAlbumPics($album['id']);
        $data['album'] = $album;
        $data['photos'] = $photos;
        $this->load->view('view-album',$data);
      }
    }
  }

  public function deleteAlbums()
  {
    if($this->session->has_userdata('logged_in')){
      if($this->input->server('REQUEST_METHOD')=='POST'){
        $data = $this->input->post();
        $ids = json_decode($data['ids'],true);
        $this->albums->deleteAlbums($ids);
      }
    }else{
      redirect('admin/logout');
    }
  }

  public function delete($id=NULL)
  {
    if($this->session->has_userdata('logged_in')){
      if(empty($id)){
        $this->session->set_flashdata('error_msg','Album doesn\'t exists!');
        redirect('albums/viewAll');
      } else {
        if($this->albums->deleteAlbum($id)){
          $this->session->set_flashdata('success_msg','Album deleted successfully!');
        }else{
          $this->session->set_flashdata('error_msg','Something went wrong!');
        }
        redirect('albums/viewAll');
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
          $data['favourite'] = isset($data['favourite'])?1:0;
          $data['about'] = htmlspecialchars($data['about']);
          $update = 0;
          if(isset($data['id'])){
            $update = 1;
            $last_id = $data['id'];
            $this->albums->updateAlbum($data);
          } else { 
            $last_id = $this->albums->insertAlbum($data);
          }

          if($_FILES['file']['name'] != ""){
            $file_name = basename($_FILES['file']['name'], "." . pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION)) . "-" . $last_id . "." . strtolower(pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION));
            $config['upload_path'] = 'assets/site/images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = $file_name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('file')){
              $this->albums->updateFile($last_id,$file_name);
            }
          } else if(!empty($data['bgimg'])){
            $this->albums->updateFile($last_id,$data['bgimg']);
          }

          if($update==1){
            $this->session->set_flashdata('success_msg','Album updated successfully!');
          } else {
            $this->session->set_flashdata('success_msg','Album created successfully!');
          }
          
          redirect('albums/viewAll');
      }else{
        redirect('albums/viewAll');
      }
    }else{
      redirect('admin/logout');
    }
  }

  public function uploadPictures()
  {
    if($this->session->has_userdata('logged_in')){
      if($this->input->server('REQUEST_METHOD')=='POST'){
        $errors = [];
        $formdata = $this->input->post();
        if(count($_FILES)){ 
            $total = count($_FILES['file']['name']);  

            $config['upload_path'] = 'assets/site/images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|mp4|wmv';
            $this->load->library('upload', $config);

            for ($i=0; $i < $total; $i++) { 
              if($_FILES['file']['name'][$i] != ""){
                $file_name = "album-" . $formdata['albumid'] . "-".uniqid()."." . strtolower(pathinfo($_FILES['file']['name'][$i],PATHINFO_EXTENSION));
                $config['file_name'] = $file_name;
                $this->upload->initialize($config);

                $_FILES['confile']['name']= $_FILES['file']['name'][$i];
                $_FILES['confile']['type']= $_FILES['file']['type'][$i];
                $_FILES['confile']['tmp_name']= $_FILES['file']['tmp_name'][$i];
                $_FILES['confile']['error']= $_FILES['file']['error'][$i];
                $_FILES['confile']['size']= $_FILES['file']['size'][$i];

                if ($this->upload->do_upload('confile')){
                  $this->albums->insertPicture($formdata['albumid'],$file_name);
                } else {
                  $errors[] =  $this->upload->display_errors();
                }
              }
            }

            $this->session->set_flashdata('upload_error', $errors);
            redirect('albums/view/' . $formdata['albumid']);

        } else{
          $this->session->set_flashdata('error_msg','Please select some pictures or videos!');
          redirect('albums/view/' . $formdata['albumid']);
        }
      }else{
        redirect('albums/viewAll');
      }
    }else{
      redirect('admin/logout');
    }
  }

  public function deletePicture()
  {
    if($this->session->has_userdata('logged_in')){
      if($this->input->server('REQUEST_METHOD')=='POST'){
        $formdata = $this->input->post();
        $rec = $this->albums->getPicture($formdata['id']);
        unlink('assets/site/images/'.$rec['picture']);
        $q = $this->albums->deletePicture($formdata['id']);
        if($q){
          $data['status'] = "SUCCESS";
          $data['msg'] = "Picture deleted!";
        } else {
          $data['status'] = "ERROR";
          $data['msg'] = "Someting went wrong!";
        }
      }else{
        $data['status'] = "ERROR";
        $data['msg'] = "Invalid request method!";
      }
    }else{
      $data['status'] = "ERROR";
      $data['msg'] = "You've been logged out!";
    }
    echo json_encode($data);
  }


  public function updatePicture()
  {
    if($this->session->has_userdata('logged_in')){
      if($this->input->server('REQUEST_METHOD')=='POST'){
        $data = $this->input->post();
        $q = $this->albums->updatePicture($data);
        if($q){
          $data['status'] = "SUCCESS";
          $data['msg'] = "Picture updated!";
        } else {
          $data['status'] = "ERROR";
          $data['msg'] = "Someting went wrong!";
        }
      }else{
        $data['status'] = "ERROR";
        $data['msg'] = "Invalid request method!";
      }
    }else{
      $data['status'] = "ERROR";
      $data['msg'] = "You've been logged out!";
    }
    echo json_encode($data);
  }

}


/* End of file Albums.php */
/* Location: ./application/controllers/Albums.php */