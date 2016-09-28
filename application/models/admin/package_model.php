<?php

class package_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function count_Packages($key) {
        $key = mysql_real_escape_string(trim($key));

        $qry = "select count(*) pack_count from membership_packages MP where 1 ";
        if ($key) {
            $qry .= " AND (MP.title like '%$key%' OR MP.description like '%$key%' OR MP.price like '%$key%' OR MP.duration like '%$key%'  OR MP.duration_type like '%$key%'  ) ";
        }

        $result = $this->db->query($qry);
        $records = $result->row_array();

        return $records["pack_count"];
    }

    public function getAllPackages($key, $num = '0', $offset = '0') {
        if (trim($offset) == '')
            $offset = '0';
        $key = mysql_real_escape_string(trim($key));

        $qry = "select MP.* from membership_packages MP where 1 ";
        if ($key) {
            $qry .= " AND (MP.title like '%$key%' OR MP.description like '%$key%' OR MP.price like '%$key%' OR MP.duration like '%$key%'  OR MP.duration_type like '%$key%'  ) ";
        }

        $qry .= " order by MP.package_id DESC LIMIT $offset,$num";
        $result = $this->db->query($qry);
        $records = $result->result_array();
        return $records;
    }

    public function get_package_details($id) {
        $qry = "select MP.* from membership_packages MP where  MP.package_id='$id' ";
        $res = $this->db->query($qry);
        $row = $res->row_array();
        return $row;
    }


    function update_package($arr, $id = '') {
        $this->db->where('package_id', $id);
        $rs = $this->db->update('membership_packages', $arr);
        return $rs;
    }



    function delete_package($package_id) {
        $this->db->query("delete from membership_packages where package_id = '$package_id' ");
        return true;
    }

 
    function add_package($arr) {
        $this->db->insert('membership_packages', $arr);
        return $this->db->insert_id();
    }

   

}

//endof class Member_model


	
	
