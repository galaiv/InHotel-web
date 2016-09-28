<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings_model extends CI_Model {

    function __construct() 
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	
	function getAllConfigValues()
	{
	  $qry	=	"select * from config  where active ='Y' and title != '' and field != ''";
	  $result	=	$this->db->query($qry);
	  $results	=	$result->result_array();
		return $results;
	}	
	
	function getEditableConfigValues()
	{
	  $qry	=	"select * from config  where editable ='Y' and title != '' and field != '' and active='Y'";
	  $result	=	$this->db->query($qry);
	  $results	=	$result->result_array();
		return $results;
	}	
	function update_preference($field,$field_value)
	{
		$qry	=	"UPDATE config set `value`='$field_value' where `field`='$field'";
		$this->db->query($qry);
		return true;
	}
	public function getlatlon_local($key=''){
		if($key!=''){
			$sql="select latitude as lat, longitude as lon from `lat_long_master` where `key` like '%".$key."%'";	
			$ras=$this->db->query($sql);
			if($ras){
				$rs=$ras->row_array();
				return $rs;
			}
			$data=array();
		}
		return false;
	}		
}
?>