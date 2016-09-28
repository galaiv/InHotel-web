<?php

class activation_code_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
 public function getAllZones($hotel_id) {
       
        $this->db->select('*,hzl.id as zone_id')
                ->from('hotel_zone_list hzl')
                ->join('map_hotel_zone mhz','hzl.id=mhz.zone_id')
                ->where(array('hzl.active'=>'Y','mhz.hotel_id'=>$hotel_id));
        $qry = $this->db->get();
        $records = $qry->result_array();
        return $records;
    }
    public function count_activation_codes($hotel_id) {

             $this->db->select('count(*) as activation_code_count')
               ->from('activation_code_master acm')
                ->join('hotel_profile hp', 'acm.hotel_id=hp.id')
                ->join('access_master am', 'am.id=acm.access_id')
               
                 ->join('hotel_zone_list hzl','am.zone_id=hzl.id')
                ->where("acm.hotel_id", $hotel_id);
      
        $qry = $this->db->get();
        $records = $qry->row_array();

        return $records["activation_code_count"];
    }

    public function getAllActivationCodes($hotel_id, $num = '0', $offset = '0') {
        if (trim($offset) == '')
            $offset = '0';
        $this->db->select('acm.*,acm.id as activation_code_id,hp.title')
                ->select('IF(acm.general="Y","--",hzl.zone_name) AS zone_name', false)
                ->from('activation_code_master acm')
                ->join('hotel_profile hp', 'acm.hotel_id=hp.id')
                ->join('access_master am', 'am.id=acm.access_id')
                
                 ->join('hotel_zone_list hzl','am.zone_id=hzl.id')
                ->where("acm.hotel_id", $hotel_id);
     
        $this->db->order_by('acm.id', 'desc')
                ->limit($num, $offset);


        $qry = $this->db->get();
        $records = $qry->result_array();
        return $records;
    }
    public function getGeneratedAccessCode($activation_code_id){
        $this->db->select('activation_code')
                ->from('activation_code_master')
                ->where('id',$activation_code_id);
                
         $qry = $this->db->get();
        $row = $qry->row_array();
        return $row['activation_code'];
    }
    public function get_activation_code_details($id) {
        $this->db->select('acm.*,acm.id as activation_code_id,hp.title')
                ->from('activation_code_master acm')
                ->join('hotel_profile hp', 'acm.hotel_id=hp.id')
                ->where('acm.id', $id);

        $qry = $this->db->get();
        $row = $qry->row_array();
        return $row;
    }

    function update_activation_code($arr, $id = '') {
        $this->db->where('id', $id);
        $rs = $this->db->update('activation_code_master', $arr);
        return $rs;
    }

    function delete_activation_code($id) {
        $this->db->where('id', $id);
        $rs = $this->db->delete('activation_code_master');

        return true;
    }

    function add_activation_code($arr) {
        $this->db->insert('activation_code_master', $arr);
        return $this->db->insert_id();
    }

    public function generateActivationCode() {
        $activation_code = rand(1111111111, 9999999999);
        if ($this->checkActivationCodeExists($activation_code)) {
            $this->generateActivationCode();
        } else {
            return $activation_code;
        }
    }

    public function checkActivationCodeExists($activation_code) {
        $this->db->select('id')
                ->from('activation_code_master')
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
                ->join('in_member_master imm','imm.user_id=hp.user_id')
                ->where(array('imm.active'=>'Y','imm.deleted'=>'N'));
        $qry = $this->db->get();
        return $qry->result_array();
    }

}

//endof class Member_model


	
	
