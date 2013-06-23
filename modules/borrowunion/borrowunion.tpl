{if $_A.query_type == "edit"}
<div class="module_add">
	
	<div class="module_title"><strong>机构信息</strong></div>
	
	<form name="form1" method="post" action=""  enctype="multipart/form-data" onsubmit="return check_form();" >
	
	<div class="module_border">
		<div class="l">用户名：</div>
		<div class="c">
			{$_A.user_result.username|default:$_A.borrowunion_result.username}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">机构名称：</div>
		<div class="c">
			<input type="text" name="name"  class="input_border"  size="20" value="{ $_A.borrowunion_result.name}" />
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">经营范围：</div>
		<div class="c">
			<textarea name="range" rows="5" cols="50">{ $_A.borrowunion_result.range}</textarea>
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">机构简介：</div>
		<div class="c">
			{editor name="content" type="sinaeditor" value="$_A.borrowunion_result.content"}
		</div>
	</div>
	{if $_A.borrowunion_result.isvip==1}
	<div class="module_title"><strong>审核机构</strong></div>
	<div class="module_border">
		<div class="l">审核是否通过：</div>
		<div class="c">
			<input type="radio" name="status" value="1" {if $_A.borrowunion_result.status==1} checked="checked"{/if} /> 是 <input type="radio" name="status" value="0" {if $_A.borrowunion_result.status==0 || $_A.borrowunion_result.status==""} checked="checked"{/if} />否
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">审核备注：</div>
		<div class="c">
			<textarea name="verify_remark" rows="5" cols="50">{$_A.borrowunion_result.verify_remark}</textarea>
		</div>
	</div>
	{else}
	<div class="module_border">
		<div class="l"></div>
		<div class="c">
			<strong>此会员还不是VIP，不能成为融贷机构。</strong>
		</div>
	</div>
	{/if}
	<div class="module_submit" >
		<input type="hidden"  name="user_id" value="{$magic.request.user_id}" />
		<input type="submit"  name="submit" value="确认提交" />
		<input type="reset"  name="reset" value="重置表单" />
	</div>
	</form>
	

</div>
{literal}
<script>


function check_form(){
	 var frm = document.forms['form1'];
	 var name = frm.elements['name'].value;
	 var content = frm.elements['content'].value;
	 var errorMsg = '';
	  if (name.length == 0 ) {
		errorMsg += '标题必须填写' + '\n';
	  }
	   if (content.length =="") {
		errorMsg += '内容必须填写' + '\n';
	  }
	  
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }
}

</script>
{/literal}

{elseif $_A.query_type=="list"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="*" class="main_td">用户名</td>
			<td width="" class="main_td">是否VIP</td>
			<td width="" class="main_td">机构名称</td>
			<td width="" class="main_td">添加时间</td>
			<td width="" class="main_td">状态</td>
			<td width="" class="main_td">操作</td>
		</tr>
		{ foreach  from=$_A.borrowunion_list key=key item=item}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td class="main_td1" align="center" >{ $item.username}</td>
			<td class="main_td1" align="center" >{ if $item.isvip==1}是{else}否{/if}</td>
			<td class="main_td1" align="center">{$item.name|truncate:34}</td>
			<td class="main_td1" align="center" >{$item.addtime|date_format}</td>
			<td class="main_td1" align="center" >{ if $item.status ==1}审核通过{else}未通过{/if}</td>
			<td class="main_td1" align="center" ><a href="{$_A.query_url}/edit{$_A.site_url}&user_id={$item.user_id}&id={$item.id}">修改</a> <a href="#" onClick="javascript:if(confirm('确定要删除吗?删除后将不可恢复')) location.href='{$_A.query_url}/del{$_A.site_url}&id={$item.id}'">删除</a></td>
		</tr>
		{ /foreach}
		<tr>
		<td colspan="10" class="action">
		<div class="floatl">
		
		</div>
		<div class="floatr">
			用户名：<input type="text" name="username" id="username" value="{$magic.request.username}"/> <input type="button" value="搜索" / onclick="sousuo()">
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
	var sou = "";
	var username = $("#username").val();
	if (username!=""){
		sou += "&username="+username;
	}
	var status = $("#status").val();
	if (status!=""){
		sou += "&status="+status;
	}
	if (sou!=""){
	location.href=url+sou;
	}
}
</script>
{/literal}

{/if}