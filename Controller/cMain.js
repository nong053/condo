/* loading start */

function startLoading(){
	 HoldOn.open('sk-rect');
	 }
function stopLoading(){
	HoldOn.close();
	 }


$(document).ajaxStart(function() {
	startLoading();
});
$(document).ajaxStop(function() {
	stopLoading();
});

/* loading end */

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
		if(robot_gen != $("#cus_confrim_contact").val()){
			check+="บวกเลขไม่ถูกต้องครับ\n";
		}
		
		
		if(check!=""){
			return check;
		
		}else{
			return "ok";
			
		}
		return false;
	}
	
	var mapContactModalFn = function(){
		$(".mapContactModal").click(function(){
					//setupMap();
					$.ajax({
						url:"Model/mMap.php",
						type:"post",
						dataType:"html",
						data:{"paramRdgID":this.id},
						success:function(data){
							var latLong=data;
							latLong=latLong.split(",");
							setTimeout(function(){
								setupMap(true,latLong[0],latLong[1],"mapArea");
							},1000);
						}
					});
					
		});
	}
	var imageSlideModalFn = function(){
		$(".imageSlideModal").click(function(){
			$.ajax({
				url:"galleryRealty.php",
				type:"post",
				dataType:"html",
				data:{"paramRdgID":this.id},
				success:function(data){
					$("#galleryRealtyArea").html(data);
				}
			});
			//
		});
	}
	var contactFormModalFn=function(){
		
	$(".contactFormModal").click(function(){
		var paramAdminIDArray=this.id.split("-");
		var paramAdminID="";
		var paramRDGID="";
		paramAdminID=paramAdminIDArray[0];
		paramRDGID=paramAdminIDArray[1];
	
		$.ajax({
			url:"member/contactForm.php",
			type:"post",
			dataType:"html",
			data:{"paramAdminID":paramAdminID,"rdg_id":paramRDGID},
			success:function(data){
				
				$("#contracFormtArea").html(data);
				
				$("form#contactUsForm").submit(function(){
					
					if(check_contact_form($("#paramSum").val())=="ok"){
						
						$.ajax({
							url:"./Model/mContact.php",
							type:"post",
							dataType:"json",
							data:$(this).serialize(),
							success:function(data){
								if(data=="success"){
									alert("ส่ง Email เรียบร้อย");
									$('form#contactUsForm').modal('hide');
									$("[data-dismiss='modal']").click();
								}
							}
						
						});
						
						
						
					}else{
						alert(check_contact_form($("#paramSum").val()));
					}
					
					
					
					
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
				//alert("hello");
				$("#rdg_address_province_id"+areaID).change(function(){
					//alert($(this).val());
					//searchPlace($(this).val());
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
	//start bts line start
	var callLineBTSSalse = function(){
		$("#rdg_line_sale_bts").change(function(){
			//alert($(this).val());
			$.ajax({
				url:"Model/mBTSStation.php",
				type:"get",
				dataType:"html",
				data:{"bts_line_id":$(this).val()},
				success:function(data){
					//alert(data);
					$("#AreaBTSStationSale").html(data);
					
				}
			});
			
		});
		
	}
	var callLineSubBTS = function(rdg_line_sale_bts,rdg_bts){
		//rdg_line_sale_bts,rdg_bts
		
		//alert(rdg_line_sale_bts);
		//alert(rdg_bts);
		
		
		
		setTimeout(function(){
			$("select#rdg_line_sale_bts2 option").filter(function() {
			    //may want to use $.trim in here
			    return $(this).val() == rdg_line_sale_bts; 
			}).prop('selected', true);
			
			$("#rdg_line_sale_bts2").change(function(){
				//alert($(this).val());
				$.ajax({
					url:"Model/mBTSStation.php",
					type:"get",
					dataType:"html",
					data:{"bts_line_id":$(this).val(),"bts_sub_line":"Y"},
					success:function(data){
						//alert(data);
						$("#AreaBTSStationSale2").html(data);
						$("select#rdg_bts2 option").filter(function() {
						    //may want to use $.trim in here
							//alert(rdg_bts);
						    return $(this).val() == rdg_bts; 
						}).prop('selected', true);
					}
				});
				
			});
			
			$("#rdg_line_sale_bts2").change();
			
			
			//alert(rdg_bts);
			
			
		},500);
		
		
		
		
	}
	var callLineBTSRent = function(){
		$("#rdg_line_rent_bts").change(function(){
			//alert($(this).val());
			$.ajax({
				url:"Model/mBTSStation.php",
				type:"get",
				dataType:"html",
				data:{"bts_line_id":$(this).val()},
				success:function(data){
					//alert(data);
					$("#AreaBTSStationRent").html(data);
					
				}
			});
			
		});
		
	}
	
	
	//start bts line end
	
$(document).ready(function(){
	
	$(document).on("click",".btnSavePost",function(){
		//alert(this.id);
		
		var rdg_id=this.id;
		
		
		$.ajax({
			url:"Model/mSavedPost.php",
			type:"post",
			dataType:"html",
			data:{"paramAction":"get_cus_id"},
			async:false,
			success:function(data){
				//alert(data);
				if(data==""){
					alert("ท่านยังไม่ได้ Login");
					return false;
				}else{
					
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
					
				}
			}
		});
		
		return false;
	});

	//load article here start
	//article_cat_id==1 คือบทความหน้าแรก
	$.ajax({
		url:"acticle/article.php",
		type:"post",
		dataType:"html",
		data:{"article_cat_id":"1"},
		success:function(data){
			$("#articleArea").html(data);
			
		}
	});
	//laod article here end
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
		
		/*check display start */
		var bodyWidth=$("body").width();
		//alert(bodyWidth);
		if(bodyWidth>1300){
			$(".adsLR").show();
		}else{
			$(".adsLR").hide();
		}
		
		
		//main footer click  to search function start
		var footerMenuSaleSearch=function(id){
			//alert("hello1");
			// console.log($(".btn-mainmenu#1").get());
			 $(".btn-mainmenu#"+id).click();
			 setTimeout(function(){
				$("#searchRealtyForSale").click();
				$("#topcontrol").click();
			 },1000);
			 return false;
		 
		}
		
		var footerMenuRentSearch=function(id){
			//alert("hello2");
			 //console.log($("button#1.mainMenuPostRent").get());
			 
			$("button#"+id+".mainMenuPostRent").click();
			 setTimeout(function(){
				$("#searchRealtyForRent").click();
				$("#topcontrol").click();
			 },1000);
			 
			 return false;
		 
		}
		
		


		
		
//		<button id="1" class="btn-u btn-mainmenu mainMenuPost btn-stackoverflow-inversed" type="button" style="background: orange none repeat scroll 0% 0%;">บ้าน </button>
		$("#mainMenuPos_1").click(function(){
			footerMenuSaleSearch(1);
		});
//		<button id="2" class="btn-u btn-mainmenu mainMenuPost" type="button">คอนโดมิเนียม </button>
		$("#mainMenuPos_2").click(function(){
			footerMenuSaleSearch(2);
		});
//		<button id="3" class="btn-u btn-mainmenu mainMenuPost" type="button">ที่ดิน </button>
		$("#mainMenuPos_3").click(function(){
			footerMenuSaleSearch(3);
		});
//		<button id="4" class="btn-u btn-mainmenu mainMenuPost" type="button">ทาว์นเฮ้าส์&ทาว์นโฮม </button>
		$("#mainMenuPos_4").click(function(){
			footerMenuSaleSearch(4);
		});
//		<button id="5" class="btn-u btn-mainmenu mainMenuPost" type="button">อาคารพาณิชย์ </button>
		$("#mainMenuPos_5").click(function(){
			footerMenuSaleSearch(5);
		});
//		<button id="6" class="btn-u btn-mainmenu mainMenuPost" type="button">อพาร์ตเมนต์</button>
		$("#mainMenuPos_6").click(function(){
			footerMenuSaleSearch(6);
		});
//		<button id="7" class="btn-u btn-mainmenu mainMenuPost" type="button">อาคารสำนักงาน</button>
		$("#mainMenuPos_7").click(function(){
			footerMenuSaleSearch(7);
		});
//		<button id="8" class="btn-u btn-mainmenu mainMenuPost" type="button">โรงงาน&โกดัง</button>
		$("#mainMenuPos_8").click(function(){
			footerMenuSaleSearch(8);
		});
//		<button id="9" class="btn-u btn-mainmenu mainMenuPost" type="button">หอพัก</button>
		$("#mainMenuPos_9").click(function(){
			footerMenuSaleSearch(9);
		});
//		<button id="10" class="btn-u btn-mainmenu mainMenuPost" type="button">โครงการใหม่ </button>
		$("#mainMenuPos_10").click(function(){
			footerMenuSaleSearch(10);
		});
//		<button id="11" class="btn-u btn-mainmenu mainMenuPost" type="button">โรงแรม</button>
		$("#mainMenuPos_11").click(function(){
			footerMenuSaleSearch(11);
		});
//		<button id="12" class="btn-u btn-mainmenu mainMenuPost" type="button">เกสต์เฮ้าส์</button>
		$("#mainMenuPos_12").click(function(){
			footerMenuSaleSearch(12);
		});
//		<button id="13" class="btn-u btn-mainmenu mainMenuPost" type="button">รีสอร์ท&โฮมเสตย์ </button>
		$("#mainMenuPos_13").click(function(){
			footerMenuSaleSearch(13);
		});
//		<button id="14" class="btn-u btn-mainmenu mainMenuPost" type="button">อสังหาริมทรัพย์อื่นๆ</button>
		$("#mainMenuPos_14").click(function(){
			footerMenuSaleSearch(14);
		});
//		<div class="headline headline-xs"> </div>
//		<button id="18" class="btn-u mainMenuPost btn-mainmenu-contractor" type="button">ผู้รับเหมา</button>
		$("#mainMenuPos_18").click(function(){
			footerMenuSaleSearch(18);
		});
//		<button id="16" class="btn-u mainMenuPost btn-mainmenu-contractor" type="button">วัสดุก่อสร้าง</button>
		$("#mainMenuPos_16").click(function(){
			footerMenuSaleSearch(16);
		});
//		<button id="17" class="btn-u mainMenuPost btn-mainmenu-contractor" type="button">เฟอร์นิเจอร์</button>
		$("#mainMenuPos_17").click(function(){
			footerMenuSaleSearch(17);
		});
//		<button id="19" class="btn-u mainMenuPost btn-mainmenu-contractor" type="button">เครื่องมือเครื่องจักร</button>
		$("#mainMenuPos_19").click(function(){
			footerMenuSaleSearch(19);
		});
		
		
		
//		<button id="1" class="btn-u btn-mainmenu mainMenuPost btn-stackoverflow-inversed" type="button" style="background: orange none repeat scroll 0% 0%;">บ้าน </button>
		$("#mainMenuPosRent_1").click(function(){
			footerMenuRentSearch(1);
		});
//		<button id="2" class="btn-u btn-mainmenu mainMenuPost" type="button">คอนโดมิเนียม </button>
		$("#mainMenuPosRent_2").click(function(){
			footerMenuRentSearch(2);
		});
//		<button id="3" class="btn-u btn-mainmenu mainMenuPost" type="button">ที่ดิน </button>
		$("#mainMenuPosRent_3").click(function(){
			footerMenuRentSearch(3);
		});
//		<button id="4" class="btn-u btn-mainmenu mainMenuPost" type="button">ทาว์นเฮ้าส์&ทาว์นโฮม </button>
		$("#mainMenuPosRent_4").click(function(){
			footerMenuRentSearch(4);
		});
//		<button id="5" class="btn-u btn-mainmenu mainMenuPost" type="button">อาคารพาณิชย์ </button>
		$("#mainMenuPosRent_5").click(function(){
			footerMenuRentSearch(5);
		});
//		<button id="6" class="btn-u btn-mainmenu mainMenuPost" type="button">อพาร์ตเมนต์</button>
		$("#mainMenuPosRent_6").click(function(){
			footerMenuRentSearch(6);
		});
//		<button id="7" class="btn-u btn-mainmenu mainMenuPost" type="button">อาคารสำนักงาน</button>
		$("#mainMenuPosRent_7").click(function(){
			footerMenuRentSearch(7);
		});
//		<button id="8" class="btn-u btn-mainmenu mainMenuPost" type="button">โรงงาน&โกดัง</button>
		$("#mainMenuPosRent_8").click(function(){
			footerMenuRentSearch(8);
		});
//		<button id="9" class="btn-u btn-mainmenu mainMenuPost" type="button">หอพัก</button>
		$("#mainMenuPosRent_9").click(function(){
			footerMenuRentSearch(9);
		});
//		<button id="10" class="btn-u btn-mainmenu mainMenuPost" type="button">โครงการใหม่ </button>
		$("#mainMenuPosRent_10").click(function(){
			footerMenuRentSearch(10);
		});
//		<button id="11" class="btn-u btn-mainmenu mainMenuPost" type="button">โรงแรม</button>
		$("#mainMenuPosRent_11").click(function(){
			footerMenuRentSearch(11);
		});
//		<button id="12" class="btn-u btn-mainmenu mainMenuPost" type="button">เกสต์เฮ้าส์</button>
		$("#mainMenuPosRent_12").click(function(){
			footerMenuRentSearch(12);
		});
//		<button id="13" class="btn-u btn-mainmenu mainMenuPost" type="button">รีสอร์ท&โฮมเสตย์ </button>
		$("#mainMenuPosRent_13").click(function(){
			footerMenuRentSearch(13);
		});
//		<button id="14" class="btn-u btn-mainmenu mainMenuPost" type="button">อสังหาริมทรัพย์อื่นๆ</button>
		$("#mainMenuPosRent_14").click(function(){
			footerMenuRentSearch(14);
		});
//		<div class="headline headline-xs"> </div>
//		<button id="18" class="btn-u mainMenuPost btn-mainmenu-contractor" type="button">ผู้รับเหมา</button>
		$("#mainMenuPosRent_18").click(function(){
			footerMenuRentSearch(18);
		});
//		<button id="16" class="btn-u mainMenuPost btn-mainmenu-contractor" type="button">วัสดุก่อสร้าง</button>
		$("#mainMenuPosRent_16").click(function(){
			footerMenuRentSearch(16);
		});
//		<button id="17" class="btn-u mainMenuPost btn-mainmenu-contractor" type="button">เฟอร์นิเจอร์</button>
		$("#mainMenuPosRent_17").click(function(){
			footerMenuRentSearch(17);
		});
//		<button id="19" class="btn-u mainMenuPost btn-mainmenu-contractor" type="button">เครื่องมือเครื่องจักร</button>
		$("#mainMenuPosRent_19").click(function(){
			footerMenuRentSearch(19);
		});

		//main footer click to search funtction end

});