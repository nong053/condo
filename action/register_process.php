<?  ob_start(); session_start();?>

<?php
include("../config.inc.php");
require("../class_mysql.php");
$db = new database();
$cus_email=$_POST['cus_email'];
$cus_first_name=$_POST['cus_first_name'];
$cus_last_name=$_POST['cus_last_name'];
$cus_tel=$_POST['cus_tel'];
$cus_pass=$_POST['cus_pass'];
$action=$_POST['action'];

			
/*check email ซ้ำตรงนี้*/
if($action=='checkEmail'){
	$result_cus=$db->tableSQL("customer where cus_email ='$cus_email'");
	$num=mysql_num_rows($result_cus);
	
	if($num!=0){
		echo '["thisEmailIsAlready"]';
	}else{
		
		echo '["thisEmailIsEmpty"]';
	}
	
}else{

	$cus_date=date("d-m-y:h:i:s");
	$strSQL="insert into customer(cus_email,cus_enable,cus_pass,cus_first_name,cus_last_name,cus_tel,admin_id,cus_date,cus_update)VALUES
	('$cus_email','P','$cus_pass','$cus_first_name','$cus_last_name','$cus_tel','1','$cus_date','$cus_date')";
	$sucess=mysql_query($strSQL)or die(mysql_error());
	
	if($sucess){
	
	$result_cus=$db->tableSQL("customer where cus_email ='$cus_email'");
	$re_cus = mysql_fetch_array($result_cus);
	$_SESSION['cus_id']=$re_cus[cus_id];
	$_SESSION['cus_pass']=$re_cus[cus_pass];
	$_SESSION['cus_email']=$re_cus[cus_email];
	$_SESSION['cus_first_name']=$re_cus[cus_first_name];
	$_SESSION['cus_last_name']=$re_cus[cus_last_name];
	
	
	
	
			$result_admin= $db->tableSQL("admin where admin_id='1'");
			$rs_admin = mysql_fetch_array($result_admin);
	
			//ส่งmailให้ผู้ดูแลระบบ
			$strTo = $result_admin[admin_email];
			$strSubject = "สมัครสมาชิก";
			$strHeader =$result_admin[admin_website] ;
			$strMessage = "เข้าไปตรวจสอบระบบ Back office ด้วยครับ คุณ$re_cus[cus_first_name] สมัครสมาชิก:ชื่อเข้าใช้ระบบ=$re_cus[cus_email] รหัสผ่าน=$re_cus[cus_pass]";
			$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //		
			
			
			
			//ส่งให้สมาชิก
			$strTo2 = $cus_email;
			$strSubject2 = "สมัครสมาชิก";
			$strHeader2 ="www.realthairealty.com";
			$strMessage2 = " คุณ $re_cus[cus_first_name] ได้ทำการสมัครสมาชิกเว็บไชต์ www.realthairealty.com รียบร้อยแล้ว emailเข้าใช้=$re_cus[cus_email] รหัสผ่าน=$re_cus[cus_pass]";
			$flgSend = @mail($strTo2,$strSubject2,$strMessage2,$strHeader2);  // @ = No Show Error //
		
	}else{
			echo"error".mysql_error();
	}
	
	echo"<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />";
	echo"<script>alert('สมัครสมาชิกเรียบร้อยแล้ว');</script>";
	echo"<meta http-equiv=\"refresh\" content=\"0; URL='../index.php?page=register'\">";
}
?>