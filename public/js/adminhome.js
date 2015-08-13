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

	$("body").on('click', '.cardmanager', function(event){
	// $("div.container").on('click', '.cardmanager', function(event){
		$('li').removeClass('active');
		$(this).parent().addClass('active');
		event.preventDefault();
		updateCardMananger();
	});

	$("body").on('click', '.general', function(event){
	//$("div.container").on('click', '.general', function(event){
		$('li').removeClass('active');
		$(this).parent().addClass('active');
		event.preventDefault();
		updateGeneral();
	});
});
