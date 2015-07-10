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
					@if (isset($success) )
						<div class="alert alert-success">
							<strong>Thành Công!</strong><br><br>
							<ul>
								<li>{{$success}}</li>
							</ul>
						</div>
					@endif


					<form id="addcard-form" class="form-horizontal" role="form" method="POST" action="{{ url('addcardview') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label class="col-md-4 control-label">Số Thẻ:</label>
							<div class="col-md-6">
								<input type="text" class="form-control" id="cardnumber" name="cardnumber" placeholder="Ví dụ: 6A DU T5 F6 G9" value="{{ old('card') }}">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button  class="btn btn-bg btn-addcard" style="margin-right: 15px;">
									Nhập
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="{{Asset('js/addcard.js')}}"></script>