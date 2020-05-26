<?php

//引入animal
require 'Animal.php';
class Monkey extends Animal{
	public function say(){
		echo $this->pelage;
		// echo $this->color;
		$this->rest();
		$this->move();
	}
	
	function lala(){
		echo '1111';
	}
}