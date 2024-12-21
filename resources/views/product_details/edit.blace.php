<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>edit a Product details</h1>

    <form method="post" action="{{route('product_details.update', ['product_details' => $product_details]) }}">
        @csrf
        @method('put')
        <div>
            <label for="">Qty</label>
            <input type="text" name="qty" placeholder="qty" value="{{$product_details->qty}}">

        </div>
        <div>
            <label for="">Color</label>
            <input type="text" name="color" placeholder="color" value="{{$product_details->price}}">

        </div>
        <div>
            <label for="">Description</label>
            <input type="text" name="description" placeholder="description" value="{{$product_details->description}}">
        </div>
        <input type="submit" value="Update">
    </form>
</body>

</html>