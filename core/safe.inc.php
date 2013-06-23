<?php
/******************************
 * $File: safe.php
 * $Description: 数据处理安全检查
 * $Author: QQ134716
 * $Time:2012-03-09
 * $Update:None 
 * $UpdateDate:None 
******************************/

/* 检查和转义字符 */
function safe_str($str){
	if(!get_magic_quotes_gpc())	{
		if( is_array($str) ) {
			foreach($str as $key => $value) {
				$str[$key] = safe_str($value);
			}
		}else{
			$str = addslashes($str);
		}
	}
	return $str;
}

$request_uri = explode("?",$_SERVER['REQUEST_URI']);
if(isset($request_uri[1])){
	$rewrite_url = explode("&",$request_uri[1]);
	foreach ($rewrite_url as $key => $value){
		$_value = explode("=",$value);
		if (isset($_value[1])){
		$_REQUEST[$_value[0]] = addslashes($_value[1]);
		}
	}
}

foreach(array('_GET','_POST','_COOKIE','_REQUEST') as $key) {
	if (isset($$key)){
		foreach($$key as $_key => $_value){
			$$key[$_key] = safe_str($_value);
		}
	}
	
}
/* 上传文件的检查 */
function safe_file(){
	$not_allow_file = "php|asp|jsp|aspx|cgi|php3|shtm|html|htm|shtml";
	foreach ($_FILES as $key=>$value){
		$_name = $_FILES[$key]['name'];
		if (is_array($_name)){
			foreach($_name as $key){
				if ( !empty($key) && (eregi("\.(".$not_allow_file.")$",$key) || !ereg("\.",$key)) ){
					//die("不允许上传的类型");		
				}
			}
		}else{
			if ( !empty($_name) && (eregi("\.(".$not_allow_file.")$",$_name) || !ereg("\.",$_name)) ){
				//die("不允许上传的类型");		
			}
		}
	}
}
safe_file();

?>