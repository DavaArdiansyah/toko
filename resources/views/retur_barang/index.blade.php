@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Daftar Retur Barang</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Button to Add New Retur Barang -->
    <a href="{{ route('retur_barang.create') }}" class="btn btn-primary mb-3">Tambah Retur Barang</a>

    <!-- Retur Barang Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode Jenis</th>
                <th>Kode Kategori</th>
                <th>Stok</th>
                <th>Nama Supplier</th>
                <th>Tanggal</th>
                <th>Kode User</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($returBarang as $item)
                <tr>
                    <td>{{ $item->kode_jenis }}</td>
                    <td>{{ $item->kode_kategori }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>{{ $item->nama_supplier }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->kode_user }}</td>
                    <td>
                        <a href="{{ route('retur_barang.edit', $item->kode_jenis) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('retur_barang.destroy', $item->kode_jenis) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
