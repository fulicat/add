<?php
/**
*新浪在线编辑器PHP版
*

**/


if($_REQUEST['action']=='upload'){
	$fileType=array('jpg','gif','bmp','png');//允许上传的文件类型
	
	$upfileDir='../../../../data/upfiles/';
	$_upfileDir='../../../data/upfiles/';
	$maxSize=500; //单位：KB
	if(!in_array(strtolower(substr($_FILES['file1']['name'],-3,3)),$fileType))
		die("<script>alert('不允许上传该类型的文件！-808');window.parent.\$('divProcessing').style.display='none';history.back();</script>");
	if(strpos($_FILES['file1']['type'],'image')===false)
		die("<script>alert('不允许上传该类型的文件！');window.parent.\$('divProcessing').style.display='none';history.back();</script>");
	if($_FILES['file1']['size']> $maxSize*1024)
		die( "<script>alert('文件过大！');window.parent.\$('divProcessing').style.display='none';history.back();</script>");
	if($_FILES['file1']['error'] !=0)
		die("<script>alert('未知错误，文件上传失败！');window.parent.$('divProcessing').style.display='none';history.back();</script>");
	
	$targetFile=date('Ymd').time().substr($_FILES['file1']['name'],-4,4);
	$realFile=$upfileDir.$targetFile;
	
	if(function_exists('move_uploaded_file')){
		 move_uploaded_file($_FILES['file1']['tmp_name'],$realFile) && die("<script>window.parent.LoadIMG('$_upfileDir$targetFile');</script>");
	}
	else{
		@copy($_FILES['file1']['tmp_name'],$realFile) && die("<script>window.parent.LoadIMG('$_upfileDir$targetFile');</script>");
	}
}

?>