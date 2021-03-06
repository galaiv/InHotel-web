<?php //$this->load->view('admin/header'); ?>
<script src="<?php echo base_url()?>public/js/jquery.blockUI.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/jconfirm/jquery.confirm/jquery.confirm.css" />
<script src="<?php echo base_url()?>public/jconfirm/jquery.confirm/jquery.confirm.js"></script>
<div class="bred_outer"><div class="bred_nav">

<ul>

<li ><a href="#" ><img src="<?php echo base_url()?>public/images/br_home.jpg" class="bn_home" /></a></li>
<li><a href="<?php echo base_url()?>admin/admin_dashboard">Dashboard</a></li>
<li><img src="<?php echo base_url()?>public/images/br_arow.jpg" class="bn_arow" /></li>

<li><a style="color: #1a91ec;" href="<?php echo base_url()?>admin/package">Package Management</a></li>

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
<div class="t_c">Package Management</div></div>
<a href="<?php echo base_url()?>admin/package/details/" class="add_btn_red">Add Package</a>

 </div>
<div class="wd_975">
  <div class="wd_975_title">
    <h3>Filter search</h3>
    
  
</div>

<form name="search_form" id="search_form" method="post" action="">
    <input type="hidden" name="type" id="type" value="<?php echo $type;?>"  placeholder="Search Key" class="form_med form_med" style="width:519px;" >
<div class="wd_935">

<div class="wd_975_cnt"><div class="wd_935">
<div class="form_adjplus" style="width:536px;"><label>Search</label>
    <label>
    
    <input type="text" name="key" id="key" value="<?php echo ($_REQUEST['key']) ? $_REQUEST['key'] : ''?>"  placeholder="Search Key" class="form_med form_med" style="width:519px;" >
    </label>
</div>
<a href="javascript:void(0);" onclick="searchPackage();" class="search_green">Search</a>
<a href="javascript:void(0);" onclick="window.location.href='<?php echo base_url()?>admin/package/index'" class="adv_search" style="float:left;">Clear</a>

</div></div>
</div>
</div>

<div class="wd_975"><table width="975" border="0" cellspacing="0" cellpadding="15" class="listing">
  <tr>
    <td  class="td_title alc pdl_20">  Title </th>
    <td class="td_title alc">Price</td>
    <td class="td_title alc"> Duration </td>
  
    <td class="td_title alc"> Edit</td>
    <td class="td_title alc"> Delete</td>
       <td class="td_title alc"> Active</td>
  </tr>
  <?php
  if(count($package_list)>0)
  {
	  foreach($package_list as $val)
	  {
	  ?>
	  <tr>
	   
		<td class="td_wht txt_blue pdl_20 "><a class="txt_blue" style="text-decoration:none;" href="<?php echo base_url()?>admin/package/details/<?php echo $val['package_id']?>" ><?php echo $val['title'] ?></a></td>
		<td class="td_wht alc"><?php echo $val['price']?></td> 
		<td class="td_wht alc">
                    <?php echo $val['duration'] ;
                    if($val['duration_type']=='D') echo ' day(s)';
                    if($val['duration_type']=='M') echo ' month(s)';
                    if($val['duration_type']=='Y') echo ' year(s)';
                            
                            
                            ?>
                </td> 
	
        <td class="td_wht  alc"><a title="edit" href="<?php echo base_url()?>admin/package/details/<?php echo $val['package_id']?>" ><img src="<?php echo base_url()?>public/images/edit.png"  /></a></td>
        <td class="td_wht  alc"><a title="delete" href="javascript:void(0);" onclick="deleteMember(<?php echo $val['package_id']?>);" ><img src="<?php echo base_url()?>public/images/delete.png"  /></a></td>
        
        <?php
		if($val['active'] == 'Y')
			$act_img = base_url().'public/images/active.png';
		else
			$act_img = base_url().'public/images/in_active.png';
		?>
        
        <td class="td_wht bdr_rno alc"><a title="active" href="javascript:void(0);" onclick="changeMemberStatus(<?php echo $val['package_id']?>,'<?php echo $val['active']?>');" ><img src="<?php echo $act_img?>" /></a></td>
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
function searchPackage()
{
	document.search_form.submit();
	return true;
}




function deleteMember(package_id)
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
							url: "<?php echo base_url()."admin/package/delete_package";?>",
							data: {package_id:package_id},
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
function changeMemberStatus(package_id,cur_status)
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
							url: "<?php echo base_url()."admin/package/change_package_status";?>",
							data: {package_id:package_id,new_status:new_status},
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
			url: "<?php echo base_url()."admin/package/change_package_status";?>",
			data: {package_id:package_id,new_status:new_status},
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
