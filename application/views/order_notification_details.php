
<div class="toperror" style="display:none;"> <img width="14" height="16" src="<?php  echo base_url()?>assets/images/error.png"> <span style="margin-top:5px; text-align:center;" id="error_data">Some Data Missing</span></div>
<div  class="grn_bg_in">
  <div class="container"> `
    <h2>Management</h2>
    <div class="mnu_sty">
      
    </div>
  </div>
</div>
<div class="container gbg_in">
  <div class="row">
  <ol style="margin-bottom: 5px;background-color: #f0f0f0;" class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-home"></i> </a></li>
		<li><a href="<?php echo base_url()?>hotel_staff/hotel_orders">Order Notification Management</a></li>
        <li class="active">Order Notification details</li>
      </ol>

    <div class="col-lg-12 row">
      <div class="col-md-6 portfolio-item message" style="margin-bottom:40px;">
        <h3>Order Notification Management<br/>
        </h3>
        <div  class="">
            <div class="create_user_details">
              <div class="form-group">
                <label class="control-label" for="email">Drink</label>
                <input type="text" <?php echo ($order_details['drink_title']!="")  ? "readonly=''" : '';?> required="" value="<?php echo $order_details['drink_title'];?>" class="form-control">
                <span class="help-block"></span> </div>              
				<div class="form-group">
                <label class="control-label" for="email">From User</label>
                <input type="text" <?php echo ($order_details['from_first_name']!="")  ? "readonly=''" : '';?> required="" value="<?php echo $order_details['from_first_name'].' '.$order_details['from_last_name'];?>" class="form-control">
                <span class="help-block"></span> </div>
				<div class="form-group">
                <label class="control-label" for="email">From Room</label>
                <input type="text" <?php echo ($order_details['from_room']!="")  ? "readonly=''" : '';?> required="" value="<?php echo $order_details['from_room'];?>" class="form-control">
                <span class="help-block"></span> </div>
				<div class="form-group">
                <label class="control-label" for="email"> To User</label>
                <input type="text" <?php echo ($order_details['to_first_name']!="")  ? "readonly=''" : '';?> required="" value="<?php echo $order_details['to_first_name'].' '.$order_details['to_last_name'];?>" class="form-control">
                <span class="help-block"></span> </div>
				<div class="form-group">
                <label class="control-label" for="email">To Room</label>
                <input type="text" <?php echo ($order_details['to_room']!="")  ? "readonly=''" : '';?> required="" value="<?php echo $order_details['to_room'];?>" class="form-control">
                <span class="help-block"></span> </div>
				<div class="form-group">
                <label class="control-label" for="email">Total Price</label>
                <input type="text" <?php echo ($order_details['total_price']!="")  ? "readonly=''" : '';?> required="" value="<?php echo $order_details['total_price'];?>" class="form-control">
                <span class="help-block"></span> </div>
				<div class="form-group">
                <label class="control-label" for="email">Quantity</label>
                <input type="text" <?php echo ($order_details['quantity']!="")  ? "readonly=''" : '';?> required="" value="<?php echo $order_details['quantity'];?>" class="form-control">
                <span class="help-block"></span> </div>              
              <div class="form-group">
                <label class="control-label" for="firstname">Date</label>
	
                <input type="text"  required="" <?php echo ($order_details['date_time']!="")  ? "readonly=''" : '';?> value="
<?php echo date("M j, Y g:i a",strtotime($order_details['date_time']));?>" class="form-control">
                <span class="help-block"></span> </div>
              
            </div>
           <a href="<?php echo base_url()?>hotel_staff/hotel_orders"  class="btn res_btn"> Back</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
</script>
