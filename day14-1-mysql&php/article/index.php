<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>文章列表</title>
		<link rel="stylesheet" href="css/index.css">
		<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</head>
	<body>
		<header>
			<a href="javascript:;" id="insert">发表文章</a>
		</header>
		<section>
			<ul>
			<?php
				include 'mysqli.php';
				$sql = 'select id,title,create_time from article' ;
				$re = mysqli_query($con,$sql);
				if($re===false){
					echo '错误编号为：' . mysqli_errno($con);
					echo '<br>';
					echo '错误信息为：' . mysqli_error($con);
					die;
				}
				$result = mysqli_fetch_all($re,MYSQLI_ASSOC);
				
				foreach($result as $v){
					echo "<li data-id=".$v['id']."><a href=show.php?id=".$v['id']."><span>{$v['title']}</span></a> <span>{$v['create_time']}</span> <button class=".'edit'.">修改</button><button class=".'delete'.">删除</button></li>";
				}
				
				?>
			</ul>
		</section>
		<footer></footer>
	</body>
	<script>
	$(function(){
		$('#insert').click(function(){
			location.href = './insert.html';
		});
		$('.edit').click(function(){
			// console.log($(this).parent().attr('data-id'))
			location.href = 'edit.php?id=' + $(this).parent().attr('data-id');
		});
		$('.delete').click(function(){
			var dom = $(this);
			if(confirm('确认要删除这篇文章吗')){
				//用ajax请求后端删除对应的文章，同时删除自己。
				$.get('delete.php',{id:$(this).parent().attr('data-id')},function(e){
					if(e.code==200){
						alert(e.message);
						dom.parent().remove();
					}else{
						alert(e.message);
					}
				},'json')
			}
		});
	})
	</script>
</html>
