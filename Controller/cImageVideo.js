
//var rdg_id=14;	
var rdg_id=$("#paramEmbedRdgId").val();	
var imageVideoFn=function(rdg_id){
		
		//set file button
		$(".buttonText").text('เลือกรูปภาพ');
		
		$('#btnUploadPicture').on('click', function() {
		    var file_data = $('#picture_file').prop('files')[0];   
		    var form_data = new FormData();                  
		    form_data.append('picture_file', file_data);
		    form_data.append('rdg_id', rdg_id);
		    form_data.append('action', "addPicture");
		   // console.log(form_data);                             
		    $.ajax({
		                url: '../Model/mImageVideo.php', // point to server-side PHP script 
		                dataType: 'json',  // what to expect back from the PHP script, if anything
		                cache: false,
		                contentType: false,
		                processData: false,
		                data: form_data,                         
		                type: 'post',
		                success: function(data){
		                    console.log(data); // display response from the PHP script, if any
		                    if(data=="picture_empty"){
		                    	alert("เลือกรูปภาพก่อนค่ะ");
		                    }else if(data=="success"){
		                    	alert("บันทึกรูปภาพสำเร็จ");
		                    	$("span.badge").remove();
		                    	showPictureFn();
		                    }
		                }
		     });
		    return false;
		});


	};
	var showPictureFn=function(){
		$.ajax({
			url:"../Model/mImageVideo.php",
			type:"post",
			dataType:"html",
			data:{"paramAction":"showPicture","rdg_id":rdg_id},
			success:function(data){
				
				$("#showAllPictureArea").html(data);
				$(".setFirst").click(function(){
					//alert(this.id);
					var ri_id=this.id;
					ri_id=ri_id.split("-");
					ri_id=ri_id[1];
					//call setFirstFn function.
					setFirstFn(rdg_id,ri_id);
					return false;
				});
				
				$(".delPicture").click(function(){
					//alert(this.id);
					var ri_id=this.id;
					ri_id=ri_id.split("-");
					ri_id=ri_id[1];
					//call setFirstFn function.
					if(confirm("ยืนยันการลบรูปนี้!")){
						delPictureFn(rdg_id,ri_id);
						showPictureFn();
					}
					
					return false;
				});
				
			}
		});
	}
	showPictureFn();
	
	var setFirstFn = function(rdg_id,ri_id){
		$.ajax({
			url:"../Model/mImageVideo.php",
			type:"post",
			dataType:"json",
			data:{"paramAction":"setFirst","rdg_id":rdg_id,"ri_id":ri_id},
			success:function(data){
				if(data=="success"){
					alert("ตั้งเป็นรูปหน้าปกเรียบร้อย");
					showPictureFn();
				}
			}
		});
			
	}
	var delPictureFn = function(rdg_id,ri_id){
		$.ajax({
			url:"../Model/mImageVideo.php",
			type:"post",
			dataType:"json",
			data:{"paramAction":"delPicture","rdg_id":rdg_id,"ri_id":ri_id},
			success:function(data){
				if(data=="success"){
					//alert("ลบรูปภาพเรียบร้อยแล้ว");
					showPictureFn();
				}
			}
		});
	}
	$("#saveStep3").click(function(){
		var rev_embed_code=$("#rev_embed_code").val();
		
		$.ajax({
			url:"../Model/mImageVideo.php",
			type:"post",
			dataType:"json",
			data:{"paramAction":"saveEmbedVdo","rdg_id":rdg_id,"rev_embed_code":rev_embed_code},
			success:function(data){
				if(data=="success"){
					alert("บันทึกข้อมูลเรียบร้อย");
					//showPictureFn();
				}
			}
		});
		
	});
	
	var showEmbedCodeFn=function(){
		$.ajax({
			url:"../Model/mImageVideo.php",
			type:"post",
			dataType:"html",
			data:{"paramAction":"showEmbedVdo","rdg_id":rdg_id},
			success:function(data){
				
				$("#rev_embed_code").val(data);
			}
		});
	}
	showEmbedCodeFn();

