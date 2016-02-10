<?  ob_start(); session_start();?>

<?php

if($_POST['paramAction']=="sendToFriend"){
	$email_my_friend=$_POST['email_my_friend'];
	$url_to_friend=$_POST['url_to_friend'];
	$detail_to_my_friend=$_POST['detail_to_my_friend'];
	/*
	echo $email_my_friend."<br>";
	echo $url_to_friend."<br>";
	echo $detail_to_my_friend."<br>";
	*/
	
	$strTo2 = $email_my_friend;
	$strSubject2 = "ประกาศที่หน้าสนใจ(www.realthairealty.com)";
	//$strHeader2 ="ลิงค์ของประกาศ  $url_to_friend";
	$strMessage2 = "รายละเอียดเพิ่มเติม $detail_to_my_friend ลิงค์ของประกาศ  $url_to_friend";
	$flgSend = mail($strTo2,$strSubject2,$strMessage2,'');  // @ = No Show Error //
	if($flgSend){
		echo'["success"]';
	}else{
		echo "error";
	}
	
	/*
	$strTo2 = "kosit@gmail.com";
	$strSubject2 = "ประกาศที่หน้าสนใจ(www.realthairealty.com)";
	$strHeader2 ="ลิงค์ของประกาศ ";
	$strMessage2 = "รายละเอียดเพิ่มเติม";
	
	$flgSend = mail("kosit.arom@gmail.com","abc","หน่อง","");  // @ = No Show Error //
	if($flgSend){
		echo'["success"]';
	}else{
		echo "error";
	}
	*/

}
?>