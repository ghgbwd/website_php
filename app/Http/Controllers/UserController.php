<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function search()
    {
        $name = '';
        if (isset($_GET['name'])) {
            $name = $_GET['name'];
        }
        $users = User::where('name', 'LIKE', '%' . $name . '%')->get();
        return view('admin.index', ['users' => $users,'tab1'=>'user']);
    }
    // public function index()
    // {
    //     $users = User::all();
    //     return view('admin.index', ['users' => $users]);
    // }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email|email|max:255',
            'password' => 'required',
            'description' => 'nullable',
        ]);
        $newUser = User::create($data);
        return redirect(route('user.login'));
    }
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }
    public function update(User $user, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email|email|max:255',
            'password' => 'required',
            'description' => 'nullable'
        ]);
        $user->update($data);
        return redirect(route('users.index'))->with('success', 'User Update Succesffully');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('users.index'))->with('success', 'User deleted Succesffully');
    }
    public function login(){
        return view('login');
    }
    public function login_process(Request $request)
    {
        $data=$request->validate([
            'email'=> 'required',
            'password'=> 'required'
        ]);
        $user = User::where('email','=', $data['email'])->first();
        if ($user) {
            if ($user->password == $data['password']) {
                session(['user_id' => $user->id]);
                session(['user_name' => $user->name]);
                session(['email' => $user->email]);
                return redirect('/');
            }else{
                return redirect('/login')->with('status', 'Wrong email or password');
            }
        }else{
            return redirect('/login')->with('status', 'Wrong email or password');
        }
    }
    public function logout(){
        session()->forget('user_id');
        session()->forget('user_name');
        session()->forget('email');
        return redirect('/');
    }
    public function admin(){
        if (!session('email')) {
            return view('404');
        }
        $email = session('email');
        if ($email !== 'admin@gmail.com') {
            return view('404');
        }
        $brands = Brand::all();
        $categories = Category::all();
        $pro_search = '';
        if (isset($_GET['pro_search'])) {
            $pro_search = $_GET['pro_search'];
        }
        $products = Product::where('status', 1)->where('name', 'LIKE', '%' . $pro_search . '%')->simplePaginate(7)->appends(['tab' => 'product']);
        $users = User::all();
        $orders = Order::all();
        $order1 = [];
        if (isset($_GET['order1'])) {
            $id = $_GET['order1'];
            $order1 = Order::with('Order_detail.product')->findOrFail($id);
        }
        return view('admin.index',['brands' => $brands, 'categories' => $categories, 'products' => $products,'users' => $users, 'orders' => $orders, 'order1' => $order1]);
    }
}
