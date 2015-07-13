function updateCardMananger() {
	if($(".panel").length>0) {
		$.ajax("admincardmananger", {			
			success: function(response){
				$(".panel").html(response);		
			}
		});
	}
}

function updateGeneral() {
	if($(".panel").length>0) {
		$.ajax("admingeneral", {
			success: function(response){
				$(".panel").html(response);
			}
		});
	}
}

$(document).ready(function(){

	$("div.container").on('click', '.cardmanager', function(event){
		event.preventDefault();
		updateCardMananger();
	});

	$("div.container").on('click', '.general', function(event){
		event.preventDefault();
		updateGeneral();
	});
});
