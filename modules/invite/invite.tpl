{if $_A.query_type == "new" || $_A.query_type == "edit"}
<div class="module_add">
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data">
	<div class="module_title"><strong>{ if $_A.query_type == "edit" }编辑{else}添加{/if}招聘</strong></div>
	
	<div class="module_border">
		<div class="l">招聘名称：</div>
		<div class="c">
			<input type="text" name="name"  class="input_border" value="{ $_A.invite_result.name}" size="30" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">类别：</div>
		<div class="c">
			<select name="type_id">
			{foreach from=$_A.invite_type_list item=item}
			<option  value="{ $item.id}" {if $item.id==$_A.invite_result.type_id} selected="selected"{/if} />{ $item.typename}</option>
			{/foreach}
			</select>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">属性：</div>
		<div class="c">
			{$_A.invite_result.flag|flag:"input" }
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">状态：</div>
		<div class="c">
			<input type="radio" name="status" value="0"  { if $_A.invite_result.status == 0 }checked="checked"{/if}/>隐藏 <input type="radio" name="status" value="1"  { if $_A.invite_result.status ==1 ||$_A.invite_result.status ==""}checked="checked"{/if}/>显示 
		</div>
	</div>

	<div class="module_border">
		<div class="l">排序：</div>
		<div class="c">
			<input type="text" name="order"  class="input_border" value="{ $_A.invite_result.order|default:10}" size="10" />
		</div>
	</div>


	<div class="module_border">
		<div class="l">招聘人数：</div>
		<div class="c">
			<input type="text" name="num"  class="input_border" value="{ $_A.invite_result.num}" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">工作地点：</div>
		<div class="c">
			<script src="/plugins/index.php?q=area&area={$_A.invite_result.area}"></script>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">工作描述：</div>
		<div class="c">
			<textarea name="description" cols="40" rows="5">{$_A.invite_result.description|br2nl}</textarea>
		</div>
	</div>

	<div class="module_border">
		<div class="l">工作要求：</div>
		<div class="c">
			<textarea name="demand" cols="40" rows="5">{$_A.invite_result.demand|br2nl}</textarea>
		</div>
	</div>
	
	<div class="module_submit border_b" >
		{ if $_A.query_type == "edit" }<input type="hidden" name="id" value="{ $_A.invite_result.id }" />{/if}
		<input type="submit"  name="submit" value="确认提交" />
		<input type="reset"  name="reset" value="重置表单" />
	</div>
	</form>
</div>
{literal}
<script>
function check_form(){
	 var frm = document.forms['form1'];
	 var webname = frm.elements['webname'].value;
	 var type = frm.elements['type'].value;
	 var errorMsg = '';
	  if (webname.length == 0 ) {
		errorMsg += '招聘名称必须填写' + '\n';
	  }
	  if (type.length == 0 ) {
		errorMsg += '招聘类型必须选择' + '\n';
	  }
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }
}

</script>
{/literal}

{elseif $_A.query_type == "type"}
<form name="form1" method="post" action="{$_A.query_url}/type" >
<table width="100%" border="0"  cellspacing="1" bgcolor="#CCCCCC">
	<tr >
		<td width="" class="main_td">ID</td>
		<td width="*" class="main_td">名称</td>
		<td width="" class="main_td">操作</td>
	</tr>
	{ foreach  from=$_A.invite_list key=key item=item}
	<tr {if $key%2==1}class="tr2"{/if}>
		<td class="main_td1" align="center">{ $item.id}</td>
		<td class="main_td1" align="left">&nbsp;&nbsp;&nbsp;<input type="text" value="{$item.typename}" name="typename[]" /><input type="hidden" name="id[]" value="{$item.id}" /></td>
		<td class="main_td1" align="center" width="160"><a href="#" onClick="javascript:if(confirm('确定要删除吗?删除后将不可恢复')) location.href='{$_A.query_url}/type&del_id={$item.id}'">删除</a> </td>
	</tr>
	{ /foreach}
	<tr >
		<td width="" class="action" colspan="3">新增一个招聘部门：<input type="text" name="typename1" /></td>
	</tr>
	<tr>
		<td  class="page" colspan="3"  >
		<input type="submit"  name="submit" value="确认提交" />
		</td>
	</tr>
</table>
</form>
{elseif $_A.query_type == "view"}

{else}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
  <form action="{$_A.query_url}/action" method="post">
	<tr >
		<td class="main_td"><input type="checkbox" name="allcheck" onclick="checkFormAll(this.form)"/></td>
		<td width="" class="main_td">ID</td>
		<td width="*" class="main_td">招聘名称</td>
		<td width="" class="main_td">招聘部门</td>
		<td width="" class="main_td">状态</td>
		<td width="" class="main_td">排序</td>
		<td width="" class="main_td">添加时间</td>
		<td width="" class="main_td">招聘人数</td>
		<td width="" class="main_td">操作</td>
	</tr>
	{ foreach  from=$_A.invite_list key=key item=item}
	<tr {if $key%2==1}class="tr2"{/if} >
		<td class="main_td1" align="center" ><input type="checkbox" name="aid[{$key}]" value="{$item.id}"/></td>
		<td class="main_td1" align="center">{ $item.id}</td>
		<td class="main_td1" align="center">{$item.name}</td>
		<td class="main_td1" align="center">{$item.typename}</td>
		<td class="main_td1" align="center">{ if $item.status ==1}显示{else}隐藏{/if}</td>
		<td class="main_td1" align="center"><input type="text" value="{$item.order|default:10}" name="order[]" size="5" /><input type="hidden" name="id[]" value="{$item.id}" /></td>
		<td class="main_td1" align="center">{$item.addtime|date_format:"Y-m-d"}</td>
		<td class="main_td1" align="center" >{$item.num}</td>
		<td class="main_td1" align="center" ><a href="{$_A.query_url}/edit&id={$item.id}{$_A.site_url}">修改</a> / <a href="#" onClick="javascript:if(confirm('确定要删除吗?删除后将不可恢复')) location.href='{$_A.query_url}/del&id={$item.id}{$_A.site_url}'">删除</a></td>
	</tr>
	{ /foreach}
	<tr>
	<td colspan="9" class="action">
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
		招聘名称：<input type="text" name="keywords" id="keywords" value="{$magic.request.keywords}"/>
		<input type="button" value="搜索" onclick="sousuo()" />
		</div>
		</td>
	</tr>
	<tr>
		<td colspan="9" class="page">
		{$_A.showpage}
		</td>
	</tr>
	</form>	
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
{/if}