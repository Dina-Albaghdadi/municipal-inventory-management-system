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
        'username'  => 'required|string|max:50|unique:users,username',
        'name'      => 'required|string|max:255',
        'full_name' => 'required|string|max:100', 
        'email'     => 'required|email|max:255|unique:users,email',
        'password'  => 'required|min:8',
        'role'      => 'required|in:Admin,Manager,Worker', 
        'warehouse_id' => 'nullable|exists:warehouses,warehouse_id'
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

    return redirect()->route('users.index')->with('success', 'User created successfully');
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