<?php 
if($conn){
	$sqlSQLCN="select * from realty_type where rt_contructor_yet='N'";
	$resultCN=mysql_query($sqlSQLCN);

	$sqlSQLCY="select * from realty_type where rt_contructor_yet='Y'";
	$resultCY=mysql_query($sqlSQLCY);
	
	include'query_public_transport.php';
}

?>
<script src="Controller/cSearchForRentRealty.js"></script>
<form id="formSearchForRent" class="sky-form" id="sky-form4" action="#" novalidate="novalidate">
									<header class=''>
										<div class="headline headline-xs">
										<div class='row headerTitleSearch'>
											<div class='col-xs-6'>
											<h2><i class="fa fa-search-plus"></i> เมนูค้นหาประกาศ<span style="color:red;font-size:25px;">เช่า</span></h2>
											</div>
											
											<div class='col-xs-6'>
											<input type='hidden' id='cus_id' name='cus_id' value="<?=$_SESSION['ses_cus_id']?>">
											<button class="btn-u  btn-u-xs btn-u-light-green " id='btnSaveSearchRent'><i class=" fa fa-folder-open "></i> บันทึกการค้นหา</button>
											<button class="btn-u  btn-u-xs btn-u-dark-blue" id='infoToEmailRent'><i class="fa fa-envelope-o"></i> แจ้งเตือนทางอีเมลล์</button>
											</div>	
										</div>
										
										</div>
										
										<?php
											 /*
											while($rsCN=mysql_fetch_array($resultCN)){
												?>
												<button type="button"  id="<?=$rsCN['rt_id']?>" class="btn-u btn-mainmenu mainMenuPostRent">เช่า<?=$rsCN['rt_name']?></button>
												<?php
											}
											*/
											
										?>
										<button type="button"  id="1" class="btn-u btn-mainmenu mainMenuPostRent">บ้าน</button>
										<button type="button"  id="2" class="btn-u btn-mainmenu mainMenuPostRent">คอนโดมิเนียม</button>
										<button type="button"  id="4" class="btn-u btn-mainmenu mainMenuPostRent">ทาว์นเฮ้าส์&ทาว์นโฮม</button>
										<button type="button"  id="3" class="btn-u btn-mainmenu mainMenuPostRent">ที่ดิน</button>
										<button type="button"  id="10" class="btn-u btn-mainmenu mainMenuPostRent">โครงการใหม่</button>
										
										<button type="button"  id="5" class="btn-u btn-mainmenu mainMenuPostRent">อาคารพาณิชย์</button>
										<button type="button"  id="7" class="btn-u btn-mainmenu mainMenuPostRent">อาคารสำนักงาน</button>
										<button type="button"  id="8" class="btn-u btn-mainmenu mainMenuPostRent">โรงงาน&โกดัง </button>
										<button type="button"  id="9" class="btn-u btn-mainmenu mainMenuPostRent">หอพัก</button>
										<button type="button"  id="6" class="btn-u btn-mainmenu mainMenuPostRent">อพาร์ตเมนต์</button>
										
										
										
										
										<button type="button"  id="11" class="btn-u btn-mainmenu mainMenuPostRent">โรงแรม</button>
										<button type="button"  id="12" class="btn-u btn-mainmenu mainMenuPostRent">เกสต์เฮ้าส์</button>
										<button type="button"  id="13" class="btn-u btn-mainmenu mainMenuPostRent">รีสอร์ท&โฮมเสตย์ </button>
										<button type="button"  id="14" class="btn-u btn-mainmenu mainMenuPostRent">อสังหาริมทรัพย์อื่นๆ</button>
										
										
										<div class="headline headline-xs">
											<!-- <h2>สำหรับผู้หรับเหมา</h2> -->
										</div>
										<!--
										<?php 
										
										while($rsCY=mysql_fetch_array($resultCY)){
											if($rsCY['rt_id']=="36" ||$rsCY['rt_id']=="33" ){
											?>
											<button type="button" id="<?=$rsCY['rt_id']?>" class="btn-u btn-mainmenu-contractor btn-u-dark-blue mainMenuPostRent"><?=$rsCY['rt_name']?></button>
											<?php
											}else{
											?>
											<button type="button" id="<?=$rsCY['rt_id']?>" class="btn-u btn-mainmenu-contractor btn-u-dark-blue mainMenuPostRent">เช่า<?=$rsCY['rt_name']?></button>
											<?php
											}
										}
										?>
										-->
										<button type="button" id="18" class="btn-u mainMenuPostRent btn-mainmenu-contractor ">ผู้รับเหมา</button>
										<button type="button" id="16" class="btn-u mainMenuPostRent btn-mainmenu-contractor ">วัสดุก่อสร้าง</button>
										<button type="button" id="17" class="btn-u mainMenuPostRent btn-mainmenu-contractor ">เฟอร์นิเจอร์</button>
										<button type="button" id="19" class="btn-u mainMenuPostRent btn-mainmenu-contractor ">เครื่องมือเครื่องจักร</button>
										<div class="col-xs-6 col-padding-2">
											 <section>
												     <input type="text" name="rdg_id" class="form-control" placeholder="กรอกเลขที่ประกาศ">
											 </section>
										</div>
										<!-- 
										<button type="button" id="18" class="btn-u btn-mainmenu-contractor btn-u-dark-blue mainMenuPostRent">สำหรับผู้รับเหมาก่อสร้าง</button>
										<button type="button" id="19" class="btn-u btn-mainmenu-contractor btn-u-dark-blue mainMenuPostRent">ขายเครื่องมือ&เครื่องจักรสำหรับก่อสรัาง</button>
										-->
										<br style='clear: both'>
									</header>




									
									

									<fieldset>  
  
										<div class="row">
													<div class="col-xs-4 col-padding-2">
														 <section>
																<label class="select" id="provinceArea_rent" >
																	<i></i>
																</label>
															</section>
													</div>
													<div class="col-xs-4 col-padding-2">
														 <section>
														 
																<label class="select" id="districtArea_rent">
																				<select name="rdg_address_district_id" id="rdg_address_district_id">
																					<option selected="" value="All">-- เลือกอำเภอ/เขต --</option>

																				</select>
																
																	<i></i>
																</label>
																
															</section>
													</div>
													<div class="col-xs-4 col-padding-2">
														 <section>
																<label class="select">
																
																	<label class="select" id="subDistrictArea_rent">
																		<select name="rdg_address_sub_district_id" id="rdg_address_sub_district_id">
																			<option  selected="" value="All">-- เลือกตำบล/แขวง --</option>
																		</select>
																		<i></i>
																	</label>
																	
																	<i></i>
																</label>
															</section>
													</div>

													

													<div class="col-xs-4 col-padding-2">
														 <section>
																<label class="select">
																	<select name="rdg_address_road" id="rdg_address_road">
																			<option  selected="" value="All">เลือกถนน</option>
																			<?php 
																			while($rsRoadNo=mysql_fetch_array($resultRoadNo)){
																				?>
																				<option value="<?=$rsRoadNo['rdg_address_road']?>"><?=$rsRoadNo['rdg_address_road']?></option>
																				<?php
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
																		<select name="rdg_line_rent_bts" id=rdg_line_rent_bts>
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
																<label class="select" id='AreaBTSStationRent'>
																	<select name="rdg_bts">
																		<option  selected="" value="All">เลือกใกล้รถไฟฟ้าบีทีเอส</option>
																		
																		<option value="" disabled>--- รถไฟฟ้าบีทีเอสสายสีแดง ----</option>
																		<?php 
																		
																		while($rsBTSRED=mysql_fetch_array($resultBTSRED)){
																			?>
																			<option value="<?=$rsBTSRED['pt_id']?>"><?=$rsBTSRED['pt_detail']?></option>
																			<?php
																		}
																		?>
																		<option value="" disabled>--- รถไฟฟ้าบีทีเอสสายสีแดงอ่อน ----</option>
																		<?php 
																		
																		while($rsBTSREDLIGHT=mysql_fetch_array($resultBTSREDLIGHT)){
																			?>
																			<option value="<?=$rsBTSREDLIGHT['pt_id']?>"><?=$rsBTSREDLIGHT['pt_detail']?></option>
																			<?php
																		}
																		?>
																		<option value="" disabled>--- รถไฟฟ้าบีทีเอสสายสีเขียว ----</option>
																		<?php 
																		
																		while($rsBTSGREEN=mysql_fetch_array($resultBTSGREEN)){
																			?>
																			<option value="<?=$rsBTSGREEN['pt_id']?>"><?=$rsBTSGREEN['pt_detail']?></option>
																			<?php
																		}
																		?>
																		
																		<option value="" disabled>--- รถไฟฟ้าบีทีเอสสายสีเขียวอ่อน ----</option>
																		<?php 
																		
																		while($rsBTSGREENLIGHT=mysql_fetch_array($resultBTSGREENLIGHT)){
																			?>
																			<option value="<?=$rsBTSGREENLIGHT['pt_id']?>"><?=$rsBTSGREENLIGHT['pt_detail']?></option>
																			<?php
																		}
																		?>
																		
																		
																		<option value="" disabled>--- รถไฟฟ้าบีทีเอสสายสีน้ำเงิน ----</option>
																		<?php 
																		
																		while($rsBTSBLUE=mysql_fetch_array($resultBTSBLUE)){
																			?>
																			<option value="<?=$rsBTSBLUE['pt_id']?>"><?=$rsBTSBLUE['pt_detail']?></option>
																			<?php
																		}
																		?>
																		
																		
																		<option value="" disabled>--- รถไฟฟ้าบีทีเอสสายสีม่วง ----</option>
																		<?php 
																		
																		while($rsBTSPURPLE=mysql_fetch_array($resultBTSPURPLE)){
																			?>
																			<option value="<?=$rsBTSPURPLE['pt_id']?>"><?=$rsBTSPURPLE['pt_detail']?></option>
																			<?php
																		}
																		?>
																		
																		
																		<option value="" disabled>--- รถไฟฟ้าบีทีเอสสายสีส้ม ----</option>
																		<?php 
																		
																		while($rsBTSORANGE=mysql_fetch_array($resultBTSORANGE)){
																			?>
																			<option value="<?=$rsBTSORANGE['pt_id']?>"><?=$rsBTSORANGE['pt_detail']?></option>
																			<?php
																		}
																		?>
																		
																		
																		<option value="" disabled>--- รถไฟฟ้าบีทีเอสสายสีชมพู่----</option>
																		<?php 
																		
																		while($rsBTSPINK=mysql_fetch_array($resultBTSPINK)){
																			?>
																			<option value="<?=$rsBTSPINK['pt_id']?>"><?=$rsBTSPINK['pt_detail']?></option>
																			<?php
																		}
																		?>
																		
																		
																		<option value="" disabled>--- รถไฟฟ้าบีทีเอสสายสีเหลือง ----</option>
																		<?php 
																		
																		while($rsBTSYELLOW=mysql_fetch_array($resultBTSYELLOW)){
																			?>
																			<option value="<?=$rsBTSYELLOW['pt_id']?>"><?=$rsBTSYELLOW['pt_detail']?></option>
																			<?php
																		}
																		?>
																		
																		
																		<option value="" disabled>--- รถไฟฟ้าบีทีเอสสายสีเทา ----</option>
																		<?php 
																		
																		while($rsBTSGREY=mysql_fetch_array($resultBTSGREY)){
																			?>
																			<option value="<?=$rsBTSGREY['pt_id']?>"><?=$rsBTSGREY['pt_detail']?></option>
																			<?php
																		}
																		?>
																		
																		
																		<option value="" disabled>--- รถไฟฟ้าบีทีเอสสายสีฟ้า----</option>
																		<?php 
																		
																		while($rsBTSBLUE2=mysql_fetch_array($resultBTSBLUE2)){
																			?>
																			<option value="<?=$rsBTSBLUE2['pt_id']?>"><?=$rsBTSBLUE2['pt_detail']?></option>
																			<?php
																		}
																		?>
																		
																		
																		<option value="" disabled>--- รถไฟฟ้าบีทีเอสสายสีน้ำตาล ----</option>
																		<?php 
																		
																		while($rsBTSBROWN=mysql_fetch_array($resultBTSBROWN)){
																			?>
																			<option value="<?=$rsBTSBROWN['pt_id']?>"><?=$rsBTSBROWN['pt_detail']?></option>
																			<?php
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
																	<select name="rdg_mrt">
																		<option selected="" value="All">เลือกใกล้รถไฟฟ้าใต้ดิน</option>
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

													<div class="col-xs-4 col-padding-2">
														 <section>
																<label class="select">
																	<select name=rdg_bus>
																		<option  selected="" value="All">ใกล้สายรถเมย์ ก.ท.ม.</option>
																		<?php 
																		while($rsBusNo=mysql_fetch_array($resultBusNo)){
																			?>
																			<option value="<?=$rsBusNo['rdg_bus']?>">สายเมล์ <?=$rsBusNo['rdg_bus']?></option>
																			<?php
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
																	<select name="rdg_harbor">
																		<option  selected="" value="All">ใกล้ท่าเรือแม่น้ำเจ้าพระยา</option>
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
													<!-- 
													<div class="col-xs-4 col-padding-2">
														 <section>
															     <input type="text" name="rdg_id" class="form-control" placeholder="กรอกเลขที่ประกาศ">
														 </section>
													</div>
													 -->
										</div>
										
										
										
									</fieldset>
									
									<fieldset >	
										<div class='col-xs-12 '>
												<div id="parameterEmbedAreaRent"></div>
												<input type="hidden" name="search_type" value='2' >
												<input type="hidden" name="rdg_rf" value="2">
												<button id='searchRealtyForRent' class="btn-u  btn-u-orange btn-search1"  type="submit ">
													 <i class="fa fa-search-plus"></i> ค้นหา
												</button>
										</div>	
										
									</fieldset>
									
									
									</form>
									<form id='fromSearchQuickRent'  class="sky-form" id="sky-form4">
										<fieldset> 
											<div class="row">
														
														<div class="col-xs-12 col-padding-2">
														<!--
														<label class="input">
															<input type="text" placeholder="ค้นหา" name="firstname">
														</label>
														-->
														<div class="input-group">
						                                    <input type="text" class="form-control" placeholder="ใส่ข้อมูล">
						                                     <input type="hidden" name="paramAction" value="searchQuick">
						                                      <input type="hidden" name="rdg_rf" value="2">
						                                     
						                                    <span class="input-group-btn">
						                                 		
						                                        <button type="submit" class="btn btn-u muk_btn-u-submit"><i class="fa fa-search-plus"></i> คลิ๊กค้นหาทางลัด</button>
						                                    </span>
						                                </div>
											</div>
										</fieldset> 
									</form>