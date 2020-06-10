let fs = require('fs');


//同步读取文件
// let data = fs.readFileSync('data.txt');
// console.log(data.toString());

/*
//读物文件状态

fs.stat('data.txt',(error,stat)=>{
	if(error){
		return error;
	}
	console.log(stat);
})
*/



let buf = new Buffer(23);
buf.write('i am the first one aaa!');

fs.writeFile('data.txt',buf,(err)=>{
	console.log('文件以及写入')
})

