<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create_category</title>
</head>

<body>

    <form method="post" action="{{route('category.store')}}">
        @csrf
        @method('post')
        <div>
            <label for="">Name</label>
            <input type="text" name="name">

        </div>

        <input type="submit" value="Create new category">
    </form>
</body>

</html>