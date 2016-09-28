<?php

//error_reporting(0);

//ini_set('display_errors', 'on');error_reporting(E_ALL);

class member extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('admin/signup_model');
        if ((!$this->session->userdata('adminuser')) && (!$this->session->userdata('isAdmin'))) {
            redirect('admin/login/');
        }
        $this->load->model('admin/member_model');
    }

    public function index($member_type = '') {
        $this->load->library('pagination');
        $this->load->helper('url');
        $params = '?t=1';
        if ($_REQUEST['limit'])
            $params .= '&limit=' . $_REQUEST['limit'];
        if ($_REQUEST['key'])
            $params .= '&key=' . $_REQUEST['key'];
        $this->load->library('pagination');
        $config['base_url'] = site_url("admin/member/index") . "/" . $member_type . '/' . $params;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_REQUEST['per_page'] = 0;
        }
        $cond = "";
        $_REQUEST['key'] = (!$_POST['key'] ? ($_GET['key'] ? $_GET['key'] : '') : $_POST['key']);

        $data['type'] = $type;
        $data['message'] = $this->session->flashdata('message');
        $config['uri_segment'] = 4;
        $config['base_url'] = site_url("admin/member/index") . "/" . $member_type . "/" . $params;
        $config['total_rows'] = $this->member_model->countUsers($member_type);
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
        $member_list = $this->member_model->getAllUSers($config['per_page'], $_REQUEST['per_page'], $member_type);
        $data['member_type'] = $member_type;
        $data['member_list'] = $member_list;
        $data['hotel_list'] = $this->member_model->getAllHotels();
        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
        $this->load->view('admin/header');
        $this->load->view('admin/member_list', $data);
    }

    function changeMemberStatus() {
        $user_id = $_POST['user_id'];
        $status = $_POST['new_status'];
        $arr = array("active" => $status);
        $this->member_model->update_member($arr, $user_id);
        $this->session->set_flashdata('success', 'Member status updated successfully');
        echo "Y";
        exit;
    }

    function deleteMember() {
        $user_id = $_POST['user_id'];
        $this->member_model->update_member(array('deleted' => "Y"), $user_id);
        $this->session->set_flashdata('success', 'Member deleted successfully');
        echo "Y";
        exit;
    }

    public function detail($member_type = '', $user_id = '',$hotel_id="") {
        if ($user_id != '') {
            $data['id'] = $user_id;
            $member_details = $data['member_details'] = $this->member_model->getMemberDetails($user_id,$hotel_id);
        } 
		//if($hotel_id != "") 
		   $data['packages'] = $this->signup_model->getPackages();
        $data['member_type'] = $member_type;
        $this->load->library('form_validation');
      

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('email_address', 'Email', 'required|valid_email|xss_clean');
            if ($this->form_validation->run() == TRUE) {

                $user_id = $this->input->post('user_id');
                $arr = array(
                    'email_address' => $_POST['email_address'],
                    'password' => md5($_POST['password']),
                    'first_name' => $_POST['first_name'],
                    'last_name' => $_POST['last_name'],
                    'nick_name' => $_POST['nick_name'],
                    'member_type' => $_POST['member_type'],
                    
                );
                if($member_type!=2){
                    $arr['gender'] = $_POST['gender'];
                    $arr['dob'] = date('Y-m-d H:i:s', strtotime($_POST['dob']));
                }
              $arr['hotel_id'] =  ($member_type == 3) ? $_POST['hotel_id'] :0;
			  if($_POST['package_id'])
					$arr['package_id'] = $_POST['package_id'];
                if ($user_id != "" && $user_id != "0") {   

                    $this->member_model->validate_email($_POST['email_address'], $user_id);
                    $user_id = $this->member_model->update_member($arr, $user_id);
                    $hotel_id =$_POST['hotel_id'];

                    if ($member_type == 2) { //hotel owner
                                $hotel_arr = array(
                        'user_id'=>$user_id,
                        'title' => $_POST['title'],
                        'website' => $_POST['website'],
                        'city' => $_POST['city'],
                        'address' => $_POST['address'],
                        'contact_number' => $_POST['contact_no'],
                        'short_description' => trim($_POST['short_description']),
                        'description' => trim($_POST['description']),
                       
                    );
                    
						
                        $hotel_id = $this->member_model->update_hotel_owner($hotel_arr, $hotel_id);
						
                       
                        $message = $this->upload_image($hotel_id);
                       // print_r($message);exit;
                        if (!empty($message)) {
                            $this->session->set_flashdata('error', $message['error']);
                            redirect('admin/member/detail/' . $user_id);
                            exit;
                        } else {
                            //redirect('admin/drinks');
                        }
                    }
                    $this->session->set_flashdata('success', 'Member details updated successfully');
                } else {
                    $arr['join_date'] = date('Y-m-d H:i:s');
                    if($arr[member_type] =='2')
			$arr['amount_paid'] = 'Y';
                    $this->member_model->validate_email($_POST['email_address']);
                    $user_id = $this->member_model->update_member($arr);
					if($arr[member_type] =='1' && $user_id)
					{
						//---------------mail----------------------
						$this->load->library('email');  
						$email_from = $this->config->item('email_from');
						$email_to = $_POST['email'];
						$config['mailtype'] = 'html';
						$config['charset'] = 'utf-8';
						$config['crlf'] = PHP_EOL;
						$config['newline'] = PHP_EOL;
						$this->email->initialize($config);
						$email = $this->member_model->get_emailByid(1);
						$message = $email['email_template'];
						$message = str_replace('#FULL_NAME#', $_POST["first_name"] . ' ' . $_POST["last_name"], $message);
						$message = str_replace('#USERNAME#',$this->input->post("email"), $message);			
						$message = str_replace('#PASSWORD#', $this->input->post("password"), $message);
						$this->email->from($this->config->item('email_from'));
						$this->email->to($email_to);
						$this->email->subject($email['email_subject']);
						$this->email->message($message);
						$this->email->send();
						//-----------------------------------------
					}
					if($arr[member_type] =='3' && $user_id)
					{
						$email_from = $this->config->item('email_from');
						$email_to = $_POST['email_address'];
						$this->load->library('email');
						$config['mailtype'] = 'html';
						$config['charset'] = 'utf-8';
						$config['crlf'] = PHP_EOL;
						$config['newline'] = PHP_EOL;
						$this->email->initialize($config);
						$email = $this->member_model->get_emailByid(4);//print_r($email);exit;
						$message = $email['email_template'];
						$message = str_replace('#FULL_NAME#', $_POST["first_name"] . ' ' . $_POST["last_name"], $message);
						$message = str_replace('#USERNAME#',  $_POST['email_address'], $message);
						$message = str_replace('#PASSWORD#', $this->input->post("password"), $message);
						$basePath = base_url();
						$ActLink = $basePath . "login/";
						$link = '<a href="' . $ActLink . '">Login Now</a>';
						$message = str_replace('#LINK#', $link, $message);	
						$this->email->from($this->config->item('email_from'));
						$this->email->to($email_to);
						$this->email->subject($email['email_subject']);
						$this->email->message($message);
						$this->email->send();
						$this->session->set_flashdata('success', 'Staff details added successfully');
					}
                    if ($member_type == 2) { //hotel owner
                                $hotel_arr = array(
                        'user_id'=>$user_id,
                        'title' => $_POST['title'],
                        'website' => $_POST['website'],
                        'city' => $_POST['city'],
                        'address' => $_POST['address'],
                        'contact_number' => $_POST['contact_no'],
                        'short_description' => $_POST['short_description'],
                        'description' => $_POST['description'],
                        'date_time' =>date('Y-m-d H:i:s')
                    );
					    
                        $hotel_id = $this->member_model->update_hotel_owner($hotel_arr, $hotel_id);
                        $this->member_model->save_zone($hotel_id);
						//------------------------------mail for hotel-----------------------
						   $email_from = $this->config->item('email_from');
							$email_to = $_POST['email_address'];
							$this->load->library('email');
							$config['mailtype'] = 'html';
							$config['charset'] = 'utf-8';
							$config['crlf'] = PHP_EOL;
							$config['newline'] = PHP_EOL;
							$this->email->initialize($config);
							$email = $this->member_model->get_emailByid(5);//print_r($email);exit;
							$message1 = $email['email_template'];
							$message1 = str_replace('#FULL_NAME#', $_POST["first_name"] . ' ' . $_POST["last_name"], $message1);
							$message1 = str_replace('#USERNAME#',  $_POST['email_address'], $message1);
							$message1 = str_replace('#PASSWORD#', $this->input->post("password"), $message1);
							$basePath = base_url();
							$ActLink = $basePath . "login/";
							$link = '<a href="' . $ActLink . '">Login Now</a>';
							$message1 = str_replace('#LINK#', $link, $message1);	
							//print_r($message1);exit;
							$this->email->from($this->config->item('email_from'));
							$this->email->to($email_to);
							$this->email->subject($email['email_subject']);
							$this->email->message($message1);
							$this->email->send();
						//-----------------------------------------------------------
                        $message = $this->upload_image($hotel_id);
						

                        if (!empty($message)) {
                            $this->session->set_flashdata('error', $message['error']);
                            redirect('admin/member/detail/' . $user_id);
                            exit;
                        } else {
                            //redirect('admin/drinks');
                        }
                    }
                    $this->session->set_flashdata('success', 'Member details added successfully');
                }

                redirect('admin/member/index/' . $member_type);
            } else {
                
            }
        }

        $this->load->view('admin/header');
        if ($member_type == 1) {
            $this->load->view('admin/member_detail', $data);
        } else if ($member_type == 2) {
            $this->load->view('admin/hotel_detail', $data);
        } else if ($member_type == 3) {
             $data['hotel_list'] = $this->member_model->getAllHotels();
            $this->load->view('admin/staff_detail', $data);
        }
    }

    public function upload_image($hotel_id) { 
        if ($_FILES['image_url']['name'] <> "") {
            $image_name = strtotime(date("Y-m-d H:i:s"));
            $config = array();
            $config['upload_path'] = 'upload/hotel/'; /* NB! create this dir! */
            $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
            $config['file_name'] = $image_name;
            $config['max_size'] = '1024*1024*2';
            $config['width'] = 165;
            $config['height'] = 165;
            $this->load->library('upload');

            $configThumb = array();
            $configThumb['image_library'] = 'gd2';
            //   $configThumb['create_thumb'] = TRUE;
            $configThumb['maintain_ratio'] = TRUE;
            $configThumb['master_dim'] = 'width';
            $configThumb['width'] = 165;
            $configThumb['height'] = 165;
            $this->load->library('image_lib');
            $this->upload->initialize($config);
            $this->member_model->unlinkImage($hotel_id);
            $upload = $this->upload->do_upload('image_url'); 
            if ($upload) {
                $full_img_data = $this->upload->data();

                $configThumb['source_image'] = $full_img_data['full_path'];
                $configThumb['new_image'] = 'upload/hotel/thumb/' . $image_name . $full_img_data['file_ext'];
                $this->image_lib->initialize($configThumb);
                $this->image_lib->resize();

                $img_arr = array('image' => $image_name . $full_img_data['file_ext']);
                $this->member_model->update_hotel_owner($img_arr, $hotel_id);
            } else {
                $error = array('error' => $this->upload->display_errors());
                return $error;
            }
        }
    }

}

?>