function updateListView() {
	if($(".general-body").length>0) {
		$.ajax("userlistview", {			
			success: function(response){
				$(".general-body").html(response);			
			}
		});
	}
}

$(document).ready(function(){
	updateListView();
	ligenerallist=$('.li-user-list');
	ligenerallist.addClass('active');
	generaltools = $('.general-tools');

	$(".general-tools").on('click', '.li-user-list', function(event){
		event.preventDefault();
		generaltools.children().children().removeClass('active');
		$(this).addClass('active');
		updateListView();
	});

	
});
