<?php 
include  '../app/model/TeacherModel.php';

class IndexController{
	/**
	 * @系统首页
	 */
	public function index(){
		include VIEW_PATH.'index/index.html';
	}
	
	/**
	 * @desc 执行用户登录验证操作
	 */
	public function login(){
		//获取
		$name = trim($_POST['user_name']);
		$pass = trim($_POST['password']);
		//验证
		//不能为空
		if(empty($name)){
			echo json_encode([
				'code'=>2001,
				'message'=>'用户名不能为空'
			]);
			die;
		}
		//不能为空
		if(empty($pass)){
			echo json_encode([
				'code'=>2002,
				'message'=>'密码不能为空'
			]);
			die;
		}
		
		$admin= new TeacherModel();
		$data = [
			'name'=>$name,
			'pass'=>md5($pass),
			'status'=>1
		];
		if(!$user = $admin->checkLogin($data)){
			echo json_encode([
				'code'=>2003,
				'message'=>'用户名或者密码错误'
			]);
			die;
		}
		//制作令牌 md5(id + MD5(用户名))
		$token = md5($user['id'].md5($user['name']));
		// $token 
		setcookie('id',$user['id'],7*24*3600);
		setcookie('name',$user['name'],7*24*3600);
		//返回
		echo json_encode([
			'code'=>200,
			'message'=>'登录成功',
			'token'=>$token
		]);
	}
}