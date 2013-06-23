//获取URL参数的方法
function getQueryStringRegExp(name) { var reg = new RegExp("(^|\\?|&)"+ name +"=([^&]*)(\\s|&|$)", "i"); if (reg.test(location.href)) return unescape(RegExp.$2.replace(/\+/g, " ")); return ""; }; 

//获取表单域
var ubbHideFieldId = getQueryStringRegExp("id");
var ifrEditorId = getQueryStringRegExp("frmid");

if(ubbHideFieldId==''){
	alert("缺少隐藏表单域ID。");
}
if(ifrEditorId==''){
	alert("缺少框架ID。");
}

//编辑器对应的隐藏表单域
var ubbHideField = parent.document.getElementById(ubbHideFieldId);
var editorForm = ubbHideField.form;
//编辑器框架
var iframEditor = parent.document.getElementById(ifrEditorId);

$('editor_float').scrollLeft = 600;						
var _minInput = 10;
var _maxInput = 10000;
var _allowSwitch = 1;
var _allowFaces = 1;
var _allowBBcode = 1;
var _allowImgCode = 1;

var _eid = 'e';
var textobj = $(_eid + '_textarea');
var isubb = (isIE || isMoz || (isOpera >= 9));
if(isChr){
	isubb=1;
}

var faces = new Array();
faces[1] = {'code' : ':)', 'url' : 'default/smile.gif'};
faces[2] = {'code' : ':(', 'url' : 'default/sad.gif'};
faces[3] = {'code' : ':D', 'url' : 'default/biggrin.gif'};
faces[4] = {'code' : ':\'(', 'url' : 'default/cry.gif'};
faces[5] = {'code' : ':@', 'url' : 'default/huffy.gif'};
faces[6] = {'code' : ':o', 'url' : 'default/shocked.gif'};
faces[7] = {'code' : ':P', 'url' : 'default/tongue.gif'};
faces[8] = {'code' : ':$', 'url' : 'default/shy.gif'};
faces[9] = {'code' : ';P', 'url' : 'default/titter.gif'};
faces[10] = {'code' : ':L', 'url' : 'default/sweat.gif'};
faces[11] = {'code' : ':Q', 'url' : 'default/mad.gif'};
faces[12] = {'code' : ':lol', 'url' : 'default/lol.gif'};
faces[13] = {'code' : ':loveliness:', 'url' : 'default/loveliness.gif'};
faces[14] = {'code' : ':funk:', 'url' : 'default/funk.gif'};
faces[15] = {'code' : ':curse:', 'url' : 'default/curse.gif'};
faces[16] = {'code' : ':dizzy:', 'url' : 'default/dizzy.gif'};
faces[17] = {'code' : ':shutup:', 'url' : 'default/shutup.gif'};
faces[18] = {'code' : ':sleepy:', 'url' : 'default/sleepy.gif'};
faces[19] = {'code' : ':hug:', 'url' : 'default/hug.gif'};
faces[20] = {'code' : ':victory:', 'url' : 'default/victory.gif'};
faces[21] = {'code' : ':nose:', 'url' : 'default/nose.gif'};
faces[22] = {'code' : ':kiss:', 'url' : 'default/kiss.gif'};
faces[23] = {'code' : ':handshake', 'url' : 'default/handshake.gif'};
faces[24] = {'code' : ':clap:', 'url' : 'default/clap.gif'};
var editorcss = '';
var editorcss_editor = 'images/style_editor.css';;
var TABLEBG = '#FFF';

var fontoptions = new Array( "宋体", "微软雅黑", "黑体", "楷体_GB2312", "Tahoma", "Impact", "Verdana", "Times New Roman");
var custombbcodes = new Array();
custombbcodes["fly"] = {'prompt' : '请输入滚动显示的文字:'};
custombbcodes["flash"] = {'prompt' : '请输入 Flash 动画的 URL:'};
custombbcodes["sup"] = {'prompt' : '请输入上标文字：'};
custombbcodes["sub"] = {'prompt' : '请输入下标文字：'};
						
function cedit() {
	try {
		loadData(1);
	} catch(e) {
		setTimeout('cedit()', 1000);
	}
}

//获取当前路径
function getPath(isparent){
	var locHref = location.href;
	if(isparent!=undefined && isparent){
		locHref=window.parent.location.href;
	}
	var locArray = locHref.split("/");
    delete locArray[locArray.length-1];
    var dirTxt = locArray.join("/");
	if(dirTxt.substring(dirTxt.length-1)=="/"){
		dirTxt=dirTxt.substring(0,dirTxt.length-1);
	}
    return dirTxt;
}


function openEditor() {
	try {
		initText = isubb ? bbcode2html(ubbHideField.value) : ubbHideField.value;
		newEditor(isubb, initText);
		if(_eifm) {
			_eifm.className = 'autosave max';
			_eifm.style.height=(iframEditor.style.height.replace("px","")*1-45)+"px";
		}
	} catch(e) {
		setTimeout('openEditor()', 100);
		return;
	}
	if(!$('editor_float').scrollLeft) {
		$('editor_float').scrollLeft = 600;
	}
}

//faces_show('facesdiv', 8);

window.onload = function(){
	try{								
		setHideFieldEvent();
	}catch(e){
		// window.location.reload();
	}
}

// 设置所属表单的提交
function setHideFieldEvent() {
	if (!ubbHideField) return;
	var editorForm = ubbHideField.form ;
	if (!editorForm) return ;
	_attachEvent(editorForm, 'submit', attachSubmit);
}
// 提交表单



var postSubmited = false;
var smdiv = new Array();
var codecount = '-1';
var codehtml = new Array();

function AddText(txt) {
	obj = document.getElementById('e_textarea');
	selection = document.selection;
	checkFocus();
	if(!isUndefined(obj.selectionStart)) {
		var opn = obj.selectionStart + 0;
		obj.value = obj.value.substr(0, obj.selectionStart) + txt + obj.value.substr(obj.selectionEnd);
	} else if(selection && selection.createRange) {
		var sel = selection.createRange();
		sel.text = txt;
		sel.moveStart('character', -strlen(txt));
	} else {
		obj.value += txt;
	}
}

function checkFocus() {
	var obj = typeof isubb == 'undefined' || !isubb ? document.getElementById('e_textarea') : _ewin;
	if(!obj.hasfocus) {
		obj.focus();
	}
}

function validate(theform) {
	var message = isubb ? html2bbcode(getEditorContents()) : parseUrl(theform.message.value);
	theform.message.value = message;
	return true;
}

//ctrl+enter 提交
function ctlent(event) {
	if(postSubmited == false && (event.ctrlKey && event.keyCode == 13) || (event.altKey && event.keyCode == 83)) {
		attachSubmit();
		setTimeout(
		function(){
			if(window.parent.checkFormSubmit()){postSubmited = true;editorForm.submit();}
		},10	
		)
		
	}
}

//表单提交
function attachSubmit() {
	var txt = isubb ? html2bbcode(getEditorContents()) : parseUrl(document.getElementById('e_textarea').value);
	ubbHideField.value = txt;
}

// 解析URL
function parseUrl(str, mode, parsecode) {
	if(!parsecode) str= str.replace(/\s*\[code\]([\s\S]+?)\[\/code\]\s*/ig, function($1, $2) {return codetag($2);});
	str = str.replace(/([^>=\]"'\/]|^)((((https?|ftp):\/\/)|www\.)([\w\-]+\.)*[\w\-\u4e00-\u9fa5]+\.([\.a-zA-Z0-9]+|\u4E2D\u56FD|\u7F51\u7EDC|\u516C\u53F8)((\?|\/|:)+[\w\.\/=\?%\-&~`@':+!]*)+\.(jpg|gif|png|bmp))/ig, mode == 'html' ? '$1<img src="$2" border="0">' : '$1[img]$2[/img]');
	str = str.replace(/([^>=\]"'\/@]|^)((((https?|ftp|gopher|news|telnet|rtsp|mms|callto|bctp|ed2k|thunder|synacast):\/\/))([\w\-]+\.)*[:\.@\-\w\u4e00-\u9fa5]+\.([\.a-zA-Z0-9]+|\u4E2D\u56FD|\u7F51\u7EDC|\u516C\u53F8)((\?|\/|:)+[\w\.\/=\?%\-&~`@':+!#]*)*)/ig, mode == 'html' ? '$1<a href="$2" target="_blank">$2</a>' : '$1[url]$2[/url]');
	str = str.replace(/([^\w>=\]"'\/@]|^)((www\.)([\w\-]+\.)*[:\.@\-\w\u4e00-\u9fa5]+\.([\.a-zA-Z0-9]+|\u4E2D\u56FD|\u7F51\u7EDC|\u516C\u53F8)((\?|\/|:)+[\w\.\/=\?%\-&~`@':+!#]*)*)/ig, mode == 'html' ? '$1<a href="$2" target="_blank">$2</a>' : '$1[url]$2[/url]');
	str = str.replace(/([^\w->=\]:"'\.\/]|^)(([\-\.\w]+@[\.\-\w]+(\.\w+)+))/ig, mode == 'html' ? '$1<a href="mailto:$2">$2</a>' : '$1[email]$2[/email]');
	if(!parsecode) {
		for(var i = 0; i <= codecount; i++) {
			str = str.replace("[\t_6K_CODE_" + i + "\t]", codehtml[i]);
		}
	}
	return str;
}

// 处理[code]
function codetag(text) {
	codecount++;
	if(typeof isubb != 'undefined' && isubb) text = text.replace(/<br[^\>]*>/ig, '\n').replace(/<(\/|)[A-Za-z].*?>/ig, '');
	codehtml[codecount] = '[code]' + text + '[/code]';
	return '[\t_6K_CODE_' + codecount + '\t]';
}

// 验证内容长度
function checkLength() {
	var message = isubb ? html2bbcode(getEditorContents()) : document.getElementById('e_textarea').value;
	var showmessage = _maxInput != 0 ? '系统限制: ' + _minInput + ' 到 ' + _maxInput + ' 字节' : '';
	alert('\n当前长度: ' + getBytesLength(message) + ' 字节\n\n' + showmessage);
}

function addNullEnd() {
	if(typeof isubb != 'undefined' && isubb) {
		_edoc.body.innerHTML += '';
	} else {
		_edoc.value += '';
	}
}

var Editorwin = 0;
var _eifm = _ewin = _edoc = _ecss = null;
var cursor = -1;
var stack = new Array();
var inited = false;

function newEditor(mode, initialtext) {
	isubb = parseInt(mode);
	if(!(isIE || isMoz || (isOpera >= 9))) {
		_allowSwitch = isubb = 0;
	}
	if(!_allowSwitch) {
		$(_eid + '_switcher').style.display = 'none';
	}

	$(_eid + '_cmd_table').style.display = isubb ? '' : 'none';

	if(isubb) {
		if($(_eid + '_iframe')) {
			_eifm = $(_eid + '_iframe');
		} else {
			var iframe = document.createElement('iframe');
			_eifm = textobj.parentNode.appendChild(iframe);
			_eifm.id = _eid + '_iframe';
		}

		_ewin = _eifm.contentWindow;
		_edoc = _ewin.document;
		writeEditorContents(isUndefined(initialtext) ?  textobj.value : initialtext);
	} else {
		_eifm = _ewin = _edoc = textobj;
		if(!isUndefined(initialtext)) {
			writeEditorContents(initialtext);
		}
		
	}
	initEditorEvent();
	initEditor();
}

function initEditor() {
	var buttons = $(_eid + '_controls').getElementsByTagName('a');
	for(var i = 0; i < buttons.length; i++) {
		if(buttons[i].id.indexOf(_eid + '_cmd_') != -1) {
			buttons[i].href = 'javascript:;';
			buttons[i].onclick = function(e) {_6kcode(this.id.substr(this.id.lastIndexOf('_cmd_') + 5))};
		} else if(buttons[i].id.indexOf(_eid + '_popup_') != -1) {
			buttons[i].href = 'javascript:;';
			if(!$(buttons[i].id + '_menu') || !$(buttons[i].id + '_menu').getAttribute('clickshow')) {
				buttons[i].onmouseover = function(e) {if(this.id=='e_popup_faces'&& $('facesdiv').innerHTML==''){faces_show('facesdiv', 8);};inMenuCtn = in_container;showMenu(this.id, true, 0, 2)};
			} else {
				buttons[i].onclick = function(e) {inMenuCtn = in_container;showMenu(this.id, true, 0, 2)};
			}
		}
	}
	setUnselectable($(_eid + '_controls'));
	textobj.onkeydown = function(e) {ctlent(e ? e : event)};
}

function setUnselectable(obj) {
	if(isIE && isIE > 4 && typeof obj.tagName != 'undefined') {
		if(obj.hasChildNodes()) {
			for(var i = 0; i < obj.childNodes.length; i++) {
				setUnselectable(obj.childNodes[i]);
			}
		}
		obj.unselectable = 'on';
	}
}

function writeEditorContents(text) {
	if(isubb) {
		if(text == '' && isMoz) {
			text = '<br />';
		}
		if(inited && !(isMoz && isMoz >= 3)) {
			_edoc.body.innerHTML = text;
		} else {
			_edoc.designMode = 'on';
			_edoc = _ewin.document;
			_edoc.open('text/html', 'replace');
			_edoc.write(text);
			_edoc.close();
			_edoc.body.contentEditable = true;
			inited = true;
		}
	} else {
		textobj.value = text;
	}

	setEditorStyle();

}

function getEditorContents() {
	return isubb ? _edoc.body.innerHTML : _edoc.value;
}

function setEditorStyle() {
	if(isubb) {
		textobj.style.display = 'none';
		_eifm.style.display = '';
		_eifm.className = textobj.className;

		//if(_ecss == null) {
			var cssarray = [getPath()+"/"+editorcss_editor];
			for(var i = 0; i < cssarray.length; i++) {
				_ecss = _edoc.createElement('link');
				_ecss.type = 'text/css';
				_ecss.rel = 'stylesheet';
				_ecss.href = cssarray[i];
				var headNode = _edoc.getElementsByTagName("head")[0];
				headNode.appendChild(_ecss);
			}
		//}

		if(isMoz || isOpera) {
			_eifm.style.border = '0px';
		} else if(isIE) {
			_edoc.body.style.border = '0px';
			_edoc.body.addBehavior('#default#userData');
		}
		_eifm.style.width = textobj.style.width;
		_eifm.style.height = textobj.style.height;
		_edoc.body.style.backgroundColor = TABLEBG;
		_edoc.body.style.textAlign = 'left';
		_edoc.body.id = 'isubb';

	} else {
		var iframe = textobj.parentNode.getElementsByTagName('iframe')[0];
		if(iframe) {
			textobj.style.display = '';
			textobj.style.width = iframe.style.width;
			textobj.style.height = iframe.style.height;
			iframe.style.display = 'none';
		}
	}
}

//6K:初始化编辑器事件
function initEditorEvent() {
	if(isubb) {
		if(isMoz || isOpera) {
			_ewin.addEventListener('focus', function(e) {this.hasfocus = true;}, true);
			_ewin.addEventListener('blur', function(e) {this.hasfocus = false;}, true);
			_ewin.addEventListener('keydown', function(e) {ctlent(e);}, true);
		} else {
			if(_edoc.attachEvent) {
				_edoc.body.attachEvent("onkeydown", ctlent);
			}
		}
	}
	_ewin.onfocus = function(e) {this.hasfocus = true;};
	_ewin.onblur = function(e) {this.hasfocus = false;};
}

function wrapTags(tagname, useoption, selection) {

	if(isUndefined(selection)) {
		var selection = getSel();
		if(selection === false) {
			selection = '';
		} else {
			selection += '';
		}
	}

	if(useoption !== false) {
		var opentag = '[' + tagname + '=' + useoption + ']';
	} else {
		var opentag = '[' + tagname + ']';
	}

	var closetag = '[/' + tagname + ']';
	var text = opentag + selection + closetag;

	insertText(text, strlen(opentag), strlen(closetag), in_array(tagname, ['code', 'quote', 'hide']) ? true : false);

}

function applyFormat(cmd, dialog, argument) {
	if(isubb) {
		_edoc.execCommand(cmd, (isUndefined(dialog) ? false : dialog), (isUndefined(argument) ? true : argument));
		return;
	}
	switch(cmd) {
		case 'bold':
		case 'italic':
		case 'underline':
			wrapTags(cmd.substr(0, 1), false);
			break;
		case 'justifyleft':
		case 'justifycenter':
		case 'justifyright':
			wrapTags('align', cmd.substr(7));
			break;
		case 'floatleft':
		case 'floatright':
			wrapTags('float', cmd.substr(5));
			break;
		case 'indent':
			wrapTags(cmd, false);
			break;
		case 'fontname':
			wrapTags('font', argument);
			break;
		case 'fontsize':
			wrapTags('size', argument);
			break;
		case 'forecolor':
			wrapTags('color', argument);
			break;
		case 'createlink':
			var sel = getSel();
			if(sel) {
				wrapTags('url', argument);
			} else {
				wrapTags('url', argument, argument);
			}
			break;
		case 'insertimage':
			wrapTags('img', false, argument);
			break;
	}
}

function getCaret() {
	if(isubb) {
		var obj = _edoc.body;
		var s = document.selection.createRange();
		s.setEndPoint("StartToStart", obj.createTextRange());
		return s.text.replace(/\r?\n/g, ' ').length;
	} else {
		var obj = _eifm;
		var wR = document.selection.createRange();
		obj.select();
		var aR = document.selection.createRange();
		wR.setEndPoint("StartToStart", aR);
		var len = wR.text.replace(/\r?\n/g, ' ').length;
		wR.collapse(false);
		wR.select();
		return len;
	}
}

function setCaret(pos) {
	var obj = isubb ? _edoc.body : _eifm;
	var r = obj.createTextRange();
	r.moveStart('character', pos);
	r.collapse(true);
	r.select();
}

// 插入连接
function insertlink(cmd) {
	var sel;
	if(isIE) {
		sel = isubb ? _edoc.selection.createRange() : document.selection.createRange();
		var pos = getCaret();
	}
	var selection = sel ? (isubb ? sel.htmlText : sel.text) : getSel();
	var ctrlid = _eid + '_cmd_' + cmd;
	var tag = cmd == 'insertimage' ? 'img' : (cmd == 'createlink' ? 'url' : 'email');
	var str = (tag == 'img' ? '请输入图片链接地址:' : (tag == 'url' ? '请输入链接的地址:' : '请输入此链接的邮箱地址:')) + '<br /><input type="text" id="' + ctrlid + '_param_1" style="width: 98%" value="" class="text_css" />';
	var div = editorMenu(ctrlid, str);
	$(ctrlid + '_param_1').focus();
	$(ctrlid + '_param_1').onkeydown = editorMenuEvent_onkeydown;
	$(ctrlid + '_submit').onclick = function() {
		checkFocus();
		if(isIE) {
			setCaret(pos);
		}
		var input = $(ctrlid + '_param_1').value;
		if(input != '') {
			var v = selection ? selection : input;
			var href = tag != 'email' && /^(www\.)/.test(input) ? 'http://' + input : input;
			var text = isubb ? (tag == 'img' ? '<img src="' + input + '" border="0">' : '<a href="' + (tag == 'email' ? 'mailto:' : '') + href + '">' + v + '</a>') : (tag == 'img' ? '[' + tag + ']' + input + '[/' + tag + ']' : '[' + tag + '=' + href + ']' + v + '[/' + tag + ']');
			var closetaglen = tag == 'email' ? 8 : 6;
			if(isubb) insertText(text, text.length - v.length, 0, (selection ? true : false), sel);
			else insertText(text, text.length - v.length - closetaglen, closetaglen, (selection ? true : false), sel);
		}
		hideMenu();
		div.parentNode.removeChild(div);
	}
}

// 插入附件
function insertAttachment(fileid, filename){
	checkFocus();
	var text="[FILE]"+fileid+"[/FILE]";
	var ext=filename.split(".")[1];
	var imgext="|gif|jpg|png|jpeg|";
	if(imgext.indexOf(ext.toLowerCase())>-1){
		text="[IMGFILE]"+fileid+"[/IMGFILE]";
	}
	insertTextFocus(text);
}


// 插入表情
function insertSmiley(smilieid) {
	checkFocus();
	var src = $('smilie_' + smilieid).src;
	var code = $('smilie_' + smilieid).alt;
	if(typeof isubb != 'undefined' && isubb && _allowFaces && (!$('smileyoff') || $('smileyoff').checked == false)) {
		if(isMoz) {
			applyFormat('InsertImage', false, src);
			var faces = _edoc.body.getElementsByTagName('img');
			for(var i = 0; i < faces.length; i++) {
				if(faces[i].src == src && faces[i].getAttribute('smilieid') < 1) {
					faces[i].setAttribute('smilieid', smilieid);
					faces[i].setAttribute('border', "0");
				}
			}
		} else {
			insertText('<img src="' + src + '" border="0" smilieid="' + smilieid + '" alt="" /> ', false);
		}
	} else {
		code += ' ';
		AddText(code);
	}
	hideMenu();
}

function editorMenuEvent_onkeydown(e) {
	e = e ? e : event;
	var ctrlid = this.id.substr(0, this.id.lastIndexOf('_param_'));
	if((this.type == 'text' && e.keyCode == 13) || (this.type == 'textarea' && e.ctrlKey && e.keyCode == 13)) {
		$(ctrlid + '_submit').click();
		doAfter(e);
	} else if(e.keyCode == 27) {
		hideMenu();
		$(ctrlid + '_menu').parentNode.removeChild($(ctrlid + '_menu'));
	}
}
// 自定义ubb标签
function customTags(tagname, params) {
	var sel;
	if(isIE) {
		sel = isubb ? _edoc.selection.createRange() : document.selection.createRange();
		var pos = getCaret();
	}
	var selection = sel ? (isubb ? sel.htmlText : sel.text) : getSel();
	var opentag = '[' + tagname + ']';
	var closetag = '[/' + tagname + ']';
	var haveSel = selection == null || selection == false || in_array(trim(selection), ['', 'null', 'undefined', 'false']) ? 0 : 1;
	if(params == 1 && haveSel) {
		return insertText((opentag + selection + closetag), strlen(opentag), strlen(closetag), true, sel);
	}
	var ctrlid = _eid + '_cmd_custom' + params + '_' + tagname;
	var ordinal = {1 : 'first', 2 : 'second', 3 : 'third'}
	var promptlang = custombbcodes[tagname]['prompt'].split("\t");
	var str = '';
	for(var i = 1; i <= params; i++) {
		if(i != params || !haveSel) {
			str += (promptlang[i - 1] ? promptlang[i - 1] : 'Please input the ' + ordinal[i] + ' parameter:') + '<br /><input type="text" id="' + ctrlid + '_param_' + i + '" style="width: 98%" value="" class="text_css" />' + (i < params ? '<br />' : '');
		}
	}
	var div = editorMenu(ctrlid, str);
	$(ctrlid + '_param_1').focus();
	for(var i = 1; i <= params; i++) {if(i != params || !haveSel) $(ctrlid + '_param_' + i).onkeydown = editorMenuEvent_onkeydown;}
	$(ctrlid + '_submit').onclick = function() {
		var first = $(ctrlid + '_param_1').value;
		if($(ctrlid + '_param_2')) var second = $(ctrlid + '_param_2').value;
		if($(ctrlid + '_param_3')) var third = $(ctrlid + '_param_3').value;
		checkFocus();
		if(isIE) {
			setCaret(pos);
		}
		if((params == 1 && first) || (params == 2 && first && (haveSel || second)) || (params == 3 && first && second && (haveSel || third))) {
			var text;
			if(params == 1) {
				text = first;
			} else if(params == 2) {
				text = haveSel ? selection : second;
				opentag = '[' + tagname + '=' + first + ']';
			} else {
				text = haveSel ? selection : third;
				opentag = '[' + tagname + '=' + first + ',' + second + ']';
			}
			insertText((opentag + text + closetag), strlen(opentag), strlen(closetag), true, sel);
		}
		hideMenu();
		div.parentNode.removeChild(div);
	};
}

function editorMenu(ctrlid, str) {
	var div = document.createElement('div');
	div.id = ctrlid + '_menu';
	div.style.display = 'none';
	div.className = 'popupmenu_popup popupfix';
	div.style.width = '300px';
	$(_eid + '_controls').appendChild(div);
	div.innerHTML = '<div class="popupmenu_option" unselectable="on">' + str + '<br /><center><input type="button" id="' + ctrlid + '_submit" value="提交" class="button_css" /> &nbsp; <input type="button" onClick="hideMenu();try{div.parentNode.removeChild(' + div.id + ')}catch(e){}" value="取消" class="button_css" /></center></div>';
	inMenuCtn = in_container;
	showMenu(ctrlid, true, 0, 3);
	return div;
}

function _6kcode(cmd, arg) {

	checkFocus();

	if(in_array(cmd, ['quote', 'code', 'hide'])) {
		var sel;
		if(isIE) {
			sel = isubb ? _edoc.selection.createRange() : document.selection.createRange();
			var pos = getCaret();
		}
		var selection = sel ? (isubb ? sel.htmlText : sel.text) : getSel();
		var opentag = '[' + cmd + ']';
		var closetag = '[/' + cmd + ']';
		if(cmd != 'hide' && selection) {
			return insertText((opentag + selection + closetag), strlen(opentag), strlen(closetag), true, sel);
		}
		var ctrlid = _eid + '_cmd_' + cmd;
		var str = '';
		fmt['e_quote'] = '请输入要插入的引用';
		fmt['e_code'] = '请输入要插入的代码';
		fmt['e_hide'] = '请输入要插入的隐藏内容';
		if(cmd != 'hide' || !selection) {
			str += fmt['e_' + cmd] + ':<br /><textarea id="' + ctrlid + '_param_1" style="width: 98%" cols="50" rows="5"></textarea>';
		}
		str += cmd == 'hide' && selection ? '' : '<br />';
		str += cmd == 'hide' ? '<input type="radio" name="' + ctrlid + '_radio" id="' + ctrlid + '_radio_1"  class="radio_css" checked="checked" />只有当浏览者回复本帖时才显示<br /><input type="radio" name="' + ctrlid + '_radio" id="' + ctrlid + '_radio_2" class="text_css" />只有当浏览者积分高于 <input type="text" size="3" id="' + ctrlid + '_param_2" class="text_css" /> 时才显示<br /><input type="radio" name="' + ctrlid + '_radio" id="' + ctrlid + '_radio_3" class="text_css" />只有用户 <input type="text" size="18" id="' + ctrlid + '_param_3" class="text_css" /> 可以浏览' : '';
		var div = editorMenu(ctrlid, str);
		$(ctrlid + '_param_' + (cmd == 'hide' && selection ? 2 : 1)).focus();
		$(ctrlid + '_param_' + (cmd == 'hide' && selection ? 2 : 1)).onkeydown = editorMenuEvent_onkeydown;
		$(ctrlid + '_submit').onclick = function() {
			checkFocus();
			if(isIE) {
				setCaret(pos);
			}
			if(cmd == 'hide' && $(ctrlid + '_radio_2').checked) {
				var mincredits = parseInt($(ctrlid + '_param_2').value);
				opentag = mincredits > 0 ? '[hide=' + mincredits + ']' : '[hide]';
			}
			if(cmd == 'hide' && $(ctrlid + '_radio_3').checked) {
				var touser = $(ctrlid + '_param_3').value;
				if(touser==''){
					return;
				}
				opentag = '[opento=' + touser + ']';
				closetag='[/opento]';
			}
			var text = selection ? selection : $(ctrlid + '_param_1').value;
			if(isubb) {
				if(cmd == 'code') {
					text = preg_replace(['<', '>'], ['&lt;', '&gt;'], text);
				}
				text = text.replace(/\r?\n/g, '<br />');
			}
			text = opentag + text + closetag;
			insertText(text, strlen(opentag), strlen(closetag), false, sel);
			hideMenu();
			div.parentNode.removeChild(div);
		}
		return;
	} else if(cmd.substr(0, 6) == 'custom') {
		var ret = customTags(cmd.substr(8), cmd.substr(6, 1));
	} else if(!isubb && cmd == 'removeformat') {
		var simplestrip = new Array('b', 'i', 'u');
		var complexstrip = new Array('font', 'color', 'size');

		var str = getSel();
		if(str === false) {
			return;
		}
		for(var tag in simplestrip) {
			str = stripSimple(simplestrip[tag], str);
		}
		for(var tag in complexstrip) {
			str = stripComplex(complexstrip[tag], str);
		}
		insertText(str);
	} else if(!isubb && in_array(cmd, ['insertorderedlist', 'insertunorderedlist'])) {
		var listtype = cmd == 'insertorderedlist' ? '1' : '';
		var opentag = '[list' + (listtype ? ('=' + listtype) : '') + ']\n';
		var closetag = '[/list]';

		if(txt = getSel()) {
			var regex = new RegExp('([\r\n]+|^[\r\n]*)(?!\\[\\*\\]|\\[\\/?list)(?=[^\r\n])', 'gi');
			txt = opentag + trim(txt).replace(regex, '$1[*]') + '\n' + closetag;
			insertText(txt, strlen(txt), 0);
		} else {
			insertText(opentag + closetag, opentag.length, closetag.length);

			while(listvalue = prompt('输入一个列表项目.\r\n留空或者点击取消完成此列表.', '')) {
				if(isOpera > 8) {
					listvalue = '\n' + '[*]' + listvalue;
					insertText(listvalue, strlen(listvalue) + 1, 0);
				} else {
					listvalue = '[*]' + listvalue + '\n';
					insertText(listvalue, strlen(listvalue), 0);
				}
			}
		}
	} else if(!isubb && cmd == 'outdent') {
		var sel = getSel();
		sel = stripSimple('indent', sel, 1);
		insertText(sel);
	} else if(cmd == 'createlink') {
		insertlink('createlink');
	}  else if(cmd == 'attach') {
		//interface:uploadAttach();
		try{uploadAttach();}catch(err){}
	} else if(!isubb && cmd == 'unlink') {
		var sel = getSel();
		sel = stripSimple('url', sel);
		sel = stripComplex('url', sel);
		insertText(sel);
	} else if(cmd == 'email') {
		insertlink('email');
	} else if(cmd == 'insertimage') {
		insertlink('insertimage');
	} else if(cmd == 'table') {
		if(isubb) {
			var selection = getSel();
			if(isIE) {
				var pos = getCaret();
			}
			var ctrlid = _eid + '_cmd_table';
			var str = '<p>表格行数: <input type="text" id="' + ctrlid + '_param_rows" size="2" value="2" class="text_css" /> &nbsp; 表格列数: <input type="text" id="' + ctrlid + '_param_columns" size="2" value="2" class="text_css" /></p><p>表格宽度: <input type="text" id="' + ctrlid + '_param_width" size="2" value="" class="text_css" /> &nbsp; 背景颜色: <input type="text" id="' + ctrlid + '_param_bgcolor" size="2" class="text_css" /></p>';
			var div = editorMenu(ctrlid, str);
			$(ctrlid + '_param_rows').focus();
			var params = ['rows', 'columns', 'width', 'bgcolor'];
			for(var i = 0; i < 4; i++) {$(ctrlid + '_param_' + params[i]).onkeydown = editorMenuEvent_onkeydown;}
			$(ctrlid + '_submit').onclick = function() {
				var rows = $(ctrlid + '_param_rows').value;
				var columns = $(ctrlid + '_param_columns').value;
				var width = $(ctrlid + '_param_width').value;
				var bgcolor = $(ctrlid + '_param_bgcolor').value;
				rows = /^[-\+]?\d+$/.test(rows) && rows > 0 && rows <= 30 ? rows : 2;
				columns = /^[-\+]?\d+$/.test(columns) && columns > 0 && columns <= 30 ? columns : 2;
				width = width.substr(width.length - 1, width.length) == '%' ? (width.substr(0, width.length - 1) <= 98 ? width : '98%') : (width <= 560 ? width : '98%');
				bgcolor = /[\(\)%,#\w]+/.test(bgcolor) ? bgcolor : '';
				var html = '<table cellspacing="0" cellpadding="0" width="' + (width ? width : '50%') + '" class="t_table"' + (bgcolor ? ' bgcolor="' + bgcolor + '"' : '') + '>';
				for (var row = 0; row < rows; row++) {
					html += '<tr>\n';
					for (col = 0; col < columns; col++) {
						html += '<td>&nbsp;</td>\n';
					}
					html+= '</tr>\n';
				}
				html += '</table>\n';
				insertText(html);
				hideMenu();
				div.parentNode.removeChild(div);
			}
		}
		return false;
	} else if(cmd == 'floatleft' || cmd == 'floatright') {
		if(isubb) {
			var selection = getSel();
			if(selection) {
				var ret = insertText('<br style="clear: both"><span style="float: ' + cmd.substr(5) + '">' + selection + '</span>', true);
			}
		} else {
			var ret = applyFormat(cmd, false);
		}
	} else if(cmd == 'checklength') {
		checkLength();hideMenu();
	} else if(cmd == 'clearcontent') {
		clearContent();hideMenu();
	} else {
		try {
			var ret = applyFormat(cmd, false, (isUndefined(arg) ? true : arg));
		} catch(e) {
			var ret = false;
		}
	}
	if(in_array(cmd, ['bold', 'italic', 'underline', 'fontname', 'fontsize', 'forecolor', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'floatleft', 'floatright', 'removeformat', 'unlink'])) {
		hideMenu();
	}
	return ret;
}

// 文本选择区域
function getSel() {
	if(isubb) {
		if(isMoz || isOpera) {
			selection = _ewin.getSelection();
			checkFocus();
			range = selection ? selection.getRangeAt(0) : _edoc.createRange();
			return readNodes(range.cloneContents(), false);
		} else {
			var range = _edoc.selection.createRange();
			if(range.htmlText && range.text) {
				return range.htmlText;
			} else {
				var htmltext = '';
				for(var i = 0; i < range.length; i++) {
					htmltext += range.item(i).outerHTML;
				}
				return htmltext;
			}
		}
	} else {
		if(!isUndefined(_edoc.selectionStart)) {
			return _edoc.value.substr(_edoc.selectionStart, _edoc.selectionEnd - _edoc.selectionStart);
		} else if(document.selection && document.selection.createRange) {
			return document.selection.createRange().text;
		} else if(window.getSelection) {
			return window.getSelection() + '';
		} else {
			return false;
		}
	}
}

function insertTextFocus(text){
	if(isubb){
		var tSelection;
		var tRange;
		var tRangeText;
		try
		{
			tSelection = _edoc.selection;
			tRange = tSelection.createRange();
			tRangeText = tRange.text;
		}
		catch(e)
		{
			tSelection = _ewin.getSelection();
			tRange = tSelection.getRangeAt(0);
			tRangeText = tRange.toString();
		}
		try{
			tRange.pasteHTML(text);
		}catch(e){
			_ewin.focus();
			_edoc.execCommand("insertHTML", false, text);
		}
	}else{
		AddText(text);
	}
}

function insertText(text, movestart, moveend, select, sel) {
	if(isubb) {
		if(isMoz || isOpera) {
			applyFormat('removeformat');
			var fragment = _edoc.createDocumentFragment();
			var holder = _edoc.createElement('span');
			holder.innerHTML = text;

			while(holder.firstChild) {
				fragment.appendChild(holder.firstChild);
			}
			insertNodeAtSelection(fragment);
		} else {
			checkFocus();
			if(!isUndefined(_edoc.selection) && _edoc.selection.type != 'Text' && _edoc.selection.type != 'None') {
				movestart = false;
				_edoc.selection.clear();
			}

			if(isUndefined(sel)) {
				sel = _edoc.selection.createRange();
			}

			sel.pasteHTML(text);

			if(text.indexOf('\n') == -1) {
				if(!isUndefined(movestart)) {
					sel.moveStart('character', -strlen(text) + movestart);
					sel.moveEnd('character', -moveend);
				} else if(movestart != false) {
					sel.moveStart('character', -strlen(text));
				}
				if(!isUndefined(select) && select) {
					sel.select();
				}
			}
		}
	} else {
		checkFocus();
		if(!isUndefined(_edoc.selectionStart)) {
			var opn = _edoc.selectionStart + 0;
			_edoc.value = _edoc.value.substr(0, _edoc.selectionStart) + text + _edoc.value.substr(_edoc.selectionEnd);

			if(!isUndefined(movestart)) {
				_edoc.selectionStart = opn + movestart;
				_edoc.selectionEnd = opn + strlen(text) - moveend;
			} else if(movestart !== false) {
				_edoc.selectionStart = opn;
				_edoc.selectionEnd = opn + strlen(text);
			}
		} else if(document.selection && document.selection.createRange) {
			if(isUndefined(sel)) {
				sel = document.selection.createRange();
			}
			sel.text = text.replace(/\r?\n/g, '\r\n');
			if(!isUndefined(movestart)) {
				sel.moveStart('character', -strlen(text) +movestart);
				sel.moveEnd('character', -moveend);
			} else if(movestart !== false) {
				sel.moveStart('character', -strlen(text));
			}
			sel.select();
		} else {
			_edoc.value += text;
		}
	}
}

function stripSimple(tag, str, iterations) {
	var opentag = '[' + tag + ']';
	var closetag = '[/' + tag + ']';

	if(isUndefined(iterations)) {
		iterations = -1;
	}
	while((startindex = stripos(str, opentag)) !== false && iterations != 0) {
		iterations --;
		if((stopindex = stripos(str, closetag)) !== false) {
			var text = str.substr(startindex + opentag.length, stopindex - startindex - opentag.length);
			str = str.substr(0, startindex) + text + str.substr(stopindex + closetag.length);
		} else {
			break;
		}
	}
	return str;
}

function stripComplex(tag, str, iterations) {
	var opentag = '[' + tag + '=';
	var closetag = '[/' + tag + ']';

	if(isUndefined(iterations)) {
		iterations = -1;
	}
	while((startindex = stripos(str, opentag)) !== false && iterations != 0) {
		iterations --;
		if((stopindex = stripos(str, closetag)) !== false) {
			var openend = stripos(str, ']', startindex);
			if(openend !== false && openend > startindex && openend < stopindex) {
				var text = str.substr(openend + 1, stopindex - openend - 1);
				str = str.substr(0, startindex) + text + str.substr(stopindex + closetag.length);
			} else {
				break;
			}
		} else {
			break;
		}
	}
	return str;
}

function stripos(haystack, needle, offset) {
	if(isUndefined(offset)) {
		offset = 0;
	}
	var index = haystack.toLowerCase().indexOf(needle.toLowerCase(), offset);

	return (index == -1 ? false : index);
}

// 切换编辑器模式
function switchEditor(mode) {
	mode = parseInt(mode);
	if(mode == isubb || !_allowSwitch)  {
		return;
	}
	if(!mode) {
		var controlbar = $(_eid + '_controls');
		var controls = new Array();
		var buttons = controlbar.getElementsByTagName('a');
		var buttonslength = buttons.length;
		for(var i = 0; i < buttonslength; i++) {
			if(buttons[i].id) {
				controls[controls.length] = buttons[i].id;
			}
		}
		var controlslength = controls.length;
		for(var i = 0; i < controlslength; i++) {
			var control = $(controls[i]);

			if(control.id.indexOf(_eid + '_cmd_') != -1) {
				control.className = control.id.indexOf(_eid + '_cmd_custom') == -1 ? '' : 'plugeditor';
				control.state = false;
				control.mode = 'normal';
			} else if(control.id.indexOf(_eid + '_popup_') != -1) {
				control.state = false;
			}
		}
	}
	cursor = -1;
	stack = new Array();
	var parsedtext = getEditorContents();
	parsedtext = mode ? bbcode2html(parsedtext) : html2bbcode(parsedtext);
	isubb = mode;
	$(_eid + '_mode').value = mode;
	newEditor(mode, parsedtext);
	_ewin.focus();
	addNullEnd();
}

function insertNodeAtSelection(text) {
	checkFocus();

	var sel = _ewin.getSelection();
	var range = sel ? sel.getRangeAt(0) : _edoc.createRange();
	sel.removeAllRanges();
	range.deleteContents();

	var node = range.startContainer;
	var pos = range.startOffset;

	switch(node.nodeType) {
		case Node.ELEMENT_NODE:
			if(text.nodeType == Node.DOCUMENT_FRAGMENT_NODE) {
				selNode = text.firstChild;
			} else {
				selNode = text;
			}
			node.insertBefore(text, node.childNodes[pos]);
			add_range(selNode);
			break;

		case Node.TEXT_NODE:
			if(text.nodeType == Node.TEXT_NODE) {
				var text_length = pos + text.length;
				node.insertData(pos, text.data);
				range = _edoc.createRange();
				range.setEnd(node, text_length);
				range.setStart(node, text_length);
				sel.addRange(range);
			} else {
				node = node.splitText(pos);
				var selNode;
				if(text.nodeType == Node.DOCUMENT_FRAGMENT_NODE) {
					selNode = text.firstChild;
				} else {
					selNode = text;
				}
				node.parentNode.insertBefore(text, node);
				add_range(selNode);
			}
			break;
	}
}

function add_range(node) {
	checkFocus();
	var sel = _ewin.getSelection();
	var range = _edoc.createRange();
	range.selectNodeContents(node);
	sel.removeAllRanges();
	sel.addRange(range);
}

function readNodes(root, toptag) {
	var html = "";
	var moz_check = /_moz/i;

	switch(root.nodeType) {
		case Node.ELEMENT_NODE:
		case Node.DOCUMENT_FRAGMENT_NODE:
			var closed;
			if(toptag) {
				closed = !root.hasChildNodes();
				html = '<' + root.tagName.toLowerCase();
				var attr = root.attributes;
				for(var i = 0; i < attr.length; ++i) {
					var a = attr.item(i);
					if(!a.specified || a.name.match(moz_check) || a.value.match(moz_check)) {
						continue;
					}
					html += " " + a.name.toLowerCase() + '="' + a.value + '"';
				}
				html += closed ? " />" : ">";
			}
			for(var i = root.firstChild; i; i = i.nextSibling) {
				html += readNodes(i, true);
			}
			if(toptag && !closed) {
				html += "</" + root.tagName.toLowerCase() + ">";
			}
			break;

		case Node.TEXT_NODE:
			html = htmlspecialchars(root.data);
			break;
	}
	return html;
}

function moveCursor(increment) {
	var test = cursor + increment;
	if(test >= 0 && stack[test] != null && !isUndefined(stack[test])) {
		cursor += increment;
	}
}

// 插入media类型标签
function setMediaCode(_eid) {
	insertText('[media='+$(_eid + '_mediatype').value+
		','+$(_eid + '_mediawidth').value+
		','+$(_eid + '_mediaheight').value+
		','+$(_eid + '_mediaautostart').value+']'+
		$(_eid + '_mediaurl').value+'[/media]');
	hideMenu();
}
// 自动判断URL中media类型
function setMediaType(_eid) {
	var ext = $(_eid + '_mediaurl').value.lastIndexOf('.') == -1 ? '' : $(_eid + '_mediaurl').value.substr($(_eid + '_mediaurl').value.lastIndexOf('.') + 1, $(_eid + '_mediaurl').value.length).toLowerCase();
	if(ext == 'rmvb') {
		ext = 'rm';
	}
	if($(_eid + '_mediatyperadio_' + ext)) {
		$(_eid + '_mediatyperadio_' + ext).checked = true;
		$(_eid + '_mediatype').value = ext;
	}
}
// 清空编辑器内容
function clearContent() {
	if(isubb) {
		_edoc.body.innerHTML = isMoz ? '<br />' : '';
	} else {
		textobj.value = '';
	}
}
openEditor();