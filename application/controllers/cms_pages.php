<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
ini_set("display_errors","off");

class Cms_pages extends CI_Controller {


	
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
	
	
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */