function cauhinhcity(citynumber) {
	if($(".general-body").length>0) {
		$.ajax("cauhinhcity", {		
			type: "get",	
			data: {"citynumber":citynumber},		
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
	  	var citynumber = $(this).siblings("#citynumber").val();
	  	cauhinhcity(citynumber);
		// cardmanagertools.children().children().removeClass('active');
		// $('.li-cardinfo').addClass('active');
	});
	
});