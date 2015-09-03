<script src="../Controller/cProfile.js"></script>
<?php 
//echo $cus_id;
$strSQL="";
?>
<form role="form" name="formCus" class="form-horizontal">
	<div class="headline"><h4>ข้อมูลส่วนตัว</h4></div>

	<div class="form-group">												
		<label for="inputEmail1" class="col-lg-3 control-label"> คำนำหน้า</label>
		<div class=" col-lg-1">
			<div class="checkbox">
				<label>
					<input type="radio" name="cus_title_name">นาย 
				</label>
			</div>
		</div>
		<div class=" col-lg-1">
			<div class="checkbox">
				<label>
					<input type="radio" name="cus_title_name"> นาง 
				</label>
			</div>
		</div>
		<div class=" col-lg-2">
			<div class="checkbox">
				<label>
					<input type="radio" name="cus_title_name"> นางสาว
				</label>
			</div>
		</div>
	</div>


	<div class="form-group">
		<label class="col-lg-3 control-label titleGroup"  for="cus_first_name"> ชื่อ</label>
		<div class="col-lg-5">
			<input type="text" placeholder="ชื่อ" id="cus_first_name" name="cus_first_name" class="form-control">
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg-3 control-label titleGroup"  for="cus_last_name"> นามสกุล</label>
		<div class="col-lg-5">
			<input type="text" placeholder="นามสกุล" id="cus_last_name" name="cus_last_name" class="form-control">
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg-3 control-label titleGroup"  for="cus_birthday_dd"> วัน/เดือน/ปีเกิด</label>
		<div class="col-lg-9">
			<select class="optionInput_register x-small inlinebox" id="cus_birthday_dd" name="cus_birthday_dd">
			<option selected="" value="">- เลือกวัน -</option>
			<?php 
				for($i=1;$i<=31;$i++){
					?>
					<option  value="<?=$i?>"><?=$i?></option> 
					<?php
				}
				?>
			</select>
			<?php 
			$arrayMonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
			echo count($arrayMonth);
			?>
			<select id="cus_birthday_mm" name="cus_birthday_mm">
				<option selected="" value="">- เลือกเดือน -</option>
				<?php 
				for($i=0;$i<count($arrayMonth);$i++){
					?>
					<option  value="<?=$i+1?>"><?=$arrayMonth[$i]?></option> 
					<?php
				}
				?>
				
			</select>
			<?php 
			$yyyyStart= date("Y")+543;
			$yyyyEnd= date("Y")+443;
			?>
			<select  class="optionInput_register x-small inlinebox" id="cus_birthday_yyyy" name="cus_birthday_yyyy">
				<option selected="" value="">- เลือกปี -</option>
				<?php 
				
				for($i=$yyyyStart;$i>=$yyyyEnd;$i--){
					?>
					<option  value="<?=$i?>"><?=$i?></option> 
					<?php
				}
				?>
				 
				 
			</select>
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg-3 control-label titleGroup"  for="cus_email"> อีเมล์</label>
		<div class="col-lg-5">
			<input type="text" placeholder="อีเมล์" id="cus_email" name="cus_email" class="form-control">
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg-3 control-label titleGroup"  for="cus_tel"> เบอร์โทรศัพท์มือถือ</label>
		<div class="col-lg-5">
			<input type="text" placeholder="เบอร์โทรศัพท์มือถือ" id="cus_tel" name="cus_tel" class="form-control">
		</div>
	</div>


	

	<div class="form-group">												
		<label for="cus_show_tel" class="col-lg-3 control-label"> แสดงเบอร์โทรศัพท์มือถือ</label>
		<div class=" col-lg-1">
			<div class="checkbox">
				<label>
					<input name="cus_show_tel" id="cus_show_tel" type="radio" value="show">แสดง 
				</label>
			</div>
		</div>
		<div class=" col-lg-2">
			<div class="checkbox">
				<label>
					<input name="cus_show_tel" id="cus_show_tel" type="radio" value="hide"> ไม่แสดง 
				</label>
			</div>
		</div>
		
	</div>


	<div class="form-group">
		<label class="col-lg-3 control-label titleGroup"  for="cus_tel2"> เบอร์โทรศัพท์มือถือ (สำรอง)</label>
		<div class="col-lg-5">
			<input type="text" placeholder="เบอร์โทรศัพท์มือถือ (สำรอง)" id="cus_tel2" name="cus_tel2" class="form-control">
		</div>
	</div>


	<div class="form-group">
		<label class="col-lg-3 control-label titleGroup"  for="cus_province"> จังหวัด</label>
		<div class="col-lg-9" >
		<div id="provinceArea">
			<select  class="optionInput" id="cus_province" name="cus_province">
			  <option selected="" value="">-- กรุณาเลือกจังหวัด --</option> 
			</select>
		</div>
		<div id="districtArea">
			<select  class="" id="cus_district" name="cus_district">
			<option selected="" value="">-- กรุณาเลือกอำเภอ/เขต --</option>
			</select>
		</div>

		<div id="subDistrictArea">
			<select class="" id="cus_sub_district" name="cus_sub_district">
				<option selected="" value="">-- กรุณาเลือกแขวง/ตำบล --</option>
			</select>
		</div>
		</div>
	</div>


	<div class="form-group">
		<label class="col-lg-3 control-label titleGroup"  for="cus_village_no">บ้านเลขที่</label>
		<div class="col-lg-5">
			<input type="text" placeholder="บ้านเลขที่" id="cus_village_no" name="cus_village_no" class="form-control">
		</div>
	</div>


	<div class="form-group">
		<label class="col-lg-3 control-label titleGroup"  for="cus_road">ถนน, ซอย</label>
		<div class="col-lg-5">
			<input type="text" placeholder="ถนน, ซอย" id="cus_road" name="cus_road" class="form-control">
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg-3 control-label titleGroup"  for="cus_postal_code">รหัสไปรษณีย์</label>
		<div class="col-lg-5">
			<input type="text" placeholder="รหัสไปรษณีย์" id="cus_postal_code" name="cus_postal_code" class="form-control">
		</div>
	</div>
 
	<div class="form-group">
		<div class="col-lg-offset-3 col-lg-9">
			<button type="submit" class="btn-u btn-u-green" id="btnCusSubmit">  บันทึกข้อมูล  </button>
		</div>
	</div>

</form>
<form role="form" id="formChangePass" class="form-horizontal">
	<div class="headline"><h4>เปลี่ยนแปลงรหัสผ่าน</h4></div>

	<div class="form-group">
		<label class="col-lg-3 control-label titleGroup"  for="cus_new_pass">รหัสผ่านใหม่</label>
		<div class="col-lg-5">
			<input type="text" placeholder="รหัสผ่านใหม่" id="cus_new_pass" name="cus_new_pass"  class="form-control">
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg-3 control-label titleGroup"  for="cus_confirm_pass">ยืนยัน รหัสผ่าน</label>
		<div class="col-lg-5">
			<input type="text" placeholder="ยืนยัน รหัสผ่าน" id="cus_confirm_pass" name="cus_confirm_pass" class="form-control">
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-offset-3 col-lg-9">
			<button type="submit" class="btn-u btn-u-green" id="btnChangePass">  เปลี่ยนรหัสผ่าน  </button>
		</div>
	</div>

</form>