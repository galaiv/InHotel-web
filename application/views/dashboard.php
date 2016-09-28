
<div  class="grn_bg_in">
  <div class="container">
    <h2>Dashboard</h2>
  </div>
</div>
<div class="container gbg_in">
  <div class="row">
    <div class="col-lg-12 portfolio-item" style="margin-bottom:40px;">
      <h3>WELCOME TO INHOTEL admin panel <br/></h3>
      
      
      
      
      <div class="row">
                    <div class="col-lg-2 col-md-6">
                         <a class="panel dash dash_icon1" <?php  if( (($hotel_renewed_membership['user_id'] !="") && $this->session->userdata('member_type')==2) || (($check_membership_renewed_byhotel['user_id'] !="") && $this->session->userdata('member_type')==3)   ) { ?> href="<?php echo base_url(); ?>access_management/add" <?php } ?>>
                            <h2 class="chk_mem" >Guest<br/><span class="chk_mem" >Management</span></h2>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <a class="panel dash1 dash_icon2" <?php  if( (($hotel_renewed_membership['user_id'] !="") && $this->session->userdata('member_type')==2) || (($check_membership_renewed_byhotel['user_id'] !="") && $this->session->userdata('member_type')==3)   ) { ?> href="<?php echo base_url(); ?>drinks/detail" <?php } ?>>
                            
                          <h2 class="chk_mem">Drinks<br/><span class="chk_mem">Management</span></h2>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-6">
                         <a class="panel dash dash_icon3" <?php  if( (($hotel_renewed_membership['user_id'] !="") && $this->session->userdata('member_type')==2) || (($check_membership_renewed_byhotel['user_id'] !="") && $this->session->userdata('member_type')==3)   ) { ?> href="<?php echo base_url(); ?>order" <?php }?>>
                            
                           <h2 class="chk_mem">ORDER<br/><span class="chk_mem">Management</span></h2>
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-6">
                         <a class="panel dash dash_icon3" <?php  if( (($hotel_renewed_membership['user_id'] !="") && $this->session->userdata('member_type')==2) || (($check_membership_renewed_byhotel['user_id'] !="") && $this->session->userdata('member_type')==3)   ) { ?> href="<?php echo base_url(); ?>hotel_staff/hotel_orders" <?php } ?>>
                            
                           <h2 class="chk_mem">Order<br/><span class="chk_mem">Notifications</span></h2>
                        </a>
                    </div>
                    <?php if($this->session->userdata('member_type')!=3){?>


                    
                    <div class="col-lg-2 col-md-6">
                        <a class="panel dash1 dash_icon4" <?php  if( (($hotel_renewed_membership['user_id'] !="") && $this->session->userdata('member_type')==2) || (($check_membership_renewed_byhotel['user_id'] !="") && $this->session->userdata('member_type')==3)   ) { ?> href="<?php echo base_url(); ?>hotel_staff" <?php } ?>>
                            
                           <h2 class="chk_mem">Staff<br/><span class="chk_mem">Management</span></h2>
                       </a>
                    </div>
                    <?php }?>
                    
                    <div class="col-lg-4 col-md-6">
                        <a class="panel dash dash_icon5" 
						<?php  	if( (($hotel_renewed_membership['user_id'] !="") && $this->session->userdata('member_type')==2) ) { ?>
href="<?php echo base_url(); ?>hotel_staff/settings" <?php } else if(!($check_membership_renewed_byhotel['user_id']) && $this->session->userdata('member_type')==3)  { } else { ?> href="<?php echo base_url(); ?>registration/payment" <?php }?>
>
                            
                           <h2 class="chk_mem1">Hotel <br/><span class="chk_mem1">Profile</span></h2>
                       </a>
                    </div>
                    
                    
                </div>
      
      
      
      
      
      
      
      
      
    </div>
    </div>
  <div class="col-lg-12 "><img src="images/bg.jpg" width="100%"></div>
</div>

<script type="text/javascript">
var hotel_renewed_membership  = '<?php echo $hotel_renewed_membership['user_id']; ?>';
var check_membership_renewed_byhotel  = '<?php echo $check_membership_renewed_byhotel['user_id']; ?>';
var member_type =  '<?php echo $this->session->userdata('member_type'); ?>';
   
if(!(hotel_renewed_membership) && (member_type == 2))
    $(".chk_mem").css("color", "#2c4b59");
	
if(!(check_membership_renewed_byhotel) && (member_type == 3)) { 
    $(".chk_mem").css("color", "#2c4b59"); $(".chk_mem1").css("color", "#2c4b59"); 
	}
</script>