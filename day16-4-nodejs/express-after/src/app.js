let express = require('express');

let app = express();

//应用级别中间件  自动以中间件
/*
app.use(log_middleware);
function log_middleware(req,res,next){
	console.log('----'+ req.url);
	next();
}
*/

//引入第三方中间件
let body_parser = require('body-parser');

app.use(body_parser.urlencoded({ extended: false }));



app.use(express.static('public',{
	extensions:['html','htm','css']
}));
//注册路由
app.get('/',(req,res)=>{
	res.send('hello every')
})
//引入路由
let user_router = require('../router/user.router.js');
let article_router = require('../router/article.router.js');

//注册路由
app.use('/user',user_router);
app.use('/article',article_router);

app.listen('3000',()=>{
	console.log('服务器已经启动~');
})

