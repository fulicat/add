{ if $_A.query_type=="list"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
<form action="" method="post"  >
	<tr >
	  <td width="18%" class="main_td" >参数名称</td>
	  <td width="*" class="main_td">参数值</td>
	  <td width="22%" class="main_td">变量名</td>
	</tr>
	{loop module="dwbbs" function="ActionSettings" style="1"}
	<tr {if $key%2==1}class="tr2"{/if} >
	  <td   class="main_td1" >{ $var.name}</td>
	  <td align="left" class="main_td1" >
	  { if $var.type==0}
		<input type="text" value="{ $var.value|br2nl}" name="value[{ $var.nid}]" size="40"/>
	  { elseif $var.type==2}
	  <textarea name="value[{ $var.nid}]" cols="40" rows="6">{ $var.value|br2nl}</textarea>
	  { elseif $var.type==3}
	  <input  name="value[{ $var.nid}]" value="{ $item.value|br2nl}" size="15"> <INPUT onclick="uploadImg('value[{ $var.nid}]');" type=button value=上传图片...>
	  { else}
	  <input type="radio" name="value[{ $var.nid}]" value="1" { if $var.value==1} checked="checked"{ /if} /> 是 <input type="radio" name="value[{ $var.nid}]"  value="0"  { if $var.value==0} checked="checked"{ /if}/> 否
	  { /if}
	  </td>
	  <td class="main_td1" > &nbsp;{ $var.nid}</td>
	</tr>
	{ /loop}
	<tr >
	  <td  colspan="7" class="submit" ><input type="submit" value="确认修改"  />&nbsp;&nbsp;&nbsp;<input value="添加参数" type="button" onclick="javascript:location='{$_A.query_url}/new';" /></td>
	</tr>
	</form>
</table>
{elseif $_A.query_type == "credits" }
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC"  width="100%">
	  <form action="" method="post" name="form1">
		<tr >
			<td width="" class="main_td" >启用</td>						
			<td width="" class="main_td" >积分代号</td>
			<td width="*" class="main_td">积分名称</td>
			<th width="" class="main_td">发帖</th>
			<th width="" class="main_td">回复</th>
			<th width="" class="main_td">精华</th>
			<th width="" class="main_td">上传</th>
			<td width="" class="main_td">下载</td>
			<td width="" class="main_td">投票</td>
		</tr>
		{ loop  module="dwbbs" function="ActionCredits" var="item" }
		<tr  {if $key%2==0}class="tr2"{/if}>
			<td width="40">
			<input type="checkbox" value="1" name="credit[{$item.creditscode}][isuse]"  {if $item.isuse==1} checked="checked"{/if}/>
			
			</td>
			<td>{$item.creditscode}</td>
			<td><input type="text" value="{$item.creditsname}" name="credit[{$item.creditscode}][creditsname]" size="8" /></td>
			<td ><input type="text" value="{$item.postvar}" name="credit[{$item.creditscode}][postvar]" size="5" /></td>
			<td><input type="text" value="{$item.replyvar}" name="credit[{$item.creditscode}][replyvar]" size="5" /></td>
			<td><input type="text" value="{$item.goodvar}" name="credit[{$item.creditscode}][goodvar]" size="5" /></td>
			<td><input type="text" value="{$item.uploadvar}" name="credit[{$item.creditscode}][uploadvar]" size="5" /></td>
			<td><input type="text" value="{$item.downvar}" name="credit[{$item.creditscode}][downvar]" size="5" /></td>
			<td><input type="text" value="{$item.votevar}" name="credit[{$item.creditscode}][votevar]" size="5" /></td>
		</tr>
		{ /loop}
	<tr>
	<td colspan="8" class="submit" >
	<input type="submit" value="修改积分" /> 
	</td>
</tr>		
</table>
{/if}