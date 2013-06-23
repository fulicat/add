<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editor</title>
<link rel="stylesheet" type="text/css" href="images/style.css" />
<script type="text/javascript">
var charset = 'utf-8';
var in_container = 'editor_float';
</script>
</head>
<body onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div>
<div id="wrap" class="wrap s_clear">
	<div class="main">
		<div class="float_out">
			<div id="float_win">
				<div class="float" id="editor_float">
					<div style="clear:both;">
						<div class="floatbox floatbox1" id="editorbox">
							<div class="popupmenu_popup" id="imgpreview" style="position:absolute;width:180px;height:150px;display: none;"></div>
							<div class="postbox" id="postbox">
								<input type="hidden" name="isubb" id="e_mode" value="1" />
								<div id="e_controls" class="editorrow">
									<div class="editor"> <a id="e_popup_simple" title="粗体 斜体 下划线"></a> <a id="e_popup_fontname" title="字体"></a> <a id="e_popup_fontsize" title="大小"></a> <a id="e_popup_forecolor" title="颜色"></a> <a id="e_popup_justify" title="对齐"></a> <a id="e_cmd_createlink" title="链接"></a> <a id="e_cmd_email" title="Email"></a> <a id="e_cmd_insertimage" title="图片"></a> <a id="e_popup_media" title="多媒体"></a> <a id="e_cmd_custom1_flash" title="Flash 动画"></a> <a id="e_cmd_quote" title="引用"></a> <a id="e_cmd_code" title="代码"></a> <a id="e_popup_list" title="列表"></a> <a id="e_popup_dent" title="缩进"></a> <a id="e_popup_float" title="浮动"></a> <a id="e_cmd_table" title="表格"></a> <a id="e_cmd_hide" title="隐藏内容"></a> <a id="e_popup_faces" title="表情"></a> <a id="e_cmd_custom1_fly" title="内容横向滚动"></a> <a id="e_cmd_custom1_sup" title="上标"></a> <a id="e_cmd_custom1_sub" title="下标"></a> <a id="e_popup_tools" title="工具"></a> <a id="e_cmd_attach" title="附件"></a> <a id="e_switcher" class="plugeditor editormode">
										<input type="checkbox" name="checkbox" id="swCheckbox" value="0"  onclick="switchEditor(this.checked?0:1)" class="checkbox_css" />
										源码</a></div>
									<div class="editortoolbar">
										<div class="popupmenu_popup fontstyle_menu" id="e_popup_simple_menu" style="display: none">
											<ul unselectable="on">
												<li><a id="e_cmd_bold" title="粗体">粗体</a></li>
												<li><a id="e_cmd_italic" title="斜体">斜体</a></li>
												<li><a id="e_cmd_underline" title="下划线">下划线</a></li>
											</ul>
										</div>
										<div class="popupmenu_popup fontname_menu" id="e_popup_fontname_menu" style="display: none">
											<ul unselectable="on">
												<li onclick="_6kcode('fontname', '宋体')" style="font-family: 宋体" unselectable="on">宋体</li>
												<li onclick="_6kcode('fontname', '微软雅黑')" style="font-family: 微软雅黑" unselectable="on">微软雅黑</li>
												<li onclick="_6kcode('fontname', '黑体')" style="font-family: 黑体" unselectable="on">黑体</li>
												<li onclick="_6kcode('fontname', '楷体_GB2312')" style="font-family: 楷体_GB2312" unselectable="on">楷体_GB2312</li>
												<li onclick="_6kcode('fontname', 'Tahoma')" style="font-family: Tahoma" unselectable="on">Tahoma</li>
												<li onclick="_6kcode('fontname', 'Impact')" style="font-family: Impact" unselectable="on">Impact</li>
												<li onclick="_6kcode('fontname', 'Verdana')" style="font-family: Verdana" unselectable="on">Verdana</li>
												<li onclick="_6kcode('fontname', 'Times New Roman')" style="font-family: Times New Roman" unselectable="on">Times New Roman</li>
											</ul>
										</div>
										<div class="popupmenu_popup fontsize_menu" id="e_popup_fontsize_menu" style="display: none">
											<ul unselectable="on">
												<li onclick="_6kcode('fontsize', 1)" unselectable="on"><font size="1" unselectable="on">1</font></li>
												<li onclick="_6kcode('fontsize', 2)" unselectable="on"><font size="2" unselectable="on">2</font></li>
												<li onclick="_6kcode('fontsize', 3)" unselectable="on"><font size="3" unselectable="on">3</font></li>
												<li onclick="_6kcode('fontsize', 4)" unselectable="on"><font size="4" unselectable="on">4</font></li>
												<li onclick="_6kcode('fontsize', 5)" unselectable="on"><font size="5" unselectable="on">5</font></li>
											</ul>
										</div>
										<div class="popupmenu_popup" id="e_popup_forecolor_menu" style="display: none">
											<table cellpadding="0" cellspacing="0" border="0" unselectable="on" style="width: auto;">
												<tr>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'Black')" unselectable="on">
														<div style="background-color: Black" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'Sienna')" unselectable="on">
														<div style="background-color: Sienna" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'DarkOliveGreen')" unselectable="on">
														<div style="background-color: DarkOliveGreen" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'DarkGreen')" unselectable="on">
														<div style="background-color: DarkGreen" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'DarkSlateBlue')" unselectable="on">
														<div style="background-color: DarkSlateBlue" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'Navy')" unselectable="on">
														<div style="background-color: Navy" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'Indigo')" unselectable="on">
														<div style="background-color: Indigo" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'DarkSlateGray')" unselectable="on">
														<div style="background-color: DarkSlateGray" unselectable="on"></div>
													</td>
												</tr>
												<tr>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'DarkRed')" unselectable="on">
														<div style="background-color: DarkRed" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'DarkOrange')" unselectable="on">
														<div style="background-color: DarkOrange" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'Olive')" unselectable="on">
														<div style="background-color: Olive" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'Green')" unselectable="on">
														<div style="background-color: Green" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'Teal')" unselectable="on">
														<div style="background-color: Teal" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'Blue')" unselectable="on">
														<div style="background-color: Blue" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'SlateGray')" unselectable="on">
														<div style="background-color: SlateGray" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'DimGray')" unselectable="on">
														<div style="background-color: DimGray" unselectable="on"></div>
													</td>
												</tr>
												<tr>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'Red')" unselectable="on">
														<div style="background-color: Red" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'SandyBrown')" unselectable="on">
														<div style="background-color: SandyBrown" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'YellowGreen')" unselectable="on">
														<div style="background-color: YellowGreen" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'SeaGreen')" unselectable="on">
														<div style="background-color: SeaGreen" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'MediumTurquoise')" unselectable="on">
														<div style="background-color: MediumTurquoise" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'RoyalBlue')" unselectable="on">
														<div style="background-color: RoyalBlue" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'Purple')" unselectable="on">
														<div style="background-color: Purple" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'Gray')" unselectable="on">
														<div style="background-color: Gray" unselectable="on"></div>
													</td>
												</tr>
												<tr>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'Magenta')" unselectable="on">
														<div style="background-color: Magenta" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'Orange')" unselectable="on">
														<div style="background-color: Orange" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'Yellow')" unselectable="on">
														<div style="background-color: Yellow" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'Lime')" unselectable="on">
														<div style="background-color: Lime" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'Cyan')" unselectable="on">
														<div style="background-color: Cyan" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'DeepSkyBlue')" unselectable="on">
														<div style="background-color: DeepSkyBlue" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'DarkOrchid')" unselectable="on">
														<div style="background-color: DarkOrchid" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'Silver')" unselectable="on">
														<div style="background-color: Silver" unselectable="on"></div>
													</td>
												</tr>
												<tr>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'Pink')" unselectable="on">
														<div style="background-color: Pink" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'Wheat')" unselectable="on">
														<div style="background-color: Wheat" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'LemonChiffon')" unselectable="on">
														<div style="background-color: LemonChiffon" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'PaleGreen')" unselectable="on">
														<div style="background-color: PaleGreen" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'PaleTurquoise')" unselectable="on">
														<div style="background-color: PaleTurquoise" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'LightBlue')" unselectable="on">
														<div style="background-color: LightBlue" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'Plum')" unselectable="on">
														<div style="background-color: Plum" unselectable="on"></div>
													</td>
													<td class="editor_colornormal" onclick="_6kcode('forecolor', 'White')" unselectable="on">
														<div style="background-color: White" unselectable="on"></div>
													</td>
												</tr>
												<tr></tr>
											</table>
										</div>
										<div class="popupmenu_popup" id="e_popup_justify_menu" style="display: none">
											<ul unselectable="on">
												<li><a id="e_cmd_justifyleft" title="居左">居左</a></li>
												<li><a id="e_cmd_justifycenter" title="居中">居中</a></li>
												<li><a id="e_cmd_justifyright" title="居右">居右</a></li>
											</ul>
										</div>
										<div class="faces" id="e_popup_faces_menu" style="display: none">
											<div class="faceslist">
												<div id="facesdiv"></div>
											</div>
										</div>
										<div class="popupmenu_popup" id="e_popup_dent_menu" style="display: none">
											<ul unselectable="on">
												<li><a id="e_cmd_indent" title="增加缩进">增加缩进</a></li>
												<li><a id="e_cmd_outdent" title="减少缩进">减少缩进</a></li>
											</ul>
										</div>
										<div class="popupmenu_popup" id="e_popup_float_menu" style="display: none">
											<ul unselectable="on">
												<li><a id="e_cmd_floatleft" title="左浮动">左浮动</a></li>
												<li><a id="e_cmd_floatright" title="右浮动">右浮动</a></li>
											</ul>
										</div>
										<div class="popupmenu_popup" id="e_popup_list_menu" style="display: none">
											<ul unselectable="on">
												<li><a id="e_cmd_insertorderedlist" title="排序的列表">排序的列表</a></li>
												<li><a id="e_cmd_insertunorderedlist" title="未排序列表">未排序列表</a></li>
											</ul>
										</div>
										<div class="popupmenu_popup" id="e_popup_hide_menu" style="display: none">
											<ul unselectable="on">
												<li><a id="e_popup_hide" title="插入隐藏内容">插入隐藏内容</a></li>
												<li><a id="e_cmd_table" title="插入表格">插入表格</a></li>
												<li><a id="e_cmd_free" title="插入免费信息">插入免费信息</a></li>
											</ul>
										</div>
										<div class="popupmenu_popup" id="e_popup_tools_menu" style="display: none">
											<ul unselectable="on">
												<a id="e_cmd_removeformat" title="清除文本格式">清除文本格式</a> <a id="e_cmd_unlink" title="移除链接">移除链接</a> <a id="e_cmd_checklength" title="字数检查">字数检查</a> <a id="e_cmd_clearcontent" title="清空内容">清空内容</a>
											</ul>
										</div>
									</div>
								</div>
								<div class="newediter">
									<div style="border-left: 4px solid #FFF">
										<textarea class="autosave max txt" name="message" id="e_textarea" tabindex="1" style="height:300px"></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
				</div>
				<div class="popupmenu_popup" clickshow="1" id="e_popup_media_menu" style="width: 280px;display: none" unselectable="on">
					<input type="hidden" id="e_mediatype" value="ra">
					<input type="hidden" id="e_mediaautostart" value="0">
					<table cellpadding="4" cellspacing="0" border="0">
						<tr class="popupmenu_option">
							<td nowrap> 请输入多媒体文件的地址:<br />
								<input type="text" id="e_mediaurl" style="width: 98%" value="" onkeyup="setMediaType('e')" class="text_css" />
							</td>
						</tr>
						<tr class="popupmenu_option">
							<td nowrap>
								<label style="float: left; width: 32%">
								<input type="radio" name="e_mediatyperadio" id="e_mediatyperadio_ra" onclick="$('e_mediatype').value = 'ra'" checked="checked" class="radio_css" />
								RA</label>
								<label style="float: left; width: 32%">
								<input type="radio" name="e_mediatyperadio" id="e_mediatyperadio_wma" onclick="$('e_mediatype').value = 'wma'" class="radio_css" />
								WMA</label>
								<label style="float: left; width: 32%">
								<input type="radio" name="e_mediatyperadio" id="e_mediatyperadio_mp3" onclick="$('e_mediatype').value = 'mp3'" class="radio_css" />
								MP3</label>
								<label style="float: left; width: 32%">
								<input type="radio" name="e_mediatyperadio" id="e_mediatyperadio_rm" onclick="$('e_mediatype').value = 'rm'" class="radio_css" />
								RM/RMVB</label>
								<label style="float: left; width: 32%">
								<input type="radio" name="e_mediatyperadio" id="e_mediatyperadio_wmv" onclick="$('e_mediatype').value = 'wmv'" class="radio_css" />
								WMV</label>
								<label style="float: left; width: 32%">
								<input type="radio" name="e_mediatyperadio" id="e_mediatyperadio_mov" onclick="$('e_mediatype').value = 'mov'" class="radio_css" />
								MOV</label>
							</td>
						</tr>
						<tr class="popupmenu_option">
							<td nowrap>
								<label style="float: left; width: 32%">宽:
								<input type="text" id="e_mediawidth" size="5" value="400" class="text_css" />
								</label>
								<label style="float: left; width: 32%">高:
								<input type="text" id="e_mediaheight" size="5" value="300" class="text_css" />
								</label>
								<label style="float: left; width: 32%">
								<input type="checkbox" onclick="$('e_mediaautostart').value =this.checked ? 1: 0" class="checkbox_css" />
								自动播放</label>
							</td>
						</tr>
						<tr class="popupmenu_option">
							<td align="center" colspan="2">
								<input type="button" value="提交" onclick="setMediaCode('e')" class="button_css" />
								&nbsp;
								<input type="button" onclick="hideMenu()" value="取消" class="button_css" />
							</td>
						</tr>
					</table>
				</div>

			</div>
		</div>
	</div>
</div>
<script src="images/common.js?t=<?=time()?>" type="text/javascript"></script>
<script src="images/editor.js?t=<?=time()?>" type="text/javascript"></script>
<script src="images/bbcode.js?t=<?=time()?>" type="text/javascript"></script>
<script>
function uploadAttach(){
	window.parent.openUploadAttach();
}
</script>
</body>
</html>
