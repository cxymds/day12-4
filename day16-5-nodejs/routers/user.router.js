let express = require('express');

let router = express.Router();

//创建路由规则
router.get('/',(req,res)=>{
	res.send('hello ser!');
})
router.get('/users',(req,res)=>{
	// throw new Error('my self wrong!')
	
	res.json([
		{
			id:901,
			name:"zhangsan",
			age:18
		},
		{
			id:801,
			name:"xiaoba",
			age:8
		},
		{
			id:904,
			name:"laoliu",
			age:76
		},
		{
			id:732,
			name:"xiaozhu",
			age:23
		}
	])
});

router.delete('/users/:id',(req,res)=>{
	let {id} = req.params;
	//操作数据库删除
	res.json({
		message:'删除成功'
	})
})

module.exports = router;