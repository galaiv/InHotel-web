
<div  class="grn_bg_in">
  <div class="container">
    <h2>Management</h2>
    <div class="mnu_sty">    
    </div>
  </div>
</div>
<div class="container gbg_in">
  <div class="row">
     <ol style="margin-bottom: 5px;background-color: #f0f0f0;" class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-home"></i> </a></li>
        <li class="active">Staff Management</li>
      </ol>
   
   
    <div class="col-lg-12 portfolio-item" style="margin-bottom:40px;">
     
  <?php 
if($this->session->flashdata('success'))
{
?>
<div class="alert alert-success"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button><?php echo $this->session->flashdata('success');?></div>
<?php
}
?>

<?php
if($this->session->flashdata('failure'))
{
?>
<div class="alert alert-failure"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><?php echo $this->session->flashdata('failure');?></div>

<?php
}
?>
     
     
      <h3>Staff List
      <a class="pull-right" href="<?php echo base_url(); ?>hotel_staff/add">Add Staff</a>
     <br/> </h3>
          <div  class="staff_list">
      <table>
        <thead>
          <tr>
            <th>&nbsp;</th>
            <th>Staff </th>
            <th>Email</th>
            <th>Join Date</th>
          </tr>
        </thead>
        <tbody>
            <?php
             if(count($staff_list) > 0){
                   $i=1; 
            foreach ($staff_list as $staff_list){ ?>
          <tr>
            <td><a href="<?php echo base_url().'hotel_staff/add/'.$staff_list['user_id'] ?>"><img src="<?php echo base_url(); ?>images/edit.png" ></a></td>
            <td><?php echo $staff_list['first_name'].' '.$staff_list['last_name']; ?></td>            
          
             <td><?php echo $staff_list['email_address'];?></td>
               <td><?php echo date("d/m/Y H:i",strtotime($staff_list['join_date']));?></td>
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
     // $('body').off("click", ".pagination1 li a.paginate_button").on('click', '.pagination1 li a.paginate_button', function(e) {

  $(document).on("click",".pagination a",function(e){
        e.preventDefault();
    var url = $(this).attr("href");
$.ajax({
        url: url,
      success: function(data) {
                 //   $("#staff_list").remove();
                    $(".staff_list").html(data);
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
   $(".staff_list").html(data.html);
       $(".staff_list").before(data.message);
       }
       });
       });
});
</script>