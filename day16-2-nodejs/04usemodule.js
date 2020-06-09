/*
let os = require('os'); // ，没有路径也没有后缀 这是系统模块


console.log(os.cpus.length);

console.log(os.totalmem()/1024/1024/1024+ 'GB');  // 总内存大小
console.log(os.freemem()/1024/1024/1024 + 'GB');  //还剩余多少内存空间

console.log(os.hostname());
*/


/*
// let mod = require('./03module.js');  // 文件模块必须要添加路径 后缀名可以省略
let mod = require('./03module'); 

mod.say();
*/

/*

let jq = require('jquery');

console.log(jq)
*/

console.log(module.paths);