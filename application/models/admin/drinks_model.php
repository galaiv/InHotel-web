<?php

class drinks_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_drinks_details($id) {
        $this->db->select('dm.*,hp.title as hotel_title')
                ->from('drinks_master dm')
                ->join('hotel_profile hp', 'hp.id=dm.hotel_id')
                ->where('dm.id', $id);
        $qry = $this->db->get();
        return $qry->row_array();
    }

    function update_drinks($arr, $id = '') {
        if ($id != "") {
            $this->db->where('id', $id);
            $this->db->update('drinks_master', $arr);
            return $id;
        } else {
            $this->db->insert('drinks_master', $arr);
            $id = $this->db->insert_id();
            return $id;
        }
    }

    // unlink the drinks image
    function unlinkImage($id) { 
        $query = $this->db->get_where('drinks_master', array('id' => $id));
        $rs = $query->row_array();
        if ($rs) {
            $image_path = 'upload/drinks/'. $rs['image'];
          $image_path_thumb = 'upload/drinks/thumb/'. $rs['image'];
            if (is_file($image_path)) {
                unlink($image_path);
            }
            if (is_file($image_path_thumb)) {
                unlink($image_path_thumb);
            }
        }
    }

    function delete_drinks($drinks_id) {
        $this->db->where('id', $drinks_id)
                ->delete('drinks_master');
        return true;
    }

   

    public function count_drinks() {
        $key = $_REQUEST['key'] ? $_REQUEST['key'] : '';  
        $key =$this->db->escape_str($key);
         $hotel_id =$this->db->escape_str($_REQUEST['hotel']);
        $this->db->select('count(dm.id) as drinks_count')
                ->from('drinks_master dm')  
                ->join('hotel_profile hp', 'hp.id=dm.hotel_id');
                  if ($hotel_id) {
            $this->db->where("dm.hotel_id", $hotel_id);
        }
                 
        //   ->join('user_master um', 'um.user_id=ga.user_id');
        if ($key) {
            $this->db->where("(dm.title like '%".$key."%' OR dm.description like '%".$key."%')");
        }
        $qry = $this->db->get();
        $records = $qry->row_array();

        return $records["drinks_count"];
    }

    public function getAllDrinks($num = '0', $offset = '0') {
        if (trim($offset) == '')
            $offset = '0';
        $key = $_REQUEST['key'] ? $_REQUEST['key'] : '';
        $key = $_REQUEST['key'] ? $_REQUEST['key'] : '';
        $hotel_id =$this->db->escape_str($_REQUEST['hotel']);
          $key =$this->db->escape_str($key);
        $this->db->select('dm.*,hp.title as hotel_title')
                ->from('drinks_master dm')
                ->join('hotel_profile hp', 'hp.id=dm.hotel_id');
        if ($hotel_id) {
            $this->db->where("dm.hotel_id", $hotel_id);
        }
                  $this->db->order_by('date_time','desc');
        if ($key) {
               $this->db->where("(dm.title like '%".$key."%' OR dm.description like '%".$key."%')");
        }
        $this->db->limit($num, $offset);
        //   $qry .= "  LIMIT $offset,$num";


        $qry = $this->db->get();
        $records = $qry->result_array();      
        return $records;
    }

    function get_all_business_list($arr) {
        $this->db->select('id,title')
                ->from('hotel_profile');
        $qry = $this->db->get();
        return $qry->result_array();
    }
public function getAllHotels(){
           $this->db->select('hp.*,hp.title as hotel_title')
                ->from('hotel_profile hp')
                ->join('in_member_master imm','imm.user_id=hp.user_id')
                ->where(array('imm.active'=>'Y','imm.deleted'=>'N'));
       $qry =$this->db->get();
    return  $qry->result_array();
   }
}
//endof class event_model


	
	
