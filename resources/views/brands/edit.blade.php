<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit_brands</title>
</head>

<body>
    <h1>Edit a brand</h1>

    <form method="post" action="{{route('brand.update', ['brand' => $brand])}}">
        @csrf
        @method('put')
        <div>
            <label for="">Name</label>
            <input type="text" name="name" placeholder="Name" value="{{$brand->name}}" />

        </div>

        <input type="submit" value="Update">
    </form>
</body>

</html>