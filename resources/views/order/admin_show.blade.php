<table class="table table-bordered">
    
    <tr>
        <th class="column-1">ID</th>
        <th class="column-2">Date</th>
        <th class="column-3">Status</th>
        <th class="column-4">Receiver</th>
        <th class="column-5"></th>
    </tr>
    @foreach ($orders as $order)
    
    <tr>
        <th>
            {{$order->id}}
        </th>
        <th>{{date_format($order->created_at, 'd-m-Y')}}</th>
        <th>{{$order->status}}</th>
        <th>
            {{$order->first_name . $order->last_name}}
        </th>
        <th>
            <a href="{{ route('orders.show', $order->id) }}">Detail</a>
        </th>
    </tr>

    @endforeach
</table>