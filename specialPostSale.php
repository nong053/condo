<?php 
if($conn){
$strSLQPsale="
select rdg.rt_id,rt.rt_name,
rdg.rdg_id,rdg_title,rdg.rdg_address_no,
rdg.rdg_address_province_id,p.PROVINCE_NAME,
rdg_address_district_id,am.AMPHUR_NAME,
rdg_address_sub_district_id,d.DISTRICT_NAME,
rdg_address_road,rdg_post_code
rdg_price,rdg_price_down,rdg_price_rent,rdg_price_project,
rdg_area_number,rdg_area_unit,ru.ru_name,
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
where rf_id=1 order by rdg_id  
limit 5			
";
}

function numResultFn($rf_id){
$strSQLnum="select count(*) as allPage from realty_data_general  where rf_id='".$rf_id."'";
$result=mysql_query($strSQLnum);
$rs=mysql_fetch_array($result);
return $rs['allPage'];
}
?>
<div class="row">
	<div class="panel panel-u" style="margin-bottom: 5px;">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tasks"></i> ประกาศขายพิเศษ</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                
                                <?php 
                                $resultPsale=mysql_query($strSLQPsale);
                                while($rsPsale=mysql_fetch_array($resultPsale)){
                                ?>	
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
													<button onclick="window.location.href='index.php?page=post_sub_detail'" class="box-margin-top5 btn-u btn-u-red btn-left-right" type="button"><i class="fa fa-building "></i> คลิ๊กรายละเอียด</button>
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
														<button data-target="#contactFormModal" data-toggle="modal" class="btn-u btn-u-xs btn-u-green" type="button"><i class="fa fa-child "></i> ติดต่อผู้ลงประกาศ</button>
														<button data-target="#mapContactModal" data-toggle="modal" class="btn-u btn-u-xs btn-u-green" type="button"><i class="fa  fa-car"></i> แผนที่</button>
														<button data-target="#imageSlideModal" data-toggle="modal" class="btn-u btn-u-xs btn-u-green" type="button"><i class="glyphicon glyphicon-picture"></i> ภาพสไลด์</button>
														<button id="saveForLater" class="btn-u btn-u-xs btn-u-green" type="button"><i class="fa fa-download"></i> เก็บไว้ดูภายหลัง</button>
														</p>
													</div>
												</div>
											</div>
										</div>
										
									<!-- end  post  -->	
								<?php 
									}
                                ?>
                              				
									
										              
			</div>					
		</div>
      </div>
</div>

<script>
	$("#saveForLater").click(function(){
		alert("บันทึกประกาศเพื่อเก็บไว้ดูภายหลังเรียบร้อย");
	});
</script>

<div aria-labelledby="contactFormModal" role="dialog" tabindex="-1" class="modal fade" id="contactFormModal" style="display: none;">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          <h4 id="gridModalLabel" class="modal-title">ติดต่อเจ้าของไปทางประกาศ</h4>
        </div>
        <div class="modal-body">
          
          <form action="#" class="sky-form">
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
			<button type="submit" class="btn-u">คลิ๊กเพื่อส่งอีเมลล์</button>
			
			</footer>
			</form>
			
			
          
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
        <div class="modal-body">
        
          
          <div style="position: relative; background-color: rgb(229, 227, 223); overflow: hidden;" id="map" class="map margin-bottom-50"><div class="gm-style" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;"><div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0; cursor: url(&quot;http://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default;"><div style="position: absolute; left: 0px; top: 0px; z-index: 1; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; position: absolute; left: 320px; top: -33px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 64px; top: -33px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 320px; top: -289px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 320px; top: 223px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 576px; top: -33px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 64px; top: -289px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 64px; top: 223px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 576px; top: -289px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 576px; top: 223px;"></div><div style="width: 256px; height: 256px; position: absolute; left: -192px; top: -33px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 832px; top: -33px;"></div><div style="width: 256px; height: 256px; position: absolute; left: -192px; top: -289px;"></div><div style="width: 256px; height: 256px; position: absolute; left: -192px; top: 223px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 832px; top: -289px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 832px; top: 223px;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 320px; top: -33px;"><canvas width="256" height="256" style="-moz-user-select: none; position: absolute; left: 0px; top: 0px; height: 256px; width: 256px;" draggable="false"></canvas></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 64px; top: -33px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 320px; top: -289px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 320px; top: 223px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 576px; top: -33px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 64px; top: -289px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 64px; top: 223px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 576px; top: -289px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 576px; top: 223px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -192px; top: -33px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 832px; top: -33px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -192px; top: -289px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -192px; top: 223px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 832px; top: -289px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 832px; top: 223px;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="position: absolute; left: 64px; top: -33px; width: 256px; height: 256px; transition: opacity 200ms ease-out 0s;"><img draggable="false" src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i15!2i9648!3i12315!2m3!1e0!2sm!3i313135093!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" style="-moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; width: 256px; height: 256px;"></div><div style="position: absolute; left: 576px; top: 223px; width: 256px; height: 256px; transition: opacity 200ms ease-out 0s;"><img draggable="false" src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i15!2i9650!3i12316!2m3!1e0!2sm!3i313135093!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" style="-moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; width: 256px; height: 256px;"></div><div style="position: absolute; left: 64px; top: -289px; width: 256px; height: 256px; transition: opacity 200ms ease-out 0s;"><img draggable="false" src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i15!2i9648!3i12314!2m3!1e0!2sm!3i313167499!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" style="-moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; width: 256px; height: 256px;"></div><div style="position: absolute; left: 576px; top: -33px; width: 256px; height: 256px; transition: opacity 200ms ease-out 0s;"><img draggable="false" src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i15!2i9650!3i12315!2m3!1e0!2sm!3i313135093!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" style="-moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; width: 256px; height: 256px;"></div><div style="position: absolute; left: 320px; top: -33px; width: 256px; height: 256px; transition: opacity 200ms ease-out 0s;"><img draggable="false" src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i15!2i9649!3i12315!2m3!1e0!2sm!3i313135093!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" style="-moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; width: 256px; height: 256px;"></div><div style="position: absolute; left: 320px; top: -289px; width: 256px; height: 256px; transition: opacity 200ms ease-out 0s;"><img draggable="false" src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i15!2i9649!3i12314!2m3!1e0!2sm!3i313135093!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" style="-moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; width: 256px; height: 256px;"></div><div style="position: absolute; left: 64px; top: 223px; width: 256px; height: 256px; transition: opacity 200ms ease-out 0s;"><img draggable="false" src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i15!2i9648!3i12316!2m3!1e0!2sm!3i313135093!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" style="-moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; width: 256px; height: 256px;"></div><div style="position: absolute; left: -192px; top: -289px; width: 256px; height: 256px; transition: opacity 200ms ease-out 0s;"><img draggable="false" src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i15!2i9647!3i12314!2m3!1e0!2sm!3i313197015!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" style="-moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; width: 256px; height: 256px;"></div><div style="position: absolute; left: 576px; top: -289px; width: 256px; height: 256px; transition: opacity 200ms ease-out 0s;"><img draggable="false" src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i15!2i9650!3i12314!2m3!1e0!2sm!3i313135093!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" style="-moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; width: 256px; height: 256px;"></div><div style="position: absolute; left: 832px; top: -33px; width: 256px; height: 256px; transition: opacity 200ms ease-out 0s;"><img draggable="false" src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i15!2i9651!3i12315!2m3!1e0!2sm!3i313186935!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" style="-moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; width: 256px; height: 256px;"></div><div style="position: absolute; left: -192px; top: -33px; width: 256px; height: 256px; transition: opacity 200ms ease-out 0s;"><img draggable="false" src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i15!2i9647!3i12315!2m3!1e0!2sm!3i313140137!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" style="-moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; width: 256px; height: 256px;"></div><div style="position: absolute; left: -192px; top: 223px; width: 256px; height: 256px; transition: opacity 200ms ease-out 0s;"><img draggable="false" src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i15!2i9647!3i12316!2m3!1e0!2sm!3i313135093!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" style="-moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; width: 256px; height: 256px;"></div><div style="position: absolute; left: 832px; top: 223px; width: 256px; height: 256px; transition: opacity 200ms ease-out 0s;"><img draggable="false" src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i15!2i9651!3i12316!2m3!1e0!2sm!3i313186935!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" style="-moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; width: 256px; height: 256px;"></div><div style="position: absolute; left: 832px; top: -289px; width: 256px; height: 256px; transition: opacity 200ms ease-out 0s;"><img draggable="false" src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i15!2i9651!3i12314!2m3!1e0!2sm!3i313135093!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" style="-moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; width: 256px; height: 256px;"></div><div style="position: absolute; left: 320px; top: 223px; width: 256px; height: 256px; transition: opacity 200ms ease-out 0s;"><img draggable="false" src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i15!2i9649!3i12316!2m3!1e0!2sm!3i313135093!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" style="-moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; width: 256px; height: 256px;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 2; width: 100%; height: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 3; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a title="Click to see this area on Google Maps" href="https://maps.google.com/maps?ll=40.748866,-73.988366&amp;z=15&amp;t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3" target="_blank" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 62px; height: 26px; cursor: pointer;"><img draggable="false" src="http://maps.gstatic.com/mapfiles/api-3/images/google_white2.png" style="position: absolute; left: 0px; top: 0px; width: 62px; height: 26px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px;"></div></a></div><div style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto,Arial,sans-serif; color: rgb(34, 34, 34); box-shadow: 0px 4px 16px rgba(0, 0, 0, 0.2); z-index: 10000002; display: none; width: 256px; height: 148px; position: absolute; left: 277px; top: 84px;"><div style="padding: 0px 0px 10px; font-size: 16px;">Map Data</div><div style="font-size: 13px;">Map data &copy;2015 Google</div><div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;"><img draggable="false" src="http://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px;"></div></div><div style="z-index: 1000001; position: absolute; right: 282px; bottom: 0px; width: 121px;" class="gmnoprint"><div class="gm-style-cc" style="-moz-user-select: none;" draggable="false"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto,Arial,sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;"><a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer; display: none;">Map Data</a><span style="">Map data &copy;2015 Google</span></div></div></div><div style="position: absolute; right: 0px; bottom: 0px;" class="gmnoscreen"><div style="font-family: Roboto,Arial,sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data &copy;2015 Google</div></div><div draggable="false" style="z-index: 1000001; -moz-user-select: none; position: absolute; right: 113px; bottom: 0px;" class="gmnoprint gm-style-cc"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto,Arial,sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;"><a target="_blank" href="https://www.google.com/intl/en-US_US/help/terms_maps.html" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Terms of Use</a></div></div><div class="gm-style-cc" style="-moz-user-select: none; position: absolute; right: 18px; bottom: 0px;" draggable="false"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto,Arial,sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;"><a href="https://www.google.com/maps/@40.748866,-73.988366,15z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto,Arial,sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;" title="Report errors in the road map or imagery to Google" target="_new">Report a map error</a></div></div><div style="-moz-user-select: none; margin-left: 5px; margin-top: 5px; position: absolute; width: 13px; height: 13px; right: 0px; bottom: 0px;" draggable="false" class="gmnoprint"><div style="background-color: rgb(255, 255, 255); overflow: hidden; width: 120px; height: 120px; display: none;"><div style="position: absolute; left: 3px; top: 3px; width: 117px; height: 117px; background-color: rgb(229, 227, 223); overflow: hidden;"><div class="gm-style" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;"><div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0; cursor: url(&quot;http://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default;"><div style="position: absolute; left: 0px; top: 0px; z-index: 1; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; position: absolute; left: -279px; top: -189px;"></div><div style="width: 256px; height: 256px; position: absolute; left: -23px; top: -189px;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"></div><div style="position: absolute; z-index: 0; left: 0px; top: 0px;"><div style="overflow: hidden;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 2; width: 100%; height: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 3; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"><div style="border: 1px solid rgb(255, 255, 255); outline: 1px solid rgb(0, 0, 0); opacity: 0.35; position: absolute; margin-top: -11px; margin-left: -26px; width: 53px; height: 22px; left: 0px; top: 0px;"><div style="position: absolute; background: rgb(0, 0, 0) none repeat scroll 0% 0%; opacity: 0.7; width: 53px; height: 22px;"></div></div><div style="border: 1px solid rgb(255, 255, 255); outline: 1px solid rgb(0, 0, 0); opacity: 0.35; position: absolute; cursor: url(&quot;http://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; margin-top: -11px; margin-left: -26px; width: 53px; height: 22px; left: 0px; top: 0px;"><div style="position: absolute; width: 53px; height: 22px;"></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div></div></div></div><div style="width: 13px; height: 13px; position: absolute; cursor: pointer; left: 0px; top: 0px;"><div title="Open the overview map" style="width: 13px; height: 13px; overflow: hidden; position: absolute;"><img draggable="false" src="http://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" style="position: absolute; left: -2px; top: -364px; width: 59px; height: 492px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px;"></div></div></div><div controlheight="169" controlwidth="78" draggable="false" style="margin: 5px; -moz-user-select: none; position: absolute; left: 0px; top: 0px;" class="gmnoprint"><div style="cursor: url(&quot;http://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; width: 78px; height: 78px; position: absolute; left: 0px; top: 0px;" controlheight="80" controlwidth="78" class="gmnoprint"><div style="width: 78px; height: 78px; position: absolute; left: 0px; top: 0px;" controlheight="80" controlwidth="78" class="gmnoprint"><div style="visibility: hidden;"><svg viewBox="0 0 78 78" height="78px" width="78px" overflow="hidden" version="1.1" style="position: absolute; left: 0px; top: 0px;"><circle stroke="#f2f4f6" fill="#f2f4f6" fill-opacity="0.2" stroke-width="3" r="35" cy="39" cx="39"/><g transform="rotate(0 39 39)"><rect fill="#f2f4f6" stroke-width="1" stroke="#a6a6a6" height="11" width="12" ry="4" rx="4" y="0" x="33"/><polyline stroke="#000" fill="#f2f4f6" stroke-width="1.5" stroke-linejoin="bevel" points="36.5,8.5 36.5,2.5 41.5,8.5 41.5,2.5"/></g></svg></div></div><div style="position: absolute; left: 10px; top: 11px;" controlheight="59" controlwidth="59" class="gmnoprint"><div style="width: 59px; height: 59px; overflow: hidden; position: relative;"><img draggable="false" src="http://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" style="position: absolute; left: 0px; top: 0px; width: 59px; height: 492px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px;"><div title="Pan left" style="position: absolute; left: 0px; top: 20px; width: 19.6667px; height: 19.6667px; cursor: pointer;"></div><div title="Pan right" style="position: absolute; left: 39px; top: 20px; width: 19.6667px; height: 19.6667px; cursor: pointer;"></div><div title="Pan up" style="position: absolute; left: 20px; top: 0px; width: 19.6667px; height: 19.6667px; cursor: pointer;"></div><div title="Pan down" style="position: absolute; left: 20px; top: 39px; width: 19.6667px; height: 19.6667px; cursor: pointer;"></div></div></div></div><div style="cursor: url(&quot;http://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; position: absolute; left: 23px; top: 85px;" controlheight="40" controlwidth="32"><div aria-label="Street View Pegman Control" style="width: 32px; height: 40px; overflow: hidden; position: absolute; left: 0px; top: 0px;"><img draggable="false" src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout2.png" style="position: absolute; left: -9px; top: -102px; width: 1028px; height: 214px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px;"></div><div aria-label="Pegman is disabled" style="width: 32px; height: 40px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img draggable="false" src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout2.png" style="position: absolute; left: -107px; top: -102px; width: 1028px; height: 214px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px;"></div><div aria-label="Pegman is on top of the Map" style="width: 32px; height: 40px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img draggable="false" src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout2.png" style="position: absolute; left: -58px; top: -102px; width: 1028px; height: 214px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px;"></div><div aria-label="Street View Pegman Control" style="width: 32px; height: 40px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img draggable="false" src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout2.png" style="position: absolute; left: -205px; top: -102px; width: 1028px; height: 214px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px;"></div></div><div controlheight="0" controlwidth="0" style="opacity: 0.6; display: none; position: absolute;" class="gmnoprint"><div title="Rotate map 90 degrees" style="width: 22px; height: 22px; overflow: hidden; position: absolute; cursor: pointer;"><img draggable="false" src="http://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" style="position: absolute; left: -38px; top: -360px; width: 59px; height: 492px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px;"></div></div><div style="position: absolute; left: 29px; top: 130px;" controlheight="39" controlwidth="20" class="gmnoprint"><div style="width: 20px; height: 39px; overflow: hidden; position: absolute;"><img draggable="false" src="http://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" style="position: absolute; left: -39px; top: -401px; width: 59px; height: 492px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px;"></div><div title="Zoom in" style="position: absolute; left: 0px; top: 2px; width: 20px; height: 17px; cursor: pointer;"></div><div title="Zoom out" style="position: absolute; left: 0px; top: 19px; width: 20px; height: 17px; cursor: pointer;"></div></div></div><div style="margin: 5px; z-index: 0; position: absolute; cursor: pointer; right: 0px; top: 0px;" class="gmnoprint"><div class="gm-style-mtc" style="float: left;"><div title="Show street map" draggable="false" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(0, 0, 0); font-family: Roboto,Arial,sans-serif; -moz-user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 1px 6px; border-bottom-left-radius: 2px; border-top-left-radius: 2px; background-clip: padding-box; border: 1px solid rgba(0, 0, 0, 0.15); box-shadow: 0px 1px 4px -1px rgba(0, 0, 0, 0.3); min-width: 22px; font-weight: 500;">Map</div><div style="background-color: white; z-index: -1; padding-top: 2px; background-clip: padding-box; border-width: 0px 1px 1px; border-style: none solid solid; border-color: -moz-use-text-color rgba(0, 0, 0, 0.15) rgba(0, 0, 0, 0.15); -moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; border-image: none; box-shadow: 0px 1px 4px -1px rgba(0, 0, 0, 0.3); position: absolute; left: 0px; top: 22px; text-align: left; display: none;"><div title="Show street map with terrain" draggable="false" style="color: rgb(0, 0, 0); font-family: Roboto,Arial,sans-serif; -moz-user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 3px 8px 3px 3px; direction: ltr; text-align: left; white-space: nowrap;"><span style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; background-color: rgb(255, 255, 255); border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle;" role="checkbox"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden; display: none;"><img draggable="false" src="http://maps.gstatic.com/mapfiles/mv/imgs8.png" style="position: absolute; left: -52px; top: -44px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Terrain</label></div></div></div><div class="gm-style-mtc" style="float: left;"><div title="Show satellite imagery" draggable="false" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(86, 86, 86); font-family: Roboto,Arial,sans-serif; -moz-user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 1px 6px; border-bottom-right-radius: 2px; border-top-right-radius: 2px; background-clip: padding-box; border-width: 1px 1px 1px 0px; border-style: solid solid solid none; border-color: rgba(0, 0, 0, 0.15) rgba(0, 0, 0, 0.15) rgba(0, 0, 0, 0.15) -moz-use-text-color; -moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; border-image: none; box-shadow: 0px 1px 4px -1px rgba(0, 0, 0, 0.3); min-width: 38px;">Satellite</div><div style="background-color: white; z-index: -1; padding-top: 2px; background-clip: padding-box; border-width: 0px 1px 1px; border-style: none solid solid; border-color: -moz-use-text-color rgba(0, 0, 0, 0.15) rgba(0, 0, 0, 0.15); -moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; border-image: none; box-shadow: 0px 1px 4px -1px rgba(0, 0, 0, 0.3); position: absolute; right: 0px; top: 22px; text-align: left; display: none;"><div title="Zoom in to show 45 degree view" draggable="false" style="color: rgb(184, 184, 184); font-family: Roboto,Arial,sans-serif; -moz-user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 3px 8px 3px 3px; direction: ltr; text-align: left; white-space: nowrap; display: none;"><span style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; background-color: rgb(255, 255, 255); border: 1px solid rgb(241, 241, 241); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle;" role="checkbox"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden; display: none;"><img draggable="false" src="http://maps.gstatic.com/mapfiles/mv/imgs8.png" style="position: absolute; left: -52px; top: -44px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">45°</label></div><div title="Show imagery with street names" draggable="false" style="color: rgb(0, 0, 0); font-family: Roboto,Arial,sans-serif; -moz-user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 3px 8px 3px 3px; direction: ltr; text-align: left; white-space: nowrap;"><span style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; background-color: rgb(255, 255, 255); border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle;" role="checkbox"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden;"><img draggable="false" src="http://maps.gstatic.com/mapfiles/mv/imgs8.png" style="position: absolute; left: -52px; top: -44px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Labels</label></div></div></div></div><div class="gm-style-cc" draggable="false" style="position: absolute; -moz-user-select: none; right: 184px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto,Arial,sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;"><span>200 m&nbsp;</span><div style="position: relative; display: inline-block; height: 8px; bottom: -1px; width: 55px;"><div style="width: 100%; height: 4px; position: absolute; background-color: rgb(255, 255, 255); left: 0px; top: 0px;"></div><div style="width: 4px; height: 8px; left: 0px; top: 0px; background-color: rgb(255, 255, 255);"></div><div style="width: 4px; height: 8px; position: absolute; background-color: rgb(255, 255, 255); left: 0px; bottom: 0px;"></div><div style="position: absolute; background-color: rgb(102, 102, 102); height: 2px; left: 1px; bottom: 1px; right: 1px;"></div><div style="position: absolute; width: 2px; height: 6px; left: 1px; top: 1px; background-color: rgb(102, 102, 102);"></div><div style="width: 2px; height: 6px; position: absolute; background-color: rgb(102, 102, 102); bottom: 1px; right: 1px;"></div></div></div></div></div></div>
			
			
          
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
  
  
  
  
  <div aria-labelledby="contactFormModal" role="dialog" tabindex="-1" class="modal fade" id="contactFormModal" style="display: none;">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          <h4 id="gridModalLabel" class="modal-title">ติดต่อเจ้าของไปทางประกาศ</h4>
        </div>
        <div class="modal-body">
          
          <form action="#" class="sky-form">
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
			<button type="submit" class="btn-u">คลิ๊กเพื่อส่งอีเมลล์</button>
			
			</footer>
			</form>
			
			
          
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
          <h4 id="gridModalLabel" class="modal-title">แผนที่</h4>
        </div>
        <div class="modal-body">
        
          
          
          <img alt="" src="assets/img/main/img9.jpg" width="550">
         <ul style="margin-top:2px;" class="list-unstyled">
			<button style="height:80px; width:100px;" class="btn-u btn-u-default" type="button">img1</button>
			<button style="height:80px;width:100px;" class="btn-u btn-u-default" type="button">img2</button>
			<button style="height:80px; width:100px;" class="btn-u btn-u-default" type="button">img3</button>
			<button style="height:80px; width:100px;" class="btn-u btn-u-default" type="button">img4</button>
			<button style="height:80px;width:100px;" class="btn-u btn-u-default" type="button">img5</button>
			
		</ul>
          
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