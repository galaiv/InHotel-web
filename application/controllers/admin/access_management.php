<?php
error_reporting(1);
class access_management extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('admin/signup_model');
        if ((!$this->session->userdata('adminuser')) && (!$this->session->userdata('isAdmin'))) {
            redirect('admin/login/');
        }
        $this->load->model('admin/access_model');
    }

    public function index() {
        $this->load->library('pagination');
        $this->load->helper('url');
        $params = '?t=1&type=' . $_REQUEST['type'];
        if ($_REQUEST['limit'])
            $params .= '&limit=' . $_REQUEST['limit'];
        if ($_REQUEST['key'])
            $params .= '&key=' . $_REQUEST['key'];
		if ($_REQUEST['hotel'])
            $params .= '&hotel=' . $_REQUEST['hotel'];
        $this->load->library('pagination');
        $config['base_url'] = site_url("admin/access_management/index") . "/" . $params;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_REQUEST['per_page'] = 0;
        }
        $cond = "";
        $_REQUEST['key'] = (!$_POST['key'] ? ($_GET['key'] ? $_GET['key'] : '') : $_POST['key']);

        $data['type'] = $type;
        $data['message'] = $this->session->flashdata('message');
        $config['base_url'] = site_url("admin/access_management/index") . "/" . $params;
        $config['total_rows'] = $this->access_model->count_access_list($_REQUEST['key']);
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
        $data['access_management_list'] = $this->access_model->getAllAccessList($_REQUEST['key'], $config['per_page'], $_REQUEST['per_page']);
        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
        $data['hotel_list'] = $this->access_model->getAllHotels();
        $this->load->view('admin/header');
        $this->load->view('admin/access_list', $data);
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

    public function details($access_master_id) {
        $data['access_management_id'] = $access_master_id;
        $data['access_details'] = $this->access_model->get_access_details($access_master_id);

        $data['hotel_list'] = $this->access_model->getAllHotels();
        $data['access_member'] = $this->access_model->getAllAccessMembers();
        $this->load->library('form_validation');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean|callback_checkEmailExist');
            if ($this->form_validation->run() == TRUE) {
                $access_master_id = $this->input->post('access_master_id');
                $access_member_id = $this->input->post('access_member_id');
                $accessMasterArr = array(
                    'hotel_id' => $_POST['hotel_id'],
                    'staff_id' => 0,
                    'room' => $_POST['room_number'],
                    'access_start_date_time' => date('Y-m-d H:i:s', strtotime($_POST['access_start_date'])),
                    'access_end_date_time' => date('Y-m-d H:i:s', strtotime($_POST['access_end_date'])),
                    
                );
                if ($_POST['existing_user'] == 0) {
                    $accessMemberArr = array(
                        'hotel_id' => $_POST['hotel_id'],
                        'email' => $_POST['email'],
                        'password' => md5($_POST['password']),
                        'first_name' => $_POST['first_name'],
                        'last_name' => $_POST['last_name'],
                        'nick_name' => $_POST['nick_name'],
                        'gender' => $_POST['gender'],
                        'dob' => date('Y-m-d H:i:s', strtotime($_POST['dob'])),
                        
                    );
                } 
                if ($access_master_id != "" && $access_master_id != "0") {
                    $access_member_id = $this->access_model->update_access_member($accessMemberArr, $access_member_id);
                  
                    $this->access_model->update_access($accessMasterArr, $access_master_id);

                    $this->session->set_flashdata('success', 'Access details updated successfully');
                    redirect('admin/access_management');
                    exit;
                } else {
                    $date_time = date("Y-m-d H:i:s");
                    $accessMasterArr['date_time'] = $date_time;
                    $accessMemberArr['date_time'] = $date_time;
                    $access_member_id = ($_POST['existing_user'] == 0) ? $this->access_model->add_access_member($accessMemberArr) : $_POST['access_member_id'];
                    $accessMasterArr['access_member_id'] = $access_member_id;
                    $access_master_id = $this->access_model->add_access($accessMasterArr);

                    $this->session->set_flashdata('success', 'Access details added successfully');
                    redirect('admin/access_management');
                    exit;
                }
            }
        } else {
            
        }
        $this->load->view('admin/header');
        $this->load->view('admin/access_details', $data);
    }

    public function generateActivationCode() {
        echo $this->access_model->generateActivationCode();
        exit;
    }

    public function getExistingUserAccessDetails() {
        $existing_user = $this->input->post('existing_user');
        $access_member_id = $this->input->post('access_member_id');
        $data['access_details'] = $this->access_model->get_access_member_details($access_member_id);
        $data['access_details']['existing_user'] = $existing_user;
        $data['hotel_list'] = $this->access_model->getAllHotels();
        $data['existing_details'] = $existing_user;

        $this->load->view('admin/access_existing_details', $data);
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

}
?>

