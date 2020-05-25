<?php 
include 'mysqli.php';
$id = (int)trim($_POST['id']);
$title = trim($_POST['title']);
$content = trim($_POST['content']);

//错误检测
if($id<=0){
	echo json_encode([
		'code'=>1003,
		'message'=>'文字信息查询失败'
	]);
	die;
}
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

//准备SQL语句
$sql = 'update article set title="'. $title .'",content="'. $content .'" where id='.$id;

$re = mysqli_query($con,$sql);
if($re===false){
	echo json_encode([
		'code'=> mysqli_errno($con),
		'message'=> mysqli_error($con)
	]);
	die;
}

$affect = mysqli_affected_rows($con);

echo json_encode([
	'code' =>200,
	'message'=>'修改成功'
]);