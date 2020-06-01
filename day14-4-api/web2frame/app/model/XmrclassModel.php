<?php 
include_once 'BaseModel.php';
class XmrclassModel extends BaseModel{
	public function checkClassExists($name){
		   $re = $this->db->table('xmr_class')->where('name','=',$name)->get()->toArray();
		   if(empty($re)){
			   return false; //如果查询没有这个用户名，返回false
		   }else{
			   return true; //如果查询有这个用户名，返回true
		   }
	}
	
	/**
		* @desc 添加老师到数据库
		* @param array $data 要存入数据库的数据
		*/
	public function add($data){
		   $re = $this->db->insert('xmr_class',$data);
		   if($re>0){
			   return true;
		   }else{
			   return false;
		   }
		   
	}
	
	
	/**
	 * @desc 根据班级的id查找班级信息
	 * @param int $id 班级id
	 */
	public function getClassById($id){
		
		return $this->db->table('xmr_class')->where($id)->get()->toArray();
	}
	
	
	/**
	 * @desc 为班级添加老师
	 * @param {int} $class_id 班级id
	 * @param {int} $teacher_id 老师的id
	 */
	public function addTeacherForClass($class_id,$teacher_id){
		$insert_id = $this->db->insert('teacher_class',[
			'tid'=>$teacher_id,
			'cid'=>$class_id
		]);
		if($insert_id>0){
			return true;
		}
		return false;
	}		
}