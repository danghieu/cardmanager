
function updateCardIssuanceViewPost() {

	if($("div.cardmanager-body").length>0) {
		$.ajax("cardissuanceview", {
				type: "post",
				data:$("#issuance-card-form").serialize(),
				success: function(response){
					$("div.cardmanager-body").html(response);
				}
		});
	}
}

$(document).ready(function(){
	$('.btn-add-infocard').on('click',function(event)
	{
	  	// Stop form from submitting normally
	  	event.preventDefault();
	  	updateCardIssuanceViewPost();
	  	$('.alert-success').hide();
	});

	
	
});