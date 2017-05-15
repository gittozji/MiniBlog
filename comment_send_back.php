<?php 
	session_start();
	$v_url = $_SERVER['HTTP_REFERER'];
	include'config.php';
	header("content-type:text/html;charset=utf-8");
	$uid = $_SESSION['id'];
	$content=$_POST['content'];
	$aid = $_GET['aid'];
	$t = time();
	$uid = $_SESSION['id'];
	if(isset($_SESSION['id'])){
		$sql = "insert into blog_comment (uid,aid,time,content) values('$uid','$aid','$t','$content')";
		$result = mysql_query($sql);
		if($result){
			echo '<script type="text/javascript">alert("发表成功!");window.location="'.$v_url.'";</script>';
		}
		else{
			echo '<script type="text/javascript">alert("发表失败!");window.location="'.$v_url.'";</script>';
		}
	}
	else{
		echo '<script type="text/javascript">alert("发表失败!");window.location="'.$v_url.'";</script>';
	}
	
 ?>