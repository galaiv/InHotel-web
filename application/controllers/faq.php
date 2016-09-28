<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class Faq extends CI_Controller {

	public function __construct() {
		parent::__construct();	
		$this->load->library('session'); 
	}
	
	function index() {	
                $data['active_class']='faq';
		$this->load->view('faq',$data);	
        }							

	
	
}
?>