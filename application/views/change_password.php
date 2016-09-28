
<div class="toperror" style="display:none;"> <img width="14" height="16" src="<?php  echo base_url()?>assets/images/error.png"> <span style="margin-top:5px; text-align:center;" id="error_data">Some Data Missing</span></div>
<div class="topsuccess" style="display:none;"> <img width="25" height="25" src="<?php echo base_url() ?>assets/images/sucess.png"> <span style="margin-top:5px; text-align:center;" id="success_data">Some Data Missing</span></div>
<div  class="grn_bg_in">
  <div class="container"> `
    <h2>Management</h2>
    <div class="mnu_sty">
      <ul>
	  <li><a href="<?php echo base_url(); ?>registration/payment">Renew Membership</a></li>
    <li><a href="<?php echo base_url(); ?>hotel_staff/change_password">Change Password</a></li>
	    <li><a href="<?php echo base_url(); ?>hotel_staff/hotel_feedbacks">Hotel Feedbacks</a></li>
		 <li><a href="<?php echo base_url(); ?>hotel_staff/hotel_zones">Hotel Zones</a></li>
		<li><a href="<?php echo base_url(); ?>hotel_staff/settings">Hotel Settings</a></li>

		       </ul>
    </div>
  </div>
</div>

<div class="container gbg_in">
  <div class="row">
  <ol style="margin-bottom: 5px;background-color: #f0f0f0;" class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-home"></i> </a></li>
        <li class="active">Change Password</li>
      </ol>
    <div class="col-lg-12 row">
	  <?php 
if($this->session->flashdata('success'))
{
?>
<div class="alert alert-success"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button><?php echo $this->session->flashdata('success');?></div>
<?php
}
?>

<?php
if($this->session->flashdata('failure'))
{
?>
<div class="alert alert-failure"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><?php echo $this->session->flashdata('failure');?></div>

<?php
}
?>
      <div class="col-md-6 portfolio-item message" style="margin-bottom:40px;">
	
        <h3>Change Password<br/>
        </h3>
        <div  class="">
          <form novalidate="novalidate" action="<?php echo base_url(); ?>hotel_staff/settings" method="POST" id="hostel_form" name="hostel_form">
            <div class="create_user_details">
              
              <div class="form-group">
                <label class="control-label" for="title">Old Password</label>
                <input title="Old Password" type="password" value="" id="old_password" name="old_password"  class="form-control">
                <span class="help-block"></span> </div>
              <div class="form-group">
                <label class="control-label" for="city">New Password</label>
                <input type="password" value="" id="password"  name="password" class="form-control" title="New Password">
                <span class="help-block"></span> </div>
              <div class="form-group">
                <label class="control-label" for="lastname">Confirm Password</label>
                <input type="password" title="Confirm Password" id="conf_password" name="conf_password" class="form-control">
                <span class="help-block"></span> </div>

            </div>
			

            <input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $setting_details['id']; ?>"/>
            <button class="btn res_btn submit_access" type="button" onClick="check();">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/mycss.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>

<script>
$(function(){
	$('#old_password').val('');	  

});
	   function check()
     {      	       
	        var old_password  =		$("#old_password").val();
	        var password      =		$("#password").val();
			var conf_password =		$("#conf_password").val();
			var error = 0;
			
		    if($("#old_password").val()=='')
			{//alert("hi");
				$("#old_password").addClass('poperror');
				error = 1;
				//$("#password").focus();
				return false;
			}
			else
			{
				$("#old_password").removeClass('poperror');
			}
			 if($("#password").val()=='')
			{//alert("hi");
				$("#password").addClass('poperror');
				error = 1;
				//$("#password").focus();
				return false;
			} else if(password.length < 6) {
				
				$("#password").addClass('poperror');
				showerror("Minimum 6 characters required");
				error = 1;			
			} else
			{
				$("#password").removeClass('poperror');
			}
			if($("#conf_password").val()=='')
			{ 
				$("#conf_password").addClass('poperror');
				error = 1;
				//$("#conf_password").focus();
				return false;
			}
			else
			{
				$("#conf_password").removeClass('poperror');
			}
									
			if(password != conf_password)
			{
				$("#conf_password").addClass('poperror');
				showerror("Password doesn't matched");
				error = 1;
				return false;
			}
			else
			{
				$("#conf_password").removeClass('poperror');
			}
			
			if(error ==0)
			{
				//$('#frm_pass').submit();
				//return true;
				$.ajax({
                    url:'<?php echo base_url(); ?>hotel_staff/change_password',
                    type:'post',
                   data:{'old_password':old_password,'password':password,'conf_password':conf_password},
                        success :function(data1){
					 if($.trim(data1) =='success' ){ //alert(data1); 
					   					 		var _html = '<div class="col-lg-12 smr"> <div role="alert" class="alert alert-success"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>Password Updated Successfully</div></div>';
							$('#alerts_register1').html(_html);	
							$('#alerts_register1').show();	
							$('#password').val('');
                        	$('#conf_password').val('');	
							$('#old_password').val('');	  
                        							showsuccessdelete("Password Updated Successfully");

					 							  } else if($.trim(data1) =='pass_fail') { 
							var _html = '<div class="col-lg-12 smr"> <div role="alert" class="alert alert-danger"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button></div></div>';
							
							$('#alerts_register1').html(_html);	
							$('#alerts_register1').show();	
							
														showerror("Invalid Old Password..Try again..");

							
							$('#password').val('');
                        	$('#conf_password').val('');
							$('#old_password').val('');	  
			  
                        						  
												  }  else { 
							var _html = '<div class="col-lg-12 smr"> <div role="alert" class="alert alert-danger"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>Password updation failed..Try again..</div></div>';
							
							$('#alerts_register1').html(_html);	
							$('#alerts_register1').show();	
							
														showerror("Password updation failed..Try again..");
							$('#password').val('');
                        	$('#conf_password').val('');
							$('#old_password').val('');	  
			  
                        						  
												  }

					 }
					 });
			}
    }
   function showerror(data)
{
	$("#error_data").html(data); 
	$('.toperror').slideDown();
	setTimeout(function(){
	$('.toperror').slideUp();
	//$('#msg_head').hide('slow');
	},6000);
}
 function showsuccessdelete(data)
    {
        $("#success_data").html(data);
        $('.topsuccess').slideDown();
        setTimeout(function() {
            $('.topsuccess').slideUp();

        }, 6000);
    }
</script>
