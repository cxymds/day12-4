<?php 
include 'BaseModel.php';
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
		
}