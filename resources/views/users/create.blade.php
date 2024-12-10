<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{route('user.store')}}">
        @csrf
        @method('post')
        <div>
            <label for="">Name</label>
            <input type="text" name="name">

        </div>
        <div>
            <label for="">Email</label>
            <input type="text" name="email">

        </div>
        <div>
            <label for="">Password</label>
            <input type="text" name="password">

        </div>
        <div>
            <label for="">Description</label>
            <input type="text" name="description">
        </div>
        <input type="submit" value="Create new user">
    </form>
</body>

</html>