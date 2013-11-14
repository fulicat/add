// JavaScript Document
/*通知公告*/
$(function(){
		var $this = $(".Noctice");
		scrollFn($this);
		var $scroll_dl = $("#scroll_dl");
		scrollFn1($scroll_dl);
        
});

function scrollFn(obj){
		var $this = obj;
		var scrollTimer;
		$this.hover(function(){
			  clearInterval(scrollTimer);
		 },function(){
		   scrollTimer = setInterval(function(){
						 scrollNews( $this );
					}, 3000 );
		}).trigger("mouseleave");


}
function scrollFn1(obj){
		var $this = obj;
		var scrollTimer;
		$this.hover(function(){
			  clearInterval(scrollTimer);
		 },function(){
		   scrollTimer = setInterval(function(){
						 scrollNews1( $this );
					}, 2000 );
		}).trigger("mouseleave");


}
function scrollNews(obj){
   var $self = obj.find("dd:first"); 
   var lineHeight = $self.find("a:first").height(); //获取行高
   $self.animate({ "marginTop" : -lineHeight +"px" }, 500 , function(){
         $self.css({"marginTop":0}).find("a:first").appendTo($self); //appendTo能直接移动元素
   })
}

/**/
function scrollNews1(obj){
   var $self = obj.find("dd:first"); 
   var lineHeight = $self.find("p:first").height(); //获取行高
   $self.animate({ "marginTop" : -lineHeight +"px" }, 500 , function(){
         $self.css({"marginTop":0}).find("p:first").appendTo($self); //appendTo能直接移动元素
   })
}