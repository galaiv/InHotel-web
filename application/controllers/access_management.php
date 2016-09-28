<?php

error_reporting(1);

class access_management extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('pagination');
        if ((!$this->session->userdata('web_user'))) {
            redirect('login');
        }
        //print_r($this->session->userdata);exit;

        $this->load->model('access_model');
    }

    public function index($index_start = '0') {

        $config['base_url'] = base_url() . "access_management/ajax_access_list/";
        $data['total_rows'] = $config['total_rows'] = $this->access_model->count_access_list($this->session->userdata('hotel_id'));
        $config['per_page'] = $this->config->item('per_page');
        $config['page_query_string'] = FALSE;
        $config['uri_segment'] = 3;

        $config['full_tag_open'] = '<ul class="pagination pull-right">'; //
        $config['full_tag_close'] = '</ul>';
//        $config['num_tag_open'] = '<li>';
//        $config['num_tag_close'] = '<li/>';

        $config['cur_tag_open'] = '<li class="active">';
        $config['cur_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $access_list = $this->access_model->getAllAccessList($this->session->userdata('hotel_id'), $config['per_page'], $index_start);

        $data['access_list'] = $access_list;
        $data['start_index'] = $index_start;
        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
        $data['hotel_list'] = $this->access_model->getAllHotels();
        $this->load->view('header');
        $this->load->view('access_list', $data);
        $this->load->view('footer');
    }

    public function ajax_access_list($index_start = '0') {

        $config['base_url'] = base_url() . "access_management/ajax_access_list/";
        $data['total_rows'] = $config['total_rows'] = $this->access_model->count_access_list($this->session->userdata('hotel_id'));
        $config['per_page'] = $this->config->item('per_page');
        $config['page_query_string'] = FALSE;
        $config['uri_segment'] = 3;

        $config['full_tag_open'] = '<ul class="pagination pull-right">'; //
        $config['full_tag_close'] = '</ul>';

        $config['cur_tag_open'] = '<li class="active">';
        $config['cur_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $access_list = $this->access_model->getAllAccessList($this->session->userdata('hotel_id'), $config['per_page'], $index_start);

        $data['access_list'] = $access_list;
        $data['start_index'] = $index_start;
        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
        $data['hotel_list'] = $this->access_model->getAllHotels();
        $data['start_index'] = $index_start;
        echo $this->load->view('access_list_ajax', $data, true);
        exit();
    }

    public function current_access($index_start = '0') {

        $config['base_url'] = base_url() . "access_management/ajax_current_access_list/";
        $data['total_rows'] = $config['total_rows'] = $this->access_model->count_current_access_list($this->session->userdata('hotel_id'));
        $config['per_page'] = $this->config->item('per_page');
        $config['page_query_string'] = FALSE;
        $config['uri_segment'] = 3;

        $config['full_tag_open'] = '<ul class="pagination pull-right">'; //
        $config['full_tag_close'] = '</ul>';
//        $config['num_tag_open'] = '<li>';
//        $config['num_tag_close'] = '<li/>';

        $config['cur_tag_open'] = '<li class="active">';
        $config['cur_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $access_list = $this->access_model->getAllCurrentAccessList($this->session->userdata('hotel_id'), $config['per_page'], $index_start);

        $data['access_list'] = $access_list;
        $data['start_index'] = $index_start;
        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
        $data['hotel_list'] = $this->access_model->getAllHotels();
        $this->load->view('header');
        $this->load->view('current_access_list', $data);
        $this->load->view('footer');
    }

    public function ajax_current_access_list($index_start = '0') {

        $config['base_url'] = base_url() . "access_management/ajax_current_access_list/";
        $data['total_rows'] = $config['total_rows'] = $this->access_model->count_current_access_list($this->session->userdata('hotel_id'));
        $config['per_page'] = $this->config->item('per_page');
        $config['page_query_string'] = FALSE;
        $config['uri_segment'] = 3;

        $config['full_tag_open'] = '<ul class="pagination pull-right">'; //
        $config['full_tag_close'] = '</ul>';

        $config['cur_tag_open'] = '<li class="active">';
        $config['cur_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $access_list = $this->access_model->getAllCurrentAccessList($this->session->userdata('hotel_id'), $config['per_page'], $index_start);

        $data['access_list'] = $access_list;
        $data['start_index'] = $index_start;
        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
        $data['hotel_list'] = $this->access_model->getAllHotels();
        $data['start_index'] = $index_start;
        echo $this->load->view('current_access_list_ajax', $data, true);
        exit();
    }

    function change_access_status() {
        $access_master_id = $_POST['access_master_id'];
        $status = $_POST['new_status'];
        $arr = array("active" => $status);
        $this->access_model->update_access($arr, $access_master_id);
        $this->session->set_flashdata('success', 'Access status updated successfully');
        echo "Y";
        exit;
    }

    function delete_access() {
        $access_master_id = $_POST['access_master_id'];
        $this->access_model->delete_access($access_master_id);
        $this->session->set_flashdata('success', 'Access deleted successfully');
        echo "Y";
        exit;
    }

    public function add($access_master_id = '0') { 
        $data['access_management_id'] = $access_master_id;
        $data['access_details'] = $this->access_model->get_access_details($access_master_id);

        $data['hotel_list'] = $this->access_model->getAllHotels();
        $existing_user = $this->input->post('existing_user');
        $data['zone'] = $this->access_model->getAllZones($this->session->userdata('hotel_id'));
        $this->load->library('form_validation');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('existing_user', 'existing_user', 'callback_checkExistingUser');
            if ($existing_user == 0)
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean|callback_checkEmailExist');
            if ($this->form_validation->run() == TRUE) {
                $access_master_id = $this->input->post('access_master_id');
                $access_member_id = $this->input->post('access_member_id');
                $accessMasterArr = array(
                    'zone_id' => $_POST['zone'],
                    'room' => $_POST['room_number'],
                );
				

                $accessMasterArr['staff_id'] = ($this->session->userdata('member_type') == 3) ? $this->session->userdata('user_id') : 0;
                $accessMasterArr['hotel_id'] = $this->session->userdata('hotel_id');
                if ($existing_user == 0) {
                    $date_time = date("Y-m-d H:i:s");
                    $accessMemberArr = array(
                        'hotel_id' => $this->session->userdata('hotel_id'),
                        'email' => $_POST['email'],
                        'first_name' => $_POST['first_name'],
                        'last_name' => $_POST['last_name'],
                        'last_update' => $date_time
                    );
                }
                if ($access_master_id != "" && $access_master_id != "0") {
                    //  $access_member_id = $this->access_model->update_access_member($accessMemberArr, $access_member_id);
                    $user_id = $accessMemberArr['user_id'] = $_POST['user_id'];
                    $access_member_id = $this->access_model->update_access_member($accessMemberArr, $access_member_id);
                    $this->access_model->update_access($accessMasterArr, $access_master_id);

                    $this->session->set_flashdata('success', 'Access details added successfully');
                    $details['message'] = '<div class="alert alert-success">Access details added successfully</div>';
                    $details['status'] = 1;
                    $details['edit'] = 1;
                    $details['user_id'] = $user_id;
                    echo json_encode($details);
                    exit;
                } else {

                    $accessMasterArr['date_time'] = $date_time;
                    if ($existing_user == 0) {
                        $accessMemberArr['date_time'] = $date_time;
                        $accessMemberArr['last_update'] = $date_time;
                    }
                    $user_id = ($existing_user == 1) ? $this->access_model->getUserIdByAccessMemberId($access_member_id) : $this->access_model->getUserIdByAccessEmail($_POST['email']);
                    if ($existing_user == 0) {
                        $accessMemberArr['user_id'] = ($user_id) ? : 0;
                    }
                    $access_member_id = ($_POST['existing_user'] == 0) ? $this->access_model->add_access_member($accessMemberArr) : $_POST['access_member_id'];
                    $accessMasterArr['access_member_id'] = $access_member_id;

                    $access_master_id = $this->access_model->add_access($accessMasterArr);

                    $this->session->set_flashdata('success', 'Access details added successfully');
                    $details['message'] = '<div class="alert alert-success">Access details added successfully</div>';
                    $details['status'] = 1;
                    $details['user_id'] = ($user_id)? : 0;
                    $details['access_master_id'] = $access_master_id;
                    echo json_encode($details);
                    exit;
                }
            } else {
                $details['message'] = '<div class="alert alert-danger">' . validation_errors() . '</div>';
                $details['status'] = 0;
                echo json_encode($details);
                exit;
            }
        } else {
            $this->load->view('header');
            $this->load->view('manage_access', $data);
            $this->load->view('footer');
        }
    }

    public function generateActivationCode() {
        echo $this->access_model->generateActivationCode();
        exit;
    }

    public function getExistingUserAccessDetails() {
        $hotel_id = $this->session->userdata('hotel_id');
        $data['zone'] = $this->access_model->getAllZones($hotel_id);
        $data['access_member'] = $this->access_model->getAllAccessMembers($hotel_id);
        $existing_user = $this->input->post('existing_user');
        $access_member_id = $this->input->post('access_member');
        $data['access_details'] = $this->access_model->get_access_member_details($access_member_id);
        //  print_r($data['access_details']);exit;
        $data['access_details']['existing_user'] = $existing_user;
        $data['hotel_list'] = $this->access_model->getAllHotels();
        $data['existing_details'] = $existing_user;

        $this->load->view('manage_access_existing', $data);
    }

    public function checkEmailExist() {
        $res = $this->access_model->checkEmailExist($_POST['email'], $_POST['access_member_id']);

        if (($res['count']) == 0) {
            return true;
        } else {
            $this->form_validation->set_message('checkEmailExist', 'The email id exists');
            return false;
        }
    }

    public function checkExistingUser() {

        if (($_POST['existing_user']) == 1) {
            return true;
        } else {
            return true;
        }
    }
	public function online_users()
	{    
	      $data['qb_id'] = $_REQUEST['qb_id'];
	     // $this->load->view('header');
		  $this->load->view('chat/chat.php', $data);
       //  $this->load->view('footer');
		//redirect("chat/chat.php");
	}
	public function chat_user()
	{
		 $data['qb_id'] = $_REQUEST['qb_id'];
		 $data['user_id'] =$this->session->userdata('user_id');
		 $data['to_user_name'] = $this->access_model->getUserDetails($_REQUEST['usrid']);
		 $this->load->view('header');
		 $this->load->view('chat', $data);
         $this->load->view('footer');
	}
	public function getchats()
	{
		 $data['login'] = $_REQUEST['qb_id'];
		 $data['password'] = $_REQUEST['password'];
		 $data['qb_id'] = $_REQUEST['qb_id'];
		 $data['to_user'] = $_REQUEST['to_user'];
		 $data['user_id'] =$this->session->userdata('user_id');
		 echo $this->load->view('chat_view', $data, true);

	}


    //---------------chat---------
}
?>

