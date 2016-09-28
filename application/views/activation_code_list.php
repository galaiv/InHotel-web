
<div  class="grn_bg_in">
  <div class="container">
    <h2>Management</h2>
    <div class="mnu_sty">
    <ul>
    <li><a href="<?php echo base_url(); ?>activation_code">Activation Codes</a></li>
     <li><a href="<?php echo base_url(); ?>access_management">Access History</a></li>
 
    </ul>
    </div>
  </div>
</div>
<div class="container gbg_in">
  <div class="row">
     <ol style="margin-bottom: 5px;background-color: #f0f0f0;" class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-home"></i> </a></li>
        <li class="active">Activation Codes</li>
      </ol>
   
   
    <div class="col-lg-12 portfolio-item" style="margin-bottom:40px;">
     
     
     
     
      <h3>History

     <br/> </h3>
          <div  class="activation_code_list">
      <table>
        <thead>
          <tr>
            <th>&nbsp;</th>
            <th>Name/Zone </th>
            <th>Activation Code </th>
            <th>Generated Date</th>
            
          </tr>
        </thead>
        <tbody>
             <?php
             if(count($activation_code_list) > 0){
                   $i=1; 
             foreach ($activation_code_list as $activation_code_list){ ?>
          <tr>
            <td><a href="<?php echo base_url().'activation_code/create/'.$activation_code_list['id'].'/'.$activation_code_list['user_id'];?>"><img src="<?php echo base_url();?>images/edit.png" ></a></td>
            <td><?php echo $activation_code_list['zone_name']; ?></td>           
             <td><?php echo $activation_code_list['activation_code'];?></td>
            
               <td><?php echo date("d/m/Y H:i",strtotime($activation_code_list['date_time']));?></td>
          </tr>
             <?php 
             $i++;
             }
             
             }else{ ?>
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
                    $(".activation_code_list").html(data);
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
   $(".activation_code_list").html(data.html);
       $(".activation_code_list").before(data.message);
       }
       });
       });
});
</script>