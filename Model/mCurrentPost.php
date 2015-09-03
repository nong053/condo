<?php session_start();
$cus_id=$_SESSION['cus_id'];
include("../config.inc.php");

$rdg_id=$_POST['rdg_id'];
$idArea=$_POST['idArea'];
$status=$_POST['status'];

if($_POST['paramAction']=="showCurrentPost"){
	
	$strSQL="
	select rdg_id,rt.rt_name,rdg_price,rdg_create,rdg_status,rdg_update 
	from realty_data_general rdg
	INNER JOIN realty_type rt
	ON rdg.rt_id=rt.rt_id
	where cus_id='$cus_id' and rdg_status='$status'
";
	$result=mysql_query($strSQL);
	?>
	<table id="gridCurentPost<?=$idArea?>">
                <colgroup>
                	<col />
                    <col />
                    <col />
                    <col style="width:110px" />
                    <col style="width:120px" />
                    <col style="width:200px" />
                </colgroup>
                <thead>
                    <tr>
                        <th data-field="fileld1">#รหัส</th>
                        <th data-field="fileld2">รายการ</th>
                        <th data-field="fileld3">ราคา</th>
                        <th data-field="fileld4">วันที่ประกาศ</th>
                        <th data-field="fileld5">สถานะ</th>
                        <th data-field="fileld6">จัดการ</th>
                       
                    </tr>
                </thead>
                <tbody >
	<?php
	while($rs=mysql_fetch_array($result)){
		?>
		<tr>
			<td>#<?=$rs[rdg_id]?></td>
			<td><?=$rs[rt_name]?></td>
			<!-- <td><?=$rs[rdg_price]?></td> -->
			<td>1250,000</td>
			<td><?=$rs[rdg_create]?></td>
			<td><?=$rs[rdg_status]?></td>
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