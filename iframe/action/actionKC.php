<?php
function del(){
	//删除
	$del_id=$_POST["id"];
	if($del_id){
		$del_sql="DELETE FROM kc_info WHERE kc_id=".$del_id;
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
		$kc_id = $_POST['id'];
		$kc_name = $_POST['name'];
		$kc_time =$_POST['time'];
		if($kc_id && $kc_name && $kc_time){
			$xj_sql= "INSERT INTO kc_info (kc_id,kc_name,kc_time)
			VALUES('".$kc_id."','".$kc_name."','".$kc_time."')";
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
		$up_id = $_POST['id'];
		$up_name = $_POST['name'];
		$up_time = $_POST['time'];
		global $con;
		if($up_id && $up_name && $up_time){
			$up_sql= "update kc_info set kc_time='$up_time',kc_name='$up_name' where kc_id='$up_id'";
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