<?php 
include '../app/model/TeacherModel.php';

class TeacherController{
	public function add(){
		//获取ajax传进来的name
		$name = trim($_POST['teacher_name']); //去除接收到的字符串两边的空格
		//验证 验证规则；
		//不能为空
		if(empty($name)){
			echo json_encode([
				'code'=>1001,
				'message'=>'要添加的老师名称不能为空'
			]);
			die;
		}
		//名称长度不能少于3
		if(strlen($name)<3){
			echo json_encode([
				'code'=>1002,
				'message'=>'要添加的老师名称不能小于3位'
			]);
			die;
		}
		//名称不能以数字开头  第一个条件判断有1。。。，
		if((int)$name>0 || substr($name,0,1)=='0'){
			echo json_encode([
				'code'=>1003,
				'message'=>'要添加的老师名称不能以数字开头'
			]);
			die;
		}
		//已存在
		$teacher = new TeacherModel(); //创建model
		if($teacher->checkTeacherExists($name)){
			echo json_encode([
				'code'=>1004,
				'message'=>'要添加的老师已存在'
			]);
			die;
		}
		
		//保存数据库
		$data = [
			'name'=>$name,
			'pass'=>md5(123456)
		];
		if($teacher->add($data)){
			echo json_encode([
				'code'=>200,
				'message'=>'添加成功'
			]);
		}else{
			echo json_encode([
				'code'=>1005,
				'message'=>'添加失败'
			]);
		}
	}
	
	public function changename(){
		//接受
		//验证
		//修改
	}
	public function changepassword(){
		//接受
		//验证
		//修改
	}
}