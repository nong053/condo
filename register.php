<link rel="stylesheet" href="assets/css/pages/page_log_reg_v1.css">
<script>
	
	function isEmail(email) {
	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
	}
	function check_cus(confrim){
		//alert("confrim"+confrim);
		//alert($("#confirmCondition:checked").val());
		var check="";
		
		
		if(document.form_regis.cus_first_name.value==""){
			check+="กรุณากรอกชื่อ\n";
		}
		if(document.form_regis.cus_last_name.value==""){
			check+="กรุณากรอกนามสกุล\n";
		}
		if(document.form_regis.cus_tel.value==""){
			check+="กรุณากรอกเบอร์โทร\n";
		}
		if(document.form_regis.cus_email.value==""){
			
			check+="กรุณากรอกE-mail\n";
			
			
		}else{

			
			var email=document.form_regis.cus_email.value;
			if(isEmail(email)){
			
			$.ajax({
				url:"action/register_process.php",
				type:"POST",
				dataType:"json",
				async:false,
				data:{"action":"checkEmail","cus_email":email},
				success:function(data){
					//alert(data);
					if(data=='thisEmailIsAlready'){
						//alert("E-mail นี้มีการใช้งานแล้วครับ");
						check+="E-mail นี้มีการใช้งานแล้ว\n";
						//return false;
					}
				}	
			});
			
			}else{
				check+="รูปแบบ E-mail ไม่ถูกต้อง\n";
			}
			
			
			
			
		}
		if(document.form_regis.cus_pass.value==""){
			check+="กรุณากรอกรหัสผ่าน\n";
		}
		if(document.form_regis.cus_repass.value==""){
			check+="กรุณากรอกหรัสผ่านซ้ำ\n";
			
		
		if(document.form_regis.cus_pass.value != document.form_regis.cus_repass.value){
			check+="กรอกรหัสผ่านไม่ตรงกัน\n";
		}
		}if($("#confirmCondition:checked").val()!="Y"){
			check+="กดยอมรับข้อตกลงด้วยครับ\n";
		}
		
		
		if(document.form_regis.cus_confrim.value != confrim){
			check+="กรอกหัสยืนยันไม่ถูกต้องครับ\n";
		}

		
		if(check!=""){
			
			alert(check);
			return false;
		}else{
			document.form_regis.submit();
		}
		return false;
	}


</script>


<div class="row">
            <div class="col-md-12  col-sm-8">
                <form class="reg-page" id='form_regis' name='form_regis' method=post action="action/register_process.php">
                    <div class="reg-header">
                        <div class="headline headline-md">
							<h2><i class="fa fa fa-user"></i> สมัครสมาชิก</h2>
						</div>

                       <!--  <p>สมัครสมาชิกแล้ว? คลิ๊ก <a class="color-green" href="#" data-toggle="modal" data-target="#loginFormModal">ลงชื่อเข้าใข้งาน</a> ด้วยบัญชีของคุณ.</p>   -->                  
                    </div>

                    <label>ชื่อ</label>
                    <input type="text" name="cus_first_name" id="cus_first_name" class="form-control margin-bottom-20">
                   
                    <label>นามสกุล</label>
                    <input type="text" name="cus_last_name" id="cus_last_name" class="form-control margin-bottom-20">
                    
                    <label>เบอร์โทร</label>
                    <input type="text" name="cus_tel" id="cus_tel" class="form-control margin-bottom-20">
                   
                    <label>อีเมลล์ <span class="color-red">*</span></label>
                    <input type="text" name="cus_email" id="cus_email" class="form-control margin-bottom-20">

                    <div class="row">
                        <div class="col-sm-6">
                            <label>รหัสผ่าน <span class="color-red">*</span></label>
                            <input type="password" name="cus_pass" id="cus_pass" class="form-control margin-bottom-20">
                        </div>
                        <div class="col-sm-6">
                            <label>ยืนยันรหัสผ่าน <span class="color-red">*</span></label>
                            <input type="password" name="cus_repass" id="cus_repass" class="form-control margin-bottom-20">
                        </div>
                    </div>
                    
                     <div class="row">
                        <div class="col-sm-6">
                            <label> 
                            	<?
								$rand1=rand(1,10);
								$rand2=rand(1,10);
								$confrim=$rand1+$rand2;
								$_SESSION['confrim']=$confrim;
								?>
								<b><? echo "$rand1 + $rand2 =?"; ?></b>
								<span class="color-red">*</span>
							</label>
                            <input type="text" name="cus_confrim" id="cus_confrim" class="form-control margin-bottom-20">
                        </div>
                        
                    </div>
                    

                    <hr>

                    <div class="row">
                        <div class="col-lg-6 checkbox">
                            <label>
                                <input type="checkbox" id="confirmCondition" name="confirmCondition" value='Y'> 
                      			          อ่านข้อตกลง <a class="color-green" target="_blank" href="index.php?page=register_condition">เงื่อนไขการใช้งาน</a>
                            </label>                        
                        </div>
                        <div class="col-lg-6 text-right">
                        	<input type="hidden" name="admin_id" id="admin_id" value='1'>
                            <button type="button" name="btnRegis" id="btnRegis" onclick="check_cus(<?=$confrim?>)" class="btn-u">สมัครสมาชิก</button>                        
                        </div>
                    </div>
                </form>
            </div>
        </div>