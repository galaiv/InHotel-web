<?php if($access_details['existing_user']==1 ){ ?>

<div class="form-group">
  <label class="control-label" for="user">User</label>
  <select name="access_member" id="access_member"  class="form-control">
    <option value="">Select User</option>
    <?php foreach ($access_member as $access_member) { ?>
    <option value="<?php echo $access_member['id']; ?>" ><?php echo $access_member['email'] . ' - ' . $access_member['first_name']; ?></option>
    <?php } ?>
  </select>
  <span class="help-block"></span> </div>
<div class="form-group">
  <label class="control-label" for="zone">Name/Zone</label>
  <select name="zone" id="zone"  class="form-control" <?php  echo ($access_details['id']!="")  ? "disabled" : '';?>>
    <?php foreach ($zone as $zone) { ?>
    <option <?php  echo ($zone['zone_id']==$access_details['zone_id']) ? 'selected' : ''; ?> value="<?php echo $zone['zone_id']; ?>" ><?php echo $zone['zone_name'];?></option>
    <?php } ?>
  </select>
  <span class="help-block"></span> </div>
<div class="form-group room_number"  style="display: none;">
  <label class="control-label" for="roomnumber">Room Number</label>
  <input type="text" title="Please enter your room number" required="" value="" name="room_number" id="room_number" class="form-control">
  <span class="help-block"></span> </div>
<?php }else if($access_details['existing_user']==0 ){?>
<div class="form-group">
  <label class="control-label" for="email">Email</label>
  <input type="text" title="Please enter your email" required="" value="" name="email" id="email" class="form-control">
  <span class="help-block"></span> </div>
<div class="form-group">
  <label class="control-label" for="zone">Name/Zone</label>
  <select name="zone" id="zone"  class="form-control">
    <?php foreach ($zone as $zone) { ?>
    <option <?php  echo ($zone['zone_id']==$activation_code_details['zone_id']) ? 'selected' : ''; ?> value="<?php echo $zone['zone_id']; ?>" ><?php echo $zone['zone_name'];?></option>
    <?php } ?>
  </select>
  <span class="help-block"></span> </div>
<div class="form-group">
  <label class="control-label" for="firstname">First Name</label>
  <input type="text" title="Please enter your first tname" required="" value="" name="first_name" id="first_name" class="form-control">
  <span class="help-block"></span> </div>
<div class="form-group">
  <label class="control-label" for="lastname">Last Name</label>
  <input type="text" title="Please enter your last name" required="" value="" name="last_name" id="last_name" class="form-control">
  <span class="help-block"></span> </div>
<!--            <div class="form-group">
            <label class="control-label" for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control">
 
    <option value="">Select Gender</option>
  <option value="M">Male</option>
  <option value="F">Female</option>
</select>
            <span class="help-block"></span> </div>-->

<div class="form-group room_number" style="display: none;">
  <label class="control-label" for="roomnumber">Room Number</label>
  <input type="text" title="Please enter your room number" required="" value="" name="room_number" id="room_number" class="form-control">
  <span class="help-block"></span> </div>
<?php }else if($access_details['existing_user']==2 ){?>
        <div class="form-group" style="display:none">
          <label class="control-label" for="zone">Name/Zone</label>
          <select name="zone" id="zone"  class="form-control" <?php  echo ($access_details['id']!="")  ? "disabled" : '';?>>
            <?php foreach ($zone as $zone) {
				if($zone['zone_id'] == 2){	
			 ?>
            
            <option <?php  echo ($zone['zone_id']==$access_details['zone_id']) ? 'selected' : ''; ?> value="<?php echo $zone['zone_id']; ?>" ><?php echo $zone['zone_name'];?></option>
            <?php } }?>
          </select>
          <span class="help-block"></span> </div>
        <!--<div class="form-group room_number"  style="display: none;">
          <label class="control-label" for="roomnumber">Room Number</label>
          <input type="text" title="Please enter your room number" required="" value="" name="room_number" id="room_number" class="form-control">
          <span class="help-block"></span> </div>-->
<?php } ?>
<input type="hidden" name="existing_user" id="existing_user" value="<?php echo $access_details['existing_user'];  ?>"/>
<input type="hidden" id="access_member_id" name="access_member_id" value="<?php echo $access_details['access_member_id']; ?>"/>
<input type="hidden" name="access_master_id" value="<?php echo $access_details['access_master_id']; ?>"/>
<script>
    $(function(){
if($("#zone").val() ==2){
   $(".room_number").show(); 
    }else{
         $(".room_number").hide(); 
    }
    });
    </script>