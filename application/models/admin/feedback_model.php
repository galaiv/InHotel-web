<?php

class feedback_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_feedback_details($id) {
        $this->db->select('fm.*,hp.title as hotel_title,inm.first_name,inm.last_name')
                ->from('hotel_experience fm')
                ->join('hotel_profile hp', 'hp.id=fm.hotel_id')
			    ->join('in_member_master inm', 'inm.user_id=fm.user_id')
                ->where('fm.id', $id);
        $qry = $this->db->get();
        return $qry->row_array();
    }

    function update_feedback($arr, $id = '') {
        if ($id != "") {
            $this->db->where('id', $id);
            $this->db->update('hotel_experience', $arr);
            return $id;
        } else {
            $this->db->insert('hotel_experience', $arr);
            $id = $this->db->insert_id();
            return $id;
        }
    }

    // unlink the feedback image
    function unlinkImage($id) {
        $query = $this->db->get_where('hotel_experience', array('id' => $id));
        $rs = $query->row_array();
        if ($rs) {
            $image_path = 'upload/feedback/' . $rs['image'];
            $image_path_thumb = 'upload/feedback/thumb/' . $rs['image'];
            if (is_file($image_path)) {
                unlink($image_path);
            }
            if (is_file($image_path_thumb)) {
                unlink($image_path_thumb);
            }
        }
    }

    function delete_feedback($feedback_id) {
        $this->db->where('id', $feedback_id)
                ->delete('hotel_experience');
        return true;
    }

    public function count_feedback() {
        $key = $_REQUEST['key'] ? $_REQUEST['key'] : '';
		$key = urlencode ($key);
        $key = $this->db->escape_str($key);
        $hotel_id = $this->db->escape_str($_REQUEST['hotel']);
        $this->db->select('count(fm.id) as feedback_count,inm.first_name,inm.last_name,hp.title as hotel_title')
                ->from('hotel_experience fm')
                ->join('hotel_profile hp', 'hp.id=fm.hotel_id')
                ->join('in_member_master inm', 'inm.user_id=fm.user_id');

        //   ->join('user_master um', 'um.user_id=ga.user_id');
        if ($key) {
            $this->db->where("(fm.experiance like '%" . $key . "%' OR inm.first_name like '%" . $key . "%' OR inm.last_name like '%" . $key . "%' OR hp.title like '%" . $key . "%' OR concat(inm.first_name,' ',inm.last_name) like '%" . $key . "%')");
        }
        if ($hotel_id) {
            $this->db->where("fm.hotel_id", $hotel_id);
        }
        $qry = $this->db->get();
        $records = $qry->row_array();
//echo $this->db->last_query();	exit;
        return $records["feedback_count"];
    }

    public function getAllFeedback($num = '0', $offset = '0') {
        if (trim($offset) == '')
            $offset = '0';
        $key = $_REQUEST['key'] ? $_REQUEST['key'] : '';
        $key = $_REQUEST['key'] ? $_REQUEST['key'] : '';
		$key = urlencode ($key);
        $key = $this->db->escape_str($key);
        $hotel_id = $this->db->escape_str($_REQUEST['hotel']);
        $this->db->select('fm.*,hp.title as hotel_title,inm.first_name,inm.last_name,hp.title as hotel_title')
                ->from('hotel_experience fm')
                ->join('hotel_profile hp', 'hp.id=fm.hotel_id')
                ->join('in_member_master inm', 'inm.user_id=fm.user_id');
        if ($hotel_id) {
            $this->db->where("fm.hotel_id", $hotel_id);
        }
        $this->db->order_by('date_time', 'desc');
        if ($key) {
            $this->db->where("(fm.experiance like '%" . $key . "%' OR inm.first_name like '%" . $key . "%' OR inm.last_name like '%" . $key . "%' OR hp.title like '%" . $key . "%' OR concat(inm.first_name,' ',inm.last_name) like '%" . $key . "%')");
        }
        $this->db->limit($num, $offset);
        //   $qry .= "  LIMIT $offset,$num";


        $qry = $this->db->get();
        $records = $qry->result_array();
        return $records;
    }

    function get_all_business_list($arr) {
        $this->db->select('id,title')
                ->from('hotel_profile');
        $qry = $this->db->get();
        return $qry->result_array();
    }

    public function getAllHotels() {
            $this->db->select('hp.*,hp.title as hotel_title')
                ->from('hotel_profile hp')
                ->join('in_member_master imm','imm.user_id=hp.user_id')
                ->where(array('imm.active'=>'Y','imm.deleted'=>'N'));
        $qry = $this->db->get();
        return $qry->result_array();
    }

}

//endof class event_model


	
	
