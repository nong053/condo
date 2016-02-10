

        <div class="container" style="margin-top:5px;">
        	<div class='row'>
                    <div class="col-xs-12 shadow-wrapper">
                        <div class="tag-box tag-box-v2 box-shadow shadow-effect-1">
                            
                           
 <!-- search start here-->
                                <div class="col-xs-6" style="padding-right:5px;">
            
                                    <!-- tab1-->
                                   <div class="tab-v1">
                                            <ul class="nav nav-tabs">
                                                 <!--
                                                <li class="active"><a data-toggle="tab" href="#seachSalesRealty"> 
												<i class="fa fa-search-plus"></i> ค้นหาประกาศขายฟรี</a></li>
                                               <li class=""><a data-toggle="tab" href="#searchSalesContractor">ค้นหาประกาศขายสำหรับผู้หรับเหมา</a></li>-->
                                            </ul>                
                                            <div class="tab-content">
                                            <!-- seachSalesRealty-->
                                                <div id="seachSalesRealty" class="tab-pane fade in active">
                                                    <div class="row">


                                                        <?php
                                                        include("searchForSalesRealty.php");
                                                        ?>

                                                       


                                                    </div>
                                                </div>

                                                <!-- seachSalesRealty-->
                                                <!-- searchSalesContractor-->
                                                   <div id="searchSalesContractor" class="tab-pane fade in ">
                                                        <div class="row">



                                                            <?php
                                                            include("searchForSalesContractor.php");
                                                            ?>


                                                    </div>
                                                   </div>
                                                  <!-- searchSalesContractor-->


                                                
                                            </div>
                                        </div>
                                    <!-- tab1-->


                                   </div>
                                   <div class="col-xs-6" style="padding-left:5px;">
                                   <!-- tab1-->
                                   <div class="tab-v1">
                                            <ul class="nav nav-tabs">
                                                <!--
                                                <li class="active"><a data-toggle="tab" href="#seachRentRealty">
												<i class="fa fa-search-plus"></i>
												ค้นหาประกาศเช่าฟรี</a></li>
												
                                                 <li class=""><a data-toggle="tab" href="#searchRentContractor">ค้นหาประกาศเช่าสำหรับผู้หรับเหมา</a></li>
												 -->
                                            </ul>                
                                            <div class="tab-content">
                                            <!-- seachSalesRealty-->
                                                <div id="seachRentRealty" class="tab-pane fade in active">
                                                    <div class="row">


                                                        <?php
                                                        include("searchForRentRealty.php");
                                                        ?>

                                                       


                                                    </div>
                                                </div>

                                                <!-- seachSalesRealty-->
                                                <!-- searchSalesContractor-->
                                                   <div id="searchRentContractor" class="tab-pane fade in ">
                                                        <div class="row">



                                                            <?php
                                                            include("searchForRentContractor.php");
                                                            ?>


                                                    </div>
                                                   </div>
                                                  <!-- searchSalesContractor-->


                                                
                                            </div>
                                        </div>
                                    <!-- tab1-->
                                   </div>
                                   <br style="clear:both">
                            <!-- search end here -->



                        </div>
                    </div>
                    
        </div>