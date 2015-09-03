<?php 
if($conn){
	$sqlSQLCN="select * from realty_type where rt_contructor_yet='N'";
	$resultCN=mysql_query($sqlSQLCN);

	$sqlSQLCY="select * from realty_type where rt_contructor_yet='Y'";
	$resultCY=mysql_query($sqlSQLCY);
	
	$sqlSQLBTS="SELECT * FROM public_transport where pt_type='BTS'";
	$resultBTS=mysql_query($sqlSQLBTS);
	
	$sqlSQLMRT="SELECT * FROM public_transport where pt_type='MRT'";
	$resultMRT=mysql_query($sqlSQLMRT);
	
	$sqlSQLARL="SELECT * FROM public_transport where pt_type='ARL'";
	$resultARL=mysql_query($sqlSQLARL);
	
	$sqlSQLHARBOR="SELECT * FROM public_transport where pt_type='HARBOR'";
	$resultHARBOR=mysql_query($sqlSQLHARBOR);
	
	$sqlSQLRoadNo="";
	$resultRoadNo=mysql_query($sqlSQLRoadNo);
	
	$sqlSQLBusNo="";
	$resultBusNo=mysql_query($sqlSQLBusNo);
	
}
?>
<script>
	$(document).ready(function(){
		//start provine .
		var callProvince = function(rdg_address_province_id,rdg_address_district_id,rdg_address_sub_district_id){
			$.ajax({
				url:"Model/mRealtyDataGeneralAction.php",
				type:"post",
				dataType:"json",
				data:{"paramAction":"province"},
				success:function(data){
					
					var provinceHtml="";
					
					provinceHtml+="<select name=\"rdg_address_province_id\" id=\"rdg_address_province_id\">";
						
						provinceHtml+="<option disabled=\"\" selected=\"\" value=\"\">-- เลือกจังหวัด --</option>";
						
						$.each(data,function(index,indexEntry){
							if(rdg_address_province_id==indexEntry[0]){
								provinceHtml+="<option selected='selected' value=\""+indexEntry[0]+"\">"+indexEntry[1]+"</option> ";
							}else{
								provinceHtml+="<option value=\""+indexEntry[0]+"\">"+indexEntry[1]+"</option> ";
							}
							
						});
						
					provinceHtml+="</select>";
				
					$("#provinceArea").html(provinceHtml);
					$("#rdg_address_province_id").change(function(){
						//alert($(this).val());
						callDistrict($(this).val(),rdg_address_district_id);
					});
					
					
				}
			});
		};
		callProvince();
		//end provine.
		//start district
		var callDistrict = function(paramProvince,rdg_address_district_id,rdg_address_sub_district_id){
			$.ajax({
				url:"Model/mRealtyDataGeneralAction.php",
				type:"post",
				dataType:"json",
				data:{"paramAction":"district","paramProvince":paramProvince},
				success:function(data){
				
					var districtHtml="";
					
					districtHtml+="<select name=\"rdg_address_district_id\" id=\"rdg_address_district_id\">";
						
					districtHtml+="<option disabled=\"\" selected=\"\" value=\"\">-- เลือกอำเภอ/เขต --</option>";
						
						$.each(data,function(index,indexEntry){
							
							if(rdg_address_district_id==indexEntry[0]){
								districtHtml+="<option selected='selected' value=\""+indexEntry[0]+"\">"+indexEntry[1]+"</option> ";
							}else{
								districtHtml+="<option value=\""+indexEntry[0]+"\">"+indexEntry[1]+"</option> ";
							}
							
						});
						
						districtHtml+="</select>";
				
					$("#districtArea").html(districtHtml);
					$("#rdg_address_district_id").change(function(){
						//alert($(this).val());
						callSubDistrict($(this).val(),rdg_address_sub_district_id);
					});
					
					
				}
			});
		};
		//callDistrict();
		//end district
		
		//start sub district
		var callSubDistrict = function(paramDistrictId,rdg_address_sub_district_id){
			$.ajax({
				url:"Model/mRealtyDataGeneralAction.php",
				type:"post",
				dataType:"json",
				data:{"paramAction":"sub_district","paramDistrictId":paramDistrictId},
				success:function(data){
					
					var subDistrictHtml="";
					
					subDistrictHtml+="<select name=\"rdg_address_sub_district_id\" id=\"rdg_address_sub_district_id\">";
						
					subDistrictHtml+="<option disabled=\"\" selected=\"\" value=\"0\">-- เลือกตำบล/แขวง --</option>";
						
						$.each(data,function(index,indexEntry){
							if(rdg_address_sub_district_id==indexEntry[0]){
								subDistrictHtml+="<option selected='selected' value=\""+indexEntry[0]+"\">"+indexEntry[1]+"</option> ";
							}else{
								subDistrictHtml+="<option value=\""+indexEntry[0]+"\">"+indexEntry[1]+"</option> ";
							}
							
						});
						
						subDistrictHtml+="</select>";
				
					$("#subDistrictArea").html(subDistrictHtml);
					
				}
			});
		};
		//callSubDistrict();
		//end sub district
	});								
</script>	
<form class="sky-form" id="sky-form4" action="#" novalidate="novalidate">
									<header>
										<div class="headline headline-md">
											<h2><i class="fa fa-search-plus"></i> เมนูค้นหาประกาศขายฟรี</h2>
										</div>
										<?php 
										while($rsCN=mysql_fetch_array($resultCN)){
											?>
											<button type="button"  id="<?=$rsCN['rt_id']?>" class="btn-u btn-mainmenu ">ขาย<?=$rsCN['rt_name']?></button>
											<?php
										}
										?>
										<!-- 
										<button type="button" class="btn-u btn-mainmenu ">ขายบ้าน</button>
										<button type="button" class="btn-u btn-mainmenu">ขายคอนโดมิเนียม</button>
										<button type="button" class="btn-u btn-mainmenu ">ขายทาว์นเฮาส์ </button>
										<button type="button" class="btn-u btn-mainmenu "> ขายทาว์นโฮม</button>
										<button type="button" class="btn-u btn-mainmenu">ขายที่ดิน</button>
										<button type="button" class="btn-u btn-mainmenu ">ขายโรงแรม </button>
										<button type="button" class="btn-u btn-mainmenu">ขายรีสอร์ท </button>
										<button type="button" class="btn-u btn-mainmenu">ขายหอพัก </button>
										<button type="button" class="btn-u btn-mainmenu">ขายอาคารพาณิชย์ </button>
										<button type="button" class="btn-u btn-mainmenu ">ขายโรงงาน </button>
										<button type="button" class="btn-u btn-mainmenu ">ขายอพาร์ทเมนท์ </button>
										<button type="button" class="btn-u btn-mainmenu">ขายอาคารสำนักงาน </button>
										<button type="button" class="btn-u btn-mainmenu">ขายเกสเฮ้าส์</button>
										<button type="button" class="btn-u btn-mainmenu">อสังหาริมทรัพย์ อื่นๆ </button>
 										-->
										<div class="headline headline-md">
											<!-- <h2>สำหรับผู้หรับเหมา</h2> -->
										</div>
										<?php 
										while($rsCY=mysql_fetch_array($resultCY)){
											if($rsCY['rt_id']=="36" ||$rsCY['rt_id']=="33" ){
											?>
											<button type="button" id="<?=$rsCY['rt_id']?>" class="btn-u btn-mainmenu-contractor btn-u-dark-blue"><?=$rsCY['rt_name']?></button>
											<?php
											}else{
											?>
											<button type="button" id="<?=$rsCY['rt_id']?>" class="btn-u btn-mainmenu-contractor btn-u-dark-blue">ขาย<?=$rsCY['rt_name']?></button>
											<?php
											}
										}
										?>
										<!-- 
										<button type="button" class="btn-u btn-mainmenu-contractor btn-u-dark-blue ">ขายวัสดถก่อสร้าง</button>
										<button type="button" class="btn-u btn-mainmenu-contractor btn-u-dark-blue">ขายเครื่องมือก่อสร้าง</button>
										<button type="button" class="btn-u btn-mainmenu-contractor btn-u-dark-blue ">ขายเฟอร์นิเจอร์ </button>
										<button type="button" class="btn-u btn-mainmenu-contractor btn-u-dark-blue"> ผู้รับเหมาก่อสร้างทั่วไป</button>
										<button type="button" class="btn-u btn-mainmenu-contractor btn-u-dark-blue">ผู้รับเหมาตกแต่ง</button>
										<button type="button" class="btn-u btn-mainmenu-contractor btn-u-dark-blue">ผู้รับเหมาฐานราก </button>
									 	-->
									</header>

						
									

									<fieldset>  
  
										<div class="row">
													<div class="col-md-4 col-padding-2">
														 <section>
																<label class="select" id="provinceArea" >
																
																	<i></i>
																</label>
															</section>
													</div>
													<div class="col-md-4 col-padding-2">
														 <section>
																<label class="select" id="districtArea">
																				<select name="rdg_address_district_id" id="rdg_address_district_id">
																					<option disabled="" selected="" value="0">-- เลือกอำเภอ/เขต --</option>

																				</select>
																
																	<i></i>
																</label>
															</section>
													</div>
													<div class="col-md-4 col-padding-2">
														 <section>
																<label class="select" id="subDistrictArea">
																	<select name="rdg_address_sub_district_id" id="rdg_address_sub_district_id">
																		<option disabled="" selected="" value="0">-- เลือกตำบล/แขวง --</option>
																	</select>
																	<i></i>
																</label>
															</section>
													</div>

													

													<div class="col-md-4 col-padding-2">
														 <section>
																<label class="select">
																	<select name="gender">
																		<option disabled="" selected="" value="0">เลือกถนน</option>
																		<option value="1">ท่าเรือเทเวศร์</option>
																		<option value="2">แยกเตาปูน</option>
																		<option value="3">แยกตากสิน</option>
																		<option value="3">คลองรางใหญ่ </option>
																		<option value="3">เข้าเขตกรุงเทพมหานคร</option>
																		<option value="3">ถนนนครสวรรค์</option>
																		
																	</select>
																	<i></i>
																</label>
															</section>
													</div>

													<div class="col-md-4 col-padding-2">
														 <section>
																<label class="select">
																	<select name="gender">
																		<option disabled="" selected="" value="0">เลือกรภไฟฟ้าบีทีเอส</option>
																		
																		<?php 
																		while($rsBTS=mysql_fetch_array($resultBTS)){
																			?>
																			<option value="<?=$rsBTS['pt_id']?>"><?=$rsBTS['pt_detail']?></option>
																			<?php
																		}
																		?>
																		
																		
																	</select>
																	<i></i>
																</label>
															</section>
													</div>
													<div class="col-md-4 col-padding-2">
														 <section>
																<label class="select">
																	<select name="gender">
																		<option disabled="" selected="" value="0">ใกล้รถไฟฟ้าใต้ดิน</option>
																		<?php 
																		while($rsMRT=mysql_fetch_array($resultMRT)){
																			?>
																			<option value="<?=$rsMRT['pt_id']?>"><?=$rsMRT['pt_detail']?></option>
																			<?php
																		}
																		?>
																		 	
																			
																			 	
																	</select>
																	<i></i>
																</label>
															</section>
													</div>

													<div class="col-md-4 col-padding-2">
														 <section>
																<label class="select">
																	<select name="gender">
																		<option disabled="" selected="" value="0">ใกล้สายรถเมย์ ก.ท.ม.</option>
																		<option value="1">สาย1 </option>
																		<option value="2">สาย2</option>
																		<option value="3">สาย3</option>
																	</select>
																	<i></i>
																</label>
															</section>
													</div>

													<div class="col-md-4 col-padding-2">
														 <section>
																<label class="select">
																	<select name="gender">
																		<option disabled="" selected="" value="0">ใกล้ท่าเรือ</option>
																		<?php 
																		while($rsHARBOR=mysql_fetch_array($resultHARBOR)){
																			?>
																			<option value="<?=$rsHARBOR['pt_id']?>"><?=$rsHARBOR['pt_detail']?></option>
																			<?php
																		}
																		?>
																		 	
																	</select>
																	<i></i>
																</label>
															</section>
													</div>
													
													<div class="col-md-4 col-padding-2">
														 <section>
															    <input type="text" class="form-control" placeholder="กรอกเลขที่ประกาศ">
														 </section>
													</div>
										</div>
										
										
										
									</fieldset>
									<footer>
									
											
											<button type="button" onclick="window.location.href='index.php?page=post_detail'" class="btn-u btn-u-orange btn-search1">
											<i class="fa fa-search-plus"></i> ค้นหา
											</button>
									
									</footer>
									<footer>
										<button class="btn-u  btn-u-xs btn-u-light-green" type="submit"><i class=" fa fa-folder-open "></i> บันทึกการค้นหา</button>
										<button class="btn-u  btn-u-xs btn-u-dark-blue" type="submit"><i class="fa fa-envelope-o"></i> แจ้งเตือนทางอีเมลล์</button>
										
									</footer>
									
									<fieldset> 
										<div class="row">
													
													<div class="col-md-9 col-padding-2">
													<!--
													<label class="input">
														<input type="text" placeholder="ค้นหา" name="firstname">
													</label>
													-->
													
													
													<div class="input-group">
					                                    <input type="text" class="form-control" placeholder="ใส่ข้อมูล">
					                                    <span class="input-group-btn">
					                                 	
					                                        <button type="button" class="btn btn-u btn-u-orange"><i class="fa fa-search-plus"></i> คลิ๊กค้นหาทางลัด</button>
					                                    </span>
					                                </div>

													</div>
										</div>
									</fieldset> 
								</form>