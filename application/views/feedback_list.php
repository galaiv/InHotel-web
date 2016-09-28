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
        <li class="active">Hotel Feedbacks</li>
      </ol>
    <div class="col-lg-12 portfolio-item" style="margin-bottom:40px;">
      <h3>Hotel Feedbacks<br/>
      </h3>
	  <div>
	  <div class="staff_list">
      <table>
        <tbody>
		 <?php if(count($feedbacks)>0) { ?>
 <?php 
 foreach ($feedbacks as $feedbacks)
		{ ?>  
          <tr>
            <!--<td>
			<?php	   if($feedbacks['image']){
			  $feedbacks_img = explode('.',$feedbacks['image']);
			  ?>
                  <img src="<?php echo base_url();?>upload/member/thumb/<?php echo $feedbacks_img[0].'_thumb.'.$feedbacks_img[1];?>" class="im_style">
                  <?php }else{ ?>
        <img alt="" class="im_style" src="<?php echo base_url(); ?>upload/no-image.jpg">             
		      <?php } ?>
			
			</td>-->
            <td><a style="text-decoration:none;" href="<?=base_url()?>hotel_staff/feedback_details/<?=$feedbacks['id']?>"><?php echo $feedbacks['first_name']." ".$feedbacks['last_name'];?></a></td>
			
            <td><?php  // $text = str_replace('%0A', ' ', $feedbacks['experiance']);
			// $text = str_replace('%20', "\r\n", $text);
								//  echo $text;
								//echo $text = urldecode ($text);
								 $text = urldecode ($feedbacks['experiance']);
                               $text = str_replace('%0A', "\r\n",$text);
			echo substr(htmlentities($text), 0, 35); ?>
                          <?php if(strlen($feedbacks['experiance'])>35){?>
                          ...
                          <?php }?>
			
			</td>
            <td><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?php echo date("M j, Y g:i a",strtotime($feedbacks['date_time']));?></td>
          </tr>
        <?php } ?>
<?php } else { ?>
            <tr><td>No Feedbacks Found...</td></tr>
 <?php }?>
        </tbody>
      </table>
	  <div class="pagin">
     <div class="pull-left"><?php echo $total_rows; ?> items | items from <?php echo $start_index+1; ?> to <?php echo --$i+$start_index;?></div>
    <nav>
        <?php echo $paging; ?>
        </nav>
    </div>
	  </div>   
    </div>
</div>
    
    
   
    
    
    </div>
</div>
<script type="text/javascript">
$(function(){
     // $('body').off("click", ".pagination1 li a.paginate_button").on('click', '.pagination1 li a.paginate_button', function(e) {

  $(document).on("click",".pagination a",function(e){
        e.preventDefault();
    var url = $(this).attr("href");
$.ajax({
        url: url,
      success: function(data) {
                 //   $("#staff_list").remove();
                    $(".staff_list").html(data);
                }
    });
       });  
	   });
</script>