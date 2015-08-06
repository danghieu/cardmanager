function updateCardInfoView() {
	
	if($('.li-card-info').length>0) {
		cardinfotool = $('.cardinfo-tool');
		cardinfotool.children().children().first().addClass("active");
		card_number = cardinfotool.children().children().first().data('cardnumber');

		$.ajax('cardinfoview', {
				
			data: { 'cardnumber': card_number },	
			success: function(response){
				$('.card-info-view').html(response).hide();
				$('.card-info-view').fadeIn(700);	

			}
		});
	}else{
		$.ajax('addcardinfo', {
				success: function(response){
				$('.card-info-view').html(response).hide();
				$('.card-info-view').fadeIn(700);			
			}
		});
	}
}
function updateAddCardInfo() {
	
	if($('.card-info-view').length>0) {
		$.ajax('addcardinfo', {
				success: function(response){
				$('.card-info-view').html(response).hide();	
				$('.card-info-view').fadeIn(700);		
			}
		});
	}
}

$(document).ready(function(){
	//updateCardInfoView();

	updateCardInfoView();
	$('.add-card-info').on('click',function(event)
	{
	  	// Stop form from submitting normally
	  	event.preventDefault();
	  	
	  	$(this).parent().children().removeClass('active'); 
		$(this).addClass('active'); 
	  	updateAddCardInfo();
	});


});