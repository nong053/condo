var detailDataPosContructortFn = function(paramRealtyID){

	
	
		
		//contructor select type
		//var cst_type="";
		
		//START Call Contructor Radio 
		
		var callRadioContructor = function(cst_type){
			$.ajax({
				url:"../Model/mDetailDataPostContructor.php",
				type:"post",
				dataType:"html",
				data:{"paramAction":"contructor_select_type","cst_type":cst_type},
				success:function(data){
					$("#areaDataPostContructor").html(data);
				}
			});
		};
		
		//END Call Contructor Radio
		
		var callCSTType=function(){
			$.ajax({
				url:"../Model/mDetailDataPostContructor.php",
				type:"post",
				dataType:"json",
				data:{"paramAction":"getRealtyTypeId","paramRealtyID":paramRealtyID},
				success:function(data){
					//map data 
					if(
					//Contructor
					   data=="30"
					|| data=="31"
					|| data=="32"
					|| data=="33"
					|| data=="34"
					
					){
						cst_type="C";
						
					}else if(
					//Materials
					   data=="27"
					|| data=="28"
					|| data=="29"
					
					){
						cst_type="M";
						
						
					}
					//alert(cst_type);
					callRadioContructor(cst_type);
				//map data
				}
			});
		}
		
		//callCSTType();
		
		
		
		var callCSTCate=function(){
			$.ajax({
				url:"../Model/mDetailDataPostContructor.php",
				type:"post",
				dataType:"json",
				data:{"paramAction":"getRealtyTypeCate","paramRealtyID":paramRealtyID},
				success:function(data){
				
					callRadioContructor(data[0][0]);
					console.log(data[1]);
					if(data[0][0]=="3"){
						
						$(".titleContructor").html("คุณสมบัติสำหรับ"+data[1]);
					}else{
						$(".titleContructor").html("คุณสมบัติสำหรับ"+data[1]);
					}
				//map data
				}
			});
		}
		
		callCSTCate();
		
		//materials

	
	
}