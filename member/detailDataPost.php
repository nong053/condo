<!-- detailData  -->
	<?php 
	$paramRealtyID=$_POST['paramRealtyID'];

	?>
	 <script src="../Controller/cDetailDataPost.js"></script> 
	<div class="tab-pane fade in " id="detailData">
	

<!--
ลักษณะพิเศษ (Special Features)
ประตูรีโมท
ติดทะเลสาบ, คลอง
วิวเมือง
บัตรผ่านเข้า-ออก
วิวดอย วิวสวน
วิวทะเล
วิวสระว่ายน้ำ
โรงจอดรถ
ตกแต่งสวน
บ่อปลา
บ่อน้ำพุ
สระว่ายน้ำส่วนตัว
นอกชาน, ลานบ้าน
ระเบียง
ศาลา
ครัวฝรั่ง
ระบบแสงสว่างควบคุมด้วยรีโมท
ระบบควบคุมประตูแบบ video
เครื่องจับควัน
ระบบไฟฟ้าฉุกเฉิน
โซล่าเซลล์
สภาพเดิม
ปรับปรุง, ทำใหม่
-->
			
			<!-- for  contractor -->
		<form id="realtyDataDetail" class="form-horizontal" role="form">
			<div class="headline"><h4>รายละเอียดอสังหาริมทรัพย์</h4></div>

				
				<!--<div id="areaRealtyRooms"></div>-->
			
				<!--start realty room start  -->	
				
				 <div class="form-group">
					<label class="col-lg-3 control-label"> จำนวนห้องนอน</label>
					<div class="col-lg-2">
						<select name="rdr_bedroom" id="rdr_bedroom" class="realtyRoom">
								<option value="">-- เลือก --</option>
								<?php 
								for($i=1;$i<=300;$i++){
									?>
									<option value="<?=$i?>"><?=$i?> ห้อง </option>
									<?php
								}
								?>
						</select>
					</div>
				</div>
				
				<!--end realty room start  -->
				<!--start realty room start  -->	
				
				 <div class="form-group">
					<label class="col-lg-3 control-label"> จำนวนห้องแม่บ้าน</label>
					<div class="col-lg-2">
						<select name="rdr_maid" id="rdr_maid" class="realtyRoom">
							<option value="">-- เลือก --</option>
							<?php 
								for($i=1;$i<=300;$i++){
									?>
									<option value="<?=$i?>"><?=$i?> ห้อง </option>
									<?php
								}
							?>
						</select>
					</div>
				</div>
				
				<!--end realty room start  -->
				<!--start realty room start  -->	
				
				 <div class="form-group">
					<label class="col-lg-3 control-label">จำนวนห้องน้ำ</label>
					<div class="col-lg-2">
						<select name="rdr_toilet" id="rdr_toilet" class="realtyRoom">
							<option value="">-- เลือก --</option>
							<?php 
								for($i=1;$i<=300;$i++){
									?>
									<option value="<?=$i?>"><?=$i?> ห้อง </option>
									<?php
								}
							?>
						</select>
					</div>
				</div>
				
				<!--end realty room start  -->
				<!--start realty room start  -->	
				
				 <div class="form-group">
					<label class="col-lg-3 control-label"> ห้องสตูดิโอ</label>
					<div class="col-lg-2">
						<select name="rdr_studio" id="rdr_studio" class="realtyRoom">
							<option value="">-- เลือก --</option>
							<?php 
								for($i=1;$i<=300;$i++){
									?>
									<option value="<?=$i?>"><?=$i?> ห้อง </option>
									<?php
								}
							?>
						</select>
					</div>
				</div>
				
				<!--end realty room start  -->
				<!--start realty room start  -->	
				
				 <div class="form-group">
					<label class="col-lg-3 control-label"> ห้องDeluxe</label>
					<div class="col-lg-2">
						<select name="rdr_deluxeRoom" id="rdr_deluxeRoom" class="realtyRoom">
							<option value="">-- เลือก --</option>
							<?php 
								for($i=1;$i<=300;$i++){
									?>
									<option value="<?=$i?>"><?=$i?> ห้อง </option>
									<?php
								}
							?>
						</select>
					</div>
				</div>
				
				<!--end realty room start  -->
				<!--start realty room start  -->	
				
				 <div class="form-group">
					<label class="col-lg-3 control-label"> ห้องExcutive</label>
					<div class="col-lg-2">
						<select name="rdr_excutiveRoom" id="rdr_excutiveRoom" class="realtyRoom">
							<option value="">-- เลือก --</option>
							<?php 
								for($i=1;$i<=300;$i++){
									?>
									<option value="<?=$i?>"><?=$i?> ห้อง </option>
									<?php
								}
							?>
						</select>
					</div>
				</div>
				
				<!--end realty room start  -->
				<!--start realty room start  -->	
				
				 <div class="form-group">
					<label class="col-lg-3 control-label"> ห้องนอนใหญ่</label>
					<div class="col-lg-2">
						<select name="rdr_masterBedroom" id="rdr_masterBedroom" class="realtyRoom">
							<option value="">-- เลือก --</option>
							<?php 
								for($i=1;$i<=300;$i++){
									?>
									<option value="<?=$i?>"><?=$i?> ห้อง </option>
									<?php
								}
							?>
						</select>
					</div>
				</div>
				
				<!--end realty room start  -->
				<!--start realty room start  -->	
				
				 <div class="form-group">
					<label class="col-lg-3 control-label"> ห้องนอนเล็ก</label>
					<div class="col-lg-2">
						<select name="rdr_smallBedroom" id="rdr_smallBedroom" class="realtyRoom">
							<option value="">-- เลือก --</option>
							<?php 
								for($i=1;$i<=300;$i++){
									?>
									<option value="<?=$i?>"><?=$i?> ห้อง </option>
									<?php
								}
							?>
						</select>
					</div>
				</div>
				
				<!--end realty room start  -->
				<!--start realty room start  -->	
				
				 <div class="form-group">
					<label class="col-lg-3 control-label"> ห้องประชุม</label>
					<div class="col-lg-2">
						<select name="rdr_meetingRoom" id="rdr_meetingRoom" class="realtyRoom">
							<option value="">-- เลือก --</option>
							<?php 
								for($i=1;$i<=300;$i++){
									?>
									<option value="<?=$i?>"><?=$i?> ห้อง </option>
									<?php
								}
							?>
						</select>
					</div>
				</div>
				
				<!--end realty room start  -->
				<!--start realty room start  -->	
				
				 <div class="form-group">
					<label class="col-lg-3 control-label">ห้องนั่งเล่น</label>
					<div class="col-lg-2">
						<select name="rdr_livingRoom" id="rdr_livingRoom" class="realtyRoom">
							<option value="">-- เลือก --</option>
							<?php 
								for($i=1;$i<=300;$i++){
									?>
									<option value="<?=$i?>"><?=$i?> ห้อง </option>
									<?php
								}
							?>
						</select>
					</div>
				</div>
				
				<!--end realty room start  -->
				<!--start realty room start  -->	
				
				 <div class="form-group">
					<label class="col-lg-3 control-label"> ห้องรับแขก</label>
					<div class="col-lg-2">
						<select name="rdr_drawingRoom" id="rdr_drawingRoom" class="realtyRoom">
							<option value="">-- เลือก --</option>
							<?php 
								for($i=1;$i<=300;$i++){
									?>
									<option value="<?=$i?>"><?=$i?> ห้อง </option>
									<?php
								}
							?>
						</select>
					</div>
				</div>
				
				<!--end realty room start  -->
				<!--start realty room start  -->	
				
				 <div class="form-group">
					<label class="col-lg-3 control-label"> ห้องเก็บของ</label>
					<div class="col-lg-2">
						<select name="rdr_storageRoom" id="rdr_storageRoom" class="realtyRoom">
							<option value="">-- เลือก --</option>
							<?php 
								for($i=1;$i<=300;$i++){
									?>
									<option value="<?=$i?>"><?=$i?> ห้อง </option>
									<?php
								}
							?>
						</select>
					</div>
				</div>
				
				<!--end realty room start  -->
				<!--start realty room start  -->	
				
				 <div class="form-group">
					<label class="col-lg-3 control-label"> ห้องครัว</label>
					<div class="col-lg-2">
						<select name="rdr_kitchen" id="rdr_kitchen" class="realtyRoom">
							<option value="">-- เลือก --</option>
							<?php 
								for($i=1;$i<=300;$i++){
									?>
									<option value="<?=$i?>"><?=$i?> ห้อง </option>
									<?php
								}
							?>
						</select>
					</div>
				</div>
				
				<!--end realty room start  -->
				<!--start realty room start  -->	
				
				 <div class="form-group">
					<label class="col-lg-3 control-label">ห้องซักรีด</label>
					<div class="col-lg-2">
						<select name="rdr_laundryRoom" id="rdr_laundryRoom" class="realtyRoom">
							<option value="">-- เลือก --</option>
							<?php 
								for($i=1;$i<=300;$i++){
									?>
									<option value="<?=$i?>"><?=$i?> ห้อง </option>
									<?php
								}
							?>
						</select>
					</div>
				</div>
				
				<!--end realty room start  -->
				<!--start realty room start  -->	
				
				 <div class="form-group">
					<label class="col-lg-3 control-label"> ที่จอดรถ</label>
					<div class="col-lg-2">
						<select name="rdr_parking" id="rdr_parking" class="realtyRoom">
							<option value="">-- เลือก --</option>
							<?php 
								for($i=1;$i<=300;$i++){
									?>
									<option value="<?=$i?>"><?=$i?> คัน </option>
									<?php
								}
							?>
						</select>
					</div>
				</div>
				
				<!--end realty room start  -->


			<!-- for  realty -->
			<div style="clear:both"></div>
			<div style="display:;">
			
			<div class="form-group">
						
				<div class="headline"><h4>ลักษณะพิเศษ</h4></div>

				<div id="areaRealtyCharacteristic"></div>

			</div>


			<div class="form-group">
						
				<div class="headline"><h4>รายละเอียดเพิ่มเติมภายในบ้าน</h4></div>
				<div id="areaRealtyInterior"></div>	

			</div>

			
			<div class="form-group">
						
				
					<div class="headline"><h4>สิ่งอำนวยความสะดวก</h4></div>
					<div id="areaRealtyFacility"></div>
				

			</div>


			
			<div style="clear:both"></div>
					
			<div class="form-group">
						
				<div class="headline"><h4>สถานที่ใกล้เคียง</h4></div>
				<div id="areaRealtyNearPlace"></div>

			</div>

		
			<!-- for  realty -->



			

	</div>
	<div class="form-group">
		<div class="col-lg-offset-3 col-lg-9">
			<button type="button" id="btn-back-step1" class="btn-u btn-u-yellow">  ย้อนกลับ  </button>
			<button type="button" id="btn-next-step3" class="btn-u btn-u-green">  ถัดไป  </button>
		</div>
	</div>
</form>
	
	<!-- End detailData -->