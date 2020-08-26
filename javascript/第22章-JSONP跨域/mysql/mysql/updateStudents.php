<?php 
	header("Content-type:text/html;charset=utf-8");
	//统一发返回格式
	$responseData = array("code" => 0, "message" => "");

	$id = $_GET['id'];

	if(!$id){
		$responseData["code"] = 1;
		$responseData["message"] = "没有要修改数据";
		echo json_encode($responseData);
		exit; //终止后续所有的代码
	}

	//链接数据库
	$link = mysql_connect("localhost", "root", "123456");

	//2、判断是否连接成功
	if(!$link){
		
		$responseData["code"] = 2;
		$responseData["message"] = "数据库链接失败";
		echo json_encode($responseData);
		exit; //终止后续所有的代码
	}

	//3、设置字符集
	mysql_set_charset("utf8");

	//4、选择数据库
	mysql_select_db("yyy");

	//5、准备sql从查找数据
	$sql = "SELECT * FROM users WHERE id={$id}";

	$res = mysql_query($sql);

	$row = mysql_fetch_assoc($res);

	if(!$row){
		$responseData["code"] = 3;
		$responseData["message"] = "修改的数据不存在";
		echo json_encode($responseData);
	}else{
		$responseData["message"] = json_encode($row);
		echo json_encode($responseData);
	}

	mysql_close($link);

 ?>