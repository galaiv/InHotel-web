<?php

//error_reporting(0);

ini_set("display_errors", "on");

class Client extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('client_model');
        $this->load->library('email');
    }

    public function index() {

        if (isset($HTTP_RAW_POST_DATA)) {
            $json = $HTTP_RAW_POST_DATA;
        } else {
            $json = implode("\r\n", file('php://input'));
        }
      //  $json ='{"function":"forgotPassword","parameters":{"email_address":"haripriya@newagesmb.com"},"token":""}'; 
       //$json = '{"function":"checkActivationCodeExpires", "parameters": {"activation_code":"1183477352","user_id":"5"},"token":""}';//  1388977377
	 //  $json = '{"function":"checkActivationCodeExpires","parameters":{"activation_code": "1219477725","user_id": "11"},"token":""}';
	   
	          //    $json = '{"function":"GetAllGuestUsers", "parameters": {"activation_code":"1128762749","page":"0","user_id":"4"},"token":""}';
        //  
        //$json = '{"function":"update_status", "parameters": {"id":"15","status_id":"3","user_id":"4"},"token":""}';
        //$json = '{"function":"get_move_roomlist", "parameters": {"hospital_id":"1","room_id":"79"},"token":""}';
        //$json = '{"function":"change_room", "parameters": {"schedule_id":"11","room_id":"7009","user_id":"4"},"token":""}';
        //Post - $json = '{"function":"send_message", "parameters": {"from_user":"39","to_user":"2","message":"nothng yaar"},"token":""}';
        // $json='{"function":"showAllmesssages", "parameters": {"user_id": "5","pageNo": "0","device_token": ""},"token":""}';
        //$json = '{"function":"unreadMessages", "parameters": {"user_id":"6"},"token":""}';
        // $json ='{"function":"UpdateReadStatus","parameters":{"from_user":"2","to_user":"39"}}';
       //$json ='{"function":"showMessageDetails", "parameters": {"msg_id": "48","user_id": "2","pageNo": "0"},"token":""}';
        //$json = '{"function":"change_password", "parameters": {"user_id": "39","password":"123456"},"token":""}';
        //$json = '{"function":"subscribe_schedule", "parameters": {"user_id": "39","schedule_id":"11"},"token":""}';
        //$json = '{"function":"showAllNotifications", "parameters": {"user_id": "3"},"token":""}';
        //$json = '{"function":"UpdateReadStatusNotify", "parameters": {"user_id": "3"},"token":""}';
        //$json = '{"function":"clear_notification", "parameters": {"user_id": "3"},"token":""}';
        //$json = '{"function":"hotel_details", "parameters": {"activation_code": "1380479981"},"token":""}';
     //   $json = '{"function":"shareExperiance","parameters":{"activation_code":"1496378133","experiance":"hi+haripriya...+space+space+next%0Anext%0A","user_id":"4"}}';
        //$json = '{"function":"vacancy_reason_list", "parameters": {},"token":""}';
     //  $json = '{"function":"get_user_details","parameters":{"user_id": "11","activation_code": "1233867432"},"token":""}';
	// $json = '{"function":"get_user_details","parameters":{"user_id": "6","activation_code": "(null)","other_id" :"5"},"token":""}';
	
//{"function":"get_user_details", "parameters": {"user_id": "4","activation_code": "(null)"},"token":""}
        //$json = '{"function":"logout", "parameters": {"user_id": "4","device_token":""},"token":""}';
        //$json = '{"function":"updateDetails", "parameters": {"user_id": "11","chat_status": "N","enter_to_send": "1"},"token":""}';
     //  $json='{"function":"MessageDetails", "parameters": {"from_id": "11","to_id": "4","pageNo": "0","device_token": ""},"token":""}';
        //$json='{"function":"drinks_list", "parameters": {"activation_code": "1380479981","device_token": ""},"token":""}';
        //$json ='{"function":"UpdateReadStatus","parameters":{"to_id":"66","from_id":"55"}}';
        //$json ='{"function":"updateDrinksStatus","parameters":{"status_flag":"A","drink_id":"28"}}';
//$json ='{"function":"GetAllBlockedUsers", "parameters": {"activation_code": "1233867432","user_id": "11","page": "0"},"token":""}';
      // $json ='{"function":"block_guest","parameters":{"user_id":"11","blocked_profile_id":"6"}}';
	   // $json ='{"function":"block_guest","parameters":{"user_id":"11","blocked_profile_id":"4"}}';
//$json ='{"function":"get_user_details", "parameters": {"user_id": "98","other_id": "99"},"token":""}';
//$json ='{"function":"getAllChatUsers", "parameters": {"user_id": "11","activation_code": "1233867432"},"token":""}';
//$json ='{"function":"updateQuickBloxId","parameters": {"quickblox_id": "3103421","user_id": "11"},"token":""}';
//{"function":"block_guest", "parameters": {"user_id": "11","blocked_profile_id": "4",},"token":""}
//$json ='{"function":"updateDrinksStatus","parameters":{"status_flag": "A","drink_id": "179"},"token":""}';

        $array = json_decode($json, TRUE);
        $token = $array['token'];
        $function_name = $array['function'];
        $this->$function_name($array['parameters']);
    }

    function login() {
        /*      $_POST = array(
          "username" => "anu@newagesmb.com",
          "password" => "123456",
          "member_type" => "1",
          "device_token" => "",
          "activation_code" => "1148872361",
          ); */
//echo json_encode($_POST);exit;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result = $this->client_model->login($_POST); //print_r($result);
            //if($result[''])
            $activation_status = $this->client_model->checkActivationCodeExpires($_POST['activation_code'], $result['user_id']);
            $result['activation_status'] = (empty($activation_status)) ? 'N' : 'Y';
            $result['activation_code'] = (empty($activation_status)) ? '' : $activation_status['activation_code'];
            echo json_encode($result);
        } else {
            die('Invalid Params');
        }
    }
	function updateDevicetoken($arr)
	{
		$user_id = $arr['user_id'];
		unset($arr['user_id']);
		$this->client_model->updateDevicetoken($arr);
	}

    function register() {
//echo json_encode($_FILES);exit;
//         $_POST['first_name'] = "Anu ";
//        $_POST['last_name'] = " Jose";
//        $_POST['email_address'] = "aaaa12@aaa.dd";
//        $_POST['password'] = "123456";
//        $_POST['phone'] = "45353456565767";
//        $_POST['member_type'] = "1";
//         $_POST['device_token'] = ""; 
      // $_POST['user_id'] = "4";
//          $_POST['status'] = "dsfsdfds";
        //  $_POST['desc'] = "This time zone converter lets you visually and very quickly convert GMT to EST and vice-versa. Simply mouse over the colored hour-tiles and glance at the hours selected by sdfdsf";
         //  $_POST['vacancy_list'] = "";
     //   $_POST['activation_code'] = 1380479981;

        $res = $this->client_model->emailCheck($_POST['email_address']);
        if ($res == 'N' && $_POST['user_id'] == "") {
            $_POST['join_date'] = date("Y-m-d H:i:s");
            if ($_POST['email_address'] != "")
                $user_id1 = $this->client_model->add_user($_POST);
			$this->client_model->check_access_member_exist($_POST['email_address'],$user_id1);
            $details = $_POST;
            $details['user_id']=$user_id1;
			$details['quickblox_id'] = '';
            $email_from = $this->config->item('email_from');
            $this->load->library('email');
            $email_to = $_POST['email_address'];
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['crlf'] = PHP_EOL;
            $config['newline'] = PHP_EOL;
            $this->email->initialize($config);
            $email = $this->client_model->get_emailByid(1);
            $message = $email['email_template'];
            $message = str_replace('#FULL_NAME#', $_POST["first_name"] . ' ' . $_POST["last_name"], $message);
            $message = str_replace('#USERNAME#', $this->input->post("email_address"), $message);
            $message = str_replace('#PASSWORD#', $this->input->post("password"), $message);
            //print_r($message);exit;
            $this->email->from($this->config->item('email_from'));
            $this->email->to($email_to);
            $this->email->subject($email['email_subject']);
            $this->email->message($message);
            $this->email->send();

            if ($user_id1 != "") {
                $this->client_model->updateActivationCodeMaster($_POST['email_address']);
                $result = array('status' => 'true', 'details' => $details, 'message' => 'Successfully Registered');
                $activation_status = $this->client_model->checkActivationCodeExpires($_POST['activation_code']);
                $result['activation_status'] = (empty($activation_status)) ? 'N' : 'Y';
                $result['activation_code'] = (empty($activation_status)) ? '' : $activation_status['activation_code'];
                echo json_encode($result);
            } else {
                $result = array('status' => 'false', 'message' => 'Registration Failed');
                echo json_encode($result);
            }
        } else {
            if ($_POST['user_id'] != "") {
                $details1 = $this->client_model->get_user_details($_POST["user_id"]);
                if ($details['active'] == 'N') {
                    $result = array('status' => 'false', 'message' => 'This account has deactivated by the admin');
                    echo json_encode($result);
                }
                if ($_FILES['image']['name'] <> "") {
                    $image_name = strtotime(date("Y-m-d H:i:s"));
                    $config = array();
                    $config['upload_path'] = 'upload/member/'; /* NB! create this dir! */

                    $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
                    $config['file_name'] = $image_name;
                    $config['width'] = 165;
                    $config['height'] = 165;
                    $this->load->library('upload');

                    $configThumb = array();
                    $configThumb['image_library'] = 'gd2';
                    $configThumb['source_image'] = '';
                    $configThumb['create_thumb'] = TRUE;
                    $configThumb['maintain_ratio'] = TRUE;
                    $configThumb['master_dim'] = 'width';
                    $configThumb['width'] = 165;
                    $configThumb['height'] = 165;
                    $this->load->library('image_lib');


                    $this->upload->initialize($config);
                    $this->client_model->unlinkImage($_POST['user_id']);
                    $upload = $this->upload->do_upload('image');
                    // $full_img_data = $this->upload->data();		

                    if ($upload) {
                        $full_img_data = $this->upload->data();
                        $configThumb['source_image'] = $full_img_data['full_path'];
                        $configThumb['new_image'] = 'upload/member/thumb/' . $image_name . $full_img_data['file_ext'];
                        $this->image_lib->initialize($configThumb);
                        $this->image_lib->resize();
                        $_POST['image1'] = $image_name . $full_img_data['file_ext'];
                    }

                    /* 				  $configThumb['source_image'] = $full_img_data['full_path'];
                      $this->image_lib->initialize($configThumb);
                      $this->image_lib->resize();
                      $_POST['image']  = $image_name.$full_img_data['file_ext'];
                     */
                }
                //$_POST['image1'] = $details['image'];
                $user_id1 = $this->client_model->add_user($_POST);
                $this->client_model->getEmailId($user_id1);
                $details = $_POST;
                $this->client_model->updateActivationCodeMaster($_POST['email_address']);
                $result = array('status' => 'true', 'details' => $details, 'message' => 'User Details Updated Successfully');
                echo json_encode($result);
            } else {
                $result = array('status' => 'false', 'message' => 'Email already exists');
                echo json_encode($result);
            }
        }
    }
    public function updateQuickBloxId($arr)
	{
	    $arr1 = array('quickblox_id' => $arr['quickblox_id']);
		$res = $this->client_model->updateUserDetails($arr1,$arr['user_id']);
        if ($res) {
            $result = array('status' => 'true', 'message' => 'User Details Updated Successfully');
        } else {
           $result = array('status' => 'true', 'message' => 'User Details Updation failed');
        }
        echo json_encode($result);
	}
    public function updateUserDetails($arr) {
        $user_id = $arr['user_id'];
        $arr['status_modified'] = date("Y-m-d H:i:s");
        unset($arr['user_id']);
        $res = $this->client_model->updateUserDetails($arr, $user_id);
        if ($res) {
            $result = array('status' => 'true', 'message' => 'User Details Updated Successfully');
        } else {
            
        }
        echo json_encode($result);
    }

    public function logout($arr) {
        $logout_arr = array(
            'device_token' => '',
			'gcm_id' => ''
        );
        $user_id = $arr['user_id'];
        unset($arr['user_id']);
        $res = $this->client_model->updateUserDetails($logout_arr, $user_id);
        if ($res) {
            $result = array('status' => 'true', 'message' => 'User Details Updated Successfully');
        } else {
            
        }
        echo json_encode($result);
    }

    public function checkActivationCodeExpires($arr) {
	    $check = $this->client_model->checkhotelExpires($arr['activation_code']);
	if($check == 'expr') { 
		    $result['activation_status'] = 'N';
            $result['message'] = 'This service of the hotel has been expired. Please contact front desk.';
            echo json_encode($result);exit;
		} else {
        $res = $this->client_model->checkActivationCodeExists($arr['activation_code'], $arr['user_id']);
        if ($res) {
            $activation_status = $this->client_model->checkActivationCodeExpires($arr['activation_code']);
            if ($activation_status['activation_code'] != "") {
                $room_id = $this->client_model->checkActCodehavRoom($arr['activation_code']);
                //  print_r($room_id);exit;
                if ($room_id['room'] != "0") {
                    $arr1['activation_id'] = $activation_status['id'];
                    $res1 = $this->client_model->updateUserDetails($arr1, $arr['user_id']);
                }
            }
            $result['activation_status'] = (empty($activation_status)) ? 'N' : 'Y';
            $result['message'] = (empty($activation_status)) ? 'Your code is expired' : 'Your code activated successfully';
            echo json_encode($result);
            exit;
        } else {
            $result['activation_status'] = 'N';
            $result['message'] = 'Invalid Activation Code';
            echo json_encode($result);
        } }
    }

    public function GetAllGuestUsers($arr) {
        $result = $this->client_model->GetAllGuestUsers($arr);
        $result = $this->removeNullMultidimensional($result);
        for ($i = 0; $i < count($result); $i++) {
            $to_room = $this->client_model->getRoomStatusByActivationId($result[$i]['activation_id']);
            if ($to_room) {
                $result[$i]['to_room_status'] = 'Y';
                $result[$i]['to_room'] = $to_room;
            } else {
                $result[$i]['to_room_status'] = 'N';
                $result[$i]['to_room'] = 0;
            }


            $user_img = explode('.', $result[$i]['image']);
            $result[$i]['image'] = ($result[$i]['image'] != "") ? base_url() . 'upload/member/thumb/' . $user_img[0] . '_thumb.' . $user_img[1] : base_url() . 'upload/noimg_chat.png';
        }
        $details['details'] = $result;              
        echo json_encode($details);
        exit;
    }
    public function getAllChatUsers($arr)
	{
		 $result2 = $this->client_model->getAllChatUsers($arr);
		 $result1 = $this->client_model->getAllChatStaffs($arr);
		 $result = array_merge($result2, $result1);
		// print_r($result);exit;
		
		  $result = $this->removeNullMultidimensional($result);
        for ($i = 0; $i < count($result); $i++) {
            $to_room = $this->client_model->getRoomStatusByActivationId($result[$i]['activation_id']);
            if ($to_room) {
                $result[$i]['to_room_status'] = 'Y';
                $result[$i]['to_room'] = $to_room;
            } else {
                $result[$i]['to_room_status'] = 'N';
                $result[$i]['to_room'] = 0;
            }
			if ($result[$i]['member_type'] == '3')
                $result[$i]['user_Type'] = 'staff';
            else
                $result[$i]['user_Type'] = 'normal';

            $user_img = explode('.', $result[$i]['image']);
            $result[$i]['image'] = ($result[$i]['image'] != "") ? base_url() . 'upload/member/thumb/' . $user_img[0] . '_thumb.' . $user_img[1] : base_url() . 'upload/noimg_chat.png';
        }
        $details['details'] = $result;              
        echo json_encode($details);
        exit;

	}
    public function GetAllBlockedUsers($arr){
		  $result = $this->client_model->GetAllBlockedUsers($arr);
		 $result = $this->removeNullMultidimensional($result);
		  for ($i = 0; $i < count($result); $i++) {

			  $user_img = explode('.', $result[$i]['image']);
			  $result[$i]['image'] = ($result[$i]['image'] != "") ? base_url() . 'upload/member/thumb/' . $user_img[0] . '_thumb.' . $user_img[1] : base_url() . 'upload/noimg_chat.png';
        }
	    $details['details'] = $result;              
        echo json_encode($details);
        exit;
	}
	
    public function removeNullMultidimensional($array) {
 //print_r($array);exit;

        foreach ($array as $key => $value) {
            foreach ($value as $k => $v) {
                if (is_null($v[$key])) {
                    $array[$key][$k] = "";
                }
            }
        }
        return $array;
    }

    public function removeNull($array) {

        foreach ($array as $key => $value) {

            if (is_null($value)) {
                $array[$key] = "";
            }
        }
        return $array;
    }

    # function for forgot password.
    #This function will reset users password and send the new password to user

    function forgotPassword($arr) {

        $message = $this->client_model->emailCheck($arr['email_address']); # checking whether the email address is valid or not

        if ($message == 'N') {
            $result = array('status' => 'false', 'message' => 'Invalid Email Address');
            echo json_encode($result);
        } else if ($message == 'Y') {
            $new_password = $this->client_model->randomPassword(); # generate random password

            $user_id = $this->client_model->getUserIDFromEmail($arr['email_address']);

            $this->client_model->updateUserPassword(array('password' => md5($new_password)), $user_id);
            $dtls['new_password'] = $new_password;
            $details = $this->client_model->getUserDetails($user_id);

            $email_from = $this->config->item('email_from');
            $this->load->library('email');
            $email_to = $arr['email_address'];
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['crlf'] = PHP_EOL;
            $config['newline'] = PHP_EOL;
            $this->email->initialize($config);
            $email = $this->client_model->get_emailByid(2);
            $message = $email['email_template'];
            $message = str_replace('#FULL_NAME#', $details["first_name"] . ' ' . $details["last_name"], $message);
            $message = str_replace('#PASSWORD#', $new_password, $message);
            //print_r($message);exit;
            $this->email->from($this->config->item('email_from'));
            $this->email->to($email_to);
            $this->email->subject($email['email_subject']);
            $this->email->message($message);
            $this->email->send();
            $result = array('status' => 'true', 'message' => 'Your new password has been sent to the email address');
            //print_r($data);
            echo json_encode($result);
        }
    }

    public function updateDetails($arr) {
        $user_id = $arr['user_id'];
        $arr['status_modified'] = date("Y-m-d H:i:s");
        unset($arr['user_id']);
        $res = $this->client_model->updateUserDetails($arr, $user_id);
        if ($res) {
            $result = array('status' => 'true', 'message' => 'Settings Updated Successfully');
        } else {
            $result = array('status' => 'true', 'message' => 'Update failed');
        }
        echo json_encode($result);
    }

    //change password
    public function change_password($arr) {
        // print_r($arr);exit;
        $u_id = $this->client_model->change_password($arr);
        if ($u_id == 'success') {
            $result = array('status' => 'true', 'message' => 'Password  Updated Successfully');
            echo json_encode($result);
        } else if ($u_id == 'notexist') {
            $result = array('status' => 'false', 'message' => 'Failed');
            echo json_encode($result);
        } else {
            $result = array('status' => 'false', 'message' => 'Failed');
            echo json_encode($result);
        }
    }

    function get_user_details($arr) {// print_r($arr);exit;
        $details = $this->client_model->get_user_details($arr['user_id'], $arr['activation_code']);
		if($details['room'] == '' && $arr['other_id'] !="")
		    $details['room'] = $this->client_model->getRoomStatusByActivationId($details['activation_id']);
 //echo "hi";exit;
        $user_img = explode('.', $details['image']);
        $details['image'] = ($details['image'] != "") ? base_url() . 'upload/member/thumb/' . $user_img[0] . '_thumb.' . $user_img[1] : base_url() . 'upload/noimg_chat.png';
        $details['access_start_date_time'] = ($details['access_start_date_time']) ? date('m-d-Y G:i a', strtotime($details['access_start_date_time'])) :'';
        $details['access_end_date_time'] = ($details['access_end_date_time'])? date('m-d-Y G:i a', strtotime($details['access_end_date_time'])):'';
       // $vacancy_list = array();	
		if($arr['activation_code'] !="" && $arr['activation_code'] !="(null)" && $arr['activation_code'] !=(null)) { 
	    	$vacancy_list = $this->client_model->user_vacancy_list($arr['activation_code']);
			if($vacancy_list =="")
			  $vacancy_list = array();	 
		} else {
		  if($arr['other_id'] !="") {
			$vacancy_list = $this->client_model->user_vacancy_list('',$arr['user_id']); 
			if($vacancy_list =="")
			  $vacancy_list = array();	
			}
			
		  else 
		    $vacancy_list = array();	
		}
		if($arr['other_id'] !="")
			$details['blocked_status']	= $this->client_model->checkblockeduser($arr['user_id'],$arr['other_id']);
        $details = $this->removeNull($details);
        $vacancy_list = $this->removeNullMultidimensional($vacancy_list);
        $result = array('status' => 'true', 'details' => $details, 'user_vacancy' => $vacancy_list);

        echo json_encode($result);
    }

    function vacancy_reason_list() {
        $details = $this->client_model->vacancy_reason_list();
        $result = array('status' => 'true', 'details' => $details);
        echo json_encode($result);
    }

    function hotel_details($arr) {
        $details = $this->client_model->get_hotel_details($arr['activation_code']);
        $result = array('status' => 'true', 'details' => $details);
        echo json_encode($result);
    }

    function shareExperiance($arr) { //print_r($arr);exit;
        $res = $this->client_model->shareExperiance($arr);
        $user_details = $this->client_model->getUserDetails($arr['user_id']);
        $details = $this->client_model->get_hotel_details($arr['activation_code']);
        $stafflist = $this->client_model->get_all_stafflist($details['id']);
		$experiance = $arr['experiance'];
		$experiance = urldecode($experiance);
		//print_r($experiance);
		//print_r('------------------');
	    //$experiance = str_replace("%20"," ",$experiance);
	 //   $experiance = str_replace('+', " ",$experiance);
	$experiance = str_replace('%0A', "\r\n", $experiance);

//echo $experiance;exit;
		for($i=0;$i<count($stafflist);$i++)
		{
				$this->load->library('email');
				$email_to = $stafflist[$i]['email_address'];
				$config['mailtype'] = 'html';
				$config['charset'] = 'utf-8';
				$config['crlf'] = PHP_EOL;
			    $config['newline'] = PHP_EOL;
				$this->email->initialize($config);
				$email1 = $this->client_model->get_emailByid(7);
				$message1 = $email1['email_template'];
				$message1 = str_replace('#USERNAME#', $user_details["first_name"], $message1);
				$message1 = str_replace('#FEEDBACK#', $experiance, $message1);
				//print_r($message);exit;
				$this->email->from($user_details['email_address']);
				$this->email->to($email_to);
				$this->email->subject($email1['email_subject']);
				$this->email->message($message1);
				$this->email->send();
		}
        //$email_from = $this->config->item('email_from');
        $this->load->library('email');
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['crlf'] = PHP_EOL;
        $config['newline'] = PHP_EOL;
        $this->email->initialize($config);
        $email = $this->client_model->get_emailByid(7);
        $message = $email['email_template'];
        $message = str_replace('#USERNAME#', $user_details["first_name"], $message);
        $message = str_replace('#FEEDBACK#', $experiance, $message);
        //print_r($message);exit;
        $this->email->from($user_details['email_address']);
        $this->email->to($details['feedback_email']);
        $this->email->subject($email['email_subject']);
        $this->email->message($message);
        $this->email->send();

        if ($res) {
            $result = array('status' => 'true', 'message' => 'Experience shared Successfully');
        } else {
            $result = array('status' => 'true', 'message' => 'Sharing failed');
        }
        echo json_encode($result);
    }

    function showAllmesssages($arr) {
        $message_details = $this->client_model->getAllMessages($arr['user_id'], $arr['pageNo']);
        $user_details = $this->client_model->getUserDetails($arr['user_id']);
        // print_r($message_details);		 
        for ($i = 0; $i < count($message_details); $i++) {
            $details = $this->client_model->getFromDetails($message_details[$i]['from'], $message_details[$i]['to'], $arr['user_id']);
            $message_details[$i]['to_room_status'] = $this->client_model->getroomstatusbyactId($details['activation_id']);
            $message_details[$i]['from_room_status'] = $this->client_model->getroomstatusbyactId($user_details['activation_id']);
            $message_details[$i]['profile_id'] = $details['profile_id'];
            $message_details[$i]['profile_name'] = $details['profile_name'];
            if ($details['user_type'] == '3')
                $message_details[$i]['user_Type'] = 'staff';
            else
                $message_details[$i]['user_Type'] = 'normal';
            $user_img = explode('.', $details['profile_user_image']);
            $message_details[$i]['profile_user_image'] = ($details['profile_user_image'] != "") ? base_url() . 'upload/member/thumb/' . $user_img[0] . '_thumb.' . $user_img[1] : base_url() . 'upload/noimg_chat.png';
            $message_details[$i]['sent'] = date("d.m.Y", strtotime($message_details[$i]['sent']));
            $message_details[$i]['unread_messages'] = $this->client_model->getUnreadMessagesFromuser($message_details[$i]['to'], $message_details[$i]['from'], $arr['user_id']);
        }
        //print_r($message_details);exit;
        $count_msgs = count($message_details);
        $result = array('status' => 'true', 'details' => $message_details, 'count_msgs' => $count_msgs);
        echo json_encode($result);
    }

    //function to show messages
    function MessageDetails($arr) {  //print_r($arr);
        $this->load->model('client_model');

         $details = $this->client_model->getMessageDetails($arr['from_id'], $arr['to_id'], $arr['pageNo']);
		  $user_details = $this->client_model->getUserDetails($arr['to_id']);
		 $user_details1 = $this->client_model->getUserDetails($arr['from_id']);
         $mesage_info = array();
		 $user_img11 = explode('.', $user_details['image']);
         $user_img12 = explode('.', $user_details1['image']);
		 $message_info['to_user'] = $arr['to_id'];
		 $message_info['to_name'] = $user_details['first_name'].''.$user_details['last_name'];
		 $message_info['to_image'] = ($user_details['image'] != "") ? base_url() . 'upload/member/thumb/' . $user_img11[0] . '_thumb.' . $user_img11[1] : base_url() . 'upload/noimg_chat.png';
		  $message_info['from_user'] = $arr['from_id'];
		 $message_info['from_name'] = $user_details1['first_name'].''.$user_details1['last_name'];
		 $message_info['from_image'] = ($user_details1['image'] != "") ? base_url() . 'upload/member/thumb/' . $user_img12[0] . '_thumb.' . $user_img12[1] : base_url() . 'upload/noimg_chat.png';

		$to_room_status = $this->client_model->getroomstatusbyactId($user_details['activation_id']);
        $from_room_status = $this->client_model->getroomstatusbyactId($user_details1['activation_id']);
		
        for ($j = 0; $j < count($details); $j++) {
            $details[$j]['sent'] = date("d.m.Y", strtotime($details[$j]['sent']));
			$details[$j]['from_image'] = $details[$j]['message_id'];
            $user_img = explode('.', $details[$j]['from_image']);
            $user_img1 = explode('.', $details[$j]['to_image']);
            if ($details[$j]['video'])
                $video_thumb = explode('.', $details[$j]['video']);
            $details[$j]['from_image'] = ($details[$j]['from_image'] != "") ? base_url() . 'upload/member/thumb/' . $user_img[0] . '_thumb.' . $user_img[1] : base_url() . 'upload/noimg_chat.png';
            $details[$j]['to_image'] = ($details[$j]['to_image'] != "") ? base_url() . 'upload/member/thumb/' . $user_img1[0] . '_thumb.' . $user_img1[1] : base_url() . 'upload/noimg_chat.png';
            $details[$j]['video'] = ($details[$j]['video'] != "") ? base_url() . 'upload/chat/videos/' . $details[$j]['video'] : '';
            $details[$j]['video_thumb'] = ($details[$j]['video'] != "") ? base_url() . 'upload/chat/videos/' . $video_thumb[0] . '.png' : '';
            if ($details[$j]['drink_offerings_id'] != 0) {
                $details[$j]['drink_offer'] = $this->client_model->getDrinkDetails($details[$j]['drink_offerings_id']);
                $details[$j]['drink_offer']['image'] = ($details[$j]['drink_offer']['image'] != "") ? base_url() . 'upload/drinks/thumb/' . $details[$j]['drink_offer']['image'] : base_url() . 'upload/noimg_drink@2x.png';
            }
        }
        $details = (array_reverse($details));
        $result = array('status' => 'true', 'details' => $details,'to_room_status'=>$to_room_status,'from_room_status'=>$from_room_status,'user_details' => $message_info);
        //print_r($mutalfrnds_list);
        echo json_encode($result);
    }

    // function to send a message
    function send_message() {
        //echo json_encode($_POST);exit;
        //$_POST['from_id'] = 5;
        //$_POST['to_id']   = 4;
        //$_POST['message'] = "no";
        //$_POST['drinks_id'] = 1;
        //$_POST['quantity'] = 2;
        if ($_POST['drinks_id'] != "")
            $drink_offerings_id = $this->client_model->drinkofferhistory($_POST);

        if ($_FILES['video']['name'] <> "") {
            $targetFolder = FCPATH . '/upload/chat/videos';
            $video = strtotime(date("Y-m-d H:i:s"));
            $tempFile = $_FILES['video']['tmp_name'];
            $fileParts = pathinfo($_FILES['video']['name']);
            $video_name = $video . '.' . $fileParts['extension'];
            $targetFile = realpath($targetFolder) . '/' . $video_name;
            //echo $targetFile;exit;
            move_uploaded_file($tempFile, $targetFile);
            $_POST['video'] = $video_name;

            $ffmpeg = 'ffmpeg';
//                                echo $this->config->item('absolute_url');
            // the input video file
            $video1 = FCPATH . "upload/chat/videos/" . $video_name;
            // where you'll save the image
            $image1 = FCPATH . 'upload/chat/videos/' . $video . '.png';
            // default time to get the image
            $second = 1;
            // echo $image1;exit;
            // get the duration and a random place within that
            $cmd = "$ffmpeg -i $video1 2>&1";
            if (preg_match('/Duration: ((\d+):(\d+):(\d+))/s', `$cmd`, $time)) {
                $total = ($time[2] * 3600) + ($time[3] * 60) + $time[4];
                $second = rand(1, ($total - 1));
            }

            // get the screenshot
            $cmd = "$ffmpeg -i $video1 -deinterlace -an -ss $second -t 00:00:01 -r 1 -y -vcodec mjpeg -f mjpeg -s 165*120 $image1 2>&1";
            $return = `$cmd`;
        }
        $msg = $this->client_model->sendMessage($_POST, $drink_offerings_id);
        if ($msg) {
            $result = array('status' => 'true', 'message' => 'Message send successfully');
            if ($_POST['video'] != '')
                $result['video_thumb'] = base_url() . 'upload/chat/videos/' . $video . '.png';
        } else {
            $result = array('status' => 'false', 'message' => 'Sending failed ');
        }
        /* $details	=	$this->client_model->userProfile($_POST['from_id']);

          $pushnotifi		    =	$this->client_model->checking_pushnotifi($_POST['to_id']);
          if($pushnotifi['push_notification']=='Y'){
          $device_tocken 	    = 	$this->client_model->getUserDeviceTocken($_POST['to_id']);
          $message			=	"Message from ".$details['fullname'];
          $badge_count	=	$this->client_model->update_iphone_notification($_POST['to_id']);
          $this->client_model->sendPushNotification($message,$device_tocken,$badge_count);} */
        //print_r($message);exit;			
        echo json_encode($result);
    }

    //update message status
    function updateReadStatus($arr) {
        $this->client_model->updateReadStatus($arr['to_id'], $arr['from_id']);
        $result = array('status' => 'true');
        echo json_encode($result);
    }

    function updateDrinksStatus($arr) {
        $this->client_model->updateDrinksStatus($arr['drink_id'], $arr['status_flag']);
		$drink_details = $this->client_model->get_drinkofferdetails($arr['drink_id']);
		$from_details	=	$this->client_model->getUserDetails($drink_details['user_id']);
		$to_details	    =	$this->client_model->getUserDetails($drink_details['to_user_id']);
		$device_tocken 	    = 	$to_details['device_token'];
		if($arr['status_flag'] =='A')
			$message = "Your drink offer has been accepted by ".$to_details['first_name']." ".$to_details['last_name'];
		else if($arr['status_flag'] =='D')
			$message = "Your drink offer has been rejected by ".$to_details['first_name']." ".$to_details['last_name'];			
		$badge_count	=	$this->client_model->update_iphone_notification($drink_details['user_id']);
		//$this->client_model->sendPushNotification($message,$device_tocken,$badge_count);
        $result = array('status' => 'true');
        echo json_encode($result);
    }
	function send_push_message() {
		$from_details	=	$this->client_model->getUserDetails($_POST['userid']);
		$to_details	    =	$this->client_model->getUserDetails($_POST['touserid']);
		$device_tocken 	    = 	$to_details['device_token'];
		$message = "You have message from ".$from_details['first_name']." ".$from_details['last_name'];		
		$badge_count	=	$this->client_model->update_iphone_notification($from_details['user_id']);
		//echo $message;exit;
		$this->client_model->sendPushNotification($message,$device_tocken,$_POST['userid'],$from_details['quickblox_id']);
	}
	function send_push_message_and() {
	
		$from_details	=	$this->client_model->getUserDetails($_POST['userid']);
		$to_details	    =	$this->client_model->getUserDetails($_POST['touserid']);
		$gcm_id 	    = 	$to_details['gcm_id'];
		$device_tocken 	 = 	$to_details['device_token'];
		if($gcm_id != "") {
			$message = $from_details['first_name']." ".$from_details['last_name'].": ".$_POST['message'];		
			$this->client_model->sendPushNotification_ANDROID($message,$gcm_id,$_POST['userid'],$from_details['quickblox_id']); 
		}
		if($device_tocken !="") {
			$message = $from_details['first_name']." ".$from_details['last_name'].": ".$_POST['message'];		
		    $this->client_model->sendPushNotification($message,$device_tocken,$_POST['userid'],$from_details['quickblox_id']);
		}
	}
	
    function updateDrinksStatus_ad($arr) { //print_r($arr);exit;
        $this->client_model->updateDrinksStatus($arr['drink_id'], $arr['status_flag']);		
        $result = array('status' => 'true');
        echo json_encode($result);
    }
    function drinks_list($arr) {
        $details = $this->client_model->getAllDrinks($arr['activation_code']);
        for ($j = 0; $j < count($details); $j++) {
            $details[$j]['image'] = ($details[$j]['image'] != "") ? base_url() . 'upload/drinks/thumb/' . $details[$j]['image'] : base_url() . 'upload/noimg_drink@2x.png';
        }
        $result = array('status' => 'true', 'details' => $details);
        echo json_encode($result);
    }

    function block_guest($arr) {
        $this->client_model->block_guest($arr);
        $result = array('status' => 'true');
        echo json_encode($result);
    }
	function sendPushNotification_ANDROID()
	{
	           $url = 'https://android.googleapis.com/gcm/send';
 		
   $message = array('message' => "You have a new message from ",
                'tag' => "message",
                'content' => array('user_Type' => 'staff'));
				
				$datas['gcm_id'] ='APA91bE98nxCs1q0cJ9oMQ2Fjeqf-H0J4cmTNcYkKpC5W2Opd-vgQ3X78BdLAjpjUtjzhQOW9cr7qFfQupkyXZmSQOw8NavvCAV_AmefO2H5msTzBfSkw4hzVIcS7ZW0aGYs3NJ3sizybhYVPzcoqlPST-vM0wqueQ';
				  $fields = array(
            'registration_ids' => array(0 => $datas['gcm_id']),
            'data' => $message,
        );
				
      
//echo $tag;
        /*        $headers = array(
          'Authorization: key=AIzaSyAJk9yuOe9E9Babuv2rUs6isF5x8b5tm2A',
          'Content-Type: application/json'
          ); */
        $headers = array(
            'Authorization: key=AIzaSyAry160KkqITbUV0xLRT0iSVZa6agnBVLY',
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);
     // print_r($result);echo'-----------------------';
	}
	function sendPushNotification1() {
		
		$message ="test";
		if($badge_count == "")
			$badge_count = 1;
        //$deviceToken = $devicetocken;
		$deviceToken = "786683360cc488a2b32797c1ba8df008b175ce78d2a8cd0b7d57e3bd0394e7f3";
        // Put your private key's passphrase here:
        $passphrase = 'newage';

        //$passphrase = 'newage';
        ////////////////////////////////////////////////////////////////////////////////

        $ctx = stream_context_create();
        //stream_context_set_option($ctx, 'ssl', 'local_cert', 'apns-prod.pem'); 
	    stream_context_set_option($ctx, 'ssl', 'local_cert', 'apns-dev.pem');
        stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

        // Open a connection to the APNS server
        //gateway.push.apple.com 
        ################# use this for test server ###############################  **sandbox
		
			$fp = stream_socket_client(
			'ssl://gateway.sandbox.push.apple.com:2195', $err,
			$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
        ################# use this for test server ###############################
        ################# use this for live server ###############################

      /* $fp = stream_socket_client(
			'ssl://gateway.push.apple.com:2195', $err,  
			$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);*/

        ################# use this for live server ###############################

        if (!$fp) 
            exit("Failed to connect: $err $errstr" . PHP_EOL);

        //echo 'Connected to APNS' . PHP_EOL;
        // Create the payload body
        $body['aps'] = array(
            'alert' => "hai",
            'badge' => 1,
            'sound' => 'default'
        );

        $payload = json_encode($body);

        // Build the binary notification
        $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

        // Send it to the server
        $result = fwrite($fp, $msg, strlen($msg));

        //print_r($body);

        if (!$result)
            echo 'Message not delivered' . PHP_EOL;
        else
            echo 'Message successfully delivered' . "--->" . $deviceToken . PHP_EOL;

        // Close the connection to the server
        fclose($fp);
    }
	
	function sendPushNotification2() {
		
		//if($badge_count == "")
			//$badge_count = 1;
        //$deviceToken = $devicetocken;
		$deviceToken = "3a03b4b614f28617bfe7e100a9d4d4643b8dca9dc5276992d86e410d5528a4cb";
        // Put your private key's passphrase here:
        $passphrase = 'newage';

        //$passphrase = 'newage';
        ////////////////////////////////////////////////////////////////////////////////

        $ctx = stream_context_create();
        stream_context_set_option($ctx, 'ssl', 'local_cert', 'apns-prod.pem'); 
	   // stream_context_set_option($ctx, 'ssl', 'local_cert', 'apns-dev.pem');
        stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

        // Open a connection to the APNS server
        //gateway.push.apple.com 
        ################# use this for test server ###############################  **sandbox
		
			//$fp = stream_socket_client(
			//'ssl://gateway.sandbox.push.apple.com:2195', $err,
			//$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
        ################# use this for test server ###############################
        ################# use this for live server ###############################

       $fp = stream_socket_client(
			'ssl://gateway.push.apple.com:2195', $err,  
			$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

        ################# use this for live server ###############################

        if (!$fp) 
            exit("Failed to connect: $err $errstr" . PHP_EOL);

        //echo 'Connected to APNS' . PHP_EOL;
        // Create the payload body
        $body['aps'] = array(
            'alert' => "hai",
            'badge' => 1,
            'sound' => 'default'
        );
  		$body['tag'] = 'staff_message';
		$body['to_id'] = 2;
       	$body['recp_quickblox_id'] = "3460827";
		$body['user_Type'] = 'staff';
        $payload = json_encode($body);

        // Build the binary notification
        $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

        // Send it to the server
        $result = fwrite($fp, $msg, strlen($msg));

        //print_r($body);

       /* if (!$result)
            echo 'Message not delivered' . PHP_EOL;
        else
            echo 'Message successfully delivered' . "--->" . $deviceToken . PHP_EOL;*/

        // Close the connection to the server
        fclose($fp);
    }

	function testjson()
	{
	$data1 = array( 'a', 'b', 'c' );
$data2 = array( 'name' => 'God', 'age' => -1 );
$option = 1; 
header('Content-type: application/json');
if ( $option == 1 )
  echo json_encode( $data1 );
  // prints json array ["a","b","c"]
else
  echo json_encode( $data2 );
  // prints json object {"name":"God","age":-1}  
	}

}

// end class Client - trakor

