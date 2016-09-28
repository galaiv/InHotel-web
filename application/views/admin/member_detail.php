<!--<link rel="stylesheet" href="<?php echo base_url()?>public/css/jquery-ui.css">
  <script src="<?php echo base_url()?>public/js/jquery-ui.js" type="text/javascript"></script>-->

<!--<link href="<?php echo base_url(); ?>assets/js/mdatepicker/datepicker.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/mdatepicker/bootstrap-datepicker.js"></script>
<link href="<?php echo base_url(); ?>assets/js/mdatepicker/css/bootstrap.css" rel="stylesheet" type="text/css" />-->
  
<!--<style>
.ui-autocomplete-loading {
background: white url('<?php echo base_url()?>public/images/ui-anim_basic_16x16.gif') right center no-repeat;
}
</style>-->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.datetimepicker.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.datetimepicker.js"></script>
<div class="bred_outer"><div class="bred_nav">
<ul>
<li ><img src="<?php echo base_url()?>public/images/br_home.jpg" class="bn_home" /></li>
<li><a href="<?php echo base_url()?>admin/admin_dashboard/">Dashboard</a></li>
<li><img src="<?php echo base_url()?>public/images/br_arow.jpg" class="bn_arow" /></li>
<?php $heading_text =($member_type==1) ? 'User Management':(($member_type==2)? 'Hotel Management' : 'Hotel Staff Management');?>
<li><a href="<?php echo base_url()."admin/member/index/".$member_type?>"><?php  echo $heading_text;?></a></li>
<li><img src="<?php echo base_url()?>public/images/br_arow.jpg" class="bn_arow" /></li>
<li>Details</li>

</ul>


</div></div>


<div class="container_out"></div>
<div class="container">
<?php 
if($this->session->flashdata('success'))
{
?>
	<div class="sucess_msg"><?php echo $this->session->flashdata('success');?></div>
<?php
}
?>

<?php
if($this->session->flashdata('error'))
{
?>
	<div class="erroe_msg"><?php echo $this->session->flashdata('error');?></div>
<?php
}
if(validation_errors()){ ?>
    
    <div class="erroe_msg"><?php echo validation_errors();?></div>
<?php }
?>
<div class="topsec">&nbsp;<div class="t_t"><div class="t_i"><img src="<?php echo base_url()?>public/images/add.png" /></div>

<div class="t_c">Add / Edit</div>

</div>
<a href="#"  class="save_btn_green save_member">Save</a></div>
<div class="wd_975_blank">
<form method="post" name="frm_member" id="frm_member" action="">
<input type="hidden" name="user_id" id="user_id" value="<?php echo $member_details['user_id']; ?>" />
<div class="wd_975">
<div class="wd_975_title"><h3> USER DETAILS</h3></div>
<div class="wd_975_cnt">


<div class="wd_935 mrb_10">   
  <div class="form_adj_up" ><label>Email Address<font color="#FF0000">*</font></label>
     <input type="text" placeholder="Email Address" name="email_address" id="email_address" value="<?php echo ($_POST['email_address']!='') ? $_POST['email_address'] : $member_details['email_address']?>" class="form_med" style="width:442px;"/>
    </div>
   <div class="form_adj_rte" ><label>Nick Name<font color="#FF0000">*</font></label>
     <input type="text" placeholder="Nick Name" name="nick_name" id="nick_name" value="<?php echo ($_POST['nick_name']) ? $_POST['nick_name'] :  $member_details['nick_name']?>" class="form_med" style="width:442px;" />
    </div>
</div>
    <?php if($member_details['user_id']==""){?>
<div class="wd_935 mrb_10">   
     <div class="form_adj_up" ><label>Password<font color="#FF0000">*</font></label>
     <input type="password" placeholder="Password" name="password" id="password" value="<?php echo   $member_details['password']?>" class="form_med" style="width:442px;" />
    </div>
   <div class="form_adj_rte" ><label>Confirm Password<font color="#FF0000">*</font></label>
     <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" value="<?php echo  $member_details['confirm_password']?>" class="form_med" style="width:442px;" />
    </div>
</div>
    <?php }?>
<div class="wd_935 mrb_10">   
    <div class="form_adj_up" ><label>First Name<font color="#FF0000">*</font></label>
     <input type="text" placeholder="First Name" name="first_name" id="first_name" value="<?php echo ($_POST['first_name']) ? $_POST['first_name'] :  $member_details['first_name']?>" class="form_med" style="width:442px;" />
    </div>
    <div class="form_adj_rte" ><label>Last Name<font color="#FF0000">*</font></label>
     <input type="text" placeholder="Last Name" name="last_name" id="last_name" value="<?php echo ($_POST['last_name']) ? $_POST['last_name'] :  $member_details['last_name']?>" class="form_med" style="width:442px;" />
    </div>
</div>
<!--<div class="wd_935 mrb_10">   
   
    <div class="form_adj_up" ><label>Gender<font color="#FF0000">*</font></label>
        <select name="gender" id="gender"  class="form_med" style="width:457px;">
               <option value="">Select Gender</option>
             <option value="M" <?php echo ($_POST['gender']=='M') ? 'selected' : (($member_details['gender']=='M') ? 'selected' :'');?>>Male</option>
            <option value="F"  <?php echo ($_POST['gender']=='F') ? 'selected' : (($member_details['gender']=='F') ? 'selected' :'');?>>Female</option>
        </select>  </div>
     <div class="form_adj_rte" ><label>Birth Date<font color="#FF0000">*</font></label>
     <input type="text" placeholder="Birth Date" name="dob" id="dob" value="<?php echo ($_POST['dob']) ? $_POST['dob'] :  $member_details['dob']?>" class="form_med" style="width:442px;" />
    </div>
</div>-->

<input type="hidden" name="member_type" value="<?php echo $member_type; ?>"/>


</div>
</div>
</form>
</div>




<script>
function isNumberKey(e)
          {
             
			 if( (e.which>47 && e.which<58)||(e.which > 42 && e.which < 47) ||(e.which == 32)|| ( e.which==8 ) || (e.which==0))
                return true;
 
             return false;
          }

$(function(){
 $(".save_member").on("click",function(){ 
     
	var	email_address		=	$.trim($("#email_address").val());	
	var	password    =	$.trim($("#password").val()); 
        var	confirm_password    =	$.trim($("#confirm_password").val());  
	var	first_name	    =	$("#first_name").val();
	var	last_name	        =	$.trim($("#last_name").val());
	var	nick_name	        =	$.trim($("#nick_name").val());
        var	gender	        =	$.trim($("#gender").val());
        var	dob	        =	$.trim($("#dob").val());
	var id              =   '<?php echo $this->uri->segment(4, 0);?>';
        var user_id =$('#user_id').val();
	//alert(id);
	if(email_address=='')
	{
		$("#email_address").css("border-color","red");
		$("#email_address").focus();
		return false;
	}else{
            $("#email_address").css("border-color","");
        }
        if(user_id==""){ 
	 if(password=='')
	{
		$("#password").css("border-color","red");
		$("#password").focus();
		return false;
	} 
    else{
            $("#password").css("border-color","");
        }    
  
	 if(confirm_password=='')
	{
		$("#confirm_password").css("border-color","red");
		$("#confirm_password").focus();
		return false;
	}
        else{
            $("#confirm_password").css("border-color","");
        }
         if(password!=confirm_password)
	{
		$("#password").css("border-color","red");
                $("#confirm_password").css("border-color","red");
		$("#confirm_password").focus();
		return false;
	} 
    else{
            $("#password").css("border-color","");
             $("#confirm_password").css("border-color","");
        }
        }
         if(first_name=='')
	{
		$("#first_name").css("border-color","red");
		$("#first_name").focus();
		return false;
	}
        else{
            $("#first_name").css("border-color","");
        } 
         if(last_name=='')
	{ 
		$("#last_name").css("border-color","red");
		$("#last_name").focus();
		return false;
	}
        else{
            $("#last_name").css("border-color","");
        }
          if(nick_name=='')
	{
		$("#nick_name").css("border-color","red");
		$("#nick_name").focus();
		return false;
	}
        else{
            $("#nick_name").css("border-color","");
        }
          if(gender=='')
	{
		$("#gender").css("border-color","red");
		$("#gender").focus();
		return false;
	}
        else{
            $("#gender").css("border-color","");
        }
           if(dob=='')
	{
		$("#dob").css("border-color","red");
		$("#dob").focus();
		return false;
	}
        else{
            $("#dob").css("border-color","");
        }
	$('#frm_member').submit();
        
         });   
             $('#dob').datetimepicker({
                lang: 'en',
                timepicker: false,
                format: 'Y-m-d',
         //    minDate: '-20',
            });
});


  



</script>
