<?php
extract($_REQUEST);
$hostname="localhost";


$username="root";
$password="010535546";
$dbname="realthairealty_db";

/*
$username="workphp_user";
$password="010535546";
$dbname="workphp_rwdb";
*/
$result=mysql_connect($hostname,$username,$password);
mysql_query("SET NAMES utf8");
mysql_select_db($dbname);
if(!$result){
echo"con't connection database";
}else{
//echo"connection successfully";	
}
?>