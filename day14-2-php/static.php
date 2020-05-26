<?php 

class  Mysqld{
	private $host;
	private $user;
	private $pass;
	private $charset;
	
	public $link;
	public function __construct($host,$user,$pass){
		$this->host = $host;
		$this->user = $user;
		$this->pass = $pass;
	}
	
	public function connect(){
		$this->link = mysqli_connect($this->host,$this->user,$this->pass);
	}
}

/*
$mysql = new Mysqld('localhost','root','1');
$mysql->connect();

var_dump($mysql->link);
*/



class Mysqlm{
	public static $link;
	public static function connect($host,$user,$pass){
		self::$link = mysqli_connect($host,$user,$pass);
	}
}

Mysqlm::connect('localhost','root','1');
var_dump(Mysqlm::$link);