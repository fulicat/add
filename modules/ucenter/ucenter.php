<?
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问
check_rank("ucenter_".$_t);//检查权限

$result = $module->get_module("ucenter");
if ($result == false && $t!="install"){
	$msg = array("此模块尚未安装，请不要乱操作","",$url);
}else{


	
	/**
	 * 安装此模块
	**/
	if ($t == "install"){
	
		/**获得模块info的信息
		**/
		$result = $module->get_module("ucenter");
		if ($result != false){
			$msg = array("您已经安装了此模块，请勿重复添加。","",$url);
		}
		if ($msg== "" && isset($_POST['submit'])){
			$var = array("uc_dbhost","uc_dbuser","uc_dbpw","uc_dbname","uc_charset","uc_dbtablepre","uc_key","uc_api","uc_charset","uc_ip","uc_appid");
			$index = post_var($var);
			$content = "<? define('UC_CONNECT', 'mysql');
						define('UC_DBHOST', '".$index['uc_dbhost']."');
						define('UC_DBUSER', '".$index['uc_dbuser']."');
						define('UC_DBPW', '".$index['uc_dbpw']."');
						define('UC_DBNAME', '".$index['uc_dbname']."');
						define('UC_DBCHARSET', '".$index['uc_charset']."');
						define('UC_DBTABLEPRE', '".$index['uc_dbtablepre']."');
						define('UC_DBCONNECT', '0');
						define('UC_KEY', '".$index['uc_key']."');
						define('UC_API', '".$index['uc_api']."');
						define('UC_CHARSET', '".$index['uc_charset']."');
						define('UC_IP', '".$index['uc_ip']."');
						define('UC_APPID', '".$index['uc_appid']."');
						define('UC_PPP', '20'); ?>";
			$info = get_module_info("ucenter");
			$info = array_merge($info,array("status"=>0,"remark"=>serialize($index)));
			$module->add_module($info);
			mk_file("modules/ucenter/config.inc.php",$content);
			$msg = array("安装成功。","",$url);
		}
	}
	
	/**
	 * 卸载此模块
	**/
	elseif ($t == "unstall"){
		$_result = $module -> unstall_module("ucenter","ucenter_type");
		$msg = array("您已经成功卸载了模块");
		unlink("modules/ucenter/config.inc.php");
		$user->add_log($_log,$_result);//记录操作
		
	}
	
	/**
	 * 关闭此模块
	**/
	elseif ($t == "close"){
		$result = $module -> close_module("ucenter");
		$msg = array("您已经成功关闭了此模块，关闭后在内容添加的时候将不会看到此模块。");
		$user->add_log($_log,$result);//记录操作
	}
	
	/**
	 * 打开此模块
	**/
	elseif ($t == "open"){
		$msg = array("此模块为特殊模块，不能开启。");
		$user->add_log($_log,$result);//记录操作
	}
	
	
	/**
	 * 删除
	**/
	elseif ($t == ""){
		$result = $module->get_module("ucenter");
		$_result = unserialize(html_entity_decode($result['remark']));
		
	}
}


if ($msg!=""){
	$template_tpl = show_msg($msg,$msg_tpl);//如果是信息的则直接读取系统的信息模板
}else{
	$template_tpl = "ucenter.tpl";//如果是其他的，则直接读取模块所在的相应模板
	$magic->assign("template_dir","modules/ucenter/");
}

$magic->assign("module_tpl",$template_tpl);
?>