//start provine.
callProvince();
//end provine.
		
$(document).ready(function(){

	$(".mainMenuPost").click(function(){
		
		$(".mainMenuPost").removeClass("btn-stackoverflow-inversed").css({"background":""});;
		$(this).addClass("btn-stackoverflow-inversed").css({"background":"orange"});
		$(".paramrtEmbed").remove();
		var paramEmbedPostId="<input type='hidden' value='"+this.id+"' name='embed_rt_id' id='embed_rt_id' class='paramrtEmbed'>";
		var paramEmbedPostName="<input type='hidden' value='"+$(this).text()+"' name='embed_rt_name' id='embed_rt_name' class='paramrtEmbed'>";
		$("#parameterEmbedAreaSale").html(paramEmbedPostId+""+paramEmbedPostName);
		
		
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
	
	$("#fromSearchQuick").submit(function(){
		
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
	
	$("#btnSaveSearch").click(function(){
		
		console.log($("form#formSearchForSales").serialize());
		
		//alert("hello");
		$.ajax({
			url:"Model/mSaveSearch.php",
			type:"post",
			dataType:"html",
			data:$("form#formSearchForSales").serialize(),
			success:function(data){
				console.log(data);
			}
		});
		
		
		return false;
	});
});