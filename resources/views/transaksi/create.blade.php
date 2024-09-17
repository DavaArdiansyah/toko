@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>Tambah Transaksi</h2>

        <!-- Form untuk menambahkan transaksi -->
        <form action="{{ route('transaksi.store') }}" method="POST" id="form-transaksi">
            @csrf
            <div id="detail-container">
                <div class="detail-row">
                    @foreach ($barang as $b)
                        <div class="form-group">
                            <label for="barang_{{ $b->kode_barang }}">{{ $b->nama_barang }}</label>
                            <input type="hidden" name="barang[{{ $b->kode_barang }}][kode_barang]"
                                value="{{ $b->kode_barang }}">
                            <input type="number" name="barang[{{ $b->kode_barang }}][jumlah]"
                                id="jumlah_{{ $b->kode_barang }}" placeholder="Jumlah" required>
                            <input type="hidden" name="barang[{{ $b->kode_barang }}][harga]"
                                id="harga_{{ $b->kode_barang }}" value="{{ $b->harga_jual }}">
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="total_harga">Total Harga</label>
                    <input type="text" class="form-control" id="total_harga" readonly>
                </div>

                <div class="form-group">
                    <label for="total_bayar">Total Bayar</label>
                    <input type="number" class="form-control" name="total_bayar" id="total_bayar" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Batal</a>
        </form>
        {{-- <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBarang">
            Cari Barang
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalBarang" tabindex="-1" aria-labelledby="modalBarangLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalBarangLabel">Cari Barang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang as $b)
                                    <tr>
                                        <td>{{ $b->kode_barang }}</td>
                                        <td>{{ $b->nama_barang }}</td>
                                        <td>{{ $b->kategori->nama_kategori }}</td>
                                        <td>{{ $b->harga_jual }}</td>
                                        <td>{{ $b->stok }}</td>
                                        <td>
                                            <form action="{{ route('transaksi.update', $transaksi->kode_transaksi) }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="kode_barang" value="{{ $b->kode_barang }}">
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table for displaying transaction details -->
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Kode Barang</th>
                    <th>Qty</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @if ($transaksi->detailTransaksi)
                    @foreach ($transaksi->detailTransaksi as $dt)
                        <tr>
                            <td>{{ $dt->kode_barang }}</td>
                            <td>{{ $dt->jumlah }}</td>
                            <td>{{ $dt->total_harga }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table> --}}
    </div>
@endsection
