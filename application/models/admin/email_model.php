<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  

class Email_model extends CI_Model {

    function __construct() 
    {
        // Call the Model constructor
        parent::__construct();
    }
	function get_email_count()
	{
		$this->db->where('status','Y');
		$qry	=	"SELECT count(*) as row_count from email_config WHERE status = 'Y'";
		$query  =   $this->db->query($qry);
		$out    =   $query->row_array();		
		return $out["row_count"] ;
	}
	function get_email_list($num, $offset){
	  $this->db->where('status','Y');
	  $this->db->order_by("email_id", "asc");
	  $result = $this->db->get('email_config', $num , $offset);
	  $out = $result->result_array();
	  return $out;
	}
	//get email templates
	function get_emails(){
		 $result 	=   $this->db->get('email_config'); 
		 return $result->result_array();
	}
	
	function get_email_id($name){
	     $this->db->where('name',$name);
		 $result 	=   $this->db->get('email_config');
		 return $result->row_array();	
	}
	function get_emailByid($id){
	     $this->db->where('email_id',$id);
		 $result 	=   $this->db->get('email_config');
		 return $result->row_array();	
	}	
	function update_email($arr,$cmsid){
	    $this->db->where('email_id', $cmsid);
		$this->db->update('email_config',$arr);
	
	}
	function get_email_by_name($name){
	     $this->db->where('name',$name);
		 $result 	=   $this->db->get('email_config');
		 return $result->row_array();	
	}	
	
}//end of email model