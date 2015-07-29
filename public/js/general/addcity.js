function addNewCityPost() {
	if($("div.general-body").length>0) {
		$.ajax("addnewcity", {
				type: "post",
				data: {"cityname":$("#cityname").val(),"_token":$('#addcity-form input[name=_token]').val()},
				success: function(response){
					$("div.general-body").html(response);
				}
		});
	}
}

$(document).ready(function(){
	
	 $('.btn-addcity').on('click',function(event)
	{
	  	// Stop form from submitting normally
	  	event.preventDefault();
	  	addNewCityPost();
	});
});
