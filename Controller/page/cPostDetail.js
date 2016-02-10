$(document).ready(function(){
	
	
	
	//callProvince("","","","2");
	$("table#gridPostDedail").kendoGrid({
		//height: 550,
       // groupable: true,
        //sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
		scrollable: false,
	});
	
	$("#infoToEmailSubSearch").click(function(){
		
		if($("#cus_id").val()!=""){
			alert("แจ้งเตือนทาง E-mail เรียบร้อย");
		}else{
			alert("ท่านยังไม่ลงชื่อเข้าใช้งาน");
		}
		return false;
		
	});
	$("form#formSubPost").submit(function(){
		
		$.ajax({
			url:"post_detail.php",
			type:"post",
			dataType:"html",
			data:$(this).serialize(),
			success:function(data){
				
				//alert($("#rdg_line_sale_bts2").val());
				//alert($("#rdg_bts2").val());
				
				//call function callLineSubBTS start
				callLineSubBTS($("#rdg_line_sale_bts2").val(),$("#rdg_bts2").val());
				//call function callLineSubBTS end
				
				$("#mainContrainArea").html(data);
				
				
				
				
				
			}
		});
		return false;
		
	
	});
	/*
	$(".btnSavePost").click(function(){
		//alert(this.id);
		var rdg_id=this.id;
		$.ajax({
			url:"Model/mSavedPost.php",
			type:"post",
			dataType:"json",
			data:{"paramAction":"checkUnique","rdg_id":rdg_id},
			success:function(data){
				//alert(data);
				if(data=="unique"){
					
					$.ajax({
						url:"Model/mSavedPost.php",
						type:"post",
						dataType:"json",
						data:{"paramAction":"savePost","rdg_id":rdg_id},
						success:function(data){
							if(data=='success'){
								alert("บันทึกประกาศเรียบร้อย");
							}
							
						}
					});
					
				}else{
					alert("ประกาศนี้ถูกบันทึกแล้ว");
				}
				
			}
		});
		
		return false;
	});
	*/
	//call function button
	contactFormModalFn();
	mapContactModalFn();
	imageSlideModalFn();
});