<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\User;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangMasuk = BarangMasuk::paginate(10);
        return view('barang_masuk.index', compact('barangMasuk'));
    }
    public function create()
    {
        return view('barang_masuk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|string|max:255',
            'stok' => 'required|integer',
            'nama_supplier' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'kode_user' => 'required|string|exists:users,kode_user',
        ]);

        BarangMasuk::create($request->all());

        return redirect()->route('barang_masuk.index')->with('success', 'Barang masuk successfully created.');
    }

    public function edit(BarangMasuk $barangMasuk)
    {
        return view('barang_masuk.edit', compact('barangMasuk'));
    }

    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        $request->validate([
            'kode_barang' => 'required|string|max:255',
            'stok' => 'required|integer',
            'nama_supplier' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'kode_user' => 'required|string|exists:users,kode_user',
        ]);

        $barangMasuk->update($request->all());

        return redirect()->route('barang_masuk.index')->with('success', 'Barang masuk successfully updated.');
    }
}
