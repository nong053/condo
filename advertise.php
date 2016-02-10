
<script src="Controller/cAdvertise.js">

</script>

<div class="panel panel-green margin-bottom-40" style="padding:5px;";>
					<div id='position0'></div>
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-tasks"></i> อัตราราคาการโฆษณา</h3>
                    </div>
                    <div class="panel-body">
                        <p>
						<?php 
				
						if($conn){
							$strSQLAbout="select * from article where article_id=34 and article_show='show'";
							$resultAbout=mysql_query($strSQLAbout);
							$rsAbout=mysql_fetch_array($resultAbout);
						
							echo $rsAbout['article_detail'];
						}
						
						
						?>
						
						</p>
                    </div> 
                      
                    <table id="tableAds" >
	                <colgroup>
	                    <col  style="width:8%"/>
	                    <col  style="width:40%"/>
	                    <col  style="width:6%"/>
	                    <col  style="width:20%"/>
	                    <col style="width:6%" />
	                    <col style="width:10%" />
	                </colgroup>
	                <thead>
	                    <tr>
	                       		<th  data-field="field1"><b>ชื่อตำแหน่ง</b></th>
                                <th  data-field="field2"><b>ตำแหน่งแสดงโฆษณา</b></th>
                                <th  data-field="field3"><b>รูปแบบ</b></th>
                                <th  data-field="field4"><b>ขนาดโฆษณา</b></th>
                                <th  data-field="field5"><b>สถานะ</b></th>
								<th  data-field="field6"><b>รายละเอียด</b></th>
	                    </tr>
	                </thead>
	                <tbody>
	                	<tr>
                                <td>ตำแหน่งที่1</td>
                                <td>Homepage ด้านบนสุดแสดงทุกหน้า </td>
                                <td>Fixed</td>
                                <td>10000 X 70 px</td>
								<td>ว่าง</td>
                                <td><a href="#position1"><span class="label label-success"><i class="fa fa-search-plus"></i> รายละเอียด</span></a></td>    
							</tr>
							
							<tr>
                                <td>ตำแหน่งที่2</td>
                                <td>ด้านบนด้านข้างโลโก้ ทุกหน้า </td>
                                <td>Fixed</td>
                                <td> 490 X 88 px </td>
								<td>ว่าง</td>
                                <td><a href="#position2"><span class="label label-success"><i class="fa fa-search-plus"></i> รายละเอียด</span></a></td>    
							</tr>
							
							<tr>
                                <td>ตำแหน่งที่3</td>
                                <td>ด้านบนเมนูหลัก ทุกหน้า </td>
                                <td>Fixed</td>
                                <td>10000 X 70 px</td>
								<td>ว่าง</td>
                                <td><a href="#position3"><span class="label label-success"><i class="fa fa-search-plus"></i> รายละเอียด</span></a></td>    
							</tr>
							
							<tr>
                                <td>ตำแหน่งที่4</td>
                                <td>ด้านซ้าย และด้านขวาหน้าแรก</td>
                                <td>Fixed</td>
                                <td>200 X 650 px. </td>
								<td>ว่าง</td>
                                <td><a href="#position4"><span class="label label-success"><i class="fa fa-search-plus"></i> รายละเอียด</span></a></td>    
							</tr>
							
							<tr>
                                <td>ตำแหน่งที่5</td>
                                <td>ด้านล่างเมนูค้นหา </td>
                                <td>Fixed</td>
                                <td>10000 X 70 px</td>
								<td>ว่าง</td>
                                <td><a href="#position5"><span class="label label-success"><i class="fa fa-search-plus"></i> รายละเอียด</span></a></td>    
							</tr>
							<tr>
                                <td>ตำแหน่งที่6</td>
                                <td>ใต้เมนูค้นหาย่อย</td>
                                <td>Fixed</td>
                                <td> 660 X 90 px.</td>
								<td>ว่าง</td>
                                <td><a href="#position6"><span class="label label-success"><i class="fa fa-search-plus"></i> รายละเอียด</span></a></td>    
							</tr>
							<tr>
                                <td>ตำแหน่งที่7</td>
                                <td>ด้านบนประกาศพิเศษ</td>
                                <td>Fixed</td>
                                <td>660 X 90 px</td>
								<td>ว่าง</td>
                                <td><a href="#position7"><span class="label label-success"><i class="fa fa-search-plus"></i> รายละเอียด</span></a></td>    
							</tr>
							<tr>
                                <td>ตำแหน่งที่8</td>
                                <td>ด้านข้างหน้าแรก อสังหาริมทรัพย์,
										โครงการใหม่,
										โรงแรม,
										รีสอร์ท,
										เกส์ตเฮ้า,
										สำหรับผู้รับเหมา,
										วัสดุก่อสร้าง,
										เครื่องมือเครื่องจักรก่อสร้าง,
										เฟอร์นิเจอร์
</td>
                                <td>Fixed</td>
                                <td>  322 X 300 px</td>
								<td>ว่าง</td>
                                <td><a href="#position8"><span class="label label-success"><i class="fa fa-search-plus"></i> รายละเอียด</span></a></td>    
							</tr>
							<tr>
                                <td>ตำแหน่งที่9</td>
                                <td>ด้านข้างหน้าแรก อสังหาริมทรัพย์,
										โครงการใหม่,
										โรงแรม,
										รีสอร์ท,
										เกส์ตเฮ้า,
										สำหรับผู้รับเหมา,
										วัสดุก่อสร้าง,
										เครื่องมือเครื่องจักรก่อสร้าง,
										เฟอร์นิเจอร์</td>
                                <td>Fixed</td>
                                <td>322 X 300 px</td>
								<td>ว่าง</td>
                                <td><a href="#position9"><span class="label label-success"><i class="fa fa-search-plus"></i> รายละเอียด</span></a></td>    
							</tr>
							<tr>
                                <td>ตำแหน่งที่10</td>
                                <td>ด้านข้างหน้าแรก อสังหาริมทรัพย์,
										โครงการใหม่,
										โรงแรม,
										รีสอร์ท,
										เกส์ตเฮ้า,
										สำหรับผู้รับเหมา,
										วัสดุก่อสร้าง,
										เครื่องมือเครื่องจักรก่อสร้าง,
										เฟอร์นิเจอร์</td>
                                <td>Fixed</td>
                                <td>322 X 300 px</td>
								<td>ว่าง</td>
                                <td><a href="#position10"><span class="label label-success"><i class="fa fa-search-plus"></i> รายละเอียด</span></a></td>    
							</tr>
							<tr>
                                <td>ตำแหน่งที่11</td>
                                <td>ด้านข้างหน้าแรก อสังหาริมทรัพย์,
										โครงการใหม่,
										โรงแรม,
										รีสอร์ท,
										เกส์ตเฮ้า,
										สำหรับผู้รับเหมา,
										วัสดุก่อสร้าง,
										เครื่องมือเครื่องจักรก่อสร้าง,
										เฟอร์นิเจอร์</td>
                                <td>Fixed</td>
                                <td> 322 X 300 px,</td>
								<td>ว่าง</td>
                                <td><a href="#position11"><span class="label label-success"><i class="fa fa-search-plus"></i> รายละเอียด</span></a></td>    
							</tr>
							<tr>
                                <td>ตำแหน่งที่12</td>
                                <td>ด้านข้างหน้าแรก อสังหาริมทรัพย์,
										โครงการใหม่,
										โรงแรม,
										รีสอร์ท,
										เกส์ตเฮ้า,
										สำหรับผู้รับเหมา,
										วัสดุก่อสร้าง,
										เครื่องมือเครื่องจักรก่อสร้าง,
										เฟอร์นิเจอร์</td>
                                <td>Fixed</td>
                                <td>322 X 300 px</td>
								<td>ว่าง</td>
                                <td><a href="#position12"><span class="label label-success"><i class="fa fa-search-plus"></i> รายละเอียด</span></a></td>    
							</tr>
							<tr>
                                <td>ตำแหน่งที่13</td>
                                <td>ด้านข้างหน้าแรก อสังหาริมทรัพย์,
										โครงการใหม่,
										โรงแรม,
										รีสอร์ท,
										เกส์ตเฮ้า,
										สำหรับผู้รับเหมา,
										วัสดุก่อสร้าง,
										เครื่องมือเครื่องจักรก่อสร้าง,
										เฟอร์นิเจอร์</td>
                                <td>Fixed</td>
                                <td>322 X 300 px</td>
								<td>ว่าง</td>
                                <td><a href="#position13"><span class="label label-success"><i class="fa fa-search-plus"></i> รายละเอียด</span></a></td>    
							</tr>
							<tr>
                                <td>ตำแหน่งที่14</td>
                                <td>ด้านข้างหน้าแรก อสังหาริมทรัพย์,
										โครงการใหม่,
										โรงแรม,
										รีสอร์ท,
										เกส์ตเฮ้า,
										สำหรับผู้รับเหมา,
										วัสดุก่อสร้าง,
										เครื่องมือเครื่องจักรก่อสร้าง,
										เฟอร์นิเจอร์</td>
                                <td>Fixed</td>
                                <td>322 X 300 px</td>
								<td>ว่าง</td>
                                <td><a href="#position14"><span class="label label-success"><i class="fa fa-search-plus"></i> รายละเอียด</span></a></td>    
							</tr>
							<tr>
                                <td>ตำแหน่งที่15</td>
                                <td>ด้านข้างหน้าแรก อสังหาริมทรัพย์,
										โครงการใหม่,
										โรงแรม,
										รีสอร์ท,
										เกส์ตเฮ้า,
										สำหรับผู้รับเหมา,
										วัสดุก่อสร้าง,
										เครื่องมือเครื่องจักรก่อสร้าง,
										เฟอร์นิเจอร์</td>
                                <td>Fixed</td>
                                <td>322 X 300 px</td>
								<td>ว่าง</td>
                                <td><a href="#position15"><span class="label label-success"><i class="fa fa-search-plus"></i> รายละเอียด</span></a></td>    
							</tr>
							<tr>
                                <td>ตำแหน่งที่16</td>
                                <td>ด้านข้างหน้าแรก อสังหาริมทรัพย์,
										โครงการใหม่,
										โรงแรม,
										รีสอร์ท,
										เกส์ตเฮ้า,
										สำหรับผู้รับเหมา,
										วัสดุก่อสร้าง,
										เครื่องมือเครื่องจักรก่อสร้าง,
										เฟอร์นิเจอร์</td>
                                <td>Fixed</td>
                                <td>322 X 300 px</td>
								<td>ว่าง</td>
                                <td><a href="#position16"><span class="label label-success"><i class="fa fa-search-plus"></i> รายละเอียด</span></a></td>    
							</tr>
							<tr>
                                <td>ตำแหน่งที่17</td>
                                <td>ด้านข้างหน้าแรก อสังหาริมทรัพย์,
										โครงการใหม่,
										โรงแรม,
										รีสอร์ท,
										เกส์ตเฮ้า,
										สำหรับผู้รับเหมา,
										วัสดุก่อสร้าง,
										เครื่องมือเครื่องจักรก่อสร้าง,
										เฟอร์นิเจอร์</td>
                                <td>Fixed</td>
                                <td>322 X 300 px</td>
								<td>ว่าง</td>
                                <td><a href="#position17"><span class="label label-success"><i class="fa fa-search-plus"></i> รายละเอียด</span></a></td>    
							</tr>
							
							
	                   
                   </tbody>
                   </table>
                   
                                                       
                   


					<div class="clear"></div>
					
				
					
					<div class="headline headline-md">
						<h2>ตัวอย่างตำแหน่งการโฆษณา</h2>
					</div>
					<div class="clear"></div>
					
					<div class="alert alert-success fade in">
                    <h3 id="position1">ตำแหน่งที่ 1</h3>
                    </div>
					<img src="./images/positionAds/1.png" width="100%">
					<div class="clear"></div>
					<div class="alert alert-success fade in">
					<h3 id="position2">ตำแหน่งที่ 2</h3>
					</div>
					<img src="./images/positionAds/2.png" width="100%">
					<div class="clear"></div>
					<div class="alert alert-success fade in">
					<h3 id="position3">ตำแหน่งที่ 3</h3>
					</div>
					<img src="./images/positionAds/3.png" width="100%">
					<div class="clear"></div>
					<div class="alert alert-success fade in">
					<h3 id="position4">ตำแหน่งที่ 4</h3>
					</div>
					<img src="./images/positionAds/4.png" width="100%">
					<div class="clear"></div>
					<div class="alert alert-success fade in">
					<h3 id="position5">ตำแหน่งที่ 5</h3>
					</div>
					<img src="./images/positionAds/5.png" width="100%">
					<div class="clear"></div>
					<div class="alert alert-success fade in">
					<h3 id="position6">ตำแหน่งที่ 6</h3>
					</div>
					<img src="./images/positionAds/6.png" width="100%">
					<div class="clear"></div>
					<div class="alert alert-success fade in">
					<h3 id="position7">ตำแหน่งที่ 7</h3>
					</div>
					<img src="./images/positionAds/7.png" width="100%">
					<div class="clear"></div>
					<div class="alert alert-success fade in">
					<h3 id="position8">ตำแหน่งที่ 8</h3>
					</div>
					<img src="./images/positionAds/8.png" width="100%">
					<div class="clear"></div>
					<div class="alert alert-success fade in">
					<h3 id="position9">ตำแหน่งที่ 9</h3>
					</div>
					<img src="./images/positionAds/9.png" width="100%">
					<div class="clear"></div>
					<div class="alert alert-success fade in">
					<h3 id="position10">ตำแหน่งที่ 10</h3>
					</div>
					<img src="./images/positionAds/10.png" width="100%">
					<div class="clear"></div>
					<div class="alert alert-success fade in">
					<h3 id="position11">ตำแหน่งที่ 11</h3>
					</div>
					<img src="./images/positionAds/11.png" width="100%">
					<div class="clear"></div>
					<div class="alert alert-success fade in">
					<h3 id="position12">ตำแหน่งที่ 12</h3>
					</div>
					<img src="./images/positionAds/12.png" width="100%">
					<div class="clear"></div>
					<div class="alert alert-success fade in">
					<h3 id="position13">ตำแหน่งที่ 13</h3>
					</div>
					<img src="./images/positionAds/13.png" width="100%">
					<div class="clear"></div>
					<div class="alert alert-success fade in">
					<h3 id="position14">ตำแหน่งที่ 14</h3>
					</div>
					<img src="./images/positionAds/14.png" width="100%">
					<div class="clear"></div>
					<div class="alert alert-success fade in">
					<h3 id="position15">ตำแหน่งที่ 15</h3>
					</div>
					<img src="./images/positionAds/15.png" width="100%">
					<div class="clear"></div>
					<div class="alert alert-success fade in">
					<h3 id="position16">ตำแหน่งที่ 16</h3>
					</div>
					<img src="./images/positionAds/16.png" width="100%">
					<div class="clear"></div>
					<div class="alert alert-success fade in">
					<h3 id="position17">ตำแหน่งที่ 17</h3>
					</div>
					<img src="./images/positionAds/17.png" width="100%">
					<div class="clear"></div>
  </div>	