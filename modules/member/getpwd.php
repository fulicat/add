<?
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问
if(isset($_POST['email'])){
	$getpwd_msg = "";
	$var = array("email","username","valicode");
	$data = post_var($var);
	if ($data['email']==""){
		$getpwd_msg = "邮箱地址不能为空";
	}elseif ($data['username']==""){
		$getpwd_msg = "用户名不能为空";
	}elseif ($data['valicode']==""){
		$getpwd_msg = "验证码不能为空";
	}elseif ($data['valicode']!=$_SESSION['valicode']){
		$getpwd_msg = "验证码不正确";
	}else{
		$result = $user->GetOne($data);
		if ($result==false){
			$getpwd_msg = "邮箱，用户名对应不正确";
		}else{
			$data['user_id'] = $result['user_id'];
			$data['email'] = $result['email'];
			$data['username'] = $result['username'];
			$data['webname'] = $_G['system']['con_webname'];
			$data['title'] = "用户取回密码";
			$data['msg'] = GetpwdMsg($data);
			$data['type'] = "reg";
			if (isset($_SESSION['sendemail_time']) && $_SESSION['sendemail_time']+60*2>time()){
				$getpwd_msg =  "请2分钟后再次请求。";
			}else{
				$result = userClass::SendEmail($data);
				if ($result) {
					$_SESSION['sendemail_time'] = time();
					$getpwd_msg =  "信息已发送到{$data['email']}，请注意查收您邮箱的邮件";
					echo "<script>alert('{$getpwd_msg}');location.href='/'</script>";
				}
				else{
					$getpwd_msg =  "发送失败，请跟管理员联系";
				}
			}
		}
	}
	$_U['getpwd_msg'] = $getpwd_msg;
}
$title = '取回密码';
$template = 'user_getpwd.html';
?>