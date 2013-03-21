<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Jeff Risberg
 * @since 2012
 */
class Idea extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->model('idea_m');
		$this->load->model('comment_m');
	}
		
	// show a list of ideas
	public function index() {
		$this->load->library(array('form_validation', 'session'));
		
		$data['title'] = "Home";
		
		$data['ideas'] = $this->idea_m->get_all();
		
		$this->load->view('idea/index', $data);
	}
	
	// view one specific idea and its comments
	public function view($id)	{
		$this->load->helper('form');
		$this->load->library(array('form_validation', 'session'));
	
		$data['query'] = $this->idea_m->get($id);
		$data['comments'] = $this->idea_m->get_comments($id);
		$data['idea_id'] = $id;
		$data['total_comments'] = $this->idea_m->total_comments($id);
		
		$this->load->view('idea/view', $data);
	}
	
	public function saveComment($idea_id)	{
		$this->load->helper('form');
		$this->load->library(array('form_validation','session'));
	
		//set validation rules
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('body', 'Comment', 'required');
	
		if ($this->idea_m->get($idea_id)) {
			foreach ($this->idea_m->get($idea_id) as $row)	{
				//set page title
				$data['title'] = $row->title;
			}
				
			if ($this->form_validation->run() == FALSE) {
				//if not valid
				$this->view($idea_id);
			}
			else {
				//if valid
				$title = $this->input->idea('title');
				$email = strtolower($this->input->idea('email'));
				$body = $this->input->idea('body');
	
				$this->comment_m->insert($idea_id, $title, $email, $body);
				$this->session->set_flashdata('message', '1 new comment added!');
				redirect('idea/view/' . $idea_id);
			}
		}
		else {
			show_404();
		}
	}
		
	public function create()	{
		$data['title'] = "Add new idea";
		
		$this->load->helper('form');
		$this->load->library(array('form_validation', 'session'));
		
	  $this->load->view('idea/create', $data);
	}
	
	public function save()	{
		$this->load->helper('form');
		$this->load->library(array('form_validation', 'session'));
	
		$this->form_validation->set_rules('title', 'Title', 'required|max_length[200]');
		$this->form_validation->set_rules('body', 'Body', 'required');
	
		if ($this->form_validation->run() == FALSE) {
			$this->create();
		}
		else {
			$this->idea_m->insert();
			$this->session->set_flashdata('message', '1 new idea added!');
			redirect('idea/index');
		}
	}
	
	public function edit($id)	{
		$data['idea'] = $this->idea_m->get($id);
		
		if (empty($data['idea'])) {
			show_404();
		}

		$this->load->helper('form');
		$this->load->library(array('form_validation', 'session'));
			
		$data['title'] = "Edit idea";
	
		$this->load->view('idea/edit', $data);
	}
	
	public function update()	{
		$this->load->helper('form');
		$this->load->library(array('form_validation', 'session'));
	
		$this->form_validation->set_rules('title', 'Title', 'required|max_length[200]');
		$this->form_validation->set_rules('body', 'Body', 'required');
	
		if ($this->form_validation->run() == FALSE) {
			$this->edit($_POST['id']);
		}
		else {
			$this->idea_m->update();
			$this->session->set_flashdata('message', 'Post updated');
			redirect('idea/index');
		}
	}
}

/* End of file idea.php */
/* Location: ./application/controllers/idea.php */