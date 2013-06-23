<?php
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问

include_once("userinfo.class.php");

$_U['userinfo_result'] = userinfoClass::GetOne(array("user_id"=>$_G['user_id']));

if (isset($_POST['type']) && $_POST['type'] ==1){

	//房产资料
	if ($_U['query_type'] == "list"){
		$var = array("marry","child","education","income","shebao","shebaoid","housing","car","late");
		$_msg = "个人资料修改成功";
		$_url = "building";
	}
	//房产资料
	elseif ($_U['query_type'] == "building"){
		$var = array("house_address","house_area","house_year","house_status","house_holder1","house_holder2","house_right1","house_right2","house_loanyear","house_loanprice","house_balance","house_bank");
		$_msg = "房产资料修改成功";
		$_url = "company";
	}
	//单位资料
	elseif ($_U['query_type'] == "company"){
		$var = array("company_name","company_type","company_industry","company_office","company_jibie","company_worktime1","company_worktime2","company_workyear","company_tel","company_address","company_weburl","company_reamrk");
		$_msg = "单位资料修改成功";	
		$_url = "firm";
	}
	
	//私营业主
	elseif ($_U['query_type'] == "firm"){
		$var = array("private_type","private_date","private_place","private_rent","private_term","private_taxid","private_commerceid","private_income","private_employee");
		$_msg = "单位资料修改成功";
		$_url = "finance";
	}

	//财务状况
	elseif ($_U['query_type'] == "finance"){
		$var = array("finance_repayment","finance_property","finance_amount","finance_car","finance_caramount","finance_creditcard");
		$_msg = "财务资料修改成功";
		$_url = "contact";
	}

	//联系方式
	elseif ($_U['query_type'] == "contact"){
		$var = array("tel","phone","post","address","province","city","area","linkman1","relation1","tel1","phone1","linkman2","relation2","tel2","phone2","linkman3","relation3","tel3","phone3","msn","qq","wangwang");
		$_msg = "联系方式修改成功";
		$_url = "mate";
	}

	//配偶资料
	elseif ($_U['query_type'] == "mate"){
		$var = array("mate_name","mate_salary","mate_phone","mate_tel","mate_type","mate_office","mate_address","mate_income");
		$_msg = "配偶资料修改成功";
		$_url = "edu";
	}

	//教育背景
	elseif ($_U['query_type'] == "edu"){
		$var = array("education_record","education_school","education_study","education_time1","education_time2");
		$_msg = "教育背景修改成功";
		$_url = "job";
	}

	elseif ($_U['query_type'] == "job"){
		$var = array("ability","interest","others","experience");	
		$_msg = "其他资料修改成功";
		$_url = "list";
	}
	
	$data = post_var($var);
	$data['user_id'] = $_G['user_id'];
	
	$result = userinfoClass::GetOne(array("user_id"=>$_G['user_id']));

	if ($result == false){
		$result = userinfoClass::Add($data);
	}else{
		$result = userinfoClass::Update($data);
	}
	
	if (isset($data['qq']) ){
		$datauser['user_id'] = $_G['user_id'];
		$datauser['qq'] = $data['qq'];
		userClass::UpdateUser($datauser);
	}
	
	
	if ($result !== true){
		$msg = array($result);
	}else{
		$msg = array($_msg,"",$_U['query_url']."/".$_url);
	}

}

$template = "user_userinfo.html";
?>
