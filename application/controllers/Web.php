<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Web_model','webmod');
	}

	// public function index()
	// {
	// 	$data['slider'] = $this->webmod->getSlider();
	// 	$this->load->view('home',$data);
	// }

	// public function about()
	// {
	// 	$data['about'] = $this->webmod->getAboutAdmin();
	// 	$this->load->view('about',$data);
	// }

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
		$this->load->view('contact-us',$data);
	}

	public function article($value='')
	{
		$q = $this->webmod->getBlogFromUrl($value);
		$q['categoryName'] = $this->webmod->getCatName($q['categoryId']);
		if($q){
			$data['admin'] = $this->webmod->getAboutAdmin();
			$data['comments'] = $this->webmod->getBlogComments($q['id']);
			$data['blog'] = $q;
			$data['prevBlog'] = $this->webmod->getPrevBlog($q['id']);
			$data['nextBlog'] = $this->webmod->getNextBlog($q['id']);
			$this->load->view('view-blog',$data);
		} else {
			redirect('blog');
		}
	}

	public function addComment()
	{
		$data = $this->input->post();
		$q = $this->webmod->addBlogComment($data);
		if($q){
			echo "TRUE";
		} else {
			echo "FALSE";
		}
	}

	public function sendMail()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		//Script Foreach
		$c = true;
		$message = "";
		if ( $method === 'POST' ) {

			$project_name = trim($_POST["project_name"]);
			$admin_email  = trim($_POST["admin_email"]);
			$form_subject = trim($_POST["form_subject"]);

			foreach ( $_POST as $key => $value ) {
				if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
					$message .= "
					" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f3f3f3;">' ) . "
					<td style='padding: 10px; border: #e9e9e9 1px solid; width: 100px;'><b>$key</b></td>
					<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
				</tr>
				";
			}
		}
		} else if ( $method === 'GET' ) {

			$project_name = trim($_GET["project_name"]);
			$admin_email  = trim($_GET["admin_email"]);
			$form_subject = trim($_GET["form_subject"]);

			foreach ( $_GET as $key => $value ) {
				if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
					$message .= "
					" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f3f3f3;">' ) . "
					<td style='padding: 10px; border: #e9e9e9 1px solid; width: 100px;'><b>$key</b></td>
					<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
				</tr>
				";
			}
		}
		}

		$message = "<table style='width: 100%;'>$message</table>";

		function adopt($text) {
			return '=?UTF-8?B?'.base64_encode($text).'?=';
		}

		$headers = "MIME-Version: 1.0" . PHP_EOL .
		"Content-Type: text/html; charset=utf-8" . PHP_EOL .
		'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .
		'Reply-To: '.$admin_email.'' . PHP_EOL;

		mail($admin_email, adopt($form_subject), $message, $headers );
	}

	public function index() {
		$data['slider'] = $this->webmod->getSlider();
		$this->load->view('homepage',$data);
	}

	public function projects() {
		$data['projects'] = $this->webmod->getProjects();
		$this->load->view('projects', $data);
	}

	public function viewAlbum($slug = '')
	{
	    $data['album'] = $this->webmod->getAlbumBySlug($slug);

	    if (empty($data['album'])) {
	        redirect("/");
	        return;
	    }

	    $albumId = $data['album']['id'];
	    $albumPassword = $data['album']['password'] ?? null;
	    $sessionPassword = $_SESSION['album_'.$albumId]['password'] ?? null;

	    if (!empty($albumPassword) && $this->input->post('password')) {
	        if ($this->input->post('password') === $albumPassword) {
	            $_SESSION['album_'.$albumId]['password'] = $albumPassword;

	            redirect(current_url());
	            return;
	        } else {
	            $data['error'] = "Incorrect password!";
	        }
	    }

	    if (!empty($albumPassword) && $sessionPassword !== $albumPassword) {
	        $data['require_password'] = true;
	    } else {
	        $data['pictures'] = $this->webmod->getAlbumPics($albumId);
	    }

	    $this->load->view('viewAlbum', $data);
	}

	public function about()
	{
		$data['admin'] = $this->webmod->getAboutAdmin();
		$this->load->view('about-me',$data);
	}


	public function lockedProjects()
	{
		$data['projects'] = $this->webmod->getLockedProjects();
		$this->load->view('locked-projects', $data);
	}

	public function sendEmail()
	{
		if(!$_POST) exit;

		// Email address verification, do not edit.
		function isEmail($email) {
			return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
		}

		if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

		$name     = $_POST['name'];
		$email    = $_POST['email'];
		$comments = $_POST['comments'];

		$admin = $this->webmod->getAboutAdmin();

		if(trim($name) == '') {
			echo '<div class="error_message">Attention! You must enter your name.</div>';
			exit();
		} else if(trim($email) == '') {
			echo '<div class="error_message">Attention! Please enter a valid email address.</div>';
			exit();
		} else if(!isEmail($email)) {
			echo '<div class="error_message">Attention! You have enter an invalid e-mail address, try again.</div>';
			exit();
		}else if(trim($comments) == '') {
			echo '<div class="error_message">Attention! Please enter your message.</div>';
			exit();
		}

		$comments = htmlspecialchars($comments);


		// Configuration option.
		// Enter the email address that you want to emails to be sent to.

		//$address = "example@youremail.net";
		$address = $admin['email'];


		// Configuration option.
		// i.e. The standard subject will appear as, "You've been contacted by John Doe."

		// Example, $e_subject = '$name . ' has contacted you via Your Website.';

		$e_subject = 'You\'ve been contacted by ' . $name . '.';


		// Configuration option.
		// You can change this if you feel that you need to.
		// Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.

		$e_body = "You have been contacted by $name, their additional message is as follows." . PHP_EOL . PHP_EOL;
		$e_content = "\"$comments\"" . PHP_EOL . PHP_EOL;
		$e_reply = "You can contact $name via email, $email";

		$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );

		$headers = "From: $email" . PHP_EOL;
		$headers .= "Reply-To: $email" . PHP_EOL;
		$headers .= "MIME-Version: 1.0" . PHP_EOL;
		$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
		$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

		if(mail($address, $e_subject, $msg, $headers)) {

			// Email has sent successfully, echo a success page.

			echo "<fieldset>";
			echo "<div id='success_page'>";
			echo "<h3>Email Sent Successfully.</h3>";
			echo "<p>Thank you <strong>$name</strong>, your message has been submitted to us.</p>";
			echo "</div>";
			echo "</fieldset>";

		} else {

			echo 'ERROR!';

		}
	}

}

/* End of file Web.php */
/* Location: ./application/controllers/Web.php */