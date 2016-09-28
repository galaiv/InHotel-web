
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
        <li class="active">Settings</li>
      </ol>
    <div class="col-lg-12 row">
<div class="col-lg-12" id="alerts_register1" style="display:none">                   	               
               	 	</div> 
				<?php
if($success !="")
{
?>
<strong><div class="alert alert-block red" style="color:red;font-family:Arial, Helvetica, sans-serif; width:460px;margin-left:-26px;"><?=$success;?></div><strong>
<?php
}
?> 					
      <div class="col-md-6 portfolio-item message" style="margin-bottom:40px;">
	
        <h3>Settings<br/>
        </h3>
        <div  class="">
          <form novalidate="novalidate" action="<?php echo base_url(); ?>hotel_staff/settings" method="POST" id="hostel_form" name="hostel_form" enctype="multipart/form-data">
            <div class="create_user_details">
              <div class="form-group">
                <label class="control-label" for="email">Email</label>
                <input type="text" title="Please enter  email" <?php echo ($setting_details['email_address']!="")  ? "readonly=''" : '';?> required="" value="<?php echo ($_POST['email']) ? $_POST['email'] : $setting_details['email_address'];?>" name="email_address" id="email_address" class="form-control">
                <span class="help-block"></span> </div>
              <div class="form-group">
                <label class="control-label" for="title">Hotel Name</label>
                <input type="text" title="Please enter hotel name" required="" value="<?php echo ($_POST['title']) ? $_POST['title'] : $setting_details['title'];?>" name="title" id="title" class="form-control">
                <span class="help-block"></span> </div>
              <div class="form-group">
                <label class="control-label" for="city">City</label>
                <input type="text" title="Please enter city" required="" value="<?php echo ($_POST['city']) ? $_POST['city'] : $setting_details['city'];?>" name="city" id="city" class="form-control">
                <span class="help-block"></span> </div>
              <div class="form-group">
                <label class="control-label" for="website">website</label>
                <input type="text" title="Please enter your website" required="" value="<?php echo ($_POST['website']) ? $_POST['website'] : $setting_details['website'];?>" name="website" id="website" class="form-control">
                <span class="help-block"></span> </div>
                 <div class="form-group">
                <label class="control-label" for="feedback email">Feedback Email</label>
                <input type="text" title="Please enter  feedback email" required="" value="<?php echo ($_POST['feedback_email']) ? $_POST['feedback_email'] : $setting_details['feedback_email'];?>" name="feedback_email" id="feedback_email" class="form-control">
                <span class="help-block"></span> </div>
				<div class="form-group">
                <label class="control-label" for="contact_number">Contact </label>
<input type="text" title="Please enter Contact number" required="" value="<?php echo ($_POST['contact_number']) ? $_POST['contact_number'] : $setting_details['contact_number'];?>" name="contact_number" id="contact_number" class="form-control">
                <span class="help-block"></span> </div>
				
				<div class="form-group">
                <label class="control-label" for="address">Address</label>
               	 <textarea role="" rows="4" name="address" id="address"  class="form-control"><?php echo strip_tags($setting_details['address']);?></textarea>

                <span class="help-block"></span> </div>
				<div class="form-group">
                <label class="control-label" for="time_zone">Zipcode</label>
       <input type="text" title="Please enter Zipcode" required="" value="<?php echo ($_POST['zipcode']) ? $_POST['zipcode'] : $setting_details['zipcode'];?>" name="zipcode" id="zipcode" class="form-control">
                <span class="help-block"></span> </div>
              <div class="form-group">
                <label class="control-label" for="description">Description</label>
               	 <textarea role=""  id="description" rows="4" name="description"  class="form-control"><?php echo strip_tags($setting_details['description']);?></textarea>

                <span class="help-block"></span> </div>
				 <div class="form-group">
                <label class="control-label" for="short_description">Short Description</label>
               	 <textarea role="" rows="3" id="short_description" name="short_description"  class="form-control"><?php echo strip_tags($setting_details['short_description']);?></textarea>

                <span class="help-block"></span> </div>
				<div class="form-group">
                <label class="control-label" for="short_description">Image</label>
               	<?php if ($setting_details['image']!="") { ?>
                        <img src="<?php echo base_url() . 'upload/hotel/thumb/' . $setting_details['image']; ?>"   alt="Image" width="100px" height="100px" />
                    <?php } else { ?>
                        <img src="<?php echo base_url() ?>upload/no-image.jpg"/>
                    <?php } ?>	
                    <input type="file" id="image" name="image">
					<input type="hidden" id="image1" name="image1" value="<?php echo $setting_details['image'];?>">


                <span class="help-block"></span> </div>
				
            </div>
			

            <input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $setting_details['id']; ?>"/>
            <button class="btn res_btn submit_access" type="button" onClick="create_user();">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/mycss.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>

<script>
	   function create_user() {
            var flag  = 0;
            var title = $.trim($("#title").val());
            var	city    =	$.trim($("#city").val()); 
            var	website    =	$.trim($("#website").val()); 
            var	feedback_email    =	$.trim($("#feedback_email").val()); 
			var	address    =	$.trim($("#address").val());
			var	contact    =	$("#contact_number").val(); 
			var	short_description    =	$("#short_description").val(); 
			var	description    =	$("#description").val(); 
			var	hotel_id    =	$("#hotel_id").val(); 
			var zipcode = $("#zipcode").val(); 
			var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            
			if(title=='')
			{

				if(flag == 0)
				{
					//$("#first_name").focus(); 
				}
				$("#title").addClass('poperror'); 
				flag = 1;
			    }else{
				$("#title").removeClass('poperror'); 
			}
			if(city=='')
			{
				if(flag == 0)
				{
					//$("#first_name").focus(); 
				}
				$("#city").addClass('poperror'); 
				flag = 1;
			}else{
				$("#city").removeClass('poperror'); 
			} 
			
			if(website=='')
			{
				if(flag == 0)
				{
					$("#website").focus(); 
				}
				$("#website").addClass('poperror'); 
				flag = 1;
			}else{
				$("#website").removeClass('poperror'); 
			}
                        if(feedback_email=='')
			{
				if(flag == 0)
				{
					//$("#first_name").focus(); 
				}
				$("#feedback_email").addClass('poperror'); 
				flag = 1;
			    }else{
				$("#feedback_email").removeClass('poperror'); 
			}
                        if(!filter.test(feedback_email))
		{
		   
			if(flag == 0)
			{
				//$("#email").focus(); 
			}
			$("#feedback_email").addClass('poperror'); 
			showerror('Invalid Email');

			flag = 1;
		}
			if(address=='')
			{
				if(flag == 0)
				{
					$("#address").focus(); 
				}
				$("#address").addClass('poperror'); 
				flag = 1;
			}else{
				$("#address").removeClass('poperror'); 
				
			}
			if(contact=='')
			{
				if(flag == 0)
				{
					$("#contact_number").focus(); 
				}
				$("#contact_number").addClass('poperror'); 
				flag = 1;
			}else{
				$("#contact_number").removeClass('poperror'); 
				
			}
				if(zipcode=='')
			{
				if(flag == 0)
				{
					$("#zipcode").focus(); 
				}
				$("#zipcode").addClass('poperror'); 
				flag = 1;
			}else{
				$("#zipcode").removeClass('poperror'); 
				
			}
		if(flag == 0)
		{ 
			 $('.submit_access').prop('disabled', true);
/*			 $.ajax({
                    url:'<?php echo base_url(); ?>hotel_staff/settings',
                    type:'post',
                   data:{'title':title,'city':city,'website':website,'address':address,'contact_number':contact,'short_description':short_description,'description':description,'hotel_id':hotel_id},
                        success :function(data1){
							 if($.trim(data1) =='success') { 
							 				showsuccessdelete("Photel profile details updated successfully");
							 } else { 
							 				showerror("Updation Failed..Try again..");
							 }
						 }
						});
*/			$('#hostel_form').submit();
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
