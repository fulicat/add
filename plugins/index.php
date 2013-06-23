<?
include ("../core/config.inc.php");
$q = !isset($_REQUEST['q'])?"":$_REQUEST['q'];
$file = "html/".$q.".inc.php";
if (file_exists($file)){
	include_once ($file);exit;
}

?>
