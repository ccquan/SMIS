<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>cj</title>
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
	include("../connect.php");
	$td_sql="SELECT kc_name,kc_id FROM kc_info ORDER BY `kc_info`.`kc_id` ASC";
	global $con;
	$res=mysqli_query($con,$td_sql);
	$td_count = mysqli_num_rows($res);
?>
	<div class="container" style="padding-top: 40px;"><!--整个盒子居中-->
			<table class="table table-bordered text-center">
				<tr>
					<td colspan="<?php echo $td_count+3;?>">
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
					<?php
					if($td_count!=0){
						while($tds = mysqli_fetch_row($res)){?>
								<td><?php echo $tds[0];?></td>
					<?php
						}
					}?>
					<td>操作</td>
				</tr>
				<?php
					$res=mysqli_query($con,"SELECT kc_id FROM kc_info ORDER BY `kc_info`.`kc_id` ASC");
					$count=mysqli_num_rows($res);
					$s_sql="";
					if($count!=0){
						while($arr=mysqli_fetch_array($res)){
							for($x=0;$x<count($arr);$x+=2){
								$s_sql.="max(CASE WHEN c.kc_id='$arr[$x]' then c.cj_score else 0 end),";
							}
						}
						$s_sql=chop($s_sql,",");
					}
					//echo $sqql;
					//include("../connect.php");
					$s_sql ="SELECT a.xj_id,a.xj_name,$s_sql
					FROM xj_info a RIGHT JOIN cj_info c ON a.xj_id=c.xj_id
					GROUP by a.xj_id";
					//global $con;
					$res = mysqli_query($con,$s_sql);
					$count = mysqli_num_rows($res);
					if($count!=0){
						while ($arr = mysqli_fetch_array($res)) {
                    		echo "<tr>";
							//echo "<td>$userinfo[0]</td><td>$userinfo[1]</td><td>$userinfo[2]</td><td>$userinfo[3]</td><td>$userinfo[4]</td>";
							$i=0;
							for($y=0;$y<count($arr);$y+=2){
								echo "<td>$arr[$i]</td>";
								$i++;
							}
							echo "<td><button class=\"btn btn-primary btn-xs update\" data-toggle = \"modal\" data-target = \"#updateModal\">修改</button> <button class=\"btn btn-danger btn-xs del\">删除</button></td>";
                    		echo "</tr>";
						}
					}
						
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
			       			<input type="text" placeholder="学号" class="form-control" readonly/>
			       		</div>
			       		<div class="form-group">
			       			<input type="text" placeholder="姓名" class="form-control" readonly/>
			       		</div>
						<?php
						$res=mysqli_query($con,$td_sql);
						if($td_count!=0){
							while($tds = mysqli_fetch_row($res)){?>
								<div class="form-group">
			       					<input type="text" id="<?php echo $tds[1];?>" placeholder = "<?php echo $tds[0];?>" class="form-control"/>
			       				</div>
						<?php
							}
						}
						?>
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
			       			<input type="text" id="tjid" placeholder="学号" class="form-control">
			       		</div>
			       		<div class="form-group">
			       			<input type="text" id="xmname" placeholder="姓名" class="form-control" readonly/>
			       		</div>
						<?php
						$res=mysqli_query($con,$td_sql);
						if($td_count!=0){
							while($tds = mysqli_fetch_row($res)){?>
								<div class="form-group">
			       					<input type="text" id="<?php echo $tds[1];?>" placeholder = "<?php echo $tds[0];?>" class="form-control"/>
			       				</div>
						<?php
							}
						}
						mysqli_free_result($res);
						mysqli_close($con);
						?>
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
				var arrid=[];
				$("#tj").find("input").each(function(){//将input的内容用each方法遍历并用push方法逐个存放到叫arr的数组中
					arrid.push($(this).attr("id"));
					arr.push($(this).val());
					$(this).val("");
				})
				if(arr.includes("")){//判断内容是否为空，否则弹窗"请输入一点东西"
					alert("请输入一点东西");
				}else{//是则加入到table中（表格）并把模态框关闭
					var bb=true;
					for(var i=2;i<arrid.length;i++){
						tijiao(arr[0],arrid[i],arr[i]);
						str+="<td>"+arr[i]+"</td>";
					}
						if(bb){
							str='<tr><td>'+arr[0]+'</td><td>'+arr[1]+'</td>'+str+'<td><button class="btn btn-primary btn-xs update" data-toggle = "modal" data-target = "#updateModal">修改</button><button class="btn btn-danger btn-xs del">删除</button></td></tr>'
							$("table tr:eq(1)").after(str);
							$(".addmd").modal("hide");
						}else{
							alert("添加错误");
						}
				}
					function tijiao(x,y,z){
							$.ajax({
							type:"post",
							url:"action/actionCJ.php",
							data:"action=0&xjid="+x+"&kcid="+y+"&cj="+z+"&submit=1",
							dataType:"text",
							success:function(data){
								if(data.indexOf("true")!=-1){
									bb = true;
								}else{
									bb = false;
								}	
							},
							error: function(){bb = false;}
							});
					}
				
			});
		//添加模态框中 学号失去焦点-->查询学号对应的姓名
		$("#tjid").blur(function(){
			$.ajax({
				type:"post",
				url:"action/actionCJ.php",
				data:"action=3&id="+$(this).val(),
				dataType:"text",
				success:function(data){
					$("#xmname").val(data);
				}
			});
		});
		
		//------------------------------删除----------------------------
		$(document).on("click",".del",function(){//找到点击的类目为del的按钮实现删除
			var a=$(this).parents("tr").find("td")[0];
			var ii=$(this).parents("tr").index()-2;
			$.ajax({
					type:"post",
					url:"action/actionCJ.php",
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
				var arrid=[];
				$("#xg").find("input").each(function(){
					arrid.push($(this).attr("id"));
					arr.push($(this).val());
					$(this).val("");
				});
				if(arr.includes("")){//判断内容是否为空，否则弹窗"请输入一点东西"
					alert("请输入一点东西");
				}else{
					var bb=true;
					for(var i=2;i<arrid.length;i++){
						xgx(arr[0],arrid[i],arr[i]);
					}
					if(bb){
						_this.find("td:not(:last)").each(function(i){//同增加事件，但这里因为有arr[i]所以要在function()括号加个变量i
							$(this).text(arr[i]);
						});
						$(".up").modal("hide");
					}else{
						alert("修改出错~");
					}
					
				}
				function xgx(x,y,z){
					$.ajax({
						type:"post",
						url:"action/actionCJ.php",
						data:"action=2&xjid="+x+"&kcid="+y+"&cj="+z,
						dataType:"text",
						success:function(data){
							if(data.indexOf("true")!=-1){
								bb=true;
							}else{
								bb=false;
							};
						},
						error: function(){bb=false;}
					});
				}
				//隐藏模态框
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
