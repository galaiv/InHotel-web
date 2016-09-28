
<div class="toperror" style="display:none;"> <img width="14" height="16" src="<?php  echo base_url()?>assets/images/error.png"> <span style="margin-top:5px; text-align:center;" id="error_data">Some Data Missing</span></div>
<div  class="grn_bg_in">
  <div class="container"> `
    <h2>Management</h2>
    <div class="mnu_sty">
      
    </div>
  </div>
</div>
<div class="container gbg_in">
  <div class="row">
  <ol style="margin-bottom: 5px;background-color: #f0f0f0;" class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-home"></i> </a></li>
		<li><a href="<?php echo base_url()?>hotel_staff/hotel_feedbacks">Feedback Management</a></li>
        <li class="active">Feedback details</li>
      </ol>

    <div class="col-lg-12 row">
      <div class="col-md-6 portfolio-item message" style="margin-bottom:40px;">
        <h3>Feedback Management<br/>
        </h3>
        <div  class="">
            <div class="create_user_details">
              <div class="form-group">
                <label class="control-label" for="email">User</label>
                <input type="text" <?php echo ($feedback_details['first_name']!="")  ? "readonly=''" : '';?> required="" value="<?php echo $feedback_details['first_name'].' '.$feedback_details['last_name'];?>" class="form-control">
                <span class="help-block"></span> </div>              
				<div class="form-group">
                <label class="control-label" for="firstname">Comments</label>
							     <textarea name="description" id="description" cols="25" rows="5" class="form-control" readonly="" disabled="disabled"><?php
								 //$text = str_replace('%0A', "\r\n", $feedback_details['experiance']);
								// $text = str_replace('%20', "\r\n", $feedback_details['experiance']);
								 $text = urldecode ($feedback_details['experiance']);
                                 echo    $text = str_replace('%0A', "\r\n",$text);
								  //echo $text;?>
</textarea>
                <span class="help-block"></span> </div>              
              <div class="form-group">
                <label class="control-label" for="firstname">Date</label>
	
                <input type="text"  required="" <?php echo ($feedback_details['date_time']!="")  ? "readonly=''" : '';?> value="
<?php echo date("M j, Y g:i a",strtotime($feedback_details['date_time']));?>" class="form-control">
                <span class="help-block"></span> </div>
              
            </div>
           <a href="<?php echo base_url()?>hotel_staff/hotel_feedbacks"  class="btn res_btn"> Back</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
</script>
