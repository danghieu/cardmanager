function cardissuanceinput() {

	if($("div.cardmanager-body").length>0) {
		$.ajax("cardissuanceinput", {
				type: "post",
				data:$("#cardissuance-input-form").serialize(),
				success: function(response){
					$("div.cardmanager-body").html(response);
				}
		});
	}
}
function cardissuanceget() {

	if($("div.cardmanager-body").length>0) {
		$.ajax("getcardissuance", {
				type: "post",
				data:$("#cardissuance-input-form").serialize(),
				success: function(response){
					$("div.cardmanager-body").html(response);
				}
		});
	}
}
$(document).ready(function(){
	$('.btn-cardissuanceinput').on('click',function(event)
	{
	  	// Stop form from submitting normally
	  	event.preventDefault();
	  	cardissuanceinput();
	});

	$('.btn-cardissuanceget').on('click',function(event)
	{
	  	// Stop form from submitting normally
	  	event.preventDefault();
	  	cardissuanceget();
	});
	
	
});