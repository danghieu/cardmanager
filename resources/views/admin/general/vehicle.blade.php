<div class="container-fluid add-vehicle">
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

                    <div class="addnewvehicle">
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<div class="vehiclelist">
	
</div>

<script src="{{Asset('js/general/vehicle.js')}}"></script>