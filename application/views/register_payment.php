<?php $this->load->view('header'); ?>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.datetimepicker.js"></script>

<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.datetimepicker.css" type="text/css">
<!--<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui.min.js"></script>-->
<div  class="grn_bg_in">
  <div class="container">
    <h2>Management</h2>
	<div class="mnu_sty">  
	   <ul>
	   	  <li><a href="<?php echo base_url(); ?>registration/payment">Renew Membership</a></li>
    	  <li><a <?php  if( (($hotel_renewed_membership['user_id'] !="") && $this->session->userdata('member_type')==2) || (($check_membership_renewed_byhotel['user_id'] !="") && $this->session->userdata('member_type')==3)   ) { ?>
	           href="<?php echo base_url(); ?>hotel_staff/change_password" <?php } ?> 
			   >Change Password</a></li>
	     <li><a <?php  if( (($hotel_renewed_membership['user_id'] !="") && $this->session->userdata('member_type')==2) || (($check_membership_renewed_byhotel['user_id'] !="") && $this->session->userdata('member_type')==3)   ) { ?>
		       href="<?php echo base_url(); ?>hotel_staff/hotel_feedbacks">Hotel Feedbacks</a></li>
		 <li><a href="<?php echo base_url(); ?>hotel_staff/hotel_zones" <?php } ?>
		      >Hotel Zones</a></li>
		 <li><a <?php  if( (($hotel_renewed_membership['user_id'] !="") && $this->session->userdata('member_type')==2) || (($check_membership_renewed_byhotel['user_id'] !="") && $this->session->userdata('member_type')==3)   ) { ?>
		      href="<?php echo base_url(); ?>hotel_staff/settings" <?php } ?> 
			  >Hotel Settings</a></li>

		       </ul>  
    </div>
  </div>
</div>
<div class="container gbg_in">
  <div class="row">
  <ol style="margin-bottom: 5px; background-color:#F0F0F0;" class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> </a></li>
		  <!--<li><a <?php  if( (($hotel_renewed_membership['user_id'] !="") && $this->session->userdata('member_type')==2) || (($check_membership_renewed_byhotel['user_id'] !="") && $this->session->userdata('member_type')==3)   ) { ?>
		      href="<?php echo base_url();?>hotel_staff/settings" <?php } ?>>Hotel Profile </a></li>-->
        <li class="active">Membership Subscription</li>
      </ol>
    <div class="col-md-6 portfolio-item" style="margin-bottom:40px;">
      <h4>Membership Subscription<br/>
		
		</h4>
      <div  class="">
    <!--  <form novalidate="novalidate" action="" method="POST" id="loginForm">-->
     <div class="col-lg-12" id="alerts">
                  	        
               	 	</div> 
              <div class="form-group">
            <label class="control-label" for="password">Package</label>
			<select class="form-control" name="package_id" id="package_id">
			<option value="0">Select Package</option> 
            <?php foreach($packages as $val)
					{?>
             <option  value="<?php echo $val['package_id'];?>" title="<?php echo $val['price'];?>" 
			 <?php if($val['duration_type'] == 'D') { ?> label="<?php echo $val['duration']." Days";?>" <?php } 
			 else if($val['duration_type'] == 'M') { ?> label="<?php echo $val['duration']." Months";?>" <?php } 
			 else { ?> label="<?php echo $val['duration']." Years";?>" <?php } ?>>
			 
			 <?php echo $val['title']." ("; 
			 if($val['duration_type'] == 'D') { echo $val['duration']." Days) -- $".$val['price']; } 
			 else if($val['duration_type'] == 'M') { echo $val['duration']." Months) -- $".$val['price']; } 
			 else {echo $val['duration']." Years) -- $".$val['price']; }
			 ?></option>
              <?php }?>duration                                        
             </select>
            <span class="help-block"></span>   </span></div>
                  
           <div class="form-group">
            <label class="control-label" for="name_on_card">Name</label>
            <input type="text" placeholder="Card Holder Name"  value="" name="name_on_card" id="name_on_card" class="form-control">
            <span class="help-block"></span> </div>
            
			<div class="form-group">
            <label class="control-label" for="creditCardType">Card Type</label>
			<select name="creditCardType" id="creditCardType" class="form-control" >
                      <option value="Visa"  selected="selected">Visa</option>
                      <option value="MasterCard">MasterCard</option>
                      <option value="Discover">Discover</option>
					  <option value="Amex">American Express</option>
                     </select> 
            <span class="help-block"></span> </div>
            
            <div class="form-group">
            <label class="control-label" for="creditCardNumber">Credit Card Number</label>
             <input type="text" class="form-control" name="creditCardNumber" id="creditCardNumber" placeholder="Credit Card No">
            <span class="help-block"></span> </div>
            
            <div class="form-group">
            <label class="control-label" for="cvv2Number">CVV</label>
            <input type="password" placeholder="CVV Code" value="" name="cvv2Number" id="cvv2Number" class="form-control"  >
            <span class="help-block"></span> </div>
			
			
			<div class="form-group">
            <div class=""> 
            <div class="col-lg-6 row pdng_007">
            <label for="password" class="control-label"> Expiry Month</label>
           <select name="expDateMonth" id="expDateMonth" class="form-control" >
                        <option value=01 <?php if(date("m") == '01') { ?>selected="selected" <?php }?> >01</option>
                        <option value=02 <?php if(date("m") == '02') { ?> selected="selected" <?php }?> >02</option>
                        <option value=03 <?php if(date("m") == '03') { ?> selected="selected" <?php }?> >03</option>
                        <option value=04 <?php if(date("m") == '04') { ?> selected="selected" <?php }?> >04</option>
                        <option value=05 <?php if(date("m") == '05') { ?> selected="selected" <?php }?> >05</option>
                        <option value=06 <?php if(date("m") == '06') { ?> selected="selected" <?php }?> >06</option>
                        <option value=07 <?php if(date("m") == '07') { ?> selected="selected" <?php }?> >07</option>
                        <option value=08 <?php if(date("m") == '08') { ?> selected="selected" <?php }?> >08</option>
                        <option value=09 <?php if(date("m") == '09') { ?> selected="selected" <?php }?> >09</option>
                        <option value=10 <?php if(date("m") == '10') { ?> selected="selected" <?php }?> >10</option>
                        <option value=11 <?php if(date("m") == '11') { ?> selected="selected" <?php }?> >11</option>
                        <option value=12 <?php if(date("m") == '12') { ?> selected="selected" <?php }?> >12</option>
                    </select>
            <span class="help-block"></span> </div>
            
            
            <div class="col-lg-6  pdng_008">
            <label for="password" class="control-label">Expiry Year</label>
            <select id="expDateYear" name="expDateYear" class="form-control" >
                       <?php for($i=date("Y");$i<date("Y")+15;$i++) { ?>
                       <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php  } ?>
                     </select>
            <span class="help-block"></span> </div>
            </div>
            
            
            </div>
			<!--<div class="form-group">
            <label class="control-label" for="expDateMonth"> Expiry Date</label>
			<div class="clearfix"></div>
            <div class="col-lg-6 contact-mar">
                    <select name="expDateMonth" id="expDateMonth" class="form-control" >
                        <option value=01 <?php if(date("m") == '01') { ?>selected="selected" <?php }?> >01</option>
                        <option value=02 <?php if(date("m") == '02') { ?> selected="selected" <?php }?> >02</option>
                        <option value=03 <?php if(date("m") == '03') { ?> selected="selected" <?php }?> >03</option>
                        <option value=04 <?php if(date("m") == '04') { ?> selected="selected" <?php }?> >04</option>
                        <option value=05 <?php if(date("m") == '05') { ?> selected="selected" <?php }?> >05</option>
                        <option value=06 <?php if(date("m") == '06') { ?> selected="selected" <?php }?> >06</option>
                        <option value=07 <?php if(date("m") == '07') { ?> selected="selected" <?php }?> >07</option>
                        <option value=08 <?php if(date("m") == '08') { ?> selected="selected" <?php }?> >08</option>
                        <option value=09 <?php if(date("m") == '09') { ?> selected="selected" <?php }?> >09</option>
                        <option value=10 <?php if(date("m") == '10') { ?> selected="selected" <?php }?> >10</option>
                        <option value=11 <?php if(date("m") == '11') { ?> selected="selected" <?php }?> >11</option>
                        <option value=12 <?php if(date("m") == '12') { ?> selected="selected" <?php }?> >12</option>
                    </select>  
                </div>
                <div class="col-lg-6 contact-mar">
                    <select id="expDateYear" name="expDateYear" class="form-control" >
                       <?php for($i=date("Y");$i<date("Y")+15;$i++) { ?>
                       <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php  } ?>
                     </select>  
                </div>            
				<span class="help-block"></span> </div>-->
			
			
            
          <button class="btn res_btn" type="submit" id="register_submit">Continue</button>
       <!-- </form>-->
      </div>
    </div>
	 
    </div>
  <div class="col-lg-12 "><img src="<?php echo base_url();?>images/bg.jpg" width="100%"></div>
</div>
<?php $this->load->view('footer'); ?>
<script type="text/javascript">
var user_id = '<?php echo $this->session->userdata('user_id');?>';  
 $("#register_submit").click(function() {

     	var has_error =[];                   
        var form_data = "";
	
		if($("#name_on_card").val() == ""){
		
					$("#name_on_card").parent('div').addClass("has-error").focus();
					   has_error.push('true');
				} else {
					$("#name_on_card").parent('div').removeClass("has-error");
					form_data+="&name_on_card="+$("#name_on_card").val();
				}
		if($("#creditCardType").val() == ""){
		
					$("#creditCardType").parent('div').addClass("has-error").focus();
					   has_error.push('true');
				} else {
					$("#creditCardType").parent('div').removeClass("has-error");
					form_data+="&creditCardType="+$("#creditCardType").val();
				}
		if($("#creditCardNumber").val() == ""){
		
					$("#creditCardNumber").parent('div').addClass("has-error").focus();
					   has_error.push('true');
				} else {
					$("#creditCardNumber").parent('div').removeClass("has-error");
					form_data+="&creditCardNumber="+$("#creditCardNumber").val();
				}
		if($("#expDateMonth").val() == "0"){
		
					$("#expDateMonth").parent('div').addClass("has-error").focus();
					   has_error.push('true');
				} else {
					$("#expDateMonth").parent('div').removeClass("has-error");
					form_data+="&expDateMonth="+$("#expDateMonth").val();
				}	
		if($("#expDateYear").val() == "0"){
		
					$("#expDateYear").parent('div').addClass("has-error").focus();
					   has_error.push('true');
				} else {
					$("#expDateYear").parent('div').removeClass("has-error");
					form_data+="&expDateYear="+$("#expDateYear").val();
				}
		if($("#cvv2Number").val() == ""){
		
					$("#cvv2Number").parent('div').addClass("has-error").focus();
					   has_error.push('true');
				} else {
					$("#cvv2Number").parent('div').removeClass("has-error");
					form_data+="&cvv2Number="+$("#cvv2Number").val();
				}	
		if ($("#package_id").val() == "0") { 
					$("#package_id").parent('div').addClass("has-error").focus();
					has_error.push('true');
				} else {
					$("#package_id").parent('div').removeClass("has-error");
					form_data+="&package_id="+$("#package_id").val();
				} 							
				if(has_error.length >0 ){
				return false;
			}	
		 $.ajax({
                    url:'<?php echo base_url(); ?>registration/payment',
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
            				var _html = '<strong><div class="alert alert-block green" style="color:green;font-family:Arial, Helvetica, sans-serif; width:460px;margin-left:-26px;">You have successfully subscribed.</div><strong>';
							
							$('#alerts').html(_html);	
							$('body, html').animate({scrollTop: top}, 'slow');
 		   					$('.form-control').each(function(){
								$(this).val("");	
							});
							$('.val_msgs').html('');                       
                            if(user_id=="")                                    
							 setTimeout('window.location.assign("<?php echo base_url(); ?>login")',2000);
							else 
							 setTimeout('window.location.assign("<?php echo base_url(); ?>dashboard")',2000);
							return;
                        }else if(data.indexOf("error") > -1){
                             $(".registration_error").remove();
                               var _html = '<strong><div class="alert alert-block red" style="color:red;font-family:Arial, Helvetica, sans-serif; width:460px;margin-left:-26px;">'+data+'</div><strong>';  
							$('#alerts').html(_html);	      
                        } 
                  
                    }
                        
                });					
				 
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
	

	}); 
	
		 function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
	   

</script>