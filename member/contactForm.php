<?php 
$paramAdminID=$_POST['paramAdminID'];
$rdg_id=$_POST['rdg_id'];

?>
<form name="contactUsForm" id="contactUsForm" action="#" class="sky-form">
			<fieldset>                  
						
						<section>
							<label class="label">พิมพ์ข้อความ</label>
							<label class="textarea textarea-resizable">
								<textarea name="contact_detail" id="contact_detail"  rows="3"></textarea>
							</label>
						</section>
						
						<section>
							<label class="label">ชื่อ</label>
							<label class="input">
								<input type="text" name="contact_fullname" id='contact_fullname'>
							</label>
						</section>
						<section>
							<label class="label">เบอร์โทร</label>
							<label class="input">
								<input type="tel" name="contact_tel" id='contact_tel'>
							</label>
						</section>
						<section>
							<label class="label">อีเมลล์</label>
							<label class="input">
								<input type="email" name="contact_email" id='contact_email'>
							</label>
						</section>
						<section>
							<label class="label"><?
							$rand1=rand(1,10);
							$rand2=rand(1,10);
							$confrim=$rand1+$rand2;
							$_SESSION['sesConfrim2']=$confrim;
							?>
							<b><? echo "$rand1 + $rand2 =?"; ?></b>
							<span class="color-red">*</span>
							</label>
							<label class="input" style='wdith:100px;'>
								<input type="text" name="cus_confrim_contact" id="cus_confrim_contact" class="form-control margin-bottom-20">
							</label>
							
						</section>
						
						
			</fieldset>
			<footer>
			
			<input type="hidden" name="admin_id" value="<?=$paramAdminID?>">
			<input type="hidden" name="paramSum" id='paramSum' value="<?=$_SESSION['sesConfrim2']?>">
			<input type="hidden" name="paramAction" value="sendEmail">
			<input type="hidden" name="rdg_id" id="rdg_id"  value="<?=$rdg_id?>">
			
			<button type="submit" id="btnContactUsForm" class="btn-u">คลิ๊กเพื่อส่งอีเมลล์</button>
			
			</footer>
			</form>