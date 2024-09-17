@extends('layouts.main')
@section('content')
    <h2 class="mb-4">Daftar Kategori</h2>
    <!-- Form Pencarian -->
    <form action="{{ route('kategori.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari nama barang..." value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </div>
    </form>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode Kategori</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoris as $kategori)
                <tr>
                    <td>{{ $kategori->kode_kategori }}</td>
                    <td>{{ $kategori->nama_kategori }}</td>
                    <td>
                        <a href="{{ route('kategori.edit', $kategori->kode_kategori) }}"
                            class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kategori.destroy', $kategori->kode_kategori) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
