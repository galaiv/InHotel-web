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
<li><a href="<?= base_url() ?>admin/feedback/index">Feedback Management</a></li>
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
<div class="topsec">&nbsp;</div>

<div class="wd_975">
<div class="wd_975_title"><h3> Feedback Details </h3></div>
<form name="feedback_form"  id="feedback_form" enctype="multipart/form-data" method="post">
    <input type="hidden" name="feedback_id" value="<?php echo ($feedback_details['id']); ?>">
<div class="wd_975_cnt">

<div class="wd_935 mrb_10">
<div class="form_adj_up" ><label>Hotel</label>
    <?php if($feedback_details['id']==""){?>
    <select name="hotel_id" id="hotel_title"  class="form_med" style="width:458px;" >
        <?php foreach ($hotel_list as $hotel_list){ ?>
        <option value="<?php echo $hotel_list['id']; ?>"  <?php echo ($hotel_list['id']==$feedback_details['hotel_id']) ? 'selected' : ''; ?>><?php echo $hotel_list['hotel_title']; ?></option>
        <?php }?>
    </select>
  <?php   } else{?>
<input type="text"  name="hotel_id"     value="<?php echo ($feedback_details['hotel_title']) ? $feedback_details['hotel_title'] :  '';?>"
        class="form_med" style="width:442px;"  readonly="readonly"/>
    <?php }?>
</div>
<div class="form_adj_rte"><label>User</label>

    <input type="text"  name="user" id="user" value="<?php echo ($feedback_details['first_name'].' '.$feedback_details['last_name'])?>" class="form_med" style="width:442px;" readonly=""/>			
</div>
</div>
    <div class="wd_935 mrb_10">
     
         <?php if($feedback_details['id']!=""){?>

    <div class="form_adj_up" ><label>Created Date</label>
<input type="text"  name="date_time" id="_date_time"   value="<?php echo ($feedback_details['date_time']) ? $feedback_details['date_time'] : $_POST['date_time'];?>"
       class="form_med" style="width:442px;"  readonly=""/></div>
 <?php } ?>


</div>
<div class="wd_935 mrb_10">
<div class="div_details_in_l">Comments</div>
 <div class="div_details_in_r" >
     <textarea name="description" id="description" cols="25" rows="5" style="width:915px;" class="form_med" readonly="" disabled="disabled"><?php echo  $feedback_details['experiance'] = urldecode (str_replace('%0A', "\r\n",$feedback_details['experiance']));?> </textarea>
             
</div>
</div>
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
        
        $(".save_feedback").on("click",function(){
           
	var	title		=	$.trim($("#title").val());	
	var	feedback_price    =	$.trim($("#feedback_price").val());     	
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
	 if(feedback_price=='')
	{
		$("#feedback_price").css("border-color","red");
		$("#feedback_price").focus();
		return false;
	} 
    else{
            $("#feedback_price").css("border-color","");
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
	
        
        $("#feedback_form").submit();
        });
        });
    </script>

        <?php $this->load->view('admin/footer'); ?>
</body>
</html>