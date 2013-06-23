{if $_A.query_type == "new" || $_A.query_type == "edit"}

<div class="module_add">
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data">
	<div class="module_title"><strong>{ if $_A.query_type == "edit" }编辑{else}添加{/if}公司</strong></div>
	
	<div class="module_border">
		<div class="l">公司名称：</div>
		<div class="c">
			<input type="text" name="name" class="input_border" value="{ $_A.company_result.name}" size="30" />
		</div>
	</div>
	

	<div class="module_border">
		<div class="l">排序：</div>
		<div class="c">
			<input type="text" name="order"  class="input_border" value="{ $_A.company_result.order|default:10}" size="10" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">成立日期：</div>
		<div class="c">
			<input type="text" name="foundyear"  value="{$_A.company_result.foundyear}" />
		</div>
	</div>
	<div class="module_border">
		<div class="l">公司网址：</div>
		<div class="c">
			<input type="text" name="weburl"  value="{$_A.company_result.weburl}" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">公司简介：</div>
		<div class="c">
			<textarea rows="5" cols="30" name="summary">{$_A.company_result.summary|br2nl}</textarea>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">公司详细介绍：</div>
		<div class="c">
			{editor name="content" type="sinaeditor" value="$_A.company_result.content"}
		</div>
	</div>
	
	<div class="module_title"><strong>公司联系方式</strong></div>
	
	
	<div class="module_border">
		<div class="l">公司所在地：</div>
		<div class="c">
			<script src="./plugins/index.php?&q=area&area={$_A.company_result.area}" type='text/javascript' language="javascript"></script>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">联系人：</div>
		<div class="c">
			<input type="text" name="linkman"  class="input_border" value="{ $_A.company_result.linkman}"  size="30" />
		</div>
	</div>

	<div class="module_border">
		<div class="l">联系地址：</div>
		<div class="c">
			<input type="text" name="address"  class="input_border" value="{ $_A.company_result.address}" size="30" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">邮编：</div>
		<div class="c">
			<input type="text" name="postcode"  class="input_border" value="{ $_A.company_result.postcode}" size="30" />
		</div>
	</div>

	<div class="module_border">
		<div class="l">电话：</div>
		<div class="c">
			<input type="text" name="tel"  class="input_border" value="{ $_A.company_result.tel}" size="30" />
		</div>
	</div>

	<div class="module_border">
		<div class="l">传真：</div>
		<div class="c">
			<input type="text" name="fax" class="input_border" value="{ $_A.company_result.fax}" size="30" />
		</div>
	</div>

	<div class="module_border">
		<div class="l">邮箱：</div>
		<div class="c">
			<input type="text" name="email"  class="input_border" value="{ $_A.company_result.email}" size="30" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">MSN：</div>
		<div class="c">
			<input type="text" name="msn"  class="input_border" value="{ $_A.company_result.msn}" size="30" />
		</div>
	</div>

	<div class="module_border">
		<div class="l">QQ：</div>
		<div class="c">
			<input type="text" name="qq"  class="input_border" value="{ $_A.company_result.qq}" size="30" />
		</div>
	</div>

	{if $input!=""}
	<div class="module_title"><strong>自定义内容</strong></div>
	{foreach from=$input item=item}
	<div class="module_border">
		<div class="l">{$item.0}:</div>
		<div class="c">
			{$item.1}
		</div>
	</div>
	{/foreach}
	{/if}
	
	
	<div class="module_submit border_b" >
		{ if $_A.query_type == "edit" }<input type="hidden" name="id" value="{ $_A.company_result.id }" />{/if}
		<input type="submit"  name="submit" value="确认提交" />
		<input type="reset"  name="reset" value="重置表单" />
	</div>
	</form>
</div>

{literal}
<script>
function check_form(){
	 var frm = document.forms['form1'];
	 var title = frm.elements['name'].value;
	 var content = frm.elements['content'].value;
	 var errorMsg = '';
	  if (title.length == 0 ) {
		errorMsg += '标题必须填写' + '\n';
	  }
	  if ($("#site_center").val()==""){
		errorMsg += '请选择栏目' + '\n';
	}
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }
}

</script>
{/literal}
{elseif $_A.query_type == "view"}

<div class="module_add">
	<form name="form1" method="post" action="" enctype="multipart/form-data">
	<div class="module_title"><strong>{ if $_A.query_type == "edit" }编辑{else}添加{/if}公司</strong></div>
	
	<div class="module_border">
		<div class="l">公司名称：</div>
		<div class="c">
			 {$_A.company_result.name}
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">成立日期：</div>
		<div class="c">
			{$_A.company_result.foundyear}
		</div>
	</div>
	<div class="module_border">
		<div class="l">公司网址：</div>
		<div class="c">
		{$_A.company_result.weburl}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">公司简介：</div>
		<div class="c">
			{$_A.company_result.summary}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">公司详细介绍：</div>
		<div class="c">
			{$_A.company_result.content}
		</div>
	</div>
	<div class="module_border">
		<div class="l">审核：</div>
		<div class="c">
			<input type="radio" name="status" value="1" {if $_A.company_result.status==1} checked="checked"{/if} />审核通过<input type="radio" name="status" value="0" {if $_A.company_result.status!=1} checked="checked"{/if} />审核不通过
		</div>
	</div>
	<div class="module_border">
		<div class="l">备注：</div>
		<div class="c">
			<textarea rows="5" cols="30" name="summary">{$_A.company_result.verify_remark|br2nl}</textarea>
		</div>
	</div>
	<div class="module_submit border_b" >
		<input type="hidden" name="id" value="{ $_A.company_result.id }" />
		<input type="submit"  name="submit" value="确认提交" />
		<input type="reset"  name="reset" value="重置表单" />
	</div>
</form>
</div>
{elseif $_A.query_type=="list"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<form action="{$_A.query_url}/action{$site_url}" method="post">
	<tr >
		<td width="" class="main_td"><input type="checkbox" name="allcheck" onclick="checkFormAll(this.form)"/></td>
		<td width="*" class="main_td">公司名称</td>
		<td width="*" class="main_td">公司类型</td>
		<td width="*" class="main_td">添加时间</td>
		<td width="" class="main_td">属性</td>
		<td width="" class="main_td">状态</td>
		<td width="" class="main_td">操作</td>
	</tr>
	{ foreach  from=$_A.company_list key=key item=item}
	<tr {if $key%2==1}class="tr2"{/if}>
		<td class="main_td1" align="center" ><input type="checkbox" name="aid[{$key}]" value="{$item.id}"/></td>
		<td class="main_td1" align="center">{$item.name|truncate:34}</td>
		<td class="main_td1" align="center">{$item.type|linkage}</td>
		<td class="main_td1" align="center">{$item.addtime|date_format:"Y-m-d"}</td>
		<td class="main_td1" align="center" >{$item.flagname|default:-}</td>
		<td class="main_td1" align="center" >{if $item.status==1}审核通过{elseif $item.status==2}申请待审核{else}审核不通过{/if}</td>
		<td class="main_td1" align="center" ><a href="{$_A.query_url}/edit{$site_url}&id={$item.id}{$_A.site_url}" >修改</a> <a href="{$_A.query_url}/view{$site_url}&id={$item.id}" >审核</a> </td>
	</tr><input type="hidden" name="flag[{$key}]" value="{$item.flag}" />
	{ /foreach}
	<tr>
		<td colspan="10" class="action">
		<div class="floatl">
		<select name="type">
		<option value="0">排序</option>
		<option value="1">显示</option>
		<option value="2">隐藏</option>
		<option value="3">推荐</option>
		<option value="4">头条</option>
		<option value="5">幻灯片</option>
		<option value="6">删除</option>&nbsp;&nbsp;&nbsp;
		</select> <input type="submit" value="确认操作" /> 排序不用全选
		</div>
		<div class="floatr">
			关键字：<input type="text" name="keywords" id="keywords" value="{$magic.request.keywords}"/> <input type="button" value="搜索" / onclick="sousuo()">
		</div>
		</td>
	</tr>
	<tr>
		<td colspan="10"  class="page">
		{$_A.showpage} 
		</td>
	</tr>
</table>
<script>
var url = '{$_A.query_url}';
{literal}
function sousuo(){
	var keywords = $("#keywords").val();
	location.href=url+"&keywords="+keywords;
}

</script>
{/literal}


{elseif $_A.query_type=="news"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<form action="{$_A.query_url}/action{$site_url}" method="post">
	<tr >
		<td width="" class="main_td"><input type="checkbox" name="allcheck" onclick="checkFormAll(this.form)"/></td>
		<td width="*" class="main_td">新闻标题</td>
		<td width="*" class="main_td">所属用户</td>
		<td width="*" class="main_td">所属公司</td>
		<td width="*" class="main_td">添加时间</td>
		<td width="" class="main_td">操作</td>
	</tr>
	{ foreach  from=$_A.company_list key=key item=item}
	<tr {if $key%2==1}class="tr2"{/if}>
		<td class="main_td1" align="center" ><input type="checkbox" name="aid[{$key}]" value="{$item.id}"/></td>
		<td class="main_td1" align="center">{$item.name|truncate:34}</td>
		<td class="main_td1" align="center">{$item.username}</td>
		<td class="main_td1" align="center">{$item.company_name}</td>
		<td class="main_td1" align="center">{$item.addtime|date_format:"Y-m-d"}</td>
		<td class="main_td1" align="center" ><a href="{$_A.query_url}/news_edit{$site_url}&id={$item.id}{$_A.site_url}" >查看修改</a> </td>
	</tr><input type="hidden" name="flag[{$key}]" value="{$item.flag}" />
	{ /foreach}
	<tr>
		<td colspan="10" class="action">
		<div class="floatl">
		<select name="type">
		<option value="0">排序</option>
		<option value="1">显示</option>
		<option value="2">隐藏</option>
		<option value="3">推荐</option>
		<option value="4">头条</option>
		<option value="5">幻灯片</option>
		<option value="6">删除</option>&nbsp;&nbsp;&nbsp;
		</select> <input type="submit" value="确认操作" /> 排序不用全选
		</div>
		<div class="floatr">
			关键字：<input type="text" name="keywords" id="keywords" value="{$magic.request.keywords}"/> <input type="button" value="搜索" / onclick="sousuo()">
		</div>
		</td>
	</tr>
	<tr>
		<td colspan="10"  class="page">
		{$_A.showpage} 
		</td>
	</tr>
</table>
<script>
var url = '{$_A.query_url}';
{literal}
function sousuo(){
	var keywords = $("#keywords").val();
	location.href=url+"&keywords="+keywords;
}

</script>
{/literal}

{elseif $_A.query_type=="zhaopin"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<form action="{$_A.query_url}/action{$site_url}" method="post">
	<tr >
		<td width="" class="main_td"><input type="checkbox" name="allcheck" onclick="checkFormAll(this.form)"/></td>
		<td width="*" class="main_td">招聘标题</td>
		<td width="*" class="main_td">所属用户</td>
		<td width="*" class="main_td">所属公司</td>
		<td width="*" class="main_td">添加时间</td>
		<td width="" class="main_td">操作</td>
	</tr>
	{ foreach  from=$_A.company_list key=key item=item}
	<tr {if $key%2==1}class="tr2"{/if}>
		<td class="main_td1" align="center" ><input type="checkbox" name="aid[{$key}]" value="{$item.id}"/></td>
		<td class="main_td1" align="center">{$item.name|truncate:34}</td>
		<td class="main_td1" align="center">{$item.username}</td>
		<td class="main_td1" align="center">{$item.company_name}</td>
		<td class="main_td1" align="center">{$item.addtime|date_format:"Y-m-d"}</td>
		<td class="main_td1" align="center" ><a href="{$_A.query_url}/zhaopin_edit{$site_url}&id={$item.id}{$_A.site_url}" >查看修改</a> </td>
	</tr><input type="hidden" name="flag[{$key}]" value="{$item.flag}" />
	{ /foreach}
	<tr>
		<td colspan="10" class="action">
		<div class="floatl">
		<select name="type">
		<option value="0">排序</option>
		<option value="1">显示</option>
		<option value="2">隐藏</option>
		<option value="3">推荐</option>
		<option value="4">头条</option>
		<option value="5">幻灯片</option>
		<option value="6">删除</option>&nbsp;&nbsp;&nbsp;
		</select> <input type="submit" value="确认操作" /> 排序不用全选
		</div>
		<div class="floatr">
			关键字：<input type="text" name="keywords" id="keywords" value="{$magic.request.keywords}"/> <input type="button" value="搜索" / onclick="sousuo()">
		</div>
		</td>
	</tr>
	<tr>
		<td colspan="10"  class="page">
		{$_A.showpage} 
		</td>
	</tr>
</table>
<script>
var url = '{$_A.query_url}';
{literal}
function sousuo(){
	var keywords = $("#keywords").val();
	location.href=url+"&keywords="+keywords;
}

</script>
{/literal}

{elseif $_A.query_type == "zhaopin_edit"}

<div class="module_add">
	<form name="form1" method="post" action="" enctype="multipart/form-data">
	<div class="module_title"><strong>查看修改招聘信息</strong></div>
	
	<div class="module_border">
		<div class="l">公司名称：</div>
		<div class="c">
			{ $_A.company_result.company_name}
		</div>
	</div>
	

	<div class="module_border">
		<div class="l">所属用户：</div>
		<div class="c">
			{ $_A.company_result.username}
		</div>
	</div>
	<div class="module_border">
		<div class="l">状态：</div>
		<div class="c">
			<input type="radio" name="status" value="1" {if  $_A.company_result.status==1} checked="checked"{/if} />显示 <input type="radio" name="status" value="0"{if  $_A.company_result.status==0} checked="checked"{/if} />隐藏 
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">岗位名称：</div>
		<div class="c">
			<input type="text" name="name"  value="{$_A.company_result.name}" size="20" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">招聘人数：</div>
		<div class="c">
			<input type="text" name="num"  value="{$_A.company_result.num}" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">工作地点：</div>
		<div class="c">
			<script src="/plugins/index.php?q=area&area={$_A.company_result.area}"></script> 
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">工作描述：</div>
		<div class="c">
			<textarea name="description" cols="35" rows="5">{$_A.company_result.description}</textarea>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">工作描述：</div>
		<div class="c">
			<textarea name="demand" cols="35" rows="5">{$_A.company_result.demand }</textarea>
		</div>
	</div>
	
	
	<div class="module_submit border_b" >
		<input type="hidden" name="id" value="{ $_A.company_result.id }" />
		<input type="submit"  name="submit" value="确认提交" />
		<input type="reset"  name="reset" value="重置表单" />
	</div>
	</form>
</div>

{literal}
<script>
function check_form(){
	 var frm = document.forms['form1'];
	 var title = frm.elements['name'].value;
	 var content = frm.elements['content'].value;
	 var errorMsg = '';
	  if (title.length == 0 ) {
		errorMsg += '标题必须填写' + '\n';
	  }
	  if ($("#site_center").val()==""){
		errorMsg += '请选择栏目' + '\n';
	}
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }
}

</script>
{/literal}
{elseif $_A.query_type == "news_edit"}

<div class="module_add">
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data">
	<div class="module_title"><strong>查看修改新闻信息</strong></div>
	
	<div class="module_border">
		<div class="l">公司名称：</div>
		<div class="c">
			{ $_A.company_result.company_name}
		</div>
	</div>
	

	<div class="module_border">
		<div class="l">所属用户：</div>
		<div class="c">
			{ $_A.company_result.username}
		</div>
	</div>
	<div class="module_border">
		<div class="l">状态：</div>
		<div class="c">
			<input type="radio" name="status" value="1" {if  $_A.company_result.status==1} checked="checked"{/if} />显示 <input type="radio" name="status" value="0"{if  $_A.company_result.status==0} checked="checked"{/if} />隐藏 
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">标题：</div>
		<div class="c">
			<input type="text" name="name"  value="{$_A.company_result.name}" />
		</div>
	</div>
	<div class="module_border">
		<div class="l">内容：</div>
		<div class="c">
			{editor name="content" type="sinaeditor" value="$_A.company_result.content"}
		</div>
	</div>
	

	
	<div class="module_submit border_b" >
		<input type="hidden" name="id" value="{ $_A.company_result.id }" />
		<input type="submit"  name="submit" value="确认提交" />
		<input type="reset"  name="reset" value="重置表单" />
	</div>
	</form>
</div>

{literal}
<script>
function check_form(){
	 var frm = document.forms['form1'];
	 var title = frm.elements['name'].value;
	 var content = frm.elements['content'].value;
	 var errorMsg = '';
	  if (title.length == 0 ) {
		errorMsg += '标题必须填写' + '\n';
	  }
	  if ($("#site_center").val()==""){
		errorMsg += '请选择栏目' + '\n';
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