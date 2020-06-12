let  express = require('express');

router = express.Router();

let Models = require('../models');
// 列表   get /users
router.get('/',(req,res)=>{
	Models.User.findAll().then((data)=>{
		res.json(data);
	})
})

//添加  post  /users  body带数据
router.post('/',(req,res)=>{
	let {name,age,desc} = req.body;
 	Models.User.create({
		name,
		age,
		desc
	}).then((data)=>{
		res.json(data);
	})
	
})

//获取，某一个用户的信息  get   /users/:id
router.get('/:id',(req,res)=>{
	let {id} = req.params;
	res.send('get one user')
})
//删除 删一个   delete  /users/:id
router.delete('/:id',(req,res)=>{
	let {id} = req.params;
	res.send('delete  one user')
})
//全删   delete /users
router.delete('/',(req,res)=>{
	res.send('delete all list')
})

//修改   put  /users/:id  body  
router.put('/:id',(req,res)=>{
	let {id} = req.params;
	res.send('update list')
})
module.exports = router;