//start provine.
callProvince();
//end provine.
		
$(document).ready(function(){

	$(".mainMenuSalePost").click(function(){
		
		$(".mainMenuSalePost").removeClass("btn-stackoverflow-inversed").css({"background":""});;
		$(this).addClass("btn-stackoverflow-inversed").css({"background":"orange"});
		$("#embed_rt_id").remove();
		var paramEmbedPostId="<input type='hidden' value='"+this.id+"' name='embed_rt_id' id=embed_rt_id class='paramEmbed'>";
		$("#parameterEmbedArea").html(paramEmbedPostId);
	});
	
	$("form#formSearchForSales").submit(function(){
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