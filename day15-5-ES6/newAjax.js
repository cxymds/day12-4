/**
 * @desc  实现promise封装的ajax
 * @param {Object} type 请求的类型
 * @param {Object} url  请求的地址
 * @param {Object} data 请求的数据
 */
function Ajax(type, url, data={}) {

    return new Promise(function(resolve, reject) {
		//创建ajax
        var xhr = null
        if (window.XMLHttpRequest) {
            xhr = new XMLHttpRequest();
        } else {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
		
		//发送请求
        if (type == 'GET' || type == 'get') {
			//建立连接
			xhr.open(type, url+'?'+formatParams(data), true);
            xhr.send()
        } else {
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			//建立连接
			xhr.open(type, url, true);
            xhr.send(formatParams(data));
        }
		
		xhr.onreadystatechange = function(){
		    if (xhr.readyState == 4 ) {
				if(xhr.status == 200){
					 resolve(JSON.parse(xhr.responseText));
				}else{
					reject(xhr)
				}
		    } 
		}

    })

	/**
	 * @desc 数据的格式化 key=value&lkey=value
	 * @param {Object} data 提交的数据
	 */
    function formatParams(data) {
        var arr = [];
        for(var name in data){
            arr.push(name + '=' + data[name]);
        }
        return arr.join("&");
    }
}
