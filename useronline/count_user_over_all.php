<?php
ini_set('display_errors', '1'); //no error=0 all error=1
$server = "localhost";
$db_user = "root";
$db_pass = "010535546";
$database = "realthairealty_db";
$title = "your title";
date_default_timezone_set('Asia/Bangkok');
mysql_connect($server,$db_user,$db_pass);

mysql_select_db($database);
$strSQL = " SELECT DATE FROM counter LIMIT 0,1";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
if($objResult["DATE"] != date("Y-m-d"))
{
	$strSQL = " INSERT INTO daily (DATE,NUM) SELECT '".date('Y-m-d',strtotime("-1 day"))."',COUNT(*) AS intYesterday FROM  counter WHERE 1 AND DATE = '".date('Y-m-d',strtotime("-1 day"))."'";
	mysql_query($strSQL);
	$strSQL = " DELETE FROM counter WHERE DATE != '".date("Y-m-d")."' ";
	mysql_query($strSQL);
}
$strSQL = " INSERT INTO counter (DATE,IP) VALUES ('".date("Y-m-d")."','".$_SERVER["REMOTE_ADDR"]."') ";
mysql_query($strSQL);

$strSQL = " SELECT COUNT(DATE) AS CounterToday FROM counter WHERE DATE = '".date("Y-m-d")."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$strToday = $objResult["CounterToday"];
$strSQL = " SELECT NUM FROM daily WHERE DATE = '".date('Y-m-d',strtotime("-1 day"))."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$strYesterday = $objResult["NUM"];
$strSQL = " SELECT SUM(NUM) AS CountMonth FROM daily WHERE DATE_FORMAT(DATE,'%Y-%m')  = '".date('Y-m')."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$strThisMonth = $objResult["CountMonth"];
$strSQL = " SELECT SUM(NUM) AS CountMonth FROM daily WHERE DATE_FORMAT(DATE,'%Y-%m')  = '".date('Y-m',strtotime("-1 month"))."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$strLastMonth = $objResult["CountMonth"];
$strSQL = " SELECT SUM(NUM) AS CountYear FROM daily WHERE DATE_FORMAT(DATE,'%Y')  = '".date('Y')."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$strThisYear = $objResult["CountYear"];
$strSQL = " SELECT SUM(NUM) AS CountYear FROM daily WHERE DATE_FORMAT(DATE,'%Y')  = '".date('Y',strtotime("-1 year"))."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$strLastYear = $objResult["CountYear"];
mysql_close();
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $title;?></title>
</head>
<body>
<table width="95%" border="1" style="border-color: red;border-style: dotted;">
	<tr>
		<td colspan="2" align="center">Statistics <?php echo $title;?></td>
	</tr>
	<tr>
		<td width="98">Today</td>
		<td width="75" align="center"><?php echo number_format($strToday,0);?></td>
	</tr>
	<tr>
		<td >Yesterday</td>
		<td align="center"><?php echo number_format($strYesterday,0);?></td>
	</tr>
	<tr>
		<td>ThisMonth</td>
		<td align="center"><?php echo number_format($strThisMonth,0);?></td>
	</tr>
	<tr>
		<td>LastMonth</td>
		<td align="center"><?php echo number_format($strLastMonth,0);?></td>
	</tr>
	<tr>
		<td>ThisYear</td>
		<td align="center"><?php echo number_format($strThisYear,0);?></td>
	</tr>
	<tr>
		<td>LastYear</td>
		<td align="center"><?php echo number_format($strLastYear,0);?></td>
	</tr>
	<tr>
		<td>Online</td>
		<td align="center"><?php 
$timeoutseconds = 300;
$timestamp=time();
$timeout=$timestamp-$timeoutseconds;
mysql_connect($server, $db_user, $db_pass) or die ("Useronline Database CONNECT Error");

mysql_db_query($database, "INSERT INTO useronline VALUES ('$timestamp','".$_SERVER["REMOTE_ADDR"]."','".$_SERVER["PHP_SELF"]."')") or die("Useronline Database INSERT Error");

mysql_db_query($database, "DELETE FROM useronline WHERE timestamp<$timeout") or die("Useronline Database DELETE Error");

$result=mysql_db_query($database, "SELECT DISTINCT ip FROM useronline WHERE file='".$_SERVER["PHP_SELF"]."'") or die("Useronline Database SELECT Error");

$user =mysql_num_rows($result);
mysql_close();

echo"$user";
;?></td>
</tr>
<tr>
	<td>Hit</td>
	<td align="center"><?php 
		mysql_connect($server, $db_user, $db_pass) or die ("counter1 Database CONNECT Error");
		$counter=mysql_db_query($database, "SELECT * FROM counter1") or die("counter1 Database SELECT Error");
		$counter1 =mysql_num_rows($counter);
		mysql_db_query($database, "INSERT INTO counter1 VALUES ('$timestamp','".$_SERVER["REMOTE_ADDR"]."')") or die("counter1 Database INSERT Error");
		echo $counter1;
		;?></td>
	</tr>
</table>
</body>
<html>
