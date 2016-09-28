<?php
	session_start();
	$_SESSION['username'] = $this->session->userdata('web_user'); // Must be already set
?>
<script>
var siteurl='<?=base_url()?>';
</script>
<link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url(); ?>assets/css/chat.css" />
<!--<link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url(); ?>assets/css/screen.css" />
--><script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/chat.js"></script>
<div  class="grn_bg_in">
  <div class="container">
    <h2>Management</h2>
    <div class="mnu_sty">
    <ul>
    <li><a href="<?php echo base_url(); ?>activation_code">Aviation Codes</a></li>
     <li><a href="<?php echo base_url(); ?>access_management">Access Management</a></li>   
    </ul>
    </div>
  </div>
</div>
<div class="container gbg_in">
  <div class="row">
   
   
   
    <div class="col-lg-12 portfolio-item" style="margin-bottom:40px;">
     
     
     
     
      <h3>History
      <a class="pull-right" href="<?php echo base_url(); ?>access_management/add">Manage Access</a>
     <br/> </h3>
          <div  class="access_list">
      <table>
        <thead>
          <tr>
            <th>&nbsp;</th>
            <th>User </th>
            <th>Room Number</th>
            <th>Last Update</th>
			<th>Chat Now</th>
          </tr>
        </thead>
        <tbody>
            <?php
             if(count($access_list) > 0){
                   $i=1; 
            foreach ($access_list as $access_list){ ?>
          <tr>
            <td><a href="<?php echo base_url().'access_management/add/'.$access_list['access_master_id'] ?>"><img src="<?php echo base_url(); ?>images/edit.png" ></a></td>
            <td><?php echo $access_list['first_name'].' '.$access_list['last_name']; ?></td>            
          
             <td><?php echo $access_list['room'];?></td>
               <td><?php echo date("d/m/Y H:i",strtotime($access_list['last_update']));?></td>
			    <td><a  id="chat_<?php echo $access_list['access_master_id'];?>" onClick="javascript:chatWith('<?php echo $access_list['first_name']; ?>')">chat</a></td>
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