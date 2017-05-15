<?php 
	session_start();
	session_unset();
	// 获取上一页面的地址
	$v_url = $_SERVER['HTTP_REFERER'];
	header("location:$v_url");
 ?>