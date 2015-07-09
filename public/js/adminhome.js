function updateCardMananger() {
	if($(".panel").length>0) {
		$.ajax("admincardmananger", {			
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

	
});
