<script type="text/javascript">
	function selectAll( status ){
		$(".checkbox").each( function() {
			$(this).attr("checked",status);
		})
	}	
	function mass_del(){
	  var i = parseInt(0);
	  var stat ='';
	  $(".checkbox").each( function() {
			stat = $(this).is(':checked'); 
			if(stat == true){
			  i++;
			}
	  })
      if(i > 0 ){
	     if(confirm('Are you sure you want to delete ?')){
		    document.mul_del.submit();
			return true;		 
		 }else{
		   return false;
		 }
	  
	  }else{
	     alert('Please select items for delete');
		 return false;
	  }	
	}
</script>
<?php 
$error = $this->session->flashdata('message');
$error_mess = $this->session->flashdata('error');
?>
<div class="bred_outer">
    <div class="bred_nav">
        <ul>
            <li><img class="bn_home" src="<?php echo base_url();?>public/images/br_home.jpg"></li>
            <li><a href="<?php echo base_url();?>admin/admin_dashboard/">Dashboard</a></li>
            <li><img class="bn_arow" src="<?php echo base_url();?>public/images/br_arow.jpg"></li>
            <li><a href="<?php echo base_url();?>admin/email_template/" style="color: #1a91ec;">Email Templates</a></li>
        </ul>
    </div>
</div>
<div class="container">
	<?php if ($error != "") { ?>
        <div class="sucess_msg">
            <?php echo $error; ?>
        </div>
    <?php } ?>
    <?php if ($error_mess != "") { ?>
        <div class="error_msg">
            <?php echo $error_mess; ?>
        </div>
    <?php } ?>
    <div class="topsec">
        <div class="t_t">
            <div class="t_i"><img src="<?php echo base_url();?>public/images/listing.png"></div>
            <div class="t_c">Email Templates</div>
        </div>
    </div>        
    <div class="wd_975">
        <table width="975" cellspacing="0" cellpadding="15" border="0" class="listing">
            <tbody>
                <tr>
                	<td class="td_title pdl_20"  style="width:41px; text-align:center">#</td>
                    <td class="td_title">Title</td>
                    <td class="td_title pdl_20" style="width:100px;">Edit</td>
                </tr>
               	<?php if (count($cms) > 0) {
                    $i = 0;
                    foreach ($cms as $row => $val) {  ++$i; ?>   
                        <tr>
                        	<td class="td_wht txt_blue pdl_20" style="text-align:center;"><?php echo $i + $this->uri->segment(4) ;?></td>                            
                            <td class="td_wht txt_blue" align="left" >
                                <a class="txt_blue" style="text-decoration: none;" href="<?php echo base_url(); ?>admin/email_template/edit_template/<?php echo $val['email_id']; ?>" class="link1"><?php echo $val['email_title']; ?></a>
                            </td>
							<td class="td_wht txt_blue pdl_20" width="30">
                                <a href="<?php echo base_url(); ?>admin/email_template/edit_template/<?php echo $val['email_id']; ?>">
                                    <img src="<?php echo base_url(); ?>public/images/view_details.png" alt="Edit" title="Edit"  />
                                </a>
                            </td>
                        </tr>
                <?php
                    }
                } else { ?>
                    <tr>
                        <td colspan="9" align="center" style="color:#C03; padding-top:25px; padding-bottom:25px;"><strong>No Records Found..!</strong></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
<?php if(count($cms)) { ?>
<div class="wd_975_cnt">
  <div class="pagination">
      <ul>
    <?php echo $this->pagination->create_links(); ?>
      </ul>
  </div>
</div>
<?php } ?>
</div>