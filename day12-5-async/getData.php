<?php 

//后端验证
//1. 所有的信息都得有
//检测用户名是否有
if(!isset($_GET['user_name']) || empty($_GET['user_name'])){
	die('请输入正确的用户名');
}
//符合规则吗-长度不能少于6位
if(strlen($_GET['user_name'])<6){
	die('长度不合格，请输入至少6位长度的用户名');
}
//检测用户名是否存在  数据库查询
$arr = ['ergouzi','wangmazi','liuxi','shichengkai','liulian','xiaoxiannv'];
if(in_array($_GET['user_name'],$arr)){
	die('用户名已经存在');
}

// 用户名有要求吗？ 能重复吗  用户名注册机制的要求
//2. 邮箱是不是邮箱 邮箱的合法性 ，正则
if(!isset($_GET['email']) || empty($_GET['email'])){
	die('请输入正确的邮箱地址');
}
//3. 密码符合要求吗 
if(!isset($_GET['pass']) || empty($_GET['pass'])){
	die('请输入密码');
}

//注册

$user = $_GET['user_name'];
$email = $_GET['email'];
$pass = $_GET['pass'];

//保存数据库
$str = $user.'|'.$email.'|'.$pass.'#';
file_put_contents('user.txt',$str,FILE_APPEND);
//返回成功
echo '注册成功';