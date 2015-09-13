function updatecity(citynumber,cityname) {
	if($(".general-body").length>0) {
		$.ajax("citieslistview", {		
			type: "get",	
			data: {"citynumber":citynumber, "cityname": cityname},		
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
	  	var citynumber = $("#citynumber").val();
	  	var cityname = $("#cityname").val();
	  	updatecity(citynumber,cityname);
		// cardmanagertools.children().children().removeClass('active');
		// $('.li-cardinfo').addClass('active');
	});
	
});