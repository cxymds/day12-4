<?php 
include '../lib/jwt.php';
class CheckLogin{
	
	/**
	 * @desc 中间件验证用户token
	 */
	public function check(){
		//获取token
		$header = apache_request_headers();		
		//如果没有author信息，返回false
		if(!isset($header['token'])){
			return false;
		}
		//验证author 通过返用户信息，没通过返回false
		return Jwt::verifyToken($header['token']);
	}
}