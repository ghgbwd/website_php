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

    <form method="post" action="{{route('product_details.store')}}">
        @csrf
        @method('post')
        <div>
            <label for="">Product ID</label>
            <input type="text" name="product_id">        
        </div>
        <div>
            <label for="">Qty</label>
            <input type="text" name="qty">

        </div>
        <div>
            <label for="">color</label>
            <input type="text" name="color">

        </div>
        
        <div>
            <label for="">Description</label>
            <input type="text" name="description">
        </div>
        <input type="submit" value="Create new product details">
    </form>
</body>

</html>