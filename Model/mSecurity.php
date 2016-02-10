<?php session_start();
include("../config.inc.php");
include("sql_injection.php");
real_esc($_POST);
if($_POST['paramAction']=="loginAction"){
	$cus_email=$_POST["cus_email"];
	$cus_remember=$_POST["cus_remember"];
	
	$cus_password=$_POST["cus_password"];
	$strSQL="select * from customer where cus_email='$cus_email' and cus_pass='$cus_password'";
	$result=mysql_query($strSQL);
	$rsNum=mysql_num_rows($result);
	if($rsNum!=0){
		$rs=mysql_fetch_array($result);
		$_SESSION['ses_cus_id']=$rs["cus_id"];
		$_SESSION['ses_cus_email']=$cus_email;
		$_SESSION['ses_cus_first_name']=$rs["cus_first_name"];
		$_SESSION['ses_cus_password']=$cus_password;
		
		if($cus_remember=='1'){
			@setcookie("cookie_cus_email", $cus_email, time() + (86400 * 30), "/"); // 86400 = 1 day
			@setcookie("cookie_cus_password", $cus_password, time() + (86400 * 30), "/"); // 86400 = 1 day
		}else{
			@setcookie("cookie_cus_email", "", time()-3600); // 86400 = 1 day
			@setcookie("cookie_cus_password","", time()-3600); // 86400 = 1 day
			unset ($_COOKIE['cookie_cus_email']);
			unset ($_COOKIE['cookie_cus_password']);
		}
		echo'["success"]';
	}else{
		echo'["not_success"]';
	}

	
}
if($_POST['paramAction']=="checkEmailAction"){
	$cus_email=$_POST["cus_email"];
	$strSQL="select * from customer where cus_email='$cus_email'";
	$result=mysql_query($strSQL);
	$rsNum=mysql_num_rows($result);
	if($rsNum!=0){
		echo'["email_is_already"]';
	}else{
		echo'["email_is_ok"]';
	}
}
if($_POST['paramAction']=="checkEmailAndSendPassAction"){
	$cus_email=$_POST["cus_email"];
	$strSQL="select * from customer where cus_email='$cus_email'";
	$result=mysql_query($strSQL);
	$rsNum=mysql_num_rows($result);
	$rs=mysql_fetch_array($result);
	if($rsNum!=0){
		/*send pass to email start*/
		$to=$rs['cus_email'];
		$title="รหัสผ่านในการใช้งาน www.realthairealty.com";
		$content="User:\"".$rs['cus_email']."\" Password:\"".$rs['cus_pass']."\"";
		$header="www.realthairealty.com";
		
		$sendmail=@mail($to,$title,$content,$header);
	
		if($sendmail){
			echo'["send_pass_is_success"]';
		}else{
			echo 'error'.mysql_error();
		}
		/*send pass to email end*/
		
		
	}else{
		echo'["email_is_none"]';
	}
}

if($_POST['paramAction']=="logoutAction"){
	session_unset( $_SESSION['ses_cus_id'] );
	session_unset( $_SESSION['ses_cus_email'] );
	session_unset( $_SESSION['ses_cus_password'] );
	
	echo'["success"]';
}


?>