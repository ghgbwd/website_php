@extends('layouts.layout')

@section('content')


@php
    $id = session()->get('user_id');
@endphp
<form class="bg0 p-t-75 p-b-85" method="post" action="{{route('order.store')}}">
    @csrf
    @method('post')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Product</th>
                                <th class="column-2"></th>
                                <th class="column-3">Price</th>
                                <th class="column-4">Quantity</th>
                                <th class="column-5">Total</th>
                            </tr>
                            @php
                                $cart = session('cart', []);
                                $total = 0;
                            @endphp

                            @forelse($cart as $key => $item)
                                                        @php
                                                            $subtotal = $item['price'] * $item['quantity'];
                                                            $total += $subtotal;
                                                        @endphp
                                                        <tr class="table_row">
                                                            <td class="column-1">
                                                                <a href=" {{ route('cart.remove', $key) }}">
                                                                    <div class="how-itemcart1">
                                                                        <img src="{{asset('storage/' . $item['image'])}}" alt="{{ $item['name'] }}">
                                                                    </div>
                                                                </a>

                                                            </td>
                                                            <td class="column-2">{{$item['name']}}</td>
                                                            <td class="column-3">{{$item['price']}}</td>
                                                            <td class="column-4">
                                                                {{$item['quantity']}}
                                                            </td>
                                                            <td class="column-5">{{ $item['quantity'] }} x ${{ number_format($item['price'], 2) }}
                                                            </td>
                                                        </tr>
                            @empty
                                <li class="header-cart-item flex-w flex-t m-b-12">
                                    <p class="text-center w-full">Your cart is empty.</p>
                                </li>
                            @endforelse

                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Cart Totals
                    </h4>

                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl2">
                                Shipping:
                            </span>
                        </div>

                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                            <p class="stext-111 cl6 p-t-2">
                                There are no shipping methods available. Please double check your address, or contact us
                                if you need any help.
                            </p>

                            <div class="p-t-15">
                                <span class="stext-112 cl8">
                                    Calculate Shipping
                                </span>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone"
                                        placeholder="Enter your phone number">
                                </div>
                                <span style="color:red">
                                    {{$errors->first('phone')}}
                                </span>

                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="email" name="email"
                                        placeholder="email">
                                </div>
                                <span style="color:red">
                                    {{$errors->first('email')}}
                                </span>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="first_name"
                                        placeholder="First name">
                                </div>
                                <span style="color:red">
                                    {{$errors->first('first_name')}}
                                </span>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="last_name"
                                        placeholder="Last name">
                                </div>

                                <span style="color:red">
                                    {{$errors->first('last_name')}}
                                </span>
                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                        name="home_address_details" placeholder="Home address details">
                                </div>
                                <span style="color:red">
                                    {{$errors->first('home_address_details')}}
                                </span>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="street_address"
                                        placeholder="Street address">
                                </div>
                                <span style="color:red">
                                    {{$errors->first('street_address')}}
                                </span>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="town_city"
                                        placeholder="Town/city">
                                </div>
                                <span style="color:red">
                                    {{$errors->first('town_city')}}
                                </span>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" hidden value="{{$id}}"
                                        type="text" name="user_id" placeholder="User ID">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Total:
                            </span>
                        </div>

                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2">
                                {{ number_format($total, 2) }}
                            </span>
                        </div>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Proceed to Checkout
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection