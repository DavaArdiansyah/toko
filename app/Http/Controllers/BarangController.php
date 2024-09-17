<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jenis;
use App\Models\User;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('jenis', 'user')->get();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        $jenis = Jenis::all();
        $user = User::all();
        return view('barang.create', compact('jenis', 'user'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_barang' => 'required|string|max:20|unique:barang',
            'nama_barang' => 'required|string|max:100',
            'kode_jenis' => 'required|exists:jenis,kode_jenis',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|integer',
            'diskon' => 'nullable|numeric',
            'kode_user' => 'required|exists:users,kode_user'
        ]);

        Barang::create($validatedData);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit($kode_barang)
    {
        $barang = Barang::findOrFail($kode_barang);
        $jenis = Jenis::all();
        $users = User::all();
        return view('barang.edit', compact('barang', 'jenis', 'users'));
    }

    public function update(Request $request, $kode_barang)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:100',
            'kode_jenis' => 'required|exists:jenis,kode_jenis',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|integer',
            'diskon' => 'nullable|numeric',
            'kode_user' => 'required|exists:users,kode_user'
        ]);

        $barang = Barang::findOrFail($kode_barang);
        $barang->update($validatedData);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate.');
    }

    public function destroy($kode_barang)
    {
        $barang = Barang::findOrFail($kode_barang);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
