//start provine.
callProvince("","","","_rent");
//end provine.
/*
realty_id,article_id realty_name
1,2,บ้าน
2,3,คอนโด
3,4,ที่ดิน
4,5,ทาว์นเฮ้าส์&ทาว์นโฮม
5,6,อาคารพาณิชย์
6,7,อพาร์ตเมนต์
7,8,อาคารสำนักงาน
8,9,โรงงาน
9,10,หอพัก
10,11,โครงการใหม่
11,12,โรงแรม
12,13,เกสต์เฮ้าส์
13,14,รีสอร์ท&โฮมเสตย์
14,15,อสังหาริมทรัพย์อื่นๆ
18,16,ผู้รับเหมา
16,17,วัสดุก่อสร้าง
17,18,เฟอร์นิเจอร์
19,19,เครื่องมือเครื่องจักร
*/		
function mappingRealtIdToArticleId(realtId){
	var articleId="";
	if(realtId==1){
		articleId=2;
	}else if(realtId==2){
		articleId=3;
	}else if(realtId==3){
		articleId=4;
	}else if(realtId==4){
		articleId=5;
	}else if(realtId==5){
		articleId=6;
	}else if(realtId==6){
		articleId=7;
	}else if(realtId==7){
		articleId=8;
	}else if(realtId==8){
		articleId=9;
	}else if(realtId==9){
		articleId=10;
	}else if(realtId==10){
		articleId=11;
	}else if(realtId==11){
		articleId=12;
	}else if(realtId==12){
		articleId=13;
	}else if(realtId==13){
		articleId=14;
	}else if(realtId==14){
		articleId=15;
	}else if(realtId==18){
		articleId=16;
	}else if(realtId==16){
		articleId=17;
	}else if(realtId==17){
		articleId=18;
	}else if(realtId==19){
		articleId=19;
	}else{
		articleId=0;
	}
	return articleId;
	
}
		
$(document).ready(function(){
	
	//call line bts by search for rent
	callLineBTSRent();
	

	$(".mainMenuPostRent").click(function(){
		
		$(".mainMenuPostRent,.mainMenuPost").removeClass("btn-stackoverflow-inversed").css({"background":""});;
		$(this).addClass("btn-stackoverflow-inversed").css({"background":"orange"});
		$(".paramrtEmbed").remove();
		var paramEmbedPostId="<input type='hidden' value='"+this.id+"' name='embed_rt_id' id='embed_rt_id' class='paramrtEmbed'>";
		var paramEmbedPostName="<input type='hidden' value='"+$(this).text()+"' name='embed_rt_name' id='embed_rt_name' class='paramrtEmbed'>";
		$("#parameterEmbedAreaRent").html(paramEmbedPostId+""+paramEmbedPostName);
	});
	
	$("form#formSearchForRent").submit(function(){
		
		$(".realty_path_home").html("<a href='index.php?page=home'>หน้าแรก</a> ");
		$(".realty_path_type").html("<i class=\"fa fa-angle-double-right\"></i> "+"เช่า"+" <i class=\"fa fa-angle-double-right\"></i>");
		$(".realty_path_name").html($("#embed_rt_name").val());
		
		$.ajax({
			url:"post_detail.php",
			type:"post",
			dataType:"html",
			data:$(this).serialize(),
			success:function(data){
				$("#mainContrainArea").html(data);
				//call function callLineSubBTS start
				
				callLineSubBTS($("#rdg_line_rent_bts").val(),$("#rdg_bts").val());
				//call function callLineSubBTS end
			}
		});
		
		
		$(".paramEmbedPage").remove();
		$("body").append("<input type='hidden' id='paramEmbedPageID' class='paramEmbedPage' name='paramEmbedPageID' value='"+$("#embed_rt_id").val()+"'>");
		$("body").append("<input type='hidden' id='paramEmbedPageName' class='paramEmbedPage' name='paramEmbedPageName' value='"+$("#embed_rt_name").val()+"'>");
		
		if(($("#paramEmbedPageName").val()==undefined) ||  ($("#paramEmbedPageName").val()=='')){
			//$("#article_name").html("ทั่วไป");
			$("#articleByPageArea").empty();
		}else{ 
			$("#articleByPageArea").empty();
			//load article by page here start
			//alert(mappingRealtIdToArticleId($("#paramEmbedPageID").val()));
			$.ajax({
				url:"acticle/article.php",
				type:"post",
				dataType:"html",
				data:{"article_cat_id":mappingRealtIdToArticleId($("#paramEmbedPageID").val())},
				success:function(data){
					//alert(data);
					$("#articleByPageArea").html(data);
					
				}
			});
			//laod article by page here end
		}
		
		return false;
	});
	
	$("#fromSearchQuickRent").submit(function(){

		$.ajax({
			url:"post_detail.php",
			type:"post",
			dataType:"html",
			data:$(this).serialize(),
			success:function(data){
				$("#mainContrainArea").html(data);
			}
		});
		return false;
	});
	
	
	$("#btnSaveSearchRent").click(function(){
		//alert("btnSaveSearchRent");
		//console.log($("form#formSearchForRent").serialize());
		if($("#cus_id").val()!=""){
			$.ajax({
				url:"Model/mSaveSearch.php",
				type:"post",
				dataType:"html",
				data:$("form#formSearchForRent").serialize(),
				success:function(data){
					if(data="seccess"){
						alert("บันทึกการค้นหาเรียบร้อยแล้ว");
					}
				}
			});
		}else{
			alert("ท่านยังไม่ลงชื่อเข้าใช้งาน");
		}
		return false;
	});
	
	
	$("#infoToEmailRent").click(function(){
		if($("#cus_id").val()!=""){
			alert("แจ้งเตือนทาง E-mail เรียบร้อย");
		}else{
			alert("ท่านยังไม่ลงชื่อเข้าใช้งาน");
		}
		return false;
	});
	
	
});