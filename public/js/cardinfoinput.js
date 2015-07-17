
function cardinfoinput() {

	if($("div.cardmanager-body").length>0) {
		$.ajax("cardinfoinput", {
				type: "post",
				data:$("#cardinfo-input-form").serialize(),
				success: function(response){
					$("div.cardmanager-body").html(response);
				}
		});
	}
}
$(document).ready(function(){
	$('.btn-cardinfoinput').on('click',function(event)
	{
	  	// Stop form from submitting normally
	  	event.preventDefault();
	  	cardinfoinput();
	});

	
	
});