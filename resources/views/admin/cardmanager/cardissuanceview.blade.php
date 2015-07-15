<div class="issuance-card ">
	<form id="issuance-card-form" class="form-horizontal" role="form" method="POST" action="{{ url('addcardview') }}">
		<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
	<div class="card">
		
			<div class="form-group">
				<label class="col-md-4 control-label">Số Thẻ:</label>
				<div class="col-md-4">
					<input type="text" class="form-control" id="cardnumber" name="cardnumber" placeholder="Ví dụ: 6A DU T5 F6 G9" value="{{Input::get('cardnumber')}}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label">Nơi Cấp:</label>
				<div class="col-md-4">
					<select class="form-control" id="place_issuance"  value="{{  Input::get('place_issuance')}}" name="place_issuance">
						@foreach ($city as $pi)
		                <option value="{{$pi->id}}">{{$pi->name}}</option>
		                @endforeach
		            </select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label">Ngày Cấp:</label>
				<div class="col-md-4">
					<input type="date" class="form-control" id="date_issuance" name="date_issuance" placeholder="" value=" {{ Input::get('date_issuance')}}" >
				</div>
			</div>
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
	
		<div class="container-fluid owner-info col-md-6">
			<div class="row">
				<div class="col-md-12 ">
					<div class="panel panel-default">
						<div class="panel-heading"><img class="addcardinfo-thumb" src="{{Asset('/img/owner.png')}}">Thông tin người sở hữu</div>
						<div class="panel-body">
								<div class="form-group">
									<label class="col-md-4 control-label">Họ và tên lót:</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="lastname" value="{{ Input::get('lastname') }}" placeholder="Nguyễn Văn">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label">Tên:</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="firstname" value="{{ Input::get('firstname') }}" placeholder="A">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label">CMND:</label>
									<div class="col-md-6">
										<input type="number" class="form-control" id="indentify_card"  value="{{ Input::get('indentify_card') }}" name="indentify_card" >
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label">Ngày Sinh:</label>
									<div class="col-md-6">
										<input type="date" class="form-control" id="birthday" name="birthday" placeholder="" value="{{Input::get('birthday') }}" >
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label">Điện Thoại:</label>
									<div class="col-md-6">
										<input type="number" class="form-control" id="phonenumber" value="{{ Input::get('phonenumber') }}"  name="phonenumber">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label">Địa chỉ:</label>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-md-offset-1 control-label">Thành Phố:</label>
									<div class="col-md-6">
										<select class="form-control" id="city"  value="{{ Input::get('city ')}}" name="city">
											@foreach ($city as $city)
							                <option value="{{$city->id}}">{{$city->name}}</option>
							                @endforeach
							            </select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-md-offset-1 control-label">Quận:</label>
									<div class="col-md-6">
										<input type="text" class="form-control" id="district"  name="district"  value="{{ Input::get('district')}}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-md-offset-1 control-label">Đường:</label>
									<div class="col-md-6">
										<input type="text" class="form-control" id="street"  name="street"  value="{{ Input::get('street') }}">
									</div>
								</div>
								
							
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid vehicle-info col-md-6">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading"><img class="addcardinfo-thumb" src="{{Asset('/img/vehicle.png')}}">Thông tin xe</div>
						<div class="panel-body">
								<div class="form-group">
									<label class="col-md-4 control-label">Loại Xe:</label>
									<div class="col-md-6">
										<select class="form-control" id="vehicle_type" name="vehicle_type">
											@foreach ($vehicle_type as $vt)
							                <option value="{{$vt->id}}">{{$vt->name}}</option>
							                @endforeach
							            </select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label">Nhãn Hiệu:</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="vehicle_brand" value="{{ Input::get('vehicle_brand') }}">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label">Số Khung:</label>
									<div class="col-md-6">
										<input type="number" class="form-control" name="vehicle_VIN" value="{{ Input::get('vehicle_VIN') }}">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label">Biển Số Xe:</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="vehicle_plates_number" value="{{ Input::get('vehicle_plates_number') }}">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label">Màu Sắc:</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="vehicle_color" value="{{ Input::get('vehicle_color') }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label">Dung Tích xi-lanh:</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="vehicle_cylinder_capacity" value="{{ Input::get('vehicle_cylinder_capacity') }}">
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>

			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<button type="submit" class="btn btn-bg btn-add-infocard">
						Đăng Kí
					</button>
				</div>
			</div>
	
	</form>

	
</div>
<script src="{{Asset('js/cardissuanceview.js')}}"></script>
<script type="text/javascript" src="{{Asset('/js/jquery-validate/jquery.validate.min.js')}}"></script>
<script src="{{Asset('js/check-card.js')}}"></script>