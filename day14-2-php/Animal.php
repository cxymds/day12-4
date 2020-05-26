<?php 
class Animal{
	public $height;
	public $weight;
	protected $pelage;//毛发
	
	private $color;
	
	public function __construct($height,$weight,$pelage,$color){
		$this->height = $height;
		$this->weight = $weight;
		$this->pelage = $pelage;	
		$this->color = $color;
	}
	
	public function eat(){
		echo 'eat';
	}
	protected function rest(){
		echo 'rest';
	}
	
	private function move(){
		echo 'move';
	}
}