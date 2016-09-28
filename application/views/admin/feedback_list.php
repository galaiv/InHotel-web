
<div class="bred_outer"><div class="bred_nav">

<ul>

<li ><a href="#" ><img src="<?=base_url()?>public/images/br_home.jpg" class="bn_home" /></a></li>
<li><a href="<?=base_url()?>admin/admin_dashboard">Dashboard</a></li>
<li><img src="<?=base_url()?>public/images/br_arow.jpg" class="bn_arow" /></li>
<li><a style="color: #1a91ec;" href="<?=base_url()?>admin/feedback/">Feedback Management </a></li>
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
<div class="t_c">Feedback Management</div></div>

 </div>
<div class="wd_975">
  <div class="wd_975_title">
    <h3>Filter search</h3>
    
  
</div>

<form name="search_form" id="search_form" method="post" action="">
   
<div class="wd_935">
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
<a href="javascript:void(0);" onClick="searchFeedback();" class="search_green" style="float:left;">Search</a>
<a href="javascript:void(0);" onclick="window.location.href='<?=base_url()?>admin/feedback/index'" class="adv_search" style="float:left;">Clear</a>
</label>
</div>
</div>
</div>
</div>

<div class="wd_975"><table width="975" border="0" cellspacing="0" cellpadding="15" class="listing">
  <tr>
    <td  class="td_title alc pdl_20">  User </th>
	    <td  class="td_title alc pdl_20">  Hotel </th>
    <td class="td_title alc">Feedbacks</td>    
	 <td class="td_title alc">Date</td>
	
    <td class="td_title alc"> </td>
  </tr>
  <?php
  if(count($feedback)>0)
  {
      foreach ($feedback as $feedback)
	  {
	  ?>
	  <tr>
	   
		<td class="td_wht  pdl_20 "><?=$feedback['first_name'].' '.$feedback['last_name']?></td>
		<td class="td_wht alc"><span></span><?php echo $feedback['hotel_title'];?></td> 
		<td class="td_wht alc txt_blue"><span></span>
		<a class="txt_blue" style="text-decoration:none;" href="<?=base_url()?>admin/feedback/detail/<?=$feedback['id']?>">
		<?php   $text = urldecode ($feedback['experiance']);
                               $text = str_replace('%0A', "\r\n",$text);
			echo substr(htmlentities($text), 0, 35); ?>
                          <?php if(strlen($feedback['experiance'])>35){?>
                          ...
                          <?php }?></a>
		</td>                
		<td class="td_wht alc"><span></span><?php echo date("M j, Y g:i a",strtotime($feedback['date_time']));?></td> 
			
        <td class="td_wht  alc"><a title="delete" href="javascript:void(0);" onClick="deleteFeedback(<?=$feedback['id']?>);" ><img src="<?=base_url()?>public/images/delete.png"  /></a></td>
        
       
       </tr>
	  <?php
	  }
  }
  else
  {
  ?>
  <tr>
  <td colspan="7" align="center" style="color:#C03"><strong>No Feedbacks Found...</strong></td>
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
function searchFeedback()
{
	document.search_form.submit();
	return true;
}
 


function deleteFeedback(feedback_id)
{
	
	$.confirm({
			'title'		: 'Delete Confirmation',
			'message'	: 'Are you want to delete this feedback ?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						$.ajax({ 
							type: "POST",	
							url: "<?php echo base_url()."admin/feedback/deleteFeedback";?>",
							data: {feedback_id:feedback_id},
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



</script>

</div>   
    <?php $this->load->view('admin/footer'); ?>
</body>
</html>
