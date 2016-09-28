function validatesignup()
{
	var	first_name		=	encodeURIComponent($.trim($("#first_name").val()));	
	var	last_name		=	encodeURIComponent($.trim($("#last_name").val()));
	var	email			=	$.trim($("#email").val());
	var	password		=	encodeURIComponent($.trim($("#password").val()));
	var	password2		=	encodeURIComponent($.trim($("#password2").val()));
	var	capcha			=	$.trim($("#capcha").val());
	if(first_name=='' || first_name=='First Name' || first_name=='First%20Name')
	{
		alert("Please enter First name");
		$("#first_name").focus();
		return false;
	}
	if(last_name=='' || last_name=='Last Name' || last_name=='Last%20Name')
	{
		alert("Please enter Last name");
		$("#last_name").focus();
		return false;
	}
	if(email=='' )
	{
		alert("Please enter Email");
		$("#email").focus();
		return false;
	}
	if(email != '')
	{
		var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		if (!filter.test(email)) 
		{
			alert("Please enter valid email address");
			$("#email").focus();
			return false;
		}
		$.ajax({ 
				type: "POST",	
				url: BaseURL+"signup/validate_email",
				data: {email: email},
				success: function( msg ) { 
					if(msg==false)
					{
						alert("Email address already registered.");
						$("#email").focus();
						return false;
					}
				}
			});
		
	}
	if(password=='' )
	{
		alert("Please enter Password");
		$("#password").focus();
		return false;
	}
	if(password.length < 6)
	{
		alert("Password should be minimum 6 characters");
		$("#password").focus();
		return false;
	}
	if(password2=='' )
	{
		alert("Please enter Confirm Password");
		$("#password2").focus();
		return false;
	}
	if(password!=password2 )
	{
		alert("Passwords are not matching");
		$("#password2").focus();
		return false;
	}
	if(capcha=='' )
	{
		alert("Please enter Captcha text");
		$("#capcha").focus();
		return false;
	}
	if(! $("#chk_agree").is(':checked'))
	{
  		alert("Please agree terms and conditions");
		$("#chk_agree").focus();
		return false;
	}
	//alert('submit');
	//$("#capcha").focus();
	$('#frm_signup').submit();



}