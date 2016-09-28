<?php
class Question_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();

	}

	#function to delete category
	function delete_category($category_id)
	{
		$this->db->query("delete from cp_category where category_id = '$category_id' ");
		
		return true;
	}
	
	function getAdminUserDetails()
	{
		$query_sel="select name from " .  . "in_admin_user ";
		$query	=	$this->db->query($query_sel);
		$result = $query->row_array();
		return $result;	
	}
	
	#function to get count of all questions
	public function count_Questions($type)
    {
		$key = $_REQUEST['key']?$_REQUEST['key']:'';
		$qry	=	"select count(T1.id) as question_count FROM roto_question T1 where league_type='$type'";
		if($key)
		{
			$qry .= " AND (T1.question like '%$key%') ";
		}
		
		 $result = $this->db->query($qry);	
		 $records = $result->row_array();	
			
		return $records["question_count"];
    }
	
	public function getplayers($league_type){
		$qry	=	"select name,id FROM roto_player_master where league_type = '$league_type'";
		$result = $this->db->query($qry);	
		$records = $result->result_array();	
			
		return $records;
	}
	
	
	public function add_comments($arr)
	{
		$ql = $this->db->select('question_id')->from('roto_question_comments')->where('user_id',$arr['user_id'])->where('question_id',$arr['question_id']);
		
		$query		=		$this->db->query($ql);
		
		

		if( $query->num_rows() > 0 ) {
			
		 $this->db->where('user_id', $arr['user_id']);
		 $this->db->where('question_id', $arr['question_id']);
         $update = $this->db->update('roto_question_comments', $arr);
			
		} else { 
   			 
			 
			
			$this->db->insert('roto_question_comments', $arr);
		}	
		return;
		
		
	}
	
	
	
	#function to list all questions
	 public function getAllQuestions($num='0',$offset='0',$type){
		 if(trim($offset) == '')
		 	$offset	=	'0';
		$key = $_REQUEST['key']?$_REQUEST['key']:'';
		$order_by_field = $_REQUEST['order_by_field'] = $_REQUEST['order_by_field']?$_REQUEST['order_by_field']:'T1.id';
		$order_by_value = $_REQUEST['order_by_value'] = $_REQUEST['order_by_value']?$_REQUEST['order_by_value']:'DESC';
		
		$qry	=	"select * FROM roto_question T1 where league_type='$type'";
		if($key)
		{
		$qry .= " AND (T1.question like '%$key%') ";
		}

		$qry	.=	" order by $order_by_field $order_by_value LIMIT $offset,$num";
	  	$result = $this->db->query($qry);	
		$records = $result->result_array();		
		return $records;
	}
	
	public function favouritePolls($arr) {
		$this->db->insert( . 'favourite_polls', $arr);
        return $this->db->insert_id();
	}
	
	public function unfavouritePolls($arr) {	
		$this->db->delete( . 'favourite_polls', $arr);
		return $this->db->affected_rows();
	}
	
     function getPollFullDetails($id)
	 {
	 
	 $sql = "select * from roto_question where id='$id' ";
		
		
		$query = $this->db->query($sql);
		
		
		return $query->row_array();			
	 
	 }	
	
	
	
	
			
	#get question details 
	function getQuestionFullDetails($type)
	{
		$sql = "select * from roto_question where league_type='$type' and active='Y'  ";
		
		
		$query = $this->db->query($sql);
		
		
		return $query->result_array();		
	}
	
	
	function getMyQuestionFullDetails($user_id)
	{
		$sql = "select * from roto_question where  active='Y' and added_by = '$user_id'  ";
		
		
		$query = $this->db->query($sql);
		
		
		return $query->result_array();		
	}
	
	
	
	function getQuestionFullDetailsByUser($type,$user_id)
	{
	$sql = "select * from roto_question where league_type='$type' and active='Y' and added_by='$user_id' ";
	$query = $this->db->query($sql);
	return $query->result_array();		
	}

	
	function getOptions($question_id)
	{
	
		$sql = "select * from roto_question_option where question_id='$question_id'";
		$query = $this->db->query($sql);
		$value = $query->result_array(); //print_r($value); exit;
		if(is_numeric($value[0][option]))
		{	$user_id = $value[0]['option'];
			$sql = "select * from roto_player_master where id='$user_id'";
			$query = $this->db->query($sql);
			$player1 = $query->row_array();
			$user_id = $value[1]['option'];
			$sql = "select * from roto_player_master where id='$user_id'";
			$query = $this->db->query($sql);
			$player2 = $query->row_array();
			$value1['p1'] = $player1;
			$value1['p1']['type'] = "image";
				
			$value1['p1']['image']=base_url()."upload/thumbs/player/".$player1['image'];
			$value1['p2'] = $player2;
			
			$value1['p2']['type'] = "image";
			$value1['p2']['image']=base_url()."upload/thumbs/player/".$player2['image'];
			
		}
		
		else
		{
		
		$value1['p1']['type'] = "yesorno";
		$value1['p2']['type'] = "yesorno";
		$value1['p1']['value1'] = $value[0]['option'];
		$value1['p2']['value2'] = $value[1]['option'];
		}
		return $value1;
		
	}
	
	function getComments($question_id)
	{
		$sql = "select a.*,b.name from roto_question_comments a, roto_player_master b where question_id='$question_id' and a.user_id = b.id ";
		$query = $this->db->query($sql); 
		return $query->result_array();
	
	}
	
	function getpollpercent($question_id,$opt)
	{
		$sql = "select count(a.id) as count from roto_polls_count a where a.question_id='$question_id' and a.option = '$opt'";
		$query = $this->db->query($sql); 
		$val = $query->row_array();
		return $val;
	}
	
	function getcountusers()
	{
		$sql = "select count(*) as count from roto_player_master ";
		$query = $this->db->query($sql); 
		$val = $query->row_array();
		return $val;
	} 
	
	
	#add new question /edit 
	function add_new_question($league_type)
	{
			
		$id		    =			$_REQUEST['question_id'];
		
		$arr 		= array(
							'question' => $_REQUEST['question'],
							'league_type' => $league_type,
							'added_date'  => date("Y-m-d H:i:s")
							);
		
		
		if($id){
			
			 $this->db->where('id',$id);
			 $this->db->update('roto_question',$arr);
			 $id= $_REQUEST['question_id'];	 
		}
		else{
	    	$id = $this->db->insert('roto_question',$arr);
			$id = $this->db->insert_id();
		
		}
		
		return $id;
	}
	
	
	#function to check whether the question is exist or not
	function check_question_exist($name,$id='')
	{	
		$sql = "SELECT * FROM  cp_questions WHERE question='".$name."' ";
		  if($id)
		{
			$sql 	.=		 "and question_id != ".$id;
		}
		
		$query		=		$this->db->query($sql);
		return($query->num_rows());
		
	} 

	#function To Update category Image Extension
	function updateCategoryImage($img_extension,$id)
	{
		$data = array(
					'img_extension'					=> $img_extension
				);
				
		$this->db->where('category_id',$id);
	  	$id=$this->db->update('cp_category',$data);
		return true;
		
	}
	
	function update_question($arr,$id='')
	{
	  $this->db->where('id',$id);
	  $rs = $this->db->update('roto_question',$arr);
	  return $rs ;
	}
	
	function getOptionCount($qn_id)
	{
		$sql = "select * from  roto_question_option where question_id='$qn_id'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function add_question_options($option,$question_id)
	{
     	$previous_id = $option['question_id'];
		//print_r($previous_id); exit;
		$this->db->select('qo.id')
				->from( . 'question_option qo')
				->where(array('qo.question_id' => $previous_id));				
		$result = $this->db->get();
		$res = $result->result_array();
		foreach($res as $row) {
			$array_ids[] = $row['id'];
		}

		//print_r($array_ids); exit;
		
		$arr 		= array(
							'question_id' => $question_id,
							'option'	  => $option['var'],
							'added_date'  => date("Y-m-d H:i:s")
							);
		$arr1 		= array(
							'question_id' => $question_id,
							'option'	  => $option['var2'],
							'added_date'  => date("Y-m-d H:i:s")
							);
		
		if($previous_id && $array_ids) {
			$this->db->where('id',$array_ids[0]);
			$this->db->update('roto_question_option',$arr);
			
			$this->db->where('id',$array_ids[1]);
			$this->db->update('roto_question_option',$arr1);
			
			$id = $previous_id;
		} else {
	    	$ids = $this->db->insert('roto_question_option',$arr);
	    	$id = $this->db->insert('roto_question_option',$arr1);			
			$id = $this->db->insert_id();
		}			
			return $id;		
	}
	
	
	function saveAnswer($option_id,$question_id)
	{
		$arr 		= array(
							'question_id' => $question_id,
							'option_id'	  => $option_id,
							'added_date'  => date("Y-m-d H:i:s")
							);
							
		$id = $this->db->insert('cp_answers',$arr);
		$id = $this->db->insert_id();
		
	}
	
	/*function delete_options($question_id)
	{
		$sql ="delete from cp_options where question_id = '$question_id'";
		$query = $this->db->query($sql);
		return true;
	}*/



	function delete_answer($question_id)
	{
		$sql ="delete from cp_answers where question_id = '$question_id'";
		$query = $this->db->query($sql);
		return true;
	}

	function getCorrectAnswer($question_id)
	{
		$sql = "select option_id from cp_answers where question_id='$question_id'";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result['option_id'];
	}
	
	function delete_option($option_id,$option_ids)
	{
		$sql ="delete from roto_question_option where id = '$option_id'";
		$query = $this->db->query($sql);
		$sqls ="delete from roto_question_option where id = '$option_ids'";
		$query = $this->db->query($sqls);
		
		return true;
	}
	
	function delete_option_from_question_id($question_id)
	{
		$sql ="delete from roto_question_option where question_id ='$question_id'";
		$query = $this->db->query($sql);
		return true;
	}
	
	function delete_answer_from_question_id($question_id)
	{
		$sql ="delete from cp_answers where question_id ='$question_id'";
		$query = $this->db->query($sql);
		return true;
	}
	
	function deleteQuestion($question_id)
	{
		$sql ="delete from roto_question where id ='$question_id'";
		$query = $this->db->query($sql);
		return true;
	}

	
} //end of class Category_model


	
	
