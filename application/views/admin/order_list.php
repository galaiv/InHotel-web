<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.datetimepicker.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.datetimepicker.js"></script>
<div class="bred_outer"><div class="bred_nav">

<ul>

<li ><a href="#" ><img src="<?=base_url()?>public/images/br_home.jpg" class="bn_home" /></a></li>
<li><a href="<?=base_url()?>admin/admin_dashboard">Dashboard</a></li>
<li><img src="<?=base_url()?>public/images/br_arow.jpg" class="bn_arow" /></li>
<li><a style="color: #1a91ec;" href="<?=base_url()?>admin/order/">Order Management </a></li>
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
if($this->session->flashdata('failure'))
{
?>
	<div class="erroe_msg"><?=$this->session->flashdata('failure');?></div>
<?php
}
?>

        <div class="topsec"><div class="t_t"><div class="t_i"><img src="<?=base_url()?>public/images/listing.png" /></div>
<div class="t_c">Order Management</div></div>
 </div>
<div class="wd_975">
  <div class="wd_975_title">
    <h3>Filter search</h3>
    
  
</div>

<form name="search_form" id="search_form" method="post" action="">
   
<div class="wd_935">
<div class="wd_975_cnt"><div class="wd_935">


<div class="form_adjplus" style="width:536px;"><label>Search</label>
    <label>
        <select name="hotel" id="hotel" class="form_med form_med" style="width:200px;">
            <option value="0">Select a Hotel</option>
            <?php foreach ($hotel_list as $hotel_list){ ?>
            <option <?php echo ($_REQUEST['hotel']==$hotel_list['id']) ? 'selected': ''; ?> value="<?php echo $hotel_list['id'] ?>"><?php echo $hotel_list['title'] ?></option>
           <?php } ?>
        </select>
        <input type="text" name="from_date" id="from_date" placeholder="From Date"  class="form_med " value="<?php echo $_REQUEST['from_date'];?>" style="width:140px;margin-left:10px" >
     <input type="text" name="to_date" id="to_date" placeholder="To Date"  class="form_med " value="<?php echo $_REQUEST['to_date'];?>" style="width:140px;margin-left:10px" >
    
    <!--<input type="text" name="key" id="key" value="<?=($_REQUEST['key']) ? $_REQUEST['key'] : ''?>"  placeholder="Search Key" class="form_med form_med" style="width:519px;" >-->
    </label>
</div>
<a href="javascript:void(0);" onClick="searchOrder();" class="search_green" style="float:left;">Search</a>
<a href="javascript:void(0);" onclick="window.location.href='<?=base_url()?>admin/order/index'" class="adv_search" style="float:left;">Clear</a>

</div></div>
</div>
</div>

<div class="wd_975"><table width="975" border="0" cellspacing="0" cellpadding="15" class="listing">
  <tr>
    <td  class="td_title alc pdl_20"> Drink </td>
    <td class="td_title alc">Price</td>
	 <td class="td_title alc">Hotel</td>
     <td class="td_title alc">Room</td>
	 <td class="td_title alc">Charge</td>

   
    <td class="td_title alc"> Edit</td>
    <td class="td_title alc">Delete </td>
     <td class="td_title alc">Active </td>
  </tr>
  <?php
  if(count($order)>0)
  {
      foreach ($order as $order)
	  {
	  ?>
	  <tr>
	   
		<td class="td_wht txt_blue pdl_20 "><a class="txt_blue" style="text-decoration:none;" href="<?=base_url()?>admin/order/detail/<?=$order['id']?>"><?=$order['drink_title']?></a></td>
		<td class="td_wht alc"><span></span><?=$order['total_price']?></td> 
		<td class="td_wht alc"><span></span><?php echo $order['hotel_title'];?></td> 
				<td class="td_wht alc"><span></span><?php echo $order['room_number'];?></td> 
		<td class="td_wht alc"><span></span><?php if($order['charged'] == 'Y') echo "charged"; else echo "Not Paid"; ?></td> 

		 <td class="td_wht  alc"><a title="edit" href="<?=base_url()?>admin/order/detail/<?=$order['id']?>"><img src="<?=base_url()?>public/images/edit.png"  /></a></td>
      	
        <td class="td_wht  alc"><a title="delete" href="javascript:void(0);" onClick="deleteOrder(<?=$order['id']?>);" ><img src="<?=base_url()?>public/images/delete.png"  /></a></td>
        
        <?php
		if($order['active'] == 'Y')
			$act_img = base_url().'public/images/active.png';
		else
			$act_img = base_url().'public/images/in_active.png';
		?>
        
        <td class="td_wht bdr_rno alc"><a title="active" href="javascript:void(0);" onClick="changeOrderStatus(<?=$order['id']?>,'<?=$order['active']?>');" ><img src="<?=$act_img?>" /></a></td>
	  </tr>
	  <?php
	  }
  }
  else
  {
  ?>
  <tr>
  <td colspan="7" align="center" style="color:#C03"><strong>No Orders Found...</strong></td>
  </tr>
  <?php
  }
  ?>
  
</table>

<div class="wd_975_cnt">
  <div class="pagination">
  <ul>
  <?php echo $paging; ?> 
  </ul>
  </div>
</div>

<script language="javascript">
function searchOrder()
{
	document.search_form.submit();
	return true;
}
 


function deleteOrder(order_id)
{
	
	$.confirm({
			'title'		: 'Delete Confirmation',
			'message'	: 'Are you want to delete this order ?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						$.ajax({ 
							type: "POST",	
							url: "<?php echo base_url()."admin/order/deleteOrder";?>",
							data: {order_id:order_id},
							success: function( data ) { 
								window.location.reload();
								return true;
							}
						});
						
						
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	
				}
			}
		});
	
}
function changeOrderStatus(order_id,cur_status)
{
	if(cur_status == 'Y')
	{
		var new_status = 'N';
	
		$.confirm({
			'title'		: 'Status Change Confirmation',
			'message'	: 'You are about to change the status.',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						
						$.ajax({ 
							type: "POST",	
							url: "<?php echo base_url()."admin/order/changeOrderStatus";?>",
							data: {order_id:order_id,new_status:new_status},
							success: function( data ) { 
								window.location.reload();
								return true;
							}
						});
						
						
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	
				}
			}
		});
	}
	else
	{
		var new_status = 'Y';
		
		$.ajax({ 
			type: "POST",	
			url: "<?php echo base_url()."admin/order/changeOrderStatus";?>",
			data: {order_id:order_id,new_status:new_status},
			success: function( data ) { 
				window.location.reload();
				return true;
			}
		});
	}
}

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

</script>

</div>   
    <?php $this->load->view('admin/footer'); ?>
</body>
</html>
