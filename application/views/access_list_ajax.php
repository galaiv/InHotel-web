
      <table>
        <thead>
          <tr>
            <th>&nbsp;</th>
            <th>User </th>
			 <th>Email </th>
            <th>Room Number</th>
            <th>Last Updte</th>

          </tr>
        </thead>
        <tbody>
            <?php
            if(count($access_list) > 0){
                  $i=1; 
            foreach ($access_list as $access_list){ ?>
          <tr>
                 <?php
		if($access_list['access_master_status'] == 'Y')
			$act_img = base_url().'public/images/active.png';
		else
			$act_img = base_url().'public/images/in_active.png';
		?>
            <td><a href="javascript:" class="change_access"  data-access_master_id="<?php echo $access_list['access_master_id']?>" data-access_master_status="<?php echo $access_list['access_master_status']?>"><img src="<?php echo $act_img?>" ></a></td>
            <td><a href="<?php echo base_url().'access_management/add/'.$access_list['access_master_id'] ?>"><?php echo $access_list['first_name'].' '.$access_list['last_name']; ?></a></td>            
             <td><?php echo $access_list['email']; ?></td>  
             <td><?php echo  ($access_list['room'])? :'--';;?></td>
              <td><?php echo date("d/m/Y H:i",strtotime($access_list['last_update']));?></td>
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
