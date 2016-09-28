<table>
        <tbody>
		 <?php if(count($feedbacks)>0) { ?>
 <?php 
 foreach ($feedbacks as $feedbacks)
		{ ?>  
          <tr>
            <!--<td >
			<?php	   if($feedbacks['image']){
			  $feedbacks_img = explode('.',$feedbacks['image']);
			  ?>
                  <img src="<?php echo base_url();?>upload/member/thumb/<?php echo $feedbacks_img[0].'_thumb.'.$feedbacks_img[1];?>" class="im_style">
                  <?php }else{ ?>
        <img alt="" class="im_style" src="<?php echo base_url(); ?>upload/no-image.jpg">             
		      <?php } ?>
			
			</td>-->
            <td><a style="text-decoration:none;" href="<?=base_url()?>hotel_staff/feedback_details/<?=$feedbacks['id']?>"><?php echo $feedbacks['first_name']." ".$feedbacks['last_name'];?></a></td>
            <td><?php 
			                      $text = urldecode ($feedbacks['experiance']);
                                 $text = str_replace('%0A', "\r\n",$text);
								 // echo $text;				
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