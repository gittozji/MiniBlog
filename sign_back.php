<?php
	header("content-type:text/html;charset=utf-8");
	// 引入数据库配置文件
	include 'config.php';
	// 通过post方式，接收传递来的值
	$account = $_POST['account'];
	$password= $_POST['password'];
	$qpassword= $_POST['qpassword'];
	$name=$_POST['name'];
	$sql="select count(*) from blog_user where account='$account'";
	$result=mysql_query($sql);
	$row=mysql_fetch_assoc($result);
	$flag=$row['count(*)'];
	if($flag==1){
		echo '<script type="text/javascript">alert("注册失败！");window.location="sign.php";</script>';
	}
	else{
		if($password==$qpassword){
			// 定义数据库语句
			$sql = "insert into blog_user(account,password,name) values ('$account','$password','$name')";
			// 给数据库发送sql语句,并返回结果集
			$result = mysql_query($sql);
			echo '<script type="text/javascript">window.location="login.php";</script>';
		}
		else{
			echo '<script type="text/javascript">alert("注册失败！");window.location="sign,php";</script>';
		}
	}
?>