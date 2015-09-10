<?php session_start();?>
<?php 

include("../config.inc.php");
$cus_id=$_SESSION['cus_id'];
$rdg_id=$_POST['rdg_id'];
$strSQL1="
select rdg.*,rf_name,rt_name,rps_name,p.PROVINCE_NAME,d.DISTRICT_NAME,a.AMPHUR_NAME,ru.ru_name from realty_data_general rdg
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
LEFT JOIN realty_unit ru
on ru.ru_id=rdg.rdg_area_unit

where cus_id='$cus_id'
and rdg_id='$rdg_id'
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


?>

<link rel="stylesheet" href="../css/cssSummary.css" />
	<div class="headline"><h2>สรุปข้อมูลการประกาศอสังหาฯ1 </h2></div>
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
			
			<div class="col-md-9"><?=$rs1['rdg_price']?> บาท</div>
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
					<div id="map-canvas-summary" class="map-canvas-summary" ></div>
					
				</div>
		</div>
	<!-- -ข้อมูลที่ตั้ง-->
	<div class="headline"><h4>ข้อมูลเพิ่มเติม </h4></div>
	<!-- -ข้อมูลเพิ่มเติม-->
	<div class="row">
		<label class="col-md-3 control-label titleGroup" > ลักษณะพิเศษ  :</label>
		<div class="col-md-9">
			<ul>
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
</div>
	    

		  <div class="row">
				<label class="col-md-3 control-label titleGroup" > รายละเอียดเพิ่มเติมภายใน  :</label>
				<div class="col-md-9">
					<ul>
						<?php 
						while($rs3=mysql_fetch_array($result3)){
							
							if($rs3['rdi_id']){
								?>
									<li>
										<?=$rs3['rdi_detail'];?>
									</li>
								<?php 
							}
						};
						?>
					</ul>
				</div>
		</div>

		 <div class="row">
				<label class="col-md-3 control-label titleGroup" > สิ่งอำนวยความสะดวก  :</label>
				<div class="col-md-9">
					<ul>
						<?php 
						while($rs3=mysql_fetch_array($result3)){
							
							if($rs3['rdf_id']){
								?>
									<li>
										<?=$rs3['rdf_detail'];?>
									</li>
								<?php 
							}
						};
						?>
					</ul>
				</div>
		</div>

		 <div class="row">
				<label class="col-md-3 control-label titleGroup" > สถานที่ใกล้เคียง  :</label>
				<div class="col-md-9">
					<ul>
						<?php 
						while($rs3=mysql_fetch_array($result3)){
							
							if($rs3['rdnp_id']){
								?>
									<li>
										<?=$rs3['rdnp_detail'];?>
									</li>
								<?php 
							}
						};
						?>
					</ul>
				</div>
		</div>
	<!-- -ข้อมูลเพิ่มเติม-->
	<div class="headline"><h4>ข้อมูลรูปภาพ/วีดีโอ </h4></div>
	<!-- -ข้อมูลรูปภาพ/วีดีโอ-->
	<div class="headline"><h5>ข้อมูลรูปภาพ </h5></div>
		<div class="row">
		
	<?php	
		
		$strSQL="select * from realty_images where rdg_id='$rdg_id' ORDER BY ri_set_first ";
		$result=mysql_query($strSQL);
		
		$i=1;
		while($rs=mysql_fetch_array($result)){
			//จัดการกับรูปภาพ
			$thumbnailsPath="../realtyPicture/".$rdg_id."/".$rs[ri_id]."/thumbnail/";
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
		<div class="col-md-4">
			<div class="thumbnails thumbnail-style">
				<img alt="" src="<?=$thumbnailsFile?>" class="img-responsive">
			</div>
		</div>
		<?
		$i++;
		}
?>	
			<!-- 
			<div class="col-md-4">
				<div class="thumbnails thumbnail-style">
					<img class="img-responsive" src="../assets/img/main/img22.jpg" alt="">
					<div class="caption">
						
						
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="thumbnails thumbnail-style">
					<img class="img-responsive" src="../assets/img/main/img26.jpg" alt="">
					<div class="caption">
						
					
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="thumbnails thumbnail-style">
					<img class="img-responsive" src="../assets/img/main/img25.jpg" alt="">
					<div class="caption">
						
						
					</div>
				</div>
			</div>
			 -->
		</div>
		<div class="headline"><h5>ข้อมูลวีดีโอ </h5></div>
		<div class="row margin-bottom-60">
			<!-- Vimeo Video -->  
			<?php 
			$sqlVDO="select * from realty_embed_video where rdg_id='$rdg_id'";
			$resultVDO=mysql_query($sqlVDO)or die (mysql_error());
			$rsVDO=mysql_fetch_array($resultVDO);
			?>

			<div class="col-md-12">
			
					<?=$rsVDO['rev_embed_code']?>
				
			</div>
			<?php
			?>  
			<!-- Start Vimeo Video -->         
			<!--
			<div class="col-md-6">
				<div class="responsive-video md-margin-bottom-40">
					<iframe width="100%" frameborder="0" allowfullscreen="" src="//www.youtube.com/embed/4dmt7tQG1-w"></iframe>
				</div>
			</div>
			 --> 
			<!-- End Vimeo Video -->
		</div>
	<!-- -ข้อมูลรูปภาพ/วีดีโอ-->
	<div class="form-group">
		<div class="col-lg-offset-3 col-lg-9">
			<button class="btn-u btn-u-green" type="button">  ยืนยันและบันทึกข้อมูล  </button>
		</div>
	</div>