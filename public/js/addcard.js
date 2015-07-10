function updateAddCardViewPost() {
	if($("div.cardmanager-body").length>0) {
		$.ajax("addcardview", {
				type: "post",
				data: {"cardnumber":$("#cardnumber").val(),"_token":$('#addcard-form input[name=_token]').val()},
				success: function(response){
					$("div.cardmanager-body").html(response);
				}
		});
	}
}

$(document).ready(function(){
	
	 $('.btn-addcard').on('click',function(e)
	{
	  	// Stop form from submitting normally
	  	event.preventDefault();

	  	updateAddCardViewPost();
	});
});
