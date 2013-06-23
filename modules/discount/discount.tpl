{if $_A.query_type == "new" || $_A.query_type == "edit"}
<div class="module_add">
	
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data">
	<div class="module_title"><strong>{ if $_A.query_type == "edit" }编辑{else}添加{/if}折扣</strong></div>
	
	<div class="module_border">
		<div class="l">商家名称：</div>
		<div class="c">
			<select name="company_id">
			{foreach from="$_A.discount_company_list" item="item"}
				<option value="{$item.id}" {if $item.id==$_A.discount_result.id} selected="selected"{/if}>{$item.name}</option>
			{/foreach}
			</select> <a href="{$_A.query_url}/company_new{$_A.site_url}">添加商家</a>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">缩略图：</div>
		<div class="c">
			<input type="file" name="litpic" size="30" class="input_border"/>{if $_A.discount_result.litpic!=""}<a href="./{$_A.discount_result.litpic}" target="_blank" title="有图片"><img src="{ $tpldir }/images/ico_1.jpg" border="0"  /></a><input type="checkbox" name="clearpic" value="1" />去掉缩略图{/if}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">地址：</div>
		<div class="c">
			<input type="text" name="address"  class="input_border" value="{ $_A.discount_result.address}" size="30"  />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">分类：</div>
		<div class="c">
			<input type="text" name="type" id="type"  class="input_border" value="{ $_A.discount_result.type}" size="30"/><script src="/plugins/index.php?q=liandong&name=types&nid=zhekou_type&id=type"></script>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">商圈：</div>
		<div class="c">
			<input type="text" name="business_district"  class="input_border" value="{ $_A.discount_result.business_district}" size="30"  />
		</div>
	</div>
	
	
	
	<div class="module_border">
		<div class="l">标题：</div>
		<div class="c">
			<input type="text" name="name"  class="input_border" value="{ $_A.discount_result.name}" size="30"  />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">城市：</div>
		<div class="c">
			<script src="./plugins/index.php?&q=area&area={$_A.discount_result.area}" type='text/javascript' language="javascript"></script>
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">标签：</div>
		<div class="c">
			<input type="text" name="tag"  class="input_border" value="{ $_A.discount_result.tag}" size="30"  />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">开始时间：</div>
		<div class="c">
			<script src="./plugins/index.php?&q=protime&name=start_date&type=y,m,d&time={$_A.discount_result.start_date}" type='text/javascript' language="javascript"></script>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">结束时间：</div>
		<div class="c">
			<script src="./plugins/index.php?&q=protime&name=end_date&type=y,m,d&time={$_A.discount_result.end_date}" type='text/javascript' language="javascript"></script>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">发布者：</div>
		<div class="c">
			<input type="text" name="post_user"  class="input_border" value="{ $_A.discount_result.post_user}" size="30"  />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">状态：</div>
		<div class="c">
			<input type="radio" name="status" value="0"  { if $_A.discount_result.status == 0 }checked="checked"{/if}/>隐藏 <input type="radio" name="status" value="1"  { if $_A.discount_result.status ==1 ||$_A.discount_result.status ==""}checked="checked"{/if}/>显示
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">内容：</div>
		<div class="c">
			{editor name="comment" type="sinaeditor" value="$_A.discount_result.comment"}
		</div>
	</div>
	
	<div class="module_submit" >
		{ if $_A.query_type == "edit" }<input type="hidden" name="id" value="{ $_A.discount_result.id }" size="30"  />{/if}
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
	 var errorMsg = '';
	  if (title.length == 0 ) {
		errorMsg += '标题必须填写' + '\n';
	  }
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{
		return true;
	  }
}

</script>
{/literal}
{elseif $_A.query_type=="company"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<form action="{$_A.query_url}/action{$_A.site_url}" method="post">
	<tr >
		<td class="main_td">ID</td>
		<td class="main_td">商家名称</td>
		<td class="main_td">优惠类型</td>
		<td  class="main_td">联系人</td>
		<td  class="main_td">联系电话</td>
		<td class="main_td">操作</td>
	</tr>
	{ foreach  from=$_A.discount_company_list key=key item=item}
	<tr  {if $key%2==1}class="tr2"{/if}>
		<td class="main_td1" align="center">{ $item.id}</td>
		<td class="main_td1" align="center">{$item.name}</td>
		<td class="main_td1" align="center">{$item.type}</td>
		<td class="main_td1" align="center">{ $item.linkman}</td>
		<td class="main_td1" align="center">{$item.tel}</td>
		<td class="main_td1" align="center"><a href="{$_A.query_url}/company_edit&id={$item.id}">编辑</a> | <a href="#" onClick="javascript:if(confirm('确定要删除吗?删除后将不可恢复')) location.href='{$_A.query_url}/company_del{$_A.site_url}&id={$item.id}'">删除</a></td>
	</tr><input type="hidden" name="flag[{$key}]" value="{$item.flag}" />
	{ /foreach}
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
	var goods = $("#goods").val();
	location.href=url+"&goods="+goods;
}
</script>
{/literal}
{elseif $_A.query_type == "company_new" || $_A.query_type == "company_edit"}
<div class="module_add">
	
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data">
	<div class="module_title"><strong>{ if $_A.query_type == "edit" }编辑{else}添加{/if}折扣商家</strong></div>
	
	<div class="module_border">
		<div class="l">商家名称：</div>
		<div class="c">
			<input type="text" name="name"  id="name"  class="input_border" value="{ $_A.discount_company_result.name}" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">活动产品：</div>
		<div class="c">
			<input type="text" name="goods"  class="input_border" value="{ $_A.discount_company_result.goods}" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">优惠类型：</div>
		<div class="c">
			<input type="text" name="type"  id="type"  class="input_border" value="{ $_A.discount_company_result.type}" /><script src="/plugins/index.php?q=liandong&name=types&nid=discount_type&id=type"></script>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">联系人：</div>
		<div class="c">
			<input type="text" name="linkman"  class="input_border" value="{ $_A.discount_company_result.linkman}" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">联系电话 ：</div>
		<div class="c">
			<input type="text" name="tel"  class="input_border" value="{ $_A.discount_company_result.tel}" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">内容：</div>
		<div class="c">
			{editor name="content" type="sinaeditor" value="$_A.discount_company_result.content"}
		</div>
	</div>
	
	<div class="module_submit" >
		{ if $_A.query_type == "company_edit" }<input type="hidden" name="id" value="{ $_A.discount_company_result.id }" />{/if}
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
	 var errorMsg = '';
	  if (title.length == 0 ) {
		errorMsg += '标题必须填写' + '\n';
	  }
	 
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{
		return true;
	  }
}

</script>
{/literal}

{else}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<form action="{$_A.query_url}/action{$_A.site_url}" method="post">
	<tr >
		<td class="main_td"><input type="checkbox" name="allcheck" onclick="checkFormAll(this.form)"/></td>
		<td  class="main_td">ID</td>
		<td class="main_td">商家</td>
		<td class="main_td">折扣标题</td>
		<td class="main_td">优惠类型</td>
		<td class="main_td">开始日期</td>
		<td class="main_td">结束日期</td>
		<td class="main_td">状态</td>
		<td class="main_td">操作</td>
	</tr>
	{ foreach  from=$_A.discount_list key=key item=item}
	<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center"><input type="checkbox" name="aid[{$key}]" value="{$item.id}"/></td>
		<td class="main_td1" align="center">{ $item.id}</td>
		<td class="main_td1" align="center">{$item.company_name}</td>
		<td class="main_td1" align="center">{$item.name}</td>
		<td class="main_td1" align="center">{ $item.type}</td>
		<td class="main_td1" align="center">{ $item.start_date|date_format 'Y-m-d'}</td>
		<td class="main_td1" align="center">{ $item.end_date|date_format 'Y-m-d'}</td>
		<td class="main_td1" align="center" width="50">{ if $item.status ==1}<a href="{$_A.query_url}{$_A.site_url}&status=0&id={ $item.id}">显示</a>{else}<a href="{$_A.query_url}{$_A.site_url}&status=1&id={ $item.id}">隐藏</a>{/if}</td>
		<td class="main_td1" align="center"><a href="{$_A.query_url}/edit&id={$item.id}{$_A.site_url}">编辑</a>|<a href="#" onClick="javascript:if(confirm('确定要删除吗?删除后将不可恢复')) location.href='{$_A.query_url}/del&id={$item.id}{$_A.site_url}'">删除</a></td>
	</tr><input type="hidden" name="flag[{$key}]" value="{$item.flag}" />
	{ /foreach}
	<tr>
		<td colspan="9" class="action" >
		<div class="floatl">&nbsp;&nbsp; <select name="type">
		<option value="6">删除</option>&nbsp;&nbsp;&nbsp;
		</select> <input type="submit" value="确认操作" /> 排序不用全选
		</div><div class="floatr">
	
		商家：<input type="text" name="shop" id="shop" value="{$magic.request.shop}"/>
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
			var shop = $("#shop").val();
			location.href=url+"&shop="+shop;
		}

	  </script>
	  {/literal}
{/if}