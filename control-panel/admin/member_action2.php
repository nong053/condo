<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?

include_once("../config.inc.php");
$cus_id=$_POST['cus_id'];
$action=$_GET['action'];
$action_status=$_POST['action_status'];
$cus_status=$_POST['cus_status'];
$cus_status_special=$_POST['cus_status_special'];


if($action_status=="change_status"){
// echo"action_status$action_status";
 //echo"cus_id$cus_id";
//echo"change status";
// echo"order_status$order_status";
if($cus_status_special=='Y'){
	$strSQL="update customer set cus_enable='Yes',cus_status_special='$cus_status_special'  where cus_id='$cus_id'";
}else{
	$strSQL="update customer set cus_enable='$cus_status',cus_status_special='$cus_status_special'  where cus_id='$cus_id'";
}
 
 	$result=mysql_query($strSQL);
	if($result)
	{
		$contentData="";
		if($cus_status=='Yes'){
			// send email start
			$sql="select * from customer where cus_id='$cus_id'";
			$result=mysql_query($sql);
			$rs=mysql_fetch_array($result);
			//echo 'cus_email'.$rs['cus_email'];
			//echo 'cus_first_name'.$rs['cus_first_name'];
			//echo 'cus_last_name'.$rs['cus_last_name'];
			//echo 'cus_status_special'.$rs['cus_status_special'];
			
			if(($cus_status=='Yes') and ($cus_status_special=='Y')){
				$strSubject2 = "ท่านผ่านการอนุมัติการลงประกาศอสังหาริมทรัพย์ของเว็บไซต์ www.realthairealty.com ";
				$strMessage2 = "รายละเอียดเพิ่มเติม 'สามารถลงประกาศพิเศษได้'";
			}else if(($cus_status=='Yes') and ($cus_status_special=='N')){
				$strSubject2 = "ท่านผ่านการอนุมัติการลงประกาศอสังหาริมทรัพย์ของเว็บไซต์ www.realthairealty.com ";
				$strMessage2 = "รายละเอียดเพิ่มเติม 'สามารถลงประกาศฟรีได้'";
			}else if(($cus_status=='N') and ($cus_status_special=='N')){
				$strSubject2 = "ท่านไม่ผ่านการอนุมัติการลงประกาศอสังหาริมทรัพย์ของเว็บไซต์ www.realthairealty.com ";
				$strMessage2 = "รายละเอียดเพิ่มเติม กรุณาอ่านรายละเอียดนโยบายของเว็บไซต์";
			}else{
				$strSubject2 = "ท่านไม่ผ่านการอนุมัติการลงประกาศอสังหาริมทรัพย์ของเว็บไซต์ www.realthairealty.com ";
				$strMessage2 = "รายละเอียดเพิ่มเติม กรุณาอ่านรายละเอียดนโยบายของเว็บไซต์";
			}
			
			$strTo2 = $rs['cus_email'];
			
			//$strHeader2 ="ลิงค์ของประกาศ  $url_to_friend";
			
			$flgSend = mail($strTo2,$strSubject2,$strMessage2,'');  // @ = No Show Error //
			if($flgSend){
				echo'["success"]';
			}else{
				echo "error";
			}
			
			//send email end
		}
	echo"<script>alert(\"ระบบได้ทำการเปลี่ยนสถานะเรียบร้อยแล้ว\");</script>";
	echo"<script>parent.location='index.php?page=member_system'</script>";
	}
}else if($action=="del"){
	
	$cus_id=$_GET['cus_id'];
	//echo"here delee data";
	$strSQL="delete from customer where cus_id='$cus_id'";
	$result=mysql_query($strSQL);
	if($result){
		
				echo"<script>alert(\"ระบบได้ลบข้อมูลเรียบร้อยแล้ว\");</script>";
				echo"<script>parent.location='index.php?page=member_system'</script>";
		}else{
		echo"error".mysql_error();
		}
}
?> 
