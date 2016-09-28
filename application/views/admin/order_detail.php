<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.datetimepicker.css">
<link rel="stylesheet" href="<?=base_url()?>public/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.datetimepicker.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/jconfirm/jquery.confirm/jquery.confirm.css" />
<script src="<?php echo base_url()?>public/jconfirm/jquery.confirm/jquery.confirm.js"></script>

<div class="bred_outer"><div class="bred_nav">

<ul>

 <li ><a href="#" ><img src="<?= base_url() ?>public/images/br_home.jpg" class="bn_home" /></a></li>
<li><a href="<?= base_url() ?>admin/admin_dashboard">Dashboard</a></li>
<li><img src="<?= base_url() ?>public/images/br_arow.jpg" class="bn_arow" /></li>
<li><a href="<?= base_url() ?>admin/order/index">Order Management</a></li>
<li><img src="<?= base_url() ?>public/images/br_arow.jpg" class="bn_arow" /></li>
<li>Details</li>

</ul>


</div></div>


<div class="container_out"></div>
<div class="container">
      <?php
if($this->session->flashdata('success'))
{
?>
	<div class="sucess_msg"><?=$this->session->flashdata('success');?></div>
<?php
}
?>

<?php
if($this->session->flashdata('error'))
{
?>
	<div class="erroe_msg"><?=$this->session->flashdata('error');?></div>
<?php
}
?>
<div class="topsec">&nbsp; 
<a href="#"  class="save_btn_green save_member">Save</a>
</div>
<div class="wd_975">
<div class="wd_975_title"><h3> Order Details </h3></div>
<form name="order_form"  id="order_form" enctype="multipart/form-data" method="post">
    <input type="hidden" name="order_id" value="<?php echo ($order_details['id']); ?>">
<div class="wd_975_cnt">

<div class="wd_935 mrb_10">
<div class="form_adj_up" ><label>Drink</label>
    <input type="text"  name="title" id="title" class="form_med" style="width:442px;"   value="<?php echo ($order_details['drink_title']) ? $order_details['drink_title'] :'';?>" readonly="" />
</div>
         <div class="form_adj_rte" ><label>Hotel</label>

<input type="text"  name="hotel_id"     value="<?php echo ($order_details['hotel_title']) ? $order_details['hotel_title'] :  '';?>"
        class="form_med" style="width:442px;"  readonly="readonly"/>
    
</div>

</div>
    <div class="wd_935 mrb_10">
            <div class="form_adj_up"><label>Unit Price</label>

    <input type="text"  name="order_price" id="order_price" value="<?php echo ($order_details['price']) ? $order_details['price'] : '';?>" class="form_med" style="width:442px;" readonly=""/>			
</div>
<div class="form_adj_rte"><label>Quantity</label>

    <input type="text"  name="quantity" id="quantity" value="<?php echo ($order_details['quantity']) ? $order_details['quantity'] : '';?>" class="form_med" style="width:442px;" readonly=""/>			
</div>
    

</div>
<div class="wd_935 mrb_10">
    <div class="form_adj_up" ><label>Total Price</label>
 <input type="text"  name="total_price" id="total_price" value="<?php echo ($order_details['total_price']) ? $order_details['total_price'] : '';?>" class="form_med" style="width:442px;" readonly=""/>			
   </div>

  <div class="form_adj_rte" ><label>Offered User</label>
<input type="text" value="<?php echo ($order_details['offered_first_name']) ? $order_details['offered_first_name'].' '.$order_details['offered_last_name'] :'';?>"
       class="form_med" style="width:442px;"  readonly=""/></div>
</div>
    <div class="wd_935 mrb_10">

  <div class="form_adj_up" ><label>Recipient</label>
<input type="text" value="<?php echo ($order_details['recipient_first_name']) ? $order_details['recipient_first_name'].' '.$order_details['recipient_last_name'] : '';?>"
       class="form_med" style="width:442px;"  readonly=""/></div>
	  <div class="form_adj_rte" ><label>Room</label>
	<input type="text" value="<?php echo ($order_details['room_number']) ? $order_details['room_number'] : '';?>"
       class="form_med" style="width:442px;"  readonly=""/>
	</div>
 

</div>
<div class="wd_935 mrb_10">
		<div class="form_adj_up" ><label>Created Date</label>
<input type="text"  name="date_time" id="_date_time"   value="<?php echo ($order_details['date_time']) ? $order_details['date_time'] : '';?>"
       class="form_med" style="width:442px;"  readonly=""/></div>
</div>
<div>
<div style="width:442px; margin-top:30px;">
<input type="radio" name="charged" class="charged_c" value="Y" <?php if($order_details['charged'] == 'Y') { ?> checked="checked" <?php } ?>/>   Charged
&nbsp;&nbsp;&nbsp;<input type="radio" name="charged" class="charged_c" value="2" <?php if($order_details['charged'] == 'N') { ?> checked="checked" <?php } ?> /> Not Charged
</div>
</div>



</form>
</div>

    <script type="text/javascript">
        $(function(){
        	$('#start_date_time').datetimepicker({
		 lang:'en',
		 timepicker:true,
		 format:'Y-m-d H:m',
		 minDate:'0'
	});
	$('#end_date_time').datetimepicker({
		 lang:'en',
		 timepicker:true,
		 format:'Y-m-d H:m',
		 minDate:'0'
	});
        
        $(".save_member").on("click",function(){
           
	var	charged		=	$.trim($("#title").val());	
	
        $("#order_form").submit();
        });
        });
    </script>

        <?php $this->load->view('admin/footer'); ?>
</body>
</html>