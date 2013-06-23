<?
/******************************
 * $File: site.php
 * $Description: 站点
 * $Author: QQ134716
 * $Time:2012-03-09
 * $Update:None 
******************************/
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问




$_A['list_name'] = "站点管理";
$_A['list_menu'] = "<a href={$_A['admin_url']}&q=site/loop{$_A['site_url']}>站点管理</a> - <a href={$_A['admin_url']}&q=site/new{$_A['site_url']}>添加站点</a> - <a href={$_A['admin_url']}&q=site{$_A['site_url']}>空闲站点</a>";





//管理员管理类型
$_A['admin_type'] = userClass::GetTypeList(array("type"=>1,"where"=>" and type_id!=1"));
foreach($_A['admin_type'] as $key => $value){
	$_A['admin_type_check'][$value['type_id']] = $value['name'];
}



/**
 * 显示所有站点
**/

if ($_A['query_class'] == "list" ){
	$_A['list_title'] = "站点列表"; 
	$_A['list_menu'] = '';
}


$template = "admin_site.html";
?>