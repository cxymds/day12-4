#构建项目
1. 初始化
	npm init -y  产生package.json
	git init     创建一个仓库
2. 安装express
	npm install express --save-dev -D
3. 安装nodemon node脚本管理工具
	npm install nodemon -D
4. 配置服务启动脚本
	"start":"nodemon ./src/app.js"
	
	

##错误异常处理
//标准的错误异常处理
app.use((error,req,res,next)=>{
	
})
//中间件  可以用来处理404
app.use((req,res,next)=>{
	
})

//路由规则
app.use((req,res)=>{
	
})


## MySQL扩展
sequelize  ORM  
	npm install sequelize -D
sequelize-cli  命令行工具
	npm install sequelize-cli -D
mysql2  MySQL驱动 
	npm install mysql2 -D

## 使用sequelize-cli 快速构建模型
1. 初始化
	node_modules/.bin/sequelize init 
	会生成一些文件夹：
		config：配置文件夹，里面有config.js 配置三种环境下的MySQL信息
		migrations: 迁移表结构文件夹
		models： 数据模型，model层
		seeders: 数据生成器，测试数据的生产
2. 生成迁移结构，表结构
	node_modules/.bin/sequelize model:create --name Todo --attributes 'text:string,complete:boolean,UserId:integer'
	会在models里面会产生模型文件，在migrations里面会产生迁移文件
	
3. 执行迁移，永久化到数据库
	node_modules/.bin/sequelize db:migrate


## sequelize 参考文档
[sequelize](https://itbilu.com/nodejs/npm/sequelize-docs-v5.html#querying)
[sequelize-cli](https://www.jianshu.com/p/14a34a310b84)
[express](https://www.expressjs.com.cn/en/resources/middleware/body-parser.html)
[express-api](https://wizardforcel.gitbooks.io/expressjs-doc/content/3.html)