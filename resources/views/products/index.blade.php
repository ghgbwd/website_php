@extends('layouts.layout')


@section('content')
<!-- Product -->
<div class="bg0 m-t-63 p-b-140">
	<div class="container">
		<div class="flex-w flex-sb-m p-b-12 justify-content-end ">

			<div class="flex-w flex-c-m m-tb-10">
				<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
					<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
					<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					Filter
				</div>
			</div>

			<!-- Filter -->
			<div class="dis-none panel-filter w-full p-t-10">
				<form method="get" class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm"
					action="{{route('product.search')}}">
					@csrf
					@method('get')
					<div class="filter-col1 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Sort By
						</div>
						<div class="d-flex align-items-center">
							<input type="radio" name="sort" checked id="default" value="asc" class="me-2">
							<label for="default" class="form-label mb-0">Default</label>
						</div>
						<div class="d-flex align-items-center">
							<input type="radio" name="sort" id="newness" value="desc" class="me-2">
							<label for="newness" class="form-label mb-0">Newness</label>
						</div>
					</div>

					<div class="filter-col2 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Price
						</div>
						<div>
							<label for="price">Chọn giá:</label>
							<input type="range" name="price" id="price" min="0" max="5000000" step="1000"
								value="5000000" oninput="updatePrice(this.value)">
							<span id="priceValue">5000000</span>₫
						</div>
					</div>

					<div class="filter-col3 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Brand
						</div>
						<div class="d-flex align-items-center">
							<input type="radio" name="brand" checked id="all" value="" class="me-2">
							<label for="all" class="form-label mb-0">All</label>
						</div>
						@foreach ($brands as $brand)
							<div class="d-flex align-items-center">
								<input type="radio" name="brand" id="{{$brand->id}}" value="{{$brand->id}}" class="me-2">
								<label for="{{$brand->id}}" class="form-label mb-0">{{$brand->name}}</label>
							</div>
						@endforeach
					</div>

					<div class="filter-col4 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Category
						</div>
						<div class="d-flex align-items-center">
							<input type="radio" name="category" checked id="all" value="" class="me-2">
							<label for="all" class="form-label mb-0">All</label>
						</div>
						@foreach ($categories as $category)
							<div class="d-flex align-items-center">
								<input type="radio" name="category" id="{{$category->id}}" value="{{$category->id}}" class="me-2">
								<label for="{{$category->id}}" class="form-label mb-0">{{$category->name}}</label>
							</div>
						@endforeach
					</div>
					<input type="submit" value="Filter">
				</form>
			</div>
		</div>
		<div class="row isotope-grid">
			@foreach ($products as $product)

				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{ asset('storage/' . $product->image) }}" alt="IMG-PRODUCT">

							<a href="{{route('product.detail', ['product' => $product])}}"
								class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Quick View
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<p href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{$product->name}}
								</p>

								<span class="stext-105 cl3">
									{{$product->price}}
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png"
										alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png"
										alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<hr>
		<!-- Pagination -->
		<div class="flex-c-m flex-w w-full p-t-45">
			{{$products->links()}}
		</div>
	</div>
</div>
<script>
	function updatePrice(value) {
		document.getElementById('priceValue').textContent = parseInt(value).toLocaleString('vi-VN');
	}
</script>
@endsection