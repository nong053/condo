<link rel="stylesheet" href="assets/css/pages/page_log_reg_v1.css">
<script src="Controller/cLogin.js"></script>

<div class="row">
            <div class="col-md-12  col-sm-6">
                <form class="reg-page" name="frmLogin" id="frmLogin">
                    <!-- 
                    <div class="reg-header">            
                        <h2>ลงชื่อเข้าใช้งาน</h2>
                    </div>
					 -->
                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <?php 
                        
                        if(!isset($_COOKIE["cookie_cus_email"])){
						?>
						 <input type="text" class="form-control" id="cus_email" name="cus_email" placeholder="อีเมลล์">
						<?php
						}else{
						?>
						 <input type="text" class="form-control" id="cus_email" name="cus_email" value=<?=$_COOKIE["cookie_cus_email"]?> placeholder="อีเมลล์">
						<?php	
						}
                        ?>
                       
                    </div>                    
                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <?php 
                        if(!isset($_COOKIE["cookie_cus_password"])){
						?>
						<input type="password" id="cus_password" name="cus_password"  class="form-control" placeholder="รหัสผ่าน">
						<?php
						}else{
						?>
						<input type="password" id="cus_password" name="cus_password" value='<?=$_COOKIE["cookie_cus_password"]?>' class="form-control" placeholder="รหัสผ่าน">
						<?php	
						}
                        ?>
                        
                    </div>                    

                    <div class="row">
                        <div class="col-md-6 checkbox">
                        <?php 
                        if(isset($_COOKIE["cookie_cus_email"])){
                        	?>
                        	 <label><input type="checkbox" name='cus_remember' checked='checked' id='cus_remember' value='1'> จำรหัสผ่าน</label>
                        	<?php
                        }else{
                        	?>
                        	 <label><input type="checkbox" name='cus_remember' id='cus_remember' value='1'> จำรหัสผ่าน</label>
                        	<?php
                        }
                        ?>
                                                   
                        </div>
                        <div class="col-md-6">
                        	<input type='hidden' name='loginType' id='loginType' value='loginForManage'><!-- loginForPost,loginForManage -->
                            <button type="button" name="btnLogin" id="btnLogin" class="btn-u pull-right">เข้าสู่ระบบ</button>                        
                        </div>
                    </div>

                    <hr>

                    <h4>ลืมรหัสผ่านใช่มั้ย ?</h4>
                    <!-- 
                    <p>ไม่ต้องกังวล, <a href="index.php?page=forgot_pass" class="color-green">คลิ๊ก</a> ส่งรหัสผ่านไปทาง E-mail.</p>
                     -->
                    <p>ไม่ต้องกังวล, <a class='forgotPassFormModal' href="#" data-target="#forgotPassFormModal" data-toggle="modal" class="color-green">คลิ๊ก</a> ส่งรหัสผ่านไปทาง E-mail.</p>
                    
                     
                </form>            
            </div>
        </div>