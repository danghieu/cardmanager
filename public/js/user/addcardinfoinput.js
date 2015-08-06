function updateAddCardInfoPost() {
	
	if($('.card-info-view').length>0) {
		$.ajax('addcardinfopost', {
				type: "post",
				data:$("#add-cardinfo-form").serialize(),
				success: function(response){
				updatecardinfo();
				updateCardInfoView()		
			}
		});
	}
}

$(document).ready(function(){
	//updateCardInfoView();
	
	$('.btn-add-cardinfo').on('click',function(event)
	{
	  	// Stop form from submitting normally
	  	event.preventDefault();
	  	updateAddCardInfoPost();
	});


});