<?php 
	session_start();
	include'config.php';
	header("content-type:text/html;charset=utf-8");

	// 获取传进来的账号和密码
	$username = $_POST['username'];
	$password = $_POST['password'];

	if($username=='miniblog'&&$password=='miniblog'){
		header("location: admin/index.php?type=0");
		return 0;
	}

    	// 数据库操作
	$sql = "select * from blog_user where account = '$username'";
	$result = mysql_query($sql);
	if($result){
		$row = mysql_fetch_assoc($result);
		if($row['password']===$password){
			//  声明变量，并赋空值。
			$_SESSION["id"] = null;
			$id = $row['id'];
			$_SESSION["id"] = $id;
			$id = $row['id'];
			 // echo '<script type="text/javascript">;window.location="main_default.php?uid='.$id.'";</script>';
			// echo 'window.location="main_default.php?uid='.$id.'";';
			// 直接跳转
			header("location: main_default.php?uid=".$id);
			return 0;
		}
	}
	echo '<script type="text/javascript">alert("登陆失败!");window.location="login.php";</script>';

 ?>