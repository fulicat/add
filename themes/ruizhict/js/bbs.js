function E(elementid)
{  
	var obj;
	try
	{
		obj = document.getElementById(elementid);
	}
	catch (err)
	{
		alert(elementid+" NOT Found!","System");
	}
	return obj;
}
function getE(elementid){
	return E(elementid);
}
function setDisplays(es,s){
	for(var n=0;n<es.length;n++){
		if(E(es[n])){
			E(es[n]).style.display = ((s[n])?"":"none");
		}
	}
}
function setDisplay(e,s){
	if(E(e)){
		E(e).style.display = (s?"":"none");
	}
}

function getV(oid){
	try{
		var v = E(oid).value;
		if(v==null){
			return "";
		}
		return v;
	}catch(err){
		return "";
	}
}

function trim(str){
	return str.replace(/(^\s*)|(\s*$)/g, "");
}

function getTimer(){
	return (new Date()).getTime();
}

function getRadioValue(rName)
{
	var rObj = document.getElementsByName(rName);
	for ( var i=0; i<rObj.length; i++ )
	{
		if ( rObj[i].checked )
		{
			return rObj[i].value;
		}
	}
	return null;
}

function setRadioValue(rName , val)
{
	var rObj = document.getElementsByName(rName);
	for ( var i=0; i<rObj.length; i++ )
	{
			rObj[i].checked = rObj[i].value == val;
	}
	return null;
}

function setRadioCheck(rName , val)
{
	setRadioValue(rName , val);
}


function setSelect(eid,evalue)
{
	var sObj = E(eid);
	if(!sObj){
		return;
	}
	for ( var i=0; i<sObj.length; i++ )
	{
		if ( sObj[i].value==evalue )
		{
			sObj[i].selected = true;
		}
	}
}

function setSelectList(objid, arrayvar, arrvalue)
{
	var objlen = E(objid).options.length;
	if ( arrvalue==null )
	{
		arrvalue = new Array();
		for ( var j=0; j<arrayvar.length; j++ )
		{
			arrvalue[j] = j+1;
		}
	}	
	
	for ( var i=0+objlen,x=0; i<arrayvar.length+objlen; i++,x++ )
	{
		//option begin at 0
		
		if(arrayvar[x]=="")
		{
			i--;
			objlen--;
		}
		else
		{
			E(objid).options[i] = new Option(arrayvar[x],arrvalue[x]); //value begin at 1
		}
	}
}


function removeAllOptions(objid)
{
	var obj = E(objid);
	var browsernum = checkBrowser();
	if ( browsernum==2 || browsernum == 3) //firefox and google
	{
		obj.length = 0;
	}
	else
	{
		try
		{
			while(obj.options[0] != null)
			{
				obj.options.removeChild(obj.options[0]);  
			}
		}
		catch(err)
		{
		}
	}
}

	function checkBrowser()
	{		
		if ( navigator.bbsAgent.indexOf("MSIE")>0 )
			return 1;
		if ( isFirefox=navigator.bbsAgent.indexOf("Firefox")>0 )
			return 2;
		if ( isSafari=navigator.bbsAgent.indexOf("Safari")>0 ) //google
			return 3;
		if ( isCamino=navigator.bbsAgent.indexOf("Camino")>0 )
			return 4;
		if ( isMozilla=navigator.bbsAgent.indexOf("Gecko/")>0)
			return 5;
		return 0;
	}
	
	RegExp.escape = function(text) {
	  if (!arguments.callee.sRE) {
	    var specials = [
	      '/', '.', '*', '+', '?', '|',
	      '(', ')', '[', ']', '{', '}', '\\'
	    ];
	    arguments.callee.sRE = new RegExp(
	      '(\\' + specials.join('|\\') + ')', 'g'
	    );
	  }
	  return text.replace(arguments.callee.sRE, '\\$1');
	}
	
	function urlEncode(str){
		return encodeURIComponent(str);
	}
	
	function debugObj(obj) { 
	   var props = ""; 
	    for(var p in obj){  
	       if(typeof(obj[p])=="function"){  
	           obj[p](); 
	       }else{  
	           props+= p + "=" + obj[p] + "\t"; 
	       }  
	   }  
	  alert(props); 
	} 
	
	function onRun(fun, run_stop_cond, stop_cond){
		var timeout=30000;
		var timeper = 250;
		var timecounter=0;
		var t=window.setInterval(
			function(){
				//E("debugstr").innerHTML+=".";
				timecounter+=timeper;
				if(stop_cond()||timecounter>timeout){
					window.clearInterval(t);
					return;
				}
				if(run_stop_cond()){
					window.clearInterval(t);
					fun();
					return;
				}
			}
			,timeper
		);
	}
	
	function reloadVerify(imgid){
		E(imgid).src="code.php?t="+getTimer();
	}
	
	
	//得到字符长度，英文1，中文2
	function getLength(input)
	{
		var i,cnt = 0;
		var temp = input;
		for ( i=0; i<temp.length; i++ )
		{
			if ( escape(temp.charAt(i)).length>=4 )
			{
				cnt+=2;
			}
			else
			{
				cnt++;
			}
		}
		return cnt;
	}
	
	function isSucceed(calldata){
		return (calldata.substring(0,3)=='_Y_');
	}
//弹出窗口类popwin
function E(elementid)
{
	var obj;
	try
	{
		obj = document.getElementById(elementid);
	}
	catch (err)
	{
		alert(elementid+" NOT Found!");
	}
	return obj;
}

function setDisplays(es,s){
	for(var n=0;n<es.length;n++){
		if(E(es[n])){
			E(es[n]).style.display = ((s[n])?"":"none");
		}
	}
}
function setDisplay(e,s){
	if(E(e)){
		E(e).style.display = (s?"":"none");
	}
}

function POPUP(){
	var _t=this;
	_t.ID="popwin";
	_t.X=0;
	_t.Y=0;
	_t.W = 300 ;	_t.H = 200 ;	//Default Size
	_t.fixX = 0;	_t.fixY = 20;	//Fix position
	_t.mX = 0;		_t.mY = 0;		//Mouse Position
	_t.title ;
	_t.url ;
	_t.html ;
	_t.zindex =50000;
	_t.isShow = false;
	_t.showNum = 0;
	_t.ifrBlank = "about:blank";
	_t.closeEvent = "";

	_t.setSize = function(w,h,v){
		if(v==false)
		{
			setDisplays([_t.ID,_t.ID+"_html",_t.ID+"_loading",_t.ID+"_iframe"],[false,false,true,false]);
		}
		_t.W =w;
		_t.H =h;
		var elemSize = [
			{ID:_t.ID,w:_t.W,h:_t.H},
			{ID:_t.ID+"_main",w:(_t.W),h:20},
			{ID:_t.ID+"_title",w:(_t.W-26),h:20},
			{ID:_t.ID+"_content",w:(_t.W-26),h:(_t.H-46)},
			{ID:_t.ID+"_html",w:(_t.W-26),h:(_t.H-20)},
			{ID:_t.ID+"_loading",w:(_t.W-26),h:(_t.H-20)},
			{ID:_t.ID+"_iframe",w:(_t.W-26),h:(_t.H-46)},
			{ID:_t.ID+"_ifr",w:(_t.W-26),h:(_t.H-46)}
		]
		var curE;
		for(var n=0;n<elemSize.length;n++){
			curE=elemSize[n];
			if(E(curE.ID)){
				if(curE.w !=undefined)E(curE.ID).style.width = curE.w +"px";
				if(curE.h !=undefined)E(curE.ID).style.height = curE.h +"px";
			}
		}
	}

	_t.Init = function(){

		if(!E(_t.ID+"_out")){
			document.write("<div id=\""+_t.ID+"_out\" style=\"width:0px;height:0px;overflow:hidden;\">"+_t.ID+"_out</div>");
		}
		else{
			E(_t.ID+"_out").innerHTML = "";
		}
		_t.createDiv();
		_t.setSize(_t.W,_t.H);
		window.onresize = function () { popwin.refreshCover(); };
	}

	_t.createDiv = function(){
		var s="";
			s+="<div id='"+_t.ID+"coverDiv' class='coverDiv' style='display:none; z-index:" +_t.zindex+ ";' >";
				s+="<iframe id='"+_t.ID+"coverFrame' class='coverFrame' border='0' frameborder='0' src='"+_t.ifrBlank+"'></iframe>";
			s+="</div>";
			s+=("<div id=\""+_t.ID+"_ajaxloading\" class=\"snapdiv_loading\" style=\"position:absolute;display:none;z-index:500;\"><\/div>");
			s+=("<div style=\"position:absolute;left:0px;top:0px;display:none;z-index:"+_t.zindex+5+";\" id=\""+_t.ID+"\">");
			s+=("	<div style=\"\" id=\""+_t.ID+"_main\" class=\"snapdiv_title_div\"><div style=\"float:left;\" id=\""+_t.ID+"_title\" class=\"snapdiv_title\">&nbsp;<\/div><div class=\"snapdiv_button_close\" onclick=\"popwin.close()\"></div><\/div>	");
				s+=("	<div id=\""+_t.ID+"_content\" class=\"snapdiv_content\">");
				s+=("		<div id=\""+_t.ID+"_loading\" class=\"snapdiv_loading\"><\/div>");
				s+=("		<div id=\""+_t.ID+"_html\" style=\"display:none;\"><\/div>");
				s+=("		<div id=\""+_t.ID+"_iframe\" style=\"display:none;\"><iframe src=\""+_t.ifrBlank+"\" onreadystatechange=\"popwin.IFrameStateChangeIE(this)\" onload=\"popwin.IFrameStateChangeFF(this)\" style=\"border:0px;width:"+(_t.W-20)+"px;height:"+(_t.H-46)+"px\" marginwidth=\"1\" marginheight=\"1\" name=\""+_t.ID+"_ifr\" id=\""+_t.ID+"_ifr\"  frameborder=\"0\" scrolling=\"auto\"><\/iframe></div>");
				s+=("	<\/div>");
			s+=("<\/div>");
			E(_t.ID+"_out").innerHTML =s;
	}

	//Interface:showURL
	_t.showURL	= function(title,url,w,h,cevt){
		_t.show(title,url,null,w,h,cevt);
	}

	//Interface:showHTML
	_t.showHTML	= function(title,html,w,h,cevt){
		_t.show(title,null,html,w,h,cevt);
	}

	//Interface:showDialog
	_t.showDialog = function(icon,title,html,btns, w,h,cevt){
		var btstr="";
		var iconclass=["dialog_ico_err","dialog_ico_yes","dialog_ico_info","dialog_ico_ask","dialog_ico_stop"][icon];

		for(var i=0;i<btns.length;i++){
			var focusstr="";
			if(btns[i].focus){
				focusstr ="id=\"focus_button\"";
			}
			btstr+="<input type=\"button\" value=\""+btns[i].value+"\" onclick=\""+btns[i].onclick+"\" "+focusstr+" \/>";
		}

		var s="<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"dialog_table\"><tr><td class=\"dialog_table_td\"><div class=\""+iconclass+"\"></div></td><td class=\"dialog_content\">"+html+"</td></tr></table>";
		s+="<div class=\"dialog_button\">"+btstr+"</div>";

		_t.show(title,null,s,w,h,cevt);

		//按钮焦点
		if(E("focus_button")){
			E("focus_button").focus();
		}
	}


	_t.show = function(title,url,html,w,h,cevt){
		if(w&&h){
			_t.setSize(w,h,false);
		}

		_t.showNum ++;
		_t.closeEvent = cevt;
		_t.title = title;
		_t.url = url;
		_t.html = html;

		_t.showDiv();
	}

	_t.showDiv = function(){
		_t.isShow = true;
		_t.refreshCover();
		_t.X = document.documentElement.scrollLeft;
		_t.Y = document.documentElement.scrollTop;

		var winW = document.documentElement.clientWidth;
		var winH = document.documentElement.clientHeight;

		_t.X += (winW - _t.W)/2;
		_t.Y += (winH - _t.H)/2;


		E(_t.ID).style.width = _t.W+"px";
		E(_t.ID).style.height = _t.H+"px";
		E(_t.ID).style.left = _t.X+"px";
		E(_t.ID).style.top = _t.Y+"px";
		E(_t.ID).style.display = "";

		E(_t.ID+"_title").innerHTML = _t.title;
		if(_t.html != null){
			setDisplays([_t.ID+"coverDiv",_t.ID+"_loading",_t.ID+"_iframe",_t.ID+"_ifr",_t.ID+"_html"],[true,false,false,false,true]);
			//E(_t.ID+"_ifr").src =_t.ifrBlank;
			//E(_t.ID+"_iframe").innerHTML ="";
			E(_t.ID+"_html").innerHTML = _t.html;
		}
		else if(_t.url != null){
			setDisplays([_t.ID+"coverDiv",_t.ID+"_loading",_t.ID+"_iframe",_t.ID+"_ifr",_t.ID+"_html"],[true,true,false,true,false]);
			E(_t.ID+"_html").innerHTML = "";
			E(_t.ID+"_ifr").src =_t.url;
			//E(_t.ID+"_iframe").innerHTML = "<iframe src=\""+_t.url+"\" onreadystatechange=\"popwin.IFrameStateChangeIE(this)\" onload=\"popwin.IFrameStateChangeFF(this)\" style=\"border:0px;width:"+(_t.W-20)+"px;height:"+(_t.H-46)+"px\" marginwidth=\"1\" marginheight=\"1\" name=\""+_t.ID+"_ifr\" id=\""+_t.ID+"_ifr\"  frameborder=\"0\" scrolling=\"auto\"><\/iframe>";

		}
	}

	_t.IFrameStateChangeIE = function(obj){
		if (obj.readyState=="interactive")		//state: loading ,interactive,   complete
		{
			setDisplays([_t.ID+"_loading",_t.ID+"_iframe"],[false,true]);
		}
	}

	_t.IFrameStateChangeFF = function(obj){
		setDisplays([_t.ID+"_loading",_t.ID+"_iframe"],[false,true]);
	}

	//Interface: close
	_t.close = function(){
		if(_t.closeEvent){
			eval(_t.closeEvent);
		}
		setDisplays([_t.ID+"coverDiv",_t.ID,_t.ID+"_html",_t.ID+"_loading",_t.ID+"_iframe"],[false,false,false,true,false]);
		E(_t.ID+"_html").innerHTML = "";
		E(_t.ID+"_title").innerHTML = "";
		//E(_t.ID+"_iframe").innerHTML ="";
		E(_t.ID+"_ifr").src = _t.ifrBlank;
		_t.isShow = false;
	}
	
	//Interface: loading
	_t.loading = function(){
		_t.isShow = true;
		_t.refreshCover();
		_t.X = document.documentElement.scrollLeft;
		_t.Y = document.documentElement.scrollTop;

		var winW = document.documentElement.clientWidth;
		var winH = document.documentElement.clientHeight;

		_t.X += (winW - 32)/2;
		_t.Y += (winH - 32)/2;

		E(_t.ID+"_ajaxloading").style.left = _t.X+"px";
		E(_t.ID+"_ajaxloading").style.top = _t.Y+"px";

		setDisplays([_t.ID+"coverDiv",_t.ID+"_ajaxloading"],[true,true]);

	}

	//Interface: loaded
	_t.loaded = function(){
		setDisplays([_t.ID+"coverDiv",_t.ID+"_ajaxloading"],[false,false]);
	}

	_t.refreshCover = function(){
		if(!_t.isShow)return;
		var nowHeight=_t.getBodyObj().scrollHeight;
		E(_t.ID+"coverDiv").style.height=(nowHeight*1)+"px";
		E(_t.ID+"coverFrame").style.height=(nowHeight*1)+"px";

		var nowWidth=_t.getBodyObj().scrollWidth;

		E(_t.ID+"coverDiv").style.width=(nowWidth*1)+"px";
		E(_t.ID+"coverFrame").style.width=(nowWidth*1)+"px";
	}

	_t.getBodyObj = function()
	{
		return (document.documentElement) ? document.documentElement : document.body;
	}

}

var popwin=new POPUP();
popwin.Init();

///////////ajaxGet
///////////ajaxPost

function ajaxGet(url, callback) {
	var req = newXMLHttpRequest();
	url = url + ((url.indexOf("?")==-1)?"?":"&") +"timestamp="+(new Date()).getTime();
	if (req) {
		req.open("GET", url, true);
		req.onreadystatechange = getReadyStateHandler(req, callback);
		req.send(null);
	} else {
		jsDebug("XMLHttpRequest is NULL");
	}
}

function ajaxPost(formid ,url, callback) {
	var req = newXMLHttpRequest();
	url = url + ((url.indexOf("?")==-1)?"?":"&") +"timestamp="+(new Date()).getTime();
	if (req) {
		req.open("POST", url, true);
		req.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		req.onreadystatechange = getReadyStateHandler(req, callback);
		var oForm = document.getElementById(formid);
		req.send(getRequestBody(oForm));
	} else {
		jsDebug("XMLHttpRequest is NULL");
	}
}


function newXMLHttpRequest() {
	var ajax = false;
	try {
		ajax = new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch (e) {
		try {
			ajax = new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch (E) {
			ajax = false;
		}
	}
	if (!ajax && typeof XMLHttpRequest != "undefined") {
		ajax = new XMLHttpRequest();
	}
	return ajax;
}
function getReadyStateHandler(req, responseXmlHandler) {
	return function () {
		if (req.readyState == 4) {
			if (req.status == 200) {
				responseXmlHandler(req.responseText);
			} else {
				jsDebug("HTTP error " + req.status + ": " + req.statusText);
			}
		}
	};
}
function jsDebug(info) {
	alert(info);
}

function getRequestBody(oForm) {
	var tmpForm = new Array();
	var aParams = new Array();
	for (var i = 0; i < oForm.elements.length; i++) {
		var sParam = encodeURIComponent(oForm.elements[i].name);
		var sValue = oForm.elements[i].value;
		if(oForm.elements[i].type=="radio"){
			if(tmpForm.contain(sParam)){
				continue;
			}
			tmpForm.push(sParam);
			sValue=getRadioValue(oForm.elements[i].name);
		}
		if(oForm.elements[i].type=="checkbox"){
			if(!oForm.elements[i].checked){
				continue;
			}
		}
		if(oForm.elements[i].nodeName=="SELECT"&&oForm.elements[i].multiple){
			sValue=getMultipleValue(oForm.elements[i]);
		}
		sParam += "=";
		sParam += encodeURIComponent(sValue);
		aParams.push(sParam);
	}
	return aParams.join("&");
}

function getMultipleValue(ob)
{
	var arSelected = new Array();
	while (ob.selectedIndex != -1)
	{
		arSelected.push(ob.options[ob.selectedIndex].value);
		ob.options[ob.selectedIndex].selected = false;
	}
	return arSelected.toString();
}

function getRadioValue(rName)
{
	var rObj = document.getElementsByName(rName);
	for ( var i=0; i<rObj.length; i++ )
	{
		if ( rObj[i].checked )
		{
			return rObj[i].value;
		}
	}
}

function array_has(val)
 {
  var i;
  for(i = 0; i < this.length; i++)
  {
   if(this[i] == val)
   {
    return true;
   }
  }
  return false;
 }
Array.prototype.contain = array_has;
document.writeln("<div id='DateGird' style='display:none;position:absolute;left:0px; top:0px; z-index:600001;border:1px solid #e0e0e0;background-color:  #F08B09;'></div>");
var Glob_YY=parseInt(new Date().getFullYear());
var Glob_MM=parseInt(new Date().getMonth()+1);
var Glob_DD=parseInt(new Date().getDate());

var dateCoverDiv = "";
	dateCoverDiv+="<div id='dateCoverDiv' class='coverDivClear' style='display:none; z-index:600000;' >";
		dateCoverDiv+="<iframe id='dateCoverFrame' class='coverFrame' border='0' frameborder='0' src='about:blank'></iframe>";
	dateCoverDiv+="</div>";	
document.writeln(dateCoverDiv);
function shotable(sObj)
{         
        var DateArray=["7","1","2","3","4","5","6"];
        var output="";
        output=output+"<div style='padding:5px;border-top:1px solid #f4f4f4;border-left:1px solid #f4f4f4;'><table style='width:165px;font-size:12px;cursor:default;border:0px solid #999999;' border='0' cellpadding='0' cellspacing='0'>";
        output=output+"<tr><td colspan='7' class='TrTitle'><span ID='yearUU'>"+Glob_YY+"</span><span ID='monthUU'>"+Glob_MM+"</span></td></tr><table>";
        output=output+"<table style='width:165px;font-size:12px;font-family: \"verdana\", Helvetica, sans-serif;cursor:default;border:0px solid #999999;border-top:1px solid #404040;border-left:1px solid #404040;border-right:1px solid #efefef;border-bottom:1px solid #efefef;' border='1' cellpadding='0' cellspacing='0'>";
        output=output+"<tr align='center'>";
        for(var i=0;i<7;i++)        output=output+"<td class='TrOver'>"+DateArray[i]+"</td>";
        output=output+"</tr>";
        for(var i=0;i<6;i++){
        output=output+"<tr align='center'>";
                for(var j=0;j<7;j++)        
						output=output+"<td id='TD' name='TD' class='TdOver' onmouseover='choosedate.OverBK(this,\""+sObj.id+"\")' msg=''> </td>";
                        output=output+"</tr>";
                } 
        output=output+"</tabe></div>";

  var selectMMInnerHTML = "<select ID=\"sMonth\" onchange=\"setPan(document.getElementById('sYear').value,this.value)\" style='width:50px;'>";
  for (var i = 1; i <  13; i++)
  {
    if (i == Glob_MM)
       {selectMMInnerHTML += "<option Author=wayx value='" + i + "' selected>" + i + "" + "</option>\r\n";}
    else {selectMMInnerHTML += "<option Author=wayx value='" + i + "'>" + i + "" + "</option>\r\n";}
  }
  selectMMInnerHTML += "</select> ";
  var selectYYInnerHTML = "<select ID=\"sYear\" style=\"width:80px;\"  onchange=\"setPan(this.value,document.getElementById('sMonth').value)\" style='width:65px;'>";
  for (var i = 1900; i <=  Glob_YY+1; i++)
  {
    if (i == Glob_YY)
       {selectYYInnerHTML += "<option Author=wayx value='" + i + "' selected>" + i + "" + "</option>\r\n";}
    else {selectYYInnerHTML += "<option Author=wayx value='" + i + "'>" + i + "" + "</option>\r\n";}
  }
  selectYYInnerHTML += "</select> ";
        document.getElementById("DateGird").innerHTML= "<div style='height:20px;width:180px;text-align:right;padding-top:5px;clear:both;'><span style='cursor:pointer;color:#ffffff;font-weight:bold;' onclick='hiddenT()'>[X]&nbsp;</span></div>"+output;
        document.getElementById("monthUU").innerHTML= selectMMInnerHTML;
        document.getElementById("yearUU").innerHTML= selectYYInnerHTML;
        //document.writeln(output);
}
function classGetDate(sObj)
{
this.obj=sObj || "uncDate";
this.YY=Glob_YY;
this.MM=Glob_MM;
this.DD=Glob_DD;
document.getElementById("DateGird").style.display="";
setPan(this.YY,this.MM);
}        

function GetDay(y,m){
        this.TDate=function(){
                this.DayArray=[];
                for(var i=0;i<42;i++)this.DayArray[i]="&nbsp;";
                for(var i=0;i<new Date(y,m,0).getDate();i++)this.DayArray[i+new Date(y,m-1,1).getDay()]=i+1;
                return this.DayArray;
                }
        return this;
        }

function setPan(YY,MM)
{
var DArray=GetDay(YY,MM).TDate();
var TDArr=document.getElementsByName("TD");
if (MM<10){var showMM="0"+MM;}else{var showMM=MM;}
for(var i=0;i<TDArr.length;i++){
        if (Glob_DD==DArray[i]&&YY==new Date().getFullYear()&&MM==new Date().getMonth()+1){TDArr[i].className="TdOut";}else{TDArr[i].className="TdOver"}
        TDArr[i].innerHTML=DArray[i]; 
        if (DArray[i]<10){var showDD="0"+DArray[i];}else{var showDD=DArray[i];}
        TDArr[i].msg=YY+"-"+showMM+"-"+showDD;
        }
}

choosedate={
		obj:null,
        dfd:function (sObj,sPosition)
        {
        	obj = sObj;
        var dateGirdObj=document.getElementById("DateGird");
        //var i= sObj.style.top
		{
			if(sPosition==undefined){
	       		dateGirdObj.style.top=cmGetY(sObj)+20+"px";
	       		dateGirdObj.style.left=cmGetX(sObj)+"px";
	 		}else if(sPosition=="lefttop"){
	         	dateGirdObj.style.top=cmGetY(sObj)-192+"px";
	        	dateGirdObj.style.left=cmGetX(sObj)-100+"px";		
	        }else{
	         	dateGirdObj.style.top=cmGetY(sObj)-192+"px";
	        	dateGirdObj.style.left=cmGetX(sObj)+"px";		
	        }
        }
        
        shotable(sObj);
        showDateCoverDiv();
        classGetDate(sObj);
        },
        OverBK:function(t,m){
                
                if(t.className!="TdOut"){
                        
                        t.onmouseout=function(){t.className="TdOver";}
                }
                if(t.innerHTML!="&nbsp;")t.className="TdOut";
                
                (
                	function (t,obj)
                	{
		                t.onclick=function(){
		                        if (t.innerHTML!="&nbsp;"){
		                              	obj.value=t.msg;
		                                t.className="TdOver";
		                                //document.getElementById("DateGird").style.display="none";
		                                hiddenT();
		                        }
		                }
                	}
                )(t , obj);
        }
}

function showDateCoverDiv()
{
	try
	{
		var nowHeight=getBodyObj().scrollHeight;
		E("dateCoverDiv").style.height=(nowHeight*1)+"px";
		E("dateCoverFrame").style.height=(nowHeight*1)+"px";	
		var nowWidth=getBodyObj().scrollWidth;
		E("dateCoverDiv").style.width=(nowWidth*1)+"px";
		E("dateCoverFrame").style.width=(nowWidth*1)+"px";
		E("dateCoverDiv").style.display="";
	}
	catch(err)
	{
	}
}

function hiddenT(){
  	document.getElementById("DateGird").style.display="none";
  	E("dateCoverDiv").style.display="none";	
  }
function cmGetX (obj){var x = 0;do{x += obj.offsetLeft;obj = obj.offsetParent;}while(obj);return x;} 
function cmGetY (obj){var y = 0;do{y += obj.offsetTop;obj = obj.offsetParent;}while(obj);return y;}
function postManager(actionindex, tid, postid){
	var actions=["","delPost",	"movePost",	"coverPost",	"lockPost",		"topPost",		"alltopPost",	"goodPost",	"onoffPost",	"upPost",	"stampPost",	"highlightPost"];
	var action=actions[actionindex];
	switch(action){
		case "delPost":
			popwin.showURL('删除帖子','/index.php?bbs&q=postmanager&action='+action+'&tid='+tid+'&postid='+postid, 420, 250);	
		break;
		case "movePost":
			popwin.showURL('移动帖子','/index.php?bbs&q=postmanager&action='+action+'&tid='+tid+'&postid='+postid, 420, 250);	
		break;
		case "coverPost":
			popwin.showURL('屏蔽帖子','/index.php?bbs&q=postmanager&action='+action+'&tid='+tid+'&postid='+postid, 420, 250);	
		break;
		case "lockPost":
			popwin.showURL('锁定帖子','/index.php?bbs&q=postmanager&action='+action+'&tid='+tid+'&postid='+postid, 420, 250);	
		break;
		case "topPost":
			popwin.showURL('置顶帖子','/index.php?bbs&q=postmanager&action='+action+'&tid='+tid+'&postid='+postid, 420, 250);	
		break;
		case "alltopPost":
			popwin.showURL('总置顶','/index.php?bbs&q=postmanager&action='+action+'&tid='+tid+'&postid='+postid, 420, 250);	
		break;
		case "goodPost":
			popwin.showURL('精华帖子','/index.php?bbs&q=postmanager&action='+action+'&tid='+tid+'&postid='+postid, 420, 250);	
		break;
		case "upPost":
			popwin.showURL('提升帖子','/index.php?bbs&q=postmanager&action='+action+'&tid='+tid+'&postid='+postid, 420, 250);	
		break;
		case "stampPost":
			popwin.showURL('鉴定帖子','/index.php?bbs&q=postmanager&action='+action+'&tid='+tid+'&postid='+postid, 420, 250);	
		break;
		case "highlightPost":
			popwin.showURL('高亮显示','/index.php?bbs&q=postmanager&action='+action+'&tid='+tid+'&postid='+postid, 420, 250);	
		break;
		
	}
}

function delPost(){
	popwin.loading();
	ajaxPost("postform","index.php?bbs&q=topicsmanager&action=delPost", delPost_callback);
}
function delPost_callback(data){
	var btns=[{value:" 确 定 ",onclick:"popwin.close();window.location.href='/bbs/index.html'",focus:true}];
	popwin.loaded();
	if(isSucceed(data)){
		popwin.showDialog(1,"删除成功","帖子删除成功",btns,280,130);
	}else{
		popwin.showDialog(0,"操作失败","操作失败:<br />"+data,btns,280,130);
	}
}
	
function movePost(){
	popwin.loading();
	ajaxPost("postform","index.php?bbs&q=topicsmanager&action=movePost", movePost_callback);
}
function movePost_callback(data){
	var btns=[{value:" 确 定 ",onclick:"popwin.close();self.location.reload();",focus:true}];
	popwin.loaded();
	if(isSucceed(data)){
		popwin.showDialog(1,"移动成功","帖子移动成功",btns,280,130);
	}else{
		popwin.showDialog(0,"操作失败","操作失败:<br />"+data,btns,280,130);
	}
}
	
	
function coverPost(){
	popwin.loading();
	ajaxPost("postform","index.php?bbs&q=topicsmanager&action=coverPost", coverPost_callback);
}
function coverPost_callback(data){
	var btns=[{value:" 确 定 ",onclick:"popwin.close();self.location.reload();",focus:true}];
	popwin.loaded();
	if(isSucceed(data)){
		popwin.showDialog(1,"屏蔽成功","帖子屏蔽成功",btns,280,130);
	}else{
		popwin.showDialog(0,"操作失败","操作失败:<br />"+data,btns,280,130);
	}
}

function lockPost(){
	popwin.loading();
	ajaxPost("postform","index.php?bbs&q=topicsmanager&action=lockPost", lockPost_callback);
}
function lockPost_callback(data){
	var btns=[{value:" 确 定 ",onclick:"popwin.close();self.location.reload();",focus:true}];
	popwin.loaded();
	if(isSucceed(data)){
		popwin.showDialog(1,"锁帖成功","帖子锁定成功",btns,280,130);
	}else{
		popwin.showDialog(0,"操作失败","操作失败:<br />"+data,btns,280,130);
	}
}
	
function topPost(){
	popwin.loading();
	ajaxPost("postform","index.php?bbs&q=topicsmanager&action=topPost", topPost_callback);
}
function topPost_callback(data){
	var btns=[{value:" 确 定 ",onclick:"popwin.close();self.location.reload();",focus:true}];
	popwin.loaded();
	if(isSucceed(data)){
		popwin.showDialog(1,"置顶成功","帖子置顶成功",btns,280,130);
	}else{
		popwin.showDialog(0,"操作失败","操作失败:<br />"+data,btns,280,130);
	}
}
	
	
function alltopPost(){
	popwin.loading();
	ajaxPost("postform","index.php?bbs&q=topicsmanager&action=alltopPost", alltopPost_callback);
}
function alltopPost_callback(data){
	var btns=[{value:" 确 定 ",onclick:"popwin.close();self.location.reload();",focus:true}];
	popwin.loaded();
	if(isSucceed(data)){
		popwin.showDialog(1,"置顶成功","帖子总置顶成功",btns,280,130);
	}else{
		popwin.showDialog(0,"操作失败","操作失败:<br />"+data,btns,280,130);
	}
}	

	
	
function goodPost(){
	popwin.loading();
	ajaxPost("postform","index.php?bbs&q=topicsmanager&action=goodPost", goodPost_callback);
}
function goodPost_callback(data){
	var btns=[{value:" 确 定 ",onclick:"popwin.close();self.location.reload();",focus:true}];
	popwin.loaded();
	if(isSucceed(data)){
		popwin.showDialog(1,"设定精华帖子","帖子设定精华成功",btns,280,130);
	}else{
		popwin.showDialog(0,"操作失败","操作失败:<br />"+data,btns,280,130);
	}
}

function upPost(){
	popwin.loading();
	ajaxPost("postform","index.php?bbs&q=topicsmanager&action=upPost", upPost_callback);
}
function upPost_callback(data){
	var btns=[{value:" 确 定 ",onclick:"popwin.close();self.location.reload();",focus:true}];
	popwin.loaded();
	if(isSucceed(data)){
		popwin.showDialog(1,"提升成功","帖子提升成功",btns,280,130);
	}else{
		popwin.showDialog(0,"操作失败","操作失败:<br />"+data,btns,280,130);
	}
}


function stampPost(){
	popwin.loading();
	ajaxPost("postform","index.php?bbs&q=topicsmanager&action=stampPost", stampPost_callback);
}
function stampPost_callback(data){
	var btns=[{value:" 确 定 ",onclick:"popwin.close();self.location.reload();",focus:true}];
	popwin.loaded();
	if(isSucceed(data)){
		popwin.showDialog(1,"鉴定成功","帖子鉴定成功",btns,280,130);
	}else{
		popwin.showDialog(0,"操作失败","操作失败:<br />"+data,btns,280,130);
	}
}
function highlightPost(){
	popwin.loading();
	ajaxPost("postform","index.php?bbs&q=topicsmanager&action=highlightPost", highlightPost_callback);
}
function highlightPost_callback(data){
	var btns=[{value:" 确 定 ",onclick:"popwin.close();",focus:true}];
	popwin.loaded();
	if(isSucceed(data)){
		popwin.showDialog(1,"鉴定成功","帖子高亮选项设置成功",btns,280,130);
	}else{
		popwin.showDialog(0,"操作失败","操作失败:<br />"+data,btns,280,130);
	}
}

function postVote(tid){
	ajaxPost("voteform","ajaxmember.php?action=postVote&tid="+tid,postVote_callback);
}

function postVote_callback(data){
	popwin.loaded();
	if(isSucceed(data)){
		var btns=[{value:" 确 定 ",onclick:"popwin.close();self.location.reload();",focus:true}];
		popwin.showDialog(1,"投票成功","投票成功",btns,280,130);
	}else{
		var btns=[{value:" 确 定 ",onclick:"popwin.close();",focus:true}];
		popwin.showDialog(0,"操作失败","操作失败:<br />"+data,btns,280,130);
	}	
}

function viewVoter(tid){
	popwin.showURL('查看投票参与者','viewvote.php?action=view&tid='+tid, 450, 450);
}

function setBestAnswer(tid, postid){
	var btns=[
		{value:" 确 认 ",onclick:"ajax_setBestAnswer("+tid+","+postid+")",focus:true},
		{value:" 取 消 ",onclick:"popwin.close()"}
	];
	popwin.showDialog(2,"确认","您确认设定该回复为最佳答案吗？您的悬赏积分将会作为该作者的奖励。<br />是否确认继续？",btns,320,130);
}

function ajax_setBestAnswer(tid, postid){
	popwin.loading();
	ajaxGet("ajaxmember.php?action=setBestAnswer&tid="+tid+"&postid="+postid, _setBestAnswer_callback);
}
function _setBestAnswer_callback(data){
	var btns=[{value:" 确 定 ",onclick:"popwin.close();self.location.reload();",focus:true}];
	popwin.loaded();
	if(isSucceed(data)){
		popwin.showDialog(1,"设定成功","成功设定最佳答案。",btns,280,130);
	}else{
		popwin.showDialog(0,"操作失败","操作失败:<br />"+data,btns,280,130);
	}
}


//发布帖子
var hasErr = false;
var hasVerifyCallback=false;

var voteNum=0;
function addVoteItem(){
	var items=document.getElementsByName('voteitem[]');
	if(items.length>=10){
		return;
	}
	var s="<div class=post_voteitem><input type='text' style='width:400px;' name='voteitem[]' tabindex='100"+voteNum+"' class='text_css' /> <a href=\"javascript:delVoteItem("+voteNum+")\" title=\"删除选项\">X</a></div>";
	var ele=document.createElement('div');
	ele.id="vote_"+voteNum;
	ele.innerHTML=s;
	E("votesdiv").appendChild(ele);
	voteNum++;
	
}
function delVoteItem(index){
	E("vote_"+index+"").innerHTML ="";
}


function checkTitle(){
	var v = E("title").value;
	
	if(v==""||getLength(v)<2||getLength(v)>64){
		hasErr = true;
		var btns=[{value:" 确 定 ",onclick:"popwin.close();E('title').focus();",focus:true}];
		popwin.showDialog(2,"标题错误","标题的长度必须在2~64个字节。",btns,320,130);
	}else{
		
	}
}

function checkContent(hasreturn){
	Editor.attachSubmit();
	var v = E("content").value;
	if(v==""||getLength(v)<10||getLength(v)>10000){
		hasErr = true;
		var btns=[{value:" 确 定 ",onclick:"popwin.close();",focus:true}];
		popwin.showDialog(2,"内容错误","内容的长度必须在10~10000个字节。",btns,320,130);
		if(hasreturn){return false;}
	}else{
		if(hasreturn){return true;}
	}
}

function checkVotetime(){
	var v1 = E("starttime").value;
	var v2 = E("stoptime").value;
	if(v1==""||v2==""){
		hasErr = true;
		var btns=[{value:" 确 定 ",onclick:"popwin.close();E('starttime').focus();",focus:true}];
		popwin.showDialog(2,"时间错误","请填写“允许投票时间段”。",btns,320,130);
	}else{
		
	}
}

function checkSecurityCode(){
	var v = trim(E("securitycode").value);
	E("verify_tips").innerHTML = "<span class='checkingStyle'>正在检测...</span>";
	hasVerifyCallback=false;
	ajaxGet("ajaxpublic.php?action=checkSecurityCode&v="+urlEncode(v)+"&t="+getTimer(), checkSecurityCode_callback);
}

function checkSecurityCode_callback(data){
	if(isSucceed(data)){
		E("verify_tips").innerHTML = "<span class='yesStyle'>填写正确</span>";
	}else{
		hasErr = true;
		E("verify_tips").innerHTML = "<span class='errStyle'>"+data+"</span>";
	}
	hasVerifyCallback=true;
}

function checkAllAction(){
	hasErr=false;
	checkTitle();
	if(hasErr)return false;
	checkContent();
	if(hasErr)return false;
	if(topictype==1){
		checkVotetime();
	}
	if(hasErr)return false;
	return true;
}

//必须实现该方法，点击UBB编辑器的时候触发的事件。
function openUploadAttach(){
	if(popedom_14=="0"){
		var btns=[{value:" 确 定 ",onclick:"popwin.close();",focus:true}];
		popwin.showDialog(2,"上传附件","您所在的用户组没有权限上传附件。",btns,320,130);
	}else{
		popwin.showURL('上传附件','inc/attachment/index.php',600,464);
	}
}

//必须文件名时候触发的事件。
function insertAttachment(fileid, filename){
	Editor.insertAttachment(fileid, filename);
}

function post_PageInit(){
	if(topictype==1){
		E("starttime").onfocus = function(){choosedate.dfd(E('starttime'))};
		E("stoptime").onfocus = function(){choosedate.dfd(E('stoptime'))};
		for(var i=0; i<5; i++){
			addVoteItem();
		}
	}
	if(E("securitycode")){
		E("securitycode").onblur = checkSecurityCode;
	}
}


//view
function view_PageInit(){
	if(E("securitycode")){
		E("securitycode").onblur = checkSecurityCode;
	}
}

function checkImgWidth(obj) {
	if(!obj) {return;}
	obj.onload = null;
	var imgpath = obj.src;
	var imgw = obj.offsetWidth;
	var imgh = obj.offsetHeight;
	if(imgw < 2) {
		if(!obj.id) {
			obj.id = 'img_' + Math.random();
		}
		setTimeout("checkImgWidth($('" + obj.id + "'))", 100);
		return;
	}
	var imgr = imgw / imgh;
	var imgmaxw = (imgmaxw==undefined||imgmaxw==null) ? '640' : imgmaxw;
	var widthary = imgmaxw.split('%');
	var fixw=640;
	if(widthary.length > 1) {
		if(widthary[0]) {
			fixw = fixw * widthary[0] / 100;
		} else if(widthary[1]) {
			fixw = fixw < widthary[1] ? fixw : widthary[1];
		}
	} else {
		fixw = widthary[0];
	}
	if(imgw > fixw) {
		imgw = fixw;
		imgh = imgw / imgr;
		obj.style.cursor = 'pointer';
		if(!obj.onclick) {
			obj.onclick = function() {
				if(imgmaxw>=640) window.open(imgpath);
			};
		}
	}
	obj.width = imgw;
	obj.height = imgh;
}
function ColorPicker(){
	var _t=this;
	var cobj;
	//常用的颜色
	var _comcolor = new Array('#000000', '#333333', '#666666', '#999999','#CCCCCC', '#FFFFFF', '#FF000', '#00FF00','#0000FF', '#FFFF00', '#00FFFF', '#FF00FF','#C0C0C0', '#DEDEDE', '#FFFFFF', '#FFFFFF');

	var _hex = new Array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F');
	var _cnum = new Array(1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 1, 1, 0, 0);

	_t.choose = function(e,curobj){
		_t.cobj=curobj;
		var obj = document.all ? event.srcElement : e.target;
		obj.style.position = "relative";
		var inputTop = _t.getTop(obj);
		var inputLeft = _t.getLeft(obj);
		var htmlStr = "visibility:visible; position:absolute; padding:2px;border:1px solid #c0c0c0;background:#F0F0F0; cursor:pointer;";
		var _cpicker = document.getElementById("_cpicker");
		if (!_cpicker){
			_cpicker = document.createElement("div");
			_cpicker.id = "_cpicker";
			_cpicker.style.cssText = htmlStr;
			_cpicker.style.zIndex = 30000;
			var _cpickerContent = "<div>"+_t._colorTable()+"<div>" ;
			document.body.appendChild(_cpicker);
			_cpicker.innerHTML = _cpickerContent;
		}
		else {
			document.getElementById("_cpicker").style.visibility = "visible";
		}

		_cpicker.style.left = (inputLeft) + "px";
		_cpicker.style.top = (inputTop + obj.clientHeight) + "px";
		  
		if(!_cpicker.onclick){
			_cpicker.onclick = function(oEvent){
				e = oEvent || window.event;
				var ev = document.all ? event.srcElement : e.target ;
				if(ev.bgColor!=undefined){
					_t.chooseColor(ev.bgColor);
				}else{
					_t.chooseColor("");
				}
				this.style.visibility = "hidden";
				if (document.all) {
					e.cancelBubble = true;
				}
				else {
					e.stopPropagation();
				}

			};
		}

		if(!_cpicker.onmouseover){
			_cpicker.onmouseover = function(oEvent){
				e = oEvent || window.event;
				var ev = document.all ? event.srcElement : e.target ;
				if(ev.bgColor!=undefined){
					_t.previewColor(ev.bgColor);
				}else{
					_t.previewColor("");
				}
			};
		} 

		if(!document.all){
			_cpicker.setAttribute('flag','flag'); 
			obj.setAttribute('flag','flag');
		}else{
			_cpicker.flag = "flag";
			obj.flag = "flag";
		}
	  
		if(!document.onclick){
			document.onclick = function(e){
				var ev = document.all ? event.srcElement : e.target ;

				if (ev.getAttribute("flag")==null){
					document.getElementById("_cpicker").style.visibility = "hidden";
				}
			};
		}

	}

	//Interface
	_t.previewColor = function(color){
		
	}
	//Interface
	_t.chooseColor = function(color){
		
	}
	_t._toHex = function(n){
		var h, l;
		n = Math.round(n);
		l = n % 16;
		h = Math.floor((n / 16)) % 16;
		return (_hex[h] + _hex[l]);
	}

	_t._colorTd = function(r, g, b, n){
		r = ((r * 16 + r) * 3 * (15 - n) + 0x80 * n) / 15;
		g = ((g * 16 + g) * 3 * (15 - n) + 0x80 * n) / 15;
		b = ((b * 16 + b) * 3 * (15 - n) + 0x80 * n) / 15;
		return '<TD BGCOLOR="#' + _t._toHex(r) + _t._toHex(g) + _t._toHex(b) + '" height=6 width=6></TD>';
	}

  
	_t._colorTable =function(){
		var trStr = "<table CELLPADDING=0 CELLSPACING=0>";
		for (i = 0; i < 16; i++) {
			trStr += '<TR>';
			trStr += '<TD BGCOLOR="#000000"  height=6 width=3></TD>';
			trStr += '<TD BGCOLOR="' + _comcolor[i] + '" height=6 width=6></TD>';
			trStr += '<TD BGCOLOR="#000000"  height=6 width=3></TD>';
			for (j = 0; j < 30; j++) {
				n1 = j % 5;
				n2 = Math.floor(j / 5) * 3;
				n3 = n2 + 3;
				trStr += _t._colorTd((_cnum[n3] * n1 + _cnum[n2] * (5 - n1)), (_cnum[n3 + 1] * n1 + _cnum[n2 + 1] * (5 - n1)), (_cnum[n3 + 2] * n1 + _cnum[n2 + 2] * (5 - n1)), i);
			}
			trStr += '</TR>';
		}
		trStr += "</table>";
		return trStr;
	}

	_t.getTop = function(e){
		var offset = e.offsetTop;
		if (e.offsetParent != null)
		offset += _t.getTop(e.offsetParent);
		return offset;
	}
	
	_t.getLeft = function(e){
		var offset = e.offsetLeft;
		if (e.offsetParent != null) 
		offset += _t.getLeft(e.offsetParent);
		return offset;
	}
}

var colorpicker=new ColorPicker();