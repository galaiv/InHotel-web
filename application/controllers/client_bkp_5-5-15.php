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
        //$json ='{"function":"forgotPassword","parameters":{"email_address":"reshma@newagesmb.com"},"token":""}';
        //    $json = '{"function":"checkActivationCodeExpires", "parameters": {"activation_code":"8691053936","user_id":"90"},"token":""}';
        //      $json = '{"function":"GetAllGuestUsers", "parameters": {"activation_code":"3275410772","page":"0","user_id":"4"},"token":""}';
        //  
        //$json = '{"function":"update_status", "parameters": {"id":"15","status_id":"3","user_id":"4"},"token":""}';
        //$json = '{"function":"get_move_roomlist", "parameters": {"hospital_id":"1","room_id":"79"},"token":""}';
        //$json = '{"function":"change_room", "parameters": {"schedule_id":"11","room_id":"7009","user_id":"4"},"token":""}';
        //Post - $json = '{"function":"send_message", "parameters": {"from_user":"39","to_user":"2","message":"nothng yaar"},"token":""}';
        //$json='{"function":"showAllmesssages", "parameters": {"user_id": "5","pageNo": "0","device_token": ""},"token":""}';
        //$json = '{"function":"unreadMessages", "parameters": {"user_id":"6"},"token":""}';
        // $json ='{"function":"UpdateReadStatus","parameters":{"from_user":"2","to_user":"39"}}';
        // $json ='{"function":"showMessageDetails", "parameters": {"msg_id": "48","user_id": "2","pageNo": "0"},"token":""}';
        //$json = '{"function":"change_password", "parameters": {"user_id": "39","password":"123456"},"token":""}';
        //$json = '{"function":"subscribe_schedule", "parameters": {"user_id": "39","schedule_id":"11"},"token":""}';
        //$json = '{"function":"showAllNotifications", "parameters": {"user_id": "3"},"token":""}';
        //$json = '{"function":"UpdateReadStatusNotify", "parameters": {"user_id": "3"},"token":""}';
        //$json = '{"function":"clear_notification", "parameters": {"user_id": "3"},"token":""}';
        //$json = '{"function":"hotel_details", "parameters": {"activation_code": "1380479981"},"token":""}';
        //$json = '{"function":"shareExperiance","parameters":{"activation_code":"1380479981","experiance":"test","user_id":"4"}}';
        //$json = '{"function":"vacancy_reason_list", "parameters": {},"token":""}';
        //  $json = '{"function":"get_user_details","parameters":{"user_id": "11","activation_code": " 1283012851"},"token":""}';
        //$json = '{"function":"logout", "parameters": {"user_id": "4","device_token":""},"token":""}';
        //$json = '{"function":"updateDetails", "parameters": {"user_id": "11","chat_status": "N","enter_to_send": "1"},"token":""}';
        //$json='{"function":"MessageDetails", "parameters": {"from_id": "11","to_id": "4","pageNo": "0","device_token": ""},"token":""}';
        //$json='{"function":"drinks_list", "parameters": {"activation_code": "1380479981","device_token": ""},"token":""}';
        //$json ='{"function":"UpdateReadStatus","parameters":{"to_id":"66","from_id":"55"}}';
       //$json ='{"function":"updateDrinksStatus","parameters":{"status_flag":"A","drink_id":"28"}}';




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

    function register() {
//echo json_encode($_FILES);exit;
//         $_POST['first_name'] = "Anu ";
//        $_POST['last_name'] = " Jose";
//        $_POST['email_address'] = "aaaa12@aaa.dd";
//        $_POST['password'] = "123456";
//        $_POST['phone'] = "45353456565767";
//        $_POST['member_type'] = "1";
//         $_POST['device_token'] = ""; 
//        // $_POST['user_id'] = "4";
//          $_POST['status'] = "dsfsdfds";
        //  $_POST['desc'] = "This time zone converter lets you visually and very quickly convert GMT to EST and vice-versa. Simply mouse over the colored hour-tiles and glance at the hours selected by sdfdsf";
        //     $_POST['vacancy_list'] = "1,3";
        //$_POST['activation_code'] = 1380479981;

        $res = $this->client_model->emailCheck($_POST['email_address']);
        if ($res == 'N' && $_POST['user_id'] == "") {
            $_POST['join_date'] = date("Y-m-d H:i:s");
            if ($_POST['email_address'] != "")
                $user_id1 = $this->client_model->add_user($_POST);
            $details = $_POST;

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
            if ($_POST["user_id"] != "") {
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
            'chat_status' => 'N',
            'device_token' => $arr['enter_to_send'],
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
        $res = $this->client_model->checkActivationCodeExists($arr['activation_code'], $arr['user_id']);
        if ($res) {
            $activation_status = $this->client_model->checkActivationCodeExpires($arr['activation_code']);
			if($activation_status['activation_code'] !="" ) {
			       $arr1['activation_id'] = $activation_status['id'];
				   $res1 = $this->client_model->updateUserDetails($arr1, $arr['user_id']); }
            $result['activation_status'] = (empty($activation_status)) ? 'N' : 'Y';
            $result['message'] = (empty($activation_status)) ? 'Activation code expired' : 'Activation Code is active';
            echo json_encode($result);
            exit;
        } else {
            $result['activation_status'] = 'N';
            $result['message'] = 'Invalid Activation Code';
            echo json_encode($result);
        }
    }

    public function GetAllGuestUsers($arr) {
        $result = $this->client_model->GetAllGuestUsers($arr);
        $result = $this->removeNullMultidimensional($result);
        for ($i = 0; $i < count($result); $i++) {
            $user_img = explode('.', $result[$i]['image']);
            $result[$i]['image'] = ($result[$i]['image'] != "") ? base_url() . 'upload/member/thumb/' . $user_img[0] . '_thumb.' . $user_img[1] : base_url() . 'upload/noimg_account.png';
        }
        $details['details'] = $result;
        echo json_encode($details);
        exit;
    }

    public function removeNullMultidimensional($array) {


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
            $data = array('details' => $result);
            echo json_encode($data);
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
            $data = array('details' => $result);
            //print_r($data);
            echo json_encode($data);
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

    function get_user_details($arr) {
        $details = $this->client_model->get_user_details($arr['user_id'], $arr['activation_code']);
        
        $user_img = explode('.', $details['image']);
        $details['image'] = ($details['image'] != "") ? base_url() . 'upload/member/thumb/' . $user_img[0] . '_thumb.' . $user_img[1] : base_url() . 'upload/noimg_account.png';
        $details['access_start_date_time'] = date('m-d-Y G:i a', strtotime($details['access_start_date_time']));
        $details['access_end_date_time'] = date('m-d-Y G:i a', strtotime($details['access_end_date_time']));
        $vacancy_list = $this->client_model->user_vacancy_list($arr['activation_code']);
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

        //$email_from = $this->config->item('email_from');
        $this->load->library('email');
        $email_to = $arr['email_address'];
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['crlf'] = PHP_EOL;
        $config['newline'] = PHP_EOL;
        $this->email->initialize($config);
        $email = $this->client_model->get_emailByid(7);
        $message = $email['email_template'];
        $message = str_replace('#USERNAME#', $user_details["first_name"], $message);
        $message = str_replace('#FEEDBACK#', $arr['experiance'], $message);
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
        // print_r($message_details);		 
        for ($i = 0; $i < count($message_details); $i++) {
            $details = $this->client_model->getFromDetails($message_details[$i]['from'], $message_details[$i]['to'], $arr['user_id']);
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
        for ($j = 0; $j < count($details); $j++) {
            $details[$j]['sent'] = date("d.m.Y", strtotime($details[$j]['sent']));
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
        $result = array('status' => 'true', 'details' => $details);
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

    function sendPushNotification1($message, $devicetocken, $badge_count = 1) {


        if ($badge_count == "")
            $badge_count = 1;
        $deviceToken = $devicetocken;
        // Put your private key's passphrase here:
        $passphrase = 'newage';

        //$passphrase = 'newage';
        ////////////////////////////////////////////////////////////////////////////////

        $ctx = stream_context_create();
        // stream_context_set_option($ctx, 'ssl', 'local_cert', 'apns-prod.pem'); 
        stream_context_set_option($ctx, 'ssl', 'local_cert', 'apns-dev.pem');
        stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

        // Open a connection to the APNS server
        //gateway.push.apple.com 
        ################# use this for test server ###############################  **sandbox

        $fp = stream_socket_client(
                'ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);
        ################# use this for test server ###############################
        ################# use this for live server ###############################

        /*  $fp = stream_socket_client(
          'ssl://gateway.push.apple.com:2195', $err,
          $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx); */

        ################# use this for live server ###############################

        if (!$fp)
            exit("Failed to connect: $err $errstr" . PHP_EOL);

        //echo 'Connected to APNS' . PHP_EOL;
        // Create the payload body
        $body['aps'] = array(
            'alert' => $message,
            'badge' => intval($badge_count),
            'sound' => 'default'
        );

        $payload = json_encode($body);

        // Build the binary notification
        $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

        // Send it to the server
        $result = fwrite($fp, $msg, strlen($msg));

        //print_r($body);

        /* if (!$result)
          echo 'Message not delivered' . PHP_EOL;
          else
          echo 'Message successfully delivered' . "--->" . $deviceToken . PHP_EOL; */

        // Close the connection to the server
        fclose($fp);
    }

}

// end class Client - trakor

