复习：
	##nodejs 安装： 
		1. 安装包  只能装一个版本 LTS  长期支持版 
		2. nvm 管理工具  nvm安装nodejs
		
	##npm: 
	nodejs的包管理工具，安装nodejs的时候同时会安装npm工具
	
	npm： 会到指定的地方去下载打包好的源代码（包，第三方扩展）
		npm install jquery 		 本地安装
		npm install jquery  -g   全局安装
	
	
	npm init  会引导你创建一个package.json文件，包括名称、版本、作者这些信息等 
	npm install <name>安装nodejs的依赖包 
	npm install <name> -g  将包安装到全局环境中 
	npm install <name> --save  安装的同时，将信息写入package.json中生成依赖
	npm install <name>  -S
	npm install <name> --save-dev 安装的同时将依赖写入到package.json的开发依赖中
	npm install <name> -D
	npm remove <name>移除
	npm update <name>更新 
	npm view <name> versions 查看可用版本
	
	
	##cnpm:
	淘宝的源 工具
		npm install -g cnpm  安装
		
		
		
	##nrm：
	 管理npm源
	
	常见命令：
		nrm ls   查看所有当前支持的源
		nrm current  查看当前正在使用的源
		nrm use  {name} 切换源
		nrm add  {name} {url}
		nrm del  {name}
		
	
	## nodemon  自动管理node重启
		管理node开发时的脚本
		
		node http.js
		nodemon http.js
		
		nodemon 的安装：
		1. npm install -g nodemon  全局安装
		2. npm install --save-dev nodemon  本地安装
		注意： 需要配置一个脚本，在package.json的scripts里面。
		例如：  "start":"nodemon index.js"
		运行的时候： npm run start
		
		
		
		路由： 
			1. 请求方法   get  post  put  delete
			2. 请求的路径  /   /user   /user/login 
		