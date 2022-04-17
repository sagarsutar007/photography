<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    
  }

  public function authUser($data)
  {
    $q = $this->db->get_where('users', ['email'=>$data['email'],'password'=>sha1($data['password'])]);
    return $q->row();
  }

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */