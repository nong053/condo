$(document).ready(function(){
	
	$("#logout").click(function(){
		
		$.ajax({
			url:"Model/mSecurity.php",
			type:"post",
			dataType:"json",
			data:{"paramAction":"logoutAction"},
			success:function(data){
				if(data=="success"){
				alert("ออกจากระบบเรียบร้อย");
				window.location="index.php";
				}
			}
		});
		
		
	});
});