<?php

class access_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function count_access_list($hotel_id) {
        $key = $_REQUEST['key'] ? $_REQUEST['key'] : '';
        $key = $this->db->escape_str($key);
        $this->db->select('count(*) as activation_code_count,ams.email')
                ->from('access_master am')
                ->join('access_members ams', 'ams.id=am.access_member_id')
                ->join('hotel_profile hp', 'am.hotel_id=hp.id')
                ->where("am.hotel_id", $hotel_id);

        if ($key) {
            $this->db->where('(ams.email like "%'. mysql_real_escape_string($key) . '%")');
        }
        $qry = $this->db->get();
        $records = $qry->row_array();

        return $records["activation_code_count"];
    }

    public function getAllAccessList($hotel_id, $num = '0', $offset = '0') {
        if (trim($offset) == '')
            $offset = '0';
        $key = $_REQUEST['key'] ? $_REQUEST['key'] : '';
        $key = $this->db->escape_str($key);
        $this->db->select('am.*,ams.*,am.id as access_master_id,ams.id as access_member_id,hp.title as hotel_title,am.active as access_master_status')
                ->from('access_master am')
                ->join('access_members ams', 'ams.id=am.access_member_id')
                ->join('hotel_profile hp', 'am.hotel_id=hp.id')
                ->where("am.hotel_id", $hotel_id);
     if ($key) {
            $this->db->where('(ams.email like "%'. mysql_real_escape_string($key) . '%")');
        }
        $this->db->order_by('am.id', 'desc')
                ->limit($num, $offset);


        $qry = $this->db->get(); //echo $this->db->last_query();
        $records = $qry->result_array();
        return $records;
    }

    public function count_current_access_list($hotel_id) {
        $key = $_REQUEST['key'] ? $_REQUEST['key'] : '';
        $key = $this->db->escape_str($key);
        /*  $this->db->select('count(*) as activation_code_count')
          ->from('access_master am')
          ->join('access_members ams', 'ams.id=am.access_member_id')

          ->join('hotel_profile hp', 'am.hotel_id=hp.id')
          ->where("am.hotel_id", $hotel_id) */
        //   ->where('activation_code="' . $activation_code . '" and active="Y" and now() between access_start_time and access_close_time', false, false);
        $now = date("Y-m-d H:i:s");
        $this->db->select('am.*,ams.*,am.id as access_master_id,ams.email,ams.id as access_member_id,am.active as access_master_status,acm.access_start_time,acm.access_close_time,imm.chat_status,imm.first_name as user_first_name,imm.last_name as user_last_name,imm.quickblox_id,imm.user_id as users_id')
                           ->from('activation_code_master acm')
                ->join('access_members ams', 'acm.user_id = ams.user_id', 'left')
                ->join('in_member_master imm', 'imm.user_id = ams.user_id')
                ->join('access_master am', 'am.access_member_id = ams.id and am.id=acm.access_id', 'left')
                ->where("am.hotel_id", $hotel_id)
                ->where('acm.active="Y" and "' . $now . '" between ADDDATE(acm.access_start_time, INTERVAL -1 DAY) and ADDDATE(acm.access_close_time, INTERVAL 1 DAY) ', false, false);
				 if ($key) {
            $this->db->where('(ams.email like "%'. mysql_real_escape_string($key) . '%")');
        }
                  $this->db->group_by('am.access_member_id');
        $qry = $this->db->get();
        
     $records = $qry->result_array();//echo $this->db->last_query();exit;

     //   return $records["activation_code_count"];
	 return count($records);
    }

    public function getAllCurrentAccessList($hotel_id, $num = '0', $offset = '0') {
        if (trim($offset) == '')
            $offset = '0';
		 $key = $_REQUEST['key'] ? $_REQUEST['key'] : '';
        $key = $this->db->escape_str($key);	
        $now = date("Y-m-d H:i:s");
        $this->db->select('am.*,ams.*,am.id as access_master_id,ams.id as access_member_id,ams.email,am.active as access_master_status,acm.access_start_time,acm.access_close_time,imm.chat_status,imm.first_name as user_first_name,imm.last_name as user_last_name,imm.quickblox_id,imm.user_id as users_id')
                ->from('activation_code_master acm')
                ->join('access_members ams', 'acm.user_id = ams.user_id', 'left')
                ->join('in_member_master imm', 'imm.user_id = ams.user_id')
                ->join('access_master am', 'am.access_member_id = ams.id and am.id=acm.access_id', 'left')
                ->where("am.hotel_id", $hotel_id)
                ->where('acm.active="Y" and "' . $now . '" between ADDDATE(acm.access_start_time, INTERVAL -1 DAY) and ADDDATE(acm.access_close_time, INTERVAL 1 DAY) ', false, false);
            if ($key) {
            $this->db->where('(ams.email like "%'. mysql_real_escape_string($key) . '%")');
        }
        $this->db->order_by('am.id', 'desc')
                     ->group_by('am.access_member_id')
                ->limit($num, $offset);


        $qry = $this->db->get();
//echo $this->db->last_query();exit;
        $records = $qry->result_array();
        return $records;
    }

    public function getUserIdByAccessEmail($email) {
        $this->db->select('user_id')
                ->from('in_member_master')
                ->where(array('email_address' => $email, 'member_type' => 1, 'active' => 'Y', 'deleted' => 'N'));
        $qry = $this->db->get();
        $row = $qry->row_array();
        return $row['user_id'];
    }

    public function getUserIdByAccessMemberId($id) {
        $this->db->select('user_id')
                ->from('access_members')
                ->where(array('id' => $id, 'active' => 'Y'));
        $qry = $this->db->get();
        $row = $qry->row_array();
        return $row['user_id'];
    }

    public function get_access_details($id) {
        $this->db->select('am.*,ams.*,am.id as access_master_id,ams.id as access_member_id,hp.title as hotel_title,am.active as access_master_status')
                ->from('access_master am')
                ->join('access_members ams', 'ams.id=am.access_member_id')
                ->join('hotel_profile hp', 'am.hotel_id=hp.id')
                ->where('am.id', $id);

        $qry = $this->db->get();
        $row = $qry->row_array();
        return $row;
    }

    public function get_access_member_details($id) {
        $this->db->select('ams.*,hp.title as hotel_title,ams.id as access_member_id')
                ->from('access_members ams')
                ->join('hotel_profile hp', 'ams.hotel_id=hp.id')
                ->where('ams.id', $id);

        $qry = $this->db->get();
        $row = $qry->row_array();
        return $row;
    }

    function update_access($arr, $id = '') {
        $this->db->where('id', $id);
        $rs = $this->db->update('access_master', $arr);
        return $rs;
    }

    function update_access_member($arr, $id = '') {
        $this->db->where('id', $id);
        $rs = $this->db->update('access_members', $arr);
        return $id;
    }

    function delete_access($id) {
        $this->db->where('id', $id);
        $rs = $this->db->delete('access_master');

        return true;
    }

    function add_access($arr) {
        $this->db->insert('access_master', $arr);
        return $this->db->insert_id();
    }

    function add_access_member($arr) {
        $this->db->insert('access_members', $arr);
        return $this->db->insert_id();
    }

    public function generateActivationCode() {
        $access = rand(1111111111, 9999999999);
        if ($this->checkActivationCodeExists($access)) {
            $this->generateActivationCode();
        } else {
            return $access;
        }
    }

    public function checkActivationCodeExists($access) {
        $this->db->select('id')
                ->from('access_master')
                ->where('activation_code', $activation_code);
        $qry = $this->db->get();
        $res = $qry->row_array();
        if (empty($res)) {
            return false;
        } else {
            return true;
        }
    }

    public function getAllHotels() {
        $this->db->select('hp.*,hp.title as hotel_title')
                ->from('hotel_profile hp')
                ->join('in_member_master imm', 'imm.user_id=hp.user_id')
                ->where(array('imm.active' => 'Y', 'imm.deleted' => 'N'));
        $qry = $this->db->get();
        return $qry->result_array();
    }

    public function getAllAccessMembers($hotel_id) {
        $this->db->select('*')
                ->from('access_members')
                ->where(array('hotel_id' => $hotel_id));
        $qry = $this->db->get();
        return $qry->result_array();
    }

    public function checkEmailExist($email, $access_member_id) {
        $this->db->select('count(*) as count')
                ->from('access_members')
                ->where(array('email' => $email,'hotel_id' =>$this->session->userdata('hotel_id')));
        if ($access_member_id != "") {
            $this->db->where('id <>', $access_member_id);
        }
        $qry = $this->db->get();
        return $qry->row_array();
    }

    public function getAllZones($hotel_id) {

        $this->db->select('*,hzl.id as zone_id')
                ->from('hotel_zone_list hzl')
                ->join('map_hotel_zone mhz', 'hzl.id=mhz.zone_id')
                ->where(array('hzl.active' => 'Y', 'mhz.hotel_id' => $hotel_id));
        $qry = $this->db->get();
        $records = $qry->result_array();
        return $records;
    }
	 public function getUserDetails($user_id) {
        $this->db->select('*')
                ->from('in_member_master')
                ->where('user_id', $user_id);

        $query = $this->db->get();
        return $rs = $query->row_array();
    }

}

//endof class Member_model


	
	
