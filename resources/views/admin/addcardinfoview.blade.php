<form id="form-add-infocard" name="form-add-infocard" class="form-horizontal" role="form" method="POST" action="/auth/register">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="container-fluid owner-info col-md-6">
		<div class="row">
			<div class="col-md-12 ">
				<div class="panel panel-default">
					<div class="panel-heading"><img class="addcardinfo-thumb" src="{{Asset('/img/owner.png')}}">Thông tin người sở hữu</div>
					<div class="panel-body">
							<div class="form-group">
								<label class="col-md-4 control-label">Họ và tên lót</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="lastname" value="{{ old('name') }}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Tên</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="firstname" value="{{ old('name') }}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">CMND</label>
								<div class="col-md-6">
									<input type="number" class="form-control" id="indentify_card"  name="indentify_card">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Điện Thoại</label>
								<div class="col-md-6">
									<input type="number" class="form-control" id="phonenumber"  name="phonenumber">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Địa chỉ:</label>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-md-offset-1 control-label">Thành Phố</label>
								<div class="col-md-6">
									<select class="form-control" id="city" name="city">
										@foreach ($city as $ct)
						                <option value="{{$ct->id}}">{{$ct->name}}</option>
						                @endforeach
						            </select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-md-offset-1 control-label">Quận</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="city"  name="city">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-md-offset-1 control-label">Đường</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="city"  name="city">
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
								<label class="col-md-4 control-label">Loại Xe</label>
								<div class="col-md-6">
									<select class="form-control" id="city" name="city">
										@foreach ($vehicle_type as $vt)
						                <option value="{{$vt->id}}">{{$vt->name}}</option>
						                @endforeach
						            </select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Nhãn Hiệu</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="carbrand" value="{{ old('carbrand') }}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Số Khung</label>
								<div class="col-md-6">
									<input type="number" class="form-control" name="carvin" value="{{ old('carvin') }}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Biển Số Xe</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="plates_number" value="{{ old('plates_number') }}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Màu Sắc</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="carcolor" value="{{ old('carcolor') }}">
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			<button type="submit" class="btn btn-bg">
				Đăng Kí
			</button>
		</div>
	</div>
</form>