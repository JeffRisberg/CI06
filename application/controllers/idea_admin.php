<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Idea_Admin extends CI_Controller {

	public $layout = 'admin';
	
	public function __construct() {
		parent::__construct();
		$this->load->model('comment_m');
		$this->load->model('idea_m');

		// Load the URL helper so redirects work.
		$this->load->helper('url');
	}

	public function index() {
		$data['ideas'] = $this->idea_m->get_all();
		$data['title'] = 'Ideas List';

		$this->load->view('idea_admin/index', $data);
	}
}
