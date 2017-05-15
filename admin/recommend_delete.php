<?php 
	$v_url = $_SERVER['HTTP_REFERER'];
	include'../config.php';
	header("content-type:text/html;charset=utf-8");
	$id = $_GET['id'];
	$sql = "delete from blog_recommend where id='$id'";
	$result = mysql_query($sql);
	if($result){
		echo '<script type="text/javascript">alert("删除成功!");window.location="'.$v_url.'";</script>';
	}
	else{
		echo '<script type="text/javascript">alert("删除失败!");window.location="'.$v_url.'";</script>';
	}
 ?>