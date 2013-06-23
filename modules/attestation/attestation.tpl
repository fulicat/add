{if $_A.query_type == "new" || $_A.query_type == "edit"}
<div class="module_add">
	
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>{ if $_A.query_type == "edit" }编辑{else}添加{/if}认证</strong></div>
	

	<div class="module_border">
		<div class="l">用户ID：</div>
		<div class="c">
			<input type="text" name="user_id"  class="input_border" value="{ $_A.attestation_result.user_id}" size="30" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">所属栏目：</div>
		<div class="c">
			<select  name="type_id" >{foreach from="$_A.attestation_type_list" item="var"}<option value="{$var.type_id}" {if $_A.attestation_result.type_id == $var.type_id} selected="selected"{/if}>{$var.name}</option> {/foreach}
			</select>
		</div>
	</div>

	<div class="module_border" >
		<div class="l">上传图片：</div>
		<div class="c">
			<input type="file" name="litpic" size="30" class="input_border"/>{if $_A.attestation_result.litpic!=""}<a href="./{ $_A.attestation_result.litpic}" target="_blank" title="有图片"><img src="{ $tpldir }/images/ico_1.jpg" border="0"  /></a>{/if}</div>
	</div>


	<div class="module_border" >
		<div class="l">排序:</div>
		<div class="c">
			<input type="text" name="order"  class="input_border" value="{ $_A.attestation_result.order|default:10}" size="10" />
		</div>
	</div>

	<div class="module_border" >
		<div class="l">内容简介:</div>
		<div class="c">
			<textarea name="content" cols="45" rows="5">{ $_A.attestation_result.content}</textarea>
		</div>
	
	
	</div>
	
	<div class="module_submit" >
		{ if $_A.query_type == "edit" }<input type="hidden" name="id" value="{ $_A.attestation_result.id }" />{/if}
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
			<a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?{$_A.admin_url}&q=module/user/view&user_id={$_A.attestation_result.user_id}&type=scene",500,230,"true","","true","text");'>{ $_A.attestation_result.username}</a>
		</div>
	</div>


	<div class="module_border">
		<div class="l">类型：</div>
		<div class="c">
			{ $_A.attestation_result.type_name }
		</div>
	</div>


	<div class="module_border">
		<div class="l">证件图片：</div>
		<div class="c">
			<a href="{ $_A.attestation_result.litpic|imgurl_format }" target="_blank"><img src="{ $_A.attestation_result.litpic|imgurl_format }" width="100" height="100" /></a>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">简介:</div>
		<div class="c">
			{ $_A.attestation_result.content}</div>
	</div>

	<div class="module_border">
		<div class="l">添加时间/IP:</div>
		<div class="c">
			{ $_A.attestation_result.addtime|date_format:'Y-m-d H:i:s'}/{ $_A.attestation_result.addip}</div>
	</div>
	
	{if $_A.attestation_result.status==1 }
	
	<div class="module_border">
		<div class="l">积分:</div>
		<div class="c">
			{ $_A.attestation_result.jifen} 分</div>
	</div>
	
	<div class="module_border">
		<div class="l">审核备注:</div>
		<div class="c">
			{ $_A.attestation_result.verify_remark}</div>
	</div>
	
	<div class="module_border">
		<div class="l">审核时间:</div>
		<div class="c">
			{ $_A.attestation_result.verify_time|date_format:'Y-m-d H:i:s'}</div>
	</div>
	{else}
	<div class="module_title"><strong>审核此证件</strong></div>
	
	<div class="module_border">
		<div class="l">状态:</div>
		<div class="c">
		<input type="radio" name="status" value="1"/><font color="#009900">审核通过</font> <input type="radio" name="status" value="2" checked="checked"/>审核不通过 </div>
	</div>
	
	<div class="module_border" >
		<div class="l">通过得信用积分:</div>
		<div class="c">
			<input type="text" name="jifen" value="{ $_A.arrestation_value}" size="5"> 分
		</div>
	</div>
	
	<div class="module_border" >
		<div class="l">审核备注:</div>
		<div class="c">
			<textarea name="verify_remark" cols="45" rows="5">{ $_A.attestation_result.verify_remark}</textarea>
		</div>
	</div>
	
	<div class="module_border" >
		<div class="l">验证码:</div>
		<div class="c">
			<input name="valicode" type="text" size="11" maxlength="4"  tabindex="3"/>&nbsp;<img src="/plugins/index.php?q=imgcode" alt="点击刷新" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
		</div>
	</div>

	<div class="module_submit" >
		<input type="hidden" name="id" value="{ $_A.attestation_result.id }" />
		<input type="hidden" name="type_name" value="{ $_A.attestation_result.type_name }" />
		<input type="hidden" name="user_id" value="{ $_A.attestation_result.user_id }" />
		
		<input type="submit"  name="reset" value="审核此证件" />
	</div>
	</form>
	{/if}
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
			<td class="main_td">ID</td>
			<td width="*" class="main_td">用户名称</td>
			<td width="*" class="main_td">真实姓名</td>
			<td class="main_td">认证类型</td>
			<td class="main_td">认证图片</td>
			<td class="main_td">认证状态</td>
			<td class="main_td">认证积分</td>
			<td class="main_td">认证简介</td>
			<td class="main_td">操作</td>
		</tr>
		{ foreach  from=$_A.attestation_list key=key item=item}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td class="main_td1" align="center" >{ $item.id}</td>
			<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?{$_A.admin_url}&q=module/user/view&user_id={$item.user_id}&type=scene",500,230,"true","","true","text");'>{$item.username}</a></td>
			<td class="main_td1" align="center" >{ $item.realname}</td>
			<td class="main_td1" align="center" >{$item.type_name}</td>
			<td class="main_td1" align="center" ><a href="{ $item.litpic|imgurl_format }" target="_blank" ><img src="{ $item.litpic|imgurl_format }" width="50" height="50" style="border:1px solid #CCCCCC" /></a></td>
			<td class="main_td1" align="center" >{ if $item.status ==1}<font color="#009900">审核通过</font>{ elseif $item.status ==0}<font color="#ff0000">等待审核</font>{else}审核未通过{/if}</td>
			<td class="main_td1" align="center" >{$item.jifen}分</td>
			<td class="main_td1" align="center" >{$item.content}</td>
			<td class="main_td1" align="center" >{ if $item.status !=1}<a href="{$_A.query_url}/view{$_A.site_url}&id={$item.id}">审核</a>{else}-{/if} </td>
		</tr>
		{ /foreach}
		<tr>
		<td colspan="10" class="action">
		<div class="floatl">
		
		</div>
		<div class="floatr">
			用户名：<input type="text" name="username" id="username" value="{$magic.request.username}"/> 真实姓名：<input type="text" name="realname" id="realname" value="{$magic.request.realname}"/> 状态<select id="status" ><option value="">全部</option><option value="1" {if $magic.request.status==1} selected="selected"{/if}>已通过</option><option value="0" {if $magic.request.status=="0"} selected="selected"{/if}>未通过</option></select> <input type="button" value="搜索" / onclick="sousuo()">
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
var _url = '{$_A.site_url}';
{literal}
function sousuo(){
	var sou = "";
	var username = $("#username").val();
	if (username!=""){
		sou += "&username="+username;
	}
	var realname = $("#realname").val();
	if (realname!=""){
		sou += "&realname="+realname;
	}
	var status = $("#status").val();
	if (status!=""){
		sou += "&status="+status;
	}
	
	location.href=url+sou+_url;
	
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
	{ foreach from = $_A.attestation_type_list key=key item=item}
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
			<input type="text" name="name"  class="input_border" value="{ $_A.attestation_type_result.name}" size="30" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">排序:</div>
		<div class="c">
			<input type="text" name="order"  class="input_border" value="{ $_A.attestation_type_result.order|default:10}" size="10" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">状态:</div>
		<div class="c">
			<input type="radio" name="status" value="0"  { if $_A.attestation_type_result.status == 0 }checked="checked"{/if}/> 关闭<input type="radio" name="status" value="1"  { if $_A.attestation_type_result.status ==1 ||$_A.attestation_type_result.status ==""}checked="checked"{/if}/>开通
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">默认积分:</div>
		<div class="c">
			<input type="text" name="jifen" value="{ $_A.attestation_type_result.jifen|default:2}" /
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">简要说明:</div>
		<div class="c">
			<textarea name="summary" cols="55" rows="6" >{ $_A.attestation_type_result.summary}</textarea>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">备注:</div>
		<div class="c">
			<textarea name="remark" cols="55" rows="6" >{ $_A.attestation_type_result.remark}</textarea>
		</div>
	</div>
	
	<div class="module_submit" >
	{ if $_A.query_type == "type_edit" }<input type="hidden" name="type_id" value="{ $_A.attestation_type_result.type_id }" />{/if}
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
{elseif $_A.query_type=="realname"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	 
		<tr >
			
			<td width="*" class="main_td">用户名称</td>
			<td class="main_td">真实姓名</td>
			<td class="main_td">性别</td>
			<td class="main_td">民族</td>
			<td class="main_td">生日</td>
			<td class="main_td">证件类型</td>
			<td class="main_td">证件号码</td>
			<td class="main_td">籍贯</td>
			<td class="main_td">身份证图片</td>
			<td class="main_td">状态</td>
			<td class="main_td">操作</td>
		</tr>
		{ foreach  from=$_A.user_real_list key=key item=item}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?{$_A.admin_url}&q=module/user/view&user_id={$item.user_id}&type=scene",500,230,"true","","true","text");'>{$item.username}</a></td>
			<td class="main_td1" align="center" >{$item.realname}</td>
			<td class="main_td1" align="center" >{if $item.sex==1}男{else}女{/if}</td>
			<td class="main_td1" align="center" >{$item.nation|linkage}</td>
			<td class="main_td1" align="center" >{$item.birthday|date_format:"Y-m-d "}</td>
			<td class="main_td1" align="center" >{$item.card_type|linkage:"card_type"}</td>
			<td class="main_td1" align="center" >{$item.card_id}</td>
			<td class="main_td1" align="center" >{$item.area|area}</td>
			<td class="main_td1" align="center" >{if $item.card_pic1!=""}<a href="{$item.card_pic1}" target="_blank">正面</a>{else}无{/if}| {if $item.card_pic2!=""}<a  href="{$item.card_pic2}" target="_blank">背面</a>{else}无{/if}</td>
			<!--
			<td class="main_td1" align="center" >{if $item.card_pic1!=""}<a href="{$item.card_pic1}"  onclick='tipsWindown("身份证正面图片","img:{$item.card_pic1}",500,430,"true","","true","img")'>正面</a>{else}无{/if}| {if $item.card_pic2!=""}<a  href="#"  onclick='tipsWindown("身份证反面图片","img:{$item.card_pic2}",500,430,"true","","true","img")'>背面</a>{else}无{/if}</td>
			-->
			<td class="main_td1" align="center" >{if $item.real_status==2}<font color="#00ffff">等待审核</font>{else}<font color="#009900">审核通过</font>{/if}</td>
			<td class="main_td1" align="center" >{if $item.real_status!=1}<a href="javascript:void(0)" onclick='tipsWindown("真实姓名审核","url:get?{$_A.query_url}/audit&user_id={$item.user_id}&type=realname",500,230,"true","","true","text");'>审核</a>{else}-{/if} </td>
		</tr>
		{ /foreach}
		<tr>
		<td colspan="11" class="action">
		<div class="floatl">
		
		</div>
		<div class="floatr">
			用户名：<input type="text" name="username" id="username" value="{$magic.request.username}"/> 状态<select id="status" ><option value="">全部</option><option value="1" {if $magic.request.real_status==1} selected="selected"{/if}>已通过</option><option value="0" {if $magic.request.real_status=="0"} selected="selected"{/if}>未通过</option></select> <input type="button" value="搜索" / onclick="sousuo()">
		</div>
		</td>
	</tr>
		<tr>
			<td colspan="11" class="page">
			{$_A.showpage} 
			</td>
		</tr>
	</form>	
</table>
<script>
var url = '{$_A.query_url}/realname';
{literal}
function sousuo(){
	var sou = "";
	var username = $("#username").val();
	if (username!=""){
		sou += "&username="+username;
	}
	var status = $("#status").val();
	if (status!=""){
		sou += "&real_status="+status;
	}
	
	location.href=url+sou;
	
}
</script>
{/literal}
{elseif $_A.query_type == "vip"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">ID</td>
		<td width="*" class="main_td">用户名</td>
		<td width="*" class="main_td">客服名称</td>
		<th width="" class="main_td">添加时间</th>
		<th width="" class="main_td">用户类型</th>
		<th width="" class="main_td">登录次数</th>
		<th width="" class="main_td">状态</th>
		<th width="" class="main_td">是否缴费</th>
		<td width="" class="main_td">操作</td>
	</tr>
	{ foreach  from=$_A.user_vip_list key=key item=item}
	<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center">{ $item.user_id}</td>
		<td class="main_td1" align="center">{$item.username}</td>
		<td class="main_td1" align="center">{$item.kefu_username}</td>
		<td class="main_td1" align="center" >{$item.addtime|date_format:"Y-m-d H:i:s"}</td>
		<td class="main_td1" align="center" >{$item.typename}</td>
		<td class="main_td1" align="center">{$item.logintime}</td>
		<td class="main_td1" align="center">{if $item.vip_status==2}vip审核{else}VIP会员{/if}</td>
		<td class="main_td1" align="center">{if $item.vip_money==""}无{else}{$item.vip_money}元{/if}</td>
		<td class="main_td1" align="center"><a href="{$_A.query_url}/vipview&user_id={$item.user_id}{$_A.site_url}">审核查看</a> </td>
	</tr>
	{ /foreach}
	<tr>
			<td colspan="10" class="action">
			<div class="floatl">
			<script>
	  var url = '{$_A.query_url}/vip&type={$magic.request.type}';
	    {literal}
	  	function sousuo(){
			var username = $("#username").val();
			var kefu = $("#kefu").val();
			var keywords = $("#keywords").val();
			location.href=url+"&keywords="+keywords+"&kefu="+kefu;
		}
	  
	  </script>
	  {/literal}
			</div>
			<div class="floatr">
				用户名：<input type="text" name="keywords" id="keywords" value="{$magic.request.keywords}"/> 	客服用户名：<input type="text" name="kefu" id="kefu" value="{$magic.request.kefu}"/> <input type="button" value="搜索" / onclick="sousuo()">
			</div>
			</td>
		</tr>
	<tr>
		<td colspan="10" class="page">
		{$_A.showpage}
		</td>
	</tr>
</table>
{ elseif $_A.query_type == "vipview"  }
<div class="module_add">
	
	<form enctype="multipart/form-data" name="form1" method="post" action="" onsubmit="return check_form();"  >
	<div class="module_title"><strong>VIP审核查看</strong></div>
	
	<div class="module_border">
		<div class="l">用户名:</div>
		<div class="c">
			{$_A.user_result.username}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">审核:</div>
		<div class="c">
			<input type="radio" value="1" name="vip_status" />审核通过 <input type="radio" value="0" name="vip_status" checked="checked" />审核不通过 
		</div>
	</div>
	<div class="module_border">
		<div class="l">备注:</div>
		<div class="c">
			{$_A.user_result.vip_remark}
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">审核备注:</div>
		<div class="c">
			<textarea name="vip_verify_remark" cols="55" rows="6" >{$_A.user_result.vip_verify_remark}</textarea>
		</div>
	</div>
	
	<div class="module_submit" >
	<input type="hidden" name="user_id" value="{$_A.user_result.user_id}" />
		<input type="submit" value="确认提交" />
		<input type="reset" name="reset" value="重置表单" />
	</div>
	</form>
{elseif $_A.query_type=="all"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	 
		<tr >
			
			<td width="*" class="main_td">用户名称</td>
			<td class="main_td">真实姓名</td>
			<td class="main_td">实名认证</a></td>
			<td class="main_td">邮箱认证</a></td>
			<td class="main_td" width="220"> 手机认证</td>
			<td class="main_td">视频认证</td>
			<td class="main_td">现场认证</td>
			<td class="main_td">操作</td>
		</tr>
		{ foreach  from=$_A.user_all_list key=key item=item}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?{$_A.admin_url}&q=module/user/view&user_id={$item.user_id}&type=scene",500,230,"true","","true","text");'>{$item.username}</a></td>
			<td class="main_td1" align="center" >{$item.realname}</td>
			<td class="main_td1" align="center" >{if $item.real_status==2}<a href="javascript:void(0)" onclick='tipsWindown("真实姓名审核","url:get?{$_A.query_url}/audit&user_id={$item.user_id}&type=realname",500,230,"true","","true","text");'><font color="#FF0000">等待审核</font></a>{elseif $item.real_status==1}<font color="#009900">审核通过</font>{else}<font color="#cccccc">没有申请</font>{/if}</td>
			<td class="main_td1" align="center" >{if $item.email_status==2}<a href="javascript:void(0)" onclick='tipsWindown("邮箱认证审核","url:get?{$_A.query_url}/audit&user_id={$item.user_id}&type=email",500,230,"true","","true","text");'><font color="#FF0000">等待审核</font></a>{elseif $item.email_status==1}<font color="#009900">审核通过</font>{else}<font color="#cccccc">没有申请</font>{/if}</td>
			<td class="main_td1" align="center" >{if $item.phone_status>1}<font color="#999999">[手机：{$item.phone_status}]</font> <a href="javascript:void(0)" onclick='tipsWindown("手机认证审核","url:get?{$_A.query_url}/audit&user_id={$item.user_id}&type=phone",500,230,"true","","true","text");'><font color="#FF0000">等待审核</font></a>{elseif $item.phone_status==1}<font color="#999999">[手机：{$item.phone}]</font><font color="#009900">审核通过</font>{else}<font color="#cccccc">没有申请</font>{/if}</td>
			<td class="main_td1" align="center" >{if $item.video_status==2}<a href="javascript:void(0)" onclick='tipsWindown("视频认证审核","url:get?{$_A.query_url}/audit&user_id={$item.user_id}&type=video",500,230,"true","","true","text");'><font color="#FF0000">等待审核</font></a>{elseif $item.video_status==1}<font color="#009900">审核通过</font>{else}<font color="#cccccc">没有申请</font>{/if}</td>
			<td class="main_td1" align="center" >{if $item.scene_status==0}<a href="javascript:void(0)" onclick='tipsWindown("现场审核","url:get?{$_A.query_url}/audit&user_id={$item.user_id}&type=scene",500,230,"true","","true","text");'><font color="#FF0000">等待审核</font></a>{elseif $item.scene_status==1}<font color="#009900">审核通过</font>{else}<font color="#cccccc">没有申请</font>{/if}</td>
			<td class="main_td1" align="center" ><a href="{$_A.query_url}/jifen&user_id={$item.user_id}">积分修改</a></td>
			
		</tr>
		{ /foreach}
		<tr>
		<td colspan="11" class="action">
		<div class="floatl">
		
		</div>
		<div class="floatr">
			用户名：<input type="text" name="username" id="username" value="{$magic.request.username}"/> 真实姓名：<input type="text" name="realname" id="realname" value="{$magic.request.realname}"/> 状态<select id="type" ><option value="">全部</option>
			<option value="phone" {if $magic.request.type=="phone"} selected="selected"{/if}>手机认证</option>
			<option value="video" {if $magic.request.type=="video"} selected="selected"{/if}>视频认证</option>
			<option value="realname" {if $magic.request.type=="realname"} selected="selected"{/if}>实名认证</option>
			<option value="email" {if $magic.request.type=="email"} selected="selected"{/if}>邮箱认证</option>
			<option value="scene" {if $magic.request.type=="scene"} selected="selected"{/if}>现场认证</option>
			
			</select> <input type="button" value="搜索" / onclick="sousuo()">
		</div>
		</td>
	</tr>
		<tr>
			<td colspan="11" class="page">
			{$_A.showpage} 
			</td>
		</tr>
	</table>
	<script>
var url = '{$_A.query_url}/all';
{literal}
function sousuo(){
	var sou = "";
	var username = $("#username").val();
	if (username!=""){
		sou += "&username="+username;
	}
	var realname = $("#realname").val();
	if (realname!=""){
		sou += "&realname="+realname;
	}
	var type = $("#type").val();
	if (type!=""){
		sou += "&type="+type;
	}
	
	location.href=url+sou;
	
}
</script>
{/literal}

{elseif $_A.query_type == "viewall"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">ID</td>
		<td width="*" class="main_td">用户名</td>
		<td width="*" class="main_td">真实姓名</td>
		<th width="" class="main_td">实名认证</th>
		<th width="" class="main_td">邮箱认证</th>
		<th width="" class="main_td">手机认证</th>
		<th width="" class="main_td">是否VIP</th>
		<th width="" class="main_td">添加时间</th>
		<td width="" class="main_td">操作</td>
	</tr>
	{ foreach  from=$_A.viewall_list key=key item=item}
	<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center">{ $item.user_id}</td>
		<td class="main_td1" align="center">{$item.username}</td>
		<td class="main_td1" align="center">{$item.realname}</td>
		<td class="main_td1" align="center">{if $item.real_status==1}已认证{else}<font color="#FF0000">未认证</font>{/if}</td>
		<td class="main_td1" align="center">{if $item.email_status==1}已认证{else}<font color="#FF0000">未认证</font>{/if}</td>
		<td class="main_td1" align="center">{if $item.phone_status==1}已认证{else}<font color="#FF0000">未认证</font>{/if}</td>
		<td class="main_td1" align="center">{if $item.vip_status==1}VIP会员{else}普通会员{/if}</td>
		<td class="main_td1" align="center" >{$item.addtime|date_format:"Y-m-d H:i:s"}</td>
		<td class="main_td1" align="center"><a href="{$_A.query_url}/view_all&user_id={$item.user_id}{$_A.site_url}">查看全部资料</a> </td>
	</tr>
	{ /foreach}
	<tr>
			<td colspan="10" class="action">
			<div class="floatl">
			<script>
	  var url = '{$_A.query_url}/viewall';
	    {literal}
	  	function sousuo(){
			var username = $("#username").val();
			var realname = $("#realname").val();
			var keywords = $("#keywords").val();
			location.href=url+"&keywords="+keywords+"&realname="+realname;
		}
	  
	  </script>
	  {/literal}
			</div>
			<div class="floatr">
				用户名：<input type="text" name="keywords" id="keywords" value="{$magic.request.keywords}"/> 姓名：<input type="text" name="realname" id="realname" value="{$magic.request.realname}"/> <input type="button" value="搜索" / onclick="sousuo()">
			</div>
			</td>
		</tr>
	<tr>
		<td colspan="10" class="page">
		{$_A.showpage}
		</td>
	</tr>
</table>
{ elseif $_A.query_type == "view_all"  }
<div class="module_add">
	
	<div class="module_title"><strong>用户信息查看</strong></div>
	
	<div class="module_border">
		<div class="l">用户名:</div>
		<div class="c">
			{$_A.user_result.username}
		</div>
	</div>
	<div class="module_border">
		<div class="l">登陆次数:</div>
		<div class="c">
			{$_A.user_result.logintime}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">最后登录时间:</div>
		<div class="c">
			{$_A.user_result.lasttime|date_format}
		</div>
		<div class="l">注册时间:</div>
		<div class="c">
			{$_A.user_result.addtime|date_format}
		</div>
	</div>
	<div class="module_title"><strong>实名认证信息</strong></div>
	<div class="module_border">
		<div class="l">真实姓名 :</div>
		<div class="h">
			{$_A.user_result.realname}
		</div>
		<div class="l">性别 :</div>
		<div class="c">
			{if $_A.user_result.sex==1}男{else}女{/if}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">证件类型:</div>
		<div class="h">
			{$_A.user_result.card_type|linkage:"card_type"}
		</div>
		<div class="l">证件号码:</div>
		<div class="c">
			{$_A.user_result.card_id }
		</div>
	</div>
	<div class="module_border">
		<div class="l">籍贯:</div>
		<div class="h">
			{$_A.user_result.area|area}
		</div>
		<div class="l">身份证图片:</div>
		<div class="c">
			<a href="{$_A.user_result.card_pic1}" target="_blank">正面</a> | <a href="{$_A.user_result.card_pic2}" target="_blank">反面</a>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">民族:</div>
		<div class="h">
			{$_A.user_result.nation|linkage}
		</div>
		<div class="l">生日:</div>
		<div class="c">
			{$_A.user_result.birthday|date_format:"Y-m-d"}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">状态:</div>
		<div class="c">
			{if $_A.user_result.real_status==1}已通过认证{else}未通过认证 {/if}
		</div>
	</div>
	
	<div class="module_title"><strong>邮箱认证信息</strong></div>
	<div class="module_border">
		<div class="l">邮箱 :</div>
		<div class="h">
			{$_A.user_result.email}
		</div>
		
	</div>
	<div class="module_border">
		<div class="l">状态:</div>
		<div class="c">
			{if $_A.user_result.email_status==1}邮箱已通过认证{else}未通过认证{/if}
		</div>
	</div>
	<div class="module_title"><strong>视频认证</strong></div>
	
	<div class="module_border">
		<div class="l">状态:</div>
		<div class="c">
			{if $_A.user_result.video_status==1}已通过视频认证{elseif $_A.user_result.video_status==2}视频认证申请中{else}未通过视频认证 {/if}
		</div>
	</div>
	<div class="module_title"><strong>现场认证</strong></div>
	
	<div class="module_border">
		<div class="l">状态:</div>
		<div class="c">
			{if $_A.user_result.scene_status==1}已通过现场认证{elseif $_A.user_result.scene_status==2}现场认证申请中{else}未通过现场认证 {/if}
		</div>
	</div>
	<div class="module_title"><strong>手机认证信息</strong></div>
	<div class="module_border">
		<div class="l">手机号 :</div>
		<div class="h">
			{$_A.user_result.phone|default:"-"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">状态:</div>
		<div class="c">
			{if $_A.user_result.phone_status==1}手机已通过认证{else}未通过认证 {/if}
		</div>
	</div>
	
	
	<div class="module_title"><strong>VIP认证信息</strong></div>
	<div class="module_border">
		<div class="l">申请备注:</div>
		<div class="h">
			{$_A.user_result.vip_verify_remark}
		</div>
	</div>
	<div class="module_border">
		<div class="l">状态:</div>
		<div class="c">
			{if $_A.user_result.vip_status==1}VIP会员{else}未通过 {/if}
		</div>
	</div>
	<div class="module_title"><strong>用户基本信息</strong></div>
	
	<div class="module_border">
				<div class="w">婚姻状况：</div>
				<div class="h">
					{$_A.userinfo_result.marry|linkage}
				</div>
		
				<div class="w">子 女：</div>
				<div class="c">
					{$_A.userinfo_result.child|linkage}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">学 历：</div>
				<div class="h">
					{$_A.userinfo_result.education|linkage}
				</div>
				<div class="w">月收入：</div>
				<div class="c">
					{$_A.userinfo_result.income|linkage}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">社 保：</div>
				<div class="h">
					{$_A.userinfo_result.shebao|linkage}
				</div>
				<div class="w">社保电脑号：</div>
				<div class="c">
					{$_A.userinfo_result.shebaoid}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">住房条件：</div>
				<div class="h">
					{$_A.userinfo_result.housing}
				</div>
				<div class="w">是否购车：</div>
				<div class="c">
					{$_A.userinfo_result.car|linkage}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">逾期记录：</div>
				<div class="c">
					{$_A.userinfo_result.late|linkage}
				</div>
			</div>
			
			<div class="module_title"><strong>房产资料</strong></div>
			<div class="module_border">
				<div class="w">房产地址：</div>
				<div class="h">
					{$_A.userinfo_result.house_address}
				</div>
				<div class="w">建筑面积：</div>
				<div class="c">
					{$_A.userinfo_result.house_area}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">建筑年份：</div>
				<div class="h">
					{$_A.userinfo_result.house_year|date_format:"Y-m-d"}
				</div>
				<div class="w">供款状况：</div>
				<div class="c">
					{$_A.userinfo_result.house_status} 元
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">所有权人1：</div>
				<div class="h">
					{$_A.userinfo_result.house_holder1} 产权份额{$_A.userinfo_result.house_right1}
				</div>
				<div class="w">所有权人2：</div>
				<div class="c">
					{$_A.userinfo_result.house_holder2} 产权份额{$_A.userinfo_result.house_right2}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">若房产尚在按揭中, 请填写：</div>
				<div class="h">
					贷款年限：{$_A.userinfo_result.house_loanyear} 每月供款 {$_A.userinfo_result.house_loanprice} 元
				</div>
				<div class="w">尚欠贷款余额：</div>
				<div class="c">
					{$_A.userinfo_result.house_balance} 元
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">按揭银行：</div>
				<div class="c">
					{$_A.userinfo_result.house_bank}
				</div>
			</div>
			
			<div class="module_title"><strong>公司资料</strong></div>
			<div class="module_border">
				<div class="w">公司名称：</div>
				<div class="h">
					{$_A.userinfo_result.company_name}
				</div>
				<div class="w">公司性质：</div>
				<div class="c">
					{$_A.userinfo_result.company_type|linkage}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">公司行业：</div>
				<div class="h">
					{$_A.userinfo_result.company_industry|linkage}
				</div>
				<div class="w">工作级别：</div>
				<div class="c">
					{$_A.userinfo_result.company_jibie|linkage}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">职 位：</div>
				<div class="h">
					{$_A.userinfo_result.company_office|linkage}
				</div>
				<div class="w">服务时间：</div>
				<div class="c">
					{$_A.userinfo_result.company_worktime1|date_format:"Y-m-d"}  到{$_A.userinfo_result.company_worktime2|date_format:"Y-m-d"}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">工作年限：</div>
				<div class="h">
					{$_A.userinfo_result.company_workyear|linkage}
				</div>
				<div class="w">工作电话：</div>
				<div class="c">
					{$_A.userinfo_result.company_tel}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">公司地址：</div>
				<div class="h">
					{$_A.userinfo_result.company_address}
				</div>
				<div class="w">公司网站：</div>
				<div class="c">
					{$_A.userinfo_result.company_weburl}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">公司备注说明：</div>
				<div class="c">
					{$_A.userinfo_result.company_reamrk}
				</div>
			</div>
			
			<div class="module_title"><strong>私营业主资料</strong></div>
			<div class="module_border">
				<div class="w">私营企业类型：</div>
				<div class="h">
					{$_A.userinfo_result.private_type|linkage}
				</div>
				<div class="w">成立日期：</div>
				<div class="c">
					{$_A.userinfo_result.private_date|date_format:"Y-m-d"}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">经营场所：</div>
				<div class="h">
					{$_A.userinfo_result.private_place}
				</div>
				<div class="w">租金：</div>
				<div class="c">
					{$_A.userinfo_result.private_rent}元
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">租期：</div>
				<div class="h">
					{$_A.userinfo_result.private_term} 月
				</div>
				<div class="w">税务编号：</div>
				<div class="c">
					{$_A.userinfo_result.private_taxid}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">工商登记号：</div>
				<div class="h">
					{$_A.userinfo_result.private_commerceid}
				</div>
				<div class="w">全年盈利/亏损额：</div>
				<div class="c">
					{$_A.userinfo_result.private_income} 元（年度）
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">雇员人数：</div>
				<div class="c">
					{$_A.userinfo_result.private_employee}  人
				</div>
			</div>
			<div class="module_title"><strong>财务状况</strong></div>
			<div class="module_border">
				<div class="w">每月无抵押贷款还款额：</div>
				<div class="h">
					{$_A.userinfo_result.finance_repayment} 元
				</div>
				<div class="w">自有房产：</div>
				<div class="c">
					{$_A.userinfo_result.finance_property|linkage}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">每月房屋按揭金额：</div>
				<div class="h">
					{$_A.userinfo_result.finance_amount} 元
				</div>
				<div class="w">自有汽车：</div>
				<div class="c">
					{$_A.userinfo_result.finance_car|linkage}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">每月汽车按揭金额：</div>
				<div class="h">
					{$_A.userinfo_result.finance_caramount} 元
				</div>
				<div class="w">每月信用卡还款金额：</div>
				<div class="c">
					{$_A.userinfo_result.finance_creditcard} 元
				</div>
			</div>
			<div class="module_title"><strong>联系方式</strong></div>
			<div class="module_border">
				<div class="w">居住地电话：</div>
				<div class="h">
					{$_A.userinfo_result.tel}
				</div>
			
				<div class="w">手机号码：</div>
				<div class="c">
					{$_A.userinfo_result.phone}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">居住所在省市：</div>
				<div class="h">
					{$_A.userinfo_result.area|area}
				</div>
				<div class="w">居住地邮编：</div>
				<div class="c">
					{$_A.userinfo_result.post}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">现居住地址：</div>
				<div class="h">
					{$_A.userinfo_result.address}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">第二联系人姓名：</div>
				<div class="h">
					{$_A.userinfo_result.linkman1}
				</div>
				<div class="w">第二联系人关系：</div>
				<div class="h">
					{$_A.userinfo_result.relation1|linkage}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">第二联系人联系电话：</div>
				<div class="h">
					{$_A.userinfo_result.tel1}
				</div>
				<div class="w">第二联系人联系手机：</div>
				<div class="h">
					{$_A.userinfo_result.phone1}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">第三联系人姓名：</div>
				<div class="h">
					{$_A.userinfo_result.linkman2}
				</div>
				<div class="w">第三联系人关系：</div>
				<div class="h">
					{$_A.userinfo_result.relation2|linkage}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">第三联系人联系电话：</div>
				<div class="h">
					{$_A.userinfo_result.tel2}
				</div>
				<div class="w">第三联系人联系手机：</div>
				<div class="h">
					{$_A.userinfo_result.phone2}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">第四联系人姓名：</div>
				<div class="h">
					{$_A.userinfo_result.linkman3}
				</div>
				<div class="w">第四联系人关系：</div>
				<div class="c">
					{$_A.userinfo_result.relation3|linkage}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">第四联系人联系电话：</div>
				<div class="h">
					{$_A.userinfo_result.tel3}
				</div>
				<div class="w">第四联系人联系手机：</div>
				<div class="c">
					{$_A.userinfo_result.phone3}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">MSN：</div>
				<div class="h">
					{$_A.userinfo_result.msn}
				</div>
				<div class="w">QQ：</div>
				<div class="c">
					{$_A.userinfo_result.qq}
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">旺旺：</div>
				<div class="c">
					{$_A.userinfo_result.wangwang}
				</div>
			</div>
			<div class="module_title"><strong>配偶资料</strong></div>
			<div class="module_border">
				<div class="l">配偶姓名：</div>
				<div class="h">
					{$_A.userinfo_result.mate_name}
				</div>
				<div class="l">每月薪金：</div>
				<div class="c">
					{$_A.userinfo_result.mate_salary}
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">移动电话：</div>
				<div class="h">
					{$_A.userinfo_result.mate_phone}
				</div>
				<div class="l">单位电话：</div>
				<div class="c">
					{$_A.userinfo_result.mate_tel}
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">工作单位：</div>
				<div class="h">
					{$_A.userinfo_result.mate_type|linkage}
				</div>
				<div class="l">职位：</div>
				<div class="c">
					{$_A.userinfo_result.mate_office|linkage}
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">单位地址：</div>
				<div class="h">
					{$_A.userinfo_result.mate_address}
				</div>
				<div class="l">月收入：</div>
				<div class="c">
					{$_A.userinfo_result.mate_income}
				</div>
			</div>
			<div class="module_title"><strong>其他信息</strong></div>
			<div class="module_border">
				<div class="l">个人能力：</div>
				<div class="c">
					{$_A.userinfo_result.ability|nl2br}
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">个人爱好：</div>
				<div class="c">
					{$_A.userinfo_result.interest|nl2br}
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">其他说明：</div>
				<div class="c">
					{$_A.userinfo_result.others|nl2br}
				</div>
			</div>
			
</div>
{elseif $_A.query_type == "jifen"}
<form method="post">
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">ID</td>
		<td width="*" class="main_td">用户名</td>
		<td width="*" class="main_td">真实姓名</td>
		<th width="" class="main_td">认证名称</th>
		<th width="" class="main_td">认证积分</th>
		<th width="" class="main_td">备注</th>
		<th width="" class="main_td">审核时间</th>
	</tr>
	{ foreach  from=$_A.jifen_result key=key item=item}
	<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center">{ $item.user_id}<input type="hidden" value="{$item.id}" name="id[]" /></td>
		<td class="main_td1" align="center">{$item.username}</td>
		<td class="main_td1" align="center">{$item.realname}</td>
		<td class="main_td1" align="center">{$item.typename}</td>
		<td class="main_td1" align="center"><input type="text" value="{$item.value}" size="5" name="val[]" /></td>
		<td class="main_td1" align="center">{$item.remark}</td>
		<td class="main_td1" align="center">{$item.addtime|date_format}<input type="hidden" name="user_id" value="{$magic.request.user_id}" /></td>
	</tr>
	{ /foreach}
	<tr >
		<td colspan="7"><input type="submit" value="修改积分" /></td>
	</tr>
</table>
</form>
{/if}