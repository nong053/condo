<?php
extract($_REQUEST);
$hostname="localhost";



$username="root";
$password="010535546";
$dbname="realthairealty_db";

/*
$username="zcarlet";
$password="010535546";
$dbname="zcarlet_db";
*/


$conn=mysql_connect($hostname,$username,$password);
mysql_query("SET NAMES utf8");
mysql_select_db($dbname);



?>