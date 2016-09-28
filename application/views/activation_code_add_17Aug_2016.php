<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.datetimepicker.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.datetimepicker.js"></script>
<div  class="grn_bg_in">
  <div class="container">
    <h2>Management</h2>
    <div class="mnu_sty">
    <ul>
    <li><a href="<?php echo base_url(); ?>activation_code">Activation Codes</a></li>
     <li><a href="<?php echo base_url(); ?>access_management">Access Management</a></li>
      
    </ul>
    </div>
  </div>
</div>
<div class="container gbg_in">
  <div class="row">
    <ol style="margin-bottom: 5px;background-color: #f0f0f0;" class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-home"></i> </a></li>
		<li><a href="<?php echo base_url()?>activation_code">Activation Codes</a></li>
        <li class="active">Activation code details</li>
      </ol>
   
   <div class="col-lg-12 row">
   
   
   
    <div class="col-md-6 portfolio-item message" style="margin-bottom:40px;">
     
     
     
     
      <h3>Create Activation Code<br/>
      </h3>
      <div  class="">
        <form novalidate="novalidate" action="<?php echo base_url(); ?>activation_code/create" method="POST" id="activation_code_form">
         
<!--             <div class="form-group">
                            <label class="control-label" for="zone">Name/Zone</label>
                            <select name="zone" id="zone"  class="form-control">
                                <?php foreach ($zone as $zone) { ?>             
                                    <option <?php  echo ($zone['zone_id']==$activation_code_details['zone_id']) ? 'selected' : ''; ?> value="<?php echo $zone['zone_id']; ?>" ><?php echo $zone['zone_name'];?></option>
                                <?php } ?>
                            </select>
                            <span class="help-block"></span> </div>-->
            
            
            <div class="form-group">
            <label class="control-label" for="Access Start Time">Access start time</label>
            <input type="text" title="Please enter your access start time" required="" readonly="" value="<?php echo ($_POST['access_start_time']) ? $_POST['access_start_time'] : $activation_code_details['access_start_time'];?>" name="access_start_time" id="access_start_time" class="form-control">
            <span class="help-block"></span> </div>
            
            
            <div class="form-group">
            <label class="control-label" for="Access Close Time">Access close time</label>
            <input type="text" title="Please enter your access close time" required="" readonly="" value="<?php echo ($_POST['access_close_time']) ? $_POST['access_close_time'] : $activation_code_details['access_close_time'];?>" name="access_close_time" id="access_close_time" class="form-control">
            <span class="help-block"></span> </div>
            
            <?php  if($activation_code_id){?>
              <button class="btn res_btn save_activation_code" type="submit">Submit</button>
           
            <?php } else{ ?>
             <button class="btn res_btn save_activation_code" type="submit">Generate Code</button>
            <?php }?>
             <input type="hidden" name="access_id" value="<?php echo $access_id;?>"/>
        </form>
      </div>
    </div></div>
    
    
    </div>
  </div>
 <script>

        $(function() {
  //var visitortime = new Date();
         /*   $(".generate_code").on("click", function() {
                $.ajax({
                    url: "<?php echo base_url(); ?>admin/activation_code/generateActivationCode",
                    type: "post",
                    data: {},
                    success: function(data) {
                        $("#activation_code").val(data);
                    }
                });
            });*/
         
            $('#access_start_time').datetimepicker({
                lang: 'en',
               timepicker: false,
                format: 'Y-m-d',
                 minDate:'0',
                 step:15,  
               
                 
		
            });
            $('#access_close_time').datetimepicker({
                lang: 'en',
               timepicker: false,
                format: 'Y-m-d',
                minDate:'0',
		step:15
            });
            $(".save_activation_code").on("click", function(e) { 
                e.preventDefault();
          $(".alert").remove();
           $(".custom-alert").remove();
           
                var access_start_time = $.trim($("#access_start_time").val());
                var access_close_time = $.trim($("#access_close_time").val());

         
                   if (access_start_time == '')
                {
                    $("#access_start_time").css("border-color", "red");
                    $("#access_start_time").focus();
                    return false;
                }
                else {
                    $("#access_start_time").css("border-color", "");
                }
                if (access_close_time == '')
                {
                    $("#access_close_time").css("border-color", "red");
                    $("#access_close_time").focus();
                    return false;
                }
                else {
                    $("#access_close_time").css("border-color", "");
                }
                if (access_start_time >= access_close_time)
                {
                    $("#access_close_time").after("<span class='custom-alert'>Access close time  must be greater than access start time</span>");
                    $("#access_close_time").css("border-color", "red");
                    $("#access_close_time").focus();
                    return false;
                }
                var activation_code_id =<?php echo ($activation_code_id) ? $activation_code_id: 0; ?>;
                  $.ajax({
                url: "<?php echo base_url(); ?>activation_code/create/"+activation_code_id+"/<?php echo $user_id; ?>",
                type: "post",
                data: $('#activation_code_form').serialize(),
                dataType : "json",
                success: function(data) {  
            if(data.status==0){ 
                    $(".message").before(data.message);
            }else{
              window.location.href="<?php echo base_url(); ?>activation_code/show/"+data.activation_code_id
            }
                }
            });
              
            });

        });
    </script>