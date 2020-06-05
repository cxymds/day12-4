function ajax(url){
	return new Promise((resolve,reject)=>{
		let xhr = new XMLHttpRequest();
		xhr.open('get',url);
		xhr.send();
		
		xhr.onreadystatechange = ()=>{
			if( xhr.readyState ==4){
				if(xhr.status==200){
					resolve(JSON.parse(xhr.responseText));
				}else{
					reject();
				}
				
			}
		}
	});
}