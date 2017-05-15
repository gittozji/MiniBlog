<?php 
	session_start();
	include'config.php';
	header("content-type:text/html;charset=utf-8");
 ?>
<html>
<head>
	<meta charset="UTF-8">
	<title>注册</title>
	<style type="text/css">
		*{
			margin:0 auto;
		}
		body{
			width:100%;
			background-image:url("images/login-bg.png");
			/*背景不平铺,而且设置显示的高度为100%，从左到右显示图片右边多余的不显示,即垂直方向拉伸*/
			background-repeat:no-repeat;
			background-size:1920 100%;
		}	
		.body{
			margin-top:60px;
			width:870px;
			height:500px;
		}
		#left{
			width:55%;
			height:500px;
			float:left;
		}
		#right{
			width:40%;
			height:500px;
			float:right;
			background:white;
			color: #747474;
		}
		#h3{
			padding:30px;
			font-family: "Helvetica Neue";
			font-weight: 500;
			font-size:16px;
		}
		#box{
			margin:20px 30px 40px 30px;
		}
		#username:focus{
			border:solid 2px #D6F1FF;
		}
		#password:focus{
			border:solid 2px #D6F1FF;
		}
		#username{
			border:solid 2px #E1E1E1;
			width:100%;
			padding:10px 0;
			margin-bottom:20px;
			font-weight: normal;
			text-indent: 43px;
			outline: 0;
			background-position-x: 15px;
			background-position-y: 50%;
			background-repeat: no-repeat;
			background-image:url("images/login-locked-icon.png");
		}
		#password{
			border:solid 2px #E1E1E1;
			width:100%;
			padding:10px 0;
			margin-bottom:20px;
			font-weight: normal;
			text-indent: 43px;
			outline: 0;
			background-position-x: 15px;
			background-position-y: 50%;
			background-repeat: no-repeat;
			background-image:url("images/login-key-icon.png");
		}
		#button:hover{
			background:#B43200;
		}
		#button{
			background:#dc3c00;
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
	<div class="body">
		<div id="left"></div>
		<div id="right">
			<h3 id="h3">账号注册</h3>
			<div id="box">
				<form action="sign_back.php" method="post">
					<input id="username" name="account" placeholder="账号" type="text">
					<input id="password" name="password" placeholder="密码" type="password">
					<input id="password" name="qpassword" placeholder="确认密码" type="password">
					<input id="username" name="name" placeholder="博客名字" type="text">
					<input id="button" value="注册" type="submit">
				</form>
			</div>
		</div>
	</div>
</body>
</html>