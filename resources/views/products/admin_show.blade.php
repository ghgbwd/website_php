
<a href="{{route('product.create')}}">Create product</a>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>name</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Description</th>
        <th>Category</th>
        <th>Brand</th>
        <th>Size</th>
        <th>Image 1</th>
        <th>Image 2</th>
        <th>Image 3</th>
        <th>Image 4</th>
    </tr>
    @foreach($products as $product)
        <tr>
            <th>{{$product->id}}</th>
            <th>{{$product->name}}</th>
            <th>{{$product->qty}}</th>
            <th>{{$product->price}}</th>
            <th>{{$product->description}}</th>
            <th>{{$product->category->name}}</th>
            <th>{{$product->brand->name}}</th>
            <th>{{$product->size}}</th>
            <th><img src="{{ asset('storage/' . $product->image) }}" width="30px" alt="IMG-PRODUCT"></th>
            <th><img src="{{ asset('storage/' . $product->image2) }}" width="30px" alt="IMG-PRODUCT"></th>
            <th><img src="{{ asset('storage/' . $product->image3) }}" width="30px" alt="IMG-PRODUCT"></th>
            <th><img src="{{ asset('storage/' . $product->image4) }}" width="30px" alt="IMG-PRODUCT"></th>
            <th><a href="{{route('product.edit',['product'=>$product])}}">Edit</a></th>
            <th>
                <form method="post" action="{{route('product.destroy', ['product' => $product])}}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete" />
                </form>
            </th>
        </tr>
    @endforeach
</table>