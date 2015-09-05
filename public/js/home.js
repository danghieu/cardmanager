function updatecardinfo() {
	if($(".panel").length>0) {
		$.ajax("cardinfo", {			
			success: function(response){
				$(".panel").html(response).hide();	
				$(".panel").fadeIn(700);	
			}
		});
	}
}
function updatepayment() {
	if($(".panel").length>0) {
		$.ajax("payment", {			
			success: function(response){
				$(".panel").html(response).hide();	
				$(".panel").fadeIn(700);	
			}
		});
	}
}
$(document).ready(function(){

	$("div.container").on('click', '.card-info', function(event){
		$('li').removeClass('active');
		$(this).parent().addClass('active');
		event.preventDefault();
		updatecardinfo();
	});

	$("div.container").on('click', '.payment', function(event){
		$('li').removeClass('active');
		$(this).parent().addClass('active');
		event.preventDefault();
		updatepayment();
		
	});
	$("div.container").on('click', '.violations-info', function(event){
		$('li').removeClass('active');
		$(this).parent().addClass('active');
		event.preventDefault();
		
	});
	$("div.container").on('click', '.user-info', function(event){
		$('li').removeClass('active');
		$(this).parent().addClass('active');
		event.preventDefault();
		
	});
});
