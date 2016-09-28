<?php $this->load->view('admin/header'); ?>

<div class="bred_outer">
    <div class="bred_nav">

        <ul>

        <li><a href="#"><img class="bn_home" src="<?php echo base_url();?>public/images/br_home.jpg"></a></li>
        <li><a href="<?php echo base_url();?>admin/admin_dashboard">Dashboard</a></li>
        <li><img class="bn_arow" src="<?php echo base_url();?>public/images/br_arow.jpg"></li>
        <li><a href="<?php echo base_url();?>admin/preferences" style="color: #1a91ec;">Preferences</a></li>

        </ul>


    </div>
</div>
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

    <div class="topsec">&nbsp;
        <a class="save_btn_green" onclick="save_pref();" href="javascript:void(0);">Save</a>
        <!--<input type="submit" class="save_btn_green" name="button" id="button" value="Save"  class="form_btn"/>-->
    </div>
    <div class="wd_975">
        <div class="wd_975_title">
        <h3>Preferences</h3>
        </div>
    </div>

                     <form name="pref_form" id="pref_form" action="" method="post">
  	 <input type="hidden" name="id" value="1" />

	    <?php $i=0; foreach($preferences as $pref){?>
 	<?php if ($i==0){?>     <div class="wd_975_blank">
        <div class="div_container"><div class="div_blok"> <?php }$i++; ?>

                    <table width="100%" border="0" cellspacing="0" cellpadding="0">

                        
                        <tr>
                            <td class="td_wht" style="width:110px !important;">  
                                   <div class="div_details_in_l"><?=$pref['title']?></div>
                            </td>
                            <td class="td_wht">
                                   <div class="div_details_in_r">
                                       
                                           <input type="text" placeholder="<?=$pref['title']?>"  name="<?=$pref['field']?>" id="<?=$pref['field']?>" class="form_med" style="width: 520px; height: 30px;" value="<?=$pref['value']?>"  />
                                      
                                   </div>
                            </td>

                    </tr>
                    </table>

          <?php if ($i==3){ $i=0;?>      </div> 
        </div><?php } ?> 
		
		 <?php } ?>
                        </form>

    </div>
     

</div>


<script type="text/javascript">
function save_pref(){
		$("#pref_form").submit();
	 }
 
 
</script>

