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

<script src="{{Asset('js/general/addcity.js')}}"></script>