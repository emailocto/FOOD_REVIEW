<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Login extends CI_Controller {

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
		//check if logged in
		//add user login validations
		if($this->session->userdata('haslogged_user')){
			redirect('home', 'refresh');
		} else {
			//form validation
			$this->load->library('form_validation');
			$this->form_validation->set_rules('uname', 'Username', 'required');
			$this->form_validation->set_rules('pword', 'Password', 'required');
			if($this->form_validation->run() == FALSE) {
				//Field validation failed.  User redirected to login page
				//$this->load->view('template_header', $params);
				//$this->load->view('view_home');
				//$this->load->view('template_footer');
				echo validation_errors();
			}	else {		
				$data = array(
								'username' => $this->input->post('uname'),
								'password' => $this->input->post('pword')
							);
			
				$this->load->model('modelUser', '', TRUE);
				$result = $this->modelUser->check_user($data);
				
				if($result){
					//Go to private area
					$session_arr = array(
						'id' => $result->id,
						'username' => $result->username
					);
					
					$this->session->userdata('haslogged_user', $session_arr);
					redirect('view_home', 'refresh');				
				} else {
					echo "Username or password incorrect.";
				}
			}
		}
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */