<?php 
$num = (int)$_GET['num'];
//至少产生1名学生
if($num<=0){
	$re= [
		'code' => 1001,
		'message'=>'至少产生一名学生'
	];
	echo json_encode($re);
	die;
}
//所有的学生
$stu_arr = explode('|',file_get_contents('stu.txt'));
//in_array  判断是否在一个数组中
//mt_rand 产生随机数
$arr = [];  //用户保存学生的编号
for($i=0;$i<$num;$i++){ //用于循环产生学生编号
	$stu_num = mt_rand(0,52); //随机产生
	while(in_array($stu_num,$arr)){ //判断是否产生了相同的学生编号
		$stu_num = mt_rand(0,52);;
	}
	array_push($arr,$stu_num);
}

$re = []; //返回的学生数组
foreach($arr as $k){
	array_push($re,$stu_arr[$k]);
}
echo json_encode($re);




