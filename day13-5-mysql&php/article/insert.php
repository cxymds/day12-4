<?php 
include 'mysqli.php';
$title = trim($_POST['title']);
$content = trim($_POST['content']);

//错误检测
if(empty($title)){
	echo json_encode([
		'code'=>1001,
		'message'=>'文章标题不能为空'
	]);
	die;
}

if(empty($content)){
	echo json_encode([
		'code'=>1002,
		'message'=>'文章内容不能为空'
	]);
	die;
}

$date = date('Y-m-d H:i:s',time());
//准备SQL语句
$sql = "insert into article (title,content,create_time) values ('$title','$content','$date')";

$re = mysqli_query($con,$sql);
if($re===false){
	echo json_encode([
		'code'=> mysqli_errno($con),
		'message'=> mysqli_error($con)
	]);
	die;
}

$affect = mysqli_affected_rows($con);
if($affect<=0){
	echo json_encode([
		'code'=>2001,
		'message'=>'文章发表失败'
	]);
	die;
}

echo json_encode([
	'code' =>200,
	'message'=>'发表成功'
]);