{if $_A.query_type == "new" || $_A.query_type == "edit"}
<div class="module_add">
	{if $magic.request.id==""}
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>请输入此信息的用户名或ID</strong></div>
	

	<div class="module_border">
		<div class="l">用户ID：</div>
		<div class="c">
			<input type="text" name="user_id"  class="input_border"  size="20" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">用户名：</div>
		<div class="c">
			<input type="text" name="username"  class="input_border"  size="20" />
		</div>
	</div>
	
	<div class="module_submit" >
		<input type="submit"  name="submit" value="确认提交" />
		<input type="reset"  name="reset" value="重置表单" />
	</div>
	</form>
	{else}
	<div class="module_title"><span id="user_info_menu"> <a href="javascript:void(0)" class="current"  tab="1"  >基本资料</a>  <a href="javascript:void(0)"  tab="2">个人详细资料</a>  <a href="javascript:void(0)" tab="3">房产资料</a>  <a href="javascript:void(0)" tab="4">单位资料</a>  <a href="javascript:void(0)" tab="5">私营业主资料</a>   <a href="javascript:void(0)" tab="6">财务状况</a>   <a href="javascript:void(0)" tab="7">联系方式</a>    <a href="javascript:void(0)" tab="8">配偶资料</a>    <a href="javascript:void(0)" tab="9">教育背景</a>     <a href="javascript:void(0)" tab="11">其他信息</a> </span><strong>添加用户信息</strong></div>
	
	<form name="form1" method="post" action=""  enctype="multipart/form-data" >
	<div id="user_info_menu_tab">
		<!--基本资料 开始-->
		<div id="user_info_menu_1">
			<div class="module_border">
				<div class="l">用户：</div>
				<div class="c">
					{$_A.userinfo_result.username} (ID:{$_A.userinfo_result.user_id})
				</div>
			</div>
			<div class="module_border">
				<div class="l">真实姓名：</div>
				<div class="c">
					{$_A.userinfo_result.realname} 
				</div>
			</div>
			<div class="module_border">
				<div class="l">邮箱：</div>
				<div class="c">
					{$_A.userinfo_result.email} 
				</div>
			</div>
			
			<div class="module_border">
				
				<div class="c">
					您可以一起填完了再提交
				</div>
			</div>
			
		</div>
		<!--基本资料 结束-->
		
		<!--个人资料 开始-->
		<div id="user_info_menu_2" class="hide">
			
			<div class="module_border">
				<div class="w">婚姻状况：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=marry&nid=user_marry&value={$_A.userinfo_result.marry}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">子 女：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=child&nid=user_child&value={$_A.userinfo_result.child}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">学 历：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=education&nid=user_education&value={$_A.userinfo_result.education}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">月收入：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=income&nid=user_income&value={$_A.userinfo_result.income}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">社 保：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=shebao&nid=user_shebao&value={$_A.userinfo_result.shebao}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">社保电脑号：</div>
				<div class="c">
					<input type="text" size="30" name="shebaoid" value="{$_A.userinfo_result.shebaoid}" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">住房条件：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=housing&nid=user_housing&value={$_A.userinfo_result.housing}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">是否购车：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=car&nid=user_car&value={$_A.userinfo_result.car}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">逾期记录：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=late&nid=user_late&value={$_A.userinfo_result.late}"></script>
				</div>
			</div>
		</div>
		<!--个人资料 开始-->
		
		<!--房产资料 开始-->
		<div id="user_info_menu_3" class="hide">
			
			<div class="module_border">
				<div class="w">房产地址：</div>
				<div class="c">
					<input type="text" size="30" name="house_address" value="{$_A.userinfo_result.house_address}" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">建筑面积：</div>
				<div class="c">
					<input type="text" size="15" name="house_area" value="{$_A.userinfo_result.house_area}"/> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">建筑年份：</div>
				<div class="c">
					<input type="text" size="15" name="house_year" value="{$_A.userinfo_result.house_year}" onclick="change_picktime()" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">供款状况：</div>
				<div class="c">
					<input type="text" size="15" name="house_status" value="{$_A.userinfo_result.house_status}" /> 元
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">所有权人1：</div>
				<div class="c">
					<input type="text" size="15" name="house_holder1" value="{$_A.userinfo_result.house_holder1}" /> 产权份额<input type="text" size="15" name="house_right1" value="{$_A.userinfo_result.house_right1}" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">所有权人2：</div>
				<div class="c">
					<input type="text" size="15" name="house_holder2" value="{$_A.userinfo_result.house_holder2}" /> 产权份额<input type="text" size="15" name="house_right2" value="{$_A.userinfo_result.house_right2}" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">若房产尚在按揭中, 请填写：</div>
				<div class="c">
					贷款年限：<input type="text" size="10" name="house_loanyear" value="{$_A.userinfo_result.house_loanyear}" />每月供款<input type="text" size="10" name="house_loanprice" value="{$_A.userinfo_result.house_loanprice}" /> 元
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">尚欠贷款余额：</div>
				<div class="c">
					<input type="text" size="15" name="house_balance" value="{$_A.userinfo_result.house_balance}" /> 元
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">按揭银行：</div>
				<div class="c">
					<input type="text" size="15" name="house_bank" value="{$_A.userinfo_result.house_bank}" /> 
				</div>
			</div>
		</div>
		<!--房产资料 结束-->
		
		<!--单位资料 开始-->
		<div id="user_info_menu_4" class="hide">
			
			<div class="module_border">
				<div class="w">公司名称：</div>
				<div class="c">
					<input type="text" size="15" name="company_name" value="{$_A.userinfo_result.company_name}" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">公司性质：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=company_type&nid=user_company_type&value={$_A.userinfo_result.company_type}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">公司行业：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=company_industry&nid=user_company_industry&value={$_A.userinfo_result.company_industry}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">工作级别：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=company_jibie&nid=user_company_jibie&value={$_A.userinfo_result.company_jibie}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">职 位：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=company_office&nid=user_company_office&value={$_A.userinfo_result.company_office}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">服务时间：</div>
				<div class="c">
					<input type="text" size="15" name="company_worktime1" value="{$_A.userinfo_result.company_worktime1}" onclick="change_picktime()" />  到 <input type="text" size="15" name="company_worktime2" value="{$_A.userinfo_result.company_worktime2}" onclick="change_picktime()" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">工作年限：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=company_workyear&nid=user_company_workyear&value={$_A.userinfo_result.company_workyear}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">工作电话：</div>
				<div class="c">
					<input type="text" size="15" name="company_tel" value="{$_A.userinfo_result.company_tel}" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">公司地址：</div>
				<div class="c">
					<input type="text" size="15" name="company_address" value="{$_A.userinfo_result.company_address}" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">公司网站：</div>
				<div class="c">
					<input type="text" size="15" name="company_weburl" value="{$_A.userinfo_result.company_weburl}" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">备注说明：</div>
				<div class="c">
					<textarea  cols="50" rows="6"name="company_reamrk"  >{$_A.userinfo_result.company_reamrk}</textarea>
				</div>
			</div>
		</div>
		<!--单位资料 结束-->
		
		
		<!--私营业主资料 开始-->
		<div id="user_info_menu_5" class="hide">
			
			<div class="module_border">
				<div class="w">私营企业类型：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=private_type&nid=user_company_industry&value={$_A.userinfo_result.private_type}"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">成立日期：</div>
				<div class="c">
					<input type="text" size="15" name="private_date" value="{$_A.userinfo_result.private_date}" onclick="change_picktime()"/> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">经营场所：</div>
				<div class="c">
					<input type="text" size="15" name="private_place" value="{$_A.userinfo_result.private_place}" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">租金：</div>
				<div class="c">
					<input type="text" size="15" name="private_rent" value="{$_A.userinfo_result.private_rent}" /> 元
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">租期：</div>
				<div class="c">
					<input type="text" size="15" name="private_term" value="{$_A.userinfo_result.private_term}" /> 月
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">税务编号：</div>
				<div class="c">
					<input type="text" size="15" name="private_taxid" value="{$_A.userinfo_result.private_commerceid}" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">工商登记号：</div>
				<div class="c">
					<input type="text" size="15" name="private_commerceid" value="{$_A.userinfo_result.private_commerceid}" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">全年盈利/亏损额：</div>
				<div class="c">
					<input type="text" size="15" name="private_income" value="{$_A.userinfo_result.private_income}" /> 元（年度）
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">雇员人数：</div>
				<div class="c">
					<input type="text" size="15" name="private_employee" value="{$_A.userinfo_result.private_employee}" /> 人
				</div>
			</div>
		</div>
		<!--私营业主资料 结束-->
		
		<!--财务状况 开始-->
		<div id="user_info_menu_6" class="hide">
			
			<div class="module_border">
				<div class="w">每月无抵押贷款还款额：</div>
				<div class="c">
					<input type="text" size="15" name="finance_repayment" value="{$_A.userinfo_result.finance_repayment}" /> 元
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">自有房产：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=finance_property&nid=user_finance_property&value={$_A.userinfo_result.finance_property}"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">每月房屋按揭金额：</div>
				<div class="c">
					<input type="text" size="15" name="finance_amount" value="{$_A.userinfo_result.finance_amount}" /> 元
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">自有汽车：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=finance_car&nid=user_finance_car&value={$_A.userinfo_result.finance_car}"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">每月汽车按揭金额：</div>
				<div class="c">
					<input type="text" size="15" name="finance_caramount" value="{$_A.userinfo_result.finance_caramount}" /> 元
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">每月信用卡还款金额：</div>
				<div class="c">
					<input type="text" size="15" name="finance_creditcard" value="{$_A.userinfo_result.finance_creditcard}" /> 元
				</div>
			</div>
		</div>
		<!--财务状况 结束-->
		
		<!--配偶资料 开始-->
		<div id="user_info_menu_7" class="hide">
			
			<div class="module_border">
				<div class="w">居住地电话：</div>
				<div class="c">
					<input type="text" size="20" name="tel" value="{$_A.userinfo_result.tel}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">手机号码：</div>
				<div class="c">
					<input type="text" size="20" name="phone" value="{$_A.userinfo_result.phone}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">居住所在省市：</div>
				<div class="c">
					<script src="/plugins/index.php?q=area&area={$_A.userinfo_result.area}"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">居住地邮编：</div>
				<div class="c">
					<input type="text" size="20" name="post" value="{$_A.userinfo_result.post}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">现居住地址：</div>
				<div class="c">
					<input type="text" size="20" name="address" value="{$_A.userinfo_result.address}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">第二联系人姓名：</div>
				<div class="c">
					<input type="text" size="20" name="linkman1" value="{$_A.userinfo_result.linkman1}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">第二联系人关系：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=relation1&nid=user_relation&value={$_A.userinfo_result.relation1}"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">第二联系人联系电话：</div>
				<div class="c">
					<input type="text" size="20" name="tel1" value="{$_A.userinfo_result.tel1}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">第二联系人联系手机：</div>
				<div class="c">
					<input type="text" size="20" name="phone1" value="{$_A.userinfo_result.phone1}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">第三联系人姓名：</div>
				<div class="c">
					<input type="text" size="20" name="linkman2" value="{$_A.userinfo_result.linkman2}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">第三联系人关系：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=relation2&nid=user_relation&value={$_A.userinfo_result.relation2}"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">第三联系人联系电话：</div>
				<div class="c">
					<input type="text" size="20" name="tel2" value="{$_A.userinfo_result.tel2}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">第三联系人联系手机：</div>
				<div class="c">
					<input type="text" size="20" name="phone2" value="{$_A.userinfo_result.phone2}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">第四联系人姓名：</div>
				<div class="c">
					<input type="text" size="20" name="linkman3" value="{$_A.userinfo_result.linkman3}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">第四联系人关系：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=relation3&nid=user_relation&value={$_A.userinfo_result.relation3}"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">第四联系人联系电话：</div>
				<div class="c">
					<input type="text" size="20" name="tel3" value="{$_A.userinfo_result.tel3}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">第四联系人联系手机：</div>
				<div class="c">
					<input type="text" size="20" name="phone3" value="{$_A.userinfo_result.phone3}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">MSN：</div>
				<div class="c">
					<input type="text" size="20" name="msn" value="{$_A.userinfo_result.msn}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">QQ：</div>
				<div class="c">
					<input type="text" size="20" name="qq" value="{$_A.userinfo_result.qq}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">旺旺：</div>
				<div class="c">
					<input type="text" size="20" name="wangwang" value="{$_A.userinfo_result.wangwang}" />
				</div>
			</div>
		</div>
		<!--配偶资料 结束-->
		
		<!--配偶资料 开始-->
		<div id="user_info_menu_8"  class="hide">
			
			<div class="module_border">
				<div class="l">配偶姓名：</div>
				<div class="c">
					<input type="text" size="20" name="mate_name" value="{$_A.userinfo_result.mate_name}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">每月薪金：</div>
				<div class="c">
					<input type="text" size="20" name="mate_salary" value="{$_A.userinfo_result.mate_salary}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">移动电话：</div>
				<div class="c">
					<input type="text" size="20" name="mate_phone" value="{$_A.userinfo_result.mate_phone}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">单位电话：</div>
				<div class="c">
					<input type="text" size="20" name="mate_tel" value="{$_A.userinfo_result.mate_tel}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">工作单位：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=mate_type&nid=user_company_industry&value={$_A.userinfo_result.mate_type}"></script> 
				</div>
			</div>
			
			
			<div class="module_border">
				<div class="l">职位：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=mate_office&nid=user_company_office&value={$_A.userinfo_result.mate_office}"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">单位地址：</div>
				<div class="c">
					<input type="text" size="20" name="mate_address" value="{$_A.userinfo_result.mate_address}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">月收入：</div>
				<div class="c">
					<input type="text" size="20" name="mate_income" value="{$_A.userinfo_result.mate_income}" />
				</div>
			</div>
			
		</div>
		<!--配偶资料 结束-->
		
		<!--教育背景 开始-->
		<div id="user_info_menu_9"  class="hide">
			
			<div class="module_border">
				<div class="l">最高学历：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=education_record&nid=user_education&value={$_A.userinfo_result.education_record}"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">最高学历学校：</div>
				<div class="c">
					<input type="text" size="20" name="education_school" value="{$_A.userinfo_result.education_school}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">专业：</div>
				<div class="c">
					<input type="text" size="20" name="education_study" value="{$_A.userinfo_result.education_study}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">时间：</div>
				<div class="c">
					<input type="text" size="20" name="education_time1" value="{$_A.userinfo_result.education_time1}" onclick="change_picktime()" /> 到 <input type="text" size="20" name="education_time2" value="{$_A.userinfo_result.education_time2}" onclick="change_picktime()" /> 
				</div>
			</div>
		</div>
		<!--教育背景 结束-->
		
		<!--工作经历 开始-->
		<div id="user_info_menu_10" class="hide">
			
			<div class="module_border">
				<div class="l">个人能力：</div>
				<div class="c">
					<textarea rows="7" cols="50" name="ability">{$_A.userinfo_result.ability}</textarea><br />（如电脑能力、组织协调能力或其他） 
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">个人爱好：</div>
				<div class="c">
					<textarea rows="7" cols="50" name="interest">{$_A.userinfo_result.interest}</textarea><br />（突出自己的个性，工作态度或他人对自己的评价等）
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">其他说明：</div>
				<div class="c">
					<textarea rows="7" cols="50" name="others">{$_A.userinfo_result.others}</textarea><br />
					
				</div>
			</div>
		</div>
		<!--工作经历 结束-->
		
		<!--其他信息 开始-->
		<div id="user_info_menu_11" class="hide">
			
			<div class="module_border">
				<div class="l">个人能力：</div>
				<div class="c">
					<textarea rows="7" cols="50" name="ability">{$_A.userinfo_result.ability}</textarea><br />（如电脑能力、组织协调能力或其他） 
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">个人爱好：</div>
				<div class="c">
					<textarea rows="7" cols="50" name="interest">{$_A.userinfo_result.interest}</textarea><br />（突出自己的个性，工作态度或他人对自己的评价等）
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">其他说明：</div>
				<div class="c">
					<textarea rows="7" cols="50" name="others">{$_A.userinfo_result.others}</textarea><br />
				</div>
			</div>
		</div>
		<!--其他信息 结束-->
	</div>
	<div class="module_submit" >
		<input type="hidden"  name="user_id" value="{$magic.request.id}" />
		<input type="submit"  name="submit" value="确认提交" />
		<input type="reset"  name="reset" value="重置表单" />
	</div>
	</form>
	
	
	{/if}
</div>
{literal}
<script>
change_menu_tab("user_info_menu");

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
			{ $_A.attestation_result.username}
		</div>
	</div>


	<div class="module_border">
		<div class="l">所属栏目：</div>
		<div class="c">
			{ $_A.attestation_result.type_name }
		</div>
	</div>


	<div class="module_border">
		<div class="l">证件图片：</div>
		<div class="c">
			<a href="{ $_A.attestation_result.litpic|imgurl_format }" ><img src="{ $_A.attestation_result.litpic|imgurl_format }" width="100" height="100" /></a>
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
	
	
	<div class="module_title"><strong>审核此证件</strong></div>
	
	<div class="module_border">
		<div class="l">状态:</div>
		<div class="c">
		<input type="radio" name="status" value="0" {if $_A.attestation_result.status==0} checked="checked"{/if} />等待审核  <input type="radio" name="status" value="1" {if $_A.attestation_result.status==1} checked="checked"{/if}/>审核通过 <input type="radio" name="status" value="2" {if $_A.attestation_result.status==2} checked="checked"{/if}/>审核不通过 </div>
	</div>
	
	<div class="module_border" >
		<div class="l">通过所应的积分:</div>
		<div class="c">
			<input type="text" name="jifen" value="{ $_A.attestation_result.jifen}" size="5">
		</div>
	</div>
	
	<div class="module_border" >
		<div class="l">审核备注:</div>
		<div class="c">
			<textarea name="verify_remark" cols="45" rows="5">{ $_A.attestation_result.verify_remark}</textarea>
		</div>
	</div>

	<div class="module_submit" >
		<input type="hidden" name="id" value="{ $_A.attestation_result.id }" />
		
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
			<td width="*" class="main_td">用户名称</td>
			<td width="" class="main_td">房产资料</td>
			<td width="" class="main_td">单位资料</td>
			<td width="" class="main_td">私营业主资料</td>
			<td width="" class="main_td">财务状况</td>
			<td width="" class="main_td">联系方式</td>
			<td width="" class="main_td">配偶资料</td>
			<td width="" class="main_td">教育背景</td>
			<td width="" class="main_td">其他信息</td>
			<td width="" class="main_td">操作</td>
		</tr>
		{ foreach  from=$_A.userinfo_list key=key item=item}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td class="main_td1" align="center">{$item.username}</td>
			<td class="main_td1" align="center" >{if $item.building_status==1}信息完整{else}信息不完整{/if}</td>
			<td class="main_td1" align="center" >{if $item.company_status==1}信息完整{else}信息不完整{/if}</td>
			<td class="main_td1" align="center" >{if $item.firm_status==1}信息完整{else}信息不完整{/if}</td>
			<td class="main_td1" align="center" >{if $item.finance_status==1}信息完整{else}信息不完整{/if}</td>
			<td class="main_td1" align="center" >{if $item.contact_status==1}信息完整{else}信息不完整{/if}</td>
			<td class="main_td1" align="center" >{if $item.mate_status==1}信息完整{else}信息不完整{/if}</td>
			<td class="main_td1" align="center" >{if $item.edu_status==1}信息完整{else}信息不完整{/if}</td>
			<td class="main_td1" align="center" >{if $item.job_status==1}信息完整{else}信息不完整{/if}</td>
			
			<td class="main_td1" align="center" ><a href="{$_A.query_url}/new&id={$item.user_id}{$_A.site_url}">修改</a> </td>
		</tr>
		{ /foreach}
		<tr>
		<td colspan="15" class="action">
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


{/if}