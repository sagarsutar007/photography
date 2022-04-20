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

	public function blog()
	{
		$this->load->library('pagination');

		// init params
		$dbblog = [];
		$params = array();
		$limit_per_page = 10;
		$pagenum = $this->uri->segment(2);
		$start_index = (empty($pagenum)) ? 1 : $pagenum;

		if($start_index == 1){
			$getFrom = 0 * $limit_per_page;
		} else {
			$getFrom = ($start_index - 1) * $limit_per_page;
		}

		$total_records = $this->webmod->countPublishedBlogs();
		$data['links'] = "";
      	if ($total_records > 0) 
      	{
			$dbblog = $this->webmod->getCurrentPageRecords($limit_per_page, $getFrom);

			$config['base_url'] = base_url() . 'blog/';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config["uri_segment"] = 3;

			// custom paging configuration
			$config['num_links'] = 2;
			$config['use_page_numbers'] = TRUE;
			$config['reuse_query_string'] = TRUE;

			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';

			$config['first_link'] = '<span aria-hidden="true">First</span>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';

			$config['last_link'] = '<span aria-hidden="true">Last</span>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';

			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';

			$config['prev_link'] = 'Prev';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';

			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';

			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			// $config['attributes'] = array('class' => 'page-link');

			$this->pagination->initialize($config);

			// build paging links
			@$data["links"] = $this->pagination->create_links();
		}

		if(count($dbblog)>0){
			$i = 0;
			foreach ($dbblog as $key => $obj) {
				$dbblog[$i]['catName'] = $this->webmod->getCatName($obj['categoryId']);
				$i++;	
			}
		}
		

		$data['blog'] = $dbblog;
		$data['admin'] = $this->webmod->getAboutAdmin();
		$categories = $this->webmod->getCategories();
		$data['categories'] = [];
		foreach ($categories as $key => $obj) {
			$count = $this->webmod->countCatBlogs($obj['id']);
			$cat['id'] = $obj['id'];
			$cat['name'] = $obj['name'];
			$cat['count'] = $count;
			$data['categories'][] = $cat; 
		}

		$this->load->view('blogs',$data);
	}

	public function contact()
	{
		$data['admin'] = $this->webmod->getAboutAdmin();
		$this->load->view('contact',$data);
	}

}

/* End of file Web.php */
/* Location: ./application/controllers/Web.php */