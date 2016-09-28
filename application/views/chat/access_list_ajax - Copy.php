<?php
	session_start();
	$_SESSION['username'] = $this->session->userdata('web_user'); // Must be already set
?>
      <table>
        <thead>
          <tr>
            <th>&nbsp;</th>
            <th>User </th>
            <th>Room Number</th>
            <th>Last Updte</th>
			<th>Chat Now</th>

          </tr>
        </thead>
        <tbody>
            <?php
            if(count($access_list) > 0){
                  $i=1; 
            foreach ($access_list as $access_list){ ?>
          <tr>
            <td><a href="<?php echo base_url().'access_management/add/'.$access_list['access_master_id'] ?>"><img src="<?php echo base_url(); ?>images/edit.png" ></a></td>
            <td><?php echo $access_list['first_name'].' '.$access_list['last_name']; ?></td>            
           
             <td><?php echo $access_list['room'];?></td>
              <td><?php echo date("d/m/Y H:i",strtotime($access_list['last_update']));?></td>
			    <td><a  id="chat_<?php echo $access_list['access_master_id'];?>" onClick="javascript:chatWith('<?php echo $access_list['first_name']; ?>')">chat</a></td>
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
    