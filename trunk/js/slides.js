var zn=$("#slides .scroimg").length;var lw=310;var i=0;var autoplay=null,cplay=null;for(var k=1;k<zn;k++){$("#pagination").append("<span onclick='gopaly("+k+")' onfocus='this.blur();'> </span>");$("#slides img").eq(k).attr("src",$("#slides img").eq(k).attr("lazy"));$("#slides img").eq(k).removeAttr("lazy");}
function scro(dir){if(dir!==i){lw-=95;if(lw<=3){lw=0;};var v=(dir=='n')?1:(dir=='p')?-1:(dir>i)?1:-1;var j=(dir=='n')?((i==zn-1)?0:1+i):(dir=='p')?((i==0)?zn-1:i-1):dir;$("#slides .scroimg").eq(i).css("left",(lw-310)*v);$("#slides .scroimg").eq(j).css("left",lw*v);$("#slides .scrotext").eq(i).css("bottom",lw-310);$("#slides .scrotext").eq(j).css("bottom",-lw);$("#pagination span").eq(i).removeAttr("class")
$("#pagination span").eq(j).attr("class","current");if(lw==0){i=j;lw=310;clearInterval(autoplay);cplay=setTimeout("gopaly('n')",5000);}}}
function gopaly(dir){if(lw==310){clearTimeout(cplay);clearInterval(autoplay);if(dir=="n"){autoplay=setInterval("scro('n')",17)}
else if(dir=="p"){autoplay=setInterval("scro('p')",17)}else{autoplay=setInterval("scro("+dir+")",17)}}};cplay=setTimeout("gopaly('n')",5000);$("#prev").click(function(){gopaly("p");});$("#next").click(function(){gopaly("n");});function check(a,b){$('#'+a+' p').removeAttr("class");$('#'+a+' p').eq(b).attr("class","check");$('#'+a+' ul').css("display","none");$('#'+a+' ul').eq(b).css("display","block");if($('#'+a+' ul:eq('+b+') img:eq(0)').attr("lazy")){for(var i=0;i<8;i++){$('#'+a+' ul:eq('+b+') img:eq('+i+')').attr("src",$('#'+a+' ul:eq('+b+') img:eq('+i+')').attr("lazy"))
$('#'+a+' ul:eq('+b+') img:eq('+i+')').removeAttr("lazy");}}};$("#slides").mouseover(function(){if(lw%310==0||lw==0){clearTimeout(cplay);clearInterval(autoplay);}});$("#slides").mouseout(function(){if(lw%310==0||lw==0){cplay=setTimeout("gopaly('n')",5000);}})