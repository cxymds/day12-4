<?php 
include '../app/model/XmrclassModel.php';
class XmrclassController{
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
}