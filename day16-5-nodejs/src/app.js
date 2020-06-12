let express = require('express');
let app = express();
let bodyParser = require('body-parser')

//设置中间件 jwt
function jwt(req,res,next){
	// console.log(req.get('token'))
	if(req.get('token')){
		next();
	}
}

// app.use(express.json());
// app.use(express.urlencoded({ extended: false }));
// app.use(bodyParser);
app.use(bodyParser.urlencoded({ extended: false }))
// app.use(jwt);




// 设置路由
//1. 引入路由
let user_router = require('../routers/user.router.js');
let todo_router = require('../routers/todo.router.js');
let index_router = require('../routers/index.router.js');

//2. 注册路由
app.use(index_router);
app.use('/u',user_router);
app.use('/todo',todo_router);

app.use((req,res,next)=>{
	res.json({
		message:'404 not found'
	})
});

app.use((error,req,res,next)=>{
	if(error){
		console.log(error)
	}
});


//监听
app.listen('3000',()=>{
	console.log('服务器启动了')
});