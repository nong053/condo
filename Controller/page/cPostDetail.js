$(document).ready(function(){
	//callProvince("","","","2");
	
	$("form#formSubPost").submit(function(){
	
		
		$.ajax({
			url:"post_detail.php",
			type:"post",
			dataType:"html",
			data:$(this).serialize(),
			success:function(data){
				$("#mainContrainArea").html(data);
				
			}
		});
		return false;
		
	
	});
});