<?php
	// 连接数据库
	$conn = mysql_connect("localhost","root","root");
	// 选择数据库
	mysql_select_db("miniblog");
	// 设置字符集
	mysql_set_charset("utf8");
?>