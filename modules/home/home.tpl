{if $_A.query_type == "new" || $_A.query_type == "edit"}
<div class="module_add">
	
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>{ if $_A.query_type == "edit" }编辑{else}添加{/if}</strong></div>
	
	<div class="module_border">
		<div class="l">所属栏目：</div>
		<div class="c">
			<select name="site_id"><option value="0">默认类型</option>{foreach from=$_A.site_list item=item key=key}
<option value="{ $item.site_id}" {if $result.site_id == $item.site_id} selected="selected"{/if} >-{$item.aname}</option>
{ /foreach}</select></div>
	</div>
	
	<div class="module_border" >
		<div class="l">所在地：</div>
		<div class="c">
			<script src="./plugins/index.php?&q=area&area={ $_A.home_result.area}" type='text/javascript' language="javascript"></script> </div>
	</div>

	<div class="module_border" >
		<div class="l">标题:</div>
		<div class="c">
			<input type="text" name="name"  class="input_border" value="{ $_A.home_result.name}" size="30" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">用户ID：</div>
		<div class="c">
			<input type="text" name="user_id"  class="input_border" value="{ $_A.home_result.user_id}" size="10" />
		</div>
	</div>
	

	<div class="module_border" >
		<div class="l">上传缩略图：</div>
		<div class="c">
			<input type="file" name="litpic" size="30" class="input_border"/>{if $_A.home_result.litpic!=""}<a href="./{ $_A.home_result.litpic}" target="_blank" title="有图片"><img src="{ $tpldir }/images/ico_1.jpg" border="0"  /></a>{/if}</div>
	</div>

	<div class="module_border">
		<div class="l">定义属性：</div>
		<div class="c">
			{foreach from="$_A.flag_list" item="var"}<input type="checkbox" name="flag[]" value="{$var.nid}" {$var.nid|checked:$_A.code_result.flag } />{$var.name} {/foreach}
		</div>
	</div>
	
	<div class="module_border" >
		<div class="l">排序:</div>
		<div class="c">
			<input type="text" name="order"  class="input_border" value="{ $_A.home_result.order|default:10}" size="10" />
		</div>
	</div>
	
	<div class="module_title"><strong>内容详细</strong></div>
	
	<div class="module_border" >
		<div class="l">出租类型:</div>
		<div class="c">
			<input type="radio" name="chuzuleixing"  class="input_border" value="1" { if $_A.home_result.chuzuleixing==1 ||  $_A.home_result.chuzuleixing==''} checked="checked"{/if} /> 整租
			<input type="radio" name="chuzuleixing"  class="input_border" value="2" { if $_A.home_result.chuzuleixing==2} checked="checked"{/if} /> 单间
			<input type="radio" name="chuzuleixing"  class="input_border" value="3" { if $_A.home_result.chuzuleixing==3} checked="checked"{/if} /> 床位
		</div>
	</div>	
	
	<div class="module_border" >
		<div class="l">所在小区:</div>
		<div class="c">
			<input type="text" name="xiaoqu"  class="input_border" value="{ $_A.home_result.xiaoqu}" size="30" />
		</div>
	</div>	
	
	
	<div class="module_border" >
		<div class="l">整套户型:</div>
		<div class="c">
			<input type="text" name="shi"  class="input_border" value="{ $_A.home_result.shi}" size="5" /> 室
			<input type="text" name="ting"  class="input_border" value="{ $_A.home_result.ting}" size="5" /> 厅
			<input type="text" name="wei"  class="input_border" value="{ $_A.home_result.wei}" size="5" /> 卫
			&nbsp;&nbsp;&nbsp;第
			<input type="text" name="louceng"  class="input_border" value="{ $_A.home_result.louceng}" size="5" /> 层 
			总
			<input type="text" name="zonglouceng"  class="input_border" value="{ $_A.home_result.zonglouceng}" size="5" /> 层 
		</div>
	</div>	
	
	
	<div class="module_border" >
		<div class="l">面积:</div>
		<div class="c">
			<input type="text" name="mianji"  class="input_border" value="{ $_A.home_result.mianji}" size="5" /> 平米 &nbsp;&nbsp;
			<script src="/plugins/index.php?q=linkage&name=leixing&nid=home_leixing&value={$_A.home_result.leixing}"></script>
			<script src="/plugins/index.php?q=linkage&name=zhuangxiu&nid=home_zhuangxiu&value={$_A.home_result.zhuangxiu}"></script>
			<script src="/plugins/index.php?q=linkage&name=chaoxiang&nid=home_chaoxiang&default=选择朝向&value={$_A.home_result.chaoxiang}"></script>
		</div>
	</div>	
	
	
	<div class="module_border" >
		<div class="l">租金:</div>
		<div class="c">
			<input type="text" name="mianji"  class="input_border" value="{ $_A.home_result.mianji}" size="5"   />   元/月  &nbsp;&nbsp;
			<script src="/plugins/index.php?q=linkage&name=zujin&nid=home_zujin&value={$_A.home_result.zujin}"></script>
		</div>
	</div>	
	
	<div class="module_border" >
		<div class="l">房屋配置:</div>
		<div class="c">
			<script src="/plugins/index.php?q=linkage&name=peizhi&nid=home_peizhi&type=checkbox&value={$_A.home_result.peizhi}"></script>
		</div>
	</div>
	
	<div class="module_border" >
		<div class="l">补充说明:</div>
		<div class="c">
			<textarea name="content" cols="45" rows="5">{ $_A.home_result.content}</textarea>
		</div>
	</div>
	
	
	
	<div class="module_title"><strong>联系方式</strong></div>

	
	<div class="module_border">
		<div class="l">联系人：</div>
		<div class="c">
			<input type="text" name="lianxiren"  class="input_border" value="{ $_A.home_result.lianxiren}"  size="30" />
		</div>
	</div>

	<div class="module_border">
		<div class="l">手机或电话：</div>
		<div class="c">
			<input type="text" name="dianhua"  class="input_border" value="{ $_A.home_result.dianhua}" size="30" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">QQ：</div>
		<div class="c">
			<input type="text" name="qq"  class="input_border" value="{ $_A.home_result.qq}" size="30" />
		</div>
	</div>
	
	<div class="module_submit" >
		{ if $_A.query_type == "edit" }<input type="hidden" name="id" value="{ $_A.home_result.id }" />{/if}
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
	
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>证件查看</strong></div>

	<div class="module_border">
		<div class="l">用户名：</div>
		<div class="c">
			{ $_A.home_result.username}
		</div>
	</div>


	<div class="module_border">
		<div class="l">所属栏目：</div>
		<div class="c">
			{ $_A.home_result.type_name }
		</div>
	</div>


	<div class="module_border">
		<div class="l">证件图片：</div>
		<div class="c">
			<a href="{ $_A.home_result.litpic|imgurl_format }" ><img src="{ $_A.home_result.litpic|imgurl_format }" width="100" height="100" /></a>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">简介:</div>
		<div class="c">
			{ $_A.home_result.content}</div>
	</div>

	<div class="module_border">
		<div class="l">添加时间/IP:</div>
		<div class="c">
			{ $_A.home_result.addtime|date_format:'Y-m-d H:i:s'}/{ $_A.home_result.addip}</div>
	</div>
	
	
	<div class="module_title"><strong>审核此证件</strong></div>
	
	<div class="module_border">
		<div class="l">状态:</div>
		<div class="c">
		<input type="radio" name="status" value="0" {if $_A.home_result.status==0} checked="checked"{/if} />等待审核  <input type="radio" name="status" value="1" {if $_A.home_result.status==1} checked="checked"{/if}/>审核通过 <input type="radio" name="status" value="2" {if $_A.home_result.status==2} checked="checked"{/if}/>审核不通过 </div>
	</div>
	
	<div class="module_border" >
		<div class="l">通过所应的积分:</div>
		<div class="c">
			<input type="text" name="jifen" value="{ $_A.home_result.jifen}" size="5">
		</div>
	</div>
	
	<div class="module_border" >
		<div class="l">审核备注:</div>
		<div class="c">
			<textarea name="verify_remark" cols="45" rows="5">{ $_A.home_result.verify_remark}</textarea>
		</div>
	</div>

	<div class="module_submit" >
		<input type="hidden" name="id" value="{ $_A.home_result.id }" />
		
		<input type="submit"  name="reset" value="审核此证件" />
	</div>
	</form>
</div>
{literal}
<script>
function check_form(){
	 var frm = document.forms['form1'];
	 var verify_remark = frm.elements['verify_remark'].value;
	 var errorMsg = '';
	  if (verify_remark.length == 0 ) {
		errorMsg += '备注必须填写' + '\n';
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
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">用户名称</td>
			<td width="" class="main_td">认证类型</td>
			<td width="" class="main_td">认证图片</td>
			<td width="" class="main_td">认证状态</td>
			<td width="" class="main_td">认证积分</td>
			<td width="" class="main_td">认证简介</td>
			<td width="" class="main_td">操作</td>
		</tr>
		{ foreach  from=$_A.home_list key=key item=item}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td class="main_td1" align="center" >{ $item.id}</td>
			<td class="main_td1" align="center"><a href="{$_A.query_url}&username={$item.username}">{$item.username}</a></td>
			<td class="main_td1" align="center" >{$item.type_name}</td>
			<td class="main_td1" align="center" ><a href="{ $item.litpic|imgurl_format }" target="_blank" ><img src="{ $item.litpic|imgurl_format }" width="50" height="50" style="border:1px solid #CCCCCC" /></a></td>
			<td class="main_td1" align="center" >{ if $item.status ==1}审核通过{ elseif $item.status ==0}等待审核{else}审核未通过{/if}</td>
			<td class="main_td1" align="center" >{$item.jifen}</td>
			<td class="main_td1" align="center" >{$item.content}</td>
			<td class="main_td1" align="center" ><a href="{$_A.query_url}/view{$site_url}&id={$item.id}">审核</a> <a href="{$_A.query_url}/edit{$site_url}&id={$item.id}">修改</a> <a href="#" onClick="javascript:if(confirm('确定要删除吗?删除后将不可恢复')) location.href='{$_A.query_url}/del{$site_url}&id={$item.id}'">删除</a></td>
		</tr>
		{ /foreach}
		<tr>
		<td colspan="10" class="action">
		<div class="floatl">
		
		</div>
		<div class="floatr">
			用户名：<input type="text" name="username" id="username" value="{$magic.request.username}"/> 状态<select id="status" ><option value="">全部</option><option value="1" {if $magic.request.status==1} selected="selected"{/if}>已通过</option><option value="0" {if $magic.request.status=="0"} selected="selected"{/if}>未通过</option></select> <input type="button" value="搜索" / onclick="sousuo()">
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
{elseif $_A.query_type == "type_list"}
<table width="100%" border="0" cellpadding="5" cellspacing="1" >
	<tr>
		<td class="main_td">类型名称</td>
		<td class="main_td">积分</td>
		<td class="main_td">简要</td>
		<td class="main_td">备注</td>
		<td class="main_td">排序</td>
		<td class="main_td">状态</td>
		<td class="main_td">操作</td>
	</tr>
	<form action="{$_A.query_url}/type_order" method="post">
	{ foreach from = $_A.home_type_list key=key item=item}
	<tr {if $key%2==1} class="tr2"{/if}>
		<td bgcolor="#ffffff" >{$item.name}</td>
		<td bgcolor="#ffffff" >{$item.jifen}</td>
		<td bgcolor="#ffffff" >{$item.summary}</td>
		<td bgcolor="#ffffff">{$item.remark}</td>
		<td bgcolor="#ffffff"><input name="order[]" size="2" value="{ $item.order}"type="text" ><input name="type_id[]" type="hidden" size="2" value="{ $item.type_id}" ></td>
		<td  bgcolor="#ffffff" >{ if $item.status==1}开通{else}<font color=red>关闭</font>{/if}</td>
		<td bgcolor="#ffffff"><a href="{$_A.query_url}/type_edit&type_id={$item.type_id}">修改</a>/<a href="#" onclick="javascript:if(confirm('确定要删除吗?请慎重')) location.href='{$_A.query_url}/type_del&type_id={$item.type_id}'">删除</a></td>
	</tr>
	{ /foreach}
	<tr>
		<td   colspan="7" class="action"><input type="button" onclick="javascript:location.href='{$_A.query_url}/type_new{$_A.site_url}'" value="添加类型" />  <input type="submit" value="修改排序" /> </td>
	</tr>
	</form>
</table>
{ elseif $_A.query_type == "type_new" || $_A.query_type == "type_edit" }
<div class="module_add">
	
	<form enctype="multipart/form-data" name="form1" method="post" action="" onsubmit="return check_form();"  >
	<div class="module_title"><strong>{ if $_A.query_type == "edit" }编辑{else}添加{/if}认证类型</strong></div>
	
	<div class="module_border">
		<div class="l">类型名称:</div>
		<div class="c">
			<input type="text" name="name"  class="input_border" value="{ $_A.home_type_result.name}" size="30" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">排序:</div>
		<div class="c">
			<input type="text" name="order"  class="input_border" value="{ $_A.home_type_result.order|default:10}" size="30" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">状态:</div>
		<div class="c">
			<input type="radio" name="status" value="0"  { if $_A.home_type_result.status == 0 }checked="checked"{/if}/> 关闭<input type="radio" name="status" value="1"  { if $_A.home_type_result.status ==1 ||$_A.home_type_result.status ==""}checked="checked"{/if}/>开通
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">默认积分:</div>
		<div class="c">
			<input type="text" name="jifen" value="{ $_A.home_type_result.jifen|default:2}" /
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">简要说明:</div>
		<div class="c">
			<textarea name="summary" cols="55" rows="6" >{ $_A.home_type_result.summary}</textarea>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">备注:</div>
		<div class="c">
			<textarea name="remark" cols="55" rows="6" >{ $_A.home_type_result.remark}</textarea>
		</div>
	</div>
	
	<div class="module_submit" >
	{ if $_A.query_type == "type_edit" }<input type="hidden" name="type_id" value="{ $_A.home_type_result.type_id }" />{/if}
		<input type="submit" value="确认提交" />
		<input type="reset" name="reset" value="重置表单" />
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
		errorMsg += '类型名称必须填写' + '\n';
	  }
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }
}
{/literal}
</script>

{/if}