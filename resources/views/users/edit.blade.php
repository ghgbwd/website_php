<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>edit a user</h1>

    <form method="post" action="{{route('user.update', ['user' => $user]) }}">
        @csrf
        @method('put')
        <div>
            <label for="">Name</label>
            <input type="text" name="name" placeholder="Name" value="{{$user->name}}" />

        </div>
        <div>
            <label for="">Email</label>
            <input type="text" name="email" placeholder="Email" value="{{$user->email}}">

        </div>
        <div>
            <label for="">Password</label>
            <input type="text" name="password" placeholder="password" value="{{$user->password}}">

        </div>
        <div>
            <label for="">Description</label>
            <input type="text" name="description" placeholder="Description" value="{{$user->description}}">
        </div>
        <input type="submit" value="Update">
    </form>
</body>

</html>