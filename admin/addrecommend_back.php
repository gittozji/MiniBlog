<?php 
	$v_url = $_SERVER['HTTP_REFERER'];
	include'../config.php';
	header("content-type:text/html;charset=utf-8");
	$id = $_POST['id'];
	$sql = "insert into blog_recommend (aid) values('$id')";
	$result = mysql_query($sql);
	if($result){
		echo '<script type="text/javascript">alert("添加成功!");window.location="'.$v_url.'";</script>';
	}
	else{
		echo '<script type="text/javascript">alert("添加失败!");window.location="'.$v_url.'";</script>';
	}
 ?>