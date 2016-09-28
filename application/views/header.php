
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>InHotel</title>
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
<script src="<?php echo base_url();?>js/jquery-1.11.0.min.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Nunito' rel='stylesheet' type='text/css'>
</head>
<body>
<nav role="navigation"  class="navbar navbar-default  fx_top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a 
	  	 <?php   if( (($this->session->userdata('web_user')  && ($this->session->userdata('member_type')== '2') && ($this->session->userdata('amount_paid') == "Y"))) || 
	(($this->session->userdata('web_user') && ($this->session->userdata('member_type')== '3') ))
	) { ?> 
	  href="<?php echo base_url();?>" <?php } else if(!$this->session->userdata('web_user')) { ?> href="<?php echo base_url();?>" <?php } ?> class="navbar-brand"><img src="<?php echo base_url();?>images/logo.png"></a> </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right mr_top">
 <?php   if( (($this->session->userdata('web_user') && ($this->session->userdata('member_type')== '2') && ($this->session->userdata('amount_paid') == "Y"))) || 
	(($this->session->userdata('web_user') && ($this->session->userdata('member_type')== '3') ))
	) { ?>            <a href="<?php echo base_url();?>registration" class="trys mr_rte">Try Free</a>
               <?php }?>
        <li>
		 <?php   if( (($this->session->userdata('web_user') && ($this->session->userdata('member_type')== '2') && ($this->session->userdata('amount_paid') == "Y"))) || 
	(($this->session->userdata('web_user') && ($this->session->userdata('member_type')== '3') ))
	) { ?> 
		 <a href="<?php echo base_url();?>" <?php echo  $active_class=='home' ? 'id="active"' : '';?> >Home</a><?php } ?> </li>
        <li> <a href="<?php echo base_url();?>">Download</a> </li>
        <li> 
		 <?php   if( (($this->session->userdata('web_user') && ($this->session->userdata('member_type')== '2') && ($this->session->userdata('amount_paid') == "Y"))) || 
	(($this->session->userdata('web_user') && ($this->session->userdata('member_type')== '3') ))
	) { ?> 
		<a href="<?php echo base_url();?>faq" <?php echo  $active_class=='faq' ? 'id="active"' : '';?>>Faq</a><?php } ?> </li>
        <li class="mr_rte"> <a href="<?php echo base_url();?>contact">Contact</a> </li>
    <?php   if( $this->session->userdata('web_user')) { ?> 
        <div class="hlw">Hello <strong><a 
		
		 <?php   if( (($this->session->userdata('web_user') && ($this->session->userdata('member_type')== '2') && ($this->session->userdata('amount_paid') == "Y"))) || 
	(($this->session->userdata('web_user') && ($this->session->userdata('member_type')== '3') ))
	) { ?> 
		
		href="<?php echo base_url(); ?>dashboard" <?php } ?>><?php  echo $this->session->userdata('web_user'); ?></a></strong></div> 
        <a href="<?php echo base_url();?>dashboard/logout" class="reglgn">Logout</a>
         
   <?php      }  else { ?>
          <a href="<?php echo base_url();?>login" class="reglgn">Login</a>
          
          <a href="<?php echo base_url();?>registration/hotel_signup" class="reglgn">Register</a>
       
   <?php } ?>
         
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container -->
</nav>