function updateCardList(type) {
	if(type==null) type= "all";
	if($(".cardlist").length>0) {
		$.ajax("cardslist", {
			type: "get",
			data: {"type":type},			
			success: function(response){
				$(".cardlist").html(response);			
			}
		});
	}
}
function updateCardListPost() {
	if($(".cardlist").length>0) {
		$.ajax("cardslist", {
				type: "post",
				data: {"q":$("#q").val(),"_token":$('.form-search input[name=_token]').val()},
				success: function(response){
					$(".cardlist").html(response);
				}
		});
	}
}
function editInfoCardView(cardnumber) {
	if($("div.cardmanager-body").length>0) {
		$.ajax("cardinfoinput", {
				type: "post",
				data: {"cardnumber":cardnumber,"_token":$('#edit-info-card-form input[name=_token]').val()},
				success: function(response){
					$("div.cardmanager-body").html(response);
				}
		});
	}
}

$(document).ready(function(){
	updateCardList(null);
	cardmanagertools = $('.cardmanager-tools');
	$("#q").keyup(function() {
		updateCardListPost();
	});

	$( "select" ).change(function () {
	    $( "select option:selected" ).each(function() {
	     	updateCardList( parseInt($(this).val()));
	    });
    
  	}).change();

	$(".cardlist").on('click', '.btn-edit-info-card', function(event)
	{
	  	// Stop form from submitting normally
	  	event.preventDefault();
	  	var cardnumber = $(this).siblings("#cardnumber").val();
	  	editInfoCardView(cardnumber);
		cardmanagertools.children().children().removeClass('active');
		$('.li-cardinfo').addClass('active');
	});

});
