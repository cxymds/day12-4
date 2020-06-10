let http = require('http');
let mime = require('mime');
let fs = require('fs');
let url = require('url');

let server = http.createServer((req,res)=>{
	let {url} = req;
	res.writeHead(200,{
		"content-type":"text/html;charset=utf-8"
	})
	if(url =='/'){
		res.end('主页')
	}else if(url =='/user'){
		res.end('用户')
	}else if(url =='/user/login'){
		res.end('登录')
	}else{
		res.end('其他')
	}

});

server.listen('3000',function(){
	console.log('服务器已启动')
})
