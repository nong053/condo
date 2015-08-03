 <!-- Tabs -->

 <div class="tag-box tag-box-v2 box-shadow shadow-effect-2">
	


			
                <div class="tab-v1">
                    <ul class="nav nav-tabs">
                       
                        <li ><a href="#currentPost" data-toggle="tab">ประกาศปัจจุบัน</a></li>
                        <li><a href="#nonePost" data-toggle="tab">ประกาศที่ไม่แสดง</a></li>
						<li><a href="#expirePost" data-toggle="tab">ประกาศหมดอายุ</a></li>
						<li class="active"><a href="#newPost" data-toggle="tab">ลงประกาศใหม่</a></li>
					
                    </ul>                
                    <div class="tab-content">
                        <!-- newPost-->
                        <div class="tab-pane fade in active " id="newPost">
                             	  
								<!-- Tabs -->

								


								<div class="tab-v1">
									<ul class="nav nav-tabs">
										<li class="active"><a href="#mainData" data-toggle="tab">ข้อมูลทั่วไป</a></li>
										<li><a href="#detailData" data-toggle="tab">รายละเอียดเพิ่มเติม</a></li>
										<li><a href="#imageVideo" data-toggle="tab">รูปภาพ/วีดีโอ</a></li>
										<li><a href="#summary" data-toggle="tab">สรุป</a></li>
									
									</ul>                
									<div class="tab-content">
										<!-- mainData  -->
										<div class="tab-pane fade in active" id="mainData">
													 <!-- start content mainData-->




													 <form role="form" class="form-horizontal" action="#">
														<div class="headline"><h4>ข้อมูลอสังหาริมทรัพย์</h4></div>
														<div class="form-group">
															
																<label class="col-lg-3 control-label" for="inputEmail1"> ประกาศสำหรับ</label>

																<div class=" col-lg-1">
																	<div class="checkbox">
																		<label>
																			<input type="radio" name="realtyType"> ขาย 
																		</label>
																	</div>
																</div>
																<div class=" col-lg-1">
																	<div class="checkbox">
																		<label>
																			<input type="radio" name="realtyType"> เช่า 
																		</label>
																	</div>
																</div>
																<div class=" col-lg-2" style="width:auto">
																	<div class="checkbox">
																		<label>
																			<input type="radio" name="realtyType"> ขายดาวน์
																		</label>
																	</div>
																</div>
																<div class=" col-lg-2" style="width:auto">
																	<div class="checkbox">
																		<label>
																			<input type="radio" name="realtyType"> ขายและเช่า
																		</label>
																	</div>
																</div>
																<div class=" col-lg-2" style="width:auto">
																	<div class="checkbox">
																		<label>
																			<input type="radio" name="realtyType"> ขายขาด 
																		</label>
																	</div>
																</div>

															</div>
															

															<!--start form-group-->
															 <div class="form-group">
																<label class="col-lg-3 control-label" for="realtyType">  ประเภทอสังหาริมทรัพย์</label>
																<div class=" col-lg-5">
																	
																	<label class="select">
																		<select name="realtyType" id="realtyType">
																			<option disabled=""  value="0">---- รายการอสังหาริมทรัพย์ ----</option>
																				<option value="realty1">โครงการใหม่</option> 
																				<option selected="selected"  value="realty2">บ้าน</option> 
																				<option value="realty3">คอนโดมิเนียม	</option>
																				<option value="realty4">ทาว์นเฮ้าส์/ทาว์นโฮม	</option>
																				<option value="realty5">เกส์ตเฮ้าส์ </option>
																				<option value="realty6">โฮมออฟฟิศ </option>
																				<option value="realty7">โรงงาน/โกดัง</option>
																				<option value="realty8">ที่ดิน</option> 
																				<option value="realty9">อพาร์ทเม้นท์</option> 
																				<option value="realty10">เชิงพาณิชย์</option> 
																				<option value="realty11">หอพัก </option> 
																				<option value="realty12">โรงแรม </option> 
																				<option value="realty13">รีสอร์ท </option> 
																				<option value="realty14">อาคารสํานักงาน </option> 
																				<option value="realty15">อสังหาริมทรัพย์อื่นๆ </option> 
																				<option value="">---- รายการผู้รับเหมา  ----</option> 
																				<option value="contractor1">ผู้รับเหมาฐานราก </option> 
																				<option value="contractor2">ผู้รับเหมาตกแต่ง </option> 
																				<option value="contractor3">อพาร์ทเม้นท์</option> 
																				<option value="contractor4">รายการรับเหมาอื่นๆ </option> 
																				
																		</select>

																		<i></i>
																	</label>
																
																</div>
															</div>

															<!--end form-group-->


															

															<div class="form-group">
																<label class="col-lg-3 control-label" for="inputTitlePost"> หัวข้อประกาศ </label>
																<div class="col-lg-9">
																	<input type="text" placeholder="หัวข้อประกาศ" id="inputTitlePost" class="form-control">
																</div>
															</div>

															<div class="form-group">
																<label class="col-lg-3 control-label" for="inputDetailPost"> รายละเอียดประกาศ </label>
																<div class="col-lg-9">
																	<textarea placeholder="รายละเอียดประกาศ" rows="6" id="inputDetailPost" class="form-control"></textarea>
																</div>
															</div>

															<div class="form-group">
																<label class="col-lg-3 control-label" for="inputTitlePost"> เจ้าของโครงการ (ชื่อบริษัทหรือผู้จดทะเบียนกรรมสิทธิ์)  </label>
																<div class="col-lg-9">
																	<input type="text" placeholder="หัวข้อประกาศ" id="inputTitlePost" class="form-control">
																</div>
															</div>

															<div class="form-group">
																<label class="col-lg-3 control-label" for="inputTitlePost"> ราคาโครงการเริ่มต้นที่  </label>
																<div class="col-lg-9">
																	<input type="text" placeholder="หัวข้อประกาศ" id="inputTitlePost" class="form-control">
																</div>
															</div>
															
 
															<div class="headline"><h4>รายละเอียดที่ตั้ง</h4></div>
																	
																	<div class="form-group">
																		<label class="col-lg-3 control-label" for="realtyType">  จังหวัด</label>
																		<div class=" col-lg-5">
																			<label class="select">
																				<select name="realtyType">
																						<option disabled="" selected="" value="0">-- กรุณาเลือกจังหวัด --</option>
																						<option value="1">กรุงเทพ</option> 
																						 <option value="1">นครนายก </option> 
																						<option value="1"> ปราจีนบุรี </option> 
																						<option value="1"> สระแก้ว </option> 
																						<option value="1"> ฉะเชิงเทรา </option> 
																						<option value="1"> ชลบุรี </option> 
																						<option value="1"> ระยอง </option> 
																						<option value="1"> จันทบุรี </option> 
																						<option value="1"> ตราด  </option> 
 
																				</select>

																				<i></i>
																			</label>
																		</div>
																	</div>



																	<div class="form-group">
																		<label class="col-lg-3 control-label" for="realtyType">  อำเภอ/เขต:</label>
																		<div class=" col-lg-5">
																			<label class="select">
																				<select name="realtyType">
																					<option disabled="" selected="" value="0">-- กรุณาเลือกอำเภอ/เขต --</option>
																						

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
																		</div>
																	</div>

																	<div class="form-group">
																		<label class="col-lg-3 control-label" for="realtyType">  * ตำบล/แขวง:</label>
																		<div class=" col-lg-5">


																			<label class="select">
																				<select name="realtyType">
																					<option disabled="" selected="" value="0">-- กรุณาเลือกตำบล/แขวง --</option>
																					

																						 <option value="1">เมืองจันทบุร</option> ี
																						 <option value="1">แก่งหางแมว</option> 
																						 <option value="1">ขลุง</option> 
																						 <option value="1">ท่าใหม</option> ่
																						<option value="1"> นายายอาม</option> 
																						<option value="1"> โป่งน้ำร้อน </option> 
																						 <option value="1">มะขาม</option> 
																						<option value="1"> สอยดาว</option> 
																						<option value="1"> แหลมสิงห</option> ์
																						<option value="1"> เขาคิชฌกูฏ </option> 
																						<option value="1"> เมืองฉะเชิงเทรา</option> 
																						<option value="1"> บางคล้า </option> 
																						<option value="1"> บางน้ำเปรี้ยว </option> 
																						<option value="1"> บางปะกง  </option> 
																						<option value="1"> บ้านโพธิ์ </option> 
																						<option value="1"> แปลงยาว </option> 
																						<option value="1"> พนมสารคาม </option> 
																				</select>

																				<i></i>
																			</label>
																		</div>
																	</div>

																	<div class="form-group">
																		<label class="col-lg-3 control-label" for="inputTitlePost"> ชื่อโครงการ</label>
																		<div class="col-lg-5">
																			<input type="text" placeholder="ชื่อโครงการ" id="inputTitlePost" class="form-control">
																		</div>
																	</div>

																	<div class="form-group">
																		<label class="col-lg-3 control-label" for="inputTitlePost"> เลขที่ </label>
																		<div class="col-lg-2">
																			<input type="text" placeholder="เลขที่" id="inputTitlePost" class="form-control">
																		</div>
																	</div>

																	<div class="form-group">
																		<label class="col-lg-3 control-label" for="inputTitlePost"> ถนน</label>
																		<div class="col-lg-5">
																			<input type="text" placeholder="ถนน" id="inputTitlePost" class="form-control">
																		</div>
																	</div>

																	<div class="form-group">
																		<label class="col-lg-3 control-label" for="inputTitlePost"> รหัสไปรษณีย์</label>
																		<div class="col-lg-2">
																			<input type="text" placeholder="รหัสไปรษณีย์" id="inputTitlePost" class="form-control">
																		</div>
																	</div>

																	<div class="form-group">
																		<label class="col-lg-3 control-label" for="inputTitlePost"> ปักหมุดแผนที่</label>
																		<div class="col-lg-9">
																			

																			<img width='620' src="images/map.jpg">


																		</div>
																	</div>

															
															
															<div class="headline"><h4>ข้อมูลด้านราคา</h4></div>

																	<div class="form-group">
																		<label class="col-lg-3 control-label" for="inputTitlePost"> ราคา</label>
																		<div class="col-lg-5">
																			<input type="text" placeholder="ราคา" id="inputTitlePost" class="form-control">
																		</div>
																	</div>



																<div class="headline"><h4>พื้นที่อสังหาริมทรัพย์ </h4></div>

																	<div class="form-group">
																		<label class="col-lg-3 control-label" for="inputTitlePost"> </label>
																		<div class="col-lg-2">
																			<input type="text" placeholder="ใส่ตัวเลข" id="inputTitlePost" class="form-control">
																			
																		</div>

																		<div class=" col-lg-2">


																			<label class="select">
																				<select name="realtyType">
																					<option value="0" selected="" disabled="">-- กรุณาเลือกหน่วย --</option>
																					

																						 <option value="1">ตารางเมตร</option> ี
																						 <option value="1">ตารางเมตร</option> 
																						 <option value="1">ไร่</option> 
																						 <option value="1">งาน </option>
																						 <option>ห้อง </option> ่
																						<option value="1"> หลัง</option> 
																						<option value="1"> แพ </option> 
																						
																				</select>

																				<i></i>
																			</label>
																		</div>
																		
																	</div>


																

															<div class="form-group">
																<div class="col-lg-offset-3 col-lg-9">
																	<button id="btn-next-step2" class="btn-u btn-u-green" type="button">  ถัดไป  </button>
																</div>
															</div>
													</form>
										<!-- End content mainData-->
										</div>
										<!-- End mainData -->
										 <!--Start detailData  -->
										<div class="tab-pane fade in " id="detailData">


												<div id="detailDataPost"></div>


											<br style="clear:both">

											<div class="form-group">
												<div class="col-lg-offset-3 col-lg-9">
													<button type="button" id="btn-back-step1" class="btn-u btn-u-yellow">  ย้อนกลับ  </button>
													<button type="button" id="btn-next-step3" class="btn-u btn-u-green">  ถัดไป  </button>
												</div>
											</div>
											<br style="clear:both">

										</div>
										<!-- End detailData -->

										<!-- imageVideo -->
										<div class="tab-pane fade" id="imageVideo">

											<div class="headline"><h4>วีดีโอจาก Youtube </h4></div>
											<div class="form-group">
												<div class="alert alert-warning fade in">
													<strong>วิธีการฝังวิดีโอมีดังนี้!</strong> 
													<ul>
														<li>เข้าสู่หน้าวีดีโอของคุณ บน Youtube.com</li>
														<li>คลิกลิงก์แชร์ที่อยู่ด้านล่างของวิดีโอ</li>
														<li>คัดลอกโค้ดทีได้ มาวางลงในกล่องด้านล่างนี้</li>
													</ul>
												</div>


												<label class="col-lg-3 control-label titleGroup" for="inputTitlePost"> ฝังวีดีโอจาก Youtubeที่นี้</label>
												<div class="col-lg-9">
													<textarea rows="6" placeholder="Code Youtube Embedded" id="inputTitlePost" class="form-control"></textarea>
												</div>
											</div>


											<div class="headline"><h4>อัปโหลดรูปภาพ</h4></div>
											<!-- upload images -->
											
											
											<button type="button" class="btn-u btn-u-yellow btnUploadPicture">คลิ๊กอัปโหลดรูปภาพ</button>
													
													

											<div class="row">
												
												<div class="col-md-4">
													<div class="thumbnails thumbnail-style">
														<img alt="" src="assets/img/main/img22.jpg" class="img-responsive">
														<div class="caption">
															
															<p>
															<a class="btn-u btn-u-xs btn-u-red" href="#">ลบ <i class="fa fa-angle-right margin-left-5"></i></a>
															<a class="btn-u btn-u-xs" href="#">ตั้งเป็นหน้าปก <i class="fa fa-angle-right margin-left-5"></i></a>
															</p>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="thumbnails thumbnail-style">
														<img alt="" src="assets/img/main/img26.jpg" class="img-responsive">
														<div class="caption">
															
															<p>
															<a class="btn-u btn-u-xs btn-u-red" href="#">ลบ <i class="fa fa-angle-right margin-left-5"></i></a>
															<a class="btn-u btn-u-xs" href="#">ตั้งเป็นหน้าปก <i class="fa fa-angle-right margin-left-5"></i></a>
															</p>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="thumbnails thumbnail-style">
														<img alt="" src="assets/img/main/img25.jpg" class="img-responsive">
														<div class="caption">
															
															<p>
															<a class="btn-u btn-u-xs btn-u-red" href="#">ลบ <i class="fa fa-angle-right margin-left-5"></i></a>
															<a class="btn-u btn-u-xs" href="#">ตั้งเป็นหน้าปก <i class="fa fa-angle-right margin-left-5"></i></a>
															</p>

														</div>
													</div>
												</div>
											</div>

											<div class="form-group">
													<div class="col-lg-offset-3 col-lg-9">
														<button type="button" id="btn-back-step2" class="btn-u btn-u-yellow">  ย้อนกลับ  </button>
														<button type="button" id="btn-next-step4" class="btn-u btn-u-green">  ถัดไป  </button>
													</div>
												</div>
											<!-- upload images -->


										</div>
										<!-- End imageVideo -->

										<!-- summary -->
										<div class="tab-pane fade" id="summary">
												<div class="headline"><h2>สรุปข้อมูลการประกาศอสังหาฯ </h2></div>

												<div class="headline"><h4>ข้อมูลทั่วไป </h4></div>
												<!-- -ข้อมูลทั่วไป-->
													<div class="row">
														<label class="col-md-3 control-label titleGroup" > ประกาศสำหรับ:</label>
														<div class="col-md-9">ขาย</div>
														
													</div>

													<div class="row">
														<label class="col-md-3 control-label titleGroup" > ประเภทอสังหาริมทรัพย์ :</label>
														<div class="col-md-9">บ้าน</div>
													</div>

													<div class="row">
														<label class="col-md-3 control-label titleGroup" > หัวข้อประกาศ :</label>
														<div class="col-md-9">ขายบ้าน</div>
													</div>

													<div class="row">
														<label class="col-md-3 control-label titleGroup" > รายละเอียดประกาศ :</label>
														<div class="col-md-9">ประกาศขายบ้าน</div>
													</div>

													<div class="row">
														<label class="col-md-3 control-label titleGroup" > เฟอร์นิเจอร์ :</label>
														<div class="col-md-9">มีบางส่วน</div>
													</div>

													<div class="row">
														<label class="col-md-3 control-label titleGroup" > ห้องนอน :</label>
														<div class="col-md-9">2 ห้อง</div>
													</div>

													<div class="row">
														<label class="col-md-3 control-label titleGroup" > ห้องแม่บ้าน :</label>
														<div class="col-md-9">2 ห้อง</div>
													</div>

													<div class="row">
														<label class="col-md-3 control-label titleGroup" > จำนวนชั้น :</label>
														<div class="col-md-9">2 ชั้น</div>
													</div>


													<div style="clear:both"></div>
												<!-- -ข้อมูลทั่วไป-->

												<div class="headline"><h4>ข้อมูลราคา </h4></div>
												<!-- -ข้อมูลราคา-->
													<div class="row">
														<label class="col-md-3 control-label titleGroup" > สำหรับขาย :</label>
														<div class="col-md-9">1,100,000 บาท</div>
													</div>
												<!-- -ข้อมูลราคา-->
												<div class="headline"><h4>ข้อมูลที่ตั้ง </h4></div>
												<!-- -ข้อมูลที่ตั้ง-->
													<div class="row">
															<label class="col-md-3 control-label titleGroup" > ชื่อโครงการ :</label>
															<div class="col-md-9">รื่นฤดี5</div>
													</div>
													<div class="row">
															<label class="col-md-3 control-label titleGroup" > เลขที่ :</label>
															<div class="col-md-9">688/165</div>
													</div>
													<div class="row">
															<label class="col-md-3 control-label titleGroup" > ถนน,  :</label>
															<div class="col-md-9">ซอย 10</div>
													</div>
													<div class="row">
															<label class="col-md-3 control-label titleGroup" > ที่อยู่  :</label>
															<div class="col-md-9">บางชั่น,เขต คลองสามวา,กรุงเทพมหานคร</div>
													</div>
													<div class="row">
															<label class="col-md-3 control-label titleGroup" > แผนที่  :</label>
															<div class="col-md-9">
																<img src="images/map.jpg" width="630">
															</div>
													</div>
												<!-- -ข้อมูลที่ตั้ง-->
												<div class="headline"><h4>ข้อมูลเพิ่มเติม </h4></div>
												<!-- -ข้อมูลเพิ่มเติม-->
												    <div class="row">
															<label class="col-md-3 control-label titleGroup" > ลักษณะพิเศษ  :</label>
															<div class="col-md-9">
																<ul>
																	<li>
																		ประตูรีโมท
																	</li>
																	<li>
																		ติดทะเลสาบ,คลอง
																	</li>
																</ul>
															</div>
													</div>

													  <div class="row">
															<label class="col-md-3 control-label titleGroup" > รายละเอียดเพิ่มเติมภายใน  :</label>
															<div class="col-md-9">
																<ul>
																	<li>
																		เครื่องปรับอากาศ
																	</li>
																	<li>
																		อินเตอร์เน็ต
																	</li>
																</ul>
															</div>
													</div>

													 <div class="row">
															<label class="col-md-3 control-label titleGroup" > สิ่งอำนวยความสะดวก  :</label>
															<div class="col-md-9">
																<ul>
																	<li>
																		รักษาความปลอดภัย 24 ซม.
																	</li>
																	<li>
																		กล้องวงจรปิด
																	</li>
																	<li>
																		สระว่ายน้ำ
																	</li>
																</ul>
															</div>
													</div>

													 <div class="row">
															<label class="col-md-3 control-label titleGroup" > สถานที่ใกล้เคียง  :</label>
															<div class="col-md-9">
																<ul>
																	<li>
																		ใกล้สถานีขนส่ง
																	</li>
																	<li>
																		ใกล้สถานีรถไฟฟ้า
																	</li>
																	<li>
																		ใกล้รถไฟฟ้าใต้ดิน
																	</li>
																</ul>
															</div>
													</div>
												<!-- -ข้อมูลเพิ่มเติม-->
												<div class="headline"><h4>ข้อมูลรูปภาพ/วีดีโอ </h4></div>
												<!-- -ข้อมูลรูปภาพ/วีดีโอ-->
												<div class="headline"><h5>ข้อมูลรูปภาพ </h5></div>
													<div class="row">
														<div class="col-md-4">
															<div class="thumbnails thumbnail-style">
																<img class="img-responsive" src="assets/img/main/img22.jpg" alt="">
																<div class="caption">
																	
																	
																</div>
															</div>
														</div>
														<div class="col-md-4">
															<div class="thumbnails thumbnail-style">
																<img class="img-responsive" src="assets/img/main/img26.jpg" alt="">
																<div class="caption">
																	
																
																</div>
															</div>
														</div>
														<div class="col-md-4">
															<div class="thumbnails thumbnail-style">
																<img class="img-responsive" src="assets/img/main/img25.jpg" alt="">
																<div class="caption">
																	
																	
																</div>
															</div>
														</div>
													</div>
													<div class="headline"><h5>ข้อมูลวีดีโอ </h5></div>
													<div class="row margin-bottom-60">
														<!-- Vimeo Video -->                
														<div class="col-md-6">
															<div class="responsive-video md-margin-bottom-40">
																<iframe width="100%" frameborder="0" allowfullscreen="" src="//www.youtube.com/embed/4dmt7tQG1-w"></iframe>
															</div>
														</div>
														<!-- End Vimeo Video -->

														<!-- Youtube Video -->
														<div class="col-md-6">
															<div class="responsive-video">
																<iframe width="100%" frameborder="0" allowfullscreen="" src="//www.youtube.com/embed/Squv4KI751w"></iframe>
															</div>
														</div>
														<!-- End Youtube Video -->
													</div>
												<!-- -ข้อมูลรูปภาพ/วีดีโอ-->
												<div class="form-group">
													<div class="col-lg-offset-3 col-lg-9">
														<button class="btn-u btn-u-green" type="button">  ยืนยันและบันทึกข้อมูล  </button>
													</div>
												</div>

										</div>
										<!-- End summary -->
										

									</div>
								</div>
								<!-- End Tabs-->

                        </div>
                        <!-- End newPost -->
						 <!-- newPost-->
                        <div class="tab-pane fade in " id="currentPost">
                            <!-- Content1-->   	
							<!-- รายการประกาศปัจจุบัน -->
							<div class="col-md-12">
									<div class="panel panel-sea margin-bottom-40">
										<div class="panel-heading">
											<h3 class="panel-title"><i class="fa fa-edit"></i> รายการประกาศปัจจุบัน</h3>
										</div>
										<table class="table table-striped">
											<thead>
												<tr>
													<th>#รหัส</th>
													<th>รายการ</th>
													<th>ราคา</th>
													<th>วันที่หมดอายุ</th>
													<th>สถานะ</th>
													<th>จัดการ</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>2013719</td>
													<td>ขายบ้าน</td>
													<td>1,000,000</td>
													<td>10/09/58</td>
													<td>แสดง</td>
													<td>
													<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> ลบ </button>
													<button class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> แก้ไข</button>
													<button class="btn btn-success btn-xs"><i class="fa fa-share"></i> ไม่แสดง</button>
													
													</td>
												</tr>
												<tr>
													<td>2013720</td>
													<td>ขายบ้าน</td>
													<td>1,000,000</td>
													<td>10/09/58</td>
													<td>แสดง</td>
													<td>
													<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> ลบ </button>
													<button class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> แก้ไข</button>
													<button class="btn btn-success btn-xs"><i class="fa fa-share"></i> ไม่แสดง</button>
													
													</td>
												</tr>
												
											</tbody>
										</table>
									</div>                  
								</div>
							<!-- รายการประกาศปัจจุบัน -->

                        </div>
                        <!-- End newPost -->
						 <!-- newPost-->
                        <div class="tab-pane fade in " id="nonePost">
                            <!-- Content1-->   	    
							<!-- รายการประกาศที่ไม่แสดง -->
							<div class="col-md-12">
									<div class="panel panel-sea margin-bottom-40">
										<div class="panel-heading">
											<h3 class="panel-title"><i class="fa fa-edit"></i> รายการประกาศที่ไม่แสดง</h3>
										</div>
										<table class="table table-striped">
											<thead>
												<tr>
													<th>#รหัส</th>
													<th>รายการ</th>
													<th>ราคา</th>
													<th>วันที่หมดอายุ</th>
													<th>สถานะ</th>
													<th>จัดการ</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>2013721</td>
													<td>เช่าบ้าน</td>
													<td>7,000</td>
													<td>10/09/58</td>
													<td>ไม่แสดง</td>
													<td>
													<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> ลบ </button>
													<button class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> แก้ไข</button>
													<button class="btn btn-success btn-xs"><i class="fa fa-share"></i> แสดง</button>
													
													</td>
												</tr>
												<tr>
													<td>2013722</td>
													<td>เช่าบ้าน</td>
													<td>8,000</td>
													<td>10/09/58</td>
													<td>ไม่แสดง</td>
													<td>
													<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> ลบ </button>
													<button class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> แก้ไข</button>
													<button class="btn btn-success btn-xs"><i class="fa fa-share"></i> แสดง</button>
													
													</td>
												</tr>
												
											</tbody>
										</table>
									</div>                  
								</div>
							<!-- รายการประกาศปัจจุบัน -->

                        </div>
                        <!-- End newPost -->
						 <!-- newPost-->
                        <div class="tab-pane fade in " id="expirePost">
                            <!-- Content1-->   	   
							<!-- รายการประกาศที่หมดอายุ -->
							<div class="col-md-12">
									<div class="panel panel-sea margin-bottom-40">
										<div class="panel-heading">
											<h3 class="panel-title"><i class="fa fa-edit"></i> รายการประกาศที่หมดอายุ</h3>
										</div>
										<table class="table table-striped">
											<thead>
												<tr>
													<th>#รหัส</th>
													<th>รายการ</th>
													<th>ราคา</th>
													<th>วันที่หมดอายุ</th>
													<th>สถานะ</th>
													<th>จัดการ</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>2013723</td>
													<td>ขายบ้าน</td>
													<td>7,000,000</td>
													<td>05/09/58</td>
													<td>ไม่แสดง</td>
													<td>
													<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> ลบ </button>
													<button class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> แก้ไข</button>
													<button class="btn btn-success btn-xs"><i class="fa fa-share"></i> ต่ออายุประกาศ</button>
													
													</td>
												</tr>
												<tr>
													<td>2013724</td>
													<td>เช่าบ้าน</td>
													<td>9,000</td>
													<td>04/09/58</td>
													<td>ไม่แสดง</td>
													<td>
													<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> ลบ </button>
													<button class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> แก้ไข</button>
													<button class="btn btn-success btn-xs"><i class="fa fa-share"></i> ต่ออายุประกาศ</button>
													
													</td>
												</tr>
												
											</tbody>
										</table>
									</div>                  
								</div>
							<!-- รายการประกาศที่หมดอายุ -->

                        </div>
                        <!-- End newPost -->
						</div>
					</div>
					 <!-- Tabs End -->
	<br style="clear:both">
</div>
				
          
