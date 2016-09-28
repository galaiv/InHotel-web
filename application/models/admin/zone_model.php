<?php

class zone_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function count_zones($key) {
        $this->db->select('count(*) as zone_count')
                ->from('hotel_zone_list hzl');

        if ($key) {
            $this->db->like('hzl.zone_name', $key);
        }
        $qry = $this->db->get();
        $records = $qry->row_array();

        return $records["zone_count"];
    }

    public function getAllZones($key, $num = '0', $offset = '0') {
        if (trim($offset) == '')
            $offset = '0';
        $key = mysql_real_escape_string(trim($key));
        $this->db->select('*,hzl.id as zone_id')
                ->from('hotel_zone_list hzl');

        if ($key) {
            $this->db->like('hzl.zone_name', $key);
        }
        $this->db->order_by('hzl.id', 'desc')
                ->limit($num, $offset);


        $qry = $this->db->get();
        $records = $qry->result_array();
        return $records;
    }

    public function get_zone_details($id) {
        $this->db->select('*,hzl.id as zone_id')
                ->from('hotel_zone_list hzl')
                ->where('hzl.id', $id);
        $qry = $this->db->get();
        $row = $qry->row_array();
        return $row;
    }

    function update_zone($arr, $id = '') {
        $this->db->where('id', $id);
        $rs = $this->db->update('hotel_zone_list', $arr);
        return $rs;
    }

    function delete_zone($id) {
        $this->db->where('id', $id);
        $rs = $this->db->delete('hotel_zone_list');

        return true;
    }

    function add_zone($arr) {
        $this->db->insert('hotel_zone_list', $arr);
        return $this->db->insert_id();
    }

}

//endof class Member_model


	
	
