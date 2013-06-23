<?php
/**
 * @author Tissot.Cai
 * @copyright 揭阳市金兰芬投资有限公司
 * @version 1.0
 */
 
require_once ROOT_PATH . '/modules/ucenter/config.inc.php';
require_once ROOT_PATH . '/modules/ucenter/uc_client/client.php';

class UcenterClient {

    public static $msg;
    
    /**
     * 注册用户
     * @param $user_name 用户名
     * @param $password 密码
     * @param $email 邮箱
     */
    public static function regUser($user_name, $password, $email) {
        global $db_config;
		ob_start();
        mysql_select_db(UC_DBNAME);
        $u_id = uc_user_register($user_name, $password, $email);
        mysql_select_db($db_config['name']);
        if($u_id <= 0) {
            if($u_id == -1) {
                self::$msg = '用户名不合法';
            }
            elseif($u_id == -2) {
                self::$msg = '包含要允许注册的词语';
            }
            elseif($u_id == -3) {
               self::$msg = '用户名已经存在';
            }
            elseif($u_id == -4) {
                self::$msg = 'Email 格式有误';
            }
            elseif($u_id == -5) {
                self::$msg = 'Email 不允许注册';
            }
            elseif($u_id == -6) {
                self::$msg = '该 Email 已经被注册';
            }
            else {
                self::$msg = $u_id;
            }
            return self::$msg ;
        }

        return $u_id;
    }
	
    /**
     * 用户登录
     * @param $user 用户名
     * @param $password 密码
     */
    public static function login ($user_name, $password) {
        global $db_config;
		ob_start();
        mysql_select_db(UC_DBNAME);
        list($u_id, $a, $b, $c) = uc_user_login($user_name, $password);
        mysql_select_db($db_config['name']);
        if($u_id <= 0) {
            if($u_id == -1) {
                self::$msg = '用户不存在,或者被删除';
            } elseif($u_id == -2) {
                self::$msg = '密码错误';
            } else {
                self::$msg = '未定义';
            }
            return false;
        }
		ob_end_flush();
		echo str_repeat(' ',256);
		set_time_limit(0);
		$result =  uc_user_synlogin($u_id);
		//var_dump($_COOKIE);
		//echo $u_id;
		//exit;
		flush();
			
        return array("cookie"=>$result,"uc_user_id"=>$u_id);
    }

	/**
	 * 推出登录
	 */
	public static function LogOut ($uc_user_id="") {
		ob_start();
		ob_end_flush();
		echo str_repeat(' ',256);
		set_time_limit(0);
		if ($uc_user_id!=""){
			echo uc_user_synlogout($uc_user_id);
		}
		
		flush();
	}
    /**
     * 修改用户信息
     * @param $user_name 用户名
     * @param $old_pw 旧密码
     * @param $new_pw 新密码
     * @param $email 邮箱
     *
     */
    public static function updateUser ($user_name, $old_pw='', $new_pw='', $email='') {
        global $db_config;
        
        if (!$new_pw && !$email) {
            return false;
        }
        $result = uc_user_edit($user_name, $old_pw, $new_pw, $email, 1);
        
        mysql_select_db($db_config['name']);
        if ($result <0) {
            switch ($result) {
                case -1:
                    self::$msg = '旧密码不正确';
                    break;
                case -4:
                    self::$msg = 'Email 格式有误';
                    break;
                case -5:
                    self::$msg = 'Email 不允许注册';
                    break;
                case -6:
                    self::$msg = '该 Email 已经被注册';
                    break;
                case -7:
                    self::$msg = '没有做任何修改';
                    break;
                case -8:
                    self::$msg = '该用户受保护无权限更改';
                    break;
            }
            if (-7 == $result) {
                return true;
            }
            return false;
        }
        
        return true;
    }

    /**
     * 删除用户
     * @param $u_id 用户ID
     */
    public static function deleteUser ($u_id) {
        global $db_config;
        
        $result = uc_user_delete(array($u_id));
        if ($result <= 0) {
            return false;
        }
        mysql_select_db($db_config['name']);
        
        return true;
    }

    /**
     * ucenter 头像
     */
    public static function avatar ($user_id) {

        $user = new User();
        $user_id = $user->getUserIdInUCenter($user_id);

        return uc_avatar($user_id);
    }

	/**
	 * ucenter 同步积分
	 * @param $user_id 会员ucenter ID
	 * @param $value 积分数值
	 */
	public static function UpdateCredit ($user_id, $value) {

		return uc_credit_exchange_request($user_id, 0, 5, 1, $value)?true:false;
	}

	/**
	 * 获取积分
	 */
	public static function GetCredit ($user_id) {

		return uc_user_getcredit(1, $user_id, 4);
	}
}
?>
