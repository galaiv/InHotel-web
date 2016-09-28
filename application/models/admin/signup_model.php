<?php
class Signup_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
	
	function add_new_member_detail($arr) {
        $this->db->insert('in_member_master', $arr);
        return $this->db->insert_id();
    }
	
	function update_member_details($arr,$id='') {
        $this->db->where('user_id', $id);
        $rs = $this->db->update('in_member_master', $arr);
      //	echo $this->db->last_query();     exit; 
        return $rs;
    }

    public function validate_email($email) {
        $qry = "select count(*) as rowcount from in_user_master where email='$email'";
        $res = $this->db->query($qry);
        $row = $res->row_array();
        if ($row["rowcount"] > 0) {
            return false;
        } else {
            return true;
        }
    }

    function update_member($arr, $id = '') {
        $this->db->where('user_id', $id);
        $rs = $this->db->update('in_member_master', $arr);
      	// echo $this->db->last_query();      
        return $rs;
    }

    function update_member_profile($arr, $id = '') {
        $this->db->where('id', $id);
        $rs = $this->db->update('member_profile', $arr);
        // echo $this->db->last_query();exit;
        return $rs;
    }

    function update_member_address($arr, $id = '') {
        $this->db->where('id', $id);
        $rs = $this->db->update('member_address', $arr);
        return $rs;
    }

    function delete_member($user_id) {
        $this->db->query("delete from  in_member_master where user_id = '$user_id' ");
        return true;
    }

    public function countUsers($mem_type = '0', $key = '') {
		//$mem_type = 0;
	    $this->db->select('mm.*')
                ->from('in_member_master mm')
                //->where(array('mm.deleted' => 0, 'mm.member_type' => $mem_type));
				->where(array('mm.deleted' => 'N'));
        if ($key) {
            $where = "(`mm`.`first_name` LIKE '%" . $key . "%' OR `mm`.`email_address` LIKE '%" . $key . "%' OR concat(mm.first_name,' ',mm.last_name) like '%$key%' OR `mm`.`last_name` LIKE '%" . $key . "%' )";
            $this->db->where($where);
        }
//        $this->db->get();
//echo $this->db->last_query();
        return $result = $this->db->count_all_results();
    }

    public function getAllUsers($num = '0', $offset = '0', $mem_type = '0', $key = '') {
		//$mem_type = 0;
		
        if (trim($offset) == '')
            $offset = '0';

        $this->db->select('mm.*')
                ->from('in_member_master mm')
                //->where(array('mm.deleted' => 0, 'mm.member_type' => $mem_type));
				->where(array('mm.deleted' => 'N'));
        if ($key) {
            $where = "(`mm`.`first_name` LIKE '%" . $key . "%' OR `mm`.`email_address` LIKE '%" . $key . "%' OR concat(mm.first_name,' ',mm.last_name) like '%$key%' OR `mm`.`last_name` LIKE '%" . $key . "%' )";
            $this->db->where($where);
            /* $this->db->like('mm.first_name', $key)
              ->or_like('mm.last_name', $key)
              ->or_like('mm.email_address', $key)
              ->or_like('mm.email_address', $key); */
        }
        $this->db->order_by('mm.user_id', 'DESC');
		
		//echo $this->db->last_query();exit;
        $this->db->limit($num, $offset);

        $result = $this->db->get();
        // echo $this->db->last_query();
        $records = $result->result_array();
        return $records;
    }

    public function getMemberDetails($id) {
        $this->db->select('mm.*')
                ->from('in_member_master mm')
                ->where(array('mm.deleted' => 'N', 'mm.user_id' => $id))
				->order_by("mm.user_id", "desc");
				
        $result = $this->db->get();
        return $records = $result->row_array();
        // print_r($records);exit;
    }

    function getStateList($country_id) {
        $sql = "select * from mun_state_master order by state_name asc ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    #function to check whether the salesperson details are already enterd

    function check_salesperson_exist($name, $id = '') {
        $sql = "SELECT * FROM mun_master_genre WHERE genre_name='" . $name . "' ";

        if ($id) {
            $sql .= "and genre_id != " . $id;
        }

        $query = $this->db->query($sql);
        return($query->num_rows());
    }

    function add_new_salesperson($arr) {
        $this->db->insert('mun_salesperson_master', $arr);
        return $this->db->insert_id();
    }

    function add_member_address($id) {

        $usrAdd = array(
            'user_id' => $id,
            'street' => $this->input->post('street'),
            'city' => $this->input->post('city'),
            'state_id' => $this->input->post('state_id'),
            'zipcode' => $this->input->post('zipcode')
        );
        $id = $this->db->insert('mun_salesperson_address', $usrAdd);
        $id = $this->db->insert_id();
        return $id;
    }

    public function count_Sales_Users() {
        $key = $_REQUEST['key'] ? mysql_escape_string($_REQUEST['key']) : '';
        $qry = "select count(T1.user_id) as user_count,T2.*,T3.state_name from mun_salesperson_master T1 left join mun_salesperson_address T2
			ON T1.user_id=T2.user_id 
			left join mun_state_master T3 
			on T2.state_id=T3.state_id where 1";
        if ($key) {
            $qry .= " AND (T1.surname like '%$key%' OR T1.first_name like '%$key%' OR T1.email_address like '%$key%'  OR concat(T1.first_name,' ',T1.surname) like '%$key%' ) ";
        }

        $result = $this->db->query($qry);
        $records = $result->row_array();

        return $records["user_count"];
    }

    public function getAllSalesUsers($num = '0', $offset = '0') {
        if (trim($offset) == '')
            $offset = '0';
        $key = $_REQUEST['key'] ? mysql_escape_string($_REQUEST['key']) : '';
        $order_by_field = $_REQUEST['order_by_field'] = $_REQUEST['order_by_field'] ? $_REQUEST['order_by_field'] : 'T1.user_id';
        $order_by_value = $_REQUEST['order_by_value'] = $_REQUEST['order_by_value'] ? $_REQUEST['order_by_value'] : 'DESC';

        $qry = "select T1.*,T2.state_id,T2.street,T2.city,T2.zipcode,T3.state_name,T4.restaurant_name from mun_salesperson_master T1 left join mun_salesperson_address T2 on T1.user_id=T2.user_id 
		left join mun_state_master T3 
			on T2.state_id=T3.state_id
		left join mun_member_master T4
		on T1.restaurant_id=T4.user_id
			where 1";
        if ($key) {
            $qry .= " AND (T1.surname like '%$key%' OR T1.first_name like '%$key%' OR T1.email_address like '%$key%' OR concat(T1.first_name,' ',T1.surname) like '%$key%' ) ";
        }

        $qry .= " order by $order_by_field $order_by_value LIMIT $offset,$num";


        $result = $this->db->query($qry);
        $records = $result->result_array();
        return $records;
    }

    function deleteSalesperson($user_id) {
        $this->db->query("delete from mun_salesperson_master where user_id = '$user_id' ");
        $this->db->query("delete from mun_salesperson_address where user_id = '$user_id' ");

        return true;
    }

    function update_salesperson($arr, $id = '') {
        $this->db->where('user_id', $id);
        $rs = $this->db->update('mun_salesperson_master', $arr);
        return $rs;
    }

    function update_salesperson_details($usrArr, $lat, $long, $user_id) {
        $this->db->where('user_id', $user_id);
        $rs = $this->db->update('mun_salesperson_master', $usrArr);

        return $rs;
    }

    function update_salesperon_address($id) {

        $usrAdd = array(
            'street' => $this->input->post('street'),
            'city' => $this->input->post('city'),
            'state_id' => $this->input->post('state_id'),
            'zipcode' => $this->input->post('zipcode')
        );
        $this->db->where('user_id', $id);
        $rs = $this->db->update('mun_salesperson_address', $usrAdd);
        return $rs;
    }

    public function get_salesperson_details($id) {
        $qry = "select T1.*,T2.state_id,T2.street,T2.city,T2.zipcode,T3.state_name,T4.restaurant_name
					from mun_salesperson_master T1 left join mun_salesperson_address T2 
					on T1.user_id=T2.user_id 
					left join mun_state_master T3 
					on T2.state_id=T3.state_id
					left join mun_member_master T4
					on T1.restaurant_id=T4.user_id
					where T1.user_id='$id'";

        $res = $this->db->query($qry);
        $row = $res->row_array();
        return $row;
    }

    #function to check whether the agent exist
    function check_member_exist($email='') {
        $sql = "SELECT * FROM in_member_master WHERE email_address='" . $email . "'";
		
        $query = $this->db->query($sql);
        return($query->num_rows());
    }
		function getPackages()
	{
		 $result 	=   $this->db->get('membership_packages');
		 return $result->result_array();	
	}

}

//endof class Member_model


	
	
