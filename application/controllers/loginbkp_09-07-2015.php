<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
error_reporting(0);
ini_set("display_errors", "off");

class Login extends CI_Controller {
public function __construct() {
		parent::__construct();	
		$this->load->library('session'); 
                	if(($this->session->userdata('web_user'))) {                     
			redirect('dashboard');		
        }	
	}
    public function index() {
        $this->load->view('login', $data);
    }

    function check_member_login() {
        $this->load->model('register_model');
        $username = $this->input->post('email');
        $password = $this->input->post('password');
        $remember = $this->input->post('remember');


    $res = $this->register_model->check_member_login($username, $password);
	$hotel_id = ($res['hotel_id']) ? : $res['staff_hotel_id'];
	$hotel_details = $this->register_model->get_hotel_profile($hotel_id);
	$default_timzone = date_default_timezone_get();
	//echo "<br>TiMeZone:".date_default_timezone_get() ;exit;
 // print_r($hotel_details);exit;
        if ($res) {
            if (($res['active'] == 'Y' && $res['amount_paid'] == 'Y' && $res['member_type'] == 2) || ($res['active'] == 'Y' && $res['member_type'] == 3)) {
                $newdata = array(
                    'id' => $res['active'],
                    'web_user'  => $res['first_name'],
                    'member_type' =>$res['member_type'],
                    'user_id' => $res['user_id'],
                    'hotel_id'=>($res['hotel_id']) ? : $res['staff_hotel_id'],
                    'logged_in' => TRUE,
					'package_id' => $res['package_id'],
					'quickblox_id'=>$res['quickblox_id'],
					'time_zone' => ($hotel_details['time_zone']) ? : $default_timzone
                );
                 
                $this->session->set_userdata($newdata);
                $this->session->set_userdata('registration', $newdata);
                $this->session->set_userdata('amount_paid', $res['amount_paid']);
				
				$_SESSION['username'] = $this->session->userdata('web_user'); // Must be already set
	            $_SESSION['userid'] = $userid = $this->session->userdata('user_id');
  
                if ($remember == "on") {
                    $this->input->set_cookie('email', $username, time() + 3600 * 24);
                    $this->input->set_cookie('password', $password, time() + 3600 * 24);
                } else {

                    $this->input->set_cookie('email', '', time() - 3600 * 24);
                    $this->input->set_cookie('password', '', time() - 3600 * 24);
                    //unset($_COOKIE['password']);
                }
				if($res['member_type'] == 3)
                  echo 'valid'.'~=~'.$res['member_type'].'~=~'.$res['user_id'].'~=~'.$res['quickblox_id'];
				else
				  echo 'valid';   
            } else if($res['active'] == 'Y' && $res['amount_paid'] == 'N' && $res['member_type'] == 2){
			 $newdata = array(
                    'id' => $res['active'],
                    'web_user'  => $res['first_name'],
                    'member_type' =>$res['member_type'],
                    'user_id' => $res['user_id'],
                    'hotel_id'=>($res['hotel_id']) ? : $res['staff_hotel_id'],
                    'logged_in' => TRUE,
					'package_id' => $res['package_id']
					//'amount_paid'=>$res['amount_paid']
                );
                 $this->session->set_userdata('amount_paid', $res['amount_paid']);
                $this->session->set_userdata($newdata);
                $this->session->set_userdata('registration', $newdata);
			         echo 'regcomplete';
					   exit;
			} else {
                echo 'blocked';
                exit;
            }
        } else {
            echo 'invalid';
        }
    }
	function test()
	{
		echo "<br>TiMeZone:".date_default_timezone_get() ;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */