
<?php 
include("realty_split.php");
include_once 'config.inc.php';
//realty main start
$home_type=$_POST['home_type'];
$sub_type=$_POST['sub_type'];

$embed_rt_id=$_POST['embed_rt_id'];

$rdg_rf=$_POST['rdg_rf'];


$search_type=$_POST['search_type'];
if($search_type=='1'){
	$realty_text_type="ขาย";
}else{
	$realty_text_type="เช่า";
}
/*
echo $search_type;
echo $realty_text_type;
*/
if($_POST['rdg_address_province_id']){
	$rdg_address_province_id=$_POST['rdg_address_province_id'];
}else if($_POST['rdg_address_province_id_rent']){
	$rdg_address_province_id=$_POST['rdg_address_province_id_rent'];	
}else{
	$rdg_address_province_id="All";
}
if($_POST['rdg_address_district_id']){
	$rdg_address_district_id=$_POST['rdg_address_district_id'];
}else if($_POST['rdg_address_district_id_rent']){
	$rdg_address_district_id=$_POST['rdg_address_district_id_rent'];	
}else{
	$rdg_address_district_id="All";
}
if($_POST['rdg_address_sub_district_id']){
	$rdg_address_sub_district_id=$_POST['rdg_address_sub_district_id'];
}else if($_POST['rdg_address_sub_district_id_rent']){
	$rdg_address_sub_district_id=$_POST['rdg_address_sub_district_id_rent'];	
}else{
	$rdg_address_sub_district_id="All";
}

$condition_in=0;
if($embed_rt_id==""){
	$embed_in_rt_id="All";
}else if($embed_rt_id=="1"){
	//ขายบ้าน 
	
	
	if($home_type){
		if($sub_type=='All'){
				
			$condition_in=1;//condition is  where in
		$embed_in_rt_id="'2','3','4','5','6'";
				
		}else{
			$condition_in=0;//condition is not where in
			$embed_in_rt_id=$home_type;
		}
	}else{
		$condition_in=1;//condition is  where in
		$embed_in_rt_id="'2','3','4','5','6'";
	}
	
	

}else if($embed_rt_id=="2"){
	//ขายคอนโดมิเนียม 
	$condition_in=0;
	$embed_in_rt_id="7";
	
}else if($embed_rt_id=="3"){
	//ขายที่ดิน 
	if($sub_type){
		if($sub_type=='All'){
			
			$condition_in=1;
			$embed_in_rt_id="'9','10'";
			
		}else{
			$condition_in=0;//condition is not where in
			$embed_in_rt_id=$sub_type;
		}
	}else{
		$condition_in=1;
		$embed_in_rt_id="'9','10'";
	}
	
}else if($embed_rt_id=="4"){
	//ขายทาว์นเฮ้าส์และทาว์นโฮม  
	$condition_in=0;
	$embed_in_rt_id="8";
	
}else if($embed_rt_id=="5"){
	//ขายอาคารพาณิชย์ 
	if($sub_type){
		$condition_in=0;
		$embed_in_rt_id=$sub_type;
	}else{
	$condition_in=1;
	$embed_in_rt_id="'12','13'";
	}
}else if($embed_rt_id=="6"){
	//ขายอพาร์ตเมนต์
	$condition_in=0;
	$embed_in_rt_id="11";
}else if($embed_rt_id=="7"){
	//ขายอาคารสำนักงาน
	$condition_in=0;
	$embed_in_rt_id="";
}else if($embed_rt_id=="8"){
	//ขายโรงงานและโกดัง
	$condition_in=0;
	$embed_in_rt_id="14";
}else if($embed_rt_id=="9"){
	
	//หอพักสำหรับขาย
	if($sub_type){
		if($sub_type=='All'){
				
			$condition_in=1;
			$embed_in_rt_id="'15','16','17'";
				
		}else{
			$condition_in=0;//condition is not where in
			$embed_in_rt_id=$sub_type;
		}
	}else{
		$condition_in=1;
		$embed_in_rt_id="'15','16','17'";
	}
	
}else if($embed_rt_id=="10"){
	//โครงการใหม่สำหรับขาย 
	$condition_in=0;
	$embed_in_rt_id="1";
}else if($embed_rt_id=="11"){
	//โรงแรมสำหรับขาย
	$condition_in=0;
	$embed_in_rt_id="18";
}else if($embed_rt_id=="12"){
	//เกสต์เฮ้าส์สำหรับขาย
	$condition_in=0;
	$embed_in_rt_id="20";
}else if($embed_rt_id=="13"){
	//รีสอร์ทและโฮมเสตย์สำหรับขาย 
	$condition_in=0;
	$embed_in_rt_id="19";
}else if($embed_rt_id=="14"){
	//ขายอสังหาริมทรัพย์อื่นๆ
	$condition_in=0;
	$embed_in_rt_id="26";

}else if($embed_rt_id=="16"){
	//ขายวัสดุก่อสร้าง 
	
	if($sub_type){
		if($sub_type=='All'){
	
			$condition_in=1;
			$embed_in_rt_id="'27','28'";
	
		}else{
			$condition_in=0;//condition is not where in
			$embed_in_rt_id=$sub_type;
		}
	}else{
		$condition_in=1;
	$embed_in_rt_id="'27','28'";
	}
	
	


}else if($embed_rt_id=="17"){
	//ขายเฟอร์นิเจอร์
	
	if($sub_type){
		if($sub_type=='All'){
	
			$condition_in=1;
			$embed_in_rt_id="'29','35'";
	
		}else{
			$condition_in=0;//condition is not where in
			$embed_in_rt_id=$sub_type;
		}
	}else{
		$condition_in=1;
		$embed_in_rt_id="'29','35'";
	}
	
	
	
}else if($embed_rt_id=="18"){
	//ขายเฟอร์นิเจอร์
	
	if($sub_type){
		if($sub_type=='All'){
	
			$condition_in=1;
			$embed_in_rt_id="'30','31','32','33','34','36'";
	
		}else{
			$condition_in=0;//condition is not where in
			$embed_in_rt_id=$sub_type;
		}
	}else{
		$condition_in=1;
		$embed_in_rt_id="'30','31','32','33','34','36'";
	}
	
	
	
}else if($embed_rt_id=="19"){
	//ขายเฟอร์นิเจอร์
	
	if($sub_type){
		if($sub_type=='All'){
	
			$condition_in=1;
			$embed_in_rt_id="'37','38'";
	
		}else{
			$condition_in=0;//condition is not where in
			$embed_in_rt_id=$sub_type;
		}
	}else{
		$condition_in=1;
		$embed_in_rt_id="'37','38'";
	}
	
	
	
}else{
	$condition_in=0;
	$embed_in_rt_id="All";
}
//echo "embed_in_rt_id=".$embed_in_rt_id;
/*
$rdg_address_province_id=$_POST['rdg_address_province_id'];
if($rdg_address_province_id==""){
	$rdg_address_province_id="All";
}

$rdg_address_district_id=$_POST['rdg_address_district_id'];
if($rdg_address_district_id==""){
	$rdg_address_district_id="All";
}
$rdg_address_sub_district_id=$_POST['rdg_address_sub_district_id'];
if($rdg_address_sub_district_id==""){
	$rdg_address_sub_district_id="All";
}
*/
$rdg_bts=$_POST['rdg_bts'];

if($rdg_bts==""){
	$rdg_bts="All";
}
$rdg_bus=$_POST['rdg_bus'];
if($rdg_bus==""){
	$rdg_bus="All";
}
$rdg_harbor=$_POST['rdg_harbor'];
if($rdg_harbor==""){
	$rdg_harbor="All";
}
$rdg_id=$_POST['rdg_id'];
if($rdg_id==""){
	$rdg_id="All";
}
$rdg_mrt=$_POST['rdg_mrt'];
if($rdg_mrt==""){
	$rdg_mrt="All";
}
$rdg_address_road=$_POST['rdg_address_road'];
if($rdg_address_road==""){
	$rdg_address_road="All";
}
//realty main start
//realty sub post start
$rdg_price_start=$_POST['rdg_price_start'];
$rdg_price_end=$_POST['rdg_price_end'];
$rdg_area_number=$_POST['rdg_area_number'];
$rdg_area_unit=$_POST['rdg_area_unit'];
$rdr_bedroom=$_POST['rdr_bedroom'];

//realty sub post end
if($_POST['paramAction']=="searchQuick"){
	$searchQuick=$_POST['searchQuick'];
	$rdg_rf=$_POST['rdg_rf'];
	
	$strSQLPostDetail="
	select rdg.*,rt_name,rf_name,rps_name from realty_data_general rdg
	LEFT JOIN realty_type rt
	ON rdg.rt_id=rt.rt_id
	LEFT JOIN realty_for rf
	ON rdg.rf_id=rf.rf_id
	LEFT JOIN realty_project_status rps
	ON rdg.rps_id=rps.rps_id
	WHERE  (rdg_title like '%$searchQuick%')
	and (rdg.rf_id='$rdg_rf')
	order by rdg.rdg_update desc
	";
	
	/*
	 or (rt_name like '%$searchQuick%')
	 or (rdg_title like '%$searchQuick%')
	 or (rf_name like '%$searchQuick%')
	 or (rps_name like '%$searchQuick%')
	 or (rdg_name_project like '%$searchQuick%')
	 or (rdg_detail like '%$searchQuick%')
	*/

	
}else if($_POST['paramAction']=="searchSubPost"){
//realty sub port start	
	
	$rdg_bts=$_POST['rdg_bts2'];
	if($rdg_bts==""){
		$rdg_bts="All";
	}
	
	
	if($_POST['rdg_rf']!=""){
		$rdg_rf=$_POST['rdg_rf'];
	}else{
		$rdg_rf="All";
	}
	$strSQLPostDetail="
	
	
	select rdg.*,rt_name,rf_name,rps_name,ru_name,rdr_bedroom,c.cus_enable from realty_data_general rdg
	LEFT JOIN realty_type rt
	ON rdg.rt_id=rt.rt_id
	LEFT JOIN realty_for rf
	ON rdg.rf_id=rf.rf_id
	LEFT JOIN realty_project_status rps
	ON rdg.rps_id=rps.rps_id
	
	LEFT JOIN realty_unit ru 
	ON ru.ru_id=rdg_area_unit
	LEFT JOIN realty_detail_room rdr
	ON rdr.rdg_id=rdg.rdg_id
	LEFT JOIN customer c
	ON rdg.cus_id=c.cus_id
	";
	if($condition_in==1){
		$condition_in_query="rdg.rt_id IN ($embed_in_rt_id)";
	}else{
		$condition_in_query="(rdg.rt_id='$embed_in_rt_id' or 'All'='$embed_in_rt_id')";
	}
	$strSQLPostDetail.="
	WHERE $condition_in_query
	AND (rdg.rdg_address_province_id='$rdg_address_province_id' or 'All'='$rdg_address_province_id')
	AND (rdg.rdg_address_district_id='$rdg_address_district_id' or 'All'='$rdg_address_district_id')
	AND (rdg.rdg_address_sub_district_id='$rdg_address_sub_district_id' or 'All'='$rdg_address_sub_district_id')
	AND (rdg.rdg_address_road='$rdg_address_road' or 'All'='$rdg_address_road')
	AND (rdg.rdg_bts='$rdg_bts' or 'All'='$rdg_bts')
	AND (rdg.rdg_mrt='$rdg_mrt' or 'All'='$rdg_mrt')
	AND (rdg.rdg_arl='' or 'All'='All')
	AND (rdg.rdg_harbor='$rdg_harbor' or 'All'='$rdg_harbor')
	AND c.cus_enable='Yes'";
	
	if($embed_rt_id!="16" and $embed_rt_id!="17" and $embed_rt_id!="18" and $embed_rt_id!="19"){
	$strSQLPostDetail.="
	AND (rdg_price BETWEEN '$rdg_price_start' AND '$rdg_price_end'  or 'All'='$rdg_price_start' or 'All'='$rdg_price_end')
	AND (rdg_area_number<='$rdg_area_number' or 'All'='$rdg_area_number')
	AND (rdg_area_unit='$rdg_area_unit'  or 'All'='$rdg_area_unit')
	AND (rdr_bedroom='$rdr_bedroom'   or 'All'='$rdr_bedroom')";
	}
	if($embed_rt_id!="18"){
	$strSQLPostDetail.="
	AND (rdg.rf_id='$rdg_rf'   or 'All'='$rdg_rf' or $rdg_rf=3)";
	
	}
	$strSQLPostDetail.="order by rdg.rdg_update desc";

//realty sub port end
}else{
/*
embed_rt_id
rdg_address_district_id
rdg_address_province_id
rdg_address_sub_district_id
rdg_bts
rdg_bus
rdg_harbor
rdg_id
rdg_mrt
rdg_road
$condition_in=1;
$embed_rt_id="'1','2'";
*/
	
	$strSQLPostDetail.="
	select rdg.*,rt_name,rf_name,rps_name,c.cus_enable from realty_data_general rdg
	LEFT JOIN realty_type rt 
	ON rdg.rt_id=rt.rt_id
	LEFT JOIN realty_for rf
	ON rdg.rf_id=rf.rf_id
	LEFT JOIN realty_project_status rps
	ON rdg.rps_id=rps.rps_id
	LEFT JOIN customer c
	ON rdg.cus_id=c.cus_id		
	";
	if($condition_in==1){
		$condition_in_query="rdg.rt_id IN ($embed_in_rt_id)";
	}else{
		$condition_in_query="(rdg.rt_id='$embed_in_rt_id' or 'All'='$embed_in_rt_id')";
	}
	$strSQLPostDetail.="
	WHERE $condition_in_query
	AND (rdg.rdg_address_province_id='$rdg_address_province_id' or 'All'='$rdg_address_province_id')
	AND (rdg.rdg_address_district_id='$rdg_address_district_id' or 'All'='$rdg_address_district_id')
	AND (rdg.rdg_address_sub_district_id='$rdg_address_sub_district_id' or 'All'='$rdg_address_sub_district_id')
	AND (rdg.rdg_address_road='$rdg_address_road' or 'All'='$rdg_address_road')
	AND (rdg.rdg_bts='$rdg_bts' or 'All'='$rdg_bts')
	AND (rdg.rdg_mrt='$rdg_mrt' or 'All'='$rdg_mrt')
	AND (rdg.rdg_arl='' or 'All'='All')
	AND (rdg.rdg_harbor='$rdg_harbor' or 'All'='$rdg_harbor')
	AND c.cus_enable='Yes'
	AND rf.rf_id='$rdg_rf'
	AND (rdg.rdg_id='$rdg_id' or 'All'='$rdg_id')
	order by rdg.rdg_update desc
	";
}


//echo "QUERY:".$strSQLPostDetail;
	$resultPostDetail=mysql_query($strSQLPostDetail);
	//$resultPostDetail=pu_query($dbname,$strSQLPostDetail);

	$resultPostDetail2=mysql_query($strSQLPostDetail);
	$rsPostDetail2=mysql_fetch_array($resultPostDetail2);
	
	$strSQLRT2="select * from realty_type where rt_id='".$_POST['embed_rt_id']."'";
	$resultRT2=mysql_query($strSQLRT2);
	$rsRT2=mysql_fetch_array($resultRT2);
	
	$resultNum=mysql_query($strSQLPostDetail);
	$rsNumSearch=mysql_num_rows($resultNum);
	
	
?>
<script src="Controller/page/cPostDetail.js"></script>    	
<div class="blog margin-bottom-5">
		 <!--  include searshSubPostRealty Start -->
		 <?php include_once 'searchSubPostRealty.php';?>
		 <!--  include searshSubPostRealty End -->
		 <div class="row">
					<div class="panel  panel-red" style="margin-bottom: 5px;">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-tasks"></i> ผลการคค้นหา<?=$_POST['embed_rt_name']?></h3>
						</div>
						<div class="panel-body">

											<div class="row">

												<!-- Begin Easy Block -->                
												<div class="col-md-12 col-sm-12">

													

													<div class="easy-block-v2">

													<!-- start button link -->
													<p>
														<button type="button"  onClick="window.open('https://www.facebook.com/sharer.php?u=www.realthairealty.com<?=$_SERVER['REQUEST_URI']?>')"; class="btn-u  btn-u-xs  btn-u-green"><i class="fa fa-cloud"></i> แชร์ไปที่เฟสบุ๊ค</button>
														
														<button class="btn-u  btn-u-xs btn-u-green" data-toggle="modal" data-target="#sendToMyFriendsFormModal" type="button"><i class="fa fa-bell-o"></i>ส่งหน้านี้ให้เพิ่อน</button>
														<!-- <button type="button" class="btn-u  btn-u-xs  btn-u-green"><i class="fa fa-envelope-o"></i> เก็บหน้านี้ไว้ดูครั้งหน้า</button> -->
														<button type="button" onClick="window.open('index.php?page=postSaved')"; class="btn-u  btn-u-xs  btn-u-green"><i class="fa fa-download"></i>คลิ๊กดูหน้าที่จัดเก็บไว้</button>
														<button type="button" onClick="window.print()"; class="btn-u  btn-u-xs  btn-u-green"><i class="fa fa-download"></i>ปริ้น</button>
													
													</p>
													<!--end  button link -->
												


													<div class="alert alert-success fade in ">
														<div class="row">
																<div class="col-md-6">
																	<h3 style="margin:0px;">
																	<?php 
																	if($embed_rt_id=="18"){
																		?>
																		ประกาศสำหรับผู้รับเหมา
																		<?php
																	}else if($embed_rt_id=="19"){
																		?>
																		ประกาศสำหรับขายเครื่องมือและเครื่องจักรสำหรับก่อสรัาง
																		<?php
																	}else if($embed_rt_id=="17"){
																		?>
																		ประกาศสำหรับฟอร์นิเจอร์
																		<?php
																	}else if($embed_rt_id=="16"){
																		?>
																		ประกาศสำหรับขายวัสดุก่อสร้าง
																		<?php
																	}else{
																		?>
																		ประกาศอสังหาริมทรัพย์
																		<?php
																	}
																	
																	?>
																	</h3>
																</div>
																<div class="col-md-6" style="text-align:right; padding:2px;">
																	
																	
																	<?php 
																	if($embed_rt_id==1){
																		
																		if("All"==$home_type){
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."บ้านทุกประเภท</h3>";
																		}else if("2"==$home_type){
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."บ้านเดี่ยว</h3>";
																		}else if("3"==$home_type){
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."บ้านสองชั้น</h3>";
																		}else if("4"==$home_type){
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."บ้านสามชั้น</h3>";
																		}else if("5"==$home_type){
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."บ้านแฝด</h3>";
																		}else{
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."บ้านทุกประเภท</h3>";
																		}
																	}elseif($embed_rt_id==3){
																		if("All"==$sub_type){
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."ที่ดินทุกประเภท</h3>";
																		}else if("9"==$sub_type){
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."ที่ดินเปล่า</h3>";
																		}else if("10"==$sub_type){
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."ที่ดินพร้อมสิ่งปลูกสร้าง </h3>";
																		}else{
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."ที่ดินทุกประเภท</h3>";
																		}
																	}elseif($embed_rt_id==5){

																		 if("12"==$sub_type){
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."อาคารพาณิชย์</h3>";
																		}else if("13"==$sub_type){
																			echo"<h3 style=\"margin:0px;\"> ".$realty_text_type."โฮมออฟฟิค  </h3>";
																		}else{
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."อาคารพาณิชย์</h3>";
																		}
																		
																	}elseif($embed_rt_id==9){
																		if("All"==$sub_type){
																			echo"<h3 style=\"margin:0px;\">หอพักสำหรับ".$realty_text_type."ทุกประเภท</h3>";
																		}else if("15"==$sub_type){
																			echo"<h3 style=\"margin:0px;\">หอพักชายสำหรับ".$realty_text_type."</h3>";
																		}else if("16"==$sub_type){
																			echo"<h3 style=\"margin:0px;\">หอพักหญิงสำหรับ".$realty_text_type." </h3>";
																		}else if("17"==$sub_type){
																			echo"<h3 style=\"margin:0px;\">หอพักรวมสำหรับ".$realty_text_type." </h3>";
																		}else{
																			echo"<h3 style=\"margin:0px;\">หอพักสำหรับ".$realty_text_type."ทุกประเภท</h3>";
																		}
																		
																		
																	}elseif($embed_rt_id==16){

																		if("All"==$sub_type){
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."วัสดุก่อสร้างทุกประเภท</h3>";
																		}else if("27"==$sub_type){
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."วัสดุก่อสร้าง </h3>";
																		}else if("28"==$sub_type){
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."อุปกรณ์ก่อสร้าง </h3>";
																		}else{
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."วัสดุก่อสร้างทุกประเภท</h3>";
																		}
																	
																	}elseif($embed_rt_id==17){

																			if("All"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."เฟอร์นิเจอร์ทุกประเภท</h3>";
																			}else if("29"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."เฟอร์นิเจอร์ภายใน </h3>";
																			}else if("35"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."เฟอร์นิเจอร์ภายนอก</h3>";
																			}else{
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."เฟอร์นิเจอร์ทุกประเภท</h3>";
																			}
																	
																	}elseif($embed_rt_id==18){

																			if("All"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">ผู้รับเหมาทุกประเภท</h3>";
																			}else if("30"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">ผู้รับเหมาก่อสร้าง </h3>";
																			}else if("31"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">ผู้รับเหมาตกแต่ง</h3>";
																			}else if("32"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">ผู้รับเหมาฐานราก </h3>";
																			}else if("33"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">ผู้รับเหมา</h3>";
																			}else if("34"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">รายการรับเหมาอื่นๆ </h3>";
																			}else if("36"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">ผู้รับเหมาทั่วไป</h3>";
																			}else{
																				echo"<h3 style=\"margin:0px;\">สำหรับผู้รับเหมาทุกประเภท</h3>";
																			}
																	
																	}elseif($embed_rt_id==19){

																			if("All"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."เครื่องมือก่อสร้างและเครื่องจักก่อสร้าง</h3>";
																			}else if("37"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."เครื่องมือก่อสร้าง  </h3>";
																			}else if("38"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."เครื่องจักก่อสร้าง </h3>";
																			}else{
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."เครื่องมือก่อสร้างและเครื่องจักก่อสร้าง</h3>";
																			}
																	
																	}else{
																		?>
																		<h3 style="margin:0px;"><?=$rsPostDetail2['rt_name']?></h3>
																		<?php
																	}
																	?>
																	
																</div>
														</div>
													</div>
													<?php 
													if(($embed_rt_id==18) ||($embed_rt_id==17)||($embed_rt_id==19)){
														
													}else{
													?>
													<div class="alert alert-warning  fade in ">
														<div class="row">
																<div class="col-md-6">
																<?php 
																	if($embed_rt_id==1){

																		if("All"==$home_type){
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."บ้านทุกประเภท</h3>";
																		}else if("2"==$home_type){
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."บ้านเดี่ยว</h3>";
																		}else if("3"==$home_type){
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."บ้านสองชั้น</h3>";
																		}else if("4"==$home_type){
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."บ้านสามชั้น</h3>";
																		}else if("5"==$home_type){
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."บ้านแฝด</h3>";
																		}else{
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."บ้านทุกประเภท</h3>";
																		}
																	}elseif($embed_rt_id==3){

																		if("All"==$sub_type){
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."ที่ดินทุกประเภท</h3>";
																		}else if("9"==$sub_type){
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."ที่ดินเปล่า</h3>";
																		}else if("10"==$sub_type){
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."ที่ดินพร้อมสิ่งปลูกสร้าง </h3>";
																		}else{
																			echo"<h3 style=\"margin:0px;\">".$realty_text_type."ที่ดินทุกประเภท</h3>";
																		}
																		
																		}elseif($embed_rt_id==5){

																			if("12"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."อาคารพาณิชย์</h3>";
																			}else if("13"==$sub_type){
																				echo"<h3 style=\"margin:0px;\"> ".$realty_text_type."โฮมออฟฟิค  </h3>";
																			}
																		
																		}elseif($embed_rt_id==9){
																			if("All"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">หอพักสำหรับ".$realty_text_type."ทุกประเภท</h3>";
																			}else if("15"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">หอพักชายสำหรับ".$realty_text_type."</h3>";
																			}else if("16"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">หอพักหญิงสำหรับ".$realty_text_type." </h3>";
																			}else if("17"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">หอพักรวมสำหรับ".$realty_text_type." </h3>";
																			}else{
																				echo"<h3 style=\"margin:0px;\">หอพักสำหรับ".$realty_text_type."ทุกประเภท</h3>";
																			}
																		
																		}elseif($embed_rt_id==16){

																			if("All"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."วัสดุก่อสร้างทุกประเภท</h3>";
																			}else if("27"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."วัสดุก่อสร้าง </h3>";
																			}else if("28"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."อุปกรณ์ก่อสร้าง </h3>";
																			}else{
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."วัสดุก่อสร้างทุกประเภท</h3>";
																			}
																	
																	}elseif($embed_rt_id==17){

																			if("All"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."เฟอร์นิเจอร์ทุกประเภท</h3>";
																			}else if("29"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."เฟอร์นิเจอร์ภายใน </h3>";
																			}else if("35"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."เฟอร์นิเจอร์ภายนอก</h3>";
																			}else{
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."เฟอร์นิเจอร์ทุกประเภท</h3>";
																			}
																	
																	}elseif($embed_rt_id==18){

																			if("All"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."สำหรับผู้รับเหมาทุกประเภท</h3>";
																			}else if("30"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."ผู้รับเหมาก่อสร้าง </h3>";
																			}else if("31"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."ผู้รับเหมาตกแต่ง</h3>";
																			}else if("32"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."ผู้รับเหมาฐานราก </h3>";
																			}else if("33"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."ผู้รับเหมา</h3>";
																			}else if("34"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."รายการรับเหมาอื่นๆ </h3>";
																			}else if("36"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."ผู้รับเหมาทั่วไป</h3>";
																			}else{
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."สำหรับผู้รับเหมาทุกประเภท</h3>";
																			}
																	
																	}elseif($embed_rt_id==19){

																			if("All"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."เครื่องจักก่อสร้างและเครื่องจักก่อสร้าง</h3>";
																			}else if("37"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."เครื่องมือก่อสร้าง  </h3>";
																			}else if("38"==$sub_type){
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."เครื่องจักก่อสร้าง </h3>";
																			}else{
																				echo"<h3 style=\"margin:0px;\">".$realty_text_type."เครื่องจักก่อสร้างและเครื่องจักก่อสร้าง</h3>";
																			}
																	
																	}else{
																		?>
																		<h3 style="margin:0px;"><?=$rsPostDetail2['rt_name']?></h3>
																		<?php
																	}
																	?>
																	
																</div>
																<div class="col-md-6" style="text-align:right; padding:2px;">
																	<h3 style="margin:0px;"></h3>
																	<?php 
																	
																	if($_POST['rdg_rf']=="1"){
																		?>
																		<button type="button" class="btn-u btn-u-red"  style="padding: 3px;"><i class="fa fa-bell-o"></i>ประกาศขายขาด</button>
																		<?php
																	}else if($_POST['rdg_rf']=="2"){
																		?>
																		<button type="button" class="btn-u btn-u-red"  style="padding: 3px;"><i class="fa fa-bell-o"></i>ประกาศเช่า</button>
																		<?php
																		/*
																	}else if($_POST['rdg_rf']=="3"){
																		?>
																		<button type="button" class="btn-u btn-u-red"  style="padding: 3px;"><i class="fa fa-bell-o"></i>ประกาศขายและเข่า</button>
																		<?php
																		*/
																	}else if($_POST['rdg_rf']=="5"){
																		?>
																		<button type="button" class="btn-u btn-u-red"  style="padding: 3px;"><i class="fa fa-bell-o"></i>ประกาศขายดาวน์</button>
																		<?php
																	}
																	?>
																	
																	
																</div>
														</div>
													</div>

												<?php }?>
												

														<!--<div class="easy-bg-v2 rgba-default">ใหม่</div>
														<img src="assets/img/main/img9.jpg" alt="">       
													
														<ul class="list-unstyled" style="margin-top:2px;">
															<button type="button" class="btn-u btn-u-default" style="height:80px; width:100px;">img1</button>
															<button type="button" class="btn-u btn-u-default" style="height:80px;width:100px;">img2</button>
															<button type="button" class="btn-u btn-u-default" style="height:80px; width:100px;">img3</button>
															<button type="button" class="btn-u btn-u-default" style="height:80px; width:100px;">img4</button>
															<button type="button" class="btn-u btn-u-default" style="height:80px;width:100px;">img5</button>
															<button type="button" class="btn-u btn-u-default" style="height:80px; width:100px;">img6</button>
														</ul>    
															-->
															
													<?php 
													if(($embed_rt_id==18) ||($embed_rt_id==17)||($embed_rt_id==19)||($embed_rt_id==16)){
														$rsPostDetailNum=mysql_num_rows($resultPostDetail);
													
													?>
													<!-- table grid 2 column start -->		
													<table id="gridPostDedail" border=''>
										                <colgroup>
										                    <col />
										                    <col />
										                   
										                </colgroup>
										                <thead>
										                    <tr>
										                    <?php 
										                    //echo $embed_in_rt_id.",";
										                    //echo $condition_in;
										                    ?>
										                        <th data-field="field1">	ค้นหาพบ <?=$rsNumSearch?> รายการ</th>
										                        <?php 
										                        if($rsPostDetailNum==1){
										                        	
										                        }else{
										                        	?>
										                        	 <th data-field="field2"></th>
										                        	<?php
										                        }
										                        ?>
										                       
										                       
										                    </tr>
										                   
										                    
										                    
										                </thead>
										                <tbody>
										                
															<?php 
															$numLoop=1;
															
															while($rsPostDetail=mysql_fetch_array($resultPostDetail)){
																
																if($numLoop%2 == 0){
																	//echo "เลขคู่".$numLoop;
																	?>
											                        <td>
																	<?php
																}else{
																	//echo "เลขคี่".$numLoop;
																	?>
																<tr>
											                        <td>
																	<?php
																}
															
															?>
															
										                 
												                       
															<!-- start list realty -->
															<div class="col-xs-12 shadow-wrapper">
																<div class="tag-box tag-box-v1 box-shadow shadow-effect-2" style='height:160px;'>
																	<div class='row'>
																		<div class='col-xs-12'>
																		<p>
																		<button id="<?=$rsPostDetail['cus_id']?>" type="button" class="btn-u btn-u-xs btn-u-green contactFormModal" data-toggle="modal" data-target="#contactFormModal"><i class="fa fa-child "></i> ติดต่อผู้ลงประกาศ</button>
																		<button id="<?=$rsPostDetail['rdg_id']?>" type="button" class="btn-u btn-u-xs btn-u-green mapContactModal" data-toggle="modal" data-target="#mapContactModal"><i class="fa  fa-car"></i> แผนที่</button>
																		<button type="button" id="<?=$rsPostDetail['rdg_id']?>" class="btn-u  btn-u-xs btn-u-green btnSavePost"><i class="fa fa-download"></i> เก็บไว้ดูภายหลัง</button>
																		
																		
																		</p>
																		</div>
																	</div>
																	
																	<h2>
																	
																	<?php 
																	
																	
																	if(strlen($rsPostDetail['rdg_title_detail'])>25){
																		echo mb_substr($rsPostDetail['rdg_title_detail'],0,25,"UTF-8")."...";
																	}else{
																		echo $rsPostDetail['rdg_title_detail'];
																	}
																	?>
																	</h2>
																	<div class="row">
																		<div class="col-md-4">
																		
																		<?php 
																			$strSQL="select * from realty_images where rdg_id='".$rsPostDetail['rdg_id']."' and  ri_set_first='0'  ORDER BY ri_set_first ";
																			$result=mysql_query($strSQL);
																			$i=1;
																			$rs=mysql_fetch_array($result);
																				//จัดการกับรูปภาพ
																				$thumbnailsPath="realtyPicture/".$rsPostDetail['rdg_id']."/".$rs[ri_id]."/thumbnail/";
																				if(!is_dir($thumbnailsPath)){
																					
																				}else{ //else
																			
																					if($handle= opendir($thumbnailsPath)){
																						$imagesFiles = array();
																						while(false!=($file=readdir($handle))){
																							if($file!="." && $file!=".."){
																								$thumbnailsFile = $thumbnailsPath."/".$file;
																								$fileType = pathinfo($thumbnaisFile);//แสดงpath
																								$fileType = strtolower($fileType['extension']);//แสดงpathพร้อม แสดงนามสกุล
																								$allowedtypes=array("png","jpeg","jpd","gif");
																			
																								if(is_file($thumbnailsFile)&& in_array($fileType,$allowedtypes))
																								{
																									$imagesFiles[]=$thumbnailsFile;
																								}
																			
																							}
																						}
																						closedir($handle);
																					}
																					sort($imagesFiles);
																					if(count($imagesFiles)>0){
																						$thumbnailsFile = $imagesFiles[0];
																					}
																				}//else
																				//ปิดจัดการรูปภาพ
																				
																				?>
																				<img alt="" src="<?=$thumbnailsFile?>" width="300" class="img-responsive">
																				<?php 
																			
																		?>

																		</div>
																		<div class="col-md-8">
																		
																		<?php 
																		if(strlen($rsPostDetail['rdg_detail'])>100){
																			echo mb_substr($rsPostDetail['rdg_detail'],0,100,"UTF-8")."...";
																		}else{
																			echo $rsPostDetail['rdg_detail'];
																		}
																		?>
																		<br>
																		
																		</div>

																	</div>
																	<div class='row'>
																		<div class='col-xs-12'>
																		<p>
																		
																		<button type="button" class="btn-u  btn-u-lg btn-u-red"  onclick="window.location.href='index.php?page=post_sub_detail&rdg_id=<?=$rsPostDetail['rdg_id']?>'"  type="button"><i class="fa fa-building "></i> ดูรายละเอียด</button>
																		
																		</p>
																		</div>
																	</div>
																</div>
															</div>
															<!-- end list realty -->
															<?php 

															if($numLoop%2 == 0){
																
																?>
																	
																	</td>
											                        </tr>
																<?php
																}else{
																	
																	?>
																
											                        </td>
																	<?php
																}
															
															?>
															
															
															<?php
															$numLoop++;
															}
															pu_pageloop();
															?>
															</tbody>
												          </table>
												          <!-- table grid 2 column end -->
												          <?php 
												          }else{
															?>
															<!-- table grid 1 column start -->
															
														<table id="gridPostDedail" border=''>
										                <colgroup>
										                    <col />
										                  
										                   
										                </colgroup>
										                <thead>
										                    <tr>
										                    <?php 
										                    //echo $embed_in_rt_id.",";
										                    //echo $condition_in;
										                    ?>
										                        <th data-field="field1">	ค้นหาพบ <?=$rsNumSearch?> รายการ</th>
										                      
										                       
										                    </tr>
										                   
										                    
										                    
										                </thead>
										                <tbody>
															<?php 
															
															while($rsPostDetail=mysql_fetch_array($resultPostDetail)){
		
																
															
															?>
															
										                 <tr>
											                <td>
												                       
															<!-- start list realty -->
															<div class="col-xs-12 shadow-wrapper">
																<div class="tag-box tag-box-v1 box-shadow shadow-effect-2">
																	<h2>(#<?=$rsPostDetail['rdg_id']?>)<?=$rsPostDetail['rdg_title']?></h2>
																	
																	
																	<div class="row">
																		<div class="col-md-3">
																		
																		<?php 
																			$strSQL="select * from realty_images where rdg_id='".$rsPostDetail['rdg_id']."' and  ri_set_first='0'  ORDER BY ri_set_first ";
																			$result=mysql_query($strSQL);
																			$i=1;
																			$rs=mysql_fetch_array($result);
																				//จัดการกับรูปภาพ
																				$thumbnailsPath="realtyPicture/".$rsPostDetail['rdg_id']."/".$rs[ri_id]."/thumbnail/";
																				if(!is_dir($thumbnailsPath)){
																					
																				}else{ //else
																			
																					if($handle= opendir($thumbnailsPath)){
																						$imagesFiles = array();
																						while(false!=($file=readdir($handle))){
																							if($file!="." && $file!=".."){
																								$thumbnailsFile = $thumbnailsPath."/".$file;
																								$fileType = pathinfo($thumbnaisFile);//แสดงpath
																								$fileType = strtolower($fileType['extension']);//แสดงpathพร้อม แสดงนามสกุล
																								$allowedtypes=array("png","jpeg","jpd","gif");
																			
																								if(is_file($thumbnailsFile)&& in_array($fileType,$allowedtypes))
																								{
																									$imagesFiles[]=$thumbnailsFile;
																								}
																			
																							}
																						}
																						closedir($handle);
																					}
																					sort($imagesFiles);
																					if(count($imagesFiles)>0){
																						$thumbnailsFile = $imagesFiles[0];
																					}
																				}//else
																				//ปิดจัดการรูปภาพ
																				
																				?>
																				<img alt="" src="<?=$thumbnailsFile?>" width="300" class="img-responsive">
																				<?php 
																			
																		?>

																		</div>
																		<div class="col-md-9">
																		<?//$rsPostDetail['rdg_detail']?>
																		<p>
																		<?php 
																		if(strlen($rsPostDetail['rdg_title_detail'])>200){
																			echo "<div>".mb_substr($rsPostDetail['rdg_title_detail'],0,200,"UTF-8")."...</div>";
																		}else{
																			echo $rsPostDetail['rdg_title_detail'];
																		}
																		
																		?>
																		</p>
																		<br>
																		<p>
																			<button id="<?=$rsPostDetail['cus_id']?>" type="button" class="btn-u btn-u-xs btn-u-green contactFormModal" data-toggle="modal" data-target="#contactFormModal"><i class="fa fa-child "></i> ติดต่อผู้ลงประกาศ</button>
																			<button id="<?=$rsPostDetail['rdg_id']?>" type="button" class="btn-u btn-u-xs btn-u-green mapContactModal" data-toggle="modal" data-target="#mapContactModal"><i class="fa  fa-car"></i> แผนที่</button>
																			<button type="button" id="<?=$rsPostDetail['rdg_id']?>" class="btn-u  btn-u-xs btn-u-green btnSavePost"><i class="fa fa-download"></i> เก็บไว้ดูภายหลัง</button>
																			<button type="button" class="btn-u  btn-u-xs btn-u-red"  onclick="window.location.href='index.php?page=post_sub_detail&rdg_id=<?=$rsPostDetail['rdg_id']?>'"  type="button"><i class="fa fa-building "></i> ดูรายละเอียด</button>
																			
																		</p>
																		</div>

																	</div>
																</div>
															</div>
															<!-- end list realty -->
															
															
															</td>
											                </tr>
															<?php
															
															}
															pu_pageloop();
															?>
															</tbody>
												          </table>
															<!-- table grid 1 column end -->
															<?php

												          
												          }
												          ?>
													</div> 

												</div>
												
												<!-- End Begin Easy Block -->                
															  
											</div>

							  </div>
				</div>
		   </div>
</div>
<!--End Blog Post0-->      

