<?php
class Login_model extends CI_Model {
	function check($username,$pass)
	{
		$pass=$pass;
		$query=$this->db->get_where('in_admin_user',array('username'=>$username ,'password'=>$pass));
		
		if($query->num_rows()>0)			
			{
				return $query->row();
			}
		else
			{			
				return FALSE;
			}	
	}
	
	function validateAdminEmail($email)
	{		
		$query=$this->db->get_where('in_admin_user',array('email'=>$email));
		
		if($query->num_rows()>0)
		{
			return $query->row();
		}
		else
		{
			return FALSE;
		}
	}
	
	function sendAdminPassword($email)
	{
		$query=$this->db->get_where('in_admin_user',array('email'=>$email));
		
		$to_email=$email;
		
		if($query->num_rows()>0)
		{
			$result =  $query->row();
			$from_email ='InHotel';
			$uname=$result->username;
			$pwd=$result->password;	
			
			$logo=base_url()."public/images/logo.png";

			 $config['mailtype']	 =		    'html';
             $config['charset']	 	 = 		    'utf-8';
             //$config['crlf'] 		 = 		    PHP_EOL;
             //$config['newline']    = 		    PHP_EOL;
		   
             $this->load->library('email');
             $this->email->initialize($config);
		   
		     $email		  		 	 = 			$this->get_emailByid(1);
		     $message 			 	 = 			$email['email_template'];
			 $message	 			 = 			str_replace('#LOGO#',$logo, $message);
			 $message	 			 = 			str_replace('#URL#',base_url(), $message);
             $message	 			 = 			str_replace('#USERNAME#',$uname, $message);
             $message				 = 			str_replace('#PASSWORD#', $pwd, $message);
		   
		     $this->email->from($from_email);
             $this->email->to($to_email);
             $this->email->subject($email['email_subject']);
             $this->email->message($message);
		     $this->email->send();
			 
	         return true;
		}
	   else
	       	return false;	
	}
	
	function get_emailByid($id){
	     $this->db->where('email_id',$id);
		 $result 	=   $this->db->get('in_email_config');
		 return $result->row_array();	
	}
		
	function password(){
		/*$session_data = $this->session->userdata('logged_in');
		$uname = $session_data['username'];*/
		$old=$_POST['old_pass'];
		$new=$_POST['new_pass'];
		$confirm=$_POST['confirm_pass'];
		$query_sel="select * from in_admin_user where password='$old'";		
		$res_sel=mysql_query($query_sel);
		$dd=mysql_fetch_array($res_sel);
		$un=$dd['password'];
		if(!empty($un)){
		if($new==$confirm)
		{
			$query="update in_admin_user set password='$new'";
			$res=mysql_query($query);
			return true;
		}
		return "wrongc";
		}
		else{
			return false;
		}
	}	
	
	function change_email()
	{	
	 $email=$_POST['email'];
	 $this->db->query("update in_admin_user set email='$email'");
	 return true;
	}
        
    function getmail(){
        $sql="select email from am_in_admin_user";
		$query	=	$this->db->query($sql);
		$result	=	$query->row();
			return $result->email;
    }
    
    function getAdminUserDetails()
	{
		$query_sel="select * from in_admin_user ";
		$query	=	$this->db->query($query_sel);
		$result = $query->row_array();
		return $result;	
	}
	
	function updateAdminUserDetails($arr)
	{		
		$data = array(
				'email'	=> trim($arr['admin_email']),
				'name'=> trim($arr['admin_name']),	
                 //   'per_page'=> trim($arr['per_page']),
			);			
		$this->db->where('id','1');
	  	$this->db->update('in_admin_user',$data);			
		return true;
	}
		
	/*function getAdminUserDetails()
	{
		$query_sel="select * from in_admin_user ";
		$query	=	$this->db->query($query_sel);
		$result = $query->row_array();
		return $result;	
	}
	
	function updateAdminUserDetails($arr)
	{		
		$data = array(
				'email'	=> trim($arr['admin_email']),
				'name'=> trim($arr['admin_name']),	
                    'per_page'=> trim($arr['per_page']),
			);			
		$this->db->where('id','1');
	  	$this->db->update('in_admin_user',$data);			
		return true;
	}*/
} 
?>