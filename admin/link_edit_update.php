<?php 
	$v_url = $_SERVER['HTTP_REFERER'];
	header("content-type:text/html;charset=utf-8");
	include '../config.php';
	$id = $_GET['id'];
	$name = $_POST['name'];
	$http = $_POST['http'];
	$sql = "update blog_link set name='$name',http='$http' where id=$id";
	$result = mysql_query($sql);
	if ($result && mysql_affected_rows()>0) {
		echo '<script type="text/javascript">alert("修改成功!");window.location="'.$v_url.'";</script>';
	}
	else{
		echo '<script type="text/javascript">alert("修改失败!");window.location="'.$v_url.'";</script>';
	}
 ?>