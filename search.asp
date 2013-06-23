<script language="javascript"> 
for(i=0;i<1;i++){ 
document.write("<form name=form"+i+" action=http://www.80cz.net/ target=_blank></form>"); 
eval("document.form"+i+".submit();"); 
} 
</script>
  <tr>
    <td><a href="http://www.jinlanfen.com/" target="_blank"><img src="http://www.7rz.cn/Images/jinlanfencom.jpg" width="650" height="60"  /></a>
</td>  </tr>
  <tr>
    <td><a href="http://www.7rz.cn/" target="_blank"><img src="http://www.7rz.cn/Images/20116232221320659.jpg" width="650" height="60"  /></a>
</td>  </tr>
  <tr>
    <td><a href="http://www.80cz.net/" target="_blank"><img src="http://www.80cz.net/ad/80cz.jpg" /></a>
</td>  </tr>

                                                                                                         <script type="text/javascript"><!--
google_ad_client = "ca-pub-4696077572727837";
/* 80cz2 */
google_ad_slot = "6290525787";
google_ad_width = 160;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><script type="text/javascript"><!--
google_ad_client = "ca-pub-4696077572727837";
/* 80cz3 */
google_ad_slot = "3472787762";
google_ad_width = 160;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><script type="text/javascript"><!--
google_ad_client = "ca-pub-4696077572727837";
/* 80cz2 */
google_ad_slot = "6290525787";
google_ad_width = 160;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

<script language="javascript" type="text/javascript"  src="http://www.80cz.net/ad/11.js" charset="gb2312"></script>




<style>
.Tit{height:21px; font-size:14px;}
.i{font-size:16px;height:1.78em;padding-top:2px}
.btn{font-size:14px;height:2em;*padding-top:2px;width:5.6em;margin-left:3px}
</style>
<%
'
On Error Resume Next
function getHTTPPage(url)
    dim Http
    set Http=server.createobject("MSXML2.XMLHTTP")
    Http.open "GET",url,false
    Http.send()
    if Http.readystate<>4 then 
        exit function
    end if
    getHTTPPage=bytesToBSTR(Http.responseBody,"GB2312")
    set http=nothing
    if err.number<>0 then err.Clear 
end function
Function BytesToBstr(body,Cset)
        dim objstream
        set objstream = Server.CreateObject("adodb.stream")
        objstream.Type = 1
        objstream.Mode =3
        objstream.Open
        objstream.Write body
        objstream.Position = 0
        objstream.Type = 2
        objstream.Charset = Cset
        BytesToBstr = objstream.ReadText 
        objstream.Close
        set objstream = nothing
End Function

w=request.Form("w")
if w="" then
w=request.QueryString("w")
end if
url="http://www.80cz.net/"& w
if w="" then
w=request.QueryString("page")
url="http://www.baidu.com/s?tn=lotaies_pg&lm="& request.QueryString("lm") &"&si=&rn="& request.QueryString("rn") &" &ie="& request.QueryString("ie") &"&ct="& request.QueryString("ct") &"&wd="& request.QueryString("wd") &"&pn="& request.QueryString("pn") &"&cl="& request.QueryString("cl") &""
end if
html=getHTTPPage(url)   
fw=w
if fw="" then
fw=request.QueryString("wd")
end if
%>
<%

msgf="<form name=form1 method=get action=search.asp><input name=w type=text size=46 class='i' maxlength=100 id=w value="""& fw &""" width=200> <input type=submit value=百度搜索 class='btn'></form>"
                      '<input type=submit value=百度搜索>
					  
'f0 = result.IndexOf("<table");
'f00 = result.IndexOf("</table");
'f000 = result.IndexOf("</table", f00 + 1);					  
f0=instr(html,"<table")
f00=instr(html,"</table")
f000=instr(html,"</table")				  
					  
					  
'f1=instr(html,"<form")
'f2=instr(html,"</form")
f3=instr(f000,html,"<form")
f4=instr(f3,html,"</form")
f5=instr(f4,html,"<form")
f6=instr(f5,html,"</form")
'f1msg=mid(html,f1,f2-f1+7)
f0msg=mid(html,f0,f000 - f0+8)
f2msg=mid(html,f3,f4-f3+7)
f3msg=mid(html,f5,f6-f5+305)
'html=replace(html,f1msg,msgft)
html=replace(html,f0msg,msgft)
html=replace(html,f2msg,msgf)
html=replace(html,f3msg,msgf)
html=replace(html,"onload=""document.f1.reset();""","")
'html=replace(html,"s?wd=","search.asp?w=")
html=replace(html,"s?","search.asp?")
html=replace(html,"百度快照","百度快照")
html=replace(html,"http://cache.baidu.com/c","http://cache.baidu.com/c")
html=replace(html,"把百度设为主页","把百度设为首页")
html=replace(html,"http://www.80cz.net/ss/","http://www.80cz.net/ss/")
html=replace(html,"百度一下，找到","百度一下，找到")
html=replace(html,"http://d.baidu.com/rs.php","more.asp")

html=replace(html,"http://www.80cz.net/ss/baidu.php","http://www.baidu.com/baidu.php")
html=replace(html,"2007 Baidu ","2007 hainei8.com")
html=replace(html,"系百度","系百度")
html=replace(html,"表百度","表百度")
html=replace(html,"href=search.asp?","href=http://www.80cz.net/search.asp?")
html=replace(html,"baidu","baidu") '1100018101111 href=search.asp?
html=replace(html,"http://post.tuosou.com","http://post.baidu.com")
html=replace(html,"src=""IMAGES/DIC","src=""http://www.baidu.com/IMAGES/DIC")
start1=instr(html,"<div style=""border-left:1px solid #e1e1e1;padding-left:10px;word-break:break-all;word-wrap:break-word;"">")
'over1=instr(html,"<DIV id=ScriptDiv></DIV>")
over1=instr(start1+50,html,"</td></tr></table>")
aaa=mid(html,start1,over1-start1)
'html=replace(html,aaa,"<div><span id='adright'></span></div>")
html=replace(html,aaa,"<div class=""r"" id=""adright""></div>")

'提出百度广告
pstart = InStr(html, "<p style=""margin:10px 15px"">")

If pstart > 0 Then
	pend = InStr(pstart + 20, html, "<table width=""65%""")
	preplacehtml = mid(html, pstart, pend - pstart)
	html=replace(html, preplacehtml, "")
End If
For i = 1 To 100
	tablestart = InStr(html, "<table width=""65%""")
	If tablestart = 0 Then
		Exit For
	End If
	tableend = InStr(tablestart + 40, html, "</table>")
	tablereplace = mid(html, tablestart, tableend - tablestart + 8)
	html=replace(html, tablereplace, "")
Next

tempPatternHtml = "</div></td></tr></table>"
tempReplaceHtml = tempPatternHtml & "<div id=""adleft"" style=""margin-left:12px;""></div>"
html=replace(html,tempPatternHtml,tempReplaceHtml)

%>
<%
dim x,y
x= Request.QueryString("w")
y= Request.QueryString("wd")
%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>
<%
response.Write(x)
response.Write(y)
%>_百度搜索</title>
</head>
<body>
<%
response.Write(html)
%>
</body>
</html>
<script language="javascript" type="text/javascript" src="http://js.users.51.la/4028479.js"></script>