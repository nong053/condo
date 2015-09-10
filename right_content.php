<?php 
$rdg_id=$_GET['rdg_id'];

if($conn){
	$strSLQBanner1="select * from banner_sum where pic_position='1'";
	$resultBanner1=mysql_query($strSLQBanner1);
	
	$strSLQBanner2="select * from banner_sum where pic_position='2'";
	$resultBanner2=mysql_query($strSLQBanner2);
	
	$strSLQBanner3="select * from banner_sum where pic_position='3'";
	$resultBanner3=mysql_query($strSLQBanner3);
	
	$strSLQBanner4="select * from banner_sum where pic_position='4'";
	$resultBanner4=mysql_query($strSLQBanner4);
	
	$strSLQBanner5="select * from banner_sum where pic_position='5'";
	$resultBanner5=mysql_query($strSLQBanner5);
	
	
	
	
}
?>

<!--Start Right Content -->
        	<div class="col-md-4 magazine-page"> 
                <!-- Blog Posts -->
                <div class="row">
				<!--Start Ads-->
				<!-- 
					<div class="magazine-posts col-md-12 col-sm-6 margin-bottom-2">
					
					<div class="shadow-wrapper">
						<blockquote class="hero box-shadow shadow-effect-2">
							<p style="height:80px;">
							Ads IMG
							</p>
						</blockquote>
					</div>
					
                    </div>
                    -->
					<!--End Ads-->
                    <div class="magazine-posts col-md-12 col-sm-6 margin-bottom-2">
                        
                        <div class="magazine-posts-img">
                            <a href="#">
                            <?php 
                            $rsBanner1=mysql_fetch_array($resultBanner1);
                            //echo $rsBanner1['pic_name'];
                            ?>
                             <img src="control-panel/mypicture/1/<?=$rsBanner1['pic_name']?>" width="100%" height="100%" />
                            <!-- <img alt="" src="assets/img/main/img10.jpg" class="img-responsive"> -->
                            </a>
                                                      
                        </div>
                    </div>

                    <div class="magazine-posts col-md-12 col-sm-6 margin-bottom-2">
                        
                        <div class="magazine-posts-img">
                        
                            <a href="#">
                            
                           <?php 
                            $rsBanner2=mysql_fetch_array($resultBanner2);
                            //echo $rsBanner1['pic_name'];
                            ?>
                             <img src="control-panel/mypicture/1/<?=$rsBanner2['pic_name']?>" width="100%" height="100%" />
                            
                            </a>
                                                            
                        </div>
                    </div> 

                    <!-- banking -->
                    <div class="row "> 
                        <div class="col-md-12 shadow-wrapper">
	                        <div class="tag-box tag-box-v1 box-shadow shadow-effect-2">
	                           <div class="headline"><h2>รวมสินเชื่อธนาคาร</h2></div>
		                        <ul class="">
		                            <li><a href="#">กรุงศรีอยุธยา</a> <i class="fa fa-angle-right"></i></li>
		                            <li><a href="#">ไทยพาณิชย์</a> <i class="fa fa-angle-right"></i></li>
		                            <li><a href="#">อาคารสงเคราะห์</a> <i class="fa fa-angle-right"></i></li>
		                            <li><a href="#">แสตนด์ดาดชาเตอร์</a> <i class="fa fa-angle-right"></i></li>
		                            <li><a href="#">ทหารไทย</a> <i class="fa fa-angle-right"></i></li>
		                            <li><a href="#">กรุงไทย</a> <i class="fa fa-angle-right"></i></li>
		                            <li><a href="#">กสิกรไทย</a> <i class="fa fa-angle-right"></i></li>
		                            <li><a href="#">ธนชาติยูโอบี</a> <i class="fa fa-angle-right"></i></li>
		                            <li><a href="#">ออมสิน </a> <i class="fa fa-angle-right"></i></li>
		                            <li><a href="#">กรุงเทพ</a> <i class="fa fa-angle-right"></i></li>
		                            <li><a href="#">สินเชื่อที่อยู่อาศัยสำหรับเชาวต่างประเทศ</a> <i class="fa fa-angle-right"></i></li>
		
		
		                        </ul> 
	                        </div>
	                    </div>                          
                 	</div>
                 	<!-- banking -->
                 
                 

					<div class="magazine-posts col-md-12 col-sm-6 margin-bottom-2">
                        
                        <div class="magazine-posts-img">
                        
                            <a href="#">
                            
                            <?php 
                            $rsBanner3=mysql_fetch_array($resultBanner3);
                            //echo $rsBanner1['pic_name'];
                            ?>
                             <img src="control-panel/mypicture/1/<?=$rsBanner3['pic_name']?>" width="100%" height="100%" />
                            
                            </a>
                                                            
                        </div>
                    </div>
					<div class="magazine-posts col-md-12 col-sm-6 margin-bottom-2">
                        
                        <div class="magazine-posts-img">
                            <a href="#">
                            
                            <?php 
                            $rsBanner4=mysql_fetch_array($resultBanner4);
                            //echo $rsBanner1['pic_name'];
                            ?>
                             <img src="control-panel/mypicture/1/<?=$rsBanner4['pic_name']?>" width="100%" height="100%" />
                           
                            </a>
                                                            
                        </div>
                    </div>

				

					<div class="magazine-posts col-md-12 col-sm-6 margin-bottom-2">
                        
                        <div class="magazine-posts-img">
                            <a href="#">
                            
                           
                              <?php 
                            $rsBanner5=mysql_fetch_array($resultBanner5);
                            //echo $rsBanner1['pic_name'];
                            ?>
                             <img src="control-panel/mypicture/1/<?=$rsBanner5['pic_name']?>" width="100%" height="100%" />
                           
                            </a>
                                                            
                        </div>
                    </div>

					


					<div class="magazine-posts col-md-12 col-sm-6 margin-bottom-2">
                        
                        <div class="row">
								<div class="col-md-6">
								 <iframe id="ifrmBanner" scrolling="no" src="http://www.bangkokbank.com/MajorRates/MainBannerThai.htm" width="170" height="155" frameborder="0"></iframe> 
								</div>
								<div class="col-md-6">
								<iframe marginWidth=0 marginHeight=0 src="http://www.bangkokbank.com/fxbanner/banner1.htm" frameBorder=0 width=173 scrolling=no height=165></iframe> 
								</div>
						</div>
						
                      
                       
                    </div>

					<!--Start Ads-->
					<!-- 
					<div class="magazine-posts col-md-12 col-sm-6 margin-bottom-2">
						<div class="shadow-wrapper">
							<blockquote class="hero box-shadow shadow-effect-2">
								<p style="height:80px;">
								Ads IMG
								</p>
							</blockquote>
						</div>
                    </div>
                    -->
					<!--End Ads-->

					<!--Start Short Search-->
					<!-- 
				<div class="magazine-posts col-md-12 col-sm-6 margin-bottom-2">
					<div class="shadow-wrapper">
						<blockquote class="hero box-shadow shadow-effect-2">
							
						
								<div class="headline"><h2>บริการฟรี</h2></div>
								<button type="button" class="btn-u btn-u-blue"><i class="fa fa-cloud"></i>  ลงประกาศขาย</button>
								<button type="button" class="btn-u btn-u-red"><i class="fa fa-bell-o"></i>ลงประกาศให้เช่า</button>
							
						</blockquote>
					</div>
                    </div>
                     -->
					



					


				<?php
						if($_GET["page"]=="post_sub_detail"){
							//echo"post_sub_detail";
						}else{
							//echo"not post_sub_detail";
						?>

						<div class="magazine-posts col-md-12 col-sm-6 margin-bottom-2">
                        
                        <div class="magazine-posts-img">
                            <a href="#"><img alt="" src="assets/img/main/img1.jpg" class="img-responsive"></a>
                                                            
                        </div>
                    </div>

						<div class="magazine-posts col-md-12 col-sm-6 margin-bottom-2">
                        
                        <div class="magazine-posts-img">
                            <a href="#"><img alt="" src="assets/img/main/img1.jpg" class="img-responsive"></a>
                                                            
                        </div>
                    </div>


					<div class="magazine-posts col-md-12 col-sm-6 margin-bottom-2">
                        
                        <div class="magazine-posts-img">
                            <a href="#"><img alt="" src="assets/img/main/img1.jpg" class="img-responsive"></a>
                                                            
                        </div>
                    </div>
							<!--Start Short Search-->
							 <!-- 
						<div class="magazine-posts col-md-12 col-sm-6 margin-bottom-2">
							<div class="shadow-wrapper">
								<blockquote class="hero box-shadow shadow-effect-2">
									
								
										<div class="headline"><h2>บริการฟรี</h2></div>
										<button type="button" class="btn-u btn-u-blue"><i class="fa fa-cloud"></i>  ลงประกาศขาย</button>
										<button type="button" class="btn-u btn-u-red"><i class="fa fa-bell-o"></i>ลงประกาศให้เช่า</button>
									
								</blockquote>
							</div>
							</div>
							 -->
							<!--End Start Short Search-->



							<div class="magazine-posts col-md-12 col-sm-6 margin-bottom-2">
								
								<div class="magazine-posts-img">
									<a href="#"><img alt="" src="assets/img/main/img1.jpg" class="img-responsive"></a>
																	
								</div>
							</div>

								<div class="magazine-posts col-md-12 col-sm-6 margin-bottom-2">
								
								<div class="magazine-posts-img">
									<a href="#"><img alt="" src="assets/img/main/img1.jpg" class="img-responsive"></a>
																	
								</div>
							</div>


							<div class="magazine-posts col-md-12 col-sm-6 margin-bottom-2">
								
								<div class="magazine-posts-img">
									<a href="#"><img alt="" src="assets/img/main/img1.jpg" class="img-responsive"></a>
																	
								</div>
							</div>

						<?
						}
						?>




					</div>    
				
					<?php
						if($_GET["page"]=="post_sub_detail"){
						?>
						<!--start  box near realty -->
						<div class="panel panel-sea">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tasks"></i>ประกาศใกล้เคียง</h3>
                            </div>
                            <div class="panel-body">
							
							<?php 
							$strSQLSimilar="select * from realty_data_general";
							$resultSimilar=mysql_query($strSQLSimilar);
							while($rsSimilar=mysql_fetch_array($resultSimilar)){
								?>
								<!--start sub box near realty -->
	                               <div class="row">
											<div class="col-md-4">
												<div class="magazine-posts-img">
													<a href="#">
													<?php 
													$strSQL="select * from realty_images where rdg_id='".$rsSimilar['rdg_id']."' and  ri_set_first='0'  ORDER BY ri_set_first ";
													$result=mysql_query($strSQL);
													$i=1;
													$rs=mysql_fetch_array($result);
														//จัดการกับรูปภาพ
														$thumbnailsPath="realtyPicture/".$rsSimilar['rdg_id']."/".$rs['ri_id']."/thumbnail/";
														if(!is_dir($thumbnailsPath)){
															
														}else{ //else
													
															if($handle= opendir($thumbnailsPath)){
																$imagesFiles = array();
																while(false!=($file=readdir($handle))){
																	if($file!="." && $file!=".."){
																		$thumbnailsFile = $thumbnailsPath."/".$file;
																		$fileType = pathinfo($thumbnaisFile);//แสดงpath
																		$fileType = strtolower($fileType['extension']);//แสดงpathพร้อม แสดงนามสกุล
																		$allowedtypes=array("png","jpeg","jpd","gif");
													
																		if(is_file($thumbnailsFile)&& in_array($fileType,$allowedtypes))
																		{
																			$imagesFiles[]=$thumbnailsFile;
																		}
													
																	}
																}
																closedir($handle);
															}
															sort($imagesFiles);
															if(count($imagesFiles)>0){
																$thumbnailsFile = $imagesFiles[0];
															}
														}//else
														//ปิดจัดการรูปภาพ
														
														?>
														
														<img alt="" src="<?=$thumbnailsFile?>" class="img-responsive">
														
													
													
													</a>						
												</div>
											</div>
											<div class="col-md-8">
											<b style="color:#1abc9c;"><?=$rsSimilar['rdg_title']?></b>
											<?//$rsSimilar['rdg_detail']?><br>
											<font color="red"><?=number_format($rsSimilar['rdg_price']);?>  บาท</font>
											</div>
								   </div>
								    <hr>
								  <!--end box near realty -->
								<?php
							}
							
							?>
							
							<!--start sub box near realty -->
							<!-- 
                               <div class="row">
										<div class="col-md-4">
											<div class="magazine-posts-img">
												<a href="#"><img alt="" src="assets/img/main/img1.jpg" class="img-responsive"></a>						
											</div>
										</div>
										<div class="col-md-8">
										<b style="color:#1abc9c;">ขาย บ้านเดี่ยว 2 ชั้น เนื้อที่ 2 ไร่ สวนสวย...</b>
										49/4 เชียงใหม่, 57000 สันกำแพง, เชียงใหม่
										ขาย - ฿ 45,000,000 
										</div>
							   </div>
							    -->
							  <!--end box near realty -->
							   
                                
                            </div>
                        </div>
						<!--start box near realty -->
						<?
						}
					?>
				


                <!-- End Blog Posts -->
            </div>
            <!-- End Right Content -->