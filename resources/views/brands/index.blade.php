<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand</title>
</head>

<body>
    <h1>Brands</h1>
    <table border="1">
        <form method="get" action="{{route('brand.search')}}">
            @csrf
            @method('get')
            <input type="search" name="name" id="">
            <input type="submit" value="Search">
        </form>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created at</th>
            <th>Update at</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($brands as $brand)
            <tr>
                <th>{{$brand->id}}</th>
                <th>{{$brand->name}}</th>
                <th>{{$brand->created_at}}</th>
                <th>{{$brand->updated_at}}</th>
                <th><a href="{{route('brand.edit', ['brand' => $brand])}}">Edit</a></th>
                <td>
                    <form method="post" action="{{route('brand.destroy', ['brand' => $brand])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" />
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
</body>

</html>