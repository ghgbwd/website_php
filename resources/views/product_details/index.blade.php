<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product_details</title>
</head>

<body>
    <h1>Products_Details</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
    <div>
        <div>
            <a href="{{route('product_details.create')}}">Create a product details</a>
        </div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Qty</th>
                <th>Color</th>
                <th>Size</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($products_details as $product_details)
                <tr>
                    <td>{{$product_details->id}}</td>
                    <td>{{$product_details->qty}}</td>
                    <td>{{$product_details->color}}</td>
                    <td>{{$product_details->size}}</td>
                    <td>{{$product_details->description}}</td>
                    <td>
                        <a href="{{route('product_details.edit', ['product_details' => $product_details])}}">Edit</a>
                    </td>
                    <td>
                        <form method="post"
                            action="{{route('product_details.destroy', ['product_details' => $product_details])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
</body>

</html>