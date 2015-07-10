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


$(document).ready(function(){
	updateCardList(null);

	 $( "select" )
  	.change(function () {
    $( "select option:selected" ).each(function() {
     	updateCardList( parseInt($(this).val()));
    });
    
  })
  .change();

});
