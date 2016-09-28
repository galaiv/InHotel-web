<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//ini_set('display_errors', 'on');error_reporting(E_ALL);

class Registration extends CI_Controller {

	public function index()
	{
		$this->load->view('register',$data);
	}
	
	function CheckEmailexists()
	{
		$this->load->model('register_model');

		
	   	 $email = $this->input->post("email");
		 
       	 if(!empty($email)){
      		 $result = $this->register_model->checkEmailExist(mysql_escape_string($email));
      	 }
		 
        if ($result =="Y")
		{
             echo 'error';
        } 
		else 
		{
          
			echo 'success';
      	}
    }
	
	public function signup()
	{	
		
		$this->load->model('register_model');
	    if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
         	
			$password= $this->input->post("password");
			$email_to =  $this->input->post("email");
	   		$member_name = $this->input->post("first_name")." " . $this->input->post("last_name");
            $datas = array(
                'first_name' =>$this->input->post("first_name"),
				'last_name' => $this->input->post("last_name"),
                'password' => md5($this->input->post("password")),
                'email_address' => $this->input->post("email"),
				'nick_name' => $this->input->post("nick_name"),
				'gender' => $this->input->post("gender"),
				'active' => 'Y',
				'member_type' => '1',
				'join_date' =>date('y-m-d h:i:s'),
				'dob' => $this->input->post("dob")
                
			   );
           
      
         if ($this->input->post("password") == $this->input->post("confirm_password")) 
	     {		
		 	
             $id = $this->register_model->userRegistration($datas);
				
			 $sess_array = array(
       				'id' => $id 
       			);
  
  		$this->session->set_userdata('registration', $sess_array);
			
          }
		$this->load->library('email');  
        $email_from = $this->config->item('email_from');
		$email_to = $_POST['email'];
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		$config['crlf'] = PHP_EOL;
		$config['newline'] = PHP_EOL;
		$this->email->initialize($config);
		$email = $this->register_model->get_emailByid(1);
		$message = $email['email_template'];
		$message = str_replace('#FULL_NAME#', $_POST["first_name"] . ' ' . $_POST["last_name"], $message);
		$message = str_replace('#USERNAME#',$this->input->post("email"), $message);			
		$message = str_replace('#PASSWORD#', $this->input->post("password"), $message);
		$this->email->from($this->config->item('email_from'));
		$this->email->to($email_to);
		$this->email->subject($email['email_subject']);
		$this->email->message($message);
		$this->email->send();
        if ($id) 
		{
             
		 	 $this->session->set_flashdata('message','Check your mail');          
             echo 'success';
        }
        else 
		{
             echo 'error';
        }
        
    }
   }
   
   public function hotel_signup()
	{			$this->load->model('register_model');

	 if ($_SERVER['REQUEST_METHOD'] === 'POST'){
         	
			$password= $this->input->post("password");
			$email_to =  $this->input->post("email");
	   		$member_name = $this->input->post("first_name")." " . $this->input->post("last_name");
            $datas = array(
                'first_name' =>$this->input->post("first_name"),
				'last_name' => $this->input->post("last_name"),
                'password' => md5($this->input->post("password")),
                'email_address' => $this->input->post("email"),
				'active' => 'Y',
				'member_type' => '2',
				//'package_id'=>$this->input->post("package_id"),
				'join_date' =>date('y-m-d h:i:s'),
				'amount_paid'=>'Y',
				'subscription_status' =>'N'              
			   ); //print_r($datas);exit; 
					 	
             $id = $this->register_model->userRegistration($datas);	
			 if($_POST['zipcode'] !="") {
			   $time_zone =  $this->gettimezone($_POST['zipcode']);//echo $time_zone;exit;
			 if($time_zone == '')
				 $time_zone = 'Europe/Rome';
				 } 
				
			    $datas1 = array(
				'user_id' =>$id,				
                'title' =>$this->input->post("title"),
				'zipcode' =>$this->input->post("zipcode"),
				'time_zone' => $time_zone,
				'contact_number' => $this->input->post("phone")
			   );
			 $id1 = $this->register_model->hotel_profile_updation($datas1);	
		    $sess_array = array(
       				'usrid' => $id,
					'hotel_pay_id' => $id1,
					//'package_id' => $this->input->post("package_id")
       			);
             $array=array();
			 $array['user_id'] = $id;
			 $array['expiry_date'] = date('Y-m-d', strtotime("+ 2 month"));
             $this->register_model->updateMembershipRenewDetailsSignup($array);
			 $zone_id = $this->register_model->save_zone($id1);

  		     $this->session->set_userdata('registration_partial', $sess_array);	
		     $this->session->set_userdata('hotl_pass', $this->input->post("password"));
			$this->load->library('email');  
			$email_from = $this->config->item('email_from');
			$config['mailtype'] = 'html';
			$config['charset'] = 'utf-8';
			$config['crlf'] = PHP_EOL;
			$config['newline'] = PHP_EOL;
			$this->email->initialize($config);
			$email1	  = $this->register_model->get_emailByid(3);
			
			$message = $email1['email_template'];
			$message = str_replace('#FULL_NAME#',$this->input->post("first_name").''.$this->input->post("last_name"), $message);
			$basePath = base_url();
			$ActLink = $basePath . "login/";
			$link = '<a href="' . $ActLink . '">Login Now</a>';
			$message = str_replace('#LINK#', $link, $message);			
			//print_r($message);					
			$this->email->from($email_from);
			$this->email->to($this->input->post("email"));
			$this->email->subject($email1['email_subject']);
			$this->email->message($message);
			$this->email->send();
        if ($id && id1) 
		{
            // $this->session->set_flashdata('message','Check your mail');          
             echo 'success';
        }
        else 
		{
             echo 'error';
        }
        
    }
		 $data['packages']=$this->register_model->getPackages();
		$this->load->view('register1',$data);
    }
	
	public function payment()
	{
	     $this->load->model('register_model');
		 $session_data = $this->session->userdata('registration_partial');
		 $session_data1 = $this->session->userdata('registration');  
		 $data['packages']=$this->register_model->getPackages();

		//print_r($session_data1);exit;
		 if($session_data != "") {
         	$user_id = $session_data['usrid'];
			$hotel_id=$session_data['hotel_pay_id'];

		} else {
		    $user_id = $session_data1['user_id'];
			$hotel_id=$session_data1['hotel_id'];
		}
		if (!$user_id) {
			redirect('login');		
		}
		 $data['hotel_renewed_membership']=$this->register_model->check_membership_renewed($user_id);
		 $data['check_membership_renewed_byhotel']=$this->register_model->check_membership_renewed_byhotel($hotel_id);
		if ($_SERVER['REQUEST_METHOD'] === 'POST'){
             //print_r($_POST);exit;
			$hotl_data = array ( 'package_id' => $this->input->post("package_id") );
			$this->register_model->updateMembershipDetails($hotl_data,$user_id);
			$package_id=$this->input->post("package_id");


		     $firstName = urlencode($this->input->post('name_on_card'));
            $creditCardType = urlencode($this->input->post('creditCardType'));
            $creditCardNumber = urlencode($this->input->post('creditCardNumber'));
            $expDateMonth = urlencode($this->input->post('expDateMonth'));
            $padDateMonth = str_pad($expDateMonth, 2, '0', STR_PAD_LEFT);

            $expDateYear = urlencode($this->input->post('expDateYear'));
            $cvv2Number = urlencode($this->input->post('cvv2Number'));
			//------------------------
			$user_info = $this->register_model->user_details($user_id);
           // print_r($user_info);exit;
            $membership_package = $this->register_model->getMembershipPackageByid($package_id);
			$renw_pack = array();
			$renw_pack['renew_membership_package_id'] = $package_id;

            $amount = $membership_package['price'];
			$length = $membership_package['duration'];
			$unit1 = $membership_package['duration_type'];
			if($unit1 =='D')
				$unit = 'days';
			else if($unit1 =='M')
				$unit = 'months';	
			else 
			    $unit = 'years';	
            $data = array();
			
            $email = urlencode($user_info['email_address']);
            $lastName = urlencode($user_info['last_name']);

            if ($amount > 0) {
                $paymentConfDetails = '';
                $testMode = $this->config->item('TEST_MODE');
                $loginname = $this->config->item("authorize_login");
                $transactionkey = $this->config->item("authorize_trans_key");
//                 $loginname = '3g6tCNqb2dx';
//               $transactionkey = '83nPNnZ546eh955q';

                /* $testMode			=	'Y';
                  $loginname			=	"6W9Dg27mw";
                  $transactionkey		=	"98gJq434mZG9ErFR"; */

                $path = "/xml/v1/request.api";
                if ($testMode == 'Y') {
                    /* $path = "https://test.authorize.net/gateway/transact.dll"; */
                    $host = "apitest.authorize.net";
                } else {
                    /* $path = "https://secure.authorize.net/gateway/transact.dll"; */
                    $host = "api.authorize.net";
                }
                $this->load->library("authorize");
                $conf = array("loginname" => $loginname,
                    "transactionkey" => $transactionkey,
                    "refId" => "",
                    "name" => "Inhotel Registration",
                    "length" => $length,
                    "unit" => $unit,
                    "startDate" => date("Y-m-d"),
                    "totalOccurrences" => "999",
                    "trialOccurrences" => "00",
                    "amount" => $amount,
                    "trialAmount" => "00",
                    "cardNumber" => $creditCardNumber,
                    "expirationDate" => $expDateYear . "-" . $expDateMonth,
                    "firstName" => $firstName,
                    "lastName" => $lastName
                );//print_r($conf);exit;
                $content = $this->authorize->setSubscribeXmlContent($conf);

                if ($content) {
                    $response = $this->authorize->send_request_via_curl($host, $path, $content);

                    if ($response) { //print_r($response);exit;

                        list ($refId, $resultCode, $code, $text, $transactionId) = $this->authorize->parse_return($response);
//$res = $this->authorize->parse_return($response);
//print_r($res);
                        if ($resultCode == "Ok") {
                            $data['transaction_id'] = $renw_pack['transaction_id'] = $transactionId;
							$data['amount_paid'] = 'Y';
							$data['subscription_status'] = 'Y';
							
							$renw_pack['amount'] = $amount;
							$renw_pack['days'] = $length;
							$renw_pack['user_id'] = $user_id;
                            $renw_pack['tnx_date'] = date('Y-m-d H:i:s');
                            $renw_pack['tnx_text'] = "Tnx Code: " . $code . ", Tnx Text:" . $text;
							$renw_pack['expiry_date'] = date('Y-m-d', strtotime(date('Y-m-d') . "+" . $length . " ".$unit));

							   // print_r($data);                       
                            $membership_package1 = $this->register_model->updateMembershipDetails($data,$user_id);
							$membership_package2 = $this->register_model->updateMembershipRenewDetails($renw_pack,$user_id);
													
                             $this->session->set_userdata('amount_paid', $data['amount_paid']);
							 $this->session->set_userdata('registration_partial','');	
                            //Subscription mail
							$this->load->library('email');  
							$email_from = $this->config->item('email_from');
							$config['mailtype'] = 'html';
							$config['charset'] = 'utf-8';
							$config['crlf'] = PHP_EOL;
							$config['newline'] = PHP_EOL;
							$this->email->initialize($config);
							$email1	  = $this->register_model->get_emailByid(8);
							
							$message = $email1['email_template'];
							$message = str_replace('#USER#',$user_info["first_name"].''.$user_info["last_name"], $message);
							$basePath = base_url();
							$ActLink = $basePath;
							$link = '<a href="' . $ActLink . '">inhotel.com</a>';
							$message = str_replace('#LINK#', $link, $message);			
							//print_r($message);					
							$this->email->from($email_from);
							$this->email->to($user_info["email_address"]);
							$this->email->subject($email1['email_subject']);
							$this->email->message($message);
							$this->email->send();
								
								/*$request  = new AuthorizeNetTD;
								$response = $request->getTransactionDetails($transactionId);
								echo $response->xml->transaction->transactionStatus;*/
								 echo 'success';
                            exit;
                        } else {
                           $text = str_replace('AnetApi/xml/v1/schema/AnetApiSchema.xsd:cardNumber', '', $text);
                            //echo "error: " . $text . "(" . $code . ")";
							 echo "error: " . $text;
                            exit;
                        }
                    } else {
                        echo "error:Transaction Failed. <br>";
                        exit;
                    }
                } else {
                    echo "error:Required fields are missing!";
                    exit;
                }
            } 
			//-----------------------
		}	
			
		$this->load->view('register_payment',$data);		
	}
  public function activate($id)
	 { 	$this->load->model('staff_model');
        $array = array("active" => "Y");
		//$this->session->set_userdata('first','Y');
        $this->staff_model->update_staff($array,$id);
	    $this->session->set_flashdata('success','Congratulations! you have successfully activated your account. Please login');
        redirect(base_url());
		//redirect('login/user_login/'.$first);
	}
     # function for forgot password.
    #This function will reset users password and send the new password to user

    function forgotPassword() {
	$this->load->model('register_model');
			if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		 $email =  $this->input->post("email");;
        $message = $this->register_model->checkEmailExist($email); # checking whether the email address is valid or not
        if ($message == 'N') {
            echo "Invalid";exit;
        } else if ($message == 'Y') {
            $new_password = $this->register_model->randomPassword(); # generate random password
           $user_id = $this->register_model->getUserIDFromEmail($email);
            $this->register_model->updateUserPassword(array('password' => md5($new_password)), $user_id);
            $dtls['new_password'] = $new_password;
            $details = $this->register_model->user_details($user_id);
            $message = '';			
			$email_from = $this->config->item('email_from');
			$this->load->library('email');
            $email_to = $_POST['email'];
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['crlf'] = PHP_EOL;
            $config['newline'] = PHP_EOL;
            $this->email->initialize($config);
            $email = $this->register_model->get_emailByid(2);
            $message = $email['email_template'];
            $message = str_replace('#FULL_NAME#', $details["first_name"] . ' ' . $details["last_name"], $message);
            $message = str_replace('#PASSWORD#', $new_password, $message);
            //print_r($message);exit;
            $this->email->from($this->config->item('email_from'));
            $this->email->to($email_to);
            $this->email->subject($email['email_subject']);
            $this->email->message($message);
            $this->email->send();
			echo "valid";exit;
        }
    }	
			$this->load->view('forget_password',$data);		

	}
	function gettimezone($zip) {
  //  $zip = "N17 7EQ";
	//$lat = 	10.0512804;
	//$lng = 	76.3253704;
    $url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zip)."&sensor=false";
    $result_string = file_get_contents($url);
    $result = json_decode($result_string, true);
	$result1[]=$result['results'][0];
	$result2[]=$result1[0]['geometry'];
	$result3[]=$result2[0]['location'];
  // print_r($result3);exit;
	
	$url1 = "https://maps.googleapis.com/maps/api/timezone/json?location=".$result3[0]['lat'].",".$result3[0]['lng']."&timestamp=0&sensor=true";//	echo $url1;exit;
	//$url = "https://maps.googleapis.com/maps/api/timezone/json?location=10.0512804,76.3253704&timestamp=0&sensor=true";
	$result_string1 = file_get_contents($url1);
    $result4 = json_decode($result_string1, true);
	return $result4['timeZoneId'];
	//print_r($result4);exit;
	

}
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */