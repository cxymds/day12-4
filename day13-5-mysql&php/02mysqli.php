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

//4. 准备SQL语句
$sql = 'select * from stu';

//5. 执行sql语句
$re = mysqli_query($con,$sql);
if($re===false){
	echo '错误编号为：' . mysqli_errno($con);
	echo '<br>';
	echo '错误信息为：' . mysqli_error($con);
	die;
}

//6. 处理返回结果
/*
//mysqli_fetch_row 每一次只能匹配一个结果，直到最后一条，返回的结果是一个索引数组，丢失键。
while($row = mysqli_fetch_row($re)){
	var_dump($row);
	echo '<br>';
}
*/

/*
//mysqli_fetch_array 返回一条结果数据，这条数据里面包含索引数组结果也包含关联数组结果
while($result = mysqli_fetch_array($re)){
	echo "<pre>";
	var_dump($result);
}
*/

/*
while($result = mysqli_fetch_assoc($re)){
	var_dump($result);
}
*/

$result = mysqli_fetch_all($re,MYSQLI_ASSOC);
echo '<pre>';
var_dump($result);

//释放资源 ，关闭数据库
mysqli_free_result($re);
mysqli_close($con);