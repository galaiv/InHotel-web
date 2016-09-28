<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.datetimepicker.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.datetimepicker.js"></script>
<script src="<?php echo base_url();?>assets/js/chat/quickblox.js"></script>
<script src="<?php echo base_url();?>assets/js/chat/app.js"></script>
<script>var siteurl = '<?php echo base_url();?>';
var member_type = '<?php echo $this->session->userdata('member_type');?>';</script>
<div class="toperror" style="display:none;"> <img width="14" height="16" src="<?php  echo base_url()?>assets/images/error.png"> <span style="margin-top:5px; text-align:center;" id="error_data">Some Data Missing</span></div>
<div  class="grn_bg_in">
  <div class="container"> `
    <h2>Management</h2>
    <div class="mnu_sty">
      
    </div>
  </div>
</div>
<div class="container gbg_in">
  <div class="row">
   <ol style="margin-bottom: 5px;background-color: #f0f0f0;" class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-home"></i> </a></li>
		<li><a href="<?php echo base_url()?>hotel_staff">Staff Management</a></li>
        <li class="active">Staff details</li>
      </ol>
    <div class="col-lg-12 row">
      <div class="col-md-6 portfolio-item message" style="margin-bottom:40px;">
        <h3>Staff Management<br/>
        </h3>
        <div  class="">
          <form novalidate="novalidate" action="<?php echo base_url(); ?>hotel_staff/add" method="POST" id="hotel_staff">
            <div class="create_user_details">
              <div class="form-group">
                <label class="control-label" for="email">Email</label>
                <input type="text" title="Please enter  email" <?php echo ($member_details['email_address']!="")  ? "readonly=''" : '';?> required="" value="<?php echo ($_POST['email']) ? $_POST['email'] : $member_details['email_address'];?>" name="email_address" id="email_address" class="form-control" onBlur="validate(this.id);">
                <span class="help-block"></span> </div>
              <div class="form-group">
                <label class="control-label" for="nickname">Nickname</label>
                <input type="text" title="Please enter  nick name" required="" value="<?php echo ($_POST['nick_name']) ? $_POST['nick_name'] : $member_details['nick_name'];?>" name="nick_name" id="nick_name" class="form-control">
                <span class="help-block"></span> </div>
              <div class="form-group">
                <label class="control-label" for="firstname">First Name</label>
                <input type="text" title="Please enter  first tname" required="" value="<?php echo ($_POST['first_name']) ? $_POST['first_name'] : $member_details['first_name'];?>" name="first_name" id="first_name" class="form-control">
                <span class="help-block"></span> </div>
				<div class="form-group">
                <label class="control-label" for="lastname">Last Name</label>
                <input type="text" title="Please enter your last name" required="" value="<?php echo ($_POST['last_name']) ? $_POST['last_name'] : $member_details['last_name'];?>" name="last_name" id="last_name" class="form-control">
                <span class="help-block"></span> </div>
              <?php $user_id = $this->uri->segment(3, 0); if($user_id == "") { ?>
              <div class="form-group">
                <label class="control-label" for="nickname">Password</label>
                <input type="password" title="Please enter Password" required="" value="" name="password" id="password" class="form-control" onBlur="validate(this.id);">
                <span class="help-block"></span> </div>
              <div class="form-group">
                <label class="control-label" for="firstname">Confirm Password</label>
                <input type="password" title="Please confirm password" required="" value="" name="confirm_password" id="confirm_password" class="form-control">
                <span class="help-block"></span> </div>
              <?php } ?>
              
              <div class="form-group">
                <label class="control-label" for="roomnumber">Birth Date</label>
                <input type="text" title="Please enter your date of birth" required=""  name="dob" id="dob" value="<?php echo ($_POST['dob']) ? $_POST['dob'] :  $member_details['dob']?>" class="form-control">
                <span class="help-block"></span> </div>
              <div class="form-group">
                <label class="control-label" for="gender">Gender</label>
                <label class="radio-inline">
                <input type="radio" name="gender" class="gender" value="M"  <?php if($member_details['gender'] == "M" || $member_details['gender']=="") {?>  checked="checked" <?php } ?> >
                Male </label>
                <label class="radio-inline">
                <input type="radio" name="gender" class="gender" value="F" <?php if($member_details['gender'] == "F") {?>  checked="checked" <?php } ?>>
                Female </label>
                <span class="help-block"></span> </div>
            </div>
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $member_details['user_id']; ?>"/>
            <input type="hidden" name="user_id_qb" id="user_id_qb" value=""/>
			<input type="hidden" name="user_pass_qb" id="user_pass_qb" value=""/>
			<input type="hidden" name="user_id1" id="user_id1" value=""/>

            <button class="btn res_btn submit_access" type="button" onClick="create_user();">Submit</button>		
			  <button id="sessionButton1" type="button" style="display:none;" ></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/mycss.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>

<script>
   $(function() {

  $('#dob').datetimepicker({
                lang: 'en',
                timepicker: false,
                format: 'Y-m-d',
           maxDate: 0,
            });
	});
	function validate(id)
{
	var flag   = 0;
	var val    = $.trim($("#"+id).val());
	var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	var user_id = '<?php echo $this->uri->segment(3, 0); ?>';
 
	if(id == 'email_address' && (user_id == "0" || user_id == ""))
	{
		if(!filter.test(val))
		{
		   
			if(flag == 0)
			{
				//$("#email").focus(); 
			}
			$("#email_address").addClass('poperror'); 
			showerror('Invalid Email');

			flag = 1;
		}else{ 
		 
			$.ajax({
				type:'POST',
				url:'<?php echo base_url(); ?>hotel_staff/checkEmailExist',
				data:{'email':val,'user_id' : user_id},

				success:function(data){
					if($.trim(data )== "Y")
					{
						$("#email_address").val(''); 
						showerror('This email id is already registered with us');
						$("#email_address").addClass('poperror');
						flag = 1;
						return false;
					} else{
						$("#email_address").removeClass('poperror'); 
					}
				}
			});
			$("#email_address").removeClass('poperror'); 
		}
	}
	else if(id == 'password')
	{
		if(val.length < 6)
		{
			if(flag == 0)
			{
				//$("#password").focus(); 
			}
			$("#password").addClass('poperror'); 
			showerror('Minimum 6 characters required');
			flag = 1;
		}else{
			$("#password").removeClass('poperror'); 
		}
	}
}	
	   function create_user() {

            var flag  = 0;
            var email_address = $.trim($("#email_address").val());
			var user_id = $("#user_id").val();
            var	password    =	$.trim($("#password").val()); 
            var	confirm_password    =	$.trim($("#confirm_password").val());  
            var first_name = $.trim($("#first_name").val());
            var last_name = $.trim($("#last_name").val());
            var nick_name = $.trim($("#nick_name").val());
            var gender = $.trim($(".gender").val());
			var dob = $.trim($("#dob").val());
            var id = '<?php echo  $this->uri->segment(3, 0); ?>';
			//alert(id);
			var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	        var form_data = '';

			if(email_address=='' && (id == "" || id == "0"))
			{
				if(flag == 0)
				{
					//$("#first_name").focus(); 
				}
				$("#email_address").addClass('poperror'); 
				flag = 1;
			    }else{
				$("#email_address").removeClass('poperror'); 
			}
			if(first_name=='')
			{
				if(flag == 0)
				{
					//$("#first_name").focus(); 
				}
				$("#first_name").addClass('poperror'); 
				flag = 1;
			}else{
				$("#first_name").removeClass('poperror'); 
				form_data+="&first_name="+$("#first_name").val();
			} 
			
			if(last_name=='')
			{
				if(flag == 0)
				{
					$("#last_name").focus(); 
				}
				$("#last_name").addClass('poperror'); 
				flag = 1;
			}else{
				$("#last_name").removeClass('poperror'); 
				form_data+="&last_name="+$("#last_name").val();
			} 
			if(nick_name=='')
			{
				if(flag == 0)
				{
					$("#nick_name").focus(); 
				}
				$("#nick_name").addClass('poperror'); 
				flag = 1;
			}else{
				$("#nick_name").removeClass('poperror'); 
				form_data+="&nick_name="+$("#nick_name").val();
			}
		if(id == "" || id == "0") { 
			if(password != "")
				{
					if(password.length < 6)
					{
						if(flag == 0)
						{
							$("#password").focus(); 
						}
						$("#password").addClass('poperror');
						flag = 1;
					}else{
						$("#password").removeClass('poperror'); 
						//$("#confirm_password").removeClass('poperror'); 
					}
					
					if(password!=confirm_password || confirm_password=='')
					{ 
						if(flag == 0)
						{
							$("#confirm_password").focus(); 
						}
						showerror("Password doesn't matched");
						$("#confirm_password").addClass('poperror'); 
						flag = 1;
					}else{
						
						$("#confirm_password").removeClass('poperror'); 
						form_data+="&password="+$("#password").val();

					}
	
				}
				else
				{
					$("#password").addClass('poperror'); 
					$("#confirm_password").addClass('poperror'); 
					flag = 1;

				} 
	         }
			if(gender == "")
			{
				if(flag == 0)
				{
					$("#gender").focus(); 
				}
				$("#gender").addClass('poperror'); 
				showerror("Please select gender");
				flag = 1;
			}else{
				$("#gender").removeClass('poperror'); 
				form_data+="&gender="+$(".gender:checked").val();
			}
				if(dob=='')
			{
				if(flag == 0)
				{
					$("#dob").focus(); 
				}
				$("#dob").addClass('poperror'); 
				flag = 1;
			}else{
				$("#dob").removeClass('poperror'); 
				form_data+="&dob="+$("#dob").val();
			}
			if(!filter.test(email_address))
			{
				if(flag == 0)
				{
					$("#email_address").focus(); 
				}
				$("#email_address").addClass('poperror'); 
				flag = 1;
			} else { 
				$.ajax({
				type:'POST',
				url:'<?php echo base_url(); ?>hotel_staff/checkEmailExist',
				data:{'email':email_address,'user_id' : id},

				success:function(data){
					if($.trim(data) == "Y")
					{
						$("#email_address").val(''); 
						showerror('This email id is already registered with us');
						$("#email_address").addClass('poperror'); 
						flag = 1;
						return false;
					} else {
					$("#email_address").removeClass('poperror'); 
					form_data+="&email_address="+$("#email_address").val();
               if(flag == 0)
				{ 
				if(user_id != "") {
				   form_data+="&user_id="+$("#user_id").val();
				   $.ajax({
								url: "<?php echo base_url(); ?>hotel_staff/add",
								type: "post",
								data: form_data,
								success: function(data) {
									 window.location.href="<?php echo base_url(); ?>hotel_staff/";
								}
								});
				} else {
					form_data+="&user_id=0";
						 $('.submit_access').prop('disabled', true);
						$.ajax({
								url: "<?php echo base_url(); ?>hotel_staff/add",
								type: "post",
								data: form_data,
								success: function(data) {  //alert(data);
								     var data1 = $.trim(data);
								     $("#user_id_qb").val("inhotel_"+data1);
									 $("#user_id1").val(data1);
									 $("#user_pass_qb").val("inhotel_"+data1+"123");
			          			     $("#sessionButton1").trigger('click');
									
								}
								}); }
						 
				}
					}
				}
			});
			$("#email_address").removeClass('poperror'); 
			form_data+="&email_address="+$("#email_address").val();

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
</script>
