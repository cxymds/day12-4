let express = require('express');
let app = express();

//添加body-parser中间件
let body_parser = require('body-parser');

//注册中间件
app.use(body_parser.urlencoded({ extended: false }));

//注册路由
let user_router = require('../router/user.js');
app.use('/users',user_router);



app.listen('3000',()=>{
	console.log('服务已启动~');
})