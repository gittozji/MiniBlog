<!-- main.php,需要通过get方法传递博主id（uid）和文章id（id）才能正确显示 -->
<?php 
	session_start();
	include'config.php';
	header("content-type:text/html;charset=utf-8");
	/**************** 两个不可少的id user_*****************/
	// 获取博主id
	$user_id = $_GET['uid'];
	// 获取显示文章的id
	$article_id = $_GET['id'];
	// 该文章阅读次数加一
	$auto_sql = "update blog_article set views = views+1 where id=$article_id;";
	mysql_query($auto_sql);

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

	/***************** 文章内容 article_********************/
	
	$article_sql = "select * from blog_article where id=$article_id";
	$article_result = mysql_query($article_sql);
	$article_row = mysql_fetch_assoc($article_result);
	// 传进int型时间，返回字符串时间
	function getTime($time){
		$str = date("Y-m-d H:i:s",$time);
		return $str;
	}
	// 传进文章id，返回评论数
	function getCommentCount($id){
		$sql = "select count(*) from blog_comment where aid = $id";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		return $row['count(*)'];
	}
	/******************************************************/

	/*****************  文章列表 article_list_********************/
	$article_list_sql = "select * from blog_article where uid=$user_id";
	$article_list_result = mysql_query($article_list_sql);
	/******************************************************/

	/*****************  文章评论 comment_********************/
	$comment_sql = "select * from blog_comment where aid=$article_id";
	$comment_result = mysql_query($comment_sql);	
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
			padding-bottom:64px;
			min-height:100%;
			height:auto;
			height:100%;
			width:100%;
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
			/*border:2px solid blue;*/
			float:left;
			margin-bottom:60px;
		}
		#right{
			width:76%;
			overflow:hidden;
			border: solid 2px #aaaaaa;
			float:right;
			background:white;
			padding-bottom:30px;
			margin-bottom:60px;
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
		#text{
			background:white;
			padding:10px 10px 50px 10px;
			/*border:solid 2px blue;*/
		}
		#comment_count{
			padding:0 10px;
			color:#333;
			width:100%;
			height:30px;
			font: bold 12px/30px Arial;
			/*边框削圆*/
			/*border-radius: 7px;*/
			/*文字做边距*/
			text-indent: 5px;
			background-image:url("images/tit_bg.gif");
		}
		.comment{
			margin:5px 0 10px 0;
			width:100%;
			overflow:hidden;
		}
		#source{
			vertical-align: middle;
		}
		#text_title{
			width: 100%;
			overflow:hidden;
			padding: 30px 0 0 30px;
			text-align: left;
			font-size:20px;
			font-family:"微软雅黑";
		}
		p{
			width:100%;
			overflow:hidden;
			font: normal 14px/26px Arial;
			color:#362e2b;
		}
		#classify_time{
			color: #ffffff;
			font: normal 12px/24px Arial;
			padding-right:20px;
			margin-bottom:50px;
		}
		#time{
			font-size:10px;
			text-align:right;
		}
		#time a{
			text-decoration:none;
			color:#FF7124;
		}
		#time a:hover{
			color:red;
		}
		#classify{
			font-size:10px;
			float:left;
		}
		#comment_time{
			margin:0 5px 0 5px;
			color:#333;
			font:normal 12px/26px Arial;
			border-radius: 4px;
			background:#F1F1F1;
		}
		#comment_content_icon{
			float:left;
			width:7%;
		}
		#comment_content_conment{
			float:right;
			width:91%;
		}
		#comment_content_conment p{
			/*12px为字体大小，26px为行距*/
			font: normal 10px/20px Arial;
			padding-top:5px;
		}
		#comment_image{
			margin:5px 0 0 10px;
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
			padding:left:10px;
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
		#my{
			float:right;
			margin-left:20px;
		}	
		#comment_send{
			margin:10px;
			height:200px;
		}
		#tu{
			/*line-height:30px;*/
			color:#333;
			font: bold 12px/30px Arial;
			height:30px;
			background-image:url("images/tit_bg.gif");
		}
		#write{
			margin:10px 0 10px 0;
			width:100%;
			height:100px;
			border:2px solid #989898;
		}
		#send{
			float:right;
		}
		.f_box{
			position:relative;
			margin-top:-64px;
			clear:both;
			width:100%;
			height:40px;
			background:#cccccc;
			/*文本对齐方式*/
			text-align:center;
			/*文字行高*/
			line-height:40px;
		}
		.kuai{
			font-family:"宋体";
			font-size:16px;
			color:black;
		}
		.f_box a{
			/*去掉下划线*/
			text-decoration:none;
			color:black;
		}
		.f_box a:hover{
			/*显示下划线*/
			/*text-decoration:underline;*/
			color:red;
		}
	</style>
</head>
<body class="body">
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
	<!-- 不包括头部的其他主要部分布局 -->
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
			<?php 
				if(isset($_SESSION['id'])){
					$ses_value = $_SESSION['id'];
					echo "
						<form action='main_default.php?uid=$ses_value' method='post'>
						<input id='my' value='我的博客' type='submit'>
						</form>
					";
				}
				else{
					
				}
			 ?>
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
				<!-- 博客正文 -->
				<div id="text">
					 <!-- 标题 -->
					 <div id="text_title">
					 	<span id="source">
							<?php 
					 		$url = "";
					 		if($article_row['comefrom']=="原创"){
					 			$url ="images/ico_Original.gif";
					 		}else{
					 			if($article_row['comefrom']=="转载"){
					 				$url="images/ico_Repost.gif";
					 			}
					 			else{
					 				$url="images/ico_Translated.gif";
					 			}
					 		}
					 		echo "<img src=$url alt=''>";
					 	 ?>
					 	</span>
						<?php 
							echo $article_row['title'];
						 ?>
					</div>
					<br>
					<div id="claasify_time">
						<p id="classify">
							类型:&nbsp;&nbsp;<?php echo $article_row['comefrom'] ?>
						</p>
						<p id="time">
							<?php echo getTime($article_row['time']);?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $article_row['views'];?>&nbsp;人阅读&nbsp;&nbsp;&nbsp;&nbsp;评论(<?php echo getCommentCount($article_row['id']);?>)&nbsp;&nbsp;&nbsp;&nbsp;<a href="no.html">收藏</a>
						</p>
					</div>
					<br>
					<p>
					
					    <?php 
					    		echo $article_row['content'];
					     ?>
					</p>
				</div>
				<!-- 博客评论 -->
				<div id="comment_count">查看评论</div>
				<?php 
					$flag=1;
					while($comment_row=mysql_fetch_assoc($comment_result)){
						// 获取评论者
						$temp_sql = "select account,icon from blog_user where id = $comment_row[uid]";
						$temp_result = mysql_query($temp_sql);
						$temp_row = mysql_fetch_assoc($temp_result);
						echo"
						<div class='comment'>
					<div>
						<div id='comment_time'>".$flag++."楼&nbsp;&nbsp;".$temp_row['account']."&nbsp;&nbsp;".getTime($comment_row['time'])."</div>
						<div id='comment_content'>
							<div id='comment_content_icon'>
								<p id='comment_image'><img style='width:90%;border:2px solid #ddd;' src='images/tx.jpeg' alt=''>
								</p>
							</div>
							<div id='comment_content_conment'>
								<p>
					    				".$comment_row['content']."
								</p>
							</div>
						</div>
					</div>
					
				</div>
					";
					}
				 ?>
				 <div id="comment_send">
				 	<div id="tu">发表评论</div>
				 	<form action="comment_send_back.php?aid=<?php echo $article_id ?>" method="post">
					 	<textarea id="write" name="content"></textarea>
					 	<input id="send" value="发表" type="submit">
				 	</form>
				 </div>
			</div>
		</div>
	</div>
	<div class="f_box">
		<span class="kuai">
			<?php
				$l_sql = "select * from blog_link";
				$l_result = mysql_query($l_sql);
				$flag = 0;
				while($l_row = mysql_fetch_assoc($l_result)){
					if($flag++ == 0){
					}
					else{
						echo"<span> 丨 </span>";
					}
					echo "<span><a href='$l_row[http]'>".$l_row['name']."</a></span>";
				}
		?>
		</span>
	</div>
</body>
</html>