<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function countBlogs()
	{
		return $this->db->count_all_results('blogs');
	}

	public function getCurrentPageRecords($limit, $start)
	{
	    $this->db->limit($limit, $start);
	    $this->db->order_by('id',"DESC");
	    $query = $this->db->get("blogs");
	    if ($query->num_rows() > 0){
	        return $query->result_array();
	    }else{
	        return false;
	    }   
	}

	public function getCategories($value='')
	{
		$this->db->where_not_in('categories.id', [1]);
		return $this->db->get('categories')->result_array();
	}


	public function insertBlog($data='')
	{
	    $ins_arr = [
			'title' => $data['title'],
			'picture' => "",
			'url' => strtolower(url_title($data['title'])),
			'exercept' => addslashes($data['exercept']),
			'categoryId' => $data['categoryId'],
			'text' => $data['text'],
			'status' => $data['status'],
			'createdAt' => date('Y-m-d h:i:s')
	    ];

	    $this->db->insert('blogs',$ins_arr);
	    return $this->db->insert_id();
	}

	public function updateBlog($data='')
	{
	    $ins_arr = [
			'title' => $data['title'],
			'exercept' => addslashes($data['exercept']),
			'categoryId' => $data['categoryId'],
			'text' => $data['text'],
			'status' => $data['status']
	    ];

	    $con_arr = [ 'id'=>$data['id'] ];

	    $this->db->update('blogs',$ins_arr,$con_arr);
	    return $this->db->affected_rows();
	}

	public function updateFile($id='',$value='')
	{
	    $ins_arr = [ 'picture'=>$value ];
	    $con_arr = [ 'id'=>$id ];
	    $this->db->update('blogs',$ins_arr,$con_arr);
	    return $this->db->affected_rows();
	}

	public function getBlog($value='')
	{
	    $q = $this->db->get_where('blogs',['id'=>$value]);
	    return $q->row_array();
	}

	public function deleteBlogs($ids=NULL)
	{
	    $this->db->where_in('id', $ids);
	    $this->db->delete('blogs');
	}

	public function deleteBlog($id=NULL)
	{
	    $this->db->where('id', $id);
	    $this->db->delete('blogs');
	    return $this->db->affected_rows();
	}
}

/* End of file  */
/* Location: ./application/models/ */