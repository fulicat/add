<?php
/**
 *
 * @name           织梦采集侠
 * @version        V2.0 2011年3月15日 23:00 qjpemail版主 $
 * @copyright      Copyright (c) 2011，织梦采集侠，dede版主.
 * @license        商业源码，用于其他商业目的是不受欢迎的
 */
 
if(!defined('DEDEINC')) exit('Request Error!');
	
function lib_robot(&$ctag,&$refObj)
{
	global $cfg_cmsurl;
	$copyright = $ctag->GetAtt('copyright');
	if(preg_match('/qjpemail/',$copyright))
	{	
		$jsvar = "\r\n";
		$jsvar .= "<script type=\"text/javascript\">\r\n";
		$jsvar .= "var cjxhost=\"$cfg_cmsurl\";\r\n";
        $jsvar .= "</script>\r\n";
		$jsvar .= '<script type="text/javascript" src="'.$cfg_cmsurl.'/Plugins/apps/CaiJiXia/cjx.js"></script>';
		$jsvar .= "\r\n";
	}else
	{
		$jsvar = '<script type="text/javascript">alert("\u667A\u80FD\u91C7\u96C6\u6A21\u5757\u5F02\u5E38\uFF0C\u8BF7\u68C0\u67E5\u8C03\u7528\u4EE3\u7801\u662F\u5426\u6B63\u786E\uFF0C\u6216\u662F\u5426\u4F7F\u7528\u4E86\u975E\u6CD5\u7248\u672C");</script>';
	}
	return $jsvar;
}
?>