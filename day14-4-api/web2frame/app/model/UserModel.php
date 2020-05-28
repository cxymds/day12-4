<?php
include 'Base.php';
class UserModel extends Base{
	public function add(){
		$this->db->insert('user',[
			'name' => 'zhangsan',
			'pass' => md5(2345678434567)
		]);
		if($this->db->lastId()>0){
			echo '注册成功';
		}else{
			echo '注册失败';
		}
	}
}


