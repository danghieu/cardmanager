
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
          <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
              @if($user->level==1)
                Người dùng
              @elseif($user->level==2)
                Quản lý
              @elseif($user->level==3)
                Admin
              @endif
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="#">Người dùng</a></li>
              <li><a href="#">Quản lý</a></li>
              <li><a href="#">Admin</a></li>
            </ul>
          </div>
        </td>
        <td>
          @if($user->status==1)
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
              Hoạt động
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="#">Ngừng hoạt động</a></li>
          </div>
          @else
          <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
              Ngừng hoạt động
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="#">Ngừng hoạt động</a></li>
          </div>
          @endif
        </td>
      </tr>
    @endforeach
    </tbody>
</table>

<script src="{{Asset('js/general/userlist.js')}}"></script>