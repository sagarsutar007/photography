<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function getSlider(){
		return $this->db->get_where('albums', ['favourite'=>1])->result_array();
	}

	public function getAboutAdmin()
	{
		return $this->db->get_where('users',['type'=>'superadmin'])->row_array();
	}

	public function getAlbums()
	{
		$sql = "SELECT a.id,a.name,a.background,c.name as category FROM `albums` a INNER JOIN categories c ON a.categoryId = c.id WHERE status = 'published'";
		$q = $this->db->query($sql);
		return $q->result_array();
	}

}

/* End of file Web_model.php */
/* Location: ./application/models/Web_model.php */