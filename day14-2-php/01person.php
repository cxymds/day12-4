<?php 
class Person{
	//属性
	public $name;  //公有的属性
	protected $money; //受保护的
	private $wife;	//私有的
	public function __construct($name,$money,$wife){ //构造函数
		$this->name = $name;
		$this->money = $money;
		$this->wife = $wife;
	}
	
	protected function sayName(){
		echo $this->name;
	}
}

$p1 = new Person('zhangsan',5000,'lisi'); //实例化
// var_dump($p1->name);
// var_dump($p1->money);
//var_dump($p1->wife);
// $p1->sayName();
$p1->name = 'sss';

var_dump($p1);