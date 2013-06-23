<?

 class UBB {

	/**
	 * 是否有上传附件
	 */
	var $hasAttachment = 0;

	/**
	 * @var array $messagecodes [code][/code]内容数据
	 */
	var $messagecodes = array();

	/**
	 * @var array $bbcodes 自定义UBB标签解析
	 */
	var $bbcodes = array();
	
	/**
	 * @var array $faces 表情定义
	 */
	var $faces = array();
	
	/**
	 * @var int $maxfaces 最大表情匹配次数
	 */
	var $maxfaces = 10;

	var $isshowimg=false;

	var $isplaymedia=false;

	/**
	 * 构造函数
	 */
	function ubb() {
		global $cache_settings;
		$this->isshowimg=$cache_settings['isshowimg']=='1';
		$this->isplaymedia=$cache_settings['isplaymedia']=='1';
		$this->messagecodes['pcodecount'] = 0;
		$this->messagecodes['codecount'] =  0;

		$this->faces = array (
		  'searcharray' => array (
			1 => '/\\:\\)/',
			2 => '/\\:\\(/',
			3 => '/\\:D/',
			4 => '/\\:\'\\(/',
			5 => '/\\:@/',
			6 => '/\\:o/',
			7 => '/\\:P/',
			8 => '/\\:\\$/',
			9 => '/;P/',
			10 => '/\\:L/',
			11 => '/\\:Q/',
			12 => '/\\:lol/',
			13 => '/\\:loveliness\\:/',
			14 => '/\\:funk\\:/',
			15 => '/\\:curse\\:/',
			16 => '/\\:dizzy\\:/',
			17 => '/\\:shutup\\:/',
			18 => '/\\:sleepy\\:/',
			19 => '/\\:hug\\:/',
			20 => '/\\:victory\\:/',
			21 => '/\\:nose\\:/',
			22 => '/\\:kiss\\:/',
			23 => '/\\:handshake/',
			24 => '/\\:clap\\:/',
		  ),
		  'replacearray' => 
		  array (
			1 => 'smile.gif',
			2 => 'sad.gif',
			3 => 'biggrin.gif',
			4 => 'cry.gif',
			5 => 'huffy.gif',
			6 => 'shocked.gif',
			7 => 'tongue.gif',
			8 => 'shy.gif',
			9 => 'titter.gif',
			10 => 'sweat.gif',
			11 => 'mad.gif',
			12 => 'lol.gif',
			13 => 'loveliness.gif',
			14 => 'funk.gif',
			15 => 'curse.gif',
			16 => 'dizzy.gif',
			17 => 'shutup.gif',
			18 => 'sleepy.gif',
			19 => 'hug.gif',
			20 => 'victory.gif',
			21 => 'nose.gif',
			22 => 'kiss.gif',
			23 => 'handshake.gif',
			24 => 'clap.gif',
		  ),
		);

		$this->faces['smileytypes'] = array (
			1 => array ('name' => '默认', 'directory' => 'default')
		);

		$this->bbcodes = array (
		  'searcharray' => 
		  array (
			0 => '/\\[fly]([^"\\[]+?)\\[\\/fly\\]/is',
			1 => '/\\[sup]([^"\\[]+?)\\[\\/sup\\]/is',
			2 => '/\\[sub]([^"\\[]+?)\\[\\/sub\\]/is',
		  ),
		  'replacearray' => 
		  array (
			0 => '<marquee width="90%" behavior="alternate" scrollamount="3">\\1</marquee>',
			1 => '<sup>\\1</sup>',
			2 => '<sub>\\1</sub>',
		  ),
		);

		$this->messagecodes['facesreplaced'] = 0;
	}
	
	function codedisp($code) {
		//return "<textarea>".$code."</textarea><br />";
		$this->messagecodes['pcodecount']++;
		$code = htmlspecialchars(str_replace('\\"', '"', preg_replace("/^[\n\r]*(.+?)[\n\r]*$/is", "\\1", $code)));
		$code = str_replace("\n", "<li>", $code);
		$this->messagecodes['codehtml'][$this->messagecodes['pcodecount']] = $this->tpl_codedisp($this->messagecodes, $code);
		$this->messagecodes['codecount']++;
		return "[\t_6K_CODE_{$this->messagecodes[pcodecount]}\t]";
	}

	function tpl_codedisp($messagecodes, $code) {
		$codesid = 'code' . $messagecodes['codecount'];
		$str  = '<div class="blockcode"><div id="code'. $codesid . '"><ol><li>'.$code.'</li></ol></div>';
		//$str .= '<em onclick="copycode($(\''.$codesid.'\'));">复制</em>';
		$str .= '</div>';
		return $str;
	}

	function tpl_quote() {
		return '<div class="view_quote_out"><div class="view_quote"><blockquote>\\1</blockquote></div></div>';
	}

	function ubb2html($message) {		
		$msglower = strtolower($message);
		if(strpos($msglower, '[/code]') !== false) {
			$message = preg_replace("/\s*\[code\](.+?)\[\/code\]\s*/ies", "\$this->codedisp('\\1')", $message);
		}

		$message  = $this->h($message);

		if(strpos($msglower, '[/hide]') !== false) {
			$message = preg_replace("/\[hide\]\s*(.+?)\s*\[\/hide\]/ies", "\$this->parsehide('0','\\1')", $message);
			if(strpos($msglower, '[hide=') !== false) {
				$message = preg_replace("/\[hide=(\d+)\]\s*(.+?)\s*\[\/hide\]/ies", "\$this->parsehide('\\1','\\2')", $message);
			}
		}
		if(strpos($msglower, '[/opento]') !== false) {
			$message = preg_replace("/\[opento=(.+?)\]\s*(.+?)\s*\[\/opento\]/ies", "\$this->parseopento('\\1','\\2')", $message);
		}

		if(strpos($msglower, '[/url]') !== false) {
			$message = preg_replace("/\[url(=((https?|ftp|gopher|news|telnet|rtsp|mms|callto|bctp|ed2k|thunder|synacast){1}:\/\/|www\.)([^\[\"']+?))?\](.+?)\[\/url\]/ies", "\$this->parseurl('\\1', '\\5')", $message);
		}
		if(strpos($msglower, '[/email]') !== false) {
			$message = preg_replace("/\[email(=([a-z0-9\-_.+]+)@([a-z0-9\-_]+[.][a-z0-9\-_.]+))?\](.+?)\[\/email\]/ies", "\$this->parseemail('\\1', '\\4')", $message);
		}
		$message = str_replace(array(
			'[/color]', '[/size]', '[/font]', '[/align]', '[b]', '[/b]',
			'[i=s]', '[i]', '[/i]', '[u]', '[/u]', '[list]', '[list=1]', '[list=a]',
			'[list=A]', '[*]', '[/list]', '[indent]', '[/indent]', '[/float]'
		), array(
			'</font>', '</font>', '</font>', '</p>', '<strong>', '</strong>', '<i class="pstatus">', '<i>',
			'</i>', '<u>', '</u>', '<ul>', '<ul type="1">', '<ul type="a">',
			'<ul type="A">', '<li>', '</ul>', '<blockquote>', '</blockquote>', '</span>'
		), preg_replace(array(
			"/\[color=([#\w]+?)\]/i",
			"/\[size=(\d+?)\]/i",
			"/\[size=(\d+(\.\d+)?(px|pt|in|cm|mm|pc|em|ex|%)+?)\]/i",
			"/\[font=([^\[\<]+?)\]/i",
			"/\[align=(left|center|right)\]/i",
			"/\[float=(left|right)\]/i"

		), array(
			"<font color=\"\\1\">",
			"<font size=\"\\1\">",
			"<font style=\"font-size: \\1\">",
			"<font face=\"\\1 \">",
			"<p align=\"\\1\">",
			"<span style=\"float: \\1;\">"
		), $message));
		$nest = 0;
		while(strpos($msglower, '[table') !== false && strpos($msglower, '[/table]') !== false){
			$message = preg_replace("/\[table(?:=(\d{1,4}%?)(?:,([\(\)%,#\w ]+))?)?\]\s*(.+?)\s*\[\/table\]/ies", "\$this->parsetable('\\1', '\\2', '\\3')", $message);
			if(++$nest > 4) break;
		}

		if(strpos($msglower, '[/quote]') !== false) {
			$message = preg_replace("/\s*\[quote\][\n\r]*(.+?)[\n\r]*\[\/quote\]\s*/is", $this->tpl_quote(), $message);
		}

		if(strpos($msglower, '[/imgfile]') !== false) {
			$message = preg_replace("/\s*\[imgfile\](\d+?)\[\/imgfile\]\s*/ies", "\$this->parsefile('\\1','\\0')", $message);
		}
		if(strpos($msglower, '[/attachimg]') !== false) {
			$message = preg_replace("/\s*\[attachimg\](\d+?)\[\/attachimg\]\s*/ies", "\$this->parsefile('\\1','\\0')", $message);
		}

		if(strpos($msglower, '[/file]') !== false) {
			$message = preg_replace("/\s*\[file\](\d+?)\[\/file\]\s*/ies", "\$this->parsefile('\\1','\\0')", $message);
		}
		if(strpos($msglower, '[/attach]') !== false) {
			$message = preg_replace("/\s*\[attach\](\d+?)\[\/attach\]\s*/ies", "\$this->parsefile('\\1','\\0')", $message);
		}

		if(strpos($msglower, '[/media]') !== false) {
			$message = preg_replace("/\[media=(\w{1,4}),(\d{1,4}),(\d{1,4}),(\d)\]\s*([^\[\<\r\n]+?)\s*\[\/media\]/ies", $this->isplaymedia ? "\$this->parsemedia('\\1', \\2, \\3, \\4, '\\5')" : "\$this->bbcodeurl('\\5', ' <span class=\"ext_small ext_small_media\"><a href=\"%s\" target=\"_blank\">%s</a></span> ')", $message);
		}

		if(is_array($this->faces)) {
			if(!$this->messagecodes['facesreplaced']) {
				foreach($this->faces['replacearray'] as $key => $smiley) {
					$this->faces['replacearray'][$key] = '<img src="inc/editor/ubb/images/faces/default/'.$smiley.'" smilieid="'.$key.'" border="0" alt="" />';
				}
				$this->messagecodes['facesreplaced'] = 1;
			}
			$message = preg_replace($this->faces['searcharray'], $this->faces['replacearray'], $message, $this->maxfaces);
		}

		if($this->bbcodes) {
			$message = preg_replace($this->bbcodes['searcharray'], $this->bbcodes['replacearray'], $message);
		}

		
		if(strpos($msglower, '[swf]') !== false) {
			$message = preg_replace("/\[swf\]\s*([^\[\<\r\n]+?)\s*\[\/swf\]/ies", $this->isplaymedia ? "\$this->parseflash('\\1')" :"\$this->bbcodeurl('\\1', ' <span class=\"ext_small ext_small_swf\"><a href=\"%s\" target=\"_blank\">Flash: %s</a></span> ')", $message);
		}
		
		if(strpos($msglower, '[flash]') !== false) {
			$message = preg_replace("/\[flash\]\s*([^\[\<\r\n]+?)\s*\[\/flash\]/ies", $this->isplaymedia ? "\$this->parseflash('\\1')" :"\$this->bbcodeurl('\\1', ' <span class=\"ext_small ext_small_swf\"><a href=\"%s\" target=\"_blank\">Flash: %s</a></span> ')", $message);
		}

		if(strpos($msglower, '[/img]') !== false) {
			$message = preg_replace(array(
				"/\[img\]\s*([^\[\<\r\n]+?)\s*\[\/img\]/ies",
				"/\[img=(\d{1,4})[x|\,](\d{1,4})\]\s*([^\[\<\r\n]+?)\s*\[\/img\]/ies"
			), $this->isshowimg ? array(
				"\$this->bbcodeurl('\\1', '<img src=\"%s\" alt=\"\" onload=\"checkImgWidth(this)\" />')",
				"\$this->bbcodeurl('\\3', '<img width=\"\\1\" height=\"\\2\" src=\"%s\" border=\"0\" alt=\"\" onload=\"checkImgWidth(this)\" />')"
			) : array(
				"\$this->bbcodeurl('\\1', ' <span class=\"ext_small ext_small_img\"><a href=\"%s\" target=\"_blank\">%s</a></span>')",
				"\$this->bbcodeurl('\\3', ' <span class=\"ext_small ext_small_img\"><a href=\"%s\" target=\"_blank\">%s</a></span>')"
			), $message);
		}
		
		if (isset($this->messagecodes['pcodecount']) && $this->messagecodes['pcodecount']>0){
		for($i = 0; $i <= $this->messagecodes['pcodecount']; $i++) {
			$message = str_replace("[\t_6K_CODE_$i\t]", $this->messagecodes['codehtml'][$i], $message);
		}	
		}
		unset($msglower);

		return nl2br(str_replace(array("\t", '   ', '  '), array('&nbsp; &nbsp; &nbsp; &nbsp; ', '&nbsp; &nbsp;', '&nbsp;&nbsp;'), $message));
	}

	function parseurl($url, $text) {
		if(!$url && preg_match("/((https?|ftp|gopher|news|telnet|rtsp|mms|callto|bctp|ed2k|thunder|synacast){1}:\/\/|www\.)[^\[\"']+/i", trim($text), $matches)) {
			$url = $matches[0];
			$length = 65;
			if(strlen($url) > $length) {
				$text = substr($url, 0, intval($length * 0.5)).' ... '.substr($url, - intval($length * 0.3));
			}
			return '<a href="'.(substr(strtolower($url), 0, 4) == 'www.' ? 'http://'.$url : $url).'" target="_blank">'.$text.'</a>';
		} else {
			$url = substr($url, 1);
			if(substr(strtolower($url), 0, 4) == 'www.') {
				$url = 'http://'.$url;
			}
			return '<a href="'.$url.'" target="_blank">'.$text.'</a>';
		}
	}

	function parseflash($src){
		return '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="550" height="400"><param name="allowScriptAccess" value="sameDomain"><param name="movie" value="'.$src.'"><param name="quality" value="high"><param name="bgcolor" value="#ffffff"><embed src="'.$src.'" quality="high" bgcolor="#ffffff" width="550" height="400" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></object>';
	}

	function parsehide($c,$hidestr){
		global $db;
		global $lg;
		global $tid;
		global $fid;
		global $cache_settings;
		$str='';
		if(intval($c)==0){
			$canview=false;
			if(self::isForumAdmin($fid)){
				$canview=true;
			}
			elseif($lg['userid']>0){
				$row=$db->row_select_one("posts","tid={$tid} and userid={$lg['userid']}","id");
				$canview=!empty($row);
			}
			$str=$canview?"<div class=\"view_nohide\"><div class=\"hidetitle\">本帖的以下内容需要回复才可浏览</div><div class=\"hidecontent\">{$hidestr}</div></div>":"<div class=\"view_hide\"><div class=\"hidetitle\">本帖的隐藏内容需要回复才可浏览</div></div>";	
		}elseif(intval($c)>0){
			$canview=false;
			if(self::isForumAdmin($fid)){
				$canview=true;
			}elseif($lg['userid']>0){
				$row=$db->row_select_one("users","id={$lg['userid']}");
				$allmark=getAllCredits($cache_settings['creditsexpression'], $row);
				if($allmark>=$c){
					$canview=true;
				}
			}		
			$str=$canview?"<div class=\"view_nohide\"><div class=\"hidetitle\">本帖的以下内容需要积分高于 {$c} 才可浏览</div><div class=\"hidecontent\">{$hidestr}</div></div>":"<div class=\"view_hide\"><div class=\"hidetitle\">本帖的隐藏内容需要积分高于 {$c} 才可浏览 </div></div>";	
		}
		return $str;
	}
	function isForumAdmin($fid){
		return false;
	}
	function parseopento($users,$hidestr){
		global $lg;
		global $fid;
		global $topic;
		$str='';
		if(intval($c)==0){
			$canview=false;
			if(self::isForumAdmin($fid)){
				$canview=true;
			}
			elseif($lg['userid']==$topic['userid']){
				$canview=true;
			}
			elseif($lg['userid']>0){
				if(stristr(",{$users},", ",{$lg['username']},")){
					$canview=true;
				}
			}
			$str=$canview?"<div class=\"view_nohide\"><div class=\"hidetitle\">本帖的以下内容只开放给用户{$users}浏览</div><div class=\"hidecontent\">{$hidestr}</div></div>":"<div class=\"view_hide\"><div class=\"hidetitle\">本帖的隐藏内容只开放给用户{$users}浏览</div></div>";	
		}
		return $str;
	}

	function parsefile($fileid,$oldstr) {
		global $db;
		global $tid;
		global $postid;
		$str=$oldstr;
		$fileid=intval($fileid);
		if(empty($fileid)){
			return $str;
		}
		if(getPopedom(13)==0){
			if($this->hasAttachment==0){
				//$this->hasAttachment=1;
				return '<div style="font-size:12px; font-style:Italic;">附件:您所在的用户组没有权限查看该附件。</div>';
			}
			return '';
		}

		$row=$db->row_select_one("attachments","id={$fileid} and tid={$tid}");
		if(empty($row)){
			return $str;
		}

		$fs=pathinfo($row['filename']);
		$fs['extension'] = strtolower($fs['extension']);
		if($row['type']==1 && $this->isshowimg ){
			//图片
			$str="<div class=\"view_file\"><a href=\"uploadfile/attachment/{$row['filepath']}\" target=\"_blank\" title=\"点击在新窗口打开\"><img src=\"uploadfile/attachment/{$row['filepath']}\" border=\"0\" ".($row['imgwidth']>640?"width=\"640px\"":"")." /></a></div>";
		}else{
			//普通附件
			$extarr = array(
				'pdf'=> 'pdf',	
				'ppt'=> 'ppt',
				'doc'=> 'doc',
				'mp3'=> 'media',
				'wmv'=> 'media',
				'mpeg'=> 'media',
				'mp4'=> 'media',
				'rm'=> 'media',
				'rmvb'=> 'media',
				'wav'=> 'media',
				'html'=> 'htm',	
				'htm'=> 'htm',	
				'swf'=> 'swf',
				'fla'=> 'swf',
				'flv'=> 'swf',
				'xls'=> 'xls',
				'txt'=> 'txt',
				'gif'=> 'img',
				'jpg'=> 'img',
				'jpeg'=> 'img',
				'png'=> 'img',
				'bmp'=> 'img',
				'zip'=> 'package',
				'rar'=> 'package',
				'7z'=> 'package',
				'gz'=> 'package',
				'tar'=> 'package',
			);
			$extimg = $extarr[$fs['extension']];
			$extimg = empty($extimg)?"txt":$extimg;
			$str="<div class=\"view_file\"><span class=\"ext_small ext_small_{$extimg}\"><a href=\"attachment.php?id={$row['id']}\" target=\"_blank\" title=\"点击在新窗口打开\">{$fs['basename']}</a></span></div>";
		}
		return $str;
	}

	function parseemail($email, $text) {
		if(!$email && preg_match("/\s*([a-z0-9\-_.+]+)@([a-z0-9\-_]+[.][a-z0-9\-_.]+)\s*/i", $text, $matches)) {
			$email = trim($matches[0]);
			return '<a href="mailto:'.$email.'">'.$email.'</a>';
		} else {
			return '<a href="mailto:'.substr($email, 1).'">'.$text.'</a>';
		}
	}

	function parsetable($width, $bgcolor, $message) {
		if(!preg_match("/^\[tr(?:=([\(\)%,#\w]+))?\]\s*\[td(?:=(\d{1,2}),(\d{1,2})(?:,(\d{1,4}%?))?)?\]/", $message) && !preg_match("/^<tr[^>]*?>\s*<td[^>]*?>/", $message)) {
			return str_replace('\\"', '"', preg_replace("/\[tr(?:=([\(\)%,#\w]+))?\]|\[td(?:=(\d{1,2}),(\d{1,2})(?:,(\d{1,4}%?))?)?\]|\[\/td\]|\[\/tr\]/", '', $message));
		}
		if(substr($width, -1) == '%') {
			$width = substr($width, 0, -1) <= 98 ? intval($width).'%' : '98%';
		} else {
			$width = intval($width);
			$width = $width ? ($width <= 560 ? $width.'px' : '98%') : '';
		}
		return '<table cellspacing="0" class="t_table" '.
			($width == '' ? NULL : 'style="width:'.$width.'"').
			($bgcolor ? ' bgcolor="'.$bgcolor.'">' : '>').
			str_replace('\\"', '"', preg_replace(array(
					"/\[tr(?:=([\(\)%,#\w]+))?\]\s*\[td(?:=(\d{1,2}),(\d{1,2})(?:,(\d{1,4}%?))?)?\]/ie",
					"/\[\/td\]\s*\[td(?:=(\d{1,2}),(\d{1,2})(?:,(\d{1,4}%?))?)?\]/ie",
					"/\[\/td\]\s*\[\/tr\]/i"
				), array(
					"\$this->parsetrtd('\\1', '\\2', '\\3', '\\4')",
					"\$this->parsetrtd('td', '\\1', '\\2', '\\3')",
					'</td></tr>'
				), $message)
			).'</table>';
	}

	function parsetrtd($bgcolor, $colspan, $rowspan, $width) {
		return ($bgcolor == 'td' ? '</td>' : '<tr'.($bgcolor ? ' bgcolor="'.$bgcolor.'"' : '').'>').'<td'.($colspan > 1 ? ' colspan="'.$colspan.'"' : '').($rowspan > 1 ? ' rowspan="'.$rowspan.'"' : '').($width ? ' width="'.$width.'"' : '').'>';
	}

	function parsemedia($type, $width, $height, $autostart, $url) {
		if(in_array($type, array('ra', 'rm', 'wma', 'wmv', 'mp3', 'mov'))) {
			$url = str_replace(array('<', '>'), '', str_replace('\\"', '\"', $url));
			$mediaid = 'media_'.mt_rand(0,10);
			switch($type) {
				case 'ra'	: return '<object classid="clsid:CFCDAA03-8BE4-11CF-B84B-0020AFBBCCFA" width="'.$width.'" height="32"><param name="autostart" value="'.$autostart.'" /><param name="src" value="'.$url.'" /><param name="controls" value="controlpanel" /><param name="console" value="'.$mediaid.'_" /><embed src="'.$url.'" type="audio/x-pn-realaudio-plugin" controls="ControlPanel" '.($autostart ? 'autostart="true"' : '').' console="'.$mediaid.'_" width="'.$width.'" height="32"></embed></object>';break;
				case 'rm'	: return '<object classid="clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA" width="'.$width.'" height="'.$height.'"><param name="autostart" value="'.$autostart.'" /><param name="src" value="'.$url.'" /><param name="controls" value="imagewindow" /><param name="console" value="'.$mediaid.'_" /><embed src="'.$url.'" type="audio/x-pn-realaudio-plugin" controls="IMAGEWINDOW" console="'.$mediaid.'_" width="'.$width.'" height="'.$height.'"></embed></object><br /><object classid="clsid:CFCDAA03-8BE4-11CF-B84B-0020AFBBCCFA" width="'.$width.'" height="32"><param name="src" value="'.$url.'" /><param name="controls" value="controlpanel" /><param name="console" value="'.$mediaid.'_" /><embed src="'.$url.'" type="audio/x-pn-realaudio-plugin" controls="ControlPanel" '.($autostart ? 'autostart="true"' : '').' console="'.$mediaid.'_" width="'.$width.'" height="32"></embed></object>';break;
				case 'wma'	: return '<object classid="clsid:6BF52A52-394A-11d3-B153-00C04F79FAA6" width="'.$width.'" height="64"><param name="autostart" value="'.$autostart.'" /><param name="url" value="'.$url.'" /><embed src="'.$url.'" autostart="'.$autostart.'" type="audio/x-ms-wma" width="'.$width.'" height="64"></embed></object>';break;
				case 'wmv'	: return '<object classid="clsid:6BF52A52-394A-11d3-B153-00C04F79FAA6" width="'.$width.'" height="'.$height.'"><param name="autostart" value="'.$autostart.'" /><param name="url" value="'.$url.'" /><embed src="'.$url.'" autostart="'.$autostart.'" type="video/x-ms-wmv" width="'.$width.'" height="'.$height.'"></embed></object>';break;
				case 'mp3'	: return '<object classid="clsid:6BF52A52-394A-11d3-B153-00C04F79FAA6" width="'.$width.'" height="64"><param name="autostart" value="'.$autostart.'" /><param name="url" value="'.$url.'" /><embed src="'.$url.'" autostart="'.$autostart.'" type="application/x-mplayer2" width="'.$width.'" height="64"></embed></object>';break;
				case 'mov'	: return '<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" width="'.$width.'" height="'.$height.'"><param name="autostart" value="'.($autostart ? 'true' : 'false').'" /><param name="src" value="'.$url.'" /><embed controller="true" width="'.$width.'" height="'.$height.'" src="'.$url.'" autostart="'.($autostart ? 'true' : 'false').'"></embed></object>';break;
			}
		}
		return;
	}

	function bbcodeurl($url, $tags) {
		if(!preg_match("/<.+?>/s", $url)) {
			if(!in_array(strtolower(substr($url, 0, 6)), array('http:/', 'https:', 'ftp://', 'rtsp:/', 'mms://'))) {
				$url = 'http://'.$url;
			}
			return str_replace(array('submit', 'logout.php', 'ajaxadmin.php'), array('', '', ''), sprintf($tags, $url, addslashes($url)));
		} else {
			return '&nbsp;'.$url;
		}
	}

	function h($string) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = $this->h($val);
			}
		} else {
			$string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/', '&\\1',
			str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string));
		}
		return $string;
	}

	function removeubb($str){
		$deltag = 'b|i|u|p|color|size|font|align|list|indent|float|sub|sup|fly';
		$delall = 'url|email|code|table|tr|td|img|swf|flash|imgfile|file|media|audio|hide';
		$str=strip_tags(
			preg_replace(
			array(
				"/\[quote](.*?)\[\/quote]/si",
				"/\[($delall)=?.*?\].+?\[\/\\1\]/si",
				"/\[($deltag)=?.*?\]/i",
				"/\[\/($deltag)\]/i",
			),
			array(
				'',
				'',
				'',
				''
			),
			$str)
		);
		return $str;
	}
}

$ubb = new UBB();

?>