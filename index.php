<?php 
	session_start();
	include 'config.php';
 ?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>搜索</title>
		<style>
			*{
				margin:0 auto;
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
    			.box{
    				width:100%;    			
				}
    			.banner{
    				width:100%;
    				height:80px;			
			}
			.center{
				width:100%;
    				height:187px;
    				text-align:center;		
    			}
			.center1{			
				width:100%;
				height:80px;
				text-align:center;
				padding-top:30px;
			}
			#username:focus{
				border:solid 2px #3388FF;
			}
			#username{
				border:solid 2px #cccccc;
				width:500px;
				height:40px;
				font-weight: normal;
				text-indent: 10px;
				outline: 0;
				background-position-x: 15px;
				background-position-y: 50%;
				background-repeat: no-repeat;
			}
			#button:hover{
			background:#559DFF;
			}
			#button{
				background:#3388FF;
				width:100px;
				height: 48px;
				line-height: 44px;
				font-size:18px;
				color: #fff;
				border: none;
				/*去掉点击后的边框*/
				outline:none;
			}
			#img{
				margin-top:100px;
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
		<br>
		<div class="box">
			<div class="banner">
				<div class="center">
					<img id="img" src="images/miniblog.png">
					</div>
				 <div class="center1">
					<form action="search_back.php" method="post">
						<div>
							<input id="username" type="text" name="title">
						<span><input id="button" type="submit" value="搜索"></span>
						</div>
					</form>
				</div>
			</div>
	</body>
<ml>