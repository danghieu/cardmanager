<div class="panel-heading">Thông tin Thẻ</div>

	<div class="panel-body">
		
		<div class="cardinfo-tool">
			<ul class="nav nav-tabs">
				@foreach(Auth::user()->Card->all() as $card)
				<li class="li-card-info" data-cardnumber="{{$card->number}}"
					onclick="
						$(this).parent().children().removeClass('active'); 
						$(this).addClass('active'); 
						if($('.card-info-view').length>0) {

							$.ajax('cardinfoview', {
									
								data: { 'cardnumber': {{$card->number}} },	
								success: function(response){
									$('.card-info-view').html(response).hide();
									$('.card-info-view').fadeIn(700)	;		
								}
							});
						}
					">
					<a href="#" >BSX:[{{$card->vehicleInfo->plates_number}}]</a>
				</li>
				@endforeach
				<li class="add-card-info">
					<a href=""><img class="ico-add-card-info"src="{{Asset('img/add_card_info.png')}}"></a>
				</li>
			</ul>
		</div>
		<div class="card-info-view">
			
		</div>

	</div>
</script>
<script src="{{Asset('js/user/cardinfo.js')}}"></script>
