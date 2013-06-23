{if $_A.query_type == "new" || $_A.query_type == "edit"}


{elseif $_A.query_type=="list"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">用户名</td>
			<td width="" class="main_td">真实姓名</td>
			<td width="" class="main_td">总余额</td>
			<td width="" class="main_td">可用余额</td>
			<td width="" class="main_td">冻结金额</td>
			<td width="" class="main_td">待收金额</td>
		</tr>
		{ foreach  from=$_A.account_list key=key item=item}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td >{ $item.user_id}</td>
			<td><a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?index.php?admin&q=module/user/view&user_id={$item.user_id}&type=scene",500,230,"true","","true","text");'>{$item.username}</a></td>
			<td >{$item.realname}</td>
			<td >{$item.total|default:0}元</td>
			<td >{$item.use_money|default:0}元</td>
			<td >{$item.no_use_money|default:0}元</td>
			<td >{$item.collection|default:0}元</td>
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

<!--提现记录列表 开始-->
{elseif $_A.query_type=="cash"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">用户名称</td>
			<td width="*" class="main_td">真实姓名</td>
			<td width="" class="main_td">提现账号</td>
			<td width="" class="main_td">提现银行</td>
			<td width="" class="main_td">支行</td>
			<td width="" class="main_td">提现总额</td>
			<td width="" class="main_td">到账金额</td>
			<td width="" class="main_td">手续费</td>
			<td width="" class="main_td">提现时间</td>
			<td width="" class="main_td">状态</td>
			<td width="" class="main_td">操作</td>
		</tr>
		{ foreach  from=$_A.account_cash_list key=key item=item}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td >{ $item.id}</td>
			<td><a href="{$_A.query_url}/cash&username={$item.username}">{$item.username}</a></td>
			<td >{ $item.realname}</td>
			<td >{ $item.account}</td>
			<td >{ $item.bank_name}</td>
			<td >{ $item.branch}</td>
			<td >{ $item.total}</td>
			<td >{ $item.credited}</td>
			<td >{ $item.fee}</td>	
			<td >{ $item.addtime|date_format:"Y-m-d H:i"}</td>
			<td >{if $item.status==0}审核中{elseif  $item.status==1} 已通过 {elseif $item.status==2}被拒绝{/if}</td>
			<td ><a href="{$_A.query_url}/cash_view{$_A.site_url}&id={$item.id}">审核/查看</a></td>
		</tr>
		{ /foreach}
		<tr>
		<td colspan="11" class="action">
		<div class="floatl">
		<input type="button" onclick="javascript:location.href='{$_A.query_url}/cash&status={$magic.request.status}&type=excel'" value="导出列表" />
		</div>
		<div class="floatr">
			用户名：<input type="text" name="username" id="username" value="{$magic.request.username}"/> 状态<select id="status" ><option value="">全部</option><option value="1" {if $magic.request.status==1} selected="selected"{/if}>已通过</option><option value="0" {if $magic.request.status=="0"} selected="selected"{/if}>未通过</option></select> <input type="button" value="搜索" / onclick="sousuo()">
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
<!--提现记录列表 结束-->


<!--提现审核 开始-->
{elseif $_A.query_type == "cash_view"}
<div class="module_add">
	
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>提现审核/查看</strong></div>

	<div class="module_border">
		<div class="l">用户名：</div>
		<div class="c">
			{ $_A.account_cash_result.username}
		</div>
	</div>

	<div class="module_border">
		<div class="l">提现银行：</div>
		<div class="c">
			{ $_A.account_cash_result.bank_name }
		</div>
	</div>

	<div class="module_border">
		<div class="l">提现支行：</div>
		<div class="c">
			{ $_A.account_cash_result.branch }
		</div>
	</div>

	<div class="module_border">
		<div class="l">提现账号：</div>
		<div class="c">
			{ $_A.account_cash_result.account }
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">提现总额：</div>
		<div class="c">
			{ $_A.account_cash_result.total }
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">到账金额：</div>
		<div class="c">
			{ $_A.account_cash_result.credited }
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">费率：</div>
		<div class="c">
			{ $_A.account_cash_result.fee }
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">状态：</div>
		<div class="c">
		{if $item.status==0}提现审核中{elseif  $item.status==1} 提现已通过 {elseif $item.status==2}提现被拒绝{/if}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">添加时间/IP:</div>
		<div class="c">
			{ $_A.account_cash_result.addtime|date_format:'Y-m-d H:i:s'}/{ $_A.account_cash_result.addip}</div>
	</div>
	
	{if $_A.account_cash_result.status==0}
	<div class="module_title"><strong>审核此提现信息</strong></div>
	
	<div class="module_border">
		<div class="l">状态:</div>
		<div class="c">
		<input type="radio" name="status" value="0" {if $_A.account_cash_result.status==0} checked="checked"{/if} />等待审核  <input type="radio" name="status" value="1" {if $_A.account_cash_result.status==1} checked="checked"{/if}/>审核通过 <input type="radio" name="status" value="2" {if $_A.account_cash_result.status==2} checked="checked"{/if}/>审核不通过 </div>
	</div>
	
	<div class="module_border" >
		<div class="l">到账金额:</div>
		<div class="c">
			<input type="text" name="credited" value="{ $_A.account_cash_result.credited}" size="10">（一旦审核通过将不可再进行修改）
		</div>
	</div>
	
	<div class="module_border" >
		<div class="l">费率:</div>
		<div class="c">
			<input type="text" name="fee" value="{ $_A.account_cash_result.fee}" size="5">
		</div>
	</div>
	
	<div class="module_border" >
		<div class="l">审核备注:</div>
		<div class="c">
			<textarea name="verify_remark" cols="45" rows="5">{ $_A.account_result.verify_remark}</textarea>
		</div>
	</div>

	<div class="module_submit" >
		<input type="hidden" name="id" value="{ $_A.account_cash_result.id }" />
		<input type="hidden" name="user_id" value="{ $_A.account_cash_result.user_id }" />
		<input type="submit"  name="reset" value="审核此提现信息" />
	</div>
	{else}
	<div class="module_border">
		<div class="l">审核信息：</div>
		<div class="c">
			审核人：{ $_A.account_cash_result.verify_username },审核时间：{ $_A.account_cash_result.verify_time|date_format:"Y-m-d H:i" },审核备注：{ $_A.account_cash_result.verify_remark}
		</div>
	</div>
	{/if}
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


<!--充值记录列表 开始-->
{elseif $_A.query_type=="recharge"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">用户名称</td>
			<td width="" class="main_td">类型</td>
			<td width="" class="main_td">所属银行</td>
			<td width="" class="main_td">充值金额</td>
			<td width="" class="main_td">费用</td>
			<td width="" class="main_td">到账金额</td>
			<td width="" class="main_td">充值时间</td>
			<td width="" class="main_td">状态</td>
			<td width="" class="main_td">操作</td>
		</tr>
		{ foreach  from=$_A.account_recharge_list key=key item=item}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td >{ $item.id}</td>
			<td><a href="{$_A.query_url}/recharge&username={$item.username}">{$item.username}</a></td>
			<td >{ if $item.type==1}网上充值{else}线下充值{/if}</td>
			<td >{if $item.payment==0}手动充值{else}{ $item.payment_name}{/if}</td>
			<td >{ $item.money}元</td>
			<td >{ $item.fee}元</td>
			<td ><font color="#FF0000">{$item.total}元</font></td>
			<td >{ $item.addtime|date_format:"Y-m-d H:i"}</td>
			<td >{if $item.status==0}<font color="#6699CC">审核</font>{elseif  $item.status==1} 成功 {else}<font color="#FF0000">失败</font>{/if}</td>
			<td ><a href="{$_A.query_url}/recharge_view{$_A.site_url}&id={$item.id}">审核/查看</a></td>
		</tr>
		{ /foreach}
		<tr>
		<td colspan="11" class="action">
		<div class="floatl">
		 <A href="?{$_A.query_string}&type=excel">导出当前报表</A>
		</div>
		<div class="floatr">
			用户名：<input type="text" name="username" id="username" value="{$magic.request.username}"/> 状态<select id="status" ><option value="">全部</option><option value="1" {if $magic.request.status==1} selected="selected"{/if}>已通过</option><option value="0" {if $magic.request.status=="0"} selected="selected"{/if}>未通过</option></select> <input type="button" value="搜索" / onclick="sousuo()">
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
<!--充值记录列表 结束-->
<!--提现审核 开始-->
{elseif $_A.query_type == "recharge_view"}
<div class="module_add">
	
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>充值查看</strong></div>

	<div class="module_border">
		<div class="l">用户名：</div>
		<div class="c">
			<a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?index.php?admin&q=module/user/view&user_id={$_A.account_recharge_result.user_id}&type=scene",500,230,"true","","true","text");'>{ $_A.account_recharge_result.username}</a>
		</div>
	</div>

	<div class="module_border">
		<div class="l">充值类型：</div>
		<div class="c">
			{if $_A.account_recharge_result.type==1}网上充值{else}线下充值{/if}
		</div>
	</div>

	<div class="module_border">
		<div class="l">支付方式：</div>
		<div class="c">
			{ $_A.account_recharge_result.payment_name}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">充值总额：</div>
		<div class="c">
			{ $_A.account_recharge_result.money }元
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">费用：</div>
		<div class="c">
			{ $_A.account_recharge_result.fee }元
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">实际到账：</div>
		<div class="c">
			{ $_A.account_recharge_result.total }元
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">用户备注：</div>
		<div class="c">
		{ $_A.account_recharge_result.remark }
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">流水号：</div>
		<div class="c">
		{ $_A.account_recharge_result.remark }
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">状态：</div>
		<div class="c">
		{if $_A.account_recharge_result.status==0}等待审核{elseif  $_A.account_recharge_result.status==1} 充值成功 {elseif $_A.account_recharge_result.status==2}充值失败{/if}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">添加时间/IP:</div>
		<div class="c">
			{ $_A.account_recharge_result.addtime|date_format:'Y-m-d H:i:s'}/{ $_A.account_recharge_result.addip}</div>
	</div>
	
	{if $_A.account_recharge_result.status==0  }
	<div class="module_title"><strong>审核此充值信息</strong></div>
	
	<div class="module_border">
		<div class="l">状态:</div>
		<div class="c">
	<input type="radio" name="status" value="1"/>充值成功   <input type="radio" name="status" value="2"  checked="checked"/>充值失败 </div>
	</div>
	
	<div class="module_border" >
		<div class="l">到账金额:</div>
		<div class="c">
			<input type="text" name="total" value="{ $_A.account_recharge_result.total }" size="15" readonly="">（一旦审核通过将不可再进行修改）
		</div>
	</div>
	
	<div class="module_border" >
		<div class="l">审核备注:</div>
		<div class="c">
			<textarea name="verify_remark" cols="45" rows="5">{ $_A.account_recharge_result.verify_remark}</textarea>
		</div>
	</div>

	<div class="module_submit" >
		<input type="hidden" name="id" value="{ $_A.account_recharge_result.id }" />
		
		<input type="submit"  name="reset" value="审核此充值信息" />
	</div>
	{else}
		{if $_A.account_recharge_result.type==2 }
	<div class="module_border">
		<div class="l">审核信息：</div>
		<div class="c">
			审核人：{ $_A.account_result.verify_username },审核时间：{ $_A.account_result.verify_time|date_format:"Y-m-d H:i" },审核备注：{ $_A.account_result.verify_remark}
		</div>
	</div>
	{/if}
	{/if}
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



<!--添加充值记录 开始-->
{elseif $_A.query_type == "recharge_new"}

<div class="module_add">
	
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>添加充值</strong></div>

	<div class="module_border">
		<div class="l">用户名：</div>
		<div class="c">
			<input type="text" name="username" />
		</div>
	</div>
	<div class="module_border">
		<div class="l">类型：</div>
		<div class="c">
			线下充值<input type="hidden" name="type" />
		</div>
	</div>
	<div class="module_border">
		<div class="l">金额：</div>
		<div class="c">
			<input type="text" name="money" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">备注：</div>
		<div class="c">
			<input type="text" name="remark" />
		</div>
	</div>
	
	<div class="module_submit" >
		
		<input type="submit"  name="reset" value="确认充值" />
	</div>
</form>
</div>

<!--添加充值记录 结束-->




<!--添加充值记录 开始-->
{elseif $_A.query_type == "deduct"}

<div class="module_add">
	
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>费用扣除</strong></div>

	<div class="module_border">
		<div class="l">用户名：</div>
		<div class="c">
			<input type="text" name="username" />
		</div>
	</div>
	<div class="module_border">
		<div class="l">类型：</div>
		<div class="c">
			<select name="type">
				<option value="scene_account">现场认证费用</option>
				<option value="vouch_advanced">担保垫付扣费</option>
				<option value="borrow_kouhui">借款人罚金扣回</option>
				<option value="account_other">其他</option>
			</select>
		</div>
	</div>
	<div class="module_border">
		<div class="l">金额：</div>
		<div class="c">
			<input type="text" name="money" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">备注：</div>
		<div class="c">
			<input type="text" name="remark" />比如，现场费用扣除200元
		</div>
	</div>
	<div class="module_border">
		<div class="l">验证码：</div>
		<div class="c"><input  class="user_aciton_input"  name="valicode" type="text" size="8" maxlength="4" style=" padding-top:4px; height:16px; width:70px;"/>&nbsp;<img src="/plugins/index.php?q=imgcode" alt="点击刷新" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
		</div>
	</div>
	<div class="module_submit" >
		
		<input type="submit"  name="reset" value="确定扣除" />
	</div>
</form>
</div>

<!--添加充值记录 结束-->

<!--资金使用记录列表 开始-->
{elseif $_A.query_type=="log"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">用户名称</td>
			<td width="" class="main_td">类型</td>
			<td width="" class="main_td">总金额</td>
			<td width="" class="main_td">操作金额</td>
			<td width="" class="main_td">可用金额</td>
			<td width="" class="main_td">冻结金额</td>
			<td width="" class="main_td">待收金额</td>
			<td width="" class="main_td">交易对方</td>
			<td width="" class="main_td">记录时间</td>
			<td width="" class="main_td">操作</td>
		</tr>
		{ foreach  from=$_A.account_log_list key=key item=item}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td >{ $item.id}</td>
			<td><a href="{$_A.query_url}/recharge&username={$item.username}">{$item.username}</a></td>
			<td >{ $item.type|linkage:"account_type"}</td>
			<td >{ $item.total}</td>
			<td >{ $item.money}</td>
			<td >{ $item.use_money}</td>
			<td >{ $item.no_use_money|default:0}</td>
			<td >{ $item.collection|default:0}</td>
			<td >{ $item.to_username|default:admin}</td>
			<td >{ $item.addtime|date_format:"Y-m-d H:i"}</td>
			<td ><a href="{$_A.query_url}/cash_view{$_A.site_url}&id={$item.id}">审核/查看</a></td>
		</tr>
		{ /foreach}
		<tr>
		<td colspan="11" class="action">
		<div class="floatl">
		
		</div>
		<div class="floatr">
			时间：<input type="text" name="dotime1" id="dotime1" value="{$magic.request.dotime1|default:"$day7"|date_format:"Y-m-d"}" size="15" onclick="change_picktime()"/> 到 <input type="text"  name="dotime2" value="{$magic.request.dotime2|default:"$nowtime"|date_format:"Y-m-d"}" id="dotime2" size="15" onclick="change_picktime()"/>   
		{linkages nid="account_type" value="$magic.request.type" name="type" type="value" default="全部" } 用户名：<input type="text" name="username" id="username" value="{$magic.request.username}"/> 状态<select id="status" ><option value="">全部</option><option value="1" {if $magic.request.status==1} selected="selected"{/if}>已通过</option><option value="0" {if $magic.request.status=="0"} selected="selected"{/if}>未通过</option></select> <input type="button" value="搜索" / onclick="sousuo()">
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
<!--资金使用记录列表 结束-->


{/if}
<script>
var url = '{$_A.query_url}/{$_A.query_type}';
{literal}
function sousuo(){
	var sou = "";
	var username = $("#username").val();
	if (username!=""){
		sou += "&username="+username;
	}
	var status = $("#status").val();
	if (status!="" && status!=null){
		sou += "&status="+status;
	}
	var dotime1 = $("#dotime1").val();
	var keywords = $("#keywords").val();
	var username = $("#username").val();
	var dotime2 = $("#dotime2").val();
	var type = $("#type").val();
	if (username!=null){
		 sou += "&username="+username;
	}
	if (keywords!=null){
		 sou += "&keywords="+keywords;
	}
	if (dotime1!=null){
		 sou += "&dotime1="+dotime1;
	}
	if (dotime2!=null){
		 sou += "&dotime2="+dotime2;
	}
	if (type!=null){
		 sou += "&type="+type;
	}
	
	if (sou!=""){
	location.href=url+sou;
	}
}

</script>
{/literal}