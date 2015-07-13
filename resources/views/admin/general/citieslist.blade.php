
 <table class="table table-hover">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên thành phố</th>
        <th>Chức năng</th>
      </tr>
    </thead>
    <tbody>
    @foreach($cities as $city)
      <tr>
        <td>{{$stt++}}</td>
        <td>{{$city->name}}</td>
        <td>
          <button class="btn">Cấu hình</button>
        </td>
      </tr>
    @endforeach
    </tbody>
</table>