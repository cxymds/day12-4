<?php 

//引入配置文件
include '../conf/config.php';
include '../conf/dbconfig.php';

//引入库文件
include '../lib/database.php';

//创建数据库的连接
// $db = DB::getInstance();

//创建路由规则
$c = empty($_GET['c']) ? 'index':$_GET['c'];
$a = empty($_GET['a']) ? 'index':$_GET['a'];
$c = ucfirst($c).'Controller';

//引入控制器
include '../app/controller/'.$c.'.php';
//引入中间件
include '../app/middleware/CheckLogin.php';
//判断登录状态
$middle = new CheckLogin();
//登录验证验证没通过
if(!$middle->check()){
	//当执行不是登录操作，返回未登录提示
	if($a!='login'){
		echo  json_encode([
			'code' => 302,
			'message'=>'未登录',
			'url'=>'index.php?c=index&a=index'
		]);
		die;
	}
}
header('Access-Control-Allow-Origin: http://www.docway.net');
header('Access-Control-Allow-Credentials: true');
header('Content-Type: text/html; charset=utf-8');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
//调用某一个类的方法
$controller = new $c();
$controller->$a();

// call_user_func([new $c(),$a]);


//localhost/index.php?c=user&a=add
