<?php 
session_start();
// 引入数据库配置文件
include 'config.php';
$title = $_POST['title'];
// 定义数据库语句
$sql = "select * from blog_article where title like '%$title%' order by views desc";
// 发送sql语句
$result = mysql_query($sql);
// 返回结果集
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>文章搜索</title>
		<style>
			*{
				margin:0 auto;
			}
			table{
				width:100%;
			}
			#td1{
				
				background:#cccccc;
				
			}
			tr{
				border:1px solid black;
				text-align:center;
			}
			a{
				color:black;
				text-decoration:none;
			}
			a:hover{
				color:red;
			}
			#navigation{
			width:100%;
			height:44px;
			background:#48525E;
		}
		#navigation_body{
			width:980px;
			height:44px;
		}
		#navigation_left{
			float:left;
			height:44px;
			width:196px;
			background-image: url("images/toplogo.png");
		}
		#navigation_right{
			float:right;
			margin-right:10px;
			line-height: 44px;
			list-style-type:none;
		}
		#navigation_a{
			padding:20;
			color:#DDDDDD;
			font-size:14px;
			text-decoration: none;
		}
		#navigation_a:hover{
			color:white;
		}
		#container{
			padding:10px;
		}
		#button:hover{
			background:#559DFF;
		}
		#button{
			background:#3388FF;
			width:100%;
			height: 44px;
			line-height: 44px;
			font-size:18px;
			color: #fff;
			border: none;
			/*去掉点击后的边框*/
			outline:none;
		}
		</style>
	</head>
	<body>
		<div id="navigation">
		<div id="navigation_body">
			<div id="navigation_left">
			</div>
			<div id="navigation_right">
				<li>
					<?php 
						if(isset($_SESSION['id'])){
							$ses_value = $_SESSION['id'];
							$ses_sql = "select * from blog_user where id = $ses_value";
							$ses_result = mysql_query($ses_sql);
							$ses_row = mysql_fetch_assoc($ses_result);
							echo "<a id='navigation_a' href='main_default.php?uid=$ses_value'>".$ses_row['account']."</a>";
							echo "|";
							echo "<a id='navigation_a' href='unset.php'>退出</a>";
						}
						else{
							echo"
								<a id='navigation_a' href='login.php'>登陆</a>
								|
								<a id='navigation_a' href='sign.php'>注册</a>
							";
						}
						
					 ?>
				</li>
			</div>
		</div>
	</div>
		<div id="container">
		<table>
			<tr>
				<th>文章标题</th>
				<th>发布时间</th>
				<th>浏览次数</th>
				<th>链接</th>
				<br>
			</tr>
			<?php
			// 返回结果集
			$flag = 0;
			while($row = mysql_fetch_assoc($result)){
				if($flag++%2==0){
					$t=date("Y-m-d H:i:s",$row['time']);
					echo "<tr>
						<td id='td1'>".$row['title']."</td>
						<td id='td1'>".$t."</td>	
						<td id='td1'>".$row['views']."</td>	
						<td id='td1'><a href='main.php?id=$row[id]&uid=$row[uid]'>查看文章</a></td>		
						</tr>";
				}
				else{
					$t=date("Y-m-d H:i:s",$row['time']);
					echo "<tr>
						<td id='td2'>".$row['title']."</td>
						<td id='td2'>".$t."</td>	
						<td id='td2'>".$row['views']."</td>	
						<td id='td2'><a href='main.php?id=$row[id]&uid=$row[uid]'>查看文章</a></td>		
						</tr>";
				}
			}
		?>
			
		</table>
		</div>
		<form action="index.php" method="post">
			<input id="button" value="返回搜索" type="submit">
		</form>
	</body>
<ml>
