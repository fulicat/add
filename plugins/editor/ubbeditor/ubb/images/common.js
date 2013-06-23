var fmt = new Array();	//6K:文本标签

//6K:浏览器判断
var userAgent = navigator.userAgent.toLowerCase();
var isOpera = userAgent.indexOf('opera') != -1 && opera.version();
var isMoz = (navigator.product == 'Gecko') && userAgent.substr(userAgent.indexOf('firefox') + 8, 3);
var isChr = userAgent.indexOf("chrome") > -1;
var isIE = (userAgent.indexOf('msie') != -1 && !isOpera) && userAgent.substr(userAgent.indexOf('msie') + 5, 3);
var isMac = userAgent.indexOf('mac') != -1;

//6K: Fix Prototype
if(isMoz && window.HTMLElement) {
	HTMLElement.prototype.__defineSetter__('outerHTML', function(sHTML) {
        	var r = this.ownerDocument.createRange();
		r.setStartBefore(this);
		var df = r.createContextualFragment(sHTML);
		this.parentNode.replaceChild(df,this);
		return sHTML;
	});

	HTMLElement.prototype.__defineGetter__('outerHTML', function() {
		var attr;
		var attrs = this.attributes;
		var str = '<' + this.tagName.toLowerCase();
		for(var i = 0;i < attrs.length;i++){
			attr = attrs[i];
			if(attr.specified)
			str += ' ' + attr.name + '="' + attr.value + '"';
		}
		if(!this.canHaveChildren) {
			return str + '>';
		}
		return str + '>' + this.innerHTML + '</' + this.tagName.toLowerCase() + '>';
        });

	HTMLElement.prototype.__defineGetter__('canHaveChildren', function() {
		switch(this.tagName.toLowerCase()) {
			case 'area':case 'base':case 'basefont':case 'col':case 'frame':case 'hr':case 'img':case 'br':case 'input':case 'isindex':case 'link':case 'meta':case 'param':
			return false;
        	}
		return true;
	});
	HTMLElement.prototype.click = function(){
		var evt = this.ownerDocument.createEvent('MouseEvents');
		evt.initMouseEvent('click', true, true, this.ownerDocument.defaultView, 1, 0, 0, 0, 0, false, false, false, false, 0, null);
		this.dispatchEvent(evt);
	}
}

//6K:定义$函数
function $(elementid) {
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

//6K: 完成之后的动作
function doAfter(evt) {
	e = evt ? evt : window.event;
	if(isIE) {
		e.returnValue = false;
		e.cancelBubble = true;
	} else if(e) {
		e.stopPropagation();
		e.preventDefault();
	}
}

//6K: 判断一个元素是否在数组中
function in_array(value, arr) {
	if(typeof value == 'string' || typeof value == 'number') {
		for(var i in arr) {
			if(arr[i] == value) {
					return true;
			}
		}
	}
	return false;
}

//6K:是否未定义
function isUndefined(v) {
	return typeof v == 'undefined' ? true : false;
}

//6K: 取得字节长度
function getBytesLength(str) {
	var len = 0;
	for(var i = 0; i < str.length; i++) {
		len += str.charCodeAt(i) < 0 || str.charCodeAt(i) > 255 ? (charset == 'utf-8' ? 3 : 2) : 1;
	}
	return len;
}

//6K:字符长度
function strlen(str) {
	return (isIE && str.indexOf('\n') != -1) ? str.replace(/\r?\n/g, '_').length : str.length;
}

//6K: 删除字符串两边的空格
function trim(str) {
	return (str + '').replace(/(\s+)$/g, '').replace(/^\s+/g, '');
}

//6K:绑定事件
function _attachEvent(obj, evt, func, eventobj) {
	eventobj = !eventobj ? obj : eventobj;
	if(obj.addEventListener) {
		obj.addEventListener(evt, func, false);
	} else if(eventobj.attachEvent) {
		obj.attachEvent("on" + evt, func);
	}
}

var jsmenu = new Array();
var ctrlobjclassName;
jsmenu['active'] = new Array();
jsmenu['timer'] = new Array();
jsmenu['iframe'] = new Array();

function initCtrl(ctrlobj, click, duration, timeout, layer) {
	if(ctrlobj && !ctrlobj.inited) {
		ctrlobj.inited = true;
		ctrlobj.unselectable = true;

		ctrlobj.outfunc = typeof ctrlobj.onmouseout == 'function' ? ctrlobj.onmouseout : null;
		ctrlobj.onmouseout = function() {
			if(this.outfunc) this.outfunc();
			if(duration < 3) jsmenu['timer'][ctrlobj.id] = setTimeout('hideMenu(' + layer + ')', timeout);
		}

		ctrlobj.overfunc = typeof ctrlobj.onmouseover == 'function' ? ctrlobj.onmouseover : null;
		ctrlobj.onmouseover = function(e) {
			doAfter(e);
			if(this.overfunc) this.overfunc();
			if(click) {
				clearTimeout(jsmenu['timer'][this.id]);
			} else {
				for(var id in jsmenu['timer']) {
					if(jsmenu['timer'][id]) clearTimeout(jsmenu['timer'][id]);
				}
			}
		}
	}
}

function initMenu(ctrlid, menuobj, duration, timeout, layer, drag) {
	if(menuobj && !menuobj.inited) {
		menuobj.inited = true;
		menuobj.ctrlkey = ctrlid;
		menuobj.onclick = moClick;
		menuobj.style.position = 'absolute';
		if(duration < 3) {
			if(duration > 1) {
				menuobj.onmouseover = function() {
					clearTimeout(jsmenu['timer'][ctrlid]);
				}
			}
			if(duration != 1) {
				menuobj.onmouseout = function() {
					jsmenu['timer'][ctrlid] = setTimeout('hideMenu(' + layer + ')', timeout);
				}
			}
		}
		menuobj.style.zIndex = 999;
		if(drag) {
			menuobj.onmousedown = function(event) {try{menudrag(menuobj, event, 1);}catch(e){}};
			menuobj.onmousemove = function(event) {try{menudrag(menuobj, event, 2);}catch(e){}};
			menuobj.onmouseup = function(event) {try{menudrag(menuobj, event, 3);}catch(e){}};
		}
	}
}

var menudragstart = new Array();
function menudrag(menuobj, e, op) {
	if(op == 1) {
		if(in_array(isIE ? event.srcElement.tagName : e.target.tagName, ['TEXTAREA', 'INPUT', 'BUTTON', 'SELECT'])) {
			return;
		}
		menudragstart = isIE ? [event.clientX, event.clientY] : [e.clientX, e.clientY];
		menudragstart[2] = parseInt(menuobj.style.left);
		menudragstart[3] = parseInt(menuobj.style.top);
		doAfter(e);
	} else if(op == 2 && menudragstart[0]) {
		var menudragnow = isIE ? [event.clientX, event.clientY] : [e.clientX, e.clientY];
		menuobj.style.left = (menudragstart[2] + menudragnow[0] - menudragstart[0]) + 'px';
		menuobj.style.top = (menudragstart[3] + menudragnow[1] - menudragstart[1]) + 'px';
		doAfter(e);
	} else if(op == 3) {
		menudragstart = [];
		doAfter(e);
	}
}

function showMenu(ctrlid, click, offset, duration, timeout, layer, showid, maxh, drag) {
	var ctrlobj = $(ctrlid);
	if(!ctrlobj) return;
	if(isUndefined(click)) click = false;
	if(isUndefined(offset)) offset = 0;
	if(isUndefined(duration)) duration = 2;
	if(isUndefined(timeout)) timeout = 250;
	if(isUndefined(layer)) layer = 0;
	if(isUndefined(showid)) showid = ctrlid;
	var showobj = $(showid);
	var menuobj = $(showid + '_menu');
	if(!showobj|| !menuobj) return;
	if(isUndefined(maxh)) maxh = 400;
	if(isUndefined(drag)) drag = false;

	if(click && jsmenu['active'][layer] == menuobj) {
		hideMenu(layer);
		return;
	} else {
		hideMenu(layer);
	}

	var len = jsmenu['timer'].length;
	if(len > 0) {
		for(var i=0; i<len; i++) {
			if(jsmenu['timer'][i]) clearTimeout(jsmenu['timer'][i]);
		}
	}

	initCtrl(ctrlobj, click, duration, timeout, layer);
	ctrlobjclassName = ctrlobj.className;
	ctrlobj.className += ' hover';
	initMenu(ctrlid, menuobj, duration, timeout, layer, drag);

	menuobj.style.display = '';
	if(!isOpera) {
		menuobj.style.clip = 'rect(auto, auto, auto, auto)';
	}

	setMenuPosition(showid, offset);

	if(maxh && menuobj.scrollHeight > maxh) {
		menuobj.style.height = maxh + 'px';
		if(isOpera) {
			menuobj.style.overflow = 'auto';
		} else {
			menuobj.style.overflowY = 'auto';
		}
	}

	if(!duration) {
		setTimeout('hideMenu(' + layer + ')', timeout);
	}

	jsmenu['active'][layer] = menuobj;
}

function setMenuPosition(showid, offset) {
	var showobj = $(showid);
	var menuobj = $(showid + '_menu');
	if(isUndefined(offset)) offset = 0;
	if(showobj) {
		showobj.pos = fetchOffset(showobj);
		showobj.X = showobj.pos['left'];
		showobj.Y = showobj.pos['top'];
		if($(inMenuCtn) != null) {
			var inMenuCtne = inMenuCtn.split('_');
			if(!floatwinhandle[inMenuCtne[1] + '_1']) {
				float_winpos = fetchOffset($('float_win'));
				floatwinhandle[inMenuCtne[1] + '_1'] = float_winpos['left'];
				floatwinhandle[inMenuCtne[1] + '_2'] = float_winpos['top'];
			}
			showobj.X = showobj.X - $(inMenuCtn).scrollLeft - parseInt(floatwinhandle[inMenuCtne[1] + '_1']);
			showobj.Y = showobj.Y - $(inMenuCtn).scrollTop - parseInt(floatwinhandle[inMenuCtne[1] + '_2']);
			inMenuCtn = '';
		}
		showobj.w = showobj.offsetWidth;
		showobj.h = showobj.offsetHeight;
		menuobj.w = menuobj.offsetWidth;
		menuobj.h = menuobj.offsetHeight;
		if(offset < 3) {
			menuobj.style.left = (showobj.X + menuobj.w > document.body.clientWidth) && (showobj.X + showobj.w - menuobj.w >= 0) ? showobj.X + showobj.w - menuobj.w + 'px' : showobj.X + 'px';
			menuobj.style.top = offset == 1 ? showobj.Y + 'px' : (offset == 2 || ((showobj.Y + showobj.h + menuobj.h > document.documentElement.scrollTop + document.documentElement.clientHeight) && (showobj.Y - menuobj.h >= 0)) ? (showobj.Y - menuobj.h) + 'px' : showobj.Y + showobj.h + 'px');
		} else if(offset == 3) {
			menuobj.style.left = (document.body.clientWidth - menuobj.clientWidth) / 2 + document.body.scrollLeft + 'px';
			menuobj.style.top = (document.body.clientHeight - menuobj.clientHeight) / 2 + document.body.scrollTop + 'px';
		}
		
		if(menuobj.style.clip && !isOpera) {
			menuobj.style.clip = 'rect(auto, auto, auto, auto)';
		}
	}
}

function hideMenu(layer) {
	if(isUndefined(layer)) layer = 0;
	if(jsmenu['active'][layer]) {
		try {
			$(jsmenu['active'][layer].ctrlkey).className = ctrlobjclassName;
		} catch(e) {}
		clearTimeout(jsmenu['timer'][jsmenu['active'][layer].ctrlkey]);
		jsmenu['active'][layer].style.display = 'none';
		if(isIE && isIE < 7 && jsmenu['iframe'][layer]) {
			jsmenu['iframe'][layer].style.display = 'none';
		}
		jsmenu['active'][layer] = null;
	}
}

function fetchOffset(obj) {
	var left_offset = obj.offsetLeft;
	var top_offset = obj.offsetTop;
	while((obj = obj.offsetParent) != null) {
		left_offset += obj.offsetLeft;
		top_offset += obj.offsetTop;
	}
	return { 'left' : left_offset, 'top' : top_offset };
}

function moClick(eventobj) {
	if(!eventobj || isIE) {
		window.event.cancelBubble = true;
		return window.event;
	} else {
		if(eventobj.target.type == 'submit') {
			eventobj.target.form.submit();
		}
		eventobj.stopPropagation();
		return eventobj;
	}
}


//FloatWin
var hiddenobj = new Array();
var floatwinhandle = new Array();
var floatscripthandle = new Array();
var floattabs = new Array();
var floatwins = new Array();
var inMenuCtn = '';
var floatwinreset = 0;
var floatwinopened = 0;


//Smilies
function faces_show(id, smcols, seditorkey) {
	if(seditorkey && !$(seditorkey + 'faces_menu')) {
		var div = document.createElement("div");
		div.id = seditorkey + 'faces_menu';
		div.style.display = 'none';
		div.className = 'faceslist';
		$('append_parent').appendChild(div);
		var div = document.createElement("div");
		div.id = id;
		div.style.overflow = 'hidden';
		$(seditorkey + 'faces_menu').appendChild(div);
	}
	if(typeof faces_type == 'undefined') {
		if(isIE) {
			scriptNode.onreadystatechange = function() {
				faces_onload(id, smcols, seditorkey);
			}
		} else {
			scriptNode.onload = function() {
				faces_onload(id, smcols, seditorkey);
			}
		}
	} else {
		faces_onload(id, smcols, seditorkey);
	}
}

var currentstype = null;
function faces_onload(id, smcols, seditorkey) {
	if(typeof faces_type != 'undefined') {
		currentstype = 1;
		facestype = '';
		$(id).innerHTML = facestype + '<div style="clear: both" class="float_typeid" id="' + id + '_data"></div><table class="faceslist_table" id="' + id + '_preview_table" style="display: none"><tr><td class="faceslist_preview" id="' + id + '_preview"></td></tr></table><div style="clear: both" class="faceslist_page" id="' + id + '_page"></div>';
		faces_switch(id, smcols, 1, 1,  seditorkey);
	}
}

function faces_switch(id, smcols, type, page, seditorkey) {
	type = type? type : 1;
	page = page ? page : 1;
	facesdata = '<table id="' + id + '_table" cellpadding="0" cellspacing="0" style="clear: both"><tr>';
	j = 0;
	for(i in faces_array[type][page]) {
		if(j >= smcols) {
			facesdata += '<tr>';
			j = 0;
		}
		s = faces_array[type][page][i];
		facesdata += s && s[0] ? '<td onmouseover="faces_preview(\'' + id + '\', this, ' + s[5] + ')" onmouseout="faces_preview(\'' + id + '\')" onclick="insertSmiley(' + s[0] + ')"><img id="smilie_' + s[0] + '" width="' + s[3] +'" height="' + s[4] +'" src="images/faces/' + faces_type[type][1] + '/' + s[2] + '" alt="' + s[1] + '" />' : '<td>';
		j++;
	}
	facesdata += '</table>';
	facespage = '';
	if(faces_array[type].length > 1) {
		prevpage = ((prevpage = parseInt(page) - 1) < 1) ? faces_array[type].length - 1 : prevpage;
		nextpage = ((nextpage = parseInt(page) + 1) == faces_array[type].length) ? 1 : nextpage;
		facespage = '<div class="pags_act"><a href="javascript:;" onclick="faces_switch(\'' + id + '\', \'' + smcols + '\', ' + type + ', ' + prevpage + ', \'' + seditorkey + '\')">上页</a>' +
			'<a href="javascript:;" onclick="faces_switch(\'' + id + '\', \'' + smcols + '\', ' + type + ', ' + nextpage + ', \'' + seditorkey + '\')">下页</a></div>' +
			page + '/' + (faces_array[type].length - 1);
	}

	$(id + '_data').innerHTML = facesdata;
	$(id + '_page').innerHTML = facespage;
}

function faces_preview(id, obj, v) {
	if(!obj) {
		$(id + '_preview_table').style.display = 'none';
	} else {
		$(id + '_preview_table').style.display = '';
		$(id + '_preview').innerHTML = '<img width="' + v + '" src="' + obj.childNodes[0].src + '" />';
	}
}

//表情
var faces_type = new Array();
faces_type[1] = ['默认', 'default'];
var faces_array = new Array();
faces_array[1] = new Array();
faces_array[1][1] = [
['1', ':)','smile.gif','24','24','20'],
['2', ':(','sad.gif','24','24','20'],
['3', ':D','biggrin.gif','24','24','20'],
['4', ':\'(','cry.gif','24','24','20'],
['5', ':@','huffy.gif','24','24','20'],
['6', ':o','shocked.gif','24','24','20'],
['7', ':P','tongue.gif','24','24','20'],
['8', ':$','shy.gif','24','24','20'],
['9', ';P','titter.gif','24','24','20'],
['10', ':L','sweat.gif','24','24','20'],
['11', ':Q','mad.gif','24','24','20'],
['12', ':lol','lol.gif','24','24','20'],
['13', ':loveliness:','loveliness.gif','24','24','20'],
['14', ':funk:','funk.gif','24','24','20'],
['15', ':curse:','curse.gif','24','24','20'],
['16', ':dizzy:','dizzy.gif','24','24','20'],
['17', ':shutup:','shutup.gif','24','24','20'],
['18', ':sleepy:','sleepy.gif','24','24','20'],
['19', ':hug:','hug.gif','24','24','20'],
['20', ':victory:','victory.gif','24','24','20'],
['21', ':nose:','nose.gif','24','24','20'],
['22', ':kiss:','kiss.gif','24','24','20'],
['23', ':handshake','handshake.gif','24','24','20'],
['24', ':clap:','clap.gif','24','24','20']
];