<?php session_start();
include("../config.inc.php");
if($_POST['paramAction']=="loginAction"){
	$cus_email=$_POST["cus_email"];
	$cus_password=$_POST["cus_password"];
	$strSQL="select * from customer where cus_email='$cus_email' and cus_pass='$cus_password'";
	$result=mysql_query($strSQL);
	$rsNum=mysql_num_rows($result);
	if($rsNum!=0){
		$rs=mysql_fetch_array($result);
		$_SESSION['cus_id']=$rs["cus_id"];
		$_SESSION['cus_email']=$cus_email;
		$_SESSION['cus_password']=$cus_password;
		
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
if($_POST['paramAction']=="logoutAction"){
	session_unset( $_SESSION['cus_id'] );
	session_unset( $_SESSION['cus_email'] );
	session_unset( $_SESSION['cus_password'] );
	
	echo'["success"]';
}


?>