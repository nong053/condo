<?php 
$sqlSQLBTS="SELECT * FROM public_transport where pt_type='BTS' order by pt_detail";
$resultBTS=mysql_query($sqlSQLBTS);

$sqlSQLBTSRED="SELECT * FROM public_transport where pt_type='BTS' and pt_sub_type='RED' order by pt_detail ";
$resultBTSRED=mysql_query($sqlSQLBTSRED);

$sqlSQLBTSREDLIGHT="SELECT * FROM public_transport where pt_type='BTS' and pt_sub_type='RED-LIGHT' order by pt_detail ";
$resultBTSREDLIGHT=mysql_query($sqlSQLBTSREDLIGHT);

$sqlSQLBTSGREEN="SELECT * FROM public_transport where pt_type='BTS' and pt_sub_type='GREEN' order by pt_detail ";
$resultBTSGREEN=mysql_query($sqlSQLBTSGREEN);

$sqlSQLBTSGREENLIGHT="SELECT * FROM public_transport where pt_type='BTS' and pt_sub_type='GREEN-LIGHT' order by pt_detail ";
$resultBTSGREENLIGHT=mysql_query($sqlSQLBTSGREENLIGHT);

$sqlSQLBTSBLUE="SELECT * FROM public_transport where pt_type='BTS' and pt_sub_type='BLUE' order by pt_detail ";
$resultBTSBLUE=mysql_query($sqlSQLBTSBLUE);

$sqlSQLBTSPURPLE="SELECT * FROM public_transport where pt_type='BTS' and pt_sub_type='PURPLE' order by pt_detail ";
$resultBTSPURPLE=mysql_query($sqlSQLBTSPURPLE);

$sqlSQLBTSORANGE="SELECT * FROM public_transport where pt_type='BTS' and pt_sub_type='ORANGE' order by pt_detail ";
$resultBTSORANGE=mysql_query($sqlSQLBTSORANGE);

$sqlSQLBTSPINK="SELECT * FROM public_transport where pt_type='BTS' and pt_sub_type='PINK' order by pt_detail ";
$resultBTSPINK=mysql_query($sqlSQLBTSPINK);

$sqlSQLBTSYELLOW="SELECT * FROM public_transport where pt_type='BTS' and pt_sub_type='YELLOW' order by pt_detail ";
$resultBTSYELLOW=mysql_query($sqlSQLBTSYELLOW);

$sqlSQLBTSGREY="SELECT * FROM public_transport where pt_type='BTS' and pt_sub_type='GREY' order by pt_detail ";
$resultBTSGREY=mysql_query($sqlSQLBTSGREY);

$sqlSQLBTSBLUE2="SELECT * FROM public_transport where pt_type='BTS' and pt_sub_type='GREY' order by pt_detail ";
$resultBTSBLUE2=mysql_query($sqlSQLBTSBLUE2);

$sqlSQLBTSBROWN="SELECT * FROM public_transport where pt_type='BTS' and pt_sub_type='BROWN' order by pt_detail ";
$resultBTSBROWN=mysql_query($sqlSQLBTSBROWN);

$sqlSQLLineBTS="select * from public_bts_line order by bts_line_id";
$resultLineBTS=mysql_query($sqlSQLLineBTS);










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