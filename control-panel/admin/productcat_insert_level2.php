<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php 
include("../config.inc.php");
$productcat_name=trim($_POST['productcat_name']);
$productcat_detail=trim($_POST['productcat_detail']);
$productcat_name_eng=trim($_POST['productcat_name_eng']);
$productcat_detail_eng=trim($_POST['productcat_detail_eng']);
$admin_id=trim($_POST['admin_id']);
$productcat_id=trim($_POST['productcat_id']);
//echo"productcat_id1".$productcat_id."<br>";

$strSQL="select * from productcat_level2 where productcat_name='$productcat_name' and productcat_id='$productcat_id' and admin_id='$admin_id'";
$result=mysql_query($strSQL) or die (mysql_error());
if($rs=mysql_fetch_array($result)){
	echo"<script>alert(\"หัวข้อบทความนี้มีอยู่แล้ว\");</script>";
	//http://localhost/condo/control-panel/admin/index.php?page=ecommerce_system&select_ecommerce=productcat_level2&productcat_id=46
	//echo"<script>window.location=\"index.php?page=productcat_level2\"</script>";
	echo"<script>window.location=\"index.php?page=ecommerce_system&select_ecommerce=productcat_level2&productcat_id=$productcat_id\"</script>";
	exit();
}


if($productcat_name==""){
	echo"<script>alert(\"กรอกหัวข้อบทความด้วยครับ\");</script>";
	echo"<script>window.location=\"index.php?page=ecommerce_system&select_ecommerce=productcat_level2\"</script>";
	exit();
}
$strSQL="insert into productcat_level2(productcat_name,productcat_detail,productcat_name_eng,productcat_detail_eng,admin_id,productcat_id)VALUES('$productcat_name','$productcat_detail','$productcat_name_eng','$productcat_detail_eng','$admin_id','$productcat_id')";
$ok=mysql_query($strSQL);
if(!$ok){echo mysql_error();}

$strSQL2="select * from productcat_level2 where productcat_name='$productcat_name' and admin_id ='$admin_id'";
$result2=mysql_query($strSQL2);
if(!result2){
echo"erorr".mysql_error();
}
$rs=mysql_fetch_array($result2);
$productcat_id=$rs[productcat_id];
$productcat_level2_id=$rs[productcat_level2_id];

//echo"productcat_id2".$productcat_id."<br>";
//echo"productcat_level2_id".$productcat_level2_id."<br>";



$productcat_path1="../product/".$productcat_id."/";
if(!is_dir($productcat_path1)){
	umask(0);
	mkdir($productcat_path1,0777);
}

$productcat_path2="../product/".$productcat_id."/".$productcat_level2_id."/";
if(!is_dir($productcat_path2)){
umask(0);
mkdir($productcat_path2,0777);
}	

//header("Location:index.php?page=productcat");

echo"<script>window.location=\"index.php?page=ecommerce_system&select_ecommerce=productcat_level2&productcat_id=$rs[productcat_id]\"</script>";


?>