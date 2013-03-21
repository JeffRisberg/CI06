<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_Admin extends CI_Controller {

	public $layout = 'admin';
	
	public function __construct() {
		parent::__construct();
		$this->load->model('comment_m');
		$this->load->model('post_m');

		// Load the URL helper so redirects work.
		$this->load->helper('url');
	}

	public function index() {
		$data['comments'] = $this->comment_m->get_all();
		$data['title'] = 'Comments List';

		$this->load->view('comment_admin/index', $data);
	}

	public function view($id)	{
		$data['comment'] = $this->comment_m->get($id);

		if (empty($data['comment'])) {
			show_404();
		}

		$data['title'] = 'Comment';

		$this->load->view('comment_admin/view', $data);
	}

 	public function edit($id) {
 		$data['comment'] = $this->comment_m->get($id);

 		if (empty($data['comment'])) {
 			show_404();
 		}

 		$this->load->helper('form');
 		$this->load->library('form_validation');

 		$data['title'] = 'Edit a Comment';

 		$this->load->view('comment_admin/edit');
 	}

 	public function update() {
 		$this->load->helper('form');
 		$this->load->library('form_validation');
			
 		$this->form_validation->set_rules('text', 'Comment', 'required');

 		if ($this->form_validation->run() === FALSE) {
 			$data['title'] = 'Edit a comment';

 			$this->load->view('comment_admin/edit');
 		}
 		else {
 			$this->comment_m->update();
 			redirect('comment_admin/index');
 		}
 	}

	public function create($id) {
		$this->init();
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['post'] = $this->content_item_m->get($id);
		
		if (empty($data['content_item'])) {
			show_404();
		}
		
		$data['title'] = 'Add comment';
		$data['email'] = $this->email;
		$data['id'] = $id;

		$this->load->view('comment_admin/create');
	}

	public function save() {
		$this->init();
		
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Add comment';

		$this->form_validation->set_rules('text', 'Comment', 'required');

		if ($this->form_validation->run() === FALSE) {
			create($this->input->post('id'));
		}
		else {
			$this->comment_m->insert($this->userid, $this->input->post('id'));
			redirect('comment_admin/index');
		}
	}
}
