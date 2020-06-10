let  a = 12;  //全局作用域
function say(){
	console.log(a); 
	let c = 22; //局部作用域
}

say();
// console.log(c) 


泡个面
	
炒个菜


同步  泡面 ---> 等几分钟 ----> 炒菜   6
异步  泡面----> 等几分钟  		   3
		  -->炒菜