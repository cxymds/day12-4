let express = require('express');

let router = express.Router();
//路由级别的中间件
// router.use(log_middleware)
function log_middleware(req,res,next){
	console.log('----'+ req.url);
	next();
}


router.post('/',(req,res)=>{
	let {name,pass} = req.body;
	res.json({
		name,
		pass
	});
})


// router.get('/',(req,res)=>{
// 	res.send('hello user page');;
// })

router.get('/info',(req,res)=>{
	res.json({
		id:"9528",
		name:"zhouxingxing",
		position:"daza"
	});
})
router.param('user_name',(req,res,next,user_name)=>{
	console.log(user_name)
	next();
})
router.get('/users/:user_name',(req,res)=>{
	res.json({
		message:'add user successful'
	})
})


module.exports = router;