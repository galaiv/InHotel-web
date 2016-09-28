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




	
	
