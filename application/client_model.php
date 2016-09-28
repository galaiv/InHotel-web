<?php

class Client_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    #Function to validate login

    function login($arr) {
        $username = $arr['username'];
        $password = md5($arr['password']);
        $device_token = $arr['device_token'];
        $member_type = $arr['member_type'];

        $query = $this->db->get_where('in_member_master imm ', array('imm.email_address' => $username, 'imm.password' => $password, 'imm.member_type ' => $member_type, 'deleted' => 'N'));
//   echo $this->db->last_query();exit;
        $result = $query->row_array();
        if ($result) {
            if ($result['active'] == 'Y') {
                $arr = array('device_token' => '');
                $this->db->update('in_member_master', $arr, array('device_token' => $device_token));

                $arr1 = array('last_login' => date("Y-m-d H:i:s"), 'device_token' => $device_token);
                $this->db->where('user_id', $result['user_id']);
                $rs = $this->db->update('in_member_master', $arr1);

                $details['message'] = "Success";
                $details['status'] = "true";
                $details['details'] = $result;
            } else {
                if ($result['active'] == 'N') {
                    $details['status'] = "false";
                    $details['message'] = "This account has been deactivated by the admin";
                }
            }
            return $details;
        } else {
            $details['message'] = "Invalid Login Details";
            $details['status'] = "false";
            return $details;
        }
    }

    public function checkActivationCodeExpires($activation_code, $user_id) {

        $date = date("Y-m-d H:i:s");
        $this->db->select('*')
                ->from('activation_code_master acm')
                ->where('activation_code="' . $activation_code . '" and acm.active="Y" and "' . $date . '" between access_start_time and access_close_time', false, false);
        $qry = $this->db->get();
        return $qry->row_array();
    }

    public function checkActivationCodeExists($activation_code, $user_id) {
        $date = date("Y-m-d H:i:s");
        $this->db->select('id')
                ->from('activation_code_master acm')
                ->where('activation_code="' . $activation_code . '" and acm.active="Y" and acm.user_id=' . $user_id . ' and acm.access_start_time<"' . $date . '"', false, false);
        $qry = $this->db->get();
        $res = $qry->row_array();
        if (empty($res)) {
            return false;
        } else {
            return true;
        }
    }

    /*  public function checkActivationCodeExpires($activation_code) {
      $date =date("Y-m-d H:i:s");
      $this->db->select('*')
      ->from('activation_code_master')
      ->where('activation_code="' . $activation_code . '" and active="Y" and "'.$date.'" between access_start_time and access_close_time', false, false);
      $qry = $this->db->get();
      return $qry->row_array();

      } */

    public function GetAllGuestUsers($arr) {
        $start_limit = $arr['page'] * 10;
        $this->db->select('acm.hotel_id')
                ->from('activation_code_master acm')
                ->where('acm.activation_code', $arr['activation_code']);

        $qry = $this->db->get();
        $row = $qry->row_array();
        $hotel_id = $row['hotel_id'];
        $user_id = $arr['user_id'];

        $this->db->select('group_concat(mbl.blocked_profile_id SEPARATOR ",") as blocked_profile_ids', false)
                ->from('member_blocked_list mbl')
                ->where('mbl.user_id', $user_id);
        $qry = $this->db->get();
        $res_arr1 = $qry->row_array();

        $this->db->select('group_concat(mbl.user_id SEPARATOR ",") as user_ids', false)
                ->from('member_blocked_list mbl')
                ->where('mbl.blocked_profile_id', $user_id);
        $qry = $this->db->get();
        $res_arr2 = $qry->row_array();


        $date = date("Y-m-d H:i:s");
        $this->db->select('imm.user_id,imm.first_name,imm.status,imm.image,am.room,imm.activation_id,imm.quickblox_id')
                ->from('activation_code_master acm')
                ->join('in_member_master imm', 'acm.user_id=imm.user_id')
                ->join('access_master am', 'am.id=acm.access_id')
                ->where('(acm.hotel_id = ' . $hotel_id . ' AND imm.member_type = 1  AND acm.user_id <> ' . $arr['user_id'] . ' )');
        if (!empty($res_arr1['blocked_profile_ids'])) {
            $this->db->where(' acm.user_id not in (' . $res_arr1['blocked_profile_ids'] . ')', false, false);
        }
        if (!empty($res_arr2['user_ids'])) {
            $this->db->where(' acm.user_id not in (' . $res_arr2['user_ids'] . ')', false, false);
        }
        $this->db->where('"' . $date . '" between acm.access_start_time and acm.access_close_time', false, false)
                ->group_by('acm.user_id')
               ->limit(10, $start_limit);
        $qry = $this->db->get();
        return $result = $qry->result_array();
    }
	public function getAllChatUsers($arr)
	{
		$this->db->select('acm.hotel_id')
                ->from('activation_code_master acm')
                ->where('acm.activation_code', $arr['activation_code']);

        $qry = $this->db->get();
        $row = $qry->row_array();
        $hotel_id = $row['hotel_id'];
        $user_id = $arr['user_id'];

        $this->db->select('group_concat(mbl.blocked_profile_id SEPARATOR ",") as blocked_profile_ids', false)
                ->from('member_blocked_list mbl')
                ->where('mbl.user_id', $user_id);
        $qry = $this->db->get();
        $res_arr1 = $qry->row_array();

        $this->db->select('group_concat(mbl.user_id SEPARATOR ",") as user_ids', false)
                ->from('member_blocked_list mbl')
                ->where('mbl.blocked_profile_id', $user_id);
        $qry = $this->db->get();
        $res_arr2 = $qry->row_array();


        $date = date("Y-m-d H:i:s");
        $this->db->select('imm.user_id,imm.first_name,imm.status,imm.image,am.room,imm.activation_id,imm.quickblox_id,imm.member_type')
                ->from('activation_code_master acm')
                ->join('in_member_master imm', 'acm.user_id=imm.user_id')
                ->join('access_master am', 'am.id=acm.access_id')
                ->where('(acm.hotel_id = ' . $hotel_id . ' AND imm.member_type = 1 AND  imm.quickblox_id <> ""  AND acm.user_id <> ' . $arr['user_id'] . ')');
        if (!empty($res_arr1['blocked_profile_ids'])) {
            $this->db->where(' acm.user_id not in (' . $res_arr1['blocked_profile_ids'] . ')', false, false);
        }
        if (!empty($res_arr2['user_ids'])) {
            $this->db->where(' acm.user_id not in (' . $res_arr2['user_ids'] . ')', false, false);
        }
        $this->db->where('"' . $date . '" between acm.access_start_time and acm.access_close_time', false, false)
                ->group_by('acm.user_id');
        $qry = $this->db->get();
        return $result = $qry->result_array();
	}
	public function getAllChatStaffs($arr)
	{
		$this->db->select('acm.hotel_id')
                ->from('activation_code_master acm')
                ->where('acm.activation_code', $arr['activation_code']);

        $qry = $this->db->get();
        $row = $qry->row_array();
        $hotel_id = $row['hotel_id'];
        $user_id = $arr['user_id'];
	    $this->db->select('mm.user_id,mm.first_name,mm.status,mm.image,mm.activation_id,mm.quickblox_id,mm.member_type')
                ->from('in_member_master mm')
			   ->where('(mm.hotel_id = ' . $hotel_id . ' AND mm.deleted = "N" AND  mm.quickblox_id <> ""  AND mm.user_id <> ' . $arr['user_id'] . ')');
        $qry = $this->db->get();
        $records = $qry->result_array();
		//echo $this->db->last_query();
        return $records;
	
	}
	public function GetAllBlockedUsers($arr)
	{
		  $start_limit = $arr['page'] * 10;
		  $this->db->select('imm.user_id,imm.first_name,imm.image,imm.status')
                ->from('member_blocked_list mbl')
                ->join('in_member_master imm', 'mbl.blocked_profile_id=imm.user_id')
                ->where('(mbl.user_id = ' . $arr['user_id'] . ')');
		 $this->db->limit(10, $start_limit);
         $qry = $this->db->get();
         return $result = $qry->result_array();		
	}
	public function checkActCodehavRoom($activation_code)
	{
	     $date = date("Y-m-d H:i:s");
		 $this->db->select('am.room')
                ->from('activation_code_master acm')
                ->join('access_master am', 'am.id=acm.access_id')
                ->where('acm.activation_code="' . $activation_code . '" and acm.active="Y" and "' . $date . '" between access_start_time and access_close_time', false, false);
        $qry = $this->db->get();
        return $row = $qry->row_array();					
	}
	public function getroomstatusbyactId($id)
	{
		 $date = date("Y-m-d H:i:s");
		 $this->db->select('am.room')
                ->from('activation_code_master acm')
                ->join('access_master am', 'am.id=acm.access_id')
                ->where('acm.id="' . $id . '" and acm.active="Y" and "' . $date . '" between access_start_time and access_close_time', false, false);
        $qry = $this->db->get();
        $row = $qry->row_array();	
		if($row['room'] !="")
		   return "Y";
		else 
		   return "N";   	
	}
        //ANU
public function getRoomStatusByActivationId($id)
	{
		 $date = date("Y-m-d H:i:s");
		 $this->db->select('am.room')
                ->from('activation_code_master acm')
                ->join('access_master am', 'am.id=acm.access_id')
                ->where('acm.id="' . $id . '" and acm.active="Y" and "' . $date . '" between access_start_time and access_close_time', false, false);
        $qry = $this->db->get();
        $row = $qry->row_array();	
        return $row['room'];
			
	}
    //Registration for Representatives
    public function add_user($arr) {
        if ($arr['user_id'] == '') {
            $arr['password'] = md5($arr['password']);
            $this->db->insert('in_member_master', $arr);
            $id = $this->db->insert_id();
        } else {
		   	$date = date("Y-m-d H:i:s");
            $arr1 = array(
                //'image' => $arr['image1'],
                'first_name' => $arr['first_name'],
                'last_name' => $arr['last_name'],
                'status' => $arr['status'],
                'profile_description' => $arr['desc']
            );
            if ($arr['image1'] != '')
                $arr1['image'] = $arr['image1'];

            $this->db->update('in_member_master', $arr1, array('user_id' => $arr['user_id'], 'member_type' => $arr['member_type']));
        if($arr['activation_code'] !="") {
            $this->db->select('acm.access_id')
                    ->from('activation_code_master acm')
                    ->where('acm.activation_code', $arr['activation_code']);

            $qry = $this->db->get();
            $row = $qry->row_array(); //echo $this->db->last_query();	exit;
            $access_id = $row['access_id'];
            //echo $access_id;exit;

            $this->db->query("delete from map_access_vecancy where access_id = '$access_id' ");
            $tagArray = explode(",", $arr['vacancy_list']);
            if ($tagArray[0] != "") {
                $vacancy_lists = $arr['vacancy_list'];
                $vacancy_list = explode(",", $vacancy_lists);
                foreach ($vacancy_list as $vacancy_list) {
                    $data = array(
                        'access_id' => $access_id,
                        'vecancy_id' => $vacancy_list,
                        'date_time' => date("Y-m-d H:i:s")
                    );

                    $this->db->insert('map_access_vecancy', $data);
                }
            }
		} else {

		  $user_id = $arr['user_id'];
		  $this->db->select('acm.access_id,acm.activation_code');
          $this->db->from('in_member_master mm')
                ->join('activation_code_master acm', 'acm.user_id=mm.user_id', 'left')
                ->join('access_master am', 'am.id = acm.access_id', 'left')
                ->join('access_members ams', 'ams.id=am.access_member_id', 'left');
         $this->db->where("mm.user_id = '$user_id'  and '$date' between acm.access_start_time and acm.access_close_time ");
		 $this->db->order_by("acm.id", "DESC");
		 $qry = $this->db->get();
         $row = $qry->result_array();//echo $this->db->last_query();	exit;
       // return $row;
	     for($i=0;$i<count($row);$i++)
		 { 
		    $access_id1 = $row[$i]['access_id'];
		 	$this->db->select('mav.*');
			$this->db->where("mav.access_id = '$access_id1'");
			$this->db->from('map_access_vecancy mav');
			$qry = $this->db->get();
			$row1 = $qry->result_array();
			if(count($row1)>0) {
			  $access_row = $row1;
			  break;	}//echo "hi";exit;
		
		 } //print_r($access_row);exit;
		 if($access_row[0]['access_id'])
		 	$access_id = $access_row[0]['access_id'];
	     else if($row[0]['access_id'])
		 	$access_id = $row[0]['access_id'];
		if($access_id != "")	{
		 $this->db->query("delete from map_access_vecancy where access_id = '$access_id' ");
		 $tagArray = explode(",", $arr['vacancy_list']);
			 if ($tagArray[0] != "") {
				$vacancy_lists = $arr['vacancy_list'];
				$vacancy_list = explode(",", $vacancy_lists);
				foreach ($vacancy_list as $vacancy_list) {
					$data = array(
						'access_id' => $access_id,
						'vecancy_id' => $vacancy_list,
						'date_time' => date("Y-m-d H:i:s")
					);
	
					$this->db->insert('map_access_vecancy', $data);
				}
			}
	       }
		}

            $id = $arr['user_id'];
        }

        return $id;
    }
 public function check_access_member_exist($email_address,$user_id) {
 
        $this->db->select('am.id')
                ->from('access_members am')
                ->where('am.email', $email_address);

        $qry = $this->db->get();
        $row = $qry->row_array(); // echo $this->db->last_query();	exit;
        $access_member_id = $row['id'];
		if($access_member_id !="") {
		   $arr = array( 'user_id' => $user_id );
			 $this->db->where('id', $access_member_id)
                ->update('access_members', $arr);
				
		   $this->db->select('am.id')
                ->from('access_master am')
                ->where('am.access_member_id',$access_member_id);
		   $qry = $this->db->get();
           $row1 = $qry->result_array(); 
		   for($i=0;$i<count($row1);$i++)
		   {
		     $access_id = $row1[$i]['id'];
			 $arr1 = array( 'user_id' => $user_id );
			 $this->db->where('access_id', $access_id)
			     ->update('activation_code_master', $arr1);		   	
		   }
		}
 
 }
    public function updateUserDetails($arr, $user_id) {
        $this->db->where('user_id', $user_id)
                ->update('in_member_master', $arr);
        return true;
    }

    public function shareExperiance($arr) {

        $this->db->select('acm.hotel_id')
                ->from('activation_code_master acm')
                ->where('acm.activation_code', $arr['activation_code']);

        $qry = $this->db->get();
        $row = $qry->row_array(); // echo $this->db->last_query();	exit;
        $hotel_id = $row['hotel_id'];

        $arr1 = array(
            'hotel_id' => $hotel_id,
            'experiance' => $arr['experiance'],
            'user_id' => $arr['user_id'],
            'date_time' => date("Y-m-d H:i:s")
        );
        $this->db->insert('hotel_experience', $arr1);
        return $id = $this->db->insert_id();
    }

    // Get Email ID
    function get_emailByid($id) {
        $this->db->where('email_id', $id);
        $result = $this->db->get('email_config');
        return $result->row_array();
    }

    //function to get password
    function forgetpassword($arr) {
        $sql = "SELECT * FROM in_member_master WHERE email_address='" . $arr['email'] . "' OR username='" . $arr['email'] . "'";
        $query = $this->db->query($sql);
        $res = $query->row_array();
        //print_r($res);exit;
        if ($res) {

            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';

            $this->load->library('email');
            $this->email->initialize($config);
            $email_to = $res['email'];
            $email = $this->get_emailByid(2);
            $message = $email['email_template'];
            $message = str_replace('#FULL_NAME#', $res['first_name'] . ' ' . $res['last_name'], $message);
            $message = str_replace('#USERNAME#', $res['username'], $message);
            $message = str_replace('#PASSWORD#', $res['password'], $message);
            //print_r($message);exit;
            $this->email->from($this->config->item('email_from'));
            $this->email->to($email_to);
            $this->email->subject($email['email_subject']);
            $this->email->message($message);
            $this->email->send();
            //echo $email_id;
            return true;
        }
        return false;
    }

    // email check for user registration
    function emailCheck($email) {
        $query = $this->db->get_where('in_member_master', array('email_address' => $email, 'deleted' => 'N'));
        $rs = $query->row_array();

        if ($rs['user_id'] != '') {
            return "Y";
        } else {
            return "N";
        }
    }

    function getUserIDFromEmail($email) {
        $query = $this->db->get_where('in_member_master', array('email_address' => $email, 'deleted' => 'N'));
        $rs = $query->row_array();
        return $rs['user_id'];
    }

    public function updateUserPassword($arr, $user_id) {
        $this->db->where('user_id', $user_id)
                ->update('in_member_master', $arr);
    }

    public function getUserDetails($user_id) {
        $this->db->select('*')
                ->from('in_member_master')
                ->where('user_id', $user_id);

        $query = $this->db->get();
        return $rs = $query->row_array();
    }

    #function to generate random Password

    function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";

        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    // username check for user registration
    function userCheck($username) {

        $query = $this->db->get_where('in_member_master', array('email' => $username, 'deleted' => 'N'));
        $rs = $query->row_array();
        //echo $this->db->last_query();	exit;

        if ($rs['user_id'] != '') {
            return "Y";
        } else {
            return "N";
        }
    }

    //function to get all rooms
    function get_AllRooms($hospital_id) {
        $this->db->where('hospital_id', $hospital_id);
        $this->db->order_by("id", "ASC");
        $result = $this->db->get('hospital_rooms');
        return $result->result_array();
    }

    //function to get user details
    public function get_user_details($user_id, $activation_code = '') {
        /*    $this->db->select('mm.*,am.access_member_id,am.access_member_id,acm.access_start_time as access_start_date_time,
          acm.access_close_time as access_end_date_time,am.room');

          $this->db->where('mm.user_id', $user_id)
          ->join('activation_code_master acm', 'acm.user_id = mm.user_id', 'left')
          ->join('access_members ams', 'ams.email=mm.email_address', 'left')
          ->join('access_master am', 'am.access_member_id = ams.id', 'left')
          ->from('in_member_master mm'); */
        $this->db->select('mm.*,am.access_member_id,am.access_member_id,acm.access_start_time as access_start_date_time,
            acm.access_close_time as access_end_date_time,am.room');
        $this->db->from('in_member_master mm')
                ->join('activation_code_master acm', 'acm.user_id=mm.user_id', 'left')
                ->join('access_master am', 'am.id = acm.access_id', 'left')
                ->join('access_members ams', 'ams.id=am.access_member_id', 'left');
        $this->db->where('mm.user_id', $user_id);

        if ($activation_code != (null) &&$activation_code != ""  &&$activation_code != "(null)" ) {
            $this->db->where('acm.activation_code', $activation_code);
        }
        $qry = $this->db->get();
        $row = $qry->row_array(); //echo $this->db->last_query();	exit;
        return $row;
    }

    function user_vacancy_list($activation_code='',$user_id ='') {
		   	 $date = date("Y-m-d H:i:s");

       if($activation_code !="") {
			$this->db->select('acm.access_id')
					->from('activation_code_master acm')
					->where('acm.activation_code', $activation_code);
	
			$qry = $this->db->get();
			$row = $qry->row_array(); // echo $this->db->last_query();	exit;
			$access_id = $row['access_id'];
	
			$this->db->where('mav.access_id', $access_id);
			$this->db->join('vecancy_reason_list vrl', 'mav.vecancy_id = vrl.id', 'left');
			$this->db->order_by("mav.id", "ASC");
			$result = $this->db->get('map_access_vecancy mav');
			return $result->result_array(); 
		} else {
		
		  $this->db->select('acm.access_id,acm.activation_code');
          $this->db->from('in_member_master mm')
                ->join('activation_code_master acm', 'acm.user_id=mm.user_id', 'left')
                ->join('access_master am', 'am.id = acm.access_id', 'left')
                ->join('access_members ams', 'ams.id=am.access_member_id', 'left');
         $this->db->where("mm.user_id = '$user_id'  and '$date' between acm.access_start_time and acm.access_close_time ");
		 $this->db->order_by("acm.id", "DESC");
		 $qry = $this->db->get();
         $row = $qry->result_array(); //echo $this->db->last_query();	exit;
       // return $row;

	     for($i=0;$i<count($row);$i++)
		 {
		    $access_id = $row[$i]['access_id'];
		 	$this->db->select('mav.*');
			$this->db->where("mav.access_id = '$access_id'");
			$this->db->from('map_access_vecancy mav');
			$qry = $this->db->get();
			$row1 = $qry->result_array();
			if(count($row1)>0) {
			  return $row1;
			  exit;	}		
		 }
			
		}
    }
   // function to chk blocked users
	function checkblockeduser($user_id,$other_id)
	{ //echo $other_id;exit;
	    $this->db->select('mbl.*');
        $this->db->where("((mbl.user_id= '$user_id'  AND  mbl.blocked_profile_id= '$other_id') OR (mbl.user_id= '$other_id'  AND  mbl.blocked_profile_id= '$user_id' ))");
        $this->db->from('member_blocked_list mbl');
        $qry = $this->db->get();
        $row = $qry->row_array();
	    if($row['id'] !="")
		   return "Y";
		else
		   return "N";   
	}
    //function to get hospital details
    function get_hotel_details($activation_code) {
        $this->db->select('hp.*,imm.email_address');
        $this->db->join('activation_code_master acm', 'acm.hotel_id=hp.id');
        $this->db->join('in_member_master imm', 'hp.user_id=imm.user_id', 'left');
        $this->db->where('acm.activation_code', $activation_code);
        $this->db->from('hotel_profile hp');
        $qry = $this->db->get();
        $row = $qry->row_array(); //echo $this->db->last_query();	exit;
        return $row;
    }

    //function to change password	
    function change_password($arr) {
        $new = mysql_escape_string(md5($arr['password']));
        $query = $this->db->get_where('in_member_master', array('user_id' => $arr['user_id']));
        $result = $query->row_array();
        $user_id = $result['user_id']; //echo $this->db->last_query();	exit;
        if ($user_id == "") {
            return "notexist";
        }
        if ($user_id == $arr['user_id']) {
            $this->db->where('user_id', $arr['user_id']);
            $this->db->update('in_member_master', array('password' => $new));
            return "success";
        } else {
            return "fail";
        }
    }

    public function vacancy_reason_list() {
        $this->db->select('*')
                ->from('vecancy_reason_list')
                ->where('active', 'Y');
        $qry = $this->db->get();
        return $qry->result_array();
    }

    // unlink the user image
    function unlinkImage($id) {
        $query = $this->db->get_where('in_member_master', array('user_id' => $id));
        $rs = $query->row_array();
        if ($rs) {
            $image_path = 'upload/member/' . $rs['image'];
            $imgs = explode(".", $rs['image']);
            $image_path_thumb = 'upload/member/thumb/' . $imgs[0] . '_thumb.' . $imgs[1];
            if (is_file($image_path)) {
                unlink($image_path);
            }
            if (is_file($image_path_thumb)) {
                unlink($image_path_thumb);
            }
        }
    }

    //function to show all messages
    function getAllMessages($user_id, $pageNo) {
			
        $this->db->select('group_concat(mbl.blocked_profile_id SEPARATOR ",") as blocked_profile_ids', false)
                ->from('member_blocked_list mbl')
                ->where('mbl.user_id', $user_id);
        $qry = $this->db->get();
        $res_arr1 = $qry->row_array();

        $this->db->select('group_concat(mbl.user_id SEPARATOR ",") as user_ids', false)
                ->from('member_blocked_list mbl')
                ->where('mbl.blocked_profile_id', $user_id);
        $qry = $this->db->get();
        $res_arr2 = $qry->row_array();
        $start_limit = $pageNo * 10;

        $QRY = "SELECT t.*
						FROM  `chat`  `t` 
						WHERE t.id IN (SELECT MAX(s.id) FROM chat s WHERE (s.`from` ='$user_id' and sen_removed='N')
						OR  (s.`to` ='$user_id' and rec_removed='N') 
						GROUP BY (IF(s.`from`='$user_id', s.`to`, s.`from`)))";	
 		if (!empty($res_arr1['blocked_profile_ids'])) {
		      $QRY .="  AND( t.from not in (".$res_arr1['blocked_profile_ids'].") AND (t.to not in (".$res_arr1['blocked_profile_ids'].")))";
    		 }
  		 if (!empty($res_arr2['user_ids'])) {
		      $QRY .="  AND( t.from not in (".$res_arr2['user_ids'].") AND (t.to not in (".$res_arr2['user_ids'].")) )";
        }			
        $QRY .="   ORDER BY sent DESC LIMIT $start_limit,10";

        $result = $this->db->query($QRY);
        $results = $result->result_array();
        //echo $this->db->last_query();	
        // print_r($results);
        return $results;
    }

    //Function to get from message details
    public function getFromDetails($from_id, $to_id, $user_id) {
        $from_user_id = ($from_id != $user_id) ? $from_id : $to_id;
        $QRY = "SELECT u.user_id as profile_id
			 ,u.image as profile_user_image
			 ,u.member_type as user_type
			 ,CONCAT(`u`.first_name,'',`u`.last_name) as profile_name
			 ,u.activation_id 
			 FROM in_member_master u 
			 LEFT JOIN in_member_type u1 ON u.member_type = u1.type_id
			 WHERE u.user_id ='$from_user_id'";
        $result = $this->db->query($QRY);
        $records = $result->row_array();
        return $records;
    }

    //function to get total  number of unread messages of specified user
    function getUnreadMessagesFromuser($to_id, $from_id, $user_id) {
        $from_user_id = ($from_id != $user_id) ? $from_id : $to_id;
        /* if($from_id != $user_id) 
          { */
        $sql = "SELECT count(id) as chat_count FROM chat WHERE chat.to='$user_id' AND chat.recd='0' AND chat.from='$from_user_id'";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return $result['chat_count'];
        /* } else { return 0; } */
    }

    //function to show all chats
    function getMessageDetails($from_id, $to_id, $pageNo) {
      //  $start_limit = $pageNo * 10;
        $sql = "SELECT chat.id
	       ,chat.to
		   ,chat.from
		   ,chat.message
		   ,chat.sen_removed
		   ,chat.rec_removed
		   ,chat.recd
	       ,chat.sent as sent
		   ,chat.video
		   ,chat.message_id
		   ,chat.drink_offerings_id
           ,CONCAT(`u1`.first_name,'',`u1`.last_name) AS from_name
		   ,u1.image as from_image
           ,CONCAT(`u2`.first_name,'',`u2`.last_name) AS to_name
		   ,u2.image as to_image
           FROM chat 
           LEFT JOIN in_member_master u1 ON chat.from = u1.user_id
           LEFT JOIN in_member_master u2 ON chat.to = u2.user_id  
           WHERE ((chat.from= '$from_id'  AND  chat.to= '$to_id' AND chat.sen_removed='N') OR (chat.from= '$to_id'  AND  chat.to= '$from_id' AND chat.sen_removed='N'))
           ORDER BY chat.sent DESC";
        //echo $sql;exit;
        $query = $this->db->query($sql);
        $result = $query->result_array();

        $sql1 = "update chat set chat.recd=1 WHERE chat.to='$from_id' AND chat.from='$to_id' ";
        $query1 = $this->db->query($sql1);
        return $result;
    }

    // function to insert messages
    function sendMessage($arr, $drink_offerings_id = '') {

        $data = array(
            'from' => $arr['from_id'],
            'to' => $arr['to_id'],
            'message' => mysql_escape_string($arr['message']),
            'rec_removed' => 'N',
            'sen_removed' => 'N',
            'recd' => '0',
            'sent' => date("Y-m-d H:i:s")
        );
		if($arr['message_id'] !="")
		    $data['message_id'] = $arr['message_id'];
        if ($drink_offerings_id) {
            $data['drink_offerings_id'] = $drink_offerings_id;
            $data['message'] = "Send a drink ";
        } else {
            $data['drink_offerings_id'] = '0';
        }
        if ($arr['video']) {
            $data['video'] = $arr['video'];
            $data['message'] = "Send a video";
        }
        
        $this->db->insert('chat', $data);
        return $msg_id = $this->db->insert_id();
    }

    function drinkofferhistory($arr) {
        $this->db->select('mm.hotel_id');
        $this->db->where('mm.user_id', $arr['from_id'])
                ->from('access_members mm');
        $qry = $this->db->get();
        $row = $qry->row_array(); //echo $this->db->last_query();	exit;

        $data = array(
            'user_id' => $arr['from_id'],
            'to_user_id' => $arr['to_id'],
            'hotel_id' => $row['hotel_id'],
            'drinks_id' => $arr['drinks_id'],
            'quantity' => $arr['quantity'],
            'status_flag' => 'P',
            'date_time' => date("Y-m-d H:i:s")
        );
        if ($arr['quantity'])
            $data['quantity'] = $arr['quantity'];
        else
            $data['quantity'] = 1;
        $this->db->insert('drink_offerings', $data);
        return $msg_id = $this->db->insert_id();
    }

    //function to update read status
    function updateReadStatus($to_id, $from_id) {
        $sql1 = "update chat set chat.recd=1 WHERE chat.to='$to_id' AND chat.from='$from_id' ";
        $query = $this->db->query($sql1);
        return true;
    }

    function updateDrinksStatus($id, $status_flag) {
        $sql1 = "update drink_offerings set status_flag='$status_flag' WHERE id='$id'";
        $query = $this->db->query($sql1);
        //echo $this->db->last_query();	exit;

        $this->db->select('df.*,dm.price');
        $this->db->where('df.id', $id)
                ->from('drink_offerings df');
        $this->db->join('drinks_master dm', 'dm.id=df.drinks_id', 'left');
        $qry = $this->db->get();
        $row = $qry->row_array();


        $this->db->select('*')
                ->from('in_member_master')
                ->where('user_id', $row['user_id']);
        $query = $this->db->get();
        $from_user = $query->row_array();

        $this->db->select('*')
                ->from('in_member_master')
                ->where('user_id', $row['to_user_id']);
        $query = $this->db->get();
        $to_user = $query->row_array();

        $this->db->select('am.room');
        $this->db->from('in_member_master mm')
                ->join('activation_code_master acm', 'acm.user_id=mm.user_id', 'left')
                ->join('access_master am', 'am.id = acm.access_id', 'left')
                ->join('access_members ams', 'ams.id=am.access_member_id', 'left');
        $this->db->where(array('mm.user_id' => $row['user_id'], 'acm.id' => $from_user['activation_id']));
        $query = $this->db->get();
        $from_user_room = $query->row_array();

        $this->db->select('am.room');
        $this->db->from('in_member_master mm')
                ->join('activation_code_master acm', 'acm.user_id=mm.user_id', 'left')
                ->join('access_master am', 'am.id = acm.access_id', 'left')
                ->join('access_members ams', 'ams.id=am.access_member_id', 'left');
        $this->db->where(array('mm.user_id' => $row['to_user_id'], 'acm.id' => $to_user['activation_id']));
        $query = $this->db->get();
        $to_user_room = $query->row_array();
        //print_r($to_user_room);exit;
        $total_price = $row['price'] * $row['quantity'];
        $data = array(
            'user_id' => $row['user_id'],
            'recipient_id' => $row['to_user_id'],
            'hotel_id' => $row['hotel_id'],
            'drinks_id' => $row['drinks_id'],
            'price' => $row['price'],
            'from_room' => $from_user_room['room'],
            'room_number' => $to_user_room['room'],
            'quantity' => $row['quantity'],
            'total_price' => $total_price,
            'charged' => 'N',
            'active' => 'Y',
            'date_time' => date("Y-m-d H:i:s")
        );
        //print_r($data);exit;			  
        $this->db->insert('order_master', $data);
        $msg_id = $this->db->insert_id();

        $data = array(
            'from_user' => $row['user_id'],
            'to_user' => $row['to_user_id'],
            'from_room' => $from_user_room['room'],
            'to_room' => $to_user_room['room'],
            'total_price' => $total_price,
            'quantity' => $row['quantity'],
            'hotel_id' => $row['hotel_id'],
            'drinks_id' => $row['drinks_id'],
            'date_time' => date("Y-m-d H:i:s"));
        $this->db->insert('notify_order', $data);
        $msg_id = $this->db->insert_id();
        return true;
    }

    //get drink offer details
    function getDrinkDetails($id) {
        $this->db->select('dm.*,d.image,d.price,d.title as drink_title')
                ->from('drink_offerings dm')
                //->join('hotel_profile hp', 'hp.id=dm.hotel_id')
                ->join('drinks_master d', 'd.id=dm.drinks_id')
                ->where(array('dm.id' => $id, 'd.active' => 'Y'));
        $qry = $this->db->get();
        return $qry->row_array();
    }

    public function getAllDrinks($activation_code) {

        $this->db->select('acm.hotel_id')
                ->from('activation_code_master acm')
                ->where('acm.activation_code', $activation_code);

        $qry = $this->db->get();
        $row = $qry->row_array(); // echo $this->db->last_query();	exit;
        $hotel_id = $row['hotel_id'];

        $this->db->select('dm.*,hp.title as hotel_title')
                ->from('drinks_master dm')
                ->join('hotel_profile hp', 'hp.id=dm.hotel_id')
                ->where(array('dm.active' => 'Y', 'dm.hotel_id' => $hotel_id));
        $this->db->order_by('date_time', 'desc');
        $qry = $this->db->get();
        $records = $qry->result_array();
        return $records;
    }

    public function block_guest($arr) { //print_r($arr);exit;
	     $this->db->select('mbl.*')
                ->from('member_blocked_list mbl')
                ->where(array('mbl.user_id' => $arr['user_id'], 'mbl.blocked_profile_id' => $arr['blocked_profile_id']));
        $qry = $this->db->get();
        $record = $qry->row_array();
		if($record['id'] !="") {
		  $id = $record['id'];
	          $this->db->query("delete from member_blocked_list where id = '$id'");return true; 
	   } else { 
        $arr['date_time'] = date("Y-m-d H:i:s");
        $this->db->insert('member_blocked_list', $arr);
        return $id = $this->db->insert_id();
		}
    }

    //function to send push notification

    function sendPushNotification($message, $devicetocken, $badge_count = 1) {

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

    function update_iphone_notification($user_id) {
        $sql = "SELECT user_id,iphone_noti_count FROM user_master WHERE user_id='$user_id'";

        $query = $this->db->query($sql);
        $res = $query->row_array();

        $noticount = $res['iphone_noti_count'] + 1;
        $this->db->query("UPDATE user_master SET iphone_noti_count=$noticount WHERE user_id=" . $res['user_id']);
        return $noticount;
    }

    function clear_notification($arr) {
        $this->db->query("UPDATE user_master SET iphone_noti_count='0' WHERE user_id=" . $arr['user_id']);
    }

    # time ago 

    function timeAgo($time_ago) {
        $time_ago = strtotime($time_ago);
        $cur_time = time();
        $time_elapsed = $cur_time - $time_ago;
        $seconds = $time_elapsed;
        $minutes = round($time_elapsed / 60);
        $hours = round($time_elapsed / 3600);
        $days = round($time_elapsed / 86400);
        $weeks = round($time_elapsed / 604800);
        $months = round($time_elapsed / 2600640);
        $years = round($time_elapsed / 31207680);
        // Seconds
        if ($seconds <= 60) {
            return "just now";
        }
        //Minutes
        else if ($minutes <= 60) {
            if ($minutes == 1) {
                return "one minute ago";
            } else {
                return "$minutes minutes ago";
            }
        }
        //Hours
        else if ($hours <= 24) {
            if ($hours == 1) {
                return "an hour ago";
            } else {
                return "$hours hrs ago";
            }
        }
        //Days
        else if ($days <= 7) {
            if ($days == 1) {
                return "yesterday";
            } else {
                return "$days days ago";
            }
        }
        //Weeks
        else if ($weeks <= 4.3) {
            if ($weeks == 1) {
                return "a week ago";
            } else {
                return "$weeks weeks ago";
            }
        }
        //Months
        else if ($months <= 12) {
            if ($months == 1) {
                return "a month ago";
            } else {
                return "$months months ago";
            }
        }
        //Years
        else {
            if ($years == 1) {
                return "one year ago";
            } else {
                return "$years years ago";
            }
        }
    }

    public function updateActivationCodeMaster($email_address) {
        $this->db->select('imm.user_id')
                ->from('access_members ams')
                ->join('in_member_master imm', 'ams.email=imm.email_address')
                ->where(array('imm.email_address' => $email_address, 'imm.deleted' => 'N'));
        $result = $this->db->get();
        $res = $result->row_array();
        if (!empty($res)) {
            $arr = array(
                'user_id' => $res['user_id']
            );
            $this->db->where('email', $email_address)
                    ->update('access_members', $arr);
        }
        $this->db->select('acm.id')
                ->from('activation_code_master acm')
                ->join('access_master am', 'am.id=acm.access_id')
                ->join('access_members ams', 'ams.id=am.access_member_id');

        $result = $this->db->get();
        $acm_res = $result->row_array();
        foreach ($acm_res as $acm_res) {
            $acm_arr = array('user_id' => $res['user_id']);
            $this->db->where('email', $acm_res['id'])
                    ->update('access_members', $acm_arr);
        }
    }

    public function getEmailId($user_id) {
        $this->db->select('email_address')
                ->from('in_member_master')
                ->where('user_id', $user_id);
        $result = $this->db->get();
        $acm_res = $result->row_array();
    }

}

// end clent_model - trakor