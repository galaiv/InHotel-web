<?php

error_reporting(0);

//error_reporting(E_ALL);

class drinks extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        if ((!$this->session->userdata('web_user'))) {
            redirect('login');
        }
        $this->load->model('drinks_model');
        $this->load->library('pagination');
    }

    public function ajax_drink_list($index_start = '0') {

        $this->load->helper('url');
        $hotel_id = $data['hotel_id'] = $this->session->userdata('hotel_id');

        $config['base_url'] = base_url() . "drinks/ajax_drink_list";
        $data['total_rows'] = $config['total_rows'] = $this->drinks_model->count_drinks($hotel_id);
        $config['per_page'] = $this->config->item('per_page');
        $config['page_query_string'] = FALSE;
        $config['uri_segment'] = 3;
        $config['is_ajax_paging'] = TRUE; // default FALSE
        $config['paging_function'] = 'ajax_paging'; // Your jQuery paging
        $config['full_tag_open'] = '<ul class="pagination pull-right">'; //
        $config['full_tag_close'] = '</ul>';

        $config['cur_tag_open'] = '<li class="active">';
        $config['cur_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $data['page'] = $_REQUEST['per_page'];
        $this->pagination->initialize($config);
        $drinks = $this->drinks_model->getAllDrinks($hotel_id, $config['per_page'], $this->uri->segment(3));

        $data['drinks'] = $drinks;

        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
        $data['hotel_list'] = $this->drinks_model->getAllHotels();
        $data['start_index'] = $index_start;
        echo $this->load->view('drinks_list_ajax', $data, true);
        exit();
    }

    public function index($index_start = '0') {

        $this->load->helper('url');
        $hotel_id = $data['hotel_id'] = $this->session->userdata('hotel_id');

        $config['base_url'] = base_url() . "drinks/ajax_drink_list/";
        $data['total_rows'] = $config['total_rows'] = $this->drinks_model->count_drinks($hotel_id);
        $config['per_page'] = $this->config->item('per_page');
        $config['page_query_string'] = FALSE;
        $config['uri_segment'] = 3;
        $config['full_tag_open'] = '<ul class="pagination pull-right">'; //
        $config['full_tag_close'] = '</ul>';

        $config['cur_tag_open'] = '<li class="active">';
        $config['cur_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $drinks = $this->drinks_model->getAllDrinks($hotel_id, $config['per_page'], $this->uri->segment(3));

        $data['drinks'] = $drinks;
        $data['start_index'] = $index_start;
        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
        $data['hotel_list'] = $this->drinks_model->getAllHotels();
        $this->load->view('header');
        $this->load->view('drinks_list', $data);
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $drinks_id = $this->input->post('drinks_id');
            $hotel_id = $data['hotel_id'] = $this->session->userdata('hotel_id');
            $this->drinks_model->unlinkImage($drinks_id);
            $this->drinks_model->delete_drinks($drinks_id);

            $config['base_url'] = base_url() . "drinks/ajax_drink_list";
            $data['total_rows'] = $config['total_rows'] = $this->drinks_model->count_drinks($hotel_id);
            $config['per_page'] = $this->config->item('per_page');
            $config['page_query_string'] = FALSE;
            $config['uri_segment'] = 3;
            $config['is_ajax_paging'] = TRUE; // default FALSE
            $config['paging_function'] = 'ajax_paging'; // Your jQuery paging


            $config['full_tag_open'] = '<ul class="pagination pull-right">';
            $config['full_tag_close'] = '</ul>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $data['page'] = $_REQUEST['per_page'];
            $this->pagination->initialize($config);
            $drinks = $this->drinks_model->getAllDrinks($hotel_id, $config['per_page'], $this->uri->segment(3));

            $data['drinks'] = $drinks;

            $data['paging'] = $this->pagination->create_links();
            $data['total_row'] = $config['total_rows'];
            $data['hotel_list'] = $this->drinks_model->getAllHotels();
            $data['start_index'] = $index_start;
            $details['message'] = '<div class="alert alert-success"><button type="button" data-dismiss="alert" aria-hidden="true" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>Drink deleted successfully.</div>';
            $details['html'] = $this->load->view('drinks_list_ajax', $data, true);
            echo json_encode($details);
            exit;
        } else {
            die('Invalid Params');
        }
    }

    public function detail($drinks_id) {
        if ($drinks_id != '') {
            $data['id'] = $drinks_id;
            $data['drinks'] = $this->drinks_model->get_drinks_details($drinks_id);
        }

        $hotel_id = $this->session->userdata('hotel_id');
        //$data['hotel_list'] = $this->drinks_model->getAllHotels();
        $this->load->library('form_validation');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $hotel_id = $this->session->userdata('hotel_id');
            //     $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required|numeric');

            if ($this->form_validation->run() == TRUE) {

                $drinks_id = $this->input->post('drinks_id');
                if ($drinks_id != "" && $drinks_id != "0") {
                    $arr = array(
                        'title' => trim($_POST['title']),
                        'price' => $_POST['price'],
                        'description' => trim($_POST['description']),
                        'hotel_id' => $hotel_id,
                    );
                    $drinks_id = $this->drinks_model->update_drinks($arr, $drinks_id);
                   
                    $message = $this->upload_image($drinks_id);
                    $this->session->set_flashdata('success', '<div class="alert alert-success">Drinks details updated successfully.</div>');
                     redirect('drinks');
                     exit;
                    $details['message'] = '<div class="alert alert-danger">Drinks details added successfully</div>';
                    $details['status'] = 1;
                    echo json_encode($details);
                    exit;
                } else {
                    $arr = array(
                        'title' => trim($_POST['title']),
                        'price' => $_POST['price'],
                        'description' => trim($_POST['description']),
                        'hotel_id' => $hotel_id,
                        'date_time' => date("Y-m-d H:i:s")
                    );
                    $drinks_id = $this->drinks_model->update_drinks($arr);

                    $message = $this->upload_image($drinks_id);
                    $this->session->set_flashdata('success', '<div class="alert alert-success">Drinks details added successfully.</div>');
                     redirect('drinks');
                      exit;
                    $details['message'] = '<div class="alert alert-danger">Drinks details added successfully</div>';
                    $details['status'] = 1;
                    echo json_encode($details);
                    exit;
                }
            } else {              
               //  $this->session->set_flashdata('error', '<div class="alert alert-danger">'.validation_errors().'</div>');
              //  redirect('drinks/detail');
             //    exit;
             $data['error'] = '<div class="alert alert-danger"><button type="button" data-dismiss="alert" aria-hidden="true" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . validation_errors(). '</div>';
                     //'<div class="alert alert-danger">' . validation_errors() . '</div>';
             ////   $details['status'] = 0;
             //  // echo json_encode($details);
              //  exit;
            }
        } 
            $this->load->view('header');
            $this->load->view('drinks_detail', $data);
        
    }

    public function upload_image($drinks_id) { 
        if ($_FILES['image_url']['name'] <> "") {
           $this->drinks_model->unlinkImage($drinks_id);
            $image_name = strtotime(date("Y-m-d H:i:s"));
            $config = array();
            $config['upload_path'] = 'upload/drinks/'; /* NB! create this dir! */
            $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
            $config['file_name'] = $image_name;
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
                $configThumb['new_image'] = 'upload/drinks/thumb/' . $image_name . $full_img_data['file_ext'];
                $this->image_lib->initialize($configThumb);
                $this->image_lib->resize();

                $img_arr = array('image' => $image_name . $full_img_data['file_ext']);
                $this->drinks_model->update_drinks($img_arr, $drinks_id);
            } else {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);exit;
                return $error;
            }
        }
    }

}

?>