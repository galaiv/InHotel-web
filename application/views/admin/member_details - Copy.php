<?php //print_r($member_details); exit(); ?>
<!--<script src="https://maps.google.com/maps/api/js?sensor=false"  type="text/javascript"></script>-->
<script type="text/javascript" src="<?php echo base_url()?>public/js/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/js/jquery.fancybox.css?v=2.1.5" media="screen" />
<div class="bred_outer"><div class="bred_nav">

<ul>

<li ><a href="#" ><img src="<?php echo base_url();?>public/images/br_home.jpg" class="bn_home" /></a></li>
<li><a href="<?php echo base_url()?>admin/admin_dashboard">Dashboard</a></li>
<li><img src="<?php echo base_url()?>public/images/br_arow.jpg" class="bn_arow" /></li>
<li><a href="<?php echo base_url()?>admin/member/"> User Listing</a></li>
<li><img src="<?php echo base_url()?>public/images/br_arow.jpg" class="bn_arow" /></li>

<li>Details</li>

</ul>


</div></div>
<div class="container_out"></div>
<div class="container"><div class="topsec"><div class="t_t"><div class="t_i">
    <img src="<?php echo base_url();?>public/images/details.png" />
</div>
<div class="t_c"> USER DETAILS </div>
</div> 
<a class="back_btn_org" style="margin-right:0px;" href="<?php echo base_url()?>admin/member/index">Back</a>
</div>
<div class="wd_975">
<div class="wd_975_title">
    <h3>Details</h3>
    
  
</div>
  <div class="wd_975_cnt">
 <div class="l_detout" style="margin-bottom:0px;">
     
   
     
     <div class="l_det">
     <div class="l_detl">First  Name:  </div>
     <div class="l_detr"><?php echo $member_details['first_name']==''?'-':$member_details['first_name']; ?>  </div>
 </div>
 
 <div class="l_det">
   <div class="l_detl">Email:  </div>
   <div class="l_detr"><?php echo $member_details['email_address']==''?'-':$member_details['email_address']; ?></div></div>
  
    
 <div class="l_det">
     <div class="l_detl">Gender:  </div>
     <div class="l_detr">  <?php echo $member_details['gender']=='F'?'Female':'Male'; ?>  </div>
     </div>
	 <div class="l_det">
     <div class="l_detl">Active:  </div>
     <div class="l_detr">  <?php echo $member_details['active']=='Y'?'YES':'NO'; ?>  </div>
     </div>
 

 </div>
 
 
 <div class="l_detoutr" style="margin-bottom:0px;">
   
<div class="l_det">
     <div class="l_detl">Last Name:  </div>
     <div class="l_detr"><?php echo $member_details['last_name']==''?'-':$member_details['last_name']; ?>  </div>
 </div>
      
 
     <div class="l_det">
     <div class="l_detl">Nick Name:  </div>
     <div class="l_detr"><?php echo $member_details['nick_name']==''?'--&nbsp;--':$member_details['nick_name']; ?> </div>
 </div>

       
  <div class="l_det">
     <div class="l_detl">Date of Birth:  </div>
     <div class="l_detr"><?php  echo date('m-d-Y ',strtotime($member_details['dob'])) ?></div>
 </div>
 
 <div class="l_det">
     <div class="l_detl">Join Date:  </div>
     <div class="l_detr"><?php  echo date('m-d-Y ',strtotime($member_details['join_date'])) ?></div>
 </div>
<!--   
  <div class="l_det">
     <div class="l_detl">Phone Number:  </div>
     <div class="l_detr"><?php echo $member_details['phone_no']==''?'-':$member_details['phone_no']; ?> </div>
 </div>-->

 </div>
  
 
<!--  <div class="l_detout">
  
  <div class="l_det">
 <div class="l_detl">Street Address:  </div>
 <div class="l_detr"><?php echo $member_details['street_address']==''?'-':$member_details['street_address']; ?></div>
 </div>
  <div class="l_det">
 <div class="l_detl">State:  </div>
 <div class="l_detr"><?php echo $member_details['state']==''?'-':$member_details['state']; ?></div>
 </div>-->
<!--   
 <div class="l_det">
     <div class="l_detl">Active:  </div>
     <div class="l_detr"><?php echo $member_details['active']=='Y'?'YES':'NO'; ?> </div>
 </div>
 
 
 </div>-->
 
<!-- 
 <div class="l_detoutr">
 <div class="l_det">
 <div class="l_detl">City:  </div>
 <div class="l_detr"><?php echo $member_details['city']==''?'-':$member_details['city']; ?></div>
 </div>
 <div class="l_det">
 <div class="l_detl">Zip Code:  </div>
 <div class="l_detr"><?php echo $member_details['zipcode']==''?'-':$member_details['zipcode']; ?></div>
 </div>

 </div>-->

   </div>

	
   <!--<div class="wd_975_gray">Image</div>-->

<?php $split = explode(".",$member_details['profile_image']); ?>

<!--<div class="wd_975_cnt"><?php if($member_details['profile_image']){?>


<img src="<?php echo base_url().'upload/members/' .$split[0]."cropd_thumb.".$split[1]; ?>" alt="image" />
<?php }
  
 elseif($member_details['fb_profile_photo']) {?>
  <img src="<?php echo $member_details['fb_profile_photo'];?>" alt="image" style="width:150px; height:150px;"/>
  
  <?php }
  
 elseif($member_details['google_plus_photo']) {?>
  <img src="<?php echo $member_details['google_plus_photo'];?>" alt="image" style="width:150px; height:150px;"/>
  
  <?php }else {?>
<img src="<?php echo base_url();?>upload/members/no_img_profile.jpg" width="70" height="70"  alt="image"  /> 

<?php }?>
  </div>-->

  
  
</div>

