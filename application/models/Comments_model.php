<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments_model extends CI_Model {
 
  public function __construct()
  {
    parent::__construct();
  }
 
  public function index()
  {
    // 
  }

  public function countTotalComments()
  {
      return $this->db->count_all("comments");
  }

  public function getAllComments()
  {
      $q = $this->db->get('comments');
      return $q->result_array();
  }

  public function getCurrentPageComments($limit, $start)
  {
    $this->db->limit($limit, $start);
    $this->db->order_by('id',"DESC");
    $query = $this->db->get("comments");
    if ($query->num_rows() > 0){
        return $query->result_array();
    }else{
        return false;
    }   
  }

  public function changeStatus($cmntid='',$status='pending')
  {
    $this->db->update('comments', ['status'=>$status], ['id'=>$cmntid]);
    return $this->db->affected_rows();
  }

  public function deleteComment($value='')
  {
    $this->db->delete('comments',['id'=>$value]);
    return $this->db->affected_rows();
  }

}

/* End of file Comments_model.php */
/* Location: ./application/models/Comments_model.php */