<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//error_reporting(E_ALL);
ini_set("display_errors", "off");

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
         if ((!$this->session->userdata('web_user'))) {
            redirect('login');
        } 
        $this->load->model('order_model');
		        $this->load->model('register_model');

    }

    public function index() { 
	    $userid = $this->session->userdata('user_id');
		$hotel_id = $this->session->userdata('hotel_id');
	    $data['hotel_renewed_membership']=$this->register_model->check_membership_renewed($userid);
		$data['check_membership_renewed_byhotel']=$this->register_model->check_membership_renewed_byhotel($hotel_id);
		//print_r($data);exit;
        $this->load->view('header',$data);
        $this->load->view('dashboard', $data);
        $this->load->view('footer');
    }

    function CheckEmailexists() {
        $email = $this->input->post("email");

        if (!empty($email)) {
            $result = $this->register_model->checkEmailExist(mysql_escape_string($email));
        }

        if ($result == "true ") {
            echo 'error';
        } else {

            echo 'success';
        }
    }

    public function signup() {

        $this->load->model('register_model');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $password = $this->input->post("password");
            $email_to = $this->input->post("email");
            $member_name = $this->input->post("first_name") . " " . $this->input->post("last_name");
            $datas = array(
                'first_name' => $this->input->post("first_name"),
                'last_name' => $this->input->post("last_name"),
                'password' => md5($this->input->post("password")),
                'email_address' => $this->input->post("email"),
                'nick_name' => $this->input->post("nick_name"),
                'gender' => $this->input->post("gender"),
                'active' => 'Y',
                'member_type' => '1',
                'join_date' => date('y-m-d h:i:s'),
                'dob' => $this->input->post("dob")
            );


            if ($this->input->post("password") == $this->input->post("confirm_password")) {

                $id = $this->register_model->userRegistration($datas);

                $sess_array = array(
                    'id' => $id
                );

                $this->session->set_userdata('registration', $sess_array);
            }
            $email_from = 'InHotel';
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['crlf'] = PHP_EOL;
            $config['newline'] = PHP_EOL;
            $this->load->library('email');
            $this->email->initialize($config);
            $email = $this->register_model->get_emailByid(6);
            $message = $email['email_template'];
            $message = str_replace('#USERNAME#', $email_to, $message);
            $message = str_replace('#PASSWORD#', $password, $message);
            $message = str_replace('#E_NAME#', $member_name, $message);
            $this->email->from($email_from);
            $this->email->to($email_to);
            $this->email->subject($email['email_subject']);
            $this->email->message($message);
            $this->email->send();
            if ($id) {

                $this->session->set_flashdata('message', 'Check your mail');
                echo 'success';
            } else {
                echo 'error';
            }
        }
    }
function logout() { 
		$this->session->sess_destroy();
		session_destroy();
		session_unset();
		unset($_SESSION['tsChatBoxes']);
		unset($_SESSION['openChatBoxes']);
		unset($_SESSION['chatHistory']);
		unset($_SESSION['username']);
		unset($_SESSION['userid']);
		//print_r($_SESSION['openChatBoxes']);
		redirect('login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */