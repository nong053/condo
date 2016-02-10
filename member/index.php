<?php session_start();


if(($_GET['cus_id']) and ($_SESSION['member_user_id']!="")){
	$_SESSION['ses_cus_id']=$_GET['cus_id'];
}


/*#### Define  Session Start here. ####*/
	if($_SESSION['sesRtID']=="" or $_SESSION['sesRfID']==""){
		
		$_SESSION['sesRtID']=$_GET['rtID'];
		$_SESSION['sesRfID']=$_GET['rfID'];
		$_SESSION['sesSpecialPost']=$_GET['specialPost'];
		$_SESSION['sesRtContructorYet']=$_GET['rtContructorYet'];
		$_SESSION['sesRtContructorCate']=$_GET['rtContructorCate'];
	
	
	}else if($_GET['newPost']=="Y"){
		
		$_SESSION['sesRtID']=$_GET['rtID'];
		$_SESSION['sesRfID']=$_GET['rfID'];
		$_SESSION['sesSpecialPost']=$_GET['specialPost'];
		$_SESSION['sesRtContructorYet']=$_GET['rtContructorYet'];
		$_SESSION['sesRtContructorCate']=$_GET['rtContructorCate'];
		
		
	}
	//echo $_SESSION['cus_id'];
	if($_SESSION['ses_cus_id']==""){
		
		echo"<script>window.location='../index.php?modal=login'</script>";
		
	}
	if($_GET['loginType']=="loginForManage"){
		$_SESSION['sesLoginType']="loginForManage";
	}else{
		$_SESSION['sesLoginType']="loginForNewPost";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Web Fonts -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- CSS Header and Footer -->
    <link rel="stylesheet" href="../assets/css/headers/header-default.css">
    <link rel="stylesheet" href="../assets/css/footers/footer-v1.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="../assets/plugins/animate.css">
    <link rel="stylesheet" href="../assets/plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="../assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
    <link rel="stylesheet" href="../assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
    <!--[if lt IE 9]><link rel="stylesheet" href="../assets/plugins/sky-forms-pro/skyforms/css/sky-forms-ie8.css"><![endif]-->

    <!-- CSS Customization -->
    <link rel="stylesheet" href="../assets/css/custom.css">
	<link rel="stylesheet" href="../assets/css/custom_member.css">


	<!-- JS Global Compulsory -->           
	<script type="text/javascript" src="../assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/plugins/jquery/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- JS Implementing Plugins -->
	<script type="text/javascript" src="../assets/plugins/back-to-top.js"></script>
	<script type="text/javascript" src="../assets/plugins/smoothScroll.js"></script>
	<script src="../assets/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js"></script>
	<script src="../assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
	<script src="../assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
	<!-- JS Customization -->
	<script type="text/javascript" src="../assets/js/custom.js"></script>
	<!-- JS Javascript Customization -->
	<script src="../Controller/cMember.js"></script>
	
	<!-- JS Page Level -->           
	<script type="text/javascript" src="../assets/js/app.js"></script>
	<script type="text/javascript" src="../assets/js/plugins/masking.js"></script>
	<script type="text/javascript" src="../assets/js/plugins/datepicker.js"></script>
	<script type="text/javascript" src="../assets/js/plugins/validation.js"></script>
	<script type="text/javascript">
	    jQuery(document).ready(function() {
	        App.init();
	        Masking.initMasking();
	        Datepicker.initDatepicker();
	        Validation.initValidation();
	        });
	</script>
	<!--[if lt IE 9]>
	    <script src="../assets/plugins/respond.js"></script>
	    <script src="../assets/plugins/html5shiv.js"></script>
	    <script src="../assets/plugins/placeholder-IE-fixes.js"></script>
	    <script src="../assets/plugins/sky-forms-pro/skyforms/js/sky-forms-ie8.js"></script>
	<![endif]-->
	<!--[if lt IE 10]>
	    <script src="../assets/plugins/sky-forms-pro/skyforms/js/jquery.placeholder.min.js"></script>
	<![endif]-->     

	<link rel="stylesheet" href="../kendoCommercial/styles/kendo.common.min.css" />
	<link rel="stylesheet" href="../kendoCommercial/styles/kendo.default.min.css" />
	<script src="../kendoCommercial/js/kendo.all.min.js"></script>
	
	
	<!-- loading -->
    <link rel="stylesheet" href="../css/HoldOn.min.css">

	<!-- java script loading -->
	<script src="../Controller/HoldOn.min.js"></script>
	
</head>

<body>    

<div class="wrapper">
    <!--=== Header ===-->    
    <div class="header">
        <div class="container">
            
            
           

           
        </div><!--/end container-->

      
    </div>
    <!--=== End Header ===-->
	
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs margin-bottom5">
        <div class="container">
            <h1 class="pull-left">ประกาศของฉัน(<?=$_SESSION['ses_cus_email']?>#<?=$_SESSION['ses_cus_id']?>)</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="index.php?page=post&loginType=loginForManage">หน้าแรก</a></li>
                 	<?php
					   switch($_GET['page']){
					   case 'post': echo"<li class='active'>ประกาศของฉัน</li>"; break;
					   case 'profile': echo"<li class='active'>ข้อมูลส่วนตัว</li>";break;
					   case 'inbox': echo"<li class='active'>ข้อความ</li>";break;
					   case 'stats': echo"<li class='active'>สถิติ</li>";break;
					   }
					   ?>
                
            </ul>
        </div>
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->
    <div class="container content">
        <div class="row">
            <!-- Begin Sidebar Menu -->
            <div class="col-md-2">
                <ul class="list-group sidebar-nav-v1" id="sidebar-nav">
                    <!-- Typography -->
                    <li class="list-group-item list-toggle active">  
   
					<a href="#collapse-typography" data-parent="#sidebar-nav" data-toggle="collapse" class="" aria-expanded="true">ข้อมูลการประกาศ</a>
                       <ul class="collapse in" id="collapse-typography" aria-expanded="true" style="">
                            <li><a href="?page=post&loginType=loginForManage"><i class="fa fa-sort-alpha-asc"></i> ประกาศของฉัน</a></li>
                            <li>
                                
                                <a href="?page=profile"><i class="fa fa-magic"></i> ข้อมูลส่วนตัว</a>
                            </li>
                            <li>
                                                  
                                <a href="?page=inbox"><i class="fa fa-ellipsis-h"></i> ข้อความของฉัน</a>
                            </li>
                            <li><a href="?page=stats"><i class="fa fa-quote-left"></i> ข้อมูลสถิติ</a></li>
							<li>
                                                  
                                <a href="../index.php?page=profile_post&cus_id=<?=$_SESSION['ses_cus_id']?>"><i class="fa fa-asterisk"></i> ดูหน้าประกาศ</a>
                            </li>
                            <li>
                                                      
                                <a href="#" class="logout"><i class="fa fa-asterisk"></i> ออกจากระบบ</a>
                            </li>

                            
                        </ul>
                    </li>
                    <!-- End Typography -->


                </ul>
            </div>
            <!-- End Sidebar Menu -->

            <!-- Begin Content -->
				<div class="col-md-10">
			
					   <?php
					   switch($_GET['page']){
					   case 'post': include"post.php";break;
					   case 'profile': include"profile.php";break;
					   case 'inbox': include"inbox.php";break;
					   case 'stats': include"stats.php";break;
					   default:include"post.php";
					   
					   }
					   ?>
				</div>
            
			</div> 
			<!-- End Content -->

    </div><!--/container-->     
    <!--=== End Content Part ===-->

      <!--=== Footer Version 1 ===-->

   
    <div class="footer-v1">
        
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">                     
                        <p>
                            2015 &copy; All Rights Reserved.
       
                           <a href="www.realthairealty.com">www.realthairealty.com</a>
                        </p>
                    </div>

                   
                    <div class="col-md-6">
                        <ul class="footer-socials list-inline">
                            <li>
                                <a href="https://www.facebook.com" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                          
                             
                            <li>
                                <a href="https://plus.google.com" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google Plus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                           <!-- 
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
                             -->
                        </ul>
                    </div>
                   
                </div>
            </div> 
        </div>
    </div>     
  
    <!--=== End Footer Version 1 ===-->
</div><!--/End Wrapepr-->

</body>
</html>	