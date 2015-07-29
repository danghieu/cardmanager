<div class="container-fluid add-city">
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


                    <form id="addcity-form" class="form-horizontal" role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nhập tên thành phố:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="cityname" name="cityname" placeholder="Ví dụ: Hà Nội">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button  class="btn btn-bg btn-addcity" style="margin-right: 15px;">
                                    Thêm mới
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{Asset('js/general/addcity.js')}}"></script>