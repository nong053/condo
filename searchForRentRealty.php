<?php 
if($conn){
	$sqlSQLCN="select * from realty_type where rt_contructor_yet='N'";
	$resultCN=mysql_query($sqlSQLCN);

	$sqlSQLCY="select * from realty_type where rt_contructor_yet='Y'";
	$resultCY=mysql_query($sqlSQLCY);

}
?>
<form class="sky-form" id="sky-form4" action="#" novalidate="novalidate">
									<header>
										<div class="headline headline-md">
											<h2><i class="fa fa-search-plus"></i> เมนูค้นหาประกาศเช่าฟรี</h2>
										</div>
										<?php 
										while($rsCN=mysql_fetch_array($resultCN)){
											?>
											<button type="button"  id="<?=$rsCN['rt_id']?>" class="btn-u btn-mainmenu ">เช่า<?=$rsCN['rt_name']?></button>
											<?php
										}
										?>
										<!-- 
										<button type="button" class="btn-u btn-mainmenu ">เช่าบ้าน</button>
										<button type="button" class="btn-u btn-mainmenu">เช่าคอนโดมิเนียม</button>
										<button type="button" class="btn-u btn-mainmenu ">เช่าทาว์นเฮาส์ </button>
										<button type="button" class="btn-u btn-mainmenu "> เช่าทาว์นโฮม</button>
										<button type="button" class="btn-u btn-mainmenu">เช่าที่ดิน</button>
										<button type="button" class="btn-u btn-mainmenu ">เช่าโรงแรม </button>
										<button type="button" class="btn-u btn-mainmenu">เช่ารีสอร์ท </button>
										<button type="button" class="btn-u btn-mainmenu">เช่าหอพัก </button>
										<button type="button" class="btn-u btn-mainmenu">เช่าอาคารพาณิชย์ </button>
										<button type="button" class="btn-u btn-mainmenu ">เช่าโรงงาน </button>
										<button type="button" class="btn-u btn-mainmenu ">เช่าอพาร์ทเมนท์ </button>
										<button type="button" class="btn-u btn-mainmenu">เช่าอาคารสำนักงาน </button>
										<button type="button" class="btn-u btn-mainmenu">เช่าเกสเฮ้าส์ </button>
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
											<button type="button" id="<?=$rsCY['rt_id']?>" class="btn-u btn-mainmenu-contractor btn-u-dark-blue">เช่า<?=$rsCY['rt_name']?></button>
											<?php
											}
										}
										?>
										
										<!-- 
										<button type="button" class="btn-u btn-mainmenu-contractor btn-u-dark-blue">เช่าเครื่องมือก่อสร้าง</button>
										<button type="button" class="btn-u btn-mainmenu-contractor btn-u-dark-blue">เช่าเฟอร์นิเจอร์ </button>
										<button type="button" class="btn-u btn-mainmenu-contractor btn-u-dark-blue "> ผู้รับเหมาก่อสร้างทั่วไป</button>
										<button type="button" class="btn-u btn-mainmenu-contractor btn-u-dark-blue">ผู้รับเหมาตกแต่ง</button>
										<button type="button" class="btn-u btn-mainmenu-contractor  btn-u-dark-blue">ผู้รับเหมาฐานราก </button>
										 -->

									</header>




									
									

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
													
													<div class="col-md-4 col-padding-2">
														 <section>
															    <input type="text" class="form-control" placeholder="กรอกเลขที่ประกาศ">
														 </section>
													</div>
										</div>
										
										
										
									</fieldset>
									<footer>
									
											<button class="btn-u  btn-u-orange btn-search1"  type="submit ">
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
									</fieldset> 
								</form>