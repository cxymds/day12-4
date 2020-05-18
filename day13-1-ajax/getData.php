<?php 

//后端验证
//1. 所有的信息都得有
//检测用户名是否有
if(!isset($_GET['user_name']) || empty($_GET['user_name'])){
	$return = [
		"code"  =>1001,
		"message" =>'用户名不能为空',
	];
	echo json_encode($return);
	die;
}
//符合规则吗-长度不能少于6位
if(strlen($_GET['user_name'])<6){
	$return = [
		'code'=> 2001,
		'message'=> '用户名至少6位'
	];
	echo json_encode($return);
	die;
}
//用户名不能以数字开头
if((int)$_GET['user_name']>0 || substr($_GET['user_name'],0,1)=='0'){
	$return = [
		'code'=> 2003,
		'message'=> '用户名不能用数字开头'
	];
	echo json_encode($return);
	die;
}

//检测用户名是否存在  数据库查询
$arr = ['ergouzi','wangmazi','liuxi','shichengkai','liulian','xiaoxiannv'];
if(in_array($_GET['user_name'],$arr)){
	$return = [
		'code'=>3001,
		'message'=>'用户名已存在'
	];
	echo json_encode($return);
	die;
}

// 用户名有要求吗？ 能重复吗  用户名注册机制的要求

//2. 邮箱是不是邮箱 邮箱的合法性 ，正则
if(!isset($_GET['email']) || empty($_GET['email'])){
	$return = [
		"code"  =>1002,
		"message" =>'邮箱不能为空',
	];
	echo json_encode($return);
	die;
}
//3. 密码符合要求吗 
if(!isset($_GET['pass']) || empty($_GET['pass'])){
	$return = [
		"code"  =>1003,
		"message" =>'密码不能为空',
	];
	echo json_encode($return);
	die;
}

//注册

$user = $_GET['user_name'];
$email = $_GET['email'];
$pass = $_GET['pass'];

//保存数据库
$str = $user.'|'.$email.'|'.$pass.'#';
file_put_contents('user.txt',$str,FILE_APPEND);
//返回成功
$return= [
	'code' =>200,
	'message' =>"注册成功"
];
echo json_encode($return);