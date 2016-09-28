<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
ini_set("display_errors","off");
class member extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
		$this->load->model('admin/signup_model');
		if((!$this->session->userdata('adminuser')) && (!$this->session->userdata('isAdmin'))) {
			redirect('admin/login/');
		}
    }

  	#function to call dash board
    function user_home() {
        $this->load->view('admin/header');
        $this->load->view('admin/user_home', $data);
        $this->load->view('admin/footer');
    }

    #function to list members (depends on type)
    public function index($type = "", $per_page = "") 
	{
	    $this->load->library('pagination');
		$key = $this->input->post('key');
		
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{            
            $this->session->unset_userdata('keyword');
            $this->session->set_userdata('keyword', $key);
        } 
		else 
		{
            
			$uri = $this->uri->segment(3,0);			
			if(!$uri) { $this->session->unset_userdata('keyword'); }
            $key = $this->session->userdata('keyword');
        }
        
        $data["key"] =$key;
		$key =mysql_real_escape_string($key);
	
        $data['message']		 =	 $this->session->flashdata('message');
		$type 					 = 	 0;
		$config['base_url'] 	 =   site_url("admin/member/index/");
        $config['total_rows'] 	 = 	 $this->signup_model->countUsers($type, $key);
		
        $config['per_page'] 	 = 	10;
        $config['uri_segment']   =  4;
       
        $config['full_tag_open'] 		= 	'<li>'; //
        $config['full_tag_close'] 		= 	'</li>';
        $config['next_link'] 			= 	'Next';
        $config['prev_link'] 			= 	'Prev';
        $config['cur_tag_open'] 		= 	'<a class="hover"><b>';
        $config['cur_tag_close'] 		= 	'</b></a>';
       
        $this->pagination->initialize($config);
        $data['uri_segment']		   =	$uri_segment = $this->uri->segment(4);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {             
			   $data['uri_segment'] = $uri_segment = 0;
			}
			
        $data['member_list'] 		  = 	$this->signup_model->getAllUsers($config['per_page'], $uri_segment, $type, $key);
		      
        $data['mem_type'] 			  = 	$type;
        $data['paging'] 			  = 	$this->pagination->create_links();

        $data['total_row'] 			  = 	$config['total_rows'];
		
		
	  	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			redirect('admin/member/index/'); exit; 
		}
		
        $this->load->view('admin/member_list', $data);
		$this->load->view('admin/footer');
    }

    #function to change member status
    function change_member_status() {
        $user_id = $_POST['user_id'];

        $status = $_POST['new_status'];
		
		//echo $status;
        $arr = array("active" => $status);
      
        $this->signup_model->update_member($arr, $user_id);
		if($status=='Y')
        	$this->session->set_flashdata('success', 'User activated successfully');
		else
        	$this->session->set_flashdata('success', 'User deactivated successfully');
        echo "Y";
        exit;
    }

    #function to delete a member
    function delete_member() {	
        
        $user_id = $this->input->post('user_id');
        $detail  = $this->signup_model->getMemberDetails($user_id);	
         
        /*$image_path = 'upload/members/thumb_'.$detail['image_name'] .'.'.$detail['profile_photo'];
        $image_path_large = 'upload/members/'.$detail['image_name'] .'.'.$detail['profile_photo'];
        if(is_file($image_path)){
            unlink($image_path);
        }
         if(is_file($image_path_large)){
            unlink($image_path_large);
        }*/
        // $arr =array('image_name'=>'','profile_photo'=>'','deleted' =>0);
		
		$arr 	=	array('deleted' =>0);
        
        $this->signup_model->update_member($arr, $user_id);
		$this->session->set_flashdata('success', 'User deleted successfully');

        echo "Y";
        exit;
    }
	
	function delete_member_db() {
        $user_id = $this->input->post('user_id');
        $this->signup_model->delete_member($user_id);
		$this->session->set_flashdata('success', 'User deleted successfully');
        echo "Y";
        exit;
    }

    #function to edit member details
    public function details($user_id) {
        $data['user_id'] = $user_id;

        $data['member_details'] = $this->signup_model->getMemberDetails($user_id);
     
        $member_details = $data['member_details'];
     
     
        $data['mem_type'] = $type;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
            $user_id = $this->input->post('user_id');
            $usrArr = array(
                'first_name' => $this->input->post('first_name'),
               'last_name' => $this->input->post('last_name'),
           
            );
             $user_id_det = $this->signup_model->update_member($usrArr, $user_id);
			if($this->input->post('member_type') == 3){
					$usrArr_extra =array('street_address' => $this->input->post('street'),
						'city' => $this->input->post('city'),
						'state' => $this->input->post('state'),
						'zipcode' => $this->input->post('zipcode'),
						'phone_no' => $this->input->post('phone'),						
						);					 
					$this->signup_model->update_member_profile($usrArr_extra, $user_id);
			}
			        
       //   $user_add = $this->signup_model->update_member_address($usrAdd, $user_id);

            $this->session->set_flashdata('success', ucfirst($type) . ' details updated successfully');
            redirect('admin/member/index/' . $member_details['member_type']);
        }
        $this->load->view('admin/header');
        $this->load->view('admin/member_edit', $data);
        $this->load->view('admin/footer');
    }

    #function to view member details(depends on type)
    function get_member_details($id) {
        
        $member_details = $this->signup_model->getMemberDetails($id);
        $data['member_details'] = $member_details;

        $this->load->view('admin/header');
        $this->load->view('admin/member_details', $data);
        $this->load->view('admin/footer');
    }

    #function to add an User
    public function add_new_member_data($user_id='') {
	
        //$user_id = ($user_id)?$user_id:$this->input->post('user_id');
		$data['user_id'] = $user_id;
		
		//print_r($user_id);
		
        if ($user_id) {
            $data['member_details'] = $this->signup_model->getMemberDetails($user_id);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->load->library('form_validation');			
			
			$this->form_validation->set_rules('first_name', 'First Name', 'required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required');
			$this->form_validation->set_rules('email_address', 'Email', 'valid_email');
			
			if($this->form_validation->run() == TRUE) {
			
				$flag = 0;
				if($data['member_details']['email_address'] == mysql_escape_string($this->input->post('email_address'))) {
					$flag = 1;
				}
				//echo $this->input->post('email_address');exit;
         
			//echo $this->input->post('telephone'); exit;
				
                $usrArr = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),                    
					'nick_name' => $this->input->post('nick_name'),
					'join_date' => date("Y-m-d H:i:s")
                );

                if ($user_id) {
                    $agent_update = $this->signup_model->update_member_details($usrArr, $user_id);
					if($agent_update) {
                    	$this->session->set_flashdata('success', 'User details updated successfully');
					} else {
						$this->session->set_flashdata('failure', 'Failed to update User details');
					}
					redirect('admin/member/');
                } else {
                    $agent_id = $this->signup_model->add_new_member_detail($usrArr);
					if($agent_id) {
                    	$this->session->set_flashdata('success', 'User details added successfully');
					} else {
						$this->session->set_flashdata('failure', 'Failed to add User details');
					}
					redirect('admin/member/');
                }
           
		  } else {
		  		///form validation fails
				$data['member_details'] = $_POST;
				$error_message  =  validation_errors();
				$data['error_message'] 	=	$error_message;
		  }
        }
        $this->load->view('admin/header');
        $this->load->view('admin/member_edit', $data);
        $this->load->view('admin/footer');
    }


/*    public function salesperson_list() {
        $this->load->library('pagination');
        $this->load->helper('url');
        $params = '?t=1';
        if ($_REQUEST['limit'])
            $params .= '&limit=' . $_REQUEST['limit'];
        if ($_REQUEST['key'])
            $params .= '&key=' . $_REQUEST['key'];
        $this->load->library('pagination');
        $config['base_url'] = site_url("admin/members/salesperson_list") . "/" . $params;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_REQUEST['per_page'] = 0;
        }
        $cond = "";
        $_REQUEST['key'] = (!$_POST['key'] ? ($_GET['key'] ? $_GET['key'] : '') : $_POST['key']);
        $orderby = 'T1.user_id';
        if ($_REQUEST['actions'] == 'sort') {
            $orderby = $_REQUEST['filter_order'] . ' ' . $_REQUEST['filter_order_dir'];
        }
        $data['message'] = $this->session->flashdata('message');
        $config['base_url'] = site_url("admin/members/salesperson_list") . "/" . $params;
        $config['total_rows'] = $this->signup_model->count_Sales_Users();
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['full_tag_open'] = '<li>'; //
        $config['full_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['cur_tag_open'] = '<a class="hover"><b>';
        $config['cur_tag_close'] = '</b></a>';
        $data['page'] = $_REQUEST['per_page'];
        $this->pagination->initialize($config);
        $data['member_list'] = $this->signup_model->getAllSalesUsers($config['per_page'], $_REQUEST['per_page']);

        $data['mem_type'] = $type;

        $data['paging'] = $this->pagination->create_links();

        $data['total_row'] = $config['total_rows'];

        $this->load->view('admin/header');
        $this->load->view('admin/salesperson_list', $data);
        $this->load->view('admin/footer');
    }*/

    #function to delete a salesperson
/*    function deleteSalesperson() {
        $user_id = $_POST['user_id'];

        $this->signup_model->deleteSalesperson($user_id);

        $this->session->set_flashdata('success', 'SalesPerson deleted successfully');

        echo "Y";
        exit;
    }*/

    #function to change salesperon status
/*    function change_salesperson_status() {
        $user_id = $_POST['user_id'];

        $status = $_POST['new_status'];

        $arr = array("active" => $status);

        $this->signup_model->update_salesperson($arr, $user_id);

        $this->session->set_flashdata('success', 'Sales Person status updated successfully');

        echo "Y";
        exit;
    }*/

    #function to viewsalesperson
/*    function get_salesperson_details($id) {
        if (!$this->session->userdata('adminuser')) {
            redirect(base_url() . 'admin');
        }

        $salesperson_details = $this->signup_model->get_salesperson_details($id);

        $data['salesperson_details'] = $salesperson_details;

        $this->load->view('admin/header');
        $this->load->view('admin/salesperson_details', $data);
        $this->load->view('admin/footer');
    }*/
    public function clear(){
        $this->session->unset_userdata('keyword');
        echo true;        
    }
}
?>