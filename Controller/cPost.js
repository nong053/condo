//fine lat and lon by area
var geocoder; // กำหนดตัวแปรสำหรับ เก็บ Geocoder Object ใช้แปลงชื่อสถานที่เป็นพิกัด  
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้  
var my_Marker; // กำหนดตัวแปรสำหรับเก็บตัว marker  
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น  
function setupMap(paramShowMarker,currentLat,currentLong,mapId) {
	
	
	var latLongEmbedHtml="";
	
	var myOptions = {
	  zoom: 15,
	  center: new google.maps.LatLng(currentLat,currentLong),
	  mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	if(mapId!=""){
		mapId=mapId;
	}else{
		mapId="map-canvas";
	}

	var map = new google.maps.Map(document.getElementById(mapId),
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
function initialize() { 
	// ฟังก์ชันแสดงแผนที่  
    GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM  
    geocoder = new GGM.Geocoder(); // เก็บตัวแปร google.maps.Geocoder Object  
    // กำหนดจุดเริ่มต้นของแผนที่  
}  

// ส่วนของฟังก์ชันค้นหาชื่อสถานที่ในแผนที่  
var searchPlace=function(areaText){ // ฟังก์ชัน สำหรับคันหาสถานที่ ชื่อ searchPlace  
    var AddressSearch=areaText;// เอาค่าจาก textbox ที่กรอกมาไว้ในตัวแปร  
    if(geocoder){ // ตรวจสอบว่าถ้ามี Geocoder Object   
        geocoder.geocode({  
             address: AddressSearch // ให้ส่งชื่อสถานที่ไปค้นหา  
        },function(results, status){ // ส่งกลับการค้นหาเป็นผลลัพธ์ และสถานะ  
            if(status == GGM.GeocoderStatus.OK) { // ตรวจสอบสถานะ ถ้าหากเจอ  
                var my_Point=results[0].geometry.location; // เอาผลลัพธ์ของพิกัด มาเก็บไว้ที่ตัวแปร  

                //alert(my_Point.lat());
                //alert(my_Point.lng());
                setupMap(true,my_Point.lat(),my_Point.lng(),"");
                
            } 
        });  
    }         
}  
$(document).ready(function(){
	
	    $("<script/>", {  
	      "type": "text/javascript",  
	      src: "http://maps.google.com/maps/api/js?v=3.2&sensor=false&language=th&callback=initialize"  
	    }).appendTo("body");  

	/*
	setTimeout(function(){
		searchPlace("กาฬสินธุ์");
	},1000);
	*/
});
var postFn=function(loginType){

			
		
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
			setupMap(showMarker,position.coords.latitude,position.coords.longitude,"");
			
			
		}
		
		
		
	
		
		
		
		
		
			var validation = function(){
				var validateStr="";
				
				
				if($("#rdg_title").val()=="" || $("#rdg_title").val()==null){
					validateStr+="กำหนดหัวข้อประกาศด้วยค่ะ \n"
					
				}
				
				if($("select#realtyType").val()=="" || $("select#realtyType").val()==null){
					validateStr+="กำหนดประเภทอสังหาริมทรัพย์ด้วยค่ะ \n"
					
				}
				
				
				if($("select#rdg_address_province_id").val()=="" || $("select#rdg_address_province_id").val()==null){
					validateStr+="กำหนดจังหวัดด้วยค่ะ \n"
					
				}
				
				if($("select#rdg_address_district_id").val()=="" || $("select#rdg_address_district_id").val()==null){
					validateStr+="กำหนดอำเภอด้วยค่ะ \n"
					
				}
				if($("select#rdg_address_sub_district_id").val()=="" || $("select#rdg_address_sub_district_id").val()==null){
					validateStr+="กำหนดตำบลด้วยค่ะ \n"
					
				}
				/*
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
			
			
			
			
			//start next to detail data
	
			
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
							
							//button back
							$("#btn-back-step1").click(function(){
								//alert("hello");
								$("[href|='#mainData']").click();
								$("#topcontrol").click();
								//return false;
							});
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
			
			var createSpecialFn=function(rdg_special){

				//####rdg_special####
				var realtySpecialHTML="";
				realtySpecialHTML+="<div class=\"optonArea\">";
					realtySpecialHTML+="<div class=\"checkbox\">";
					realtySpecialHTML+="<label>";
						if(rdg_special=="N"){
						realtySpecialHTML+="<input type=\"radio\" checked=\"checked\" value=\"N\" class=\"rdg_special\" name=\"rdg_special\"> ประกาศฟรี ";
						realtySpecialHTML+="<input type=\"radio\" value=\"Y\" class=\"rdg_special\" name=\"rdg_special\"> ประกาศพิเศษหน้าแรก";
						}else{
							realtySpecialHTML+="<input type=\"radio\"  value=\"N\" class=\"rdg_special\" name=\"rdg_special\"> ประกาศฟรี ";
							realtySpecialHTML+="<input type=\"radio\" checked=\"checked\" value=\"Y\" class=\"rdg_special\" name=\"rdg_special\"> ประกาศพิเศษหน้าแรก";	
						}
					realtySpecialHTML+="</label></div>";
				realtySpecialHTML+="</div>";
				$("#realtySpecialArea").html(realtySpecialHTML);
			}
			var crateRealtyFn=function(rt_contructor_yet){
				//######realtyType1Realty#########
				var realtyType1RealtyHTML="";
				if(rt_contructor_yet=="N"){
					realtyType1RealtyHTML+="<label>";
					realtyType1RealtyHTML+="<input type=\"radio\" name=\"realtyType1\" class=\"realtyType1\"  id=\"realtyType1Realty\" value=\"N\" checked=\"checked\"> อสังหาริมทรัพย์ทั่วไป"; 
					realtyType1RealtyHTML+="</label>";
					realtyType1RealtyHTML+="<label>";
					realtyType1RealtyHTML+="<input type=\"radio\" name=\"realtyType1\" class=\"realtyType1\" value=\"Y\"> สำหรับผู้รับเหมา/วัสดุก่อสร้าง/ฟอร์นิเจอร์  ";
					realtyType1RealtyHTML+="</label>";
				}else{
					realtyType1RealtyHTML+="<label>";
					realtyType1RealtyHTML+="<input type=\"radio\" name=\"realtyType1\" class=\"realtyType1\"  id=\"realtyType1Realty\" value=\"N\" > อสังหาริมทรัพย์ทั่วไป"; 
					realtyType1RealtyHTML+="</label>";
					realtyType1RealtyHTML+="<label>";
					realtyType1RealtyHTML+="<input type=\"radio\" name=\"realtyType1\" class=\"realtyType1\" value=\"Y\" checked=\"checked\"> สำหรับผู้รับเหมา/วัสดุก่อสร้าง/ฟอร์นิเจอร์  ";
					realtyType1RealtyHTML+="</label>";
				}
				$("#realtyType1Area").html(realtyType1RealtyHTML);
			}
			
			
			var callDataMainPostAgainFn=function(){
			
				//setupMap();
				//getLocation(false);
				$("#btnCreateMarker").click(function(){
					getLocation(true);
					return false;
				});
				//end map
				
				//call Data rdg_detail start
				$.ajax({
					url:"../Model/mRealtyDataGeneralAction.php",
					type:"post",
					dataType:"html",
					data:{"paramAction":"realtyDataGeneralDetailById","RdgId":$("#paramEmbedRdgId").val()},
					success:function(data){
					//	alert(data);
						//####rdg_detail####
						$("#rdg_detail").val(data);
					}
				});
				
				//call Data rdg_detail end
				
				//Start call Data again
				$.ajax({
					url:"../Model/mRealtyDataGeneralAction.php",
					type:"post",
					dataType:"json",
					data:{"paramAction":"realtyDataGeneralById","RdgId":$("#paramEmbedRdgId").val()},
					success:function(data){
						
						
						//alert(data);
						//console.log(data['rf_id']);
						callRealtyFor(data['rf_id']);
						
						
						
						//####rdg_special####
						createSpecialFn(data['rdg_special']);
						//####rdg_special####
						
						//######realtyType1Realty#########
						crateRealtyFn(data['rt_contructor_yet']);
						callRealtyType(data['rt_contructor_yet'],data['rt_id']);
						paramRealtyAndContractorType=data['rt_contructor_yet'];
						
						
						//Start realType Radio
						$(".realtyType1").click(function(){
							
							callRealtyType($(this).val());
							paramRealtyAndContractorType=$(this).val();
						
							
						});
						
						
						//####rdg_title####
						
						$("#rdg_title").val(data['rdg_title']);
						//alert(data['rdg_title_detail']);
						$("#rdg_title_detail").val(data['rdg_title_detail']);
						
						
						
						//####realtyProjectStatus####
						callRealtyProjectStatus(data['rps_id']);
						
						//####rdg_name_project####
						$("#rdg_name_project").val(data['rdg_name_project']);
						
						
						//####rdg_owner_project####
						$("#rdg_owner_project").val(data['rdg_owner_project']);
						
						//####rdg_address_project####
						//$("#rdg_address_project").val(data['rdg_address_project']);
						
						//####rdg_price_project####
						$("#rdg_price_project").val(data['rdg_price_project']);
						
						//####rdg_address_province_id####
						
						callProvince(data['rdg_address_province_id'],data['rdg_address_district_id'],data['rdg_address_sub_district_id']);
						callDistrict(data['rdg_address_province_id'],data['rdg_address_district_id'],data['rdg_address_sub_district_id'])
						callSubDistrict(data['rdg_address_district_id'],data['rdg_address_sub_district_id']);
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
							setupMap(true,latLong[0],latLong[1],"");
							
						},2000);
						
						
						//####rdg_price####
						$("#rdg_price").val(data['rdg_price']);
						
						//####rdg_price_rent####
						$("#rdg_price_rent").val(data['rdg_price_rent']);
						
						//####rdg_price_down####
						$("#rdg_price_down").val(data['rdg_price_rent']);
						
						//####callTavelByBTS####
						callTavelByBTS(data['rdg_bts']);
						//alert(data['rdg_bts']);
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
						
						///####rdg_estate number####
						
						$("#rdg_estate_num").val(data['rdg_estate_num']);
						///####rdg_estate_unit####
						callEstateUnit(data['rdg_estate_unit']);
						///####rdg_rdg_bus####
						$("#rdg_bus").val(data['rdg_bus']);
						
						///####rdg_address_soi####
						$("#rdg_address_soi").val(data['rdg_address_soi']);
						
						
						
					}
				});
				
				//End call Data again
			};
			// Start Main tabs 
			$("[href|='#mainData']").click(function(){
				
				//alert("#mainData");
				if($("#paramEmbedRdgId").val()==undefined || $("#paramEmbedRdgId").val()=="" || $("#paramEmbedRdgId").val()=="undefined"){
					
					//alert("not RdgId");
					
				}else{
					
					//Start call Data again
					callDataMainPostAgainFn();
					//End call Data again
					
				}
				
				
			});
			
			
			
			
				

			$("#topcontrol").click();
			//end next to detail data
			//end save first step
			
			
			
			

			

			
			$("#btn-back-step1").click(function(){
					//alert("hello");
					$("[href|='#mainData']").click();
					$("#topcontrol").click();
					//return false;
			});
			
			/*
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
			
			
			//start currentPost 
			var delPostFn = function(id){
				$.ajax({
					url:"../Model/mCurrentPost.php",
					type:"post",
					dataType:"html",
					data:{"paramAction":"delCurrentPost","rdg_id":id},
					success:function(data){
						//alert(data);
					}
				});
			};
			var disableOrAblePostFn= function(id,status){
				var status2;
				if(status=="Y"){
					status2="N";
				}else if(status=="N"){
					status2="Y";
				}
				//alert(status);
				//alert(status2);
				$.ajax({
					url:"../Model/mCurrentPost.php",
					type:"post",
					dataType:"html",
					data:{"paramAction":"disableOrAblePost","rdg_id":id,"status":status2},
					success:function(data){
						//alert(data);
					
					}
				});
			};
			
			$("#btnCurrentSearch").click(function(){
				//alert($("#rdg_search").val());
				showPostFn("currentPostArea","Y",$("#rdg_search").val());
			})
			var showPostFn=function(idArea,status,txtSearch){
				
				$.ajax({
					url:"../Model/mCurrentPost.php",
					type:"post",
					dataType:"html",
					async:false,
					data:{"paramAction":"showCurrentPost","idArea":idArea,"status":status,"txtSearch":txtSearch},
					success:function(data){
						$("#"+idArea).html(data);
						
						//set grid start
						
						 $("#gridCurentPost"+idArea).kendoGrid({
				             //height: 550,
				             sortable: true,
				             dataSource: {
				                 pageSize: 100
				             },
				             pageable: {
				                 refresh: true,
				                 pageSizes: true,
				                 buttonCount: 5
				             },
				         });
						//set grid end
						 
						//Start del Post
						$(".btnDelPost"+idArea).click(function(){
							var id=this.id;
							id=id.split("-");
							id=id[1];
							//command delete
							if(confirm("ยืนยันการลบประกาศนี้")){
								delPostFn(id);
								showPostFn(idArea,status);
							}
							
						});
						//End del Post
						//Start SET DisablePost Post
						$(".btnDisablePost"+idArea).click(function(){
							var id=this.id;
							id=id.split("-");
							id=id[1];
							//command delete
							
							if(confirm("ยืนยันไม่แสดงประกาศนี้")){
								disableOrAblePostFn(id,status);
								showPostFn(idArea,status);
							}
						});
						//End SET DisablePost 
						
						//Start SET AblePost 
						$(".btnAblePost"+idArea).click(function(){
							var id=this.id;
							id=id.split("-");
							id=id[1];
							//command delete
							if(confirm("ยืนยันต้องการแสดงประกาศนี้")){
								disableOrAblePostFn(id,status);
								showPostFn(idArea,status);
							}
						});
						//End SET AblePost 
						
						
						
						//Start Edit Post
						$(".btnEditPost"+idArea).click(function(){
							
							//Ebeded data for check that get olda data for display.
							$("#saveDetailDataAlready").remove();
							$("body").append("<input type='hidden' name='saveDetailDataAlready' id='saveDetailDataAlready' value='Y'>");
							
							var id=this.id;
							id=id.split("-");
							id=id[1];
							
							
							$.ajax({
								url:"../member/form_post.php",
								type:"post",
								dataType:"html",
								async:false,
								data:{"paramAction":"showCurrentPost","rdg_id":id},
								success:function(data){
								
									$("#postForm-"+idArea).html(data);
									//embed paramEmbedRdgId
									$("#paramEmbedRdgId").remove();
									
									$("#paramEmbedRdgIdArea").append("<input type='hidden' name='paramEmbedRdgId' id='paramEmbedRdgId' value="+id+" >");
									//Start call Data again
									callDataMainPostAgainFn();
									//End call Data again
									//#### start call function bindingPostManageFn ####
									bindingPostManageFn();
									//#### end call function bindingPostManageFn ####
								}
							});
							
						});
						//End Edit Post
					}
				});
			}

	var initailPostFn=function(){

		//Start Call callRealtyFor
		callRealtyFor(1);
		

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
		//callRealtyFor(1);
		
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
		
		///rdg_area_unit
		callEstateUnit();
		
		
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
	}
	
	var sendByHomeToPostFn=function(rt_id,rf_id,rt_contructor_yet,sesSpecialPost){

		//Start Call callRealtyFor
		//send rf_id2 for check type realty and hiden or show raido
		callRealtyFor(rf_id,rf_id);
		
	
		//####rdg_special####
		createSpecialFn(sesSpecialPost);
		//####rdg_special####
		
		//######realtyType1Realty#########
		crateRealtyFn(rt_contructor_yet);
		callRealtyType(rt_contructor_yet,rt_id);
		paramRealtyAndContractorType=rt_contructor_yet;

		
		
		//setupMap();
		setTimeout(function(){
			getLocation(false);
			$("#btnCreateMarker").click(function(){
				getLocation(true);
				return false;
			});
		},2000);
		//end map
		
		//start provine .
		callProvince();
		//end provine 

		//start realty unit 
		callRealtyUnit();
		//end realty unit 
		///rdg_area_unit
		callEstateUnit();
		
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
	}
	
	
	var bindingPostManageFn=function(){
		
		//Start DetailData
		$("[href|='#detailData']").click(function(){
			if($("#paramEmbedRdgId").val()==undefined || $("#paramEmbedRdgId").val()=="" || $("#paramEmbedRdgId").val()=="undefined"){
				
				//alert("not RdgId");
				
			}else{
				postDeatilFn(paramRealtyAndContractorType,$("#paramEmbedRdgId").val());
			}
			//alert(paramRealtyAndContractor);
		});
		//End DetailData
		//Start ImageVideo
		$("[href|='#imageVideo']").click(function(){
			if($("#paramEmbedRdgId").val()==undefined || $("#paramEmbedRdgId").val()=="" || $("#paramEmbedRdgId").val()=="undefined"){
				//alert("not RdgId");
			}else{
				$.ajax({
					url:"../member/imageVideo.php",
					type:"post",
					dataType:"html",
					//data:{"paramRealtyID":$("#paramEmbedRdgId").val()},
					success:function(data){
						$("#imageVideoArea").html(data);
						imageVideoFn($("#paramEmbedRdgId").val());
						docUploadFn($("#paramEmbedRdgId").val());
					}
				});
				
			}
			
		});
		//End imageVideo
		
		//Start Summary
		$("[href|='#summary']").click(function(){
			if($("#paramEmbedRdgId").val()==undefined || $("#paramEmbedRdgId").val()=="" || $("#paramEmbedRdgId").val()=="undefined"){
				//alert("not RdgId");
			}else{
				$.ajax({
					url:"../member/summary.php",
					type:"post",
					dataType:"html",
					async:false,
					data:{"rdg_id":$("#paramEmbedRdgId").val()},
					success:function(data){
						
						$("#summaryArea").html(data);
						
						$.ajax({
							url:"../Model/mSummary.php",
							type:"post",
							dataType:"text",
							async:false,
							data:{"rdg_id":$("#paramEmbedRdgId").val(),"paramAction":"getMap"},
							success:function(data){
								//alert(data);
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
						
						$("#btn-success").click(function(){
							alert("ประกาศของท่านพร้อมใช้งานแล้ว");
							//alert("ส่งประกาศของท่านให้ผู้ดูแลระบบตรวจสอบเรียบร้อย\nเมื่อผ่านการตรวจสอบทางทีมงานจะส่ง Email แจ้งให้ทราบขอบคุณที่ใช้บริการ");
							//$("[href|='#currentPost']").click();
							window.location='index.php?page=post&loginType=loginForManage';
						});
						
						
						
					}
				});
				
			}
			
		});
		//End Summary
		
		function CKupdate(){
		    for ( instance in CKEDITOR.instances )
		        CKEDITOR.instances[instance].updateElement();
		}
		//start save first step
		$("#saveStep1").click(function(){
			CKupdate();
				if(validation()){
				$.ajax({
					url:"../Model/mRealtyDataGeneralAction.php",
					type:"POST",
					dataType:"json",
					data:$( "form#formRealtyDataGe").serialize(),
					success:function(data){
					
						var rdg_id=data[1];
						
						if(data[0]=="success"){
							alert("บันทึกข้อมูลเรียบร้อย");
							setTimeout(function(){
								$("[href|='#detailData']").click();
								$("#topcontrol").click();
							},1000);
							
							$("#paramEmbedRdgId").remove();
							$("#paramEmbedRdgIdArea").append("<input type='hidden' name='paramEmbedRdgId' id='paramEmbedRdgId' value="+rdg_id+" >");
						}else if(data[0]=="update_success"){
							alert("แก้ไขข้อมูลเรียบร้อย");
							$("[href|='#detailData']").click();
							$("#topcontrol").click();
						}
						
					}
				});
			}
			
			return false;
		});
		//End save first step
	}
	
	$("[href|='#newPost']").click(function(){
		$(".postRealty").empty();
		$.ajax({
			url:"../member/form_post.php",
			type:"post",
			dataType:"html",
			async:false,
			//data:{"paramAction":"showCurrentPost"},
			success:function(data){
				
				$("#newPostArea").html(data);
				//#### start call function initail ####
				initailPostFn();
				//#### end call function initail ####
				
				//#### start call function bindingPostManageFn ####
				bindingPostManageFn();
				//#### end call function bindingPostManageFn ####
			}
		});
	});
	
	$("[href|='#memberNewPost']").click(function(){
		
		$.ajax({
			url:"../member/memberFormPost.php",
			type:"post",
			dataType:"html",
			async:false,
			//data:{"paramAction":"showCurrentPost"},
			success:function(data){
				/*
				$("body").append("<input type='text' name='memberNewPost' id='memberNewPost' class='memberNewPost' value=Y>");
				*/
				$(".postRealty").empty();
				$("#postForm-memberNewPost").html(data);
				$.ajax({
					url:"../Model/mMemberFormPost.php",
					type:"post",
					dataType:"json",
					async:false,
					data:{"paramAction":"getDataSes"},
					success:function(data){
						//alert(data["sesRtID"]);
						//sesRfID
						//sesSpecialPost
						//#### start call function initail ####
						sendByHomeToPostFn(data["sesRtID"],data["sesRfID"],data["sesRtContructorYet"],data["sesSpecialPost"]);
						//#### end call function initail ####
					}
				});
				
				
				
				//#### start call function bindingPostManageFn ####
				bindingPostManageFn();
				//#### end call function bindingPostManageFn ####
			}
		});
	});
	//Check Data For Initail of Tab Start
	if(loginType=="loginForManage"){
		
		setTimeout(function(){
			$("[href|='#currentPost']").click();
		},1000);
		$("[href|='#memberNewPost']").hide();
		
	}else{
		$("[href|='#memberNewPost']").click();
		$("[href|='#memberNewPost']").show();
	}
	//Check Data For Initail of Tab End
	
	//Start currentPost 
	$("[href|='#currentPost']").click(function(){
		$(".postRealty").empty();
			showPostFn("currentPostArea","Y");
		 
	});
	//end currentPost 
	
	//Start nonePost 
	$("[href|='#nonePost']").click(function(){
		$(".postRealty").empty();
			showPostFn("nonePostArea","N");
		 
	});
	//end nonePost 
	//Start nonePost 
	$("[href|='#expirePost']").click(function(){
			$(".postRealty").empty();
			showPostFn("expirePostArea","E");
	});
	//end nonePost 
	
	
	

		
	
};