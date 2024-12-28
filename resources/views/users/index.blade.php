
    <h1>Users</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
    <div>
        <table class="table table-bordered">
            <form method="get" action="{{route('user.search')}}">
                @csrf
                @method('get')
                <input type="search" name="name" id="">
                <input type="submit" value="Search">
            </form>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Description</th>
                <th>Edit</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->password}}</td>
                    <td>{{$user->description}}</td>
                    <td>
                        <a href="{{route('user.edit', ['user' => $user])}}">Edit</a>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>