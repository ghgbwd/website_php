<h1>Brands</h1>
@include('brands.create')
<table class="table table-bordered">

    <tr>
        <th class="p-2">ID</th>
        <th class="p-2">Name</th>
        <th class="p-2">Created at</th>
        <th class="p-2">Update at</th>
        <th class="p-2">Edit</th>
        <th class="p-2">Delete</th>
    </tr>
    @foreach ($brands as $brand)
        <tr>
            <th class="p-2">{{$brand->id}}</th>
            <th class="p-2">{{$brand->name}}</th>
            <th class="p-2">{{$brand->created_at}}</th>
            <th class="p-2">{{$brand->updated_at}}</th>
            <th class="p-2"><a href="{{route('brand.edit', ['brand' => $brand])}}">Edit</a></th>
            <td class="p-2">
                <form method="post" action="{{route('brand.destroy', ['brand' => $brand])}}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete" />
                </form>
            </td>
        </tr>
    @endforeach

</table>