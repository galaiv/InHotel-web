<!--<link rel="stylesheet" href="<?php echo base_url()?>public/css/jquery-ui.css">
  <script src="<?php echo base_url()?>public/js/jquery-ui.js" type="text/javascript"></script>-->

<link href="<?php echo base_url(); ?>assets/js/mdatepicker/datepicker.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/mdatepicker/bootstrap-datepicker.js"></script>
<link href="<?php echo base_url(); ?>assets/js/mdatepicker/css/bootstrap.css" rel="stylesheet" type="text/css" />
  
<style>
.ui-autocomplete-loading {
background: white url('<?php echo base_url()?>public/images/ui-anim_basic_16x16.gif') right center no-repeat;
}
</style>

<div class="bred_outer"><div class="bred_nav">
<ul>
<li ><img src="<?php echo base_url()?>public/images/br_home.jpg" class="bn_home" /></li>
<li><a href="<?php echo base_url()?>admin/admin_dashboard/">Dashboard</a></li>
<li><img src="<?php echo base_url()?>public/images/br_arow.jpg" class="bn_arow" /></li>
<li><a href="<?php echo base_url()?>admin/member/">User Listing</a></li>
<li><img src="<?php echo base_url()?>public/images/br_arow.jpg" class="bn_arow" /></li>
<li>Details</li>

</ul>


</div></div>


<div class="container_out"></div>
<div class="container">
<?php
if($this->session->flashdata('success'))
{
?>
	<div class="sucess_msg"><?php echo $this->session->flashdata('success');?></div>
<?php
}
?>

<?php
if(isset($error_message))
{
?>
	<div class="erroe_msg"><?php echo $error_message;?></div>
<?php
}
?>
<div class="topsec">&nbsp;<div class="t_t"><div class="t_i"><img src="<?php echo base_url()?>public/images/add.png" /></div>

<div class="t_c">Add / Edit</div>

</div>
<a href="javascript:void(0);" onClick="updateMemberDetails();" class="save_btn_green">Save</a>
<a class="back_btn_org" href="<?php echo base_url()?>admin/member/index">Back</a> </div>
<div class="wd_975_blank">
<form method="post" name="frm_member" id="frm_member" action="">
<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>" />
<div class="wd_975">
<div class="wd_975_title"><h3> USER DETAILS</h3></div>
<div class="wd_975_cnt">

<!--<div class="wd_935 mrb_10">
    <div class="form_adj_up" ><label>Username<font color="#FF0000">*</font></label>
     <input type="text" placeholder="Username" name="username" id="username" value="<?php echo $member_details['username']?>" class="form_med" style="width:442px;" />
    </div>    
</div>-->

<div class="wd_935 mrb_10">   
    <div class="form_adj_rte" ><label>First Name<font color="#FF0000">*</font></label>
     <input type="text" placeholder="First Name" name="first_name" id="first_name" value="<?php echo $member_details['first_name']?>" class="form_med" style="width:442px;" />
    </div>
    <div class="form_adj_rte" ><label>Last Name<font color="#FF0000">*</font></label>
     <input type="text" placeholder="Last Name" name="last_name" id="password" value="<?php echo $member_details['last_name']?>" class="form_med" style="width:442px;" />
    </div>
</div>
<div class="wd_935 mrb_10">   
    <div class="form_adj_rte" ><label>Nick Name<font color="#FF0000"></font></label>
     <input type="text" placeholder="Nick Name" name="nick_name" id="nick_name" value="<?php echo $member_details['nick_name']?>" class="form_med" style="width:442px;" />
    </div>
    <div class="form_adj_rte" ><label>Email Address<font color="#FF0000">*</font></label>
     <input type="text" placeholder="Email Address" name="email_address" id="email_address" value="<?php echo $member_details['email_address']?>" class="form_med" style="width:442px;"  disabled="disabled"/>
    </div>
</div>
<!--<div class="wd_935 mrb_10">

	<div class="form_adj_up" ><label>Email Address<font color="#FF0000">*</font></label> 
     <input type="text" placeholder="Email Address" name="email_address" id="email_address" value="<?php echo $member_details['email_address']?>" class="form_med" style="width:442px;"  disabled="disabled"/>
    </div>
    <div class="form_adj_rte" ><label>Nick Name<font color="#FF0000"></font></label>
     <input type="text" placeholder="Nick Name" name="nick_name" id="nick_name" value="<?php echo $member_details['nick_name']?>" class="form_med" style="width:442px;" />
    </div>
    
   
</div>-->

<?php /* <div class="wd_935 mrb_10">    
    <div class="form_adj_up" ><label>Date of Birth<font color="#FF0000">*</font></label> 
     <input type="text" data-date-format="yyyy-mm-dd" placeholder="Date of Birth" name="dob" id="dob" value="<?php echo $member_details['dob']?>" class="form_med datepicker1" style="width:442px;" />
    </div>
    <div class="form_adj_rte" ><label>Gender<font color="#FF0000">*</font></label>
     <!--<input type="text" placeholder="Gender" name="gender" id="gender" value="<?php //echo $member_details['gender']?>" class="form_med" style="width:442px;" />-->
     <select name="gender" id="gender" class="form_list_med" style="width:458px; padding-top:3px !important;">
          <option value="0">-- Select --</option>
          <option value="M" <?php if($member_details['gender']=='M') { ?> selected="selected" <?php } ?> >Male</option>
          <option value="F" <?php if($member_details['gender']=='F') { ?> selected="selected" <?php } ?> >Female</option>
     </select>
    </div>   
</div>

<div class="wd_935 mrb_10">    
    <div class="form_adj_up" ><label>Address<font color="#FF0000">*</font></label> 
     <input type="text" placeholder="Address" name="address" id="address" value="<?php echo $member_details['address']?>" class="form_med" style="width:442px;" />
    </div>
    <div class="form_adj_rte" ><label>City<font color="#FF0000">*</font></label>
     <input type="text" placeholder="City" name="city" id="city" value="<?php echo $member_details['city']?>" class="form_med" style="width:442px;" />
    </div>   
</div>

<div class="wd_935 mrb_10">    
    <div class="form_adj_up" ><label>State</label> 
     <input type="text" placeholder="State" name="state" id="state" value="<?php echo $member_details['state']?>" class="form_med" style="width:442px;" />
    </div>
    <div class="form_adj_rte" ><label>Country<font color="#FF0000">*</font></label>
     <input type="text" placeholder="Country" name="country" id="country" value="<?php echo $member_details['country']?>" class="form_med" style="width:442px;" />
    </div>   
</div>

<div class="wd_935 mrb_10">    
    <div class="form_adj_up" ><label>Pin Code<font color="#FF0000">*</font></label> 
     <input type="text" placeholder="Pin Code" name="pincode" id="pincode" value="<?php echo $member_details['pincode']?>" class="form_med" style="width:442px;" />
    </div>
    <div class="form_adj_rte" ><label>Telephone/Mobile<font color="#FF0000">*</font></label>
     <input type="text" placeholder="Telephone/Mobile" name="telephone" id="telephone" value="<?php echo $member_details['telephone']?>" class="form_med" style="width:442px;" />
    </div>   
</div>
  

 



<!--
<div class="wd_935 mrb_10">

<div class="form_adj_up"><label>City</label>

   <input type="text" placeholder="City" name="city" id="city" value="<?php echo $member_details['city']?>" class="form_med" style="width:442px;" />
</div>
     <div class="form_adj_rte"><label>State</label>

   <input type="text" placeholder="State" name="state" id="state" value="<?php echo $member_details['state']?>" class="form_med" style="width:442px;" />
</div>
 <div class="form_adj_up"><label>Zipcode</label>

   <input type="text" placeholder="Zipcode" name="zipcode" id="zipcode" value="<?php echo $member_details['zipcode']?>" class="form_med" style="width:442px;" />
</div>
</div>-->

<!--<div class="wd_935 mrb_10">
<div class="form_adj_up"><label>State</label>

   
        <select name="state_id" id="state_id" class="form_list_med" style="width:462px;">
          <option value="0">Select State</option>
          <?php
		foreach($state_list as $row) {
		?>
	        <option value="<?php echo $row['state_id']; ?>" <?php if(@$row['state_id']==@$member_details['state_id'])
{ ?> selected <?php } ?> > 
                               <?php echo $row['state_name']; ?> </option>
		<?php
		 }
		?>
        </select>
    
</div>
</div>--> */ ?>



</div>
</div>
<!--<input type="hidden" name="member_type" value="<?php echo $member_details['member_type'] ;?>" />-->
</form>
</div>


<script type="text/javascript">
$(function() {
	$('.datepicker1').datepicker({
		orientation: "auto top",
    	endDate: '1d'
	});
});
</script>

<script>
function isNumberKey(e)
          {
             
			 if( (e.which>47 && e.which<58)||(e.which > 42 && e.which < 47) ||(e.which == 32)|| ( e.which==8 ) || (e.which==0))
                return true;
 
             return false;
          }
		  
function updateMemberDetails()
{
/*	var	first_name		=	$.trim($("#first_name").val());	
	var	surname			=	$.trim($("#surname").val());
	var	street			=	$.trim($("#street").val());
	var	city			=	$.trim($("#city").val());
	var	state_id			=$.trim($("#state_id").val());
	var	zipcode				=$.trim($("#zipcode").val());
	var	apartment_no		=	$.trim($("#apartment_no").val());
	var	restaurant_name		=	$.trim($("#restaurant_name").val());
	var	restaurant_genre	=	$.trim($("#restaurant_genre").val());
	var	phone				=	$.trim($("#phone").val());

	if(first_name=='' || first_name=='First Name' || first_name=='First%20Name')
	{
		alert("Please Enter First name");
		$("#first_name").focus();
		return false;
	}
	
	
	 if(street=='' || street=='Street')
	{
		alert("Please Enter Street name");
		$("#street").focus();
		return false;
	}
	
	 if(city=='' || city=='City')
	{
		alert("Please Enter City name");
		$("#city").focus();
		return false;
	}
	
	 if(state_id=='0')
	{
		alert("Please Select State");
		$("#state_id").focus();
		return false;
	}
	
	 if(zipcode=='' || zipcode=='Zip Code')
	{
		alert("Please Enter Zip Code");
		$("#zipcode").focus();
		return false;
	}
	
	 if(zipcode=='' || zipcode=='Zip Code')
	{
		alert("Please Enter Zip Code");
		$("#zipcode").focus();
		return false;
	}
	
	*/
	<?php /*if($mem_type=='restaurateur'){ ?>
	if(restaurant_name=='' || restaurant_name=='Restaurant Name')
	{
		alert("Please Enter Restaurant Name");
		$("#restaurant_name").focus();
		return false;
	}
	
	 if(restaurant_genre=='' || restaurant_genre=='Restaurant Genre')
	{
		alert("Please Enter Restaurant Genre");
		$("#restaurant_genre").focus();
		return false;
	}
	<?php }?>
	
	
	<?php if($mem_type=='muncher'){ ?>
	if(apartment_no=='' || apartment_no=='Apartment Number')
	{
		alert("Please Enter Apartment Number");
		$("#apartment_no").focus();
		return false;
	}
	
	
	<?php }?>
	
	<?php if($mem_type=='driver'){ ?>
	if(phone=='' || apartment_no=='Phone Number')
	{
		alert("Please Enter Phone Number");
		$("#phone").focus();
		return false;
	}
	
	
	<?php }*/?>
	
	$('#frm_member').submit();
}
  



</script>
