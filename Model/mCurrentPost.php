<?php session_start();
$ses_cus_id=$_SESSION['ses_cus_id'];

include("../config.inc.php");

$rdg_id=$_POST['rdg_id'];
$idArea=$_POST['idArea'];
$status=$_POST['status'];
$txtSearch=$_POST['txtSearch'];


if($_POST['paramAction']=="showCurrentPost"){
	
	if($txtSearch!=""){
	$strSQL="
	select *,rf.rf_name
	from realty_data_general rdg
	INNER JOIN realty_type rt
	ON rdg.rt_id=rt.rt_id
	INNER JOIN realty_for rf
	ON rf.rf_id=rdg.rf_id
	where cus_id='$ses_cus_id' and rdg_status='$status' and 
	(rdg_id like '%$txtSearch%') or (rdg_title like '%$txtSearch%') or (rdg_detail like '%$txtSearch%')or (rf_name like '%$txtSearch%')
	order by rdg_update desc
	";
	}else{
	$strSQL="
	select *,rf.rf_name
	from realty_data_general rdg
	INNER JOIN realty_type rt
	ON rdg.rt_id=rt.rt_id
	INNER JOIN realty_for rf
	ON rf.rf_id=rdg.rf_id
	where cus_id='$ses_cus_id' and rdg_status='$status' order by rdg_update desc
";
	}
	$result=mysql_query($strSQL);
	?>
	<table id="gridCurentPost<?=$idArea?>">
                <colgroup>
                	<col style="width:50px" />
                    <col style="width:230px" />
                    <col />
                    <col style="width:110px" />
                    <col style="width:120px" />
                    <col style="width:80px" />
                    <col style="width:200px" />
                </colgroup>
                <thead>
                    <tr>
                        <th data-field="fileld1">#รหัส</th>
                        <th data-field="fileld2">รายการ</th>
                        <th data-field="fileld3">ราคา</th>
                        <th data-field="fileld4">วันที่ประกาศ</th>
                        <th data-field="fileld5">สถานะประกาศ</th>
                        <th data-field="fileld6">ประเภท</th>
                        <th data-field="fileld7">จัดการ</th>
                       
                    </tr>
                </thead>
                <tbody >
	<?php
	while($rs=mysql_fetch_array($result)){
		?>
		<tr>
			<td>#<?=$rs[rdg_id]?></td>
			<td><?=$rs[rt_name]?>(<?=$rs[rf_name]?>)</td>
			<td>
		
			<?php
			if($rs['rt_id']=="1"){
				
				echo number_format($rs['rdg_price_project']);
			}else if($rs['rf_id']=="1"){//เพื่อขาย

				echo number_format($rs['rdg_price']);
			}else if($rs['rf_id']=="2"){//เพื่อเช่า
				echo  number_format($rs['rdg_price_rent']);
			}else if($rsRDG['rf_id']=="3"){//เพื่อขายและเช่า
				echo  number_format($rs['rdg_price'])." บาท<br>";
				echo  number_format($rs['rdg_price_rent']);
			}else if($rsRDG['rf_id']=="5"){//เพื่อขายดาว์น
				echo  number_format($rs['rdg_price_down']);
			}
			
			
			//number_format($rs[rdg_price]);
			
			
			?>
			
			</td>
			<!-- <td>1250,000</td> -->
			<td><?=$rs[rdg_create]?></td>
			<td>
			<?php 
			if($rs[rdg_status_post]=="N"){
			
			echo "<font color='green'>ยังไม่ขาย/เช่า</font>";
				
			}else if($rs[rdg_status_post]=="soldOut"){
				echo "<font color='red'>ขายแล้ว</font>";
			}else if($rs[rdg_status_post]=="rented"){
				echo "<font color='red'>เช่าแล้ว</font>";
			}else{
				echo "<font color='green'>ยังไม่ขาย/เช่า</font>";
			}
			?>
			
			
			</td>
			<td>
			<?php 
			if($rs[rdg_special]=="Y"){
				echo"<font color='green'>ประกาศพิเศษ</font>";
			}ELSE{
				echo"ประกาศฟรี";
			}
			?>
			</td>
			<td>
			<button class="btn btn-danger btn-xs btnDelPost<?=$idArea?>" id='delPostId-<?=$rs[rdg_id]?>'><i class="fa fa-trash-o"></i> ลบ </button>
			<button class="btn btn-warning btn-xs btnEditPost<?=$idArea?>" id='editPostId-<?=$rs[rdg_id]?>'><i class="fa fa-pencil"></i> แก้ไข</button>
			<?php 
			if($status=="Y"){
				?>
				<button class="btn btn-success btn-xs btnDisablePost<?=$idArea?>" id='disablePostId-<?=$rs[rdg_id]?>'><i class="fa fa-share"></i> ไม่แสดง</button>
				<?php
			}else{
				?>
				<button class="btn btn-success btn-xs btnAblePost<?=$idArea?>" id='ablePostId-<?=$rs[rdg_id]?>'><i class="fa fa-share"></i> แสดง</button>
				<?php
			}
			?>
			
			</td>
		</tr>						
		<?php
	}
?>
	     
                </tbody>
            </table>
<?php 
}
function delePictureFn($rdg_id,$ri_id){
	//echo $rdg_id."-".$ri_id;
	$path_thumbnail="../realtyPicture/".$rdg_id."/".$ri_id."/thumbnail";
	$path_big_picture="../realtyPicture/".$rdg_id."/".$ri_id."";
	
	
	if($handle=@opendir($path_thumbnail)){
		$imagesFile=array();
		while(false!==($file=readdir($handle))){
			if($file !="." && $file !=".."){
				$thumbnailsFile=$path_thumbnail."/".$file;
				$big_picture_File=$path_big_picture."/".$file;
				unlink("$thumbnailsFile");
				unlink("$big_picture_File");
			}
	
		}
		closedir($handle);//ต้องปิดทุกครั้งไม่งั้นลบfolderไม่ได้
	}

	if(is_dir($path_thumbnail)){
		rmdir("$path_thumbnail");
	}
	if(is_dir($path_big_picture)){
		rmdir("$path_big_picture");
	}
	
}

if($_POST['paramAction']=="disableOrAblePost"){
		$strSQL="update realty_data_general set rdg_status='$status'  where rdg_id='$rdg_id'";
		$result=mysql_query($strSQL);
		if($result){
			echo'["success"]';
		}
		
}

if($_POST['paramAction']=="delCurrentPost"){


	$strSQLChecked="
	select * from realty_detail where rdg_id='$rdg_id'
	";
	$resultChecked=mysql_query($strSQLChecked);
	$rsChecked=mysql_num_rows($resultChecked);
	
	//if($rsChecked>0){



		$sqlSelectRI="select * from realty_images where rdg_id='$rdg_id'";
		$resultRI=mysql_query($sqlSelectRI);
		if($resultRI){
			while($rsRI=mysql_fetch_array($resultRI)){
				delePictureFn($rdg_id,$rsRI['ri_id']);
			};
			
		//}
		
		
		
		$sqlRealtyImages="delete from realty_images where rdg_id='$rdg_id'";
		$sqlRealtyEmbedVideo="delete from realty_embed_video rdg_id='$rdg_id'";
		$sqlRealtyDetailRoom="delete from realty_detail_room rdg_id='$rdg_id'";
		
		$resultDelRealtyImages=mysql_query($sqlRealtyImages);
		$resultDelRealtyEmbedVideo=mysql_query($sqlRealtyEmbedVideo);
		$resultDelRealtyDetailRoom=mysql_query($sqlRealtyDetailRoom);
		
		if($resultDelRealtyImages || $resultDelRealtyEmbedVideo || $resultDelRealtyDetailRoom){
			//start delete floder
			//echo"delete is ok";
			$path_main_picture="../realtyPicture/".$rdg_id."";
			if(is_dir($path_main_picture)){
				@rmdir("$path_main_picture");
			}
			//end delete floder
			echo '["success"]';
		}
	
	}
	
	$strSQL="
	delete from realty_data_general where rdg_id='$rdg_id'
	";
	$result=mysql_query($strSQL);
	
}
?>