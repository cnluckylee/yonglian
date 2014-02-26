<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sCRApplyLayout.css" />

</style>
<script>//名称、广告、说明、视频翻页控制
function setAab(name,cursel,n){
for(i=1;i<=n;i++){
var menu=document.getElementById(name+i);
var con=document.getElementById("con_"+name+"_"+i);
menu.className=i==cursel?"hover":"";
con.style.display=i==cursel?"block":"none";
}
}
</script>
<script>
//显示内容号码变色控制
var clickNRXS=null;
</script>
<style type="text/css">
/* desSlideshow */
.desSlideshow{background:url(images/loading.gif) no-repeat 50% 50%;}
.desSlideshow .switchBigPic,.desSlideshow .nav{display:none;}
.switchBigPic{width: 780px;height: 500px;float: left;}
</style>
<body>
<link href="css/sCRApplyLayout.css" rel="stylesheet" type="text/css" />
<div id="gjJacket"><!--框架开始-->

<div id="header"><!--头部开始-->
<p>永链擂台&nbsp;&nbsp;&nbsp;&nbsp;企业讲坛&nbsp;&nbsp;&nbsp;&nbsp;凡人闪耀&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;举赛遂意&nbsp;&nbsp;&nbsp;&nbsp;你方战罢&nbsp;&nbsp;&nbsp;&nbsp;我方上场&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;激酣赛事&nbsp;&nbsp;&nbsp;&nbsp;勇者角逐&nbsp;&nbsp;&nbsp;&nbsp;智者胜出</p>
</div><!--头部结束-->

<div id="centers"><!--内容开始-->


<div style="width: 1030px; height: 300px; position: relative; font-family: Verdana,Geneva,sans-serif; border-top: 1px solid rgb(204, 204, 204); overflow: hidden; background: none repeat scroll 0% 0% transparent;" id="desSlideshow1" class="desSlideshow">
		<div style="position: relative; display: block;" class="switchBigPic">
		<?php foreach($apply as $k=>$v):?>
			<div style="position: absolute; overflow: hidden; <?php if($k==0):?>display: block;<?php else:?>display: none;<?php endif;?>">
				<a href="javascript:void(0);" onclick="changedata(<?php echo $v['id'];?>)" ><img style="border: medium none;" class="pic" src="<?php echo $v['imgurl'];?>" alt="<?php echo $v['title'];?>" height="290" width="780"></a>
				<p style="position: absolute; padding: 5px; margin: 0px; bottom: 0px; opacity: 0.6; background-color: rgb(0, 0, 0); color: rgb(255, 255, 255); font-size: 12px; width: 100%;"><strong><?php echo $v['remark'];?></strong><br><?php echo $v['content'];?></p>
			</div>
			<?php endforeach;?>
		</div>
		
		<ul style="margin: 0px; padding: 0px; width: 200px; height: 500px; position: absolute; right: 0px; display: block;float:left" class="navbg">
		<?php foreach($apply as $k=>$v):?>			
			<li style="margin: 0px 0px 0px <?php if($k==0):?>0px<?php else:?>-35px<?php endif;?>; padding: 0px; list-style: none outside none; height: 49px; background-image: url(&quot;images/flash-on.gif&quot;); line-height: 49px; border-bottom: medium none; border-right: 1px solid rgb(204, 204, 204);"><a style="color: rgb(0, 0, 0); text-decoration: none; height: 49px; display: block; padding-left: 25px; font-size: 14px;" href="javascript:void(0);"><?php echo $v['title'];?></a></li>
		<?php endforeach;?>	
		</ul>
	</div>


<div class="s_left">
<p>主办</p>
<p>协办</p>
<p>参赛</p>
</div>

<div class="s_right"><!--广告开始-->
<table width="%" cellspacing="3" cellpadding="0">
  <tr id='tr_banner'>
  <?php foreach($matchquery as $i):?>
    <td><a href="javascript:void(0);" onClick="changeinfo(<?php echo $i['id'];?>)"><img title="<?php echo $i['title'];?>" src="<?php echo $i['imgurl'];?>"width="196" height="107" border="0"/></a></td>
    <?php endforeach;?>
    
  </tr>
</table>
</div><!--广告结束-->

<div class="t_left">
<p class="shuli"><?php echo $matchquery[0]['title'];?></p>
<div class="download">下载</div>
</div>

<div class="t_middle">
<div id="con_sssm_1"><!--赛事1开始-->
<div id="con_ssnra_1"><div id="zxjl"><?php echo $matchquery[0]['subject'];?></div></div>
<div id="con_ssnra_2" style="display:none"><div id="zxjm"><?php echo $matchquery[0]['condition'];?></div></div>
<div id="con_ssnra_3" style="display:none"><div id="zxjn"><?php echo $matchquery[0]['other'];?></div></div>
<div id="nb">
<table width="%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#BEBEBE"><tr>
<td width="100" id="hm"><div align="center" class="STYLE1"id="ssnra1" onclick="setAab('ssnra',1,10)"style="cursor:default">主　旨1</div></td>
<td width="100" id="hm"><div align="center" class="STYLE1"id="ssnra2" onclick="setAab('ssnra',2,10)"style="cursor:default">条　件</div></td>
<td width="100" id="hm"><div align="center" class="STYLE1"id="ssnra3" onclick="setAab('ssnra',3,10)"style="cursor:default">其　它</div></td>
</tr></table></div>
</div><!--赛事1结束-->

<script for="hm" event="onclick">
<!--点击显示内容号码变色控制-->
this.style.color="#ffffff";
this.style.backgroundColor="#f00";
if(clickNRXS!=null)clickNRXS.style.color="";
if(clickNRXS!=null)clickNRXS.style.backgroundColor="";
clickNRXS=this;
</script>
</div>

<div class="t_right" id="video">
赛事视频
</div>

<div class="t">
</div>

</div><!--内容结束-->

</div>
<input type="text" id='hid_json' value='<?php echo $matchqueryjson;?>'>
<script type="text/javascript" charset="utf-8" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.swfobject.1-1-1.min.js"></script>

<script type="text/javascript" src="js/desSlideshow.js"></script>
<script type="text/javascript">
$(function() {

	$("#desSlideshow1").desSlideshow({
		autoplay: 'enable',//选项:enable,disable
		slideshow_width: '1030',//幻灯片窗口宽度
		slideshow_height: '300',//幻灯片窗口的高度
		thumbnail_width: '230',//导航条宽度
		time_Interval: '4000',//以毫秒为单位
		directory: 'images/'// images目录下的flash-on.gif 和 flashtext-bg.jpg 图片
	});
	
});
</script>
<script language="javascript">
$(function () {
		$('#video').flash({
			swf: '<?php echo $matchquery[0]["pdf"];?>',
			height: 353,
			width: 482
		});
});
function changedata(id)
{
	var str ='';
	$.ajax({
				url:'?r=Challenge/Getmatchquery',
				data:{id:id},
				type:'POST',
				dataType:'json',
				success:function(obj){
					if(obj)
					{
						
					$.each(obj,function(i,k){
							str +='<td><a href="javascript:void(0);" onClick="changeinfo('+k.id+')"><img title="'+k.title+'" src="'+k.imgurl+'" width="196" height="107" border="0" /></a></td>';
							if(i==0)
							{
								$('.shuli').text(k.title);
								$('#zxjl').text(k.subject);
								$('#zxjm').text(k.condition);
								$('#zxjn').text(k.other);
							}						
						});
						$('#tr_banner').html(str);
					}else{
						$('.shuli').text("");
								$('#zxjl').text("");
								$('#zxjm').text("");
								$('#zxjn').text("");
						}
				}
		});
}
function changeinfo(id)
{
	var json = $("#hid_json").val();
	var obj=eval("("+json+")"); 
	if(obj)
	{			
		$.each(obj,function(i,k){
			
			if(k.id==id)
			{
				$('.shuli').text(k.title);
				$('#zxjl').text(k.subject);
				$('#zxjm').text(k.condition);
				$('#zxjn').text(k.other);
			}						
		});
						
	}else{
		$('.shuli').text("");
		$('#zxjl').text("");
		$('#zxjm').text("");
		$('#zxjn').text("");
	}

}
</script>