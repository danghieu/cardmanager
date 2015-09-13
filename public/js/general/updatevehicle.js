function updatevehicle(number,name,fee) {
	if($(".general-body").length>0) {
		$.ajax("vehicle", {		
			type: "get",	
			data: {"vehiclenumber":number, "vehiclename":name, "vehiclefee":fee },		
			success: function(response){
				$(".general-body").html(response);			
			}
		});
	}
}

$(document).ready(function(){
	$('.btn-update-city').on('click',function(event)
	{
	  	// Stop form from submitting normally
	  	event.preventDefault();
	  	var number = $("#vehiclenumber").val();
	  	var name = $("#vehiclename").val();
	  	var fee = $("#vehiclefee").val();
	  	updatevehicle(number,name,fee);
	});
	
});