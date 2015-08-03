	$(document).ready(function(){

		//varible galbal
			var paramRealtyAndContractor="";

		
			$("#realtyType").change(function(){

					//alert(this.value);
					paramRealtyAndContractor=this.value;

			});
			$("#realtyType").change();

			
			$("#btn-next-step2").click(function(){
				
					$("[href|='#detailData']").click();
				
					if(("realty2"==paramRealtyAndContractor) 
						|| ("realty3"==paramRealtyAndContractor)
						|| ("realty4"==paramRealtyAndContractor)
						|| ("realty5"==paramRealtyAndContractor)
						|| ("realty6"==paramRealtyAndContractor)
						|| ("realty7"==paramRealtyAndContractor)
						|| ("realty8"==paramRealtyAndContractor)
						|| ("realty9"==paramRealtyAndContractor)
						|| ("realty10"==paramRealtyAndContractor)
						|| ("realty11"==paramRealtyAndContractor)
						|| ("realty12"==paramRealtyAndContractor)
						|| ("realty13"==paramRealtyAndContractor)
						|| ("realty14"==paramRealtyAndContractor)
						|| ("realty15"==paramRealtyAndContractor)

					){
						//alert("home");
						$.ajax({
							url:"./member/detailDataPostHome.php",
							type:"get",
							dataType:"html",
							success:function(data){
								//alert(data);
								$("#detailDataPost").html(data);
							}
						});

					}else if("realty3"==paramRealtyAndContractor){

						$.ajax({
							url:"./member/detailDataPostCondo.php",
							type:"get",
							dataType:"html",
							success:function(data){
								//alert(data);
								$("#detailDataPost").html(data);
							}
						});


					}else if("contractor1"==paramRealtyAndContractor){
						$.ajax({
							url:"./member/detailDataPostConstractor.php",
							type:"get",
							dataType:"html",
							success:function(data){
								//alert(data);
								$("#detailDataPost").html(data);
							}
						});

					}

					
				$("#topcontrol").click();
				//	return false;
					 //$('html, body').animate({scrollTop:0}, 'slow');
			});

			$("#btn-back-step2").click(function(){
					//alert("hello");
					$("[href|='#detailData']").click();
					//return false;
					$("#topcontrol").click();
			});



			$("#btn-back-step1").click(function(){
					//alert("hello");
					$("[href|='#mainData']").click();
					$("#topcontrol").click();
					//return false;
			});


			$("#btn-next-step3").click(function(){
					//alert("hello");
					$("[href|='#imageVideo']").click();
					$("#topcontrol").click();
					//return false;
			});

			$("#btn-back-step3").click(function(){
					//alert("hello");
					$("[href|='#imageVideo']").click();
					$("#topcontrol").click();
					//return false;
			});

			$("#btn-next-step4").click(function(){
					//alert("hello");
					$("[href|='#summary']").click();
					$("#topcontrol").click();
					//return false;
			});


			

	});