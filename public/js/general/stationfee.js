function updateStationFeeList() {
//	if(type==null) type= "all";
//	city = document.getElementById('q').value;
	if($(".stationfeelist").length>0) {
		$.ajax("stationfeelist", {
			type: "get",
//			data: {"type":type},	
//			data: {"q":city},		
			success: function(response){
				$(".stationfeelist").html(response);			
			}
		});
	}
}

$(document).ready(function(){
	updateStationFeeList();
	
});