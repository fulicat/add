
<div class="module_add">
<form name="form1" method="post" action=""  enctype="multipart/form-data">
	<div class="module_title"><strong>费用管理</strong></div>
	
	<div class="module_border">
		<div class="w">借入者充值的费用：</div>
		<div class="c">
		充值的费率为 <input type="text" value="1" name="" size="10" />%  大于 <input type="text" value="5000" name=""  size="10" />元费用为<input type="text" value="50" name="50"  size="10" /> 元
		
			</div>
	</div>
	
	<div class="module_border">
		<div class="w">借款管理费用：</div>
		<div class="c">
		借款两个月管理费为本金<input type="text" value="1" name="" size="5" />% 每增加一个月加收管理费<input type="text" value="1" name="" size="5" /> %。
		管理费用不计息，不退还，在借款金额中直接扣除。
			</div>
	</div>
	
	<div class="module_border">
		<div class="w">VIP会员管理：</div>
		<div class="c">
		资料积分达到 <input type="text" value="1" name="" size="5" />分可以申请vip，vip的费用为：<input type="text" value="5000" name=""  size="10" />元/年 。保证金按本金<input type="text" value="1" name="" size="5" />%冻结在个人帐户。用户正常全额还款后，解冻保证金。在借款成功以后再扣除，借款不成功不收费
		
			</div>
	</div>
	
	
	<div class="module_border">
		<div class="w">银牌会员管理：</div>
		<div class="c">
		资料积分达到 <input type="text" value="500" name="" size="5" />分其中借款用户全额还清积分必须达到<input type="text" value="300" name="" size="5" />分）且没有迟还款和逾期还款的用户，系统自动为其升级成为银牌会员
		
			</div>
	</div>
	
	
	<div class="module_submit" >
		{ if $_A.query_type == "edit" }<input type="hidden" name="id" value="{ $_A.luqu_result.id }" />{/if}
		<input type="submit"  name="submit" value="确认提交" />
		<input type="reset"  name="reset" value="重置表单" />
	</div>
</div>
</form>
{literal}
<script>
function check_form(){
/*
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
	  */
}

</script>
{/literal}
