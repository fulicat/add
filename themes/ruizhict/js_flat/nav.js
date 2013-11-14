//导航效果（兼容IE6）
$(function(){
	$("#Menu_Ul li:has(div)").hover(function(){
		$(this).children("div.c").stop(true,true).slideDown(400);
	},function(){
	 	$(this).children("div.c").stop(true,true).slideUp("fast");
	});
})