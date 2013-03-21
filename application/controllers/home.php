<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Jeff Risberg
 * @since 2012
 */
class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->model('idea_m');
		$this->load->model('comment_m');
	}
	
	public function index() {
		$data['title'] = "Home";
		$this->load->view('home/index', $data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */