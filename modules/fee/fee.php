<?
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问
check_rank("fee_".$_t);//检查权限

require_once 'fee.class.php';


$_A['list_purview'] = array("fee"=>array("费用管理"=>array("fee"=>"费用管理")));//权限
$_A['list_name'] = $_A['module_result']['name'];
$_A['list_menu'] = "";

	print_r($_REQUEST);
?>