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

            <li><a style="color: #1a91ec;" href="<?php echo base_url() ?>admin/package">Package Management</a></li>
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
        <a href="javascript:void(0);" onclick="udateMemberDetails();" class="save_btn_green">Save</a> </div>



    <div class="wd_975_blank">
        <form method="post"  name="frm_member" id="frm_member" action="" enctype="multipart/form-data">
            <input type="hidden" name="package_id" id="package_id" value="<?php echo $package_id; ?>" />

            <div class="wd_975">
                <div class="wd_975_title"><h3>Details</h3></div>
                <div class="wd_975_cnt">
                    <div class="wd_935 mrb_10">

                        <div class="form_adj_up" ><label>Title </label>
                            <input type="text" placeholder="Title" name="title" id="title" value="<?php echo $package_details['title'] ?>" class="form_med required" style="width:442px;"  />
                        </div>
                        <div class="form_adj_rte" ><label>Price</label>
                            <input type="text" placeholder="Price" name="price" id="price" value="<?php echo $package_details['price'] ?>" class="form_med required" style="width:442px;" />
                        </div>


                    </div>

                    <div class="wd_935 mrb_10">
                        <div class="form_adj_up" ><label>Duration</label>
                            <input type="text" onkeyup="this.value = this.value.replace(/[^\d]/, '')" placeholder="Duration" name="duration" id="duration" value="<?php echo $package_details['duration'] ?>" class="form_med required" style="width:442px;" />
                        </div>

                        <div class="form_adj_rte" ><label style="float:none">Duration type</label> 
                            <p style="margin-top: 12px;"> </p>
                            <input type="radio"  name="duration_type"   value="D" checked> Day

                            <input type="radio" name="duration_type" value="M" >Month

                            <input type="radio" name="duration_type" value="Y">Year
                        </div>

                    </div>

                    <div class="wd_935 mrb_10">
                        <div class="form_adj_rte" ><label>Description</label>
                            <textarea name="description" id="description" cols="" rows=""   placeholder="Description" style="width:442px;" class="form_med required"><?php echo $package_details['description'] ?></textarea>
                        </div>
                    </div>




                </div>

            </div>

        </form>
    </div>

    <script>

            function udateMemberDetails()
            {


                var intpval = 0;
                jQuery('#frm_member .required').each(function() {
                    if (jQuery(this).val() == '') {
                        jQuery(this).addClass('warning');
                        intpval = 1;

                    }
                    else {

                        jQuery(this).removeClass('warning');

                    }

                });

                if (intpval == 1) {

                    return false;
                }
                var valid = /^\d{0,9}(\.\d{0,2})?$/.test($("#price").val()),
                        valu = $("#price").val();

                if (!valid) {
                    intpval = 1;
                    jQuery(this).addClass('warning');
                    alert('Please enter a valid price');
                    return false;

                }
                else {
                    jQuery(this).removeClass('warning');
                }
                var valid = /^\d{0,9}?$/.test($("#duration").val()),
                        valu = $("#duration").val();

                if (!valid) {
                    intpval = 1;
                    jQuery(this).addClass('warning');
                    alert('Please enter a valid duration');
                    return false;

                }
                else {
                    jQuery(this).removeClass('warning');
                }



                $('#frm_member').submit();



            }

            function validateEmail($email) {
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                if (!emailReg.test($email)) {
                    return false;
                } else {
                    return true;
                }
            }

    </script>


    <?php $this->load->view('admin/footer'); ?>
</body>
</html>