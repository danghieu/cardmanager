
function editInfoCard() {

	if($("div.cardmanager-body").length>0) {
		$.ajax("editinfocard", {
				type: "post",
				data:$("#card-info-form").serialize(),
				success: function(response){
					$("div.cardmanager-body").html(response);
				}
		});
	}
}

$(document).ready(function(){
	$('.btn-edit-infocard').on('click',function(event)
	{
	  	// Stop form from submitting normally
	  	event.preventDefault();
	  	editInfoCard();
	});

	
	
});