let express = require('express');

let router = express.Router();

//创建路由规则
router.get('/',(req,res)=>{
	res.send('helo page');
})

module.exports = router;