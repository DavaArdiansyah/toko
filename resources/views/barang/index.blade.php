@extends('layouts.main')

@section('content')
    <h2 class="mb-4">Daftar Barang</h2>

    <!-- Form Pencarian -->
    <form action="{{ route('barang.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari nama barang..." value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </div>
    </form>

    <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Diskon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangs as $barang)
                <tr>
                    <td>{{ $barang->kode_barang }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->jenis->nama_jenis }}</td>
                    <td>{{ 'Rp. ' . number_format($barang->harga_beli, 2) }}</td>
                    <td>{{ 'Rp. ' . number_format($barang->harga_jual, 2) }}</td>
                    <td>{{ $barang->stok }}</td>
                    <td>{{ number_format($barang->diskon, 2) }}%</td>
                    <td>
                        <a href="{{ route('barang.edit', $barang->kode_barang) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('barang.destroy', $barang->kode_barang) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus barang ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
