// JavaScript Document
$("#nav li").hover(
		function(){
			clearTimeout(setTimeout("0")-1);
			$("#nav .kind_menu").hide(); 
			$("#nav li .v .sele").attr("class","shutAhover");
			$(this).attr("id","nav_hover")
			$("#nav_hover .v a").attr("class","sele");
			$("#nav_hover .kind_menu").show(); 
		},
		function(){
			
			if($(this).attr("class") != "nav_lishw"){
				$("#nav_hover .v .sele").attr("class","");
				$("#nav_hover .kind_menu").hide(); 
			}
			$(this).attr("id","")
			$("#nav li .v .shutAhover").attr("class","sele");
			setTimeout(function(){
				$(".nav_lishw .kind_menu").show();
				
				$(".nav_lishw .v a").attr("class","sele");
			},50); 
		}
	);