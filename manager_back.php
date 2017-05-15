<?php 
	session_start();
	$v_url = $_SERVER['HTTP_REFERER'];
	include'config.php';
	header("content-type:text/html;charset=utf-8");
	$select = $_POST['select'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	$comefrom = null;
	if($select==1)
		$comefrom="原创";
	if($select==2)
		$comefrom="转载";
	if($select==3)
		$comefrom="翻译";

	$t = time();
	$uid = $_SESSION['id'];
	if(isset($_SESSION['id'])){
		$sql = "insert into blog_article (title,content,time,comefrom,uid) values('$title','$content','$t','$comefrom','$uid')";
		$result = mysql_query($sql);
		if($result){
			echo '<script type="text/javascript">alert("保存成功!");window.location="'.$v_url.'";</script>';
		}
		else{
			echo '<script type="text/javascript">alert("保存失败!");window.location="'.$v_url.'";</script>';
		}
	}
	else{
		echo '<script type="text/javascript">alert("保存失败!");window.location="'.$v_url.'";</script>';
	}
	
 ?>