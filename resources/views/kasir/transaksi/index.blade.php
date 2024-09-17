@extends('layouts.main')
@section('content')

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalBarang">
        Cari Barang
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modalBarang" tabindex="-1" aria-labelledby="modalBarangLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
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
                                <th>Jumlah</th>
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
                                        <form action="{{ route('kasir.transaksi.store') }}" method="post">
                                            @csrf
                                            <input type="number" value="1" min="1" max="{{ $b->stok }}"
                                                placeholder="Jumlah" name="jumlah" class="form-control" required>
                                            <input type="hidden" name="kode_barang" value="{{ $b->kode_barang }}">
                                            <input type="hidden" name="kode_transaksi" value="{{ $transaksi }}">
                                    </td>
                                    <td>
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

    <!-- Tabel Transaksi -->
    <table class="table">
        <thead>
            <tr>
                <td>No</td>
                <td>Kode</td>
                <td>Nama</td>
                <td>Jumlah</td>
                <td>Harga</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @if ($detailTransaksi && !$detailTransaksi->isEmpty())
                @foreach ($detailTransaksi as $dt)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->kode_barang }}</td>
                        <td>{{ $dt->barang->nama_barang }}</td>
                        <td>{{ $dt->jumlah }}</td>
                        <td>{{ 'Rp. ' . number_format($dt->total_harga) }}</td>
                        <td>
                            <form action="{{ route('kasir.transaksi.destroy', $transaksi) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="kode_detail_transaksi"
                                    value="{{ $dt->kode_detail_transaksi }}">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center">Belum ada barang yang ditambahkan.</td>
                </tr>
            @endif
        </tbody>
    </table>

    <!-- Form Pembayaran -->
    <div class="card p-3">
        <form action="{{ route('kasir.transaksi.bayar') }}" method="post">
            @csrf
            <input type="hidden" name="kode_transaksi" value="{{ $transaksi }}">
            <div class="form-group row m-2">
                <div class="col-2">
                    <label for="total_harga" class="form-label mt-1">Total Harga: </label>
                </div>
                <div class="col-10">
                    <input type="text" class="form-control" id="total_harga" name="total_harga"
                        value="Rp. {{ number_format($totalHarga) }}" readonly style="width: 300px;">
                </div>
            </div>
            <div class="form-group row m-2">
                <div class="col-2">
                    <label for="total_bayar" class="form-label mt-1">Total Bayar (Rp.): </label>
                </div>
                <div class="col-10">
                    <input type="number" inputmode="numeric" class="form-control" id="total_bayar" name="total_bayar"
                        placeholder="Masukan Nominal Bayar" style="width: 300px;" required oninput="hitungKembalian()">
                </div>
            </div>
            <div class="form-group row m-2">
                <div class="col-2">
                    <label for="kembalian" class="form-label mt-1">Kembalian (Rp.): </label>
                </div>
                <div class="col-10">
                    <input type="text" class="form-control" id="kembalian" name="kembalian" style="width: 300px;"
                        readonly>
                </div>
            </div>
            <div class="form-group row m-2 mt-5">
                <div class="col-2"></div>
                <div class="col-10">
                    <button type="submit" class="btn btn-primary" style="width: 300px;">Bayar</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Script untuk menghitung kembalian -->
    <script>
        function hitungKembalian() {
            let totalHarga = parseInt(document.getElementById('total_harga').value.replace(/[^\d]/g, ''));
            let totalBayar = parseInt(document.getElementById('total_bayar').value);

            if (!isNaN(totalBayar) && totalBayar >= totalHarga) {
                let kembalian = totalBayar - totalHarga;
                document.getElementById('kembalian').value = Math.floor(kembalian);
            } else {
                document.getElementById('kembalian').value = '';
            }
        }
    </script>
@endsection
