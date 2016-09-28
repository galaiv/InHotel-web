
<?php
	
?>
<script>
var siteurl='<?=base_url()?>';
var userid='<?=$this->session->userdata('user_id');?>';

</script>

      <table>
        <thead>
          <tr>
            <!--<th>&nbsp;</th>-->
            <th>User </th>
			<th>Email </th>
            <th>Room Number</th>
            <th>Last Updte</th>
			<?php if($this->session->userdata('member_type') == '3')	{ ?> <th>Chat Now</th><?php } ?>

          </tr>
        </thead>
        <tbody>
            <?php
            if(count($access_list) > 0){
                  $i=1; 
            foreach ($access_list as $access_list){ ?>
          <tr>
            <!--<td><a href="<?php echo base_url().'access_management/add/'.$access_list['access_master_id'] ?>"><img src="<?php echo base_url(); ?>images/edit.png" ></a></td>-->
              <td><a href="<?php echo base_url().'access_management/add/'.$access_list['access_master_id'] ?>"><?php echo $access_list['user_first_name'].' '.$access_list['user_last_name']; ?></a></td>   <td><?php echo $access_list['email']; ?></td>               
           
             <td><?php echo ($access_list['room'])? :'--';?></td>
              <td><?php echo date("d/m/Y H:i",strtotime($access_list['last_update']));?></td>
			   <?php if($this->session->userdata('member_type') == '3')	{ ?> <td>
			   <?php if($access_list['quickblox_id'] !="" && $access_list['chat_status'] == 'Y') { ?>
			<!--<a href="<?php echo base_url(); ?>access_management/online_users?qb_id=<?php echo $access_list['quickblox_id'];?>&usrid=<?php echo $access_list['users_id'];?>">Chat</a>-->  
			   <a href="javascript:void(0);" onClick="get_chat_popup(<?php echo $access_list['quickblox_id'];?>,'<?php echo $access_list['user_first_name'].' '.$access_list['user_last_name']; ?>',<?php echo $access_list['users_id'];?>)" class="sessionButton">chat </a>
			 <?php } else {  ?> offline <?php }?>
			   </td><?php } ?>
          </tr>
            <?php 
            $i++;
            
            } }else{ ?>
          <tr><td colspan="6">No Records Found</td></tr>
           <?php }?>
        </tbody>
      </table>
    
      <div class="pagin">
     <div class="pull-left"><?php echo $total_rows; ?> items | items from <?php echo $start_index+1; ?> to <?php echo --$i+$start_index;?></div>
    <nav>
        <?php echo $paging; ?>
        </nav>
    </div>
    