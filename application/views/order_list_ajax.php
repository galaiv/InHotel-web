<table>
        <thead>
          <tr>
		    <th>Drink</th>
            <th>Sender </th>
            <th>Price</th>
			<th>Quantity</th>
			<th>Recipient</th>
			<th>Sender Room</th>
			<th>Recipient Room</th>
			<th>Charge</th>
          </tr>
        </thead>
        <tbody>
            <?php
             if(count($order_list) > 0){
                   $i=1; 
            foreach ($order_list as $order_list){ ?>
          <tr>
            <td><a href="<?php echo base_url().'order/details/'.$order_list['id'] ?>"><?php echo $order_list['drink_title']; ?></a></td>
            <td><?php echo $order_list['offered_first_name'].' '.$order_list['offered_last_name']; ?></td>
			  <td><?php echo $order_list['total_price']; ?></td>
			  <td><?php echo $order_list['quantity']; ?></td>  
			  <td><?php echo $order_list['recipient_first_name'].' '.$order_list['recipient_last_name']; ?></td>               
			  <td><?php if($order_list['from_room'] !='0' && $order_list['from_room'] !='') echo $order_list['from_room']; else echo 'NA'; ?></td>             
			   <td><?php if($order_list['room_number'] !='0' && $order_list['room_number'] !='') echo $order_list['room_number']; else echo 'NA'; ?></td>    
			<td>   <select name="charge" class="" class="mod charge"  onchange="sub_charg_form(this,'<?php echo $order_list['id'];?>')" >
					  <option value="Y" <?php if($order_list['charged'] == 'Y'){ ?> selected="selected" <?php } ?>>charged</option>
					  <option value="N" <?php if($order_list['charged'] == 'N'){ ?> selected="selected" <?php } ?>>Not Paid</option>
					</select><img class="edit" src="<?php echo base_url() ?>images/icon1.png">
			 </td>            
                      
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