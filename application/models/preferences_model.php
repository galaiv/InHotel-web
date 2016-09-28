<?php
class preferences_model extends CI_Model { 

	public function __construct()
	{
		$this->load->database();
	}
	public function update_preferences($preferences){

		foreach($preferences as $pref){
		
			$data			=   array();
			$cond			=   array();
			
			$field			=	$pref['field'];
			
			$data['value']	=	$_POST[$field];
			$cond['field']	=	$field;

			$flg			=	$this->db->update("config", $data,$cond);
			
		}
		//print_r($_POST);exit;
		return true;
		
	}
	public function get_preferences(){
	
		$sql	=	"select * from config  where editable='Y'";
		$result	=	$this->db->query($sql);
		return $result->result_array();	
	}
	
	public function get_title_and_Description()
	{
		$sql	=	"select * from config  where field='home_title' AND field='home_description' ";
		$result	=	$this->db->query($sql);
		return $result->result_array();	
	
	}
	
}
?>