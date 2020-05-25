<?php 

//1. 创建连接
/*
* 参数1： host  主机名 ip地址
* 参数2： user  用户名  root mysql管理员
* 参数3： password 密码
*/
$con = @mysqli_connect('localhost','root','1');
if($con == false){
	echo '错误编号为：' . mysqli_connect_errno();  //错误编号
	echo '<br>';
	echo '错误信息为：' . mysqli_connect_error();  //错误提示信息
	die;
}

//2. 选择数据库
$re = mysqli_select_db($con,'web2');
if($re===false){
	echo '错误编号为：' . mysqli_errno($con);
	echo '<br>';
	echo '错误信息为：' . mysqli_error($con);
	die;
}

//3. 选择字符集
$re = mysqli_set_charset($con,'utf8');
if($re===false){
	echo '错误编号为：' . mysqli_errno($con);
	echo '<br>';
	echo '错误信息为：' . mysqli_error($con);
	die;
}
