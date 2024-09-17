<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        // return redirect()->route('transaksi.create');
        $transaksis = Transaksi::all();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $barang = Barang::all();
        // $transaksi = Transaksi::create([
        //     'kode_user' => Auth::user()->kode_user,
        // ]);
        // return view('transaksi.create', compact('barang', 'transaksi'));
        return view('transaksi.create', compact('barang'));
    }

    public function store(Request $request)
    // {
    //     return $request;
    // }
    {
        // Validasi jika total bayar lebih kecil dari total harga
        $total_harga_transaksi = 0;
        foreach ($request->barang as $item) {
            $barang = Barang::where('kode_barang', $item['kode_barang'])->first();
            if ($barang) {
                $jumlah = $item['jumlah'];
                $total_harga_transaksi += $barang->harga_jual * $jumlah;
            }
        }

        // Validasi total bayar
        if ($request->total_bayar < $total_harga_transaksi) {
            return redirect()->back()->withErrors(['total_bayar' => 'Total bayar tidak boleh lebih kecil dari total harga transaksi'])
                ->withInput();
        }

        // Simpan transaksi utama
        $transaksi = Transaksi::create([
            'total_bayar' => $request->total_bayar,
            'total_harga' => $total_harga_transaksi,
            'kode_user' => Auth::user()->kode_user,
            'kembalian' => $request->total_bayar - $total_harga_transaksi,
        ]);

        // Simpan detail transaksi
        foreach ($request->barang as $item) {
            $barang = Barang::where('kode_barang', $item['kode_barang'])->first();
            if ($barang) {
                $jumlah = $item['jumlah'];
                $total_harga = $barang->harga_jual * $jumlah;

                DetailTransaksi::create([
                    'kode_transaksi' => $transaksi->kode_transaksi,
                    'kode_barang' => $item['kode_barang'],
                    'jumlah' => $jumlah,
                    'total_harga' => $total_harga,
                ]);
            }
        }

        // Redirect ke halaman invoice
        return view('transaksi.show', compact('transaksi'));
    }

    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $barangs = Barang::all();
        return view('transaksi.edit', compact('transaksi', 'barangs'));
    }

    public function update(Request $request, Transaksi $transaksi)
    // {
    //     // Validasi kode_barang dari request
    //     $barang = Barang::find($request->kode_barang);

    //     if (!$barang) {
    //         return redirect()->back()->withErrors('Barang tidak ditemukan.');
    //     }

    //     // Ambil jumlah dari request, jika tidak ada, gunakan nilai default 1
    //     $jumlah = $request->jumlah ?? 1;
    //     $totalHarga = $barang->harga_jual * $jumlah;

    //     // Cek jika sudah ada DetailTransaksi dengan kode barang yang sama
    //     $existingDetail = DetailTransaksi::where('kode_transaksi', $transaksi->kode_transaksi)
    //         ->where('kode_barang', $request->kode_barang)
    //         ->first();

    //     if ($existingDetail) {
    //         // Jika barang sudah ada di transaksi, update jumlah dan total_harga
    //         $existingDetail->update([
    //             'jumlah' => $existingDetail->jumlah + $jumlah,
    //             'total_harga' => ($existingDetail->jumlah + $jumlah) * $barang->harga_jual,
    //         ]);
    //     } else {
    //         // Jika barang belum ada, buat DetailTransaksi baru
    //         DetailTransaksi::create([
    //             'kode_transaksi' => $transaksi->kode_transaksi,
    //             'kode_barang' => $request->kode_barang,
    //             'jumlah' => $jumlah,
    //             'total_harga' => $totalHarga,
    //         ]);
    //     }

    //     // Update total_harga transaksi berdasarkan DetailTransaksi
    //     $totalHargaTransaksi = DetailTransaksi::where('kode_transaksi', $transaksi->kode_transaksi)
    //         ->sum('total_harga');

    //     $transaksi->update([
    //         'total_harga' => (float)$totalHargaTransaksi,
    //     ]);

    //     return redirect()->back();
    // }

    {
        $request->validate([
            // 'kode_transaksi' => 'required|unique:transaksi,kode_transaksi,' . $id. 'kode_transaksi|max:250',
            'kode_barang' => 'required|exists:barang,kode_barang',
            'jumlah_barang' => 'required|integer|min:1',
            'total_harga' => 'required|numeric|min:0',
        ]);
        $transaksi = Transaksi::findOrFail($id);

        // Update transaksi dengan data yang baru
        $transaksi->update([
            'kode_transaksi' => $request->kode_transaksi,
            'kode_barang' => $request->kode_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'total_harga' => $request->total_harga,
        ]);

        // $transaksi = Transaksi::findOrFail($id);
        // $transaksi->update($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi updated successfully.');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi deleted successfully.');
    }
}
