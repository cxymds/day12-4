1. script 标签在引入模块的时候需要将type设置为module
2. 在import模块的时候需要写上路径  
3. 延迟加载，所有的模块都是在最后加载。
4. 严格模式，ES在class和模块里面默认使用严格模式。
5. 每一个模块都是单独的作用域,相互不会产生影响，类似于立即执行函数。
6. 模块是执行预解析的，也就是模块加载只执行一次。只有第一次加载的时候会运行整个脚本，之后都是在内存获取的。

# 导入导出

## import


		1. 具名导出
		import {name1,name2} from './module.js';
1.      批量导入，* 代表所有的导出的内容全部导入。 批量导入有可能会造成变量名冲突或者函数覆盖，所以批量导入必须起别名。
                 import * as module_name from './module.js';


**注意：**

import表达式不能是按需导出。

	if(a==true){
		import {a,b} from './module.js';
	}
## export

1. 可以进行分别导出
```
	export let a = 12
	export function say(){
		
	};
	export const func = function(){};
	export class User{
		log(){
			
		}
	}
```
1. 可以具名导出
   在模块代码的最后使用export {};导出所有需要导出的内容。
```
export {a,say,func,User};
```
1. 导出别名
```
export {a,s,func as f,User};
```
1. 默认导出
   使用关键字default ，默认导出不需要{ }.
   只能有一个默认导出。
   默认导出可以没有命名，也可以起别名。
2. 混合导出
   既有默认导出，又有具名导出
   可以同时存在具名与默认导出，也可以同时存在具名与默认导入。

```
export {a,s,User as default};
```
具名导出的具名引入还是需要大括号，默认导出不需要大括号
```
import {a,s} from './12.js';
import xmr from './12.js';
```
合并导入：
```
import xmr,{a,s} from './12.js';
import {a,s, default as xmr} from './12.js';
```
当时用批量导入具有默认导出的模块时，使用默认导出模块需要default访问
```
import * as api from './12.js';
api.default.show();
```
**建议**
	1. 不建议使用默认导出，这会让开发者自己定义名称，造成混乱
	2. 如果要使用默认导出，最好和模块的文件名进行关联。

### 多模块联合导出：

使用一个js文件导出所有的其他模块
13.js

```
let size = 24;

const func = function(){
	console.log('this is a function !');
}

export {size,func};
```
14.js
```
export default class {
	say(){
		console.log('who am i ?');
	}
	
	static load(){
		console.log('i am readding');
	}
}
```
使用index.js合并导出
```
export * as m13 from './13.js';
export {default as m14} from './14.js';
```
使用合并导出
```
import {m13,m14} from './index.js';
console.log(m13.size);
m13.func();
m14.load();
```
### 动态加载

使用import 语句导入模块必须在顶层静态载入模块。不能动态加载模块。

如果想要实现动态加载，需要使用import（）函数。他返回一个promise对象。

```javascript
 let a = 123;
	 if(a == '123'){
		 import ('./index.js').then((module)=>{
			 console.log(module.m13.size);
			  module.m13.func();
			  module.m14.load();
		 })
		/* */
	 }
```

## 汇总：

导出：

+ 导出变量： export let number = 12；   export const  pi = 3.14


+ 导出函数：export function  name(){}

​	export  const func = function(){}

+ 导出类 ： export  class ClassName{}


+ 默认导出： export default  class{}


+ 别名导出： export  { export_mode_name as  new_module_name }

导入：

+ import { name ,name} from  './module.js';

+ import * as api from './file_name'

+ import default_name from './file_name';

+ import { a, func, default as def } from './file_name'

   