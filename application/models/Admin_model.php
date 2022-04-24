<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function countBlogs()
	{
		return $this->db->count_all_results('blogs');
	}

	public function countAlbums()
	{
		return $this->db->count_all_results('albums');
	}

	public function countComments()
	{
		return $this->db->count_all_results('comments');
	}

	public function countNewComments()
	{
		return $this->db->get_where('comments', ['status'=>'pending'])->num_rows();	
	}

	public function countTotalCategories()
    {
    	return $this->db->count_all("categories");
	}

	public function getCurrentPageCategories($limit, $start)
	{
	    $this->db->limit($limit, $start);
	    $this->db->order_by('id',"DESC");
	    $this->db->where_not_in('id',[1]);
	    $query = $this->db->get("categories");
	    if ($query->num_rows() > 0){
	        return $query->result_array();
	    }else{
	        return false;
	    }   
	}

	public function insertCategory($data='')
	{
		$insArr = [
			'name' => $data['name'],
			'createdAt' => date('Y-m-d h:i:s')
		];
		$this->db->insert('categories', $insArr);
		return $this->db->insert_id();
	}

	public function updateCategory($data='')
	{
		$insArr = [ 'name' => $data['name'] ];
		$conArr = [ 'id' => $data['catid'] ];
		$this->db->update('categories', $insArr, $conArr);
		return $this->db->affected_rows();
	}

	public function deleteCategory($value='')
	{
		$this->db->update('albums',['categoryId'=>1],['categoryId' => $value]);
		$this->db->update('blogs',['categoryId'=>1],['categoryId' => $value]);
		$this->db->delete('categories',['id' => $value]);
		return $this->db->affected_rows();
	}

	public function deleteCategories($value='')
	{
		$this->db->where_in('categoryId', $value);
		$this->db->update('albums',['categoryId'=>1]);
		$this->db->update('blogs',['categoryId'=>1]);
		$this->db->where_in('id', $value);
	    $this->db->delete('categories');
		return $this->db->affected_rows();
	}

	public function getAboutAdmin()
	{
		return $this->db->get_where('users',['type'=>'superadmin'])->row_array();
	}

	public function updatePersonal($data='')
	{
		$updArr = [
			'name'=>$data['name'],
			'email'=>$data['email'],
			'phone'=>$data['phone'],
			'address'=>$data['address'],
			'facebook'=>$data['facebook'],
			'twitter'=>$data['twitter'],
			'instagram'=>$data['instagram'],
			'behance'=>$data['behance'],
			'dribble'=>$data['dribble']
		];
		$this->db->update('users',$updArr,['type'=>'superadmin']);
		return $this->db->affected_rows();
	}

	public function updateCompany($data='')
	{
		$updArr = [
			'companyName'=>$data['company'],
			'designation'=>$data['designation'],
			'work'=>$data['work'],
			'about'=>$data['about']
		];
		$this->db->update('users',$updArr,['type'=>'superadmin']);
		return $this->db->affected_rows();
	}

	public function updateAccount($data='')
	{
		$updArr = [ 'password'=>sha1($data['cur_pass']) ];
		$this->db->update('users',$updArr,['type'=>'superadmin']);
		return $this->db->affected_rows();
	}

	public function updateAccountPic($value='')
	{
		$updArr = [ 'photo'=>$value ];
		$this->db->update('users',$updArr,['type'=>'superadmin']);
		return $this->db->affected_rows();
	}
}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */