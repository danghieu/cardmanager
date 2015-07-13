@extends('app')

@section('content')
<script src="{{Asset('/js/adminhome.js')}}"></script>

<div class="container">
	<div class="row">
		<div class="col-md-2">
		<ul class="nav nav-pills nav-stacked">
       
        	<li><a class="cardmanager" href="#">Quản Lý Thẻ</a></li>
	        <li><a href="#">Quản Lý Trạm</a></li>
	        <li><a href="#">Quản Lý Sai Phạm</a></li>
	        <li><a href="#">Quản Lý Người Dùng</a></li>
	        <li><a class="general" href="#">Quản Lý Mục Chung</a></li>
      </ul>
		</div>
		<div class="col-md-10">
			<div class="panel panel-default">
				
					You are admin!
				
			</div>
		</div>
	</div>
</div>
@endsection
 