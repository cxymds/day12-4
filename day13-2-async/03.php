<?php 
header('Access-Control-Allow-Origin: *'); //允许所有的源请求
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
if(!isset($_GET['callback'])){
	echo '缺少回调函数';
	die;
}
$func = $_GET['callback'];

$arr = [
	'name' => 'lisi',
	'age' => 27,
	'sex' => 'man'
];

echo $func.'('.json_encode($arr).')';
