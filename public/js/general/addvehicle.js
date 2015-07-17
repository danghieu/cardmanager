function addNewVehiclePost() {
	if($("div.general-body").length>0) {
		$.ajax("addnewvehicle", {
				type: "post",
				data: {"vehiclename":$("#vehiclename").val(),"_token":$('#addvehicle-form input[name=_token]').val()},
				success: function(response){
					$("div.general-body").html(response);
				}
		});
	}
}

$(document).ready(function(){
	
	 $('.btn-addvehicle').on('click',function(event)
	{
	  	// Stop form from submitting normally
	  	event.preventDefault();
	  	addNewVehiclePost();
	});
});
