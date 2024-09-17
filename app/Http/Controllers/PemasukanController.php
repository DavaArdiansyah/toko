<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Barang;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Filter based on search input
        $pemasukans = Pemasukan::with('barang')
            ->when($search, function ($query, $search) {
                return $query->whereHas('barang', function ($query) use ($search) {
                    $query->where('nama_barang', 'like', "%{$search}%");
                })
                ->orWhere('jumlah', 'like', "%{$search}%");
            })
            ->get();

        return view('pemasukan.index', compact('pemasukans'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('pemasukan.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $pemasukan = $request->validate([
            'kode_barang' => 'required|exists:barang,kode_barang',
            'jumlah' => 'required|integer|min:1',
        ]);

        Pemasukan::create($pemasukan);
        Barang::find($request->kode_barang)->update(['stok' => $request->jumlah]);

        return redirect()->route('pemasukan.index')->with('success', 'Pemasukan created successfully.');
    }

    public function show($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        return view('pemasukan.show', compact('pemasukan'));
    }

    public function edit($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        $barangs = Barang::all();
        return view('pemasukan.edit', compact('pemasukan', 'barangs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required|exists:barang,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $pemasukan = Pemasukan::findOrFail($id);
        $pemasukan->update($request->all());

        return redirect()->route('pemasukan.index')->with('success', 'Pemasukan updated successfully.');
    }

    public function destroy($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        $pemasukan->delete();

        return redirect()->route('pemasukan.index')->with('success', 'Pemasukan deleted successfully.');
    }
}
