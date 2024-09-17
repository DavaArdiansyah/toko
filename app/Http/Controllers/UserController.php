<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
{
    // Tangkap input pencarian
    $search = $request->input('search');

    // Ambil data pengguna yang cocok dengan pencarian, jika ada
    $users = User::when($search, function ($query, $search) {
        return $query->where('kode_user', 'like', "%{$search}%")
                     ->orWhere('name', 'like', "%{$search}%")
                     ->orWhere('email', 'like', "%{$search}%")
                     ->orWhere('role', 'like', "%{$search}%");
    })->get();

    return view('user.index', compact('users'));
}


    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'kode_user' => 'required|unique:users|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8',
            'role' => 'required|in:staf_gudang,kepala_toko,kasir',
        ]);

        User::create([
            // 'kode_user' => $request->kode_user,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
            'role' => $request->role,
        ]);

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function show($kode_user)
    {
        $user = User::where('kode_user', $kode_user)->firstOrFail();
        return view('user.show', compact('user'));
    }

    public function edit($kode_user)
    {
        $user = User::where('kode_user', $kode_user)->firstOrFail();
        return view('user.edit', compact('user'));
    }

        public function update(Request $request, $kode_user)
    {
        // return $request;
        // Ambil pengguna berdasarkan kode_user
        $user = User::where('kode_user', $kode_user)->firstOrFail();

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            // 'email' => 'required|email|unique:users,email,' . $kode_user . ',kode_user|max:255', // Validasi email dengan pengecualian untuk kode_user pengguna saat ini
            'password' => 'nullable|string|min:8',
            'role' => 'required|in:staf_gudang,kepala_toko,kasir',
        ]);

        // Update data pengguna
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'role' => $request->role,
        ]);

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    public function destroy($kode_user)
    {
        $user = User::where('kode_user', $kode_user)->firstOrFail();
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}

