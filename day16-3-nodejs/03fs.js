//file system 文件系统
//操作系统  任务调度  文件系统

let fs = require('fs');

console.log(1)
fs.readFile('data.txt',function(error,data){
	//检测有没有出错
	if(error){
		console.log(error);
		return error;
	}
	console.log( '文件内容是：'+data.toString('utf8'));
	// console.log(data.toString())
});
console.log(2)
// enonet

//异步读取