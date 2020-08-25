<?php 
	header("Content-type:text/html;charset=utf-8");
	//链接数据库
	$link = mysql_connect("localhost", "root", "123456");

	//2、判断是否连接成功
	if(!$link){
		echo "数据库链接失败";
		exit; //终止后续所有的代码
	}

	//3、设置字符集
	mysql_set_charset("utf8");

	//4、选择数据库
	mysql_select_db("yyy");

	//5、准备sql
	$sql = "SELECT * FROM users";

	$res = mysql_query($sql);

	$arr = array();

	while($row = mysql_fetch_assoc($res)){
		array_push($arr, $row);
	}

	echo json_encode($arr);

	mysql_close($link);
 ?>