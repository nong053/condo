
<div class="container content">	
    <!--
	     <div class="row"> 
	    	<div class='col-xs-12'> 
	    	
	    		<div id='ads5' class='ads'>
	    				    	 <img src="control-panel/mypicture/1/3-5.jpg" width="100%" height="100%" />
		    	
		    		    		</div>
	    	</div>
	      </div>	
	    -->  
    	<div class="row blog-page"> 
    	<div class="col-xs-12">   
    	<div class="row">
    				
            <!-- Left Content -->
            <div class="col-xs-12">
		     <div id="mainContrainArea">
				<div class="panel panel-u" style="margin-bottom: 5px;">
	         		<div class="panel-heading">
	         			<h3 class="panel-title"><i class="fa fa-tasks"></i> เกี่ยวกับเรา</h3>
	        		 </div>
	        	 <div class="panel-body">
	                    <?php 

						if($conn){
							$strSQLAbout="select * from about where admin_id=1";
							$resultAbout=mysql_query($strSQLAbout);
							$rsAbout=mysql_fetch_array($resultAbout);
							
						
							echo $rsAbout['about_detail'];
						}
						
						?>   	
				</div>
      			</div>	
			</div>
		   </div>
								
        	
            <!-- End Left Content -->

            <!-- Start Right Content -->
			
			
			<!-- End Right Content -->
			</div>
			</div>
        </div><!--/row-->   
        </div><!-- col-xs-12 -->     
    </div>
