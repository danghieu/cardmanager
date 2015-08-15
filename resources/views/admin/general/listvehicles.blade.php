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
          <button class="btn">Cấu hình</button>
          <button class="btn">Xóa</button>
        </td>
      </tr>
    @endforeach
    </tbody>
</table>