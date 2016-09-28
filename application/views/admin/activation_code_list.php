
<div class="bred_outer"><div class="bred_nav">

<ul>

<li ><a href="#" ><img src="<?php echo base_url()?>public/images/br_home.jpg" class="bn_home" /></a></li>
<li><a href="<?php echo base_url()?>admin/admin_dashboard">Dashboard</a></li>
<li><img src="<?php echo base_url()?>public/images/br_arow.jpg" class="bn_arow" /></li>

<li><a style="color: #1a91ec;" href="<?php echo base_url()?>admin/activation_code">Activation Code Management</a></li>

</ul>


</div></div>


<div class="container_out"></div>
<div class="container">
<?php
if($this->session->flashdata('success'))
{
?>
	<div class="sucess_msg"><?php echo $this->session->flashdata('success');?></div>
<?php
}
?>

<?php
if($this->session->flashdata('failure'))
{
?>
	<div class="erroe_msg"><?php echo $this->session->flashdata('failure');?></div>
<?php
}
?>

<div class="topsec"><div class="t_t"><div class="t_i"><img src="<?php echo base_url()?>public/images/listing.png" /></div>
<div class="t_c">Activation Code Management</div></div>
<a href="<?php echo base_url()?>admin/activation_code/details/" class="add_btn_red">Add Activation Code </a>

 </div>
<div class="wd_975">
  <div class="wd_975_title">
    <h3>Filter search</h3>
    
  
</div>

<form name="search_form" id="search_form" method="post" action="">
    <input type="hidden" name="type" id="type" value="<?php echo $type;?>"  placeholder="Search Key" class="form_med form_med" style="width:519px;" >
 <div class="wd_975_cnt">
    <div class="wd_935">

        <div class="form_adjplus" style="width:550px;"><label style="width: 0px;">Search</label>
      <label >
        
        <select name="hotel" id="hotel" class="form_med form_med" style="width:300px; margin-top: 23px;">
            <option value="0">Select a Hotel</option>
            <?php foreach ($hotel_list as $hotel_list){ ?>
            <option <?php echo ($_REQUEST['hotel']==$hotel_list['id']) ? 'selected': ''; ?> value="<?php echo $hotel_list['id'] ?>"><?php echo $hotel_list['title'] ?></option>
           <?php } ?>
        </select>
        </label>
<label>
       <input type="text" name="key" id="key" value="<?php echo ($_REQUEST['key']) ? $_REQUEST['key'] : ''?>" placeholder="Search Key" class="form_med" style="width:200px;margin-left:10px; margin-top: 23px;" >
     </label>
</div><label>
<a href="javascript:void(0);" onClick="searchCode();" class="search_green" style="float:left;">Search</a>
<a href="javascript:void(0);" onclick="window.location.href='<?=base_url()?>admin/activation_code/index'" class="adv_search" style="float:left;">Clear</a>
</label>
    </div></div>
</div>

<div class="wd_975"><table width="975" border="0" cellspacing="0" cellpadding="15" class="listing">
  <tr>
    <td  class="td_title alc pdl_20">  Activation Code </th>
    <td class="td_title alc">Hotel</td>
     <td class="td_title alc"> Edit</td>
    <td class="td_title alc"> Delete</td>
       <td class="td_title alc"> Active</td>
  </tr>
  <?php
  if(count($activation_code_list)>0)
  {
	  foreach($activation_code_list as $val)
	  {
	  ?>
	  <tr>
	   
		<td class="td_wht txt_blue pdl_20 "><a class="txt_blue" style="text-decoration:none;" href="<?php echo base_url()?>admin/activation_code/details/<?php echo $val['activation_code_id']?>" ><?php echo $val['activation_code'] ?></a></td>
		<td class="td_wht alc"><?php echo $val['title']?></td> 	
        <td class="td_wht  alc"><a title="edit" href="<?php echo base_url()?>admin/activation_code/details/<?php echo $val['activation_code_id']?>" ><img src="<?php echo base_url()?>public/images/edit.png"  /></a></td>
        <td class="td_wht  alc"><a title="delete" href="javascript:void(0);" onclick="deleteCode(<?php echo $val['activation_code_id']?>);" ><img src="<?php echo base_url()?>public/images/delete.png"  /></a></td>
        
        <?php
		if($val['active'] == 'Y')
			$act_img = base_url().'public/images/active.png';
		else
			$act_img = base_url().'public/images/in_active.png';
		?>
        
        <td class="td_wht bdr_rno alc"><a title="active" href="javascript:void(0);" onclick="changeCodeStatus(<?php echo $val['activation_code_id']?>,'<?php echo $val['active']?>');" ><img src="<?php echo $act_img?>" /></a></td>
	  </tr>
	  <?php
	  }
  }
  else
  {
  ?>
  <tr>
  <td colspan="7" align="center" style="color:#C03"><strong>No Data Found...</strong></td>
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
function searchCode()
{
	document.search_form.submit();
	return true;
}




function deleteCode(activation_code_id)
{
	
	$.confirm({
			'title'		: 'Delete Confirmation',
			'message'	: 'Are you want to delete this member ?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						$.ajax({ 
							type: "POST",	
							url: "<?php echo base_url()."admin/activation_code/delete_activation_code";?>",
							data: {activation_code_id:activation_code_id},
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
function changeCodeStatus(activation_code_id,cur_status)
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
							url: "<?php echo base_url()."admin/activation_code/change_activation_code_status";?>",
							data: {activation_code_id:activation_code_id,new_status:new_status},
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
			url: "<?php echo base_url()."admin/activation_code/change_activation_code_status";?>",
			data: {activation_code_id:activation_code_id,new_status:new_status},
			success: function( data ) { 
				window.location.reload();
				return true;
			}
		});
	}
}



</script>

</div>
        <?php $this->load->view('admin/footer'); ?>

</body>
</html>
