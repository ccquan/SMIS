<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome</title>
</head>
<body>
<?php
	session_start();
	if($_SESSION['name']==null||$_SESSION['pass']==null){
		echo "<script type=\"text/javascript\">document.body.innerHTML = \"\";</script>
		<h1 style=\"color:red;position: absolute;left:40%;top: 40%;\"><center>您不具备访问此页面的权利</center></h1>";
	}else{
		echo "<h1 style=\"color:blue;position: absolute;left:40%;top: 40%;\"><center>欢迎：".$_SESSION['name']."</center></h1>";
	
	}
?>
</body>
</html>