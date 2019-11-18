﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>学生信息管理系统登陆页面</title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<style type="text/css">
.download{margin:20px 33px 10px;*margin-bottom:30px;padding:5px;border-radius:3px;-webkit-border-radius:3px;-moz-border-radius:3px;background:#e6e6e6;border:1px dashed #df0031;font-size:14px;font-family:Comic Sans MS;font-weight:bolder;color:#555}
.download a{padding-left:5px;font-size:14px;font-weight:normal;color:#555;text-decoration:none;letter-spacing:1px}
.download a:hover{text-decoration:underline;color:#36F}
.download span{float:right}
</style>
</head>

<body>
<?php
	session_start();
	if($_SESSION['name']!=null&&$_SESSION['pass']!=null){
		echo "<script>
					window.location.href='main.php';
              </script>";
	}
?>
<div class="main">
	<div class="header hide">学生信息管理系统</div>
	<div class="content">
		<div class="title hide">管理登录</div>
		<form name="login" action="login.php" method="post">
			<fieldset>
				<div class="input">
					<input class="input_all name" name="name" id="name" placeholder="用户名" type="text" onFocus="this.className='input_all name_now';" onBlur="this.className='input_all name'" maxLength="24" />
				</div>
				<div class="input">
					<input class="input_all password" name="password" id="password" type="password" placeholder="密码" onFocus="this.className='input_all password_now';" onBlur="this.className='input_all password'" maxLength="24" />
				</div>
				<div class="checkbox">
					
				</div>
				<div class="enter">
					<input class="button hide" name="submit" type="submit" value="登录" />
				</div>
			</fieldset>
		</form>
	</div>
</div>
<footer>学生信息管理系统 ©️<?php echo date("Y"); ?> Ahbiao</footer>	
<script type="text/javascript" src="js/placeholder.js"></script>
<!--[if IE 6]>
<script type="text/javascript" src="js/belatedpng.js" ></script>
<script type="text/javascript">
	DD_belatedPNG.fix("*");
</script>
<![endif]--></body>
</html>
