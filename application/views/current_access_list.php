<?php

?>
<script>
var siteurl='<?=base_url()?>';
var userid='<?=$this->session->userdata('user_id');?>';
//alert(userid);exit;
</script>
<!--<script src="<?php echo base_url();?>assets/js/chat/quickblox.js"></script>
<script src="<?php echo base_url();?>assets/js/chat/app.js"></script>-->
<div  class="grn_bg_in">
  <div class="container">
    <h2>Management</h2>
    <div class="mnu_sty">
    <ul>
    <li><a href="<?php echo base_url(); ?>activation_code">Activation Codes</a></li>
     <li><a href="<?php echo base_url(); ?>access_management">Access History</a></li> 
        <li><a href="<?php echo base_url(); ?>access_management/current_access">Current Access Members</a></li>

    </ul>
    </div>
  </div>
</div>
<div class="container gbg_in">
  <div class="row">
   
       <ol style="margin-bottom: 5px;background-color: #f0f0f0;" class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-home"></i> </a></li>
        <li class="active">Current Access Members</li>
      </ol>
   
    <div class="col-lg-12 portfolio-item" style="margin-bottom:40px;">
  
     
     
     
      <h3>History
     <br/> </h3>
<form name="search_form" id="search_form" method="post" action="">

  
	
	 <a href="javascript:void(0);" onclick="window.location.href='<?=base_url()?>access_management/current_access'" class=" btn res_btn pull-right"  style="margin-left: 20px;margin-top: 0px;">Clear</a>
	 <a href="javascript:void(0);" class="btn res_btn pull-right track_status_filtr_search" style="margin-left: 20px;margin-top: 0px;">Search</a>
  <input type="text"  name="key" id="key" placeholder="User Email"  class="pull-right" autocomplete="off"  value="<?php echo $_REQUEST['key'];?>"  style="margin-left: 20px;margin-top: 0px;height: 41px;padding: 8px;"> 
</form>
      <br/>	  <br/> 

          <div  class="access_list">
      <table>
        <thead>
          <tr>
            <!--<th>&nbsp;</th>-->
            <th>User </th>
			<th>Email </th>
            <th>Room Number</th>
            <th>Last Update</th>
		<?php if($this->session->userdata('member_type') == '3')	{ ?> <th>Chat Now</th><?php } ?>
          </tr>
        </thead>
        <tbody>
            <?php
             if(count($access_list) > 0){
                   $i=1; 
            foreach ($access_list as $access_list){ ?>
          <tr>
            <!--<td><a href="<?php echo base_url().'access_management/add/'.$access_list['access_master_id'] ?>"><img src="<?php echo base_url(); ?>images/edit.png" ></a></td>-->
            <td><a href="<?php echo base_url().'access_management/add/'.$access_list['access_master_id'] ?>"><?php echo $access_list['user_first_name'].' '.$access_list['user_last_name']; ?></a></td>      <td><?php echo $access_list['email']; ?></td>            
          
             <td><?php echo ($access_list['room'])? :'--';?></td>
               <td><?php echo date("d/m/Y H:i",strtotime($access_list['last_update']));?></td>
			   <?php if($this->session->userdata('member_type') == '3')	{ ?> <td>
			   <?php if($access_list['quickblox_id'] !="" && $access_list['chat_status'] == 'Y') { ?>
			<!--<a href="<?php echo base_url(); ?>access_management/online_users?qb_id=<?php echo $access_list['quickblox_id'];?>&usrid=<?php echo $access_list['users_id'];?>">Chat</a>-->  
			   <a href="javascript:void(0);" onClick="get_chat_popup(<?php echo $access_list['quickblox_id'];?>,'<?php echo $access_list['user_first_name'].' '.$access_list['user_last_name']; ?>',<?php echo $access_list['users_id'];?>)" class="sessionButton">chat </a>
			 <?php } else {  ?> offline <?php }?>
			   </td><?php } ?>
          </tr>
            <?php
            
            $i++;
            } }else{ ?>
          <tr><td colspan="6">No Records Found</td></tr>
           <?php }?>
           
        </tbody>
      </table>
    
      <div class="pagin">
     <div class="pull-left"><?php echo $total_rows; ?> items | items from <?php echo $start_index+1; ?> to <?php echo --$i+$start_index;?></div>
    <nav>
        <?php echo $paging; ?>
        </nav>
    </div>
    </div>
    </div>
    
    
    </div>
</div>

<script>
$(function(){
    $(document).on("click",".pagination a",function(e){
        e.preventDefault();
    var url = $(this).attr("href");
$.ajax({
        url: url,
      success: function(data) {
                 //   $("#access_list").remove();
                    $(".access_list").html(data);
                }
    });
       });    
       $(document).on("click",".access_delete",function(e){
         e.preventDefault();    
       $(".alert").remove();
      $.ajax({
    url:"<?php echo base_url(); ?>access/deleteDrinks",
    type:"post",
       data:{access_id:$(this).data('access_id')},
       dataType: "json",
       success:function(data){ 
   $(".access_list").html(data.html);
       $(".access_list").before(data.message);
       }
       });
       });
	      
});
</script>
<link rel="stylesheet" href="<?php echo base_url(); ?>chat_new/css/styles.css">
	<section id="wrap" class="modal fade">
	<div class="modal-dialog modal-sm">	<div class="panel panel-primary" style="overflow:visible; height:386px;">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="opponent"></span></h3>
				<button type="button" id="logout" class="btn tooltip-title" data-toggle="tooltip" data-placement="bottom" title="Exit">
					<span class="glyphicon glyphicon-log-out"></span>
				</button>
			</div>
			<div class="modal-body" style="height:250px;">
			<div class="chat panel-body" style="height:250px;">
				<!--<ul class="chat-user-list list-group"></ul>-->
<!--					<ul class="chat-user-list list-group"><button id="getmsg" type="button" >chat</button></ul>
-->				<div class="chat-content">
					<div class="messages"></div>
					<form action="#" class="controls">
						<div class="input-group">
							<span class="uploader input-group-addon">
								<span class="glyphicon glyphicon-file"></span>
								<div class="attach"></div>
							</span>
							<input type="text" class="form-control" placeholder="Enter your message here..">
							<span class="input-group-btn">
								<button type="submit" class="sendMessage btn btn-primary">Send</button>
							</span>
						</div>
						<!--<div class="file-loading bg-warning">
							<img src="../images/file-loading.gif" alt="loading">
							Please wait.. File is loading
						</div>-->
					</form>
				</div>
			</div>
			</div>
		</div><!-- .panel -->
		</div>
	</section><!-- #wrap -->
	<?php $user_id = $this->session->userdata('user_id');?>
	<form action="#" id="loginForm" class="controls">
	<input type="hidden" name="user_id_qb" id="user_id_qb" value="<?php echo "inhotel_".$user_id ?>"/>
    <input type="hidden" name="user_pass_qb" id="user_pass_qb" value="<?php echo "inhotel_".$user_id."123" ?>"/>
<!--	<button id="sessionButton" type="button" style="display:none" >chat</button>
-->    </form>
	<input type="hidden" name="to_user_qb" id="to_user_qb" value=""/>
	<input type="hidden" name="to_user_name" id="to_user_name" value="">
	<input type="hidden" name="to_user_id" id="to_user_id" value="">


<!--	<section id="loginForm" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">One to One chat<br>
						<a href="http://quickblox.com" target="_blank"><img src="../images/qb_logo.png" alt="quickblox logo">by QuickBlox</a>
					</h3>
				</div>
				<div class="modal-body">
					<button type="button" value="Quick" class="btn btn-primary btn-lg btn-block">Sign in with Quick</button>
					<button type="button" value="Blox" class="btn btn-success btn-lg btn-block">Sign in with Blox</button>
					<div class="progress progress-striped active">
						<div class="progress-bar"></div>
					</div>
				</div>
			</div>
		</div>
	</section>-->
	 <div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width: 100%; height: 100%; margin: 0 auto;">
        <div class="modal-content" style=" background: none; box-shadow: none; border: none;height: 100%">

            <div class="modal-body" style="padding:10px 0px;text-align: center;position: relative;height: 100%">
                <div id='imageloadstatus' style="position: absolute;top:50%;left:40%"><img src="<?php echo base_url() ?>assets/images/loader.gif" alt="Uploading...."/></div>
            </div>
        </div>
    </div>
</div>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	
	<script src="<?php echo base_url(); ?>chat_new/libs/quickblox.js"></script>
	<script src="<?php echo base_url(); ?>chat_new/libs/quickblox.chat.js"></script>
	<script src="<?php echo base_url(); ?>chat_new/libs/jquery.timeago.js"></script>
	<script src="<?php echo base_url(); ?>chat_new/libs/jquery.scrollTo-min.js"></script>
	
	<script src="<?php echo base_url(); ?>chat_new/config.js"></script>
	<script src="<?php echo base_url(); ?>chat_new/js/helpers.js"></script>
	
	<script src="<?php echo base_url(); ?>chat_new/examples/chat.js"></script>
	<script type="text/javascript">
	/*$(window).load(function() {alert("fdg");
	//document.loginForm.submit();
			$("#sessionButton").trigger('click');
    });*/
	$(document).ready(function(){ 
	

	});
	function get_chat_popup(qb_id,name,user_id)
	{
		$("#to_user_qb").val(qb_id);
		$("#to_user_name").val(name);
		$("#to_user_id").val(user_id);
		//$("#sessionButton").trigger('click');
	/*	$.ajax({
		url:"<?php echo base_url(); ?>access_management/getchats",
		data:{login:$('#user_id_qb').val(),password:$('#user_pass_qb').val(),qb_id:$("#to_user_qb").val(),to_user :$("#to_user_name").val()},
		   dataType: "json",
		   success:function(data){ 
	           console.log(data);
		   }
		   });	*/
	}
	var webuser = '<?php echo $this->session->userdata('web_user');?>';
/*	function searchOrder()
{
	document.search_form.submit();
	return true;
}*/
$(function(){
	    $(document).on("click",".track_status_filtr_search",function(e){
          e.preventDefault();
          var key =$("#key").val();
          if(key==""){
              $("#key").css("border-color","red"); 
               return false;             
          }
        $.ajax({
        url: "<?php echo base_url(); ?>access_management/ajax_current_access_list",
        type:"post",
        data:{key:$.trim(key)},
      success: function(data) {
                 //   $("#access_list").remove();
                    $(".access_list").html(data);
                }
    });
        }); 

});
	</script>
