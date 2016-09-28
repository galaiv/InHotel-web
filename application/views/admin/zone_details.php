<?php //$this->load->view('admin/header');     ?>
<style>
    .ui-autocomplete-loading {
        background: white url('<?php echo base_url() ?>public/images/ui-anim_basic_16x16.gif') right center no-repeat;
    }
    .warning{
        border:1px solid #c50000;
    }
</style>
<script src="<?php echo base_url() ?>public/js/jquery.blockUI.js"></script>

<div class="bred_outer"><div class="bred_nav">
        <ul>
            <li ><a href="#" ><img src="<?php echo base_url() ?>public/images/br_home.jpg" class="bn_home" /></a></li>
            <li><a href="<?php echo base_url() ?>admin/admin_dashboard">Dashboard</a></li>
            <li><img src="<?php echo base_url() ?>public/images/br_arow.jpg" class="bn_arow" /></li>

            <li><a style="color: #1a91ec;" href="<?php echo base_url() ?>admin/zone">Zone Management</a></li>
            <li><img src="<?php echo base_url() ?>public/images/br_arow.jpg" class="bn_arow" /></li>
            <li>Details</li>
        </ul>
    </div></div>

<div class="container_out"></div>
<div class="container">
    <?php
    if ($this->session->flashdata('success')) {
        ?>
        <div class="sucess_msg"><?php echo $this->session->flashdata('success'); ?></div>
        <?php
    }
    ?>

    <?php
    if ($this->session->flashdata('failure')) {
        ?>
        <div class="erroe_msg"><?php echo $this->session->flashdata('failure'); ?></div>
        <?php
    }
    ?>
    <div class="topsec">&nbsp;
        <a href="javascript:void(0);"  class="save_btn_green save_zone">Save</a> </div>



    <div class="wd_975_blank">
        <form method="post"  name="zone_form" id="zone_form" action="" enctype="multipart/form-data">
            <input type="hidden" name="zone_id" id="zone_id" value="<?php echo $zone_id; ?>" />

            <div class="wd_975">
                <div class="wd_975_title"><h3>Details</h3></div>
                <div class="wd_975_cnt">
                    <div class="wd_935 mrb_10">

                        <div class="form_adj_up" ><label>Zone Name </label>
                            <input type="text" placeholder="Zone Name" name="zone_name" id="zone_name" value="<?php echo $zone_details['zone_name'] ?>" class="form_med required" style="width:442px;"  />
                        </div>
                    


                    </div>





                </div>

            </div>

        </form>
    </div>


        <script type="text/javascript">
        $(function(){
           $(".save_zone").on("click",function(){
               
               if($("#zone_name").val()==""){
                   $("#zone_name").css("border-color","red");
                   return false;
               }else{
                      $("#zone_name").css("border-color","");
               }
               $('#zone_form').submit(); 
           }); 
        });
        </script>
    <?php $this->load->view('admin/footer'); ?>
</body>
</html>