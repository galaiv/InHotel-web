<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Ajax extends CI_Controller
{
	  function __construct()
	  {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
        $this->load->model('admin/restaurant_model','rsm');
	  }
	
	public function get_latitude() {        
        $address = str_replace(',', '+', trim($this->input->post('address')));
        $city = str_replace(',', '+', trim($this->input->post('city')));
        $state = str_replace(',', '+', trim($this->input->post('state')));
        $zipcode = str_replace(',', '+', trim($this->input->post('zipcode')));

        // building the JSON URL string for Google API call 
        $g_address = str_replace(' ', '+', $address);
        $g_city = '+' . str_replace(' ', '+', $city);
        $g_state = '+' . str_replace(' ', '+', $state);
        $g_zip = '+' . str_replace(' ', '+', $zipcode);

        $g_addr_str = $g_address . $g_city . $g_state . $g_zip;		
		$g_addr_str = str_replace('++', '+', $g_addr_str);
		
        $result = $this->rsm->getlatlon_local($g_addr_str);
		$result = '';

        if (count($result) == 0 || $result == '' || $result['lat']== '' || $result['lon'] =='') {
            //count request to google map api            
            $url = "http://maps.google.com/maps/api/geocode/json?address=$g_addr_str&sensor=false";
			
			//print_r($url); exit();            
            $jsonData = file_get_contents($url);
          	// print_r($jsonData);exit;
            $data = json_decode($jsonData);

            $xlat = $data->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
            $xlong = $data->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
            $array = array();
                $array["latitude"] = $xlat;
                $array["longitude"] = $xlong;
                $array["key"] = $g_addr_str;
                $array["address"] = $address .','.$city . ',' . $state .',' .$zipcode;
                $this->rsm->saveLatLon($array);
            echo $xlat . "~" . $xlong;
            exit();
        }
        echo $result['lat'] . "~" . $result['lon'];
		exit();
    }
}

