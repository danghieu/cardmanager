
 <table class="table table-hover">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên người dùng</th>
        <th>Email</th>
        <th>Avatar</th>
        <th>Level</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
      <tr>
        <td>{{$stt++}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td> </td>
        <td>
          <button class="btn btn-primary">
          @if($user->level==1)
            Người dùng
          @elseif($user->level==2)
            Quản lý
          @elseif($user->level==3)
            Admin
          @endif
          </button>
        </td>
        <td>
          <button class="btn btn-primary">
          @if($user->status==1)
            Hoạt động
          @else
            Ngừng hoạt động
          @endif
          </button>
        </td>
      </tr>
    @endforeach
    </tbody>
</table>