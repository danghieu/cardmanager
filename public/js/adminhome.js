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
		$('li').removeClass('active');
		$(this).parent().addClass('active');
		event.preventDefault();
		updateCardMananger();
	});

	$("div.container").on('click', '.general', function(event){
		$('li').removeClass('active');
		$(this).parent().addClass('active');
		event.preventDefault();
		updateGeneral();
	});
});
