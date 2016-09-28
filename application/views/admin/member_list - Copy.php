<?php $this->load->view('admin/header'); ?>
<script src="<?php echo base_url()?>public/popup/popup_black.js"></script>
<link href="<?php echo base_url()?>public/popup/popup.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url()?>public/js/jquery.blockUI.js"></script>

<div class="bred_outer"><div class="bred_nav">

<ul>

<li><img src="<?php echo base_url()?>public/images/br_home.jpg" class="bn_home" /></li>
<li><a href="<?php echo base_url()?>admin/admin_dashboard/">Dashboard</a></li>
<li><img src="<?php echo base_url()?>public/images/br_arow.jpg" class="bn_arow" /></li>
<li><a style="color: #1a91ec;" href="<?php echo base_url()?>admin/member/">User Listing</a></li>

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

<div class="topsec"><div class="t_t"><div class="t_i"><img src="<?php echo base_url()?>public/images/listing.png"/></div>
<div class="t_c"><?php echo 'User';?>  Listing</div></div>
<!--<a href="<?php echo base_url() .'admin/member/add_new_member_data/'; ?>" class="add_btn_red">Add New User</a>-->
 </div>
<div class="wd_975"> 
  <div class="wd_975_title">
    <h3>Filter search</h3>
    
  
</div>


<form name="search_form" id="search_form" method="post" action="">
<div class="wd_975_cnt"><div class="wd_935">
<div class="form_adjplus" style="width:536px;"><label>Search</label>
    <label>
    
    <input type="text" name="key" id="key" value="<?php echo nl2br(stripslashes($key));?>"  placeholder="Search Key" class="form_med form_med" style="width:519px;" >
    </label>
</div>
<a href="javascript:void(0);" onclick="searchMember();" class="search_green">Search</a>
<a href="javascript:void(0);" class="adv_search btn_clear" style="float:left;">Clear</a>

    </div></div></form>

</div>

<div class="wd_975"><table width="975" border="0" cellspacing="0" cellpadding="15" class="listing">
  <tr>
  	<td class="td_title pdl_20" style="width:40px; text-align:center;">#</td>
    <td  class="td_title pdl_20">  Name </th>
     <td class="td_title"> Email </td>    
    <td class="td_title alc" style="width:80px;"> STATUS </td>
    <td class="td_title alc" style="width:80px;"> Edit </td>
    <td class="td_title alc" style="width:80px;"> Delete </td>
  </tr>
  <?php
  if(count($member_list)>0)
  {
           $i=0;
	  foreach($member_list as $member_list)
	  {
              $i++;
	  ?>
	  <tr>
	   <td class="td_wht txt_blue pdl_20 " style="text-align:center;"><?php echo $i+$uri_segment ;?> </td>
	<td class="td_wht pdl_20 "><a style="color: #2F7BB7; text-decoration:none;"  href="<?php echo base_url()?>admin/member/get_member_details/<?php echo $member_list['user_id']?>"><?php echo $member_list['first_name']." ".$member_list['last_name']; ?></td>
        <td class="td_wht"><?php if($member_list['email_address']) echo $member_list['email_address']; else echo $member_list['username'];?></td>
		        
        <?php
		if($member_list['active'] == 'Y')
			$act_img = base_url().'public/images/active.png';
		else
			$act_img = base_url().'public/images/in_active.png';
		?>
        
        <td class="td_wht  alc"><a href="javascript:void(0);" data-user_id="<?php echo $member_list['user_id'];?>" data-status="<?php echo $member_list['active'];?>" class="change_status"><img src="<?php echo $act_img?>" /></a></td>
        
        <td class="td_wht alc"><a href="<?php echo base_url()?>admin/member/add_new_member_data/<?php echo $member_list['user_id']?>" ><img src="<?php echo base_url() ?>public/images/edit.png" /></a></td>
        
        <td class="td_wht bdr_rno alc"><a href="javascript:void(0);" data-user_id="<?php echo $member_list['user_id']?>" class="delete_member" ><img src="<?php echo base_url()?>public/images/delete.png"  /></a></td>
	  </tr>
	  <?php
	  }
  }
  else
  {
  ?>
  <tr>
	<td colspan="9" align="center" style="color:#C03; padding-top:25px; padding-bottom:25px;"><strong>No Record Found...!</strong></td>  </tr>
  <?php
  }
  ?>
  
</table>

<?php if(count($member_list)) { ?>
<div class="wd_975_cnt">

  <div class="pagination">
  <ul>
  <?php echo $paging; ?> 
  </ul>
  </div>
  </div>
<?php } ?>  

<script language="javascript">
function searchMember()
{
	//document.search_form.submit();
	$('#search_form').submit();
	return true;
}



$(function(){


$(".btn_clear").on("click", function (e){
    e.preventDefault();
    var $this =$(this);
 $.ajax({
       url : "<?php echo base_url().'admin/member/clear'; ?>",
       success:function(data){
     	window.location.href="<?php echo base_url().'admin/member/'; ?>";
       }
    });
    });
	
	$(".delete_member").on("click",function (){
        var $this = $(this);
	$.confirm({
			'title'		: 'Delete Confirmation',
			'message'	: 'Do you want to delete this User ?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						$.ajax({ 
							type: "post",	
							url: "<?php echo base_url()."admin/member/delete_member_db";?>",
							data: {user_id:$this.data('user_id')},
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
	});
});

    $(".change_status").on("click",function(){	
    var $this =$(this);
       var cur_status = $this.data('status');

	
		var new_status = cur_status == 'Y' ? 'N' : 'Y';

		/* $.confirm({
			'title'		: 'Status Change Confirmation',
			'message'	: 'You are about to change the status.',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){ */
						
						$.ajax({ 
							type: "POST",	
							url: "<?php echo base_url()."admin/member/change_member_status";?>",
							data: {user_id:$this.data("user_id"),new_status:new_status},
							success: function( data ) { 
								
								window.location.reload();
								return true;
							}
						});
						
						
				/*	}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	
				}
			}
		});	*/
	
        });
</script>
</div>

