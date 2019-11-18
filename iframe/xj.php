<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>xj</title>
	<script src="js/jquery.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.css"/>
	<script type="text/javascript" src="js/bootstrap.js" ></script>
</head>

<body>
<?php
	session_start();
	if(!isset($_SESSION['name'])){
		echo "<script>document.body.innerHTML=\"\";</script>";
		echo "您没有访问权限！";
		//header("refresh:1;url=../welcome.php");
		exit;
	};
?>
	<div class="container" style="padding-top: 40px;"><!--整个盒子居中-->
			<table class="table table-bordered text-center">
				<tr>
					<td colspan="5">
						<div class="form-group">
							<div class="row">
								<div class="col-md-8">
									<input  type="text" class="form-control secbox" placeholder="搜索" />
								</div>
								<div class="col-md-4">
									<button class="btn btn-danger sec" style="background-color: #26F160; border: 1px #26F160 solid; color: #000;">搜索</button><!--搜索确定-->
									<button class="btn btn-default add" data-toggle="modal" data-target="#addModal" style="background-color: #E8E6E6">增加</button>
									<!--data-toggle data-target 属性插入bootstrap事件自带的模态框事件-->
								</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>学号</td>
					<td>姓名</td>
					<td>性别</td>
					<td>班级号</td>
					<td>操作</td>
				</tr>
				<?php
					include("../connect.php");
					$s_sql ="SELECT * FROM `xj_info`  \n"."ORDER BY `xj_info`.`xj_id` ASC";
					global $con;
					$res = mysqli_query($con,$s_sql);
					$count = mysqli_num_rows($res);
					if($count!=0){
						while ($userinfo = mysqli_fetch_array($res)) {
                    		$xj_id= $userinfo["xj_id"];
                    		$name= $userinfo["xj_name"];
                    		$sex= $userinfo["xj_sex"];
                    		$bjid= $userinfo["bj_id"];
                    		echo "<tr>";
							echo "<td>$xj_id</td><td>$name</td><td>$sex</td><td>$bjid</td>";
							echo "<td><button class=\"btn btn-primary btn-xs update\" data-toggle = \"modal\" data-target = \"#updateModal\">修改</button> <button class=\"btn btn-danger btn-xs del\">删除</button></td>";
                    		echo "</tr>";
						}
					};
						mysqli_free_result($res);
						mysqli_close($con);
				?>
			</table>
			<!--修改模态框-->
			<div class="modal fade up" tabindex="-1" role="dialog" id="updateModal">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
					 <h4 class="modal-title">修改</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      </div>
			      <div class="modal-body">
			       	<form id="xg">
			       		<div class="form-group">
			       			<input type="text" placeholder="学号" name="id" class="form-control" readonly/>
			       		</div>
			       		<div class="form-group">
			       			<input type="text" placeholder="姓名" class="form-control" name="name"/>
			       		</div>
						<div class="form-group">
			       			<input type="text" placeholder="性别" class="form-control" name="sex"/>
			       		</div>
						<div class="form-group">
			       			<input type="text" placeholder="班级号" class="form-control" name="class"/>
			       		</div>
			       	</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: #E8E6E6">取消</button>
			        <button type="button" class="btn btn-primary que_update">确定</button><!--确定修改-->
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div>
		</div>
		<!--增加模态框-->
		<div class="modal fade addmd" tabindex="-1" role="dialog" id="addModal">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
					 <h4 class="modal-title">增加</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      </div>
			      <div class="modal-body">
			       	<form id="tj">
			       		<div class="form-group">
			       			<input type="text" placeholder="学号" name="id" class="form-control" />
			       		</div>
			       		<div class="form-group">
			       			<input type="text" placeholder="姓名" class="form-control" name="name"/>
			       		</div>
						<div class="form-group">
			       			<input type="text" placeholder="性别" class="form-control" name="sex"/>
			       		</div>
						<div class="form-group">
			       			<input type="text" placeholder="班级号" class="form-control" name="class"/>
			       		</div>
			       	</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default cancel" data-dismiss="modal" style="background-color: #E8E6E6">取消</button>
			        <button type="button" class="btn btn-primary que_add">确定</button><!--确定添加-->
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div>
	<script>
		//------------------------添加----------------------
	$(".que_add").click(function(){//点开增加按钮弹出的模态框后的确定按钮事件
				var arr=[];
				var str='';
				$("#tj").find("input").each(function(){//将input的内容用each方法遍历并用push方法逐个存放到叫arr的数组中
					arr.push($(this).val());
					$(this).val("");
				})
				if (arr[0]==""||arr[1]==""||arr[2]==""||arr[3]=="") {//判断内容是否为空，否则弹窗"请输入一点东西"
					alert("请输入一点东西");
				} else{//是则加入到table中（表格）并把模态框关闭
					$.ajax({
					type:"post",
					url:"action/actionXJ.php",
					data:"action=0&id="+arr[0]+"&name="+arr[1]+"&sex="+arr[2]+"&class="+arr[3]+"&submit=1",
					dataType:"text",
					success:function(data){
						if(data.indexOf("true")!=-1){
							str='<tr><td>'+arr[0]+'</td><td>'+arr[1]+'</td><td>'+arr[2]+'</td><td>'+arr[3]+'</td><td><button class="btn btn-primary btn-xs update" data-toggle = "modal" data-target = "#updateModal">修改</button><button class="btn btn-danger btn-xs del">删除</button></td></tr>'
						$("table tr:eq(1)").after(str);
						$(".addmd").modal("hide");
						}else{
							alert("添加错误,或学号重复！");
						}	
					},
					error: function(){alert("添加错误!");}
					});
				}
			});
		
		//------------------------------删除----------------------------
		$(document).on("click",".del",function(){//找到点击的类目为del的按钮实现删除
			var a=$(this).parents("tr").find("td")[0];
			var ii=$(this).parents("tr").index()-2;
			$.ajax({
					type:"post",
					url:"action/actionXJ.php",
					data:"action=1&id="+a.innerText,
					dataType:"text",
					success:function(data){
						if(data.indexOf("true")!=-1){
							$(".del:eq("+ii+")").parents("tr").remove();
						}else{
							alert("删除出错~");
						};
					},
					error: function(){alert("删除出错~");}
					});
		});
		//--------------------------------修改--------------------------
		var _this=null;
			$(document).on("click",".update",function(){
				var arrtd=[];
				_this=$(this).parents("tr");//缓存类名为update的父级tr项
				_this.find("td:not(:last)").each(function(){//同增加事件，但这里因为有arr[i]所以要在function()括号加个变量i
					arrtd.push($(this).text());
				});
				$("#xg").find("input").each(function(y){
					$(this).val(arrtd[y]);
				});
			});
			//确定修改
			$(".que_update").click(function(){//同增加事件
				var arr=[];
				$("#xg").find("input").each(function(){
					arr.push($(this).val());
					$(this).val("");
				});
				$.ajax({
					type:"post",
					url:"action/actionXJ.php",
					data:"action=2&id="+arr[0]+"&name="+arr[1]+"&sex="+arr[2]+"&class="+arr[3],
					dataType:"text",
					success:function(data){
						if(data.indexOf("true")!=-1){
							_this.find("td:not(:last)").each(function(i){//同增加事件，但这里因为有arr[i]所以要在function()括号加个变量i
								$(this).text(arr[i]);
							});
						}else{
							alert("修改出错~");
						};
					},
					error: function(){alert("修改出错~");}
					});
				//隐藏模态框
				$(".up").modal("hide");
			});
		//------------------------------搜索----------------------------
		$(".sec").click(function(){//搜索框的点击事件
				var data=$(".secbox").val()
				if (data==0) {//判断搜索框是否为空，是则弹窗"请输入一点东西"
					alert("请输入一点东西")
				}else{//否则搜索内容为搜索框（.secbox）里的内容（val）的项将他的背景颜色改成淡蓝色
					$(".table tr:not(:first):contains("+data+")").css("background","#D9EDF7");
					$('body,html').animate({scrollTop: $(".table tr:not(:first):contains("+data+")").offset().top}, 200);
					$(this).blur(function(){//离开搜索框是变成默认颜色
						$(".secbox").val("");
						$(".table tr").css("background","#fff");
					})
				}
		});
	</script>
</body>
</html>
