
<?php 
include_once 'config.inc.php';
$embed_rt_id=$_POST['embed_rt_id'];
$rdg_address_province_id=$_POST['rdg_address_province_id'];
$rdg_address_district_id=$_POST['rdg_address_district_id'];
$rdg_address_sub_district_id=$_POST['rdg_address_sub_district_id'];
$rdg_bts=$_POST['rdg_bts'];
$rdg_bus=$_POST['rdg_bus'];
$rdg_harbor=$_POST['rdg_harbor'];
$rdg_id=$_POST['rdg_id'];
$rdg_mrt=$_POST['rdg_mrt'];
$rdg_road=$_POST['rdg_road'];

/*
embed_rt_id
rdg_address_district_id
rdg_address_province_id
rdg_address_sub_district_id
rdg_bts
rdg_bus
rdg_harbor
rdg_id
rdg_mrt
rdg_road
*/

	
	$strSQLPostDetail="
			
	select rdg.*,rt_name,rf_name,rps_name from realty_data_general rdg
	LEFT JOIN realty_type rt 
	ON rdg.rt_id=rt.rt_id
	LEFT JOIN realty_for rf
	ON rdg.rf_id=rf.rf_id
	LEFT JOIN realty_project_status rps
	ON rdg.rps_id=rps.rps_id
	WHERE (rdg.rt_id='1' or 'All'='All')
	AND (rdg.rdg_address_province_id='1' or 'All'='All')
	AND (rdg.rdg_address_district_id='1' or 'All'='All')
	AND (rdg.rdg_address_sub_district_id='1' or 'All'='All')
	AND (rdg.rdg_address_road='1' or 'All'='All')
	AND (rdg.rdg_bts='1' or 'All'='All')
	AND (rdg.rdg_mrt='1' or 'All'='All')
	AND (rdg.rdg_arl='1' or 'All'='All')
	AND (rdg.rdg_harbor='1' or 'All'='All')
			
			";
	$resultPostDetail=mysql_query($strSQLPostDetail);
	
	
	function numResultFn($rt_id){
		$strSQLnum="select count(*) as allPage from realty_data_general  where rt_id='".$rt_id."'";
		$result=mysql_query($strSQLnum);
		$rs=mysql_fetch_array($result);
		return $rs['allPage'];
	}

	
	function resultUnit(){
		$strSQL="select * from realty_unit order by ru_sort";
		$result=mysql_query($strSQL);
		return $result;
	}
	
	
	
	
	$sqlSQLBTS="SELECT * FROM public_transport where pt_type='BTS'";
	$resultBTS=mysql_query($sqlSQLBTS);
	
	$sqlSQLMRT="SELECT * FROM public_transport where pt_type='MRT'";
	$resultMRT=mysql_query($sqlSQLMRT);
	
	$sqlSQLARL="SELECT * FROM public_transport where pt_type='ARL'";
	$resultARL=mysql_query($sqlSQLARL);
	
	$sqlSQLHARBOR="SELECT * FROM public_transport where pt_type='HARBOR'";
	$resultHARBOR=mysql_query($sqlSQLHARBOR);
	
	$sqlSQLRoadNo="select rdg_address_road from realty_data_general where rdg_address_road !=NULL";
	$resultRoadNo=mysql_query($sqlSQLRoadNo);
	
	$sqlSQLBusNo="select rdg_bus from realty_data_general where rdg_bus !=NULL";
	$resultBusNo=mysql_query($sqlSQLBusNo);
	$sqlSQLSoi="select rdg_address_soi from realty_data_general where rdg_address_soi !=NULL";
	$resultSoi=mysql_query($sqlSQLSoi);
	

?>
 <!--Blog Post0--> 
 		<script src="Controller/page/cPostDetail.js"></script>    
 		   
		<div class="blog margin-bottom-5">
		 <div class="row">
								<div class="panel  panel-red" style="margin-bottom: 5px;">
									<div class="panel-heading">
										<h3 class="panel-title"><i class="fa fa-tasks"></i> ผลการคค้นหาอสังหาริมทรัพย์</h3>
									</div>
									<div class="panel-body">
										
											<div class="row">

				<form id="formSubPost" name="formSubPost" class="sky-form" id="sky-form4" action="#" novalidate="novalidate">
									<header>
										<div class="headline headline-md">
											<h2>ค้นหาประกาศขายอสังหาริมทรัพย์</h2>
										</div>
										<input type="radio" name="rdg_tf" value="5"> ขายดาวน์
										<input type="radio" name="rdg_tf" value="1"> ขายขาด
									</header>


									<fieldset> 
										<div class="row">

											<div class="magazine-posts col-md-12 col-sm-6 margin-bottom-2">
											<div class="shadow-wrapper">
												<blockquote class="hero box-shadow shadow-effect-2">
													<div class="col-md-4 col-padding-2">
														 <section>
																<label class="select">
																	<select name="rdg_price_start">
																		
																		<option value="0" selected="" > ราคาขายเริ่มต้น </option>
																		<?php 
																		for($i=0;$i<=100;$i++){
																			if($i==0){
																				?>
																				<option value="<?=$i?>"><?=$i?></option>
																				<?php
																			}else{
																				$number=$i*100000;
																				$numCommas=number_format($number);
																				?>
																				<option value="<?=$i?>0000"><?=$numCommas?></option>
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
																	<select name="rdg_price_end">
																	
																		<option value="0" selected="" > ราคาขายสูงสุด</option>
																		<?php 
																		for($i=0;$i<=100;$i++){
																			if($i==0){
																				?>
																				<option value="<?=$i?>"><?=$i?></option>
																				<?php
																			}else{
																				$number=$i*200000;
																				$numCommas=number_format($number);
																				?>
																				<option value="<?=$i*2?>0000"><?=$numCommas?></option>
																				<?php
																			}
																			
																		}
																		?>
																		<option value=">2000000" selected="" > 2,000,000 ขึ้นไป</option>
																	</select>
																	<i></i>
																</label>
															</section>
													</div>

													<div class="col-md-4 col-padding-2">
														 <section>
																<label class="select">
																	<select class="AreaSelect" tabindex="2" name="rdg_area_number">
																		<option value="">ขนาดพื้นที่</option>
																		<?php 
																		for($i=0;$i<=100;$i++){
																			if($i==0){
																				?>
																				<option value="<?=$i?>"><?=$i?></option>
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
																	<?php 
																	$result=resultUnit();
																	while($rs=mysql_fetch_array($result)){
																	?>
																	<option value="<?=$rs['ru_id']?>"><?=$rs['ru_name']?></option>
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
																	<select class="Room1Select" tabindex="4" name="rdr_bedroom">
																		<option value="">ห้องนอน</option>
																		<?php 
																		for($i=0;$i<=300;$i++){
																			?>
																			<option value="<?=$i?>"><?=$i?></option>
																			<?php
																		}
																		?>
																		
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
												<input type="text" placeholder="ค้นหา" name="searchTxt">
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
																						<option selected="" value="0">-- เลือกอำเภอ/เขต --</option>
	
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
																		<option  selected="" value="0">เลือกถนน</option>
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
																	<select class="Room1Select" tabindex="4" name="rdg_address_soi">
																		<option value="">เลือกซอย</option>
																			<?php 
																				while($rsSoi=mysql_fetch_array($resultSoi)){
																					?>
																					<option value="<?=$rsSoi['rdg_address_soi ']?>"><?=$rsSoi['rdg_address_soi ']?></option>
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
																		<option  selected="" value="0">เลือกรถไฟฟ้าบีทีเอส</option>
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
																		<option  selected="" value="0">ใกล้รถไฟฟ้าใต้ดิน</option>
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
																	<select name="rdg_bts">
																		<option  selected="" value="0">ใกล้สายรถเมย์ ก.ท.ม.</option>
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
																		<option  selected="" value="0">ใกล้ท่าเรือ</option>
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
										</div>
										
										
										
									</fieldset>
									<footer>
										<button class="btn-u btn-u-light-green" type="submit">บันทึกการค้นหา</button>
										<button class="btn-u btn-u-dark-blue" type="submit">แจ้งเตือนทางอีเมลล์</button>
										<button class="btn-u btn-u-orange" type="submit ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ค้นหาประกาศ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
									</footer>
									
									
								</form>


											</div>
											<div class="row">


											


												<!-- Begin Easy Block -->                
												<div class="col-md-12 col-sm-12">

													

													<div class="easy-block-v2">

													<!-- start button link -->
													<p>
														<button type="button" class="btn-u btn-u-green"><i class="fa fa-cloud"></i> แชร์ไปที่เฟสบุ๊ค/กูเกิล</button>
														<button type="button" class="btn-u btn-u-green"><i class="fa fa-bell-o"></i>ส่งหน้านี้ให้เพิ่อน</button>
														<button type="button" class="btn-u btn-u-green"><i class="fa fa-envelope-o"></i> เก็บหน้านี้ไว้ดูครั้งหน้า</button>
														<button type="button" class="btn-u btn-u-green"><i class="fa fa-download"></i>คลิ๊กดูหน้าที่จัดเก็บไว้</button>
														<button type="button" class="btn-u btn-u-green"><i class="fa fa-download"></i>ปริ้น</button>
													
													</p>
													<!--end  button link -->
												


													<div class="alert alert-success fade in ">
														<div class="row">
																<div class="col-md-6">
																	<h3 style="margin:0px;">ประกาศอสังหาริมทรัพย์</h3>
																</div>
																<div class="col-md-6" style="text-align:right; padding:2px;">
																	<h3 style="margin:0px;">ประเภทขายบ้าน</h3>
																</div>
														</div>
													</div>

													<div class="alert alert-warning  fade in ">
														<div class="row">
																<div class="col-md-6">
																	<h3 style="margin:0px;">บ้านเดี่ยว</h3>
																</div>
																<div class="col-md-6" style="text-align:right; padding:2px;">
																	<h3 style="margin:0px;"></h3>
																	<button type="button" class="btn-u btn-u-red"  style="padding: 3px;"><i class="fa fa-bell-o"></i>ขายดาวน์</button>
																</div>
														</div>
													</div>


													ค้นหาพบ <?=numResultFn($embed_rt_id)?> รายการ

														<!--<div class="easy-bg-v2 rgba-default">ใหม่</div>
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
															
															
															<?php 
															while($rsPostDetail=mysql_fetch_array($resultPostDetail)){															
															?>
															
															<!-- start list realty -->
															<div class="col-md-12 shadow-wrapper">
																<div class="tag-box tag-box-v1 box-shadow shadow-effect-2">
																	<h2><?=$rsPostDetail['rdg_title']?></h2>
																	<div class="row">
																		<div class="col-md-3">
																		
																		<?php 
																			$strSQL="select * from realty_images where rdg_id='".$rsPostDetail['rdg_id']."' and  ri_set_first='0'  ORDER BY ri_set_first ";
																			$result=mysql_query($strSQL);
																			$i=1;
																			$rs=mysql_fetch_array($result);
																				//จัดการกับรูปภาพ
																				$thumbnailsPath="realtyPicture/".$rsPostDetail['rdg_id']."/".$rs[ri_id]."/thumbnail/";
																				if(!is_dir($thumbnailsPath)){
																					
																				}else{ //else
																			
																					if($handle= opendir($thumbnailsPath)){
																						$imagesFiles = array();
																						while(false!=($file=readdir($handle))){
																							if($file!="." && $file!=".."){
																								$thumbnailsFile = $thumbnailsPath."/".$file;
																								$fileType = pathinfo($thumbnaisFile);//แสดงpath
																								$fileType = strtolower($fileType['extension']);//แสดงpathพร้อม แสดงนามสกุล
																								$allowedtypes=array("png","jpeg","jpd","gif");
																			
																								if(is_file($thumbnailsFile)&& in_array($fileType,$allowedtypes))
																								{
																									$imagesFiles[]=$thumbnailsFile;
																								}
																			
																							}
																						}
																						closedir($handle);
																					}
																					sort($imagesFiles);
																					if(count($imagesFiles)>0){
																						$thumbnailsFile = $imagesFiles[0];
																					}
																				}//else
																				//ปิดจัดการรูปภาพ
																				
																				?>
																				<img alt="" src="<?=$thumbnailsFile?>" width="300" class="img-responsive">
																				<?php 
																			
																		?>

																		</div>
																		<div class="col-md-9">
																		<?=$rsPostDetail['rdg_detail']?><br>

																		<p>
																			<button type="button" class="btn-u btn-u-green"><i class="fa fa-child "></i> ติดต่อผู้ลงประกาศ</button>
																		<button type="button" class="btn-u btn-u-green"><i class="fa  fa-car"></i> แผนที่</button>
																		<button type="button" class="btn-u btn-u-green"><i class="fa fa-download"></i> เก็บไว้ดูภายหลัง</button>
																		<button type="button" class="btn-u btn-u-red"  onclick="window.location.href='index.php?page=post_sub_detail'"  type="button"><i class="fa fa-building "></i> ดูรายละเอียด</button>
																		
																		</p>
																		</div>

																	</div>
																</div>
															</div>
															<!-- end list realty -->
															<?php
															}
															?>
															
													</div> 

												</div>
												
												<!-- End Begin Easy Block -->                
															  
											</div>

							  </div>
				</div>
		   </div>
</div>
<!--End Blog Post0-->      

