 <script>
  $(function() {
    $( "#date_issuance" ).datepicker();
    $( "#date_start" ).datepicker();
    $( "#expiry_date" ).datepicker();
    $( "#birthday" ).datepicker();
  });
  </script>
<div class="cardinfo">

	<form id="card-info-form" class="form-horizontal" role="form" method="POST" action="{{ url('cardinfoview') }}">
			<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
	
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
	<div class="col-md-12">
		<div class="container-fluid card-info col-md-6">
			<div class="row">
				<div class="col-md-12 ">
					<div class="panel panel-default">
						<div class="panel-heading"><img class="addcardinfo-thumb" src="{{Asset('/img/card.png')}}">Thông tin Thẻ</div>
						<div class="panel-body">
								<div class="form-group">
									<label class="col-md-4 control-label">Số Thẻ:</label>
									<div class="col-md-6">
										<input type="text" class="form-control" id="cardnumber" name="cardnumber" disabled placeholder="Ví dụ: 6A DU T5 F6 G9" value="{{ $card->number}}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label">Trạng Thái:</label>
									<div class="col-md-6">
										<select class="form-control" id="status" name="status">
											<option value="0" <?php if($card->status==0) echo "selected='selected'" ?>><span class="span-primary">Chưa cấp</span></option>
							                <option value="1" <?php if($card->status==1) echo "selected='selected'" ?>><span class="span-success">Hoạt động</span></option>
							               	<option value="2" <?php if($card->status==2) echo "selected='selected'" ?>><span class="span-block">Khóa</span></option>
							            </select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label">Nơi Cấp:</label>
									<div class="col-md-6">
										<select class="form-control" id="place_issuance"  value="{{ $card->place_issuance}}" name="place_issuance">
											@foreach ($city as $pi)
							                <option value="{{$pi->id}}" <?php if($card->place_issuance==$pi->id) echo "selected='selected'" ?>>{{$pi->name}}</option>
							                @endforeach
							            </select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label">Ngày Cấp:</label>
									<div class="col-md-6">
										<input type="text" class="form-control" id="date_issuance" name="date_issuance" value="{{ date('d/m/Y', strtotime($card->date_issuance)) }}" >
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid budget-info col-md-6">
			<div class="row">
				<div class="col-md-12 ">
					<div class="panel panel-default">
						<div class="panel-heading"><img class="addcardinfo-thumb" src="{{Asset('/img/Wallet.png')}}">Thông tin Tài Khoản</div>
						<div class="panel-body">
								<div class="form-group">
									<label class="col-md-4 control-label">Số Tài Khoản:</label>
									<div class="col-md-6">
										<input type="text" class="form-control" id="cardbudgetnumber" name="cardbudgetnumber" placeholder="Ví dụ: 6A DU T5 F6 G9" value="{{ $card->CardBudget->card_budget_number }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label">Số Lượt:</label>
									<div class="col-md-6">
										<input type="number" class="form-control" id="turnnumber" name="turnnumber" placeholder="Ví dụ: 6A DU T5 F6 G9" value="{{ $card->CardBudget->turn_number}}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label">Ngày Bắt Đầu:</label>
									<div class="col-md-6">
										<input type="text" class="form-control" id="date_start" name="date_start" placeholder="" value=" {{ date('d/m/Y', strtotime($card->PrePay->first()->start_date))  }}" >
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label">Ngày Hết Hạn:</label>
									<div class="col-md-6">
										<input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="" value=" {{ date('d/m/Y', strtotime($card->PrePay->first()->expiry_date)) }}" >
									</div>
									<div class="col-md-2"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">...</button></div>
								</div>	
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>	


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Thông Tin Tài Khoản</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
			<label class="col-md-4 control-label">Số Tài Khoản:</label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="cardbudgetnumber" name="cardbudgetnumber" placeholder="Ví dụ: 6A DU T5 F6 G9" value="{{ $card->CardBudget->card_budget_number }}">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label">Số Lượt:</label>
			<div class="col-md-6">
				<input type="number" class="form-control" id="turnnumber" name="turnnumber" placeholder="Ví dụ: 6A DU T5 F6 G9" value="{{ $card->CardBudget->turn_number}}">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label">Các Ngày Đã Thanh Toán:</label>
		</div>
		@foreach($card->PrePay->all() as $prepay)
		<div class="form-group">
			<label class="col-md-4 control-label">*:</label>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label">Ngày Bắt Đầu:</label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="date_start" name="date_start" placeholder="" value=" {{ date('d/m/Y', strtotime($prepay->start_date))  }}" >
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label">Ngày Hết Hạn:</label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="" value=" {{ date('d/m/Y', strtotime($prepay->expiry_date)) }}" >
			</div>
		</div>
		@endforeach	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
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
											<input type="text" class="form-control" name="lastname" value="{{ $card->ownerInfo->last_name or '' }}" placeholder="Nguyễn Văn">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">Tên:</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="firstname" value="{{ $card->ownerInfo->first_name  or '' }}" placeholder="A">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">CMND:</label>
										<div class="col-md-6">
											<input type="number" class="form-control" id="indentify_card"  value="{{ $card->ownerInfo->indentify_card  or ''}}" name="indentify_card" >
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">Ngày Sinh:</label>
										<div class="col-md-6">
											<input type="text" class="form-control" id="birthday" name="birthday" placeholder="" value="{{ date('d/m/Y', strtotime($card->ownerInfo->birthday)) }}" >
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">Điện Thoại:</label>
										<div class="col-md-6">
											<input type="number" class="form-control" id="phonenumber" value="{{ $card->ownerInfo->phone_number or ''}}"  name="phonenumber">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">Địa chỉ:</label>
									</div>
									<div class="form-group">
										<label class="col-md-3 col-md-offset-1 control-label">Thành Phố:</label>
										<div class="col-md-6">
											<select class="form-control" id="city" name="city">
												@foreach ($city as $ct)
								                <option value="{{$ct->id}}"<?php if( $card->ownerInfo->city==$ct->id) echo "selected='selected'" ?>>{{$ct->name}}</option>
								                @endforeach
								            </select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 col-md-offset-1 control-label">Quận:</label>
										<div class="col-md-6">
											<input type="text" class="form-control" id="district"  name="district"  value="{{ $card->ownerInfo->district or ''}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 col-md-offset-1 control-label">Đường:</label>
										<div class="col-md-6">
											<input type="text" class="form-control" id="street"  name="street"  value="{{ $card->ownerInfo->street or ''}}">
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
											<select class="form-control" id="vehicle_type" name="vehicle_type" >
												@foreach ($vehicle_type as $vt)
								                <option value="{{$vt->id}}" <?php if( $card->vehicleInfo->vehicle_type==$vt->id) echo "selected='selected'" ?>>{{$vt->name}}</option>
								                @endforeach
								            </select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">Nhãn Hiệu:</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="vehicle_brand" value="{{ $card->vehicleInfo->brand or ''}}">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">Số Khung:</label>
										<div class="col-md-6">
											<input type="number" class="form-control" name="vehicle_VIN" value="{{ $card->vehicleInfo->VIN or ''}}">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">Biển Số Xe:</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="vehicle_plates_number" value="{{ $card->vehicleInfo->plates_number or ''}}">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">Màu Sắc:</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="vehicle_color" value="{{ $card->vehicleInfo->color or ''}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Dung Tích xi-lanh:</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="vehicle_cylinder_capacity" value="{{ $card->vehicleInfo->cylinder_capacity or ''}}">
										</div>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-bg btn-edit-infocard">
							Chỉnh Sửa
						</button>
					</div>
				</div>
		
		</form>
	
	
</div>

<script src="{{Asset('js/cardissuanceview.js')}}"></script>
<script type="text/javascript" src="{{Asset('/js/jquery-validate/jquery.validate.min.js')}}"></script>
<script src="{{Asset('js/check-card.js')}}"></script>
