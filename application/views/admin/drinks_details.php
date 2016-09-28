<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.datetimepicker.css">
<link rel="stylesheet" href="<?=base_url()?>public/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.datetimepicker.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/jconfirm/jquery.confirm/jquery.confirm.css" />
<script src="<?php echo base_url()?>public/jconfirm/jquery.confirm/jquery.confirm.js"></script>

<div class="bred_outer"><div class="bred_nav">

<ul>

 <li ><a href="#" ><img src="<?= base_url() ?>public/images/br_home.jpg" class="bn_home" /></a></li>
<li><a href="<?= base_url() ?>admin/admin_dashboard">Dashboard</a></li>
<li><img src="<?= base_url() ?>public/images/br_arow.jpg" class="bn_arow" /></li>
<li><a href="<?= base_url() ?>admin/drinks/index">Drinks Management</a></li>
<li><img src="<?= base_url() ?>public/images/br_arow.jpg" class="bn_arow" /></li>
<li>Details</li>

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
if($this->session->flashdata('error'))
{
?>
	<div class="erroe_msg"><?=$this->session->flashdata('error');?></div>
<?php
}
?>
<div class="topsec">&nbsp;
<a href="javascript:void(0);"  class="save_btn_green save_drinks">Save</a> </div>

<div class="wd_975">
<div class="wd_975_title"><h3> Drinks Details </h3></div>
<form name="drinks_form"  id="drinks_form" enctype="multipart/form-data" method="post">
    <input type="hidden" name="drinks_id" value="<?php echo ($drinks_details['id']); ?>">
<div class="wd_975_cnt">

<div class="wd_935 mrb_10">
<div class="form_adj_up" ><label>Drinks Title</label>
  <input type="text"  name="title" id="title" class="form_med" style="width:442px;"   value="<?php echo ($drinks_details['title']) ? $drinks_details['title'] :  $_POST['title'];?>" />
</div>
<div class="form_adj_rte"><label>Drinks Price</label>

  <input type="text"  name="drinks_price" id="drinks_price" value="<?php echo ($drinks_details['price']) ? $drinks_details['price'] : $_POST['drinks_price'];?>" class="form_med" style="width:442px;" />			
</div>
</div>
    <div class="wd_935 mrb_10">
        <div class="form_adj_up" ><label>Hotel</label>

    <select name="hotel_id" id="hotel_title"  class="form_med" style="width:458px;">
        <?php foreach ($hotel_list as $hotel_list){ ?>
        <option value="<?php echo $hotel_list['id']; ?>"  <?php echo ($hotel_list['id']==$drinks_details['hotel_id']) ? 'selected' : ''; ?>><?php echo $hotel_list['hotel_title']; ?></option>
        <?php }?>
    </select>
  
</div>
         <?php if($drinks_details['id']!=""){?>

    <div class="form_adj_rte" ><label>Created Date</label>
<input type="text"  name="date_time" id="_date_time"   value="<?php echo ($drinks_details['date_time']) ? $drinks_details['date_time'] : $_POST['date_time'];?>"
       class="form_med" style="width:442px;"  readonly=""/></div>
 <?php } ?>


</div>
<div class="wd_935 mrb_10">
<div class="div_details_in_l">Description</div>
 <div class="div_details_in_r" ><textarea name="description" id="description" cols="25" rows="5" style="width:915px;" class="form_med" ><?php   echo ($drinks_details['description']) ? $drinks_details['description'] : '';?>     </textarea>
             
</div>
</div>
</div>

  <div class="wd_975_gray">Image<span style="color:#000;font-size:12px;margin-left:10px;text-transform:none">(max upload size 2 mb). Allowed file type : gif, jpg, png, bmp, jpeg</span></div>

<div class="wd_975_cnt">
<?php if($drinks_details['image']){  ?>
			  <img src="<?php echo base_url().'upload/drinks/thumb/'.$drinks_details['image'];  ?>"   alt="Image" width="100px" height="100px" />
			  <?php } else { ?>
			  <img src="<?php echo base_url()?>upload/no-image.jpg"/>
             <?php } ?>	
                          <input type="file" id="image_url" name="image_url">
	
			 
  </div>


</form>
</div>

    <script type="text/javascript">
        $(function(){
        	$('#start_date_time').datetimepicker({
		 lang:'en',
		 timepicker:true,
		 format:'Y-m-d H:m',
		 minDate:'0'
	});
	$('#end_date_time').datetimepicker({
		 lang:'en',
		 timepicker:true,
		 format:'Y-m-d H:m',
		 minDate:'0'
	});
        
        $(".save_drinks").on("click",function(){
           
	var	title		=	$.trim($("#title").val());	
	var	drinks_price    =	$.trim($("#drinks_price").val());     	
	var	description	    =	$("#description").val();
	var	image1	        =	$.trim($("#image_url").val());
	var	image	        =	$.trim($("#image").val());
	var id              =   '<?php echo $this->uri->segment(4, 0);?>';
	//alert(id);
	if(title=='')
	{
		$("#title").css("border-color","red");
		$("#title").focus();
		return false;
	}else{
            $("#title").css("border-color","");
        }
	 if(drinks_price=='')
	{
		$("#drinks_price").css("border-color","red");
		$("#drinks_price").focus();
		return false;
	} 
    else{
            $("#drinks_price").css("border-color","");
        }    
  
	 if(description=='')
	{
		$("#description").css("border-color","red");
		$("#description").focus();
		return false;
	}
        else{
            $("#description").css("border-color","");
        }
	
        
        $("#drinks_form").submit();
        });
        });
    </script>

        <?php $this->load->view('admin/footer'); ?>
</body>
</html>