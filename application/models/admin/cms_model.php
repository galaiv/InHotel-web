<?php

class Cms_model extends CI_Model { 

    public function __construct() {
	
        $this->load->database(); 
    }
	
	
    public function countPages($mem_type) {
        $sql= "select * from cms ";
		
        $result = $this->db->query($sql);
        $count = $result->num_rows();

        return $count;
    }

	






    public function getPages($num = '0', $offset = '0', $key = '') {
        if (trim($offset) == '')
            $offset = '0';
       $sql ="select * from cms where 1 ";
	   $sql.=" order by id desc";
                
		$sql				.= " LIMIT $offset,$num";
     

        $result = $this->db->query($sql);
        $records = $result->result_array();
        return $records;
    }

  

function get_cms_id($name){
	     $this->db->where('id',$name);
		 $result 	=   $this->db->get('cms');
		 return $result->row_array();	
	}
  
   function update_cms($arr,$cmsid){
	    $this->db->where('id', $cmsid);
		$this->db->update('cms',$arr);
	
	}

    

 
	
		
}

//endof class Member_model


	
	
