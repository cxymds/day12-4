<?php 

class Base{
	protected $db;
	public function __construct(){
		$this->db =  DB::getInstance();
	}
}