@extends('layouts.main')

@section('content')
    <h2 class="mb-4">Daftar Barang Masuk</h2>

    <!-- Form Pencarian -->
    <form action="{{ route('barang_masuk.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari nama barang atau supplier..."
                value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </div>
    </form>

    <a href="{{ route('barang_masuk.create') }}" class="btn btn-primary mb-3">Tambah Barang Masuk</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Stok</th>
                <th>Nama Supplier</th>
                <th>Tanggal</th>
                <th>Kode User</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangMasuk as $bm)
                <tr>
                    <td>{{ $bm->kode_barang }}</td>
                    <td>{{ $bm->stok }}</td>
                    <td>{{ $bm->nama_supplier }}</td>
                    <td>{{ $bm->tanggal }}</td>
                    <td>{{ $bm->user->name }}</td>
                    <td>
                        <a href="{{ route('barang_masuk.edit', $bm->kode_barang) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('barang_masuk.destroy', $bm->kode_barang) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus barang masuk ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination (if necessary) -->
    {{ $barangMasuk->links() }}
@endsection
