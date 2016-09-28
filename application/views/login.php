<?php $this->load->view('header'); ?>
<script src="<?php echo base_url();?>assets/js/chat/quickblox.js"></script>
<script src="<?php echo base_url();?>assets/js/chat/app.js"></script>
<script>var siteurl = '<?php echo base_url();?>';
var member_type = '<?php echo $this->session->userdata('member_type');?>';
</script>

<div  class="grn_bg_in">
  <div class="container">
    <h2>Management</h2>
  </div>
</div>
  
                    
                    
<div class="container gbg_in">
  <div class="row">
    <div class="col-md-6 portfolio-item" style="margin-bottom:40px;"> 
      <h3> InHotel Account <br/>
        <span>Enter your account credentials and sign in to your personal area.</span></h3>
      <div  class="col-md-7 row">
        <input type="hidden" name="user_id_qb" id="user_id_qb" value=""/>
			<input type="hidden" name="user_pass_qb" id="user_pass_qb" value=""/>
						<input type="hidden" name="user_id1" id="user_id1" value=""/>

						  <button id="sessionButton" type="button" style="display:none;" ></button>
						  <button id="sessionButton1" type="button" style="display:none;" ></button>

          <div class="form-group">
            <label class="control-label" for="username">Email</label>
            <input type="text" placeholder=" " title="Please enter you Email" value="<?php echo $this->input->cookie('email', TRUE); ?>" name="email" id="email" class="form-control">
            <span class="help-block"></span> </div>
          <div class="form-group">
            <label class="control-label" for="password">Password</label>
            <input type="password" title="Please enter your password" value="<?php echo $this->input->cookie('password', TRUE); ?>" name="password" id="password" class="form-control">
            <span class="help-block"></span> </div>
          <div class="alert alert-error hide" id="loginErrorMsg">Wrong email og password</div>
          <div class="checkbox">
            <label>
            <input type="checkbox" id="remember" name="remember" <?php if($this->input->cookie('password', TRUE)){  ?> checked="checked" <?php }?> >
            Remember Me </label>
          </div>
          <button class="btn res_btn" type="submit" id="signin_submit">Login</button>
		 <a href="<?php echo base_url();?>registration/forgotPassword" class="btn res_btn pull-right">Forgot Password</a>
          <div class="clearfix"></div>
          <div class="col-lg-12" id="login_alerts" style="font-family:trebuchet ms">             	              
               	 	</div> 
              </div>
    </div>
    <div class="col-md-6 portfolio-item">
      <h3> Register now <br/>
        <span>Do not have an account yet? Join the community</span></h3>
      <div  class="col-md-4 row">
    <!--    <form  action="<?php echo base_url();?>registration/hotel_signup" method="POST" id="loginForm">
          <button class="btn res_btn" type="submit" >Register</button>
		  <button id="sessionButton" type="button" style="display:none;" ></button>

<!--		   <button class="btn res_btn" type="submit" >Register</button>

        </form>-->
	 <a href="<?php echo base_url();?>registration/hotel_signup" class="btn res_btn">Register</a>

      </div>
    </div>
  </div>
  <div class="col-lg-12 "><img src="<?php echo base_url();?>images/bg.jpg" width="100%"></div>
</div>
<?php $this->load->view('footer'); ?>
<script type="text/javascript">



$("#signin_submit").click(function() {
			//$('#login_alerts').html('');
			//$('#login_alerts').hide();
               	var has_error =[];         
          
              	 var form_data1 = "";
           		
            	
				
			if ($("#email").val() == "") { 
           			$("#email").parent('div').addClass("has-error").focus();
           			has_error.push('true');
        		} else {
            		$("#email").parent('div').removeClass("has-error");
            		form_data1+="email="+$("#email").val();
        		} 
					
				if($("#password").val() == ""){
		
					$("#password").parent('div').addClass("has-error").focus();
					   has_error.push('true');
				} else {
					$("#password").parent('div').removeClass("has-error");
					form_data1+="&password="+$("#password").val();
				}
              	if ($('#remember').is(':checked')) 
				{		
				remember="on";
				
    			
				}
				else
			{
    			remember="off";
				}
				form_data1+="&remember="+remember;                  
                               if(has_error.length >0 ){
				return false;
			}
                                
                                
                                
                             $.ajax({	
						
						url:"<?php echo base_url();?>login/check_member_login",
						type:"POST",
						data:form_data1,
							
						success:function (result) 
						{   var myArray = result.split('~=~');							
							if(myArray[0] =='valid')
							{
                               // alert(myArray);                             
                                                                var _html = '<strong><div class="alert alert-block green" style="color:green;margin-left:-30px;width:274px">Redirecting to your account&nbsp;&nbsp;..</div><strong>';
							     $('#login_alerts').html(_html);
								 if(myArray[1] == '3') {
								    if(myArray[3] == '') { //alert("hi");
									var data1 = $.trim(myArray[2]);
									 $("#user_id_qb").val("inhotel_"+data1);
									 $("#user_pass_qb").val("inhotel_"+data1+"123");
									  $("#user_id1").val(data1);
			          			     $("#sessionButton1").trigger('click');
										  } else {
									 var data1 = $.trim(myArray[2]);	  
									 $("#user_id_qb").val("inhotel_"+data1);
									 $("#user_pass_qb").val("inhotel_"+data1+"123");
									 $("#user_id1").val(data1);
			          			     $("#sessionButton").trigger('click');

										  }
								    
								 
								 } else if(myArray[1] == '2' && myArray[2] == 'N') { 
								    setTimeout('window.location.assign("<?php echo base_url(); ?>hotel_staff/settings/1")',500);								
								 } else { 
								    setTimeout('window.location.assign("<?php echo base_url(); ?>dashboard")',500);		
								 }
								
							}
							else if(myArray[0]=='invalid')
							{	
								      var _html = '<strong><div class="alert alert-block green" style="color:red;width:274px;margin-left:-30px">Username Or Password Incorrect<br/></div></strong>';
							
							     $('#login_alerts').html(_html);
								$("#email").css("border-color", "#FF0000");
								$("#password").css("border-color", "#FF0000");
								
							} else if(myArray[0]=='regcomplete')
							{	
								      var _html = '<strong><div class="alert alert-block green" style="color:red;width:274px;margin-left:-30px">Please complete your registration process<br/></div></strong>';
							setTimeout('window.location.assign("<?php echo base_url(); ?>registration/payment")',2000);	
								
							}
							else
							{
							 var _html = '<strong><div class="alert alert-block green" style="color:red;width:480px;margin-left:-30px">Account is not Active.Please Contact Admin</div></strong>';
							
							     $('#login_alerts').html(_html);
								$("#email").css("border-color", "#FF0000");
								$("#password").css("border-color", "#FF0000");
							}
						}																					
			});
 });
 
 
 $('#email').keypress(function(event){


  if(event.keyCode == 13){
  
 	 $("#password").focus();
    $("#signin_submit").click() ;
  }
});
$('#password').keypress(function(event){
  if(event.keyCode == 13){
    $('#signin_submit').click();
  }
});
	
</script>