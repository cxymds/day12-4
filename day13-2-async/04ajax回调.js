$.get(url,null,function(e){
	$.post(url,data,function(e){
		$.ajax({
			url:url,
			method:get,
			dataType:json,
			success:function(){
				
			}
		})
	})
})