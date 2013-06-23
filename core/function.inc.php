<?

if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问

/**
 * 获取IP地址
 */
function ip_address() {
	if(!empty($_SERVER["HTTP_CLIENT_IP"])) {
		$ip_address = $_SERVER["HTTP_CLIENT_IP"];
	}else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
		$ip_address = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
	}else if(!empty($_SERVER["REMOTE_ADDR"])){
		$ip_address = $_SERVER["REMOTE_ADDR"];
	}else{
		$ip_address = '';
	}
	return $ip_address;
}

function get_module_info ($module,$module_dir=""){
	$var = array("code","name","version","description","author","date","type");
	if ($module_dir=="") $module_dir = ROOT_PATH."modules/$module/";
	include ($module_dir."".$module.".info");
	foreach($var as $val){
		$result[$val] = empty($$val)?"":$$val;
	}
	return $result;
}

function editor($fname="content",$value="",$width=630,$height=460){
	require_once(ROOT_PATH ."/plugins/sinaeditor/Editor.class.php");
	$editor=new sinaEditor($fname);
	$editor->Value= $value;
	$editor->BasePath='../libs';
	$editor->Height= $height;
	$editor->Width=$width;
	$editor->AutoSave=false;
	return  $editor->Create();
}


function mk_dir($dir,$dir_perms=0775){
	/* 循环创建目录 */
	if (DIRECTORY_SEPARATOR!='/') {
		$dir = str_replace('\\','/', $dir);
	}
	
	
	if (is_dir($dir)){
		return true;
	}
	
	if (@ mkdir($dir, $dir_perms)){
		return true;
	}

	if (!mk_dir(dirname($dir))){
		return false;
	}
	
	return mkdir($dir, $dir_perms);
	
}
function mkdirs($path, $mode = 0777){ 
	$dirs = explode('/',$path); 
	$pos = strrpos($path, "."); 
	if ($pos === false) { 
		$subamount=0; 
	} 
	else { 
		$subamount=1; 
	} 

	for ($c=0;$c < count($dirs) - $subamount; $c++) { 
		$path=""; 
			for ($cc=0; $cc <= $c; $cc++) { 
			$path.=$dirs[$cc].'/'; 
			} 
		if (!file_exists($path)) { 
			mkdir($path,$mode); 
		} 
	} 	
}


function mk_file($dir,$contents){
	$dirs = explode('/',$dir);
	if($dirs[0]==""){
		$dir = substr($dir,1);
	}
	mk_dir(dirname($dir));
	@chmod($dir, 0777);
	if (!($fd = @fopen($dir, 'wb'))) {
		$_tmp_file = $dir . DIRECTORY_SEPARATOR . uniqid('wrt');
		if (!($fd = @fopen($_tmp_file, 'wb'))) {
			trigger_error("系统无法写入文件'$_tmp_file'");
			return false;
		}
	}
	fwrite($fd, $contents);
	fclose($fd);
	@chmod($dir, 0777);
	return true;
}


function get_file($dir,$type='dir'){
	$result = "";
	if (is_dir($dir)) {
		if ($dh = opendir($dir)){
			while (($file = readdir($dh)) !== false){
				$_file = $dir."/".$file;
				if ($file !="." && $file != ".." && filetype($_file)==$type ){
					$result[] = $file;
				}
			}
			closedir($dh);
		}
	}
	return $result;
}
//删除指定目录（文件夹）中的所有文件函数 
function del_file($dir) { 
	if (is_dir($dir)) { 
		$dh=opendir($dir);//打开目录 //列出目录中的所有文件并去掉 . 和 .. 
		while (false !== ( $file = readdir ($dh))) { 
			if($file!="." && $file!="..") {
				$fullpath=$dir."/".$file; 
				if(!is_dir($fullpath)) { 
					unlink($fullpath);
				} else { 
					del_file($fullpath); 
				} 
			}
		}
		closedir($dh); 
	} 
} 
function read_file($filename) {
        if ( file_exists($filename) && is_readable($filename) && ($fd = @fopen($filename, 'rb')) ) {
            $contents = '';
            while (!feof($fd)) {
                $contents .= fread($fd, 8192);
            }
            fclose($fd);
            return $contents;
        } else {
            return false;
        }
    }
	
	
function fields_input($input=""){
	$_input = array("text"=>"单行文本",
	"multitext"=>"多行文本",
	"password"=>"密码类型",
	"htmltext"=>"HTML文本",
	"datetime"=>"时间类型",
	"image"=>"图片类型",
	"color"=>"颜色类型",
	"annex"=>"附件类型",
	"site"=>"站点栏目",
	"year"=>"年代选择",
	"select"=>"select下拉框",
	"checkbox"=>"checkbox多选框",
	"radio"=>"radio单选框");
	if ($input==""){
		return $_input;
	}else{
		return $_input['input'];
	}
}
function fields_type($type=""){
	$_type = array("varchar"=>"字符串[varchar]",
	"int"=>"数值型[int]",
	"text"=>"一般文本[text]",
	"mediumtext"=>"中型文本[mediumtext]",
	"longtext"=>"大型文本[longtext]");
	if ($type==""){
		return $_type;
	}else{
		return $_type['type'];
	}
}

function UpfileImage($data = array()){
	$error = "";
	
	//文件名
	$file = isset($data['file'])?$data['file']:"";
	if ($file=="") $error = -1;;
	
	$upfileDir = isset($data['upfile_dir'])?$data['upfile_dir']:"/data/upfiles/images/";//允许上传的文件类型
	$fileType = isset($data['upfile_type'])?$data['upfile_type']:array('jpg','gif','bmp','png');//上传图片
	$maxSize = isset($data['upfile_size'])?$data['upfile_size']:"300";//单位：KB
	$newDir = ROOT_PATH."/".$upfileDir;
	
	$cutWidth = isset($data['upfile_width'])?$data['upfile_width']:"300";//截图的宽
	$cutHeight = isset($data['upfile_height'])?$data['upfile_height']:"300";//截图的高
	$cutType = isset($data['cuttype'])?$data['cuttype']:"";//截图的类型
	$min_width = 10;//截图最小的宽度
	$min_height = 10;//截图最小的高度
	
	//判断是不是数组
	if (is_array($_FILES[$file]['name'])){
		$_result = array();
		foreach($_FILES[$file]['name'] as $i => $value){
			
			if ($value!=""){
				if ($_FILES[$file]['size'][$i]==0)	$error = -1;//文件不存在
				if(!in_array(strtolower(substr($_FILES[$file]['name'][$i],-3,3)),$fileType)) $error = -1;
				if(strpos($_FILES[$file]['type'][$i],'image')===false) $error = -1;
				if($_FILES[$file]['size'][$i] > $maxSize*1024) $error = -2;
				if($_FILES[$file]['error'][$i] !=0 ) $error = -3;
			
				//mkdirs($upfileDir,777);//创建文件夹
				
				$newFile = md5(time().rand(1,9)).$i.substr($_FILES[$file]['name'][$i],-4,4);//新文件名
				$oldFile = $_FILES[$file]['name'][$i];//旧文件名
				$allFile = $newDir.$newFile; //
				
				if(function_exists('move_uploaded_file')){
					$result = move_uploaded_file($_FILES[$file]['tmp_name'][$i],$allFile);
					
				}else{
					@copy($_FILES[$file]['tmp_name'][$i],$allFile);
				}
				
				/*是否截图 开始*/
				if ($cutType==1){
					/*获取图片的信息 开始*/
					$pic_info = @getimagesize($allFile);
					if($pic_info[0]<$min_width || $pic_info[1]<$min_heigth){
						$error = -4;
					}else{
						//获取图片要压缩的比例
						$re_scal = 1;
						if($pic_info[0]>$cutWidth){
							$re_scal = ($cutWidth / $pic_info[0]);
						}elseif($pic_info[1]>$cutHeight){
							$re_scal = ($cutHeight / $pic_info[1]);
						}
						
						if ($re_scal>0){
							$re_width = round($pic_info[0] * $re_scal);
							$re_height = round($pic_info[1] * $re_scal);
						}else{
							$re_width = $cutWidth;
							$re_height = $cutHeight;
						}
						
						/*创建空图象 开始*/
						$new_pic = @imagecreatetruecolor($re_width,$re_height);
						if(!$new_pic){
							$error = -4;
						}else{
							//复制图象
							if(function_exists("file_get_contents")){
								$src = file_get_contents($allFile);
							}else{
								$handle = fopen ($allFile, "r");
								while (!feof ($handle)){
									$src .= fgets($fd, 4096);
								}
								fclose ($handle);
							}
							
							/*输入文件 开始*/
							if(!empty($src)){
								$pic_creat = @ImageCreateFromString($src);
								if(!@imagecopyresampled($new_pic,$pic_creat,0,0,0,0,$re_width,$re_height,$pic_info[0],$pic_info[1])){
									$error = -5;
								}else{
									//输出文件
									$out_file = '';
									switch($pic_info['mime']){
										case 'image/jpeg':
												$out_file = @imagejpeg($new_pic,$allFile);
												break;
										case 'image/gif':
												$out_file = @imagegif($new_pic,$allFile);
												break;
										case 'image/png':
												$out_file = @imagepng($new_pic,$allFile);
												break;
										case 'image/wbmp':
												$out_file = @imagewbmp($new_pic,$allFile);
												break;
										default:
											$error = 6;
											break;
									}
								}
							}
							/*输入文件 结束*/
						}
						/*创建空图象 结束*/
					}
					/*获取图片的信息 开始*/
				}
				/*是否截图 结束*/
				if ($error==""){
					$_result[] = $upfileDir.$newFile;
				}
			}
		}
				
		return $_result;
	}
	else{
	
	
	}
}


/**
 * 上传图片
 *
 * @return Boolean
 */
function upload($file,$type="",$fileType="",$upfileDir="",$maxSize=""){
	
	if ($_FILES[$file]['size']==0)	return 0;
	if ($fileType=="")	$fileType=array('jpg','gif','bmp','png');//允许上传的文件类型
	if ($upfileDir=="")	$upfileDir='/data/upfiles/litpics/'; //上传图片
	if ($maxSize=="") $maxSize=300; //单位：KB
	
	if(!in_array(strtolower(substr($_FILES[$file]['name'],-3,3)),$fileType)) return -1;
	if(strpos($_FILES[$file]['type'],'image')===false) return -1;
	if($_FILES[$file]['size']> $maxSize*1024) return -2;
	if($_FILES[$file]['error'] !=0 ) return -3;
	
	$newDir = dirname(__FILE__)."/..".$upfileDir;
	
	$_upfileDir = explode("/",$upfileDir);
	foreach ($_upfileDir as $key => $value){
		if ($value!="")
		$fileDir[] = $value;
	}
	/*
	foreach ($fileDir as $key => $value){
		$_fileDir = "";
		for($i=0;$i<=$key;$i++){
			$_fileDir .= $fileDir[$i]."/"; 
		}
		if (!is_dir("../".$_fileDir)){
			mkdir("../".$_fileDir,0777); 
		}
	}
	*/
	$newFile=date('Ymd').time().substr($_FILES[$file]['name'],-4,4);
	$oldFile = $_FILES[$file]['name'];
	$allFile=$newDir.$newFile;
	
	if(function_exists('move_uploaded_file')){
		 $result = move_uploaded_file($_FILES[$file]['tmp_name'],$allFile);
		 return array($upfileDir.$newFile,$type,$newFile,$oldFile,$_FILES[$file]['size']);
	}else{
		@copy($_FILES[$file]['tmp_name'],$allFile);
		return array($upfileDir.$newFile,$type,$newFile,$oldFile,$_FILES[$file]['size']);
	}
}


/**
 * 检查权限
 *
 * @param Varchar $purview (表示此文件的所需权限，比如other_all)
 * @param Varchar $admin_purview (管理员的权限值)
 * @return Bollen
 */
function check_rank($purview){
	global $_G;
	$_admin_purview = empty($_SESSION['purview'])?"other_all":$_SESSION['purview'];
	
	$admin_purview = explode(",",$_admin_purview);
	$_purview = explode("_",$purview);
	
	if (in_array("other_all",$admin_purview) || $_G['user_result']['type_id']==1){
		return true;
	}else if (!in_array($purview,$admin_purview)){
		echo "<script>alert('你没有权限');location.href='/index.php?admin';</script>";exit;
	}
}

function post_maketime($name){
	
	$var = array("year","month","date","hour","min");
	foreach ($var as $val){
		$$val = !isset($_POST[$name."_".$val])?"0":$_POST[$name."_".$val];
	}
	return mktime($hour,$min,0,$month,$date,$year);

}

function post_area($nid = ""){
	$pname = $nid."procvince";
	$cname = $nid."city";
	$aname = $nid."area";
	
	if (isset($_POST[$aname]) && $_POST[$aname]!=""){
		if ($_POST[$cname]==""){
			$area = $_POST[$pname];
		}else{
			$area = $_POST[$aname];
		}
	}else{
		if (isset($_POST[$cname]) && $_POST[$cname]!=""){
			$area = $_POST[$cname];
		}else{
			$area = isset($_POST[$pname])?$_POST[$pname]:"";
		}
	}
	return  $area;
}
function post_fields($fields){
	$_fields = "";
	if (is_array($fields)){
		foreach($fields as $key => $value){
			$_fields[$value['nid']] = empty($_POST[$value['nid']])?"":$_POST[$value['nid']];
		}	
	}
	return  $_fields;
}
function post_var($var,$type=""){
	if ($type=="module"){
		$var = array("name","status","code","order","default_field","description","index_tpl","list_tpl","content_tpl","article_status","onlyone","visit_type","title_name","issent","version","author","type");
		
	}
	if (is_array($var)){
		foreach ($var as $key =>$val){
			$_val = (isset($_POST[$val]) && $_POST[$val]!="")?$_POST[$val]:"";
			if ($_val==""){
				$_val=NULL;
			}elseif (!is_array($_val) ){
				if ($val!="content"){
					$_val = nl2br($_val);
				}
			}else{
				$_val = join(",",$_val);
			}
			$result[$val] = $_val;
			
			if($val=="area"){//地区
				$result[$val] = post_area();
			}elseif($val=="flag"){//地区
				$result[$val] = !isset($_POST["flag"])?NULL:join(",",$_POST["flag"]);
			}elseif ($val=="clearlitpic"){
				if ($result["clearlitpic"]!="" && $result["clearlitpic"]==1){
					$result['litpic'] = NULL;
				}
				unset($result["clearlitpic"]);
			}elseif($val=="updatetime"){//地区
				$result[$val] = time();
			}elseif($val=="updateip"){//地区
				$result[$val] = ip_address();
			}elseif($_val == "content"){
				$result[$val] = htmlspecialchars($result[$val]);
			}
		}
		
		return $result;
	}else{
		return (!isset($_POST[$var]) || $_POST[$var]=="")?NULL:$_POST[$var];
	}
}

function  gdversion() {  
	static   $gd_version_number  = null;  
	if ( $gd_version_number  === null) {  
		ob_start();  
		phpinfo(8);  
		$module_info  = ob_get_contents();  
		ob_end_clean();  
		if (preg_match( "/\bgd\s+version\b[^\d\n\r]+?([\d\.]+)/i" ,  $module_info , $matches )) {
			 $gdversion_h  =  $matches [1]; 
		 }else {
			 $gdversion_h  = 0; 
		 } 
	 }
	return  $gdversion_h;
}
function arc_page($total,$nowindex,$url){
	$result = "<div class='hycms_pages'><ul><li><a>共".$total."页: </a></li>";
	for($i=1;$i<=$total;$i++){
		if ($i == $nowindex){
		$result.= "</li><li class='thisclass'><a href='#'>$i</a></li>";
		}else{
		$result.= "<li><a href='".format_url("$url/$i")."'>$i</a></li>";
		}
	}
	
	$result.= "</ul></div>";
	return $result;

}
function get_mktime($mktime){
	if ($mktime=="") return "";
	$dtime = trim(ereg_replace("[ ]{1,}"," ",$mktime));
	$ds = explode(" ",$dtime);
	$ymd = explode("-",$ds[0]);
	if (isset($ds[1]) && $ds[1]!=""){
		$hms = explode(":",$ds[1]);
		$mt = mktime(empty($hms[0])?0:$hms[0],!isset($hms[1])?0:$hms[1],!isset($hms[2])?0:$hms[2],!isset($ymd[1])?0:$ymd[1],!isset($ymd[2])?0:$ymd[2],!isset($ymd[0])?0:$ymd[0]);
	}else{
		$mt = mktime(0,0,0,!isset($ymd[1])?0:$ymd[1],!isset($ymd[2])?0:$ymd[2],!isset($ymd[0])?0:$ymd[0]);
	}
	
	return $mt;
}

/**
 * 格式化路径
 */
function format_url($url,$type="",$isurl="",$tplname=""){
	global $system;
	if (is_array($isurl) && $isurl[0]==1){
		return "http://".str_replace("http://","",$isurl[1]);
	}
	if ($system['con_rewrite']==1){
		$url = str_replace("?","",$url);
		$_url = explode("/",$url);
		if (!isset($_url[1])){
			$reurl = "list_".$_url[0];
			if ($type!="sitelist" && isset($_REQUEST['page'])){
				$reurl .= "_".$_REQUEST['page'];
			}
		}else{
			$reurl = "content_".$_url[0]."_".$_url[1];
			if (isset($_url[2])){
				$reurl .= "_".$_url[2];
			}
		}
		$reurl .= ".html";
		return $reurl;
	}elseif ($system['con_rewrite']==2){
		
	
	}else{
		return $url;
	}
	

}

/**
 * 格式化路径
 */
function format_tpl($tpl,$var){
	if ($tpl=="") return "";
	if (isset($var['code'])){
		$tpl = str_replace("[code]",$var['code'],$tpl);
	}
	if (isset($var['site_id'])){
		$tpl = str_replace("[site_id]",$var['site_id'],$tpl);
	}
	if (isset($var['id'])){
		$tpl = str_replace("[id]",$var['id'],$tpl);
	}
	if (isset($var['nid'])){
		$tpl = str_replace("[nid]",$var['nid'],$tpl);
	}
	$page = !isset($_REQUEST['page'])?1:$_REQUEST['page'];
	$tpl = str_replace("[page]",$page,$tpl);
	
	return trim($tpl);

}
function get_ip_place(){   
	$ip=file_get_contents("http://fw.qq.com/ipaddress");   
	$ip=str_replace('"',' ',$ip);   
	$ip2=explode("(",$ip);   
	$a=substr($ip2[1],0,-2);   
	$b=explode(",",$a);   
	return $b;   
}   
function gbk2utf8($str){
  return iconv("GBK", "UTF-8", $str);
}


function maketime($name){
	
	$var = array("year","month","date","hour","min");
	foreach ($var as $val){
		$$val = !isset($_POST[$name."_".$val])?"0":$_POST[$name."_".$val];
	}
	return mktime($hour,$min,0,$month,$date,$year);

}

/**
 * 获取中文首个拼音字母
 * @param $input 中文字符 eg:中国
 */
function getCnFirstChar($input){

	$arr_input = array();
	$input = trim($input);
	$len = strlen($input);
	$str = '';
	for ($i = 0; $i < $len; $i++) {

		$str .= substr($input, $i, 1);
		if ($i % 2) {
			if ($str) {
				array_push($arr_input, $str);
			}
			$str = '';
		}
	}
	if(empty ($arr_input)) {
		return '';
	}

	$word = '';
	foreach ($arr_input as $input) {

		$code = '';
		$asc = ord(substr($input, 0, 1)) * 256 + ord(substr($input, 1, 1)) - 65536;
		if($asc>=-20319 and $asc<=-20284) $code = "A";
		if($asc>=-20283 and $asc<=-19776) $code = "B";
		if($asc>=-19775 and $asc<=-19219) $code = "C";
		if($asc>=-19218 and $asc<=-18711) $code = "D";
		if($asc>=-18710 and $asc<=-18527) $code = "E";
		if($asc>=-18526 and $asc<=-18240) $code = "F";
		if($asc>=-18239 and $asc<=-17923) $code = "G";
		if($asc>=-17922 and $asc<=-17418) $code = "H";
		if($asc>=-17417 and $asc<=-16475) $code = "J";
		if($asc>=-16474 and $asc<=-16213) $code = "K";
		if($asc>=-16212 and $asc<=-15641) $code = "L";
		if($asc>=-15640 and $asc<=-15166) $code = "M";
		if($asc>=-15165 and $asc<=-14923) $code = "N";
		if($asc>=-14922 and $asc<=-14915) $code = "O";
		if($asc>=-14914 and $asc<=-14631) $code = "P";
		if($asc>=-14630 and $asc<=-14150) $code = "Q";
		if($asc>=-14149 and $asc<=-14091) $code = "R";
		if($asc>=-14090 and $asc<=-13319) $code = "S";
		if($asc>=-13318 and $asc<=-12839) $code = "T";
		if($asc>=-12838 and $asc<=-12557) $code = "W";
		if($asc>=-12556 and $asc<=-11848) $code = "X";
		if($asc>=-11847 and $asc<=-11056) $code = "Y";
		if($asc>=-11055 and $asc<=-10247) $code = "Z";

		$word .= $code;
	}
	
	return strtoupper($word);
}

//导出excel格式表
function exportData($filename,$title,$data){
	header("Content-type: application/vnd.ms-excel");
	header("Content-disposition: attachment; filename="  . $filename . ".xls");
	if (is_array($title)){
		foreach ($title as $key => $value){
			echo $value."\t";
		}
	}
	echo "\n";
	if (is_array($data)){
		foreach ($data as $key => $value){
			foreach ($value as $_key => $_value){
				echo $_value."\t";
			}
			echo "\n";
		}
	}
}


/**
 * 获取属性的列表
 *
 * @param Array $fields_id 
 * @param Array $order 
 * @return Integer
 */
function getFlagName($data = array()){
	$result = $data['result'];
	$flag = $data['flag'];
	$_flag = "";
	if (is_array($result)){
		foreach($result as $key => $value){
			$flagres[$value['nid']] = $value['name'];
		}
		$flags = explode(",",$flag);
		foreach ($flags as $_key => $_value){
			if ($_value!=""){
				$_flag .= $flagres[$_value]." ";
			}
		}
	}
	return $_flag;
}



/**
 * 将ID转化为URL格式
 *
 * @param Integer $goods_id
 * @param String(eg:goods_vps/goods_hire) $goods_type
 * @return String
 */
function Key2Url($key,$type) {
	return  base64_encode ($type .$key ) ;
}

/**
 * 将URL格式的字符串转化为ID
 *
 * @param String $str
 * @return Array(goods_type, goods_id)
 */
function Url2Key($key,$type) {
	$key = base64_decode ( urldecode ( $key ) );
	return explode ($type, $key );
}
/**
 * 加密激活链接
 * @param $id
 * @return String
 */
 function EnActionCode ($id,$key) {
	
	return base64_encode((string)($id * 3 + $key));
}

/**
 * 解密激活链接
 * @param $id
 * @return String
 */
 function DeActionCode ($id,$key) {
	return (base64_decode($id) - $key) / 3;
}

function RegEmailMsg($data = array()){
	global $mysql;
	$user_id = $data['user_id'];
	$username = $data['username'];
	$webname = $data['webname'];
	$email = $data['email'];
	$query_url = isset($data['query_url'])?$data['query_url']:"action/active";
	$active_id = urlencode(authcode($user_id.",".time(),"ENCODE"));
	$_url = "http://{$_SERVER['HTTP_HOST']}/index.php?user&q={$query_url}&id={$active_id}";
	$user_url = "http://{$_SERVER['HTTP_HOST']}/index.php?user";
	$send_email_msg = '
	<div style="background: url(http://'.$_SERVER['HTTP_HOST'].'/data/images/base/email_bg.png) no-repeat left bottom; font-size:14px; width: 588px; ">
	<div style="padding: 10px 0px; background: url(http://'.$_SERVER['HTTP_HOST'].'/data/images/base/email_button.png)  no-repeat ">
		<h1 style="padding: 0px 15px; margin: 0px; overflow: hidden; height: 48px;">
			<a title="'.$webname.'用户中心" href="http://'.$_SERVER['HTTP_HOST'].'/index.php?user" target="_blank" swaped="true">
			<img style="border-width: 0px; padding: 0px; margin: 0px;" alt="'.$webname.'用户中心" src="http://'.$_SERVER['HTTP_HOST'].'/data/images/base/email_logo.png" height="48" width="208">		</a>
		</h1>
		<div style="padding: 0px 20px; overflow: hidden; line-height: 40px; height: 50px; text-align: right;"> </div>
		<div style="padding: 2px 20px 30px;">
			<p>亲爱的 <span style="color: rgb(196, 0, 0);">'.$username.'</span> , 您好！</p>
			<p>感谢您注册'.$webname.'，您登录的邮箱帐号为 <strong style="font-size: 16px;">'.$email.'</strong></p>
			<p>请点击下面的链接即可完成激活。</p>
			<p style="overflow: hidden; width: 100%; word-wrap: break-word;"><a title="点击完成注册" href="'.$_url.'" target="_blank" swaped="true">'.$_url.'</a>
			<br><span style="color: rgb(153, 153, 153);">(如果链接无法点击，请将它拷贝到浏览器的地址栏中)</span></p>

			<p>感谢您光临'.$webname.'用户中心，我们的宗旨：为您提供优秀的产品和优质的服务！ <br>现在就登录吧!
			<a title="点击登录'.$webname.'用户中心" style="color: rgb(15, 136, 221);" href="http://'.$_SERVER['HTTP_HOST'].'/index.php?user" target="_blank" swaped="true">http://'.$_SERVER['HTTP_HOST'].'/index.php?user</a> 
			</p>
			<p style="text-align: right;"><br>'.$webname.'用户中心 敬启</p>
			<p><br>此为自动发送邮件，请勿直接回复！如您有任何疑问，请点击<a title="点击联系我们" style="color: rgb(15, 136, 221);" href="http://'.$_SERVER['HTTP_HOST'].'/help/index.html" target="_blank" >联系我们&gt;&gt;</a></p>
		</div>
	</div>
</div>
		';
	return $send_email_msg;

}

function GetpwdMsg($data = array()){
	global $mysql;
	$user_id = $data['user_id'];
	$username = $data['username'];
	$webname = $data['webname'];
	$email = $data['email'];
	$active_id = urlencode(authcode($user_id.",".time(),"ENCODE"));
	$_url = "http://{$_SERVER['HTTP_HOST']}/index.php?user&q=action/updatepwd&id={$active_id}";
	$user_url = "http://{$_SERVER['HTTP_HOST']}/index.php?user";
	$send_email_msg = '
	<div style="background: url(http://'.$_SERVER['HTTP_HOST'].'/data/images/base/email_bg.png) no-repeat left bottom; font-size:14px; width: 588px; ">
	<div style="padding: 10px 0px; background: url(http://'.$_SERVER['HTTP_HOST'].'/data/images/base/email_button.png)  no-repeat ">
		<h1 style="padding: 0px 15px; margin: 0px; overflow: hidden; height: 48px;">
			<a title="'.$webname.'用户中心" href="http://'.$_SERVER['HTTP_HOST'].'/index.php?user" target="_blank" swaped="true">
			<img style="border-width: 0px; padding: 0px; margin: 0px;" alt="'.$webname.'用户中心" src="http://'.$_SERVER['HTTP_HOST'].'/data/images/base/email_logo.png" height="48" width="208">		</a>
		</h1>
		<div style="padding: 0px 20px; overflow: hidden; line-height: 40px; height: 50px; text-align: right;"> </div>
		<div style="padding: 2px 20px 30px;">
			<p>亲爱的 <span style="color: rgb(196, 0, 0);">'.$username.'</span> , 您好！</p>
			<p>请点击下面的链接重新修改密码。</p>
			<p style="overflow: hidden; width: 100%; word-wrap: break-word;"><a title="点击完成注册" href="'.$_url.'" target="_blank" swaped="true">'.$_url.'</a>
			<br><span style="color: rgb(153, 153, 153);">(如果链接无法点击，请将它拷贝到浏览器的地址栏中)</span></p>
			
			<p style="text-align: right;"><br>'.$webname.'用户中心 敬启</p>
			<p><br>此为自动发送邮件，请勿直接回复！如您有任何疑问，请点击<a title="点击联系我们" style="color: rgb(15, 136, 221);" href="http://'.$_SERVER['HTTP_HOST'].'/help/index.html" target="_blank" >联系我们&gt;&gt;</a></p>
		</div>
	</div>
</div>
		';
	return $send_email_msg;

}

//或得用户的头像
function get_avatar($data = array()) {
	$uid = isset($data['user_id'])?$data['user_id']:"";
	$size = isset($data['size'])?$data['size']:"big";
	$type = isset($data['type'])?$data['type']:"";
	
	$istrue = isset($data['istrue'])?$data['istrue']:false;
	$size = in_array($size, array('big', 'middle', 'small')) ? $size : 'big';
	$uid = abs(intval($uid));
	
	$typeadd = $type == 'real' ? '_real' : '';
	if (is_file('data/avatar/'.$uid.$typeadd."_avatar_$size.jpg")){
		if ($istrue) return true;
		return '/data/avatar/'.$uid.$typeadd."_avatar_$size.jpg";
	}else{
		if ($istrue) return false;
		return "/data/images/avatar/noavatar_{$size}.gif";
	}
}

function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
	// 动态密匙长度，相同的明文会生成不同密文就是依靠动态密匙
	$ckey_length = 4;
	// 密匙
	$key = md5($key ? $key : "dw10c20m05w18");
	// 密匙a会参与加解密
	$keya = md5(substr($key, 0, 16));
	// 密匙b会用来做数据完整性验证
	$keyb = md5(substr($key, 16, 16));
	// 密匙c用于变化生成的密文
	$keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';
	// 参与运算的密匙
	$cryptkey = $keya.md5($keya.$keyc);
	$key_length = strlen($cryptkey);
	// 明文，前10位用来保存时间戳，解密时验证数据有效性，10到26位用来保存$keyb(密匙b)，解密时会通过这个密匙验证数据完整性
	// 如果是解码的话，会从第$ckey_length位开始，因为密文前$ckey_length位保存 动态密匙，以保证解密正确
	$string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
	$string_length = strlen($string);
	$result = '';
	$box = range(0, 255);
	$rndkey = array();
	
	// 产生密匙簿
	for($i = 0; $i <= 255; $i++) {
		$rndkey[$i] = ord($cryptkey[$i % $key_length]);
	}
	
	// 用固定的算法，打乱密匙簿，增加随机性，好像很复杂，实际上对并不会增加密文的强度
	for($j = $i = 0; $i < 256; $i++) {
		$j = ($j + $box[$i] + $rndkey[$i]) % 256;
		$tmp = $box[$i];
		$box[$i] = $box[$j];
		$box[$j] = $tmp;
	}
	
	// 核心加解密部分
	for($a = $j = $i = 0; $i < $string_length; $i++) {
		$a = ($a + 1) % 256;
		$j = ($j + $box[$a]) % 256;
		$tmp = $box[$a];
		$box[$a] = $box[$j];
		$box[$j] = $tmp;
		// 从密匙簿得出密匙进行异或，再转成字符
		$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
	}
	
	
	if($operation == 'DECODE') {
		// substr($result, 0, 10) == 0 验证数据有效性
		// substr($result, 0, 10) - time() > 0 验证数据有效性
		// substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16) 验证数据完整性
		// 验证数据有效性，请看未加密明文的格式
		if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
			return substr($result, 26);
		} else {
			return '';
		}
	} else {
		// 把动态密匙保存在密文里，这也是为什么同样的明文，生产不同密文后能解密的原因
		// 因为加密后的密文可能是一些特殊字符，复制过程可能会丢失，所以用base64编码
		return $keyc.str_replace('=', '', base64_encode($result));
	}
} 



function show_pages($data = array()){
	$total= (int)$data['total'];
	$page= (int)$data['page'];
	$epage= (int)$data['epage'];
	if ($total==0){
		return "没有信息";
	}
	if($total % $epage){  
		$page_num=(int)($total / $epage)+1;} 
	else { 
		$page_num=$total / $epage; 
	}
	//判断有多少页
	if($page==""){
		$page=1;
	}
	$action = strstr($_SERVER['REQUEST_URI'],"?");
	$first_url  = "index.html".$action; 
	$up_url  = "index".($page-1).".html".$action; 
	$last_url  = "index".$page_num.".html".$action; 
	$down_url  = "index".($page+1).".html".$action; 
	
	if ($page!=1 && $page>$page_num){
		header("location:index{$page_num}.html");
	}
	
	$display = "<b>共".$total."条</b>";
	
	$display .= " {$epage}条/页<span class='page_line'>|</span>第{$page}/{$page_num}页";
	
	//第一页
	if($page==1){
		$display .= ' <span class="no_page"><font face="webdings" title="第一页">9</font></span>';
	}else{
		$display .= " <a href='{$first_url}'><font face='webdings' title='第一页'>9</font></a>";
	}
	
	//上一页
	if($page==1){
		$display .= ' <span class="no_page"><font face="webdings" title="上一页">7</font></span>';
	}else{
		$display .= " <a href='{$up_url}'><font face='webdings' title='上一页'>7</font></a>";
	}
	
	if ($page_num>5){
		if ($page<3){
			$j = 1;
			$n = 5;
		}else{
			if($page +2>$page_num){
				$j = $page_num-4;
				if ($j<=0) $j=1;
				$n = $page_num;
			}else{
				$j = $page-2;
				if ($j<=0) $j=1;
				$n =  $page+2;
			}
		}
	}else{
		$j = $page-2;
		if ($j<=0) $j=1;
		$n =  $page+2;
		if ($n>$page_num) $n=$page_num;
	}
	
	for($i=$j;$i<=$n;$i++){
		if($i==$page){
			$display .= " <span class='this_page'>{$i}</span>";
		}else{
			$display .= " <a href='index{$i}.html{$action}'>$i</a>";
		}
	}
	
	
	//下一页
	if($page==$page_num){
		$display .= ' <span class="no_page"><font face="webdings" title="下一页">8</font></span>';
	}else{
		$display .= " <a href='{$down_url}'><font face='webdings' title='下一页'>8</font></a>";
	}
	
	//最后一页
	if($page==$page_num){
		$display .= ' <span class="no_page"><font face="webdings" title="最后一页">:</font></span>';
	}else{
		$display .= " <a href='{$last_url}'><font face='webdings' title='最后一页'>:</font></a>";
	}
	$display .=' <span class="page_go">转到<input type="text" id="page_text" size="4" onkeydown="if (event.keyCode==13){location.href =\'index\'+this.value+\'.html\'}"  value="'.$page.'"  onfocus="this.select()" />页</span>';
	return $display;
}


function nltobr($string = ""){
	if($string=="") return "";
	$string = str_replace(" ","&nbsp;",$string);
	$string = nl2br($string);
	return $string;
}


//去掉相应的参数
function url_format($url, $format = ''){
	if ($url=="") return "?";
	$_url =  explode("?",$url);
	$_url_for = "";
	if (isset($_url[1]) && $_url[1]!=""){
		$request = $_url[1];
		if ($request != ""){
			$_request = explode("&",$request);
			foreach ($_request as $key => $value){
				$_value = explode("=",$value);
				if (trim($_value[0])!=$format){
					$_url_for ="&" .$value;
				}
			}
		}
		$_url_for = substr($_url_for, 1,strlen($_url_for)); 
	}
	return "?".$_url_for;
}

//获得时间天数
function get_times($data=array()){
	if (isset($data['time']) && $data['time']!=""){
		$time = $data['time'];//时间
	}elseif (isset($data['date']) && $data['date']!=""){
		$time = strtotime($data['date']);//日期
	}else{
		$time = time();//现在时间
	}
	if (isset($data['type']) && $data['type']!=""){ 
		$type = $data['type'];//时间转换类型，有day week month year
	}else{
		$type = "month";
	}
	if (isset($data['num']) && $data['num']!=""){ 
		$num = $data['num'];
	}else{
		$num = 1;
	}
	
	if ($type=="month"){
		$month = date("m",$time);
		$year = date("Y",$time);
		$_result = strtotime("$num month",$time);
		$_month = (int)date("m",$_result);
		if ($month+$num>12){
			$_num = $month+$num-12;
			$year = $year+1;
		}else{
			$_num = $month+$num;
		}
		
		if ($_num!=$_month){
		
			$_result = strtotime("-1 day",strtotime("{$year}-{$_month}-01"));
		}
	}else{
		$_result = strtotime("$num $type",$time);
	}
	if (isset($data['format']) && $data['format']!=""){ 
		return date($data['format'],$_result);
	}else{
		return $_result;
	}

}

//编码格式转换
function diconv($str, $in_charset, $out_charset = CHARSET, $ForceTable = FALSE) {
	global $_G;

	$in_charset = strtoupper($in_charset);
	$out_charset = strtoupper($out_charset);
	if($in_charset != $out_charset) {
		require_once ROOT_PATH.'core/chinese.class.php';
		$chinese = new Chinese($in_charset, $out_charset, $ForceTable);
		$strnew = $chinese->Convert($str);
		if(!$ForceTable && !$strnew && $str) {
			$chinese = new Chinese($in_charset, $out_charset, 1);
			$strnew = $chinese->Convert($str);
		}
		return $strnew;
	} else {
		return $str;
	}
}

/*function isIdCard($number) {



    //加权因子 
    $wi = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
    //校验码串 
    $ai = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
    //按顺序循环处理前17位 
    for ($i = 0;$i < 17;$i++) { 
        //提取前17位的其中一位，并将变量类型转为实数 
        $b = (int) $number{$i}; 
 
        //提取相应的加权因子 
        $w = $wi[$i]; 
 
        //把从身份证号码中提取的一位数字和加权因子相乘，并累加 
        $sigma += $b * $w; 
    }
    //计算序号 
    $snumber = $sigma % 11; 
 
    //按照序号从校验码串中提取相应的字符。 
    $check_number = $ai[$snumber];
 
    if ($number{17} == $check_number) {
        return true;
    } else {
        return false;
    }
}
*/

/*/
# CopyRight: zxing
# Document: 检查符合 GB11643-1999 标准的身份证号码的正确性
# File:gb11643_1999.func.php Fri Mar 28 09:42:41 CST 2008 zxing
# Updated:Fri Mar 28 09:42:41 CST 2008
# Note: 调用函数 check_id();
#/*///

#/*/
/*/
# 函数功能：计算身份证号码中的检校码
# 函数名称：idcard_verify_number
# 参数表 ：string $idcard_base 身份证号码的前十七位
# 返回值 ：string 检校码
# 更新时间：Fri Mar 28 09:50:19 CST 2008
/*/
function idcard_verify_number($idcard_base){
if (strlen($idcard_base) != 17){
   return false;
}
    $factor = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2); //debug 加权因子
    $verify_number_list = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2'); //debug 校验码对应值
    $checksum = 0;
    for ($i = 0; $i < strlen($idcard_base); $i++){
        $checksum += substr($idcard_base, $i, 1) * $factor[$i];
    }
    $mod = $checksum % 11;
    $verify_number = $verify_number_list[$mod];
    return $verify_number;
}
/*/
# 函数功能：将15位身份证升级到18位
# 函数名称：idcard_15to18
# 参数表 ：string $idcard 十五位身份证号码
# 返回值 ：string
# 更新时间：Fri Mar 28 09:49:13 CST 2008
/*/
function idcard_15to18($idcard){
    if (strlen($idcard) != 15){
        return false;
    }else{// 如果身份证顺序码是996 997 998 999，这些是为百岁以上老人的特殊编码
        if (array_search(substr($idcard, 12, 3), array('996', '997', '998', '999')) !== false){
            $idcard = substr($idcard, 0, 6) . '18'. substr($idcard, 6, 9);
        }else{
            $idcard = substr($idcard, 0, 6) . '19'. substr($idcard, 6, 9);
        }
    }
    $idcard = $idcard . idcard_verify_number($idcard);
    return $idcard;
}
/*/
# 函数功能：18位身份证校验码有效性检查
# 函数名称：idcard_checksum18
# 参数表 ：string $idcard 十八位身份证号码
# 返回值 ：bool
# 更新时间：Fri Mar 28 09:48:36 CST 2008
/*/
function idcard_checksum18($idcard){
    if (strlen($idcard) != 18){ return false; }
    $idcard_base = substr($idcard, 0, 17);
    if (idcard_verify_number($idcard_base) != strtoupper(substr($idcard, 17, 1))){
        return false;
    }else{
        return true;
    }
}
/*/
# 函数功能：身份证号码检查接口函数
# 函数名称：check_id
# 参数表 ：string $idcard 身份证号码
# 返回值 ：bool 是否正确
# 更新时间：Fri Mar 28 09:47:43 CST 2008
/*/
function isIdCard($idcard) {
if(strlen($idcard) == 15 || strlen($idcard) == 18){
   if(strlen($idcard) == 15){
    $idcard = idcard_15to18($idcard);
   }
   if(idcard_checksum18($idcard)){
    return true;
   }else{
    return false;
   }
}else{
   return false;
}
}

/*
function json_encode($arr)
{
    $json_str = "";
    if(is_array($arr))
    {
        $pure_array = true;
        $array_length = count($arr);
        for($i=0;$i<$array_length;$i++)
        {
            if(! isset($arr[$i]))
            {
                $pure_array = false;
                break;
            }
        }
        if($pure_array)
        {
            $json_str ="[";
            $temp = array();
            for($i=0;$i<$array_length;$i++)
            {
                $temp[] = sprintf("%s", json_encode($arr[$i]));
            }
            $json_str .= implode(",",$temp);
            $json_str .="]";
        }
        else
        {
            $json_str ="{";
            $temp = array();
            foreach($arr as $key => $value)
            {
                $temp[] = sprintf("\"%s\":%s", $key, json_encode($value));
            }
            $json_str .= implode(",",$temp);
            $json_str .="}";
        }
    }
    else
    {
        if(is_string($arr))
        {
            $json_str = "\"". json_encode_string($arr) . "\"";
        }
        else if(is_numeric($arr))
        {
            $json_str = $arr;
        }
        else
        {
            $json_str = "\"". json_encode_string($arr) . "\"";
        }
    }
    
	
    return $json_str;
}

 

function json_encode_string($in_str)
{
    mb_internal_encoding("UTF-8");
    $convmap = array(0x80, 0xFFFF, 0, 0xFFFF);
    $str = "";
    for($i=mb_strlen($in_str)-1; $i>=0; $i--)
    {
        $mb_char = mb_substr($in_str, $i, 1);
        if(mb_ereg("&#(\\d+);", mb_encode_numericentity($mb_char, $convmap, "UTF-8"), $match))
        {
            $str = sprintf("\\u%04x", $match[1]) . $str;
        }
        else
        {
            $str = $mb_char . $str;
        }
    }
    return $str;
}
 
*/


	

?>
