<?php
error_reporting(0);
//error_reporting(E_ALL);

class order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('admin/signup_model');
        if ((!$this->session->userdata('adminuser')) && (!$this->session->userdata('isAdmin'))) {
            redirect('admin/login/');
        }
        $this->load->model('admin/order_model');
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
        $config['base_url'] = site_url("admin/order/index") . "/" . $params;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_REQUEST['per_page'] = 0;
        }
        $cond = "";
        $_REQUEST['key'] = (!$_POST['key'] ? ($_GET['key'] ? $_GET['key'] : '') : $_POST['key']);

        $data['type'] = $type;
        $data['message'] = $this->session->flashdata('message');
        $config['base_url'] = site_url("admin/order/index") . "/" . $params;
        $config['total_rows'] = $this->order_model->count_order();
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
        $order = $this->order_model->getAllOrder($config['per_page'], $_REQUEST['per_page']); 
        $data['order'] = $order;
        //print_r($data['event_list']);exit;
        $data['hotel_list'] = $this->order_model->getAllHotels();
        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
        $this->load->view('admin/header');
        $this->load->view('admin/order_list', $data);
    }

    function changeOrderStatus() {
        $order_id = $_POST['order_id'];
        $status = $_POST['new_status'];
        $arr = array("active" => $status);
        $this->order_model->update_order($arr, $order_id);
        $this->session->set_flashdata('success', 'Order status updated successfully');
        echo "Y";
        exit;
    }

    function deleteOrder() {
        $order_id = $_POST['order_id'];
       $this->order_model->unlinkImage($order_id);
         $this->order_model->delete_order($order_id);
        $this->session->set_flashdata('success', 'Order deleted successfully');
        echo "Y";
        exit;
    }

    public function detail($order_id) {
        if ($order_id != '') {
            $data['id'] = $order_id;
            $data['order_details'] = $this->order_model->get_order_details($order_id);
			//print_r($data['order_details']);exit;    
            }
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
		    // print_r($_POST);exit;
		    $id	=	$this->input->post('order_id');
            $charged = $_POST['charged'];
			$arr = array("charged" => $charged);
		    $this->order_model->update_order($arr,$id);
			$this->session->set_flashdata('success', 'Order updated successfully');
			redirect('admin/order');
		}                              
         $this->load->view('admin/header');
        $this->load->view('admin/order_detail', $data);
    }

    public function upload_image($order_id) {
        if ($_FILES['image_url']['name'] <> "") {
            $image_name = strtotime(date("Y-m-d H:i:s"));
            $config = array();
            $config['upload_path'] = 'upload/order/'; /* NB! create this dir! */
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
            $this->order_model->unlinkImage($order_id);
            $upload = $this->upload->do_upload('image_url');
            if ($upload) {
                $full_img_data = $this->upload->data();
                               
                $configThumb['source_image'] = $full_img_data['full_path'];
                $configThumb['new_image']  ='upload/order/thumb/'.$image_name.$full_img_data['file_ext'];
                $this->image_lib->initialize($configThumb);
                $this->image_lib->resize();

                $img_arr = array('image' => $image_name.$full_img_data['file_ext']);
                $this->order_model->update_order($img_arr, $order_id);
            } else {
                $error = array('error' => $this->upload->display_errors());
                return $error;
            }
        }
    }

}

?>