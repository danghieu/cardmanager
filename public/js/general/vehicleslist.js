function cauhinhvehicle(vehiclenumber) {
	if($(".general-body").length>0) {
		$.ajax("cauhinhvehicle", {		
			type: "get",	
			data: {"vehiclenumber":vehiclenumber},		
			success: function(response){
				$(".general-body").html(response);			
			}
		});
	}
}

$(document).ready(function(){
	$('.btn-cauhinh').on('click',function(event)
	{
	  	// Stop form from submitting normally
	  	event.preventDefault();
	  	var vehiclenumber = $(this).siblings("#vehiclenumber").val();
	  	cauhinhvehicle(vehiclenumber);
		// cardmanagertools.children().children().removeClass('active');
		// $('.li-cardinfo').addClass('active');
	});
	
});