<?php 
	//删除操作
	header("Content-type:text/html;charset=utf-8");
	//统一发返回格式
	$responseData = array("code" => 0, "message" => "");

	//删除的数据
	$id = $_GET['id'];

	//1、链接数据库
	$link = mysql_connect("localhost", "root", "123456");
	//2、判断是否链接成功
	if(!$link){
		$responseData['code'] = 1;
		$responseData['message'] = "数据库链接失败";
		//返回到前台页面你
		echo json_encode($responseData);
		exit;
	}
	//3、设置字符集
	mysql_set_charset("utf8");

	//4、选择数据库
	mysql_select_db("yyy");

	//5、准备sql语句，通过id删除
	$sql = "DELETE FROM users WHERE id={$id}";

	$res = mysql_query($sql);

	if(!$res){
		$responseData['code'] = 2;
		$responseData['message'] = "删除用户数据失败";
		//返回到前台页面你
		echo json_encode($responseData);
	}else{
		$responseData['message'] = "删除用户数据成功";
		//返回到前台页面你
		echo json_encode($responseData);
	}

	mysql_close($link);

 ?>