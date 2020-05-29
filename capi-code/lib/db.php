<?php
/**
 * Created by PhpStorm.
 * User: cxymds
 * Date: 2017/5/17
 * Time: 17:38
 */
require_once __DIR__."/conf.php";
return new PDO('mysql:host='.HOST.';dbname='.DBNAME,DBUSER,DBPASS);





