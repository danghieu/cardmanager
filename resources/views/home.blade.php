@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-2">
		<ul class="nav nav-pills nav-stacked">
       
        	<li><a class="cardmanager" href="#">Thông tin tài khoản</a></li>
	        <li><a href="#">Quản Lý Thẻ</a></li>
	        <li><a href="#">Lịch sử nạp - trừ tiền</a></li>
	        <li><a href="#">Thông tin sai phạm</a></li>
      </ul>
		</div>
		<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					You are logged in!
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
