function att_show(serverData,file)
{	
	obj = jQuery.parseJSON(serverData);
	var NewLine = "\n";
	var html = "";
	html+="<li imgid=\""+obj.id+"\" imgname=\""+ obj.url +"\">"+NewLine;
	html+="<img src=\""+ UPLOAD_SETTING.imagePath + obj.url +"\">"+NewLine;
	html+="</li>"+NewLine;
	$('#piclist ul').append(html);
}
function att_insert(obj,id)
{
	var uploadfile = $("#attachment_"+id+"> img").attr('path');
	$('#att-status').append('|'+uploadfile);
}

function att_cancel(obj,id,source){
	var src = $(obj).children("img").attr("path");
	var filename = $(obj).children("img").attr("title");
	if($(obj).hasClass('on')){
		$(obj).removeClass("on");
		var imgstr = $("#att-status").html();
		var length = $("a[class='on']").children("img").length;
		var strs = filenames = '';
		for(var i=0;i<length;i++){
			strs += '|'+$("a[class='on']").children("img").eq(i).attr('path');
			filenames += '|'+$("a[class='on']").children("img").eq(i).attr('title');
		}
		$('#att-status').html(strs);
		$('#att-name').html(filenames);
		if(source=='upload') $('#att-status-del').append('|'+id);
	} else {
		$(obj).addClass("on");
		$('#att-status').append('|'+src);
		$('#att-name').append('|'+filename);
		var imgstr_del = $("#att-status-del").html();
		var imgstr_del_obj = $("a[class!='on']").children("img")
		var length_del = imgstr_del_obj.length;
		var strs_del='';
		for(var i=0;i<length_del;i++){strs_del += '|'+imgstr_del_obj.eq(i).attr('imgid');}
		if(source=='upload') $('#att-status-del').html(strs_del);
	}
}
//swfupload functions
function fileDialogStart() {
	
}
function fileQueued(file) {
	if(file!= null){
		try {
			var progress = new FileProgress(file, this.customSettings.progressTarget);
			progress.toggleCancel(true, this);
		} catch (ex) {
			this.debug(ex);
		}
	}
}

function fileDialogComplete(numFilesSelected, numFilesQueued)
{
	try {
		if (this.getStats().files_queued > 0) {
			document.getElementById(this.customSettings.cancelButtonId).disabled = false;
		}
		
		/* I want auto start and I can do that here */
		//this.startUpload();
	} catch (ex)  {
        this.debug(ex);
	}
}
function uploadStart(file)
{
	var progress = new FileProgress(file, this.customSettings.progressTarget);
	progress.setStatus("正在上传请稍后...");
	return true;
}
function uploadProgress(file, bytesLoaded, bytesTotal)
{
	var percent = Math.ceil((bytesLoaded / bytesTotal) * 100);
	var progress = new FileProgress(file, this.customSettings.progressTarget);
	progress.setProgress(percent);
	progress.setStatus("正在上传("+percent+" %)请稍后...");
}
function uploadSuccess(file, serverData)
{
	att_show(serverData,file);
	var progress = new FileProgress(file, this.customSettings.progressTarget);
	progress.setComplete();
	progress.setStatus("文件上传成功");
}
function uploadComplete(file)
{
	if (this.getStats().files_queued > 0)
	{
		 this.startUpload();
	}
}
function uploadError(file, errorCode, message) {
	var msg;
	switch (errorCode)
	{
		case SWFUpload.UPLOAD_ERROR.HTTP_ERROR:
			msg = "上传错误: " + message;
			break;
		case SWFUpload.UPLOAD_ERROR.UPLOAD_FAILED:
			msg = "上传错误";
			break;
		case SWFUpload.UPLOAD_ERROR.IO_ERROR:
			msg = "服务器 I/O 错误";
			break;
		case SWFUpload.UPLOAD_ERROR.SECURITY_ERROR:
			msg = "服务器安全认证错误";
			break;
		case SWFUpload.UPLOAD_ERROR.FILE_VALIDATION_FAILED:
			msg = "附件安全检测失败，上传终止";
			break;
		case SWFUpload.UPLOAD_ERROR.FILE_CANCELLED:
			msg = '上传取消';
			break;
		case SWFUpload.UPLOAD_ERROR.UPLOAD_STOPPED:
			msg = '上传终止';
			break;
		case SWFUpload.UPLOAD_ERROR.UPLOAD_LIMIT_EXCEEDED:
			msg = '单次上传文件数限制为 '+swfu.settings.file_upload_limit+' 个';
			break;
		default:
			msg = message;
			break;
		}
	var progress = new FileProgress(file,this.customSettings.progressTarget);
	progress.setError();
	progress.setStatus(msg);
}

function fileQueueError(file, errorCode, message)
{
	var errormsg;
	switch (errorCode) {
	case SWFUpload.QUEUE_ERROR.ZERO_BYTE_FILE:
		errormsg = "请不要上传空文件";
		break;
	case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
		errormsg = "队列文件数量超过设定值";
		break;
	case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
		errormsg = "文件尺寸超过设定值";
		break;
	case SWFUpload.QUEUE_ERROR.INVALID_FILETYPE:
		errormsg = "文件类型不合法";
	default:
		errormsg = '上传错误，请与管理员联系！';
		break;
	}

	var progress = new FileProgress('file',this.customSettings.progressTarget);
	progress.setError();
	progress.setStatus(errormsg);

}

