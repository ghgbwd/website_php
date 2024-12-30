@extends('layouts.layout')
@section('content')
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-42">
</section>


<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
	<div class="container">
		<div class="flex-w flex-tr">

			<div class="size-710 bor10 flex-w p-lr-93 p-tb-30 p-lr-15-lg w-full">
				<div class="flex-w w-full p-b-42">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="lnr lnr-map-marker"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							SHOP ADDRESS
						</span>

						<p class="stext-115 cl6 size-213 p-t-18">
							77, Alley 37, Bằng Liệt Street, Hoàng Mai District, Hanoi, Vietnam.
						</p>
					</div>
				</div>

				<div class="flex-w w-full p-b-42">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="lnr lnr-phone-handset"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							Phone number
						</span>

						<p class="stext-115 cl1 size-213 p-t-18">
							103 545 3629
						</p>
					</div>
				</div>

				<div class="flex-w w-full">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="lnr lnr-envelope"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							Sale Support
						</span>

						<p class="stext-115 cl1 size-213 p-t-18">
							Hoaphuthuy@gmail.com
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- Map -->
<div class="map">
	<div class="size-303" id="google_map" data-map-x="20.962456612067122" data-map-y="105.82161249658796"
		data-pin="images/icons/pin5.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
</div>

@endsection