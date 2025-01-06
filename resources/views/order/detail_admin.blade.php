<table class="table table-bordered">
    <tr>
        <th>Product</th>
        <th>image</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
    </tr>
    @foreach($order1->order_detail as $detail)
        <tr>
            <td >{{ $detail->product->name }}</td>
            <td ><img width="40px" src="{{asset('storage/' . $detail->product->image)}}"
                    alt="{{ $detail->product->image }}">
            </td>
            <td >{{ $detail->qty }}</td>
            <td >{{ number_format($detail->total, 2) }} đ</td>
            <td >{{ number_format($detail->total * $detail->qty, 2) }} đ</td>
        </tr>
    @endforeach
</table>