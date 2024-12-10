<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>

<body>
    <h1>Category</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created at</th>
            <th>Update at</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        @foreach ($categories as $category)
            <tr>
                <th>{{$category->id}}</th>
                <th>{{$category->name}}</th>
                <th>{{$category->created_at}}</th>
                <th>{{$category->updated_at}}</th>
                <th><a href="{{route('category.edit', ['category' => $category])}}">Edit</a></th>
                <td>
                    <form method="post" action="{{route('category.destroy', ['category' => $category])}}">
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