# 复习
node.js的系统模块
## 文件模块 fs
readFile
rfeadFileSync
writeFile
writeFileSync
stream
stat
readDir

##路径解析 path
##url解析 
	2种方式
	url.parse(url)
	new URL(url)
##网络请求响应模块 http
	构建web服务器
		路由规则的处理
		请求处理
		响应的返回

# 构建web服务
	框架 PHP： laravel  thinkphp  YII  自己编写了一个小型框架
	nodejs框架： express  
	
	配置scripts脚本命令的时候。
	如果设置的启动命令为start，那么调用的时候使用npm start
	如果是其他，那么使用 npm run  name


## 构建步骤
### 1. 创建一个文件
### 2. 执行 git初始化

```
git init
```

### 3. 执行npm初始化

```
npm init -y
```

### 4. 安装依赖

```
//安装express
npm install express -D
//安装nodemon
npm install nodemon -D
```

### 5. 创建项目的入口文件

根据webpack的规则，需要将入口文件创建在src目录里面。

在src文件夹中创建一个app.js的文件。

### 6. 配置启动脚本

在package.json文件的scripts里面配置一个启动命令，使用nodemon去启动入口文件。

```
scripts:{
  "start":"nodemon ./src/app.js",
}
```

### 7. 编写入口文件，创建应用

```
let express = require('express');
let app = express(); 
//设置监听
app.listen('3000',()=>{
  console.log('应用已经启动')
})；
//创建路由规则
app.get('/',(req,res)=>{
  res.json({
  		message:'its ok'
	})
})
```

### 8. 浏览器访问 127.0.0.1：3000/



### 9. express生成器

​	通过应用生成器工具 express-generator 可以快速创建一个应用的骨架。

你可以通过 npx （包含在 Node.js 8.2.0 及更高版本中）命令来运行 Express 应用程序生成器。

```
npx express-generator
```

对于较老的 Node 版本，请通过 npm 将 Express 应用程序生成器安装到全局环境中并执行即可。

```
 npm install -g express-generator
 express
 
 参数：
 	-h, --help          输出使用方法
        --version       输出版本号
    -e, --ejs           添加对 ejs 模板引擎的支持
        --hbs           添加对 handlebars 模板引擎的支持
        --pug           添加对 pug 模板引擎的支持
    -H, --hogan         添加对 hogan.js 模板引擎的支持
        --no-view       创建不带视图引擎的项目
    -v, --view <engine> 添加对视图引擎（view） <engine> 的支持 (ejs|hbs|hjs|jade|pug|twig|vash) （默认是 jade 模板引擎）
    -c, --css <engine>  添加样式表引擎 <engine> 的支持 (less|stylus|compass|sass) （默认是普通的 css 文件）
        --git           添加 .gitignore
    -f, --force         强制在非空目录下创建
```

安装依赖：

```
 npm install
```

启动：

	1. 使用脚本 bin目录里面的www脚本

```
./bin/www
```

1. 启动命令

在 MacOS 或 Linux 中，通过如下命令启动此应用：

```
  npm start
```

在 Windows 中，通过如下命令启动此应用：

```
 npm start
```



## express 路由

路由的俩个基本要素

1. 不同的http请求方法  
2. 路径
3. 参数

### 1. 根据请求方法实现路由

restfulAPI ，不同的请求实现不同的操作。

任何网络请求都是操作资源

文章 article 

get   	 /articles

​	/articles    	获取文字的列表

​	/articles/:id    获取某一篇具体文字的信息

post		 /articles    保存一篇文章

put 		/articles/:id   修改资源（文章）

delete	

​	/articles		删除所有

​	/articles/:id   删除具体资源

```
express.[METHOD]((req,res)=>{
  //路由处理
});
```

## 2. 根据路径涉嫌路由

```javascript
app.get('/',(req,res)=>{
	res.json({
		message:"hello everyone from get!"
	});
})
app.get('/users',(req,res)=>{
	res.json([
		{
			id: '001',
			name:"chenergou",
			pass:"wer2334"
		},
		{
			id: '002',
			name:"laoliu",
			pass:"ugasgdhs"
		},
		{
			id: '003',
			name:"laoba",
			pass:"xiaohanbao"
		},
	]);
});
app.get('/users/message',(req,res)=>{
	res.json({
		id: '001',
		name:"chenergou",
		pass:"wer2334"
	});
});
```

###  3. 不管使用什么请求方式过来，都能够访问某一个路由

```
router.all('/user',(req,res)=>{
  
})
```

### 4. 接受所有路径的请求

```javascript
app.get('/logs/*',(req,res)=>{
	res.send('都行');
})
```

## 5. 根据接受的参数实现下一步路由处理

```javascript
app.delete('/arc/:id',(req,res,next)=>{
	next();
})
app.get('/user/:id',(req,res,next)=>{
	console.log(id)
	res.send();
})
app.param('id',(req,res,next,id)=>{
	console.log(id)
	res.send();
})
```

### 6. 使用中间件语法实现路由

```
app.use('/user',(req,res)=>{
	console.log('登陆了')
	res.send();
})
```

### 7. 建立子路由

/user

/article

/test

/admin

### 8. 中间件

+ app或者应用级别的中间件

  ```
  app.use(log_middleware);
  function log_middleware(req,res,next){
  	console.log('----'+ req.url);
  	next();
  }
  ```

+ 路由模块级别的中间件

  ```
  let router = express.Router();
  //路由级别的中间件
  router.use(log_middleware)
  function log_middleware(req,res,next){
  	console.log('----'+ req.url);
  	next();
  }
  ```


+ 具体某一个路由的中间件

  ```
  router.get('/info',[log_middleware],(req,res)=>{
  	res.json({
  		id:"9528",
  		name:"zhouxingxing",
  		position:"daza"
  	});
  })
  ```


+ 系统自带中间件 static

  ```
  app.use(express.static('public',{
  	extensions:['html','htm','css']
  }));
  ```

+ 第三方中间件

  ```
  body-parser

  npm install body-parser

  var bodyParser = require('body-parser')
  // parse application/x-www-form-urlencoded
  app.use(bodyParser.urlencoded({ extended: false }))

  // parse application/json
  app.use(bodyParser.json())
  ```

### 参考文档

参考1 [4.x中文文档](https://wizardforcel.gitbooks.io/expressjs-doc/content/3.html)

