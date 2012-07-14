<?php
$cs = Yii::app()->clientScript;
$cs->registerCoreScript('jquery');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link href="<?php echo $this->module->assetsUrl; ?>/style/main.css" rel="stylesheet" type="text/css"/>

		<!--[if IE 6]>
			<script type="text/javascript" src="<?php echo $this->module->assetsUrl; ?>/js/BelatedPNG.js"></script>
		<script type="text/javascript">
			DD_belatedPNG.fix('.png');
			</script>
			<![endif]-->
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		<script language="javascript" src="<?php echo $this->module->assetsUrl; ?>/js/jquery/form/jquery.form.js"></script>
		<script language="javascript">
			if(top!=self)
				if(self!=top) top.location=self.location;
			$(document).ready(function(){
				var outError = function() {
					setTimeout(function() {
						$(".error").fadeOut();
					}, 2000);
				}
		
				loginBoxH = $(document).height()/2 - 100;
				$('#loginBoxShadow').css('margin-top', loginBoxH);
		
				$(".input-item .text-input").val('');
        
				$(".input-item .text-input").focus(function() { $(this).prev().hide();})
				.blur(function() {
					if ($(this).val() == "") {
						$(this).prev().show();
					}
				});
        
       
				if ($("#passwordInput").val() != "") {
					$("#passwordInput").prev().hide();
				}
	
				$("form").ajaxForm({ 
					dataType:'json',
					success:   function (data) { 
						if(data.status) {
							window.location.href = '<?php echo $this->createUrl('index'); ?>';
						} else {
							$('#loginerrors').html(data.info);
							$('#loginerrors').show();
							outError();
						}
					}
				}); 
		
			});
		</script>
		<style>
			html,body{
				background-color:#265780 !important;
			}
			body {
				background: url("<?php echo $this->module->assetsUrl; ?>/images/login/shadow.jpg") no-repeat top center !important;

			}

			.wrapper {
				width: 980px;
				margin: 0 auto;
			}
			#loginBoxShadow {
				width: 980px;
				height: 293px;
				background: url("<?php echo $this->module->assetsUrl; ?>/images/login/loginBox_shadow.png") no-repeat scroll 0 45px transparent;
				position:absolute;
			}
			#think_page_trace {
				display:none !important;
			}
			#loginBox, #loginBox .beta,
			#loginBox .form .input-item, 
			#loginBox .form .login-item .btn
			{
				background: url("<?php echo $this->module->assetsUrl; ?>/images/login/login.png") no-repeat;
			}

			#loginBox {
				position: relative;
				width: 800px;
				height: 104px;
				margin: 0 auto;
			}

			#loginBox .beta {
				display: block;
				position: absolute;
				left: 30px;
				top: -5px;
				width: 56px;
				height: 99px;
				background-position: -2px -105px;
			}

			#loginBox .form {
				margin: 0 0 0 75px;
				zoom: 1;
			}

			#loginBox .error {
				display: block;
				position: absolute;
				left: 77px;
				top: 76px;
				z-index: 1;
				width: 236px;
				padding-left: 15px;
				border: 1px solid #ffdad0;
				background: #fff7f4;
				color: #f94400;
			}

			#loginBox .form .input-item, #loginBox .form .login-item {
				position: relative;
				float: left;
				display: inline;
				height: 42px;
				margin: 29px 17px 0 0;
			}

			#loginBox .form .input-item {
				width: 256px;
				background-position: -347px -105px;
				_background-position: -347px -148px;
			}

			#loginBox .form .input-item label {
				position: absolute;
				left: 18px;
				top: 11px;
				display: block;
				width: 98%;
				color: #728290;
				font-size: 14px;
			}

			#loginBox .form .text-input {
				width: 237px;
				height: 16px;
				line-height: 16px;
				margin: 2px 3px 0 2px;
				padding:10px 0 10px 14px;
				border: none;
				outline: none;
			}

			#loginBox .form .forget-password {
				position: absolute;
				right: 0;
				bottom: -20px;
			}



			#loginBox .form .login-item { width: 100px;}

			#loginBox .form .login-item .btn {
				width: 100px;
				height: 41px;
				border: none;
				background-position: -229px -105px;
				cursor: pointer;
			}
		</style>
	</head>
	<body>
		<div class="wrapper" id="login">
			<div id="loginBoxShadow" class="png">
				<div id="loginBox" class="png">

					<?php
					$form = $this->beginWidget('CActiveForm', array(
						'id' => 'login-form',
						'enableClientValidation' => true,
						'clientOptions' => array(
							'validateOnSubmit' => true,
						),
							));
					?>
					<span id="loginerrors" class="error" style="display:none"></span>
					<div class="form">
						<div class="input-item">
							 <label for="usernameInput">用户名...</label>
							<?php echo $form->textField($model,'username', array('id'=>'usernameInput', 'class'=>'text-input')); ?>
							
						</div>
						<div class="input-item">
							<label for="passwordInput">密码...</label>
							
							<?php echo $form->passwordField($model,'password', array('id'=>'passwordInput', 'class'=>'text-input','value'=>'', 'autocomplete'=>"off")); ?>
							

						</div>

						<div class="login-item">
							<input name="提交" type="submit" class="btn png" id="loginSubmit" value="" />
						</div>
					</div>
					<?php $this->endWidget(); ?>
				</div>
			</div>
		</div>
	</body>
</html>