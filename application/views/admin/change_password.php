<link rel="stylesheet" href="<?php echo base_url()?>public/css/jquery-ui.css">
<script src="<?php echo base_url()?>public/js/jquery-ui.js"></script>
<style>
.ui-autocomplete-loading {
background: white url('<?php echo base_url()?>public/images/ui-anim_basic_16x16.gif') right center no-repeat;
}
</style>

<div class="bred_outer"><div class="bred_nav"><ul>

<li><img src="<?php echo base_url()?>public/images/br_home.jpg" class="bn_home" /></li>
<li><a href="<?php echo base_url()?>admin/admin_dashboard/">Dashboard</a></li>
<li><img src="<?php echo base_url()?>public/images/br_arow.jpg" class="bn_arow" /></li>


<li>Change Password</li>

</ul>


</div></div>


<div class="container_out"></div>
<div class="container">
<?php
if($this->session->flashdata('success_su'))
{
?>
	<div class="sucess_msg"><?php echo $this->session->flashdata('success_su');?></div>
<?php
}
?>

<?php
if($this->session->flashdata('failure'))
{
?>
	<div class="erroe_msg"><?php echo $this->session->flashdata('failure');?></div>
<?php
}
?>
<div class="topsec"><div class="t_t"><div class="t_i"><img src="<?php echo base_url()?>public/images/add.png" /></div>

<div class="t_c">Change Password</div>
</div>
<a href="javascript:void(0);" onClick="updateAdminPreference();" class="save_btn_green">Update</a> </div>



<div class="wd_975_blank">


<table width="975" border="0" cellspacing="0" cellpadding="15">
  <tr>
    <td align="left" valign="top" style="">
    <div class="" style="width:975px;">
 
<form method="post" name="frm_member" id="frm_member" action="">
<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>" />
<div class="wd_975">
<div class="wd_975_title"><h3>Change Password</h3></div>
<div class="wd_975_cnt">
<div class="wd_935 mrb_10">
<div class="form_adj_up"><label>Current Password</label>

   <input type="password" placeholder="Current Password" name="old_pass" id="old_pass" value="" class="form_med" style="width:442px; margin-bottom:20px;" />
</div>
<div class="form_adj_up" ><label>New Password</label>

   <input type="password" placeholder="New Password" name="new_pass" id="new_pass" value="" class="form_med" style="width:442px; margin-bottom:20px;" />
</div>
<div class="form_adj_up" ><label>Confirm Password</label>

   <input type="password" placeholder="Confirm Password" name="confirm_pass" id="confirm_pass" value="" class="form_med" style="width:442px; margin-bottom:20px;" />
</div>
</div>

</div>
</div>
</form>

    </div></td>
  
    
  </tr>
</table>

<input type="hidden" name="in_admin_username1" id="in_admin_username1" value="<?php echo $this->session->userdata('adminuser');?>" />



</div>

<script>



function setAdminSession()
{}

function updateAdminPreference()
{

	if($("#old_pass").val() == '') {
		alert("Enter current password..!");
		$("#old_pass").focus();
		return false;
	}
	
	if($("#new_pass").val() == '') {
		alert("Enter new password..!");
		$("#new_pass").focus();
		return false;
	}
	
	if($("#confirm_pass").val() == '') {
		alert("Please confirm your password..!");
		$("#confirm_pass").focus();
		return false;
	}
	
	if($("#new_pass").val()!=$("#confirm_pass").val()) {
		alert("Password confirmation failed..!");
		$("#new_pass").val('');
		$("#confirm_pass").val('');
		$("#new_pass").focus();
		return false;
	} else {
				var old_pass = $("#old_pass").val();			
				var new_pass = $("#new_pass").val();
				var confirm_pass = $("#confirm_pass").val();				
				
				$.ajax({ 
					type: "POST",	
					url: "<?php echo base_url()."admin/admin_password/updateadminpassword";?>",
					data: {old_pass:old_pass,new_pass:new_pass,confirm_pass:confirm_pass},
					success: function( data ) {  
						if(data=='y'){
							//alert("Admin password updated successfully.");
							window.location.reload();
						}
						else if(data=='Wrongc'){
							alert("Password confirmation failed..!");
						}
						else{
							alert("Invalid current password..!");
						}
					}
				});		
	}
}
</script>