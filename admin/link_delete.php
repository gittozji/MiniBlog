<?php 
	$v_url = $_SERVER['HTTP_REFERER'];
	header("content-type:text/html;charset=utf-8");
	// 通过get接受id
	$id = $_GET['id'];
	include'../config.php';
	$sql = "delete from blog_link where id = $id";
	$result = mysql_query($sql);
	if ($result && mysql_affected_rows()>0) {
		echo '<script type="text/javascript">alert("删除成功!");window.location="'.$v_url.'";</script>';
	}
	else{
		echo '<script type="text/javascript">alert("删除失败!");window.location="'.$v_url.'";</script>';
	}
 ?>