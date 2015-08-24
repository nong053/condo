<link rel="stylesheet" href="assets/css/pages/page_log_reg_v1.css">
<script src="Controller/cLogin.js"></script>
<br style="clear:both">
<div class="row">
            <div class="col-md-5 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <form class="reg-page" name="frmLogin" id="frmLogin">
                    <div class="reg-header">            
                        <h2>ลงชื่อเข้าใช้งาน</h2>
                    </div>

                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" id="cus_email" name="cus_email" placeholder="อีเมลล์">
                    </div>                    
                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" id="cus_password" name="cus_password"  class="form-control" placeholder="รหัสผ่าน">
                    </div>                    

                    <div class="row">
                        <div class="col-md-6 checkbox">
                            <label><input type="checkbox"> จำรหัสผ่าน</label>                        
                        </div>
                        <div class="col-md-6">
                            <button type="button" name="btnLogin" id="btnLogin" class="btn-u pull-right">เข้าสู่ระบบ</button>                        
                        </div>
                    </div>

                    <hr>

                    <h4>ลืมรหัสผ่านใช่มั้ย ?</h4>
                    <p>ไม่ต้องกังวล, <a href="#" class="color-green">คลิ๊ก</a> ตั้งรหัสผ่านใหม่.</p>
                </form>            
            </div>
        </div>