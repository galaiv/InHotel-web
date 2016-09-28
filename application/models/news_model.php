<?php
class News_model extends CI_Model { 

    public function __construct() {
        $this->load->database();
    }
	
	
	public function getNewsDetails($league_type) {
    	//$this->db->select('SUBSTRING(`pn.content`,`1`,`10`) as content,pm.name,pm.position,cm.image')SUBSTRING(pn.content,1,35) as content
		$this->db->select(array('SUBSTRING(pn.content,1,500) as content','pn.id','pn.date','pn.player_id','UPPER(pm.name) as name','pm.position','CONCAT(\'' . base_url() . 'upload/thumbs/teams/\', cm.image ) AS image'))
                ->from( . 'player_news pn')
				->join( . 'player_master pm', 'pm.id = pn.player_id', 'left')
				->join( . 'category_master cm', 'cm.id = pn.team', 'left')
                ->where(array('pn.league_type' => $league_type, 'pn.deleted' =>'N', 'pn.status' =>'Y'))
				->order_by("pn.id", "desc");
        $result = $this->db->get();
		$row = $result->result_array();
        return $row;
    }
	
	public function getPlayerNewsDetails($league_type,$player_id,$news_id,$user_id) {   	
		$this->db->select(array('pn.content','fn.id as favourite','cm.Code','pn.title','pn.id','pn.source','pn.player_id','pn.date','UPPER(pm.name) as name','pm.position','CONCAT(\'' . base_url() . 'upload/thumbs/player/\', pm.image ) AS image'))
                ->from( . 'player_news pn')
				->join( . 'player_master pm', 'pm.id = pn.player_id', 'left')
				->join( . 'category_master cm', 'cm.id = pn.team', 'left')
				->join( . 'favourite_news fn', 'fn.news_id = pn.id AND fn.user_id ='.$user_id, 'left')
                ->where(array('pn.league_type' => $league_type, 'pn.deleted' =>'N', 'pn.status' =>'Y', 'pn.player_id' => $player_id, 'pn.id' => $news_id))
				->order_by("pn.id", "desc");
        $result = $this->db->get();
		$row = $result->row_array();
        return $row;
    }
	
	
	public function getPlayerNewsFullDetails($league_type,$player_id,$news_id,$user_id) {    	
		$this->db->select(array('pn.content','cm.Code','pn.title','pn.id','pn.source','pn.player_id','pn.date','UPPER(pm.name) as name','pm.position','CONCAT(\'' . base_url() . 'upload/thumbs/player/\', pm.image ) AS image'))
                ->from( . 'player_news pn')
				->join( . 'player_master pm', 'pm.id = pn.player_id', 'left')
				->join( . 'category_master cm', 'cm.id = pn.team', 'left')
                ->where(array('pn.league_type' => $league_type, 'pn.deleted' =>'N', 'pn.status' =>'Y', 'pn.player_id' => $player_id))
			//	$this->db->where("stage= 1 AND (LOWER(location) LIKE '%{$term}%' OR LOWER(name) LIKE '%{$term}%')");
				->order_by("pn.id", "desc");
        $result = $this->db->get();
		$row = $result->result_array();
        return $row;
    }
	
	
	public function getPlayerSearchNews($league_type,$player_id,$news_id,$user_id,$keyword) {    	
		$this->db->select(array('pn.content','cm.Code','pn.title','pn.id','pn.source','pn.player_id','pn.date','UPPER(pm.name) as name','pm.position','CONCAT(\'' . base_url() . 'upload/thumbs/player/\', pm.image ) AS image'))
                ->from( . 'player_news pn')
				->join( . 'player_master pm', 'pm.id = pn.player_id', 'left')
				->join( . 'category_master cm', 'cm.id = pn.team', 'left')
                ->where((array('pn.league_type' => $league_type, 'pn.deleted' =>'N', 'pn.status' =>'Y', 'pn.player_id' => $player_id)))
				->like('pn.title', $keyword)
				->or_like('pn.content', $keyword)
				->or_like('pm.name', $keyword)
				->order_by("pn.id", "desc");
        $result = $this->db->get();
		//echo $this->db->last_query();
		$row = $result->result_array();
        return $row;
    }
	

	public function favouriteNews($arr) {
		$this->db->insert( . 'favourite_news', $arr);
        return $this->db->insert_id();
	}
	
	public function unfavouriteNews($arr) {	
		$this->db->delete( . 'favourite_news', $arr);
		return $this->db->affected_rows();
	}
	
	public function myNews($arr) {    	
		$this->db->select(array('SUBSTRING(pn.content,1,500) as content','pn.id','pn.date','pn.player_id','UPPER(pm.name) as name','pm.position','CONCAT(\'' . base_url() . 'upload/thumbs/teams/\', cm.image ) AS image'))
				->from( . 'favourite_news fn')
                ->join( . 'player_news pn', 'fn.news_id = pn.id', 'left' )
				->join( . 'player_master pm', 'pm.id = pn.player_id', 'left')
				->join( . 'category_master cm', 'cm.id = pn.team', 'left')
                ->where(array('pn.deleted' =>'N', 'pn.status' =>'Y','fn.user_id' => $arr['user_id'], 'pn.league_type' => $arr['league_type']))
				->order_by("pn.id", "desc");
        $result = $this->db->get();
		$row = $result->result_array();
        return $row;
    }	
	
	public function searchNews($arr) {
			$key = mysql_real_escape_string($arr['key']);
			$this->db->select(array('cm.Code','pn.content','pn.id','pn.date','pn.player_id','pn.title','UPPER(pm.name) as name','pn.source','pm.position','CONCAT(\'' . base_url() . 'upload/thumbs/player/\', pm.image ) AS image'))/*'GROUP_CONCAT(pn.content) AS content'*/
                ->from( . 'player_news pn')
				->join( . 'player_master pm', 'pm.id = pn.player_id', 'left')
				->join( . 'category_master cm', 'cm.id = pn.team', 'left')
                ->where(array('pn.deleted' =>'N', 'pn.status' =>'Y'))
				->like('pm.name', $key)
				//->group_by('pm.id')
				->order_by("pn.id", "desc");
        $result = $this->db->get();
		$row = $result->result_array();
        return $row;
    }
	##'mpl.player_id as fav'
	public function getAllPlayers($leagueType='',$user_id='') { 
        $this->db->select(array('pm.id','UPPER(pm.name) as player_name','mpl.player_id as fav','pm.league_type','pm.position','cm.name as team_name', 'CONCAT(\'' . base_url() . 'upload/thumbs/player/\', pm.image ) AS player_image'))
                ->from( . 'player_master pm ')
				->join( . 'category_master cm', 'pm.team = cm.id', 'left')
				->join( . 'my_player_list mpl', 'mpl.player_id = pm.id AND mpl.user_id ='.$user_id, 'left')
				->where(array('pm.league_type' => $leagueType, 'pm.active' => 'Y'))        
				->order_by("pm.id", "desc");
		$result = $this->db->get();       
        return $records = $result->result_array();      
    }
}
//endof class News_model