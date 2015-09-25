<?php session_start();
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
  width: 1170px;
}
	</style>
</head>

<body>    
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
            
			<div class="row">
					<div class="col-md-2">
						<!-- Logo -->
						<a class="logo" href="index.html">
							<img src="assets/img/logo1-default.png" alt="Logo">
							
						</a>
						 <!-- End Logo -->
					</div>
					<div id="adHeader" style=" background:#dddddd; margin-top:2px; height:75px" class="col-md-6 ">
					<?php 
					$strSLQBanner7="select * from banner_sum where pic_position='7'";
					$resultBanner7=mysql_query($strSLQBanner7);
					$rsBanner7=mysql_fetch_array($resultBanner7);
					?>
					 <img src="control-panel/mypicture/1/<?=$rsBanner7['pic_name']?>" width="100%" height="100%" />
					</div>
					<div class="col-md-4">
					 <!-- Topbar -->
						<div class="topbar" style="padding: 2px 0;">

                            <div class="row">
                                <div class="col-md-6" style=" padding-left:2px;padding-right:1px;">
                                   
                                    <button class="btn btn-social btn-block btn-facebook-inversed " style="height:38px;">
                                      <i class="fa fa-facebook"></i> สมัครสมาชิกผ่านเฟสบุ๊ค
                                    </button>
                                   
                                </div>
                                
                                

                                 <div class="col-md-6" style="padding-left:0px;padding-right:0px;" > 
                                    <button class="btn btn-social  btn-block btn-android-inversed " style="height:38px;">
                                      <i class="fa fa-globe"></i> เลือกภาษา
                                    </button>
                                </div>
                                
                                <div class="col-md-6" style="padding-left:2px;padding-right:1px;">
                                    <button data-target="#registerFormModal" data-toggle="modal"   class="btn btn-social  btn-block  btn-windows-inversed" style="height:38px;">
                                      
                                      <i class="fa fa-rss"></i> สมัครสมาชิกใหม่ฟรี
                                    </button>
                                </div>

                                 <div class="col-md-6"style="padding-left:0px;padding-right:0px;" >
                                     	
                                     	<?php 
                                     
                                     	if($_SESSION['ses_cus_email']!=""){
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
			</div>
			
           

            <!-- Toggle get grouped for better mobile display -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="fa fa-bars"></span>
            </button>
            <!-- End Toggle -->
        </div><!--/end container-->


    </div>
    <!--=== End Header ===-->
	<div class="breadcrumbs1">
    <!--===Start Top Buttons ===-->
	<div class="container">
		<div class="col-md-3">
				<!--class pull-left -->
				 <h1 class="pull-right" style="margin-bottom: 5px;margin-top: 5px;">
			
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
					            <a style="font-size:19px;" id="dLabel" role="button" data-toggle="dropdown" class="btn btn-primary rounded" data-target="#" href="/page.html">
					                <i class="fa fa-cloud"></i> คลิ๊กลงประกาศขายฟรี <span class="caret"></span>
					            </a>
					    		<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
					              <li class="dropdown-submenu">
					                <a tabindex="-1" href="#">อสังหาริมทรัพย์</a>
					                <ul class="dropdown-menu">
					                		<?php 
					                		$result1=realtyCateMenuFn(1);
					                		while($rs1=mysql_fetch_array($result1)){
					                			?>
					                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs1['rt_id']?>&rfID=1&specialPost=N&rtContructorYet=<?=$rs1['rt_contructor_yet']?>">ขาย<?=$rs1['rt_name']?> </a></li>
					                			<?php
					                		}
					                		?>
					                       	 <!-- 
											 <li><a href="#">บ้านเดี่ยว </a></li>
											 <li><a href="#">บ้านสองชั้น </a></li>
											 <li><a href="#">บ้านสามชั้น </a></li>
											 <li><a href="#">บ้านชั้นเดียว </a></li>
											 <li><a href="#">บ้านแฝด </a></li>
											 <li><a href="#">คอนโดมิเนียม </a></li>
											 <li><a href="#">ทาว์นเฮ้าส์/ทาว์นโฮม </a></li>
											 <li><a href="#"> ที่ดินพร้อมสิ่งปลูกสร้าง </a></li>
											 <li><a href="#">ที่ดินเปล่า </a></li>
											 <li><a href="#">อพาร์ตเมนท์ </a></li>
											 <li><a href="#">อาคารพาณิชย์ </a></li>
											 <li><a href="#">โฮมออฟฟิศ </a></li>
											 <li><a href="#">โรงงาน/โกดัง</a></li>
											 <li><a href="#">หอพักรวม </a></li>
											 <li><a href="#">หอพักชาย </a></li>
											 <li><a href="#">หอพักหญิง </a></li>
											 <li><a href="#">โรงแรม </a></li>
											 <li><a href="#">รีสอร์ท </a></li>
											 <li><a href="#">เกส์ตเฮ้าส์ </a></li>
											 <li><a href="#">อสังหาริมทรัพย์ อื่นๆ</a></li>
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
					                        <li><a href="#">วัสดถก่อสร้าง
											<li><a href="#">เครื่องมือก่อสร้าง</a></li>
											<li><a href="#">เฟอร์นิเจอร์ </a></li>
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
		<div class="col-md-6 ">
				 <h1  style="margin-bottom: 5px;margin-top: 5px;">
					<!--ประกาศพิเศษ
						<button class="btn btn-block  btn-info rounded" style="font-size:19px;">
						  <i class="fa fa-unlink"></i> คลิ๊กลงประกาศโฆษณาพิเศษหน้าแรก
						</button>
						-->
						<div class="dropdown">
					            <a style="font-size:19px;" id="dLabel" role="button" data-toggle="dropdown" class="btn btn-block  btn-info rounded" data-target="#" href="#">
					                <i class="fa fa-cloud"></i>คลิ๊กลงประกาศโฆษณาพิเศษหน้าแรก<span class="caret"></span>
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
									                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs1['rt_id']?>&rfID=1&specialPost=Y&rtContructorYet=<?=$rs1['rt_contructor_yet']?>">ขาย<?=$rs1['rt_name']?> </a></li>
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
								                        <li><a href="#">วัสดถก่อสร้าง
														<li><a href="#">เครื่องมือก่อสร้าง</a></li>
														<li><a href="#">เฟอร์นิเจอร์ </a></li>
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
									                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs1['rt_id']?>&rfID=2&specialPost=Y&rtContructorYet=<?=$rs1['rt_contructor_yet']?>">เช่า<?=$rs1['rt_name']?> </a></li>
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
								                        <li><a href="#">วัสดถก่อสร้าง
														<li><a href="#">เครื่องมือก่อสร้าง</a></li>
														<li><a href="#">เฟอร์นิเจอร์ </a></li>
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
		
		<div class="col-md-3">
			<!--class pull-right -->
			<h1 class="" style="margin-bottom: 5px; margin-top: 5px;">
           <!--     ประกาศเช่าฟรี-->
           		<!-- 
                    <button class="btn btn-block btn-stackoverflow-inversed rounded" style="font-size:19px;">
                      <i class="fa fa-stack-overflow"></i>คลิ๊กลงประกาศเช่าฟรี
                    </button>
                -->     
                    <div class="dropdown">
					            <a style="font-size:19px;" id="dLabel" role="button" data-toggle="dropdown" class="btn btn-stackoverflow-inversed rounded" data-target="#" href="/page.html">
					                <i class="fa fa-cloud"></i>คลิ๊กลงประกาศเช่าฟรี<span class="caret"></span>
					            </a>
					    		<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
					              <li class="dropdown-submenu">
					                <a tabindex="-1" href="#">อสังหาริมทรัพย์</a>
					                <ul class="dropdown-menu">
					                		<?php 
					                		$result1=realtyCateMenuFn(1);
					                		while($rs1=mysql_fetch_array($result1)){
					                			?>
					                			<li><a href="member/index.php?newPost=Y&rtID=<?=$rs1['rt_id']?>&rfID=2&specialPost=N&rtContructorYet=<?=$rs1['rt_contructor_yet']?>">เช่า<?=$rs1['rt_name']?> </a></li>
					                			<?php
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
					                			<li><a href="member/index.php?rtID=<?=$rs3['rt_id']?>&rfID=2&specialPost=N&rtContructorYet=<?=$rs3['rt_contructor_yet']?>&rtContructorCate=<?=$rs3['rt_contructor_cate']?>"><?=$rs3['rt_name']?></a></li>
					                			<?php
					                		}
					                		?>
					                		<!-- 
					                        <li><a href="#">วัสดถก่อสร้าง
											<li><a href="#">เครื่องมือก่อสร้าง</a></li>
											<li><a href="#">เฟอร์นิเจอร์ </a></li>
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
					                			<li><a href="member/index.php?rtID=<?=$rs4['rt_id']?>&rfID=2&specialPost=N&rtContructorYet=<?=$rs4['rt_contructor_yet']?>&rtContructorCate=<?=$rs4['rt_contructor_cate']?>"><?=$rs4['rt_name']?> </a></li>
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
					                		while($rs5=mysql_fetch_array($result25)){
					                			?>
					                			<li><a href="member/index.php?rtID=<?=$rs5['rt_id']?>&rfID=2&specialPost=N&rtContructorYet=<?=$rs5['rt_contructor_yet']?>&rtContructorCate=<?=$rs5['rt_contructor_cate']?>"><?=$rs5['rt_name']?> </a></li>
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
					                			<li><a href="member/index.php?rtID=<?=$rs6['rt_id']?>&rfID=2&specialPost=N&rtContructorYet=<?=$rs6['rt_contructor_yet']?>&rtContructorCate=<?=$rs6['rt_contructor_cate']?>"><?=$rs6['rt_name']?> </a></li>
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
	
	
	
</div>
	<!--===End Top Buttons ===-->
	<!--===Start Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container" >
           	  <div class="row">
           	  		<!-- button ads start -->
           	  		
           	  		<!-- button ads start -->
           	  </div>
			 <div class="pull-left" style="margin-bottom: 2px;margin-top: 0px;">
			 
			 
               <ul class="nav navbar-nav">
                  
                    <li >
                        <a href="index.php?page=home">
                            <i class="fa fa-home"></i> หน้าแรก
                        </a>
					</li>    
					 
					 <li>
                        <a href="index.php?page=sitemap">
                           <i class="fa fa-cogs"></i> แผนผังเว็บไซต์
                        </a>
					</li>
					<li>
                        <a href="index.php?page=postSaved">
                           <i class="fa fa-cogs"></i> ประกาศที่บันทึกไว้
                        </a>
					</li> 
					<li>
                        <a href="index.php?page=showSearch">
                           <i class="fa fa-cogs"></i> การค้นหาที่บันทึกไว้
                        </a>
					</li>  
					
					
					 <li >
                        <a href="index.php?page=#">
                           <i class="fa fa-child"></i> แชร์ผ่านเฟสบุ๊ค
                        </a>
					</li> 
					 <li >
                        <a href="index.php?page=#">
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
                        <a href="index.php?page=advertise">
                          <i class="fa fa-rss"></i> ติดต่อโฆษณาหน้าแรก
                        </a>
					</li> 
					 
                </ul>
            </div>

			
			
			
			<?php 
			if($_SESSION['ses_cus_email']){
			?>
            <ul class="pull-right breadcrumb">
                <li class="active"><i class="fa fa fa-user"></i>คุณ <?=$_SESSION['ses_cus_email']?> กำลังอยู่ในระบบ(
                	<a href="#" id="logout">
                	ออกจากระบบ
                	</a>
                	)</li>
            </ul>
            <?php }?>
			
        </div>
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->


                           <!-- start not show search if get value below.-->
							<?php
								if(($_GET['page']!="sitemap") 
								and ($_GET['page']!="contact")
								and ($_GET['page']!="advertise")
								and ($_GET['page']!="about")
								and ($_GET['page']!="condition")
								and ($_GET['page']!="register")
								and ($_GET['page']!="login")
								//and ($_GET['page']!="showSearch")
								){
								include("main_search.php");
								}
							?>
						   <!-- start not show search if get value below.-->

          

    <div class="container content">		
    	<div class="row blog-page">    
            <!-- Left Content -->
        	<div class="col-md-8">
              <div id="mainContrainArea">

			<?php
					switch($_GET['page']){
					case"home":include("home_content.php"); break;
					//case"post_detail":include("post_detail.php"); break;
					case"post_sub_detail":include("post_sub_detail.php"); break;
					case"sitemap":include("sitemap.php"); break;
					case"contact":include("contact.php"); break;
					case"advertise":include("advertise.php"); break;
					case"about":include("about.php"); break;
					case"condition":include("condition.php"); break;
					//case"register":include("register.php"); break;
					//case"login":include("login.php"); break;
					case"postSaved":include("postSaved.php"); break;
					case"showSearch":include("showSearch.php"); break;
					
					
					
					default:include("home_content.php");
					}
			?>
			</div>


            </div>
            <!-- End Left Content -->

            <!-- Start Right Content -->
			
			<?php
				if($_GET['page']!="contact"){
				include("right_content.php");
				}
			?>

			<!-- End Right Content -->
        </div><!--/row-->        
    </div> 
    <!--=== End Content Part ===-->

      <!--=== Footer Version 1 ===-->
    <div class="footer-v1">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <!-- About -->
					<!--
                    <div class="col-md-3 md-margin-bottom-40">
                        <a href="index.html"><img id="logo-footer" class="footer-logo" src="assets/img/logo2-default.png" alt=""></a>
                        <p>About Unify dolor sit amet, consectetur adipiscing elit. Maecenas eget nisl id libero tincidunt sodales.</p>
                        <p>Duis eleifend fermentum ante ut aliquam. Cras mi risus, dignissim sed adipiscing ut, placerat non arcu.</p>    
                    </div>
					--><!--/col-md-3-->
                    <!-- End About -->

                    <!-- Latest -->
                    <div class="col-md-3 md-margin-bottom-40">
                        <div class="posts">
                            <div class="headline"><h2>เมนูหน้าหลักเว็ปไซด์</h2></div>
							 

                            <ul class="list-unstyled link-list">
                                <li> <a href="#">ฝากประกาศโครงการใหม่ </a>
								
                                <li>
                                    <a href="#">ฝากประกาศอสังหาริมทรพัย์ใกล้แหล่งท่องเที่ยว</a>
                                
                                </li>
                                <li>
                                    <a href="#">ฝากประกาศอสังหาริมทรัพย์เพื่อเช่า </a>
                                    
                                </li>
								<li>
                                    <a href="#">ฝากประกาศอสังหาริมทรัพย์เพื่อขาย</a>
                                </li>

								<li>
                                    <a href="#">ฝากประกาศอสังหาริมทรัพย์ใกล้ รถไฟฟ้าบีทีเอส</a>
                                </li>
									<li>
                                    <a href="#">ฝากประกาศอสังหาริมทรัพย์ใกล้ รถไฟฟ้าใต้ดินเอ็ม อาร์ ท</a>
                                </li>

								<li>
                                    <a href="#">ฝากประกาศอสังหาริมทรัพย์ใกล้ ท่าเรือ แม่น้ำเจ้าพระยา</a>
                                </li>

								<li>
                                    <a href="#">ฝากประกาศอสังหาริมทรัพย์ใกล้ รถไฟฟ้าแอร์พอร์ตลิงค</a>
                                </li>

								<li>
                                    <a href="#">ค้นหาอสังหาริมทรัพย์กับรถประจำทาง ขสมก กรุงเทพฯ</a>
                                </li>

								<li>
                                    <a href="#">ฝากประกาศตัวแทนขายวัสดุก่อสร้าง</a>
                                </li>

								<li>
                                    <a href="#">ฝากประกาศผู้รับเหมาทั่วไป</a>
                                </li>

								<li>
                                    <a href="#">ฝากประกาศโรงแรมและรีสอร์ท</a></i>
                                </li>

                            </ul>
                        </div>
                    </div><!--/col-md-3-->  
                    <!-- End Latest --> 
                    
                    <!-- Link List -->
                    <div class="col-md-3 md-margin-bottom-40">
                        <div class="headline"><h2>การบริการเว็ปไซต์</h2></div>
                        <ul class="list-unstyled link-list">
                            <li><a href="#">เกี่ยวกับเรา</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">ติดต่อเรา</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">ฝากลงประกาศฟรี</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">สมัครสมาชิกใหม่</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">สมัตรสมาชิกผ่านFacebook</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">ลืมรหัส</a><i class="fa fa-angle-right"></i></li>

							<li><a href="#">แผนผังเวปไซต์</a><i class="fa fa-angle-right"></i></li>
							<li><a href="#">แชร์เฟสบุค</a><i class="fa fa-angle-right"></i></li>
							<li><a href="#">แปลภาษา</a><i class="fa fa-angle-right"></i></li>
							<li><a href="#">นโยบายและเงื่อนไข</a><i class="fa fa-angle-right"></i></li>
							<li><a href="#">ข้อตกลงการบริการ</a><i class="fa fa-angle-right"></i></li>
							<li><a href="#">วิธีการใช้</a><i class="fa fa-angle-right"></i></li>

                        </ul>
                    </div><!--/col-md-3-->
					
					<!-- End Link List -->    
					  <!-- Link List -->
                    <div class="col-md-3 md-margin-bottom-40">
                        <div class="headline"><h2>โครงการจากผู้ก่อสร้าง</h2></div>
                        <ul class="list-unstyled link-list">
                            <li><a href="#">ศุภาลัย</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">แสนสิริ</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">เสนาดีเวลลอปเม้นท์</a><i class="fa fa-angle-right"></i></li>
							 <li><a href="#">เอสซี แอสเสท</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">ไรมอน แลนด์</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">พฤกษา</a><i class="fa fa-angle-right"></i></li>
							 <li><a href="#">ปริญสิริ</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">ควอลิตี้ เฮ้าส</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">อนันดา</a><i class="fa fa-angle-right"></i></li>
							 <li><a href="#">ออริจิ้น พร็อพเพอร์ตี้</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">เอพี</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">โนเบิล</a><i class="fa fa-angle-right"></i></li>
							 <li><a href="#">นารายณ์พร็อพเพอร์ตี้</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">เจ้าพระยามหานคร</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">แสนด์ แอนด์ เฮ้าส</a><i class="fa fa-angle-right"></i></li>
							 <li><a href="#">ลลิล</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">เมเจอร์ ดีเวลลอปเม้นท์</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">อารียา</a><i class="fa fa-angle-right"></i></li>
							 <li><a href="#">พร็อพเพอร์ตี้เพอร์เฟค</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">แอล.พี.เอ็น.</a><i class="fa fa-angle-right"></i></li>
							
                        </ul>
                    </div><!--/col-md-3-->
                    <!-- End Link List -->    
                    <!-- End Link List -->    
					  <!-- Link List -->
                    <div class="col-md-3 md-margin-bottom-40">
                        <div class="headline"><h2>ติดต่อโฆษณา</h2></div>
                        <ul class="list-unstyled link-list">
                            <li><a href="#">ฝากลงประกาศโครงการใหม่</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">ฝากลงประกาศอสังหาริมทรัพย์เพื่อเช่าและขาย</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">ฝากลงประกาศตัวแทนขายวัสดุก่อสร้าง</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">ฝากลงประกาศผู้รับเหมา</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">ฝากลงประกาศโรงแรมและ รีสอร์ท</a><i class="fa fa-angle-right"></i></li>


                        </ul>
                    </div><!--/col-md-3-->
                    <!-- End Link List -->    

					<!-- End Link List -->    
					  <!-- Link List -->
                    <div class="col-md-3 md-margin-bottom-40">
                        <div class="headline"><h2>ข้อมูลและข่าวสาร</h2></div>
                        <ul class="list-unstyled link-list">
                            <li><a href="#">สินเชื่อเพื่ออยู่อาศัย และบ้าน</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">การคำนวณดอกเบี้ยแต่ละธนาคาร</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="#">อัตราการแลกเปลี่ยนเงินตรา</a><i class="fa fa-angle-right"></i></li>
                        </ul>
                    </div><!--/col-md-3-->
                    <!-- End Link List -->    


				

                    <!-- Address -->
                    <div class="col-md-3 map-img md-margin-bottom-40">
                        <div class="headline"><h2>ติดต่อโฆษณา</h2></div>                         
                        <address class="md-margin-bottom-40">
                            25, Lorem Lis Street, Orange <br />
                            California, US <br />
                            Phone: 800 123 3456 <br />
                            Fax: 800 123 3456 <br />
                            Email: <a href="mailto:info@anybiz.com" class="">info@anybiz.com</a>
                        </address>
                    </div><!--/col-md-3-->
                    <!-- End Address -->
                </div>
            </div> 
        </div><!--/footer-->

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">                     
                        <p>
                            2015 &copy; All Rights Reserved.
                           <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
                        </p>
                    </div>

                    <!-- Social Links -->
                    <div class="col-md-6">
                        <ul class="footer-socials list-inline">
                            <li>
                                <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype">
                                    <i class="fa fa-skype"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google Plus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest">
                                    <i class="fa fa-pinterest"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dribbble">
                                    <i class="fa fa-dribbble"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Social Links -->
                </div>
            </div> 
        </div><!--/copyright-->
    </div>     
    <!--=== End Footer Version 1 ===-->
</div><!--/End Wrapepr-->


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
  
  
</body>
</html>	






