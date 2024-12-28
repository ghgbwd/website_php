<body>

    <form class="d-plex" method="post" action="{{route('category.store')}}">
        @csrf
        @method('post')
        <label for="">Name</label>
        <input type="text" name="name">
        <input type="submit" value="Create new category">
    </form>
</body>