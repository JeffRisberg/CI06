<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Session extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        
        // Load the URL helper so redirects work
        $this->load->helper('url');
        
        // Load the model
        $this->load->model('user_m');
    }
 
    public function index($msg = NULL) {
        $data['msg'] = $msg;
        $this->load->view('login_view', $data);
    }
 
    public function process() { 
    	  // Load the model
    	  $this->load->model('user_m');
    	
    	  //This method will have the credentials validation
    	  $this->load->library('form_validation');
    	  $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
    	  $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
    	  
    	  if ($this->form_validation->run() == FALSE) {
    	      //Field validation failed.  User redirected to login page
    	  	  // If user did not validate, then show them login page again
    	  	  $msg = '<font color=red>Missing username and/or password.</font><br />';
    	  	  $this->index($msg);  
    	  	  return; 	     
    	  }
    	  	
        // Validate the user can login
        $result = $this->user_m->validate();
        
        // Now we verify the result
        if (! $result) {
            // If user did not validate, then show them login page again
            $msg = '<font color=red>Invalid username and/or password.</font><br />';
            $this->index($msg);
        } else {
            // If user did validate, send them to home page controller
            redirect('home_page');
            return;
        }
    }
}

/* End of file login.php */
/* Location: ./application/controllers */