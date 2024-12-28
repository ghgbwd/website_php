<?php

namespace App\Http\Controllers;

use App\Models\Order_detail;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::orderBy("id","desc")->simplePaginate(10);
        return view('order.index',['orders' => $orders]);
    }
    public function create()
    {
        return view('order.create');
    }
    public function store(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }
        $data = $request->validate([
            'phone' => 'required|regex:/^[0-9]{10}$/',
            'email' => 'required|email',
            'first_name' => 'required|string|max:50', 
            'last_name' => 'required|string|max:50',
            'home_address_details' => 'nullable|string|max:255',
            'street_address' => 'required|string|max:255',
            'town_city' => 'required|string|max:100',
            'user_id' => 'required|integer',
        ]);
        $order = Order::create($data);
        foreach ($cart as $item) {
            Order_detail::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'total' => $item['price'],
                'qty' => $item['quantity'],
            ]);
        }
        session()->forget('cart');

        return redirect()->route('order.create')->with('success', 'Your order has been placed successfully.');

    }
    public function addToCart(Request $request, Product $product)
    {

        // Lấy thông tin sản phẩm
        $quantity = $_GET['quantity'];

        // Kiểm tra số lượng hàng còn
        if ($product->qty < $quantity) {
            return response()->json([
                'message' => 'Sản phẩm không đủ hàng.',
            ], 400);
        }

        // Thêm sản phẩm vào giỏ hàng (sử dụng session để lưu trữ)
        $cart = Session::get('cart', []);

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        if (isset($cart[$product->id])) {
            // Cập nhật số lượng
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            // Thêm sản phẩm mới vào giỏ
            $cart[$product->id] = [
                'id'=> $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $quantity,
            ];
        }


        Session::put('cart', $cart);
        $product->qty -= $quantity;
        $product->save();
        return redirect()->back()->with('success', 'Product added to cart.');
    }
    public function remove($key)
    {
        $cart = session('cart', []);

        if (isset($cart[$key])) {
            $product = Product::find($key);
            $product->qty += $cart[$product->id]['quantity'];
            $product->save();
            unset($cart[$key]); // Xóa sản phẩm khỏi giỏ hàng
            session(['cart' => $cart]); // Cập nhật lại session
        }

        return redirect()->back()->with('success', 'Product removed from cart.');
    }
    public function show($id)
    {
        $order = Order::with('Order_detail.product')->findOrFail($id); // Lấy đơn hàng và chi tiết
        return view('order.detail', compact('order'));
    }


}
