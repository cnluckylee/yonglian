<?php
header("content-type:text/html;charset=utf-8");
$IWEB_IM_IN = true;
require("foundation/fsession.php");
require("foundation/asession.php");
require("configuration.php");
require("includes.php");
require("foundation/module_im.php");

$t_chat_users = IM_DBTABLEPRE."users";
$t_chat_session = IM_DBTABLEPRE."session";
$t_chat_pals = IM_DBTABLEPRE."pals";


if(!$session_uid) {exit();}	//没有session_uid退出
$uid = get_sess_uid();
if($uid!=$session_uid) {
	$uid = '';	//解决 $session_uid 来自cookie 造成 id 不相等的问题
}

if(!$uid) {
	//定义数据库操作
	dbtarget('r',$dbServs);
	$dbo=new dbex;

	// 第一次打开页面时 执行下面操作
	$row = get_api_user_info($dbo);

	if($row) {
		$row['line_status'] = 1;
		$row['msg_wav'] = 1;
		$uid = $row['uid'];			// 通过接口获取uid, 判断是否已登陆
	}
	if(!$uid) {						// 未登陆不显示im
		exit();
	}

	$user_row = get_user_info($dbo,$t_chat_users,$uid);
	$group = get_group_list($dbo,$t_chat_session,$uid);

	dbtarget('w',$dbServs);
	$dbo=new dbex;

	change_status($dbo,$t_chat_pals,$t_chat_users,1,$uid);	// 更新用户状态为在线

	if(!$user_row) {
		!$row['u_ico'] && $row['u_ico'] = 'skin/default/images/d_ico_0_small.gif';
		insert_user_info($dbo,$t_chat_users,$row);
	} else {
		$row['msg_wav'] = $user_row['msg_wav'];
		// 更新用户信息
		$sql = "update $t_chat_users set u_name='".$row['u_name']."',u_ico='".$row['u_ico']."',line_status=1 where uid='$uid'";
		if($dbo->exeUpdate($sql)) {
			$sql = "update $t_chat_pals set pals_name='".$row['u_name']."',pals_ico='".$row['u_ico']."',line_status=1 where pals_id='$uid'";
			$dbo->exeUpdate($sql);
		}
		$row['u_intro'] = $user_row['u_intro'];
		$row['msg_wav'] = $user_row['msg_wav'];
		$row['online_time'] = $user_row['online_time'];
		$row['addFriends'] = $user_row['addFriends'];
		$row['question'] = $user_row['question'];
		$row['answer'] = $user_row['answer'];
	}

	set_sess_uverifycode(mk_code());
	set_sess_uid($row['uid']);
	set_sess_uname($row['u_name']);
	set_sess_ico($row['u_ico']);
	set_sess_status($row['line_status']);
} else {
	// 再次打开页面是只执行以下操作
	dbtarget('r',$dbServs);
	$dbo=new dbex;
	$row = get_user_info($dbo,$t_chat_users,$uid);
	$group = get_group_list($dbo,$t_chat_session,$uid);
}
?>
//全局变量设置
var i_im_baseUrl = "<?php echo $baseUrl; ?>";
var i_im_my_uid = "<?php echo $row['uid']; ?>";
var i_im_my_uname = <?php echo chat_json_encode($row['u_name']); ?>;
var i_im_my_ico = "<?php echo strstr($row['u_ico'],'http://') ? $row['u_ico'] :$baseUrl.$row['u_ico'] ;?>";
var i_im_my_intro = <?php echo chat_json_encode($row['u_intro']); ?>;
var i_im_my_status = "<?php echo $row['line_status']; ?>";		//在线状态
var i_im_msg_wav = "<?php echo $row['msg_wav']; ?>";			//声音提示
var main_title = document.title;								//
var i_im_online_time = "<?php echo $row['online_time']; ?>";	//在线时间
var i_im_addFriendsCondition = "<?php echo $row['addFriends']; ?>";	//安全隐私设置
var i_im_condition_question = <?php echo chat_json_encode($row['question']); ?>;	//加为好友问题
var i_im_condition_answer = <?php echo chat_json_encode($row['answer']); ?>;		//加为好友答案

// 保存好友列表信息
var frendlistarrayobj = [];
var grouplistarrayobj = [];
//陌生人
var i_im_stranger = [];
<?php
if($group) {
	foreach($group as $value) { ?>
grouplistarrayobj['<?php echo $value['pals_id']; ?>'] = <?php echo chat_json_encode($value); ?>;
<?php }}?>
//载入语言包文件
var i_im_lang_basic 	= <?php echo chat_json_encode($language_basic);?>;
var i_im_lang_talkwin	= <?php echo chat_json_encode($language_talkwin);?>;
var i_im_lang_face		= <?php echo chat_json_encode($language_face);?>;
var i_im_lang_group		= <?php echo chat_json_encode($language_group);?>;
var i_im_lang_friend	= <?php echo chat_json_encode($language_friend);?>;
var i_im_lang_file		= <?php echo chat_json_encode($language_transfer);?>;
var i_im_lang_limit		= <?php echo chat_json_encode($language_limit);?>;
var i_im_lang_online	= <?php echo chat_json_encode($language_online);?>;
//设置文件传输最大值限制
var i_im_max_file_size = <?php echo $allowmaxsize<<10;?>;
var i_im_allow_file_type = <?php echo strtolower(chat_json_encode($allowtype));?>;


document.write("<div id='imcss' style=''>");
document.write("	<link type='text/css' rel='stylesheet' href='<?php echo $baseUrl; ?>skin/default/style/import.css' />");
document.write("	<link type='text/css' rel='stylesheet' href='<?php echo $baseUrl; ?>skin/default/style/open.css' />");
document.write("	<scr"+"ipt language=javascript src='<?php echo $baseUrl; ?>servtools/im_templates.js'></sc"+"ript>");
document.write("	<scri"+"pt language=JavaScript src='<?php echo $baseUrl; ?>servtools/ajax_client/ajax.js'></s"+"cript>");
document.write("	<scr"+"ipt language=JavaScript src='<?php echo $baseUrl; ?>servtools/im.js'></scr"+"ipt>");
document.write("	<scr"+"ipt language=JavaScript src='<?php echo $baseUrl; ?>servtools/swfobject.js'></scr"+"ipt>");

document.write("  	<div id=\'im_minbar\' onclick=\"i_im_setShow('imbar');i_im_setOnShowPara('imbar');\">");
document.write("    	<div id='imminbox' class='imminbox'></div>");
document.write("  	</div>");
document.write("  	<div id='im_tinybar' style='display:none;'>");
document.write("  		<div class='imminbox'>");
document.write("    		<span class='hidden' onclick=\"i_im_show('im_tinybar');\"></span>");
document.write("    		<span class='box w_1'><span id='msgbox'>"+i_im_lang_basic.Msg+"(<label id='msgnums'>0</label>)</span></span>");
document.write("    		<span class='box w_2' onclick=\"i_im_setShow('imbar');i_im_show('im_tinybar');i_im_setOnShowPara('imbar');\"><span id='friendbox'>"+i_im_lang_basic.OnlineFriend+"(<label id='imonlinenum'>0</label>)</span></span>");
document.write("    		<span class='box w_3'><span id='settingsbox' onclick='i_im_setting();'></span></span>");
document.write("    	</div>");
document.write("  	</div>");
<!-- Main Board Begin -->

document.write("	<div id='imbar' class='imbox' style='display:none;' >");
document.write("		<div id='imPan' onclick=\"\">");
document.write("  			<div class='top' onclick=\"i_im_readyBlur('imbar');i_im_setOnShowPara('imbar');\">");
document.write("    			<h2><img src='im/skin/default/images/im_version.gif' alt='IM v1.0' width='83' height='16'/></h2>");
document.write("    			<p> <a href='javascript:void(0);' onclick=\"i_im_show('im_tinybar');i_im_show('imbar');\"><img src='im/skin/default/images/im_icon_min.gif' alt='"+i_im_lang_basic.Min+"' /></a></p>");
document.write("    			<p><a href='javascript:void(0);' onclick=\"i_im_show('imbar')\"><img src='im/skin/default/images/im_icon_max.gif' alt='"+i_im_lang_basic.Close+"' /></a></p>");
document.write("  			</div>");
document.write("  			<div class='userInfo' onclick=\"\">");
document.write("    			<div class='u_heder' onclick=\"i_im_readyBlur('imbar');i_im_setOnShowPara('imbar');\"><img id='imMyAvatar' src=\"<?php echo $baseUrl; ?>skin/default/images/img_friend5.gif\" width='40' height='40' alt='"+i_im_lang_basic.userico+"' title=''/></div>");
document.write("    			<div class='u_text'>");
document.write("      				<div class='clearfix' onclick=\"\">");
document.write("        				<p class='u_type' id='imonline_myicon' onclick=\"i_im_setOnShowPara('imbar');i_im_setShow('immyOnlinePanel');\">"+i_im_lang_basic.Online+"</p>");
document.write("        				<h3 onclick=\"i_im_readyBlur('imbar');i_im_setOnShowPara('imbar');\"><a id='imMyName' class='u_name' href='javascript:void(0)'>"+i_im_lang_basic.Jooyea+"</a><span class='c_grey_7'>[<label id=\"onlinestatus\">"+i_im_lang_online[i_im_my_status]+"</label>]</span></h3>");
document.write("      				</div>");
document.write("	  				<div id=\"immyOnlinePanel\" style=\"display:none;\" class=\"popLayer imSetStatusLayer\" onclick=\"i_im_readyBlur('imbar');\">");
document.write("						<div class=\"content\">");
document.write("							<ul class=\"dropList\">");
document.write("								<li class=\"setIm-available\" onmouseover=\"i_im_addClass(this,'on');\" onmouseout=\"i_im_removeClass(this,'on');\" onclick=\"i_im_changeStatus(1)\">"+i_im_lang_basic.Online+"</li>");
document.write("								<li class=\"setIm-busy\" onmouseover=\"i_im_addClass(this,'on');\" onmouseout=\"i_im_removeClass(this,'on');\" onclick=\"i_im_changeStatus(3)\">"+i_im_lang_basic.Busy+"</li>");
document.write("								<li class=\"setIm-idle\" onmouseover=\"i_im_addClass(this,'on');\" onmouseout=\"i_im_removeClass(this,'on');\" onclick=\"i_im_changeStatus(4)\">"+i_im_lang_basic.Leave+"</li>");
document.write("								<li class=\"setIm-offline end\" onmouseover=\"i_im_addClass(this,'on');\" onmouseout=\"i_im_removeClass(this,'on');\" onclick=\"i_im_changeStatus(2)\">"+i_im_lang_basic.Hiding+"</li>");
document.write("							</ul>");
document.write("						</div>");
document.write("	  				</div>");
document.write("      				<p id='mood_text' onclick=\"i_im_changeText(this,'mood_input');i_im_setOnShowPara('imbar');\" class='u_mood' title=\""+i_im_my_intro+"\" onmouseover=\"this.style.borderColor='#C4C9CB';\" onmouseout=\"this.style.borderColor='#F1F1F2';\">"+i_im_my_intro+"</p>");
document.write("      				<input id='mood_input' type='text' value=\""+i_im_my_intro+"\"  onblur=\"i_im_saveText('mood_input','mood_text')\" class='mood_input' />");
document.write("    			</div>");
document.write("  			</div>");
document.write("  			<div class='u_search'>");
document.write("    			<p><input class='ser_txt' id=\"imSearchBox\" type=\"text\" onclick=\"i_im_setOnShowPara('imbar')\" onfocus=\"javascript:i_im_$('imsearchTips_list').style.display = ''\"  onblur=\"i_im_searchBoxBlur();\" /></p>");
document.write("				<div id=\"imsearchTips_list\" class=\"dropWrap\" style=\"display:none;\">");
document.write("					<div class=\"popLayer\">");
document.write("						<div class=\"content\">");
document.write("							<ul class=\"dropList\" id=\"imsearch_dorpList\">");
document.write("								<li class=\"default\"><span>"+i_im_lang_basic.InputName+"</span></li>");
document.write("							</ul>");
document.write("						</div>");
document.write("					</div>");
document.write("				</div>");
document.write("  			</div>");
document.write("  			<div>");
document.write("  				<div class='imCenter' onclick=\"i_im_readyBlur('imbar');i_im_setOnShowPara('imbar');\">");
document.write("    				<ul class='list_tab clearfix '>");
document.write("      					<li id=\"tab_friends\" class='on_f' onclick=\"i_im_showFriends(this,'friends')\"><span title='"+i_im_lang_basic.Friend+"'></span></li>");
document.write("      					<li id=\"tab_groups\" onclick=\"i_im_showFriends(this,'groups')\"><span title='"+i_im_lang_basic.DiscussionGroup+"'></span></li>");
document.write("    					<li id=\"tab_contacted\" onclick=\"i_im_showFriends(this,'contacted')\"><span title='"+i_im_lang_basic.CloseContacted+"'></span></li>");
document.write("    				</ul>");
document.write("  				</div>");
document.write("				<div id='friends_list' style=\"height:294px; _width:230px;overflow-x:hidden;overflow-y:auto;\" onclick=\"i_im_setOnShowPara('imbar');\"></div>");
document.write("				<div id='groups_list' style='height:294px; _width:230px;overflow-x:hidden;overflow-y:auto;display:none;' onclick=\"i_im_setOnShowPara('imbar');\">");
document.write("  					<div class='pan_scr pan_scr-on'>");
document.write("    					<p id='grouplist' class='ttlm_fold' onclick=\"i_im_changeClass(this,'pan_scr');\" title=\""+i_im_lang_basic.DiscussionGroup+"\" hidefocus=\"true\">"+i_im_lang_basic.DiscussionGroup+"<span id='imGroupNum' class='c_grey_7'>[<?php echo count($group);?>]</span></p>");
document.write("    					<ul id='i_im_grouplist_id' class='imGroupContent imBuddyList' >");
<?php foreach($group as $value) { ?>
document.write("							<li id='talk_<?php echo $value['pals_id']; ?>' ondblclick=\"i_im_talkWin('<?php echo $value['pals_id']; ?>','imWin_talk');\" class='buddyItem'>");
document.write("								<div class=\"buddyAvatar\"><a href=\"javascript:void(0)\" title=\"<?php echo $value['group_name']; ?>\" hidefocus=\"true\"><img class=\"avatar-20\" src=\"<?php echo $baseUrl; ?>skin/default/images/talk20.gif\" alt=\"<?php echo $value['group_name']; ?>\"></a></div>");
document.write("								<a class='grounds' href='javascript:void(0)' title=\"<?php echo $value['group_name']; ?>\" hidefocus=\"true\" ><?php echo $value['group_name']; ?></a>");
document.write("							</li>");
<?php } ?>
document.write("    					</ul>");
document.write("  					</div>");
document.write("  				</div>");
document.write("				<div id='contacted_list' style=\"height:294px;overflow-x:hidden;overflow-y:auto;display:none;\" onclick=\"i_im_setOnShowPara('imbar');\">");
document.write("  					<div class='pan_scr pan_scr-on'>");
document.write("    					<p id='contactedlist' class='ttlm_fold' onclick=\"i_im_changeClass(this,'pan_scr');\" title=\""+i_im_lang_basic.DiscussionGroup+"\" hidefocus=\"true\">"+i_im_lang_basic.CloseContacted+"<span id='imContactedNum' class='c_grey_7'>[0/0]</span></p>");
document.write("    					<ul id='i_im_contactedlist' class='imGroupContent imBuddyList' ></ul>");
document.write("  					</div>");
document.write("				</div>");
document.write("  			</div>");
document.write("  			<div class='imBottombar' onclick=\"i_im_readyBlur('imbar');i_im_setOnShowPara('imbar');\"> <img onclick=\"i_im_setting();\" src='im/skin/default/images/im_icon_manage.gif' alt='"+i_im_lang_basic.SysSetting+"' title='"+i_im_lang_basic.SysSetting+"' width='28' height='28' class='pointer' /> </div>");
document.write("		</div>");
document.write("		<div class=\"b_line\"></div>");
document.write("	</div>");
<!-- Setting Board Begin -->
document.write("	<div id='setting' class='imManaDaligo' style='display:none;'>");
document.write("  		<div id='setting_head' class='top clearfix'>");
document.write("    		<h2 class='ttlm_mana'>"+i_im_lang_basic.SysSetting+"</h2>");
document.write("    		<p class='imIcons'><span onclick='i_im_closeSetting()'><a href='javascript:void(0);'><img src='im/skin/default/images/im_icon_max.gif' alt='"+i_im_lang_basic.Close+"' /></a></span> </p>");
document.write("  		</div>");
document.write("  		<div id='setting_body' class='contents'>");
document.write("    		<div class='c_inner'>");
document.write("      			<ul id='setting_nav' class='list_tools clearfix'>");
document.write("        			<li id='nav_1' onclick='i_im_showSetting(1,4)' class='on' style='cursor:point;'>"+i_im_lang_basic.BasicSetting+"</li>");
document.write("        			<li id='nav_2' onclick='i_im_showSetting(2,4)' style='cursor:point;'>"+i_im_lang_basic.Friend+i_im_lang_basic.Manage+"</li>");
document.write("        			<li id='nav_3' onclick='i_im_showSetting(3,4)' style='cursor:point;'>"+i_im_lang_basic.DiscussionGroup+i_im_lang_basic.Manage+"</li>");
document.write("        			<li id='nav_4' onclick='i_im_showSetting(4,4)' style='cursor:point;'>"+i_im_lang_basic.Anticlutter+"</li>");
document.write("      			</ul>");
document.write("      			<div id='setting_1' class='in_content'>");
document.write("					<iframe name='uploadheadimg' style='display:none;'></iframe>");
document.write("					<form target=\"uploadheadimg\" enctype=\"multipart/form-data\" method=\"post\" action=\""+i_im_baseUrl+"ajax.php?act=uploadheadimg\">");
document.write("        				<table class='tab_basic' width='100%'>");
document.write("          					<tr>");
document.write("            					<td><img id='settingheadimg' src='im/skin/default/images/img_friend4.jpg' alt='' width='40' height='40' /></td>");
document.write("            					<td>"+i_im_lang_basic.SelectUploadFile+"");
document.write("              						<input  class='im_btn_fileup' size='27' name='headimg[]' type='file' /></td>");
document.write("            					<td ><br />");
document.write("              						<input class='im_btn_01'  name='' type='button' value='"+i_im_lang_basic.UploadUserIco+"' onclick=\"this.form.submit()\" /></td>");
document.write("          					</tr>");
document.write("          					<tr>");
document.write("            					<td colspan='2'><input class='w_280' id='moodInput' type='text' value='"+i_im_my_intro+"' /></td>");
document.write("								<td><input class='im_btn_01'  name='' type='button' value='"+i_im_lang_basic.updateMood+"' onclick=\"i_im_setMood('moodInput')\" /></td>");
document.write("          					</tr>");
document.write("          					<tr>");
document.write("            					<td colspan='3'><label for='"+i_im_lang_basic.PlayAudio+"'><input type='checkbox' id='setVideo' />"+i_im_lang_basic.PlayAudio+"</label></td>");
document.write("          					</tr>");
document.write("          					<tr>");
document.write("            					<td colspan='3'><label for='"+i_im_lang_basic.LanguageChange+"'><input type='checkbox' id='setLanguagee' />"+i_im_lang_basic.LanguageChange+"</label></td>");
document.write("          					</tr>");
document.write("        				</table>");
document.write("      					<div class='btnCont'>");
document.write("        					<input class='im_btn_01'  name='input2' type='button' value='"+i_im_lang_basic.Confirm+"' onclick='i_im_mesageSoundWav()'  />");
document.write("        					<input class='im_btn_01'  name='input2' type='button' value='"+i_im_lang_basic.Cancel+"' onclick='i_im_closeSetting();' />");
document.write("      					</div>");
document.write("					</form>");
document.write("      			</div>");
document.write("      			<div id='setting_2' style='display:none;' class='in_content'>");
document.write("        			<div class='l_part_01'>");
document.write("						<div id=\"manage_friend\" class=\"manage_friend\"></div>");
document.write("						<div class='friend_btn'>");
document.write("            				<input class='btn_f02' type='button' value='"+i_im_lang_basic.Delete+"' onclick=\"i_im_delFriends()\" />");
document.write("            				<input class='btn_f02' type='button' value='"+i_im_lang_basic.Move+"' onclick=\"i_im_setShow('chanageCustomGroup');\" />");
document.write("  						</div>");
document.write("						<ul id='chanageCustomGroup' class=\"chanageCustomGroup\" style=\"display:none\"></ul>");
document.write("        			</div>");
document.write("        			<div class='r_part_01'>");
document.write("						<div class=\"creat mg10b\">");
document.write("							<input type=\"button\" class=\"btn_f03 flright\" value='"+i_im_lang_friend.SearchUser+"' onclick=\"i_im_show_hidden('friend_m_r_',2,2)\" />");
document.write("							<input type=\"button\" class=\"btn_f03\" value='"+i_im_lang_friend.Group+i_im_lang_basic.Manage+"' onclick=\"i_im_show_hidden('friend_m_r_',1,2)\" />");
document.write("						</div>");
document.write("						<div id=\"friend_m_r_1\" class=\"r_part_01_content flleft\">");
document.write("							<div class=\"creat flleft\">");
document.write("								<input type=\"button\" id=\"\" class=\"im_btn_01 flright\" onclick=\"i_im_newCustomGroup()\" value=\""+i_im_lang_friend.AddNewGroup+"\" />");
document.write("								<input type=\"text\" class=\"w_80\" name=\"newCustomGroup\" id=\"newCustomGroup\" />");
document.write("							</div>");
document.write("							<ul id=\"customGroupManage\" class=\"customGroupManage\"></ul>");
document.write("						</div>");
document.write("						<div id=\"friend_m_r_2\" class=\"r_part_01_content flleft\" style=\"display:none;\">");
document.write("							<div class=\"creat flleft\">");
document.write("								<input type=\"button\" id=\"\" class=\"im_btn_01 flright\" onclick=\"i_im_searchFriends()\" value=\""+i_im_lang_friend.Search+"\" />");
document.write("								<input type=\"text\" class=\"w_80\" name=\"searchUname\" id=\"searchUname\" />");
document.write("							</div>");
document.write("							<ul id=\"searchFriends\" class=\"customGroupManage\"></ul>");
document.write("							<div id=\"searchFriendsPagebar\" class=\"pagebar\"></div>");
document.write("						</div>");
document.write("        			</div>");
document.write("					<input type=\"text\" id=\"chanageCustomGroup_c\" value='1' size='0' onblur=\"i_im_timerSetHidden('chanageCustomGroup',200);\" style='top:-100px;position:absolute;width:1px;height:1px;border:0px;' />");
document.write("      			</div>");
document.write("      			<div id='setting_3' style='display:none;' class='in_content clearfix'>");
document.write("        			<div class='l_part_02'>");
document.write("          				<dl id='allgroup' class='dl_grounds clearfix'></dl>");
document.write("        			</div>");
document.write("        			<div class='r_part_02'>");
document.write("            			<input class='btn_f02 flright' type='button' value='"+i_im_lang_group.SearchGroup+"' onclick=\"i_im_show_hidden('done_group_',2,2)\" />");
document.write("            			<input class='btn_f02' type='button' value='"+i_im_lang_group.CreateGroup+"' onclick=\"i_im_show_hidden('done_group_',1,2)\" />");
document.write("        			</div>");
document.write("					<div id=\"done_group_1\" class='r_part_content'>");
document.write("						<div class=\"r_part_input\">");
document.write("							<label>"+i_im_lang_group.CreateTalkGroup+":</label><input id=\"newGroup\" type=\"text\" onkeydown=\"i_im_creatGroupKeyDown(event)\" />"+i_im_lang_group.GroupWarn+"");
document.write("						</div>");
document.write("      					<div class='btnCont3'>");
document.write("        					<input class='im_btn_01 flleft'  name='input2' type='button' value='"+i_im_lang_basic.Confirm+"' onclick=\"i_im_creatGroup()\" />");
document.write("        					<input class='im_btn_01 flleft'  name='input2' type='button' value='"+i_im_lang_basic.Cancel+"' onclick='i_im_closeSetting();' />");
document.write("      					</div>");
document.write("					</div>");
document.write("					<div id=\"done_group_2\" class='r_part_content' style=\"display:none;\">");
document.write("						<div class=\"r_part_input\">");
document.write("							<label>"+i_im_lang_group.SearchTalkGroup+":</label><input id=\"searchGroup\" type=\"text\" onkeydown=\"i_im_serachGroupKeyDown(event)\" />");
document.write("							<ul id=\"searchGroupList\" class=\"searchGroupList\"></ul>");
document.write("							<div id=\"pagebar\" class=\"pagebar\"></div>");
document.write("						</div>");
document.write("      					<div class='btnCont3'>");
document.write("        					<input class='im_btn_01 flleft'  name='input2' type='button' value='"+i_im_lang_basic.Confirm+"' onclick=\"i_im_serachGroup()\" />");
document.write("        					<input class='im_btn_01 flleft'  name='input2' type='button' value='"+i_im_lang_basic.Cancel+"' onclick='i_im_closeSetting();' />");
document.write("      					</div>");
document.write("					</div>");
document.write("      			</div>");
document.write("      			<div id='setting_4' style='display:none;' class='in_content'>");
document.write("        			<div class='addCondition'>");
document.write("          				<p class='mg10b'><label for='c_every'><input id='c_every' type='radio' name='addcon' value='1' />"+i_im_lang_limit.AllowAnyBody+"</label></p>");
document.write("          				<p class='mg10b'><label for='c_needAnswer'><input id='c_needAnswer' type='radio' name='addcon' value='2' />"+i_im_lang_limit.NeedQuestion+"</label></p>");
document.write("          				<p class='mg10b'>"+i_im_lang_limit.Question+":<input id=\"im_question\" class='txt_295' name='im_question' type='text' disabled=true value='"+i_im_condition_question+"'></p>");
document.write("          				<p class='mg10b'>"+i_im_lang_limit.Answer+":<input id=\"im_answer\" class='txt_295' name='im_answer' type='text' disabled=true value='"+i_im_condition_answer+"'></p>");
document.write("          				<p class='mg10b'><label for='c_noOne'><input id='c_noOne' type='radio' name='addcon' value='3' />"+i_im_lang_limit.RefuseAnyBody+"</label></p>");
document.write("        			</div>");
document.write("      				<div class='btnCont'>");
document.write("        				<input class='im_btn_01'  name='input2' type='button' value='"+i_im_lang_basic.Confirm+"' onclick='i_im_setCondition()' />");
document.write("        				<input class='im_btn_01'  name='input2' type='button' value='"+i_im_lang_basic.Cancel+"' onclick='i_im_closeSetting();' />");
document.write("      				</div>");
document.write("      			</div>");
document.write("    		</div>");
document.write("  		</div>");
document.write("  		<div class='bottom'></div>");
document.write("	</div>");
<!-- Setting Board End -->
document.write("	<div id='impopFriendWrap' style=''></div>");
document.write("	<div id='im_container' class='imCrSW' style='position:absolute;top:0px;left:0px;'></div>");
document.write("	<input type='text' name='imbar_c' id='imbar_c' size='0' onblur=javascript:i_im_timerSetHidden('imbar',200); style='top:-100px;position:absolute;width:1px;height:1px;border:0px;' value='1' />");
document.write("	<div id='i_im_msg_wav_div'></div>");
document.write("	<div id='i_im_question_answer_div'></div>");
document.write("	<input type='text' id=\"immyOnlinePanel_c\" name=\"immyOnlinePanel_c\" onblur=\"i_im_timerSetHidden('immyOnlinePanel',100);\" size='0' value='1'  style='top:-100px;position:absolute;width:1px;height:1px;border:0px;' />");
document.write("</div>");
<!-- Main Board End -->


<!--TemplateFileBegin-->

<!-- chat window Begin -->
document.write("<div id='room_talk_win' style='display:none'>");
document.write("	<div id='talk_win_{id}' class='imDialog w_385'>");
document.write("		<div class='d_t'><b class='b1'></b><b class='b2'></b></div>");
document.write("		<div class='d_c'>");
document.write("	    	<div class='c_in'>");
document.write("	      		<div id='head_pnl{id}' class='d_head clearfix'>");
document.write("	        		<p class='d_portrait'><img {src_pals_ico} alt='{pals_name}' width='40' height='40' /></p>");
document.write("	        		<div class='u_text'>");
document.write("	          			<h3><a class='u_name' href='javascript:void(0)'>{pals_name}</a></h3>");
document.write("	          			<p class='u_mood' title=\"{pals_intro_full}\">{pals_intro}</p>");
document.write("	        		</div>");
document.write("	        		<p class='imIcons'>");
document.write("						<span><a href='javascript:void(0);' id='dlgCloseBtn{imwin_id}'><img src='im/skin/default/images/im_icon_max.gif' alt='"+i_im_lang_basic.Close+"' /></a></span> ");
document.write("					</p>");
document.write("	      		</div>");
document.write("	      		<div id='list_btns{id}' class='list_btns'>");
document.write("	        		<ul>");
document.write("	          			<li><a href='javascript:void(0);' onclick=\"openvideo('{pals_id}','p')\"><img src='im/skin/default/images/im_icon_video.gif' alt='"+i_im_lang_talkwin.Video+"' title='"+i_im_lang_talkwin.Video+"' /></a></li>");
document.write("	          			<li><a href='javascript:void(0);' class='post' title='"+i_im_lang_talkwin.FileTransfer+"'>"+i_im_lang_talkwin.FileTransfer+"</a>");
document.write("						<iframe name='filetransfer' style='display:none;'></iframe>");
document.write("						<form id='pbform{id}' name='pbform{id}' action=\""+i_im_baseUrl+"ajax.php?act=postfile&pid={id}\" class='send_file_form' method='post' ENCTYPE='multipart/form-data'  target='filetransfer'>");
document.write("							<input type=\"file\" name=\"impostfile\" onchange=\"submitform()\" id=\"impostfile\" size=\"1\" class=\"select_file\" title='"+i_im_lang_talkwin.FileTransfer+"'>");
document.write("							<input type=\"hidden\" name=\"upfile\" value=\"1\" DISABLE>");
document.write("						</form>");
document.write("			  			</li>");
document.write("			  			<li><span onclick=\"i_im_addFriends('{imwin_id}',this)\"><img alt='"+i_im_lang_talkwin.BecomeFriend+"' src='im/skin/default/images/im_icon_invited.gif' title='"+i_im_lang_talkwin.BecomeFriend+"'></span></li>");
document.write("	        		</ul>");
document.write("	      		</div>");
document.write("	      		<div id='contentPnl{id}' style='background:#fff;width:100%;' class='clearfix'>");
document.write("	        		<div class='c_normal'>");
document.write("	          			<div id='msgHistoryid_{id}' class='c_chat'>");
document.write("	            			<ul id='message_content_{id}' class='list_chat'></ul>");
document.write("	          			</div>");
document.write("	          			<div class='c_tool'>");
document.write("	            			<p class='im_expression'><a href='javascript:void(0);' onclick=\"i_im_show('face_list_menu{imwin_id}')\"><img src='im/skin/default/images/im_icon_expression.gif' alt='"+i_im_lang_talkwin.SearchFace+"' title='"+i_im_lang_talkwin.SearchFace+"' /></a></p>");
document.write("	            			<p class='im_expression'><a href='javascript:void(0);' title=\""+i_im_lang_talkwin.TransferImg+"\" class=\"postimg\"><img src='im/skin/default/images/im_icon_pic.gif' alt='"+i_im_lang_talkwin.TransferImg+"' /></a></p>");
document.write("							<form name=\"postimg{id}\" action=\""+i_im_baseUrl+"ajax.php?act=postfile&pid={id}\" class='send_img_form' method='post' ENCTYPE='multipart/form-data'  target='filetransfer'>");
document.write("								<input type=\"file\" name=\"impostfile\" onchange=\"i_im_checkForm(this.form)\" id=\"impostfile\" size=\"1\" class=\"select_file\" title='"+i_im_lang_talkwin.TransferImg+"'>");
document.write("								<input type=\"hidden\" name=\"upfile\" value=\"2\" DISABLE>");
document.write("							</form>");
document.write("	            			<p class='im_expression'><a href='javascript:void(0);' hidefocus='true' onclick=\"document.getElementById('message_content_{id}').innerHTML=''\"><img src='im/skin/default/images/brush.gif' alt='"+i_im_lang_talkwin.ClearWindow+"' title='"+i_im_lang_talkwin.ClearWindow+"' /></a></p>");
document.write("	            			<p class='im_chatrecord'><a href='javascript:void(0);' onclick=\"i_im_getHistoryMessage('{id}','0',false)\">"+i_im_lang_talkwin.Record+"</a></p>");
document.write("	          			</div>");
document.write("	          			<div class='c_input clearfix'>");
document.write("	            			<p class='c_input_l'>");
document.write("	              				<textarea  class='im_txt_chat' id='msginput{imwin_id}'></textarea>");
document.write("	            			</p>");
document.write("	          			</div>");
document.write("						<div id='face_list_menu{imwin_id}' class='emBg' style='display:none' >");
document.write("							<div class='emItem' lang='1' title='"+i_im_lang_face.Smile+"'></div><div class='emItem' lang='2' title='"+i_im_lang_face.Grin+"'></div><div class='emItem' lang='3' title='"+i_im_lang_face.Titter+"'></div><div class='emItem' lang='4' title='"+i_im_lang_face.OutTongue+"'></div><div class='emItem' lang='5' title='"+i_im_lang_face.BadSmile+"'></div><div class='emItem' lang='6' title='"+i_im_lang_face.Ashamed+"'></div><div class='emItem' lang='7' title='"+i_im_lang_face.Cool+"'></div><div class='emItem' lang='8' title='"+i_im_lang_face.Dizzy+"'></div><div class='emItem' lang='9' title='"+i_im_lang_face.Doubt+"'></div><div class='emItem' lang='10' title='"+i_im_lang_face.Sweat+"'></div><div class='emItem' lang='11' title='"+i_im_lang_face.Sad+"'></div><div class='emItem' lang='12' title='"+i_im_lang_face.Dissatisfied+"'></div><div class='emItem' lang='13' title='"+i_im_lang_face.Amazed+"'></div><div class='emItem' lang='14' title='"+i_im_lang_face.NotUnderstand+"'></div><div class='emItem' lang='15' title='"+i_im_lang_face.Angry+"'></div><div class='emItem' lang='16' title='"+i_im_lang_face.Anger+"'></div><div class='emItem' lang='17' title='"+i_im_lang_face.Sleeping+"'></div><div class='emItem' lang='18' title='"+i_im_lang_face.ShutUp+"'></div><div class='emItem' lang='19' title='"+i_im_lang_face.Weak+"'></div><div class='emItem' lang='20' title='"+i_im_lang_face.Pig+"'></div><div class='emItem' lang='21' title='"+i_im_lang_face.Heart+"'></div><div class='emItem' lang='22' title='"+i_im_lang_face.HeartCold+"'></div><div class='emItem' lang='23' title='"+i_im_lang_face.Flower+"'></div><div class='emItem' lang='24' title='"+i_im_lang_face.Wither+"'></div><div class='emItem' lang='25' title='"+i_im_lang_face.Goodnight+"'></div><div class='emItem' lang='26' title='"+i_im_lang_face.Knock+"'></div><div class='emItem' lang='27' title='"+i_im_lang_face.Money+"'></div><div class='emItem' lang='28' title='"+i_im_lang_face.Feces+"'></div><div class='emItem' lang='29' title='"+i_im_lang_face.Vomit+"'></div><div class='emItem' lang='30' title='"+i_im_lang_face.Baste+"'></div><div class='emItem' lang='31' title='"+i_im_lang_face.Good+"'></div><div class='emItem' lang='32' title='"+i_im_lang_face.Applause+"'></div><div class='emItem' lang='33' title='"+i_im_lang_face.Support+"'></div><div class='emItem' lang='34' title='"+i_im_lang_face.Despise+"'></div><div class='emItem' lang='35' title='"+i_im_lang_face.Surrender+"'></div><div class='emItem' lang='36' title='"+i_im_lang_face.Winner+"'></div><div class='emItem' lang='37' title='"+i_im_lang_face.OK+"'></div><div class='emItem' lang='38' title='"+i_im_lang_face.Handshake+"'></div><div class='emItem' lang='39' title='"+i_im_lang_face.Hug+"'></div><div class='emItem' lang='40' title='"+i_im_lang_face.Pump+"'></div><div class='emItem' lang='41' title='"+i_im_lang_face.Kiss+"'></div><div class='emItem' lang='42' title='"+i_im_lang_face.Grievance+"'></div><div class='emItem' lang='43' title='"+i_im_lang_face.Wail+"'></div><div class='emItem' lang='44' title='"+i_im_lang_face.Exclaim+"'></div><div class='emItem' lang='45' title='"+i_im_lang_face.Mad+"'></div><div class='emItem' lang='46' title='"+i_im_lang_face.Thurification+"'></div><div class='emItem' lang='47' title='"+i_im_lang_face.Expectation+"'></div><div class='emItem' lang='48' title='"+i_im_lang_face.Talk+"'></div><div class='emItem' lang='49' title='"+i_im_lang_face.Invigorating+"'></div>");
document.write("						</div>");
document.write("	        		</div>");
document.write("					<div id='talkwin_right_{id}' style='display: none;' class='c_expand w_240'>");
document.write("						<ul id='talk_win_nav_{id}' class='list_ttls clearfix'>");
document.write("							<li id='nav_history_msg_{id}' onclick=\"i_im_showNavigate('{id}','msg')\" style='display:none;'>"+i_im_lang_talkwin.MessageRecord+"</li>");
document.write("							<li id='nav_group_info_{id}' onclick=\"i_im_showNavigate('{id}','info')\" style='display:none;'>"+i_im_lang_talkwin.GooupInfo+"</li>");
document.write("							<li id='nav_video_{id}' onclick=\"i_im_showNavigate('{id}','video')\" style='display:none;'>"+i_im_lang_talkwin.Video+"</li>");
document.write("						</ul>");
document.write("						<div class='hisPnl' id='his_pnl{id}'>");
document.write("							<div id='move_pan{id}' class='movePan'>");
<!--消息记录-->
document.write("								<div class='contentPnl'>");
document.write("									<div class='history' id='history_pal_{id}'></div>");
document.write("									<div class='hisControl'>");
document.write("										<div class='btn'>");
document.write("											<div class='btnR'></div>");
document.write("											<div class='btnC' id='hispageshow_{id}'>"+i_im_lang_talkwin.PreviousPage+" "+i_im_lang_talkwin.PreviousPage+" "+i_im_lang_talkwin.NowPage+"<span>1</span>"+i_im_lang_talkwin.Page+" "+i_im_lang_talkwin.PageSum+"<span>1</span>"+i_im_lang_talkwin.Page+"</div>");
document.write("											<div class='btnL'></div>");
document.write("										</div>");
document.write("									</div>");
document.write("								</div>");
<!--消息记录-->
<!--讨论组会员-->
document.write("								<div id='group_member_room_{id}' class='c_expand_groups'>");
document.write("									<div class='title'>"+i_im_lang_talkwin.TalkGroupMember+"[<span id='gnum_{id}'>1/100</span>]</div>");
document.write("									<ul id='glist_{id}' class='list_users' ></ul>");
document.write("								</div>");
<!--讨论组会员-->
<!--视频-->
document.write("								<div id='video_room_{id}' class='video_room'></div>");
<!--视频-->
document.write("							</div>");
document.write("						</div>");
document.write("					</div>");
document.write("	      		</div>");
document.write("	      		<div class='c_prompt'>");
document.write("					<div class='box'>");
document.write("						<input id='sendmessage_{id}' class='im_btn_send' type='button' />"+i_im_lang_talkwin.LastWord+"<input id='txt_num{id}' value='150' style='border: 0;color:#000; background-color:#F1F1F2;width:28px;color:#999;' disabled /><a class='hotkeys' href='javascript:void(0);' hidefocus='true' onclick=\"i_im_setShow('poststylediv_{id}');i_im_setOnShowPara('poststylediv_{id}');\"></a>");
document.write("      					<div id=\"poststylediv_{id}\" style=\"display:none;background-color:#f1f1f2;color:#333; position:absolute;right:-8px; _right:0; top:20px;border:1px solid #b2b2b2;line-height:20px;\">");
document.write("  							<ul><li id='postStyle_1' style=\"cursor:pointer;padding:0 4px 0 20px;\" onclick=\"i_im_changePostStyle(1,3);i_im_show('poststylediv_{id}');\" onmouseover=\"this.style.backgroundColor='#d6d6d6';this.style.color='#000';\" onmouseout=\"this.style.backgroundColor='#f1f1f2';this.style.color='#333';\">"+i_im_lang_talkwin.PostEnter+"</li>");
document.write("  								<li id='postStyle_2' style=\"cursor:pointer;padding:0 4px 0 20px;\" onclick=\"i_im_changePostStyle(2,3);i_im_show('poststylediv_{id}');\" onmouseover=\"this.style.backgroundColor='#d6d6d6';this.style.color='#000';\" onmouseout=\"this.style.backgroundColor='#f1f1f2';this.style.color='#333';\">"+i_im_lang_talkwin.PostCtrlEnter+"</li>");
document.write("  								<li id='postStyle_3' style=\"cursor:pointer;padding:0 4px 0 20px;\" onclick=\"i_im_changePostStyle(3,3);i_im_show('poststylediv_{id}');\" onmouseover=\"this.style.backgroundColor='#d6d6d6';this.style.color='#000';\" onmouseout=\"this.style.backgroundColor='#f1f1f2';this.style.color='#333';\">"+i_im_lang_talkwin.PostAltS+"</li></ul>");
document.write("  	  					</div>");
document.write("	  					<input type=\"text\" id=\"poststylediv_{id}_c\" value='1' onblur=\"i_im_timerSetHidden('poststylediv_{id}',200);\" size='1' style='top:-100px;position:absolute;width:1px;height:1px;border:0px;' />");
document.write("	    			</div>");
document.write("	    		</div>");
document.write("	    	</div>");
document.write("	  	</div>");
document.write("	  	<div class='d_b'><b class='b3'></b><b class='b4'></b></div>");
document.write("	</div>");
document.write("</div>");
<!-- chat window Close -->

<!-- group member list Begin -->
document.write("<div id='room_gmlist' style='display:none;'>");
document.write("	<li class='clearfix'><a href='javascript:void(0);'><img {pals_ico} alt='{pals_name}' width='20' height='20' /> <span>{pals_name}</span> </a></li>");
document.write("</div>");
<!-- group member list End -->

<!-- group member manager Begin -->
document.write("<div id=\"room_manage_group_member\" style=\"display:none;\">");
document.write("	<div id='i_im_wintop_{id}' class='wintop'>");
document.write("		<div class='toplc'></div>");
document.write("		<div class='topcc' style='width:166px'><h2>"+i_im_lang_group.MemberManage+"</h2>");
document.write("			<div id='im_mCloseBtn{id}' class='dlgCloseBtn'></div>");
document.write("		</div>");
document.write("		<div class='toprc'></div>");
document.write("	</div>");
document.write("	<div id='i_im_wincontent_{id}' class='wincontent' style='width:172px;height:300px'>");
document.write("		<div class='memberlist' id='i_im_memberlist_{id}'></div>");
document.write("		<input id='i_im_submit_{id}' class='submit' type='submit' value='"+i_im_lang_group.Manage+"' />");
document.write("	</div>");
document.write("	<div class='winbottom'>");
document.write("		<div class='btlc'></div>");
document.write("		<div class='btcc' style='width:166px'></div>");
document.write("		<div class='btrc'></div>");
document.write("	</div>");
document.write("</div>");
<!-- group member manager End -->

<!-- Answer questions Begin-->
document.write("<div id=\"room_answer_question\" style=\"display:none;\">");
document.write("	<div id=\"question_waring_{id}\" class=\"question_waring\">"+i_im_lang_talkwin.NeedToAnswerQuestion+"</div>");
document.write("	<div id=\"question_info_{id}\" class=\"question_info\">");
document.write("		<ul>");
document.write("			<li id=\"question_{id}\">"+i_im_lang_limit.Question+":{question}</li>");
document.write("			<li>"+i_im_lang_limit.Answer+":<input id=\"answer_{id}\" /></li>");
document.write("		</ul>");
document.write("		<div class=\"question_btn\">");
document.write("			<input type=\"button\" id=\"question_btn_{id}\" value=\""+i_im_lang_basic.Confirm+"\" onclick=\"i_im_answerQuestion('{id}')\" />");
document.write("			<input type=\"button\" id=\"question_cancel_btn_{id}\" value=\""+i_im_lang_basic.Cancel+"\" onclick=\"i_im_closeQuestion('{id}')\"/>");
document.write("		</div>");
document.write("	</div>");
document.write("</div>");
<!-- Answer questions End-->

<!-- custom group Begin -->
document.write("<div id='room_custom_group' style=\"display:none;\">");
document.write("	<p class='ttlm_fold' onclick=\"i_im_changeClass(this,'pan_scr');\" title=\"{customGroupName}\" hidefocus=\"true\">{customGroupName}<span id=\"customGroupUsersNum_{customGroupId}\" class='c_grey_7'>[0/0]</span></p>");
document.write("	<ul id=\"customGroup_{customGroupId}\" class='imGroupContent imBuddyList' ></ul>");
document.write("</div>");
<!-- custom group End -->

<!--TemplateFileEnd-->