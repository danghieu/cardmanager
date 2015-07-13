function updateCitiesList(type) {
//	if(type==null) type= "all";
	city = document.getElementById('q').value;
	if($(".citieslist").length>0) {
		$.ajax("citieslist", {
			type: "get",
//			data: {"type":type},	
			data: {"q":city},		
			success: function(response){
				$(".citieslist").html(response);			
			}
		});
	}
}

$(document).ready(function(){
	updateCitiesList(null);
	$(".input-group-btn").on('click', function(event){
		event.preventDefault();
		updateCitiesList(null);
	});
});
