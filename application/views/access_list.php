<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/jconfirm/jquery.confirm/jquery.confirm.css" />
<script src="<?php echo base_url(); ?>public/jconfirm/jquery.confirm/jquery.confirm.js"></script>
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
        <li class="active">Access History</li>
      </ol>
   
    <div class="col-lg-12 portfolio-item" style="margin-bottom:40px;">
     
     	 	 
     
      <h3>History
      <a class="pull-right" href="<?php echo base_url(); ?>access_management/add">Manage Access</a>
     <br/> </h3>
<form name="search_form" id="search_form" method="post" action="">
	
	 <a href="javascript:void(0);" onclick="window.location.href='<?=base_url()?>access_management/'" class=" btn res_btn pull-right"  style="margin-left: 20px;margin-top: 0px;">Clear</a>
	 <a href="javascript:void(0);" class="btn res_btn pull-right track_status_filtr_search" style="margin-left: 20px;margin-top: 0px;">Search</a>
  <input type="text"  name="key" id="key" placeholder="User Email" autocomplete="off"  class="pull-right"  value="<?php echo $_REQUEST['key'];?>" style="margin-left: 20px;margin-top: 0px;height: 41px;padding: 8px;"> 
</form>
      <br/> <br/> 
          <div  class="access_list">
      <table>
        <thead>
          <tr>
            <th>&nbsp;</th>
            <th>User </th>
			<th>Email </th>
            <th>Room Number</th>
            <th>Last Update</th>
          </tr>
        </thead>
        <tbody>
            <?php 
             if(count($access_list) > 0){
                   $i=1; 
            foreach ($access_list as $access_list){ ?>
          <tr>
               <?php
		if($access_list['access_master_status'] == 'Y')
			$act_img = base_url().'images/active.png';
		else
			$act_img = base_url().'images/in_active.png';
		?>
              <td><a href="javascript:" class="change_access" data-access_master_id="<?php echo $access_list['access_master_id']?>" data-access_master_status="<?php echo $access_list['access_master_status']?>" ><img src="<?php echo $act_img; ?>" ></a></td>
            <td><a href="<?php echo base_url().'access_management/add/'.$access_list['access_master_id'] ?>"><?php echo $access_list['first_name'].' '.$access_list['last_name']; ?></a></td>      <td><?php echo $access_list['email']; ?></td>            
          
             <td><?php echo ($access_list['room'])? :'--';?></td>
               <td><?php echo date("d/m/Y H:i",strtotime($access_list['last_update']));?></td>
			   
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
     $(document).on("click",".change_access",function(){
     var access_master_id = $(this).data('access_master_id');
       var cur_status = $(this).data('access_master_status');
       
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
							url: "<?php echo base_url()."access_management/change_access_status";?>",
							data: {access_master_id:access_master_id,new_status:new_status},
							success: function( data ) { 
								window.location.href="";
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
			url: "<?php echo base_url()."access_management/change_access_status";?>",
			data: {access_master_id:access_master_id,new_status:new_status},
			success: function( data ) { 
				window.location.reload();
				return true;
			}
		});
	}
     
     });  
	    $(document).on("click",".track_status_filtr_search",function(e){
          e.preventDefault();
          var key =$("#key").val();
          if(key==""){
              $("#key").css("border-color","red"); 
               return false;             
          }
        $.ajax({
        url: "<?php echo base_url(); ?>access_management/ajax_access_list",
        type:"post",
        data:{key:$.trim(key)},
      success: function(data) {
                 //   $("#access_list").remove();
                    $(".access_list").html(data);
                }
    });
        });      
});
/*function searchOrder()
{
	document.search_form.submit();
	return true;
}*/
</script>