<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>edit a Product</h1>

    <form method="post" action="{{route('product.update', ['product' => $product]) }}">
        @csrf
        @method('put')
        <div>
            <label for="">Name</label>
            <input type="text" name="name" placeholder="Name" value="{{$product->name}}" />

        </div>
        <div>
            <label for="">Image 1</label>
            <input type="file" name="image" onchange="previewImage(event)">
            <label for="">Image 2</label>
            <input type="file" name="image2" onchange="previewImage2(event)">
            <label for="">Image 3</label>
            <input type="file" name="image3" onchange="previewImage3(event)">
            <label for="">Image 4</label>
            <input type="file" name="image4" onchange="previewImage4 (event)">
        </div>
        <div class="image-previews">
            <img id="imagePreview" src="#" alt="Ảnh sản phẩm preview" style="display: none;" />
            <img id="imagePreview2" src="#" alt="Ảnh sản phẩm preview" style="display: none;" />
            <img id="imagePreview3" src="#" alt="Ảnh sản phẩm preview" style="display: none;" />
            <img id="imagePreview4" src="#" alt="Ảnh sản phẩm preview" style="display: none;" />
        </div>
        <div>
            <label for="">Qty</label>
            <input type="text" name="qty" placeholder="Qty" value="{{$product->qty}}">

        </div>
        <div>
            <label for="">Price</label>
            <input type="text" name="price" placeholder="Price" value="{{$product->price}}">

        </div>
        <div>
            <label for="">size</label>
            <input type="text" name="size">
        
        </div>
        <div>
            <label for="">Description</label>
            <input type="text" name="description" placeholder="Description" value="{{$product->description}}">
        </div>
        <input type="submit" value="Update">
    </form>
</body>

</html>