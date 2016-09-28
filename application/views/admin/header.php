<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>InHotel - Admin Dashboard</title>
<link href="<?php echo base_url()?>public/css/admin_style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>public/css/menu.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600' rel='stylesheet' type='text/css'>
<!--<script src="<?php echo base_url()?>public/js/jquery-1.10.2.min.js"></script>-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.min.js"></script>
<!--<script src="<?php echo base_url()?>assets/js/popup_script.js"></script>
<link href="<?php echo base_url()?>assets/css/popup.css" rel="stylesheet" type="text/css" />-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/jconfirm/jquery.confirm/jquery.confirm.css" />
<script src="<?php echo base_url()?>public/jconfirm/jquery.confirm/jquery.confirm.js"></script>
</head>
<body>
<div class="head">
	<div  class="head_in"><a href="<?php echo base_url().'admin/admin_dashboard/'; ?>" class="logo"><img style="padding: 15px;" width="160px" src="<?php echo base_url()?>/public/images/logo.png" class="img_style"/></a>
        <div class="head_rte"><a href="<?php echo site_url().'admin/login/logout/'; ?>" class="logout_btn">Logout</a>
            <div class="br_title">Admin -<a href="<?php echo base_url()?>admin/admin_dashboard" class="br_link">InHotel</a></div>
        </div>
  	</div>
</div>
<div class="menu_outer"><div class="menu_in">

<ul id="main-menu">
    <li class="current-menu-item"><a href="<?php echo base_url()?>admin/admin_dashboard/">DASHBOARD</a></li>
    <li class="parent">
        <a href="javascript:void(0)">USERS</a>
        <ul class="sub-menu">
         	<li><a href="<?php echo base_url()?>admin/member/index/1">User Management</a></li>
                <li><a href="<?php echo base_url()?>admin/member/index/2">Hotel Management</a></li>
                <li><a href="<?php echo base_url()?>admin/member/index/3">Hotel Staff Management</a></li>     
                <li><a href="<?php echo base_url()?>admin/package/">Subscription Package</a></li>
        </ul>
    </li>
    <li class="parent">
        <a href="javascript:void(0)">HOTEL</a>
        <ul class="sub-menu">
         	<li><a href="<?php echo base_url()?>admin/zone/">Zone</a></li>
                <li><a href="<?php echo base_url()?>admin/activation_code/">Activation Code</a></li>
                <li><a href="<?php echo base_url()?>admin/access_management/">Access Management</a></li>                
                 <li><a href="<?php echo base_url()?>admin/drinks/">Drinks</a></li>
                   <li><a href="<?php echo base_url()?>admin/feedback/">Feedback</a></li>
                     <li><a href="<?php echo base_url()?>admin/order/">Orders</a></li>
        </ul>
    </li>
   
    <!--<li class="parent">
        <a href="javascript:void(0)">CMS</a>
        <ul class="sub-menu">
			<li><a href="<?php echo base_url()?>admin/cms/">CMS Pages</a></li>
       </ul>
    </li>-->
    
    
    <li class="parent">
        <a href="javascript:void(0)">CONFIGURATION</a>
        <ul class="sub-menu">
			<li><a href="<?php echo base_url()?>admin/admin_dashboard/adminPreferences/">Admin Preferences</a></li>
			<li><a href="<?php echo base_url()?>admin/email_template/">Email Templates</a></li>
			<li><a href="<?php echo base_url()?>admin/preferences/">Preferences</a></li>
			<li><a href="<?php echo base_url()?>admin/admin_password/">Change Password</a></li>
        </ul>
    </li>    
</ul>

</div></div>
    <!--<div class="loader"></div>
   	<div id="backgroundPopup"></div>-->
<script language="javascript">
$(document).ready(function() {

	/* MAIN MENU */
	$('#main-menu > li:has(ul.sub-menu)').addClass('parent');
	$('ul.sub-menu > li:has(ul.sub-menu) > a').addClass('parent');

	$('#menu-toggle').click(function() {
		$('#main-menu').slideToggle(300);
		return false;
	});

	$(window).resize(function() {
		if ($(window).width() > 700) {
			$('#main-menu').removeAttr('style');
		}
	});

});
</script>