<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>edit a Product details</h1>

    <form method="post" action="{{route('product_details.update', ['product_detail' => $product_detail]) }}">
        @csrf
        @method('put')
        <div>
            <label for="">Product ID</label>
            <input type="text" name="product_id">        
        </div>
        <div>
            <label for="">Qty</label>
            <input type="text" name="qty" placeholder="qty" value="{{$product_detail->qty}}">

        </div>
        <div>
            <label for="">Color</label>
            <input type="text" name="color" placeholder="color" value="{{$product_detail->price}}">

        </div>
        <div>
            <label for="">Description</label>
            <input type="text" name="description" placeholder="description" value="{{$product_detail->description}}">
        </div>
        <input type="submit" value="Update">
    </form>
</body>

</html>