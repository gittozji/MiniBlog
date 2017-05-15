<?php 
	$v_url = $_SERVER['HTTP_REFERER'];
	header("content-type:text/html;charset=utf-8");
	include '../config.php';
	$name = $_POST['name'];
	$http = $_POST['http'];
	$sql="insert into blog_link (name,http) values('$name','$http')";
	$result = mysql_query($sql);
	// 判读是否成功
	if ($result&&mysql_insert_id()>0) {
		echo '<script type="text/javascript">alert(" 添加成功!");window.location="'.$v_url.'";</script>';
	}
	else{
		echo '<script type="text/javascript">alert("添加失败!");window.location="'.$v_url.'";</script>';
	}
 ?>