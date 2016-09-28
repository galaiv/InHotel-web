<?php
error_reporting(0);
//error_reporting(E_ALL);

class drinks extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('admin/signup_model');
        if ((!$this->session->userdata('adminuser')) && (!$this->session->userdata('isAdmin'))) {
            redirect('admin/login/');
        }
        $this->load->model('admin/drinks_model');
    }

    public function index() {
        $this->load->library('pagination');
        $this->load->helper('url');
        $params = '?t=1';
        if ($_REQUEST['limit'])
            $params .= '&limit=' . $_REQUEST['limit'];
        if ($_REQUEST['key'])
            $params .= '&key=' . $_REQUEST['key'];
        $this->load->library('pagination');
        $config['base_url'] = site_url("admin/drinks/index") . "/" . $params;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_REQUEST['per_page'] = 0;
        }
        $cond = "";
        $_REQUEST['key'] = (!$_POST['key'] ? ($_GET['key'] ? $_GET['key'] : '') : $_POST['key']);

        $data['type'] = $type;
        $data['message'] = $this->session->flashdata('message');
        $config['base_url'] = site_url("admin/drinks/index") . "/" . $params;
        $config['total_rows'] = $this->drinks_model->count_drinks();
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
        $drinks = $this->drinks_model->getAllDrinks($config['per_page'], $_REQUEST['per_page']);

        $data['drinks'] = $drinks;
        //print_r($data['event_list']);exit;
        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
        $data['hotel_list'] = $this->drinks_model->getAllHotels();
        $this->load->view('admin/header');
        $this->load->view('admin/drinks_list', $data);
    }

    function changeDrinksStatus() {
        $drinks_id = $_POST['drinks_id'];
        $status = $_POST['new_status'];
        $arr = array("active" => $status);
        $this->drinks_model->update_drinks($arr, $drinks_id);
        $this->session->set_flashdata('success', 'Drinks status updated successfully');
        echo "Y";
        exit;
    }

    function deleteDrinks() {
        $drinks_id = $_POST['drinks_id'];
       $this->drinks_model->unlinkImage($drinks_id);
         $this->drinks_model->delete_drinks($drinks_id);
        $this->session->set_flashdata('success', 'Drinks deleted successfully');
        echo "Y";
        exit;
    }

    public function detail($drinks_id) {
        if ($drinks_id != '') {
            $data['id'] = $drinks_id;
            $data['drinks_details'] = $this->drinks_model->get_drinks_details($drinks_id);    
            }
        $data['hotel_list'] = $this->drinks_model->getAllHotels();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $drinks_id = $this->input->post('drinks_id');
            if ($drinks_id != "" && $drinks_id != "0") {
                $arr = array(
                    'title' => $_POST['title'],
                    'price' => $_POST['drinks_price'],                 
                    'description' => $_POST['description'],
                     'hotel_id' => $_POST['hotel_id'],
                   
                );
                $drinks_id = $this->drinks_model->update_drinks($arr, $drinks_id);
 $this->drinks_model->unlinkImage($drinks_id);
               $message = $this->upload_image($drinks_id);
                $this->session->set_flashdata('success', 'Drinks details updated successfully');
      
            } else {
                $arr = array(
                    'title' => $_POST['title'],
                    'price' => $_POST['drinks_price'],
                    'description' => $_POST['description'],
                    'hotel_id' => $_POST['hotel_id'],
                    'date_time' => date("Y-m-d H:i:s"),
                     'active' => 'Y',
                );

                $drinks_id = $this->drinks_model->update_drinks($arr);
                 
              $message =  $this->upload_image($drinks_id);
                $this->session->set_flashdata('success', 'Drinks details added successfully');
              
            }
             if (!empty($message)) {
                $this->session->set_flashdata('error', $message['error']);
                redirect('admin/drinks/detail/' . $drinks_id);
            } else {
                 redirect('admin/drinks');
            }
        }
         $this->load->view('admin/header');
        $this->load->view('admin/drinks_details', $data);
    }

    public function upload_image($drinks_id) {
        if ($_FILES['image_url']['name'] <> "") {
            $image_name = strtotime(date("Y-m-d H:i:s"));
            $config = array();
            $config['upload_path'] = 'upload/drinks/'; /* NB! create this dir! */
            $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
            $config['file_name'] =$image_name;
            $config['max_size'] = '1024*1024*2';
            $config['width'] = 165;
            $config['height'] = 165;
            $this->load->library('upload');
            
            $configThumb = array();
            $configThumb['image_library'] = 'gd2';   
        //   $configThumb['create_thumb'] = TRUE;
            $configThumb['maintain_ratio'] = TRUE;
            $configThumb['master_dim'] = 'width';
            $configThumb['width'] = 165;
            $configThumb['height'] = 165;
            $this->load->library('image_lib');
            $this->upload->initialize($config);
            $this->drinks_model->unlinkImage($drinks_id);
            $upload = $this->upload->do_upload('image_url');
            if ($upload) {
                $full_img_data = $this->upload->data();
                               
                $configThumb['source_image'] = $full_img_data['full_path'];
                $configThumb['new_image']  ='upload/drinks/thumb/'.$image_name.$full_img_data['file_ext'];
                $this->image_lib->initialize($configThumb);
                $this->image_lib->resize();

                $img_arr = array('image' => $image_name.$full_img_data['file_ext']);
                $this->drinks_model->update_drinks($img_arr, $drinks_id);
            } else {
                $error = array('error' => $this->upload->display_errors());
                return $error;
            }
        }
    }

}

?>