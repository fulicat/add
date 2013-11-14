$(function(){
    $('.tool_tab ul li').each(function(index, element) {
        $(this).click(function(){
            $(this).addClass('cur_tool').siblings('li').removeClass();
            $('.tool_con').eq($(this).index()).show().siblings('.tool_con').hide();
        });
    });;
});

function chk()
{
var tel = document.all("phone").value;

if(/^13\d{9}$/g.test(tel)|| (/^18\d{9}$/g.test(tel)) || (/^15\d{9}$/g.test(tel)))
        {;
              return true;
         }
else
        {
           alert("ÊÖ»úºÅ´íÎó");
           return false;
         }
}