@extends('layouts.layout') <!-- Hoặc file layout của bạn -->

@section('content')
<div class="container">
    <h2>Order Detail - ID: {{ $order->id }}</h2>
    <p><strong>Date:</strong> {{ date_format($order->created_at, 'd-m-Y') }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>
    <p><strong>Receiver:</strong> {{ $order->first_name . ' ' . $order->last_name }}</p>

    <h3>Items</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->order_detail as $detail)
                <tr>
                    <td>{{ $detail->product->name }}</td>
                    <td>{{ $detail->qty }}</td>
                    <td>{{ number_format($detail->total, 2) }}</td>
                    <td>{{ number_format($detail->total * $detail->qty, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p><strong>Grand Total:</strong> </p>
</div>
@endsection
