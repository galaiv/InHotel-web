<?php

class staff_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function count_staff_list($hotel_id) {
        $key = $_REQUEST['key'] ? $_REQUEST['key'] : '';
        $key = $this->db->escape_str($key);
        $this->db->select('count(*) as mem_count')
                ->from('in_member_master mm')
				->where(array('mm.deleted' => 'N','mm.hotel_id' => $hotel_id,'mm.member_type' => '3'));
        $qry = $this->db->get();
        $records = $qry->row_array();
       return $records["mem_count"];
    }

    public function getAllStaffList($hotel_id,$num = '0', $offset = '0') { 
        if (trim($offset) == '')
            $offset = '0';

        $this->db->select('mm.*')
                ->from('in_member_master mm')
				->where(array('mm.deleted' => 'N','mm.hotel_id' => $hotel_id,'mm.member_type' => '3'));

        $this->db->order_by('mm.user_id', 'desc')
                ->limit($num, $offset);


        $qry = $this->db->get();
        $records = $qry->result_array();
		//echo $this->db->last_query();

        return $records;
    }
public function checkEmailExist($email,$id){

        $this->db->select('mm.*');
        $this->db->where("email_address = '$email' and user_id !='$id' and deleted ='N'  ");
        $this->db->from('in_member_master mm');
        $qry = $this->db->get();
        $row = $qry->row_array();//echo $this->db->last_query();	exit;
		if($row['user_id'] != "")
		{
			return "Y";
		}
		else	
		{	
		  return "N";
		}
}
public function getUserIdByAccessMemberId($id){
    $this->db->select('user_id')
            ->from('access_members')
            ->where(array('id'=>$id,'active'=>'Y'));
     $qry = $this->db->get();
        $row = $qry->row_array();
        return $row['user_id'];
}
       public function getAllHotels() {
          $this->db->select('hp.*,hp.title as hotel_title')
                ->from('hotel_profile hp')
                ->join('in_member_master imm','imm.user_id=hp.user_id')
                ->where(array('imm.active'=>'Y','imm.deleted'=>'N'));
        $qry = $this->db->get();
        return $qry->result_array();
    }
	
public function get_member_details($id)
	{
		 $this->db->select('mm.*')
                ->from('in_member_master mm')
                ->where(array('mm.deleted' => 'N', 'mm.user_id' => $id))
				->order_by("mm.user_id", "desc");
				
        $result = $this->db->get();
        return $records = $result->row_array();
		}
		//creat staff
	function create_staff($arr)
	{
	   if($this->db->insert('in_member_master',$arr))
	    return $this->db->insert_id();

	}
	//update staff
	function update_staff($arr='',$id)
	{
	  $this->db->where('user_id',$id);
	  $this->db->update('in_member_master',$arr);
	  $hub_id = $this->db->insert_id(); 
	  //echo $this->db->last_query();exit;
	   return  $id;
	  
	}
	   // Get Email ID
    function get_emailByid($id) {
        $this->db->where('email_id', $id);
        $result = $this->db->get('email_config');
        return $result->row_array(); 
		 //echo $this->db->last_query();exit;
    }
	//function to get hospital details
		function get_hotel_details($hotel_id)
	{  // echo "dfsdf";exit;
		$this->db->select('hp.*,imm.email_address');
        $this->db->join('in_member_master imm', 'hp.user_id=imm.user_id', 'left');
		$this->db->where('hp.id', $hotel_id);
        $this->db->from('hotel_profile hp');
        $qry = $this->db->get();
        $row = $qry->row_array();//echo $this->db->last_query();	exit;
        return $row;
	
	}
	//update settings
	function update_hotel_details($arr='',$id)
	{
	  $this->db->where('id',$id);
	  $this->db->update('hotel_profile',$arr);
	 $hotid = $this->db->insert_id(); 
	  return  $hotid;
	  
	}
	//function to change password	
	 function change_password($uid)
	 {		
	     $old		=	mysql_escape_string($_POST['old_password']);	
		 $new		=	mysql_escape_string($_POST['password']);
		 $confirm	=	mysql_escape_string($_POST['conf_password']);
		 $query 	=   $this->db->get_where('in_member_master', array('user_id' => $uid,'password' => md5($old)));
		 $result	=   $query->row_array();
		 $un	 	=   $result['user_id'];	//echo $this->db->last_query();	exit;
		 if($un == "")
		 {
		 	return "notexist";
		 }
		 if($new==$confirm && $un==$uid)
		 {
		   $this->db->where('user_id',$uid);
	       $this->db->update('in_member_master',array('password' => md5($new)));
			return "success";
		 }
		 else
		 {
			return "fail";
		 }
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
    //get hotel feedbacks
	function feedback_details($hotel_id,$limit,$pageno)
	{
	   $this->db->select("HE.*,UM.first_name,UM.last_name,UM.image");
		$this->db->where('HE.hotel_id', $hotel_id);
        $this->db->join('in_member_master UM','UM.user_id = HE.user_id','left');
		$this->db->from('hotel_experience HE');
		$this->db->order_by("HE.date_time", "DESC");
		$this->db->limit($limit,$pageno);
		$query = $this->db->get();
		$notifications  = $query->result_array();
		return $notifications;
	}
	   //get hotel feedbacks
	function get_feedback_details($id)
	{
	   $this->db->select("HE.*,UM.first_name,UM.last_name,UM.image");
		$this->db->where('HE.id', $id);
        $this->db->join('in_member_master UM','UM.user_id = HE.user_id','left');
		$this->db->from('hotel_experience HE');
		$query = $this->db->get();
		$notifications  = $query->row_array();
		return $notifications;
	}
	
		// get cout of feedbacks
	function feedback_count($hotel_id)
   {
        $this->db->select("HE.*,UM.first_name,UM.last_name,UM.image");
		$this->db->where('HE.hotel_id', $hotel_id);
        $this->db->join('in_member_master UM','UM.user_id = HE.user_id','left');
		$this->db->from('hotel_experience HE');
		$query = $this->db->get();
		$notifications  = $query->result_array();
		return count($notifications);
    }
	//get feedback details
	function get_orders_details($order_id)
	{		
	 $this->db->select("NO.*,UM.first_name as from_first_name,UM.last_name as from_last_name,UM.image,UM1.first_name as to_first_name,UM1.last_name as from_last_name,dm.title as drink_title");
		$this->db->where('NO.id', $order_id);
        $this->db->join('in_member_master UM','UM.user_id = NO.from_user','left');
		$this->db->join('in_member_master UM1','UM1.user_id = NO.to_user','left');
	    $this->db->join('drinks_master dm', 'dm.id=NO.drinks_id', 'left');
		$this->db->from('notify_order NO');
        $query = $this->db->get();
		$notifications  = $query->row_array();
		return $notifications;
	}
	//get order notificatios details
	function orders_count($hotel_id)
	{
		$this->db->select("NO.*,UM.first_name as from_first_name,UM.last_name as from_last_name,UM.image,UM1.first_name as to_first_name,UM1.last_name as from_last_name,dm.title as drink_title");
		$this->db->where('NO.hotel_id', $hotel_id);
        $this->db->join('in_member_master UM','UM.user_id = NO.from_user','left');
		$this->db->join('in_member_master UM1','UM1.user_id = NO.to_user','left');
	    $this->db->join('drinks_master dm', 'dm.id=NO.drinks_id', 'left');
		$this->db->from('notify_order NO');
		$query = $this->db->get();
		$notifications  = $query->result_array();
		return count($notifications);
	}
	 //get hotel feedbacks
	function hotel_orders($hotel_id,$limit,$pageno)
	{
	    $this->db->select("NO.*,UM.first_name as from_first_name,UM.last_name as from_last_name,UM.image,UM1.first_name as to_first_name,UM1.last_name as from_last_name,dm.title as drink_title");
		$this->db->where('NO.hotel_id', $hotel_id);
        $this->db->join('in_member_master UM','UM.user_id = NO.from_user','left');
		$this->db->join('in_member_master UM1','UM1.user_id = NO.to_user','left');
		$this->db->join('drinks_master dm', 'dm.id=NO.drinks_id', 'left');
		$this->db->from('notify_order NO');
		$this->db->order_by("NO.date_time", "DESC");
		$this->db->limit($limit,$pageno);
		$query = $this->db->get();
		$notifications  = $query->result_array();
		return $notifications;
	}
	//get hotel zone list
	  public function get_hotel_zone_details($hotel_id) {
          $this->db->select('mhz.*,hz.zone_name')
                ->from('map_hotel_zone mhz')
                ->join('hotel_zone_list hz','hz.id=mhz.zone_id')
                ->where(array('hz.active'=>'Y','mhz.hotel_id'=>$hotel_id));
        $qry = $this->db->get();
        return $qry->result_array();
    }
	//get zone list
	  public function zone_list() {
          $this->db->select('hz.*')
                ->from('hotel_zone_list hz')
                ->where(array('hz.active'=>'Y'));
        $qry = $this->db->get();
        return $qry->result_array();
    }
	public function editHotelZone($hotel_zones,$hotel_id)
	{
		$this->db->query("delete from map_hotel_zone where hotel_id = '$hotel_id' ");
		
		if($hotel_zones[0] != '')
		{
			foreach($hotel_zones as $zons)
			{
				$arr = array('hotel_id' => $hotel_id,'zone_id' => $zons);
				$this->db->insert('map_hotel_zone', $arr);
				unset($arr);
			}
		}
		return true;
		
	}
	
	public function checkzoneidinhotel($hotel_id,$zone_id)
	{ //echo $zone_id;exit;
		$this->db->select('mm.*');
        $this->db->where("hotel_id = '$hotel_id' and zone_id ='$zone_id'  ");
        $this->db->from('map_hotel_zone mm');
        $qry = $this->db->get();
        $row = $qry->row_array();//echo $this->db->last_query();	exit;
		if($row['id'] != "")
		{
			return "Y";
		}
		else	
		{	
		  return "N";
		}
	}
}

//endof class Member_model


	
	
