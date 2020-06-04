<?php 


if($_GET['id']==98){
	echo json_encode([
		'php'=>90,
		'js'=>100,
		'math'=>11,
		'js'=>23
	]);
}else{
	echo json_encode([
		'code'=>404,
		'message'=>'未找到'
		]);
}