<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MyConfig{
	function __construct(){
		$ci = & get_instance();
		$ci->load->model('settings_model');
		$rs=$ci->settings_model->getAllConfigValues();
		foreach($rs as $conf){ 
			$ci->config->set_item($conf["field"], $conf["value"]);
                       
		}
		//$cu = $ci->session->userdata('user_id');
		//$ci->config->set_item("hello", $cu);		
	}	
}
?>