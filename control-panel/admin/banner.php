<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- CKE-->
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<!-- CKE-->
<style>
#devtext_title{
	padding:5px;
	font-weight:bold;
	font-size:13px;
	border-top:#dedede solid 1px;
	border-bottom:#dedede solid 1px;
	background:#efefef;
}
#dev_l{
border-left:#dedede solid 1px;
border-top:#dedede solid 1px;
border-bottom:#dedede solid 1px;
background:#efefef;
	padding:5px;
	font-weight:bold;
	font-size:13px;
}
#dev_r{
border-top:#dedede solid 1px;
border-bottom:#dedede solid 1px;
background:#efefef;
border-right:#dedede solid 1px;
	padding:5px;
	font-weight:bold;
	font-size:13px;
}
</style>
<?
include("../config.inc.php");
//##### Check manage user login end #####
$member_user_url=trim($_SESSION['member_user_url2']);
//ทำการ select admin_id ออกมาจาก admin
$query_admin="select admin_id from admin where admin_username='".$member_user_url."'";
$result_admin=$obj_manage_data->select_data_proc($query_admin);
$rs_admin=mysql_fetch_array($result_admin);

//ถ้าไม่มีaddmin_id ตามที่ loginเข้ามาให้ values =0 คือไม่มีข้อมูลน้นเอง
if(!$rs_admin){
$admin_id =0;
}else{
//ถ้ามีข้อมูล admin_id ให้ valuse = $admin_id ที่อยู่ในtable category product
$admin_id = $rs_admin['admin_id'];
}
//ถ้าการlogin เข้ามาเป็น admin ให้แสดงข้อมูลของ admin 
if($_SESSION['admin_status']=="3"){
$admin_id=1;
}

//echo"admin_id".$admin_id;
//##### Check manage user login end #####

?>
<div id="dev_text" style="font-size:18px; font-weight:bold; color:#FFF; padding:5px; background-color:#333;">
Manage Banner 
</div>

<table width="100%" cellpadding="0" cellspacing="0" style='border: 1px solid;'>
    <tr>
    	<td width="62">
        <div id="devtext_title">
                       รหัส
        </div>
        </td>
        <td width="185">
        <div id="devtext_title">
       	โฆษณา
        </div>
        </td>
        <td width="201">
         <div id="devtext_title">
                      ตำแหน่ง
        </div>
        </td>
        <td width="262">
        <div id="devtext_title">
       	หน้า
        </div>
        </td>
        <td width="142">
        <div id="devtext_title">
      	 ลิงค์
        </div>
        </td>
        <td width="142">
         <div id="devtext_title">
       	จัดการ
        </div>
        </td>
    </tr>
    <? 
	$action=$_GET['action'];
	if($action=="edit"){
	$pic_id_edit=$_GET['pic_id'];
	
	$strSQL="select * from banner_sum where pic_id=$pic_id";
	//echo"hello";
	$result=mysql_query($strSQL);
	$rs=mysql_fetch_array($result);
	 $pic_type_edit=$rs[pic_type];
	 $pic_detail_edit=$rs[pic_detail];
	 $pic_detail_eng_edit=$rs[pic_detail_eng];
	 $main_menu_id_edit=$rs[main_menu_id];
	 
	 $pic_position_edit=$rs[pic_position];
	 $pic_display_edit=$rs[pic_display];
	 
	 $pic_link_edit=$rs[pic_link];
	 $action_banner="edit_piture.php";
	}else{
		$action_banner="add_picture.php";
	}
		
	$strSQL5 = "select * from banner_sum where admin_id='$admin_id'";
	$result5=mysql_query($strSQL5);
	$num5=mysql_num_rows($result5);
	$i=1;
	while($rs5=mysql_fetch_array($result5)){	
	$pic_id=$rs5[pic_id];
	$pic_name=$rs5[pic_name];
	$pic_position=$rs5[pic_position];
	$pic_type=$rs5[pic_type];
	$pic_detail=$rs5[pic_detail];
	$pic_link=$rs5[pic_link];
	$main_menu_id=$rs5[main_menu_id];
	/*
	$strSQL_main_menu="select * from main_menu where main_menu_id='$main_menu_id'";
	$result_main_menu=mysql_query($strSQL_main_menu);
	$rs_main_menu=mysql_fetch_array($result_main_menu);
    */
	$strSQLRTC1="select * from realty_type_cate  where rtc_id='$main_menu_id' order by rtc_id";
	$resultRTC1=mysql_query($strSQLRTC1);
	$rsRTC1=mysql_fetch_array($resultRTC1);

	
	?>
     <tr>
     	<td>
        <center>
        <?=$i?>
        </center>
        </td>
    	<td>
        <img src="../mypicture/<?=$admin_id?>/<?=$pic_name?>" width="20%" height="20%" />
        </td>
        <td>
       
        ตำแหน่งที่ <?=$pic_position?>
		
        </td>
        <td>
        <?
        /*
        if(strlen($pic_detail)>20){
		$pic_detail=mb_substr($pic_detail,0,20,"UTF-8")."...";
		}else{
		$pic_detail=$pic_detail;
		}
		echo"$pic_detail";
		*/
       
		?>
		
         <?php
         
         /* 
         if($rs_main_menu[main_menu_name]!="" and $rs_main_menu[main_menu_name_eng]!=""){
         	echo $rs_main_menu[main_menu_name]."".$rs_main_menu[main_menu_name_eng];
         }else{
         	echo"แสดงทุกหน้า";
         }
         */
         if($main_menu_id=="All"){
         	echo "ทุกหน้า";
         }else if($main_menu_id=="home"){
         	echo"หน้าแรก";
         }else{
         echo $rsRTC1['rtc_name'];
         }
         ?>
        </td>
        <td>
        
        <?
        if(strlen($pic_link)>20){
		$pic_link=mb_substr($pic_link,0,20,"UTF-8")."..";
		}else{
		$pic_link=$pic_link;
		}
		echo"$pic_link";
		?>
        </td>
        <td>
        <a href="delete_picture.php?page=banner&pic_id=<?=$pic_id?>&admin_id=<?=$admin_id?>"> <img src="../images_system/b_drop.png" border="0" /></a>
        <a href="index.php?page=banner&pic_id=<?=$pic_id?>&action=edit&pic_type=<?=$pic_type?>"> <img src="../images_system/b_edit.png"  border="0"/></a>
        </td>
     </tr>
	
    
    <?
	$i++;
	}

	?>
    
   
    </table>
<br>
<h3>ขนาดโฆษณา ความกว้าง x ความสูง</h3>
<p style='border:1px solid'>
<b>ตำแหน่งที่ 1</b> ขนาด 10000 X 70 px <br>
<b>ตำแหน่งที่ 2</b> ขนาด  490 X 88 px  <br>
<b>ตำแหน่งที่ 3</b> ขนาด  10000 X 70 px <br>
<b>ตำแหน่งที่ 4</b> ขนาด 200 X 650 px <br>
<b>ตำแหน่งที่ 5</b> ขนาด 10000 X 70 px <br>
<b>ตำแหน่งที่ 6</b> ขนาด  660 X 90 px <br>
<b>ตำแหน่งที่ 7</b> ขนาด  660 X 90 px <br>
<b>ตำแหน่งที่ 8</b> ขนาด  322 X 300 px <br>
<b>ตำแหน่งที่ 9</b> ขนาด 322 X 300 px <br>
<b>ตำแหน่งที่ 10</b> ขนาด 322 X 300 px <br>
<b>ตำแหน่งที่ 11</b> ขนาด 322 X 300 px <br>
<b>ตำแหน่งที่ 12</b> ขนาด 322 X 300 px <br>
<b>ตำแหน่งที่ 13</b> ขนาด 322 X 300 px <br>
<b>ตำแหน่งที่ 14</b> ขนาด 322 X 300 px <br>
<b>ตำแหน่งที่ 15</b> ขนาด 322 X 300 px <br>
<b>ตำแหน่งที่ 16</b> ขนาด 322 X 300 px <br>
<b>ตำแหน่งที่ 17</b> ขนาด 322 X 300 px <br>
</p>

<form action="<?=$action_banner?>" method="post" enctype="multipart/form-data">
<table>
   		<tr>
        	<td>
            <b>อัปโหลดรูปภาพโฆษณา</b>
          </td>
        </tr>
        <? 
		//if($action=="edit"){
		?>
        <tr>
        	<td>
           
            <input type="file" name="filUpload">
            </td>
        </tr> 
         
        <?
		//}
		?>
		<tr>
			<td>
			 <b>ตำหน่งการแสดงผล</b>
			</td>
		</tr>
		<tr>
			<td>
			<?php 
			$bannerPositionArray=array("1","2","3","4","5","6","7","8","9","10",
			"11","12","13","14","15","16","17");
			?>
			<select name="pic_position">
				<option selected="" value="">- เลือกตำแหน่งของโฆษณา -</option>
				<?php 
				for($i=0;$i<count($bannerPositionArray);$i++){
					if(($i+1)==$pic_position_edit){
					?>
					<option  selected='selected' value="<?=$i+1?>">ตำแหน่งที่ <?=$bannerPositionArray[$i]?></option> 
					<?php
					}else{
					?>
					<option  value="<?=$i+1?>">ตำแหน่งที่ <?=$bannerPositionArray[$i]?></option> 
					<?php
					}
				}
				?>
			</select>
			</td>
		</tr>
		<tr>
			<td>แสดงโฆษณา</td>
		</tr>
		<tr>
			<td>
				<select name='pic_display'>
					<?php 
					if($pic_display_edit=="Y"){
						?>
						<option value='Y' selected='selected'>
							แสดง
						</option>
						<option value='N'>
							ไม่แสดง
						</option>
						<?php
					}else{
						?>
						<option value='Y' >
							แสดง
						</option>
						<option value='N' selected='selected'>
							ไม่แสดง
						</option>
						<?php
					}
					?>
					
				</select>
			</td>
		</tr>
		<tr>
		<td>
		 <b>หน้าที่แสดงโฆษณา</b>
		</td>
		</tr>
        <tr>
        	<td>
           <?
		/*
        $pic_type=$_GET['pic_type'];
		$pic_id=$_GET['pic_id'];
		
		$pic[1]="หน้าแรก";
		$pic[2]="หน้าทัวร์";
		$pic[3]="หน้าจองทัวร์";
		$pic[4]="หน้าเว็บบอร์ด";
		
		
		 $strSQL_position="select * from banner_sum where pic_id='$pic_id'";
		 $result_position=mysql_query($strSQL_position);
		 if($result_position){
			 $num_position=mysql_num_rows($result_position);
		 }
         //$picture_important=$rs[picture_important]
		
		 ?>
		<select name="pic_type">
		  <?
		
		for($i=1;$i<=4; $i++){
			if($pic_type==$pic[$i]){
		?>
		  <option selected="selected" value="<?=$pic[$i]?>">
		    <?=$pic[$i]?>
	      </option>
		  <?
		}else{
		?>
		  <option value="<?=$pic[$i]?>">
		    <?=$pic[$i]?>
	      </option>
		  <? 
		}
	}
		*/?>
		<!--  </select>-->
          <?
			$strSQL="select * from main_menu where admin_id='$admin_id'";
			$result=mysql_query($strSQL);
			
			$strSQLRTC="select * from realty_type_cate order by rtc_id";
			$resultRTC=mysql_query($strSQLRTC);
			
			$num=mysql_num_rows($result);
			/*$ps = new database();
			$ps->selectSQL("main_menu");
			$result=mysql_query($ps);
			$num=mysql_num_rows($ps);
			*/?>
            <select name="main_menu_id">
            	<?php 
            	if("All"==$main_menu_id_edit){
            	?>
            	<option selected='selected' value="All">
                	ทุกหน้า
                </option>
                <?php 
                }else{	
				?>
				 <option value="All">
                	ทุกหน้า
                </option>
				<?php
                }
                if("home"==$main_menu_id_edit){
             
                ?>				
                <option selected='selected' value="home">
                	หน้าแรก
                </option>
                <?php
                }else{
                ?>
                <option value="home">
                	หน้าแรก
                </option>	
                <?php
                }
                ?>
                
                
            <?
            /*
			for($i=1;$i<=$num;$i++)
			{
			
				$rs=mysql_fetch_array($result);
				if($main_menu_id_edit==$rs[main_menu_id]){
				?>
		  		<option selected="selected" value="<?=$rs[main_menu_id];?>">
		    		<?=$rs[main_menu_name];?>(<?=$rs[main_menu_name_eng];?>)
	      		</option>
		  		<?
				}else{
				
				?>
            	<option value="<?=$rs[main_menu_id];?>">
                	<?=$rs[main_menu_name];?>(<?=$rs[main_menu_name_eng];?>)
                </option>
            	<?
				}
			}
			*/
			?>
			<?php 
			while($rsRTC=mysql_fetch_array($resultRTC)){
				if($rsRTC[rtc_id]==$main_menu_id_edit){
				?>
				<option selected='selected' value="<?=$rsRTC[rtc_id];?>">
					<?=$rsRTC['rtc_name'];?>
				</option>
				<?php
				}else{
				?>
				<option value="<?=$rsRTC[rtc_id];?>">
					<?=$rsRTC['rtc_name'];?>
				</option>
				<?php	
				}
			}
			?>
            </select>
          
		
           
           
           
          
            </td> 
        </tr>
        <tr>
        	<td>
           <b>ลิงค์โดยระบุ  URL</b>ตัวอย่างเช่น "http://www.google.com"
            </td>
        </tr>
        <tr>
        	<td>
            <input type="text" name="pic_link" style="width: 280px;" value="<?=$pic_link_edit?>"> 
            </td>
        </tr>
       
          <tr>
        	<td>รายละเอียด
        	</td>
        </tr>
        <tr>
        	<td>
                   <!--CKEditor-->
    <textarea cols="80" id="pic_detail" name="pic_detail" rows="10" ><?=$pic_detail_edit?></textarea>
    <script type="text/javascript">
        //<![CDATA[
            CKEDITOR.replace( 'pic_detail',{
            filebrowserBrowseUrl : '/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?Type=Images',
            filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?Type=Flash',
            filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

            } );
        //]]>
    </script>
    <!--CKEditor-->			
            </td>
            
        </tr>
         <tr style='display:none;'>
        	<td><b>Banner Detail</b>
        	</td>
        </tr>
        <tr style='display:none;'>
        	<td>
        <!--CKEditor-->
    <textarea cols="80" id="pic_detail_eng" name="pic_detail_eng" rows="10" ><?=$pic_detail_eng_edit?></textarea>
    <script type="text/javascript">
        //<![CDATA[
            CKEDITOR.replace( 'pic_detail_eng',{
            filebrowserBrowseUrl : '/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?Type=Images',
            filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?Type=Flash',
            filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

            } );
        //]]>
    </script>
    <!--CKEditor-->			
            </td>
      
        </tr>
        <tr>
        
           <td height="26">
           	<input type="hidden" name="pic_type_page" value="banner" >
            <input type="hidden" name="pic_id" value="<?=$pic_id_edit?>" />
			 <input type="hidden" name="admin_id" value="<?=$admin_id?>" />
			 <input name="btnSubmit" type="submit" value="บันทึกข้อมูล">
			<input name="btnReset" onclick="location.href='index.php?page=banner&action=add'" type="reset" value="ยกเลิก">
            
            
           </td>
        </tr>
        
        
       
   </table>
 </form>