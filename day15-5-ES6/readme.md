## promise

promise 有三种状态：
+ pedding： 等待状态 。
+ resolve： 解决异步执行之后成功
+ reject：     解决异步执行之后失败

promise的状态变化：

pedding -> resolve

pedding-> reject

promise的状态变化是由promise内部实现的。只需要调用resolve或者reject就可以了。



### 链式操作

promise.then(

()=>{},

()=>{}).then(

()=>{},

()=>{})



### promise的方法

+ then

```
new Promise((resolve,reject)=>{}).then(
()=>{}，//resolve
()=>{} //reject
);

new Promise((resolve,reject)=>{}).then(
()=>{}，//resolve
);
```

+ catch

```
new Promise((resolve,reject)=>{}).then(
()=>{}，//resolve
).catch(
()=>{} //reject
);
```

+ finally

```
new Promise((resolve,reject)=>{}).then(
()=>{}，//resolve
).catch(
()=>{} //reject
).finally(
()=>{}
);
```

+ all

  all()方法用于将多个 Promise 实例，包装成一个新的 Promise 实例

  ```const p = Promise.all([p1, p2, p3])```

  （1）只有p1、p2、p3的状态都变成fulfilled，p的状态才会变成fulfilled，此时p1、p2、p3的返回值组成一个数组，传递给p的回调函数。

  （2）只要p1、p2、p3之中有一个被rejected，p的状态就变成rejected，此时第一个被reject的实例的返回值，会传递给p的回调函数。


+ all

  Promise.any()方法接受一组 Promise 实例作为参数，包装成一个新的 Promise 实例。只要参数实例有一个变成fulfilled状态，包装实例就会变成fulfilled状态；如果所有参数实例都变成rejected状态，包装实例就会变成rejected状态。该方法目前是一个第三阶段的提案 

+ race

  Promise.race()方法同样是将多个 Promise 实例，包装成一个新的 Promise 实例。

  ```const p = Promise.race([p1, p2, p3]);```

  只要p1、p2、p3之中有一个实例率先改变状态，p的状态就跟着改变。那个率先改变的 Promise 实例的返回值，就传递给p的回调函数。


+ allSelect

  Promise.allSettled()方法接受一组 Promise 实例作为参数，包装成一个新的 Promise 实例。只有等到所有这些参数实例都返回结果，不管是fulfilled还是rejected，包装实例才会结束。该方法由 ES2020 引入。

  ​


+ resolve

  有时需要将现有对象转为 Promise 对象，Promise.resolve()方法就起到这个作用

  ​	Promise.resolve方法的参数分成四种情况。

  + 参数是一个 Promise 实例
  + 参数是一个thenable对象
  + 参数不是具有then方法的对象，或根本就不是对象
  + 不带有任何参数


+ reject

Promise.reject(reason)方法也会返回一个新的 Promise 实例，该实例的状态为rejected。

```
const p = Promise.reject('出错了');
// 等同于
const p = new Promise((resolve, reject) => reject('出错了'))

p.then(null, function (s) {
  console.log(s)
});
// 出错了
```

### async

本质上就是封装和一个promise

### await



## ES6面向对象
class
static
super
extends


## 作业： 预习模块化
什么是模块化
AMD
CMD
Require.js
sea.js
commonjs
ES6

nodejs
vue
xue项目
小程序