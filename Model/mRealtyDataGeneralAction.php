<?php session_start()?>
<?php 
include("../config.inc.php");
if($_GET['paramAction']=="realtyFor"){
	
	$strSQL="select * from realty_for";
	$result=mysql_query($strSQL);
	$json="";
	$i=0;
	while ($rs=mysql_fetch_array($result)){
		if($i==0){
		$json.="[\"".$rs['rf_id']."\",\"".$rs['rf_name']."\"]";
		}else{
		$json.=",[\"".$rs['rf_id']."\",\"".$rs['rf_name']."\"]";
		}
		$i++;
	}
	echo "[".$json."]";
}
if($_POST['paramAction']=="realtyDataGeneralById"){
	$RdgId=$_POST['RdgId'];
	$strSQL="
			select rdg.*,rt.rt_contructor_yet  from realty_data_general  rdg
			LEFT JOIN  realty_type rt
			on rdg.rt_id=rt.rt_id
			WHERE rdg.rdg_id='$RdgId'
	";
	$result=mysql_query($strSQL);
	if($result){
		$rs=mysql_fetch_array($result);
		echo "{
				 \"rps_id\":\"".$rs['rps_id']."\"
				,\"rf_id\":\"".$rs['rf_id']."\"
				,\"rt_id\":\"".$rs['rt_id']."\"
				,\"cus_id\":\"".$rs['cus_id']."\"
				,\"rdg_title\":\"".trim($rs['rdg_title'])."\"
				,\"rdg_detail\":\"".nl2br($rs['rdg_detail'])."\"
				,\"rdg_owner_project\":\"".$rs['rdg_owner_project']."\"
				,\"rdg_price\":\"".$rs['rdg_price']."\"
				,\"rdg_price_rent\":\"".$rs['rdg_price_rent']."\"
				,\"rdg_price_down\":\"".$rs['rdg_price_down']."\"
				,\"rdg_price_project\":\"".$rs['rdg_price_project']."\"
				,\"rdg_name_project\":\"".$rs['rdg_name_project']."\"
				,\"rdg_address_project\":\"".$rs['rdg_address_project']."\"
				,\"rdg_address_no\":\"".$rs['rdg_address_no']."\"
				,\"rdg_address_province_id\":\"".$rs['rdg_address_province_id']."\"
				,\"rdg_address_district_id\":\"".$rs['rdg_address_district_id']."\"
				,\"rdg_address_sub_district_id\":\"".$rs['rdg_address_sub_district_id']."\"
				,\"rdg_address_road\":\"".$rs['rdg_address_road']."\"
				,\"rdg_post_code\":\"".$rs['rdg_post_code']."\"
				,\"rdg_map\":\"".$rs['rdg_map']."\"
				,\"rdg_area_number\":\"".$rs['rdg_area_number']."\"
				,\"rdg_area_unit\":\"".$rs['rdg_area_unit']."\"
				,\"rdg_estate_num\":\"".$rs['rdg_estate_num']."\"
				,\"rdg_estate_unit\":\"".$rs['rdg_estate_unit']."\"
				,\"rdg_special\":\"".$rs['rdg_special']."\"
				,\"rdg_mrt\":\"".$rs['rdg_mrt']."\"
				,\"rdg_arl\":\"".$rs['rdg_arl']."\"
				,\"rdg_bts\":\"".$rs['rdg_bts']."\"
				,\"rdg_harbor\":\"".$rs['rdg_harbor']."\"
				,\"rdg_bus\":\"".$rs['rdg_bus']."\"
				,\"rt_contructor_yet\":\"".$rs['rt_contructor_yet']."\"
						
				
			  }";
	}
	
	/*
	\"rps_id\":\"".$rs['rps_id']."\"
	,\"rf_id\":\"".$rs['rf_id']."\"
	,\"rt_id\":\"".$rs['rt_id']."\"
	,\"cus_id\":\"".$rs['cus_id']."\"
	,\"rdg_title\":\"".$rs['rdg_title']."\"
	,\"rdg_detail\":\"".$rs['rdg_detail']."\"
	,\"rdg_owner_project\":\"".$rs['rdg_owner_project']."\"
	,\"rdg_price\":\"".$rs['rdg_price']."\"
	,\"rdg_price_rent\":\"".$rs['rdg_price_rent']."\"
	,\"rdg_price_down\":\"".$rs['rdg_price_down']."\"
	,\"rdg_price_project\":\"".$rs['rdg_price_project']."\"
	,\"rdg_name_project\":\"".$rs['rdg_name_project']."\"
	,\"rdg_address_project\":\"".$rs['rdg_address_project']."\"
	,\"rdg_address_no\":\"".$rs['rdg_address_no']."\"
	,\"rdg_address_province_id\":\"".$rs['rdg_address_province_id']."\"
	,\"rdg_address_district_id\":\"".$rs['rdg_address_district_id']."\"
	,\"rdg_address_sub_district_id\":\"".$rs['rdg_address_sub_district_id']."\"
	,\"rdg_address_road\":\"".$rs['rdg_address_road']."\"
	,\"rdg_post_code\":\"".$rs['rdg_post_code']."\"
	,\"rdg_map\":\"".$rs['rdg_map']."\"
	,\"rdg_area_number\":\"".$rs['rdg_area_number']."\"
	,\"rdg_area_unit\":\"".$rs['rdg_area_unit']."\"
	,\"rdg_special\":\"".$rs['rdg_special']."\"
	,\"rdg_mrt\":\"".$rs['rdg_mrt']."\"
	,\"rdg_arl\":\"".$rs['rdg_arl']."\"
	,\"rdg_bts\":\"".$rs['rdg_bts']."\"
	,\"rdg_harbor\":\"".$rs['rdg_harbor']."\"
	\"rdg_bus\":\"".$rs['rdg_bus']."\"


	 */
	
}

if($_GET['paramAction']=="realtyType"){
	
	$rt_contructor_yet=$_GET['rt_contructor_yet'];
	
	
	
	$strSQL="select * from realty_type where rt_contructor_yet='$rt_contructor_yet'";
	$result=mysql_query($strSQL);
	$json="";
	$i=0;
	while ($rs=mysql_fetch_array($result)){
		if($i==0){
			$json.="[\"".$rs['rt_id']."\",\"".$rs['rt_name']."\",\"".$rs['rt_contructor_yet']."\"]";
		}else{
			$json.=",[\"".$rs['rt_id']."\",\"".$rs['rt_name']."\",\"".$rs['rt_contructor_yet']."\"]";
		}
		$i++;
	}
	echo "[".$json."]";
	
}
if($_GET['paramAction']=="realtyUnit"){

	$strSQL="select * from realty_unit";
	$result=mysql_query($strSQL);
	$json="";
	$i=0;
	while ($rs=mysql_fetch_array($result)){
		if($i==0){
			$json.="[\"".$rs['ru_id']."\",\"".$rs['ru_name']."\"]";
		}else{
			$json.=",[\"".$rs['ru_id']."\",\"".$rs['ru_name']."\"]";
		}
		$i++;
	}
	echo "[".$json."]";

}

if($_POST['paramAction']=="publicTransport"){
	$param_pt_type=$_POST['param_pt_type'];
	$strSQL="SELECT pt_id,pt_detail,pt_type FROM public_transport where pt_type='$param_pt_type'";
	$result=mysql_query($strSQL);
	$json="";
	$i=0;
	while ($rs=mysql_fetch_array($result)){
		if($i==0){
			$json.="[\"".$rs['pt_id']."\",\"".$rs['pt_detail']."\"]";
		}else{
			$json.=",[\"".$rs['pt_id']."\",\"".$rs['pt_detail']."\"]";
		}
		$i++;
	}
	echo "[".$json."]";

}

if($_POST['paramAction']=="realtyDataGeneralSave"){
	
	
	$rdg_address_district_id=$_POST['rdg_address_district_id'];
	$rdg_address_no=$_POST['rdg_address_no'];
	$rdg_address_post_code=$_POST['rdg_address_post_code'];
	$rdg_address_province_id=$_POST['rdg_address_province_id'];
	$rdg_address_road=$_POST['rdg_address_road'];
	$rdg_address_sub_district_id=$_POST['rdg_address_sub_district_id'];
	$rdg_area_number=$_POST['rdg_area_number'];
	$rdg_detail=nl2br($_POST['rdg_detail']);
	$rdg_name_project=$_POST['rdg_name_project'];
	$rdg_owner_project=$_POST['rdg_owner_project'];
	$rdg_price=$_POST['rdg_price'];
	$rdg_title=$_POST['rdg_title'];
	$realtyFor=$_POST['realtyFor'];
	$realtyType=$_POST['realtyType'];
	$realtyUnit=$_POST['realtyUnit'];
	$rdg_estate_num=$_POST['rdg_estate_num'];
	$rdg_estate_unit=$_POST['rdg_estate_unit'];
	$cus_id=$_SESSION['ses_cus_id'];
	$rdg_datetime=date("y-m-d:h:i:s");
	$paramLat=$_POST['paramLat'];
	$paramLong=$_POST['paramLong'];
	$rdg_map=$paramLat.",".$paramLong;
	$rps_id=$_POST['realtyProjectStatus'];
	
	
	$rdg_special=$_POST['rdg_special'];
	$rdg_address_project=$_POST['rdg_address_project'];
	
	$rdg_price_rent=$_POST['rdg_price_rent'];
	$rdg_price_down=$_POST['rdg_price_down'];
	$rdg_price_project=$_POST['rdg_price_project'];
	
	$rdg_mrt=$_POST['rdg_mrt'];
	$rdg_arl=$_POST['rdg_arl'];
	$rdg_bts=$_POST['rdg_bts'];
	$rdg_harbor=$_POST['rdg_harbor'];
	$rdg_bus=$_POST['rdg_bus'];
	
	$paramEmbedRdgId=$_POST['paramEmbedRdgId'];
	
	$rdg_status=$_POST['rdg_status'];
	
	if($rdg_status==""){
		$rdg_status='N';
	}else{
		$rdg_status=$rdg_status;
	}
	/*
	 rdg_special
	 rdg_price_project
	 rdg_address_project
	 
	 rdg_price_rent
	 rdg_price_down

	 rdg_mrt
	 rdg_arl
	 rdg_bts
	 rdg_harbor
	 rdg_bus

	*/
	

	if($paramEmbedRdgId!=""){
		//update

		$strSQL="
				update realty_data_general set 
				rps_id='$rps_id',
				rf_id='$realtyFor',
				rt_id='$realtyType',
				rdg_title='$rdg_title',
				rdg_detail='$rdg_detail',
				rdg_owner_project='$rdg_owner_project',
				rdg_price='$rdg_price',
				rdg_name_project='$rdg_name_project',
				rdg_address_no='$rdg_address_no',
				rdg_address_province_id='$rdg_address_province_id',
				rdg_address_district_id='$rdg_address_district_id',
				rdg_address_sub_district_id='$rdg_address_sub_district_id',
				rdg_address_road='$rdg_address_road',
				rdg_post_code='$rdg_post_code',
				rdg_map='$rdg_map',
				rdg_area_number='$rdg_area_number',
				rdg_area_unit='$realtyUnit',
				rdg_estate_num='$rdg_estate_num',
				rdg_estate_unit='$rdg_estate_unit',
				rdg_update='$rdg_datetime',
				
				rdg_special='$rdg_special',
				rdg_price_project='$rdg_price_project',
				rdg_address_project='$rdg_address_project',
				rdg_price_rent='$rdg_price_rent',
				rdg_price_down='$rdg_price_down',
				rdg_mrt='$rdg_mrt',
				rdg_arl='$rdg_arl',
				rdg_bts='$rdg_bts',
				rdg_harbor='$rdg_harbor',
				rdg_bus='$rdg_bus',
				rdg_status='$rdg_status'
				where rdg_id='$paramEmbedRdgId'
				";
		$result=mysql_query($strSQL)or die(mysql_error());
		if($result){
			echo'["udate_success"]';
		}
		
	}else{
		//insert
	
	
		$strSQL="insert into realty_data_general(
				rps_id,
				rf_id,
				rt_id,
				rdg_title,
				rdg_detail,
				rdg_owner_project,
				rdg_price,
				rdg_name_project,
				rdg_address_no,
				rdg_address_province_id,
				rdg_address_district_id,
				rdg_address_sub_district_id,
				rdg_address_road,
				rdg_post_code,
				rdg_map,
				rdg_area_number,
				rdg_area_unit,
				rdg_estate_num,
				rdg_estate_unit,
				cus_id,
				rdg_create,
				rdg_update,
				
				rdg_special,
				rdg_price_project,
				rdg_address_project,
				rdg_price_rent,
				rdg_price_down,
				rdg_mrt,
				rdg_arl,
				rdg_bts,
				rdg_harbor,
				rdg_bus,
				rdg_status
				
				
			)VALUES
			(
			'$rps_id',
			'$realtyFor',
			'$realtyType',
			'$rdg_title',
			'$rdg_detail',
			'$rdg_owner_project',
			'$rdg_price',
			'$rdg_name_project',
			'$rdg_address_no',
			'$rdg_address_province_id',
			'$rdg_address_district_id',
			'$rdg_address_sub_district_id',
			'$rdg_address_road',
			'$rdg_address_post_code',
			'$rdg_map',
			'$rdg_area_number',
			'$realtyUnit',
			'$rdg_estate_num',
			'$rdg_estate_unit',
			'$cus_id',
			'$rdg_datetime',
			'$rdg_datetime',
			
			'$rdg_special',
			'$rdg_price_project',
			'$rdg_address_project',
			'$rdg_price_rent',
			'$rdg_price_down',
			'$rdg_mrt',
			'$rdg_arl',
			'$rdg_bts',
			'$rdg_harbor',
			'$rdg_bus',
			'$rdg_status'
			
			
			
			
			
	)";
		$sucess=mysql_query($strSQL)or die(mysql_error());
		$rdg_id=mysql_insert_id();
		if(!$sucess){
			echo mysql_error();
		}else{
			echo "[[\"seccess\"],[".$rdg_id."]]";
			/*
			$strSQL="select rdg_id from realty_data_general where
			
				rps_id='$rps_id' and
				rf_id='$realtyFor' and
				rt_id='$realtyType' and
				rdg_title='$rdg_title' and
				rdg_detail='$rdg_detail' and
				rdg_owner_project='$rdg_owner_project' and
				rdg_price='$rdg_price' and
				rdg_name_project='$rdg_name_project' and
				rdg_address_no='$rdg_address_no' and
				rdg_address_province_id='$rdg_address_province_id' and
				rdg_address_district_id='$rdg_address_district_id' and
				rdg_address_sub_district_id='$rdg_address_sub_district_id' and
				rdg_address_road='$rdg_address_road' and
				rdg_post_code='$rdg_address_post_code' and
				rdg_map='$rdg_map' and
				rdg_area_number='$rdg_area_number' and
				rdg_area_unit='$realtyUnit' and
				cus_id='$cus_id' and
				rdg_create='$rdg_datetime' and
				rdg_update='$rdg_datetime'
				";
				
			$resullt=mysql_query($strSQL)or die(mysql_error());
			*/
			/*
			if($resullt){
				$rs=mysql_fetch_array($resullt);
				//echo $rs['rdg_id'];
				//$rdg_id=$rs['rdg_id'];
				echo "[[\"success\"],[".$rdg_id."]]";
			}else{
				echo "error".mysql_error();
			}
			*/
			
		}
	}
	
	
	/*
	rdg_address_district_id	
	rdg_address_no	
	rdg_address_post_code	
	rdg_address_province_id	
	rdg_address_road	
	rdg_address_sub_district_...	
	rdg_area_number	
	rdg_detail	
	rdg_name_project	
	rdg_owner_project	
	rdg_price	
	rdg_title	
	realtyFor	
	realtyType	
	realtyUnit
	 */
}
if($_POST['paramAction']=="province"){
	
	$strSQL="select p.PROVINCE_ID,p.PROVINCE_CODE,p.PROVINCE_NAME from province p";
	$result=mysql_query($strSQL);
	while ($rs=mysql_fetch_array($result)){
		if($i==0){
			$json.="[\"".$rs['PROVINCE_ID']."\",\"".$rs['PROVINCE_NAME']."\"]";
		}else{
			$json.=",[\"".$rs['PROVINCE_ID']."\",\"".$rs['PROVINCE_NAME']."\"]";
		}
		$i++;
	}
	echo "[".$json."]";
}
if($_POST['paramAction']=="district"){
	
	$strSQL="select a.AMPHUR_ID,a.AMPHUR_CODE,a.AMPHUR_NAME,a.PROVINCE_ID from amphur a where a.PROVINCE_ID=".$_POST['paramProvince']."";
	$result=mysql_query($strSQL);
	while ($rs=mysql_fetch_array($result)){
		if($i==0){
			$json.="[\"".$rs['AMPHUR_ID']."\",\"".$rs['AMPHUR_NAME']."\"]";
		}else{
			$json.=",[\"".$rs['AMPHUR_ID']."\",\"".$rs['AMPHUR_NAME']."\"]";
		}
		$i++;
	}
	echo "[".$json."]";
}


if($_POST['paramAction']=="sub_district"){

	$strSQL="select d.DISTRICT_ID,d.DISTRICT_NAME from district d where d.AMPHUR_ID=".$_POST['paramDistrictId']."";
	$result=mysql_query($strSQL);
	while ($rs=mysql_fetch_array($result)){
		if($i==0){
			$json.="[\"".$rs['DISTRICT_ID']."\",\"".$rs['DISTRICT_NAME']."\"]";
		}else{
			$json.=",[\"".$rs['DISTRICT_ID']."\",\"".$rs['DISTRICT_NAME']."\"]";
		}
		$i++;
	}
	echo "[".$json."]";
}
if($_POST['paramAction']=="realtyProjectStatus"){

	$strSQL="select rps_id,rps_name from realty_project_status rps order by rps_id";
	$result=mysql_query($strSQL);
	while ($rs=mysql_fetch_array($result)){
		if($i==0){
			$json.="[\"".$rs['rps_id']."\",\"".$rs['rps_name']."\"]";
		}else{
			$json.=",[\"".$rs['rps_id']."\",\"".$rs['rps_name']."\"]";
		}
		$i++;
	}
	echo "[".$json."]";
}





?>