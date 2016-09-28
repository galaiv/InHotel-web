<?php $this->load->view('header'); ?>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.datetimepicker.js"></script>

<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.datetimepicker.css" type="text/css">
<!--<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui.min.js"></script>-->
<div  class="grn_bg_in">
  <div class="container">
    <h2>Management</h2>
  </div>
</div>
<div class="container gbg_in">
  <div class="row">
 
    <div class="col-md-6 portfolio-item" style="margin-bottom:40px;">
      <h3>Register <br/>
        <span>Welcome to the registration page. Enter to subscribe to the site.</span>
		
		</h3>
      <div  class="">
    <!--  <form novalidate="novalidate" action="" method="POST" id="loginForm">-->
     <div class="col-lg-12" id="alerts">
                  	        
               	 	</div> 
                    
          <div class="form-group">
            <label class="control-label" for="password">Email</label>
            <input type="text" title="Please enter your email" value="" name="email" id="email" class="form-control">
            <span class="help-block email_val_msg"></span>   </span></div>
            
            <div class="form-group">
            <label class="control-label" for="password">Password</label>
            <input type="password" title="Please enter your password" value="" name="password" id="password" class="form-control">
            <span class="help-block password_error"></span> </div>
            
            
            <div class="form-group">
            <label class="control-label" for="password">Confirm password</label>
            <input type="password" title="Please confirm your password" value="" name="confirm_password" id="confirm_password" class="form-control">
            <span class="help-block confirm_password_error"></span> </div>
                       
            <div class="form-group">
            <label class="control-label" for="password">
Nickname</label>
            <input type="text" title="Please enter your nickname"  value="" name="nick_name" id="nick_name" class="form-control">
            <span class="help-block"></span> </div>
            
            
            <div class="form-group">
            <label class="control-label" for="password">First name</label>
            <input type="text" title="Please enter your first name"  value="" name="first_name" id="first_name" class="form-control">
            <span class="help-block"></span> </div>
            
            <div class="form-group">
            <label class="control-label" for="password">
Last name</label>
            <input type="
Last name" title="Please select gender" value="" name="last_name" id="last_name" class="form-control"  >
            <span class="help-block"></span> </div>
            
            
            <div class="form-group">
            <label class="control-label" for="password">Gender</label>
<select name="gender"  id="gender" class="form-control">
 <option value="">Select Gender</option>
  <option value="M">Male</option>
  <option value="F">Female</option>
</select>
            <span class="help-block"></span> </div>
            
        
        <div class="form-group">
            <label class="control-label" for="password">Birth date</label>
         <input type="text" title="Please enter your birth date" value="" name="dob" id="dob" class="form-control" >
            <span class="help-block"></span> </div>
        
        
        
          <button class="btn res_btn" type="submit" id="register_submit">Register</button>
       <!-- </form>-->
      </div>
    </div>
	 <div class="col-md-6">
 <a class="reglgn pull-right" href="<?php echo base_url();?>registration/hotel_signup">Hotel Registration</a></div>
    </div>
  <div class="col-lg-12 "><img src="images/bg.jpg" width="100%"></div>
</div>
<?php $this->load->view('footer'); ?>
<script type="text/javascript">

 $("#register_submit").click(function() {

               	var has_error =[];         
          
              	 var form_data = "";
           		
            	
					if($("#email").val() == ""){
		
					$("#email").parent('div').addClass("has-error").focus();
						has_error.push('true');
				}
				/*else if(!validateEmail($("#email").val())) {
					$("#email").parent('div').addClass("has-error").focus();
					   has_error.push('true');
				}*/else {
					$("#email").parent('div').removeClass("has-error");
					form_data+="&email="+$("#email").val();
				}
		
				
				if($("#password").val() == ""){
		
					$("#password").parent('div').addClass("has-error").focus();
					   has_error.push('true');
				} else {
                                    if($("#password").val().length >=5) {
					$("#password").parent('div').removeClass("has-error");
					form_data+="&password="+$("#password").val();
                                    }
                                    else{
                                        $("#password").parent('div').addClass("has-error").focus();
                                        $(".password_error").html('Minimum Password Length is 5');
					   has_error.push('true');
                                    }
				}
				
				
				if($("#confirm_password").val() == ""){
		
					$("#confirm_password").parent('div').addClass("has-error").focus();
					   has_error.push('true');
				} else {
					$("#confirm_password").parent('div').removeClass("has-error");
					form_data+="&confirm_password="+$("#confirm_password").val();
				}
				
			/*	if($("#nick_name").val() == ""){
		
					$("#nick_name").parent('div').addClass("has-error").focus();
					   has_error.push('true');
				} else {
					$("#nick_name").parent('div').removeClass("has-error");
					form_data+="&nick_name="+$("#nick_name").val();
				}*/
				
			
				
					if ($("#first_name").val() == "") { 
           			$("#first_name").parent('div').addClass("has-error").focus();
           			has_error.push('true');
        		} else {
            		$("#first_name").parent('div').removeClass("has-error");
            		form_data+="&first_name="+$("#first_name").val();
        		} 
					
				if($("#last_name").val() == ""){
		
					$("#last_name").parent('div').addClass("has-error").focus();
					   has_error.push('true');
				} else {
					$("#last_name").parent('div').removeClass("has-error");
					form_data+="&last_name="+$("#last_name").val();
				}
				
				
				if($("#gender").val() == ""){
		
					$("#gender").parent('div').addClass("has-error").focus();
					   has_error.push('true');
				} else {
					$("#gender").parent('div').removeClass("has-error");
					form_data+="&gender="+$("#gender").val();
				}	
				if($("#dob").val() == ""){
		
					$("#dob").parent('div').addClass("has-error").focus();
					   has_error.push('true');
				} else {
					$("#dob").parent('div').removeClass("has-error");
					form_data+="&dob="+$("#dob").val();
				}	
				form_data+="&nick_name="+$("#nick_name").val();
       			//var gender = $("input[name='gender']:checked").val();
				
				//form_data+="&gender="+gender;
   			
        		
			if(has_error.length >0 ){
				return false;
			}				
		
		
		

			 $(".password_error").hover(function(){
			   		if($(this).css("color")=='rgb(0, 128, 0)'){
						$(this).fadeOut('slow');
					}
					
			   });
			   $(".confirm_password_error").hover(function(){
			   		if($(this).css("color")=='rgb(0, 128, 0)'){
						$(this).fadeOut('slow');
					}
					
			   });

		
			           $.ajax({
                    url:'<?php echo base_url(); ?>registration/CheckEmailexists',
                    type:'post',
                  	data:{email: $("#email").val()},
                    beforeSend : function (){
                  		$(".email_val_msg").html('');
                 
                	},
                   
                    success :function(data){ 
                        if(data.indexOf("success") > -1 ){ 
                        	$(".email_val_msg").html('');
							$(".email_val_msg").css('color','green');
							if(!validateEmail($("#email").val())){
								$(".email_val_msg").css('color','red');
                           		$(".email_val_msg").html('Invalid Email ID');return false;
							}else{
                           		
							}
							$(".email_val_msg").show();	
							
							
                                                        
                                                        
                        
						                              
                                                             $.ajax({
                    url:'<?php echo base_url(); ?>registration/signup',
                    type:'post',
                    data:form_data,
                     beforeSend : function (){
                  $(".registration_error").remove();
                },
                 
                    success :function(data){   
					
                if(data.indexOf("success") > -1 ){
                            $('.registration_form').each(function(){
                					this.reset();   
            				});
            				var _html = '<strong><div class="alert alert-block green" style="color:green;font-family:Arial, Helvetica, sans-serif; width:460px;margin-left:-26px;">You have successfully completed the registration process</div><strong>';
							
							$('#alerts').html(_html);	
							$('body, html').animate({scrollTop: top}, 'slow');
 		   					$('.form-control').each(function(){
								$(this).val("");	
							});
							$('.val_msgs').html('');
							$('.val_msgs').hide();
							$('.password_error').hide();
                            $('.confirm_password_error').hide();                            
                                                                 
							setTimeout('window.location.assign("<?php echo base_url(); ?>login")',2000);
							return;
                        }else if(data.indexOf("error") > -1){
                             $(".registration_error").remove();
                                    
        }
                  
                    }
                        
                });
						}
                        else if(data.indexOf("error") > -1){
                        	$(".email_val_msg").html('');
							$(".email_val_msg").css('color','red');
                           	$(".email_val_msg").html('Email ID already exists');
							$(".email_val_msg").show();	
							return false;     
        				}
                  
                    }   
               });
			   
			  
			         
			   
			 
         
     //   alert(has_error.length);
        
       
if(has_error.length >0 ){
    return false;
}
                
            });
</script>

<!--<link rel="stylesheet" href="/resources/demos/style.css">-->
<script>
	$(document).ready(function()
	{ 
	
		/*$("#dob").datepicker({ 
		maxDate: 0,
		showMonthAfterYear: true,
		showStatus: true,
		showOtherMonths: true,
		yearRange: '1982:2000',
		dateFormat: 'yy-mm-dd', 
		changeYear: true, 
		changeMonth: true, 
		nextText: "",
		prevText: "",
		onSelect: function(selected) {
	          $("#date_to").datepicker("option","minDate", selected)
	        }
		});*/
		 $("#dob").datetimepicker({
		 lang:'en',
		 maxDate: '0',
		 timepicker:false,
		 yearRange: '1982:2000',
		 format:'Y-m-d',
		 
	});
		
		
		$(".password_error").hide();
        $(".confirm_password_error").hide(); 
		   $("#password").blur(function(e) {   
			   	$(".password_error").html('');
                if($("#password").val() != '' && $("#password").val().length <= 5 ){ 
                        	$(".password_error").html('');
							$(".password_error").css('color','red');
                           	$(".password_error").html('Weak Password!');  
                           	
							$(".password_error").show();
							$(".confirm_password_error").show();
                             return false;                            
                                                       
        		}else if($("#password").val() != '' && $("#password").val().length > 5){
                          	$(".password_error").html('');
							$(".password_error").css('color','green');
                           	$(".password_error").html('Strong Password!');
							$(".password_error").show(); 
							$(".confirm_password_error").show();	         		
        		}else if($("#password").val() == ''){
                          	$(".password_error").html('');
							$(".password_error").css('color','red');
                           	$(".password_error").html('Password required');
							$(".password_error").show(); 
							$(".confirm_password_error").show();						
				}
        	});
			
			
		  $("#confirm_password").blur(function(e) { 
			
                $(".confirm_password_error").html('');
                if(($("#password").val()!="") && ($("#confirm_password").val()!="")){  
                if($("#password").val() != $("#confirm_password").val()){ 
                        	$(".confirm_password_error").html('');
							$(".confirm_password_error").css('color','red');
                           	$(".confirm_password_error").html('Passwords do not match');
							$(".confirm_password_error").show();	return false;						
       			}else {
                        	$(".confirm_password_error").html('');
							$(".confirm_password_error").css('color','green');
							if($("#password").val() != '' && $("#password").val().length >= 5 ){ 
                           	$(".confirm_password_error").html('Password Matches');}
							$(".confirm_password_error").show();	
        		}
                }
        	}); 
		
		
		     
		
	
	}); 
	
	
	       function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
      return false;
    }
	}
	 function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
	   
	   
	   	$('#email').keypress(function(event){


  if(event.keyCode == 13){
  
  if( $("#password").val() =="")
  {
 	 $("#password").focus();
  }
    $("#register_submit").click() ;
  }
});


 	$('#password').keypress(function(event){


  if(event.keyCode == 13){
  
  if( $("#confirm_password").val() =="")
  {
 	 $("#confirm_password").focus();
  }
    $("#register_submit").click() ;
  }
});

$('#confirm_password').keypress(function(event){


  if(event.keyCode == 13){
  
  if( $("#nick_name").val() =="")
  {
 	 $("#nick_name").focus();
  }
    $("#register_submit").click() ;
  }
});

$('#nick_name').keypress(function(event){


  if(event.keyCode == 13){
  
  if( $("#first_name").val() =="")
  {
 	 $("#first_name").focus();
  }
    $("#register_submit").click() ;
  }
});


$('#first_name').keypress(function(event){


  if(event.keyCode == 13){
  
  if( $("#last_name").val() =="")
  {
 	 $("#last_name").focus();
  }
    $("#register_submit").click() ;
  }
});

$('#last_name').keypress(function(event){


  if(event.keyCode == 13){
  
  if( $("#gender").val() =="")
  {
 	 $("#gender").focus();
  }
    $("#register_submit").click() ;
  }
});
$('#gender').keypress(function(event){


  if(event.keyCode == 13){
 
  if( $("#dob").val() =="")
  {
 	 $("#dob").focus();
  }
    $("#register_submit").click() ;
  }
});

$('#dob').keypress(function(event){


 // if(event.keyCode == 13){
  
  
    $("#register_submit").click() ;
  //}
});
</script>