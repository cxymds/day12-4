# ES6

## let 与 const

### let

let 和const用于定义变量。let类似于之前的var。const是定义常量的。

ES6 新增了let命令，用来声明变量。它的用法类似于var，但是所声明的变量，只在let命令所在的代码块内有效。

```
<script>
{
	var a = 12;
	let b =10;
}
console.log(a)
console.log(b)
</script>
```

let使用在for循环中

```
 //let使用for循环参数里只能在循环内部使用
 for(let i=0;i<=5;i++){
	 console.log(i)
 }
 console.log(i) //not  defined
```

let在for循环添加事件中最典型的使用方式

```
var btns = document.getElementsByTagName('button');
for(let i=0;i<btns.length;i++){
	btns[i].onclick = function(){
    	console.log(i)
    }
}
```

let 在for循环作为循环参数的时候，其实是俩个作用域，大括号里面的是子作用域，如果里面再次定义与循环参数相同的变量，则不会产生相互影响。

```
//for其实是俩个作用域，大括号里面是一个子作用域
for(let i=0;i<=3;i++){
	let i = 'a';
	console.log(i);
}
```

let不存在变量提升，let命令改变了语法行为，它所声明的变量一定要在声明后使用，否则报错。

```
console.log(a) //not defined
let a = 12;
```

**暂时性死区**

ES6 明确规定，如果区块中存在let和const命令，这个区块对这些命令声明的变量，从一开始就形成了封闭作用域。凡是在声明之前就使用这些变量，就会报错。

在代码块内，使用let命令声明变量之前，该变量都是不可用的。这在语法上，称为“暂时性死区“,let不允许重复定义一个变量。

```
//大括号括起来的称之为块作用域，有循环  switch结构 if结构
for(let i =0;i<3;i++){
	console.log(i)
	// let i ='a';
	let i = '123';
}
```

### 块级作用于

+ ES5 规定，函数只能在顶层作用域和函数作用域之中声明，不能在块级作用域声明。

  浏览器没有遵守这个规定，为了兼容以前的旧代码，还是支持在块级作用域之中声明函数，因此上面两种情况实际都能运行，不会报错。

```javascript
if(true){
	function say(){
		console.log(1)
	}
}
say();  //1
```

+ ES6 引入了块级作用域，明确允许在块级作用域之中声明函数。ES6 规定，块级作用域之中，函数声明语句的行为类似于let，在块级作用域之外不可引用。

```
<script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
	<script type="text/babel">
	// Your ES6 code
	if(true){
		function say(){
			console.log(1)
		}
	}
	say();
	</script>
```

![](WX20200602-113748@2x.png)

为了减轻因此产生的不兼容问题，ES6 在附录 B里面规定，浏览器的实现可以不遵守上面的规定，有自己的行为方式。

1. 允许在块级作用域内声明函数。
2. 函数声明类似于var，即会提升到全局作用域或函数作用域的头部。
3. 同时，函数声明还会提升到所在的块级作用域的头部。

### const

js用于定义常量：一单定义之后不允许修改的值称为常量。

+ const声明一个只读的常量。一旦声明，常量的值就不能改变。


+ const申明变量必须在进行初始化赋值。不允许先申明后赋值。


+ const的作用域是块级作用域，与let的作用域相同
+ const不存在变量提升特性，也存在暂时性死区， 也不能重复定义
+ const本质上是指向的地址指针不发生变化，对于指针指向的是对象的变量，其实是可以发生变化的。所以尽量将常量定义为简单数据类型（数字，字符串，布尔值）
+ 如果避免不了料使用对象作为常量，可以对这个对象进行冻结 object.freeze

**从 ES6 开始，全局变量将逐步与顶层对象的属性脱钩。**

```javascript
var a = 12;
console.log(window.a)  //12

let a = 12;
console.log(window.a)  //undefined
```

### 获取各种运行环境下的全局对象

```javascript
// 方法一
(typeof window !== 'undefined'
   ? window
   : (typeof process === 'object' &&
      typeof require === 'function' &&
      typeof global === 'object')
     ? global
     : this);

// 方法二
var getGlobal = function () {
  if (typeof self !== 'undefined') { return self; }
  if (typeof window !== 'undefined') { return window; }
  if (typeof global !== 'undefined') { return global; }
  throw new Error('unable to locate global object');
};
```



### 作业：

使用markdown整理所有let语法。预习const语法，也整理早markdown笔记中 。发表在技术博客。连接发送到群里。



### 

