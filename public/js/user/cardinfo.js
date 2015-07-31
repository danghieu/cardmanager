function myFunction() {
	$(this).addClass('active');
	// if($(".cardmanager-body").length>0) {
	// 	$.ajax("cardslistview", {			
	// 		success: function(response){
	// 			$(".cardmanager-body").html(response);			
	// 		}
	// 	});
	// }
}
$(document).ready(function(){
	//updateCardInfoView();
	cardinfotool = $('.cardinfo-tool');
	cardinfotool.children().children().first().addClass("active");
});