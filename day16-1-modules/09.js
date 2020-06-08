 let a = 12; //导出一个变量
 function s(){ //导出一个方法
	console.log('a');
}
 const func = function (){
	console.log('b');
}

function d(){
	return a**a;
}

 class User{
	say(){
		console.log('zhangsnaname');
	}
}

export {a,s,func as f,User};