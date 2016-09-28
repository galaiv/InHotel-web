<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.datetimepicker.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.datetimepicker.js"></script>

<div class="bred_outer"><div class="bred_nav">
        <ul>
            <li ><img src="<?php echo base_url() ?>public/images/br_home.jpg" class="bn_home" /></li>
            <li><a href="<?php echo base_url() ?>admin/admin_dashboard/">Dashboard</a></li>
            <li><img src="<?php echo base_url() ?>public/images/br_arow.jpg" class="bn_arow" /></li>
            <?php $heading_text = ($member_type == 1) ? 'User Management' : (($member_type == 2) ? 'Hotel Management' : 'Hotel Staff Management'); ?>
            <li><a href="<?php echo base_url() . "admin/member/index/" . $member_type ?>"><?php echo $heading_text; ?></a></li>
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
    if ($this->session->flashdata('error')) {
        ?>
        <div class="erroe_msg"><?php echo $this->session->flashdata('error'); ?></div>
        <?php
    }
    if (validation_errors()) {
        ?>

        <div class="erroe_msg"><?php echo validation_errors(); ?></div>
    <?php }
    ?>
    <div class="topsec">&nbsp;<div class="t_t"><div class="t_i"><img src="<?php echo base_url() ?>public/images/add.png" /></div>

            <div class="t_c">Add / Edit</div>

        </div>
        <a href="#"  class="save_btn_green save_member">Save</a> </div>
    <div class="wd_975_blank">
        <form method="post" name="frm_member" id="frm_member" action="" enctype="multipart/form-data">
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $member_details['user_id']; ?>" />
            <div class="wd_975">
                <div class="wd_975_title"><h3> HOTEL DETAILS</h3></div>
                <div class="wd_975_cnt">


                    <div class="wd_935 mrb_10">   
                        <div class="form_adj_up" ><label>Email Address<font color="#FF0000">*</font></label>
                            <input type="text" placeholder="Email Address" name="email_address" id="email_address" value="<?php echo ($_POST['email_address'] != '') ? $_POST['email_address'] : $member_details['email_address'] ?>" class="form_med" style="width:442px;"/>
                        </div>
                        <div class="form_adj_rte" ><label>ARB Transaction ID</label>
                            <input type="text" placeholder="ARB Transaction ID" name="transcation_id" id="transcation_id" value="<?php echo ($_POST['transcation_id']) ? $_POST['nick_name'] : $member_details['transaction_id'] ?>"  disabled="disabled" class="form_med" style="width:442px;" />
                        </div>
                    </div>
                    <?php if ($member_details['user_id'] == "") { ?>
                        <div class="wd_935 mrb_10">   
                            <div class="form_adj_up" ><label>Password<font color="#FF0000">*</font></label>
                                <input type="password" placeholder="Password" name="password" id="password" value="<?php echo $member_details['password'] ?>" class="form_med" style="width:442px;" />
                            </div>
                            <div class="form_adj_rte" ><label>Confirm Password<font color="#FF0000">*</font></label>
                                <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" value="<?php echo $member_details['confirm_password'] ?>" class="form_med" style="width:442px;" />
                            </div>
                        </div>
                    <?php } ?>
                    <div class="wd_935 mrb_10">   
                        <div class="form_adj_up" ><label>First Name<font color="#FF0000">*</font></label>
                            <input type="text" placeholder="First Name" name="first_name" id="first_name" value="<?php echo ($_POST['first_name']) ? $_POST['first_name'] : $member_details['first_name'] ?>" class="form_med" style="width:442px;" />
                        </div>
                        <div class="form_adj_rte" ><label>Last Name<font color="#FF0000">*</font></label>
                            <input type="text" placeholder="Last Name" name="last_name" id="last_name" value="<?php echo ($_POST['last_name']) ? $_POST['last_name'] : $member_details['last_name'] ?>" class="form_med" style="width:442px;" />
                        </div>
                    </div>
<!--                    <div class="wd_935 mrb_10">   

                        <div class="form_adj_up" ><label>Gender<font color="#FF0000">*</font></label>
                            <select name="gender" id="gender"  class="form_med" style="width:457px;">
                                <option value="">Select Gender</option>
                                <option value="M" <?php echo ($_POST['gender'] == 'M') ? 'selected' : (($member_details['gender'] == 'M') ? 'selected' : ''); ?>>Male</option>
                                <option value="F"  <?php echo ($_POST['gender'] == 'F') ? 'selected' : (($member_details['gender'] == 'F') ? 'selected' : ''); ?>>Female</option>
                            </select>  </div>
                        <div class="form_adj_rte" ><label>Birth Date<font color="#FF0000">*</font></label>
                            <input type="text" placeholder="Birth Date" name="dob" id="dob" value="<?php echo ($_POST['dob']) ? $_POST['dob'] : $member_details['dob'] ?>" class="form_med" style="width:442px;" />
                        </div>
                    </div>-->
                    <div class="wd_935 mrb_10">   

                        <div class="form_adj_up" ><label>Title<font color="#FF0000">*</font></label>
                            <input type="text" placeholder="Title" name="title" id="title" value="<?php echo ($_POST['title']) ? $_POST['title'] : $member_details['title'] ?>" class="form_med" style="width:442px;" />
                        </div>
                        <div class="form_adj_rte" ><label>Website<font color="#FF0000"></font></label>
                            <input type="text" placeholder="Website" name="website" id="website" value="<?php echo ($_POST['website']) ? $_POST['website'] : $member_details['website'] ?>" class="form_med" style="width:442px;" />
                        </div>
                    </div>

                    <div class="wd_935 mrb_10">   

                        <div class="form_adj_up" ><label>City<font color="#FF0000">*</font></label>
                            <input type="text" placeholder="City" name="city" id="city" value="<?php echo ($_POST['city']) ? $_POST['city'] : $member_details['city'] ?>" class="form_med" style="width:442px;" />
                        </div>
                        <div class="form_adj_rte" ><label>Address<font color="#FF0000">*</font></label>
                            <input type="text" placeholder="Address" name="address" id="address" value="<?php echo ($_POST['address']) ? $_POST['address'] : $member_details['address'] ?>" class="form_med" style="width:442px;" />
                        </div>
                    </div>
                    <div class="wd_935 mrb_10">   

                        <div class="form_adj_up" ><label>Contact Number<font color="#FF0000">*</font></label>
                            <input type="text" placeholder="Contact Number" name="contact_no" id="contact_no" value="<?php echo ($_POST['contact_no']) ? $_POST['contact_no'] : $member_details['contact_number'] ?>" class="form_med" style="width:442px;" />
                        </div>
						  <div class="form_adj_rte" ><label>Zipcode<font color="#FF0000">*</font></label>
                            <input type="text" placeholder="Zipcode" name="zipcode" id="zipcode" value="<?php echo ($_POST['zipcode']) ? $_POST['zipcode'] : $member_details['zipcode'] ?>" class="form_med" style="width:442px;" />
                        </div>
						 <!--<div class="form_adj_rte" ><label>Package<font color="#FF0000">*</font></label>
                           
							<select class="form_med" name="package_id" id="package_id" style="width:442px;" <?php if($member_details['package_id'] != 0) { ?> disabled <?php } ?>>
			<option value="0">Select Package</option> 
            <?php foreach($packages as $val)
					{?>
             <option  <?php if($val['package_id'] == $member_details['package_id']) { ?> selected <?php } ?> value="<?php echo $val['package_id'];?>" title="<?php echo $val['price'];?>">
			 
			 <?php echo $val['title']." ("; 
			 if($val['duration_type'] == 'D') { echo $val['duration']." Days) -- $".$val['price']; } 
			 else if($val['duration_type'] == 'M') { echo $val['duration']." Months) -- $".$val['price']; } 
			 else {echo $val['duration']." Years) -- $".$val['price']; }
			 ?></option>
              <?php }?>duration                                        
             </select>
                        </div>-->

                    </div>
                    <div class="wd_935 mrb_10">
                        <div class="div_details_in_l">Short Description</div>
                        <div class="div_details_in_r" ><textarea name="short_description" id="short_description" cols="25" rows="3" style="width:915px;" class="form_med" ><?php echo ($_POST['short_description']) ? $_POST['short_description'] : $member_details['short_description']; ?>     </textarea>

                        </div>
                    </div>
                    <div class="wd_935 mrb_10">
                        <div class="div_details_in_l">Description</div>
                        <div class="div_details_in_r" ><textarea name="description" id="description" cols="25" rows="5" style="width:915px;" class="form_med" ><?php echo ($_POST['description']) ? $_POST['description'] : $member_details['description']; ?>     </textarea>

                        </div>
                    </div>
                    <input type="hidden" name="member_type" value="<?php echo $member_type; ?>"/>
                    <input type="hidden" name="hotel_id" value="<?php echo $member_details['hotel_id']; ?>"/>

                </div>


                <div class="wd_975_gray">Image<span style="color:#000;font-size:12px;margin-left:10px;text-transform:none">(max upload size 2 mb). Allowed file type : gif, jpg, png, bmp, jpeg</span></div>

                <div class="wd_975_cnt">
                    <?php if ($member_details['image']!="") { ?>
                        <img src="<?php echo base_url() . 'upload/hotel/thumb/' . $member_details['image']; ?>"   alt="Image" width="100px" height="100px" />
                    <?php } else { ?>
                        <img src="<?php echo base_url() ?>upload/no-image.jpg"/>
                    <?php } ?>	
                    <input type="file" id="image_url" name="image_url">


                </div>
            </div>
        </form>
    </div>




    <script>
        function isNumberKey(e)
        {

            if ((e.which > 47 && e.which < 58) || (e.which > 42 && e.which < 47) || (e.which == 32) || (e.which == 8) || (e.which == 0))
                return true;

            return false;
        }

        $(function() {
            $(".save_member").on("click", function() {

                var email_address = $.trim($("#email_address").val());
                var password = $.trim($("#password").val());
                var confirm_password = $.trim($("#confirm_password").val());
                var first_name = $("#first_name").val();
                var last_name = $.trim($("#last_name").val());
                var nick_name = $.trim($("#nick_name").val());
                var gender = $.trim($("#gender").val());
                var dob = $.trim($("#dob").val());

                var title = $.trim($("#title").val());
                var city = $.trim($("#city").val());
                var address = $.trim($("#address").val());
                var contact_no = $.trim($("#contact_no").val());
				var zipcode = $.trim($("#zipcode").val());
                var id = '<?php echo $this->uri->segment(4, 0); ?>';
                var user_id = $('#user_id').val();
                //alert(id);
                if (email_address == '')
                {
                    $("#email_address").css("border-color", "red");
                    $("#email_address").focus();
                    return false;
                } else {
                    $("#email_address").css("border-color", "");
                }
              /*   if (nick_name == '')
                {
                    $("#nick_name").css("border-color", "red");
                    $("#nick_name").focus();
                    return false;
                }
                else {
                    $("#nick_name").css("border-color", "");
                }*/
                if (user_id == "") {
                    if (password == '')
                    {
                        $("#password").css("border-color", "red");
                        $("#password").focus();
                        return false;
                    }
                    else {
                        $("#password").css("border-color", "");
                    }

                    if (confirm_password == '')
                    {
                        $("#confirm_password").css("border-color", "red");
                        $("#confirm_password").focus();
                        return false;
                    }
                    else {
                        $("#confirm_password").css("border-color", "");
                    }
                    if (password != confirm_password)
                    {
                        $("#password").css("border-color", "red");
                        $("#confirm_password").css("border-color", "red");
                        $("#confirm_password").focus();
                        return false;
                    }
                    else {
                        $("#password").css("border-color", "");
                        $("#confirm_password").css("border-color", "");
                    }
                }
                if (first_name == '')
                {
                    $("#first_name").css("border-color", "red");
                    $("#first_name").focus();
                    return false;
                }
                else {
                    $("#first_name").css("border-color", "");
                }
                if (last_name == '')
                {
                    $("#last_name").css("border-color", "red");
                    $("#last_name").focus();
                    return false;
                }
                else {
                    $("#last_name").css("border-color", "");
                }
               
               
                
                 if (title == '')
                {
                    $("#title").css("border-color", "red");
                    $("#title").focus();
                    return false;
                }
                else {
                    $("#title").css("border-color", "");
                }
                 if (city == '')
                {
                    $("#city").css("border-color", "red");
                    $("#city").focus();
                    return false;
                }
                else {
                    $("#city").css("border-color", "");
                }
                 if (address == '')
                {
                    $("#address").css("border-color", "red");
                    $("#address").focus();
                    return false;
                }
                else {
                    $("#address").css("border-color", "");
                }
                 if (contact_no == '')
                {
                    $("#contact_no").css("border-color", "red");
                    $("#contact_no").focus();
                    return false;
                }
                else {
                    $("#contact_no").css("border-color", "");
                }
				if (zipcode == '')
                {
                    $("#zipcode").css("border-color", "red");
                    $("#zipcode").focus();
                    return false;
                }
                else {
                    $("#zipcode").css("border-color", "");
                }
				
                $('#frm_member').submit();

            });
            $('#dob').datetimepicker({
                lang: 'en',
                timepicker: false,
                format: 'Y-m-d',
               
                //   minDate: '0',
            });
        });






    </script>
