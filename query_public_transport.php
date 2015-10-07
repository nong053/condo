<?php 
$sqlSQLBTS="SELECT * FROM public_transport where pt_type='BTS' order by pt_detail";
$resultBTS=mysql_query($sqlSQLBTS);

$sqlSQLMRT="SELECT * FROM public_transport where pt_type='MRT' order by pt_detail";
$resultMRT=mysql_query($sqlSQLMRT);

$sqlSQLARL="SELECT * FROM public_transport where pt_type='ARL' order by pt_detail";
$resultARL=mysql_query($sqlSQLARL);

$sqlSQLHARBOR="SELECT * FROM public_transport where pt_type='HARBOR' order by pt_detail";
$resultHARBOR=mysql_query($sqlSQLHARBOR);

$sqlSQLRoadNo="select DISTINCT rdg_address_road from realty_data_general where rdg_address_road !='' order by rdg_address_road";
$resultRoadNo=mysql_query($sqlSQLRoadNo);

$sqlSQLBusNo="select DISTINCT rdg_bus from realty_data_general where rdg_bus !='' order by rdg_bus";
$resultBusNo=mysql_query($sqlSQLBusNo);

$sqlSQLSoi="select DISTINCT rdg_address_soi from realty_data_general where rdg_address_soi !='' order by rdg_address_soi";
$resultSoi=mysql_query($sqlSQLSoi);


?>