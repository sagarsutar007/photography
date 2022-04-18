<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Albums_model extends CI_Model {
 
  public function __construct()
  {
    parent::__construct();
  }
 
  public function index()
  {
    // 
  }

  public function countTotalAlbums()
  {
      return $this->db->count_all("albums");
  }

  public function getAllAlbums()
  {
      $q = $this->db->get('albums');
      return $q->result_array();
  }

  public function getCurrentPageRecords($limit, $start)
  {
    $this->db->limit($limit, $start);
    $this->db->order_by('id',"DESC");
    $query = $this->db->get("albums");
    if ($query->num_rows() > 0){
        return $query->result_array();
    }else{
        return false;
    }   
  }

  public function countTotalAlbumPictures($value="")
  {
    if(empty($value)){
      return 0;
    }else{
      $q = $this->db->get_where('pictures',['albumid'=>$value]);
      return $q->num_rows();
    }
  }

  public function deleteAlbums($ids=NULL)
  {
    $this->db->where_in('id', $ids);
    $this->db->delete('albums');

    $this->db->where_in('albumid', $ids);
    $this->db->delete('pictures');
  }

  public function deleteAlbum($id=NULL)
  {
    $this->db->where('albumid', $id);
    $this->db->delete('pictures');
    $this->db->where('id', $id);
    $this->db->delete('albums');
    return $this->db->affected_rows();
  }

  public function insertAlbum($data='')
  {
    $ins_arr = [
      'name' => $data['name'],
      'exercept' => $data['exercept'],
      'categoryId' => $data['categoryId'],
      'background' => "",
      'about' => addslashes($data['about']),
      'favourite' => $data['favourite'],
      'createdAt' => date('Y-m-d h:i:s')
    ];

    $this->db->insert('albums',$ins_arr);
    return $this->db->insert_id();
  }

  public function updateAlbum($data='')
  {
    $ins_arr = [
      'name' => $data['name'],
      'exercept' => $data['exercept'],
      'categoryId' => $data['categoryId'],
      'about' => addslashes($data['about']),
      'favourite' => $data['favourite'],
      'createdAt' => date('Y-m-d h:i:s')
    ];

    $con_arr = [ 'id'=>$data['id'] ];

    $this->db->update('albums',$ins_arr,$con_arr);
    return $this->db->affected_rows();
  }

  public function updateFile($id='',$value='')
  {
    $ins_arr = [ 'background'=>$value ];
    $con_arr = [ 'id'=>$id ];
    $this->db->update('albums',$ins_arr,$con_arr);
    return $this->db->affected_rows();
  }

  public function getAlbum($value='')
  {
    $q = $this->db->get_where('albums',['id'=>$value]);
    return $q->row_array();
  }

  public function getAlbumPics($value='')
  {
    $q = $this->db->get_where('pictures',['albumid'=>$value]);
    return $q->result_array();
  }

  public function insertPicture($albumid='',$value='')
  {
    $ins_arr = [
      'albumid' => $albumid,
      'picture' => $value,
      'about' => "",
      'title' => "Unknown",
      'createdAt' => date('Y-m-d h:i:s')
    ];

    $this->db->insert('pictures',$ins_arr);
    return $this->db->insert_id();
  }

  public function updatePicture($data='')
  {
    $ins_arr = [
      'about' => $data['about'],
      'title' => $data['title']
    ];

    $this->db->update('pictures',$ins_arr,['id' => $data['picid']]);
    return $this->db->affected_rows();
  }

  public function deletePicture($id=NULL)
  {
    $this->db->where_in('id', $id);
    $this->db->delete('pictures');
    return $this->db->affected_rows();
  }

  public function getPicture($id='')
  {
    return $this->db->get_where('pictures', ['id'=>$id])->row_array();
  }

}

/* End of file Albums_model.php */
/* Location: ./application/models/Albums_model.php */