@extends('layouts.main')
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <div class="row invoice-header">
                    <div class="col-sm-6">
                        <h4>Invoice Detail Transaksi</h4>
                        <p><strong>Kode Transaksi:</strong> {{ $transaksi->kode_transaksi }}</p>
                        <p><strong>Tanggal:</strong> {{ $transaksi->created_at->format('d M Y') }}</p>
                    </div>
                    <div class="col-sm-6 text-end">
                        <h4>Toko Pintar</h4>
                        <p>Jl. Budi No. 123</p>
                        <p>Bandung, Jawa Barat, 12345</p>
                    </div>
                </div>

                <!-- Tabel Detail Transaksi -->
                <table class="table table-bordered invoice-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi->detailTransaksi as $index => $detail)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $detail->barang->nama_barang }}</td>
                                <td>Rp. {{ number_format($detail->barang->harga_jual, 0, ',', '.') }}</td>
                                <td>{{ $detail->jumlah }}</td>
                                <td>Rp. {{ number_format($detail->total_harga, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Bagian Total -->
                <p><strong>Total Harga: </strong>Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                <p><strong>Total Bayar: </strong>Rp. {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</p>
                <p><strong>Kembalian: </strong>Rp. {{ number_format($transaksi->kembalian, 0, ',', '.') }}</p>
                <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>  
            </div>
        </div>
    </div>
    
@endsection