<?php 
class UserController{
	public function edit(){
		echo '你要修改用户信息吗';
	}
	
	public function info(){
		include '../app/model/UserModel.php';
		$user = new UserModel();
		$user->add();
		include VIEW_PATH.'user/info.html';
	}
}