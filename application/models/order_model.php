<?php

class order_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_order_details($id) {

        $this->db->select('hp.title as hotel_title,dm.title as drink_title,om.*,imm.first_name as offered_first_name,imm1.last_name as offered_last_name,imm1.first_name as recipient_first_name,imm.last_name as recipient_last_name')
                ->from('order_master om')
                ->join('hotel_profile hp', 'hp.id=om.hotel_id')
                ->join('drinks_master dm', 'dm.id=om.drinks_id','left')
                ->join('in_member_master imm', 'om.user_id=imm.user_id')
				->join('in_member_master imm1', 'om.recipient_id=imm1.user_id')
				//->join('activation_code_master acm', 'acm.user_id =om.user_id', 'left')
               // ->join('access_members ams', 'ams.email=imm.email_address', 'left')
               // ->join('access_master am', 'am.access_member_id = ams.id', 'left')
                ->where('om.id', $id);

        $qry = $this->db->get();
        return $qry->row_array();
    }

    function update_order($arr, $id = '') {
        if ($id != "") {
            $this->db->where('id', $id);
            $this->db->update('order_master', $arr);
            return $id;
        } else {
            $this->db->insert('order_master', $arr);
            $id = $this->db->insert_id();
            return $id;
        }
    }

    // unlink the order image
    function unlinkImage($id) {
        $query = $this->db->get_where('order_master', array('id' => $id));
        $rs = $query->row_array();
        if ($rs) {
            $image_path = 'upload/order/' . $rs['image'];
            $image_path_thumb = 'upload/order/thumb/' . $rs['image'];
            if (is_file($image_path)) {
                unlink($image_path);
            }
            if (is_file($image_path_thumb)) {
                unlink($image_path_thumb);
            }
        }
    }

    function delete_order($order_id) {
        $this->db->where('id', $order_id)
                ->delete('order_master');
        return true;
    }

    public function count_order($hotel_id) {
        $from_date = $this->db->escape_str($_REQUEST['from_date']);
        $to_date = $this->db->escape_str($_REQUEST['to_date']);
        $this->db->select('count(om.id) as order_count')
                ->from('order_master om')
                ->join('hotel_profile hp', 'hp.id=om.hotel_id')
                ->join('drinks_master dm', 'dm.id=om.drinks_id')
                ->join('in_member_master imm', 'om.user_id=imm.user_id');
            	$this->db->where("om.hotel_id", $hotel_id);
        if ($to_date) {
            $this->db->where("om.date_time between '" . $from_date . "' and '" . $to_date . "'");
        }
        $qry = $this->db->get();
        $records = $qry->row_array();//echo $this->db->last_query();

        return $records["order_count"];
    }

    public function getAllOrder($hotel_id,$num = '0', $offset = '0') {
        if (trim($offset) == '')
            $offset = '0';
        $from_date = $this->db->escape_str($_REQUEST['from_date']);
        $to_date = $this->db->escape_str($_REQUEST['to_date']);
        $search_creator = $_REQUEST['search_creator'] ? $_REQUEST['search_creator'] : '';
        $this->db->select('hp.title as hotel_title,dm.title as drink_title,om.*,imm.first_name as offered_first_name,imm1.last_name as offered_last_name,imm1.first_name as recipient_first_name,imm.last_name as recipient_last_name')
                ->from('order_master om')
                ->join('hotel_profile hp', 'hp.id=om.hotel_id')
                ->join('drinks_master dm', 'dm.id=om.drinks_id')
				->join('in_member_master imm1', 'om.recipient_id=imm1.user_id')
                ->join('in_member_master imm', 'om.user_id=imm.user_id');
                $this->db->where("om.hotel_id", $hotel_id);
        if ($from_date!=""||$to_date!="") {
            $this->db->where("om.date_time between '" . $from_date . "' and '" . $to_date . "'");
        }

        $this->db->order_by('date_time', 'desc');

        $this->db->limit($num, $offset);
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
        /*   $this->db->select('hp.*,hp.title as hotel_title')
          ->from('hotel_profile hp')
          ->join('in_member_master imm', 'hp.user_id=imm.user_id')
          ->where('imm.active','Y'); */
        $qry = $this->db->get();
        return $qry->result_array();
    }

}

//endof class event_model


	
	
