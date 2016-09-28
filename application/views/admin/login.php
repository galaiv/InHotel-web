<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>InHotel</title>
<link href="<?php echo base_url()?>public/css/admin_style.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600' rel='stylesheet' type='text/css'>
<script src="<?php echo base_url()?>public/js/jquery-1.10.2.min.js"></script>
<link href="<?php echo base_url()?>public/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
<script src="<?php echo base_url()?>public/js/jquery-ui-1.10.3.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/js/jquery_blockUI.js"></script>
<script>
$(function() {
	// Link to open the dialog
	var opt = {
        autoOpen: false,
        modal: true,
        width: 560,
        height:210,
        title: 'Forgot your password'
};
	$( "#dialog-link" ).click(function( event ) {
		$("#dialog").dialog(opt).dialog("open");
		event.preventDefault();
	});	
});
</script>
</head>
<body>
<div class="head">
  <div  class="head_in"><a href="<?php echo base_url()?>" class="logo_lgn"  target="_blank"><img style="padding: 15px;" width="180px"  src="<?php echo base_url()?>/public/images/logo.png"  class="img_style"/></a></div>
</div>
<div class="container_out" style="width:100%;"><div class="lgn_outer"><div class="lgn_in"><h1>Login to your account</h1>
<div class="lgn_in_main"><div class="lgn_in_form">  
  <input type="text" class="form_med" placeholder="Username" name="username" id="username" style="width:399px;" />  
</div>
<div class="lgn_in_form">  
  <input type="password" class="form_med" placeholder="Password" name="password" id="password" style="width:399px;" />  
</div>
<div class="lgn_in_form">
<a href="javascript:void(0);" id="submitbut" class="login_btn">Login</a>
<!--<div class="fgt">
  <label>
  <input type="checkbox" name="checkbox" value="checkbox" checked="true">
  </label>
  Remember Me</div>--></div>
</div>
<div class="frgt">Forgot your password ?<br/><span>no worries,&nbsp;<a href="javascript:void(0);" id="dialog-link" class="frg_llink">click here</a> to reset your password.</span></div>
</div>
<div class="lgn_footer"><?php echo date("Y");?> &copy;  InHotel </div>
</div></div>

<!-- ui-dialog -->
<div id="dialog" title="Dialog Title" style="display:none;height: 163px; width: 527px">
     <div class="lgn_in" style="width:557px; position:relative;left:-13px"><h1 style="width:485px;">Enter admin email address</h1>
    <div class=""><div class="lgn_in_form" style="margin-left:64px; margin-top: 10px;">    
      <input type="text" class="form_med" placeholder="Email Address" name="admin_email" id="admin_email" style="width:399px; margin-left:5px;" />      
    </div> 
    
    <div class="lgn_in_form" >
    <a href="javascript:void(0);" id="fgt_pswd_submit" class="login_btn" style="margin-right:-68px; color:#FFFFFF; float:right;">Submit</a>
    </div>
    
    </div>  
    
    </div>
</div>

<script>
$(document).ready(function(){
	
// Link to open the dialog
$( "#dialog-link" ).click(function( event ) {
	$("#admin_email").css("border-color", "#e4e4e4");
	$( "#dialog" ).dialog( "open" );
	event.preventDefault();
});

$('#admin_email').keypress(function(event){
  if(event.keyCode == 13){
    $('#fgt_pswd_submit').click();
  }
});

$("#fgt_pswd_submit").click(function(event){
	
	if($("#admin_email").val() == '')
	{
		$("#admin_email").css("border-color", "#FF0000");
		$("#admin_email").focus();		
		return false;
	}
	else
	{
		var admin_email = $("#admin_email").val();
		$.blockUI({ message: '<img src="<?php echo base_url() .'public/images/loader.gif' ?>" />' });
		$.ajax({  
			type: "POST",  
			url: "<?php echo base_url();?>admin/login/forgot_password",  
			data: {admin_email:admin_email},  
			beforeSend: function() {
				
			},
			complete: function() {
				
			},
			success: function(response) {
				//alert(response);
				if(response == 'Invalid') {
					//$("#username").css("border-color", "#FF0000");
					//$("#password").css("border-color", "#FF0000");
					alert("Invalid admin email address..!");
					$("#valid").hide();
					$("#empty").hide();
					$("#invalid").show();
				}
				else if(response == 'success')
				{
					alert("Your account details has been sent to the email address.");
					$( "#dialog" ).dialog( "close" );
				}
				$.unblockUI();
				//$( "#dialog" ).dialog( "open" );
				//$(this).dialog('close');
				//$( "#dialog" ).dialog( "close" );
			}			
	});
	}	
});

$('#username').keypress(function(event){
  if(event.keyCode == 13){
    $('#submitbut').click();
  }
});
$('#password').keypress(function(event){
  if(event.keyCode == 13){
    $('#submitbut').click();
  }
});
	$("#submitbut").click(function(){
	
	var username=$("#username").val();
	var password=$("#password").val();
	
	
	
				if(username=='') {
				if(password =='') {
					$("#username").css("border-color", "#FF0000");		
					$("#password").css("border-color", "#FF0000");
					return false;
					}
					else
					{
					$("#username").css("border-color", "#FF0000");
					$("#password").css("border-color", "#66afe9");
					return false;
					}
				}
				else if(password =='') {
					$("#username").css("border-color", "#66afe9");
					$("#password").css("border-color", "#FF0000");
					return false;
					}
				else{

			$.blockUI({ message: '<img src="<?php echo base_url() .'public/images/loader.gif' ?>" />' });
			$.ajax({	
						
						url:"<?php echo base_url()?>admin/login/check_login",
						type:"POST",
						data:{'username' : username ,
							  'password' : password ,
							},
						success:function (result)
						{							
							if(result=='valid')
							{
								$("#invalid").hide();
								$("#empty").hide();
								$("#valid").show();
								window.location.replace("<?php echo base_url()?>admin/admin_dashboard");
								$.unblockUI();
							}
							else
							{	
								alert("Invalid username / password..!");
								$("#username").css("border-color", "#FF0000");
								$("#password").css("border-color", "#FF0000");
								$("#valid").hide();
								$("#empty").hide();
								$("#invalid").show();
							}
							$.unblockUI();
						}																					
			});
		}
	});
});
</script>

</body>
</html>
