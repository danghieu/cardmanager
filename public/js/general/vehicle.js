function updateList(type) {
//	if(type==null) type= "all";
//	city = document.getElementById('q').value;
	if($(".vehiclelist").length>0) {
		$.ajax("vehiclelist", {
			type: "get",
//			data: {"type":type},	
//			data: {"q":city},		
			success: function(response){
				$(".vehiclelist").html(response);			
			}
		});
	}
}
function addnewVehicle(){

	if($(".addnewvehicle").length>0) {
		$.ajax("addnewvehicle", {			
			success: function(response){
				$(".addnewvehicle").html(response);			
			}
		});
	}
}
$(document).ready(function(){
	updateList(null);
	addnewVehicle();
	// $(".input-group-btn").on('click', function(event){
	// 	event.preventDefault();
	// 	updateList(null);
	// });
});