{if $_A.query_type == "new" || $_A.query_type == "edit"}
<div class="module_add">
<form name="form1" method="post" action=""  enctype="multipart/form-data" onsubmit="return check_form();">
	<div class="module_title"><strong>{ if $_A.query_type == "edit" }编辑{else}添加{/if}会员</strong></div>
	
	<div class="module_border">
		<div class="l">姓名：</div>
		<div class="c">
			<input type="text" name="name"  class="input_border" value="{ $_A.lianmeng_result.name}" size="30" />  
		</div>
	</div>

	
	<div class="module_border">
		<div class="l">定义属性：</div>
		<div class="c">
			{$_A.lianmeng_result.flag|flag:"input" }
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">加入时间：</div>
		<div class="c">
			<input type="text" name="intime"  class="input_border" value="{ $_A.lianmeng_result.intime|default:"nowdate"}" size="30" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">状态：</div>
		<div class="c">
			<input type="radio" name="status" value="0"  { if $_A.lianmeng_result.status == 0 }checked="checked"{/if}/>隐藏 <input type="radio" name="status" value="1"  { if $_A.lianmeng_result.status ==1 ||$_A.lianmeng_result.status ==""}checked="checked"{/if}/>显示 </div>
	</div>
	
	<div class="module_border">
		<div class="l">排序:</div>
		<div class="c">
			<input type="text" name="order"  class="input_border" value="{ $_A.lianmeng_result.order|default:10}" size="10" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">照片：</div>
		<div class="c">
			<input type="file" name="litpic" size="30" class="input_border"/>{if $_A.lianmeng_result.litpic!=""}<a href="./{$_A.lianmeng_result.litpic}" target="_blank" title="有图片"><img src="{ $tpldir }/images/ico_1.jpg" border="0"  /></a>{/if}</div>
	</div>
	
	<div class="module_border">
		<div class="l">所在地：</div>
		<div class="c">
			<script src="./plugins/index.php?&q=area&area={$_A.lianmeng_result.area}" type='text/javascript' language="javascript"></script> </div>
	</div>


	<div class="module_border">
		<div class="l">学校：</div>
		<div class="c">
			<INPUT type=text maxLength=12 name=school id="school" readonly="" value="{$_A.lianmeng_result.school}" onclick='tipsWindown("选择大学","url:get?plugins/index.php?q=school&name=school",400,300,"true","","false","text")'  />
		</div>
	</div>

	
<div class="module_border">
		<div class="l">个人宣言：</div>
		<div class="c">
			<textarea name="xuanyan" rows="5" cols="40">{$_A.lianmeng_result.xuanyan}</textarea>
		</div>
	</div>
	
	<div class="module_submit" >
		{ if $_A.query_type == "edit" }<input type="hidden" name="id" value="{ $_A.lianmeng_result.id }" />{/if}
		<input type="submit"  name="submit" value="确认提交" />
		<input type="reset"  name="reset" value="重置表单" />
	</div>
</div>
</form>
{literal}
<script>
function check_form(){

	 var frm = document.forms['form1'];
	 var title = frm.elements['name'].value;
	  var litpic = frm.elements['litpic'].value;
	   var city = frm.elements['city'].value;
	    var school = frm.elements['school'].value;
	 var errorMsg = '';
	  if (title.length == 0 ) {
		errorMsg += '姓名必须填写' + '\n';
	  }
	 
	  if (city.length == 0 ) {
		errorMsg += '地区必须填写' + '\n';
	  }
	   if (school.length == 0 ) {
		errorMsg += '学校必须填写' + '\n';
	  }
	  if (title.length == 0 ) {
		errorMsg += '姓名必须填写' + '\n';
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

{elseif $_A.query_type == "lian"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">

	<tr >
		<td width="*" class="main_td">学校名称</td>
		<td width="" class="main_td">所在城市</td>
		<td width="" class="main_td">加盟人数</td>
	</tr>
	{ foreach  from=$_A.lianmeng_unio_list key=key item=item}
	<tr {if $key%2==1}class="tr2"{/if}>
			<td >{ $item.school}</td>
			<td >{ $item.city_name}</td>
			<td >{ $item.num}</td>
		</tr>
		{ /foreach}
		
	</tr>
	<tr >
		<td width="*" class="page" colspan="3">{$page}</td>
		
	</tr>
</table>

{else}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<form action="{$_A.query_url}/action{$_A.site_url}" method="post">
	<tr >
		<td width="" class="main_td"><input type="checkbox" name="allcheck" onclick="checkFormAll(this.form)"/></td>
		<td width="" class="main_td">ID</td>
		<td width="*" class="main_td">姓名</td>
		<td width="" class="main_td">状态</td>
		<td width="" class="main_td">排序</td>
		<td width="" class="main_td">属性</td>
		<td width="" class="main_td">操作</td>
	</tr>
	{ foreach  from=$_A.lianmeng_list key=key item=item}
	<tr {if $key%2==1}class="tr2"{/if}>
			<td ><input type="checkbox" name="aid[{$key}]" value="{$item.id}"/></td>
			<td>{ $item.id}</td>
			<td>{$item.name|truncate:34}</td>
			<td>{ if $item.status ==1}<a href="{$_A.query_url}{$_A.site_url}&status=0&id={ $item.id}">显示</a>{else}<a href="{$_A.query_url}{$_A.site_url}&status=1&id={ $item.id}">隐藏</a>{/if}</td>
			<td ><input type="text" name="order[{$key}]" value="{$item.order}" size="3" /><input type="hidden" name="id[{$key}]" value="{$item.id}" /></td>
			<td >{$item.flagname|default:-}{if $item.litpic!=""}图片{/if}</td>
			<td ><a href="{$_A.query_url}/edit{$_A.site_url}&id={$item.id}" >修改</a> <a href="#" onClick="javascript:if(confirm('确定要删除吗?删除后将不可恢复')) location.href='{$_A.query_url}/del{$_A.site_url}&id={$item.id}'">删除</a></td>
		</tr><input type="hidden" name="flag[{$key}]" value="{$item.flag}" />
		{ /foreach}
		<td colspan="8" class="action">
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
		<td colspan="8" class="page">
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