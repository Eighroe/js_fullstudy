<?php 
	header("Content-type:text/html;charset=utf-8");
	//统一发返回格式
	$responseData = array("code" => 0, "message" => "");
	// var_dump($_POST);
	$name = $_POST['name'];
	$english = $_POST["english"];
	$math = $_POST['math'];
	$chinese = $_POST["chinese"];

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

	//5、准备sql语句进行插入操作
	$sql = "INSERT INTO students(name,english,math,chinese) VALUES('{$name}',{$english},{$math},{$chinese})";

	//6、发送sql语句
	$res = mysql_query($sql);

	if(!$res){
		$responseData['code'] = 2;
		$responseData['message'] = "添加学员成绩失败";
		//返回到前台页面你
		echo json_encode($responseData);
		exit;
	}else{
		$responseData['message'] = "添加学员成绩成功";
		//返回到前台页面你
		echo json_encode($responseData);
	}
	//关闭数据库
	mysql_close($link);


 ?>