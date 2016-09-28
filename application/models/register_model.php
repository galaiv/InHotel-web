<?php

class Register_model extends CI_Model { 

    public function __construct() 
	{
        $this->load->database();
    }
	
	   
	function checkEmailExist($email)
	{
		$sql = "select email_address from  in_member_master where email_address = '$email'  ";
		$query	=	$this->db->query($sql);	
		$result	=	$query->row_array();//echo $this->db->last_query();exit;
		if($result['email_address'])
			return "Y";
		else	
			return "N";
	}
	
	public function userRegistration($data)
	{     
        $this->db->insert('in_member_master',$data);
	    return $this->db->insert_id();
		//echo $this->db->last_query();
    }
	public function hotel_profile_updation($data)
	{     
        $this->db->insert('hotel_profile',$data);	
		return $this->db->insert_id();
    }
	function get_hotel_profile($hotel_id)
	{
		$sql = "select hotel_profile.* from  hotel_profile where id = '$hotel_id'  ";
		$query	=	$this->db->query($sql);	
		$result	=	$query->row_array();//echo $this->db->last_query();exit;
		return $result;
	}
	   public function save_zone($hotel_id) {
        $zones = $this->getAllzones();
        foreach ($zones as $zones){ 
            $data=array(
                'hotel_id' =>$hotel_id,
                'zone_id' =>$zones['id']
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
	
	 function get_emailByid($id)
	{
	     $this->db->where('email_id',$id);
		 $result 	=   $this->db->get('email_config');
		 return $result->row_array();	
	}
	
	function check_member_login($username,$pass)
	{
		
	
		$sql="SELECT imm.*,imm.hotel_id as staff_hotel_id,hp.id as hotel_id FROM in_member_master imm left join hotel_profile hp on imm.user_id=hp.user_id  WHERE imm.email_address='$username'   AND imm.password=md5('$pass') and imm.member_type!=1 and imm.deleted='N'";
		
		$query	=	$this->db->query($sql);	
		
		if($query->num_rows()>0)
			{
				$sql="select imm.*,imm.hotel_id as staff_hotel_id,hp.id as hotel_id from in_member_master imm left join hotel_profile hp on imm.user_id=hp.user_id   where imm.email_address='$username'  and imm.password=md5('$pass') and imm.member_type!=1";
			
				$query	=	$this->db->query($sql);	
				$result	=	$query->row_array();
				return $result;
			}
		else
			{
			
				return false;
			}
	
	}
	
	function getPackages()
	{
		 $result 	=   $this->db->get('membership_packages');
		 return $result->result_array();	
	}
	
	function user_details($id)  
	{
		 $this->db->where('user_id',$id);
		 $result 	=   $this->db->get('in_member_master');
		 return $result->row_array();	
	}
	
	function getMembershipPackageByid($pack_id)
	{
		 $this->db->where('package_id',$pack_id);
		 $result 	=   $this->db->get('membership_packages');
		 return $result->row_array();	
	}
	function updateMembershipDetails($arr,$user_id)
	{
		 $this->db->where('user_id',$user_id);
	  	 $this->db->update('in_member_master',$arr);
	     return $hub_id = $this->db->insert_id(); 
	}
	function updateMembershipRenewDetails($arr,$user_id)
	{
		 $this->db->where('user_id',$user_id);
	  	 $this->db->update('renew_membership_details',$arr);
	     return $hub_id = $this->db->insert_id(); 
	}
	public function updateMembershipRenewDetailsSignup($data){
         	$this->db->insert('renew_membership_details', $data);
			return $ID = $this->db->insert_id();
    }
	public function get_expiry_users($date) {
        $qry = "SELECT  T1.*,T2.* FROM renew_membership_details AS T1 
                        JOIN in_member_master T2 ON T1.user_id =T2.user_id
						WHERE T2.active='Y' AND T1.deleted='N' AND T2.member_type=2 AND
						T1.expiry_date = DATE_ADD(DATE(NOW()), INTERVAL 7 DAY)
 						AND T1.user_id NOT IN (SELECT T3.user_id  FROM renew_membership_details AS T3 
						JOIN in_member_master T4 ON T3.user_id =T4.user_id WHERE T4.active='Y' AND T4.member_type=2  AND 
                        T3.expiry_date > DATE_ADD(DATE(NOW()), INTERVAL 7 DAY))";
						 
        $result = $this->db->query($qry); //echo $this->db->last_query();exit;
        $records = $result->result_array();
        return $records;
    }
	public function get_expiry_users1($date) {
        $qry = "SELECT  T1.*,T2.* FROM renew_membership_details AS T1 
                        JOIN in_member_master T2 ON T1.user_id =T2.user_id
						WHERE T2.active='Y' AND T1.deleted='N' AND T2.member_type=2 AND
						T1.expiry_date = DATE_ADD(DATE(NOW()), INTERVAL 1 DAY)
 						AND T1.user_id NOT IN (SELECT T3.user_id  FROM renew_membership_details AS T3 
						JOIN in_member_master T4 ON T3.user_id =T4.user_id WHERE T4.active='Y' AND T4.member_type=2  AND 
                        T3.expiry_date > DATE_ADD(DATE(NOW()), INTERVAL 1 DAY))";
						 
        $result = $this->db->query($qry); //echo $this->db->last_query();exit;
        $records = $result->result_array();
        return $records;
    }
	public function get_expiry_users2($date) {
        $qry = "SELECT  T1.*,T2.* FROM renew_membership_details AS T1 
                        JOIN in_member_master T2 ON T1.user_id =T2.user_id
						WHERE T2.active='Y' AND T1.deleted='N' AND T2.member_type=2 AND
						T1.expiry_date = DATE(NOW())
 						AND T1.user_id NOT IN (SELECT T3.user_id  FROM renew_membership_details AS T3 
						JOIN in_member_master T4 ON T3.user_id =T4.user_id WHERE T4.active='Y' AND T4.member_type=2  AND 
                        T3.expiry_date > DATE(NOW()))";
						 
        $result = $this->db->query($qry); //echo $this->db->last_query();exit;
        $records = $result->result_array();
        return $records;
    }
	   public function getAllSubscribers() {
        $this->db->distinct('mm.user_id', TRUE);
        $this->db->select('mm.user_id,rmd.transaction_id,rmd.days,rmd.amount,rmd.renew_membership_package_id');
        $this->db->from("in_member_master mm");
        $this->db->join("renew_membership_details rmd", "mm.user_id=rmd.user_id", "right");
        $this->db->where(array("mm.subscription_status" => 'Y', "rmd.transaction_id !=" => "", "rmd.expiry_date" => (date("Y-m-d", strtotime('-1 days')))));
        $this->db->order_by("rmd.id", "DESC");
        $res = $this->db->get();
        //echo $this->db->last_query();
        return $res->result_array();
    }
	
    public function subscription_status_change($user_id, $status) {
       // echo $user_id;exit;
        $this->db->where("user_id", $user_id);
        $this->db->update("in_member_master", array("subscription_status" => $status));
		//echo $this->db->last_query();exit;
    }
    public function check_membership_renewed($user_id) {
        $sql ="SELECT * FROM in_member_master m JOIN renew_membership_details r ON m.user_id =r.user_id
 WHERE r.user_id=$user_id AND m.user_id=$user_id AND (m.subscription_status='Y' OR
  (DATE_FORMAT(DATE(NOW()),'%Y-%m-%d')<= (SELECT DATE_FORMAT(DATE(expiry_date) ,'%Y-%m-%d') FROM renew_membership_details WHERE user_id=$user_id AND expiry_date!='' ORDER BY expiry_date ASC LIMIT 1))) 
ORDER BY r.expiry_date DESC LIMIT 1";
        $query = $this->db->query($sql);//echo $this->db->last_query();exit;
        return $query->row_array();
    }

    public function check_membership_renewed_byhotel($hotel_id) {
		 $this->db->where('id',$hotel_id);
		 $result 	=   $this->db->get('hotel_profile');
		 $hotel_details =  $result->row_array();	
		 $user_id = $hotel_details['user_id'];
		
        $sql ="SELECT * FROM in_member_master m JOIN renew_membership_details r ON m.user_id =r.user_id
 WHERE r.user_id=$user_id AND m.user_id=$user_id AND (m.subscription_status='Y' OR
  (DATE_FORMAT(DATE(NOW()),'%Y-%m-%d')<= (SELECT DATE_FORMAT(DATE(expiry_date) ,'%Y-%m-%d') FROM renew_membership_details WHERE user_id=$user_id AND expiry_date!='' ORDER BY expiry_date ASC LIMIT 1))) 
ORDER BY r.expiry_date DESC LIMIT 1";
        $query = $this->db->query($sql);//echo $this->db->last_query();exit;
        return $query->row_array();
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
	    function getUserIDFromEmail($email) {
        $query = $this->db->get_where('in_member_master', array('email_address' => $email, 'deleted' => 'N'));
        $rs = $query->row_array();
        return $rs['user_id'];
    }
	   public function updateUserPassword($arr, $user_id) {
        $this->db->where('user_id', $user_id)
                ->update('in_member_master', $arr);
    }



	
}




	
	
