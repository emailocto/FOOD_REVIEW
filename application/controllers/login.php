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
				$result = array('message' => validation_errors());
				echo json_encode($result);
			}	else {		
				$data = array(
								'username' => $this->input->post('uname'),
								'password' => $this->input->post('pword')
							);
			
				$this->load->model('modelUser', '', TRUE);
				$result = $this->modelUser->check_user($data);
				
				if($result){
					foreach($result as $row){
						$session_arr = array(
							'id' => $row->id,
							'username' => $row->username
						);
						
						$this->session->set_userdata('haslogged_user', $session_arr);
					}
					
					$result = array('result' => '/');
					echo json_encode($result);										
				} else {
					$result = array('message' => 'Username or password incorrect.');
					echo json_encode($result);
				}
			}
		}
	}
	
	public function doLogout(){
		$this->session->unset_userdata('haslogged_user');
		session_destroy();
		redirect('/');
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */