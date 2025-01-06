<table class="table table-bordered">

    <tr>
        <th class="column-1">ID</th>
        <th class="column-2">Date</th>
        <th class="column-4">Receiver</th>
        <th class="column-4">Phone</th>
        <th class="column-4">Address</th>
        <th class="column-4">Total price</th>
        <th class="column-3">Status</th>
        <th class="column-5"></th>
    </tr>
    @foreach ($orders as $order)

            <tr>
                <th>
                    {{$order->id}}
                </th>
                <th>{{date_format($order->created_at, 'd-m-Y')}}</th>
                <th>
                    {{$order->first_name . $order->last_name}}
                </th>
                <th>
                    {{$order->phone}}
                </th>
                <th>{{$order->home_address_details}}-{{$order->street_address}}-{{$order->town_city}}</th>
                <th>
                    @php
        $total = 0;
                    @endphp
                    @foreach ($order->order_detail as $each)
                        @php
            $total += $each->qty * $each->total
                        @endphp
                    @endforeach
                    {{$total}} vnđ
                </th>
                <th>{{$order->status}}</th>
                <th>
                    <a href="?tab=order_detail&order1={{$order->id}}">Detail</a>
                </th>
            </tr>

    @endforeach
</table>