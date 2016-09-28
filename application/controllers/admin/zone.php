<?php

error_reporting(0);

class zone extends CI_Controller {

    
      public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
		$this->load->model('admin/signup_model');
		if((!$this->session->userdata('adminuser')) && (!$this->session->userdata('isAdmin'))) {
			redirect('admin/login/');
		}
                  $this->load->model('admin/zone_model');
    }
    
 

    public function search_array($needle, $haystack) {
        if (in_array($needle, $haystack)) {
            return true;
        }
        foreach ($haystack as $element) {
            if (is_array($element) && $this->search_array($needle, $element))
                return true;
        }
        return false;
    }

    public function index() {   
        $this->load->library('pagination');
        $this->load->helper('url');
        $params = '?t=1&type=' . $_REQUEST['type'];
        if ($_REQUEST['limit'])
            $params .= '&limit=' . $_REQUEST['limit'];
        if ($_REQUEST['key'])
            $params .= '&key=' . $_REQUEST['key'];
        $this->load->library('pagination');
        $config['base_url'] = site_url("admin/zone/index") . "/" . $params;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_REQUEST['per_page'] = 0;
        }
        $cond = "";
        $_REQUEST['key'] = (!$_POST['key'] ? ($_GET['key'] ? $_GET['key'] : '') : $_POST['key']);

        $data['type'] = $type;
        $data['message'] = $this->session->flashdata('message');
        $config['base_url'] = site_url("admin/zone/index") . "/" . $params;
        $config['total_rows'] = $this->zone_model->count_zones($_REQUEST['key']);
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['full_tag_open'] = '<li>'; //
        $config['full_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['cur_tag_open'] = '<a class="hover"><b>';
        $config['cur_tag_close'] = '</b></a>';
        $data['page'] = $_REQUEST['per_page'];
        $this->pagination->initialize($config);
        $data['zone_list'] = $this->zone_model->getAllZones($_REQUEST['key'], $config['per_page'], $_REQUEST['per_page']);
        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
        $this->load->view('admin/header');
        $this->load->view('admin/zone_list', $data);
    }

    function change_zone_status() {
        $zone_id = $_POST['zone_id'];
        $status = $_POST['new_status'];
        $arr = array("active" => $status);
        $this->zone_model->update_zone($arr, $zone_id);
        $this->session->set_flashdata('success', 'Zone status updated successfully');
        echo "Y";
        exit;
    }

    function delete_zone() {
        $zone_id = $_POST['zone_id'];
        $this->zone_model->delete_zone($zone_id);
        $this->session->set_flashdata('success', 'Zone deleted successfully');
        echo "Y";
        exit;
    }

    public function details() {
        $zone_id = '';
        if ($this->uri->segment(4) != '') {
            $zone_id = $this->uri->segment(4);
        }

        $data['zone_id'] = $zone_id;
        $data['zone_details'] = $this->zone_model->get_zone_details($zone_id);
      
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $zone_id = $this->input->post('zone_id');
             $zone_arr = array(
                    'zone_name' => $_POST['zone_name'],                   
                );
            if ($zone_id != "" && $zone_id != "0") {

                $this->zone_model->update_zone($zone_arr, $zone_id);

                $this->session->set_flashdata('success', 'Zone details updated successfully');
                redirect('admin/zone');
            } else {
               
                $zone_id = $this->zone_model->add_zone($zone_arr, $zone_id);

                $this->session->set_flashdata('success', 'Zone details added successfully');
                redirect('admin/zone');
            }
        }
        $this->load->view('admin/header');
        $this->load->view('admin/zone_details', $data);
    }



}
?>

