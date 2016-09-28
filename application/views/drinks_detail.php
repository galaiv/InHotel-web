
<div  class="grn_bg_in">
    <div class="container">
        <h2>Management</h2>
        <div class="mnu_sty">
            <ul>
               <li><a href="<?php echo base_url(); ?>activation_code">Aviation Codes</a></li>
     <li><a href="<?php echo base_url(); ?>access_management">Access History</a></li>
               
            </ul>
        </div>
    </div>
</div>
<div class="container gbg_in">
    <div class="row">
<ol style="margin-bottom: 5px;background-color: #f0f0f0;" class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-home"></i> </a></li>
		<li><a href="<?php echo base_url()?>drinks">Drinks List</a></li>
        <li class="active">Drinks details</li>
      </ol>
        <div class="col-lg-12 row">



            <div class="col-md-6 portfolio-item message" style="margin-bottom:40px;">
 <?php  if($this->session->flashdata('error')){
            echo $this->session->flashdata('error');
        } 
         if($error){
    echo $error;
         }
        ?>
                <h3>Drinks Management<br/>
                </h3>
                <div  class="">
                    <form novalidate="novalidate" action="<?php echo base_url(); ?>drinks/detail" method="POST" id="drinks_form" enctype="multipart/form-data">
                     
                        <div class="create_user_details">
                            <div class="form-group">
                                <label class="control-label" for="title">Title</label>
                                <input type="text" title="Please enter your title"  required="" value="<?php echo ($_POST['title']) ? $_POST['title'] : $drinks['title'];?>" name="title" id="title" class="form-control">
                                <span class="help-block"></span> </div>



                            <div class="form-group">
                                <label class="control-label" for="price">Price</label>
                                <input type="text" title="Please enter your price" required="" value="<?php echo ($_POST['price']) ? $_POST['price'] : $drinks['price'];?>" name="price" id="price" class="form-control">
                                <span class="help-block"></span> </div>

                            <div class="form-group">
                                <label class="control-label" for="description">Description</label><textarea  title="Please enter your description" required=""  name="description" id="description" class="form-control"><?php echo ($_POST['description']) ? $_POST['description'] : $drinks['description'];?></textarea>
                                <span class="help-block"></span> </div>

                            <div class="form-group">
                                <label class="control-label" for="image">Upload Image</label>
                                <input type="file"  required="" value="<?php echo ($_POST['upload_image']) ? $_POST['upload_image'] : $drinks['upload_image'];?>" name="image_url" id="image_url" class="">
                              <?php $image = ($drinks['image']!="") ? base_url().'upload/drinks/thumb/'.$drinks['image'] : base_url().'upload/drinks/no-image.jpg';
             ?>
                                <image src="<?php echo $image; ?>"/>
                                <span class="help-block"></span> </div>
                            

                            <input type="hidden" name="drinks_id" id="drinks_id" value="<?php echo $drinks['id']; ?>"/>
                       
                   

       </div>
                        <button class="btn res_btn submit_access" type="submit">Save</button>
                    </form>
                </div>
            </div></div>








    </div>
</div>
<script>

    $(function() {
        $(".create_user_details").show();
        $(document).on("click", ".submit_access", function(e) {

            $(".alert").remove();
            e.preventDefault();
            var title = $.trim($("#title").val());
            var price = $.trim($("#price").val());
            var description = $.trim($("#description").val());
          
                if (title == '')
                {
                    $("#title").css("border-color", "red");
                    $("#title").focus();
                    return false;
                } else {
                    $("#title").css("border-color", "");
                }


                if (price == '')
                {
                    $("#price").css("border-color", "red");
                    $("#price").focus();
                    return false;
                }
                else {
                    $("#price").css("border-color", "");
                }
                if (description == '')
                {
                    $("#description").css("border-color", "red");
                    $("#description").focus();
                    return false;
                }
                else {
                    $("#description").css("border-color", "");
                }
          
     $('#drinks_form').submit();
          /*  $.ajax({
                url: "<?php echo base_url(); ?>drinks/detail",
                type: "post",
                data: $('#drinks_form').serialize(),
                dataType : "json",
                success: function(data) {  
            if(data.status==0){ 
                    $(".message").before(data.message);
            }else{ 
                window.location.href="<?php echo base_url(); ?>drinks";
          
            }
                }
            });*/
//	$('#access_management').submit();

        });


        $(".existing_user,.create_user").on("click", function() {
            var existing_user = $(this).data('existing_user')
            $.ajax({
                url: "<?php echo base_url(); ?>access_management/getExistingUserAccessDetails",
                type: "post",
                data: {access_member_id: $("#access_member").val(), existing_user: existing_user},
                success: function(data) {
                    $(".create_user_details").show();
                    $(".create_user_details").html(data);
                }
            });
        });
        $(document).on("change", "#access_member", function() {
            var access_member_id = $("#access_member option:selected").val();
            $("#access_member_id").val(access_member_id);
        });



    });






</script>
