<?php session_start();
include("config.inc.php");
$cus_id=$_SESSION['cus_id'];
$rdg_id=$_GET['rdg_id'];

$strSQL1="
select rdg.*,rf_name,rt_name,rps_name,p.PROVINCE_NAME,d.DISTRICT_NAME,a.AMPHUR_NAME from realty_data_general rdg
LEFT JOIN realty_for rf
ON rf.rf_id=rdg.rf_id
LEFT JOIN realty_type rt
ON rt.rt_id=rdg.rt_id
LEFT JOIN realty_project_status rps
ON rps.rps_id=rdg.rps_id
LEFT JOIN province p
ON p.PROVINCE_ID=rdg.rdg_address_province_id
LEFT JOIN district d
on d.DISTRICT_ID=rdg_address_district_id
LEFT JOIN amphur a
on a.AMPHUR_ID=rdg_address_sub_district_id
where rdg_id='$rdg_id'
";
$result1=mysql_query($strSQL1);
$rs1=mysql_fetch_array($result1);


$strSQL2="
select * from realty_detail_room
WHERE rdg_id='$rdg_id'
";
$result2=mysql_query($strSQL2);
$rs2=mysql_fetch_array($result2);



$strSQL3="
select rd.*,rdf_detail,rdc_detail,rdi_detail,rdnp_detail from realty_detail rd
LEFT JOIN realty_detail_facility rdf
ON rdf.rdf_id=rd.rdf_id
LEFT JOIN realty_detail_characteristic rdc
on rdc.rdc_id=rd.rdc_id
LEFT JOIN realty_detail_interior rdi
on rdi.rdi_id=rd.rdi_id
LEFT JOIN realty_detail_near_place rdnp
on rdnp.rdnp_id=rd.rdnp_id
where rdg_id='$rdg_id'
";
$result3=mysql_query($strSQL3);
$result4=mysql_query($strSQL3);
$result5=mysql_query($strSQL3);
$result6=mysql_query($strSQL3);


?>
<script src="Controller/cPost_sub_detail.js"></script>
<link rel="stylesheet" href="css/post_sub_detail.css">
<script>
$(document).ready(function(){
	callMapSummary(<?=$rs1['rdg_id']?>);
});
</script>  

<!--Blog Post0-->      

		<div class="blog margin-bottom-5">
		 <div class="row">
								<div class="panel  panel-red" style="margin-bottom: 5px;">
									<div class="panel-heading">
										<h3 class="panel-title"><i class="fa fa-tasks"></i> รายละเอียดอสังหาริมทรัพย์</h3>
									</div>
									<div class="panel-body">
										
											<div class="row">

											 <form class="sky-form" id="sky-form4" action="#" novalidate="novalidate">
									<header>
										<div class="headline headline-md">
											<h2>ค้นหาประกาศขายอสังหาริมทรัพย์</h2>
										</div>
										<button type="button" class="btn-u btn-mainmenu ">ขายดาวน์</button>
										<button type="button" class="btn-u btn-mainmenu">ขายขาด</button>
										
									
									</header>


									<fieldset> 
										<div class="row">

											<div class="magazine-posts col-md-12 col-sm-6 margin-bottom-2">
											<div class="shadow-wrapper">
												<blockquote class="hero box-shadow shadow-effect-2">
													<div class="col-md-4 col-padding-2">
														 <section>
																<label class="select">
																	<select name="gender">
																	
																		<option value="0" selected="" disabled=""> ราคาขายเริ่มต้น </option>
																		<option value="1">100,000</option>
																		<option value="1">200,000 </option>
																		<option value="1"> 300,000 </option>
																		<option value="1"> 400,000 </option>
																		
																	</select>
																	<i></i>
																</label>
															</section>
													</div>

													<div class="col-md-4 col-padding-2">
														 <section>
																<label class="select">
																	<select name="gender">
																	
																		<option value="0" selected="" disabled=""> ราคาขายสูงสุด</option>
																		<option value="1">100,000</option>
																		<option value="1">200,000 </option>
																		<option value="1"> 300,000 </option>
																		<option value="1"> 400,000 </option>
																		
																	</select>
																	<i></i>
																</label>
															</section>
													</div>

													<div class="col-md-4 col-padding-2">
														 <section>
																<label class="select">
																	<select class="AreaSelect" tabindex="2" name="Area">
																		<option value="">ขนาดพื้นที่</option>
																		<option value="1-10">1-10</option>
																		<option value="11-20">11-20</option>
																		<option value="21-30">21-40</option>
																		<option value="31-40">31-40 </option>
																		<option value="41-50">41-50</option>
																		<option value="51-60">51-60</option>
																		<option value="61-70">61-70</option>
																		<option value="71-80">71-80</option>
																		<option value="81-90">81-90</option>
																		<option value="91-100">91-100</option>
																		<option value="101-150">101-150</option>
																		<option value="151-200">151-200</option>
																		<option value="201-300">201-300</option>
																		<option value="301-400">301-400</option>
																		<option value="401">401 ขึ้นไป</option>
																		</select>
																	<i></i>
																</label>
															</section>
													</div>

													<div class="col-md-4 col-padding-2">
														 <section>
																<label class="select">
																	<select class="UnitSelect" tabindex="3" name="Unit">
																		<option value="">หน่วย</option>
																		<option value="1">ตร.ม</option>
																		<option value="2">ตร.ว</option>
																		<option value="3">ไร่</option>
																		</select>
																	<i></i>
																</label>
															</section>
													</div>


												<div class="col-md-4 col-padding-2">
														 <section>
																<label class="select">
																	<select class="Room1Select" tabindex="4" name="Room1">
																		<option value="">ห้องนอน</option>
																		<option value="100">สตูดิโอ</option>
																		<option value="1">1</option>
																		<option value="2">2</option>
																		<option value="3">3</option>
																		<option value="4">4</option>
																		<option value="5">5</option>
																		<option value="6">6</option>
																		<option value="7">7</option>
																		<option value="8">8</option>
																		<option value="9">9</option>
																		<option value="10">10</option>
																		<option value="11">11</option>
																		<option value="12">12</option>
																		<option value="13">13</option>
																		<option value="14">14</option>
																		<option value="15">15</option>
																		<option value="16">16</option>
																		<option value="17">17</option>
																		<option value="18">18</option>
																		<option value="19">19</option>
																		<option value="20">20</option>
																	</select>
																	<i></i>
																</label>
															</section>
													</div>
													<br style="clear:both">
												</blockquote>
											</div>
											</div>
											 
										</div>
										<div class="row">
													
													<div class="col-md-12 col-padding-2">
													<label class="input">
														<input type="text" placeholder="ค้นหา" name="firstname">
													</label>
													</div>
										</div>
									</fieldset> 
									

									<fieldset>  
  
										<div class="row">


													

													

													


													<div class="col-md-4 col-padding-2">
														 <section>
																<label class="select">
																	<select name="gender">
																	
																		<option value="0" selected="" disabled="">เลือกจังหวัด </option>
																		<option value="1">กรุงเทพ</option>
																		<option value="1">นครนายก </option>
																		<option value="1"> ปราจีนบุรี </option>
																		<option value="1"> สระแก้ว </option>
																		<option value="1"> ฉะเชิงเทรา </option>
																		<option value="1"> ชลบุรี </option>
																		<option value="1"> ระยอง </option>
																		<option value="1"> จันทบุรี </option>
																		<option value="1"> ตราด </option>
																	</select>
																	<i></i>
																</label>
															</section>
													</div>
													<div class="col-md-4 col-padding-2">
														 <section>
																<label class="select">
																	<select name="gender">
																		<option disabled="" selected="" value="0">เลือกเขต/อำเภอ</option>
																		<option value="1">เขตพระนคร </option>
																		<option value="1">เขตดุสิต </option>
																		<option value="1">เขตหนองจอก </option>
																		<option value="1">เขตบางรัก </option>
																		<option value="1"> เขตบางเขน </option>
																		<option value="1">เขตบางกะปิ </option>
																		<option value="1">เขตปทุมวัน </option>
																		<option value="1">เขตป้อมปราบศัตรูพ่าย </option>
																		<option value="1"> เขตพระโขนง </option>
																		<option value="1">เขตมีนบุรี </option>
																		<option value="1"> เขตลาดกระบัง </option>
																		<option value="1"> เขตยานนาวา </option>
																		<option value="1"> เขตสัมพันธวงศ์ </option>
																		<option value="1"> เขตพญาไท </option>
																		<option value="1"> เขตธนบุรี </option>
																		<option value="1">เขตบางกอกใหญ่ </option>
																		<option value="1"> เขตห้วยขวาง </option>
																		<option value="1"> เขตคลองสาน </option>
																		<option value="1"> เขตตลิ่งชัน </option>
																		<option value="1"> เขตบางกอกน้อย </option>
																		<option value="1"> เขตบางขุนเทียน </option>
																		<option value="1"> เขตภาษีเจริญ </option>
																		<option value="1"> เขตหนองแขม</option>
																		<option value="1"> เขตราษฎร์บูรณะ </option>
																	</select>
																	<i></i>
																</label>
															</section>
													</div>
													<div class="col-md-4 col-padding-2">
														 <section>
																<label class="select">
																	<select name="gender">
																		<option disabled="" selected="" value="0">เลือกตำบล</option>
																		<option value="1">เมืองจันทบุร</option>
ี
																			<option value="1">แก่งหางแมว</option>
																			<option value="1">ขลุง</option>
																			<option value="1">ท่าใหม</option>
																			<option value="1"> นายายอาม</option>
																			<option value="1"> โป่งน้ำร้อน </option>
																			<option value="1">มะขาม</option>
																			<option value="1"> สอยดาว</option>
																			<option value="1"> แหลมสิงห</option>
																			<option value="1"> เขาคิชฌกูฏ </option>
																			<option value="1"> เมืองฉะเชิงเทรา</option>
																			<option value="1"> บางคล้า </option>
																			<option value="1"> บางน้ำเปรี้ยว </option>
																			<option value="1"> บางปะกง </option>
																			<option value="1"> บ้านโพธิ์ </option>
																			<option value="1"> แปลงยาว </option>
																			<option value="1"> พนมสารคาม </option>

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
																	<select class="Room1Select" tabindex="4" name="Room1">
																		<option value="">ซอย</option>
																		<option value="1">1</option>
																		<option value="2">2</option>
																		<option value="3">3</option>
																		<option value="4">4</option>
																		<option value="5">5</option>
																		<option value="6">6</option>
																		<option value="7">7</option>
																		<option value="8">8</option>
																		<option value="9">9</option>
																		<option value="10">10</option>
																		<option value="11">11</option>
																		<option value="12">12</option>
																		<option value="13">13</option>
																		<option value="14">14</option>
																		<option value="15">15</option>
																		<option value="16">16</option>
																		<option value="17">17</option>
																		<option value="18">18</option>
																		<option value="19">19</option>
																		<option value="20">20</option>
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
																		<option value="1">หมอชิต	</option>
																		<option value="2">สะพานควาย</option>
																		<option value="3">อารีย์</option>
																		<option value="3">สนามเป้า</option>
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
																		<option value="1">สถานีหัวลำโพง	</option>
																		<option value="2">สถานีสามย่าน</option>
																		<option value="3">สถานีสีลม</option>
																		<option value="3">สถานีลุมพิน</option>
																		<option value="3">สถานีคลองเตย</option>
																		<option value="3">สถานีสุขุมวิที</option>
																		 	
																			
																			 	
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
																		<option value="1">สายสีสม </option>
																		<option value="2">สายสีเขียว </option>
																		<option value="3">สายสีเหลือง</option>
																	</select>
																	<i></i>
																</label>
															</section>
													</div>
										</div>
										
										
										
									</fieldset>
									<footer>
										<button class="btn-u  btn-u-xs btn-u-light-green" type="submit">บันทึกการค้นหา</button>
										<button class="btn-u  btn-u-xs btn-u-dark-blue" type="submit">แจ้งเตือนทางอีเมลล์</button>
										<button class="btn-u btn-u-orange" type="submit ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ค้นหาประกาศ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
									</footer>
								</form>


											</div>
											<!--start ads-->
											<div class="shadow-wrapper">
											
													<!--  
													<p style="height:80px;">
													Ads IMG
													</p>
													-->
													<?php 
													$strSLQBanner6="select * from banner_sum where pic_position='6'";
													$resultBanner6=mysql_query($strSLQBanner6);
													$rsBanner6=mysql_fetch_array($resultBanner6);
													?>
													 <img src="control-panel/mypicture/1/<?=$rsBanner6['pic_name']?>" width="100%" height="100%" />
												
											</div>
											<!--end ads-->


											<div class="row">


											


												<!-- Begin Easy Block -->                
												<div class="col-md-12 col-sm-12">

													

													<div class="easy-block-v2">

													
												


													<div class="alert alert-success fade in ">
														<div class="row">
																<div class="col-md-6">
																	<h3 style="margin:0px;"><?=$rs1['rf_name']?><?=$rs1['rt_name']?></h3>
																</div>
																<div class="col-md-6" style="text-align:right; padding:2px;">
																	<h3 style="margin:0px;">รหัสประกาศเลขที่ <font color="red"><?=$rs1['rdg_id']?></font></h3>
																</div>
														</div>
													</div>


														<!--start content  basic-->
														<div class="row">
																<div class="col-md-8">
																	
																<div class="tag-box tag-box-v1 box-shadow shadow-effect-2" style="margin-bottom:5px;">
																	<h2>ประเภท: <?=$rs1['rf_name']?><?=$rs1['rt_name']?></h2>
																	<p><?=$rs1['rdg_title']?> </p>
																	<p><?=$rs1['rdg_detail']?></p>
																	<p><h3 style="color:red;">ราคา <?=number_format($rs1['rdg_price'])?> บาท</h3></p>
																	<p>พื้นที่ 120 ตารางเมตร</p>
																	<p>ราคา  <?=number_format($rs1['rdg_area_number'])?> ต่อ ตารางเมตร</p>
																	<em>ลงประกาศเมือ: <?=$rs1['rdg_update']?> </em>
																</div>


																
																

																</div>
																<div class="col-md-4">

																	<div class="carousel slide testimonials testimonials-v2 testimonials-bg-default" id="testimonials-9">
																		<div class="">
																			<div class="item active">
																				<p>1,200 ครั้ง</p>
																				<div class="testimonial-info">
																					<span class="testimonial-author">
																						นับจำนวจผู้เข้าชม
																						<em>ประกาศเลขที่ <?=$rs1['rdg_id']?></em>
																					</span>
																				</div>
																			</div>
																			
																		</div>
																	</div>
																</div>


														</div>
														<!--end content  basic-->

														<!-- start button link -->
													<p>
														<button type="button" class="btn-u  btn-u-xs btn-u-green"><i class="fa fa-cloud"></i> แชร์ไปที่เฟสบุ๊ค/กูเกิล</button>
														<button type="button" class="btn-u  btn-u-xs btn-u-green"><i class="fa fa-bell-o"></i>ส่งหน้านี้ให้เพิ่อน</button>
														<button type="button" class="btn-u  btn-u-xs btn-u-green"><i class="fa fa-envelope-o"></i> เก็บหน้านี้ไว้ดูครั้งหน้า</button>
														<button type="button" class="btn-u  btn-u-xs btn-u-green"><i class="fa fa-download"></i>คลิ๊กดูหน้าที่จัดเก็บไว้</button>
														<button type="button" class="btn-u  btn-u-xs btn-u-green"><i class="fa fa-download"></i>ปริ้น</button>
													
													</p>
													<!--end  button link -->
													


													

														<!--<div class="easy-bg-v2 rgba-default">ใหม่</div>-->
														<div  id="gallleryDetailPostArea"></div>
														<?php 
														
														$rdg_id=$rs1['rdg_id'];
														include 'galleryRealty.php';
														
														?>
														<!-- 
														<img src="assets/img/main/img9.jpg" alt="">       
													
														<ul class="list-unstyled" style="margin-top:2px;">
															<button type="button" class="btn-u btn-u-default" style="height:80px; width:100px;">img1</button>
															<button type="button" class="btn-u btn-u-default" style="height:80px;width:100px;">img2</button>
															<button type="button" class="btn-u btn-u-default" style="height:80px; width:100px;">img3</button>
															<button type="button" class="btn-u btn-u-default" style="height:80px; width:100px;">img4</button>
															<button type="button" class="btn-u btn-u-default" style="height:80px;width:100px;">img5</button>
															<button type="button" class="btn-u btn-u-default" style="height:80px; width:100px;">img6</button>
														</ul>   
														 --> 
															
															
															


													</div> 

												</div>


												
												<!-- End Begin Easy Block -->                
															  
											</div>

											<div class="shadow-wrapper">
													<div class="headline"><h4>ข้อมูลทั่วไป </h4></div>
	<!-- -ข้อมูลทั่วไป-->
		<div class="row">
			<label class="col-md-3 control-label titleGroup" > ประกาศสำหรับ:</label>
			<div class="col-md-9"><?=$rs1['rf_name']?></div>
			
		</div>

		<div class="row">
			<label class="col-md-3 control-label titleGroup" > ประเภทอสังหาริมทรัพย์ :</label>
			<div class="col-md-9"><?=$rs1['rt_name']?></div>
		</div>

		<div class="row">
			<label class="col-md-3 control-label titleGroup" > หัวข้อประกาศ :</label>
			<div class="col-md-9"><?=$rs1['rdg_title']?></div>
		</div>

		<div class="row">
			<label class="col-md-3 control-label titleGroup" > รายละเอียดประกาศ :</label>
			<div class="col-md-9"><?=$rs1['rdg_detail']?></div>
		</div>
		
		<?php 
		
	
		if($rs2['rdr_bedroom']!=0){
		?>
		<div class="row">
			<label class="col-md-3 control-label titleGroup" > จำนวนห้องนอน :</label>
			<div class="col-md-9"><?=$rs2['rdr_bedroom']?> ห้อง</div>
		</div>
		<?php }?>
		<?php
		if($rs2['rdr_maid']!=0){
		?>
		<div class="row">
			<label class="col-md-3 control-label titleGroup" > จำนวนห้องแม่บ้าน :</label>
			<div class="col-md-9"><?=$rs2['rdr_maid']?> ห้อง</div>
		</div>
		<?php }
		if($rs2['rdr_toilet']!=0){
		?>
		<div class="row">
			<label class="col-md-3 control-label titleGroup" > จำนวนห้องน้ำ :</label>
			<div class="col-md-9"><?=$rs2['rdr_toilet']?> ห้อง</div>
		</div>
		<?php }
		if($rs2['rdr_studio']!=0){
		?>
		<div class="row">
			<label class="col-md-3 control-label titleGroup" > ห้องสตูดิโอ :</label>
			<div class="col-md-9"><?=$rs2['rdr_studio']?> ห้อง</div>
		</div>
		<?php
		}
		if($rs2['rdr_deluxeRoom']!=0){
		?>
		<div class="row">
			<label class="col-md-3 control-label titleGroup" > ห้องDeluxe :</label>
			<div class="col-md-9"><?=$rs2['rdr_deluxeRoom']?> ห้อง</div>
		</div>
		<?php
		}
		?>
		<?php
		if($rs2['rdr_excutiveRoom']!=0){
		?>
		<div class="row">
			<label class="col-md-3 control-label titleGroup" > ห้องExcutive :</label>
			<div class="col-md-9"><?=$rs2['rdr_excutiveRoom']?> ห้อง</div>
		</div>
		<?php
		}
		?>
		
		<?php
		if($rs2['rdr_masterBedroom']!=0){
		?>
		<div class="row">
			<label class="col-md-3 control-label titleGroup" > ห้องนอนใหญ่ :</label>
			<div class="col-md-9"><?=$rs2['rdr_masterBedroom']?> ห้อง</div>
		</div>
		<?php
		}
		?>
		
		<?php
		if($rs2['rdr_smallBedroom']!=0){
		?>
		<div class="row">
			<label class="col-md-3 control-label titleGroup" > ห้องนอนเล็ก:</label>
			<div class="col-md-9"><?=$rs2['rdr_smallBedroom']?> ห้อง</div>
		</div>
		<?php
		}
		?>
		
		<?php
		if($rs2['rdr_meetingRoom']!=0){
		?>
		<div class="row">
			<label class="col-md-3 control-label titleGroup" > ห้องประชุม :</label>
			<div class="col-md-9"><?=$rs2['rdr_meetingRoom']?> ห้อง</div>
		</div>
		<?php
		}
		?>
		
		<?php
		if($rs2['rdr_livingRoom']!=0){
		?>
		<div class="row">
			<label class="col-md-3 control-label titleGroup" > ห้องนั่งเล่น:</label>
			<div class="col-md-9"><?=$rs2['rdr_livingRoom']?> ห้อง</div>
		</div>
		<?php
		}
		?>
		
		<?php
		if($rs2['rdr_drawingRoom']!=0){
		?>
		<div class="row">
			<label class="col-md-3 control-label titleGroup" > ห้องรับแขก :</label>
			<div class="col-md-9"><?=$rs2['rdr_drawingRoom']?> ห้อง</div>
		</div>
		<?php
		}
		?>
		
		<?php
		if($rs2['rdr_storageRoom']!=0){
		?>
		<div class="row">
			<label class="col-md-3 control-label titleGroup" > ห้องเก็บของ :</label>
			<div class="col-md-9"><?=$rs2['rdr_storageRoom']?> ห้อง</div>
		</div>
		<?php
		}
		?>
		<?php
		if($rs2['rdr_kitchen']!=0){
		?>
		<div class="row">
			<label class="col-md-3 control-label titleGroup" > ห้องครัว :</label>
			<div class="col-md-9"><?=$rs2['rdr_kitchen']?> ห้อง</div>
		</div>
		<?php
		}
		?>
		
		<?php
		if($rs2['rdr_laundryRoom']!=0){
		?>
		<div class="row">
			<label class="col-md-3 control-label titleGroup" > ห้องซักรีด :</label>
			<div class="col-md-9"><?=$rs2['rdr_parking']?> ห้อง</div>
		</div>
		<?php
		}
		?>
		
		<?php
		if($rs2['rdr_parking']!=0){
		?>
		<div class="row">
			<label class="col-md-3 control-label titleGroup" > ที่จอดรถ:</label>
			<div class="col-md-9"><?=$rs2['rdr_parking']?> คัน</div>
		</div>
		<?php
		}

		?>

		<div style="clear:both"></div>
	<!-- -ข้อมูลทั่วไป-->
	<div class="headline"><h4>ข้อมูลราคา </h4></div>
	<!-- -ข้อมูลราคา-->
		<div class="row">
			<label class="col-md-3 control-label titleGroup" > สำหรับ<?=$rs1['rf_name']?> :</label>
			
			<div class="col-md-9"><?=number_format($rs1['rdg_price'])?> บาท</div>
		</div>
	<!-- -ข้อมูลราคา-->
	<div class="headline"><h4>ข้อมูลที่ตั้ง </h4></div>
	<!-- -ข้อมูลที่ตั้ง-->
		<?php 
		if($rs1['rt_id']==1){
		?>
		<div class="row">
				<label class="col-md-3 control-label titleGroup" > ชื่อโครงการ :</label>
				<div class="col-md-9"><?=$rs1['rdg_name_project']?></div>
		</div>
		
		<div class="row">
				<label class="col-md-3 control-label titleGroup" > สถานะโครงการ :</label>
				<div class="col-md-9"><?=$rs1['rps_name']?></div>
		</div>
		
		<div class="row">
				<label class="col-md-3 control-label titleGroup" > เจ้าของโครงการ (ชื่อบริษัทหรือผู้จดทะเบียนกรรมสิทธิ์) :</label>
				<div class="col-md-9"><?=$rs1['rdg_owner_project']?></div>
		</div>
		
		
		<div class="row">
				<label class="col-md-3 control-label titleGroup" > ที่อยู่โครงการ :</label>
				<div class="col-md-9"><?=$rs1['rdg_address_project']?></div>
		</div>
		<?php
		}
		?>
		


		<div class="row">
				<label class="col-md-3 control-label titleGroup" > จังหวัด :</label>
				<div class="col-md-9"><?=$rs1['PROVINCE_NAME']?></div>
		</div>
		<div class="row">
				<label class="col-md-3 control-label titleGroup" > อำเภอ/เขต :</label>
				<div class="col-md-9"><?=$rs1['AMPHUR_NAME']?></div>
		</div>
		<div class="row">
				<label class="col-md-3 control-label titleGroup" > ตำบล/แขวง :</label>
				<div class="col-md-9"><?=$rs1['DISTRICT_NAME']?></div>
		</div>
		<div class="row">
				<label class="col-md-3 control-label titleGroup" > เลขที่ :</label>
				<div class="col-md-9"><?=$rs1['rdg_address_no']?></div>
		</div>
		<div class="row">
				<label class="col-md-3 control-label titleGroup" > ถนน  :</label>
				<div class="col-md-9"><?=$rs1['rdg_address_road']?></div>
		</div>
		<div class="row">
				<label class="col-md-3 control-label titleGroup" > รหัสไปรษณีย์  :</label>
				<div class="col-md-9"><?=$rs1['rdg_post_code']?></div>
		</div>
		

		
		<div class="row">
				<label class="col-md-3 control-label titleGroup" > แผนที่  :</label>
				<div class="col-md-9">
					<div id="map-canvas-summary" class="map-canvas-summary" style='width: 550px;height:400px;' ></div>
					
				</div>
		</div>
	<!-- -ข้อมูลที่ตั้ง-->
	<div class="headline"><h4>ข้อมูลเพิ่มเติม </h4></div>
	<!-- -ข้อมูลเพิ่มเติม-->
	<div class="row">
		<div class="alert alert-warning fade in">
			<label class="col-md-3 control-label titleGroup" > ลักษณะพิเศษ  :</label>
			<div class="col-md-9">
				<ul class="list_realty_detail">
				<?php 
				while($rs3=mysql_fetch_array($result3)){
					
					if($rs3['rdc_id']){
						?>
							<li>
								<?=$rs3['rdc_detail'];?>
							</li>
						<?php 
					}
				};
				?>
				</ul>
			</div>
			<br style="clear:both">
		</div>
	</div>
	    

		  <div class="row">
		  	<div class="alert alert-danger fade in">
				<label class="col-md-3 control-label titleGroup" > รายละเอียดเพิ่มเติมภายใน :</label>
				<div class="col-md-9">
					<ul class="list_realty_detail">
						<?php 
						while($rs4=mysql_fetch_array($result4)){
							
							if($rs4['rdi_id']){
								?>
									<li>
										<?=$rs4['rdi_detail'];?>
									</li>
								<?php 
							}
						};
						?>
					</ul>
				</div>
				<br style="clear:both">
			</div>
		</div>

		 <div class="row">
		 	<div class="alert alert-success fade in">
				<label class="col-md-3 control-label titleGroup" > สิ่งอำนวยความสะดวก  :</label>
				<div class="col-md-9">
					<ul class="list_realty_detail">
						<?php 
						while($rs5=mysql_fetch_array($result5)){
							
							if($rs5['rdf_id']){
								?>
									<li>
										<?=$rs5['rdf_detail'];?>
									</li>
								<?php 
							}
						};
						?>
					</ul>
				</div>
			<br style="clear:both">
			</div>
		</div>

		 <div class="row">
		 	<div class="alert alert-info fade in">
				<label class="col-md-3 control-label titleGroup" > สถานที่ใกล้เคียง  :</label>
				<div class="col-md-9">
					<ul class="list_realty_detail">
						<?php 
						while($rs6=mysql_fetch_array($result6)){
							
							if($rs6['rdnp_id']){
								?>
									<li>
										<?=$rs6['rdnp_detail'];?>
									</li>
								<?php 
							}
						};
						?>
					</ul>
				</div>
				<br style="clear:both">
			</div>
		</div>
	<!-- -ข้อมูลเพิ่มเติม-->
	</div>
													
														

												<!-- start main box3 -->
														<div class="tag-box tag-box-v1 box-shadow shadow-effect-2">
															<h2>รวมสินเชื่อธนาคาร</h2>
															<p>
															<ul class="list-unstyled">
																<li><i class="fa fa-check color-green"></i> กรุงศรีอยุธยา</li>
																<li><i class="fa fa-check color-green"></i> ไทยพาณิชย์</li>
																<li><i class="fa fa-check color-green"></i> อาคารสงเคราะห์</li>
																<li><i class="fa fa-check color-green"></i> แสตนด์ดาดชาเตอร์</li>
																<li><i class="fa fa-check color-green"></i> ทหารไทย</li>
																<li><i class="fa fa-check color-green"></i> กรุงไทย</li>
																<li><i class="fa fa-check color-green"></i> กสิกรไทย</li>
																<li><i class="fa fa-check color-green"></i> ธนชาติยูโอบี</li>
																<li><i class="fa fa-check color-green"></i> ออมสิน</li>
																<li><i class="fa fa-check color-green"></i> กรุงเทพ</li>
																<li><i class="fa fa-check color-green"></i> สินเชื่อที่อยู่อาศัยสำหรับเชาวต่างประเทศ</li>
															
															</ul>
															</p>
														</div>
												<!-- end main box3 -->

												<!-- start main box4 -->
														<div class="tag-box tag-box-v1 box-shadow shadow-effect-2">
															<h2>ฝากขอความไว้กับประกาศรายนี้</h2>
															<p>
															<form class="sky-form" action="#">
																<fieldset>                  
																			
																			<section>
																				<label class="label">พิมพ์ข้อความ</label>
																				<label class="textarea textarea-resizable">
																					<textarea rows="3"></textarea>
																				</label>
																			</section>
																			
																			<section>
																				<label class="label">ชื่อ</label>
																				<label class="input">
																					<input type="text">
																				</label>
																			</section>
																			<section>
																				<label class="label">อีเมลล์</label>
																				<label class="input">
																					<input type="text">
																				</label>
																			</section>
																</fieldset>
																<footer>
																<button class="btn-u" type="submit">คลิ๊กเพื่อฝากข้อความ</button>
																
																</footer>
																</form>
															</p>
														</div>
												<!-- end main box4 -->
												<!-- start main box5 -->
														<div class="tag-box tag-box-v1 box-shadow shadow-effect-2">
															<h2>ติดต่อเจ้าของไปทางประกาศ</h2>
															<p>
															<form class="sky-form" action="#">
																<fieldset>                  
																			
																			<section>
																				<label class="label">พิมพ์ข้อความ</label>
																				<label class="textarea textarea-resizable">
																					<textarea rows="3"></textarea>
																				</label>
																			</section>
																			
																			<section>
																				<label class="label">ชื่อ</label>
																				<label class="input">
																					<input type="text">
																				</label>
																			</section>
																			<section>
																				<label class="label">เบอร์โทร</label>
																				<label class="input">
																					<input type="text">
																				</label>
																			</section>
																			<section>
																				<label class="label">อีเมลล์</label>
																				<label class="input">
																					<input type="text">
																				</label>
																			</section>
																</fieldset>
																<footer>
																<button class="btn-u" type="submit">คลิ๊กเพื่อส่งอีเมลล์</button>
																
																</footer>
																</form>
															</p>
														</div>
												<!-- end main box5 -->

							  </div>
				</div>
		   </div>
</div>
<!--End Blog Post0-->      

