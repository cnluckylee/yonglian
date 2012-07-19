	var so = new SWFObject('im/plugins/video/P2PClient.swf', 'P2PClient_<?php echo $_POST['swfid'];?>', '214', '400', '9', '#ffffff'); 
	so.addParam("allowScriptAccess", "sameDomain");
	so.addParam("scale", "noscale");
	so.addParam("menu", "false");  
	so.addVariable("swfid","<?php echo $_POST['swfid'];?>");
	so.write("flashcontent_<?php echo $_POST['swfid'];?>");