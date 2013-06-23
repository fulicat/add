<?
/******************************
 * $File: blog.class.php
 * $Description: 证书
 * $Author: ahui 
 * $Time:2010-08-09
 * $Update:None 
 * $UpdateDate:None 
******************************/
class blogClass{
	
	const ERROR = '操作有误，请不要乱操作';
	const blog_NAME_NO_EMPTY = '认证名称不能为空';

	/**
	 * 获得列表
	 *
	 * @return Array
	 */
	function GetList($data = array()){
		global $mysql;
		
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
		$_sql = " where 1=1 ";
		if (isset($data['name']) && $data['name']!=""){
			$_sql .= " and p1.`name` like '%{$data['name']}%'";
		}
		if (isset($data['user_id']) && $data['user_id']!=""){
			$_sql .= " and p1.user_id = '{$data['user_id']}'";
		}
		$_select = "p1.*,p2.name as type_name";
		$sql = "select SELECT from `{blog}` as p1 left join `{blog_type}` as p2 on p1.type_id=p2.id {$_sql}  ORDER LIMIT";
		
		//是否显示全部的信息
		if (isset($data['limit']) ){
			$_limit = "";
			if ($data['limit'] != "all"){
				$_limit = "  limit ".$data['limit'];
			}
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.`order` desc,p1.`id` desc', $_limit), $sql));
		}
		
		
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.`order` desc,p1.`id` desc', $limit), $sql));		
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
		$_sql = " where 1=1 ";
		if (isset($data['id']) && $data['id'] != "") {
            $_sql .= " and id={$data['id']}";
        }
		if (isset($data['user_id']) && $data['user_id'] != "") {
            $_sql .= " and user_id={$data['user_id']}";
        }
		$sql = "select * from {blog} {$_sql}";
		
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
        if ($data['name'] == "" ) {
            return self::blog_NAME_NO_EMPTY;
        }
		$sql = "insert into `{blog}` set `addtime` = '".time()."',`addip` = '".ip_address()."'";
		
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
        $mysql->db_query($sql);
    	return $mysql->db_insert_id();
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
        if ($data['name'] == ""  || $data['id'] == "") {
            return self::ERROR;
        }
		$sql = "update `{blog}` set ";
		$_sql = "";
		foreach($data as $key => $value){
			$_sql[] .= "`$key` = '$value'";
		}
		$sql .= join(",",$_sql)." where id = '$id'";
        $result = $mysql->db_query($sql);
		if ($result == false) return self::ERROR;
		return true;
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
		$sql = "delete from {blog}  where id in (".join(",",$id).")";
		$mysql->db_query($sql);
		return true;
	}
	
	
	/**
	 * 列表
	 *
	 * @param Array $data
	 * @return Array
	 */
	public static function GetTypeList($data = array()){
		global $mysql;
		
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
		$_sql = " where 1=1 ";
		if (isset($data['name']) && $data['name'] !=""){
			$_sql .= " and p1.`name` like '%{$data['name']}%'";
		}
		
		$sql = "select SELECT from {blog_type} as p1 {$_sql}   ORDER ";
		
		if (isset($data['limit']) ){
			$limit = "";
			if ($limit != "all"){
				$limit = " where limit ".$data['limit'];
			}
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array(' * ', 'order by p1.`order` desc,p1.`id` desc', $limit), $sql));
		}
		
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array(' * ', 'order by p1.`order` desc,p1.`id` desc', $limit), $sql));		
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
	public static function GetTypeOne($data = array()){
		global $mysql;
		$id = $data['id'];
		if($id == "") return self::ERROR;
		$sql = "select * from {blog_type} where id=$id";
		$result = $mysql->db_fetch_array($sql);
		if ($result == false) return self::ERROR;
		return $result;
	}
	
	/**
	 * 添加
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	function AddType($data = array()){
		global $mysql;
        if ($data['name'] == ""  ) {
            return self::ERROR;
        }
		
		$_sql = "";
		$sql = "insert into `{blog_type}` set addtime='".time()."',addip='".ip_address()."',";
		foreach($data as $key => $value){
			$_sql[] .= "`$key` = '$value'";
		}
		$sql .= join(",",$_sql)." ";
        $mysql->db_query($sql);
		return true;
	}
	
	
	/**
	 * 修改
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	public static function UpdateType($data = array()){
		global $mysql;
        if ($data['name'] == ""  || $data['id'] == "") {
            return self::ERROR;
        }
		$id = $data['id'];
		
		$sql = "update `{blog_type}` set ";
		$_sql = "";
		foreach($data as $key => $value){
			$_sql[] .= "`$key` = '$value'";
		}
		$sql .= join(",",$_sql)." where id = '$id'";
        $mysql->db_query($sql);
		return true;
	}
	
	/**
	 * 删除
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	public static function DeleteType($data = array()){
		global $mysql;
		$id = $data['id'];
		if (!is_array($id)){
			$id = array($id);
		}
		$sql = "select 1 from `{blog}` where type_id in (".join(",",$id).") ";
		$result = $mysql->db_fetch_array($sql);
		if ($result!=false) return "你还有文章还没删除，不能删除类型。请先删除类型下面的文章。";
		$sql = "delete from `{blog_type}`  where id in (".join(",",$id).")";
		$mysql->db_query($sql);
		return true;
	}
	
	/**
	 * 修改
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	function ActionType($data = array()){
		global $mysql;
        if (!isset($data['id']) || $data['id'] == "") {
            return self::ERROR;
        }
		foreach($data['id'] as $key => $value){
			if($data['name'][$key]!=""){
				$sql = "update `{blog_type}` set ";
				$sql .= "`name` = '{$data['name'][$key]}',`order` = '{$data['order'][$key]}' where id = '{$value}'";
				 $mysql->db_query($sql);
			}
		}
		 return true;
       
	}

}
?>