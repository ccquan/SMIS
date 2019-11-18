<?php
function del(){
	//删除
	$del_id=$_POST["username"];
	if($del_id){
		$del_sql="DELETE FROM user WHERE username='$del_id'";
		global $con;
		$del_res=mysqli_query($con,$del_sql);
		if($del_res){
			echo "true";
		}else{
			echo "false";
		};
	}else{
		echo "false";
	}
	mysqli_free_result($del_res);
}

function add(){
	//增加
	if(!isset($_POST["submit"])){
        echo("err");
    }else{
		$username = $_POST['username'];
		$password = $_POST['password'];
		if($username && $password){
			$xj_sql= "INSERT INTO user (username,password)
			VALUES('".$username."','".$password."')";
			global $con;
			$res=mysqli_query($con,$xj_sql);
			if($res){
				echo("true");
			}else{
				echo("false");
			}
		}else{
			echo("false");
		}
	}
	mysqli_free_result($res);
}

function update(){
	//修改
		$username = $_POST['username'];
		$password = $_POST['password'];
		global $con;
		if($username){
			$up_sql= "update user set password='$password' where username='$username'";
			$res = mysqli_query($con,$up_sql);
			if($res){
				echo("true");
				mysqli_free_result($res);
			}else{
				echo("false");
			};
		}else{
			echo("false");
		}
	
}


include("../../connect.php");
$action=$_POST["action"];
if($action=="0"){
	//添加
	add();
}else if($action=="1"){
	//删除
	del();
}else if($action=="2"){
	//修改
	update();
};
mysqli_close($con);

?>