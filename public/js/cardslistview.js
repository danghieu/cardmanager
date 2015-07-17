function updateCardList(type) {
	if(type==null) type= "all";
	if($(".cardlist").length>0) {
		$.ajax("cardslist", {
			type: "get",
			data: {"type":type},			
			success: function(response){
				$(".cardlist").html(response);			
			}
		});
	}
}
function updateCardListPost() {
	if($(".cardlist").length>0) {
		$.ajax("cardslist", {
				type: "post",
				data: {"q":$("#q").val(),"_token":$('.form-search input[name=_token]').val()},
				success: function(response){
					$(".cardlist").html(response);
				}
		});
	}
}

$(document).ready(function(){
	updateCardList(null);

	$("#q").keyup(function() {
		updateCardListPost();
	});

	$( "select" )
  	.change(function () {
    $( "select option:selected" ).each(function() {
     	updateCardList( parseInt($(this).val()));
    });
    
  })
  .change();

});
