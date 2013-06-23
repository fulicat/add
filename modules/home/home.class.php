<?
/******************************
 * $File: home.class.php
 * $Description: 数据库处理文件
 * $Author: QQ134716
 * $Time:2012-03-09
 * $Update:None 
 * $UpdateDate:None 
******************************/
class homeClass{
	
	const ERROR = '操作有误，请不要乱操作';
	const ATTESTATION_TYPE_ID_NO_EMPTY = '类型id不能为空';

	/**
	 * 列表
	 *
	 * @return Array
	 */
	function GetList($data = array()){
		global $mysql;
		$user_id = empty($data['user_id'])?"":$data['user_id'];
		$username = empty($data['username'])?"":$data['username'];
		$site_id = empty($data['site_id'])?"":$data['site_id'];
		$status = $data['status'];
		
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
		$_sql = "where 1=1 ";		 
		if (!empty($user_id)){
			$_sql .= " and p3.user_id = $user_id";
		}
		if (!empty($username)){
			$_sql .= " and p3.username = '$username'";
		}
		if (!empty($site_id)){
			$_sql .= " and p1.site_id = $site_id";
		}
	
		if ($status!=""){
			$_sql .= " and p1.status = $status";
		}
		$sql = "select SELECT from {home} as p1 
				left join {area} as p2 on p1.city=p2.id  left join {user} as p3 on p1.user_id=p3.user_id
				$_sql ORDER LIMIT";
				 
		
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array(' p1.*,p2.name as city_name,p3.username ', 'order by p1.id desc', $limit), $sql));		
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
		$id = $data['id'];
		$sql = "select p1.* ,p2.name as type_name,p3.username from {home} as p1 
				left join {area} as p2 on p1.city=p2.id  left join {user} as p3 on p1.user_id=p3.user_id where p1.id=$id
				";
		return $mysql->db_fetch_array($sql);
	}
	
	/**
	 * 添加
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	function Add($data = array()){
		global $mysql;
		
		$sql = "insert into `{home}` set `addtime` = '".time()."',`addip` = '".ip_address()."'";
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
        return $mysql->db_query($sql);
	}
	
	
	/**
	 * 修改
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	function Update($data = array()){
		global $mysql;
		$id = $data['id'];
        if ($data['id'] == "") {
            return self::ERROR;
        }
		
		$_sql = "";
		$sql = "update `{home}` set ";
		foreach($data as $key => $value){
			$_sql[] .= "`$key` = '$value'";
		}
		$sql .= join(",",$_sql)." where id = '$id'";
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
		$id = $data['id'];
		if (!is_array($id)){
			$id = array($id);
		}
		$sql = "delete from {home}  where id in (".join(",",$id).")";
		return $mysql->db_query($sql);
	}
	
	
}
?>