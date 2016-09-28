<?php
error_reporting(0);
//error_reporting(E_ALL);

class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('admin/signup_model');
         if ((!$this->session->userdata('web_user'))) {
            redirect('login');
        } 
        $this->load->model('order_model');
    }

    public function index($index_start='0') {
	
        $config['base_url'] = base_url() . "order/ajax_order_list/";
		 $this->load->library('pagination');

        $data['total_rows'] = $config['total_rows'] = $this->order_model->count_order($this->session->userdata('hotel_id'));	
        $config['per_page'] = $this->config->item('per_page');
        $config['page_query_string'] = FALSE;
        $config['uri_segment'] = 3;

        $config['full_tag_open'] = '<ul class="pagination pull-right">'; //
        $config['full_tag_close'] = '</ul>';
//        $config['num_tag_open'] = '<li>';
//        $config['num_tag_close'] = '<li/>';

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
        $this->pagination->initialize($config);//echo "hi";

        $order_list = $this->order_model->getAllOrder($this->session->userdata('hotel_id'),$config['per_page'], $index_start);
        $data['order_list'] = $order_list;
        $data['start_index'] = $index_start;
        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
		//print_r($order_list);exit;
        $this->load->view('header');
        $this->load->view('order_list', $data);
          $this->load->view('footer');
    }
 public function ajax_order_list($index_start = '0') {
		 $this->load->library('pagination');

        $config['base_url'] = base_url() . "order/ajax_order_list/";
         $data['total_rows'] = $config['total_rows'] = $this->order_model->count_order($this->session->userdata('hotel_id'));
        $config['per_page'] =$this->config->item('per_page');
        $config['page_query_string'] = FALSE;
		$config['is_ajax_paging'] = TRUE;
        $config['uri_segment'] = 3;

        $config['full_tag_open'] = '<ul class="pagination pull-right">'; //
        $config['full_tag_close'] = '</ul>';
//        $config['num_tag_open'] = '<li>';
//        $config['num_tag_close'] = '<li/>';

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
		//$config['anchor_class'] = 'class="paginate_button"';
        $this->pagination->initialize($config);
        $order_list = $this->order_model->getAllOrder($this->session->userdata('hotel_id'),$config['per_page'], $index_start);

        $data['order_list'] = $order_list;
        $data['start_index'] = $index_start;
        $data['paging'] = $this->pagination->create_links();
        $data['total_row'] = $config['total_rows'];
        $data['start_index'] = $index_start;
        echo $this->load->view('order_list_ajax', $data, true);
        exit();
    }

    function changeOrderStatus() {
        $id = $_POST['id'];
        $status = $_POST['status']; 
        $arr = array("charged" => $status);
        $this->order_model->update_order($arr, $id);
        $this->session->set_flashdata('success', 'Order Charge updated successfully');
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

    public function details($order_id) {
        if ($order_id != '') {
            $data['id'] = $order_id;
            $data['order_details'] = $this->order_model->get_order_details($order_id);    
            }
        $this->load->view('header');
        $this->load->view('order_details', $data);
        $this->load->view('footer');
    }


}

?>