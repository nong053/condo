<style>
.link-list a{
 color:black;
}
.headline h2 {
    font-size: 16px;
}
</style>

<div style="margin-bottom: 5px;" class="panel panel-u">
         <div class="panel-heading">
         <h3 class="panel-title"><i class="fa fa-tasks"></i> แผนผังเว็บไซต์</h3>
         </div>
         <div class="panel-body">
                    <!-- content start -->
                    
                    <?php 
                    if($conn){
                    	$strSQLAbout="select * from article where article_id=35 and article_show='show'";
                    	$resultAbout=mysql_query($strSQLAbout);
                    	$rsAbout=mysql_fetch_array($resultAbout);
                    	echo $rsAbout['article_detail'];
                    }
					include 'link_site_map.php';
					?>
                    <!-- content end -->       	
		</div>
      </div>
      
