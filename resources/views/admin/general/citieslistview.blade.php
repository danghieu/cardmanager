<div class="citieslisttool">
	 <div class="form-group filter">
        <div class="col-sm-3 col-md-3   selectContainer">
            <select class="form-control" id="cities-filter" name="cities-filter">
                <option value="all">Tất cả</option>
            </select>
        </div>
    </div>
     <div class="col-sm-5 col-md-5 nav navbar-nav search">
                <form class="form-search" role="search"  method="post" name="form-search" autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="input-group col-sm-10 col-md-10">
                            <input type="text " class="form-control" name="q" id="q" type="text" placeholder="Tìm kiếm thành phố">
                            <div class="input-group-btn">
                                <button class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>                              
                </form>   
        </div>
</div>

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

                    <div class="addnewcity">
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="citieslist">
	
</div>
<script src="{{Asset('js/general/citieslistview.js')}}"></script>