                    <form id="addvehicle-form" class="form-horizontal" role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tên loại xe:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="vehiclename" name="vehiclename" placeholder="Ví dụ: Xe tải... ">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button  class="btn btn-bg btn-addvehicle" style="margin-right: 15px;">
                                    Thêm mới
                                </button>
                            </div>
                        </div>
                    </form>


<script src="{{Asset('js/general/addvehicle.js')}}"></script>