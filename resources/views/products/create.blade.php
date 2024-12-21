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

    <form method="post" action="{{route('product.store')}}">
        @csrf
        @method('post')
        <div>
            <label for="">Name</label>
            <input type="text" name="name">

        </div>
        <div>
            <label for="">Category Id</label>
            <input type="text" name="category_id">
        </div>
        <div>
            <label for="">Brand Id</label>
            <input type="text" name="brand_id">
        </div>
        <div>
            <label for="">Product detail Id</label>
            <input type="text" name="product_detail_id">
        </div>
        <div>
            <label for="">Qty</label>
            <input type="text" name="qty">

        </div>
        <div>
            <label for="">Price</label>
            <input type="text" name="price">

        </div>
        <div>
            <label for="">size</label>
            <input type="text" name="size">
        
        </div>
        <div>
            <label for="">Description</label>
            <input type="text" name="description">
        </div>
        <input type="submit" value="Create new product">
    </form>
</body>

</html>