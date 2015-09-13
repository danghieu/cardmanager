
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
            <input type="hidden"  id="citynumber" name="citynumber" value="{{$city->id}}">
            <button class="btn btn-primary btn-cauhinh">Cấu hình</button>
        </td>
      </tr>
    @endforeach
    </tbody>
</table>

<script src="{{Asset('js/general/citieslist.js')}}"></script>