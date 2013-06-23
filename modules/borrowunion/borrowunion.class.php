<?
/******************************
 * $File: borrow_union.class.php
 * $Description: 数据库处理文件
 * $Author: QQ134716
 * $Time:2012-03-09
 * $Update:None 
 * $UpdateDate:None 
******************************/
include_once(ROOT_PATH."/modules/account/account.class.php");
class borrowunionClass{
	
	const ERROR = '操作有误，请不要乱操作';
	/**
	 * 列表
	 *
	 * @return Array
	 */
	function GetList($data = array()){
		global $mysql;
		$user_id = empty($data['user_id'])?"":$data['user_id'];
		$username = empty($data['username'])?"":$data['username'];
	
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
		$_sql = "where 1=1 ";		 
		if (!empty($user_id)){
			$_sql .= " and p2.user_id = $user_id";
		}
		if (!empty($username)){
			$_sql .= " and p2.username = '$username'";
		}
		if (isset($data['type'])){
			if ($data['type']=="request" && isset($_REQUEST['type'])){
				$type = $_REQUEST['type'];
			}else{
				$type = $data['type'];
			}
			if ($type=="review"){
				$_sql .= " and p1.account=p1.account_yes ";
			}elseif ($type=="success"){
				$_sql .= " and p1.status=3";
			}elseif ($type=="now"){//正在还
				$_sql .= " and p1.repayment_account!=p1.repayment_yesaccount";
			}elseif ($type=="yes"){//已还
				$_sql .= " and p1.repayment_account=p1.repayment_yesaccount";
			}
			
		}
		if (isset($data['dotime2'])){
			$dotime2 = ($data['dotime2']=="request")?$_REQUEST['dotime2']:$data['dotime2'];
			if ($dotime2!=""){
				$_sql .= " and p1.addtime < ".get_mktime($dotime2);
			}
		}
		if (isset($data['dotime1'])){
			$dotime1 = ($data['dotime1']=="request")?$_REQUEST['dotime1']:$data['dotime1'];
			if ($dotime2!=""){
				$_sql .= " and p1.addtime > ".get_mktime($dotime1);
			}
		}
		if (isset($data['status'])){
			$_sql .= " and p1.status in ({$data['status']})";
		}
		
		$keywords = empty($data['keywords'])?"":$data['keywords'];
		if ((!empty($keywords) && $keywords=="request" ) ){
			if (isset($_REQUEST['keywords']) && $_REQUEST['keywords']!=""){
				$_sql .= " and p1.name like '%".urldecode($_REQUEST['keywords'])."%'";
			}
		}
		$_select = " p1.*,p2.username";
		$sql = "select SELECT from {borrow_union} as p1 
				left join `{user}` as p2 on p1.user_id = p2.user_id
		$_sql ORDER LIMIT";
		
		//是否显示全部的信息
		if (isset($data['limit']) ){
			$_limit = "";
			if ($data['limit'] != "all"){
				$_limit = "  limit ".$data['limit'];
			}
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select,  'order by p1.`order` desc,p1.id desc', $_limit), $sql));
		}			 
		
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $limit), $sql));		
		$list = $list?$list:array();
		
		return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
		
	}
	
	/**
	 * 查看
	 *
	 * @param Array $data
	 * @return Array
	 */
	public static function GetOne($data = array()){
		global $mysql;
		$_sql = "where 1=1 ";
		if (isset($data['user_id']) && $data['user_id']!=""){
			$_sql .= " and  p1.user_id = '{$data['user_id']}' ";
		}
		if (isset($data['id']) && $data['id']!=""){
			$_sql .= " and  p1.id = '{$data['id']}' ";
		}
		$sql = "select p1.*,p2.username from `{borrow_union}` as p1 left join `{user}` as p2 on p1.user_id = p2.user_id $_sql";
		return $mysql->db_fetch_array($sql);
	}

	
	function Action($data = array()){
		global $mysql;
		$user_id = $data['user_id'];
        if ($data['user_id'] == "") {
            return self::ERROR;
        }
		$sql = "select * from `{borrow_union}` where user_id = '{$data['user_id']}'";
		$result = $mysql -> db_fetch_array($sql);
		if ($result==false){
			$sql = "insert into `{borrow_union}` set `addtime` = '".time()."',`addip` = '".ip_address()."'";
			foreach($data as $key => $value){
				$sql .= ",`$key` = '$value'";
			}
			return $mysql->db_query($sql);
		}else{
			$_sql = "";
			$sql = "update `{borrow_union}` set ";
			foreach($data as $key => $value){
				$_sql[] .= "`$key` = '$value'";
			}
			$sql .= join(",",$_sql)." where user_id = '$user_id' ";
			return $mysql->db_query($sql);

		}
	}
	
	/**
	 * 修改
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	function Verify($data = array()){
		global $mysql;
		
		$sql = "update `{borrow_union}` set verify_time='".time()."',verify_user='{$data['verify_user']}',verify_remark='{$data['verify_remark']}',status='{$data['status']}' where  id='{$data['id']}' ";
        return $mysql->db_query($sql);
	}
	
	
	/**
	 * 删除
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	public static function Delete($data = array()){
		global $mysql;
		if (!isset($data['user_id']) && $data['user_id']=="") return self::ERROR;
		
		$sql = "delete from `{borrow_union}`  where user_id={$data['user_id']} ";
		return $mysql->db_query($sql);
	}
	


}
?>