<!--主题列表 开始-->
{ if $_A.query_type=="list"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
<form action="" method="post"  >
	<tr >
	  <td width="" class="main_td"><input type="checkbox" name="allcheck" onclick="checkFormAll(this.form)"/></td>
	  <td width="32%" class="main_td" >帖子标题</td>
	  <td width="*" class="main_td">版块</td>
	  <td width="*" class="main_td">作者</td>
	  <td width="*" class="main_td">发表时间</td>
	   <td class="main_td">操作</td>
	</tr>
	{list module="dwbbs" function="GetTopicsList" var="loop" showpage="3" status=1}
	{foreach from="$loop.list" item="var"}
	<tr {if $key%2==1}class="tr2"{/if} >
	 <td class="main_td1" align="center" ><input type="checkbox" name="aid[]" id="aid[]" value="{$item.id}"/></td>
	  <td >{$var.name}</td>
	  <td >{$var.forum_name}</td>
	  <td>{$var.username}</td>
	  <td align="left">{$var.addtime|date_format:"Y-m-d H:i:s"}</td>
	   <td  ><a href="{$_A.query_url}/edit&id={$var.id}">编辑</a> <a href="{$_A.query_url}/del&id={$var.id}">删除</a>  权限 </td>
	</tr>
	{ /foreach}
	<tr>
			<td colspan="8"  class="action" >
			<div class="floatl"><select onchange="changeAction()" id="postaction" name="postaction">
		<option value="NOTHING">请选择操作</option>
		<optgroup label="----------------">
<option value="movePost">移动至版块</option>
<option value="delPost">删除</option>
<option value="upPost">提升</option>
<option value="stampPost">鉴定</option>
<option value="highlightPost">高亮</option>
		</optgroup>
		<optgroup label="----------------">
<option value="coverPost">屏蔽帖子内容</option>
<option value="coverPost_">解除屏蔽</option>
		</optgroup>
		<optgroup label="----------------">
<option value="lockPost">锁定帖子</option>
<option value="lockPost_">解锁帖子</option>
		</optgroup>
		<optgroup label="----------------">
<option value="topPost">置顶</option>
<option value="topPost_">解除置顶</option>
		</optgroup>
		<optgroup label="----------------">
<option value="alltopPost">总置顶</option>
<option value="alltopPost_">解除总置顶</option>
		</optgroup>
		<optgroup label="----------------">
<option value="goodPost">设置为精华</option>
<option value="goodPost_">取消精华</option>
		</optgroup>
	</select>
	<select name="movetofid" id="movetofid" style="display:none;">
		{loop module="dwbbs" function="ActionForum" action="list"}
			<option value="{$var.id}" {if $var.id==$magic.request.pid || $var.id==$_A.bbs_forum_result.pid} selected="selected"{/if}>{$var.aname}</option>
			{/loop}
	</select>
	<select name="stampid" id="stampid" style="display:none;"><option value="0">取消鉴定</option><option value="1">鉴定1</option><option value="2">鉴定2</option></select>
	<span id="highlightopt" style="display:none;">
		<input type="text" class="text_css" size="8" style="" value="" id="highlightcolor" name="highlightfontC" onfocus="colorpicker.choose(event);" /> <img src="../images/ico_color.gif" align="absmiddle" border="0" id="img_color" class="colorpicker" onclick="colorpicker.choose(event);" /> &nbsp; 
		<input type="checkbox" value="1" name="highlightfontB[]" id="highlightfontB" class="checkbox_css" /> <b>B</b>
		<input type="checkbox" value="1" name="highlightfontI[]" id="highlightfontI" class="checkbox_css" /> <i>I</i> 
		<input type="checkbox" value="1" name="highlightfontU[]" id="highlightfontU" class="checkbox_css" /> <u>U</u>
	</span> <input type="submit" value="确认操作" /> 
			</div>
			<div class="floatr">
			
			</div>
			</td>
		</tr>
	<tr>
			<td colspan="8" class="page">
			{$loop.showpage} 
			</td>
		</tr>
	<tr >
	  <td  colspan="7" class="submit" ><input type="submit" value="确认修改"  />&nbsp;&nbsp;&nbsp;<input value="添加版块" type="button" onclick="javascript:location='{$_A.query_url}/new';" /></td>
	</tr>
	{/list}
	</form>
</table>

{literal}
<script>
function changeAction(){
	var d = $("#postaction").val();
	setDisplay("movetofid",d=="movePost");
	setDisplay("stampid",d=="stampPost");
	setDisplay("highlightopt",d=="highlightPost");
}
</script>
{/literal}
<!--主题列表 结束-->

<!--帖子审核 开始-->
{ elseif $_A.query_type=="verify"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
<form action="" method="post"  >
	<tr >
	  <td width="" class="main_td">操作</td>
	  <td width="*" class="main_td">版块/作者/时间</td>
	  <td class="main_td">标题</td>
	  <td class="main_td">内容</td>
	</tr>
	{list module="dwbbs" function="GetTopicsList" var="loop" showpage="3" status=0}
	{foreach from="$loop.list" item="var" key="_key"}
	<tr {if $key%2==1}class="tr2"{/if} >
	 <td class="main_td1" align="center" >
	 	<input type="radio" name="status[{$_key}]" value="0"  />忽略<br />
		<input type="radio" name="status[{$_key}]" value="1" checked="checked"  />通过<br />
		<input type="radio" name="status[{$_key}]" value="2"  />删除<br />
	 </td>
	  <td style="padding-left:10px;" align="left">版块：{$var.name}<br />作者: admin
<br />时间: 4分钟前 
<br />
</td>
	  <td >{$var.name}<input type="hidden" name="tid[{$_key}]" value="{$var.id}" /></td>
	  <td width="320"><div style="width:300px; height:70px; overflow:auto; margin:5px;">{$var.content}</div></td>
	</tr>
	{ /foreach}
	<tr >
	  <td  colspan="7" class="submit" ><input type="submit" value="确认修改"  /></td>
	</tr>
</form>
</table>
<!--帖子审核 结束-->	
	
	
<!--主题列表 开始-->
{ elseif $_A.query_type=="recycle"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
<form action="" method="post"  >
	<tr >
	  <td width="" class="main_td"><input type="checkbox" name="allcheck" onclick="checkFormAll(this.form)"/></td>
	  <td width="32%" class="main_td" >帖子标题</td>
	  <td width="*" class="main_td">版块</td>
	  <td width="*" class="main_td">作者</td>
	  <td width="*" class="main_td">发表时间</td>
	   <td class="main_td">操作</td>
	</tr>
	{list module="dwbbs" function="GetTopicsList" var="loop" showpage="3"}
	{foreach from="$loop.list" item="var"}
	<tr {if $key%2==1}class="tr2"{/if} >
	 <td class="main_td1" align="center" ><input type="checkbox" name="aid[]" id="aid[]" value="{$item.id}"/></td>
	  <td >{$var.name}</td>
	  <td >{$var.forum_name}</td>
	  <td>{$var.username}</td>
	  <td align="left">{$var.addtime|date_format:"Y-m-d H:i:s"}</td>
	   <td  > <a href="{$_A.query_url}/del&id={$var.id}">删除</a>   </td>
	</tr>
	{ /foreach}
	<tr>
			<td colspan="8"  class="action" >
			<div class="floatl"><select onchange="changeAction()" id="postaction" name="postaction">
		<option value="NOTHING">请选择操作</option>
		
		</select>
	<input type="submit" value="确认操作" /> 
			</div>
			<div class="floatr">
			
			</div>
			</td>
		</tr>
	<tr>
			<td colspan="8" class="page">
			{$loop.showpage} 
			</td>
		</tr>
	{/list}
	</form>
</table>

{elseif $_A.query_type == "new" || $_A.query_type == "edit"}

<div class="module_add">

<form action="" method="post" name="form1" onsubmit="return check_form()"  >
{ if $_A.query_type=="edit"}<input type="hidden" value="{ $_A.bbs_forum_result.id}" name="id" />{ /if}
<div class="module_title"><strong>{ if $_A.query_type == "edit" }编辑{else}添加{/if}帖子</strong></div>



<div class="module_border">
	<div class="l">帖子标题：</div>
	<div class="c">
		<input type="text" align="absmiddle" name="name" value="{ $_A.bbs_topics_result.name}"/>
	</div>
</div>

<div class="module_border">
	<div class="l">帖子内容介绍:</div>
	<div class="c">
		<textarea rows="5" cols="40" name="content">{ $_A.bbs_topics_result.content}</textarea>
	</div>
</div>


<div class="module_border">
	<div class="l">是否隐藏:</div>
	<div class="c">
			<input type="radio" name="status" value="0" {if $_A.bbs_topics_result.status==0 || $_A.bbs_topics_result.status==""} checked="checked"{/if} />否    <input type="radio" name="status" value="1" {if $_A.bbs_topics_result.status==1 } checked="checked"{/if} />是 
	</div>
</div>



<div class="module_submit">
	<input name="" type="submit" value=" 提交 " /> <input name="" type="reset" value=" 重置 " /><input type="hidden" name="style" value="1" />
</div>

</form>
</div>
{literal}
<script>
function setSelect(){
	//alert(1);
}
function check_form(){
var frm = document.forms['form1'];
 var title = frm.elements['name'].value;
 var errorMsg = '';
  if (title.length == 0 ) {
	errorMsg += '参数名称必须填写' + '\n';
  }
  var forumgroups=document.getElementById('forumgroups');
	
	alert(ts.length);
	for(var i=0;i<ts.length;i++){
setSelect("forumgroups",ts[i]);
	}
  
  if (errorMsg.length > 0){
	alert(errorMsg); return false;
  } else{  
	return true;
  }
}
</script>
{/literal}
{/if}