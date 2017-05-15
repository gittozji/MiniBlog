<!-- main_default.php,需要通过get方法传递博主id（uid）才能正确显示 -->
<?php 
	session_start();
	include'config.php';
	header("content-type:text/html;charset=utf-8");
	/**************** 一个不可少的id user_*****************/
	// 获取博主id
	$user_id = $_GET['uid'];
	/***************** 博主信息 user_********************/
	$user_sql = "select * from blog_user where id = $user_id";
	$user_result = mysql_query($user_sql);
	$user_row = mysql_fetch_assoc($user_result);
	// 传进博主id，返回原创文章数
	function getOriginalCount($user_id){
		$sql = "select count(*) from blog_article where uid = $user_id and comefrom='原创'";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		return $row['count(*)'];
	}
	// 传进博主id，返回转载文章数
	function getRepostCount($user_id){
		$sql = "select count(*) from blog_article where uid = $user_id and comefrom='转载'";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		return $row['count(*)'];
	}
	// 传进博主id，返回翻译文章数
	function getTranslatedCount($user_id){
		$sql = "select count(*) from blog_article where uid = $user_id and comefrom='翻译'";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		return $row['count(*)'];
	}
	// 传进博主id，返回原创文章数
	function getCommentSum($user_id){
		$sql = "select count(*) from blog_comment where aid in(select id from blog_article where uid = $user_id)";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		return $row['count(*)'];
	}
	/******************************************************/

	/***************** 推荐文章 recommend_********************/
	$recommend_sql = "select * from blog_recommend";
	$recommend_result = mysql_query($recommend_sql);
	// 传进文章id，返回文章标题
	function getArticle($id){
		$sql = "select * from blog_article where id = $id";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		return $row['title'];
	}

	// 传进文章id，返回作者id
	function getUser($id){
		$sql = "select * from blog_article where id = $id";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		return $row['uid'];
	}
	/******************************************************/

	/*****************  文章列表 article_list_********************/
	$article_list_sql = "select * from blog_article where uid=$user_id";
	$article_list_result = mysql_query($article_list_sql);
	/******************************************************/

 ?>
<html>
<head>
	<meta charset="UTF-8">
	<title>主页</title>
	<style>
		*{
			margin:0 auto;
			font-family:"宋体";
		}
		.body{
			background-image: url("images/body_bg.jpg");
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
		#navigation_right{
			float:right;
			margin-right:10px;
			line-height: 44px;
			list-style-type:none;
		}
		#navigation_a{
			padding:20px;
			color:#DDDDDD;
			font-size:14px;
			text-decoration: none;
		}
		#navigation_a:hover{
			color:white;
		}
		#navigation_left{
			float:left;
			height:44px;
			width:196px;
			background-image: url("images/toplogo.png");
		}
		#button{
			background-image:url("images/topserch.png");
			width:45px;
			height: 40px;
			line-height: 44px;
			font-size:18px;
			border: none;
			/*去掉点击后的边框*/
			outline:none;
		}
		#button:hover{
			background:white;
		}
		#container{
			width:100%;
			height:100%;
			background-image: url("images/head_bg.jpg");
			background-position-x: 50%;
			background-position-y: 0%;

			background-repeat:no-repeat;
			background-attachment: initial;
			background-origin: initial;
			background-clip: initial;
			background-color: initial;
		}
		#header{
			width: 980px;
			height: 130px;
			padding: 70px 0 70px 0;
			text-align: left;
			font-size:28px;
			font-family:"微软雅黑";
			font-weight:bold;
		}
		#body{
			width:960px;
		}
		#left{
			width:20%;
			height:960px;
			/*border:2px solid blue;*/
			float:left;
		}
		#right{
			width:76%;
			height:100%;
			overflow:hidden;
			border: solid 2px #aaaaaa;
			float:right;
			background:white;
			padding-bottom:30px;
		}
		.left_block_style{
			text-align:left;
			width:100%;
			border:2px solid #aaaaaa;
			overflow:hidden;
			background:white;
			margin-bottom:20px;
		}
		.left_title{
			background-image:url("images/nav_bg.gif");
			font-weight:bold;
			height:24px;
			font-size:13px;
			vertical-align:middle; 
			line-height:24px;
			margin:2px;
		}
		#image{
			margin-top:10px;
			text-align:center;
			font-family:"Arial";
			text-size:10px;
		}
		#cut_off_line{
			margin-top: 20px;
			margin-left: 14px;
			margin-right: 14px;
			border-top: dashed 1px #ccc;
			text-align: left;
		}
		p{
			width:100%;
			overflow:hidden;
			font: normal 14px/26px Arial;
			color:#362e2b;
		}
		#classify_time{
			color: #999;
			font: normal 12px/24px Arial;
			padding-right:20px;
			margin-bottom:50px;
		}

		#statistics1{
			color:#333333;
			font-size:10px;
			margin:10px 10px 10px 20px;
			line-height:24px;
			list-style-type:none;
			text-align:left;
		}
		#statistics2{
			color:#333333;
			font-size:10px;
			margin:10px 10px 10px 20px;
			line-height:24px;
			text-align:left;
		}
		#li{

			width:100%;
			white-space:nowrap;
			overflow:hidden;
			text-overflow:ellipsis;
		}
		#li a{
			color:#333333;
			text-decoration: none;
		}
		#li a:hover{
			color:red;
		}
		#mid{
			width:900px;
			height:40px;
			text-align:right;
		}
		#manager{
			float:right;
			margin-left:20px;
		}
	</style>
</head>
<body class="body">
	<!-- 不包括头部的其他主要部分布局 -->
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
					<!-- <a id="navigation_a" href="login.php">登陆</a>
					<a id="navigation_a" >|</a>
					<a id="navigation_a" href="sign.php">注册</a> -->
				</li>
			</div>
		</div>
	</div>
	<div id="container">
		<!-- 标题，提示是谁的博客 -->
		<div id="header">
			<?php echo $user_row['name']; ?>
		</div>
		<!-- 中间部分 -->
		<div id="mid">
			<form action="manager.php?type=1" method="post">
				<input id="manager" value="管理博客" type="submit">
			</form>
			<form action="index.php" method="post">
				<input id="serch" value="搜索文章" type="submit">
			</form>
		</div>
		<!-- 博客的内容 -->
		<div id="body">
			<!-- 左侧的内容 -->
			<div id="left">
				<div class="left_block_style">
					<div class="left_title">个人资料</div>
					<div id="left_information">
						<p id="image">
							<img style="width:70%;border:2px solid #ddd;" src="images/tx.jpeg" alt="">
							<br>
							<?php echo $user_row['account']; ?>
						</p>
						<div id="cut_off_line"></div>
						<dd id="statistics1">
							<li>原创:&nbsp;&nbsp;<span><?php echo getOriginalCount($user_id); ?>篇</span></li>
							<li>转载:&nbsp;&nbsp;<span><?php echo getRepostCount($user_id); ?>篇</span></li>
							<li>译文:&nbsp;&nbsp;<span><?php echo getTranslatedCount($user_id); ?>篇</span></li>
							<li>评论:&nbsp;&nbsp;<span><?php echo getCommentSum($user_id);?>条</span></li>
						</dd>
					</div>
				</div>
				<div class="left_block_style">
					<div class="left_title">文章列表</div>
					<div id="left_information">
						<dd id="statistics2">
							<?php 
								while($article_list_row = mysql_fetch_assoc($article_list_result)){
									echo "<li id='li'><a href='main.php?id=".$article_list_row['id']."&uid=".$article_list_row['uid']."'>".$article_list_row['title']."</a></li>";
								}
							 ?>
						</dd>
					</div>
				</div>
				<div class="left_block_style">
					<div class="left_title">推荐文章</div>
					<div id="left_information">
						<dd id="statistics2">
							<?php 
								while($recommend_result&&$recommend_row=mysql_fetch_assoc($recommend_result)){
									echo "<li id='li'><a href='main.php?id=".$recommend_row['aid']."&uid=".getuser($recommend_row['aid'])."'>".getArticle($recommend_row['aid'])."</a></li>";
								}
							 ?>
						
						</dd>
					</div>
				</div>
			</div>
			<!-- 右侧的内容 -->
			<div id="right">
				
			</div>
		</div>
	</div>
	
</body>
</html>