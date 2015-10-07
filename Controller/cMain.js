
	function setupMap(paramShowMarker,currentLat,currentLong,mapId) {
		var myOptions = {
		  zoom: 15,
		  center: new google.maps.LatLng(currentLat,currentLong),
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		var map = new google.maps.Map(document.getElementById(mapId),
			myOptions);
		
		if(paramShowMarker==true){
		var marker = new google.maps.Marker({
		map:map,
		position: new google.maps.LatLng(currentLat,currentLong),
		draggable: true
		});
		}
	}
	
	//click contract from start
	
	function check_contact_form(robot_gen){
		//alert("confrim"+confrim);
		//cus_confrim
		//contact_fullname
		//contact_tel
		//cus_confrim
		var check="";
		
		if($("#contact_detail").val()==""){
			check+="กรอกรายละเอียดด้วยครับ\n";
		}
		if($("#contact_fullname").val()==""){
			check+="กรอกชื่อด้วยครับ\n";
		}
		if($("#contact_tel").val()==""){
			check+="กรอกเบอร์โทรด้วยครับ\n";
		}
		if(robot_gen != $("#cus_confrim").val()){
			check+="บวกเลขไม่ถูกต้องครับ\n";
		}
		
		
		if(check!=""){
			return check;
			//return false;
		}else{
			return "ok";
		}
	}
	
	
	var contactFormModalFn=function(){
	$(".contactFormModal").click(function(){
		$.ajax({
			url:"Member/contactForm.php",
			type:"post",
			dataType:"html",
			data:{"paramAdminID":this.id},
			success:function(data){
			
				$("#contracFormtArea").html(data);
				
				$("form#contactUsForm").submit(function(){
					$.ajax({
						url:"./Model/mContact.php",
						type:"post",
						dataType:"html",
						data:$(this).serialize(),
						success:function(data){
							if(data['data']=="success"){
								alert("ส่ง Email เรียบร้อย");
							}
						}
					
					});
					return false;
				});
				
			}
		});
	});
	};
	//click contract from end
	
	
	//start provine .
	var callProvince = function(rdg_address_province_id,rdg_address_district_id,rdg_address_sub_district_id,areaID){
		
		if(areaID==undefined){
			areaID="";
		}
		
		$.ajax({
			url:"Model/mRealtyDataGeneralAction.php",
			type:"post",
			dataType:"json",
			data:{"paramAction":"province"},
			success:function(data){
			
				var provinceHtml="";
				
				provinceHtml+="<select name=\"rdg_address_province_id"+areaID+"\" id=\"rdg_address_province_id"+areaID+"\">";
					
					provinceHtml+="<option  selected=\"\" value=\"All\">-- เลือกจังหวัด --</option>";
					
					$.each(data,function(index,indexEntry){
						if(rdg_address_province_id==indexEntry[0]){
							provinceHtml+="<option selected='selected' value=\""+indexEntry[0]+"\">"+indexEntry[1]+"</option> ";
						}else{
							provinceHtml+="<option value=\""+indexEntry[0]+"\">"+indexEntry[1]+"</option> ";
						}
						
					});
					
				provinceHtml+="</select>";
				
				$("#provinceArea"+areaID).html(provinceHtml);
				$("#rdg_address_province_id"+areaID).change(function(){
					//alert($(this).val());
					
					callDistrict($(this).val(),rdg_address_district_id,"",areaID);
				});
				
				
			}
		});
	};
	//End provine .
	
	//start district
	var callDistrict = function(paramProvince,rdg_address_district_id,rdg_address_sub_district_id,areaID){
		if(areaID==undefined){
			areaID="";
		}
		$.ajax({
			url:"Model/mRealtyDataGeneralAction.php",
			type:"post",
			dataType:"json",
			data:{"paramAction":"district","paramProvince":paramProvince},
			success:function(data){
			
				var districtHtml="";
				
				districtHtml+="<select name=\"rdg_address_district_id"+areaID+"\" id=\"rdg_address_district_id"+areaID+"\">";
					
				districtHtml+="<option  selected=\"\" value=\"All\">-- เลือกอำเภอ/เขต --</option>";
					
					$.each(data,function(index,indexEntry){
						
						if(rdg_address_district_id==indexEntry[0]){
							districtHtml+="<option selected='selected' value=\""+indexEntry[0]+"\">"+indexEntry[1]+"</option> ";
						}else{
							districtHtml+="<option value=\""+indexEntry[0]+"\">"+indexEntry[1]+"</option> ";
						}
						
					});
					
					districtHtml+="</select>";
				
				$("#districtArea"+areaID).html(districtHtml);
				$("#rdg_address_district_id"+areaID).change(function(){
					//alert($(this).val());
					callSubDistrict($(this).val(),rdg_address_sub_district_id,areaID);
				});
				
				
			}
		});
	};
	//callDistrict();
	//end district
	//start sub district
	var callSubDistrict = function(paramDistrictId,rdg_address_sub_district_id,areaID){
		if(areaID==undefined){
			areaID="";
		}
		$.ajax({
			url:"Model/mRealtyDataGeneralAction.php",
			type:"post",
			dataType:"json",
			data:{"paramAction":"sub_district","paramDistrictId":paramDistrictId},
			success:function(data){
				
				var subDistrictHtml="";
				
				subDistrictHtml+="<select name=\"rdg_address_sub_district_id"+areaID+"\" id=\"rdg_address_sub_district_id"+areaID+"\">";
					
				subDistrictHtml+="<option selected=\"\" value=\"All\">-- เลือกตำบล/แขวง --</option>";
					
					$.each(data,function(index,indexEntry){
						if(rdg_address_sub_district_id==indexEntry[0]){
							subDistrictHtml+="<option selected='selected' value=\""+indexEntry[0]+"\">"+indexEntry[1]+"</option> ";
						}else{
							subDistrictHtml+="<option value=\""+indexEntry[0]+"\">"+indexEntry[1]+"</option> ";
						}
						
					});
					
					subDistrictHtml+="</select>";
			
				$("#subDistrictArea"+areaID).html(subDistrictHtml);
				
			}
		});
	};
	//callSubDistrict();
	//end sub district
$(document).ready(function(){
	
	
	
	$("#logout").click(function(){
		
		$.ajax({
			url:"Model/mSecurity.php",
			type:"post",
			dataType:"json",
			data:{"paramAction":"logoutAction"},
			success:function(data){
				if(data=="success"){
				alert("ออกจากระบบเรียบร้อย");
				window.location="index.php";
				}
			}
		});
		
		
	});
	
	

		$(".dropdown-menu > li > a.trigger").on("click",function(e){
			var current=$(this).next();
			var grandparent=$(this).parent().parent();
			if($(this).hasClass('left-caret')||$(this).hasClass('right-caret'))
				$(this).toggleClass('right-caret left-caret');
			grandparent.find('.left-caret').not(this).toggleClass('right-caret left-caret');
			grandparent.find(".sub-menu:visible").not(current).hide();
			current.toggle();
			e.stopPropagation();
		});
		$(".dropdown-menu > li > a:not(.trigger)").on("click",function(){
			var root=$(this).closest('.dropdown');
			root.find('.left-caret').toggleClass('right-caret left-caret');
			root.find('.sub-menu:visible').hide();
		});
		
		
		
		//List bottom data start
		


});