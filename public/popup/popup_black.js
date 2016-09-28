var popupLogin = 0;
function showpoup(bck_id,show_id)
{
	if(popupLogin ==0){
	jQuery("#"+bck_id).css({
	"opacity": "0.7"
	});
		jQuery("#"+bck_id).fadeIn("slow");
		jQuery("#"+show_id).fadeIn("slow");
	popupLogin=1;
	}
	
	var windowWidth 		 = document.body.clientWidth;
	var windowHeight		 = document.documentElement.clientHeight;		
	
	if (window.pageYOffset)
        var ScrollTop = window.pageYOffset;
		
    else
        var ScrollTop 		= (document.body.parentElement) ? document.body.parentElement.scrollTop : 0;
		
    var popupWidth1 		= jQuery("#"+show_id).width();
	var popupHeight1		= jQuery("#"+show_id).height();
	var windowHeight		= document.documentElement.clientHeight;
	var top 				= windowHeight/2-popupHeight1/2;
	
	
	
	jQuery("#"+show_id).css({
	"position": "absolute",
	/*"top": ScrollTop+top,
	"left": windowWidth/2-popupWidth1/2*/
	"top": ScrollTop+115,
	"left": windowWidth/2-popupWidth1/2
	
	});
	jQuery("#"+bck_id).css({
	"height": document.documentElement.clientHeight
	});
	jQuery("#"+bck_id).css({
	"width": windowWidth
	});
	
}

function closePopUp(bck_id,show_id)
{
jQuery("#"+bck_id).fadeOut("slow");
jQuery("#"+show_id).fadeOut("slow");
//$("#popupContact1").fadeOut("slow");
popupLogin = 0;
}