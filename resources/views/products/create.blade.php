<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Chế độ Flexbox để sắp xếp các ảnh theo chiều ngang */
        .image-previews {
            display: flex;
            gap: 10px;
            /* Khoảng cách giữa các ảnh */
            margin-top: 10px;
        }
    
        .image-previews img {
            max-width: 200px;
            /* Chiều rộng tối đa cho các ảnh */
            height: auto;
            /* Đảm bảo tỷ lệ ảnh được giữ nguyên */
        }
    </style>
</head>

<body>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" enctype="multipart/form-data" action="{{route('product.store')}}">
        @csrf
        @method('post')
        <div>
            <label for="">Name</label>
            <input type="text" name="name">

        </div>
        <div>
            <label for="">Category Id</label>
            <input type="text" name="category_id">
        </div>
        <div>
            <label for="">Brand Id</label>
            <input type="text" name="brand_id">
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
            <input type="text" name="qty">

        </div>
        <div>
            <label for="">Price</label>
            <input type="text" name="price">

        </div>
        <div>
            <label for="">size</label>
            <input type="text" name="size">

        </div>
        <div>
            <label for="">Description</label>
            <input type="text" name="description">
        </div>
        <input type="submit" value="Create new product">
    </form>
    <script>
        // Hàm preview ảnh
        function previewImage(event) {
            const file = event.target.files[0];  // Lấy tệp ảnh người dùng chọn
            const reader = new FileReader();  // Khởi tạo FileReader để đọc file

            reader.onload = function () {
                // Khi ảnh được đọc thành công, set src cho img preview
                const imagePreview = document.getElementById('imagePreview');
                imagePreview.src = reader.result;  // Đặt hình ảnh preview
                imagePreview.style.display = 'block';  // Hiển thị ảnh
            };

            if (file) {
                reader.readAsDataURL(file);  // Đọc tệp dưới dạng URL
            }
        }
        function previewImage2(event) {
            const file = event.target.files[0];  // Lấy tệp ảnh người dùng chọn
            const reader = new FileReader();  // Khởi tạo FileReader để đọc file

            reader.onload = function () {
                // Khi ảnh được đọc thành công, set src cho img preview
                const imagePreview = document.getElementById('imagePreview2');
                imagePreview.src = reader.result;  // Đặt hình ảnh preview
                imagePreview.style.display = 'block';  // Hiển thị ảnh
            };

            if (file) {
                reader.readAsDataURL(file);  // Đọc tệp dưới dạng URL
            }
        }
        function previewImage3(event) {
            const file = event.target.files[0];  // Lấy tệp ảnh người dùng chọn
            const reader = new FileReader();  // Khởi tạo FileReader để đọc file

            reader.onload = function () {
                // Khi ảnh được đọc thành công, set src cho img preview
                const imagePreview = document.getElementById('imagePreview3');
                imagePreview.src = reader.result;  // Đặt hình ảnh preview
                imagePreview.style.display = 'block';  // Hiển thị ảnh
            };

            if (file) {
                reader.readAsDataURL(file);  // Đọc tệp dưới dạng URL
            }
        }
        function previewImage4(event) {
            const file = event.target.files[0];  // Lấy tệp ảnh người dùng chọn
            const reader = new FileReader();  // Khởi tạo FileReader để đọc file

            reader.onload = function () {
                // Khi ảnh được đọc thành công, set src cho img preview
                const imagePreview = document.getElementById('imagePreview4');
                imagePreview.src = reader.result;  // Đặt hình ảnh preview
                imagePreview.style.display = 'block';  // Hiển thị ảnh
            };

            if (file) {
                reader.readAsDataURL(file);  // Đọc tệp dưới dạng URL
            }
        }
    </script>
</body>

</html>