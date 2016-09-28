<?php
//ini_set('display_errors', 'on');
//error_reporting(E_ALL);

class hotel_staff extends CI_Controller {

    public function __construct() {     
        parent::__construct();
        $this->load->library('session'); 
		

        $this->load->helper('url');
        $this->load->library('pagination');
        if ((!$this->session->userdata('web_user'))) {
            redirect('login');
        } 
        $this->load->model('staff_model');
    }

    public function index($index_start='0') {
	    if (($this->session->userdata('member_type') !="2")) {
            redirect('dashboard');
        } 
        $config['base_url'] = base_url() . "hotel_staff/ajax_staff_list/";
        $data['total_rows'] = $config['total_rows'] = $this->staff_model->count_staff_list($this->session->userdata('hotel_id'));
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
        $staff_list = $this->staff_model->getAllStaffList($this->session->userdata('hotel_id'),$config['per_page'], $index_start);

        $data['staff_list'] = $staff_list;
        $data['start_index'] = $index_start;
        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
        $data['hotel_list'] = $this->staff_model->getAllHotels();
        $this->load->view('header');
        $this->load->view('staff_list', $data);
          $this->load->view('footer');
    }

    public function ajax_staff_list($index_start = '0') {

        $config['base_url'] = base_url() . "hotel_staff/ajax_staff_list/";
         $data['total_rows'] = $config['total_rows'] = $this->staff_model->count_staff_list($this->session->userdata('hotel_id'));
        $config['per_page'] =$this->config->item('per_page');
        $config['page_query_string'] = FALSE;
		$config['is_ajax_paging'] = TRUE;
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
		//$config['anchor_class'] = 'class="paginate_button"';
        $this->pagination->initialize($config);
        $staff_list = $this->staff_model->getAllStaffList($this->session->userdata('hotel_id'),$config['per_page'], $index_start);

        $data['staff_list'] = $staff_list;
        $data['start_index'] = $index_start;
        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
        $data['hotel_list'] = $this->staff_model->getAllHotels();
        $data['start_index'] = $index_start;
        echo $this->load->view('staff_list_ajax', $data, true);
        exit();
    }

 
    public function checkEmailExist() {
        $res = $this->staff_model->checkEmailExist($_POST['email'],$_POST['user_id']);
        echo $res;
		 exit;
    }
public function checkExistingUser() {
        
        if (($_POST['existing_user']) == 1) {
            return true;
        } else {           
           return true;
        }
    }
 public function add($member_id='0') {
        $data['member_id'] = $member_id;
        $data['member_details'] = $this->staff_model->get_member_details($member_id);
		 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
		if($_POST['user_id'] != "0")
		 $id = $_POST['user_id'];
		   
		 	if($id) {	
							$statt_arry	=	 array(
							 'first_name' => $_POST['first_name'],
							 'last_name' => $_POST['last_name'],
                             'nick_name' => $_POST['nick_name'],
							 'gender' => $_POST['gender'],
                             'dob' => date('Y-m-d H:i:s', strtotime($_POST['dob']))
								 );	
							$this->staff_model->update_staff($statt_arry,$id);
					 	 $this->session->set_flashdata('success', 'Staff details updated successfully');

				        } else {
							$statt_arry	=	 array(
								'email_address' => $_POST['email_address'],
								'password' => md5($_POST['password']),
								'first_name' => $_POST['first_name'],
								'last_name' => $_POST['last_name'],
								'nick_name' => $_POST['nick_name'],
								'member_type' => '3',	
								'gender' => $_POST['gender'],
								'hotel_id'=>$this->session->userdata('hotel_id'),
								'join_date' => date('Y-m-d H:i:s'),
                                'dob' => date('Y-m-d H:i:s', strtotime($_POST['dob'])),
								'active' =>'N',
								'check_login' =>'Y' 						
								);
						    $staff_id	=	$this->staff_model->create_staff($statt_arry);
							$email_from = $this->config->item('email_from');
							$email_to = $_POST['email_address'];
							$this->load->library('email');
							$config['mailtype'] = 'html';
							$config['charset'] = 'utf-8';
							$config['crlf'] = PHP_EOL;
							$config['newline'] = PHP_EOL;
							$this->email->initialize($config);
							$email = $this->staff_model->get_emailByid(6);//print_r($email);exit;
							$message = $email['email_template'];
							$message = str_replace('#FULL_NAME#', $_POST["first_name"] . ' ' . $_POST["last_name"], $message);
							$message = str_replace('#USERNAME#',  $_POST['email_address'], $message);
							$message = str_replace('#PASSWORD#', $this->input->post("password"), $message);
							$basePath = base_url();
							$ActLink = $basePath . "registration/activate/".$staff_id.".html";
							$link = '<a href="' . $ActLink . '">Activate Now</a>';
							$message = str_replace('#LINK#', $link, $message);	
							$this->email->from($this->config->item('email_from'));
							$this->email->to($email_to);
							$this->email->subject($email['email_subject']);
							$this->email->message($message);
							$this->email->send();
							$this->session->set_flashdata('success', 'Staff details added successfully');
                            echo $staff_id;
							
						}		 
		 				 			//redirect('hotel_staff/index');		 
		 
        } else {
            $this->load->view('header');
            $this->load->view('staff_details', $data);
              $this->load->view('footer');
        }
    }
		public function settings()
	{      // echo $this->session->userdata('time_zone');exit;
	           if ($this->uri->segment(3) != '') {
            		 $check_login = $this->uri->segment(3);
					 $mem_type = $this->session->userdata('member_type');
					if($check_login == '1' && $mem_type == '2') {
					    $data['check'] = 1;
						$data['success'] = 'Please Complete your hotel profile details';
						}
					$arr = array('check_login' => 'Y');	
				 $user_id = $this->session->userdata('user_id');	
				 $this->staff_model->update_staff($arr,$user_id); 		
       		 }
	        $hotel_id=  $this->session->userdata('hotel_id');
	        $data['setting_details'] = $this->staff_model->get_hotel_details($hotel_id);
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				
				if($_POST['hotel_id'] != "0")
				 $id = $_POST['hotel_id'];//print_r($_POST);exit;
				   if ($_FILES['image']['name'] <> "") {
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
            $this->staff_model->unlinkImage($id);
            $upload = $this->upload->do_upload('image'); 
            if ($upload) {
                $full_img_data = $this->upload->data();

                $configThumb['source_image'] = $full_img_data['full_path'];
                $configThumb['new_image'] = 'upload/hotel/thumb/' . $image_name . $full_img_data['file_ext'];
                $this->image_lib->initialize($configThumb);
                $this->image_lib->resize();

                $_POST['image1'] =  $image_name . $full_img_data['file_ext'];
            } else {
                $error = array('error' => $this->upload->display_errors());
                return $error;
            }
        } 
		if($_POST['zipcode'] !="") {
		   $time_zone =  $this->gettimezone($_POST['zipcode']);//echo $time_zone;exit;
		   if($time_zone == '')
		     $time_zone = 'Europe/Rome';
		 } //
		
                 if($id) {	
							$statt_arry	=	 array(
							 'title' => $_POST['title'],
							 'short_description' => $_POST['short_description'],
                             'description' => $_POST['description'],
							 'city' => $_POST['city'],
							 'contact_number' => $_POST['contact_number'],
                             'website' => $_POST['website'],
							 'zipcode' => $_POST['zipcode'],
							 'time_zone' => $time_zone,
							 'feedback_email' => $_POST['feedback_email'],
							 'image' => $_POST['image1'],
							 'address' => $_POST['address']
								 );	
						 $id1 =	$this->staff_model->update_hotel_details($statt_arry,$id);
						  $this->session->set_userdata('time_zone', $time_zone);
					 	// $this->session->set_flashdata('success', 'hotel profile details updated successfully');
                           redirect('dashboard/');
						   echo trim('success'); 
				           exit;
						
				        } 
			}			
			//print_r($data['setting_details']);exit;
            $this->load->view('header');
            $this->load->view('settings', $data);
            $this->load->view('footer');
	}
	public function change_password()
	{ 
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{    $user_id = $this->session->userdata('user_id');
		//echo $user_id;exit;
		      // print_r($_POST);exit;
                $u_id = $this->staff_model->change_password($user_id); 
					if($u_id == 'success') {
					     echo trim('success'); 
				           exit;
					   }else if($u_id == 'notexist') { 
					      echo 'pass_fail'; 
				           exit;
					   } else { 
					      echo 'fail'; 
				           exit;
					   }
				$this->session->set_flashdata('message', 'Password  Updated Successfully','sucess');
				 redirect('dashboard/');
		}    
		 $this->load->view('header');
            $this->load->view('change_password', $data);
            $this->load->view('footer');   
	}
	public function hotel_feedbacks($index_start='0')
	{
		$hotel_id = $this->session->userdata('hotel_id');
		//print_r($feedbacks);exit;
		$config['base_url'] = base_url() . "hotel_staff/hotel_feedbacks_ajax/";
        $data['total_rows'] = $config['total_rows'] = $this->staff_model->feedback_count($hotel_id);
        $config['per_page'] = $this->config->item('per_page');
	    //$config['per_page'] = 3;
        $config['page_query_string'] = FALSE;
        $config['uri_segment'] = 3;
        $config['full_tag_open'] = '<ul class="pagination pull-right">'; //
        $config['full_tag_close'] = '</ul>';
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
		$feedbacks = $this->staff_model->feedback_details($hotel_id,$config['per_page'], $index_start);
        $data['start_index'] = $index_start;
        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
		$data['feedbacks']	= $feedbacks;		
		$this-> load-> view('header',$data);
	  	$this-> load-> view('feedback_list',$data);
		$this-> load-> view('footer',$data);
	}
	public function hotel_feedbacks_ajax($index_start='0')
	{
	    $hotel_id = $this->session->userdata('hotel_id');
		$config['base_url'] = base_url() . "hotel_staff/hotel_feedbacks_ajax/";
        $data['total_rows'] = $config['total_rows'] = $this->staff_model->feedback_count($hotel_id);
		$config['per_page'] = 3;
        $config['per_page'] = $this->config->item('per_page');
        //$config['page_query_string'] = FALSE;
		$config['is_ajax_paging'] = TRUE;
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
		//$config['anchor_class'] = 'class="paginate_button"';
        $this->pagination->initialize($config);
        $feedbacks = $this->staff_model->feedback_details($hotel_id,$config['per_page'], $index_start);
        $data['feedbacks'] = $feedbacks;
        $data['start_index'] = $index_start;
        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
        $data['start_index'] = $index_start;
		echo $this->load->view('feedback_list_ajax',$data, true);
        exit();	
	}
	 public function feedback_details($feedback_id='0') {
        $data['feedback_id'] = $feedback_id;
        $data['feedback_details'] = $this->staff_model->get_feedback_details($feedback_id);
		//print_r( $data['feedback_details']);exit;
        $this->load->view('header');
        $this->load->view('feedback_details', $data);
        $this->load->view('footer');
    }
    public function zone_selection()
	{
		$data['hotel_id'] = $hotel_id = $this->session->userdata('hotel_id');
		$data['zone_details'] = $this->staff_model->get_hotel_zone_details($hotel_id);
		$data['zone_list'] = $this->staff_model->zone_list();//print_r($data);exit;
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {   //print_r($_POST);exit;
		     $hotel_zones = explode(',', $_POST['zone_id']);
			 unset($_POST['zone_id'], $_POST['multiselect']);
			 $this->staff_model->editHotelZone($hotel_zones,$hotel_id);
             $this->session->set_flashdata('Hotel Zone Updated Successfully', 'success');
			 redirect('dashboard/');

		}
        $this->load->view('header');
        $this->load->view('zone_selection', $data);
        $this->load->view('footer');
	}
	public function showhotelzonelist()
	{
		$hotel_id = $this->session->userdata('hotel_id');
		$zone_details = $this->staff_model->get_hotel_zone_details($hotel_id);
		$zone_list = $this->staff_model->zone_list();
		$zon_ids = "";
		for ($i = 0; $i < count($zone_details); $i++) {
            $zon_ids = $zon_ids . $zone_details[$i]['zone_id'] . ',';
        } $zon_ids = rtrim($zon_ids, ',');
		
       $res .= '<select id="zones" multiple="multiple" class="form-control" onchange="hotelZones();">';
        for ($j = 0; $j < count($zone_list); $j++) {
            $res .= '<option ';
            for ($k = 0; $k < count($zone_details); $k++) {
                if (($zone_details[$k]['zone_id'] == $zone_list[$j]['id'])) {
                    $res .='selected="selected"';
                }
            }
            $res .= ' value="' . $zone_list[$j]['id'] . '">' . $zone_list[$j]['zone_name'] . '</option>';
        }
        $res .= '</select>';
        $res .= ' <input type="hidden" class="form-control" id="zone_id" name="zone_id" />';
        echo $res . "~" . $zon_ids;
        exit;

	}
	
	public function hotel_zones()
	{
		$hotel_id = $this->session->userdata('hotel_id');
		$data['zone_details'] = $this->staff_model->get_hotel_zone_details($hotel_id);
	    $zone_list = $this->staff_model->zone_list();
		//echo $zone_list[0]['id'];
		for($i=0;$i<count($zone_list);$i++)
		{
		
		         $zone_list[$i]['selected'] =  $this->staff_model->checkzoneidinhotel($hotel_id,$zone_list[$i]['id']);
			  	 
		}
		//print_r($zone_list);exit;
		$data['zone_list'] = $zone_list;
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		     $hotel_zones = explode(',', $_POST['idx']);
			 $this->staff_model->editHotelZone($hotel_zones,$hotel_id);
             $this->session->set_flashdata('Hotel Zone Updated Successfully', 'success');
			 redirect('dashboard/');

		}
		$this-> load-> view('header',$data);
	  	$this-> load-> view('hotel_zones',$data);
		$this-> load-> view('footer',$data);
	}
	
	
	
	public function hotel_orders($index_start='0')
	{
		$hotel_id = $this->session->userdata('hotel_id');
		//print_r($feedbacks);exit;
		$config['base_url'] = base_url() . "hotel_staff/hotel_orders_ajax/";
        $data['total_rows'] = $config['total_rows'] = $this->staff_model->orders_count($hotel_id);
        $config['per_page'] = $this->config->item('per_page');
	   // $config['per_page'] = 3;
        $config['page_query_string'] = FALSE;
        $config['uri_segment'] = 3;
        $config['full_tag_open'] = '<ul class="pagination pull-right">'; //
        $config['full_tag_close'] = '</ul>';
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
		$notifications = $this->staff_model->hotel_orders($hotel_id,$config['per_page'], $index_start);
        $data['start_index'] = $index_start;
        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
		$data['notifications']	= $notifications;		
		$this-> load-> view('header',$data);
	  	$this-> load-> view('order_notifications',$data);
		$this-> load-> view('footer',$data);
	}
	public function hotel_orders_ajax($index_start='0')
	{
	    $hotel_id = $this->session->userdata('hotel_id');
		$config['base_url'] = base_url() . "hotel_staff/hotel_orders_ajax/";
        $data['total_rows'] = $config['total_rows'] = $this->staff_model->orders_count($hotel_id);
		//$config['per_page'] = 3;
        $config['per_page'] = $this->config->item('per_page');
        //$config['page_query_string'] = FALSE;
		$config['is_ajax_paging'] = TRUE;
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
		//$config['anchor_class'] = 'class="paginate_button"';
        $this->pagination->initialize($config);
        $notifications = $this->staff_model->hotel_orders($hotel_id,$config['per_page'], $index_start);
        $data['notifications'] = $notifications;
        $data['start_index'] = $index_start;
        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
        $data['start_index'] = $index_start;
		echo $this->load->view('order_notifications_ajax',$data, true);
        exit();	
	}
	 public function hotel_orders_details($order_id='0') {
        $data['order_id'] = $order_id;
        $data['order_details'] = $this->staff_model->get_orders_details($order_id);
        $this->load->view('header');
        $this->load->view('order_notification_details', $data);
        $this->load->view('footer');
    }
	 public function updateQuickBloxId()
	{
	    $arr1 = array('quickblox_id'=>$_POST['quickblox_id']);
		$this->session->set_userdata('quickblox_id', $_POST['quickblox_id']);
		$res = $this->staff_model->update_staff($arr1,$_POST['user_id']);
        if ($res) {
		     echo "yes";
        } else {
			 echo "no";
        }
	}
	/*function getLnt(){
	$zip = "682024";
$url = "http://maps.googleapis.com/maps/api/geocode/json?address=
".urlencode($zip)."&sensor=false";
$result_string = file_get_contents($url);
$result = json_decode($result_string, true);

$result1[]=$result['results'][0];
$result2[]=$result1[0]['geometry'];
$result3[]=$result2[0]['location'];


			$url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lng&sensor=true";
			// Make the HTTP request
			$data = @file_get_contents($url);
			// Parse the json response
			$jsondata = json_decode($data,true);
print_r($jsondata);exit;
}
*/

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

 function gettimezone1() {
  // $zip = "08550";
	//$lat = 	10.0512804;
	//$lng = 	76.3253704;
    $url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zip)."&sensor=false";
    $result_string = file_get_contents($url);
    $result = json_decode($result_string, true);
	$result1[]=$result['results'][0];
	$result2[]=$result1[0]['geometry'];
	$result3[]=$result2[0]['location'];
 // print_r($result);exit;
	
	$url1 = "https://maps.googleapis.com/maps/api/timezone/json?location=".$result3[0]['lat'].",".$result3[0]['lng']."&timestamp=0&sensor=true";//	echo $url1;exit;
	//$url = "https://maps.googleapis.com/maps/api/timezone/json?location=10.0512804,76.3253704&timestamp=0&sensor=true";
	$result_string1 = file_get_contents($url1);
    $result4 = json_decode($result_string1, true);
	return $result4['timeZoneId'];
	//print_r($result4);exit;
	

}

	
}
?>

