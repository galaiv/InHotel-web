
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
     <input type="text" placeholder="Room Number" name="room_number" id="room_number" value="<?php echo ($_POST['room_number']) ? $_POST['room_number'] :  $access_details['room_number']?>" class="form_med" style="width:442px;" />
    </div>

</div>
        
<input type="hidden" name="existing_user" id="existing_user" value="<?php echo $access_details['existing_user'];  ?>"/>
    <input type="hidden" name="access_member_id" value="<?php echo $access_details['access_member_id']; ?>"/>
    <input type="hidden" name="access_master_id" value="<?php echo $access_details['access_master_id']; ?>"/>
    
    <script type="text/javascript">
    $(function(){
       $('#access_start_date').datetimepicker({
                lang: 'en',
                timepicker: false,
                format: 'Y-m-d',
                minDate: '0',
            });
             $('#access_end_date').datetimepicker({
                lang: 'en',
                timepicker: false,
                format: 'Y-m-d',
                minDate: '0',
            });
         $('#dob').datetimepicker({
                lang: 'en',
                timepicker: false,
                format: 'Y-m-d',
                //minDate: '0',
            }); 
    });
    </script>