<?php 
if($conn){
	$sqlSQLCN="select * from realty_type where rt_contructor_yet='N'";
	$resultCN=mysql_query($sqlSQLCN);

	$sqlSQLCY="select * from realty_type where rt_contructor_yet='Y'";
	$resultCY=mysql_query($sqlSQLCY);
	
	include'query_public_transport.php';
	

	
}
?>
<script>
						
</script>	
<script src="Controller/cSearchForSalesRealty.js"></script>
<!-- action="index.php?page=post_detail"  -->
<form id="formSearchForSales" name="formSearchForSales"  class="sky-form" id="sky-form4" method='post' novalidate="novalidate">
	<header class=''>
		<div class="headline headline-md">
			<h2><i class="fa fa-search-plus"></i> เมนูค้นหาประกาศขายฟรี</h2>
		</div>
		<?php 
		while($rsCN=mysql_fetch_array($resultCN)){
			?>
			<button type="button"  id="<?=$rsCN['rt_id']?>" class="btn-u btn-mainmenu mainMenuPost">ขาย<?=$rsCN['rt_name']?></button>
			<?php
		}
		?>
	
		<div class="headline headline-md">
			<!-- <h2>สำหรับผู้หรับเหมา</h2> -->
		</div>
		<?php 
		while($rsCY=mysql_fetch_array($resultCY)){
			if($rsCY['rt_id']=="36" ||$rsCY['rt_id']=="33" ){
			?>
			<button type="button" id="<?=$rsCY['rt_id']?>" class="btn-u mainMenuPost btn-mainmenu-contractor btn-u-dark-blue"><?=$rsCY['rt_name']?></button>
			<?php
			}else{
			?>
			<button type="button" id="<?=$rsCY['rt_id']?>" class="btn-u mainMenuPost btn-mainmenu-contractor btn-u-dark-blue">ขาย<?=$rsCY['rt_name']?></button>
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
																						<option selected="" value="All">-- เลือกอำเภอ/เขต --</option>
	
																					</select>
																	
																		<i></i>
																	</label>
																</section>
														</div>
														<div class="col-md-4 col-padding-2">
															 <section>
																	<label class="select" id="subDistrictArea">
																		<select name="rdg_address_sub_district_id" id="rdg_address_sub_district_id">
																			<option  selected="" value="All">-- เลือกตำบล/แขวง --</option>
																		</select>
																		<i></i>
																	</label>
																</section>
														</div>
	
														
	
														<div class="col-md-4 col-padding-2">
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
	
														<div class="col-md-4 col-padding-2">
															 <section>
																	<label class="select">
																		<select name="rdg_bts">
																			<option  selected="" value="All">เลือกใกล้รถไฟฟ้าบีทีเอส</option>
																			
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
	
					<div class="col-md-4 col-padding-2">
						 <section>
								<label class="select">
									<select name=rdg_bus>
										<option  selected="" value="All">ใกล้สายรถเมย์ ก.ท.ม.</option>
										<?php 
										while($rsBusNo=mysql_fetch_array($resultBusNo)){
											?>
											<option value="<?=$rsBusNo['rdg_bus']?>"><?=$rsBusNo['rdg_bus']?></option>
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
									<select name="rdg_harbor">
										<option  selected="" value="All">ใกล้ท่าเรือ</option>
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
							    <input type="text" name="rdg_id" class="form-control" placeholder="กรอกเลขที่ประกาศ">
						 </section>
					</div>
		</div>
		
		
		
	</fieldset>
	<footer>
	
			<div id="parameterEmbedAreaSale"></div>
			<button type="submit"  class="btn-u btn-u-orange btn-search1">
			<i class="fa fa-search-plus"></i> ค้นหา
			</button>
	
	</footer>

	<footer>
		<input type="hidden" name="search_type" value='1' >
		<input type="hidden" name="rdg_rf" value="1">
		<button class="btn-u  btn-u-xs btn-u-light-green" id="btnSaveSearch" ><i class=" fa fa-folder-open "></i> บันทึกการค้นหา</button>
		<button class="btn-u  btn-u-xs btn-u-dark-blue" ><i class="fa fa-envelope-o"></i> แจ้งเตือนทางอีเมลล์</button>
		
	</footer>
	
</form>	
<form id='fromSearchQuick' >		
	<fieldset> 
		<div class="row">
					
	<div class="col-md-9 col-padding-2">
	<!--
	<label class="input">
		<input type="text" placeholder="ค้นหา" name="firstname">
	</label>
	-->
								
								
								<div class="input-group">
                                    <input type="text" name="searchQuick" class="form-control" placeholder="ใส่ข้อมูล">
                                     <input type="hidden" name="paramAction" value="searchQuick">
                                      <input type="hidden" name="rdg_rf" value="1">
                                    <span class="input-group-btn">
                                 	
                                        <button type="submit" class="btn btn-u btn-u-orange"><i class="fa fa-search-plus"></i> คลิ๊กค้นหาทางลัด</button>
                                    </span>
                                </div>

								</div>
					</div>
				</fieldset> 
</form>