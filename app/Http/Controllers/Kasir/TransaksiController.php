<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function new()
    {
        $transaksi = Transaksi::where('total_bayar', null)->where('kode_user', Auth::user()->kode_user)->first();

        if (!$transaksi) {
            $transaksi = Transaksi::create([
                'kode_user' => Auth::user()->kode_user,
                'total_harga' => 0,
            ]);
        }

        return redirect()->route('kasir.transaksi.index', ['transaksi' => $transaksi->kode_transaksi]);
    }

    public function index($transaksi)
    {
        $barang = Barang::all();
        $totalHarga = Transaksi::find($transaksi)->total_harga;
        $detailTransaksi = DetailTransaksi::where('kode_transaksi', $transaksi)->get();
        return view('kasir.transaksi.index', compact('transaksi', 'totalHarga', 'barang', 'detailTransaksi'));
    }

    public function store(Request $request)
    {
        $transaksi = Transaksi::find($request->kode_transaksi);
        $detailTransaksi = DetailTransaksi::where('kode_transaksi', $request->kode_transaksi)->where('kode_barang', $request->kode_barang)->first();
        $barang = Barang::find($request->kode_barang);
        if ($detailTransaksi) {
            $jumlah = $detailTransaksi->jumlah + $request->jumlah;
            $totalDetail = $barang->harga_jual * $jumlah;
            $detailTransaksi->update([
                'jumlah' => $jumlah,
                'total_harga' => $totalDetail,
            ]);
        } else {
            $totalDetail = $barang->harga_jual * $request->jumlah;
            DetailTransaksi::create([
                'kode_transaksi' => $request->kode_transaksi,
                'kode_barang' => $request->kode_barang,
                'jumlah' => $request->jumlah,
                'total_harga' => $totalDetail,
            ]);
        }
        $totalTransaksi = DetailTransaksi::where('kode_transaksi', $request->kode_transaksi)->sum('total_harga');
        $transaksi->update([
            'total_harga' => $totalTransaksi,
        ]);
        return redirect()->route('kasir.transaksi.index', ['transaksi' => $request->kode_transaksi]);
    }

    public function destroy(Request $request, Transaksi $transaksi)
    {
        // $transaksi->delete();
        $detailTransaksi = DetailTransaksi::find($request->kode_detail_transaksi);
        $totalDetail = $detailTransaksi->total_harga;
        $totalTransaksi = $transaksi->total_harga;
        $detailTransaksi->delete();
        $transaksi->update([
            'total_harga' => $totalTransaksi - $totalDetail,
        ]);

        return redirect()->back();
    }

    public function bayar(Request $request)
    {
        $transaksi = Transaksi::find($request->kode_transaksi);
        if ($transaksi->detailTransaksi->isEmpty()) {
            return redirect()->back();
        }
        $transaksi->update([
            'total_bayar' => $request->total_bayar,
            'kembalian' => $request->kembalian,
        ]);
        return redirect()->route('transaksi.show', ['transaksi' => $transaksi]);
    }
}
