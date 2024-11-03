<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    // Add User
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role_as' => 'required|in:0,1',
            'password' => 'required|string|min:8',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_as = $request->role_as;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.create')->with('message', 'User Created Successfully.');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // unique email, but ignore current user's email
            'role_as' => 'required|in:0,1',
            'password' => 'nullable|string|min:8', // password is optional in case it is not updated
        ]);

    //Find User Id
    $user = User::findOrFail($id);


    }
}
