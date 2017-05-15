<?php 
	include '../config.php';
	$type=$_GET['type'];
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>后台</title>
	<style>
		*{
			margin:0 auto;
		}
		#navigation{
			width:100%;
			height:44px;
			background:#48525E;
			margin-bottom:20px;
		}
		#navigation_body{
			width:980px;
			height:44px;
		}
		#navigation_left{
			float:left;
			height:44px;
			width:70%;
			line-height: 44px;
			font-size:30px;
			color:white;
			font-weight:bold;
		}
		#navigation_right{
			float:right;
			height:44px;
			width:20%;
			line-height: 44px;
			font-size:16px;
			font-weight:bold;
		}
		#navigation_right a{
			color:white;
		}
		#navigation_right a:hover{
			color:#cccccc;
		}
		#big{
			width:960px;
			height:1000px;
			border:solid 1px #cccccc;
			padding:10px;
		}
		#wbig{
			width:960px;
			height:100%;
			/*border:solid 1px #989898;*/
		}
		#top{
			width:100%;
			margin:10px;
		}
		#bottom{
			width:100%;
			border:solid 1px red;
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
		#username:focus{
				border:solid 2px #3388FF;
		}
		#username{
			border:solid 2px #cccccc;
			width:300px;
			height:30px;
			font-weight: normal;
			text-indent: 10px;
			outline: 0;
			background-position-x: 15px;
			background-position-y: 50%;
			background-repeat: no-repeat;
		}
		#username1:focus{
				border:solid 2px #3388FF;
		}
		#username1{
			border:solid 2px #cccccc;
			width:300px;
			height:30px;
			font-weight: normal;
			text-indent: 10px;
			outline: 0;
			background-position-x: 15px;
			background-position-y: 50%;
			background-repeat: no-repeat;
			margin-bottom:10px;
		}
		#button:hover{
		background:#559DFF;
		}
		#button{
			background:#3388FF;
			width:70px;
			height: 34px;
			line-height: 30px;
			font-size:18px;
			color: #fff;
			border: none;
			/*去掉点击后的边框*/
			outline:none;
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
		#span a:hover{
			color:red;
		}
	</style>
</head>
<body>
	<div id="navigation">
		<div id="navigation_body">
			<div id="navigation_left">
				≮后台管理中心≯
			</div>
			<div id="navigation_right">
				<a href="../index.php">返回前台</a>
			</div>
		</div>
	</div>
	<div class="head">
		<?php 
			if($type==0){
				echo"
					<span id='span'><a href='index.php?type=1'>添加推荐文章</a></span>&nbsp;
					<span id='span'><a href='index.php?type=2'>删除推荐文章</a></span>&nbsp;
					<span id='span'><a href='index.php?type=3'>添加友情链接</a></span>&nbsp;
					<span id='span'><a href='index.php?type=4'>删除友情链接</a></span>&nbsp;
					<span id='span'><a href='index.php?type=5'>修改友情链接</a></span>&nbsp;
				";
			}
			if($type==1){
				echo"
					<span id='span_f'><a href='index.php?type=1'>添加推荐文章</a></span>&nbsp;
					<span id='span'><a href='index.php?type=2'>删除推荐文章</a></span>&nbsp;
					<span id='span'><a href='index.php?type=3'>添加友情链接</a></span>&nbsp;
					<span id='span'><a href='index.php?type=4'>删除友情链接</a></span>&nbsp;
					<span id='span'><a href='index.php?type=5'>修改友情链接</a></span>&nbsp;
				";
			}
			if($type==2){
				echo"
					<span id='span'><a href='index.php?type=1'>添加推荐文章</a></span>&nbsp;
					<span id='span_f'><a href='index.php?type=2'>删除推荐文章</a></span>&nbsp;
					<span id='span'><a href='index.php?type=3'>添加友情链接</a></span>&nbsp;
					<span id='span'><a href='index.php?type=4'>删除友情链接</a></span>&nbsp;
					<span id='span'><a href='index.php?type=5'>修改友情链接</a></span>&nbsp;
				";
			}
			if($type==3){
				echo"
					<span id='span'><a href='index.php?type=1'>添加推荐文章</a></span>&nbsp;
					<span id='span'><a href='index.php?type=2'>删除推荐文章</a></span>&nbsp;
					<span id='span_f'><a href='index.php?type=3'>添加友情链接</a></span>&nbsp;
					<span id='span'><a href='index.php?type=4'>删除友情链接</a></span>&nbsp;
					<span id='span'><a href='index.php?type=5'>修改友情链接</a></span>&nbsp;
				";
			}
			if($type==4){
				echo"
					<span id='span'><a href='index.php?type=1'>添加推荐文章</a></span>&nbsp;
					<span id='span'><a href='index.php?type=2'>删除推荐文章</a></span>&nbsp;
					<span id='span'><a href='index.php?type=3'>添加友情链接</a></span>&nbsp;
					<span id='span_f'><a href='index.php?type=4'>删除友情链接</a></span>&nbsp;
					<span id='span'><a href='index.php?type=5'>修改友情链接</a></span>&nbsp;
				";
			}
			if($type==5){
				echo"
					<span id='span'><a href='index.php?type=1'>添加推荐文章</a></span>&nbsp;
					<span id='span'><a href='index.php?type=2'>删除推荐文章</a></span>&nbsp;
					<span id='span'><a href='index.php?type=3'>添加友情链接</a></span>&nbsp;
					<span id='span'><a href='index.php?type=4'>删除友情链接</a></span>&nbsp;
					<span id='span_f'><a href='index.php?type=5'>修改友情链接</a></span>&nbsp;
				";
			}
			if($type==6){
				echo"
					<span id='span'><a href='index.php?type=1'>添加推荐文章</a></span>&nbsp;
					<span id='span'><a href='index.php?type=2'>删除推荐文章</a></span>&nbsp;
					<span id='span'><a href='index.php?type=3'>添加友情链接</a></span>&nbsp;
					<span id='span'><a href='index.php?type=4'>删除友情链接</a></span>&nbsp;
					<span id='span_f'><a href='index.php?type=5'>修改友情链接</a></span>&nbsp;
				";
			}
		 ?>
	</div>
	<div id="big">
		<?php 
			if($type==0){
				echo "<div id='wbody'></div>";
			}
			if($type==1){
				echo"
					<div id='top'>
						<form action='addrecommend_back.php' method='post'>
							<input id='username' name='id' placeholder='输入文章id' type='text'>
							<input id='button' value='添加' type='submit'>
						</form>
					</div>
					<div id='bottom'>
						<table>
							<tr>
								<th>文章id</th>
								<th>文章标题</th>
								<th>文章作者</th>
								<th>发布时间</th>
								<th>浏览次数</th>
								<br>
							</tr>

				";
				$sql = "select * from blog_article order by views desc";
				$result = mysql_query($sql);
				$flag = 0;
				while($row = mysql_fetch_assoc($result)){
					$u_sql = "select account from blog_user where id = '$row[uid]'";
					$u_result = mysql_query($u_sql);
					$u_row = mysql_fetch_assoc($u_result);
					if($flag++%2==0){
						$t=date("Y-m-d H:i:s",$row['time']);
						echo "<tr>
							<td id='td1'>".$row['id']."</td>
							<td id='td1'>".$row['title']."</td>
							<td id='td1'>".$u_row['account']."</td>
							<td id='td1'>".$t."</td>	
							<td id='td1'>".$row['views']."</td>			
							</tr>";
					}
					else{
						$t=date("Y-m-d H:i:s",$row['time']);
						echo "<tr>
							<td id='td2'>".$row['id']."</td>
							<td id='td2'>".$row['title']."</td>
							<td id='td2'>".$u_row['account']."</td>
							<td id='td2'>".$t."</td>	
							<td id='td2'>".$row['views']."</td>			
							</tr>";
					}
				}
				echo "	
					</table>
					</div>
				";
			}
			if($type==2){
				echo"
					<div id='bottom'>
						<table>
							<tr>
								<th>文章id</th>
								<th>文章标题</th>
								<th>文章作者</th>
								<th>发布时间</th>
								<th>浏览次数</th>
								<th	>操作</th>
								<br>
							</tr>

				";
				$sql = "select * from blog_recommend";
				$result = mysql_query($sql);
				$flag = 0;
				while($row = mysql_fetch_assoc($result)){
					$a_sql = "select * from blog_article where id = '$row[aid]'";
					$a_result = mysql_query($a_sql);
					$a_row = mysql_fetch_assoc($a_result);
					$u_sql = "select account from blog_user where id = '$a_row[uid]'";
					$u_result = mysql_query($u_sql);
					$u_row = mysql_fetch_assoc($u_result);
					if($flag++%2==0){
						$t=date("Y-m-d H:i:s",$a_row['time']);
						echo "<tr>
							<td id='td1'>".$row['id']."</td>
							<td id='td1'>".$a_row['title']."</td>
							<td id='td1'>".$u_row['account']."</td>
							<td id='td1'>".$t."</td>	
							<td id='td1'>".$a_row['views']."</td>		
							<td id='td1'><a href='recommend_delete.php?id=$row[id]'>删除文章</a></td>	
							</tr>";
					}
					else{
						$t=date("Y-m-d H:i:s",$a_row['time']);
						echo "<tr>
							<td id='td2'>".$row['id']."</td>
							<td id='td2'>".$a_row['title']."</td>
							<td id='td2'>".$u_row['account']."</td>
							<td id='td2'>".$t."</td>	
							<td id='td2'>".$a_row['views']."</td>		
							<td id='td2'><a href='recommend_delete.php?id=$row[id]'>删除文章</a></td>	
							</tr>";
					}
				}
				echo "	
					</table>
					</div>
				";
			}
			if($type==3){
				echo"
					<div id='top'>
						<form action='link_add_insert.php' method='post'>
							<input id='username1' name='name' placeholder='输入名字' type='text'>
							<br>
							<input id='username1' name='http' placeholder='输入地址' type='text'>
							<br>
							<input id='button' value='添加' type='submit'>
						</form>
					</div>
				";
			}
			if($type==4){
				echo"
					<div id='bottom'>
						<table>
							<tr>
								<th>名字</th>
								<th>地址</th>
								<th>操作</th>
								<br>
							</tr>

				";
				$sql = "select * from blog_link";
				$result = mysql_query($sql);
				$flag = 0;
				while($row = mysql_fetch_assoc($result)){
					if($flag++%2==0){
						echo "<tr>
							<td id='td1'>".$row['name']."</td>
							<td id='td1'>".$row['http']."</td>	
							<td id='td1'><a href='link_delete.php?id=$row[id]'>删除链接</a></td>
							</tr>";
					}
					else{
						echo "<tr>
							<td id='td2'>".$row['name']."</td>
							<td id='td2'>".$row['http']."</td>
							<td id='td2'><a href='link_delete.php?id=$row[id]'>删除链接</a></td>			
							</tr>";
					}
				}
				echo "	
					</table>
					</div>
				";
			}
			if($type==5){
				echo"
					<div id='bottom'>
						<table>
							<tr>
								<th>名字</th>
								<th>地址</th>
								<th>操作</th>
								<br>
							</tr>

				";
				$sql = "select * from blog_link";
				$result = mysql_query($sql);
				$flag = 0;
				while($row = mysql_fetch_assoc($result)){
					if($flag++%2==0){
						echo "<tr>
							<td id='td1'>".$row['name']."</td>
							<td id='td1'>".$row['http']."</td>	
							<td id='td1'><a href='index.php?id=$row[id]&type=6'>修改链接</a></td>
							</tr>";
					}
					else{
						echo "<tr>
							<td id='td2'>".$row['name']."</td>
							<td id='td2'>".$row['http']."</td>
							<td id='td2'><a href='index.php?id=$row[id]&type=6'>修改链接</a></td>
							</tr>";
					}
				}
				echo "	
					</table>
					</div>
				";
			}
			if($type==6){
				$f_id = $_GET['id'];
				$f_sql = "select * from blog_link where id = $f_id";
				$f_result = mysql_query($f_sql);
				$f_row = mysql_fetch_assoc($f_result);
				echo"
				<form action='link_edit_update.php?id=$f_row[id]' method='post'>
							<input id='username1' name='name' value=$f_row[name] type='text'>
							<br>
							<input id='username1' name='http' value=$f_row[http] type='text'>
							<br>
							<input id='button' value='修改' type='submit'>
				</form>
				";
			}
		 ?>
		</div>
	</div>
</body>
<ml>
