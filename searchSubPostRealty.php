<?php 
function numResultFn($rt_id){
	$strSQLnum="select count(*) as allPage from realty_data_general  where rt_id='".$rt_id."'";
	$result=mysql_query($strSQLnum);
	$rs=mysql_fetch_array($result);
	return $rs['allPage'];
}
function numResultFn2Param($rt_id,$condition_in){
	if($condition_in='1'){
		
	$strSQLnum="select count(*) as allPage from realty_data_general  where rt_id IN ($rt_id)";
	}else{
	$strSQLnum="select count(*) as allPage from realty_data_general  where rt_id='".$rt_id."'";
	}
	$result=mysql_query($strSQLnum);
	$rs=mysql_fetch_array($result);
	return $rs['allPage'];
}


function resultUnit(){
	$strSQL="select * from realty_unit order by ru_sort";
	$result=mysql_query($strSQL);
	return $result;
}
include'query_public_transport.php';




?>
 <!--Blog Post0--> 
 		<?php 
 		if($_POST['rdg_address_province_id2']!="" or $_POST['rdg_address_district_id2']!="" or $_POST['rdg_address_sub_district_id2']){
 		?>
 		<script>
 		callProvince("<?=$_POST['rdg_address_province_id2']?>","<?=$_POST['rdg_address_district_id2']?>","<?=$_POST['rdg_address_sub_district_id2']?>","2");
 		callDistrict("<?=$_POST['rdg_address_province_id2']?>","<?=$_POST['rdg_address_district_id2']?>","","2");
 		callSubDistrict("<?=$_POST['rdg_address_district_id2']?>","<?=$_POST['rdg_address_sub_district_id2']?>","2");
 		</script>
 		<?php 
 		}else if($_POST['rdg_address_province_id']!="" or $_POST['rdg_address_district_id']!="" or $_POST['rdg_address_sub_district_id']){
 		?>
 		<script>
 		callProvince("<?=$_POST['rdg_address_province_id']?>","<?=$_POST['rdg_address_district_id']?>","<?=$_POST['rdg_address_sub_district_id']?>","2");
 		callDistrict("<?=$_POST['rdg_address_province_id']?>","<?=$_POST['rdg_address_district_id']?>","","2");
 		callSubDistrict("<?=$_POST['rdg_address_district_id']?>","<?=$_POST['rdg_address_sub_district_id']?>","2");
 		</script>
 		<?php	
 		}else if($_POST['rdg_address_province_id_rent']!="" or $_POST['rdg_address_district_id_rent']!="" or $_POST['rdg_address_sub_district_id_rent']){
		?>
 		<script>
 		callProvince("<?=$_POST['rdg_address_province_id_rent']?>","<?=$_POST['rdg_address_district_id_rent']?>","<?=$_POST['rdg_address_sub_district_id_rent']?>","2");
 		callDistrict("<?=$_POST['rdg_address_province_id_rent']?>","<?=$_POST['rdg_address_district_id_rent']?>","","2");
 		callSubDistrict("<?=$_POST['rdg_address_district_id_rent']?>","<?=$_POST['rdg_address_sub_district_id_rent']?>","2");
 		</script>
 		<?php
		}else{
 		?>
 		<script>
 		callProvince("","","","2");
 		</script>	
 		<?php
 		}
 		?>
	
	
<?php 

if($rsRT2['rt_contructor_yet']=="Y"){


}else{
	

?>									
<div class="row">						
	<form id="formSubPost" name="formSubPost" class="sky-form" id="sky-form4" action="#" novalidate="novalidate">
						<header>
							<div class="headline headline-md">
								<?php 
								if($_POST['search_type']=='1'){
									$type_post='ขาย';
								}else{
									$type_post='เช่า';
								}
								
								//echo $_POST['embed_rt_id'];
								if($_POST['embed_rt_id']==18){
									?>
									<h2>ค้นหาประกาศ <span id='realtyName'><?=$_POST['embed_rt_name']?> </span></h2>
									<?php
								}else{
									?>
									<h2>ค้นหาประกาศ <span id='realtyName'><?=$type_post?><?=$_POST['embed_rt_name']?> </span></h2>
									<?php
								}
								?>
								
								
							</div>
							<?php 

			if($_POST['search_type']=="1"){
				if(($_POST['embed_rt_id']==19) || ($_POST['embed_rt_id']==18) || ($_POST['embed_rt_id']==17)){
				

				}else{

					
					if($_POST['rdg_rf']=="5"){
						?>
						<input type="radio" name="rdg_rf"  value="1"> ขายขาด
						<input type="radio" name="rdg_rf" checked='checked' value="5"> ขายดาวน์
						<!-- <input type="radio" name="rdg_rf"  value="3"> ขายและเช่า -->
						<?php
					}else if($_POST['rdg_rf']=="1"){
						?>
						<input type="radio" name="rdg_rf" checked='checked' value="1"> ขายขาด
						<input type="radio" name="rdg_rf" value="5"> ขายดาวน์
						<!-- <input type="radio" name="rdg_rf" value="3"> ขายและเช่า -->
						<?php
						
					}else if($_POST['rdg_rf']=="3"){
						?>
						<input type="radio" name="rdg_rf" value="1"> ขายขาด
						<input type="radio" name="rdg_rf" value="5"> ขายดาวน์
						<!-- <input type="radio" name="rdg_rf"  checked='checked' value="3"> ขายและเช่า -->
						<?php
						
					}else{
						?>
						<input type="radio" name="rdg_rf"  value="1"> ขายขาด
						<input type="radio" name="rdg_rf" value="5"> ขายดาวน์
						<!-- <input type="radio" name="rdg_rf"  value="3"> ขายและเช่า -->
						<?php
					}
				}
			}
			if($_POST['search_type']=="2"){	
				
				 if($_POST['rdg_rf']=="2"){
						?>
						<input style='display:none;' type="radio" name="rdg_rf" checked='checked' value="2"> <span style='display:none;'>เช่า</span>
						<!-- <input type="radio" name="rdg_rf"   value="3"> ขายและเช่า -->
						<?php
						
					}else if($_POST['rdg_rf']=="3"){
						?>
						<input style='display:none;' type="radio" name="rdg_rf"  value="2"> <span style='display:none;'>เช่า</span>
						<!-- <input type="radio" name="rdg_rf" checked='checked'  value="3"> ขายและเช่า -->
						<?php
					}
					
			}
			?>
			
			
		</header>
	
	
		<fieldset> 
			<div class="row">
	
				<div class="magazine-posts col-md-12 col-sm-6 margin-bottom-2">
				<div class="shadow-wrapper">
					<blockquote class="hero box-shadow shadow-effect-2">
						
						<?php if($embed_rt_id=="1"){
							?>
							<div class="col-md-4 col-padding-2">
								 <section>
										<label class="select">
										
											<select name="home_type">
												<?php if("All"==$home_type){
													?>
													<option value="All" selected="selected" ><?=$realty_text_type?>บ้านทุกประเภท</option>
													<option value="2"  ><?=$realty_text_type?>บ้านเดี่ยว</option>
													<option value="3" ><?=$realty_text_type?>บ้านสองชั้น</option>
													<option value="4" ><?=$realty_text_type?>บ้านสามชั้น </option>
													<option value="5" ><?=$realty_text_type?>บ้านแฝด</option>
													<?php
												}else if("2"==$home_type){
												?>
												<option value="All" ><?=$realty_text_type?>บ้านทุกประเภท</option>
												<option value="2"  selected="selected"><?=$realty_text_type?>บ้านเดี่ยว</option>
												<option value="3" ><?=$realty_text_type?>บ้านสองชั้น</option>
												<option value="4" ><?=$realty_text_type?>บ้านสามชั้น </option>
												<option value="5" ><?=$realty_text_type?>บ้านแฝด</option>
												<?php
												}else if("3"==$home_type){
												?>
												<option value="All"  ><?=$realty_text_type?>บ้านทุกประเภท</option>
												<option value="2"  ><?=$realty_text_type?>บ้านเดี่ยว</option>
												<option value="3" selected="selected"><?=$realty_text_type?>บ้านสองชั้น</option>
												<option value="4" ><?=$realty_text_type?>บ้านสามชั้น </option>
												<option value="5" ><?=$realty_text_type?>บ้านแฝด</option>
												<?php
												}else if("4"==$home_type){
												?>
												<option value="All" ><?=$realty_text_type?>บ้านทุกประเภท</option>
												<option value="2"  ><?=$realty_text_type?>บ้านเดี่ยว</option>
												<option value="3" ><?=$realty_text_type?>บ้านสองชั้น</option>
												<option value="4" selected="selected"><?=$realty_text_type?>บ้านสามชั้น </option>
												<option value="5" ><?=$realty_text_type?>บ้านแฝด</option>
												<?php
												}else if("5"==$home_type){
												?>
												<option value="All"  ><?=$realty_text_type?>บ้านทุกประเภท</option>
												<option value="2"  ><?=$realty_text_type?>บ้านเดี่ยว</option>
												<option value="3" ><?=$realty_text_type?>บ้านสองชั้น</option>
												<option value="4" ><?=$realty_text_type?>บ้านสามชั้น </option>
												<option value="5" selected="selected"><?=$realty_text_type?>บ้านแฝด</option>
												<?php
												}else{
												?>
												<option value="All"  selected="selected" ><?=$realty_text_type?>บ้านทุกประเภท</option>
												<option value="2"  ><?=$realty_text_type?>บ้านเดี่ยว</option>
												<option value="3" ><?=$realty_text_type?>บ้านสองชั้น</option>
												<option value="4" ><?=$realty_text_type?>บ้านสามชั้น </option>
												<option value="5"><?=$realty_text_type?>บ้านแฝด</option>
												<?php
												}
												?>
											</select>
											<i></i>
										</label>
									</section>
							</div>
							<?php
						}else if($embed_rt_id=="3"){
						
							?>
							<div class="col-md-4 col-padding-2">
								 <section>
										<label class="select">
										
											<select name="sub_type">
												<?php if("All"==$sub_type){
													?>
													<option value="All" selected="selected" ><?=$realty_text_type?>ที่ดินทุกประเภท</option>
													<option value="9"  ><?=$realty_text_type?>ที่ดินเปล่า </option>
													<option value="10" > <?=$realty_text_type?>ที่ดินพร้อมสิ่งปลูกสร้าง</option>
													<?php
												}else if("9"==$sub_type){
												?>
													<option value="All" ><?=$realty_text_type?>ที่ดินทุกประเภท</option>
													<option value="9"  selected="selected"><?=$realty_text_type?>ที่ดินเปล่า </option>
													<option value="10" > <?=$realty_text_type?>ที่ดินพร้อมสิ่งปลูกสร้าง</option>
												<?php
												}else if("10"==$sub_type){
												?>
													<opt<?=$realty_text_type?> value="All"  ><?=$realty_text_type?>ที่ดินทุกประเภท</option>
													<option value="9"  ><?=$realty_text_type?>ที่ดินเปล่า </option>
													<option value="10" selected="selected"> <?=$realty_text_type?>ที่ดินพร้อมสิ่งปลูกสร้าง</option>
												<?php
												
												}else{
												?>
													<option value="All" selected="selected" ><?=$realty_text_type?>ที่ดินทุกประเภท</option>
													<option value="9"  ><?=$realty_text_type?>ที่ดินเปล่า </option>
													<option value="10" > <?=$realty_text_type?>ที่ดินพร้อมสิ่งปลูกสร้าง</option>
												<?php
												}
												?>
											</select>
											<i></i>
										</label>
									</section>
							</div>
							<?php
						}else if($embed_rt_id=="5"){
							?>
							<div class="col-md-4 col-padding-2">
								 <section>
										<label class="select">
										
											<select name="sub_type">
												<?php
												 if("12"==$sub_type){
												?>
													<option value="12" selected="selected" ><?=$realty_text_type?>อาคารพาณิชย์</option>
													<option value="13" ><?=$realty_text_type?>โฮมออฟฟิค</option>
												<?php
												}else if("13"==$sub_type){
												?>
													<option value="12"  ><?=$realty_text_type?>อาคารพาณิชย์</option>
													<option value="13" selected="selected"><?=$realty_text_type?>โฮมออฟฟิค</option>
												<?php
												
												}else{
												?>
													<option value="12" selected="selected" ><?=$realty_text_type?>อาคารพาณิชย์</option>
													<option value="13" ><?=$realty_text_type?>โฮมออฟฟิค</option>
												<?php
												}
												?>
											</select>
											<i></i>
										</label>
									</section>
							</div>
							<?php
							}else if($embed_rt_id=="9"){
								?>
								<div class="col-md-4 col-padding-2">
									 <section>
											<label class="select">
											
												<select name="sub_type">
													<?php
													 if("All"==$sub_type){
													?>
														<option value="All" selected="selected" >ประเภทหอพัก</option>
														<option value="15" > หอพักชายสำหรับ<?=$realty_text_type?> </option>
														<option value="16" > หอพักหญิงสำหรับ<?=$realty_text_type?></option>
														<option value="17" > หอพักรวมสำหรับ<?=$realty_text_type?> </option>	
													<?php
													}else if("15"==$sub_type){
													?>
														<option value="All"  >ประเภทหอพัก</option>
														<option value="15" selected="selected"> หอพักชายสำหรับ<?=$realty_text_type?> </option>
														<option value="16" > หอพักหญิงสำหรับ<?=$realty_text_type?></option>
														<option value="17" > หอพักรวมสำหรับ<?=$realty_text_type?> </option>	
													<?php
													
													}else if("16"==$sub_type){
													?>
														<option value="All"  >ประเภทหอพัก</option>
														<option value="15" > หอพักชายสำหรับ<?=$realty_text_type?> </option>
														<option value="16" selected="selected"> หอพักหญิงสำหรับ<?=$realty_text_type?></option>
														<option value="17" > หอพักรวมสำหรับ<?=$realty_text_type?> </option>	
													<?php
													
													}else if("17"==$sub_type){
													?>
														<option value="All"  >ประเภทหอพัก</option>
														<option value="15" > หอพักชายสำหรับ<?=$realty_text_type?> </option>
														<option value="16" > หอพักหญิงสำหรับ<?=$realty_text_type?></option>
														<option value="17" selected="selected"> หอพักรวมสำหรับ<?=$realty_text_type?> </option>	
													<?php
													
													}else{
													?>
														<option value="All"  selected="selected">ประเภทหอพัก</option>
														<option value="15" > หอพักชายสำหรับ<?=$realty_text_type?> </option>
														<option value="16" > หอพักหญิงสำหรับ<?=$realty_text_type?></option>
														<option value="17" > หอพักรวมสำหรับ<?=$realty_text_type?> </option>	
													<?php
													}
													?>
												</select>
												<i></i>
											</label>
										</section>
								</div>
								<?php
							}else if($embed_rt_id=="16"){
								?>
								<div class="col-md-4 col-padding-2">
									 <section>
											<label class="select">
											
												<select name="sub_type">
													<?php
													 if("All"==$sub_type){
													?>
														<option value="All" selected="selected" ><?=$realty_text_type?>วัสดุก่อสร้างทุกประเภท</option>
														<option value="27" > <?=$realty_text_type?>วัสดุก่อสร้าง </option>
														<option value="28" > <?=$realty_text_type?>อุปกรณ์ก่อสร้าง </option>
													
													<?php
													}else if("27"==$sub_type){
													?>
														<option value="All"  ><?=$realty_text_type?>วัสดุก่อสร้างทุกประเภท</option>
														<option value="27" selected="selected"> <?=$realty_text_type?>วัสดุก่อสร้าง </option>
														<option value="28" > <?=$realty_text_type?>อุปกรณ์ก่อสร้าง </option>
														
													<?php
													
													}else if("28"==$sub_type){
													?>
														<option value="All" ><?=$realty_text_type?>วัสดุก่อสร้างทุกประเภท</option>
														<option value="27" > <?=$realty_text_type?>วัสดุก่อสร้าง </option>
														<option value="28" selected="selected" > <?=$realty_text_type?>อุปกรณ์ก่อสร้าง </option>
													
													<?php
													
													}else{
													?>
														<option value="All" selected="selected" ><?=$realty_text_type?>วัสดุก่อสร้างทุกประเภท</option>
														<option value="27" > <?=$realty_text_type?>วัสดุก่อสร้าง </option>
														<option value="28" > <?=$realty_text_type?>อุปกรณ์ก่อสร้าง </option>
													
													
													<?php
													}
													?>
												</select>
												<i></i>
											</label>
										</section>
								</div>
								<?php
							}else if($embed_rt_id=="17"){
								?>
								<div class="col-md-4 col-padding-2">
									 <section>
											<label class="select">
											
												<select name="sub_type">
													<?php
													 if("All"==$sub_type){
													?>
														<option value="All" selected="selected" ><?=$realty_text_type?>เฟอร์นิเจอร์ทุกประเภท</option>
														<option value="29" > <?=$realty_text_type?>เฟอร์นิเจอร์ภายใน </option>
														<option value="35" > <?=$realty_text_type?>เฟอร์นิเจอร์ภายนอก</option>
													
													<?php
													}else if("29"==$sub_type){
													?>
														<option value="All"  ><?=$realty_text_type?>เฟอร์นิเจอร์ทุกประเภท</option>
														<option value="29" selected="selected"> <?=$realty_text_type?>เฟอร์นิเจอร์ภายใน </option>
														<option value="35" > <?=$realty_text_type?>เฟอร์นิเจอร์ภายนอก</option>
														
													<?php
													
													}else if("35"==$sub_type){
													?>
														<option value="All" ><?=$realty_text_type?>เฟอร์นิเจอร์ทุกประเภท</option>
														<option value="29" > <?=$realty_text_type?>เฟอร์นิเจอร์ภายใน </option>
														<option value="35" selected="selected" > <?=$realty_text_type?>เฟอร์นิเจอร์ภายนอก</option>
													
													<?php
													
													}else{
													?>
														<option value="All" selected="selected" ><?=$realty_text_type?>เฟอร์นิเจอร์ทุกประเภท</option>
														<option value="29" > <?=$realty_text_type?>เฟอร์นิเจอร์ภายใน </option>
														<option value="35" > <?=$realty_text_type?>เฟอร์นิเจอร์ภายนอก</option>
													
													
													<?php
													}
													?>
												</select>
												<i></i>
											</label>
										</section>
								</div>
								<?php
							}else if($embed_rt_id=="18"){
								?>
								<div class="col-md-4 col-padding-2">
									 <section>
											<label class="select">
											
												<select name="sub_type">
													<?php
													 if("All"==$sub_type){
													?>
														<option value="All" selected="selected" >ผู้รับเหมาทุกประเภท</option>
														<option value="30" > ผู้รับเหมาก่อสร้าง </option>
														<option value="31" > ผู้รับเหมาตกแต่ง</option>
														<option value="32" > ผู้รับเหมาฐานราก </option>
														<option value="33" > ผู้รับเหมา</option>
														<option value="34" > รายการรับเหมาอื่นๆ  </option>
														<option value="36" > ผู้รับเหมาทั่วไป</option>
													
													<?php
													}else if("30"==$sub_type){
													?>
														<option value="All" >ผู้รับเหมาทุกประเภท</option>
														<option value="30"  selected="selected"> ผู้รับเหมาก่อสร้าง </option>
														<option value="31" > ผู้รับเหมาตกแต่ง</option>
														<option value="32" > ผู้รับเหมาฐานราก </option>
														<option value="33" > ผู้รับเหมา</option>
														<option value="34" > รายการรับเหมาอื่นๆ  </option>
														<option value="36" > ผู้รับเหมาทั่วไป</option>
														
													<?php
													
													}else if("31"==$sub_type){
													?>
														<option value="All"  >ผู้รับเหมาทุกประเภท</option>
														<option value="30" > ผู้รับเหมาก่อสร้าง </option>
														<option value="31" selected="selected"> ผู้รับเหมาตกแต่ง</option>
														<option value="32" > ผู้รับเหมาฐานราก </option>
														<option value="33" > ผู้รับเหมา</option>
														<option value="34" > รายการรับเหมาอื่นๆ  </option>
														<option value="36" > ผู้รับเหมาทั่วไป</option>
													
													<?php
													
													}else if("32"==$sub_type){
													?>
														<option value="All"  >ผู้รับเหมาทุกประเภท</option>
														<option value="30" > ผู้รับเหมาก่อสร้าง </option>
														<option value="31" > ผู้รับเหมาตกแต่ง</option>
														<option value="32" selected="selected"> ผู้รับเหมาฐานราก </option>
														<option value="33" > ผู้รับเหมา</option>
														<option value="34" > รายการรับเหมาอื่นๆ  </option>
														<option value="36" > ผู้รับเหมาทั่วไป</option>
													
													<?php
													
													}else if("33"==$sub_type){
													?>
														<option value="All"  >สำหรับผู้รับเหมาทุกประเภท</option>
														<option value="30" > ผู้รับเหมาก่อสร้าง </option>
														<option value="31" > ผู้รับเหมาตกแต่ง</option>
														<option value="32" > ผู้รับเหมาฐานราก </option>
														<option value="33" selected="selected"> ผู้รับเหมา</option>
														<option value="34" > รายการรับเหมาอื่นๆ  </option>
														<option value="36" > ผู้รับเหมาทั่วไป</option>
													
													<?php
													
													}else if("34"==$sub_type){
													?>
														<option value="All"  >สำหรับผู้รับเหมาทุกประเภท</option>
														<option value="30" > ผู้รับเหมาก่อสร้าง </option>
														<option value="31" > ผู้รับเหมาตกแต่ง</option>
														<option value="32" > ผู้รับเหมาฐานราก </option>
														<option value="33" > ผู้รับเหมา</option>
														<option value="34" selected="selected"> รายการรับเหมาอื่นๆ  </option>
														<option value="36" > ผู้รับเหมาทั่วไป</option>
													
													<?php
													
													}else if("36"==$sub_type){
													?>
														<option value="All"  >ผู้รับเหมาทุกประเภท</option>
														<option value="30" > ผู้รับเหมาก่อสร้าง </option>
														<option value="31" > ผู้รับเหมาตกแต่ง</option>
														<option value="32" > ผู้รับเหมาฐานราก </option>
														<option value="33" > ผู้รับเหมา</option>
														<option value="34" > รายการรับเหมาอื่นๆ  </option>
														<option value="36" selected="selected"> ผู้รับเหมาทั่วไป</option>
													
													<?php
													
													}else{
													?>
														<option value="All" selected="selected" >สำหรับผู้รับเหมาทุกประเภท</option>
														<option value="30" > ผู้รับเหมาก่อสร้าง </option>
														<option value="31" > ผู้รับเหมาตกแต่ง</option>
														<option value="32" > ผู้รับเหมาฐานราก </option>
														<option value="33" > ผู้รับเหมา</option>
														<option value="34" > รายการรับเหมาอื่นๆ  </option>
														<option value="36" > ผู้รับเหมาทั่วไป</option>
													
													
													<?php
													}
													?>
												</select>
												<i></i>
											</label>
										</section>
								</div>
								<?php
							}else if($embed_rt_id=="19"){
								?>
								<div class="col-md-4 col-padding-2">
									 <section>
											<label class="select">
											
												<select name="sub_type">
													<?php
													 if("All"==$sub_type){
													?>
														<option value="All" selected="selected" ><?=$realty_text_type?>เครื่องมือก่อสร้างและเครื่องจักก่อสร้าง</option>
														<option value="37" > <?=$realty_text_type?>เครื่องมือก่อสร้าง </option>
														<option value="38" > <?=$realty_text_type?>เครื่องจักก่อสร้าง</option>
													
													<?php
													}else if("37"==$sub_type){
													?>
														<option value="All"  ><?=$realty_text_type?>เครื่องมือก่อสร้างและเครื่องจักก่อสร้าง</option>
														<option value="37" selected="selected"> <?=$realty_text_type?>เครื่องมือก่อสร้าง </option>
														<option value="38" > <?=$realty_text_type?>เครื่องจักก่อสร้าง</option>
														
													<?php
													
													}else if("38"==$sub_type){
													?>
														<option value="All"  ><?=$realty_text_type?>เครื่องมือก่อสร้างและเครื่องจักก่อสร้าง</option>
														<option value="37" > <?=$realty_text_type?>เครื่องมือก่อสร้าง </option>
														<option value="38" selected="selected"> <?=$realty_text_type?>เครื่องจักก่อสร้าง</option>
													
													<?php
													
													}else{
													?>
														<option value="All" selected="selected" ><?=$realty_text_type?>เครื่องมือก่อสร้างและเครื่องจักก่อสร้าง</option>
														<option value="37" > <?=$realty_text_type?>เครื่องมือก่อสร้าง </option>
														<option value="38" > <?=$realty_text_type?>เครื่องจักก่อสร้าง</option>
													
													
													<?php
													}
													?>
												</select>
												<i></i>
											</label>
										</section>
								</div>
								<?php
							}?>
						
						<?php 
						if($embed_rt_id!="19"and $embed_rt_id!="18" and $embed_rt_id!="16" and $embed_rt_id!="17"){
							
						?>
						<div class="col-md-4 col-padding-2">
						<input type='text' placeholder="ราคาเริ่มต้น" name='rdg_price_start' id='rdg_price_start' class='form-control'>
							 <!-- 
							 <section>
									<label class="select">
									<?php
									if($_POST['rdg_price_start']==""){
										 $rdg_price_start='9999999';
									}else{
										 $rdg_price_start=$_POST['rdg_price_start'];
									}
									
									?>
									
										<select name="rdg_price_start">
											
											<option value="All" selected="selected" > ราคา<?=$realty_text_type?>เริ่มต้น </option>
											<?php 
											for($i=1;$i<=100;$i++){
												$number=(10*$i)*10000;
												$numCommas=number_format($number);
												if($number==$rdg_price_start){
													?>
													<option selected='selected'  value="<?=$number?>"><?=$numCommas?></option>
													<?php
												}else{
													?>
													<option value="<?=$number?>"><?=$numCommas?></option>
													<?php
												}
											}
											?>
										</select>
										<i></i>
									</label>
								</section>
								 -->
						</div>
						
						<div class="col-md-4 col-padding-2">
						
						<input type='text' placeholder="ราคาสูงสุด" name='rdg_price_end' id='rdg_price_end' class='form-control'>
					
							<!-- 
							 <section>
									<label class="select">
									
										<?php
										if($_POST['rdg_price_end']==""){
											 $rdg_price_end='9999999';
										}else{
											 $rdg_price_end=$_POST['rdg_price_end'];
										}
										?>
										<select name="rdg_price_end">
											<option value="All" selected="" > ราคา<?=$realty_text_type?>สูงสุด</option>
											<?php 
											for($i=1;$i<=100;$i++){
												$number=(10*$i)*10000;
												$numCommas=number_format($number);
												if($number == $rdg_price_end){
													?>
													<option selected='selected' value="<?=$number?>"><?=$numCommas?></option>
													<?php
												}else{
													?>
													<option value="<?=$number?>"><?=$numCommas?></option>
													<?php
												}
												
											}
											if(">20000000"==$_POST['rdg_price_end']){
												?>
												<option selected='selected' value=">20000000" selected="" > 20,000,000  ขึ้นไป</option>
												<?php
											}else{
												?>
												<option value=">20000000" > 20,000,000  ขึ้นไป</option>
												<?php
											}
											?>
											
											
										</select>
										<i></i>
									</label>
								</section>
								 -->
						</div>
	
						<div class="col-md-4 col-padding-2">
							 <section>
									<label class="select">
										<select class="AreaSelect" tabindex="2" name="rdg_area_number">
											<option value="All">ขนาดพื้นที่</option>
											<?php 
											for($i=1;$i<=100;$i++){
												if($rdg_area_number==($i*5)){
												?>
												<option selected='seleted' value="<?=$i*5?>"><?=$i*5?></option>
												<?php
												}else{
												?>
												<option value="<?=$i*5?>"><?=$i*5?></option>
												<?php	
												}
												
											}
											?>
											<option value=">500">500  ขึ้นไป</option>
											
											</select>
										<i></i>
									</label>
								</section>
						</div>
	
						<div class="col-md-4 col-padding-2">
							 <section>
									<label class="select">
										<select class="UnitSelect" tabindex="3" name="rdg_area_unit">
										<option value="All">หน่วยพื้นที่</option>
										<?php 
										$result=resultUnit();
										while($rs=mysql_fetch_array($result)){
											if($rs['ru_id']==$_POST['rdg_area_unit']){
											?>
												<option selected='selected' value="<?=$rs['ru_id']?>"><?=$rs['ru_name']?></option>
											<?php
											}else{
											?>
												<option value="<?=$rs['ru_id']?>"><?=$rs['ru_name']?></option>
											<?php 
											}	
										}
										?>
											
											</select>
										<i></i>
									</label>
								</section>
						</div>
	
						<?php 
						if($embed_rt_id!='3'){
						?>
						<div class="col-md-4 col-padding-2">
								 <section>
										<label class="select">
											<select class="Room1Select" tabindex="4" name="rdr_bedroom">
												<option value="All">ห้องนอน</option>
												<?php 
												for($i=1;$i<=300;$i++){
													if($i==$_POST['rdr_bedroom']){
													?>
													<option selected='selected' value="<?=$i?>"><?=$i?></option>
													<?php	
													}else{
													?>
													<option value="<?=$i?>"><?=$i?></option>
													<?php
													}
												}
												?>
											</select>
											<i></i>
										</label>
									</section>
							</div>
							<?php 
							}
						}
						?>
						<br style="clear:both">
					</blockquote>
				</div>
				</div>											 
			</div>
			<div class="row">													
				<div class="col-md-12 col-padding-2">
				<label class="input ">
					<input type="text " class='form-control'  placeholder="ค้นหา" name="searchTxt">
				</label>
				</div>											
			</div>
		</fieldset> 
		<fieldset>   
			<div class="row">
						<div class="col-md-4 col-padding-2">
							 <section>
							 
									<label class="select" id="provinceArea2" >
										
										<i></i>
									</label>
									
								</section>
						</div>
						<div class="col-md-4 col-padding-2">
							 <section>
									<label class="select">
										<label class="select" id="districtArea2">
														<select name="rdg_address_district_id" id="rdg_address_district_id">
															<option selected="" value="All">-- เลือกอำเภอ/เขต --</option>
	
														</select>
										
											<i></i>
										</label>
										<i></i>
									</label>
								</section>
						</div>
						<div class="col-md-4 col-padding-2">
							 <section>
									<label class="select">
										<label class="select" id="subDistrictArea2">
											<select name="rdg_address_sub_district_id" id="rdg_address_sub_district_id">
												<option  selected="" value="All">-- เลือกตำบล/แขวง --</option>
											</select>
											<i></i>
										</label>
										<i></i>
									</label>
								</section>
						</div>
	
						
	
						<div class="col-md-4 col-padding-2">
							 <section>
									<label class="select">
										<select name="rdg_address_road">
											<option   value="All">เลือกถนน</option>
											<?php 
												while($rsRoadNo=mysql_fetch_array($resultRoadNo)){
													if($rsRoadNo['rdg_address_road']==$_POST['rdg_address_road'])	{
													?>
													<option selected='selected' value="<?=$rsRoadNo['rdg_address_road']?>"><?=$rsRoadNo['rdg_address_road']?></option>
													<?php
													}else{
													?>
													<option value="<?=$rsRoadNo['rdg_address_road']?>"><?=$rsRoadNo['rdg_address_road']?></option>
													<?php	
													}
												}
											?>
											
										</select>
										<i></i>
									</label>
								</section>
						</div>
						
						
						
						<div class="col-xs-4 col-padding-2">
							 <section>
									<label class="select">
										<select name="rdg_line_sale_bts2" id=rdg_line_sale_bts2>
										<option  selected="" value="All">เลือกสายรถไฟฟ้า BTS </option>
										<?php 
									
										while($rsLineBTS=mysql_fetch_array($resultLineBTS)){
											?>
											<option value="<?=$rsLineBTS['bts_line_id']?>"><?=$rsLineBTS['bts_line_name']?></option>
											<?php
										}
										?>
										</select>
									</label>
							</section>
						</div>
						<div class="col-xs-4 col-padding-2">
							 <section>
									<label class="select" id='AreaBTSStationSale2'>
										<select name="rdg_line_bts2" >
											<option  selected="" value="All">เลือกสถานนีรถไฟฟ้า BTS</option>
										</select>
									</label>
							</section>
						</div>
						
						
						
						<!-- 
						<div class="col-md-4 col-padding-2">
							 <section>
									<label class="select">
										<select name="rdg_bts">
											<option  selected="" value="All">เลือกรถไฟฟ้าบีทีเอส</option>
												<?php 
												while($rsBTS=mysql_fetch_array($resultBTS)){
													if($rsBTS['pt_id']==$_POST['rdg_bts']){
													?>
													<option selected='selected' value="<?=$rsBTS['pt_id']?>"><?=$rsBTS['pt_detail']?></option>
													<?php
													}else{
													?>
													<option value="<?=$rsBTS['pt_id']?>"><?=$rsBTS['pt_detail']?></option>
													<?php
													}
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
										<select name="rdg_bts">
											<option  selected="" value="All">เลือกรถไฟฟ้าบีทีเอส</option>
												<?php 
												while($rsBTS=mysql_fetch_array($resultBTS)){
													if($rsBTS['pt_id']==$_POST['rdg_bts']){
													?>
													<option selected='selected' value="<?=$rsBTS['pt_id']?>"><?=$rsBTS['pt_detail']?></option>
													<?php
													}else{
													?>
													<option value="<?=$rsBTS['pt_id']?>"><?=$rsBTS['pt_detail']?></option>
													<?php
													}
												}
												?>
										</select>
										<i></i>
									</label>
								</section>
						</div>
						-->
						<div class="col-md-4 col-padding-2">
							 <section>
									<label class="select">
										<select name="rdg_mrt">
											<option  selected="" value="All">ใกล้รถไฟฟ้าใต้ดิน</option>
											<?php 
												while($rsMRT=mysql_fetch_array($resultMRT)){
													if($rsMRT['pt_id']==$_POST['rdg_mrt']){																				
													?>
													<option selected='selected' value="<?=$rsMRT['pt_id']?>"><?=$rsMRT['pt_detail']?></option>
													<?php
													}else{
													?>
													<option value="<?=$rsMRT['pt_id']?>"><?=$rsMRT['pt_detail']?></option>
													<?php	
													}
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
										<select name="rdg_bus">
											<option  value="All">ใกล้สายรถเมย์ ก.ท.ม.</option>
											<?php 
											while($rsBusNo=mysql_fetch_array($resultBusNo)){
												
												if($rsBusNo['rdg_bus']==$_POST['rdg_bus']){
												?>
												<option selected='selected' value="<?=$rsBusNo['rdg_bus']?>">สายเมล์ <?=$rsBusNo['rdg_bus']?></option>
												<?php
												}else{
												?>
												<option value="<?=$rsBusNo['rdg_bus']?>">สายเมล์<?=$rsBusNo['rdg_bus']?></option>
												<?php	
												}
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
										<select name="rdg_harbor">
											<option  selected="" value="All">ใกล้ท่าเรือแม่น้ำเจ้าพระยา</option>
											<?php 
												while($rsHARBOR=mysql_fetch_array($resultHARBOR)){
													if($rsHARBOR['pt_id']==$_POST['rdg_harbor']){
													?>
													<option selected='selected' value="<?=$rsHARBOR['pt_id']?>"><?=$rsHARBOR['pt_detail']?></option>
													<?php
													}else{
													?>
													<option value="<?=$rsHARBOR['pt_id']?>"><?=$rsHARBOR['pt_detail']?></option>
													<?php	
													}
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
										<select class="Room1Select" tabindex="4" name="rdg_address_soi">
											<option value="All">เลือกซอย</option>
												<?php 
													while($rsSoi=mysql_fetch_array($resultSoi)){
														if($rsSoi['rdg_address_soi']==$_POST['rdg_address_soi']){
														?>
														<option selected='selected' value="<?=$rsSoi['rdg_address_soi']?>"><?=$rsSoi['rdg_address_soi']?></option>
														<?php
														}else{
														?>
														<option value="<?=$rsSoi['rdg_address_soi']?>"><?=$rsSoi['rdg_address_soi']?></option>
														<?php
														}
													}
												?>
										</select>
										<i></i>
									</label>
								</section>
						</div>
			</div>
			
			
			
		</fieldset>
		<footer>
			<!-- <button class="btn-u btn-u-light-green" type="submit">บันทึกการค้นหา</button> -->
			<input type='hidden' name='paramAction' value='searchSubPost'>
			<div class="parameterEmbedArea">
			
			<input type='hidden' name='search_type' value='<?=$_POST['search_type']?>'>
			<input type='hidden' name='embed_rt_id' value='<?=$embed_rt_id?>'>
			<input type='hidden' name='embed_rt_name' value='<?=$_POST['embed_rt_name']?>'>
			
			
			</div>
			<button class="btn-u btn-u-lg btn-u-dark-blue" id='infoToEmailSubSearch' type="button">แจ้งเตือนทางอีเมลล์</button>
			<button class="btn-u btn-u-lg btn-u-orange  pull-right" type="submit ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-search-plus"></i>ค้นหาประกาศ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
		</footer>
		
		
	</form>
</div>
<br>
<?php }?>
<div class="ads">
	<div id="ads7">
	
		<?php 
		/* ads function start */
		function adsFn($id){
			$strSLQAds="select * from banner_sum where pic_position='$id' and
			(main_menu_id='home' or main_menu_id='All') and pic_display='Y'";
			$resultAds=mysql_query($strSLQAds);
			return $resultAds;
		}
		/* ads function end */
		$rsAds7=mysql_fetch_array(adsFn("7"));
		//echo "-----------------------------------------------------pic_name7=".$rsAds7['pic_name'];
		
    	if($rsAds7['pic_name']!=""){
    	?>
    	 <img src="control-panel/mypicture/1/<?=$rsAds7['pic_name']?>" width="100%" height="100%" />
    	
    	<?php 
		}else{
    	echo "ตำแหน่งที่ 7";
    	}
    	?>
	</div>
</div>
