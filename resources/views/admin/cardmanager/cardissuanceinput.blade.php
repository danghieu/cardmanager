<div id="cardinfo-input">
	<div class="container-fluid add-card">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel ">
				<div class="panel-body">
					@if (count($errors) > 0 )
						<div class="alert alert-danger">
							<strong>Lỗi!</strong><br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
				
							</ul>
						</div>
					@endif
					@if (isset($fail) )
						<div class="alert alert-danger">
							<strong>Lỗi!</strong><br><br>
							<ul>
								<li>{{$fail}}</li>
							</ul>
						</div>
					@endif
					<form id="cardissuance-input-form" class="form-horizontal" role="form" method="POST" action="{{ url('cardissuanceinput') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label class="col-md-4 control-label">Nhập Số Thẻ:</label>
							<div class="col-md-6">
								<input type="text" class="form-control" id="cardnumber" name="cardnumber" placeholder="Ví dụ: 6A DU T5 F6 G9" value="{{ $card->number or '' }}">
							</div>
							<div class="col-md-2">
								<button  class="btn btn-primary btn-cardissuanceget" style="margin-right: 15px;">
									Lấy Thẻ
								</button>
							</div>
						
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button  class="btn btn-bg btn-cardissuanceinput" style="margin-right: 15px;">
									Cấp Thẻ
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
	
</div>
<script src="{{Asset('js/cardissuanceinput.js')}}"></script>
<script type="text/javascript" src="{{Asset('/js/jquery-validate/jquery.validate.min.js')}}"></script>
<script src="{{Asset('js/check-card.js')}}"></script>
