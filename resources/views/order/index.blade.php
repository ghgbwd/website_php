@extends('layouts.layout')

@section('content')

<section class="bg-img1 txt-center p-lr-15 p-tb-42">
</section>

<div class="bg0 p-t-75 p-b-85">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-xl-10 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">ID</th>
                                <th class="column-2">Date</th>
                                <th class="column-3">Status</th>
                                <th class="column-4">Receiver</th>
                                <th class="column-5"></th>
                            </tr>
                            @foreach ($orders as $order)
                                <tr class="table_row">
                                    <td class="column-1">
                                        {{$order->id}}
                                    </td>
                                    <td class="column-2">{{date_format($order->created_at, 'd-m-Y')}}</td>
                                    <td class="column-3">{{$order->status}}</td>
                                    <td class="column-4">
                                        {{$order->first_name . $order->last_name}}
                                    </td>
                                    <td class="column-5">
                                        <a href="{{ route('orders.show', $order->id) }}">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        

                    </div><div class="pagination-wrapper">
                            {{ $orders->links() }}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection