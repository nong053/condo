
<?php 
include("realty_split.php");
include_once 'config.inc.php';
//realty main start
$embed_rt_id=$_POST['embed_rt_id'];
if($embed_rt_id==""){
	$embed_rt_id="All";
}
$rdg_address_province_id=$_POST['rdg_address_province_id'];
if($rdg_address_province_id==""){
	$rdg_address_province_id="All";
}
$rdg_address_district_id=$_POST['rdg_address_district_id'];
if($rdg_address_district_id==""){
	$rdg_address_district_id="All";
}
$rdg_address_sub_district_id=$_POST['rdg_address_sub_district_id'];
if($rdg_address_sub_district_id==""){
	$rdg_address_sub_district_id="All";
}
$rdg_bts=$_POST['rdg_bts'];
if($rdg_bts==""){
	$rdg_bts="All";
}
$rdg_bus=$_POST['rdg_bus'];
if($rdg_bus==""){
	$rdg_bus="All";
}
$rdg_harbor=$_POST['rdg_harbor'];
if($rdg_harbor==""){
	$rdg_harbor="All";
}
$rdg_id=$_POST['rdg_id'];
if($rdg_id==""){
	$rdg_id="All";
}
$rdg_mrt=$_POST['rdg_mrt'];
if($rdg_mrt==""){
	$rdg_mrt="All";
}
$rdg_road=$_POST['rdg_road'];
if($rdg_road==""){
	$rdg_road="All";
}
//realty main start
//realty sub post start
$rdg_price_start=$_POST['rdg_price_start'];
$rdg_price_end=$_POST['rdg_price_end'];
$rdg_area_number=$_POST['rdg_area_number'];
$rdg_area_unit=$_POST['rdg_area_unit'];
$rdr_bedroom=$_POST['rdr_bedroom'];

//realty sub post end
if($_POST['paramAction']=="searchQuick"){
	$searchQuick=$_POST['searchQuick'];
	
	$strSQLPostDetail="
	select rdg.*,rt_name,rf_name,rps_name from realty_data_general rdg
	LEFT JOIN realty_type rt
	ON rdg.rt_id=rt.rt_id
	LEFT JOIN realty_for rf
	ON rdg.rf_id=rf.rf_id
	LEFT JOIN realty_project_status rps
	ON rdg.rps_id=rps.rps_id
	WHERE (rt_name like '%$searchQuick%')
	or (rf_name like '%$searchQuick%')
	or (rps_name like '%$searchQuick%')
	or (rdg_name_project like '%$searchQuick%')
	or (rdg_detail like '%$searchQuick%')
	or (rdg_title like '%$searchQuick%')";
	
	
}else if($_POST['paramAction']=="searchSubPost"){
//realty sub port start	

	
	$strSQLPostDetail="
	
	
	select rdg.*,rt_name,rf_name,rps_name,ru_name,rdr_bedroom from realty_data_general rdg
	LEFT JOIN realty_type rt
	ON rdg.rt_id=rt.rt_id
	LEFT JOIN realty_for rf
	ON rdg.rf_id=rf.rf_id
	LEFT JOIN realty_project_status rps
	ON rdg.rps_id=rps.rps_id
	
	LEFT JOIN realty_unit ru 
	ON ru.ru_id=rdg_area_unit
	LEFT JOIN realty_detail_room rdr
	ON rdr.rdg_id=rdg.rdg_id
	
	WHERE (rdg.rt_id='$embed_rt_id' or 'All'='$embed_rt_id')
	AND (rdg.rdg_address_province_id='$rdg_address_province_id' or 'All'='$rdg_address_province_id')
	AND (rdg.rdg_address_district_id='$rdg_address_district_id' or 'All'='$rdg_address_district_id')
	AND (rdg.rdg_address_sub_district_id='$rdg_address_sub_district_id' or 'All'='$rdg_address_sub_district_id')
	AND (rdg.rdg_address_road='$rdg_road' or 'All'='$rdg_road')
	AND (rdg.rdg_bts='$rdg_bts' or 'All'='$rdg_bts')
	AND (rdg.rdg_mrt='$rdg_mrt' or 'All'='$rdg_mrt')
	AND (rdg.rdg_arl='' or 'All'='All')
	AND (rdg.rdg_harbor='$rdg_harbor' or 'All'='$rdg_harbor')
	
	
	AND (rdg_price BETWEEN '$rdg_price_start' AND '$rdg_price_end'  or 'All'='$rdg_price_start' or 'All'='$rdg_price_end')
	AND (rdg_area_number<='$rdg_area_number' or 'All'='$rdg_area_number')
	AND (rdg_area_unit='$rdg_area_unit'  or 'All'='$rdg_area_unit')
	AND (rdr_bedroom='$rdr_bedroom'   or 'All'='$rdr_bedroom')
	
		
	
	
	";

	
//realty sub port end
}else{

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
	WHERE (rdg.rt_id='$embed_rt_id' or 'All'='$embed_rt_id')
	AND (rdg.rdg_address_province_id='$rdg_address_province_id' or 'All'='$rdg_address_province_id')
	AND (rdg.rdg_address_district_id='$rdg_address_district_id' or 'All'='$rdg_address_district_id')
	AND (rdg.rdg_address_sub_district_id='$rdg_address_sub_district_id' or 'All'='$rdg_address_sub_district_id')
	AND (rdg.rdg_address_road='$rdg_road' or 'All'='$rdg_road')
	AND (rdg.rdg_bts='$rdg_bts' or 'All'='$rdg_bts')
	AND (rdg.rdg_mrt='$rdg_mrt' or 'All'='$rdg_mrt')
	AND (rdg.rdg_arl='' or 'All'='All')
	AND (rdg.rdg_harbor='$rdg_harbor' or 'All'='$rdg_harbor')
			
	
	
			";
}
	$resultPostDetail=mysql_query($strSQLPostDetail);
	//$resultPostDetail=pu_query($dbname,$strSQLPostDetail);
	
	
	$resultPostDetail2=mysql_query($strSQLPostDetail);
	$rsPostDetail2=mysql_fetch_array($resultPostDetail2);
	
	
	
	
?>
<script src="Controller/page/cPostDetail.js"></script>    	
<div class="blog margin-bottom-5">
		 <!--  include searshSubPostRealty Start -->
		 <?php include_once 'searchSubPostRealty.php';?>
		 <!--  include searshSubPostRealty End -->
		 <div class="row">
					<div class="panel  panel-red" style="margin-bottom: 5px;">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-tasks"></i> ผลการคค้นหา<?=$rsPostDetail2['rt_name']?></h3>
						</div>
						<div class="panel-body">

											<div class="row">

												<!-- Begin Easy Block -->                
												<div class="col-md-12 col-sm-12">

													

													<div class="easy-block-v2">

													<!-- start button link -->
													<p>
														<button type="button" class="btn-u  btn-u-xs  btn-u-green"><i class="fa fa-cloud"></i> แชร์ไปที่เฟสบุ๊ค/กูเกิล</button>
														<button type="button" class="btn-u  btn-u-xs  btn-u-green"><i class="fa fa-bell-o"></i>ส่งหน้านี้ให้เพิ่อน</button>
														<!-- <button type="button" class="btn-u  btn-u-xs  btn-u-green"><i class="fa fa-envelope-o"></i> เก็บหน้านี้ไว้ดูครั้งหน้า</button> -->
														<button type="button" class="btn-u  btn-u-xs  btn-u-green"><i class="fa fa-download"></i>คลิ๊กดูหน้าที่จัดเก็บไว้</button>
														<button type="button" class="btn-u  btn-u-xs  btn-u-green"><i class="fa fa-download"></i>ปริ้น</button>
													
													</p>
													<!--end  button link -->
												


													<div class="alert alert-success fade in ">
														<div class="row">
																<div class="col-md-6">
																	<h3 style="margin:0px;">ประกาศอสังหาริมทรัพย์</h3>
																</div>
																<div class="col-md-6" style="text-align:right; padding:2px;">
																	<h3 style="margin:0px;"><?=$rsPostDetail2['rt_name']?></h3>
																</div>
														</div>
													</div>

													<div class="alert alert-warning  fade in ">
														<div class="row">
																<div class="col-md-6">
																	<h3 style="margin:0px;"><?=$rsPostDetail2['rt_name']?></h3>
																</div>
																<div class="col-md-6" style="text-align:right; padding:2px;">
																	<h3 style="margin:0px;"></h3>
																	<button type="button" class="btn-u btn-u-red"  style="padding: 3px;"><i class="fa fa-bell-o"></i>ขายดาวน์</button>
																</div>
														</div>
													</div>


												

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
															
													<table id="gridPostDedail">
										                <colgroup>
										                    <col />
										                   
										                </colgroup>
										                <thead>
										                    <tr>
										                        <th data-field="make">	ค้นหาพบ <?=numResultFn($embed_rt_id)?> รายการ</th>
										                       
										                    </tr>
										                </thead>
										                <tbody>
															<?php 
															while($rsPostDetail=mysql_fetch_array($resultPostDetail)){															
															?>
															
										                    <tr>
										                        <td>
												                       
												                   
												                  
												              
												              
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
																			<button type="button" class="btn-u  btn-u-xs btn-u-green"><i class="fa fa-child "></i> ติดต่อผู้ลงประกาศ</button>
																		<button type="button" class="btn-u  btn-u-xs btn-u-green"><i class="fa  fa-car"></i> แผนที่</button>
																		<button type="button" id="<?=$rsPostDetail['rdg_id']?>" class="btn-u  btn-u-xs btn-u-green btnSavePost"><i class="fa fa-download"></i> เก็บไว้ดูภายหลัง</button>
																		<button type="button" class="btn-u  btn-u-xs btn-u-red"  onclick="window.location.href='index.php?page=post_sub_detail&rdg_id=<?=$rsPostDetail['rdg_id']?>'"  type="button"><i class="fa fa-building "></i> ดูรายละเอียด</button>
																		
																		</p>
																		</div>

																	</div>
																</div>
															</div>
															<!-- end list realty -->
															</td>
															</tr>
															
															<?php
															}
															pu_pageloop();
															?>
															</tbody>
												          </table>
												          
												          
													</div> 

												</div>
												
												<!-- End Begin Easy Block -->                
															  
											</div>

							  </div>
				</div>
		   </div>
</div>
<!--End Blog Post0-->      

