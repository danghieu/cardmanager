@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-2">
		<ul class="nav nav-pills nav-stacked">        	
	        <li><a class="card-info" href="#">Thông Tin Thẻ</a></li>
	        <li><a class="budget" href="#">Thanh Toán</a></li>
	        <li><a class="violations-info" href="#">Thông tin sai phạm</a></li>
	        <li><a class="user-info" href="#">Thông tin tài khoản</a></li>
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
<script src="{{Asset('js/home.js')}}"></script>
@endsection
