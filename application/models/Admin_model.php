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
}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */