<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="css/index2.css" />
<script language="javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/index.js"></script>
</head>

<body>
<div class="top" style="width:1010px; height:350px;">
<div class="nav">
    <ul>
      <li><a href="#">桌面快捷</a>  </li>
      <li><a href="#">用户注册</a>  </li>
      <li><a href="/html/webkaifa/">企业公告</a>   </li>
      <li><a href="/html/open-php/">永链数据</a>   </li>
      <li><a href="/html/download/">联系我们</a>   </li>
	  <li><a href="#">招贤纳士</a>    </li>

    </ul>
  </div>
  <div class="login">
  <form id="form1" name="form1" method="get" action="">
    <table width="259" height="200" border="0"cellpadding=1 cellspacing=1>
      <tr>
        <td colspan="2">
            <label> 　　　　
            <input type="radio" name="radiobutton" value="radiobutton"  checked="checked"/>
            </label>
            企业
            <label>
            <input type="radio" name="radiobutton" value="radiobutton"/>
            </label>
            个人          </td>
      </tr>
      <tr id="depart">
        <td width="70">部&nbsp;&nbsp;门：</td>
        <td width="180"><input type="text" name="txt_darpart" id="txt_darpart" size="25" style="BORDER: blue 1px solid;" /></td>
　　　</tr>	  
      <tr>
        <td>用户名：</td>
        <td><input type="text" name="txt_uname" id="txt_uname" size="25" style="BORDER: blue 1px solid;" /></td>
　　　</tr>
      <tr>
        <td>密　码：</td>
        <td ><input type="text" name="txt_upwd" id="txt_upwd" size="25" style="BORDER: blue 1px solid;" /></td>
      </tr>
      <tr>
        <td height="16" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><div align="center"><img src="images/Window button/login.gif" width="140" height="30" style="cursor:pointer;" onclick="index_login_form_submit()"/></div></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center"  ><img src="images/Window button/registered.gif" width="140" height="30" style="cursor:pointer;" onclick="index_jump_register()"/></div></td>
      </tr>
      <tr>
        <td height="40" colspan="2"><span class="STYLE5">热线电话：400-800-400-800</span></td>
      </tr>
    </table>
	</form>
  </div>
<div class="Picture_Carousel" style="width:690px; height:250px;">
<img src="images/The_company_poster/poster1.gif" width="690" height="250" />
<ul class="Picture_Carousel_ul">
<li><img width="40" height="40" src="images/Web button/button1.gif"></li>
<li><img width="40" height="40" src="images/Web button/button2.gif"></li>
</ul>
</div>
</div>

<div class="nav_line" style="width:880px; height:65px;">
 <ul class="nav_line_ul1">
      <li><a href="#">企业全貌</a>  </li>
      <li><a href="#">管理经典</a>  </li>
      <li><a href="/html/webkaifa/">用户之窗</a>   </li>
      <li><a href="/html/open-php/">永链擂台</a>   </li>
      <li><a href="/html/download/">永链数据</a>   </li>
 </ul>
 
  <ul class="nav_line_ul2">
      <li><a href="#">企业全貌</a>  </li>
      <li><a href="#">管理经典</a>  </li>
      <li><a href="/html/webkaifa/">用户之窗</a>   </li>
      <li><a href="/html/open-php/">永链擂台</a>   </li>
      <li><a href="/html/download/">永链数据</a>   </li>
 </ul>
</div>

<div class="nav_line_bottom" style="width:1010px; height:30px;">
<img src="images/site-title3.gif" width="280px" height="30px" align="left" />
 <ul>
      <li><img width="40" height="30" src="images/Navigation_button/Navigation-button1.gif"></li>
      <li><img width="40" height="30" src="images/Navigation_button/Navigation-button2.gif"></li>
      <li><img width="40" height="30" src="images/Navigation_button/Navigation-button3.gif"></li>
      <li><img width="40" height="30" src="images/Navigation_button/Navigation-button4.gif"></li>
      <li><img width="40" height="30" src="images/Navigation_button/Navigation-button5.gif"></li>
       <li><img width="40" height="30" src="images/Navigation_button/Navigation-button6.gif"></li>
 </ul>
</div>
<br />
<div class="main_body">
	<div class="main_body_left">
     <ul>

    {foreach from=$adv item=item key=key name=link}
    <li><a href="{$item.remark}" target="_blank"><img src="{$item.imgurl}"></a></li> 
	{/foreach}
 	</ul>
    </div>
    <div class="main_body_right">
    <div class="clear" style="height:15px;"></div>
    <table width="702" cellspacing="0" cellpadding="0" border="0">
      <tbody><tr>
        <td width="77" height="31" style="BORDER-top: gray 1px solid;BORDER-left: gray 1px solid;"><a target="_blank" href="company_show.html">企业秀台</a></td>
        <td width="77" style="BORDER-top: gray 1px solid;">专家新论</td>
        <td width="77" style="BORDER-top: gray 1px solid;">政策精选</td>
        <td width="77" style="BORDER-top: gray 1px solid;">政策精选</td>
        <td width="52" style="BORDER-top: gray 1px solid;BORDER-left: gray 1px solid;"><img width="30" height="30" src="images/dingbats/dingbats1.gif"></td>
        <td width="299" style="BORDER-top: gray 1px solid;">&nbsp;</td>
        <td width="43" valign="middle" bgcolor="#CCCCCC" align="center" rowspan="5" style="BORDER-top: gray 2px solid;BORDER-left: gray 1px solid;BORDER-right: gray 2px solid;"><p class="STYLE6">每</p>
          <p class="STYLE6">日</p>
          <p class="STYLE6">更</p>
          <p class="STYLE6">新</p></td>
      </tr>
      <tr>
        <td height="30" style="BORDER-left: gray 1px solid;">企业动态</td>
        <td>管理技术</td>
        <td>永链概况</td>
        <td>永链概况</td>
        <td style="BORDER-left: gray 1px solid;"><img width="30" height="30" src="images/dingbats/dingbats1.gif"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" style="BORDER-left: gray 1px solid;">携手发展</td>
        <td>管理案例</td>
        <td>管理案例</td>
        <td>管理案例</td>
        <td style="BORDER-left: gray 1px solid;"><img width="30" height="30" src="images/dingbats/dingbats1.gif"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" style="BORDER-left: gray 1px solid;">舵主风采</td>
        <td>永链观点</td>
        <td>永链观点</td>
        <td>永链观点</td>
        <td style="BORDER-left: gray 1px solid;"><img width="30" height="30" src="images/dingbats/dingbats1.gif"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" style="BORDER-left: gray 1px solid;BORDER-bottom: gray 1px solid;">团队闪耀</td>
        <td style="BORDER-bottom: gray 1px solid;">团队闪耀</td>
        <td style="BORDER-bottom: gray 1px solid;">团队闪耀</td>
        <td style="BORDER-bottom: gray 1px solid;">团队闪耀</td>
        <td style="BORDER-left: gray 1px solid;BORDER-bottom: gray 1px solid;"><img width="30" height="30" src="images/dingbats/dingbats1.gif"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td style="BORDER-bottom: gray 2px solid;BORDER-top: gray 1px solid;BORDER-left: gray 2px solid;" rowspan="2"><span class="STYLE3 STYLE7">您曾经关注过的更新了。。。</span></td>
        <td bgcolor="#CCCCCC" style="BORDER-left: gray 1px solid;BORDER-right: gray 2px solid;BORDER-bottom: gray 2px solid;" rowspan="2"><img width="40" height="43" src="images/icon/update.gif"></td>
      </tr>
      <tr>
        <td height="14">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </tbody></table>
<!-- 直击市场焦点 辨析利弊得失 -->    

  <table width="704" cellspacing="0" cellpadding="0" border="0" style="margin-top:-30px;">
      <tbody><tr>
        <td width="42" height="43" style="BORDER-left: gray 2px solid;BORDER-top: gray 2px solid; " rowspan="2"><img width="40" height="43" src="images/icon/market-insights.gif"></td>
        <td style="BORDER-right: gray 2px solid;BORDER-top: gray 2px solid; " rowspan="2"><span class="STYLE14 STYLE3 STYLE7">直击市场焦点 辨析利弊得失</span></td>
        <td width="20">&nbsp;</td>
        <td width="20">&nbsp;</td>
        <td width="101" rowspan="2"><div align="center"></div></td>
        <td width="101" rowspan="2"><div align="center"></div></td>
        <td width="116" rowspan="2"><div align="center"></div></td>
      </tr>
      <tr>
        <td height="14">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="42" valign="middle" height="304" bgcolor="#CCCCCC" align="center" style="BORDER-left: gray 2px solid;BORDER-bottom: gray 2px solid; BORDER-bottom: gray 2px solid;BORDER-right: gray 1px solid;"><p class="STYLE6">市</p>
          <p class="STYLE6">场</p>
          <p class="STYLE6">透</p>
          <p class="STYLE6">视</p></td>
        <td width="304" height="304" style="BORDER-bottom: gray 1px solid; BORDER-top: gray 1px solid;"><img width="284" height="300" src="images/This paper brief introduction/introduction1.gif"></td>
        <td width="20" height="304" style="BORDER-bottom: gray 1px solid; BORDER-top: gray 1px solid;"><img width="20" height="300" src="images/Market perspective theme/hot pints.gif"></td>
        <td width="20" height="304" style="BORDER-bottom: gray 1px solid; BORDER-top: gray 1px solid;"><img width="20" height="300" src="images/Market perspective theme/policy.gif"></td>
        <td colspan="3" style="BORDER-bottom: gray 1px solid; BORDER-top: gray 1px solid; BORDER-right: gray 1px solid;"><img width="296" height="300" src="images/This paper brief introduction/introduction2.gif"></td>
      </tr>
    </tbody></table> 
  <!-- flash -->    
 <div class="clear" style="height:15px;"></div>   
    <table width="349" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC" border="1" style="float:left;">
      <tbody><tr>
        <td colspan="6"><div align="center">
            <object width="342" height="291" id="FLVPlayer" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
              <param value="swf/FLVPlayer_Progressive.swf" name="movie">
              <param value="lt" name="salign">
              <param value="high" name="quality">
              <param value="noscale" name="scale">
              <param value="&amp;MM_ComponentVersion=1&amp;skinName=swf/Halo_Skin_3&amp;streamName=media/Videos3&amp;autoPlay=false&amp;autoRewind=false" name="FlashVars">
              <embed width="342" height="291" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" salign="LT" name="FLVPlayer" scale="noscale" quality="high" flashvars="&amp;MM_ComponentVersion=1&amp;skinName=swf/Halo_Skin_3&amp;streamName=media/Videos3&amp;autoPlay=false&amp;autoRewind=false" src="swf/FLVPlayer_Progressive.swf">
            </object>
          </div></td>
      </tr>
      <tr>
        <td width="30" height="32" style=" BORDER-bottom: gray 2px solid;BORDER-left: gray 2px solid;"><img width="30" height="30" src="images/Web button/Videos digital1.gif"></td>
        <td width="30" style=" BORDER-bottom: gray 2px solid;"><img width="30" height="30" src="images/Web button/Videos digital2.gif"></td>
        <td width="30" style=" BORDER-bottom: gray 2px solid;"><img width="30" height="30" src="images/Web button/Videos digital3.gif"></td>
        <td width="30" style=" BORDER-bottom: gray 2px solid;"><img width="30" height="30" src="images/Web button/Videos digital4.gif"></td>
        <td width="30" style=" BORDER-bottom: gray 2px solid;"><img width="30" height="30" src="images/Web button/Videos digital5.gif"></td>
        <td width="124" style=" BORDER-bottom: gray 2px solid;BORDER-right: gray 2px solid;">AAAAAAAAAAAAAA</td>
      </tr>
    </tbody></table>
    
 <!-- 信息索取 -->
 <table width="334" cellspacing="0" cellpadding="0" border="0" style="float:right;">
      <tbody><tr>
        <td width="101" bgcolor="#CCCCCC" style="BORDER-left: gray 2px solid; BORDER-top: gray 2px solid;"><img width="40" height="43" src="images/icon/Information.gif"></td>
        <td bgcolor="#CCCCCC" colspan="3" style="BORDER-top: gray 2px solid;BORDER-right: gray 2px solid;"><div align="center" class="STYLE4"><span class="STYLE1 STYLE9"><em>信息索取</em></span> </div>
          <div align="center"></div></td>
      </tr>
      <tr>
        <td height="16" style="BORDER-left: gray 1px solid; BORDER-top: gray 1px solid;BORDER-bottom: gray 1px solid;" colspan="3"><div align="left"><span class="STYLE11"><strong>信息分类</strong></span></div></td>
        <td width="190" style="BORDER-right: gray 1px solid; BORDER-top: gray 1px solid;BORDER-bottom: gray 1px solid;"><div align="center"><span class="STYLE11"><strong>信息范例</strong></span></div></td>
      </tr>
      <tr>
        <td height="30" style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;" colspan="2">市场信息</td>
        <td width="31" valign="middle" align="center"><div align="left"><img width="30" height="30" src="images/dingbats/dingbats1.gif"></div></td>
        <td style="BORDER-right: gray 1px solid;">AAAAAAAAAAA</td>
      </tr>
      <tr>
        <td height="30" style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;" colspan="2">管理信息</td>
        <td valign="middle" align="center"><div align="left"><img width="30" height="30" src="images/dingbats/dingbats1.gif"></div></td>
        <td style="BORDER-right: gray 1px solid;">BBBBBBBB</td>
      </tr>
      <tr>
        <td height="30" style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;" colspan="2">法规信息</td>
        <td><div align="left"><img width="30" height="30" src="images/dingbats/dingbats1.gif"></div></td>
        <td style="BORDER-right: gray 1px solid;">CCCCCCCC</td>
      </tr>
      <tr>
        <td height="30" style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;" colspan="2">技术信息</td>
        <td><div align="left"><img width="30" height="30" src="images/dingbats/dingbats1.gif"></div></td>
        <td style="BORDER-right: gray 1px solid;">DDDDDDD</td>
      </tr>
      <tr>
        <td height="30" style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;BORDER-bottom: gray 1px solid;" colspan="2">随机信息</td>
        <td style="BORDER-bottom: gray 1px solid;"><div align="left"><img width="30" height="30" src="images/dingbats/dingbats1.gif"></div></td>
        <td style="BORDER-right: gray 1px solid;BORDER-bottom: gray 1px solid;">EEEEEEEEE</td>
      </tr>
    </tbody></table> 
    <div class="clear" style="height:15px;"></div>
    <img width="310" height="150" src="images/Column-name/The case appreciate.gif" class="case_show">
 
<!-- 助您找到合适的伙伴 -->
<table width="693" cellspacing="0" cellpadding="0" border="0" style=" position:relative;margin-top:10px;">
      <tbody><tr>
        <td bgcolor="#CCCCCC" rowspan="2" style="BORDER-left: gray 2px solid; BORDER-top: gray 2px solid;"><img width="40" height="43" src="images/icon/quick-selection.gif"></td>
        <td bgcolor="#CCCCCC" style=" BORDER-top: gray 2px solid;"></td>
        <td style="BORDER-right: gray 2px solid;BORDER-bottom: gray 1px solid; BORDER-top: gray 2px solid;" rowspan="2"><p align="center" class="STYLE3 STYLE7" span="">助您锁定合作伙伴群</p>
          <p align="center" class="STYLE3 STYLE7" span=""> &#12288;打造业内最佳产业链</p></td>
        <td width="267">&nbsp;</td>
        <td width="7">&nbsp;</td>
        <td width="56">&nbsp;</td>
      </tr>
      <tr>
        <td width="54" 　width="50" style="BORDER-right: gray 1px solid;BORDER-bottom: gray 1px solid; BORDER-top: gray 1px solid;" rowspan="3"><img width="50" height="50" src="images/Web button/To select Chinese digital1.gif"></td>
        <td height="15" 　height="30" style="BORDER-bottom: gray 1px solid;">&nbsp;</td>
        <td height="15" 　height="30" style="BORDER-bottom: gray 1px solid;">&nbsp;</td>
        <td height="15" 　height="30" style="BORDER-bottom: gray 1px solid;">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#CCCCCC" rowspan="12" style="BORDER-left: gray 2px solid;BORDER-bottom: gray 2px solid;"><p align="center" class="STYLE6"><em>迅</em></p>
          <p align="center" class="STYLE6"><em>捷</em></p>
          <p align="center" class="STYLE6"><em>遴</em></p>
          <p align="center" class="STYLE6"><em>选</em></p></td>
        <td width="267" height="30">农、林、牧、渔业</td>
        <td colspan="3" style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;">批发和零售业</td>
      </tr>
      <tr>
        <td height="14">采矿业</td>
        <td colspan="3" style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;">交通运输、仓储和邮政业</td>
      </tr>
      <tr>
        <td rowspan="3" style="BORDER-right: gray 1px solid;"><img width="50" height="50" src="images/Web button/To select Chinese digital2.gif"></td>
        <td height="30">制造业</td>
        <td colspan="3" style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;">住宿和餐饮业</td>
      </tr>
      <tr>
        <td height="30">电力、热力、燃气及水产和供应业</td>
        <td colspan="3" style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;">信息传送、软件和信息技术服务业</td>
      </tr>
      <tr>
        <td height="30">建筑业</td>
        <td colspan="3" style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;">金融业</td>
      </tr>
      <tr>
        <td height="30" colspan="5" style="BORDER-top: gray 1px solid;BORDER-bottom: gray 1px solid;BORDER-right: gray 1px solid;"><span class="STYLE13">选中行业：</span><span class="STYLE15">采矿业</span></td>
      </tr>
      <tr>
        <td height="30" colspan="2" style="BORDER-bottom: gray 1px solid;BORDER-right: gray 1px solid;"><div align="center" class="STYLE11"><strong>推荐企业</strong></div></td>
        <td colspan="3" style="BORDER-bottom: gray 1px solid;BORDER-right: gray 1px solid;"><div align="center" class="STYLE11"><strong>本站企业</strong></div></td>
      </tr>
      <tr>
        <td><img width="50" height="20" src="images/Web button/To select digital left1.gif"></td>
        <td height="30" style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;">永链数据 永链数据 永链数据 永链数据</td>
        <td colspan="2">永链数据 永链数据 永链数据 永链数据</td>
        <td style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;"><img width="50" height="20" src="images/Web button/To select digital right1.gif"></td>
      </tr>
      <tr>
        <td><img width="50" height="20" src="images/Web button/To select digital left2.gif"></td>
        <td height="30" style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;">永链数据 永链数据 永链数据 永链数据</td>
        <td colspan="2">永链数据 永链数据 永链数据 永链数据</td>
        <td style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;"><img width="50" height="20" src="images/Web button/To select digital right2.gif"></td>
      </tr>
      <tr>
        <td><img width="50" height="20" src="images/Web button/To select digital left3.gif"></td>
        <td height="30" style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;">永链数据 永链数据 永链数据 永链数据</td>
        <td colspan="2">永链数据 永链数据 永链数据 永链数据</td>
        <td style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;"><img width="50" height="20" src="images/Web button/To select digital right3.gif"></td>
      </tr>
      <tr>
        <td><img width="50" height="20" src="images/Web button/To select digital left4.gif"></td>
        <td height="30" style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;">永链数据 永链数据 永链数据 永链数据</td>
        <td colspan="2">永链数据 永链数据 永链数据 永链数据</td>
        <td style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;"><img width="50" height="20" src="images/Web button/To select digital right4.gif"></td>
      </tr>
      <tr>
        <td style="BORDER-bottom: gray 1px solid;"><img width="50" height="20" src="images/Web button/To select digital left5.gif"></td>
        <td height="30" style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;BORDER-bottom: gray 1px solid;">永链数据 永链数据 永链数据 永链数据</td>
        <td colspan="2" style="BORDER-bottom: gray 1px solid;">永链数据 永链数据 永链数据 永链数据</td>
        <td style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;BORDER-bottom: gray 1px solid;"><img width="50" height="20" src="images/Web button/To select digital right5.gif"></td>
      </tr>
    </tbody></table>      
 </div>

 <div id="links">
 <h2>友情链接:</h2>
 <ul>
    {foreach from=$link item=item key=key name=link}
    <li><a href="{$item.weburl}" target="_blank"><img width="120" height="40" src="{$item.weblogo}"></a></li> 
	{/foreach}
</ul>

</div>
 </div>
</body>
</html>
