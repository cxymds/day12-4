let  express = require('express');

let app = express();  //构建一个http请求模块


app.use('/user',(req,res)=>{
	console.log('登陆了')
	res.send();
})


/*

app.get('/',(req,res)=>{
	res.json({
		message:"hello everyone from get!"
	});
})
app.get('/users',(req,res)=>{
	res.json([
		{
			id: '001',
			name:"chenergou",
			pass:"wer2334"
		},
		{
			id: '002',
			name:"laoliu",
			pass:"ugasgdhs"
		},
		{
			id: '003',
			name:"laoba",
			pass:"xiaohanbao"
		},
	]);
});
app.all('/users/message',(req,res)=>{
	res.json({
		id: '001',
		name:"chenergou",
		pass:"wer2334"
	});
});
*/

/*
app.get('/logs/*',(req,res)=>{
	res.send('都行');
})
app.delete('/arc/:id',(req,res,next)=>{
	next();
})
app.get('/user/:id',(req,res,next)=>{
	console.log(id)
	res.send();
})
app.param('id',(req,res,next,id)=>{
	console.log(id)
	res.send();
})
*/

/*
//构建处理规则 路由
app.put('/users',(req,res)=>{
	res.json({
		message:'修改成功'
	});
})
app.get('/',(req,res)=>{
	res.json({
		message:"hello everyone from get!"
	});
})
app.post('/',(req,res)=>{
	res.json({
		message:"hello everyone from post!"
	});
})
app.put('/',(req,res)=>{
	res.json({
		message:"hello everyone from put!"
	});
})
app.delete('/',(req,res)=>{
	res.json({
		message:"hello everyone from delete!"
	});
})
*/
//设置监听
app.listen('3000',function(){
	console.log('express 启动了')
})