<?php
    $server="localhost";//主机
    $db_username="root";//你的数据库用户名
    $db_password="";//你的数据库密码
    $con = mysqli_connect($server,$db_username,$db_password,'student');//链接数据库
	mysqli_query($con,"SET NAMES 'UTF8'"); 
    if(!$con){
        die("can't connect".mysqli_connect_error() );//如果链接失败输出错误	
    }
    
   // mysql_select_db('student',$con);//选择数据库（我的是test）
?>