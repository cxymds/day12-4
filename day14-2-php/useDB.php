<?php 
include 'DB/DB.php';

$db = DB::getInstance(); //单例设计模式

// $con = $db->table('article')->select('id,title')->get()->last();

$db->delete('article')->where('title','hhhh')->exec();

// echo '<pre>';
// var_dump($con);


作业: 将里面所有的数据库操作替换为 DB类操作