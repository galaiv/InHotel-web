<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
ini_set("display_errors","off");

class Cms extends CI_Controller {


	
	public function index()
	{
		$this->load->library('session');
		$session_data = $this->session->userdata('registration'); 
		  
 		$data['user_id'] = $session_data['id']; 
		
		 
		if( $data['user_id'])
		{
			$this->load->view('cms',$data);
		}
		else
		{
			redirect('login');
		}
		
	}
	
	function check_member_login()
	{	
		$this->load->model('register_model');
		 $username=$this->input->post('email');
		 $password=$this->input->post('password');
		
		 $id=$this->register_model->check_member_login($username,$password);
		
		 if($id!=FALSE)
		 {
			
			$newdata = array(
                   'id'  => $id,
                   'logged_in' => TRUE
             );
			
		$this->session->set_userdata($newdata);
		$this->session->set_userdata('registration',$newdata);
			
		echo 'valid';
			
		}
		else
		{
			echo 'invalid';
		}
	}
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */