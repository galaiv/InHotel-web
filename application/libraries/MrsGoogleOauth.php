<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'src/Google_Client.php';
require_once APPPATH.'src/contrib/Google_Oauth2Service.php';
require_once APPPATH.'src/contrib/Google_PlusService.php';
class MrsGoogleOauth {
	function __construct(){
	
	$ci = & get_instance();
	$user_id = $ci->session->userdata('user_id');
	//$ci->config->set_item("hello", $user_id);
			
		//QA Duzz2 - manu@newagesmb.com
			$google_client_id			= '704686930215-2lrv4bhu8ral6idiqbnrull4oamrlioq.apps.googleusercontent.com';
			$google_client_secret 		= 'WUPNxDFT2y0OIZumnRbG5-2M';
			$google_redirect_url 		= 'http://qa.newagesme.com/duzz2/login/google_login'; //path to your script		
			$google_developer_key 		= 'AIzaSyBaciJvg18iVayzAX7doH3_E5ifBcU-NQo';
		
		//QA Duzz - manurs19872@gmail.com
			/*$google_client_id			= '1093201921315-5j6o6aobc643k909cipirmn56j05ajvd.apps.googleusercontent.com';
			$google_client_secret 		= '7v4zcTBUy3LeGQRsMKc-MvBe';
			$google_redirect_url 		= 'http://qa.newagesme.com/duzz/login/google_login'; //path to your script		
			$google_developer_key 		= 'AIzaSyAfFroLx5GRZnpA-oZM_hGgwpOaKb_Z7Yw';*/
			
		$gClient = new Google_Client();
		
		$gClient->setApplicationName('Login to Google.com');		
		$gClient->setScopes(array('https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.me', 'https://www.googleapis.com/auth/userinfo.profile'));
		//$gClient->setScopes(array('https://www.googleapis.com/auth/plus.login', 'https://www.googleapis.com/auth/plus.me', 'https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/userinfo.profile', 'https://www.google.com/m8/feeds/'));
		$gClient->setClientId($google_client_id);
		$gClient->setClientSecret($google_client_secret);
		$gClient->setRedirectUri($google_redirect_url);
		$gClient->setDeveloperKey($google_developer_key);
		
		/*$google_oauthV2 = new Google_Oauth2Service($gClient);

		//If user wish to log out, we just unset Session variable
		if (isset($_REQUEST['reset'])) {
		  unset($_SESSION['token']);
		  $gClient->revokeToken();
		  header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL)); //redirect user back to page
		}

		//If code is empty, redirect user to google authentication page for code.
		//Code is required to aquire Access Token from google
		//Once we have access token, assign token to session variable
		//and we can redirect user back to page and login.
		if (isset($_GET['code'])) {
			$gClient->authenticate($_GET['code']);
			$_SESSION['token'] = $gClient->getAccessToken();
			header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
			return;	
		}

		if (isset($_SESSION['token'])) { 
			$gClient->setAccessToken($_SESSION['token']);
		}
		
		if($user_id)
		{ 
		
		//redirect('','refresh');
		
		/*
			if ($gClient->getAccessToken()) 
			{			
			  $user 				= $google_oauthV2->userinfo->get();
			  
			  $user_id 				= $user['id'];
		 	  $user_name 			= filter_var($user['name'], FILTER_SANITIZE_SPECIAL_CHARS);
		 	  $email 				= filter_var($user['email'], FILTER_SANITIZE_EMAIL);
			  $profile_url 			= filter_var($user['link'], FILTER_VALIDATE_URL);
			  $profile_image_url 	= filter_var($user['picture'], FILTER_VALIDATE_URL);
		      $personMarkup 		= "$email<div><img src='$profile_image_url?sz=50'></div>";
		      $_SESSION['token'] 	= $gClient->getAccessToken();			  
		     
		     $arr['first_name']				= $user['given_name'];
		     $arr['last_name']				= $user['family_name'];
		     $arr['username']				= $email;
		     $arr['email_address']			= $email;
		     $arr['google_plus_id']			= $user_id;
		     $arr['google_plus_photo']		= $profile_image_url;
				
		     $result=$this->alm->checkGooglePlusEmail($arr['email_address']);	
			
			 if($result==0) {
				$data["user_profile"]=$user_profile;
				
				$this->alm->add_google_id($arr);
				$this->load->view('user_profile',$data);			
			 } elseif($result) {
				
				
				$result=$this->alm->update_google_id($arr);
				
				$data['user_profile']=$result;
				$data['user_profile']['profile_image']=$arr['google_plus_photo'];
				
				$newdata = array(
                   'user_id'  => $result['user_id'],
                   'username'  => $result['username'],
                   'email'     => $result['email_address'],
                   'logged_in' => TRUE
                );

			$this->session->set_userdata($newdata);
			$this->session->set_userdata('logged_in',$newdata);
			
			//print_r($this->session->userdata($newdata)); exit;
			
			redirect('login/success','refresh');
			//header('Location: '.$base_url.'login/success');	
			}			
			/*else
			{
				//$data['error']="Email id already exist";
				$this->session->set_flashdata('error', 'Email id already exist'); 
				$data['error']=$this->session->flashdata('error');
				//$this->load->view('login',$data);
				redirect('login','refresh');
			}*
		} *
		}
		else
		{	
			//For Guest user, get google login url
			$authUrl = $gClient->createAuthUrl();
			//$data['authUrl']= $authUrl;
			//$data_header['authUrl']= $authUrl;
			$ci->config->set_item("authUrl", $authUrl);
			
		 }*/
		 
		$authUrl = $gClient->createAuthUrl();
		$ci->config->set_item("authUrl", $authUrl);
 }
}
?>