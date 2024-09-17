<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JenisController extends Controller
{
    public function index()
    {
        $jenis = Jenis::with('kategori', 'user')->get();
        return view('jenis.index', compact('jenis'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('jenis.create', compact('kategori'));
    }

    public function store(Request $request)
{
    // Validate the input, but remove 'kode_jenis' since it will be generated
    $request->validate([
        'nama_jenis' => 'required',
        'kode_kategori' => 'required',
    ]);

    // Generate the kode_jenis
    $kode_jenis = 'JEN-' . str_pad(Jenis::count() + 1, 4, '0', STR_PAD_LEFT);

    // Create the Jenis entry
    Jenis::create([
        'kode_jenis' => $kode_jenis, // Assign the generated kode_jenis
        'nama_jenis' => $request->input('nama_jenis'),
        'kode_kategori' => $request->input('kode_kategori'),
        'kode_user' => Auth::user()->kode_user
    ]);

    return redirect()->route('jenis.index')->with('success', 'Jenis created successfully.');
}


    public function show(Jenis $jeni)
    {
        return view('jenis.show', compact('jeni'));
    }

    public function edit($id)
{
    $jeni = Jenis::find($id); // Find the specific 'Jenis' entry
    $kategori = Kategori::all(); // Fetch all categories

    return view('jenis.edit', compact('jeni', 'kategori')); // Pass both $jeni and $kategori to the view
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama_jenis' => 'required',
        'kode_kategori' => 'required',
    ]);

    $jenis = Jenis::find($id);
    $jenis->update([
        'nama_jenis' => $request->input('nama_jenis'),
        'kode_kategori' => $request->input('kode_kategori'),
        'kode_user' => Auth::user()->kode_user
    ]);

    return redirect()->route('jenis.index')->with('success', 'Jenis updated successfully.');
}
    

    public function destroy(Jenis $jeni)
    {
        $jeni->delete();

        return redirect()->route('jenis.index')
                         ->with('success', 'Jenis deleted successfully.');
    }
}

