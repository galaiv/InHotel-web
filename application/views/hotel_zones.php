<div  class="grn_bg_in">
  <div class="container">
    <h2>Management</h2>
    <div class="mnu_sty">  
	   <ul>
	   	  <li><a href="<?php echo base_url(); ?>registration/payment">Renew Membership</a></li>
    <li><a href="<?php echo base_url(); ?>hotel_staff/change_password">Change Password</a></li>
	    <li><a href="<?php echo base_url(); ?>hotel_staff/hotel_feedbacks">Hotel Feedbacks</a></li>
		 <li><a href="<?php echo base_url(); ?>hotel_staff/hotel_zones">Hotel Zones</a></li>
		<li><a href="<?php echo base_url(); ?>hotel_staff/settings">Hotel Settings</a></li>

		       </ul>  
    </div>
  </div>
</div>
<div class="container gbg_in">
  <div class="row">
   <ol style="margin-bottom: 5px; background-color:#F0F0F0;" class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> </a></li>
		  <li><a href="<?php echo base_url();?>hotel_staff/settings">Hotel Profile </a></li>
        <li class="active">Hotel Zones</li>
      </ol>
    <div class="col-lg-12 portfolio-item" style="margin-bottom:40px;">
      <h3>Hotel Zones<br/>
      </h3>
	  <div>
	  <div class="staff_list">
	   <form name="frmList" id="frmList" method="post" action="">
    <input type="hidden" name="idx" id="idx" value="" />
      <table>
        <tbody><?php //echo $val = count($zone_list);?>
		 <?php if(count($zone_list)>0) { ?>
 <?php 
 foreach ($zone_list as $zone_list)
		{ ?>  
          <tr>
            <td><?php echo $zone_list['zone_name'];?></td>

            <td style=""><input type="checkbox" <?php if($zone_list['selected'] == 'Y') { ?> checked="checked" <?php } ?> class="mod" class="zone_id" name="sport" value="<?php echo $zone_list['id'];?>" /></td>
          </tr>
        <?php } ?>
<?php } else { ?>
            <tr><td>No Zone list Found...</td></tr>
 <?php }?>
        </tbody>
      </table>
	  </form>
	  <div class="pagin">
     <div class="pull-right"> <button class="btn res_btn submit_access" type="button" onClick="create_zones();">Submit</button>
</div>
    </div>
	  </div>   
    </div>
</div>
    
    
   
    
    
    </div>
</div>
<script type="text/javascript">
function  create_zones() {         
     var allVals = [];
	 $.each($("input[name='sport']:checked"), function(){            
                allVals.push($(this).val());
            });
     $('.zone_id').each(function() {
      
	   
	  
	  
     });//alert(allVals);
     $('#idx').val(allVals);
	 if($('#idx').val()=='')
			{
			 alert('Select Atleast one');
			}
	else
			{				
				$("#frmList").submit();return true;
					
			 }
	
  }
</script>