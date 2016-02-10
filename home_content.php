
 <!--Blog Post-->
  <?php 
	 
	if($conn){
		$strSQLHome="select * from home where admin_id=1";
		$resultHome=mysql_query($strSQLHome);
		$rsHome=mysql_fetch_array($resultHome);
		
		echo $rsHome['home_detail'];
	}
	
	?> 
 <?php 
   include("specialPostSale.php");    
  ?>
 <!--End Blog Post--> 
				