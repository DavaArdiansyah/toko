<?php

namespace App\Http\Controllers;

use App\Models\ReturBarang;
use Illuminate\Http\Request;

class ReturBarangController extends Controller
{
    public function index()
    {
        $returBarang = ReturBarang::all();
        return view('retur_barang.index', compact('returBarang'));
    }

    public function create()
    {
        return view('retur_barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_retur_barang' => 'required|string|unique:retur_barang,kode_retur_barang',
            'kode_barang' => 'required|exists:barang,kode_barang',
            'stok' => 'required|integer',
            'nama_supplier' => 'required|string',
            'tanggal' => 'required|date',
            'kode_user' => 'required|exists:users,kode_user',
        ]);

        ReturBarang::create($request->all());

        return redirect()->route('retur_barang.index')->with('success', 'Retur barang berhasil ditambahkan.');
    }

    public function show(ReturBarang $returBarang)
    {
        return view('retur_barang.show', compact('returBarang'));
    }

    public function edit(ReturBarang $returBarang)
    {
        return view('retur_barang.edit', compact('returBarang'));
    }

    public function update(Request $request, ReturBarang $returBarang)
    {
        $request->validate([
            'kode_barang' => 'required|exists:barang,kode_barang',
            'stok' => 'required|integer',
            'nama_supplier' => 'required|string',
            'tanggal' => 'required|date',
            'kode_user' => 'required|exists:users,kode_user',
        ]);

        $returBarang->update($request->all());

        return redirect()->route('retur_barang.index')->with('success', 'Retur barang berhasil diperbarui.');
    }

    public function destroy(ReturBarang $returBarang)
    {
        $returBarang->delete();

        return redirect()->route('retur_barang.index')->with('success', 'Retur barang berhasil dihapus.');
    }
}

