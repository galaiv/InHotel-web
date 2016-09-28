<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.datetimepicker.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.datetimepicker.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


<div class="bred_outer"><div class="bred_nav">
        <ul>
            <li ><a href="#" ><img src="<?php echo base_url() ?>public/images/br_home.jpg" class="bn_home" /></a></li>
            <li><a href="<?php echo base_url() ?>admin/admin_dashboard">Dashboard</a></li>
            <li><img src="<?php echo base_url() ?>public/images/br_arow.jpg" class="bn_arow" /></li>

            <li><a style="color: #1a91ec;" href="<?php echo base_url() ?>admin/activation_code">Activation Code Management</a></li>
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
        <a href="javascript:void(0);"  class="save_btn_green save_activation_code">Save</a> </div>



    <div class="wd_975_blank">
        <form method="post"  name="activation_code_form" id="activation_code_form" action="" enctype="multipart/form-data">
            <input type="hidden" name="activation_code_id" id="activation_code_id" value="<?php echo $activation_code_id; ?>" />

            <div class="wd_975">
                <div class="wd_975_title"><h3>Details</h3></div>
                <div class="wd_975_cnt">
                    <div class="wd_935 mrb_10">

                        <div class="form_adj_up" ><label>Activation Code<font color="#FF0000">*</font> <a class="generate_code" href="javascript:void(0);"><i class="fa fa-key fa-lg" style="margin-left:20px" title="Generate Activation Code"></i></a> </label>
                            <input type="text" placeholder="Activation Code" name="activation_code" id="activation_code" readonly="" value="<?php echo $activation_code_details['activation_code']; ?>" class="form_med required" style="width:442px;"  />
                        </div>
                        <div class="form_adj_rte" ><label>Hotel</label>
                            <select name="hotel_id" class="form_med required" style="width:442px;" >
                                <?php foreach ($hotel_list as $hotel) { ?>
                                    <option <?php echo ($activation_code_details['hotel_id'] == $hotel['id']) ? 'selected':''; ?> value="<?php echo $hotel['id']; ?>"><?php echo $hotel['title']; ?></option>  
                                <?php } ?></select>
                        </div>


                    </div>

                 

                    <div class="wd_935 mrb_10">
                        <div class="form_adj_up" ><label>Activation Start Time<font color="#FF0000">*</font></label>
                            <input type="text"  placeholder="Activation Start Time" name="activation_start_time" id="activation_start_time" readonly="" value="<?php echo $activation_code_details['activation_start_time'] ?>" class="form_med required" style="width:442px;" />
                        </div>

                        <div class="form_adj_rte" ><label style="float:none">Activation Close Time<font color="#FF0000">*</font></label> 
                            <input type="text"  placeholder="Activation Close Time"  name="activation_close_time" id="activation_close_time" readonly="" value="<?php echo $activation_code_details['activation_close_time'] ?>" class="form_med required" style="width:442px;" />

                        </div>
                    </div>


                    <div class="wd_935 mrb_10">
                        <div class="form_adj_up" ><label>Access Start Time<font color="#FF0000">*</font></label>
                            <input type="text"  placeholder="Access Start Time" name="access_start_time" id="access_start_time" readonly="" value="<?php echo $activation_code_details['access_start_time'] ?>" class="form_med required" style="width:442px;" />
                        </div>

                        <div class="form_adj_rte" ><label style="float:none">Access Close Time<font color="#FF0000">*</font></label> 
                            <input type="text"  placeholder="Activation Close Time"  name="access_close_time" id="access_close_time" readonly="" value="<?php echo $activation_code_details['access_close_time'] ?>" class="form_med required" style="width:442px;" />

                        </div>
                    </div>

   <div class="wd_935 mrb_10">
                      <?php if($activation_code_details['activation_code_id']!=""){?>

                        <div class="form_adj_up" ><label style="float:none">Created Date</label> 
                            <input type="text"  name="created_date" id="created_date" readonly="" value="<?php echo $activation_code_details['date_time'] ?>" class="form_med required" style="width:442px;" />

                        </div>
                      <?php } ?>

                    </div>
                </div>

            </div>

        </form>
    </div>

    <script>

        $(function() {

            $(".generate_code").on("click", function() {
                $.ajax({
                    url: "<?php echo base_url(); ?>admin/activation_code/generateActivationCode",
                    type: "post",
                    data: {},
                    success: function(data) {
                        $("#activation_code").val(data);
                    }
                });
            });
            $('#activation_start_time').datetimepicker({
                lang: 'en',
                timepicker: true,
                 format: 'Y-m-d H:i',
                minDate:'0',
                step:15
		
            });
            $('#activation_close_time').datetimepicker({
                lang: 'en',
                timepicker: true,
                format: 'Y-m-d H:i',
                 minDate:'0',
                 step:15
		
            });
            $('#access_start_time').datetimepicker({
                lang: 'en',
                timepicker: true,
                format: 'Y-m-d H:i',
                 minDate:'0',
                 step:15
		
            });
            $('#access_close_time').datetimepicker({
                lang: 'en',
                timepicker: true,
                format: 'Y-m-d H:i',
                minDate:'0',
		step:15
            });
            $(".save_activation_code").on("click", function() {

                var activation_code = $.trim($("#activation_code").val());               
                var activation_start_time = $.trim($("#activation_start_time").val());
                var activation_close_time = $.trim($("#activation_close_time").val());
                var access_start_time = $.trim($("#access_start_time").val());
                var access_close_time = $.trim($("#access_close_time").val());

                if (activation_code == '')
                {
                    $("#activation_code").css("border-color", "red");
                    $("#activation_code").focus();
                    return false;
                } else {
                    $("#activation_code").css("border-color", "");
                }
              
                if (activation_start_time == '')
                {
                    $("#activation_start_time").css("border-color", "red");
                    $("#activation_start_time").focus();
                    return false;
                }
                else {
                    $("#activation_start_time").css("border-color", "");
                }
                if (activation_close_time == '')
                {
                    $("#activation_close_time").css("border-color", "red");
                    $("#activation_close_time").focus();
                    return false;
                }
                else {
                    $("#activation_close_time").css("border-color", "");
                }
                if (activation_start_time > activation_close_time)
                {
                    alert("Activation close time date must be greater than activation start time");
                    $("#activation_close_time").focus();
                    return false;
                }
                
                   if (access_start_time == '')
                {
                    $("#access_start_time").css("border-color", "red");
                    $("#access_start_time").focus();
                    return false;
                }
                else {
                    $("#access_start_time").css("border-color", "");
                }
                if (access_close_time == '')
                {
                    $("#access_close_time").css("border-color", "red");
                    $("#access_close_time").focus();
                    return false;
                }
                else {
                    $("#access_close_time").css("border-color", "");
                }
                if (access_start_time > access_close_time)
                {
                    alert("Activation close time date must be greater than activation start time");
                    $("#activation_close_time").focus();
                    return false;
                }
                
                $('#activation_code_form').submit();
            });

        });
    </script>


    <?php $this->load->view('admin/footer'); ?>
