<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        // Tangkap input pencarian dari request
        $search = $request->input('search');

        // Jika ada pencarian, filter kategori berdasarkan nama_kategori
        $kategoris = Kategori::when($search, function ($query, $search) {
            return $query->where('nama_kategori', 'like', '%' . $search . '%');
                        //  ->orWhere('kode_kategori', 'like', '%' . $search . '%'); // Menambahkan pencarian berdasarkan kode_kategori jika diperlukan
        })->get();

        return view('kategori.index', compact('kategoris', 'search'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::create([
            'nama_kategori' => $request->input('nama_kategori'),
            'kode_user' => Auth::user()->kode_user
        ]);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function show(Kategori $kategori)
    {
        return view('kategori.show', compact('kategori'));
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori->update($request->all());

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
