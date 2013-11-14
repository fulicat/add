// JavaScript Document
/*首页广告效果*/
$(function(){
     var len  = $(".banner_f_l .num > li").length;
	 var index = 0;
	 var adTimer;
	 $(".banner_f_l .num li").mouseover(function(){
		index  =   $(".banner_f_l .num li").index(this);
		showImg(index);
	 }).eq(0).mouseover();	
	 //滑入 停止动画，滑出开始动画.
	 $('.banner').hover(function(){
			 clearInterval(adTimer);
		 },function(){
			 adTimer = setInterval(function(){
			    showImg(index)
				index++;
				if(index==len){index=0;}
			  } , 3000);
	 }).trigger("mouseleave");
})
// 通过控制top ，来显示不同的幻灯片
/*
function showImg(index){
        var adHeight = $(".Middle_W .banner").height();
		$(".banner .slider").stop(true,false).animate({top : -adHeight*index},500);
		$(".banner_f_l .num li").removeClass("on")
			.eq(index).addClass("on");
}*/
function showImg(index){
	$(".banner .slider li").eq(index).fadeIn("slow").siblings("li").hide();
	$(".banner_f_l .num li").removeClass("on").eq(index).addClass("on");
}