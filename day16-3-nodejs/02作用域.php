<?php 

$a = 12;   //全局变量不能进入局部
//1. 传参
//2. 全局引用  放在超全局变量中 $_GLOBALS

function say(){
	global $a;
	echo $a; 
	$c = 22; //局部变量也不能随便进入全局
	//1. 返回
	//2. 放在超全局数组里面
}

say();
echo $c;