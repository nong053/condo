
<script src="Controller/page/cSpecialPost.js"></script>  
<?php 
function numResultFn($rf_id,$rt_id){
	$strSQLnum="select count(*) as allPage from realty_data_general  where rf_id='".$rf_id."' and rt_id='$rt_id'";
	$result=mysql_query($strSQLnum);
	$rs=mysql_fetch_array($result);
	return $rs['allPage'];
}

$strSLQSCCate="select * from realty_type_cate order by rtc_id";
$resultSCCate=mysql_query($strSLQSCCate);
while($rsSCCate=mysql_fetch_array($resultSCCate)){

	

		$strSLQPsale="
		select rdg.rt_id,rt.rt_name,rdg.cus_id,rf_id,
		rdg.rdg_id,rdg_title,rdg.rdg_address_no,rdg.rdg_special,
		rdg.rdg_address_province_id,p.PROVINCE_NAME,
		rdg_address_district_id,am.AMPHUR_NAME,
		rdg_address_sub_district_id,d.DISTRICT_NAME,
		rdg_address_road,rdg_post_code,
		rdg_price,rdg_price_down,rdg_price_rent,rdg_price_project,
		rdg_area_number,rdg_area_unit,ru.ru_name,rtc.rtc_detail,
		rdg_update,
		rdg_status_post,
		rdg.rdg_estate_num,
		(select ru2.ru_name  from realty_unit ru2 where ru2.ru_id= rdg.rdg_estate_unit) as rdg_estate_unit_name,
		c.*
		from realty_data_general rdg
		LEFT JOIN province p
		ON p.PROVINCE_ID=rdg.rdg_address_province_id
		LEFT JOIN amphur am
		ON rdg.rdg_address_district_id=am.AMPHUR_ID
		LEFT JOIN district d
		ON d.DISTRICT_ID=rdg_address_sub_district_id
		LEFT JOIN realty_type rt
		ON rt.rt_id=rdg.rt_id
		LEFT JOIN realty_unit ru 
		on ru.ru_id=rdg.rdg_area_unit
		LEFT JOIN realty_type_cate rtc
		ON rtc.rtc_id=rt.rt_contructor_cate
		LEFT JOIN customer c
		ON c.cus_id= rdg.cus_id
		where  rt.rt_contructor_cate=".$rsSCCate['rtc_id']." and c.cus_enable='Yes' and c.cus_status_special='Y' and rdg.rdg_special='Y' and rdg.rdg_status='Y' order by rdg.rdg_update desc 
				
		";
?>


<!--Blog Post-->        
<div class="blog margin-bottom-5">
<div class="row" >
	<div class="panel panel-u" style="margin-bottom: 5px;">
			
			

                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tasks"></i> ประกาศ<?=$rsSCCate['rtc_detail'];?>พิเศษหน้าแรก</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                
                                <!--  grid special start here -->
						        <table class="gridSpecialPost">
									 <colgroup>
										<col />
									 </colgroup>
									 <thead>
									 <tr>
										<th data-field="make">	</th>
									 </tr>
									 </thead>
									 <tbody>
                                <?php 
                                $resultPsale=mysql_query($strSLQPsale);
                                while($rsPsale=mysql_fetch_array($resultPsale)){
                                ?>	
                                
                                		<tr >
					                		<td>
					                		<!--start  post  -->
												<div class="col-xs-12 shadow-wrapper" >
													<div class="tag-box tag-box-v1 box-shadow shadow-effect-2" style="background: <?=$rsSCCate['rtc_bg_color'];?>">
														
														<!--start button top post -->
														<div class="row">
					                                		<div class="col-xs-12">
					                                			<p>
																	<button class="btn-u btn-u-xs btn-u-orange" type="button"><i class=" fa fa-search-plus"></i> ค้นหาพบ <? echo numResultFn("1",$rsPsale['rt_id'])?> ประกาศหน้าที่ 1 จาก <?=numResultFn("1",$rsPsale['rt_id'])?> ประกาศ</button>
																	<button  onClick="window.open('https://www.facebook.com/sharer.php?u=www.realthairealty.com/<?=$_SERVER['REQUEST_URI']?>')"; class="btn-u btn-u-xs btn-u-orange" type="button"><i class="icon-social-facebook"></i> แซร์ผ่านเฟสบุ๊ค</button>
																	<button onClick="window.print()"; class="print btn-u btn-u-xs btn-u-orange" type="button"><i class=" icon-printer "></i> ปริ้น</button>
																	<!-- <button  class=" btnSavePost btn-u btn-u-xs btn-u-orange" type="button"><i class="fa fa-download"></i> บันทึกสิ่งที่ค้นหา</button> -->
																	<button onClick="window.open('index.php?page=postSaved')"; class="btn-u btn-u-xs btn-u-orange" type="button"><i class="icon-grid "></i> ประกาศที่บันทึกไว้</button>
																</p>
					                                		</div>
					                                	</div>
					                                	<!--end button top post -->
														
														
														<div class="row">
															<div class="col-xs-8 ">
															<h2>ประกาศขายพิเศษ รหัส <?=$rsPsale['rdg_id']?>
															<?php 
															if($rsPsale['rdg_status_post']=="soldOut"){
															echo "<font color='red'>(ขายแล้ว)</font>";
																
															}else if($rsPsale['rdg_status_post']=="rented"){
															echo "<font color='red'>(เช่าแล้ว)</font>";	
															}
															?>
															</h2>
															</div>
															<div class="col-xs-4 ">
															<button onclick="window.location.href='index.php?page=post_sub_detail&rdg_id=<?=$rsPsale['rdg_id']?>&rtc_id=<?=$rsSCCate['rtc_id']?>'" class="box-margin-top5 btn-u btn-u-red btn-left-right btnDetailReailty" type="button"><i class="fa fa-building "></i> คลิ๊กรายละเอียด</button>
															
																	<div class="col-xs-7  useronlineSpecialPage">
																	
																	
																	<!-- profile start -->
																	<div>	
																		<img width="80" border="0" src="control-panel/member_img/<?=$rsPsale['cus_pic']?>" class="rounded-x">
																		<a href="index.php?page=profile_post&cus_id=<?=$rsPsale['cus_id']?>">
																		<em>โปรไฟล์ผู้ประกาศ</em>
																		</a>
																	</div>
																	
																	<!-- profile end -->
																	<!-- user online start -->	
																	<div id="testimonials-9" class="carousel slide testimonials testimonials-v2 testimonials-bg-default">
																		<div class="">
																			<div class="item active">
																			<?php 
																			$strSQLCountHit="SELECT * FROM counter1_realty where  rdg_id='".$rsPsale['rdg_id']."'";
																			$resultCountHit=mysql_query($strSQLCountHit);
																			$num=mysql_num_rows($resultCountHit);
																			?>																
																				<p><?=number_format($num)?> ครั้ง</p>
																				<div class="testimonial-info">
																					<span class="testimonial-author">
																						นับจำนวจผู้เข้าชม
																						<em>ประกาศเลขที่ <?=$rsPsale['rdg_id']?></em>
																					</span>
																				</div>
																			</div>
																			
																		</div>
																		
																	</div>
																	<!-- user online end -->
																	</div>
																	
															
															
															</div>
															<brstyle='clear:both'>
														</div>
														<div class="row">
															<div class="col-xs-4">
															<?php 
															$strSQL="select * from realty_images where rdg_id='".$rsPsale['rdg_id']."' and  ri_set_first='0'  ORDER BY ri_set_first ";
															$result=mysql_query($strSQL);
															$i=1;
															while($rs=mysql_fetch_array($result)){
																//จัดการกับรูปภาพ
																$thumbnailsPath="realtyPicture/".$rsPsale['rdg_id']."/".$rs[ri_id]."/thumbnail/";
																//echo $thumbnailsPath;
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
															}
															?>
																
															</div>
															<div class="col-xs-6">
															<?if($rsPsale['rdg_title'])echo "<p>".$rsPsale['rdg_title']."</p>";?>
															<b>ขาย</b> <?=$rsPsale['rt_name']?>  <?
															if($rsPsale['rf_id']=="1"){//เพื่อขาย
																echo "ราคาขาย <span style='color:red;font-weight:bold;'>".number_format($rsPsale['rdg_price'])."</span> บาท";
															}else if($rsPsale['rf_id']=="2"){//เพื่อเช่า
																echo  "ราคาเช่า ".number_format($rsPsale['rdg_price_rent'])." บาท";
															}else if($rsPsale['rf_id']=="3"){//เพื่อขายและเช่า
																echo  "ราคาขาย ".number_format($rsPsale['rdg_price'])." บาท<br>";
																echo  "ราคาเช่า ".number_format($rsPsale['rdg_price_rent'])." บาท";
															}else if($rsPsale['rf_id']=="5"){//เพื่อขายดาว์น
																echo  "ราคาขายดาว์น ".number_format($rsPsale['rdg_price_down'])." บาท";
															}
															
															?> 
															<br>
															<b>ที่อยู่ </b>  <?if($rsPsale['PROVINCE_NAME'])echo"จังหวัด" .$rsPsale['PROVINCE_NAME'];?>
															 <?if($rsPsale['AMPHUR_NAME'])echo"อำเภอ/เขต:" .$rsPsale['AMPHUR_NAME']; ?>
															<?if($rsPsale['DISTRICT_NAME'])echo"ตำบล/แขวง:" .$rsPsale['DISTRICT_NAME'];?>
															<?if($rsPsale['rdg_address_no'])echo"เลขที่: ". $rsPsale['rdg_address_no'];?>
															<?if($rsPsale['rdg_post_code'])echo"รหัสไปษณีย์:". $rsPsale['rdg_post_code'];?>
															
															<br>
															
															 
															<?php 
															if($rsSCCate['rtc_id']=='3' or $rsSCCate['rtc_id']=='4'){
															
															}else{
																if($rsPsale['rdg_estate_num']){
																	?>
																	<b>ที่ดิน</b> <?=number_format($rsPsale['rdg_estate_num']);?>  <?=$rsPsale['rdg_estate_unit_name'];?><br>
																	<?php
																}
																if($rsPsale['rdg_area_number']){
																	?>
																	<b>พื้นที่</b> <?=number_format($rsPsale['rdg_area_number']);?> <?=$rsPsale['ru_name'];?><br>
																	<?php	
																
																}
															
															}
															?> 
															
															
															<b>แก้ไขล่าสุด</b> 
															<p style='font-size: 11px;'>
															<?
															
															$eng_date=strtotime($rsPsale['rdg_update']);
															echo thai_date($eng_date);
															?>
															</p>
		
															</div>
							
														</div>
														<div class="row box-margin-top5">
															<div class="col-xs-12">
																<p>
																<button data-target="#contactFormModal" data-toggle="modal" class="btn-u btn-u-xs btn-u-green contactFormModal" type="button" id="<?=$rsPsale['cus_id']?>-<?=$rsPsale['rdg_id']?>"><i class="fa fa-child "></i> ติดต่อผู้ลงประกาศ</button>
																<button data-target="#mapContactModal" data-toggle="modal" class="btn-u btn-u-xs btn-u-green mapContactModal" type="button" id="<?=$rsPsale['rdg_id']?>"><i class="fa  fa-car"></i> แผนที่</button>
																<button data-target="#imageSlideModal" data-toggle="modal" class="btn-u btn-u-xs btn-u-green imageSlideModal" type="button" id="<?=$rsPsale['rdg_id']?>"><i class="glyphicon glyphicon-picture"></i> ภาพสไลด์</button>
																<button id="<?=$rsPsale['rdg_id']?>" class="btn-u btn-u-xs btn-u-green btnSavePost" type="button"><i class="fa fa-download"></i> เก็บไว้ดูภายหลัง</button>
																</p>
															</div>
														</div>
													</div>
												</div>
									<!-- end  post  -->	
					                		</td>
					                	</tr>
													
										               
										               
									
								<?php 
									}
                                ?>
                              				
								</tbody>
							</table>
							<!-- grid table end --> 
										              
			</div>					
		</div>
      </div>
</div>



  
 </div>
 

 <?php 
	}
 ?>
 
 <script>
 	/*
	$("#saveForLater").click(function(){
		alert("บันทึกประกาศเพื่อเก็บไว้ดูภายหลังเรียบร้อย");
	});
	*/
</script>
 
  