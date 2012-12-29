<?php
define('AUTH', true);

include('includes/welive.Core.php');
include(BASEPATH . 'includes/welive.Admin.php');

if($userinfo['usergroupid'] != 1) exit();

$updates = Iif(ForceIncomingInt('check'), 1, 0);

PrintHeader($userinfo['username']);

echo '<div><ul>
<li>欢迎 <u>'.$userinfo['username'].'</u> 进入管理面板! 为了确保系统安全, 请在关闭前点击 <a href="index.php?logout=1" onclick="return confirm(\'确定退出管理面板吗?\');">安全退出</a>!</li>
</ul></div>
<BR>';


echo '<BR><BR><BR>
<table id="welive_list" border="0" cellpadding="0" cellspacing="0" class="maintable">
<thead>
	<tr>
		<th><B>客服基本使用说明:</B></th>
	</tr>
</thead>
<tbody>
	<tr>
		<td>1. 在页面中插入以下代码显示客服小面板(浮动):<br><span class="note2">&lt;script src="http://网址/WeLive安装目录/welive.php" language="javascript"&gt;&lt;/script&gt;</span></td>
	</tr>
	<tr>
		<td>2. 在页面&lt;body&gt;&lt;/body&gt;之间任意位置插入以下代码显示客服图片(固定):<br><span class="note2">&lt;script src="http://网址/WeLive安装目录/welive_image.php" language="javascript"&gt;&lt;/script&gt;</span></td>
	</tr>
	<tr>
		<td>3. 系统默认安装后, 客服人员的登录密码与管理员相同, 请自行修改(只有客服登录后方可提供在线服务).</td>
	</tr>
	<tr>
		<td>4. 在客服操作面板, 按Esc键: 快速关闭当前访客小窗口.</td>
	</tr>
	<tr>
		<td>5. 在客服操作面板, 按Ctrl + Enter键: 快速提交当前访客小窗口中输入的内容.</td>
	</tr>
	<tr>
		<td>6. 在客服操作面板, 按Ctrl + 下箭头键: 快速最小化访客小窗口.</td>
	</tr>
	<tr>
		<td>7. 在客服操作面板, 按Ctrl + 上箭头键: 快速展开访客小窗口.</td>
	</tr>
	<tr>
		<td>8. 在客服操作面板, 按Ctrl + 左或右箭头键: 快速在展开的访客小窗口中切换.</td>
	</tr>
	<tr>
		<td>9. 在客服操作面板, 点击"挂起"后, 当访客点击当前客服时, 系统将检测是否有同组的, 在线且未挂起的客服, 如果有则自动转接到其他客服(挂起功能相当于忙碌自动转接功能).</td>
	</tr>
</tbody>
</table>';


PrintFooter();

?>

