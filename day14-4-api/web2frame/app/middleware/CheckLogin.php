<?php 

class CheckLogin{
	
	public function check(){
		$id = $_COOKIE['id'];
		$name = $_COOKIE['name'];
		
		$token = md5($id.md5($name));
		$re_token = $_QEQUEST['token'];
		if($token == $re_token){
			return true;
		}
		return false;
	}
}