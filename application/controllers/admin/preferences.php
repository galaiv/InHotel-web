<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Preferences extends CI_Controller {
	public function __construct()
    { 
	   	parent::__construct();
		$this->load->model('preferences_model');
		$this->load->library('session');
		$this->load->helper('url');
	 if((!$this->session->userdata('adminuser')) && (!$this->session->userdata('isAdmin'))) {
			redirect('admin/login/');
		}
	   
    }
	
	public function index()
	{
		//print_r($_POST);
			 
			 
			 
			if(isset($_POST['id']) && $_POST['id'] > 0 ){
				
				 
				
				$preferences		=	$this->preferences_model->get_preferences();
				$data['preferences']=	$preferences;
				
			 
						//updating preferences
					
					$res		=	$this->preferences_model->update_preferences($preferences);
					
					if($res){
						$this->session->set_flashdata('success', 'Data Updated Successfully');						
						redirect('admin/preferences/index');
						
						}
					else{
						$this->session->set_flashdata('failure', 'Preferences Updation Encounter some problem');						
						redirect('admin/preferences/index');
						}
					
				 	
				
		}
		else{
			$preferences			=	$this->preferences_model->get_preferences();
			
		$data['message']		=	$this->session->flashdata("message");
		$data['class']			=	$this->session->flashdata("class");
			$data['preferences']	=	$preferences;					
			$this->load->view('admin/preferences',$data);

		}
	}
}
?>
