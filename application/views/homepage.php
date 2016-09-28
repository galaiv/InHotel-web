<?php $this->load->view('header'); ?>
<link href="<?php echo base_url();?>assets/css/bootstrap-social.css" rel="stylesheet" type="text/css">

<script type="text/javascript">
   $(document).ready(function() {
        $('#add_btb').click(function() {
		 if ($(this).text() == '+WHAT IS InHotel app') {
                $(this).html('<h2 >-WHAT IS InHotel app</h2>');
            } else {
                $(this).html('<h2 >+WHAT IS InHotel app</h2>');
            }
                $('.desc').toggle("slide");
				
        });
    });
 $(document).ready(function() {
        $('#add_btb1').click(function() {
		
			
			 if ($(this).text() == '+How it works?') { //alert($(this).text());
                $(this).html('<h2>-How it works?</h2>');
            } else { //alert("fg");
                $(this).html('<h2>+How it works?</h2>');
            }
                $('.cmss').toggle("slide");
				 $('.cmss1').toggle("slide");
				
        });
    });
	 $(document).ready(function() {
        $('#add_btb2').click(function() {//alert($(this).text());
		 if ($(this).text() == '+See what InHotel can do for yourbusiness') 
		 {
                $(this).html('<h2>-See what InHotel can do for your<br/>business</h2>');
            } else {
                $(this).html('<h2>+See what InHotel can do for your<br/>business</h2>');
            }
				 $('.txt1').toggle("slide");
				
        });
    });

</script>
<div  class="grn_bg">
  <div class="container bnr_img">
    <div class="row col-lg-8">
      <h1>Hey, who's next door?</h1>
      <div class="col-lg-6 row">
        <h2 style="color:#FFFFFF"> New Places, new People, new experiences<br>
          The better way of living the hotel! </h2>
        <a href="#" class="trys1">Try Free</a></div>
<!--	        <span id="add_btb" style="cursor:pointer">+WHAT IS InHotel app</span>
-->	       <div class="desc1" style="display:none;">InHotel is a platform mobile messaging app allowing you to exchange messages with the other guests in your hotel. It helps you to meet new people during your business trips or on vacation.<br>
      Lets say that you are away from home on your own or with friends and you are in your hotel room, extremely bored and lonely. Dont worry, next door there could be someone just like you.</div>
      <div class="aps"><a href="https://itunes.apple.com/us/app/inhotel-app/id1028971140?mt=8" target="_blank"><img src="<?php echo base_url();?>images/apple-download.png" style="margin-right:10px;"></a><a href="https://play.google.com/store/apps/details?id=com.inhotelappltd.inhotel" target="_blank"><img src="<?php echo base_url();?>images/android-download.png" style="margin-right:10px;"></a><a target="_blank" href="https://www.facebook.com/inhotelapp"><img src="<?php echo base_url();?>images/facebook_Icon_45px.png" style="margin-right:0px; margin-bottom:4px;"></a><a href="https://twitter.com/i/notifications" target="_blank"><img src="<?php echo base_url();?>images/icon45px_twitter.png"  style="margin-bottom:4px;"></a>
	  
<!--	  
	  <a class="btn btn-block btn-social btn-facebook" style="width:53%">
    <i class="fa fa-facebook"></i> Connect with Facebook
  </a>
        <a class="btn btn-facebook btn-social-icon" target="_blank"  style="margin-right:10px;"><i class="fa fa-facebook"></i></a>
        <a class="btn btn-twitter" target="_blank" href="https://twitter.com/i/notifications"><i class="fa fa-twitter"></i></a>	 -->
</div>	
 </div>
    </div>
  </div>
</div>	  
<!--<div class="fb-page" data-href="https://www.facebook.com/inhotelapp" data-width="180" data-height="70" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/inhotelapp"><a href="https://www.facebook.com/inhotelapp">InHotel app</a></blockquote></div>-->
<div class="container gbg">
	  <?php 
if($this->session->flashdata('success'))
{
?>
<strong><div class="alert alert-block green susdiv" style="color:green; text-align:center"><?php echo $this->session->flashdata('success');?></div></strong>
<?php
}
?>
  <div class="row">

  <div class="col-md-12 col-sm-6">
	   <span id="add_btb" style="cursor:pointer"><h2 >+WHAT IS InHotel app</h2></span>
    </div>
	<div class="clearfix"></div>
	<div class="desc row pds1" style="display:none;">
    InHotel is a platform mobile messaging app allowing you to exchange messages with the other guests in your hotel. It helps you to meet new people during your business trips or on vacation.<br>
      Lets say that you are away from home on your own or with friends and you are in your hotel room, extremely bored and lonely. Dont worry, next door there could be someone just like you.
      </div>
      
     <div style="margin-top:50px;">  <span id="add_btb1" style="cursor:pointer;"><h2>+How it works?</h2></span></div>
    <div class="col-md-7 col-sm-6">
    
      <div class="row lst cmss" style="display:none;">
        <li>Download InHotel for <span>free</span> from <span>Apple</span> Store, <span>Play</span> Store </li>
        <li>Create your <span>own profile</span></li>
        <li>Login with the code that the hotel administrator will provide you</li>
        <li>See <span>who is online</span> and get in <span>touch</span></li>
        <li>Invite them for <span>coffee, business networking</span> or to simply do something <span>fun</span></li>
	 <li>You can <span>send  messages, mutimedia files  and drinks</span> to the other  <span>rooms</span></li>

        <div class="gbs"><a class="btn btn-dn" href="3">Download Now</a></div>
      </div>
    </div>
    <div class=" pull-right hdn mrs cmss1" style="display:none;">
      <div class="bs-example">
        <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
          <!-- Carousel indicators -->
          <!-- Carousel items -->
          <div class="carousel-inner">
            <div class="active item"> <img src="<?php echo base_url();?>images/1.png"> </div>
            <div class="item"> <img src="<?php echo base_url();?>images/2.png"> </div>
			 <div class="item"> <img src="<?php echo base_url();?>images/3.png"> </div>
            <div class="item"> <img src="<?php echo base_url();?>images/4.png"> </div>
          </div>
          <!-- Carousel nav -->
          <a class="carousel-control left" href="#myCarousel" data-slide="prev"> </a> <a class="carousel-control right" href="#myCarousel" data-slide="next"> </a> </div>
      </div>
    </div>
    <div class="wd100">
    <span id="add_btb2" style="cursor:pointer"><h2 class="mrbt1">+See what InHotel can do for your<br/>business</h2></span>
      <div class="row txt1" style="display:none;">
        <div class="col-md-5 mrbt ">
          <div class="lstn"> <img alt="" src="<?php echo base_url();?>images/img-elenco1.jpg">
            <h3>Be more Visible with InHotel </h3>
            With InHotel your hotel name and link will be visible on our application page at the Apple, Android and Windows mobile stores. Thus you can reduce OTA hotel commissions by attracting more clients directly to your official website. </div>
        </div>
        <div class="col-md-6 mrbt pull-right">
          <div class="lstn"> <img alt="" src="<?php echo base_url();?>images/img-elenco2.jpg">
            <h3>Value your customers&rsquo; taste</h3>
            InHotel provides you with statistical data including not only the usual parameters like gender, nationality and age but also more detailed information such as interests, profession, hobbies and the social status of your customers... Thus you can analyze and focus your marketing and sales strategies, enhance loyalty among your clients according to their preferences and purchase behavior. </div>
        </div>
      </div>
      <div class="row txt1" style="display:none;">
        <div class="col-md-5 mrbt" >
          <div class="lstn"> <img alt="" src="<?php echo base_url();?>images/img-elenco3.jpg">
            <h3> Be different and earn more with InHotel</h3>
     <!--       InHotel is an app that covers all the common hotel areas such as bars, restaurants and Spas...
            Thus you can increase the public interest and the revenue of those outlets. -->
			InHotel is an app that covers all the common hotel areas such as bars, restaurants and Spas and involves the room service orders. Thus you can increase the public interest and the revenue of those outlets.
			</div>
        </div>
        <div class="col-md-6 mrbt pull-right">
          <div class="lstn"> <img alt="" src="<?php echo base_url();?>images/img-elenco4.jpg">
            <h3>Become Competitive</h3>
            With InHotel you can transform your business into a competitive destination that is able to find the right balance between digital and human based hospitality services... </div>
        </div>
      </div>
      <div class="row txt1" style="display:none;">
        <div class="col-md-5 mrbt" >
          <div class="lstn"> <img alt="" src="<?php echo base_url();?>images/img-elenco5.jpg">
            <h3> Communicate with them</h3>
            InHotel gives you the opportunity to communicate directly with your customers. You can send them promotional messages and receive a direct feedback
with the feature  <span style="color:#01a89e !important;"> Share your experiance with the manager</span>. Thus you can get in direct contact with your customers, meeting their needs and personalizing your service. </div>
        </div>
        <div class="col-md-6 mrbt pull-right">
          <div class="lstn"> <img alt="" src="<?php echo base_url();?>images/img-elenco6.jpg">
            <h3>Build loyalty</h3>
            InHotel is not only a last generation digital tool but also an advantage that will turn and keep your customers loyal... Thus you can have more recurrent visits and higher recommendation levels. </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-12 "><img src="images/bg.jpg" width="100%"></div>
</div>
<script>
setTimeout(function() {
    $('.susdiv').fadeOut('slow');
}, 4000);
</script>
<?php $this->load->view('footer'); ?>
