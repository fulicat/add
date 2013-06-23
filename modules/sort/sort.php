<?
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问
check_rank("sort_".$_A['query_type']);//检查权限

include_once("sort.class.php");

$_A['list_purview'] =  array("sort"=>array("类别管理"=>array("sort_list"=>"栏目列表","sort_new"=>"添加栏目","sort_del"=>"删除栏目")));//权限
$_A['list_name'] = $_A['module_result']['name'];
$_A['list_menu'] = "<a href='{$_A['query_url']}/new{$_A['site_url']}'>添加栏目</a> - <a href='{$_A['query_url']}{$_A['site_url']}'>栏目列表</a> ";
$_A['list_table'] = "";

/**
 * 如果类型为空的话则显示所有的文件列表
**/
if ($_A['query_type'] == "list"){
	$_A['list_title'] = "栏目列表";
	//修改状态
	if (isset($_REQUEST['id']) && isset($_REQUEST['status'])){
		$sql = "update {sort} set status='".$_REQUEST['status']."' where id = ".$_REQUEST['id'];
		$mysql->db_query($sql);	
	}
	
	if (isset($_REQUEST['keywords']) && $_REQUEST['keywords']!=""){
		$data['name'] = $_REQUEST['keywords'];
	}
		
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$data['flag_list'] = $_A['flag_list'];
	
	$result = sortClass::GetList($data);
	if (is_array($result)){
		$pages->set_data($result);
		$_A['sort_list'] = get_list($result['list']);
		$_A['showpage'] = $pages->show(3);
	}else{
		$msg = array($result);
	}
	
}

/**
 * 添加
**/
elseif ($_A['query_type'] == "new" || $_A['query_type'] == "edit" ){
	if ($_A['query_type'] == "new"){
		$_A['list_title'] = "添加栏目";
	}else{
		$_A['list_title'] = "修改栏目";
	}
	if (isset($_POST['name'])){
		//模块字段的表单
		$var = array("name","flag","pid","litpic","status","order","summary","content","updatetime","updateip");
		$data = post_var($var);
		
		//自定义字段的表单
		$fields = "";
		if ($_A['module_result']['fields']==1){
			$fields = post_fields(moduleClass::GetFieldsList(array("code"=>"sort")));
			
		}
		
		//添加表单的处理
		if ($_A['query_type'] == "new"){
			$result = sortClass::Add($data);
			if ($result>0){
				if ($_A['module_result']['fields']==1){
					$fields['id'] = $result;
					$fields['code'] = $code;
					moduleClass::AddFieldsTable($fields);//更新字段
				}
				$msg = array("添加成功");
			}else{
				$msg = array($result);
			}
		}
		//修改表单的处理
		else{
			$data['id'] = $_POST['id'];
			$result = sortClass::Update($data);
			if ($result){
				if ($_A['module_result']['fields']==1){
					$fields['id'] = $data['id'];
					$fields['code'] = $code;
					moduleClass::UpdateFieldsTable($fields);//更新字段
				}
				$msg = array("修改成功");
			}else{
				$msg = array($result);
			}
		}
		
		$user->add_log($_log,$result);//记录操作
	}else{
		
		//获取编辑的信息
		if ($_A['query_type'] == "edit"){
			$_A['sort_list'] = get_list(sortClass::GetList(array("limit"=>"all","nopid"=>$_REQUEST['id'])));
			$data['id'] = $_REQUEST['id'];
			$data['fields'] = $_A['module_result']['fields'];
			$result = sortClass::GetOne($data);
			if (is_array($result)){
				$_A['sort_result'] = $result;
			}else{
				$msg = array($result);
			}
			
		}else{
			$_A['sort_list'] = get_list(sortClass::GetList(array("limit"=>"all")));
		}
		
		//自定义字段
		if ($_A['module_result']['fields']==1){
			$result_fields = "";
			$data['code'] = $code;
			$data['result'] = $_A['sort_result'];
			$_A['show_input']  = moduleClass::GetFieldsInput($data);
		}
	}
}

/**
 * 查看
**/
elseif ($_A['query_type'] == "view"){
	$_A['sort_result'] = sortClass::GetOne(array("id"=>$_REQUEST['id']));
}
	
	
/**
 * 删除
**/
elseif ($_A['query_type'] == "del"){
	$id = $_REQUEST['id'];
	$result = sortClass::Delete(array("id"=>$id));
	if ($result !== true){
		$msg = array($result);
	}else{
		//自定义字段
		if ($_A['module_result']['fields']==1){
			$data['id'] = $id;
			$data['code'] = "sort";
			moduleClass::DeleteFieldsTable($data);
		}
		$msg = array("删除成功");
	}
	$user->add_log($_log,$result);//记录操作
}



//防止乱操作
else{
	$msg = array("输入有误，请不要乱操作","",$url);
}
	



function get_list($result){
	$_result = "";
	foreach($result as $key => $value){
		if ($value['pid']==0){
			$_result[$i] = $value;
			$_result[$i]['aname'] = "<b>".$value['name']."</b>";
			$i++;
			foreach($result as $_key => $_value){
				if ($_value['pid']==$value['id']){
					$_result[$i] = $_value;
					$_result[$i]['aname'] = "- ".$_value['name'];
					$i++;
					foreach($result as $__key => $__value){
						if ($__value['pid']==$_value['id']){
							$_result[$i] = $__value;
							$_result[$i]['aname'] = "-- ".$__value['name'];
							$i++;
							foreach($result as $___key => $___value){
								if ($___value['pid']==$__value['id']){
									$_result[$i] = $___value;
									$_result[$i]['aname'] = "--- ".$___value['name'];
									$i++;
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
?>