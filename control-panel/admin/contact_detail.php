<?php 
include("../config.inc.php");
$contact_id=$_GET['contact_id'];
$strSQL="select * from contact where contact_id=$contact_id";
$result=mysql_query($strSQL);
$rs=mysql_fetch_array($result);
echo $rs[contact_detail]."<br>";
echo "<b>บริษัท:</b>".$rs[contact_company]."<br>";
echo "<b>ตำแหน่ง:</b>".$rs[contact_position]."<br>";
?>
