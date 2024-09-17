@extends('layouts.main')

@section('content')
    <h2 class="mb-4">Daftar Jenis Barang</h2>

    <!-- Form Pencarian -->
    <form action="{{ route('jenis.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari nama jenis..." value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </div>
    </form>

    <a href="{{ route('jenis.create') }}" class="btn btn-primary mb-3">Tambah Jenis Barang</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode Jenis</th>
                <th>Nama Jenis</th>
                <th>Kode Kategori</th>
                <th>Kode User</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jenis as $jeni)
                <tr>
                    <td>{{ $jeni->kode_jenis }}</td>
                    <td>{{ $jeni->nama_jenis }}</td>
                    <td>{{ $jeni->kategori->nama_kategori }}</td>
                    <td>{{ $jeni->user->name }}</td>
                    <td>
                        <a href="{{ route('jenis.edit', $jeni->kode_jenis) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('jenis.destroy', $jeni->kode_jenis) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus jenis ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
