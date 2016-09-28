<?php $this->load->view('header'); ?>
<div  class="grn_bg_in">
  <div class="container">
    <h2>Management</h2>
  </div>
</div>
  
                    
                    
<div class="container gbg_in">
  <div class="row">
    <div class="col-md-6 portfolio-item" style="margin-bottom:40px;"> 
      <h3>Forget Password<br/>
        <span>Please enter the email address you used to create your account.</span></h3>
      <div  class="col-md-7 row">
       
          <div class="form-group">
            <label class="control-label" for="username">Email</label>
            <input type="text" placeholder=" " title="Please enter you Email" value="<?php echo $this->input->cookie('email', TRUE); ?>" name="email" id="email" class="form-control">
            <span class="help-block"></span> </div>
          <div class="alert alert-error hide" id="loginErrorMsg">Wrong email</div>
          <button class="btn res_btn" type="submit" id="signin_submit">Submit</button>
          <div class="clearfix"></div>
          <div class="col-lg-12" id="login_alerts" style="font-family:trebuchet ms">             	              
               	 	</div> 
              </div>
    </div>
    <div class="col-md-6 portfolio-item">
      <h3> Register now <br/>
        <span>Do not have an account yet? Join the community</span></h3>
      <div  class="col-md-4 row">
<!--        <form  action="<?php echo base_url();?>registration/hotel_signup" method="POST" id="loginForm">
          <button class="btn res_btn" type="submit" >Register</button>
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
                $.ajax({	
						
						url:"<?php echo base_url();?>registration/forgotPassword",
						type:"POST",
						data:form_data1,
							
						success:function (result) 
						{
							
							if(result=='valid')
							{
                                                                
                                                                var _html = '<strong><div class="alert alert-block green" style="color:green;margin-left:-30px;width:274px">Your new password has been sent to the email address&nbsp;&nbsp;..</div><strong>';
							
							     $('#login_alerts').html(_html);
								setTimeout('window.location.assign("<?php echo base_url(); ?>login")',500);								
								
							}
							else
							{	
								      var _html = '<strong><div class="alert alert-block green" style="color:red;width:274px;margin-left:-30px">Invalid Email Address<br/></div></strong>';
							
							     $('#login_alerts').html(_html);
								$("#email").css("border-color", "#FF0000");
								
							}
							
						}																					
			});
 });
 
 
 $('#email').keypress(function(event){


  if(event.keyCode == 13){
  
 	 $("#email").focus();
    $("#signin_submit").click() ;
  }
});
$('#email').keypress(function(event){
  if(event.keyCode == 13){
    $('#signin_submit').click();
  }
});
	
</script>