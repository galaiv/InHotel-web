
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
		<li><a href="<?php echo base_url()?>order">Order Management</a></li>
        <li class="active">Order details</li>
      </ol>

    <div class="col-lg-12 row">
      <div class="col-md-6 portfolio-item message" style="margin-bottom:40px;">
        <h3>Order Management<br/>
        </h3>
        <div  class="">
            <div class="create_user_details">
              <div class="form-group">
                <label class="control-label" for="email">Drink</label>
                <input type="text" title="Please enter  email" <?php echo ($order_details['drink_title']!="")  ? "readonly=''" : '';?> required="" value="<?php echo ($_POST['email']) ? $_POST['email'] : $order_details['drink_title'];?>" class="form-control">
                <span class="help-block"></span> </div>
              <div class="form-group">
                <label class="control-label" for="nickname">Hotel</label>
                <input type="text" title="Please enter  nick name" required="" <?php echo ($order_details['hotel_title']!="")  ? "readonly=''" : '';?> value="<?php echo $order_details['hotel_title'];?>" name="nick_name" id="nick_name" class="form-control">
                <span class="help-block"></span> </div>
              <div class="form-group">
                <label class="control-label" for="firstname">Unit Price</label>
                <input type="text" title="Please enter  first tname" required="" <?php echo ($order_details['price']!="")  ? "readonly=''" : '';?> value="<?php echo $order_details['price'];?>" name="first_name" id="" class="form-control">
                <span class="help-block"></span> </div>
				<div class="form-group">
                <label class="control-label" for="firstname">Total Price</label>
                <input type="text" title="Please enter  first tname" required="" <?php echo ($order_details['total_price']!="")  ? "readonly=''" : '';?> value="<?php echo $order_details['total_price'];?>" name="first_name" id="" class="form-control">
                <span class="help-block"></span> </div>              
              <div class="form-group">
                <label class="control-label" for="firstname">Offered User</label>
                <input type="text" title="Please enter  first tname" required="" <?php echo ($order_details['offered_first_name']!="")  ? "readonly=''" : '';?> value="<?php echo $order_details['offered_first_name'].' '.$order_details['offered_last_name']; ?>" name="first_name" id="" class="form-control">
                <span class="help-block"></span> </div>
				<div class="form-group">
                <label class="control-label" for="firstname">Recipient</label>
                <input type="text" title="Please enter  first tname" required="" <?php echo ($order_details['recipient_first_name']!="")  ? "readonly=''" : '';?> value="<?php echo $order_details['recipient_first_name'].' '.$order_details['recipient_last_name']; ?>" name="first_name" id="" class="form-control">
                <span class="help-block"></span> </div>
              <div class="form-group">
                <label class="control-label" for="firstname">Room</label>
                <input type="text" title="Please enter  first tname" required="" <?php echo ($order_details['room_number']!="")  ? "readonly=''" : '';?> value="<?php echo $order_details['room_number']; ?>" name="first_name" id="" disabled="disabled" class="form-control">
                <span class="help-block"></span> </div>
				<div class="form-group">
                <label class="control-label" for="charge">Charge</label>
                 <select name="charge" id="charge" class="form-control">
					  <option value="Y" <?php if($order_details['charged'] == 'Y'){ ?> selected="selected" <?php } ?>>charged</option>
					  <option value="N" <?php if($order_details['charged'] == 'N'){ ?> selected="selected" <?php } ?>>Not Paid</option>
					</select>
                <span class="help-block"></span> </div>
            </div>
           <button  class="btn res_btn" onclick="sub_charg_form()"> Save</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function sub_charg_form()
{  //alert(sell.value);
var id = '<?php echo $order_details['id'];?>';
var status = $('#charge').val();//alert(status);alert(id);


$.ajax({
					url: "<?php echo base_url()?>order/changeOrderStatus",
					type: "POST",	
					data : {id:id,status:status},
					success: function(result){ 
					 window.location.href="<?php echo base_url();?>order";
					}
				});	
}
</script>
