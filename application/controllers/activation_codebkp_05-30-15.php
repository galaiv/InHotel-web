<?php

error_reporting(1);

class activation_code extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('pagination');
        if ((!$this->session->userdata('web_user'))) {
            redirect('login');
        }
        $this->load->model('activation_code_model');
    }

    public function index($index_start = '0') {
        $config['base_url'] = base_url() . "activation_code/ajax_activation_code_list/";
        $data['total_rows'] = $config['total_rows'] = $this->activation_code_model->count_activation_codes($this->session->userdata('hotel_id'));
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
        $activation_code_list = $this->activation_code_model->getAllActivationCodes($this->session->userdata('hotel_id'), $config['per_page'], $this->uri->segment(3));

        $data['activation_code_list'] = $activation_code_list;
        $data['start_index'] = $index_start;
        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
        $data['hotel_list'] = $this->activation_code_model->getAllHotels();
        $this->load->view('header');
        $this->load->view('activation_code_list', $data);
        $this->load->view('footer');
    }

    public function ajax_activation_code_list($index_start = '0') {
        $config['base_url'] = base_url() . "activation_code/ajax_activation_code_list/";
        $data['total_rows'] = $config['total_rows'] = $this->activation_code_model->count_activation_codes($this->session->userdata('hotel_id'));
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
        $activation_code_list = $this->activation_code_model->getAllActivationCodes($this->session->userdata('hotel_id'), $config['per_page'], $this->uri->segment(3));

        $data['activation_code_list'] = $activation_code_list;
        $data['start_index'] = $index_start;
        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
        $data['hotel_list'] = $this->activation_code_model->getAllHotels();
        echo $this->load->view('activation_code_list_ajax', $data, true);
        exit();
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

    public function create($activation_code_id = '0', $user_id = '0', $access_master_id = '0') {
        $data['access_id'] = $access_master_id;
        $data['activation_code_id'] = $activation_code_id;
        $hotel_id = $this->session->userdata('hotel_id');
        $data['activation_code_details'] = $this->activation_code_model->get_activation_code_details($activation_code_id);
        $data['hotel_list'] = $this->activation_code_model->getAllHotels();
        
        $data['user_id'] = $user_id;
        $this->load->library('form_validation');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('access_start_time', 'Access Start Time', 'required|xss_clean|callback_checkValidDateTime');
            if ($this->form_validation->run() == TRUE) {

                //    $activation_code_id = $this->input->post('activation_code_id');

                $activationCodeArr = array(
                    'user_id' => $user_id,                  
                    'access_id' => $_POST['access_id'],
                    'access_start_time' => $_POST['access_start_time'],
                    'access_close_time' => $_POST['access_close_time'],
                );
                $activationCodeArr['hotel_id'] = $hotel_id;
                $activationCodeArr['staff_id'] = ($this->session->userdata('member_type') == 3) ? $this->session->userdata('user_id') : 0;

                if ($activation_code_id != "" && $activation_code_id != "0") {

                    $this->activation_code_model->update_activation_code($activationCodeArr, $activation_code_id);
                    $this->session->set_flashdata('success', 'Activation Code details updated successfully');
                    $details['message'] = '<div class="alert alert-danger">Activation Code details updated successfully</div>';
                    $details['status'] = 1;
                    $details['activation_code_id'] = $activation_code_id;
                    echo json_encode($details);
                    exit;
                } else {
                    $activation_code = $this->generateActivationCode();
                    $activationCodeArr['activation_code'] = $activation_code;
                    $activationCodeArr['date_time'] = date("Y-m-d H:i:s");
                    $activation_code_id = $this->activation_code_model->add_activation_code($activationCodeArr);

                    $this->session->set_flashdata('success', 'Activation Code details added successfully');
                    $details['message'] = '<div class="alert alert-danger">Activation Code details added successfully</div>';
                    $details['status'] = 1;
                    $details['activation_code_id'] = $activation_code_id;
                    echo json_encode($details);
                    exit;
                    //redirect('activation_code/show');
                }
            } else {
                $details['message'] = '<div class="alert alert-danger">' . validation_errors() . '</div>';
                $details['status'] = 0;
                echo json_encode($details);
                exit;
            }
        }
        $this->load->view('header');
        $this->load->view('activation_code_add', $data);
        $this->load->view('footer');
    }

    public function generateActivationCode() {
        return $this->activation_code_model->generateActivationCode();
    }

    public function show($activation_code_id = '0') {
        $data['activation_code'] = $this->activation_code_model->getGeneratedAccessCode($activation_code_id);
        $this->load->view('header');
        $this->load->view('show_access_code', $data);
        $this->load->view('footer');
    }

    public function checkValidDateTime() {
        $access_start_time = $this->input->post('access_start_time');
        $access_close_time = $this->input->post('access_close_time');

       /* else if ((strtotime($activation_close_time) ) > (strtotime($access_close_time))) {

          $this->form_validation->set_message('checkValidDateTime', 'Access close time must be greater than activation close time');
          return false;
          } */ 
            return true;
        }
    

}
?>

