<script src="Controller/page/cSpecialPost.js"></script>  
<?php 
function numResultFn($rf_id){
	$strSQLnum="select count(*) as allPage from realty_data_general  where rf_id='".$rf_id."'";
	$result=mysql_query($strSQLnum);
	$rs=mysql_fetch_array($result);
	return $rs['allPage'];
}

$strSLQSCCate="select * from realty_type_cate order by rtc_id";
$resultSCCate=mysql_query($strSLQSCCate);
while($rsSCCate=mysql_fetch_array($resultSCCate)){

	

		$strSLQPsale="
		select rdg.rt_id,rt.rt_name,rdg.cus_id,
		rdg.rdg_id,rdg_title,rdg.rdg_address_no,
		rdg.rdg_address_province_id,p.PROVINCE_NAME,
		rdg_address_district_id,am.AMPHUR_NAME,
		rdg_address_sub_district_id,d.DISTRICT_NAME,
		rdg_address_road,rdg_post_code
		rdg_price,rdg_price_down,rdg_price_rent,rdg_price_project,
		rdg_area_number,rdg_area_unit,ru.ru_name,rtc.rtc_detail
		rdg_update
		
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
		where rf_id=1 and rt.rt_contructor_cate=".$rsSCCate['rtc_id']." order by rdg_id  
				
		";
?>
 
<!--Blog Post-->        
<div class="blog margin-bottom-5">
<div class="row">
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
                                
                                		<tr>
					                		<td>
					                		<!--start  post  -->
												<div class="col-md-12 shadow-wrapper">
													<div class="tag-box tag-box-v1 box-shadow shadow-effect-2">
														
														<!--start button top post -->
														<div class="row">
					                                		<div class="col-md-12">
					                                			<p>
																	<button class="btn-u btn-u-xs btn-u-orange" type="button"><i class=" fa fa-search-plus"></i> ค้นหาพบ <?=numResultFn("1")?> ประกาศหน้าที่ 1 จาก <?=numResultFn("1")?> ประกาศ</button>
																	<button class="btn-u btn-u-xs btn-u-orange" type="button"><i class="icon-social-facebook"></i> แซร์ผ่านเฟสบุ๊ค</button>
																	<button class="btn-u btn-u-xs btn-u-orange" type="button"><i class=" icon-printer "></i> ปริ้น</button>
																	<button class="btn-u btn-u-xs btn-u-orange" type="button"><i class="fa fa-download"></i> บันทึกสิ่งที่ค้นหา</button>
																	<button class="btn-u btn-u-xs btn-u-orange" type="button"><i class="icon-grid "></i> ประกาศที่บันทึกไว้</button>
																</p>
					                                		</div>
					                                	</div>
					                                	<!--end button top post -->
														
														
														<div class="row">
															<div class="col-md-8 ">
															<h2>ประกาศขายพิเศษ รหัส <?=$rsPsale['rdg_id']?></h2>
															</div>
															<div class="col-md-4 ">
															<button onclick="window.location.href='index.php?page=post_sub_detail&rdg_id=<?=$rsPsale['rdg_id']?>'" class="box-margin-top5 btn-u btn-u-red btn-left-right" type="button"><i class="fa fa-building "></i> คลิ๊กรายละเอียด</button>
															</div>
														</div>
														<div class="row">
															<div class="col-md-5">
													
																
															
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
															<div class="col-md-6">
															<b>ขาย</b> <?=$rsPsale['rt_name']?> ราคา <?=$rsPsale['rdg_price']?>  			บาท<br>
															<b>ที่อยู่ </b>  <?if($rsPsale['PROVINCE_NAME'])echo"จังหวัด" .$rsPsale['PROVINCE_NAME'];?>
															 <?if($rsPsale['AMPHUR_NAME'])echo"อำเภอ/เขต:" .$rsPsale['AMPHUR_NAME']; ?>
															<?if($rsPsale['DISTRICT_NAME'])echo"ตำบล/แขวง:" .$rsPsale['DISTRICT_NAME'];?>
															<?if($rsPsale['rdg_address_no'])echo"เลขที่: ". $rsPsale['rdg_address_no'];?>
															<?if($rsPsale['rdg_post_code'])echo"รหัสไปษณีย์:". $rsPsale['rdg_post_code'];?><br>
															 
															<b>ที่ดิน</b> .............. ตารางวา<br>
															<b>พื้นที่</b> <?=$rsPsale['rdg_area_number'];?> <?=$rsPsale['ru_name'];?><br>
															<b>แก้ไขล่าสุด</b> <?=$rsPsale['rdg_update'];?><br>
		
															</div>
							
														</div>
														<div class="row box-margin-top5">
															<div class="col-md-12">
																<p>
																<button data-target="#contactFormModal" data-toggle="modal" class="btn-u btn-u-xs btn-u-green contactFormModal" type="button" id="<?=$rsPsale['cus_id']?>"><i class="fa fa-child "></i> ติดต่อผู้ลงประกาศ</button>
																<button data-target="#mapContactModal" data-toggle="modal" class="btn-u btn-u-xs btn-u-green mapContactModal" type="button" id="<?=$rsPsale['rdg_id']?>"><i class="fa  fa-car"></i> แผนที่</button>
																<button data-target="#imageSlideModal" data-toggle="modal" class="btn-u btn-u-xs btn-u-green imageSlideModal" type="button" id="<?=$rsPsale['rdg_id']?>"><i class="glyphicon glyphicon-picture"></i> ภาพสไลด์</button>
																<button id="saveForLater" class="btn-u btn-u-xs btn-u-green saveForLater" type="button"><i class="fa fa-download"></i> เก็บไว้ดูภายหลัง</button>
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
  <div aria-labelledby="contactFormModal" role="dialog" tabindex="-1" class="modal fade" id="contactFormModal" style="display: none;">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          <h4 id="gridModalLabel" class="modal-title">ติดต่อเจ้าของไปทางประกาศ</h4>
        </div>
        <div class="modal-body">
        
          	 <!-- from contract area start -->
	         <div id="contracFormtArea"></div>
	      	 <!-- from contract area end --> 
	        
        </div>
        <!-- 
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
          <button class="btn btn-primary" type="button">Save changes</button>
        </div>
         -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  
  <div aria-labelledby="mapContactModal" role="dialog" tabindex="-1" class="modal fade" id="mapContactModal" style="display: none;">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          <h4 id="gridModalLabel" class="modal-title">แผนที่</h4>
        </div>
        <div class="modal-body" >
          	 <!-- from contract area start -->
	         <div id="mapArea" style="width:570px; height:400px;"></div>
	      	 <!-- from contract area end --> 
        </div>
        <!-- 
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
          <button class="btn btn-primary" type="button">Save changes</button>
        </div>
         -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <div aria-labelledby="imageSlideModal" role="dialog" tabindex="-1" class="modal fade" id="imageSlideModal" style="display: none;">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          <h4 id="gridModalLabel" class="modal-title">รูปภาพ</h4>
        </div>
        <div class="modal-body">
        
          <div id="galleryRealtyArea"></div>
          <!-- 
         <img alt="" src="assets/img/main/img9.jpg" width="550">
         <ul style="margin-top:2px;" class="list-unstyled">
			<button style="height:80px; width:100px;" class="btn-u btn-u-default" type="button">img1</button>
			<button style="height:80px;width:100px;" class="btn-u btn-u-default" type="button">img2</button>
			<button style="height:80px; width:100px;" class="btn-u btn-u-default" type="button">img3</button>
			<button style="height:80px; width:100px;" class="btn-u btn-u-default" type="button">img4</button>
			<button style="height:80px;width:100px;" class="btn-u btn-u-default" type="button">img5</button>
		</ul>
           -->
        </div>
        <!-- 
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
          <button class="btn btn-primary" type="button">Save changes</button>
        </div>
         -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>