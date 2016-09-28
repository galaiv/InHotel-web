<?php

error_reporting(0);

class package extends CI_Controller {
   public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
		$this->load->model('admin/signup_model');
		if((!$this->session->userdata('adminuser')) && (!$this->session->userdata('isAdmin'))) {
			redirect('admin/login/');
		}
                  $this->load->model('admin/package_model');
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
        $config['base_url'] = site_url("admin/package/index") . "/" . $params;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_REQUEST['per_page'] = 0;
        }
        $cond = "";
        $_REQUEST['key'] = (!$_POST['key'] ? ($_GET['key'] ? $_GET['key'] : '') : $_POST['key']);

        $data['type'] = $type;
        $data['message'] = $this->session->flashdata('message');
        $config['base_url'] = site_url("admin/package/index") . "/" . $params;
        $config['total_rows'] = $this->package_model->count_Packages($_REQUEST['key']);
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
        $data['package_list'] = $this->package_model->getAllPackages($_REQUEST['key'], $config['per_page'], $_REQUEST['per_page']);
        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
        $this->load->view('admin/header');
        $this->load->view('admin/package_list', $data);
    }

    function change_package_status() {
        $package_id = $_POST['package_id'];
        $status = $_POST['new_status'];
        $arr = array("active" => $status);
        $this->package_model->update_package($arr, $package_id);
        $this->session->set_flashdata('success', 'Package status updated successfully');
        echo "Y";
        exit;
    }

    function delete_package() {
        $package_id = $_POST['package_id'];
        $this->package_model->delete_package($package_id);
        $this->session->set_flashdata('success', 'Package deleted successfully');
        echo "Y";
        exit;
    }

    public function details() {
        $package_id = '';
        if ($this->uri->segment(4) != '') {
            $package_id = $this->uri->segment(4);
        }

        $data['package_id'] = $package_id;
        $data['package_details'] = $this->package_model->get_package_details($package_id);
      
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $package_id = $this->input->post('package_id');
             $usrArr = array(
                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'price' => $_POST['price'],
                    'duration' => $_POST['duration'],
                    'duration_type' => $_POST['duration_type'],
                );
            if ($package_id != "" && $package_id != "0") {

                $this->package_model->update_package($usrArr, $package_id);

                $this->session->set_flashdata('success', 'Package details updated successfully');
                redirect('admin/package');
            } else {
               
                $package_id = $this->package_model->add_package($usrArr, $package_id);

                $this->session->set_flashdata('success', 'Package details added successfully');
                redirect('admin/package');
            }
        }
        $this->load->view('admin/header');
        $this->load->view('admin/package_details', $data);
    }



}
?>

