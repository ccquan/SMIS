<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>学生信息管理系统-后台管理</title>
<link rel="shortcut icon" href="favicon.ico" />
<link href="css/main-style.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.12.4.js" type="text/javascript"></script>	
</head>

<body>
<?php
	session_start();
	if($_SESSION['name']==null||$_SESSION['pass']==null){
		
		echo "<script>
					alert('您不具备访问本页面的权限制！');
					window.location.href='index.php';
              </script>";
	}
?>
	<div class="top">
		学生信息管理系统
	</div>
	<div class="box">
		<div class="box-left">
			<div class="box-left-top">
				<span>后台管理</span>
			</div>	
				<ul id="ul01">
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i>学籍信息管理</li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i>班级信息管理</li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i>课程信息管理</li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i>成绩信息管理</li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i>用户管理</li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="login_out.php">退出登录</a></li>
				</ul>
		</div>
		<div class="box-right">
		<div class="box-left-top" style="background-color: #1F79BE">
			<span id="title-right">操作</span>
		</div>
		<div class="box-right-buttom">
			<iframe src="welcome.php" width="100%" height="100%" frameborder="0"></iframe>
		</div>
		</div>
</div>
	<div class="buttom">
	学生信息管理系统 ©️<?php echo date("Y");?> Ahbiao
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$("a").css({"color":"#278181","text-decoration":"none"})
			$("#ul01>li").click(function(){
				var index=$("#ul01>li").index(this);
				for(var i=0;i<4;i++){
					if(index==i){
							$("#title-right").text($("#ul01>li")[i].innerText);
					}
				}
				if(index==0)
					$("iframe").attr("src","iframe/xj.php");
				if(index==1)
					$("iframe").attr("src","iframe/bj.php");
				if(index==2)
					$("iframe").attr("src","iframe/kc.php");
				if(index==3)
					$("iframe").attr("src","iframe/cj.php");
				if(index==4){
					$("iframe").attr("src","iframe/user.php");
					$("#title-right").text($("#ul01>li")[index].innerText);
				}
					
			});
		});
	</script>
</body>
</html>