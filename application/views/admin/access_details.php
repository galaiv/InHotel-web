
<div class="bred_outer"><div class="bred_nav">
<ul>
<li ><img src="<?php echo base_url()?>public/images/br_home.jpg" class="bn_home" /></li>
<li><a href="<?php echo base_url()?>admin/admin_dashboard/">Dashboard</a></li>
<li><img src="<?php echo base_url()?>public/images/br_arow.jpg" class="bn_arow" /></li>
<li><a href="<?php echo base_url()."admin/access_management/index/"?>"><?php  echo 'Access Management';?></a></li>
<li><img src="<?php echo base_url()?>public/images/br_arow.jpg" class="bn_arow" /></li>
<li>Details</li>

</ul>


</div></div>


<div class="container_out"></div>
<div class="container">
<?php // print_r($access_details);exit;
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
<a href="#"  class="save_btn_green save_member">Save</a>
 </div>
<div class="wd_975_blank">
<form method="post" name="frm_member" id="frm_member" action="">
<input type="hidden" name="user_id" id="user_id" value="<?php echo $access_details['user_id']; ?>" />
<div class="wd_975">
<div class="wd_975_title"><h3> ACCESS DETAILS</h3></div>
<div class="wd_975_cnt">
    <?php if($access_details['access_master_id']==""){ ?>
    <div style="text-align: center;margin: 30px;">
        <input type="radio" name="create_user" value="N" class="create_user create_user_radio" <?php echo ($_POST['create_user']=='N') ?'checked':(($_POST['create_user']=='E') ? '':'checked'); ?>/>Create User 
        <input type="radio" name="create_user" value="E" class="existing_user create_user_radio" <?php echo ($_POST['create_user']=='E') ?'checked':'';?>/>Select User
    </div>  
    <?php } ?>
    <div class="select_existing_user_details" style="display: none;">
        <div class="wd_935 mrb_10" >   
            <div class="form_adj_up"  style="float: none; margin: auto;">
      <select name="access_member" id="access_member"   style="width:457px;" class="form_med">
            <option value="">Select User</option>
          <?php foreach ($access_member as $access_member){?>             
             <option value="<?php echo $access_member['id'];?>" ><?php echo $access_member['email'].' - '. $access_member['first_name']; ?></option>
          <?php }?>
      </select>
  </div>
        </div>
    </div>
    <div class="create_user_details">
<div class="wd_935 mrb_10" >   
  <div class="form_adj_up" ><label>Email Address<font color="#FF0000">*</font></label>
     <input type="text" placeholder="Email Address" name="email" id="email" value="<?php echo ($_POST['email']!='') ? $_POST['email'] : $access_details['email']?>" class="form_med" style="width:442px;"/>
    </div>
       <div class="form_adj_rte" ><label>Nick Name<font color="#FF0000">*</font></label>
     <input type="text" placeholder="Nick Name" name="nick_name" id="nick_name" value="<?php echo ($_POST['nick_name']) ? $_POST['nick_name'] :  $access_details['nick_name']?>" class="form_med" style="width:442px;" />
    </div>
  
</div>
<div class="wd_935 mrb_10" >   
       <div class="form_adj_up" ><label>Gender<font color="#FF0000">*</font></label>
        <select name="gender" id="gender"  class="form_med" style="width:457px;">
               <option value="">Select Gender</option>
             <option value="M" <?php echo ($_POST['gender']=='M') ? 'selected' : (($access_details['gender']=='M') ? 'selected' :'');?>>Male</option>
            <option value="F"  <?php echo ($_POST['gender']=='F') ? 'selected' : (($access_details['gender']=='F') ? 'selected' :'');?>>Female</option>
        </select>  </div>
  <div class="form_adj_rte" ><label>Hotel<font color="#FF0000">*</font></label>
     <select name="hotel_id" class="form_med required" style="width:442px;" >
                                <?php foreach ($hotel_list as $hotel) { ?>
                                    <option <?php echo ($activation_code_details['hotel_id'] == $hotel['id']) ? 'selected':''; ?> value="<?php echo $hotel['id']; ?>"><?php echo $hotel['title']; ?></option>  
                                <?php } ?></select>
  </div>
 
  
</div>
<div class="wd_935 mrb_10">   
    <div class="form_adj_up" ><label>First Name<font color="#FF0000">*</font></label>
     <input type="text" placeholder="First Name" name="first_name" id="first_name" value="<?php echo ($_POST['first_name']) ? $_POST['first_name'] :  $access_details['first_name']?>" class="form_med" style="width:442px;" />
    </div>
    <div class="form_adj_rte" ><label>Last Name<font color="#FF0000">*</font></label>
     <input type="text" placeholder="Last Name" name="last_name" id="last_name" value="<?php echo ($_POST['last_name']) ? $_POST['last_name'] :  $access_details['last_name']?>" class="form_med" style="width:442px;" />
    </div>
</div>

 
           <div class="wd_935 mrb_10">   
   
 <div class="form_adj_up" ><label>Room Number<font color="#FF0000">*</font></label>
     <input type="text" placeholder="Room Number" name="room_number" id="room_number" value="<?php echo ($_POST['room_number']) ? $_POST['room_number'] :  $access_details['room']?>" class="form_med" style="width:442px;" />
    </div>

</div>
        
        <input type="hidden" name="existing_user" value="0" id="existing_user"/>
   <input type="hidden" name="access_member_id" id="access_member_id" value="<?php echo $access_details['access_member_id']; ?>"/>
   <input type="hidden" name="access_master_id"  id="access_master_id" value="<?php echo $access_details['access_master_id']; ?>"/>
    </div>
     <div class="existing_user_details">
     </div>

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
    $(".create_user_details").show();
 $(document).on("click",".save_member",function(){  
     
	var	email_address		=	$.trim($("#email").val());	
	//var	password    =	$.trim($("#password").val()); 
     //   var	confirm_password    =	$.trim($("#confirm_password").val());  
	var	first_name	    =	$("#first_name").val();
	var	last_name	        =	$.trim($("#last_name").val());
	var	nick_name	        =	$.trim($("#nick_name").val());
        var	gender	        =	$.trim($("#gender").val());
   //     var	dob	        =	$.trim($("#dob").val());
	var id              =   '<?php echo $this->uri->segment(4, 0);?>';
        var user_id =$('#user_id').val();
        var access_master_id =$("#access_master_id").val();
     //   var access_start_date =$("#access_start_date").val();
     //   var access_end_date =$("#access_end_date").val();
         var room_number =$("#room_number").val();
	//alert(id);
      //  alert($("#existing_user").val());
	if(email_address=='')
	{ 
		$("#email").css("border-color","red");
		$("#email").focus();
		return false;
	}else{
            $("#email").css("border-color","");
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
   
                  if (room_number == '')
                {
                    $("#room_number").css("border-color", "red");
                    $("#room_number").focus();
                    return false;
                }
                else {
                    $("#room_number").css("border-color", "");
                }
	$('#frm_member').submit();
        
         });   
      
    $(".create_user").on("click",function(){
         $(".select_existing_user_details").hide(); 
         $(".existing_user_details").hide();
       $(".create_user_details").show(); 
    });
      $(".existing_user").on("click",function(){
            $(".create_user_details").hide(); 
             
       $(".select_existing_user_details").show(); 
    });
    $(document).on("change","#access_member",function(){
       $.ajax({
          url:"<?php echo base_url(); ?>admin/access_management/getExistingUserAccessDetails",
          type:"post",
          data:{access_member_id:$(this).val(),existing_user:1},
          success:function(data){  
       $(".create_user_details").show();
       $(".create_user_details").html(data);
          }
       }); 
    });
      $(document).on("change",".create_user",function(){
       $.ajax({
          url:"<?php echo base_url(); ?>admin/access_management/getExistingUserAccessDetails",
          type:"post",
          data:{access_member_id:$(this).val(),existing_user:0},
          success:function(data){  
       $(".create_user_details").show();
       $(".create_user_details").html(data);
          }
       }); 
    });
});


  



</script>
