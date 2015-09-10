<?php 
$paramAdminID=$_POST['paramAdminID'];
?>
<form name="contactUsForm" id="contactUsForm" action="#" class="sky-form">
			<fieldset>                  
						
						<section>
							<label class="label">พิมพ์ข้อความ</label>
							<label class="textarea textarea-resizable">
								<textarea name="contact_detail" rows="3"></textarea>
							</label>
						</section>
						
						<section>
							<label class="label">ชื่อ</label>
							<label class="input">
								<input type="text" name="contact_fullname">
							</label>
						</section>
						<section>
							<label class="label">เบอร์โทร</label>
							<label class="input">
								<input type="text" name="contact_tel">
							</label>
						</section>
						<section>
							<label class="label">อีเมลล์</label>
							<label class="input">
								<input type="text" name="contact_email">
							</label>
						</section>
						
			</fieldset>
			<footer>
			
			<input type="hidden" name="admin_id" value="<?=$paramAdminID?>">
			<input type="hidden" name="paramAction" value="saveContract">
			<button type="submit" id="btnContactUsForm" class="btn-u">คลิ๊กเพื่อส่งอีเมลล์</button>
			
			</footer>
			</form>