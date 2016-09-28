
<div class="bred_outer"><div class="bred_nav">

<ul>

<li><img src="<?php echo base_url()?>public/images/br_home.jpg" class="bn_home" /></li>
<li><a href="<?php echo base_url()?>admin/admin_dashboard/">Dashboard</a></li>
<li><img src="<?php echo base_url()?>public/images/br_arow.jpg" class="bn_arow" /></li>
<?php $heading_text =($member_type==1) ? 'User Management':(($member_type==2)? 'Hotel Management' : 'Hotel Staff Management');?>
<li><a style="color: #1a91ec;" href="<?php echo base_url()."admin/member/index/".$member_type;?>"><?php echo $heading_text; ?></a></li>

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
<div class="t_c"><?php echo $heading_text;?></div></div>
<?php
$add_text =($member_type==1) ? 'Add User':(($member_type==2)? 'Add Hotel' : 'Add Hotel Staff')
?>
<a href="<?php echo base_url() .'admin/member/detail/'.$member_type; ?>" class="add_btn_red"><?php echo $add_text; ?></a>
 </div>
<div class="wd_975"> 
  <div class="wd_975_title">
    <h3>Filter search</h3>
    
  
</div>


<form name="search_form" id="search_form" method="post" action="">
<div class="wd_975_cnt">
        <?php if($member_type==3){ ?>
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
<a href="javascript:void(0);" onClick="searchMember();" class="search_green" style="float:left;">Search</a>
<a href="javascript:void(0);" onclick="window.location.href='<?=base_url().'admin/member/index/'.$member_type?>'" class="adv_search" style="float:left;">Clear</a>
</label>
        </div><?php }else{?>
    <div class="wd_935">
        
       <div class="form_adjplus" style="width:536px;"><label>Search</label>
    <label>
    
    <input type="text" name="key" id="key" value="<?php echo ($_REQUEST['key']) ? $_REQUEST['key'] : ''?>"  placeholder="Search Key" class="form_med form_med" style="width:519px;" >
    </label>
</div>
  
        <label>
<a href="javascript:void(0);" onclick="searchMember();" class="search_green">Search</a>
<a href="<?php echo base_url().'admin/member/index/'.$member_type;?>" class="adv_search" style="float:left;">Clear</a>
        </label></div>
        <?php  }?>
    </div></div></form>



<div class="wd_975"><table width="975" border="0" cellspacing="0" cellpadding="15" class="listing">
  <tr>
  	<td class="td_title pdl_20" style="width:40px; text-align:center;">#</td>
    <td  class="td_title pdl_20">  Name </th>
     <td class="td_title"> Email </td>    
    <td class="td_title alc" style="width:80px;"> STATUS </td>
    <td class="td_title alc" style="width:80px;"> Edit </td>
    <td class="td_title alc" style="width:80px;"> Delete </td>
  </tr> 
  <?php // print_r($member_list);
  if(count($member_list)>0)
  {    
           $i=0;
	  foreach($member_list as $member_list)
	  { 
              $i++;
	  ?>
	  <tr>
	   <td class="td_wht txt_blue pdl_20 " style="text-align:center;"><?php echo $i+$_REQUEST['per_page'] ;?> </td>
	<td class="td_wht pdl_20 "><a style="color: #2F7BB7; text-decoration:none;"  href="<?php echo base_url()?>admin/member/detail/<?php echo $member_type.'/'. $member_list['user_id'];?><?php echo ($member_type==2) ? '/'. $member_list['hotel_id']: '';?>"><?php echo $member_list['first_name']." ".$member_list['last_name']; ?></td>
        <td class="td_wht"><?php if($member_list['email_address']) echo $member_list['email_address']; else echo $member_list['username'];?></td>
		        
        <?php
		if($member_list['active'] == 'Y')
			$act_img = base_url().'public/images/active.png';
		else
			$act_img = base_url().'public/images/in_active.png';
		?>
        
        <td class="td_wht  alc"><a href="javascript:void(0);" data-user_id="<?php echo $member_list['user_id'];?>" data-status="<?php echo $member_list['active'];?>" class="change_status"><img src="<?php echo $act_img?>" /></a></td>
        
        <td class="td_wht alc"><a href="<?php echo base_url()?>admin/member/detail/<?php echo $member_type.'/'. $member_list['user_id']?>" ><img src="<?php echo base_url() ?>public/images/edit.png" /></a></td>
        
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
							url: "<?php echo base_url()."admin/member/deleteMember";?>",
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
							url: "<?php echo base_url()."admin/member/changeMemberStatus";?>",
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

