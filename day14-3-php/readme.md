# PHP的框架
### MVC：设计模式

+ model: 数据层
+ view：视图层
+ controller：控制层

#### model

用于和数据库交互，一般就是数据库的操作，也可以是文件数据的操作。

#### view

页面的展示

#### controller

接受用户的请求访问，处理业务逻辑。将model层与view层联系起来。

**请求处理的流程**

当请求进来的时候，根据路由规则，发送给相应的控制controller，控制器内部处理对应的逻辑，以及数据库操作，这个操作需要调用model层的方法。最后如果有视图展示，那么需要调用视图层对应的视图。



### MVVM:  设计模式

model

view

vm: viewmodel



### PHP主流的框架

thinkPHP   laravel    YII  



#### 路由规则

路由器： 接受网络，发散网络。

代码里面的路由：接受请求，发送请求



## 创建自己的PHP框架

目录结构：

​	app: 主要的业务处理目录 ， controller 与model

​       config:配置目录

​	lib: 库

​	vender：第三方库

​	public：静态文件夹

​	view： 页面

