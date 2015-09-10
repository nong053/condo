
	var callMapSummary=function(rdg_id){
		//alert(rdg_id);
		$.ajax({
			url:"Model/mSummary.php",
			type:"post",
			dataType:"text",
			async:false,
			data:{"rdg_id":rdg_id,"paramAction":"getMap"},
			success:function(data){
				
				//####rdg_map####
				//alert()13.857326299999999,100.7267414
				var latLong=data;
			//	alert(latLong);
				latLong=latLong.split(",");
				setTimeout(function(){
					setupMap(true,latLong[0],latLong[1],"map-canvas-summary");
					//alert(latLong[0]);
					//alert(latLong[1]);
				},2000);
			}
		});
	};
	
	
