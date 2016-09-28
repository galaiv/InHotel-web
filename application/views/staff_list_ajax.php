<table>
        <thead>
          <tr>
            <th>&nbsp;</th>
            <th>Staff </th>
            <th>Email</th>
            <th>Join Date</th>
          </tr>
        </thead>
        <tbody>
            <?php
             if(count($staff_list) > 0){
                   $i=1; 
            foreach ($staff_list as $staff_list){ ?>
          <tr>
            <td><a href="<?php echo base_url().'hotel_staff/add/'.$staff_list['user_id'] ?>"><img src="<?php echo base_url(); ?>images/edit.png" ></a></td>
            <td><?php echo $staff_list['first_name'].' '.$staff_list['last_name']; ?></td>            
          
             <td><?php echo $staff_list['email_address'];?></td>
               <td><?php echo date("d/m/Y H:i",strtotime($staff_list['join_date']));?></td>
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