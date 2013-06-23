<?
/******************************
 * $File: user.class.php
 * $Description: 数据库处理文件
 * $Author: QQ134716
 * $Time:2012-03-09
 * $Update:None 
 * $UpdateDate:None 
******************************/
class dwbbsClass{
	
	const ERROR = '操作有误，请不要乱操作';
	const MODULE_CODE_NO_EMPTY = '模型名称不能为空';
	const USERLOGIN_USERNAME_NO_EMPTY = '用户名不能为空';
	const USERLOGIN_PASSWORD_NO_EMPTY = '密码不能为空';
	const TOPICS_IS_LOCK = '帖子已经锁定';
	const FORUM_SUB_EXISTS = '版块存在子版块';
	
	
	/**
	 * 获得论坛参数设置列表
	 * @param Array $data(name,type，style)
	 * @return Array
	 */
	function ActionSettings($data = array()){
		global $mysql;
		$_sql = " where 1=1 ";
		if (isset($data['style']) && $data['style']!=""){
			$_sql .= " and style='{$data['style']}'";
		}
		if (isset($data['id']) && $data['id']!=""){
			$_sql .= " and id='{$data['id']}'";
		}
		$action = isset($data["action"])?$data["action"]:"list";
		
		if ($action == "list"){
			$sql = "select * from `{bbs_settings}` {$_sql}";
			return $mysql->db_fetch_arrays($sql);
		}
		
		elseif ($action == "lists"){
			$sql = "select * from `{bbs_settings}` {$_sql}";
			$result =  $mysql->db_fetch_arrays($sql);
			$_result = array();
			foreach ($result as $key => $value){
				$_result[$value['nid']] = $value['value'];
			}
			return $_result;
		}
		
		elseif ($action == "view"){
			$sql = "select * from `{bbs_settings}` {$_sql}";
			return $mysql->db_fetch_array($sql);
		}
		
		elseif ($action == "add"){
			unset($data['action']);
			$_sql = "";
			$sql = "select * from `{bbs_settings}` where nid = '".$data['nid']."'";
			$result = $mysql -> db_fetch_array($sql);
			if ($result!=false) return  self::SYSTEM_NID_IS_EXIST;
			$sql = "insert into `{bbs_settings}` set ";
			foreach($data as $key => $value){
				$_sql[] = "`$key` = '$value'";
			}
			$result =  $mysql->db_query($sql.join(",",$_sql));
			if ($result == false) return self::ERROR;
			return true;
		}
		
		elseif ($action == "update"){
			unset($data['action']);
			$sql = "select * from `{bbs_settings}` where nid = '".$data['nid']."' and id !=".$data['id'];
			$result = $mysql -> db_fetch_array($sql);
			if ($result!=false) return  self::SYSTEM_NID_IS_EXIST;
			
			$_sql = "";
			$sql = "update `{bbs_settings}` set ";
			foreach($data as $key => $value){
				$_sql[] = "`$key` = '$value'";
			}
			$result =  $mysql->db_query($sql.join(",",$_sql)." where id = '".$data['id']."'");
			if ($result == false) return self::ERROR;else return true;
			
		}
		
		elseif ($action == "updates"){
			foreach ($data['value'] as $key =>$val){
				$val = nl2br($val);
				$sql  = "update `{bbs_settings}` set `value` = '{$val}' where `nid` = '$key'";
				$mysql->db_query($sql);
			}
			return self::ERROR;
		}
	}
	
	/**
	 * 论坛积分设置
	 * @param Array $data(name,type，style)
	 * @return Array
	 */
	function ActionCredits($data = array()){
		global $mysql;
		$_sql = " where 1=1 ";
		
		if (isset($data['id']) && $data['id']!=""){
			$_sql .= " and id='{$data['id']}'";
		}
		
		$action = isset($data["action"])?$data["action"]:"list";
		
		if ($action == "list"){
			$sql = "select * from `{bbs_credits}` {$_sql}";
			return $mysql->db_fetch_arrays($sql);
		}
		
		elseif ($action == "updates"){
			foreach ($data['credit'] as $key =>$val){
				$sql  = "update `{bbs_credits}` set `creditscode` = '{$key}'";
				if(!isset($val['isuse'])){
					$sql  .= ",isuse=0";
				}
				foreach ($val as $_key => $_val){
					$sql .= ",`{$_key}` = '{$_val}'";
				}
				$sql .= " where `creditscode` = '{$key}'";
				$mysql->db_query($sql);
			}
			return self::ERROR;
		}
	}
	
	/**
	 * 论坛模块管理
	 * @param Array $data(name,type，style)
	 * @return Array
	 */
	function ActionForum($data = array()){
		global $mysql;
		$_sql = " where 1=1 ";
		
		if (isset($data['id']) && $data['id']!=""){
			$_sql .= " and id='{$data['id']}'";
		}
		$action = isset($data["action"])?$data["action"]:"list";
		unset($data['action']);
		
		if ($action == "list"){
			$sql = "select * from `{bbs_forums}` {$_sql} order by `order` desc";
			$result = $mysql->db_fetch_arrays($sql);
			$_result = "";
			$lgtid = isset($data['lgtid'])?$data['lgtid']:"";
			if (count($result)>0){
				$i=0;
				if (!isset($code) || $code=="") {
					foreach($result as $key => $value){
						if ($value['pid']==0 && $value['id']!=$lgtid){
							$_result[$i] = $value;
							$_result[$i]['aname'] = "<b>".$value['name']."</b>";
							$_result[$i]['porder'] = "";
							$_result[$i]['norder'] = 1;
							$i++;
							foreach($result as $_key => $_value){
								if ($_value['pid']==$value['id'] && $_value['id']!=$lgtid){
									$_result[$i] = $_value;
									$_result[$i]['aname'] = "-".$_value['name'];
									$_result[$i]['porder'] = "|——";
									$_result[$i]['norder'] = 2;
									$i++;
									foreach($result as $__key => $__value){
										if ($__value['pid']==$_value['id'] && $__value['id']!=$lgtid){
											$_result[$i] = $__value;
											$_result[$i]['aname'] = "--".$__value['name'];
											$_result[$i]['porder'] = "|————";
											$_result[$i]['norder'] = 3;
											$i++;
											foreach($result as $___key => $___value){
												if ($___value['pid']==$__value['id'] && $___value['id']!=$lgtid){
													$_result[$i] = $___value;
													$_result[$i]['aname'] = "--".$___value['name'];
													$_result[$i]['porder'] = "|——————";
													$i++;
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
			return $_result;
		}
		
		//查看列表
		elseif ($action == "menu"){
			$sql = "select * from `{bbs_forums}` ";
			$result = $mysql->db_fetch_arrays($sql);
			$control_menu = array();
			if (is_array($result)){
				foreach ($result as $key => $value){
					if ($value['pid']==0){
						$control_menu[$key] = $value;
						foreach ($result as $_key => $_value){
							if ($_value['pid']==$value['id']){
								$control_menu[$key]['sub'][$_key] = $_value;
								foreach ($result as $__key => $__value){
									if ($__value['pid']==$_value['id']){
										$control_menu[$key]['sub'][$_key]['_sub'][$__key] = $__value;
									}
								}
							}
						}
					}
				}
			}
			return $control_menu;
		}
		
		//查看单条信息
		elseif ($action == "view"){
			$sql = "select * from `{bbs_forums}` where id='{$data['id']}'";
			return $mysql->db_fetch_array($sql);
		}
		
		
		//添加板块
		elseif ($action == "add"){
			$_sql = array();
			if (!isset($data['name'])) return self::ERROR;
			$sql = "insert into `{bbs_forums}` set ";
			foreach($data as $key => $value){
				if ($value==NULL){
					$_sql[] = "`$key` = null";
				}else{
					$_sql[] = "`$key` = '$value'";
				}
			}
			$result =  $mysql->db_query($sql.join(",",$_sql));
			if ($result == false){
				 return self::ERROR;
			 }
			return true;
		}
		
		//更新版块
		elseif ($action == "update"){
			$_sql = "";
			$sql = "update `{bbs_forums}` set ";
			foreach($data as $key => $value){
				if ($value==NULL){
					$_sql[] = "`$key` = null";
				}else{
					$_sql[] = "`$key` = '$value'";
				}
			}
			$result =  $mysql->db_query($sql.join(",",$_sql)." where id = '".$data['id']."'");
			if ($result == false) return self::ERROR;
			return true;
		}
		
		//更新版块的名称和排序
		elseif ($action == "updates"){
			foreach ($data['id'] as $key =>$val){
				$sql  = "update `{bbs_forums}` set `name`='{$data['name'][$key]}',`order`='{$data['order'][$key]}' where `id` = '{$val}'";
				$mysql->db_query($sql);
			}
			return self::ERROR;
		}
		
		//删除版块
		elseif ($action == "del"){
			$fid = isset($data['fid'])?$data['fid']:"";
			$sql = "select 1 from `{bbs_forums}` where pid = '{$fid}'";
			$result = $mysql -> db_fetch_array($sql);
			if ($result!=false) return false;
			$sql = "delete from `{bbs_forums}` where id = '{$fid}' ";
			$mysql->db_query($sql);
			
			$sql = "delete from `{bbs_topics}` where fid = '{$fid}' ";
			$mysql->db_query($sql);
			
			$sql = "delete from `{bbs_posts}` where fid = '{$fid}' ";
			$mysql->db_query($sql);
			
			return true;
		
		}
		
		//合并版块
		elseif ($action == "merge"){
			$fid = isset($data['fromfid'])?$data['fromfid']:"";
			$sql = "select 1 from `{bbs_forums}` where pid = '{$fid}'";
			$result = $mysql -> db_fetch_array($sql);
			if ($result!=false) return self::FORUM_SUB_EXISTS;
			$sql = "update `{bbs_topics}` set fid='{$data['tofid']}' where fid='{$fid}'";
			$mysql->db_query($sql);
			$sql = "update `{bbs_posts}` set fid='{$data['tofid']}' where fid='{$fid}'";
			$mysql->db_query($sql);
			
			$_data['fid'] = $fid;
			$_data['action'] = "del";
			self::ActionForum($_data);;
			return true;
		}
		//获取版主列表
		elseif ($action == "admins_list"){
			$fid = isset($data['fid'])?$data['fid']:"";
			if (empty($fid)) return self::ERROR;
			$sql = "select admins,pid from `{bbs_forums}` where id = '{$fid}'";
			$result = $mysql -> db_fetch_array($sql);
			if ($result== false)  return self::ERROR;
			
			$display = explode("|",$result['admins']);
			array_shift ($display);
			$_display = array();
			foreach ($display as $key => $value){
				$_display[$key]['name'] = $value;
				$_display[$key]['isup'] = 0;
			}
			
			$pid = $result['pid'];
			$presult = "";
			if ($pid!="0"){
				$sql = "select admins,pid from `{bbs_forums}` where id = '{$pid}'";
				$presult = $mysql -> db_fetch_array($sql);
			}
			
			$_pdisplay = array();
			$mresult = false;
			if ($presult!=false){
				$pid = $presult['pid'];
				$presult = explode("|",$presult['admins']);
				array_shift ($presult);
				foreach ($presult as $key => $value){
					$_pdisplay[$key]['name'] = $value;
					$_pdisplay[$key]['isup'] = 1;
				}
				$sql = "select admins,pid from `{bbs_forums}` where id = '{$pid}'";
				$mresult = $mysql -> db_fetch_array($sql);
			}
			
			$_mdisplay = array();
			if ($mresult!=false){
				$mdisplay = explode("|",$mresult['admins']);
				array_shift ($mdisplay);
				foreach ($mdisplay as $key => $value){
					$_mdisplay[$key]['name'] = $value;
					$_mdisplay[$key]['isup'] = 1;
				}
			}
			if (isset($data['type']) && $data['type']=="up"){
				$result = array_merge($_mdisplay,$_pdisplay);
			}else{
				$result = array_merge($_mdisplay,$_pdisplay,$_display);
			}
			return $result;
			
		}
		
		//添加版主
		elseif ($action == "admins_add"){
			$fid = isset($data['fid'])?$data['fid']:"";
			if (empty($fid)) return self::ERROR;
			$admins = $data['admins'];
			$admins_list = array();
			$_admins_list = self::ActionForum(array("fid"=>$fid,"type"=>"up","action"=>"admins_list"));
			foreach ($_admins_list as $key => $value){
				$admins_list[] = $value['name']; 
			}
			$no_exist_user = "";
			$yes_admins = array("0"=>"");
			sort($admins);
			foreach ($admins as $key=> $value){
				if (!isset($value['delid'])){
					if ($value['name']!=""  && !in_array($value['name'],$yes_admins)){
						if (!in_array($value['name'],$admins_list)){
							$sql = "select 1 from `{user}` where username ='{$value['name']}'";
							$result = $mysql -> db_fetch_array($sql);
							if ($result==false  ){
								$no_exist_user[] = $value['name'];
							}else{
								$yes_admins[] = $value['name'];
							}
						}
					}
				}
			}
			if (isset($yes_admins[1])){
				array_shift($yes_admins);
				$yes_admins = "|".join("|",$yes_admins);
			}else{
				$yes_admins = "";
			}
			$sql = "update `{bbs_forums}` set admins='{$yes_admins}' where id='{$fid}'";
			$mysql->db_query($sql);
	
			return $no_exist_user;
		}
		
		
 		else{
			return self::ERROR;
		}
	}
	/**
	 * 获得论坛版块的子版块
	 * @param Array $data(name,type，style)
	 * @return Array
	 */
	public static function GetForumSub($data = array()){
		global $mysql;
		if (isset($data['fid']) && $data['fid']!=""){
			$pid = $data['fid'];
		}else{
			return "";
		}
		$sql = "select * from `{bbs_forums}` where pid = '{$pid}'";
		$result = $mysql->db_fetch_arrays($sql);
		return $result;
	}
	
	
	/**
	 * 获得列表
	 *
	 * @return Array
	 */
	function GetTopicsList($data = array()){
		global $mysql;
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
		$_sql = "where 1=1";
		if (isset($data['name']) && $data['name']!=""){
			$_sql .= " and p1.name like '%{$data['name']}%'";
		}
		if (isset($data['site_id']) && $data['site_id']!=""){
			$_sql .= " and p1.site_id = {$data['site_id']}";
		}
		if (isset($data['fid']) && $data['fid']!=""){
			$_sql .= " and p1.fid = {$data['fid']}";
		}
		
		if (isset($data['status']) && $data['status']!=""){
			$_sql .= " and p1.status = {$data['status']}";
		}
		if (isset($data['lgnore']) && $data['lgnore']!=""){
			$_sql .= " and p1.site_id != {$data['lgnore']}";
		}
		$keywords = urldecode(isset($data['keywords'])?$data['keywords']:"");
		if ((!empty($keywords) && $keywords=="request" ) || !empty($keywords)){
			if (isset($_REQUEST['keywords']) && $_REQUEST['keywords']!=""){
				$_sql .= " and p1.`name` like '%".urldecode($_REQUEST['keywords'])."%'";
			}
		}
		
		$_select = "p1.*,p2.name as forum_name";
		$sql = "select SELECT from `{bbs_topics}` as p1 
				left join {bbs_forums} as p2 on p2.id = p1.fid
				
				{$_sql}   ORDER LIMIT";
		
		$_order = "order by p1.id desc";		
		if (isset($data['order'])){
			if ($data['order']=="hits")
			$_order = " order by p1.hits desc";
		}
		//是否显示全部的信息
		if (isset($data['limit']) ){
			$_limit = "";
			if ($data['limit'] != "all"){
				$_limit = "  limit ".$data['limit'];
			}
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order, $_limit), $sql));
		}			
				
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select,$_order, $limit), $sql));		
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
	 * 查看单条帖子
	 *
	 * @param Array $data
	 * @return Array
	 */
	public static function GetTopicsOne($data = array()){
		global $mysql;
		$id = $data['id'];
		if($id == "") return self::ERROR;
		$click = isset($data['click'])?$data['click']:"";
		if ($click){
			$sql = "update  {bbs_topics} set hits=hits+1 where id=$id";
			$mysql->db_query($sql);
		}
		$sql = "select p1.* from `{bbs_topics}` as p1 
			left join {bbs_forums} as p2 on p2.id = p1.fid
			left join {bbs_posts} as p3 on p3.tid = p1.id
			where p1.id={$id}";
		return $mysql->db_fetch_array($sql);
	}
	
	
	/**
	 * 添加帖子
	 * @param Array $data(name,type，style)
	 * @return Array
	 */
	public static function AddTopics($data = array()){
	 	global $mysql,$_G;
		$date = date("Y-m-d",time());
		$user_id = $data['last_replyuser'];
		if (!isset($data['fid']) || $data['fid']=="") return self::ERROR;
		
		//将帖子插入在帖子表去
		$sqlc="select isverify from `{bbs_forums}` where id='".$data['fid']."'";
		$showdirect = $mysql->db_fetch_array($sqlc);
		if($showdirect['isverify']==0){
			$showd=1;
		}else{
			$showd=0;
		}
		$sql = "insert into `{bbs_topics}` set `user_id`='{$user_id}',`addtime` = '".time()."',`addip` = '".ip_address()."'";
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
			$sql .=",`status` ='".$showd."' ";

        $mysql->db_query($sql);
		$tid = $mysql -> db_insert_id();
		if ($tid>0){
			//将帖子插入在回复表去
			$sql = "insert into `{bbs_posts}` set `tid` = '{$tid}',`istopic`=1,`fid` = '{$data['fid']}',`user_id`='{$user_id }',`username`='{$data['username']}',`name`='{$data['name']}',`content`='{$data['content']}',`addtime` = '".time()."',`addip` = '".ip_address()."'";
			$mysql->db_query($sql);
			$pid = $mysql -> db_insert_id();
			
			//更新相应版块的信息
			$sql = "update `{bbs_forums}` set `today_num`=today_num+1,`topics_num`=topics_num +1,`last_postuser`='{$user_id }',`last_postname` ='{$data['name']}',`last_posttime` ='".time()."',last_postid='{$pid}' where id='{$data['fid']}'";
			$mysql->db_query($sql);
			
			//更新网站缓存
			$sql = "update `{cache}` set `bbs_topics_num` =bbs_topics_num+1 , `bbs_today_topics` =bbs_today_topics+1  where date='{$date}'";
			$mysql->db_query($sql);
			
			//更新用户的积分
			if (isset($data['status']) && $data['status']==1){
				self::UpdateCredit(array("user_id"=>$result['user_id'],"op_user"=>$_G['user_id'],"id"=>$data['id']));
			}
			
			//更新用户的缓存
			$sql = "select 1 from {user_cache} where user_id='{$user_id }'";
			$result = $mysql->db_fetch_array($sql);
			if ($result==false){
				$sql = "insert into {user_cache} set user_id={$user_id},bbs_topics_num=1";
				$mysql->db_query($sql);
			}else{
				$sql = "update `{user_cache}` set bbs_topics_num=bbs_topics_num+1  where user_id='{$user_id}'";
				$mysql->db_query($sql);
			}
			return $tid;
		}else{
			return self::ERROR;
		}
		
	}
	
	/**
	 * 修改主题
	 * @param Array $data(name,type，style)
	 * @return Array
	 */
	public static function UpdateTopics($data = array()){
		global $mysql,$_G;
		$sql = "update `{bbs_topics}` set `edittime` = '".time()."'";
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
		$sql .= " where id='{$data['id']}'";
		$mysql->db_query($sql);
		$sql = "select credit from `{bbs_topics}`  where id = '{$data['id']}'";
		$result = $mysql ->db_fetch_array($sql);
		if ($result['credit']!=1 && $data['status']==1){
			self::UpdateCredit(array("user_id"=>$result['user_id'],"op_user"=>$_G['user_id'],"id"=>$data['id']));
		}
		$tid = $data['id'];
		unset($data['id']);
		$sql = "update `{bbs_posts}` set `edittime` = '".time()."'";
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
		$sql .= " where tid='$tid' and istopic=1;";
        return $mysql->db_query($sql);
	}
	
	/**
	 * 修改主题
	 * @param Array $data(name,type，style)
	 * @return Array
	 */
	public static function UpdateTopicsStatus($data = array()){
		global $mysql,$_G;
		
		foreach($data['status'] as $key => $value){
			$id = $data['tid'][$key];
			$sql = "update `{bbs_topics}` set `status` = $value where id='{$id}'";
			$mysql->db_query($sql);
			$sql = "select credit from `{bbs_topics}`  where id = '{$id}'";
			$result = $mysql ->db_fetch_array($sql);
			if ($result['credit']!=1 && $data['status']==1){
				self::UpdateCredit(array("user_id"=>$result['user_id'],"op_user"=>$_G['user_id'],"id"=>$id));
			}
		}
		
		
        return $mysql->db_query($sql);
	}
	
	/**
	 * 删除回帖
	 *
	 * @param Array $data
	 * @return Array
	 */
	function DeleteTopics($data=array()){
		global $mysql;
		$id = isset($data["tid"])?$data["tid"]:"";
		$fid = isset($data["fid"])?$data["fid"]:"";
		$sql = "select * from `{bbs_topics}` where id = '{$id}'";
		$result = $mysql -> db_fetch_array($sql);
		$user_id = $result['user_id'];
		$fid = $result['fid'];
		//更新相应版块的信息
		if (date("Y-m-d",$result['addtime'])==date("Y-m-d",time())){
			$sql = "update `{bbs_forums}` set `today_num`=today_num-1,`topics_num`=topics_num -1 where id='{$fid}'";
			$mysql->db_query($sql);
			
			//更新网站缓存
			$date =date("Y-m-d",time());
			$sql = "update `{cache}` set `bbs_topics_num` =bbs_topics_num-1 , `bbs_today_topics` =bbs_today_topics-1  where date='{$date}'";
			$mysql->db_query($sql);
			
			//更新用户的缓存
			$sql = "update `{user_cache}` set bbs_topics_num=bbs_topics_num-1  where user_id='{$user_id}'";
			$mysql->db_query($sql);
		}
		//更新用户的积分
		if ($data['status']==1){
			self::UpdateCredit(array("user_id"=>$result['user_id'],"op_user"=>$_G['user_id'],"id"=>$data['id']));
		}
		
		$sql = "delete from `{bbs_topics}` where id = '{$id}'";
		$mysql->db_query($sql);
		 
		$sql = "delete from `{bbs_posts}` where tid = '{$id}'";
		return $mysql->db_query($sql);
	}
	
	function UpdateCredit($data = array()){
		global $mysql;
		$sql = "update `{bbs_topics}` set credit = 1 where id='{$data['id']}'";
		$mysql->db_query($sql);
		require_once("modules/credit/credit.class.php");
		$credit['nid'] = "borrow_success";
		$credit['user_id'] = $data['user_id'];
		$credit['value'] = 1;
		$credit['op_user'] = $data['op_user'];
		$credit['op'] = 1;//增加
		$credit['remark'] = "发表帖子成功加1分";
		creditClass::UpdateCredit($credit);//更新积分
	}
	function ActionTopics($data = array()){
		global $mysql;
		$action = isset($data["action"])?$data["action"]:"";
		$fid = isset($data["fid"])?$data["fid"]:"";
		$tid = isset($data["tid"])?$data["tid"]:"";
		$postid = isset($data["postid"])?$data["postid"]:"";
		$value = isset($data["value"])?$data["value"]:0;
		$remark = isset($data["remark"])?$data["remark"]:"";
		
		switch($action){
			case "delPost":
				if(empty($postid)){
					return "没有选择帖子。";
				}
				else{
					if($tid==0){
						//直接删除回帖
						self::DeletePosts(array("postid"=>$postid,"fid"=>$fid));
						/*
						$attrows=$db->row_select("attachments","postid={$postid}");
						foreach($attrows as $row){
							$filepath="uploadfile/attachment/".$row['filepath'];
							if(file_exists($filepath)){
								@unlink($filepath);
							}
							$db->row_delete("attachments","id={$row['id']}");
						}
						*/
					}else{				
						//如果是主题，就先进入回收站
						$sql = "update `{bbs_topics}` set isrecycle=1 where id={$tid} and fid={$fid}";
						$mysql->db_query($sql);				
					}
					
					/*
					if($cache_settings['isadminlog']=='1'){
						saveLog('delPost', $lg['username'], $lg['username'], $tid, $postid, '', '', $reason);
					}
					*/
					return true;
				}
			break;
			
			case "movePost":
				if(empty($tid)){
					return "没有选择帖子。";
				}
				else{
					$sql = "update `{bbs_topics}` set fid='{$value}' where id={$tid} and fid={$fid}";
					$mysql->db_query($sql);	
					
					$sql = "update `{bbs_posts}` set fid='{$value}' where tid={$tid} and fid={$fid}";
					$mysql->db_query($sql);	
					
					return true;
				}	
			break;	
			
			case "coverPost":
				if(empty($postid)){
					return "没有选择帖子。";
				}
				else{
					$sql = "update `{bbs_posts}` set iscover='{$value}' where id={$postid} and fid={$fid}";
					$mysql->db_query($sql);	
					
					return true;
				}
			break;
			
			case "lockPost":
				if(empty($tid)){
					return "没有选择帖子。";
				}
				else{
					$sql = "update `{bbs_topics}` set islock='{$value}' where id={$tid} and fid={$fid}";
					$mysql->db_query($sql);
						
					return true;
				}
			break;
		
			case "topPost":
				
				if(empty($tid)){
					return "没有选择帖子。";
				}
				else{
					$sql = "update `{bbs_topics}` set istop='{$value}' where id={$tid} and fid={$fid}";
					$mysql->db_query($sql);
					
					return true;
				}
			break;
		
			case "alltopPost":
				
				if(empty($tid)){
					return "没有选择帖子。";
				}
				else{
					$sql = "update `{bbs_topics}` set isalltop='{$value}' where id={$tid} and fid={$fid}";
					
					$mysql->db_query($sql);
					
					return true;
				}
			break;
		
			case "goodPost":
				
				if(empty($tid)){
					return "没有选择帖子。";
				}else{
					$sql = "update `{bbs_topics}` set isgood='{$value}' where id={$tid} and fid={$fid}";
					$mysql->db_query($sql);
					//updateCredits($topic_row['userid'], 'goodvar');
					return true;
				}
					
			break;
		
			case "upPost":
				
				if(empty($tid)){
					return "没有选择帖子。";
				}
				else{
					$sql = "update `{bbs_topics}` set ordertime='".time()."' where id={$tid} and fid={$fid}";
					$mysql->db_query($sql);
					
					return true;
				}
			break;
		
			case "stampPost":
				if(empty($tid)){
					return "没有选择帖子。";
				}
				else{
					$sql = "update `{bbs_topics}` set stamp='{$value}' where id={$tid} and fid={$fid}";
					$mysql->db_query($sql);
					
					return true;
				}
				
			break;
		
			case "highlightPost":
				$color=$data['highlight']['fontC'];
				$isb = $data['highlight']['fontB'];
				$isi=  $data['highlight']['fontI'];
				$isu = $data['highlight']['fontU'];
				
				$hlstr='';
				if(!empty($color) || $isb || $isi || $isu){
					$hlstr="{$color},{$isb},{$isi},{$isu}";
				}
				if(empty($tid)){
					return "没有选择帖子。";
				}
				else{
					$sql = "update `{bbs_topics}` set highlight='{$hlstr}' where id={$tid} and fid={$fid}";
					$mysql->db_query($sql);
					
					return true;
				}
			break;
			
			
			case "verify":
					$sql = "update `{bbs_topics}` set highlight='{$hlstr}' where id={$tid} and fid={$fid}";
					$mysql->db_query($sql);
					
					return true;
		
		/*
			case "saveforumdetails":
				try{
					$forum['rules']=strFilter($_POST['rules']);
					$fid=numFilter($_GET['fid']);
					$db->row_update("forums",$forum,"id={$fid}");
					cacheForum();
					succeedFlag();
				}catch(Exception $e){
					echo($e);
				}
			break;
		*/
		
			case "dotopics":
				try{
					$postaction=$_POST['postaction'];
					$tids=$_POST['tids'];
					if(empty($tids)){
						echo("没有选中帖子。");
						return;
					}
					if(is_array($tids)) {
						$tidstr=implode(",",$tids);
						switch($postaction){
							
							case "delPost":
								$db->row_delete("posts","tid in ({$tidstr}) and fid={$fid}");
								$db->row_delete("topics","id in ({$tidstr}) and fid={$fid}");
								succeedFlag();
							break;
							
							case "movePost":
								$movetofid=numFilter($_POST['movetofid']);
								$post['fid']=$movetofid;
								$db->row_update("posts",$post,"tid in ({$tidstr}) and fid={$fid}");
								$topic['fid']=$movetofid;
								$db->row_update("topics",$topic,"id in ({$tidstr}) and fid={$fid}");
								succeedFlag();
							break;	
							
							case "coverPost":
							case "coverPost_":
								$v=($postaction=='coverPost'?1:0);
								$post['iscover']=$v;
								$db->row_update("posts",$post,"tid in ({$tidstr}) and istopic=1 and fid={$fid}");
								succeedFlag();
							break;
							
							case "lockPost":
							case "lockPost_":
								$v=($postaction=='lockPost'?1:0);
								$topic['islock']=$v;
								$db->row_update("topics",$topic,"id in ({$tidstr}) and fid={$fid}");
								succeedFlag();
							break;
		
							case "topPost":
							case "topPost_":
								$v=($postaction=='topPost'?1:0);
								$topic['istop']=$v;
								$db->row_update("topics",$topic,"id in ({$tidstr}) and fid={$fid}");
								succeedFlag();
							break;
		
							case "alltopPost":
							case "alltopPost_":
								$v=($postaction=='alltopPost'?1:0);
								$topic['isalltop']=$v;
								$db->row_update("topics",$topic,"id in ({$tidstr}) and fid={$fid}");
								succeedFlag();
							break;
		
							case "goodPost":
							case "goodPost_":
								$v=($postaction=='goodPost'?1:0);
								$topic['isgood']=$v;
								$db->row_update("topics",$topic,"id in ({$tidstr}) and fid={$fid}");
								succeedFlag();
							break;
		
							case "upPost":
								$topic['ordertime']=time();
								$db->row_update("topics",$topic,"id in ({$tidstr}) and fid={$fid}");
								succeedFlag();
							break;
		
							case "stampPost":
								$v=numFilter($_POST['stampid']);
								$topic['stamp']=$v;
								$db->row_update("topics",$topic,"id in ({$tidstr}) and fid={$fid}");
								succeedFlag();
							break;
							
							case "highlightPost":
								$color=$_POST['highlightfontC'];
								$isb=intval($_POST['highlightfontB']);
								$isi=intval($_POST['highlightfontI']);
								$isu=intval($_POST['highlightfontU']);
								$hlstr='';
								if(!empty($color) || $isb || $isi || $isu){
									$hlstr="{$color},{$isb},{$isi},{$isu}";
								}
								$topic['highlight']=$hlstr;
								$db->row_update("topics",$topic,"id in ({$tidstr}) and fid={$fid}");
								succeedFlag();
							break;
		
		
							case "restorePost":
								$topic['isrecycle']=0;
								$db->row_update("topics",$topic,"id in ({$tidstr}) and fid={$fid}");
								succeedFlag();
							break;
		
							case "delPost":
								$db->row_delete("posts","tid in ({$tidstr}) and fid={$fid}");
								$db->row_delete("topics","id in ({$tidstr}) and fid={$fid}");
								succeedFlag();
							break;
							
							case "restorePost":
								$topic['isrecycle']=0;
								$db->row_update("topics",$topic,"id in ({$tidstr}) and fid={$fid}");
								succeedFlag();
							break;
		
		
							default:
								echo"No Such Action";
							break;
						}
					}
				}catch(Exception $e){
					echo($e);
				}
			break;
		
			case "verifytopic":
				try{
					$postaction=numFilter($_POST['postaction']);
					$tids=$_POST['tids'];
					if(empty($tids)){
						echo("没有选中帖子。");
						return;
					}
					if(is_array($tids)) {
						$tidstr=implode(",",$tids);
						if($postaction==1){
							//审核通过
							$topic['verifystate'] = 0;
							$db->row_update("topics",$topic,"id in ({$tidstr}) and fid={$fid}");
							$post['verifystate'] = 0;
							$db->row_update("posts",$post,"tid in ({$tidstr}) and istopic=1 and fid={$fid}");
						}elseif($postaction==2){
							//删除
							$db->row_delete("posts","tid in ({$tidstr}) and fid={$fid}");
							$db->row_delete("topics","id in ({$tidstr}) and fid={$fid}");
						}else{
							//忽略
						}
					}
					succeedFlag();
				}catch(Exception $e){
					echo($e);
				}
			break;
		
		
			case "verifypost":
				try{
					$postaction=numFilter($_POST['postaction']);
					$ids=$_POST['ids'];
					if(empty($ids)){
						echo("没有选中帖子。");
						return;
					}
					if(is_array($ids)) {
						$idstr=implode(",",$ids);
						if($postaction==1){
							//审核通过
							$post['verifystate'] = 0;
							$db->row_update("posts",$post,"id in ({$idstr}) and fid={$fid}");
						}elseif($postaction==2){
							//删除
							$db->row_delete("posts","id in ({$idstr}) and fid={$fid}");
						}else{
							//忽略
						}
					}
					succeedFlag();
				}catch(Exception $e){
					echo($e);
				}
			break;
		
			case "postannounces":
				try{
					$anc=$_POST['anc'];
					$anc['starttime'] = empty($anc['starttime'])?0:strtotime($anc['starttime'])-$cache_settings['timeoffset']*3600;
					$anc['stoptime'] = empty($anc['stoptime'])?0:strtotime($anc['stoptime'])+24*3600-$cache_settings['timeoffset']*3600-1;
					$anc['posttime'] = time();
					$ancid=numFilter($_POST['ancid']);
					$anc['username'] = $lg['username'];
					$anc['userid'] = $lg['userid'];
					$anc['fid'] = $fid;
					$anc['targets'] = $fid;
					if(numFilter($anc['type'])==1){
						$anc['content']='';
					}
					if(empty($ancid)){
						$db->row_insert("announces",$anc);
					}else{
						$db->row_update("announces",$anc,"id={$ancid} and fid={$fid}");
					}
					writeAnnouncesCache();
					succeedFlag();
		
				}catch(Exception $e){
					echo($e);
				}
			break;
		
			case "clean":
				$sql = "delete from {bbs_posts} where tid in (select id from `{bbs_topics}` where isrecycle=1 and fid={$fid})";
				$mysql->db_query($sql);
				
				$sql = "delete from {bbs_topics} where isrecycle=1 and fid={$fid}";
				$mysql->db_query($sql);
				
				return true;
			break;
		
			case "doannounces":
				$ids=$_POST['ids'];
				$ordernum=$_POST['ordernum'];
		
				if(!empty($ids) && is_array($ids)){
					$idstr = implode(",", $ids);
					$db->row_delete("announces","id in ($idstr) and fid={$fid}");
				}
		
				if(is_array($ordernum)){
					foreach($ordernum as $key=>$order){
						$anc['ordernum']=$order;
						$db->row_update("announces",$anc,"id={$key} and fid={$fid}");
					}
				}
				writeAnnouncesCache();
				succeedFlag();
			break;
		
			
		
			default:
				return "No Such Action";
			break;
		}


	
	
	}
	
	
	
	/**
	 * 获得列表
	 *
	 * @return Array
	 */
	function GetPostsList($data = array()){
		global $mysql;
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
		$_sql = "where 1=1";
		if (isset($data['name']) && $data['name']!=""){
			$_sql .= " and p1.name like '%{$data['name']}%'";
		}
		if (isset($data['view']) && $data['view']!=""){
			$_sql .= " and p1.tid = '{$data['view']}'";
		}elseif (isset($data['tid']) && $data['tid']!=""){
			$_sql .= " and p1.tid = '{$data['tid']}'";
		}
	
		if (isset($data['fid']) && $data['fid']!=""){
			$_sql .= " and p1.fid = {$data['fid']}";
		}
		if (isset($data['lgnore']) && $data['lgnore']!=""){
			$_sql .= " and p1.site_id != {$data['lgnore']}";
		}
		$keywords = urldecode(isset($data['keywords'])?$data['keywords']:"");
		if ((!empty($keywords) && $keywords=="request" ) || !empty($keywords)){
			if (isset($_REQUEST['keywords']) && $_REQUEST['keywords']!=""){
				$_sql .= " and p1.`name` like '%".urldecode($_REQUEST['keywords'])."%'";
			}
		}
	
		$_select = "p1.*";
		$sql = "select SELECT from `{bbs_posts}` as p1 
				{$_sql}   ORDER LIMIT";
			
		$_order = "order by p1.istopic desc,p1.id asc";		
		if (isset($data['order'])){
			if ($data['order']=="hits"){
				$_order = " order by p1.hits desc";
			}
		}
		//是否显示全部的信息
		if (isset($data['limit']) ){
			$_limit = "";
			if ($data['limit'] != "all"){
				$_limit = "  limit ".$data['limit'];
			}
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order, $_limit), $sql));
		}			
				
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select,$_order, $limit), $sql));		
		$list = $list?$list:array();
		foreach ($list as $key => $value){
			$list[$key]['floor'] = $epage*($page-1)+$key+1;
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
	 * 查看单条回复
	 *
	 * @param Array $data
	 * @return Array
	 */
	public static function GetPostsOne($data = array()){
		global $mysql;
		$id = $data['id'];
		if($id == "") return self::ERROR;
		$sql = "select p1.* from `{bbs_posts}` as p1 
			where p1.id={$id}";
		return $mysql->db_fetch_array($sql);
	}
	
	/**
	 * 添加回复
	 *
	 * @param Array $data
	 * @return Array
	 */
	public static function AddPosts($data = array()){
	 	global $mysql;
		if (isset($data['tid']) && $data['tid']!=""){
			$tid = $data['tid'];
			$fid = $data['fid'];
		}else{
			return self::ERROR;
		}
		$sql = "select islock from `{bbs_topics}` where id = '{$tid}'";
		$topics_result = $mysql->db_fetch_array($sql);
		
		if($topics_result['islock']==1 && !isForumAdmin($fid)){
			return self::TOPICS_IS_LOCK;
		}
		//插入回复
		$sql = "insert into `{bbs_posts}` set `addtime` = '".time()."',`addip` = '".ip_address()."'";
		//判断审核
		$sqlc="select isverify from `{bbs_forums}` where id='".$fid."'";
		$showdirect = $mysql->db_fetch_array($sqlc);
		if($showdirect['isverify']==2){
			$showd=1;
		}else{
			$showd=0;
		}

		
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
		
		//$sql .=",`status` ='".$showd."' ";

        $mysql->db_query($sql);
    	$postid = $mysql->db_insert_id();
		
		//更新缓存
		$sql = "update `{bbs_topics}` set `last_replytime`='".time()."',`last_replyuser`='{$data['user_id']}',`last_replyusername`='{$data['username']}',posts_num =posts_num +1 where id='{$tid}'";
		$mysql->db_query($sql);
		
		//更新主题最后回复
		$sql = "update `{cache}` set `bbs_posts_num`=bbs_posts_num+1,`bbs_today_posts`=bbs_today_posts+1 where date = '".date("Y-m-d",time())."'";
		$mysql->db_query($sql);
		
		//更新版块信息 
		$sql = "update `{bbs_forums}` set today_num=today_num+1,posts_num=posts_num+1,last_postname='{$data['name']}',last_postid='{$postid}',last_postuser='{$data['user_id']}',last_postusername='{$data['username']}',last_posttime='".time()."' where id={$fid}";
		
		$mysql->db_query($sql);
		return true;
	}
	 
	 
	/**
	 * 修改主题
	 * @param Array $data(name,type，style)
	 * @return Array
	 */
	public static function UpdatePosts($data = array()){
		global $mysql;
		$sql = "update `{bbs_posts}` set `edittime` = '".time()."'";
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
		$sql .= " where id='{$data['id']}'";
		$mysql->db_query($sql);
		
        return $mysql->db_query($sql);
	}
	 
	 /**
	 * 删除回帖
	 *
	 * @param Array $data
	 * @return Array
	 */
	function DeletePosts($data=array()){
		global $mysql;
		$id = isset($data["postid"])?$data["postid"]:"";
		$fid = isset($data["fid"])?$data["fid"]:"";
		$sql = "delete from `{bbs_posts}` where id = '{$id}' and fid='{$fid}'";
		return $mysql->db_query($sql);
	}
	
	 
	
	public static function GetOne($data = array()){
		global $mysql;
		$code = empty($data['code'])?"zixun":$data['code'];
		$id = $data['id'];
		if($code == "" || $id == "") return self::ERROR;
		$click = isset($data['click'])?$data['click']:"";
		if ($click){
			$sql = "update  {zixun} set hits=hits+1 where id=$id";
			$mysql->db_query($sql);
		}
		$fields_table = $code."_fields";
		$id = $data['id'];
		$sql = "select p1.*,p2.*,p3.name as site_name,p4.username from {zixun} as p1 
				left join {".$fields_table."} as p2 on p1.id=p2.aid 
				left join {site} as p3 on p1.site_id=p3.site_id 
				left join {user} as p4 on p4.user_id=p1.user_id 
				where p1.id=$id
				";
		return $mysql->db_fetch_array($sql);
	}
	
	/**
	 * 添加
	 *
	 * @param Array $result
	 * @return Boolen
	 */
	function Add($result = array()){
		global $mysql;
		$data = $result['data'];
		$fields = $result['fields'];
		$code = $data['code'];
        if ($data['name'] == "" || $data['code'] == "") {
            return self::ERROR;
        }
		
		unset($data['code']);
		$sql = "insert into `{zixun}` set `addtime` = '".time()."',`addip` = '".ip_address()."'";
		
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
        $mysql->db_query($sql);
    	$id = $mysql->db_insert_id();
		
		$_sql = array();
		if (count($fields)>0){
			$sql = "insert into `{zixun_fields}` set ";
			if (is_array($fields)){
				foreach ($fields as $key =>$value){
					if ($key!=""){
						$sql .= "`$key`='$value',";
					}
				}
			}
			$sql .= "aid=$id";
			$mysql->db_query($sql);
		}
		return true;
	}
	
	
	/**
	 * 修改
	 *
	 * @param Array $result
	 * @return Boolen
	 */
	function Update($result = array()){
		global $mysql;
		$data = $result['data'];
		$fields = $result['fields'];
		$code = $data['code'];
		$id = $data['id'];
        if ($data['name'] == "" || $data['code'] == "" || $data['id'] == "") {
            return self::ERROR;
        }
		
		unset($data['code']);
		$sql = "update `{zixun}` set ";
		$_sql = "";
		foreach($data as $key => $value){
			$_sql[] .= "`$key` = '$value'";
		}
		$sql .= join(",",$_sql)." where id = '$id'";
        $mysql->db_query($sql);
		
		$_sql = array();
		if (count($fields)>0){
			$sql = "update `{zixun_fields}` set ";
			if (is_array($fields)){
				foreach ($fields as $key =>$value){
					if ($key!=""){
						$sql .= "`$key`='$value',";
					}
				}
			}
			$sql .= "aid=$id where aid = '$id'";
			$mysql->db_query($sql);
		}
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
		$code = $data['code'];//用户的类型，是管理员还是普通用户
		if ($code == "")	return self::ERROR;
		
		$sql = "delete from {zixun}  where id in (".join(",",$id).")";
		$mysql->db_query($sql);
		$sql = "delete from {zixun_fields}  where aid in (".join(",",$id).")";
		$mysql->db_query($sql);
		return true;
	}
	
	public static function GetBbsCache($data=array()){
		global $mysql;
		if (isset($data['date'])){
			$date = $data['date'];
		}else{
			$date = date("Y-m-d",time());
		}
		$sql = "select * from `{cache}` where date ='{$date}'";
		$result = $mysql->db_fetch_array($sql);
		if ($result['bbs_first_visit']<=0){
			//获取最高的帖子数
			$sql = "select bbs_today_topics from `{cache}` order by bbs_today_topics desc";
			$result = $mysql->db_fetch_array($sql);
			$bbs_most_topics =  ($result!=false  && $result['bbs_today_topics']!="")?$result['bbs_today_topics']:0;
			
			//获取最高的帖子回复数
			$sql = "select bbs_today_posts from `{cache}` order by bbs_today_posts desc";
			$result = $mysql->db_fetch_array($sql);
			$bbs_most_posts =  ($result!=false  && $result['bbs_today_posts']!="")?$result['bbs_today_posts']:0;
			
			//获取帖子总数
			$sql = "select count(*) as num from `{bbs_topics}` ";
			$result = $mysql->db_fetch_array($sql);
			$bbs_topics_num =  ($result!=false  && $result['num']!="")?$result['num']:0;
			
			//获取回复总数
			$sql = "select count(*) as num from `{bbs_posts}` ";
			$result = $mysql->db_fetch_array($sql);
			$bbs_posts_num =  ($result!=false  && $result['num']!="")?$result['num']:0;
			
			
			//获取昨天的帖子数和回复数
			$ydate = date("Y-m-d",time() - 60*60*24);
			$sql = "select * from `{cache}` where date ='{$ydate}'";
			$result = $mysql->db_fetch_array($sql);
			$bbs_yesterday_topics =  ($result!=false && $result['bbs_today_topics']!="")?$result['bbs_today_topics']:0;
			$bbs_yesterday_posts =  ($result!=false  && $result['bbs_today_posts']!="")?$result['bbs_today_posts']:0;
			
			//更新网站的论坛基本缓存
			$sql = "update `{cache}` set  `bbs_first_visit`='".time()."',`bbs_topics_num` = '{$bbs_topics_num}', `bbs_posts_num` = '{$bbs_posts_num}', `bbs_today_topics` = 0, `bbs_today_posts` = 0, `bbs_yesterday_topics` = {$bbs_yesterday_topics}, `bbs_yesterday_posts` = {$bbs_yesterday_posts}, `bbs_most_topics` = {$bbs_most_topics}, `bbs_most_posts` = {$bbs_most_posts} where `date` = '{$date}' ";
			$mysql->db_query($sql);
			
			//更新所有版块的帖子信息todaynum  topicsnum  postsnum  
			$sql = "select id from `{bbs_forums}` ";
			$result = $mysql -> db_fetch_arrays($sql);
			foreach ($result as $key => $value){
				//获得版块总的条数
				$_sql = "select count(*) as num from {bbs_topics} where fid = '{$value['id']}'";
				$_result = $mysql ->  db_fetch_array($_sql);
				$topicsnum = $_result['num'];
				
				//获得回复总的条数
				$_sql = "select count(*) as num from {bbs_posts} where fid = '{$value['id']}' and istopic=0";
				$_result = $mysql ->  db_fetch_array($_sql);
				$postsnum = $_result['num'];
				
				$sql = "update `{bbs_forums}` set  `today_num`=0,`topics_num` = '{$topicsnum}', `posts_num` = '{$postsnum}' where `id` = '{$value['id']}' ";
				$mysql->db_query($sql);
			}
			
			$sql = "select * from `{cache}` where date ='{$date}'";
			$result = $mysql->db_fetch_array($sql);
		}
		return $result;
	}
	
	//是否版块管理员
	function IsForumAdmin($fid){
		global $_G;
		$type_id = $_G['user_result']['type_id'];
		if($type_id == 1 ){
			return true;
		}
		if($lg['groupid']==GROUP_FORUMADMIN && stristr($cache_forums[$fid]['admins'].$cache_forums[$fid]['padmins'],"|{$lg['username']}|")){
			return true;
		}
		return false;
	}
	
	function GetAdmins($admins){
		if(empty($admins)){
			return "设置版主";
		}else{
			$arr=array();
			foreach(explode("|",$admins) as $key=>$value){
				if(!empty($value)){
					array_push($arr,$value);
				}
			}
			$res=$arr[0];
			if(count($arr)>1){
				$res.='...';
			}
			if(empty($res)){
				$res="设置版主";
			}else{
				$res="<span title=\"".implode(",",$arr)."\">{$res}</span>";
			}
			return $res;
		}
	}
}
?>