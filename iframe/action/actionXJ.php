<?php
function delXJ(){
	//删除
	$xjdel_id=$_POST["id"];
	if($xjdel_id){
		$xjdel_sql="DELETE FROM xj_info WHERE xj_id=".$xjdel_id;
		global $con;
		$xjdel_res=mysqli_query($con,$xjdel_sql);
		if($xjdel_res){
			echo "true";
		}else{
			echo "false";
		};
	}else{
		echo "false";
	}
	mysqli_free_result($xjdel_res);
}
function addXJ(){
	//增加
	if(!isset($_POST["submit"])){
        echo("err");
    }else{
		$xj_id = $_POST['id'];
		$xj_name = $_POST['name'];
		$xj_sex = $_POST['sex'];
		$bj_id = $_POST['class'];
		global $con;
		if($xj_id && $xj_name && $xj_sex && $bj_id){
			$xj_sql= "INSERT INTO xj_info (xj_id,xj_name,xj_sex,bj_id)
			VALUES('".$xj_id."','".$xj_name."','".$xj_sex."','".$bj_id."')";
			$res = mysqli_query($con,$xj_sql);
			if($res){
			echo("true");
			}else{
				echo("false");
			};
		}else{
			echo("false");
		}
	}
	mysqli_free_result($res);
}

function updateXJ(){
		$up_id = $_POST['id'];
		$up_name = $_POST['name'];
		$up_sex = $_POST['sex'];
		$upbj_id = $_POST['class'];
		global $con;
		if($up_id && $up_name && $up_sex && $upbj_id){
			$up_sql= "update xj_info set xj_name='$up_name',xj_sex='$up_sex',bj_id='$upbj_id' where xj_id='$up_id'";
			$res = mysqli_query($con,$up_sql);
			if($res){
				echo("true");
			}else{
				echo("false");
			};
		}else{
			echo("false");
		}
	mysqli_free_result($res);
}
include("../../connect.php");
$action=$_POST["action"];
if($action=="0"){
	//添加
	addXJ();
}else if($action=="1"){
	//删除
	delXJ();
}else if($action=="2"){
	//修改
	updateXJ();
};
mysqli_close($con);

?>