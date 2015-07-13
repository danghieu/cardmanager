function updateCityListView() {
	if($(".general-body").length>0) {
		$.ajax("citieslistview", {			
			success: function(response){
				$(".general-body").html(response);			
			}
		});
	}
}

$(document).ready(function(){
	updateCityListView();
	ligenerallist=$('.li-city-list');
	ligenerallist.addClass('active');
	generaltools = $('.general-tools');

	$(".general-tools").on('click', '.li-city-list', function(event){
		event.preventDefault();
		generaltools.children().children().removeClass('active');
		$(this).addClass('active');
		updateCityListView();
	});
	
});
