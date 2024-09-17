<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::with('user')->get();
        return view('penjualan.index', compact('penjualan')); // Corrected here
    }


    public function create()
    {
        $users = User::all();
        return view('penjualan.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_transaksi' => 'required|unique:penjualan,nomor_transaksi',
            'tanggal' => 'required|date',
            'total_harga' => 'required|numeric|min:0',
            'diskon' => 'nullable|numeric|min:0',
            'total_bayar' => 'required|numeric|min:0',
            'id_user' => 'required|exists:users,kode_user',
        ]);

        Penjualan::create($request->all());

        return redirect()->route('penjualan.index')->with('success', 'Penjualan created successfully.');
    }

    public function show($id)
    {
        $penjualan = Penjualan::where('nomor_transaksi', $id)->first();
        return view('penjualan.show', compact('penjualan'));
    }

    public function edit($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $users = User::all();
        return view('penjualan.edit', compact('penjualan', 'users'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data request
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'total_harga' => 'required|numeric',
            'diskon' => 'nullable|numeric|min:0',
            'total_bayar' => 'required|numeric|min:0',
            'id_user' => 'required|exists:users,kode_user', // Memastikan id_user adalah kode_user di tabel users
        ]);

        // Temukan penjualan berdasarkan nomor transaksi
        $penjualan = Penjualan::findOrFail($id);

        // Update data penjualan dengan data yang telah divalidasi
        $penjualan->update($validatedData);

        return redirect()->route('penjualan.index')->with('success', 'Penjualan updated successfully.');
    }

    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->delete();

        return redirect()->route('penjualan.index')->with('success', 'Penjualan deleted successfully.');
    }
}
