
<div class="issuance-card">
	<div class="card">
		<form id="issuance-card-form" class="form-horizontal" role="form" method="POST" action="{{ url('addcardview') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<label class="col-md-4 control-label">Số Thẻ:</label>
				<div class="col-md-6">
					<input type="text" class="form-control" id="cardnumber" name="cardnumber" placeholder="Ví dụ: 6A DU T5 F6 G9" value="{{$input or ''}}">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<button  class="btn btn-bg btn-checkcard" style="margin-right: 15px;">
						Nhập
					</button>
				</div>
			</div>
		</form>
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
				<strong>Thẻ Không Hợp Lệ!</strong><br><br>
				<ul>
					<li>{{$fail}}</li>
				</ul>
			</div>
		@endif
		@if (isset($success) )
			<div class="alert alert-success">
				<strong>Thẻ Hợp Lệ!</strong><br><br>
				<ul>
					<li>{{$success}}</li>
				</ul>
			</div>
		@endif
	</div>
	<div class="owner-info">
		
	</div>
</div>
<script src="{{Asset('js/cardissuanceview.js')}}"></script>