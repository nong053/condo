<?php session_start();
$cus_id=$_SESSION['ses_cus_id'];
include("../config.inc.php");
$contact_detail=$_POST['contact_detail'];
$contact_fullname=$_POST['contact_fullname'];
$contact_email=$_POST['contact_email'];
$admin_id=$_POST['admin_id'];

if($_POST['paramAction']=="sendEmail"){
	$strSQL="insert into contact(contact_detail,contact_fullname,contact_tel,contact_email,admin_id)
			values(
				'$contact_detail','$contact_fullname','$contact_tel','$contact_email','$admin_id'
			)";
	$reslut=mysql_query($strSQL);
	if($reslut){
		echo'["success"]';
	}else{
		echo mysql_error();
	}
}
if($_POST['paramAction']=="saveContract"){
	
}
?>