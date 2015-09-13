                    <p></p>
                    <form id="addcity-form" class="form-horizontal" role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tên thành phố: </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="cityname" name="cityname" value="{{$city[0]->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="hidden"  id="citynumber" name="citynumber" value="{{$city[0]->id}}">
                                <button  class="btn btn-bg btn-update-city" style="margin-right: 15px;">
                                    Cập nhật
                                </button>
                            </div>
                        </div>
                    </form>

<script src="{{Asset('js/general/updatecity.js')}}"></script>