<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Admin extends CI_Controller {

	public $layout = 'admin';
	
	public function __construct() {
		parent::__construct();
		$this->load->model('user_m');

		// Load the URL helper so redirects work.
		$this->load->helper('url');
	}

	public function index() {
		$data['users'] = $this->user_m->get_all();
		$data['title'] = 'Users List';

		$this->load->view('user_admin/index', $data);
	}

	public function view($id)	{
		$data['user'] = $this->user_m->get($id);

		if (empty($data['user'])) {
			show_404();
		}

		$data['title'] = 'User';

		$this->load->view('user_admin/view', $data);
	}

	public function edit($id) {
		$data['user'] = $this->user_m->get($id);

		if (empty($data['user'])) {
			show_404();
		}

		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Edit a User';
	
		$this->load->view('user_admin/edit', $data);	
	}

	public function update() {
		$this->load->helper('form');
		$this->load->library('form_validation');
			
		$this->form_validation->set_rules('email', 'Email', 'required');
			
		if ($this->form_validation->run() === FALSE) {
			$data['title'] = 'Edit a User';
		
			$this->load->view('user_admin/edit');		
		}
		else {
			$this->user_m->update();
			redirect('user_admin/index');
		}
	}

	public function create() {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Create a user';
	
		$this->load->view('user_admin/create');	
	}

	public function save() {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Create a user';

		$this->form_validation->set_rules('email', 'Email', 'required');
			
		if ($this->form_validation->run() === FALSE) {
			$this->create();
		}
		else {
			$this->user_m->insert();
			redirect('user_admin/index');
		}
	}
}
