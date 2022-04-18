<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Web_model','webmod');
	}

	public function index()
	{
		$data['slider'] = $this->webmod->getSlider();
		$this->load->view('home',$data);
	}

	public function about()
	{
		$data['about'] = $this->webmod->getAboutAdmin();
		$this->load->view('about',$data);
	}

	public function albums()
	{
		$data['albums'] = $this->webmod->getAlbums();
		$this->load->view('albums',$data);
	}

}

/* End of file Web.php */
/* Location: ./application/controllers/Web.php */