function updatepaymentInfo() {
	
	if($('.payment-info').length>0) {
		$.ajax('paymentinfo', {
			success: function(response){
				$('.payment-info').html(response).hide();
				$('.payment-info').fadeIn(700);	
					
			}
		});
	}
}

$(document).ready(function(){
	//updateCardInfoView();
	
	$('.li-payment-info').on('click',function(event)
	{
	  	// Stop form from submitting normally
	  	event.preventDefault();
	  	updatepaymentInfo();
	});


});