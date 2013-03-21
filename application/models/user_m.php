<?php

/**
 * @author Jeff Risberg
 * @since 2012
 */
class User_m extends CI_Model {

	public function __construct() {
		$this->load->database();	
	}

	public function get($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		return $query->row_array();
	}

	public function get_all() {
		$query = $this->db->get('users');
		return $query->result_array();
	}

	public function retrieve($criteria = '', $limit = 0, $offset = 0, $order = '') {
		if (is_array($order))	{
			foreach ($order as $order_by => $direction) {
				$this->db->order_by($order_by, $direction);
			}
			unset($order_by, $direction);
		}

		if (!empty($limit))
		{
			if (!empty($offset))
			{
				$this->db->limit($limit, $offset);
			}
			else
			{
				$this->db->limit($limit);
			}
		}

		$this->db->where($criteria);
		return $this->db->get();
	}

	public function count($where) {
		$query = $this->db->get('users');
		return $query->result_array();
	}

	public function insert() {
		$data = array(
				'username' => $this->input->post('username'),
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
		);

		return $this->db->insert('users', $data);
	}

	public function update() {
		$this->username = $_POST['username'];
		$this->fname = $_POST['fname'];
		$this->lname = $_POST['lname'];
		$this->email = $_POST['email'];	
		$this->password = $_POST['password'];

		$this->db->update('users', $this, array('id' => $_POST['id']));
	}

	public function delete() {
		$this->db->delete('users', array('id' => $_POST['id']));
	}
	
	public function validate() {
		// grab user input
		$username = $this->security->xss_clean($this->input->post('username'));
		$password = $this->security->xss_clean($this->input->post('password'));
	
		// Prep the query
		$this->db->where('username', $username);
		$this->db->where('password', $password);
	
		// Run the query
		$query = $this->db->get('users');
		
		// Let's check if there are any results
		if($query->num_rows == 1) {
			// If there is a user, then create session data
			$row = $query->row();
			$data = array(
					'username' => $row->username,
					'userid' => $row->id,
					'fname' => $row->fname,
					'lname' => $row->lname,		
					'email' => $row->email,			
					'validated' => true
			);	
			$this->session->set_userdata($data);
			return true;
		}
		// If the previous process did not validate
		// then return false.	
		return false;
	}
}
