<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class admin_password extends CI_Controller {

	public function __construct() {
		parent::__construct();	
		$this->load->library('session'); 
	}	 

	function index() {	
		$this->load->helper('url');
		$this->load->helper('form');
		/*$data['header'] = $this->load->view('admin/header', '', true);
        $data['footer'] = $this->load->view('admin/footer', '', true);
        $data['failed'] = $this->session->flashdata('password_not_inserted');*/
		
		/*if((!$this->session->userdata('adminuser')) && (!$this->session->userdata('isAdmin'))) {
			redirect('admin/login/');
		}*/
		$this->load->view('admin/header');
		$this->load->view('admin/change_password',$data);		
      	$this->load->view('admin/footer');
	}	
	
	function updateadminpassword()	{
		
		$this->load->model('admin/login_model','alm');
		$result=$this->alm->password(); 
		if($result=='true')
		{			
			$this->session->set_flashdata('success_su',"Password updated succesfully");
			echo "y";
		}
		else if($result=='wrongc'){
			echo "Wrongc";
		}
		else{
			echo 'n';
		}
		exit;
	}	
	
	function updateadminuser()	{
		$this->load->model('admin/login_model','alm');
		$this->alm->updateAdminUserDetails($_POST);
	}

}
?>