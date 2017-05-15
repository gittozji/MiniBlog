<?php 
	session_start();
	include'config.php';
	header("content-type:text/html;charset=utf-8");
	$type = $_GET['type'];
	if(!isset($_SESSION['id'])){
		echo '<script type="text/javascript">alert("请先登录!");window.location="login.php";</script>';
		return 0;
	}
 ?>
<html>
<head>
	<meta charset="UTF-8">
	<title>管理博客</title>
	<style>
		*{
			margin:0 auto;
			color:black;
		}
		body{
			background:#F2F2F2;
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
		.head{
			width:960px;
			padding-bottom:5px;
			margin-top:100px;
		}
		span{
			font-size:18px;
			font-family:"宋体";
			font-weight:bold;
		}
		#span a{
			text-decoration:none;
			color:#cccccc;
		}
		#span_f a{
			text-decoration:none;
			color:black;
		}
		span a:hover{
			color:red;
		}
		.body{
			width:960px;
			border:solid 1px #989898;
			padding:20px 10px 50px 10px;
		}
		.wbody{
			width:960px;
			height:100%;
			/*border:solid 1px #989898;*/
		}
		#article{
			width:100%;
			
		}
		#area{
			width:100%;
			height:500px;
			border:solid 1px red;
			margin-bottom:20px;
			margin-top:10px;
		}
		#button{
			float:right;
		}
		#input_title{
			width:300px;
			margin:10px;
		}
		#list_box{
			border:1px solid red;
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
	<div class="head">
		<?php 
			$ss = $_SESSION['id'];
			if($type==1){
				echo "
					<span id='span_f'><a href='manager.php?type=1'>编写博客</a></span>&nbsp;
					<span id='span'><a href='manager.php?type=2'>管理文章</a></span>&nbsp;
					<span id='span'><a href='main_default.php?uid=$ss'>查看博客</a></span>
				";
			}
			if($type==2){
				echo "
					<span id='span'><a href='manager.php?type=1'>编写博客</a></span>&nbsp;
					<span id='span_f'><a href='manager.php?type=2'>管理文章</a></span>&nbsp;
					<span id='span'><a href='main_default.php?uid=$ss'>查看博客</a></span>
				";
			}
			if($type==3){
				echo "
					<span id='span'><a href='manager.php?type=1'>编写博客</a></span>&nbsp;
					<span id='span'><a href='manager.php?type=2'>管理文章</a></span>&nbsp;
					<span id='span_f'><a href='main_default.php?uid=$ss'>查看博客</a></span>
				";
			}
		 ?>
		
	</div>
	<div class="body">
		<?php 
			if($type==1){
				echo"
				<div id='article'>
					<form action='manager_back.php' method='post'>
						<select name='select'>
							<option value='1'>原创</option>
							<option value='2'>转载</option>
							<option value='3'>翻译</option>
						</select>
						<input id='input_title' name='title' placeholder='输入标题' type='text'>
						<br>
						正文部分:
						<textarea id='area' name='content'></textarea>
						<input id='button' value='保存' type='submit'>
					</form>
				</div>
				"
				;
			}
			if($type==2){
				$ses_value = $_SESSION['id'];
				$sql = "select * from blog_article where uid='$ses_value' order by time desc";
				$result = mysql_query($sql);

				echo "<div id='article'><div id='list_box'>";
				echo"<table>
				<tr>
					<th>文章标题</th>
					<th>发布时间</th>
					<th>浏览次数</th>
					<th>操作</th>
					<br>
				</tr>";
				$flag = 0;
				while($row = mysql_fetch_assoc($result)){
					if($flag++%2==0){
						$t=date("Y-m-d H:i:s",$row['time']);
						echo "<tr>
							<td id='td1'>".$row['title']."</td>
							<td id='td1'>".$t."</td>	
							<td id='td1'>".$row['views']."</td>	
							<td id='td1'><a href='article_delete.php?id=$row[id]'>删除文章</a></td>		
							</tr>";
					}
					else{
						$t=date("Y-m-d H:i:s",$row['time']);
						echo "<tr>
							<td id='td2'>".$row['title']."</td>
							<td id='td2'>".$t."</td>	
							<td id='td2'>".$row['views']."</td>	
							<td id='td2'><a href='article_delete.php?id=$row[id]'>删除文章</a></td>		
							</tr>";
					}
				}
				echo "</div></div>";
			}
			if($type==0){
				echo "<div class='wbody'></div>";
			}
		 ?>
		
	</div>
</body>
</html>