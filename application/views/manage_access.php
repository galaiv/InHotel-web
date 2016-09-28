
<div  class="grn_bg_in">
    <div class="container">
        <h2>Management</h2>
        <div class="mnu_sty">
            <ul>
               <li><a href="<?php echo base_url(); ?>activation_code">Activation Codes</a></li>
     <li><a href="<?php echo base_url(); ?>access_management">Access History</a></li>
               
            </ul>
        </div>
    </div>
</div>
<div class="container gbg_in">
    <div class="row">
	<ol style="margin-bottom: 5px;background-color: #f0f0f0;" class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-home"></i> </a></li>
		<li><a href="<?php echo base_url()?>access_management">Access History</a></li>
        <li class="active">Access Management Details</li>
      </ol>

        <div class="col-lg-12 row">



            <div class="col-md-6 portfolio-item message" style="margin-bottom:40px;">




                <h3>Authorize user access<br/>
                </h3>
                <div  class="">
                    <form novalidate="novalidate" action="<?php echo base_url(); ?>access_management/add" method="POST" id="access_management">
                        <div class="form-group">
                            <?php if ($access_details['access_master_id'] == "") { ?>
                                <label class="radio-inline"> <input type="radio" name="create_user" data-existing_user="1"  class="existing_user create_user_radio" value="E" <?php echo ($_POST['create_user'] == 'E') ? 'checked' : ''; ?>> Select User </label>
                                <label class="radio-inline"> <input type="radio" name="create_user" data-existing_user="0" class="create_user create_user_radio" value="N" <?php echo ($_POST['create_user'] == 'N') ? 'checked' : (($_POST['create_user'] == 'E') ? '' : 'checked'); ?>> Create New User </label>
                                 <label class="radio-inline"> <input type="radio" name="create_user" data-existing_user="2"  class="general_user create_user_radio" value="G" <?php echo ($_POST['create_user'] == 'G') ? 'checked' : ''; ?>> General </label>

                            <?php } ?>


                        </div>
                        <div class="create_user_details">
                            <div class="form-group">
                                <label class="control-label" for="email">Email</label>
                                <input type="text" title="Please enter your email" <?php echo ($access_details['email']!="")  ? "readonly=''" : '';?> required="" value="<?php echo ($_POST['email']) ? $_POST['email'] : $access_details['email'];?>" name="email" id="email" class="form-control">
                                <span class="help-block"></span> </div>



                            <div class="form-group">
                            <label class="control-label" for="zone">Name/Zone</label>
                            <select name="zone" id="zone"  class="form-control" <?php  echo ($access_details['id']!="")  ? "disabled" : '';?>>
                                <?php  foreach ($zone as $zone) { ?>             
                                    <option  <?php  echo ($zone['zone_id']==$access_details['zone_id']) ? 'selected' : ''; ?> value="<?php echo $zone['zone_id']; ?>" ><?php echo $zone['zone_name'];?></option>
                                <?php } ?>
                            </select>
                            <span class="help-block"></span> </div>

                            <div class="form-group">
                                <label class="control-label" for="firstname">First Name</label>
                                <input <?php echo ($access_details['first_name']!="")  ? "readonly=''" : '';?> type="text" title="Please enter your first name" required="" value="<?php echo ($_POST['first_name']) ? $_POST['first_name'] : $access_details['first_name'];?>" name="first_name" id="first_name" class="form-control">
                                <span class="help-block"></span> </div>

                            <div class="form-group">
                                <label class="control-label" for="lastname">Last Name</label>
                                <input <?php echo ($access_details['last_name']!="")  ? "readonly=''" : '';?> type="text" title="Please enter your last name" required="" value="<?php echo ($_POST['last_name']) ? $_POST['last_name'] : $access_details['last_name'];?>" name="last_name" id="last_name" class="form-control">
                                <span class="help-block"></span> </div>
                            





                            <div class="form-group room_number" style="display: none;">
                                <label class="control-label" for="roomnumber">Room Number</label>
                                <input <?php echo ($access_details['room']!="")  ? "readonly=''" : '';?> type="text" title="Please enter your room number" required="" value="<?php echo ($_POST['room_number']) ? $_POST['room_number'] : $access_details['room'];?>" name="room_number" id="room_number" class="form-control" >
<!--								onBlur="validate(this.id);"
-->                                <span class="help-block"></span> </div>

                            <input type="hidden" name="existing_user" id="existing_user" value="<?php echo $access_details['existing_user']; ?>"/>
                            <input type="hidden" name="access_member_id" value="<?php echo $access_details['access_member_id']; ?>"/>
                            <input type="hidden" name="access_master_id" value="<?php echo $access_details['access_master_id']; ?>"/>
                   
                            <input type="hidden" name="user_id" value="<?php echo $access_details['user_id']; ?>" id="user_id"/>

       </div>
                        <?php if($access_details['id']==""){?>
                        <button class="btn res_btn submit_access" type="submit">Authorize</button>
                        <?php }?>
                    </form>
                </div>
            </div></div>








    </div>
</div>
<script>

    $(function() {
        $(".create_user_details").show();
        $(document).on("click", ".submit_access", function(e) {

            $(".alert").remove();
            e.preventDefault();
            var email_address = $.trim($("#email").val());
            //var	password    =	$.trim($("#password").val()); 
            //   var	confirm_password    =	$.trim($("#confirm_password").val());  
            var first_name = $.trim($("#first_name").val());
            var last_name = $.trim($("#last_name").val());
            var nick_name = $.trim($("#nick_name").val());
           // var gender = $.trim($("#gender").val());
            
            var id = '<?php echo $this->uri->segment(4, 0); ?>';
            var user_id = $('#user_id').val();
            var access_master_id = $("#access_master_id").val();
            var room_number = $("#room_number").val();
             var zone = $("#zone").val();
            var access_member = $("#access_member").val();
            var existing_user = $("#existing_user").val();
            if (existing_user == 0) {
                if (email_address == '')
                {
                    $("#email").css("border-color", "red");
                    $("#email").focus();
                    return false;
                } else {
                    $("#email").css("border-color", "");
                }


               
                if (first_name == '')
                {
                    $("#first_name").css("border-color", "red");
                    $("#first_name").focus();
                    return false;
                }
                else {
                    $("#first_name").css("border-color", "");
                }
                if (last_name == '')
                {
                    $("#last_name").css("border-color", "red");
                    $("#last_name").focus();
                    return false;
                }
                else {
                    $("#last_name").css("border-color", "");
                }
           
            } else {
                if (access_member == '')
                {
                    $("#access_member").css("border-color", "red");
                    $("#access_member").focus();
                    return false;
                }
                else {
                    $("#access_member").css("border-color", "");
                }
            }
          if(zone==2 && existing_user != 2){
            if (room_number == '')
            {
                $("#room_number").css("border-color", "red");
                $("#room_number").focus();
                return false;
            }
            else {
                $("#room_number").css("border-color", "");
            }
          }
            $.ajax({
                url: "<?php echo base_url(); ?>access_management/add",
                type: "post",
                data: $('#access_management').serialize(),
                dataType : "json",
                success: function(data) {
                //console.log(data); exit;  
            if(data.status==0){ 
                    $(".message").before(data.message);
            }else{
                if(data.edit==1){
                    
                window.location.href="<?php echo base_url(); ?>access_management/";
            }else{
                window.location.href="<?php echo base_url(); ?>activation_code/create/0/"+data.user_id+"/"+data.access_master_id+"/"+existing_user;
                }
            }
                }
            });
//	$('#access_management').submit();

        });

	 var existing_user;
        $(".existing_user,.create_user,.general_user").on("click", function() {
            existing_user = $(this).data('existing_user')
            $.ajax({
                url: "<?php echo base_url(); ?>access_management/getExistingUserAccessDetails",
                type: "post",
                data: {access_member_id: $("#access_member").val(), existing_user: existing_user},
                success: function(data) {
                    $(".create_user_details").show();
                    $(".create_user_details").html(data);
                }
            });
        });
		
        $(document).on("change", "#access_member", function() {
            var access_member_id = $("#access_member option:selected").val();
            $("#access_member_id").val(access_member_id);
        });

$(document).on("change","#zone",function(){  
    if($(this).val() ==2 && existing_user != 2){
   $(".room_number").show(); 
    }else{
         $(".room_number").hide(); 
    }
});
if($("#zone").val() ==2 && existing_user != 2){
   $(".room_number").show(); 
    }else{
         $(".room_number").hide(); 
    }
    });

/*	function validate(id)
{
	var flag   = 0;
	var val    = $.trim($("#"+id).val());
	if(id == 'room_number')
	{
			$.ajax({
				type:'POST',
				url:'<?php echo base_url(); ?>access_management/checkRoomAvailability',
				data:{room:},

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
	}
}
*/


</script>
