<?
/******************************
 * $File: company.class.php
 * $Description: 证书
 * $Author: ahui 
 * $Time:2010-08-09
 * $Update:None 
 * $UpdateDate:None 
******************************/
class companyClass{
	
	const ERROR = '操作有误，请不要乱操作';
	const company_NAME_NO_EMPTY = '认证名称不能为空';

	/**
	 * 获得列表
	 *
	 * @return Array
	 */
	function GetList($data = array()){
		global $mysql;
		
		$page = (!isset($data['page']) || $data['page']=="")?1:$data['page'];
		$epage = (!isset($data['epage']) || $data['epage']=="")?10:$data['epage'];
		
		$_sql = " where 1=1 ";
		if (isset($data['name']) && $data['name']!=""){
			$_sql .= " and p1.`name` like '%{$data['name']}%'";
		}
		if (isset($data['status']) && $data['status']!=""){
			$_sql .= " and p1.`status` = '{$data['status']}' ";
		}
		
		
		$sql = "select SELECT from {company} as p1 {$_sql}   ORDER LIMIT";
		
		//是否显示全部的信息
		if (isset($data['limit']) ){
			$_limit = "";
			if ($data['limit'] != "all"){
				$_limit = "  limit ".$data['limit'];
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
		$flag_list = isset($data['flag_list'])?$data['flag_list']:"";
		if (count($list)>0){
			$data_flag['result'] = $flag_list;
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
		$_sql = " where 1=1 ";
		if (isset($data['id']) && $data['id'] != "") {
            $_sql .= " and id={$data['id']}";
        }
		if (isset($data['user_id']) && $data['user_id'] != "") {
            $_sql .= " and user_id={$data['user_id']}";
        }
		$sql = "select * from {company} {$_sql}";
		return $mysql->db_fetch_array($sql);
	}
	
	/**
	 * 查看
	 *
	 * @param Array $data
	 * @return Array
	 */
	public static function GetOnes($data = array()){
		global $mysql;
		$_sql = " where 1=1 ";
		if (isset($data['id']) && $data['id'] != "") {
            $_sql .= " and id={$data['id']}";
        }
		if (isset($data['user_id']) && $data['user_id'] != "") {
            $_sql .= " and user_id={$data['user_id']}";
        }
		$sql = "select * from {company} {$_sql}";
		$result = $mysql->db_fetch_array($sql);
		$user_id = $result['user_id'];
		if ($user_id!=""){
			//此公司的融贷需求列表
			$sql = "select * from `{borrow_line}` where user_id={$user_id} and status=1 order by id desc  limit 6";
			$result['borrowline'] = $mysql->db_fetch_arrays($sql);
			
			$_data['user_id'] = $user_id;
			$_data['limit'] = 6;
			$result['borrowjob'] =self::GetJobList($_data);
			$result['borrownews'] =self::GetNewsList($_data);
			
		}
		return $result;
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
            return self::company_NAME_NO_EMPTY;
        }
		$sql = "insert into `{company}` set `addtime` = '".time()."',`addip` = '".ip_address()."'";
		
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
        if ($data['id'] == "") {
            return self::ERROR;
        }
		$sql = "update `{company}` set ";
		$_sql = "";
		foreach($data as $key => $value){
			$_sql[] .= "`$key` = '$value'";
		}
		$sql .= join(",",$_sql)." where id = '$id'";
        $result = $mysql->db_query($sql);
		if ($result == false) return self::ERROR;
		return true;
	}
	
	
	function ActionCompany($data = array()){
		global $mysql;
		$sql = "select 1 from `{company}` where user_id={$data['user_id']}";
		$result = $mysql->db_fetch_array($sql);
		$_sql = "";
		foreach($data as $key => $value){
			$_sql[] .= "`$key` = '$value'";
		}
		$_sql = join(",",$_sql);
		if ($result==false){
			$sql = "insert into `{company}` set `addtime` = '".time()."',`addip` = '".ip_address()."', {$_sql}";
		}else{
			$sql = "update `{company}` set {$_sql} where user_id = '{$data['user_id']}'";
		}
		$result = $mysql->db_query($sql);
		return $result;
	
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
		$sql = "delete from {company}  where id in (".join(",",$id).")";
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
		$page = (!isset($data['page']) || $data['page']=="")?1:$data['page'];
		$epage = (!isset($data['epage']) || $data['epage']=="")?10:$data['epage'];
		
		$_sql = " where 1=1 ";
		if ($name!=""){
			$_sql .= " and p1.`name` like '%$name%'";
		}
		
		$sql = "select SELECT from {company_agency} as p1 {$_sql}   ORDER ";
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
		$sql = "select * from {company_agency} where id=$id";
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
		$sql = "insert into `{company_agency}` set ";
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
		
		$sql = "update `{company_agency}` set ";
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
		$sql = "delete from {company_agency}  where id in (".join(",",$id).")";
		$mysql->db_query($sql);
		return true;
	}
	
	function AddJob($data=array()){
		global $mysql;
        if (!isset($data['name']) || $data['name']== ""  ) {
            return "岗位名称不能为空";
        }
		$_sql = "";
		$sql = "insert into `{company_job}` set `addtime` = '".time()."',`addip` = '".ip_address()."',";
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
	public static function UpdateJob($data = array()){
		global $mysql;
        if ($data['id'] == "") {
            return self::ERROR;
        }
		$_sql = " where `id` = {$data['id']}";
		if (isset($data['user_id']) && $data['user_id']!=""){
			$_sql .= " and `user_id` = {$data['user_id']}";
		}
		$sql = "update `{company_job}` set ";
		$_sqls = "";
		foreach($data as $key => $value){
			$_sqls[] .= "`$key` = '$value'";
		}
		$sql .= join(",",$_sqls).$_sql;
        $result = $mysql->db_query($sql);
		return $result;
	}
	
	/**
	 * 删除
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	public static function DeleteJob($data = array()){
		global $mysql;
		 if (!isset($data['id']) || $data['id'] == "") {
            return false;
        }
		$_sql = " where `id` = {$data['id']}";
		if (isset($data['user_id']) && $data['user_id']!=""){
			$_sql .= " and `user_id` = {$data['user_id']}";
		}
		$sql = "delete from `{company_job}`  {$_sql}";
		$mysql->db_query($sql);
		return true;
	}
	
	/**
	 * 查看
	 *
	 * @param Array $data
	 * @return Array
	 */
	public static function GetJobOne($data = array()){
		global $mysql;
		$_sql = " where 1=1 ";
		if (isset($data['id']) && $data['id']!=""){
			$_sql .= " and p1.`id` = {$data['id']}";
		}
		if (isset($data['user_id']) && $data['user_id']!=""){
			$_sql .= " and p1.`user_id` = {$data['user_id']}";
		}
		
		$sql = "select p1.*,p2.username,p3.name as company_name from `{company_job}` as p1 left join `{user}` as p2 on p1.user_id=p2.user_id left join `{company}` as p3 on p1.user_id=p3.user_id {$_sql}  ";
		$result = $mysql->db_fetch_array($sql);
		if ($result == false) return self::ERROR;
		return $result;
	}
	
	/**
	 * 列表
	 *
	 * @param Array $data
	 * @return Array
	 */
	public static function GetJobList($data = array()){
		global $mysql;
		$page = (!isset($data['page']) || $data['page']=="")?1:$data['page'];
		$epage = (!isset($data['epage']) || $data['epage']=="")?10:$data['epage'];
		
		$_sql = " where p1.user_id!=''";
		if (isset($data['name']) && $data['name']!=""){
			$_sql .= " and p1.`name` like '%{$data['name']}%'";
		}
		if (isset($data['user_id']) && $data['user_id']!=""){
			$_sql .= " and p1.`user_id` = {$data['user_id']}";
		}
		$_select = "p1.*,p2.username,p3.name as company_name";
		$sql = "select SELECT from `{company_job}` as p1 left join `{user}` as p2 on p1.user_id=p2.user_id 
		left join `{company}` as p3 on p1.user_id=p3.user_id {$_sql}   ORDER ";
		if (isset($data['limit']) ){
			$limit = "";
			if ($limit != "all"){
				$limit = " where limit ".$data['limit'];
			}
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.`order` desc,p1.`id` desc', $limit), $sql));
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
	
	
	function AddGoods($data=array()){
		global $mysql;
        if (!isset($data['name']) || $data['name']== ""  ) {
            return "岗位名称不能为空";
        }
		$_sql = "";
		$sql = "insert into `{company_goods}` set `addtime` = '".time()."',`addip` = '".ip_address()."',";
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
	public static function UpdateGoods($data = array()){
		global $mysql;
        if ($data['id'] == "") {
            return self::ERROR;
        }
		$_sql = " where `id` = {$data['id']}";
		if (isset($data['user_id']) && $data['user_id']!=""){
			$_sql .= " and `user_id` = {$data['user_id']}";
		}
		$sql = "update `{company_goods}` set ";
		$_sqls = "";
		foreach($data as $key => $value){
			$_sqls[] .= "`$key` = '$value'";
		}
		$sql .= join(",",$_sqls).$_sql;
        $result = $mysql->db_query($sql);
		return $result;
	}
	
	/**
	 * 删除
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	public static function DeleteGoods($data = array()){
		global $mysql;
		 if (!isset($data['id']) || $data['id'] == "") {
            return false;
        }
		$_sql = " where `id` = {$data['id']}";
		if (isset($data['user_id']) && $data['user_id']!=""){
			$_sql .= " and `user_id` = {$data['user_id']}";
		}
		$sql = "delete from `{company_goods}`  {$_sql}";
		$mysql->db_query($sql);
		return true;
	}
	
	/**
	 * 查看
	 *
	 * @param Array $data
	 * @return Array
	 */
	public static function GetGoodsOne($data = array()){
		global $mysql;
		$_sql = " where 1=1 ";
		if (isset($data['id']) && $data['id']!=""){
			$_sql .= " and `id` = {$data['id']}";
		}
		if (isset($data['user_id']) && $data['user_id']!=""){
			$_sql .= " and `user_id` = {$data['user_id']}";
		}
		$sql = "select * from `{company_goods}`{$_sql}";
		$result = $mysql->db_fetch_array($sql);
		if ($result == false) return self::ERROR;
		return $result;
	}
	
	/**
	 * 列表
	 *
	 * @param Array $data
	 * @return Array
	 */
	public static function GetGoodsList($data = array()){
		global $mysql;
		$page = (!isset($data['page']) || $data['page']=="")?1:$data['page'];
		$epage = (!isset($data['epage']) || $data['epage']=="")?10:$data['epage'];
		
		$_sql = " where 1=1 ";
		if (isset($data['name']) && $data['name']!=""){
			$_sql .= " and p1.`name` like '%{$data['name']}%'";
		}
		if (isset($data['user_id']) && $data['user_id']!=""){
			$_sql .= " and p1.`user_id` = {$data['user_id']}";
		}
		
		$sql = "select SELECT from `{company_goods}` as p1 {$_sql}   ORDER ";
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
	
	
	function AddNews($data=array()){
		global $mysql;
        if (!isset($data['name']) || $data['name']== ""  ) {
            return "岗位名称不能为空";
        }
		$_sql = "";
		$sql = "insert into `{company_news}` set `addtime` = '".time()."',`addip` = '".ip_address()."',";
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
	public static function UpdateNews($data = array()){
		global $mysql;
        if ($data['id'] == "") {
            return self::ERROR;
        }
		$_sql = " where `id` = {$data['id']}";
		if (isset($data['user_id']) && $data['user_id']!=""){
			$_sql .= " and `user_id` = {$data['user_id']}";
		}
		$sql = "update `{company_news}` set ";
		$_sqls = "";
		foreach($data as $key => $value){
			$_sqls[] .= "`$key` = '$value'";
		}
		$sql .= join(",",$_sqls).$_sql;
        $result = $mysql->db_query($sql);
		return $result;
	}
	
	/**
	 * 删除
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	public static function DeleteNews($data = array()){
		global $mysql;
		 if (!isset($data['id']) || $data['id'] == "") {
            return false;
        }
		$_sql = " where `id` = {$data['id']}";
		if (isset($data['user_id']) && $data['user_id']!=""){
			$_sql .= " and `user_id` = {$data['user_id']}";
		}
		$sql = "delete from `{company_news}`  {$_sql}";
		$mysql->db_query($sql);
		return true;
	}
	
	/**
	 * 查看
	 *
	 * @param Array $data
	 * @return Array
	 */
	public static function GetNewsOne($data = array()){
		global $mysql;
		$_sql = " where 1=1 ";
		if (isset($data['id']) && $data['id']!=""){
			$_sql .= " and p1.`id` = {$data['id']}";
		}
		if (isset($data['user_id']) && $data['user_id']!=""){
			$_sql .= " and p1.`user_id` = {$data['user_id']}";
		}
		$sql = "select p1.*,p2.username,p3.name as company_name from `{company_news}` as p1 left join `{user}` as p2 on p1.user_id=p2.user_id left join `{company}` as p3 on p1.user_id=p3.user_id {$_sql}  ";
		$result = $mysql->db_fetch_array($sql);
		if ($result == false) return self::ERROR;
		return $result;
	}
	
	/**
	 * 列表
	 *
	 * @param Array $data
	 * @return Array
	 */
	public static function GetNewsList($data = array()){
		global $mysql;
		$page = (!isset($data['page']) || $data['page']=="")?1:$data['page'];
		$epage = (!isset($data['epage']) || $data['epage']=="")?10:$data['epage'];
		
		$_sql = " where 1=1 ";
		if (isset($data['name']) && $data['name']!=""){
			$_sql .= " and p1.`name` like '%{$data['name']}%'";
		}
		if (isset($data['user_id']) && $data['user_id']!=""){
			$_sql .= " and p1.`user_id` = {$data['user_id']}";
		}
		
		$sql = "select SELECT from `{company_news}` as p1 left join `{user}` as p2 on p1.user_id=p2.user_id 
		left join `{company}` as p3 on p1.user_id=p3.user_id {$_sql}   ORDER ";
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		$_select = "p1.*,p2.username,p3.name as company_name";
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.`order` desc,p1.`id` desc', $limit), $sql));		
		$list = $list?$list:array();
		if (isset($data['limit']) ){
			$limit = "";
			if ($limit != "all"){
				$limit = " where limit ".$data['limit'];
			}
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.`order` desc,p1.`id` desc', $limit), $sql));
		}
		
		return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
	}
}
?>