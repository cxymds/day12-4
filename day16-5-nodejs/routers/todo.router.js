let  express = require('express');

let router = express.Router();
//引入模型
let Models = require('../models');

router.post('/',(req,res)=>{
	let {text,complete,UserId} = req.body;
	Models.Todo.create({
		text,
		complete,
		UserId
	}).then((data)=>{
		res.json(data)
	}).catch(()=>{
		
	})
	
})


module.exports = router;