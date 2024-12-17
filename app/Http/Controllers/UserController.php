<?php

namespace App\Http\Controllers;
use App\Models\User;
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
        return view('users.index', ['users' => $users]);
    }
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'description' => 'nullable',
        ]);
        $newUser = User::create($data);
        return redirect(route('users.index'));
    }
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }
    public function update(User $user, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
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
}
