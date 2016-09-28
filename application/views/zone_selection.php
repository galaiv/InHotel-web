<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-multiselect.js"></script>
<style>


</style>
<div class="toperror" style="display:none;"> <img width="14" height="16" src="<?php  echo base_url()?>assets/images/error.png"> <span style="margin-top:5px; text-align:center;" id="error_data">Some Data Missing</span></div>
<div class="topsuccess" style="display:none;"> <img width="25" height="25" src="<?php echo base_url() ?>assets/images/sucess.png"> <span style="margin-top:5px; text-align:center;" id="success_data">Some Data Missing</span></div>
<div  class="grn_bg_in">
  <div class="container"> `
    <h2>Management</h2>
    <div class="mnu_sty">
      <ul>
      <li><a href="<?php echo base_url(); ?>hotel_staff/change_password">Change Password</a></li>
	    <li><a href="<?php echo base_url(); ?>hotel_staff/hotel_feedbacks">Hotel Feedbacks</a></li>
		 <li><a href="<?php echo base_url(); ?>hotel_staff/zone_selection">Hotel Zones</a></li>
		<li><a href="<?php echo base_url(); ?>hotel_staff/settings">Hotel Settings</a></li>

      </ul>
    </div>
  </div>
</div>

<div class="container gbg_in">
  <div class="row">
   <ol style="margin-bottom: 5px;background-color: #f0f0f0;" class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-home"></i> </a></li>
        <li class="active">Hotel Zones</li>
      </ol>
    <div class="col-lg-12 row">
<div class="col-lg-12" id="alerts_register1">
  <?php if($this->session->flashdata('success')){ ?>
					 <div class="alert alert-success"><button type="button" data-dismiss="alert" aria-hidden="true" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?php   echo $this->session->flashdata('success'); ?> </div>
                 <?php } ?>               	 	</div> 
      <div class="col-md-6 portfolio-item message" style="margin-bottom:40px;">
	
        <h3>Settings<br/>
        </h3>
        <div  class="">
          <form novalidate="novalidate" action="" method="POST" id="hostel_form" name="hostel_form" enctype="">
            <div class="create_user_details">
              <div class="form-group">
                <label class="control-label" for="email">Zones</label>
				<div class='clearfix'?</div>
              <div class="col-sm-9 pad0 example2">
							  <div id="groupsched">

                   <select id="zones" multiple="multiple" onchange="hotelZones();">
                      <?php 
					   foreach($zone_list as $val){?>
                      <option value="<?php echo $val['id'];?>"><?php echo $val['zone_name'];?></option>
                      <?php }?>
                   </select>
                   <input type="hidden" class="form-control" id="zone_id" name="zone_id" />
                </div>
			</div>
                <span class="help-block"></span> </div>
				
            </div>
			 <input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $hotel_id; ?>"/>
            <button class="btn res_btn submit_access" type="button" onClick="create_user();">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/mycss.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>

<script>
	$(document).ready(function () {
	$.ajax({
		type:'POST',
		url:'<?php echo base_url(); ?>hotel_staff/showhotelzonelist',
		data:{},
		success:function(data)
		{ 
		    var res = data.split("~");				
			$("#groupsched").html(res[0]);
			var zon_id = res[1];
			var valArr = zon_id.split(",");
			var i = 0, size = valArr.length;
			for (i; i < size; i++)
			{
	   			$('#zones').multiselect('select', valArr[i]);
				
			}
			var zones = $( "#zones" ).val() || [];
	       $("#zone_id").val(zones);
		}
	});
	

});
function hotelZones()
{
	var zones = $( "#zones" ).val() || [];
	$("#zone_id").val(zones);
}

	   function create_user() {
            var flag  = 0;
            var zone_id = $("#zone_id").val();
     
            
			if(zone_id=='')
			{ 

				if(flag == 0)
				{
					//$("#first_name").focus(); 
				}
				$("#zone_id").addClass('poperror'); 
				showerror('One Zone entry is mandatory');
				flag = 1;
			    }else{
				$("#zone_id").removeClass('poperror'); 
			}
			
		if(flag == 0)
		{ 
		   $('.submit_access').prop('disabled', true);
		   $('#hostel_form').submit();
        }
   }
$('#zones').multiselect();
   
   function showerror(data)
{
	$("#error_data").html(data); 
	$('.toperror').slideDown();
	setTimeout(function(){
	$('.toperror').slideUp();
	//$('#msg_head').hide('slow');
	},6000);
}
function showsuccessdelete(data)
    {
        $("#success_data").html(data);
        $('.topsuccess').slideDown();
        setTimeout(function() {
            $('.topsuccess').slideUp();

        }, 6000);
    }
</script>
