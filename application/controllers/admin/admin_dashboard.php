<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class admin_dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();	
		$this->load->library('session');
		if((!$this->session->userdata('adminuser')) && (!$this->session->userdata('isAdmin'))) {
			redirect('admin/login/');
		}
	}

	function index() {	
		$this->load->helper('url');
		$this->load->helper('form');
		$data['header'] = $this->load->view('admin/header', '', true);
        $data['footer'] = $this->load->view('admin/footer', '', true);
		$data['success'] = $this->session->flashdata('password_inserted');
        $data['failed'] = $this->session->flashdata('password_not_inserted');		
   		$this->load->view('admin/header');
		$this->load->view('admin/dashboard');		
      	$this->load->view('admin/footer');
	}	
	
	function adminPreferences()	{
		$this->load->model('admin/login_model','alm');
		$in_admin_user_details = $this->alm->getAdminUserDetails();
		$data['admin_details'] = $in_admin_user_details;
		$this->load->view('admin/header');
		$this->load->view('admin/admin_preferences',$data);
        $this->load->view('admin/footer');
	}	
	
	function updateadminuser() {
		$this->load->model('admin/login_model','alm');
		$this->alm->updateAdminUserDetails($_POST);
	}
}
?>