<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Login_model', 'login');
    $this->load->model('Admin_model', 'admin');
    $this->load->model('Albums_model', 'albums');
  }

  public function index()
  {
    if($this->session->has_userdata('logged_in')){
      $data = [];
      $data['page'] = "dashboard";
      $data['totalBlogs'] = $this->admin->countBlogs();
      $data['totalAlbums'] = $this->admin->countAlbums();
      $data['totalComments'] = $this->admin->countComments();
      $data['totalNewComments'] = $this->admin->countNewComments();
      $this->load->view('admin/dashboard',$data);
    } else {
      redirect('admin/login');
    }
  }

  public function login()
  {
    if($this->session->has_userdata('logged_in')){
      redirect('admin');
    } else {
      if($this->input->server('REQUEST_METHOD')=='POST'){
        $data = $this->input->post();
        $user = $this->login->authUser($data);
        if($user){
          $user = json_decode(json_encode($user),TRUE);
          $user['logged_in']=TRUE;
          $this->session->set_userdata($user);
          if(isset($data['remember']) && $data['remember'] == 1){
            set_cookie('email', $user['email'],'262800');
          }else{
            delete_cookie('email');
          }
          redirect('admin');
        } else {
          $data['errmsg'] = "Incorrect email or password!";
          $this->load->view('admin/login',$data);
        }
      }else{
        $this->load->view('admin/login');
      }
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('logged_in');
    redirect('admin/login');
  }

  public function forgotPassword()
  {
    $this->load->view('admin/forgot-password');
  }

  public function blog()
  {
    if($this->session->has_userdata('logged_in')){
      redirect('blog/viewAll');
    } else {
      redirect('admin/logout');
    }
  }

  public function albums()
  {
    if($this->session->has_userdata('logged_in')){
      redirect('albums/viewAll');
    } else {
      redirect('admin/logout');
    }
  }

  public function categories()
  {
    if($this->session->has_userdata('logged_in')){
      $this->load->library('pagination');

      // init params
      $dbcategories = [];
      $params = array();
      $limit_per_page = 10;
      $pagenum = $this->uri->segment(3);
      $start_index = (empty($pagenum)) ? 1 : $pagenum;

      if($start_index == 1){
        $getFrom = 0 * $limit_per_page;
      } else {
        $getFrom = ($start_index - 1) * $limit_per_page;
      }

      $total_records = $this->admin->countTotalCategories();

      if ($total_records - 1 > 0) 
      {
        $dbcategories = $this->admin->getCurrentPageCategories($limit_per_page, $getFrom);
          
        $config['base_url'] = base_url() . 'admin/categories/';
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

      $data['page'] = "settings";
      $data['categories'] = $dbcategories;
      $this->load->view('admin/categories',$data);
    } else {
      redirect('admin/login');
    }
  }

  public function addCategory()
  {
    if($this->session->has_userdata('logged_in')){
      $data = $this->input->post();
      $lastid = $this->admin->insertCategory($data);
      $data = [];
      if ($lastid) {
        $data['status'] = "SUCCESS";
        $data['msg'] = "Category added successfully!";
      } else {
        $data['status'] = "ERROR";
        $data['msg'] = "Something went wrong!";
      }
    } else {
      $data['status'] = "ERROR";
      $data['msg'] = "You've been logged out!";
    }
    echo json_encode($data);
  }

  public function updateCategory()
  {
    if($this->session->has_userdata('logged_in')){
      $data = $this->input->post();
      $lastid = $this->admin->updateCategory($data);
      $data = [];
      if ($lastid) {
        $data['status'] = "SUCCESS";
        $data['msg'] = "Category updated successfully!";
        $this->session->set_flashdata('success_msg','Category updated!');
      } else {
        $data['status'] = "ERROR";
        $data['msg'] = "Something went wrong!";
        $this->session->set_flashdata('error_msg','Category not updated!');
      }
    } else {
      $data['status'] = "ERROR";
      $data['msg'] = "You've been logged out!";
    }
    echo json_encode($data);
  }

  public function deleteCategory($value='')
  {
    if($this->session->has_userdata('logged_in')){
      $affRows = $this->admin->deleteCategory($value);
      if($affRows){
        $this->session->set_flashdata('success_msg','Category deleted!');
      } else {
        $this->session->set_flashdata('error_msg','Category not deleted!');
      }
      redirect('admin/categories');
    } else {
      redirect('admin/logout');
    }
  }

  public function deleteCategories()
  {
    if($this->session->has_userdata('logged_in')){
      $data = $this->input->post();
      $ids = json_decode($data['ids'],true);
      $affRows = $this->admin->deleteCategories($ids);
      $data = [];
      if ($affRows) {
        $data['status'] = "SUCCESS";
        $data['msg'] = "Categories deleted successfully!";
        $this->session->set_flashdata('success_msg','Categories deleted!');
      } else {
        $data['status'] = "ERROR";
        $data['msg'] = "Something went wrong!";
        $this->session->set_flashdata('error_msg','Categories not deleted!');
      }
    } else {
      $data['status'] = "ERROR";
      $data['msg'] = "You've been logged out!";
    }
    echo json_encode($data);
  }

  public function account()
  {
    if($this->session->has_userdata('logged_in')){
      $data['admin'] = $this->admin->getAboutAdmin();  
      $data['page'] = "settings";
      $this->load->view('admin/account',$data); 
    } else {
      redirect('admin/logout');
    } 
  }

  public function updatePersonal()
  {
    if($this->session->has_userdata('logged_in')){
      $data = $this->input->post();
      $affrows = $this->admin->updatePersonal($data);
      if($affRows){
        $this->session->set_flashdata('success_msg','Information updated!');
      } else {
        $this->session->set_flashdata('error_msg','Information not updated!');
      }
      redirect('admin/account');
    } else {
      redirect('admin/logout');
    } 
  }

  public function updateCompany()
  {
    if($this->session->has_userdata('logged_in')){
      $data = $this->input->post();
      $affrows = $this->admin->updateCompany($data);
      if($affRows){
        $this->session->set_flashdata('success_msg','Information updated!');
      } else {
        $this->session->set_flashdata('error_msg','Information not updated!');
      }
      redirect('admin/account');
    } else {
      redirect('admin/logout');
    } 
  }

  public function updateAccount()
  {
    if($this->session->has_userdata('logged_in')){
      $data = $this->input->post();
      if($data['new_pass'] == $data['con_pass']){
          $admin = $this->admin->getAboutAdmin();
          if(sha1($data['cur_pass']) == $admin['password']){
            $affrows = $this->admin->updateAccount($data);
            if($affRows){
              $this->session->set_flashdata('success_msg','Account Password updated!');
            } else {
              $this->session->set_flashdata('error_msg','Account Password not updated!');
            }
          }else{
            $this->session->set_flashdata('error_msg',"Password is incorrect!");
          }
      } else {
        $this->session->set_flashdata('error_msg','Passwords do not match!');
      }
      redirect('admin/account');
    } else {
      redirect('admin/logout');
    } 
  }


  public function updateProfilePic($value='')
  {
    if($this->session->has_userdata('logged_in')){
      if(empty($_FILES)){
        $this->session->set_flashdata('error_msg','Please select an image!');
      }else{

        if($_FILES['file']['name'] != ""){
          $file_name = basename($_FILES['file']['name']);
          $config['upload_path'] = 'assets/site/images/';
          $config['allowed_types'] = 'gif|jpg|png|jpeg|gif|webp';
          $config['file_name'] = $file_name;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          if ($this->upload->do_upload('file')){
            $this->admin->updateAccountPic($file_name);
            if($affRows){
              $this->session->set_flashdata('success_msg','Information updated!');
            } else {
              $this->session->set_flashdata('error_msg','Information not updated!');
            }
          }else{
            $this->session->set_flashdata('error_msg','Please select image only!');
          }
        } else {
          $this->session->set_flashdata('error_msg','Please send one image!');
        }
      }
      redirect('admin/account');
    } else {
      redirect('admin/logout');
    }
  }

}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */