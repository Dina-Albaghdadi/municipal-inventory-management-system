<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('warehouse')->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $warehouses = Warehouse::all();
        return view('users.create', compact('warehouses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required|in:Admin,Manager,Worker'
        ]);

        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'full_name' => $request->full_name,
            'role' => $request->role,
            'warehouse_id' => $request->warehouse_id,
            'status' => 'Active'
        ]);

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        $warehouses = Warehouse::all();
        return view('users.edit', compact('user', 'warehouses'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->except('password'));
        return redirect()->route('users.index');
    }
}