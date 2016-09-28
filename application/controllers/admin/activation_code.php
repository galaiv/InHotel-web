<?php

error_reporting(0);

class activation_code extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('admin/signup_model');
        if ((!$this->session->userdata('adminuser')) && (!$this->session->userdata('isAdmin'))) {
            redirect('admin/login/');
        }
        $this->load->model('admin/activation_code_model');
    }


    public function index() {
        $this->load->library('pagination');
        $this->load->helper('url');
        $params = '?t=1&type=' . $_REQUEST['type'];
        if ($_REQUEST['limit'])
            $params .= '&limit=' . $_REQUEST['limit'];
        if ($_REQUEST['key'])
            $params .= '&key=' . $_REQUEST['key'];
        $this->load->library('pagination');
        $config['base_url'] = site_url("admin/activation_code/index") . "/" . $params;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_REQUEST['per_page'] = 0;
        }
        $cond = "";
        $_REQUEST['key'] = (!$_POST['key'] ? ($_GET['key'] ? $_GET['key'] : '') : $_POST['key']);

        $data['type'] = $type;
        $data['message'] = $this->session->flashdata('message');
        $config['base_url'] = site_url("admin/activation_code/index") . "/" . $params;
        $config['total_rows'] = $this->activation_code_model->count_activation_codes($_REQUEST['key']);
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
        $data['activation_code_list'] = $this->activation_code_model->getAllActivationCodes($_REQUEST['key'], $config['per_page'], $_REQUEST['per_page']);
        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
         $data['hotel_list'] = $this->activation_code_model->getAllHotels();
        $this->load->view('admin/header');
        $this->load->view('admin/activation_code_list', $data);
    }

    function change_activation_code_status() {
        $activation_code_id = $_POST['activation_code_id'];
        $status = $_POST['new_status'];
        $arr = array("active" => $status);
        $this->activation_code_model->update_activation_code($arr, $activation_code_id);
        $this->session->set_flashdata('success', 'Activation Code status updated successfully');
        echo "Y";
        exit;
    }

    function delete_activation_code() {
        $activation_code_id = $_POST['activation_code_id'];
        $this->activation_code_model->delete_activation_code($activation_code_id);
        $this->session->set_flashdata('success', 'Activation Code deleted successfully');
        echo "Y";
        exit;
    }

    public function details($activation_code_id) {


        $data['activation_code_id'] = $activation_code_id;
        $data['activation_code_details'] = $this->activation_code_model->get_activation_code_details($activation_code_id);
        $data['hotel_list'] = $this->activation_code_model->getAllHotels();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $activation_code_id = $this->input->post('activation_code_id');
            $activationCodeArr = array(
                'activation_code' => $_POST['activation_code'],
                'hotel_id' => $_POST['hotel_id'],
                'staff_id' => 0,
                'activation_start_time' => $_POST['activation_start_time'],
                'activation_close_time' => $_POST['activation_close_time'],
                'access_start_time' => $_POST['access_start_time'],
                'access_close_time' => $_POST['access_close_time'],
            );
            if ($activation_code_id != "" && $activation_code_id != "0") {

                $this->activation_code_model->update_activation_code($activationCodeArr, $activation_code_id);

                $this->session->set_flashdata('success', 'Activation Code details updated successfully');
                redirect('admin/activation_code');
            } else {
                $activationCodeArr['date_time'] =date("Y-m-d H:i:s");
                $activation_code_id = $this->activation_code_model->add_activation_code($activationCodeArr, $activation_code_id);

                $this->session->set_flashdata('success', 'Activation Code details added successfully');
                redirect('admin/activation_code');
            }
        }
        $this->load->view('admin/header');
        $this->load->view('admin/activation_code_details', $data);
    }

    public function generateActivationCode() {
        echo $this->activation_code_model->generateActivationCode();
        exit;
    }

}
?>

