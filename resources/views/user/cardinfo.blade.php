<div class="panel-heading">Thông tin Thẻ</div>

	<div class="panel-body">
		
		<div class="cardinfo-tool">
			<ul class="nav nav-tabs">
				@foreach(Auth::user()->Card->all() as $card)
				<li class="li-card-info" id="{{$card->number}}"
					onclick="
						$(this).parent().children().removeClass('active'); 
						$(this).addClass('active'); 
						if($('.card-info-view').length>0) {

							$.ajax('cardinfoview', {
									
								data: { 'cardnumber': {{$card->number}} },	
								success: function(response){
									$('.card-info-view').html(response);			
								}
							});
						}
					">
					<a href="#" >{{$card->vehicleInfo->plates_number}}</a>
				</li>
				@endforeach
			</ul>
		</div>
		<div class="card-info-view">
			
		</div>

	</div>
</script>
<script src="{{Asset('js/user/cardinfo.js')}}"></script>
