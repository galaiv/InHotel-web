<?php

class member_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    function add_new_member_detail($arr) {
        $this->db->insert('in_member_master', $arr);
        return $this->db->insert_id();
    }

    function update_member_details($arr, $id = '') {
        $this->db->where('user_id', $id);
        $rs = $this->db->update('in_member_master', $arr);
        //	echo $this->db->last_query();     exit; 
        return $rs;
    }

    public function validate_email($email, $user_id = '') {
        $qry = "select count(*) as rowcount from in_member_master where email_address='$email'";
        if ($user_id != "") {
            $qry .=" and user_id!=" . $user_id;
        }
        $res = $this->db->query($qry);
        $row = $res->row_array();
        if ($row["rowcount"] > 0) {
            return false;
        } else {
            return true;
        }
    }

    function update_member($arr, $id = '') {
        if ($id != "") {
            $this->db->where('user_id', $id);
            $rs = $this->db->update('in_member_master', $arr);
        } else {

            $this->db->insert('in_member_master', $arr);
            $id = $this->db->insert_id();
        }
        //    echo $this->db->last_query();     exit; 
        return $id;
    }

    function delete_member($user_id) {
        $this->db->query("delete from  in_member_master where user_id = '$user_id' ");
        $this->db->where('id', $id);
        $rs = $this->db->update('member_address', $arr);
//     /   echo $this->db->last_query(); 
        return true;
    }

    public function countUsers($member_type = '0', $key = '') {

        $key = $this->db->escape_str($_REQUEST['key']);
        $hotel_id = $this->db->escape_str($_REQUEST['hotel']);
        $this->db->select('imm.*,hp.*,hp.id as hotel_id,imm.user_id as user_id')
                ->from('in_member_master imm')
                ->join('hotel_profile hp', 'hp.user_id=imm.user_id', 'left')
                ->where(array('imm.deleted' => 'N', 'imm.member_type' => $member_type));

        if ($key) {
            $where = "(`imm`.`first_name` LIKE '%" . $key . "%' OR `imm`.`email_address` LIKE '%" . $key . "%' OR concat(imm.first_name,' ',imm.last_name) like '%$key%' OR `imm`.`last_name` LIKE '%" . $key . "%' )";
            $this->db->where($where);
        }
        if ($hotel_id) {
            $this->db->where("imm.hotel_id", $hotel_id);
        }

        return $result = $this->db->count_all_results();
    }

    public function getAllUsers($num = '0', $offset = '0', $member_type = '0', $key = '') {
        $key = $_REQUEST['key'];
        if (trim($offset) == '')
            $offset = '0';
        $key = $this->db->escape_str($_REQUEST['key']);
        $hotel_id = $this->db->escape_str($_REQUEST['hotel']);
        $this->db->select('imm.*,hp.*,hp.id as hotel_id,imm.user_id as user_id')
                ->from('in_member_master imm')
                ->join('hotel_profile hp', 'hp.user_id=imm.user_id', 'left')
                ->where(array('imm.deleted' => 'N', 'imm.member_type' => $member_type));

        if ($key) {
            $where = "(`imm`.`first_name` LIKE '%" . $key . "%' OR `imm`.`email_address` LIKE '%" . $key . "%' OR concat(imm.first_name,' ',imm.last_name) like '%$key%' OR `imm`.`last_name` LIKE '%" . $key . "%' )";
            $this->db->where($where);
        }
        if ($hotel_id) {
            $this->db->where("imm.hotel_id", $hotel_id);
        }
        $this->db->order_by('imm.user_id', 'DESC');
        $this->db->limit($num, $offset);

        $result = $this->db->get();


        $records = $result->result_array();
        return $records;
    }

    public function getMemberDetails($id, $hotel_id = "") {
        $this->db->select('imm.*,hp.*,hp.id as hotel_id,imm.user_id as user_id,imm.hotel_id as staff_hotel_id')
                ->from('in_member_master imm')
                ->join('hotel_profile hp', 'hp.user_id=imm.user_id', 'left')
                ->where(array('imm.deleted' => 'N', 'imm.user_id' => $id));
        if ($hotel_id != "") {
            $this->db->where(array('hp.id' => $hotel_id));
        }
        $this->db->order_by("imm.user_id", "desc");

        $result = $this->db->get();
        return $records = $result->row_array();
        // print_r($records);exit;
    }

    function update_hotel_owner($arr, $id = '') {
        if ($id != "") {
            $this->db->where('id', $id);
            $rs = $this->db->update('hotel_profile', $arr);
        } else {

            $this->db->insert('hotel_profile', $arr);
            $id = $this->db->insert_id();
        }
//echo $this->db->last_query();     exit; 
        return $id;
    }

    // unlink the hotel image
    function unlinkImage($id) {
        $query = $this->db->get_where('hotel_profile', array('id' => $id));
        $rs = $query->row_array();
        if ($rs) {
            $image_path = 'upload/hotel/' . $rs['image'];
            $image_path_thumb = 'upload/hotel/thumb/' . $rs['image'];
            if (is_file($image_path)) {
                unlink($image_path);
            }
            if (is_file($image_path_thumb)) {
                unlink($image_path_thumb);
            }
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

    // Get Email ID
    function get_emailByid($id) {
        $this->db->where('email_id', $id);
        $result = $this->db->get('email_config');
        return $result->row_array();
        //echo $this->db->last_query();exit;
    }

    public function save_zone($hotel_id) {
        $zones = $this->getAllzones();

        foreach ($zones as $zones) {
            $data = array(
                'hotel_id' => $hotel_id,
                'zone_id' => $zones['id']
            );
            $this->db->insert('map_hotel_zone', $data);
        }
        return $this->db->insert_id();
    }

    public function getAllzones() {
        $this->db->select('*')
                ->from('hotel_zone_list')
                ->where('active', 'Y');
        $result = $this->db->get();
        return $result->result_array();
    }
	public function updateMembershipRenewDetailsSignup($data){
         	$this->db->insert('renew_membership_details', $data);
			return $ID = $this->db->insert_id();
    }

}

//endof class Member_model


	
	
