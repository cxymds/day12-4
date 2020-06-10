let http = require('http');
let mime = require('mime');
let fs = require('fs');

let server = http.createServer((req,res)=>{
	res.writeHead(200,{
		"content-type":mime.getType('timg.jpg')
	});
	
	console.log(req.url)
	fs.readFile('timg.jpg',(error,data)=>{
		res.write(data);
		res.end();
	})
});

server.listen('3000',function(){
	console.log('服务器已启动')
})
