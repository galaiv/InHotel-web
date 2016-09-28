<?php
error_reporting(0);
//error_reporting(E_ALL);

class feedback extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('admin/signup_model');
        if ((!$this->session->userdata('adminuser')) && (!$this->session->userdata('isAdmin'))) {
            redirect('admin/login/');
        }
        $this->load->model('admin/feedback_model');
    }

    public function index() {
        $this->load->library('pagination');
        $this->load->helper('url');
        $params = '?t=1';
        if ($_REQUEST['limit'])
            $params .= '&limit=' . $_REQUEST['limit'];
        if ($_REQUEST['key'])
            $params .= '&key=' . $_REQUEST['key'];
		if ($_REQUEST['hotel'])
            $params .= '&hotel=' . $_REQUEST['hotel'];
        $this->load->library('pagination');
        $config['base_url'] = site_url("admin/feedback/index") . "/" . $params;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_REQUEST['per_page'] = 0;
        }
        $cond = "";
        $_REQUEST['key'] = (!$_POST['key'] ? ($_GET['key'] ? $_GET['key'] : '') : $_POST['key']);

        $data['type'] = $type;
        $data['message'] = $this->session->flashdata('message');
        $config['base_url'] = site_url("admin/feedback/index") . "/" . $params;
        $config['total_rows'] = $this->feedback_model->count_feedback();
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
        $feedback = $this->feedback_model->getAllFeedback($config['per_page'], $_REQUEST['per_page']);

        $data['feedback'] = $feedback;
        //print_r($data['event_list']);exit;
        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
         $data['hotel_list'] = $this->feedback_model->getAllHotels();
        $this->load->view('admin/header');
        $this->load->view('admin/feedback_list', $data);
    }

    function changeFeedbackStatus() {
        $feedback_id = $_POST['feedback_id'];
        $status = $_POST['new_status'];
        $arr = array("active" => $status);
        $this->feedback_model->update_feedback($arr, $feedback_id);
        $this->session->set_flashdata('success', 'Feedback status updated successfully');
        echo "Y";
        exit;
    }

    function deleteFeedback() {
        $feedback_id = $_POST['feedback_id'];
       $this->feedback_model->unlinkImage($feedback_id);
         $this->feedback_model->delete_feedback($feedback_id);
        $this->session->set_flashdata('success', 'Feedback deleted successfully');
        echo "Y";
        exit;
    }

    public function detail($feedback_id) {
        if ($feedback_id != '') {
            $data['id'] = $feedback_id;
            $data['feedback_details'] = $this->feedback_model->get_feedback_details($feedback_id);    
            }
        $data['hotel_list'] = $this->feedback_model->getAllHotels();
        $this->load->view('admin/header');
        $this->load->view('admin/feedback_details', $data);
    }

    public function upload_image($feedback_id) {
        if ($_FILES['image_url']['name'] <> "") {
            $image_name = strtotime(date("Y-m-d H:i:s"));
            $config = array();
            $config['upload_path'] = 'upload/feedback/'; /* NB! create this dir! */
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
            $this->feedback_model->unlinkImage($feedback_id);
            $upload = $this->upload->do_upload('image_url');
            if ($upload) {
                $full_img_data = $this->upload->data();
                               
                $configThumb['source_image'] = $full_img_data['full_path'];
                $configThumb['new_image']  ='upload/feedback/thumb/'.$image_name.$full_img_data['file_ext'];
                $this->image_lib->initialize($configThumb);
                $this->image_lib->resize();

                $img_arr = array('image' => $image_name.$full_img_data['file_ext']);
                $this->feedback_model->update_feedback($img_arr, $feedback_id);
            } else {
                $error = array('error' => $this->upload->display_errors());
                return $error;
            }
        }
    }

}

?>