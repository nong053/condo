<?php 
include("../config.inc.php");
if($_POST['paramAction']=="contructor_select_type"){
	
	$cst_type=$_POST['cst_type'];
	$paramRealtyID=$_POST['paramRealtyID'];
	
	$strSQL="select cst_id,cst_detail,cst_type from contructor_select_type where cst_type='$cst_type'";
	$result=mysql_query($strSQL);

	while ($rs=mysql_fetch_array($result)){
		?>
		 		<div class=" col-lg-6">
					<div class="checkbox">
						<label>
							<input type="checkbox" class="" name=""  value="<?=$rs['cst_id']?>" ><?=$rs['cst_detail']?> 
						</label>
					</div>
				</div>
		<?php
		
	}
	
}
if($_POST['paramAction']=="getRealtyTypeId"){
	$strSQL="select rt_id from realty_data_general where rdg_id='$paramRealtyID'";
	$result=mysql_query($strSQL);
	$rs=mysql_fetch_array($result);
	echo "[".$rs[rt_id]."]";
}









?>