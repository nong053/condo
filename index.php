<?php session_start();?>





<!DOCTYPE html> 
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>อสังหาริมทรัพย์</title>

    <!-- Meta -->
  
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Web Fonts -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- CSS Header and Footer -->
    <link rel="stylesheet" href="assets/css/headers/header-default.css">
    <link rel="stylesheet" href="assets/css/footers/footer-v1.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="assets/plugins/animate.css">
    <link rel="stylesheet" href="assets/plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
    <link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
	
    <!--[if lt IE 9]><link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/css/sky-forms-ie8.css"><![endif]-->

    <!-- CSS Customization -->
     <link rel="stylesheet" href="assets/css/custom.css">
	 <link rel="stylesheet" href="assets/css/custom_kosit.css">
	 <link rel="stylesheet" href="css/index.css">
	 <link rel="stylesheet" href="assets/plugins/brand-buttons/brand-buttons-inversed.css">
	  
	<!-- loading -->
    <link rel="stylesheet" href="css/HoldOn.min.css">

	
	
	  
	  <!-- JS Global Compulsory -->           
	<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="assets/plugins/jquery/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- JS Implementing Plugins -->
	<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
	<script type="text/javascript" src="assets/plugins/smoothScroll.js"></script>
	<script src="assets/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js"></script>
	<script src="assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
	<script src="assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
	<!-- JS Customization -->
	<!-- java script loading -->
	<script src="Controller/HoldOn.min.js"></script>
	<script type="text/javascript" src="assets/js/custom.js"></script>
	<script type="text/javascript" src="Controller/cMain.js"></script>
	<!-- JS Page Level -->           
	<script type="text/javascript" src="assets/js/app.js"></script>
	<script type="text/javascript" src="assets/js/plugins/masking.js"></script>
	<script type="text/javascript" src="assets/js/plugins/datepicker.js"></script>
	<script type="text/javascript" src="assets/js/plugins/validation.js"></script>
	<script type="text/javascript">
	    jQuery(document).ready(function() {
	        App.init();
	        Masking.initMasking();
	        Datepicker.initDatepicker();
	        Validation.initValidation();
	        });
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script> 
	
	
	<link rel="stylesheet" href="kendoCommercial/styles/kendo.common.min.css" />
	<link rel="stylesheet" href="kendoCommercial/styles/kendo.default.min.css" />
	<script src="kendoCommercial/js/kendo.all.min.js"></script>
	
	


	
	
<style>
.container{
  max-width: none !important;
  width: 1000px;
}
</style>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.5&appId=979932625399347";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</head>

<body> 

<!-- face book login start -->	
	<?php
require 'sdk/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '979932625399347',
  'secret' => 'f45db0c2367292ca9a099036faf6f722',
));

// Get User ID
$user = $facebook->getUser();

if ($user) {
  try {
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl();
}

// Save to mysql
if ($user) {

	if($_GET["code"] != "")
	{
		$_SESSION['ses_cus_id']=$user_profile["id"];
		$_SESSION['ses_cus_first_name']=$user_profile["name"];
		$_SESSION['ses_cus_email']=$user_profile["email"];
		/*
		echo "ses_cus_id=".$_SESSION['ses_cus_id']."<br>";
		echo "ses_cus_email=".$_SESSION['ses_cus_email'];
		*/
				$objConnect = mysql_connect("localhost","realthairealty","010535546") or die(mysql_error());
				$objDB = mysql_select_db("realthai_db");
				mysql_query("SET NAMES UTF8");
				$strSQL ="  INSERT INTO  customer (cus_id,cus_first_name,admin_id,cus_update) 
					VALUES
					('".$_SESSION['ses_cus_id']."',
					'".$_SESSION['ses_cus_first_name']."',
					'1',
					'".trim(date("Y-m-d H:i:s"))."')";
				
				$objQuery  = mysql_query($strSQL);
				
				
				
				?>
					<script>
						alert("เข้าระบบเรียบร้อยแล้ว");
					</script>
				<?php
				
				mysql_close();
				//header("location:index.php");
				?>
					<script>
						window.location='index.php';
					</script>
				<?php
				exit();
	}
}


// Logout
if($_GET["Action"] == "Logout")
{
	$facebook->destroySession();
	header("location:index.php");
	exit();
}
?>
<!-- face book login end -->
<?php
include("config.inc.php");

$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
$thai_month_arr=array(
		"0"=>"",
		"1"=>"มกราคม",
		"2"=>"กุมภาพันธ์",
		"3"=>"มีนาคม",
		"4"=>"เมษายน",
		"5"=>"พฤษภาคม",
		"6"=>"มิถุนายน",
		"7"=>"กรกฎาคม",
		"8"=>"สิงหาคม",
		"9"=>"กันยายน",
		"10"=>"ตุลาคม",
		"11"=>"พฤศจิกายน",
		"12"=>"ธันวาคม"
);
function thai_date($time){
	global $thai_day_arr,$thai_month_arr;
	$thai_date_return="วัน".$thai_day_arr[date("w",$time)];
	$thai_date_return.= "ที่ ".date("j",$time);
	$thai_date_return.=" เดือน".$thai_month_arr[date("n",$time)];
	$thai_date_return.= " พ.ศ.".(date("Yํ",$time)+543);
	$thai_date_return.= "  ".date("H:i",$time)." น.";
	return $thai_date_return;
}
?>


<?php 
/* ads function start */
function adsFn($id){
	$strSLQAds="select * from banner_sum where pic_position='$id' and
		(main_menu_id='home' or main_menu_id='All') and pic_display='Y'";
	$resultAds=mysql_query($strSLQAds);
	return $resultAds;
}
/* ads function end */
/*call ads function start*/
$rsAds1=mysql_fetch_array(adsFn("1"));
//echo "pic_name=".$rsAds1['pic_name'];

$rsAds2=mysql_fetch_array(adsFn("2"));
//echo "pic_name=".$rsAds2['pic_name'];

$rsAds3=mysql_fetch_array(adsFn("3"));
//echo "pic_name=".$rsAds3['pic_name'];

$rsAds4=mysql_fetch_array(adsFn("4"));
//echo "-----------------------------------------------------pic_name4=".$rsAds4['pic_name']."<br>";

$rsAds5=mysql_fetch_array(adsFn("5"));
//echo "pic_name=".$rsAds5['pic_name'];

$rsAds6=mysql_fetch_array(adsFn("6"));
//echo "pic_name=".$rsAds6['pic_name'];

$rsAds8=mysql_fetch_array(adsFn("8"));
//echo "pic_name=".$rsAds8['pic_name'];

$rsAds9=mysql_fetch_array(adsFn("9"));
//echo "pic_namepic_namepic_namepic_namepic_name=".$rsAds9['pic_name'];

$rsAds10=mysql_fetch_array(adsFn("10"));
//echo "pic_name=".$rsAds10['pic_name'];

$rsAds11=mysql_fetch_array(adsFn("11"));
//echo "pic_name=".$rsAds11['pic_name'];

$rsAds12=mysql_fetch_array(adsFn("12"));
//echo "pic_name=".$rsAds12['pic_name'];

$rsAds13=mysql_fetch_array(adsFn("13"));
//echo "pic_name=".$rsAds13['pic_name'];

$rsAds14=mysql_fetch_array(adsFn("14"));
//echo "pic_name=".$rsAds14['pic_name'];

$rsAds15=mysql_fetch_array(adsFn("15"));
//echo "pic_name=".$rsAds15['pic_name'];

$rsAds16=mysql_fetch_array(adsFn("16"));
//echo "pic_name=".$rsAds16['pic_name'];

$rsAds17=mysql_fetch_array(adsFn("17"));
//echo "pic_name=".$rsAds17['pic_name'];



/*call ads function end*/
?>
<div class='adLeft adsLR' >
<?php 
if($rsAds4['pic_name']){
?>
	<div class='ads ads4'>
		<?php 
    	if($rsAds4['pic_name']!=""){
    	?>
    	 <img src="control-panel/mypicture/1/<?=$rsAds4['pic_name']?>" width="100%" height="100%" />
    	
    	<?php 
		}else{
    	echo "ตำแหน่งที่ 4";
    	}
    	?>
	</div>
	  
<?php 
}
 ?>
</div>
<div class='adRight adsLR'>
<?php 
if($rsAds4['pic_name']){
?>
	<div class='ads ads4'>

		<?php 
    	if($rsAds4['pic_name']!=""){
    	?>
    	 <img src="control-panel/mypicture/1/<?=$rsAds4['pic_name']?>" width="100%" height="100%" />
    	
    	<?php 
		}else{
    	echo "ตำแหน่งที่ 4";
    	}
    	?>
	</div>
	<!-- 
	 <img src="control-panel/mypicture/1/<?=$rsLR['pic_name']?>" width="100%" height="100%" />
	 -->
<?php }?>
</div>
<?php 

	if($_GET['modal']=="login"){
		
		?>
		<script>
		$(document).ready(function(){
			$(".loginFormModal").click();
			$("#loginType").val("loginForPost");
		});
		
		</script>
		<?php

	}
?>

<div class="wrapper">

    <!--=== Header ===-->    
    <div class="header">
    	<div class="container " style="margin-bottom: 0px;">
	    	<div class=ads id="ads1">
	    	
	    	<?php 
	    	if($rsAds1['pic_name']!=""){
	    	?>
	    	 <img src="control-panel/mypicture/1/<?=$rsAds1['pic_name']?>" width="100%" height="100%" />
	    	
	    	<?php 
			}else{
	    	echo "ตำแหน่งที่ 1";
	    	}
	    	?>
	    	</div>
    	</div>
        <div class="container " style="margin-bottom: 0px; background:#fafafa ;">
            
			
					<div class="col-xs-2 bgLogo"  style='width:112px;'>
						<!-- Logo -->
						<?php 
						
						$sqlLogo="select * from object_system where object_position='header_logo'  and admin_id='1'";
						$result_header_logo=mysql_query($sqlLogo);
						$rs_header_logo=mysql_fetch_array($result_header_logo);
						$header_logo_color=$rs_header_logo[object_color];
						$header_logo_width=$rs_header_logo[object_width];
						$header_logo_height=$rs_header_logo[object_height];
						$header_logo_image=$rs_header_logo[object_name];
						/*
						echo "1=".$header_logo_color."<br>";
						echo "2=".$header_logo_width."<br>";
						echo "3=".$header_logo_height."<br>";
						echo "4=".$header_logo_image."<br>";
						*/
						
						?>
						<a class="logo" href="index.php" style='background: <?=$header_logo_color?>;'>
							<img width='<?=$header_logo_width?>' height='<?=$header_logo_height?>' src="./control-panel/object_system/1/<?=$header_logo_image?>" alt="Logo">
							
						</a>
						 <!-- End Logo -->
					</div>
					<div id="adHeader" style=" background:#dddddd; margin-top:2px; height:100%;width:554px;" class="col-xs-6 ">
					
					<div class=ads id="ads2">
	    				<?php 
				    	if($rsAds2['pic_name']!=""){
				    	?>
				    	 <img src="control-panel/mypicture/1/<?=$rsAds2['pic_name']?>" width="100%" height="100%" />
				    	
				    	<?php 
						}else{
				    	echo "ตำแหน่งที่ 2";
				    	}
				    	?>
					
					</div>
					
					
					 
					</div>
					<div class="col-xs-4">
					 <!-- Topbar -->
						<div class="" style="padding: 2px 0;">

                            <div class="row">
                                <div class="col-xs-6" style=" padding-left:2px;padding-right:1px;">
                                   
                                     <button class="btn btn-social btn-block btn-facebook-inversed " style="height:50px;" onclick="window.location.href='<?=$loginUrl?>'">
                                      <i class="fa fa-facebook"></i> 
                                      	
                                   
                                      	สมัครสมาชิกผ่านเฟสบุ๊ค
                                    
                                    </button>
                                   
                                </div>
                                
                                

                                 <div class="col-xs-6" style="padding-left:0px;padding-right:0px;" > 
                                   <!-- 
                                    <button id="google_translate_element" class="btn btn-social  btn-block btn-android-inversed " style="height:38px;">
                                      <i class="fa fa-globe"></i> เลือกภาษา
                                    </button>
                                     -->
                                    <div id="google_translate_element" class="btn-block btn-android-inversed" style="height:50px;"></div>
									<script>
									function googleTranslateElementInit() {
									  new google.translate.TranslateElement({
									    pageLanguage: 'th'
									  }, 'google_translate_element');
									}
									</script>
									<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                                </div>
                                
                                <div class="col-xs-6" style="padding-left:2px;padding-right:1px;">
                                    <button data-target="#registerFormModal" data-toggle="modal"   class="btn btn-social  btn-block  btn-windows-inversed" style="height:38px;">
                                      
                                      <i class="fa fa-rss"></i> สมัครสมาชิกใหม่ฟรี
                                    </button>
                                </div>

                                 <div class="col-xs-6"style="padding-left:0px;padding-right:0px;" >
                                     	
                                     	<?php 
                                     	if(($_SESSION['ses_cus_email']!="") or ($_SESSION['ses_cus_id']!="")){
                                     		?>
                                     		<button onclick="location.href='member/index.php?loginType=loginForManage'" class="btn btn-social  btn-block btn-xing-inversed loginFormModal" style="height:38px;">
		                                      <i class="fa fa-dropbox"></i> สมาชิกเข้าสู่ระบบ
		                                    </button>
                                     		<?php
                                     	}else{
                                     		?>
                                     		<button  data-target="#loginFormModal" data-toggle="modal" class="btn btn-social  btn-block btn-xing-inversed loginFormModal" style="height:38px;">
		                                      <i class="fa fa-dropbox"></i> สมาชิกเข้าสู่ระบบ
		                                    </button>
                                     		<?php
                                     	}
                                     	?>
	                                   
                                   
                                </div>
                            </div>

							
						</div>
						<!-- End Topbar -->
					</div>
		
			
           

            
        </div><!--/end container-->


    </div>
    <!--=== End Header ===-->
	<div class="breadcrumbs1">
    <!--===Start Top Buttons ===-->
	<div class="container">
		<div class="col-xs-3 postBtnTopArea">
				<!--class pull-left -->
				 <h1 class="" style="margin-bottom: 2px;margin-top: 2px;">
			
					<!--ประกาศขายฟรี-->
					<!-- 
						<button class="btn btn-block btn-facebook-inversed rounded" style="font-size:19px;">
						  <i class="fa fa-cloud"></i>คลิ๊กลงประกาศขายฟรี
						</button>
					 -->	
<?php 
$strSQLRT="
select rt_id,rt_name,rt_contructor_yet from realty_type where rt_contructor_yet='N' 
";
$resultRT=mysql_query($strSQLRT);

$strSQLRTM="
select rt_id,rt_name,rt_contructor_yet,rt_contructor_cate from realty_type where rt_contructor_yet='Y' and rt_contructor_cate='M'
";
$resultRTM=mysql_query($strSQLRTM);

$strSQLRTC="
select rt_id, rt_name,rt_contructor_yet,rt_contructor_cate from realty_type where rt_contructor_yet='Y' and rt_contructor_cate='C'
";
$resultRTC=mysql_query($strSQLRTC);



// separated by cate

include_once 'queryMenuIndex.php';
//menu for realty rent end
?>
					        <div class="dropdown">
					            <a style="font-size:19px;" id="dLabel" role="button" data-toggle="dropdown" class="btn btn-primary postBtnTop" data-target="#" href="#">
					                <i class="fa fa-cloud"></i> คลิ๊กลงประกาศขายฟรี <span class="caret"></span>
					            </a>
					    		<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
					              <li class="dropdown-submenu">
					                <a tabindex="-1" href="#">อสังหาริมทรัพย์</a>
					                <ul class="dropdown-menu">
					                		<?php 
					                		$result1=realtyCateMenuFn(1);
					                		while($rs1=mysql_fetch_array($result1)){

					                			if($rs1['rt_id']=='26'){
					                				?>
						                				<li><a href="member/index.php?newPost=Y&rtID=<?=$rs1['rt_id']?>&rfID=1&specialPost=N&rtContructorYet=<?=$rs1['rt_contructor_yet']?>"><?=$rs1['rt_name']?></a></li>
						                			<?php
					                			}else{
					                				?>
						                				<li><a href="member/index.php?newPost=Y&rtID=<?=$rs1['rt_id']?>&rfID=1&specialPost=N&rtContructorYet=<?=$rs1['rt_contructor_yet']?>"><?=$rs1['rt_name']?>สำหรับขาย </a></li>
						                			<?php
					                			}
												
					                		}
					                		?>
					                       	 <!-- 
											 <li><a target='_blank' href="#">บ้านเดี่ยว </a></li>
											 <li><a target='_blank' href="#">บ้านสองชั้น </a></li>
											 <li><a target='_blank' href="#">บ้านสามชั้น </a></li>
											 <li><a target='_blank' href="#">บ้านชั้นเดียว </a></li>
											 <li><a target='_blank' href="#">บ้านแฝด </a></li>
											 <li><a target='_blank' href="#">คอนโดมิเนียม </a></li>
											 <li><a target='_blank' href="#">ทาว์นเฮ้าส์/ทาว์นโฮม </a></li>
											 <li><a target='_blank' href="#"> ที่ดินพร้อมสิ่งปลูกสร้าง </a></li>
											 <li><a target='_blank' href="#">ที่ดินเปล่า </a></li>
											 <li><a target='_blank' href="#">อพาร์ตเมนท์ </a></li>
											 <li><a target='_blank' href="#">อาคารพาณิชย์ </a></li>
											 <li><a target='_blank' href="#">โฮมออฟฟิศ </a></li>
											 <li><a target='_blank' href="#">โรงงาน/โกดัง</a></li>
											 <li><a target='_blank' href="#">หอพักรวม </a></li>
											 <li><a target='_blank' href="#">หอพักชาย </a></li>
											 <li><a target='_blank' href="#">หอพักหญิง </a></li>
											 <li><a target='_blank' href="#">โรงแรม </a></li>
											 <li><a target='_blank' href="#">รีสอร์ท </a></li>
											 <li><a target='_blank' href="#">เกส์ตเฮ้าส์ </a></li>
											 <li><a target='_blank' href="#">อสังหาริมทรัพย์ อื่นๆ</a></li>
					                   		 -->
					                  
					                 
					                </ul>
					              </li>
					              <li class="divider"></li>
					              <?php 
					              $result2=realtyCateMenuFn(2);
			                		while($rs2=mysql_fetch_array($result2)){
			                			?>
			                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs2['rt_id']?>&rfID=1&specialPost=N&rtContructorYet=<?=$rs2['rt_contructor_yet']?>&rtContructorCate=<?=$rs2['rt_contructor_cate']?>"><?=$rs2['rt_name']?> </a></li>
			                			<?php
			                		}
			                		?>
			                		
			                		<?php 
			                		$result7=realtyCateMenuFn(7);
			                		while($rs7=mysql_fetch_array($result7)){
			                			?>
			                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs7['rt_id']?>&rfID=1&specialPost=N&rtContructorYet=<?=$rs7['rt_contructor_yet']?>&rtContructorCate=<?=$rs7['rt_contructor_cate']?>"><?=$rs7['rt_name']?> </a></li>
			                			<?php
			                		}
			                		?>
			                		
			                		<?php 
			                		$result8=realtyCateMenuFn(8);
			                		while($rs8=mysql_fetch_array($result8)){
			                			?>
			                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs8['rt_id']?>&rfID=1&specialPost=N&rtContructorYet=<?=$rs8['rt_contructor_yet']?>&rtContructorCate=<?=$rs8['rt_contructor_cate']?>"><?=$rs8['rt_name']?> </a></li>
			                			<?php
			                		}
			                		?>
			                		
			                		<?php 
			                		$result9=realtyCateMenuFn(9);
			                		while($rs9=mysql_fetch_array($result9)){
			                			?>
			                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs9['rt_id']?>&rfID=1&specialPost=N&rtContructorYet=<?=$rs9['rt_contructor_yet']?>&rtContructorCate=<?=$rs9['rt_contructor_cate']?>"><?=$rs9['rt_name']?> </a></li>
			                			<?php
			                		}
			                		?>
					             
					              <li class="divider"></li>
					              <li class="dropdown-submenu">
					              	
					                <a tabindex="-1" href="#">สำหรับผู้รับเหมา</a>
					                <ul class="dropdown-menu">
					                	    <?php 
					                	    $result3=realtyCateMenuFn(3);
					                		while($rs3=mysql_fetch_array($result3)){
					                			?>
					                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs3['rt_id']?>&rfID=1&specialPost=N&rtContructorYet=<?=$rs3['rt_contructor_yet']?>&rtContructorCate=<?=$rs3['rt_contructor_cate']?>"><?=$rs3['rt_name']?></a></li>
					                			<?php
					                		}
					                		?>
					                		<!-- 
					                        <li><a target='_blank' href="#">วัสดถก่อสร้าง
											<li><a target='_blank' href="#">เครื่องมือก่อสร้าง</a></li>
											<li><a target='_blank' href="#">เฟอร์นิเจอร์ </a></li>
											 -->
					                </ul>
					              </li>
					               <li class="dropdown-submenu">
					              	
					                <a tabindex="-1" href="#">วัสดถก่อสร้าง</a>
					                <ul class="dropdown-menu">
					                 		<?php 
					                 		$result4=realtyCateMenuFn(4);
					                		while($rs4=mysql_fetch_array($result4)){
					                			?>
					                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs4['rt_id']?>&rfID=1&specialPost=N&rtContructorYet=<?=$rs4['rt_contructor_yet']?>&rtContructorCate=<?=$rs4['rt_contructor_cate']?>"><?=$rs4['rt_name']?> </a></li>
					                			<?php
					                		}
					                		?>
					                      
				
					                </ul>
					              </li>
					              
					              <li class="dropdown-submenu">
					                <a tabindex="-1" href="#">เครื่องมือเครื่องจักรก่อสร้าง</a>
					                <ul class="dropdown-menu">
					                 		<?php 
					                 		$result5=realtyCateMenuFn(5);
					                		while($rs5=mysql_fetch_array($result5)){
					                			?>
					                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs5['rt_id']?>&rfID=1&specialPost=N&rtContructorYet=<?=$rs5['rt_contructor_yet']?>&rtContructorCate=<?=$rs5['rt_contructor_cate']?>"><?=$rs5['rt_name']?> </a></li>
					                			<?php
					                		}
					                		?>
					                </ul>
					              </li>
					              
					              <li class="dropdown-submenu">
					              	
					                <a tabindex="-1" href="#">เฟอร์นิเจอร์</a>
					                <ul class="dropdown-menu">
					                 		<?php 
					                 		$result6=realtyCateMenuFn(6);
					                		while($rs6=mysql_fetch_array($result6)){
					                			?>
					                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs6['rt_id']?>&rfID=1&specialPost=N&rtContructorYet=<?=$rs6['rt_contructor_yet']?>&rtContructorCate=<?=$rs6['rt_contructor_cate']?>"><?=$rs6['rt_name']?> </a></li>
					                			<?php
					                		}
					                		?>
					                      
				
					                </ul>
					              </li>
					              
					              
					              
					           
					               
					            </ul>
					        </div>
				</h1>
		</div>
		<div class="col-xs-6 postBtnTopArea">
				 <h1  style="margin-bottom: 2px;margin-top: 2px;">
					<!--ประกาศพิเศษ
						<button class="btn btn-block  btn-info rounded" style="font-size:19px;">
						  <i class="fa fa-unlink"></i> คลิ๊กลงประกาศโฆษณาพิเศษหน้าแรก
						</button>
						-->
						<div class="dropdown">
					            <a style="font-size:19px;" id="dLabel" role="button" data-toggle="dropdown" class="btn btn-block  btn-info postBtnTop" data-target="#" href="#">
					                <i class="fa fa-cloud"></i>คลิ๊กลงประกาศโฆษณาพิเศษหน้าแรก <span class="caret"></span>
					            </a>
					    		<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
					              <li class="dropdown-submenu">
					                <a tabindex="-1" href="#">ประกาศโฆษณาพิเศษเพื่อขาย</a>
					                <ul class="dropdown-menu">
					                		<!--  Realty other Start -->
					                			<li class="dropdown-submenu">
									                <a tabindex="-1" href="#">อสังหาริมทรัพย์</a>
									                <ul class="dropdown-menu">
									                		<?php 
									                		$result1=realtyCateMenuFn(1);
									                		while($rs1=mysql_fetch_array($result1)){
									                			?>
									                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs1['rt_id']?>&rfID=1&specialPost=Y&rtContructorYet=<?=$rs1['rt_contructor_yet']?>"><?=$rs1['rt_name']?>สำหรับขาย </a></li>
									                			<?php
									                		}
									                		?>
									                </ul>
									            </li>
					                       		<!--  Realty other End -->
					                       		 <!-- Start menu realty  -->
					                       		<li class="divider"></li>
								              <?php 
								              $result2=realtyCateMenuFn(2);
						                		while($rs2=mysql_fetch_array($result2)){
						                			?>
						                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs2['rt_id']?>&rfID=1&specialPost=Y&rtContructorYet=<?=$rs2['rt_contructor_yet']?>&rtContructorCate=<?=$rs2['rt_contructor_cate']?>"><?=$rs2['rt_name']?> </a></li>
						                			<?php
						                		}
						                		?>
						                		
						                		<?php 
						                		$result7=realtyCateMenuFn(7);
						                		while($rs7=mysql_fetch_array($result7)){
						                			?>
						                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs7['rt_id']?>&rfID=1&specialPost=Y&rtContructorYet=<?=$rs7['rt_contructor_yet']?>&rtContructorCate=<?=$rs7['rt_contructor_cate']?>"><?=$rs7['rt_name']?> </a></li>
						                			<?php
						                		}
						                		?>
						                		
						                		<?php 
						                		$result8=realtyCateMenuFn(8);
						                		while($rs8=mysql_fetch_array($result8)){
						                			?>
						                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs8['rt_id']?>&rfID=1&specialPost=Y&rtContructorYet=<?=$rs8['rt_contructor_yet']?>&rtContructorCate=<?=$rs8['rt_contructor_cate']?>"><?=$rs8['rt_name']?> </a></li>
						                			<?php
						                		}
						                		?>
						                		
						                		<?php 
						                		$result9=realtyCateMenuFn(9);
						                		while($rs9=mysql_fetch_array($result9)){
						                			?>
						                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs9['rt_id']?>&rfID=1&specialPost=Y&rtContructorYet=<?=$rs9['rt_contructor_yet']?>&rtContructorCate=<?=$rs9['rt_contructor_cate']?>"><?=$rs9['rt_name']?> </a></li>
						                			<?php
						                		}
						                		?>
								             
								              <li class="divider"></li>
								              <li class="dropdown-submenu">
								              	
								                <a tabindex="-1" href="#">สำหรับผู้รับเหมา</a>
								                <ul class="dropdown-menu">
								                	    <?php 
								                	    $result3=realtyCateMenuFn(3);
								                		while($rs3=mysql_fetch_array($result3)){
								                			?>
								                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs3['rt_id']?>&rfID=1&specialPost=Y&rtContructorYet=<?=$rs3['rt_contructor_yet']?>&rtContructorCate=<?=$rs3['rt_contructor_cate']?>"><?=$rs3['rt_name']?></a></li>
								                			<?php
								                		}
								                		?>
								                		<!-- 
								                        <li><a target='_blank' href="#">วัสดถก่อสร้าง
														<li><a target='_blank' href="#">เครื่องมือก่อสร้าง</a></li>
														<li><a target='_blank' href="#">เฟอร์นิเจอร์ </a></li>
														 -->
								                </ul>
								              </li>
								               <li class="dropdown-submenu">
								              	
								                <a tabindex="-1" href="#">วัสดถก่อสร้าง</a>
								                <ul class="dropdown-menu">
								                 		<?php 
								                 		$result4=realtyCateMenuFn(4);
								                		while($rs4=mysql_fetch_array($result4)){
								                			?>
								                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs4['rt_id']?>&rfID=1&specialPost=Y&rtContructorYet=<?=$rs4['rt_contructor_yet']?>&rtContructorCate=<?=$rs4['rt_contructor_cate']?>"><?=$rs4['rt_name']?> </a></li>
								                			<?php
								                		}
								                		?>
								                      
							
								                </ul>
								              </li>
								              
								              <li class="dropdown-submenu">
								                <a tabindex="-1" href="#">เครื่องมือเครื่องจักรก่อสร้าง</a>
								                <ul class="dropdown-menu">
								                 		<?php 
								                 		$result5=realtyCateMenuFn(5);
								                		while($rs5=mysql_fetch_array($result5)){
								                			?>
								                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs5['rt_id']?>&rfID=1&specialPost=Y&rtContructorYet=<?=$rs5['rt_contructor_yet']?>&rtContructorCate=<?=$rs5['rt_contructor_cate']?>"><?=$rs5['rt_name']?> </a></li>
								                			<?php
								                		}
								                		?>
								                </ul>
								              </li>
								              
								              <li class="dropdown-submenu">
								              	
								                <a tabindex="-1" href="#">เฟอร์นิเจอร์</a>
								                <ul class="dropdown-menu">
								                 		<?php 
								                 		$result6=realtyCateMenuFn(6);
								                		while($rs6=mysql_fetch_array($result6)){
								                			?>
								                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs6['rt_id']?>&rfID=1&specialPost=Y&rtContructorYet=<?=$rs6['rt_contructor_yet']?>&rtContructorCate=<?=$rs6['rt_contructor_cate']?>"><?=$rs6['rt_name']?> </a></li>
								                			<?php
								                		}
								                		?>
								                      
							
								                </ul>
								              </li>
								              <!-- end menu realty  -->
			                			
					                </ul>
					              </li>
					               <li class="dropdown-submenu">
					                <a tabindex="-1" href="#">ประกาศโฆษณาพิเศษเพื่อเช่า</a>
					                <ul class="dropdown-menu">
					                		
					                			
					                			<!--  Realty other Start -->
					                			<li class="dropdown-submenu">
									                <a tabindex="-1" href="#">อสังหาริมทรัพย์</a>
									                <ul class="dropdown-menu">
									                		<?php 
									                		$result1=realtyCateMenuFn(1);
									                		while($rs1=mysql_fetch_array($result1)){
									                			?>
									                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs1['rt_id']?>&rfID=2&specialPost=Y&rtContructorYet=<?=$rs1['rt_contructor_yet']?>"><?=$rs1['rt_name']?>สำหรับเช่า </a></li>
									                			<?php
									                		}
									                		?>
									                </ul>
									            </li>
					                       		<!--  Realty other End -->
					                       		 <!-- Start menu realty  -->
					                       		<li class="divider"></li>
								              <?php 
								              $result2=realtyCateMenuFn(2);
						                		while($rs2=mysql_fetch_array($result2)){
						                			?>
						                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs2['rt_id']?>&rfID=2&specialPost=Y&rtContructorYet=<?=$rs2['rt_contructor_yet']?>&rtContructorCate=<?=$rs2['rt_contructor_cate']?>"><?=$rs2['rt_name']?> </a></li>
						                			<?php
						                		}
						                		?>
						                		
						                		<?php 
						                		$result7=realtyCateMenuFn(7);
						                		while($rs7=mysql_fetch_array($result7)){
						                			?>
						                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs7['rt_id']?>&rfID=2&specialPost=Y&rtContructorYet=<?=$rs7['rt_contructor_yet']?>&rtContructorCate=<?=$rs7['rt_contructor_cate']?>"><?=$rs7['rt_name']?> </a></li>
						                			<?php
						                		}
						                		?>
						                		
						                		<?php 
						                		$result8=realtyCateMenuFn(8);
						                		while($rs8=mysql_fetch_array($result8)){
						                			?>
						                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs8['rt_id']?>&rfID=2&specialPost=Y&rtContructorYet=<?=$rs8['rt_contructor_yet']?>&rtContructorCate=<?=$rs8['rt_contructor_cate']?>"><?=$rs8['rt_name']?> </a></li>
						                			<?php
						                		}
						                		?>
						                		
						                		<?php 
						                		$result9=realtyCateMenuFn(9);
						                		while($rs9=mysql_fetch_array($result9)){
						                			?>
						                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs9['rt_id']?>&rfID=2&specialPost=Y&rtContructorYet=<?=$rs9['rt_contructor_yet']?>&rtContructorCate=<?=$rs9['rt_contructor_cate']?>"><?=$rs9['rt_name']?> </a></li>
						                			<?php
						                		}
						                		?>
								             
								              <li class="divider"></li>
								              <li class="dropdown-submenu">
								              	
								                <a tabindex="-1" href="#">สำหรับผู้รับเหมา</a>
								                <ul class="dropdown-menu">
								                	    <?php 
								                	    $result3=realtyCateMenuFn(3);
								                		while($rs3=mysql_fetch_array($result3)){
								                			?>
								                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs3['rt_id']?>&rfID=2&specialPost=Y&rtContructorYet=<?=$rs3['rt_contructor_yet']?>&rtContructorCate=<?=$rs3['rt_contructor_cate']?>"><?=$rs3['rt_name']?></a></li>
								                			<?php
								                		}
								                		?>
								                		<!-- 
								                        <li><a target='_blank' href="#">วัสดถก่อสร้าง
														<li><a target='_blank' href="#">เครื่องมือก่อสร้าง</a></li>
														<li><a target='_blank' href="#">เฟอร์นิเจอร์ </a></li>
														 -->
								                </ul>
								              </li>
								               <li class="dropdown-submenu">
								              	
								                <a tabindex="-1" href="#">วัสดถก่อสร้าง</a>
								                <ul class="dropdown-menu">
								                 		<?php 
								                 		$result4=realtyCateMenuFn(4);
								                		while($rs4=mysql_fetch_array($result4)){
								                			?>
								                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs4['rt_id']?>&rfID=2&specialPost=Y&rtContructorYet=<?=$rs4['rt_contructor_yet']?>&rtContructorCate=<?=$rs4['rt_contructor_cate']?>"><?=$rs4['rt_name']?> </a></li>
								                			<?php
								                		}
								                		?>
								                      
							
								                </ul>
								              </li>
								              
								              <li class="dropdown-submenu">
								                <a tabindex="-1" href="#">เครื่องมือเครื่องจักรก่อสร้าง</a>
								                <ul class="dropdown-menu">
								                 		<?php 
								                 		$result5=realtyCateMenuFn(5);
								                		while($rs5=mysql_fetch_array($result5)){
								                			?>
								                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs5['rt_id']?>&rfID=2&specialPost=Y&rtContructorYet=<?=$rs5['rt_contructor_yet']?>&rtContructorCate=<?=$rs5['rt_contructor_cate']?>"><?=$rs5['rt_name']?> </a></li>
								                			<?php
								                		}
								                		?>
								                </ul>
								              </li>
								              
								              <li class="dropdown-submenu">
								              	
								                <a tabindex="-1" href="#">เฟอร์นิเจอร์</a>
								                <ul class="dropdown-menu">
								                 		<?php 
								                 		$result6=realtyCateMenuFn(6);
								                		while($rs6=mysql_fetch_array($result6)){
								                			?>
								                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs6['rt_id']?>&rfID=2&specialPost=Y&rtContructorYet=<?=$rs6['rt_contructor_yet']?>&rtContructorCate=<?=$rs6['rt_contructor_cate']?>"><?=$rs6['rt_name']?> </a></li>
								                			<?php
								                		}
								                		?>
								                      
							
								                </ul>
								              </li>
								              <!-- end menu realty  -->
					                </ul>
					              </li>
					             </ul>
					  </div>
				</h1>
		</div>
		
		<div class="col-xs-3 postBtnTopArea">
			<!--class pull-right -->
			<h1 class="" style="margin-bottom: 2px; margin-top: 2px;">
           <!--     ประกาศเช่าฟรี-->
           		<!-- 
                    <button class="btn btn-block btn-stackoverflow-inversed rounded" style="font-size:19px;">
                      <i class="fa fa-stack-overflow"></i>คลิ๊กลงประกาศเช่าฟรี
                    </button>
                -->     
                    <div class="dropdown">
					            <a style="font-size:19px;" id="dLabel" role="button" data-toggle="dropdown" class="btn btn-stackoverflow-inversed postBtnTop" data-target="#" href="#">
					                <i class="fa fa-cloud"></i>คลิ๊กลงประกาศเช่าฟรี<span class="caret"></span>
					            </a>
					    		<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
					              <li class="dropdown-submenu">
					                <a tabindex="-1" href="#">อสังหาริมทรัพย์</a>
					                <ul class="dropdown-menu">
					                		<?php 
					                		$result1=realtyCateMenuFn(1);
					                		while($rs1=mysql_fetch_array($result1)){

												if($rs1['rt_id']=='26'){
													?>
						                				<li><a href="member/index.php?newPost=Y&rtID=<?=$rs1['rt_id']?>&rfID=2&specialPost=N&rtContructorYet=<?=$rs1['rt_contructor_yet']?>"><?=$rs1['rt_name']?> </a></li>
						                			<?php
					                			}else{
					                				?>
						                				<li><a href="member/index.php?newPost=Y&rtID=<?=$rs1['rt_id']?>&rfID=2&specialPost=N&rtContructorYet=<?=$rs1['rt_contructor_yet']?>"><?=$rs1['rt_name']?>สำหรับเช่า </a></li>
						                			<?php
					                			}
					                			
					                			
					                		}
					                		?>
					                       	
					                </ul>
					              </li>
					              <li class="divider"></li>
					              <?php 
					             	 $result2=realtyCateMenuFn(2);
			                		while($rs2=mysql_fetch_array($result2)){
			                			?>
			                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs2['rt_id']?>&rfID=2&specialPost=N&rtContructorYet=<?=$rs2['rt_contructor_yet']?>&rtContructorCate=<?=$rs2['rt_contructor_cate']?>"><?=$rs2['rt_name']?> </a></li>
			                			<?php
			                		}
			                		?>
			                		
			                		<?php 
			                		$result7=realtyCateMenuFn(7);
			                		while($rs7=mysql_fetch_array($result7)){
			                			?>
			                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs7['rt_id']?>&rfID=2&specialPost=N&rtContructorYet=<?=$rs7['rt_contructor_yet']?>&rtContructorCate=<?=$rs7['rt_contructor_cate']?>"><?=$rs7['rt_name']?> </a></li>
			                			<?php
			                		}
			                		?>
			                		
			                		<?php 
			                		$result8=realtyCateMenuFn(8);
			                		while($rs8=mysql_fetch_array($result8)){
			                			?>
			                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs8['rt_id']?>&rfID=2&specialPost=N&rtContructorYet=<?=$rs8['rt_contructor_yet']?>&rtContructorCate=<?=$rs8['rt_contructor_cate']?>"><?=$rs8['rt_name']?> </a></li>
			                			<?php
			                		}
			                		?>
			                		
			                		<?php 
			                		$result9=realtyCateMenuFn(9);
			                		while($rs9=mysql_fetch_array($result9)){
			                			?>
			                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs9['rt_id']?>&rfID=2&specialPost=N&rtContructorYet=<?=$rs9['rt_contructor_yet']?>&rtContructorCate=<?=$rs9['rt_contructor_cate']?>"><?=$rs9['rt_name']?> </a></li>
			                			<?php
			                		}
			                		?>
					             
					              <li class="divider"></li>
					              <li class="dropdown-submenu">
					              	
					                <a tabindex="-1" href="#">สำหรับผู้รับเหมา</a>
					                <ul class="dropdown-menu">
					                	    <?php 
					                	    $result3=realtyCateMenuFn(3);
					                		while($rs3=mysql_fetch_array($result3)){
					                			?>
					                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs3['rt_id']?>&rfID=2&specialPost=N&rtContructorYet=<?=$rs3['rt_contructor_yet']?>&rtContructorCate=<?=$rs3['rt_contructor_cate']?>"><?=$rs3['rt_name']?></a></li>
					                			<?php
					                		}
					                		?>
					                		<!-- 
					                        <li><a target='_blank' href="#">วัสดถก่อสร้าง
											<li><a target='_blank' href="#">เครื่องมือก่อสร้าง</a></li>
											<li><a target='_blank' href="#">เฟอร์นิเจอร์ </a></li>
											 -->
					                </ul>
					              </li>
					               <li class="dropdown-submenu">
					              	
					                <a tabindex="-1" href="#">วัสดถก่อสร้าง</a>
					                <ul class="dropdown-menu">
					                 		<?php 
					                 		$result4=realtyCateMenuFn(4);
					                		while($rs4=mysql_fetch_array($result4)){
					                			?>
					                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs4['rt_id']?>&rfID=2&specialPost=N&rtContructorYet=<?=$rs4['rt_contructor_yet']?>&rtContructorCate=<?=$rs4['rt_contructor_cate']?>"><?=$rs4['rt_name']?> </a></li>
					                			<?php
					                		}
					                		?>
					                   
					                </ul>
					              </li>
					              
					              <li class="dropdown-submenu">
					                <a tabindex="-1" href="#">เครื่องมือเครื่องจักรก่อสร้าง</a>
					                <ul class="dropdown-menu">
					                 		<?php 
					                 		$result5=realtyCateMenuFn(5);
					                		while($rs5=mysql_fetch_array($result5)){
					                			?>
					                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs5['rt_id']?>&rfID=2&specialPost=N&rtContructorYet=<?=$rs5['rt_contructor_yet']?>&rtContructorCate=<?=$rs5['rt_contructor_cate']?>"><?=$rs5['rt_name']?> </a></li>
					                			<?php
					                		}
					                		?>
					                </ul>
					              </li>
					              
					              <li class="dropdown-submenu">
					              	
					                <a tabindex="-1" href="#">เฟอร์นิเจอร์</a>
					                <ul class="dropdown-menu">
					                 		<?php 
					                 		$result6=realtyCateMenuFn(6);
					                		while($rs6=mysql_fetch_array($result6)){
					                			?>
					                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs6['rt_id']?>&rfID=2&specialPost=N&rtContructorYet=<?=$rs6['rt_contructor_yet']?>&rtContructorCate=<?=$rs6['rt_contructor_cate']?>"><?=$rs6['rt_name']?> </a></li>
					                			<?php
					                		}
					                		?>
					                      
				
					                </ul>
					              </li>
					            </ul>
					        </div>
					        
            </h1>
		</div>
		

		<!--  column 6 start -->
		
		<!--  column 6 start -->
		
		</div>
	</div>
	
	
	
	<div class="container">
		<div class='ads' id='ads3'>
			<?php 
	    	if($rsAds3['pic_name']!=""){
	    	?>
	    	 <img src="control-panel/mypicture/1/<?=$rsAds3['pic_name']?>" width="100%" height="100%" />
	    	
	    	<?php 
			}else{
	    	echo "ตำแหน่งที่ 3";
	    	}
	    	?>
			
		</div>
	</div>
</div>
	<!--===End Top Buttons ===-->
	<!--===Start Breadcrumbs ===-->
    <div class="breadcrumbs">
    	
    	 
        <div class="container bgMainMenu" >
           	  <div class="row">
           	  		<!-- button ads start -->
           	  		
           	  		<!-- button ads start -->
           	  </div>
			 <div class="pull-left" style="margin-bottom: 2px;margin-top: 0px;">
			 
			 
               <ul class="nav navbar-nav">
                  
                    <li >
                        <a class='linkMainMenu' href="index.php?page=home">
                            <i class="fa fa-home"></i> หน้าแรก
                        </a>
					</li>    
					 
					 <li>
                        <a class='linkMainMenu' href="index.php?page=sitemap">
                           <i class="fa fa-cogs"></i> แผนผังเว็บไซต์
                        </a>
					</li>
					<li>
                        <a class='linkMainMenu' href="index.php?page=postSaved">
                           <i class="fa fa-cogs"></i> ประกาศที่บันทึกไว้
                        </a>
					</li> 
					<!-- 
					<li>
                        <a href="index.php?page=showSearch">
                           <i class="fa fa-cogs"></i> การค้นหาที่บันทึกไว้
                        </a>
					</li>  
					 -->
					
					 <li >
                        <a class='linkMainMenu' href="index.php?page=#" onClick="window.open('https://www.facebook.com/sharer.php?u=www.realthairealty.com/')";>
                           <i class="fa fa-child"></i> แชร์ผ่านเฟสบุ๊ค
                        </a>
					</li> 
					 <li >
                        <a class='linkMainMenu' href="index.php?page=#" onClick="window.open('https://plus.google.com/share?url=www.realthairealty.com')";>
                         <i class="fa fa-cog"></i> แชร์ผ่านกูลเกิล
                        </a>
					</li> 
					<!-- 
					 <li >
                        <a href="index.php?page=about">
                          <i class="fa fa-user"></i>เกี่ยวกับเรา
                        </a>
					</li> 
					 -->
					 
					 <li >
                        <a class='linkMainMenu' href="index.php?page=advertise">
                          <i class="fa fa-rss"></i> ติดต่อโฆษณาหน้าแรก
                        </a>
					</li> 
					 <li >
                        <a class='linkMainMenu' href="index.php?page=contact">
                          <i class="fa fa-rss"></i> แจ้งปัญหา
                        </a>
					</li> 
					<?php 
					if($_SESSION['ses_cus_id']){
				
					?>
				
					<li >
                        <a id="logout" class='linkMainMenu' href="#">
                          <i class="fa fa-rss"></i> ออกจากระบบ
                        </a>
					</li> 
					 <?php 
					 }
					 ?>
                </ul>
            </div>

			
			
			
			<?php 
			if($_SESSION['ses_cus_email']){
			?>
			<!-- 
            <ul class="pull-right breadcrumb">
                <li class="active"><i class="fa fa fa-user"></i>คุณ <?=$_SESSION['ses_cus_first_name']?> กำลังอยู่ในระบบ(
                	<a target='_blank' href="#" id="logout">
                	ออกจากระบบ
                	</a>
                	)</li>
            </ul>
             -->
            <?php }?>
			
        </div>
        
    </div><!--/breadcrumbs-->
   
     <div class="container linkNav" > 
     	<span class='realty_path_home'></span> 
     	<span class='realty_path_type'></span> 
     	<a target='_blank' href="#"><span class='realty_path_name'></span></a> 
     	<?php 
     	switch($_GET['page']){
     		case"sitemap":echo("<a href='index.php?page=home'>หน้าแรก</a> <i class=\"fa fa-angle-double-right\"></i> <a href='#'>แผนผังเว็บไซต์ </a>"); break;
     		case"contact":echo("<a href='index.php?page=home'>หน้าแรก</a> <i class=\"fa fa-angle-double-right\"></i> <a href='#'>ติดต่อเรา</a>"); break;
     		case"advertise":echo("<a href='index.php?page=home'>หน้าแรก</a> <i class=\"fa fa-angle-double-right\"></i> <a href='#'>ติดต่อโฆษณาหน้าแรก</a>"); break;
     		case"about":echo("<a href='index.php?page=home'>หน้าแรก</a> <i class=\"fa fa-angle-double-right\"></i> <a href='#'>เกี่ยวกับเรา</a>"); break;
     		case"condition":echo("<a href='index.php?page=home'>หน้าแรก</a> <i class=\"fa fa-angle-double-right\"></i> <a href='#'>เงื่อนไข</a>"); break;
     		case"postSaved":echo("<a href='index.php?page=home'>หน้าแรก</a> <i class=\"fa fa-angle-double-right\"></i> <a href='#'>ประกาศที่บันทึกไว้</a>"); break;
     		case"manualPage":echo("<a href='index.php?page=home'>หน้าแรก</a> <i class=\"fa fa-angle-double-right\"></i> <a href='#'>คูมือการใช้งาน</a>"); break;
     		case"register_condition":echo("<a href='index.php?page=home'>หน้าแรก</a> <i class=\"fa fa-angle-double-right\"></i> <a href='#'>เงื่อนไขการสมัครสมาชิก</a>"); break;
     		 
     		
     		}
     	
     	?>
     </div>
  
    <!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->


                           <!-- start not show search if get value below.-->
							<?php
								if(($_GET['page']!="sitemap") 
								and ($_GET['page']!="contact")
								and ($_GET['page']!="advertise")
								and ($_GET['page']!="about")
								and ($_GET['page']!="condition")
								and ($_GET['page']!="article_detail")
								and ($_GET['page']!="register")
								and ($_GET['page']!="login")
								and ($_GET['page']!="forgot_pass")
								and ($_GET['page']!="manualPage")
								and ($_GET['page']!="register_condition")

								//and ($_GET['page']!="showSearch")
								){
								include("main_search.php");
								}
							?>
						   <!-- start not show search if get value below.-->

          
	
  
	 
	    
    <div class="container content">	
    <!--
	     <div class="row"> 
	    	<div class='col-xs-12'> 
	    	
	    		<div id='ads5' class='ads'>
	    		<?php 
		    	if($rsAds5['pic_name']!=""){
		    	?>
		    	 <img src="control-panel/mypicture/1/<?=$rsAds5['pic_name']?>" width="100%" height="100%" />
		    	
		    	<?php 
				}else{
		    	echo "ตำแหน่งที่ 5";
		    	}
		    	?>
	    		</div>
	    	</div>
	      </div>	
	    -->  
    	<div class="row blog-page"> 
    	<div class='col-xs-12'>   
    	<div class='row'>
    	<?php
			$page_include="";
					switch($_GET['page']){
					case"home":$page_include="home_content.php"; break;
					//case"post_detail":include("post_detail.php"); break;
					case"post_sub_detail":$page_include="post_sub_detail.php"; break;
					case"sitemap":$page_include="sitemap.php"; break;
					case"contact":$page_include="contact.php"; break;
					case"advertise":$page_include="advertise.php"; break;
					case"about":$page_include="about.php"; break;
					case"condition":$page_include="condition.php"; break;
					case"article_detail":$page_include="article_detail.php"; break;
					//case"register":$page_include="register.php"); break;
					//case"login":$page_include="login.php"); break;
					case"forgot_pass":$page_include="forgot_pass.php"; break;
					
					case"postSaved":$page_include="postSaved.php"; break;
					case"showSearch":$page_include="showSearch.php"; break;
					case"profile_post":$page_include="profile_post.php"; break;
					case"manualPage":$page_include="manualPage.php"; break;
					case"register_condition":$page_include="register_condition.php"; break;
					
					
					default:$page_include="home_content.php";
					
					}
			?>
			
            <!-- Left Content -->
            <?php
				if(($_GET['page']!="contact") and ($_GET['page']!="sitemap") and ($_GET['page']!="advertise") and ($_GET['page']!="manualPage") and ($_GET['page']!="about")){
				
					?>
						
						<div class="col-xs-8">
							<!-- ads11  -->
							<div class='ads'>
								<div id='ads6'>
								<?php 
						    	if($rsAds6['pic_name']!=""){
						    	?>
						    	 <img src="control-panel/mypicture/1/<?=$rsAds6['pic_name']?>" width="100%" height="100%" />
						    	
						    	<?php 
								}else{
						    	echo "ตำแหน่งที่ 6";
						    	}
						    	?>
								
								
								</div>
							</div>
							<!-- ads11  -->
			              	<div id="mainContrainArea">
								<?php include $page_include;?>	
							
							</div>
			            </div>			
					<?php
				}else{
					?>
					<div class="col-xs-12">
		              	<div id="mainContrainArea">
							<?php include $page_include;?>	
						</div>
		            </div>
					<?php
				}
			?>
			
        	
            <!-- End Left Content -->

            <!-- Start Right Content -->
			
			<?php
				if(($_GET['page']!="contact")  and ($_GET['page']!="sitemap") and ($_GET['page']!="advertise") and ($_GET['page']!="manualPage") and ($_GET['page']!="about") ){
				

				include("right_content.php");
				
				}
			?>

			<!-- End Right Content -->
			</div>
			</div>
        </div><!--/row-->   
        </div><!-- col-xs-12 -->     
    </div> 
    
    <!--=== End Content Part ===-->

     
</div><!--/End Wrapepr-->
 <!--=== Footer Version 1 ===-->
    <div class="footer-v1">
        <div class="footer">
            <div class="container">
                <div class="row paddingLR10">
                    <!-- About -->
					<!--
                    <div class="col-xs-3 md-margin-bottom-40">
                        <a href="index.html"><img id="logo-footer" class="footer-logo" src="assets/img/logo2-default.png" alt=""></a>
                        <p>About Unify dolor sit amet, consectetur adipiscing elit. Maecenas eget nisl id libero tincidunt sodales.</p>
                        <p>Duis eleifend fermentum ante ut aliquam. Cras mi risus, dignissim sed adipiscing ut, placerat non arcu.</p>    
                    </div>
					--><!--/col-xs-3-->
                    <!-- End About -->

                
                	<?php 
                	include 'link_site_map.php';
                	?>
                       


				

                    <!-- Address -->
                    <div class="col-xs-3 map-img md-margin-bottom-40">
                        <div class="headline"><h2>ติดต่อเรา</h2></div>                         
                        <address class="md-margin-bottom-40">
                            <b style='color:#72c02c '>ติดต่อเว็ปไซต์ </b><br> :  อีเมล์  :  info@realthairealty.com <br>
                            <b style='color:#72c02c '> เอาติดต่อโฆษณา</b><br> : อีเมล์ : sales@realthairealty.com   <br>                                                                       
                            ( ทุกวัน 10.00-18.00 น.) <br>โทรศัพท์  : +6692-796-6556 <br>
                             <b style='color:#72c02c '>ติดต่อทีมงาน</b><br>:  อีเมล์  :  webmaster@realthairealty.com<br> 
                             <b style='color:#72c02c '>ติดต่อฝากข่าวสาร</b><br>  :  support@realthairealty.com <br>
                        </address>
                    </div><!--/col-xs-3-->
                    <!-- End Address -->
                </div>
            </div> 
        </div><!--/footer-->

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">                     
                        <p>
                            2015 &copy; All Rights Reserved.
                           <a target='_blank' href="#">www.realthairealty.com</a> 
                        </p>
                    </div>

                    <!-- Social Links -->
                    <div class="col-xs-6">
                    <!-- 
                        <ul class="footer-socials list-inline">
                            <li>
                                <a target='_blank' href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a target='_blank' href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype">
                                    <i class="fa fa-skype"></i>
                                </a>
                            </li>
                            <li>
                                <a target='_blank' href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google Plus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li>
                                <a target='_blank' href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a target='_blank' href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest">
                                    <i class="fa fa-pinterest"></i>
                                </a>
                            </li>
                            <li>
                                <a target='_blank' href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a target='_blank' href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dribbble">
                                    <i class="fa fa-dribbble"></i>
                                </a>
                            </li>
                        </ul>
                         -->
                    </div>
                    <!-- End Social Links -->
                </div>
            </div> 
        </div><!--/copyright-->
    </div>     
    <!--=== End Footer Version 1 ===-->

<!--[if lt IE 9]>
    <script src="assets/plugins/respond.js"></script>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/plugins/placeholder-IE-fixes.js"></script>
    <script src="assets/plugins/sky-forms-pro/skyforms/js/sky-forms-ie8.js"></script>
<![endif]-->
<!--[if lt IE 10]>
    <script src="assets/plugins/sky-forms-pro/skyforms/js/jquery.placeholder.min.js"></script>
<![endif]-->     



<!--  Start Module Login -->
<div aria-labelledby="loginFormModal" role="dialog" tabindex="-1" class="modal fade" id="loginFormModal" style="display: none;">
    <div role="document" class="modal-dialog-login">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          <h4 id="gridModalLabel" class="modal-title">เข้าสู่ระบบ</h4>
        </div>
        <div class="modal-body">
        
          	 <!-- from login area start -->
	        <?php  include("login.php");?>
	      	 <!-- from login area end --> 
	        
        </div>
        <!-- 
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
          <button class="btn btn-primary" type="button">Save changes</button>
        </div>
         -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!--  End Module Login -->
  
  <!--  Start Module Register -->
<div aria-labelledby="registerFormModal" role="dialog" tabindex="-1" class="modal fade" id="registerFormModal" style="display: none;">
    <div role="document" class="modal-dialog-register">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          <h4 id="gridModalLabel" class="modal-title">สมัครสมาชิก</h4>
        </div>
        <div class="modal-body">
        
          	 <!-- from login area start -->
	        <?php  include("register.php");?>
	      	 <!-- from login area end --> 
	        
        </div>
        <!-- 
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
          <button class="btn btn-primary" type="button">Save changes</button>
        </div>
         -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!--  End Module Register -->
  
  
  <!--  Start Module Register -->
<div aria-labelledby="sendToMyFriendsFormModal" role="dialog" tabindex="-1" class="modal fade" id="sendToMyFriendsFormModal" style="display: none;">
    <div role="document" class="modal-dialog-register">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          <h4 id="gridModalLabel" class="modal-title">ส่งประกาศนี้ให้เพื่อน</h4>
        </div>
        <div class="modal-body">
        
          	 <!-- from send mail to my friends area start -->
	       			<?php  include("form_send_friend.php");?>
	      	 <!-- from send mail to my friends area end --> 
	        
        </div>
        <!-- 
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
          <button class="btn btn-primary" type="button">Save changes</button>
        </div>
         -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!--  End Module Register -->
  
  <div aria-labelledby="mapContactModal" role="dialog" tabindex="-1" class="modal fade" id="mapContactModal" style="display: none;">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          <h4 id="gridModalLabel" class="modal-title">แผนที่</h4>
        </div>
        <div class="modal-body" >
          	 <!-- from contract area start -->
	         <div id="mapArea" style="width:570px; height:400px;"></div>
	      	 <!-- from contract area end --> 
        </div>
        <!-- 
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
          <button class="btn btn-primary" type="button">Save changes</button>
        </div>
         -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <div aria-labelledby="imageSlideModal" role="dialog" tabindex="-1" class="modal fade" id="imageSlideModal" style="display: none;">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          <h4 id="gridModalLabel" class="modal-title">รูปภาพ</h4>
        </div>
        <div class="modal-body">
        
          <div id="galleryRealtyArea"></div>
          <!-- 
         <img alt="" src="assets/img/main/img9.jpg" width="550">
         <ul style="margin-top:2px;" class="list-unstyled">
			<button style="height:80px; width:100px;" class="btn-u btn-u-default" type="button">img1</button>
			<button style="height:80px;width:100px;" class="btn-u btn-u-default" type="button">img2</button>
			<button style="height:80px; width:100px;" class="btn-u btn-u-default" type="button">img3</button>
			<button style="height:80px; width:100px;" class="btn-u btn-u-default" type="button">img4</button>
			<button style="height:80px;width:100px;" class="btn-u btn-u-default" type="button">img5</button>
		</ul>
           -->
        </div>
        <!-- 
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
          <button class="btn btn-primary" type="button">Save changes</button>
        </div>
         -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  
  
  <!--  Start Module forgot_pass -->
<div aria-labelledby="forgotPassFormModal" role="dialog" tabindex="-1" class="modal fade" id="forgotPassFormModal" style="display: none;">
    <div role="document" class="modal-dialog-register">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          <h4 id="gridModalLabel" class="modal-title">ลืมรหัสผ่าน</h4>
        </div>
        <div class="modal-body">
        
          	 <!-- from forgot_pass start -->
	       			<?php  include("forgot_pass.php");?>
	      	 <!-- from forgot_pass end --> 
	       
        </div>
        <!-- 
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
          <button class="btn btn-primary" type="button">Save changes</button>
        </div>
         -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!--  End Module forgot_pass -->
  
   <div aria-labelledby="contactFormModal" role="dialog" tabindex="-1" class="modal fade" id="contactFormModal" style="display: none;">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          <h4 id="gridModalLabel" class="modal-title">ติดต่อเจ้าของไปทางประกาศ</h4>
        </div>
        <div class="modal-body">
        
          	 <!-- from contract area start -->
	         <div id="contracFormtArea"></div>
	      	 <!-- from contract area end --> 
	        
        </div>
        <!-- 
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
          <button class="btn btn-primary" type="button">Save changes</button>
        </div>
         -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  
  

</body>
</html>	






