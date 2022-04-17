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

}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */