<?php 
$id = (int)$_GET['id'];

if($id<=0){
	echo json_encode([
		'code'=>1004,
		'message'=>"文章删除失败"
	]);
	die;
}

include 'mysqli.php';
$sql = 'delete from article where id='.$id;

$re = mysqli_query($con,$sql);
if($re===false){
	echo json_encode([
		'code'=> mysqli_errno($con),
		'message'=> mysqli_error($con)
	]);
	die;
}

echo json_encode([
		'code'=> 200,
		'message'=> '删除成功'
	]);