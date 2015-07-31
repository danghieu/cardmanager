<form id="edit-info-card-form" class="form-horizontal" role="form" method="POST" action="{{ url('as') }}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>STT</th>
        <th>Số Thẻ</th>
        <th>Trạng Thái</th>
        <th>Chức Năng</th>
      </tr>
    </thead>
    <tbody>
    @foreach($cards as $card)
      <tr>
        <td>{{$stt++}}</td>
        <td>{{$card->number}}</td>
        <td>
        @if($card->status==0)
         <span class="span-primary"> Chưa cấp</span>
         @elseif($card->status==1)
         <span class="span-success"> Hoạt động</span>
         @elseif($card->status==2)
         <span class="span-block">Khóa</span>
         @endif
        </td>
        <td>
            <input type="hidden"  id="cardnumber" name="cardnumber" value="{{$card->number}}">
            @if($card->status==0)
            <button class="btn">Cấp thẻ</button>
            @endif
            <button class="btn btn-edit-info-card">Chỉnh sửa</button>
          
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</form>