<?
/******************************
 * $File: companyinfo.class.php
 * $Description: 证书
 * $Author: ahui 
 * $Time:2010-08-09
 * $Update:None 
 * $UpdateDate:None 
******************************/
class companyinfoClass{
	
	const ERROR = '操作有误，请不要乱操作';
	const companyinfo_NAME_NO_EMPTY = '认证名称不能为空';

	/**
	 * 获得列表
	 *
	 * @return Array
	 */
	function GetList($data = array()){
		global $mysql;
		
		$name = $data['name'];
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
		$_sql = " where 1=1 ";
		if ($name!=""){
			$_sql .= " and p1.`name` like '%$name%'";
		}
		
		
		$sql = "select SELECT from {companyinfo} as p1 {$_sql}   ORDER LIMIT";
		
		//是否显示全部的信息
		if (isset($data['limit']) ){
			$_limit = "";
			if ($data['limit'] != "all"){
				$_limit = " where limit ".$data['limit'];
			}
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array(' * ', 'order by p1.`order` desc,p1.`id` desc', $_limit), $sql));
		}
		
		
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array(' p1.*', 'order by p1.`order` desc,p1.`id` desc', $limit), $sql));		
		$list = $list?$list:array();
		$flag_list = $data['flag_list'];
		if (count($list)>0){
			$data_flag['result'] = $data['flag_list'];
			foreach ($list as $key => $value){
				$data_flag['flag'] = $value['flag'];
				$list[$key]['flagname'] = getFlagName($data_flag);
			}
		}
		
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
		$fields = $data['fields'];
		if($id == "") return self::ERROR;
		if ($fields == 1){
			$sql = "select * from {companyinfo} as p1 left join {companyinfo_fields} as p2 on p1.id=p2.aid where p1.id=$id";
		}else{
			$sql = "select * from {companyinfo} where id=$id";
		}
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
            return self::NAME_NO_EMPTY;
        }
		$sql = "insert into `{companyinfo}` set `addtime` = '".time()."',`addip` = '".ip_address()."'";
		
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
		$sql = "update `{companyinfo}` set ";
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
		$sql = "delete from {companyinfo}  where id in (".join(",",$id).")";
		$mysql->db_query($sql);
		return true;
	}
	
	
	/**
	 * 列表
	 *
	 * @param Array $data
	 * @return Array
	 */
	public static function GetAgencyList($data = array()){
		global $mysql;
		
		$name = $data['name'];
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
		$_sql = " where 1=1 ";
		if ($name!=""){
			$_sql .= " and p1.`name` like '%$name%'";
		}
		
		$sql = "select SELECT from {companyinfo_agency} as p1 {$_sql}   ORDER ";
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array(' * ', 'order by p1.`order` desc,p1.`id` desc', $limit), $sql));		
		$list = $list?$list:array();
		
		if (isset($data['limit']) ){
			$limit = "";
			if ($limit != "all"){
				$limit = " where limit ".$data['limit'];
			}
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array(' * ', 'order by p1.`order` desc,p1.`id` desc', $limit), $sql));
		}
		
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
	public static function GetAgencyOne($data = array()){
		global $mysql;
		$id = $data['id'];
		if($id == "") return self::ERROR;
		$sql = "select * from {companyinfo_agency} where id=$id";
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
	function AddAgency($data = array()){
		global $mysql;
        if ($data['name'] == ""  ) {
            return self::ERROR;
        }
		
		$_sql = "";
		$sql = "insert into `{companyinfo_agency}` set ";
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
	public static function UpdateAgency($data = array()){
		global $mysql;
        if ($data['name'] == ""  || $data['id'] == "") {
            return self::ERROR;
        }
		$id = $data['id'];
		
		$sql = "update `{companyinfo_agency}` set ";
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
	public static function DeleteAgency($data = array()){
		global $mysql;
		$id = $data['id'];
		if (!is_array($id)){
			$id = array($id);
		}
		$sql = "delete from {companyinfo_agency}  where id in (".join(",",$id).")";
		$mysql->db_query($sql);
		return true;
	}
	
}
?>