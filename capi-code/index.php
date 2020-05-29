<?php
$db = require_once __DIR__ . "/lib/db.php";
require_once __DIR__ . "/class/User.php";
require_once __DIR__ . '/class/Article.php';
require_once __DIR__ . '/class/Rest.php';
session_start();
$user = new User($db);
$ar = new Article($db);
$api = new Rest($user, $ar);
$api->run();

/*
//$user->register('admin','admin');
//var_dump($user->login('admin','admin'));
//var_dump($ar->create('biaoti','neirong',1));
//var_dump($ar->create('1biaoti','neirong',1));
//var_dump($ar->create('2biaoti','neirong',1));
//var_dump($ar->create('3biaoti','neirong',1));
//var_dump($ar->view(1));
//var_dump($ar->edit(1,'标题','内容',1));
//var_dump($ar->delete(1,1));
var_dump($ar->_list(1,2,1));
*/