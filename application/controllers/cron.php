<?php
//ini_set("display_errors","on");
		//	error_reporting(E_ALL);
class Cron extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('register_model');
    }

    public function membership_expire_notification() {


        $user_details = $this->register_model->get_expiry_users();//7days before
		$user_details1 = $this->register_model->get_expiry_users1();//1 day before
		$user_details2 = $this->register_model->get_expiry_users2();//today
     //  print_r($user_details1);exit;
        if (count($user_details) > 0) {
            $this->load->model('register_model');
            foreach ($user_details as $user_detail) {

				$this->load->library('email');  
				$email_from = $this->config->item('email_from');
				$config['mailtype'] = 'html';
				$config['charset'] = 'utf-8';
				$config['crlf'] = PHP_EOL;
				$config['newline'] = PHP_EOL;
				$this->email->initialize($config);
				$email1	  = $this->register_model->get_emailByid(9);
				
				$message = $email1['email_template'];
                $message = str_replace('#USER#', $user_detail["first_name"] . ' ' . $user_detail["last_name"], $message);
				$message = str_replace('#EXPIRY_DATE#', date('F j, Y', strtotime($user_detail["expiry_date"])), $message);
				$basePath = base_url();
				$ActLink = $basePath;
				$link = '<a href="' . $ActLink . '">inhotel.com</a>';
				$message = str_replace('#LINK#', $link, $message);			
				//print_r($message);exit;					
				$this->email->from($email_from);
				$this->email->to($user_detail["email_address"]);
				$this->email->subject($email1['email_subject']);
				$this->email->message($message);
				$this->email->send();
            }
        }
		        if (count($user_details1) > 0) {
            $this->load->model('register_model');
            foreach ($user_details1 as $user_detail) {

				$this->load->library('email');  
				$email_from = $this->config->item('email_from');
				$config['mailtype'] = 'html';
				$config['charset'] = 'utf-8';
				$config['crlf'] = PHP_EOL;
				$config['newline'] = PHP_EOL;
				$this->email->initialize($config);
				$email1	  = $this->register_model->get_emailByid(9);
				
				$message = $email1['email_template'];
                $message = str_replace('#USER#', $user_detail["first_name"] . ' ' . $user_detail["last_name"], $message);
				$message = str_replace('#EXPIRY_DATE#',"tomorrow", $message);
				$basePath = base_url();
				$ActLink = $basePath;
				$link = '<a href="' . $ActLink . '">inhotel.com</a>';
				$message = str_replace('#LINK#', $link, $message);			
				//print_r($message);exit;					
				$this->email->from($email_from);
				$this->email->to($user_detail["email_address"]);
				$this->email->subject($email1['email_subject']);
				$this->email->message($message);
				$this->email->send();
            }
        }
		        if (count($user_details2) > 0) {
            $this->load->model('register_model');
            foreach ($user_details2 as $user_detail) {

				$this->load->library('email');  
				$email_from = $this->config->item('email_from');
				$config['mailtype'] = 'html';
				$config['charset'] = 'utf-8';
				$config['crlf'] = PHP_EOL;
				$config['newline'] = PHP_EOL;
				$this->email->initialize($config);
				$email1	  = $this->register_model->get_emailByid(9);
				
				$message = $email1['email_template'];
                $message = str_replace('#USER#', $user_detail["first_name"] . ' ' . $user_detail["last_name"], $message);
				$message = str_replace('#EXPIRY_DATE#', "today", $message);
				$basePath = base_url();
				$ActLink = $basePath;
				$link = '<a href="' . $ActLink . '">inhotel.com</a>';
				$message = str_replace('#LINK#', $link, $message);			
				//print_r($message);exit;					
				$this->email->from($email_from);
				$this->email->to($user_detail["email_address"]);
				$this->email->subject($email1['email_subject']);
				$this->email->message($message);
				$this->email->send();
            }
        }
        print('completed');
        exit;
    }

    function subscriptionStatusCheck() {

        $this->load->library("authorize");
        $subscribers = $this->register_model->getAllSubscribers();//print_r($subscribers);exit;
        $testMode = $this->config->item('TEST_MODE');
        $loginname = $this->config->item("authorize_login");
        $transactionkey = $this->config->item("authorize_trans_key");
        $path = "/xml/v1/request.api";
        if ($testMode == 'Y') {
            /* $path = "https://test.authorize.net/gateway/transact.dll"; */
            $host = "apitest.authorize.net";
        } else {
            /* $path = "https://secure.authorize.net/gateway/transact.dll"; */
            $host = "api.authorize.net";
        }

        $conf["loginname"] = $loginname;
        $conf["transactionkey"] = $transactionkey;
        if (!empty($subscribers) && isset($subscribers)) {

            foreach ($subscribers as $sub) {
                $conf["subscriptionId"] = $sub["transaction_id"];
                $xml = $this->authorize->setStatusXmlContent($conf);
                $response = $this->authorize->send_request_via_curl($host, $path, $xml);

                if ($response) {
                    list ($resultCode, $code, $text, $subscriptionId) = $this->authorize->parse_return($response);
                    if ($code != "Ok") {
                        $user_id = $sub["user_id"];
                        $status = 'N'; 
                        $this->register_model->subscription_status_change($user_id, $status);
                    } else {
                        $data = array();
                        $data['transaction_id'] = $sub["transaction_id"];
                        $data['amount'] = $sub['amount'];
                        $data['days'] = $sub['days'];
                        $data['user_id'] = $sub["user_id"];
                        $data['renew_membership_package_id'] = $sub["renew_membership_package_id"];
                        $data['tnx_date'] = date('Y-m-d H:i:s');
                        $data['expiry_date'] = date('Y-m-d', strtotime('+' . $sub['days'] . 'days'));
                        $this->register_model->updateMembershipRenewDetails($data);
                    }
                }
            }
        }
    }

}