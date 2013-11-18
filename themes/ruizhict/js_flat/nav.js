//导航效果（兼容IE6）

$(function(){
	$(".menu").mouseenter(function(){
		$(this).parent().siblings().stop(true,true).slideDown(400);
	})
	
	$(".h_b_menuWrap").hover(function(){return false;},function(){
		$(this).stop(true,true).delay(300).slideUp("fast");
	})
})