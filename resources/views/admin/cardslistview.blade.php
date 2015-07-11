

<div class="cardlisttool">
	 <div class="form-group filter">
        <div class="col-sm-3 col-md-3   selectContainer">
            <select class="form-control" id="card-filter" name="card-filter">
                <option value="all">Tất cả</option>
                <option value="0">Chưa cấp</option>
                <option value="1">Hoạt động</option>
                <option value="2">Khóa</option>
            </select>
        </div>
    </div>
     <div class="col-sm-5 col-md-5 nav navbar-nav search">
                <form class="form-search" role="search"  method="get" action="{{Asset('search')}}"  name="form-search" autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="input-group col-sm-10 col-md-10">
                            <input type="text " class="form-control" name="q" id="q" type="text" placeholder="Tìm kiếm thẻ">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>                              
                </form>   
        </div>


</div>

<div class="cardlist">
	
</div>
<script src="{{Asset('js/cardslistview.js')}}"></script>