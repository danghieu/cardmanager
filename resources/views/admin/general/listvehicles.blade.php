 <table class="table table-hover">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên loại xe</th>
        <th>Phí qua trạm</th>
        <th>Chức năng</th>
      </tr>
    </thead>
    <tbody>
    @foreach($vehicles as $vehicle)
      <tr>
        <td>{{$stt++}}</td>
        <td>{{$vehicle->name}}</td>
        <td>{{$vehicle->fee}}</td>
        <td>
          <input type="hidden"  id="vehiclenumber" name="vehiclenumber" value="{{$vehicle->id}}">
          <button class="btn btn-primary btn-cauhinh">Cấu hình</button>
        </td>
      </tr>
    @endforeach
    </tbody>
</table>

<script src="{{Asset('js/general/vehicleslist.js')}}"></script>