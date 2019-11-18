<?php
function del(){
	//删除
	$del_id=$_POST["id"];
	if($del_id){
		$del_sql="DELETE FROM bj_info WHERE bj_id=".$del_id;
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
		$bj_id = $_POST['id'];
		$bj_name = $_POST['name'];
		$bj_teacher =$_POST['teacher'];
		global $con;
		if($bj_id&& $bj_name && $bj_teacher){
			$sql= "INSERT INTO bj_info (bj_id,bj_name,bj_teacher)
			VALUES('$bj_id','$bj_name','$bj_teacher')";
			$res=mysqli_query($con,$sql);
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
		$up_teacher = $_POST['teacher'];
		global $con;
		if($up_id && $up_name && $up_teacher){
			$up_sql= "update bj_info set bj_name='$up_name',bj_teacher='$up_teacher' where bj_id='$up_id'";
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