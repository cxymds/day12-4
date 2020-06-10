let http = require('http');
let mime = require('mime');

// console.log(mime.getType('index.html'));


//建立一个web应用
let server= http.createServer((req,res)=>{
	// console.log(req); //request   请求
	// console.log(res); //response  响应
	
	//能够发送状态码以及状态信息
	res.writeHead(404,{
		"Content-Type":"text/html;charset=utf-8"
		});
	res.write('404 not found !');
	// res.end('hello world!!');
	res.end();
}); //创建请求

//监听 
server.listen('3000',function(){
	console.log('服务器正常启动了');
})
