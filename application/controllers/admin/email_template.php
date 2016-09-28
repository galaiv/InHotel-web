<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
error_reporting(0);
class Email_template extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('admin/email_model');
		if((!$this->session->userdata('adminuser')) && (!$this->session->userdata('isAdmin'))) {
			redirect('admin/login/');
		}
    }

	public function index()
	{
		$this->load->library('pagination');
		$config['base_url']   = site_url('admin/email_template/index/');
		$config['total_rows'] = $this->email_model->get_email_count();
		$config['per_page']   = 10;
		$config['full_tag_open'] = '<li>';
		$config['full_tag_close'] = '</li>';
		$config['next_link']						= 'Next';
		$config['prev_link']						= 'Prev';
		$config['cur_tag_open'] 					= '<a class="hover"><b>';
		$config['cur_tag_close']					= '</b></a>';
		$config['cur_page'] = $this->uri->segment(4);
		$this->pagination->initialize($config);		
		$data['cms'] = $this->email_model->get_email_list($config['per_page'],$this->uri->segment(4));
		$this->load->view('admin/header');
		$this->load->view('admin/email_list',$data);
		$this->load->view('admin/footer');		
	}
	
	//edit email templates
	function edit_template($id='')
	{	 
	        	$cmsid = $id;
				$this->load->library('form_validation');
				//$this->form_validation->set_rules('email_subject', 'Email Subject', 'required');
				$this->form_validation->set_rules('email_template', 'Email Content', 'required');			
							
	    if(isset($_POST['id']) && $_POST['id'] > 0 ){
	     	   if ($this->form_validation->run() == FALSE)
			  {
				 $data['cms'] = $this->email_model->get_email_id($_POST['id']);
				
				 $this->load->view('admin/header', $data);
			  	 $this->load->view('admin/edit_email_template',$data);					   
			  }else{
                 $cmsid = $_POST['id'];
				 unset($_POST['id']);
				 unset($_POST['button']);
				 //updating cms
				 $this->session->set_flashdata('message', 'Email template updated successfully.');
				 $this->email_model->update_email($_POST,$cmsid);
				 redirect('admin/email_template/');				
			  }   
	   } else {
		   if($cmsid > 0 ){		      
			  $data['cms'] = $this->email_model->get_emailByid($cmsid);	 
			  if( count( $data['cms'] ) < 1 ){
			     redirect('admin/email_template/');
			  }
			  $this->load->view('admin/header', $data);
			  $this->load->view('admin/edit_email_template',$data);
		   }else{
			 redirect('admin/email_template/');
		   }
	}
	}//end of email edit
	
    /*//email view
	function view_email($id){
	   if( $id > 0 ){
	       $cms_data['cms'] = $this->email_model->get_email_id($id);
		     $this->load->view('admin/email_pop/',$cms_data);	   
	   }else{
	     redirect('admin/email/');
	   }				
	}*/
}