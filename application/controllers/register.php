<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Register extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/home
	 *	- or -  
	 * 		http://example.com/index.php/home/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/home/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$params['template_title'] = '';
		$params['template_css'] = '';						
		
		$this->load->view('template_header', $params); 
		$this->load->view('view_register');
		$this->load->view('template_footer');
		
	}
	
	public function doRegister(){
		if($this->input->post('uname') && $this->input->post('pword')){	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('uname', 'Username',
				'required|min_length[6]|max_length[14]|is_unique[users.username]');
			$this->form_validation->set_rules('pword', 'Password', 'required|matches[pword2]');
			$this->form_validation->set_rules('pword2', 'Password Confirmation', 'required');
			$this->form_validation->set_rules('email', 'Email',
				'required|valid_email|is_unique[users.email]');
			
			if($this->form_validation->run()){
				//save to db			
				$data = array(
					'username' => $this->input->post('uname'),
					'password' => $this->input->post('pword'),
					'email' => $this->input->post('email')
				);
				
				$this->load->model('modelUser');
				if($this->modelUser->insert_user($data)){
					$result = array('result' => '/'); //go to home
				} else{
					$result = array('message' => 'Error inserting data. Please try again.');
				}				
				
				echo json_encode($result);
			} else{
				$result = array('message' => validation_errors());
				echo json_encode($result);
			}
		} else
			return false;		
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */