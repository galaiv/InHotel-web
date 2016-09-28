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
        <li class="active">Drinks List</li>
      </ol>
   
    <div class="col-lg-12 portfolio-item message" style="margin-bottom:40px;">
        <?php if($this->session->flashdata('success')){
            echo $this->session->flashdata('success');
        } ?>
      <h3>History
           <a href="<?php echo base_url().'drinks/detail' ?>" class="pull-right">Add Drinks</a>
          <br/>
         
      </h3>
        <div  class="drinks_list">
      <table>
        <thead>
          <tr>
            <th width="5%">#</th>
            <th width="13%">Image</th>
            <th width="46%">Name</th>
            <th width="21%"> Price</th>
            <th width="6%">Edit</th>
            <th width="9%">Delete</th>
          </tr>
        </thead>
      
        <tbody>
            <?php
        if(count($drinks)>0){
        $i=1; 
            foreach ($drinks as $drinks){
                $image = ($drinks['image']!="") ? base_url().'upload/drinks/thumb/'.$drinks['image'] : base_url().'upload/drinks/no-image.jpg';
             
                ?>
          <tr>
            <td><?php echo $i+$start_index; ?></td>
            <td><img src="<?php echo $image; ?>" class="im_style"></td>

            <td><?php echo $drinks['title']; ?></td>
            <td>$<?php echo $drinks['price']; ?></td>
             <td><a href="<?php echo base_url()."drinks/detail/".$drinks['id'];?>"><img src="images/edit.png" ></a></td>
             <td><a href="#"><img src="images/delete.png" class="drink_delete" data-drinks_id="<?php echo $drinks['id']; ?>"></a></td>
          </tr>
            <?php $i++;
            
            }  } else{?>
          <tr><td colspan="6">No Records Found</td></tr>
            <?php }?>
          </tbody>
        
      </table>
      <div class="pagin">    
    <div class="pull-left"><?php echo $total_rows; ?> items | items from <?php echo $start_index+1; ?> to <?php echo --$i+$start_index;?></div>
    <nav>
        <?php echo $paging; ?>
<!--          <ul class="pagination pull-right">
            <li> <a href="#" aria-label="Previous"> <span aria-hidden="true">«</span> </a> </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li> <a href="#" aria-label="Next"> <span aria-hidden="true">»</span> </a> </li>
          </ul>-->
        </nav>
      </div>  </div>  
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
                 //   $("#drinks_list").remove();
                    $(".drinks_list").html(data);
                }
    });
       });    
       $(document).on("click",".drink_delete",function(e){
         e.preventDefault();    
       $(".alert").remove();
      $.ajax({
    url:"<?php echo base_url(); ?>drinks/deleteDrinks",
    type:"post",
       data:{drinks_id:$(this).data('drinks_id')},
       dataType: "json",
       success:function(data){ 
   $(".drinks_list").html(data.html);
       $(".message").before(data.message);
       }
       });
       });
});
</script> 

