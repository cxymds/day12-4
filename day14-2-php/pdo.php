<?php 

$dsn = 'mysql:host=localhost;dbname=web2';
$link = new PDO($dsn,'root','1');
$re = $link->query('select * from article');

foreach($re as $v){
	var_dump($v['title']);
}
