<!--<script type="text/javascript" src="<?php //echo base_url();?>assets/ckeditor/ckeditor.js"></script>-->
<script language="javascript" src="<?php echo base_url();?>assets/js/tiny_mce/tiny_mce.js"></script>
<script language="javascript">
	tinyMCE.init({
			mode : "exact",
			elements : "email_template",
			theme : "advanced",
			plugins : "autolink,lists,pagebreak,style,layer,table,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
			theme_advanced_buttons1_add_before : "newdocument,separator",
			theme_advanced_buttons1_add : "fontselect,fontsizeselect",
			theme_advanced_buttons2_add : "separator,forecolor,backcolor,liststyle",
			theme_advanced_buttons2_add_before: "cut,copy,separator,",
			theme_advanced_buttons3_add_before : "",
			theme_advanced_buttons3_add : "media",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			extended_valid_elements : "hr[class|width|size|noshade]",
			file_browser_callback : "ajaxfilemanager",
			paste_use_dialog : false,
			theme_advanced_resizing : true,
			theme_advanced_resize_horizontal : true,
			apply_source_formatting : true,
			force_br_newlines : true,
			force_p_newlines : false,	
			relative_urls : true
		});

		function ajaxfilemanager(field_name, url, type, win) {
			var ajaxfilemanagerurl = "<?php echo base_url();?>assets/js/tinymce/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php";
			switch (type) {
				case "image":
					break;
				case "media":
					break;
				case "flash": 
					break;
				case "file":
					break;
				default:
					return false;
			}
            tinyMCE.activeEditor.windowManager.open({
                url: "<?php echo base_url();?>assets/js/tinymce/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php",
                width: 782,
                height: 440,
                inline : "yes",
                close_previous : "no"
            },{
                window : win,
                input : field_name
            });
            
	}
</script>
<div class="bred_outer">
    <div class="bred_nav">
        <ul>
            <li><img class="bn_home" src="<?php echo base_url();?>public/images/br_home.jpg"></li>
            <li><a href="<?php echo base_url();?>admin/admin_dashboard/">Dashboard</a></li>
            <li><img class="bn_arow" src="<?php echo base_url();?>public/images/br_arow.jpg"></li>
            <li><a href="<?php echo base_url();?>admin/email_template/" style="color: #1a91ec;">Email Templates</a></li>
            <li><img class="bn_arow" src="<?php echo base_url();?>public/images/br_arow.jpg"></li>
            <li>Details</li>
        </ul>
    </div>
</div>
<div class="container">   
    <div class="topsec">
    	<div class="t_t">
            <div class="t_i"><img src="<?php echo base_url()?>public/images/add_edit.png" /></div>
                <div class="t_c">Edit </div>
        </div>        
        <a class="save_btn_green" onclick="savetemplate();" href="javascript:void(0);">Save</a>
        <a class="back_btn_org" href="<?php echo base_url(); ?>admin/email_template/">Back</a>
    </div>
    <div class="wd_975">
        <div class="wd_975_title">
        <h3>Template Details</h3>
        </div>
    </div>
      <?php if(validation_errors()){ ?>   
        <div class="erroe_msg">
            <?php echo validation_errors(); ?>
         </div> 
      <?php } ?>    
    <div class="wd_975_blank">
        <div class="div_container"><div class="div_blok">
                <form name="cms" action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $cms['email_id']; ?>" />
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="td_wht">
                                        <div class="div_details_in_l">Title</div>
                            </td>
                            <td class="td_wht">
                                        <div class="div_details_in_r" style="margin-top:5px;">
                                            <input type="hidden" value="<?php echo htmlentities($cms['email_title']) ;?>" name="email_title" id="email_title"/>
                                            <?php if($cms['email_title']) : echo htmlentities($cms['email_title']); else : echo $_POST['email_title'] ; endif; ?>
                                        </div>
                            </td>       
                        </tr>
                       <!-- <tr>
                            <td class="td_wht">  
                                   <div class="div_details_in_l">Email Subject</div>
                            </td>
                            <td class="td_wht">
                                   <div class="div_details_in_r">
                                       <label>
                                           <input type="text"  name="email_subject" id="email_subject" class="form_med" style="width: 520px; height: 30px;" value="<?php //if($cms['email_subject']):echo htmlentities($cms['email_subject']);else:echo $_POST['email_subject'];endif;?>" />
                                       </label>
                                   </div>
                            </td>
                    </tr>-->
                    <tr>
                        <td class="td_wht">   
                            <div class="div_details_in_l">Email Content</div>
                        </td>
                        <td class="td_wht">
                            <div class="div_details_in_r" >
                                <textarea name="email_template" id="email_template" cols="20" rows="35" class="ckeditor" style="width:500px;">
                                    <?php if($cms['email_template']) : echo $cms['email_template']; else : echo $_POST['email_template'] ; endif;?>
                                </textarea>
                                <script type="text/javascript">
                                        var desz = document.getElementById('email_template').value;
                                        document.getElementById('email_template').value ='';
                                        document.getElementById('email_template').value = $.trim(desz);
                                </script>
                            </div>
                        </td>
                        </tr>
                    </table>
                </form>
            </div> 
        </div>
    </div>
        <?php echo $this->load->view('admin/footer'); ?>
</div>
<script type="text/javascript">
function savetemplate(){

    if($('#email_subject').val()=='')
        {
            alert('Please enter email subject..!');
            return false;
        }
    if($('#email_template').text()=='')
        {
            alert('Please enter email content..!');
            return false;
        }
    document.cms.submit();
}
</script>