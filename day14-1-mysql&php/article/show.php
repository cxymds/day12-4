<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/show.css">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
</head>
<body>
	<header></header>
	<section>
		<?php
		include 'mysqli.php';
		$id = (int)$_GET['id'];
		if($id<=0){
			echo '文字查询错误';
			die;
		}
		$sql = 'select title,content from article where id='.$id;
		$re = mysqli_query($con,$sql);
		if($re===false){
			echo '错误编号为：' . mysqli_errno($con);
			echo '<br>';
			echo '错误信息为：' . mysqli_error($con);
			die;
		}
		$result = mysqli_fetch_assoc($re);
		
		
		echo '<div id="title">'. $result['title']. '</div>';
		echo '<div id="content">'. $result['content'] .  '</div>';
		?>
	</section>
	<footer></footer>
</body>
</html>