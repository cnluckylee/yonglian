<?php $this->pageTitle=Yii::app()->name; ?>
<!--Main Start-->

<script type="text/javascript">
function MM_CheckFlashVersion(reqVerStr,msg){
  with(navigator){
    var isIE  = (appVersion.indexOf("MSIE") != -1 && userAgent.indexOf("Opera") == -1);
    var isWin = (appVersion.toLowerCase().indexOf("win") != -1);
    if (!isIE || !isWin){  
      var flashVer = -1;
      if (plugins && plugins.length > 0){
        var desc = plugins["Shockwave Flash"] ? plugins["Shockwave Flash"].description : "";
        desc = plugins["Shockwave Flash 2.0"] ? plugins["Shockwave Flash 2.0"].description : desc;
        if (desc == "") flashVer = -1;
        else{
          var descArr = desc.split(" ");
          var tempArrMajor = descArr[2].split(".");
          var verMajor = tempArrMajor[0];
          var tempArrMinor = (descArr[3] != "") ? descArr[3].split("r") : descArr[4].split("r");
          var verMinor = (tempArrMinor[1] > 0) ? tempArrMinor[1] : 0;
          flashVer =  parseFloat(verMajor + "." + verMinor);
        }
      }
      // WebTV has Flash Player 4 or lower -- too low for video
      else if (userAgent.toLowerCase().indexOf("webtv") != -1) flashVer = 4.0;

      var verArr = reqVerStr.split(",");
      var reqVer = parseFloat(verArr[0] + "." + verArr[2]);
  
      if (flashVer < reqVer){
        if (confirm(msg))
          window.location = "http://www.macromedia.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash";
      }
    }
  } 
}
</script>
</head>

<body onload="MM_CheckFlashVersion('7,0,0,0','本页内容需要使用较新的 Macromedia Flash Player 版本。是否现在下载它？');">
<div style="width: 1030px; margin: 0pt auto; position: relative; height: 2500;">
<div id="Layer1">
  <table width="430" border="0" cellpadding=0 cellspacing=0>
    <tr>
      <td width="65" height="18">桌面快捷</td>
      <td width="65">用户注册</td>
      <td width="65">企业公告</td>
      <td width="65">永链数据</td>
      <td width="65">联系我们</td>
      <td width="65">招贤纳士</td>
    </tr>
  </table>
</div>
<div id="Layer2">
  <div id="Layer3">
    <div id="Layer22">
      <table width="80" height="50" border="0"cellpadding=0 cellspacing=0>
        <tr>
          <td width="40" height="44"><img src="images/button15.png" width="40" height="40" /></td>
          <td width="40"><img src="images/button16.png" width="40" height="40" /></td>
        </tr>
      </table>
    </div>
    <img src="images/the-company-poster1.gif" width="690" height="220" /></div>
  <div id="Layer4">
    <table width="640" border="0"cellpadding=0 cellspacing=0　bgcolor=white>
      <tr>
        <td width="80" height="30" bgcolor="#666666"><span class="STYLE3">企业全貌</span></td>
        <td width="80" bgcolor="#666666"><span class="STYLE3">管理经典</span></td>
        <td width="80" bgcolor="#666666"><span class="STYLE3">用户之窗</span></td>
        <td width="80" bgcolor="#666666"><span class="STYLE3">永链擂台</span></td>
        <td width="80" bgcolor="#666666"><span class="STYLE3">永链数据</span></td>
        <td width="80" bgcolor="#666666">&nbsp;</td>
        <td width="80" bgcolor="#666666">&nbsp;</td>
        <td width="80" bgcolor="#666666">&nbsp;</td>
      </tr>
      <tr>
        <td height="30" colspan="8" bgcolor="#CCCCCC" >　　　　　　　<span class="STYLE4">　专家新论 管理技术 管理案例 永链观点</span></td>
        </tr>
    </table>
  </div>
  <div id="Layer5">
    <table width="259" height="200" border="0"cellpadding=1 cellspacing=1>
      <tr>
        <td colspan="2"><form id="form1" name="form1" method="post" action="">
          <label>
            　　　　
            <input type="radio" name="radiobutton" value="radiobutton" />
            </label>
        企业 
        <label>

        <input type="radio" name="radiobutton" value="radiobutton" />
        </label>
        个人
        </form>        </td>
        </tr>
      <tr>
        <td width="61">用户名：</td>
        <td width="182"style="BORDER-left: blue 1px solid;BORDER-right: blue 1px solid; BORDER-top: blue 1px solid;BORDER-bottom: blue 1px solid;">&nbsp;</td>　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　      </tr>
      <tr>
        <td>密　码：</td>
        <td style="BORDER-left: blue 1px solid;BORDER-right: blue 1px solid; BORDER-top: blue 1px solid;BORDER-bottom: blue 1px solid;">&nbsp;</td>
      </tr>
      <tr>
        <td height="16" colspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td colspan="2"><div align="center"><img src="images/button1.gif" width="140" height="30" /></div></td>
        </tr>
      <tr>
        <td colspan="2"><div align="center"><img src="images/button2.gif" width="140" height="30" /></div></td>
        </tr>
      <tr>
        <td height="40" colspan="2"><span class="STYLE5">热线电话：400-800-400-800</span></td>
        </tr>
    </table>
  </div>
  <img src="images/site-title1.gif" width="1010" height="350" /></div>
<div id="Layer6"><img src="images/site-title2.gif" width="280" height="60" /></div>

<div id="Layer7">
  <table width="690" border="0"cellpadding=0 cellspacing=0>
    <tr>
      <td width="40" rowspan="2"><img src="images/update-icon1.gif" width="40" height="43" /></td>
      <td height="18" colspan="3" valign="bottom"><span class="STYLE14">您曾经关注过的更新了。。。</span></td>
      <td width="85">&nbsp;</td>
      <td width="34">&nbsp;</td>
      <td width="81" rowspan="2"><div align="center"><img src="images/Navigation-button1.gif" width="43" height="43" /></div></td>
      <td width="94" rowspan="2"><div align="center"><img src="images/Navigation-button2.gif" width="43" height="43" /></div></td>
      <td width="101" rowspan="2"><div align="center"><img src="images/Navigation-button3.gif" width="43" height="43" /></div></td>
    </tr>
    <tr>
      <td height="14" colspan="3" valign="top"><hr size="9"color="#999999"/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td style="BORDER-left: gray 1px solid;BORDER-bottom: gray 1px solid; BORDER-top: gray 1px solid;"rowspan="5" bgcolor="#CCCCCC"><p align="center" class="STYLE9">每</p>
        <p align="center" class="STYLE9">日</p>
        <p align="center" class="STYLE9">更</p>
        <p align="center" class="STYLE9">新</p></td>
      <td style="BORDER-top: gray 1px solid;"width="85" height="40">企业秀台</td>
      <td style="BORDER-top: gray 1px solid;"width="85">专家新论</td>
      <td style="BORDER-top: gray 1px solid;"width="85">政策精选</td>
      <td style="BORDER-top: gray 1px solid;">政策精选</td>
      <td align="center" valign="middle" style="BORDER-top: gray 1px solid;BORDER-left: gray 1px solid;"><img src="images/symbol1.gif" width="20" height="40" /></td>
      <td colspan="3" style="BORDER-top: gray 1px solid;BORDER-right: gray 1px solid;">AAAAAAAAAAAAA</td>
    </tr>
    <tr>
      <td height="40">企业动态</td>
      <td>管理技术</td>
      <td>永链概况</td>
      <td>永链概况</td>
      <td align="center" valign="middle" style="BORDER-left: gray 1px solid;"><img src="images/symbol1.gif" width="20" height="40" /></td>
      <td colspan="3" style="BORDER-right: gray 1px solid;">BBBBBBBBBBBBBBB</td>
    </tr>
    <tr>
      <td height="40">携手发展</td>
      <td>管理案例</td>
      <td>管理案例</td>
      <td>管理案例</td>
      <td align="center" valign="middle" style="BORDER-left: gray 1px solid;"><img src="images/symbol1.gif" width="20" height="40" /></td>
      <td colspan="3" style="BORDER-right: gray 1px solid;">CCCCCCCCC</td>
    </tr>
    <tr>
      <td height="40">舵主风采</td>
      <td>永链观点</td>
      <td>永链观点</td>
      <td>永链观点</td>
      <td align="center" valign="middle" style="BORDER-left: gray 1px solid;"><img src="images/symbol1.gif" width="20" height="40" /></td>
      <td colspan="3" style="BORDER-right: gray 1px solid;">DDDDDDDDDDDDD</td>
    </tr>
    <tr>
      <td style="BORDER-bottom: gray 1px solid;"height="40">团队闪耀</td>
      <td style="BORDER-bottom: gray 1px solid;">团队闪耀</td>
      <td style="BORDER-bottom: gray 1px solid;">团队闪耀</td>
      <td style="BORDER-bottom: gray 1px solid;">团队闪耀</td>
      <td align="center" valign="middle" style="BORDER-bottom: gray 1px solid;BORDER-left: gray 1px solid;"><img src="images/symbol1.gif" width="20" height="40" /></td>
      <td colspan="3" style="BORDER-right: gray 1px solid;BORDER-bottom: gray 1px solid;">EEEEEEEEEEEEEEEE</td>
    </tr>
  </table>
</div>

<div id="Layer8">
  <table width="693" border="0"cellpadding=0 cellspacing=0>
    <tr>
      <td width="41" height="43" rowspan="2"><img src="images/market-insights-icon2.gif" width="40" height="43" /></td>
      <td><span class="STYLE14">直击市场焦点 辨析利弊得失</span></td>
      <td width="20">&nbsp;</td>
      <td width="20">&nbsp;</td>
      <td width="102" rowspan="2"><div align="center"><img src="images/Navigation-button4.gif" width="40" height="43" /></div></td>
      <td width="102" rowspan="2"><div align="center"><img src="images/Navigation-button5.gif" width="40" height="43" /></div></td>
      <td width="102" rowspan="2"><div align="center"><img src="images/Navigation-button6.gif" width="40" height="43" /></div></td>
    </tr>
    <tr>
      <td height="14"><hr size="9"color="#999999"/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td style="BORDER-left: gray 1px solid;BORDER-bottom: gray 1px solid; BORDER-top: gray 1px solid;"width="41" height="304" bgcolor="#CCCCCC"><p align="center" class="STYLE9">市</p>
        <p align="center" class="STYLE9">场</p>
        <p align="center" class="STYLE9">透</p>
        <p align="center" class="STYLE9">视</p></td>
      <td style="BORDER-bottom: gray 1px solid; BORDER-top: gray 1px solid;"width="306" height="304"><img src="images/theme-introduction1.gif" width="284" height="300" /></td>
      <td style="BORDER-bottom: gray 1px solid; BORDER-top: gray 1px solid;"width="20" height="304"><img src="images/column-theme1.gif" width="20" height="300" /></td>
      <td style="BORDER-bottom: gray 1px solid; BORDER-top: gray 1px solid;"width="20" height="304"><img src="images/column-theme2.gif" width="20" height="300" /></td>
      <td style="BORDER-bottom: gray 1px solid; BORDER-top: gray 1px solid; BORDER-right: gray 1px solid;"colspan="3"><img src="images/theme-introduction2.gif" width="296" height="300" /></td>
      </tr>
  </table>
</div>

<div id="Layer9">
  <table width="329" border="0"cellpadding=0 cellspacing=0>
    <tr>
      <td width="51" height="43" rowspan="2"><img src="images/Information-icon4.gif" width="40" height="43" /></td>
      <td colspan="2"><hr width="50"size="3"color="#999999"/></td>
      <td style="BORDER-right: gray 1px solid; BORDER-top: gray 1px solid;"width="188" rowspan="2" bgcolor="#CCCCCC"><div align="center"><span class="STYLE9">信息索取</span></div></td>
    </tr>
    <tr>
      <td height="18" colspan="2"><hr width="50"size="9"color="#999999"/></td>
      </tr>
    <tr>
      <td height="57"colspan="3" style="BORDER-left: gray 1px solid; BORDER-top: gray 1px solid;BORDER-bottom: gray 1px solid;"><div align="left"><span class="STYLE11">信息分类</span></div></td>
      <td style="BORDER-right: gray 1px solid; BORDER-top: gray 1px solid;BORDER-bottom: gray 1px solid;"><div align="center"><span class="STYLE11">信息范例</span></div></td>
    </tr>
    <tr>
      <td height="40"colspan="2" style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;">市场信息</td>
      <td width="20" align="center" valign="middle"><div align="center"><img src="images/symbol1.gif" width="20" height="40" /></div></td>
      <td style="BORDER-right: gray 1px solid;">AAAAAAAAAAA</td>
    </tr>
    <tr>
      <td height="45"colspan="2" style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;">管理信息</td>
      <td align="center" valign="middle"><div align="left"></div>
        <img src="images/symbol1.gif" width="20" height="40" /></td>
      <td style="BORDER-right: gray 1px solid;">BBBBBBBB</td>
    </tr>
    <tr>
      <td height="40"colspan="2" style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;">法规信息</td>
      <td><div align="center"><img src="images/symbol1.gif" width="20" height="40" /></div></td>
      <td style="BORDER-right: gray 1px solid;">CCCCCCCC</td>
    </tr>
    <tr>
      <td height="40"colspan="2" style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;">技术信息</td>
      <td><div align="center"><img src="images/symbol1.gif" width="20" height="40" /></div></td>
      <td style="BORDER-right: gray 1px solid;">DDDDDDD</td>
    </tr>
    <tr>
      <td height="50"colspan="2" style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;BORDER-bottom: gray 1px solid;">随机信息</td>
      <td style="BORDER-bottom: gray 1px solid;"><div align="center"><img src="images/symbol1.gif" width="20" height="40" /></div></td>
      <td style="BORDER-right: gray 1px solid;BORDER-bottom: gray 1px solid;">EEEEEEEEE</td>
    </tr>
  </table>
</div>
<div id="Layer10">
  <table width="349" border="1" cellpadding=0 cellspacing=0 bordercolor="#CCCCCC">
    <tr>
      <td colspan="2"><div align="center">
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="342" height="291" id="FLVPlayer">
          <param name="movie" value="FLVPlayer_Progressive.swf" />
          <param name="salign" value="lt" />
          <param name="quality" value="high" />
          <param name="scale" value="noscale" />
          <param name="FlashVars" value="&MM_ComponentVersion=1&skinName=Halo_Skin_3&streamName=media/Videos3&autoPlay=false&autoRewind=false" />
          <embed src="FLVPlayer_Progressive.swf" flashvars="&MM_ComponentVersion=1&skinName=Halo_Skin_3&streamName=media/Videos3&autoPlay=false&autoRewind=false" quality="high" scale="noscale" width="342" height="291" name="FLVPlayer" salign="LT" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />        
</object>
      </div></td>
      </tr>
    <tr>
      <td width="106" height="20" >　<span class="STYLE11">1 2 3 4 5</span> </td>
      <td width="237">AAAAAAAAAAAAAA</td>
    </tr>
  </table>
</div>

<div id="Layer11">
  <table width="693" border="0"cellpadding=0 cellspacing=0>
    <tr>
      <td width="40" height="43" rowspan="2"><img src="images/quick-selection-icon4.gif" width="40" height="43" /></td>
      <td colspan="2"><hr size="3" color="#999999" /></td>
      <td width="256">&nbsp;</td>
      <td width="1">&nbsp;</td>
      <td width="50">&nbsp;</td>
    </tr>
    <tr>
      <td width="50" rowspan="3" style="BORDER-right: gray 1px solid;BORDER-bottom: gray 1px solid; BORDER-top: gray 1px solid;"　width="50"><img src="images/button3.gif" width="50" height="50" /></td>
      <td height="35" colspan="4" style="BORDER-bottom: gray 1px solid;BORDER-right: gray 1px solid; BORDER-top: gray 1px solid;"　height="30"><span class="STYLE14">助您锁定合作伙伴群 　打造业内最佳产业链</span></td>
      </tr>
    <tr>
      <td style="BORDER-left: gray 1px solid;BORDER-bottom: gray 1px solid;"rowspan="12" bgcolor="#CCCCCC"><p align="center" class="STYLE9">迅</p>
        <p align="center" class="STYLE9">捷</p>
        <p align="center" class="STYLE9">遴</p>
        <p align="center" class="STYLE9">选</p></td>
      <td width="256" height="30">农、林、牧、渔业</td>
      <td style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;"colspan="3">批发和零售业</td>
      </tr>
    <tr>
      <td height="30">采矿业</td>
      <td style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;"colspan="3">交通运输、仓储和邮政业</td>
      </tr>
    <tr>
      <td style="BORDER-right: gray 1px solid;"rowspan="3"><img src="images/button4.gif" width="50" height="50" /></td>
      <td height="30">制造业</td>
      <td style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;"colspan="3">住宿和餐饮业</td>
      </tr>
    <tr>
      <td height="30">电力、热力、燃气及水产和供应业</td>
      <td style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;"colspan="3">信息传送、软件和信息技术服务业</td>
      </tr>
    <tr>
      <td height="30">建筑业</td>
      <td style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;"colspan="3">金融业</td>
      </tr>
    <tr>
      <td style="BORDER-top: gray 1px solid;BORDER-bottom: gray 1px solid;BORDER-right: gray 1px solid;"height="30" colspan="5"><span class="STYLE13">选中行业：</span><span class="STYLE15">采矿业</span></td>
      </tr>
    <tr>
      <td style="BORDER-bottom: gray 1px solid;BORDER-right: gray 1px solid;"height="30" colspan="2"><div align="center" class="STYLE11">推荐企业</div></td>
      <td style="BORDER-bottom: gray 1px solid;BORDER-right: gray 1px solid;"colspan="3"><div align="center" class="STYLE11">本站企业</div></td>
    </tr>
    <tr>
      <td><img src="images/button5.gif" width="50" height="20" /></td>
      <td style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;"height="30">永链数据 永链数据 永链数据 永链数据</td>
      <td colspan="2">永链数据 永链数据 永链数据 永链数据</td>
      <td style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;"><img src="images/button10.gif" width="50" height="20" /></td>
    </tr>
    <tr>
      <td><img src="images/button6.gif" width="50" height="20" /></td>
      <td style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;"height="30">永链数据 永链数据 永链数据 永链数据</td>
      <td colspan="2">永链数据 永链数据 永链数据 永链数据</td>
      <td style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;"><img src="images/button11.gif" width="50" height="20" /></td>
    </tr>
    <tr>
      <td><img src="images/button7.gif" width="50" height="20" /></td>
      <td style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;"height="30">永链数据 永链数据 永链数据 永链数据</td>
      <td colspan="2">永链数据 永链数据 永链数据 永链数据</td>
      <td style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;"><img src="images/button12.gif" width="50" height="20" /></td>
    </tr>
    <tr>
      <td><img src="images/button8.gif" width="50" height="20" /></td>
      <td style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;"height="30">永链数据 永链数据 永链数据 永链数据</td>
      <td colspan="2">永链数据 永链数据 永链数据 永链数据</td>
      <td style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;"><img src="images/button13.gif" width="50" height="20" /></td>
    </tr>
    <tr>
      <td style="BORDER-bottom: gray 1px solid;"><img src="images/button9.gif" width="50" height="20" /></td>
      <td style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;BORDER-bottom: gray 1px solid;"height="30">永链数据 永链数据 永链数据 永链数据</td>
      <td style="BORDER-bottom: gray 1px solid;"colspan="2">永链数据 永链数据 永链数据 永链数据</td>
      <td style="BORDER-left: gray 1px solid;BORDER-right: gray 1px solid;BORDER-bottom: gray 1px solid;"><img src="images/button14.gif" width="50" height="20" /></td>
    </tr>
  </table>
</div>


<!--Main End-->