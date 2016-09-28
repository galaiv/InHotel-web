<link rel="stylesheet" href="<?php echo base_url()?>public/css/jquery-ui.css">
<script src="<?php echo base_url()?>public/js/jquery-ui.js"></script>
<style type="text/css">
.ui-autocomplete-loading {
	background: white url('<?php echo base_url()?>public/images/ui-anim_basic_16x16.gif') right center no-repeat;
}
</style>
<div class="bred_outer"><div class="bred_nav">
	<ul>
        <li><img src="<?php echo base_url()?>public/images/br_home.jpg" class="bn_home" /></li>
        <li><a href="<?php echo base_url()?>admin/admin_dashboard/">Dashboard</a></li>
        <li><img src="<?php echo base_url()?>public/images/br_arow.jpg" class="bn_arow" /></li>
		<li>Admin Preferences</li>
  	</ul>
</div></div>

<div class="container_out"></div>
<div class="container">
<?php if($this->session->flashdata('success')) { ?>
	<div class="sucess_msg"><?php echo $this->session->flashdata('success');?></div>
<?php } if($this->session->flashdata('failure')) { ?>
	<div class="erroe_msg"><?php echo $this->session->flashdata('failure');?></div>
<?php } ?>
<div class="topsec"><div class="t_t"><div class="t_i"><img src="<?php echo base_url()?>public/images/add_edit.png" /></div>

<div class="t_c">Edit</div>
</div>
<a href="javascript:void(0);" onClick="updateAdminPreference();" class="save_btn_green">Save</a>
<a class="back_btn_org" href="<?php echo base_url(); ?>admin/admin_dashboard/">Back</a></div>
<div class="wd_975_blank">
<table width="975" border="0" cellspacing="0" cellpadding="15">
  <tr>
    <td align="left" valign="top" style="">
    <div class="sl_side1big" style="width:975px;"> 
    <div class="wd_975_title3" style="width:975px;">
    <h3>Admin Preferences</h3>
</div>
<form method="post" name="admin_preferences" id="admin_preferences" action="">
<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>"/>
<div class="wd_975">
<div class="wd_975_title"><h3><Sales person Details</h3></div>
<div class="wd_975_cnt">
<div class="wd_935 mrb_10">
<div class="form_adj_up" ><label>Admin Email</label>
   <input type="text" placeholder="" name="admin_email" id="admin_email" value="<?php echo $admin_details['email']?>" class="form_med" style="width:442px;" />
</div>

<div class="form_adj_up" ><label>Admin Name</label>
   <input type="text" placeholder="" name="admin_name" id="admin_name" value="<?php echo $admin_details['name']?>" class="form_med" style="width:442px;" />
</div>
<!--
<div class="form_adj_up" ><label>Per Page</label>
   <input type="text" placeholder="" name="per_page" id="per_page" value="<?php echo $admin_details['per_page']?>" class="form_med" style="width:442px;" />
</div>-->
<!--<div class="form_adj_rte" ><label>Google Search Radius</label>
   <input type="text" placeholder="Search Radius" name="search_radius" id="search_radius" value="<?php //echo $admin_details['radius']?>" class="form_med" style="width:442px;" />
</div>-->
</div>
<div class="wd_935 mrb_10">
</div>
<div class="wd_935 mrb_10">
</div>
<div class="wd_935 mrb_10">
<div class="form_adj_rte">
</div>
</div>
</div>
</div>
</form>
    </div></td>
  </tr>
</table>
</div>

<script>
function updateAdminPreference()
{
	if($("#admin_email").val() == '')
	{
		alert("Please enter Email..!");
		$("#admin_email").focus();
		return false;
	}	
	
	if($("#admin_name").val() == '')
	{
		alert("Please enter Name..!");
		$("#admin_name").focus();
		return false;
	}
	
	
	
	
	/*if($("#search_radius").val() == '')
	{
		alert("Please enter Search Radius");
		$("#search_radius").focus();
		return false;
	}*/
	else
	{
				var admin_email = $("#admin_email").val();	
				var admin_name = $("#admin_name").val();					
				var search_radius = $("#search_radius").val();				
				$.ajax({ 
					type: "POST",	
					url: "<?php echo base_url()."admin/admin_dashboard/updateadminuser";?>",
					data: $("#admin_preferences").serialize(),
					success: function( data ) {
						alert("Admin preferences updated successfully..!");
					}
				});		
	}
}
</script>
