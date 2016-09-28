<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.datetimepicker.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.datetimepicker.js"></script>
<div  class="grn_bg_in">
  <div class="container">
    <h2>Management</h2>
    <div class="mnu_sty">    
    </div>
  </div>
</div>
<div class="container gbg_in">
  <div class="row">
    <ol style="margin-bottom: 5px;background-color: #f0f0f0;" class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-home"></i> </a></li>
        <li class="active">Order Management</li>
      </ol>
   
   
    <div class="col-lg-12 portfolio-item" style="margin-bottom:40px;">
     
  <?php 
if($this->session->flashdata('success'))
{
?>
<div class="alert alert-success"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button><?php echo $this->session->flashdata('success');?></div>
<?php
}
?>

<?php
if($this->session->flashdata('failure'))
{
?>
<div class="alert alert-failure"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><?php echo $this->session->flashdata('failure');?></div>

<?php
}
?>
     
     
      <h3>Order List
	  
     <br/> </h3>

	 <form name="search_form" id="search_form" method="post" action="">

	  <input type="text"  name="from_date" id="from_date" placeholder="From Date"  class=" "  value="<?php echo $_REQUEST['from_date'];?>">
     <input type="text" name="to_date" id="to_date" placeholder="To Date"  class="" value="<?php echo $_REQUEST['to_date'];?>">
	 <a href="javascript:void(0);" onclick="window.location.href='<?=base_url()?>order/index'" class=" btn res_btn pull-right"  style="margin-left: 20px;margin-top: 0px;">Clear</a>
	 <a href="javascript:void(0);" onClick="searchOrder();" class="btn res_btn pull-right" style="margin-left: 20px;margin-top: 0px;">Search</a>

</form>
	 <div class="clearfix"></div>
	 	 <br/>

          <div  class="staff_list">
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
          <tr><td colspan="8"><center>No Records Found</center></td></tr>
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

<script>
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
$(function(){
  $('#from_date').datetimepicker({
                lang: 'en',
                timepicker: false,
                format: 'Y-m-d',
               // minDate: '0'
            });
            $('#to_date').datetimepicker({
                lang: 'en',
                timepicker: false,
                format: 'Y-m-d',
               // minDate: '0'
            });
});
/*$(".edit").click(function(event){
   event.preventDefault();
   $('.charge').prop("disabled", false); // Element(s) are now enabled.
});*/
function sub_charg_form(sell,id)
{ //alert(sell.value);
//alert(id);
var status = sell.value;

$.ajax({
					url: "<?php echo base_url()?>order/changeOrderStatus",
					type: "POST",	
					data : {id:id,status:status},
					success: function(result){ 
					 //window.location.href="<?php echo site_url();?>admin/user/index?limit="+$("#limit").val();
			        window.top.location.reload();
					}
				});	
}
function searchOrder()
{
	document.search_form.submit();
	return true;
}
</script>