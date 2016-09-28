<table>
	  <thead>
          <tr>
		    <th width="10%">Drink</th>
            <th width="15%">From User</th>
            <th width="9%">From Room</th>
            <th width="15%"> To User</th>
			<th width="9%"> To Room</th>
			<th width="11%">Total Price</th>
			<th width="11%">Quantity</th>
			<th width="16%">Date</th>
          </tr>
        </thead>
        <tbody>
		 <?php if(count($notifications)>0) { $i=1; 
?>
 <?php 
 foreach ($notifications as $notifications)
		{ ?>  
          <tr>
		  <td><a style="text-decoration:none;" href="<?=base_url()?>hotel_staff/hotel_orders_details/<?=$notifications['id']?>"><?php echo $notifications['drink_title'];?></a></td>
            <td><?php echo $notifications['from_first_name']." ".$notifications['from_last_name'];?></td>
            <td><?php if($notifications['from_room'] !="") echo $notifications['from_room']; else echo "-";?></td>
			<td><?php echo $notifications['to_first_name']." ".$notifications['to_last_name'];?></td>
			<td><?php if($notifications['to_room'] !="")  echo $notifications['to_room'];else echo "-";?></td>
			<td><?php echo $notifications['total_price'];?></td>
			<td><?php echo $notifications['quantity'];?></td>
            <td><?php echo date("M j, Y g:i a",strtotime($notifications['date_time']));?></td>
          </tr>
        <?php             $i++;
} ?>
<?php } else { ?>
            <tr><td colspan="8"><center>No More Notificaton Found..</center></td></tr>
 <?php }?>
        </tbody>
      </table>
	  <div class="pagin">
     <div class="pull-left"><?php echo $total_rows; ?> items | items from <?php echo $start_index+1; ?> to <?php echo --$i+$start_index;?></div>
    <nav>
        <?php echo $paging; ?>
        </nav>
    </div>