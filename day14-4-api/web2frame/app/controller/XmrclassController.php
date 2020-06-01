<?php 
include_once '../app/model/XmrclassModel.php';
include_once '../app/model/TeacherModel.php';
class XmrclassController{
	/*
	*@desc 添加班级
	*/
	public function add(){
		//获取
		$name = trim($_POST['class_name']);
		//验证
		//不能为空
		if(empty($name)){
			echo json_encode([
				'code'=>1006,
				'message'=>'要添加的老师名称不能为空'
			]);
			die;
		}
		//已存在
		$xmr = new XmrclassModel();
		if($xmr->checkClassExists($name)){
			echo json_encode([
				'code'=>1007,
				'message'=>'要添加的班级已存在'
			]);
			die;
		}
		//添加
		
		//保存数据库
		$data = [
			'name'=>$name,
		];
		if($xmr->add($data)){
			echo json_encode([
				'code'=>200,
				'message'=>'添加成功'
			]);
		}else{
			echo json_encode([
				'code'=>1008,
				'message'=>'添加失败'
			]);
		}
	}

	public function addTeacher(){
		//数据是否具有
		if(!isset($_POST['teacher_id'])){
			echo json_encode([
				'code' =>3001,
				'message'=>'传递的老师信息有误'
			]);
			die;
		}
		if(!isset($_POST['class_id'])){
			echo json_encode([
				'code' =>3002,
				'message'=>'传递的班级信息有误'
			]);
			die;
		}
		//获取数据
		$teacher_id = (int)$_POST['teacher_id'];
		$class_id = (int)$_POST['class_id'];
		//验证
		if($teacher_id<=0){
			echo json_encode([
				'code' =>3001,
				'message'=>'传递的老师信息有误'
			]);
			die;
		}
		if($class_id<=0){
			echo json_encode([
				'code' =>3002,
				'message'=>'传递的班级信息有误'
			]);
			die;
		}
		//数据库验证
		$t = new TeacherModel();
		if(!$t->getTeacherById($teacher_id)){
			echo json_encode([
				'code' =>3003,
				'message'=>'系统伪找到对应的老师'
			]);
			die;
		}
		
		$c = new XmrclassModel();
		if(!$c->getClassById($class_id)){
			echo json_encode([
				'code' =>3004,
				'message'=>'系统伪找到对应的班级'
			]);
			die;
		}
		//数据库操作
		if($c->addTeacherForClass($class_id,$teacher_id)){
			$data = [
				'code'=>200,
				'message'=>'添加老师成功'
			];
		}else{
			$data = [
				'code'=>3005,
				'message'=>'添加老师失败'
			];
		}
		//返回
		echo json_encode($data);
	}
	
	
	
	/**
	 * @desc 获取当前登录账号的所有班级信息
	 */
	public function getClassList(){
		$user_id = $GLOBALS['user']['sub_id'];
		$teacher = new TeacherModel();
		echo json_encode($teacher->getClassByTeacherId($user_id));
	}
}