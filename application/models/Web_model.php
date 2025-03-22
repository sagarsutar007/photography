<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function getSlider(){
		$sql = "SELECT a.*, c.name as categoryName FROM `albums` a INNER JOIN categories c ON a.categoryId = c.id WHERE status = 'published' AND a.favourite = 1";
		$q = $this->db->query($sql);
		return $q->result_array();
	}

	public function getAboutAdmin()
	{
		return $this->db->get_where('users',['type'=>'superadmin'])->row_array();
	}

	public function getProjects()
	{
		$sql = "SELECT a.*,c.name as category FROM `albums` a INNER JOIN categories c ON a.categoryId = c.id WHERE status = 'published'";
		$q = $this->db->query($sql);
		return $q->result_array();
	}

	public function countPublishedBlogs()
	{
		$q = $this->db->query('SELECT COUNT(*) AS total FROM `blogs` WHERE status = "published"');
		return $q->row()->total;
	}

	public function getCurrentPageRecords($limit, $start)
	{
	    $this->db->limit($limit, $start);
	    $this->db->order_by('id',"DESC");
	    $this->db->where('status','published');
	    $query = $this->db->get("blogs");
	    if ($query->num_rows() > 0){
	        return $query->result_array();
	    }else{
	        return false;
	    }   
	}

	public function getCategories()
	{
		$this->db->where_not_in('categories.id', [1]);
		return $this->db->get('categories')->result_array();
	}

	public function getCatName($value='')
	{
		$this->db->where('categories.id', $value);
		$q = $this->db->get('categories');
		if($q->num_rows() > 0){
			return $q->row()->name;
		} else {
			return NULL;
		}
	}

	public function countCatBlogs($id='')
	{
		$q = $this->db->get_where('blogs', ['categoryId' => $id]);
		return $q->num_rows();
	}

	public function getBlogFromUrl($value='')
	{
		$q = $this->db->get_where('blogs', ['url' => $value]);
		return $q->row_array();
	}

	public function getPrevBlog($value='')
	{
		$sql = "SELECT * FROM `blogs` WHERE id < $value LIMIT 1";
		$q = $this->db->query($sql);
		return $q->row_array();
	}

	public function getNextBlog($value='')
	{
		$sql = "SELECT * FROM `blogs` WHERE id > $value LIMIT 1";
		$q = $this->db->query($sql);
		return $q->row_array();
	}

	public function getBlogFromId($value='')
	{
		$q = $this->db->get_where('blogs', ['id' => $value]);
		return $q->row_array();
	}

	public function getBlogComments($value='')
	{
		$q = $this->db->get_where('comments',['relatedId'=>$value,'type'=>'blog','status'=>'approved']);
		return $q->result_array();
	}

	public function addBlogComment($data='')
	{
		$ins_arr = [
			'name' => $data['name'], 
			'email' => $data['email'], 
			'text' => $data['message'], 
			'type' => 'blog', 
			'relatedId' => $data['blogid'], 
			'status' => 'pending', 
			'createdAt' => date('Y-m-d H:i:s')
		];
		$this->db->insert('comments', $ins_arr);
		return $this->db->insert_id();
	}

	public function getAlbumBySlug($slug='')
	{
		$sql = "SELECT a.*,c.name as category FROM `albums` a INNER JOIN categories c ON a.categoryId = c.id WHERE a.slug = '".$slug."'";
		$q = $this->db->query($sql);
		return $q->row_array();
	}

	public function getAlbumPics($value='')
	{
	    $q = $this->db->get_where('pictures',['albumid'=>$value]);
	    return $q->result_array();
	}

	public function getLockedProjects()
	{
		$sql = "SELECT a.*, c.name as category FROM `albums` a INNER JOIN categories c ON a.categoryId = c.id WHERE a.status = 'published' AND a.password IS NOT NULL ORDER BY a.createdAt DESC";
		$q = $this->db->query($sql);
		return $q->result_array();
	}
}

/* End of file Web_model.php */
/* Location: ./application/models/Web_model.php */