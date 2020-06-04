function ajax(url,success,error){
	let xhr = new XMLHttpRequest();
	xhr.open('get',url);
	xhr.send();
	
	xhr.onreadystatechange = ()=>{
		if( xhr.readyState ==4){
			if(xhr.status==200){
				success(JSON.parse(xhr.responseText));
			}else{
				error();
			}
			
		}
	}
}