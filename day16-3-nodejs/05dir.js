let fs = require('fs')


/*
//读取文件夹
fs.readdir('.',(error,files)=>{
	console.log(files)
})
*/


let stream = fs.createReadStream('data.txt');

//绑定数据读取时候的事件
stream.on('data',(data)=>{
	console.log('读取数据')
	console.log(data)
})

//读取结束事件
stream.on('end',()=>{
	console.log('读取结束')
})
//读取出错误
stream.on('error',(error)=>{
	console.log('出错了')
	console.log(error)
})

