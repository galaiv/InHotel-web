<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();	
		$this->load->library('session'); 
	}
	
	function index() {	
		$this->load->view('admin/login');
		$this->load->helper('cookie');
		$this->load->helper('url');
		$this->load->helper('form');
		$data['header'] = $this->load->view('admin/header', '', true);
        $data['footer'] = $this->load->view('admin/footer', '', true);
		$data['success'] = $this->session->flashdata('password_inserted');
        $data['failed'] = $this->session->flashdata('password_not_inserted');

		if(($this->session->userdata('adminuser')) && ($this->session->userdata('isAdmin'))) {
			redirect('admin/admin_dashboard/');		
        }							
	}
	
	function check_login() {		
	 	$this->load->model('admin/login_model','alm');
	 	$username=$this->input->post('username');
	 	$password=$this->input->post('password');		
		 	 
	 	if($this->alm->check($username,$password)!=FALSE)
		{
			$newdata = array(
                   'adminuser'  => $username,
                   'user'     	=> 'admin',
                   'logged_in' 	=> TRUE,
				   'isAdmin'	=> TRUE
                );

			$this->session->set_userdata($newdata);
			$this->session->set_userdata('logged_in',$newdata);	
			
			echo 'valid';
			exit();
		} else {
			echo 'invalid';
			exit();
		}
	}	
	
	public function forget_pwd() {
		$this->load->view('admin/password');
		$this->alm->pwd();
		redirect('/admin/password_form/password');
	}
	
	function logout() {
		$this->session->sess_destroy();
		redirect('/admin/login');
	}
	
	function forgot_password() {
	
	
		
		$admin_email = $_POST['admin_email'];
		
		
		
		
		$this->load->model('admin/login_model','alm');
		if($this->alm->validateAdminEmail($admin_email) == TRUE) {
			if($this->alm->sendAdminPassword($admin_email)==TRUE) {
				echo "success";
				exit();
			} else {
				echo "Invalid";
				exit();
			}
		} else {
			echo "Invalid";
			exit();
		}
	}
}
?>