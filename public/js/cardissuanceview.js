
function updateCardIssuanceViewPost() {

	if($("div.cardmanager-body").length>0) {
		$.ajax("cardissuanceview", {
				type: "post",
				data: {"cardnumber":$("#cardnumber").val(),"_token":$('#issuance-card-form input[name=_token]').val()},
				success: function(response){
					$("div.cardmanager-body").html(response);
					if($("div.alert-success").length>0) {
						$('.btn-checkcard').hide();
						$("#cardnumber").prop('disabled', true);
						addCardInfoView();
					}
				}
		});
	}
}
function addCardInfoView() {
	if($(".owner-info").length>0) {
		$.ajax("addcardinfoview", {			
			success: function(response){
				$(".owner-info").html(response);			
			}
		});
	}
}
$(document).ready(function(){

	 $('.btn-checkcard').on('click',function(e)
	{
	  	// Stop form from submitting normally
	  	event.preventDefault();

	  	updateCardIssuanceViewPost();
	});

	
});