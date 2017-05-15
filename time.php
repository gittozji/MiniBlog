<?php 
	include'config.php';
	header("content-type:text/html;charset=utf-8");
	// $sql = "select * from time";
	// 发送sql语句，返回结果集
	// $result = mysql_query($sql);
	$t = time();
	$sql = "insert into time (time) values($t)";
	$result = mysql_query($sql);
	echo $t;
	$str = date("Y-m-d H:i:s",$t);
	echo "      ";
	echo $str;
	$sq = "select * from time";
	$resul = mysql_query($sq);
	$row = mysql_fetch_assoc($resul);
	echo "从数据库获取      ";
	echo $row['time'];
	$str = date("Y-m-d H:i:s",$row['time']);
	echo "最终转化     ";
	echo $str;
 ?>