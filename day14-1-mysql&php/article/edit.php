<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</head>
	<body>
		<?php 
			$id = (int)$_GET['id'];
			if($id<=0){
				echo '错误编号为：' . 11001;
				echo '<br>';
				echo '错误信息为：' . '未找到文章';
				die;
			}
			include 'mysqli.php';
			$sql = 'select title,content from article where id='.$id;
			$re = mysqli_query($con,$sql);
			if($re===false){
				echo '错误编号为：' . mysqli_errno($con);
				echo '<br>';
				echo '错误信息为：' . mysqli_error($con);
				die;
			}
			$result = mysqli_fetch_assoc($re);
		?>
		
		文章的标题<br>
		<input type="text" name="title" value="<?=$result['title']?>"><br>
		文章的内容<br>
		<textarea rows="30" cols="150"><?=$result['content']?></textarea>
		<br>
		<button>修改</button>
	</body>
	<script>
	$(function(){
		$('button').click(function(){
			var data = {
				id:<?=$id?>,
				title:$('input[name=title]').val(),
				content:$('textarea').val(),
			}
			$.post('save.php',data,function(e){
				if(e.code==200){
					alert(e.message)
					location.href = 'index.php'
				}else{
					alert(e.message)
				}
			},'json')
		})
	})
	</script>
</html>
