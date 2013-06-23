<?

$nowtime=time();

$ExpDate = gmdate ("D, d M Y H:i:s", $nowtime + 3600 * 24 * 15 ); // 设置15天过期

header("Expires: $ExpDate GMT");    // Date in the past

header("Last-Modified: " . gmdate ("D, d M Y H:i:s", $nowtime) . " GMT"); // always modified

header("Cache-Control: public"); // HTTP/1.1

header("Pragma: Pragma");          // HTTP/1.0


//$referurl=parse_url($_SERVER["HTTP_REFERER"]);
//$referhost=$referurl[host];
//$referpath=$referurl[path];

$url = $_REQUEST['url'];
$picurl =  Url2Key($url,"@imgurl@");
$pic = $picurl[1];

//$pic="../data/upfiles/images/user.jpg";
if (!file_exists(ROOT_PATH.$pic)){
	echo 1;exit;
}
$fp = fopen(ROOT_PATH.$pic,"r");
$size = filesize(ROOT_PATH.$pic);

$image = fread($fp,$size);
header("Content-type: image/JPEG",true);
echo $image;

?> 