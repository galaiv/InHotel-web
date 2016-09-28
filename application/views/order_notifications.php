<div  class="grn_bg_in">
  <div class="container">
    <h2>Management</h2>
    <div class="mnu_sty">  
    </div>
  </div>
</div>
<div class="container gbg_in">
  <div class="row">
   <ol style="margin-bottom: 5px; background-color:#F0F0F0;" class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> </a></li>
        <li class="active">Hotel Order Notifications</li>
      </ol>
    <div class="col-lg-12 portfolio-item" style="margin-bottom:40px;">
      <h3>Order Notifications<br/>
      </h3>
	  <div>
	  <div class="staff_list">
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
            <tr><td colspan="8"><center>No More Notificaton Found...</center></td></tr>
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