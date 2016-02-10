$(document).ready(function(){
	
	$("table.gridSpecialPost").kendoGrid({
		//height: 550,
       // groupable: true,
        //sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
		scrollable: false,
	});
	
	//call main function click contract from start
	contactFormModalFn();
	//call main function click contract from end
	
	
	

	
	//click map start
	
	mapContactModalFn();
	//click map end
	
	//click gallery realty start
	
	imageSlideModalFn();
	//click gallery realty end
	/*
	$(".saveForLater").click(function(){
		alert("บันทึกประกาศเพื่อเก็บไว้ดูภายหลังเรียบร้อย");
	});
	*/
});

	