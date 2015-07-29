function updateCardListView() {
	if($(".cardmanager-body").length>0) {
		$.ajax("cardslistview", {			
			success: function(response){
				$(".cardmanager-body").html(response);			
			}
		});
	}
}

function updateAddCardView() {
	if($(".cardmanager-body").length>0) {
		$.ajax("addcardview", {			
			success: function(response){
				$(".cardmanager-body").html(response);			
			}
		});
	}
}

function updateCardIssuanceInput() {
	if($(".cardmanager-body").length>0) {
		$.ajax("cardissuanceinput", {			
			success: function(response){
				$(".cardmanager-body").html(response);			
			}
		});
	}
}
function updatecardinfoinput() {
	if($(".cardmanager-body").length>0) {
		$.ajax("cardinfoinput", {			
			success: function(response){
				$(".cardmanager-body").html(response);			
			}
		});
	}
}

$(document).ready(function(){
	updateCardListView();
	licardslist=$('.li-cardslist');
	licardslist.addClass('active');
	cardmanagertools = $('.cardmanager-tools');

	$(".cardmanager-tools").on('click', '.li-cardslist', function(event){
		event.preventDefault();
		cardmanagertools.children().children().removeClass('active');
		$(this).addClass('active');
		updateCardListView();
	});

	$(".cardmanager-tools").on('click', '.li-add-card', function(event){
		event.preventDefault();
		cardmanagertools.children().children().removeClass('active');
		$(this).addClass('active');
		updateAddCardView();
	});

	$(".cardmanager-tools").on('click', '.li-issuance-card', function(event){
		event.preventDefault();
		cardmanagertools.children().children().removeClass('active');
		$(this).addClass('active');
		updateCardIssuanceInput()
	});

	$(".cardmanager-tools").on('click', '.li-require', function(event){
		event.preventDefault();
		cardmanagertools.children().children().removeClass('active');
		$(this).addClass('active');
	});

	$(".cardmanager-tools").on('click', '.li-cardinfo', function(event){
		event.preventDefault();
		cardmanagertools.children().children().removeClass('active');
		$(this).addClass('active');
		updatecardinfoinput();

	});
	
});
