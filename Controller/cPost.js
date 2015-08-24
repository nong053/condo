	$(document).ready(function(){
		
		//varible galbal
		var paramRealtyAndContractorType="";
		var paramRealtyID="";
		var Lat="";
		var Lng="";
		
		
		
		//start map
		/*
		function initialize() {
        	//13.7246005,100.6331108
          var myLatlng = new google.maps.LatLng(13.857326299999999,100.7267414);
          var mapOptions = {
            zoom: 15,
            center: myLatlng
          }
          var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        
          var marker = new google.maps.Marker({
              position: myLatlng,
              map: map,
              title: 'Share Olanlab Com'
          });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
        
        
        var x = document.getElementById("demo");
		
		function getLocation() {
		    if (navigator.geolocation) {
		        navigator.geolocation.getCurrentPosition(showPosition);
		    } else { 
		        x.innerHTML = "Geolocation is not supported by this browser.";
		    }
		}
		
		function showPosition(position) {
		    x.innerHTML = "Latitude: " + position.coords.latitude + 
		    "<br>Longitude: " + position.coords.longitude;	
		}
		
		
		$("#btnCreateMarker").click(function(){
			getLocation();
			return false;
		});
		*/
		var lat="";
		var long="";
		
		
	
		var showMarker="";
		function getLocation(paramShowMarker) {
			showMarker=paramShowMarker;
		    if (navigator.geolocation) {
		        navigator.geolocation.getCurrentPosition(showPosition);
		        
		    } else { 
		        x.innerHTML = "Geolocation is not supported by this browser.";
		    }
		}
		
		function showPosition(position) {
			//alert(position.coords.latitude);
			//alert(position.coords.longitude);
			setupMap(showMarker,position.coords.latitude,position.coords.longitude);
			
			
		}
		
		
		
	
		
		function setupMap(paramShowMarker,currentLat,currentLong) {
			
			
			var latLongEmbedHtml="";
			
			var myOptions = {
			  zoom: 15,
			  center: new google.maps.LatLng(currentLat,currentLong),
			  mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			var map = new google.maps.Map(document.getElementById('map-canvas'),
				myOptions);
			
			if(paramShowMarker==true){
			$(".paramLatLong").remove();
			latLongEmbedHtml="<input type=\"hidden\" name=\"paramLat\" id=\"paramLat\" class=\"paramLatLong\" value=\""+currentLat+"\">";
			latLongEmbedHtml+="<input type=\"hidden\" name=\"paramLong\" id=\"paramLong\" class=\"paramLatLong\" value=\""+currentLong+"\">";
			$("#paramLatLong").html(latLongEmbedHtml);
			
			var marker = new google.maps.Marker({
			map:map,
			position: new google.maps.LatLng(currentLat,currentLong),
			draggable: true
			});
			}
			
			var infowindow = new google.maps.InfoWindow({
			//map:map,
			//content: "ตำแหน่งที่ตั้ง",
			//position:  new google.maps.LatLng(13.857326299999999, 100.7267414)
			});
			


			google.maps.event.addListener(map,'click',function(event){
				
				if(!marker){
					alert("คลิ๊กปุ่มปักหมุดก่อนครับ");
					return false;
				}
	
				infowindow.open(map,marker);
				//infowindow.setContent('ปักหมุดตรงนี้' + event.latLng);
				infowindow.setContent('ปักหมุดตรงนี้');
				//alert(event.latLng);
				
				var latt="";
				var long="";
				//find lat
				latt=event.latLng+"";
				latt=latt.split(",");
				latt=latt[0].split("(");
				latt=latt[1];
				
				
				//find long
				long=event.latLng+"";
				long=long.split(",");
				long=long[1].split(")");
				long=long[0];
				
			
				
				
				infowindow.setPosition(event.latLng);
				marker.setPosition(event.latLng);
				
				/*
				alert(latt);
				alert(long);
				*/
				
				$(".paramLatLong").remove();
				latLongEmbedHtml="<input type=\"hidden\" name=\"paramLat\" id=\"paramLat\" class=\"paramLatLong\" value=\""+latt+"\">";
				latLongEmbedHtml+="<input type=\"hidden\" name=\"paramLong\" id=\"paramLong\" class=\"paramLatLong\" value=\""+long+"\">";	
				$("#paramLatLong").html(latLongEmbedHtml);
			
			
			});


		}
		//setupMap();
		getLocation(false);
		$("#btnCreateMarker").click(function(){
			getLocation(true);
			
			return false;
		});
		//end map
		
		//start provine .
		callProvince();
		//end provine 
		//Start Call callRealtyFor
		callRealtyFor(1);
		
		//End Call callRealtyFor
		
		 
		

		//Start realType Radio
		$(".realtyType1").click(function(){
			
			callRealtyType($(this).val());
			paramRealtyAndContractorType=$(this).val();
			//alert(paramRealtyAndContractor);
			
		});
		$("#realtyType1Realty").click();
		//End realType Raido
		
		
		//start realty unit 
		callRealtyUnit();
		//end realty unit 
		
		//start travel by bts 
		callTavelByBTS();
		//end travel by bts 
		
		//start travel by MRT 
		callTavelByMRT();
		//end travel by MRT
		
		//start travel by ARL 
		callTavelByARL();
		//end travel by ARL
		
		//start travel by HARBOR 
		callTavelByHARBOR();
		//end travel by HARBOR
		
		
		//start list status project
		callRealtyProjectStatus();
		//end list status project
		
			var validation = function(){
				var validateStr="";
				if($("select#realtyType").val()=="" || $("select#realtyType").val()==null){
					validateStr+="กำหนดประเภทอสังหาริมทรัพย์ด้วยค่ะ \n"
					
				}
				/*
				if($("select#rdg_address_province_id").val()=="" || $("select#rdg_address_province_id").val()==null){
					validateStr+="กำหนดจังหวัดด้วยค่ะ \n"
					
				}
				
				if($("select#rdg_address_district_id").val()=="" || $("select#rdg_address_district_id").val()==null){
					validateStr+="กำหนดอำเภอด้วยค่ะ \n"
					
				}
				if($("select#rdg_address_sub_district_id").val()=="" || $("select#rdg_address_sub_district_id").val()==null){
					validateStr+="กำหนดตำบลด้วยค่ะ \n"
					
				}
				if($("select#realtyUnit").val()=="" || $("select#realtyUnit").val()==null){
					validateStr+="กำหนดหน่วยของพื้นที่ด้วยค่ะ \n"
					
				}
				*/
				
				if(validateStr!=""){
					alert(validateStr);
					return false;
				}else{
					return true;
				}
			};
			

			//start save first step
			$("#saveStep1").click(function(){
				
					if(validation()){
				
					$.ajax({
						url:"../Model/mRealtyDataGeneralAction.php",
						type:"POST",
						dataType:"json",
						data:$( "form#formRealtyDataGe").serialize(),
						success:function(data){
					
							var rdg_id=data[1];
							
							//alert(rdg_id);
							if(data[0]=="seccess"){
								alert("บันทึกข้อมูลเรียบร้อย");
								$("#paramEmbedRdgId").remove();
								$("#paramEmbedRdgIdArea").append("<input type='hidden' name='paramEmbedRdgId' id='paramEmbedRdgId' value="+rdg_id+" >");
								//start next to detail data
								/*
								$("[href|='#detailData']").click();
								//alert(paramRealtyAndContractor);
									//alert("home");
									$.ajax({
										url:"./member/detailDataPost.php",
										type:"get",
										dataType:"html",
										data:{"paramRealtyId":paramRealtyAndContractor},
										success:function(data){
											//alert(data);
											$("#detailDataPost").html(data);
										}
									});
								$("#topcontrol").click();
								*/
								//end next to detail data
							}
							
						}
					});
				}
				
				return false;
			});
			
			//start next to detail data
			//$("[href|='#detailData']").click();
			//alert(paramRealtyAndContractor);
			
			var postDeatilFn=function(paramRealtyAndContractorType,paramRealtyID){
				//alert("home");
				var urlDetailPost="";
				if(paramRealtyAndContractorType=="Y"){
				
					$.ajax({
						url:"../member/detailDataPostConstractor.php",
						type:"post",
						dataType:"html",
						data:{"paramRealtyID":paramRealtyID},
						success:function(data){
							//alert(data);
							$("#detailDataPost").html(data);
							//call cDetailDataPostContructor.js
							//alert(paramRealtyID);
							detailDataPosContructortFn(paramRealtyID);
						}
					});
				}else{
					
					$.ajax({
						url:"../member/detailDataPost.php",
						type:"post",
						dataType:"html",
						data:{"paramRealtyID":paramRealtyID},
						success:function(data){
							//alert(data);
							$("#detailDataPost").html(data);
							//call cDetailDataPost.js
							detailDataPostFn(paramRealtyID);
							
							//start footer button
							$("#btn-back-step1").click(function(){
								//alert("hello");
								$("[href|='#mainData']").click();
								$("#topcontrol").click();
								//return false;
							});
						}
					});
					
				}
				
				
			};
			
			// Start Main tabs 
			
			$("[href|='#mainData']").click(function(){
				
				//alert("#mainData");
				if($("#paramEmbedRdgId").val()==undefined || $("#paramEmbedRdgId").val()=="" || $("#paramEmbedRdgId").val()=="undefined"){
					
					alert("not RdgId");
					
				}else{
					
					//Start call Data again
					$.ajax({
						url:"../Model/mRealtyDataGeneralAction.php",
						type:"post",
						dataType:"json",
						data:{"paramAction":"realtyDataGeneralById","RdgId":$("#paramEmbedRdgId").val()},
						success:function(data){
							console.log(data);
							//console.log(data['rf_id']);
							callRealtyFor(data['rf_id']);
							
							//####rdg_special####
						
							var realtySpecialHTML="";
							realtySpecialHTML+="<div class=\"optonArea\">";
								realtySpecialHTML+="<div class=\"checkbox\">";
								realtySpecialHTML+="<label>";
									if(data['rdg_special']=="N"){
									realtySpecialHTML+="<input type=\"radio\" checked=\"checked\" value=\"N\" class=\"rdg_special\" name=\"rdg_special\"> ประกาศฟรี ";
									realtySpecialHTML+="<input type=\"radio\" value=\"Y\" class=\"rdg_special\" name=\"rdg_special\"> ประกาศพิเศษหน้าแรก";
									}else{
										realtySpecialHTML+="<input type=\"radio\"  value=\"N\" class=\"rdg_special\" name=\"rdg_special\"> ประกาศฟรี ";
										realtySpecialHTML+="<input type=\"radio\" checked=\"checked\" value=\"Y\" class=\"rdg_special\" name=\"rdg_special\"> ประกาศพิเศษหน้าแรก";	
									}
								realtySpecialHTML+="</label></div>";
							realtySpecialHTML+="</div>";
						
						
							$("#realtySpecialArea").html(realtySpecialHTML);
							
							//######realtyType1Realty#########
							var realtyType1RealtyHTML="";
							if(data['rt_contructor_yet']=="N"){
								realtyType1RealtyHTML+="<input type=\"radio\" name=\"realtyType1\" class=\"realtyType1\"  id=\"realtyType1Realty\" value=\"N\" checked=\"checked\"> อสังหาริมทรัพย์ทั่วไป"; 
								realtyType1RealtyHTML+="<input type=\"radio\" name=\"realtyType1\" class=\"realtyType1\" value=\"Y\"> สำหรับผู้รับเหมา ";
							}else{
								realtyType1RealtyHTML+="<input type=\"radio\" name=\"realtyType1\" class=\"realtyType1\"  id=\"realtyType1Realty\" value=\"N\" > อสังหาริมทรัพย์ทั่วไป"; 
								realtyType1RealtyHTML+="<input type=\"radio\" name=\"realtyType1\" class=\"realtyType1\" value=\"Y\" checked=\"checked\"> สำหรับผู้รับเหมา ";
							}
							$("#realtyType1Area").html(realtyType1RealtyHTML);
							
							callRealtyType(data['rt_contructor_yet'],data['rt_id']);
							paramRealtyAndContractorType=data['rt_contructor_yet'];
							
							//Start realType Radio
							$(".realtyType1").click(function(){
								
								callRealtyType($(this).val());
								paramRealtyAndContractorType=$(this).val();
							
								
							});
							
							
							//####rdg_title####
							$("#rdg_title").val(data['rdg_title']);
							
							//####rdg_detail####
							$("#rdg_detail").val(data['rdg_detail']);
							
							//####realtyProjectStatus####
							callRealtyProjectStatus(data['rps_id']);
							
							//####rdg_name_project####
							$("#rdg_name_project").val(data['rdg_name_project']);
							
							
							//####rdg_owner_project####
							$("#rdg_owner_project").val(data['rdg_owner_project']);
							
							//####rdg_address_project####
							$("#rdg_address_project").val(data['rdg_address_project']);
							
							//####rdg_price_project####
							$("#rdg_price_project").val(data['rdg_price_project']);
							
							//####rdg_address_province_id####
							callProvince(data['rdg_address_province_id'],data['rdg_address_district_id'],data['rdg_address_sub_district_id']);
							
							//####rdg_address_no####
							$("#rdg_address_no").val(data['rdg_address_no']);
							
							//####rdg_address_road####
							$("#rdg_address_road").val(data['rdg_address_road']);
							
							//####rdg_address_post_code####
							$("#rdg_address_post_code").val(data['rdg_post_code']);
							
							//####rdg_map####
							//alert()13.857326299999999,100.7267414
							var latLong=data['rdg_map'];
							latLong=latLong.split(",");
							setTimeout(function(){
								setupMap(true,latLong[0],latLong[1]);
								
							},2000);
							
							
							//####rdg_price####
							$("#rdg_price").val(data['rdg_price']);
							
							//####rdg_price_rent####
							$("#rdg_price_rent").val(data['rdg_price_rent']);
							
							//####rdg_price_down####
							$("#rdg_price_down").val(data['rdg_price_rent']);
							
							//####callTavelByBTS####
							callTavelByBTS(data['rdg_bts']);
							
							//####start travel by MRT ####
							callTavelByMRT(data['rdg_mrt']);
							
							
							//####start travel by ARL ####
							callTavelByARL(data['rdg_arl']);
							
							
							///####start travel by HARBOR ####
							callTavelByHARBOR(data['rdg_harbor']);
							
							///####rdg_area_number####
							$("#rdg_area_number").val(data['rdg_area_number']);
							
							///####rdg_area_unit####
							callRealtyUnit(data['rdg_area_unit']);
						
							
							
						}
					});
					
					//End call Data again
					
					
				}
				
				
			});
			
			$("[href|='#detailData']").click(function(){
				
				
				if($("#paramEmbedRdgId").val()==undefined || $("#paramEmbedRdgId").val()=="" || $("#paramEmbedRdgId").val()=="undefined"){
					alert("not RdgId");
				}else{
					postDeatilFn(paramRealtyAndContractorType,$("#paramEmbedRdgId").val());
					
				}
				//alert(paramRealtyAndContractor);
			});
			
			$("[href|='#imageVideo']").click(function(){
				if($("#paramEmbedRdgId").val()==undefined || $("#paramEmbedRdgId").val()=="" || $("#paramEmbedRdgId").val()=="undefined"){
					alert("not RdgId");
				}else{
					$.ajax({
						url:"../member/imageVideo.php",
						type:"post",
						dataType:"html",
						//data:{"paramRealtyID":$("#paramEmbedRdgId").val()},
						success:function(data){
							//alert(data);
							$("#imageVideoArea").html(data);
							imageVideoFn($("#paramEmbedRdgId").val());
						}
					});
					
				}
				
			});
			
			
				

			$("#topcontrol").click();
			//end next to detail data
			//end save first step
			
			
			
			

			$("#btn-back-step2").click(function(){
					//alert("hello");
					$("[href|='#detailData']").click();
					//return false;
					$("#topcontrol").click();
			});


			/*
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
			*/

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