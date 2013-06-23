
{if $t == "install"}

<form name="form1" method="post" action="{$url}/install"  >
<table width="100%" border="0"  cellspacing="1" bgcolor="#CCCCCC">
	<tr>
		<td colspan="2" bgcolor="#ffffff" class="tr">
			<div class="fl"><strong>Ucenter安装</strong></div>
		</td>
	</tr>
	<tr>
		<td width="25%" align="right" bgcolor="#ffffff">UCenter 数据库主机：</td>
		<td align="left"  class="main_td1" >
			<input type="text" name="uc_dbhost"  value="localhost" class="input_border" size="30" />  
		</td>
	</tr>
	<tr>
		<td align="right" bgcolor="#ffffff">UCenter 数据库用户名：</td>
		<td align="left"  class="main_td1" >
			<input type="text" name="uc_dbuser" value="root"  class="input_border" size="30" />  
		</td>
	</tr>
	<tr>
		<td align="right" bgcolor="#ffffff">UCenter 数据库密码：</td>
		<td align="left"  class="main_td1" >
			<input type="text" name="uc_dbpw" value="" class="input_border" size="30" />  
		</td>
	</tr>
	<tr>
		<td align="right" bgcolor="#ffffff">UCenter 数据库名称：</td>
		<td align="left"  class="main_td1" >
			<input type="text" name="uc_dbname" value="hycms"  class="input_border" size="30" />  
		</td>
	</tr>
	<tr>
		<td align="right" bgcolor="#ffffff">UCenter 数据库字符集：</td>
		<td align="left"  class="main_td1" >
			<input type="text" name="uc_charset" value="gbk"  class="input_border" size="30" />  
		</td>
	</tr>
	<tr>
		<td align="right" bgcolor="#ffffff">UCenter 数据库表前缀：</td>
		<td align="left"  class="main_td1" >
			<input type="text" name="uc_dbtablepre" value="hycms_uc_"  class="input_border" size="30" />  
		</td>
	</tr>
	<tr>
		<td align="right" bgcolor="#ffffff">UCenter 通信密钥：</td>
		<td align="left"  class="main_td1" >
			<input type="text" name="uc_key" value="123456"  class="input_border" size="30" />  
		</td>
	</tr>
	<tr>
		<td align="right" bgcolor="#ffffff">UCenter 安装地址：</td>
		<td align="left"  class="main_td1" >
			<input type="text" name="uc_api"  class="input_border" size="30" />  
		</td>
	</tr>
	<tr>
		<td align="right" bgcolor="#ffffff">UCenter 字符集：</td>
		<td align="left"  class="main_td1" >
			<input type="text" name="uc_charset" value="gbk"  class="input_border" size="30" />  
		</td>
	</tr>
	<tr>
		<td align="right" bgcolor="#ffffff">UCenter IP：</td>
		<td align="left"  class="main_td1" >
			<input type="text" name="uc_ip"  class="input_border" size="30" />  
		</td>
	</tr>
	<tr>
		<td align="right" bgcolor="#ffffff">UCenter 当前应用的ID：</td>
		<td align="left"  class="main_td1" >
			<input type="text" name="uc_appid" value=""  class="input_border" size="30" />  
		</td>
	</tr>
	<tr>
		<td bgcolor="#ffffff" colspan="3"  align="center">
		<input type="submit"  name="submit" value="确认提交" />
		</td>
	</tr>
</table>
</form>
{else}
<table width="100%" border="0"  cellspacing="1" bgcolor="#CCCCCC">
	<tr>
		<td bgcolor="#ffffff" class="main_td">
			<div class="fl"><strong>Ucenter管理</strong></div>
		</td>
	</tr>
	<tr>
		<td width="25%" align="center" bgcolor="#ffffff"><br /><br />

您已成功安装了此模块，要修改请先 <a href="{$url}/unstall">卸载</a><br /><br />

<br />
</td>
	</tr>
	
</table>
{/if}