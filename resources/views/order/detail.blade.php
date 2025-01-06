@extends('layouts.layout') <!-- Hoặc file layout của bạn -->

@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-42">
</section>
<!-- <div class="container">
    <h2>Order Detail - ID: {{ $order->id }}</h2>
    <p><strong>Date:</strong> {{ date_format($order->created_at, 'd-m-Y') }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>
    <p><strong>Receiver:</strong> {{ $order->first_name . ' ' . $order->last_name }}</p>

    <h3>Items</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>image</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->order_detail as $detail)
                <tr>
                    <td>{{ $detail->product->name }}</td>
                    <td><img width="100%" src="{{asset('storage/' . $detail->product->image)}}" alt="{{ $detail->product->image }}"></td>
                    <td>{{ $detail->qty }}</td>
                    <td>{{ number_format($detail->total, 2) }}</td>
                    <td>{{ number_format($detail->total * $detail->qty, 2) }}</td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
</div> -->
<div class="bg0 p-t-75 p-b-85">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-xl-10 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Product</th>
                                <th class="column-2">image</th>
                                <th class="column-3">Quantity</th>
                                <th class="column-4">Price</th>
                                <th class="column-5">Total</th>
                            </tr>
                            @foreach($order->order_detail as $detail)
                                <tr class="table_row">
                                    <td class="column-1">{{ $detail->product->name }}</td>
                                    <td class="column-2"><img class="header-cart-item-img"
                                            src="{{asset('storage/' . $detail->product->image)}}"
                                            alt="{{ $detail->product->image }}">
                                    </td>
                                    <td class="column-3">{{ $detail->qty }}</td>
                                    <td class="column-4">{{ number_format($detail->total, 2) }} đ</td>
                                    <td class="column-5">{{ number_format($detail->total * $detail->qty, 2) }} đ</td>
                                </tr>
                            @endforeach
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection