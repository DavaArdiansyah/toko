@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Tambah Barang Masuk</h2>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang_masuk.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="kode_barang" class="form-label">Kode Barang</label>
            <input type="text" name="kode_barang" id="kode_barang" class="form-control" value="{{ old('kode_barang') }}" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" value="{{ old('stok') }}" required>
        </div>

        <div class="mb-3">
            <label for="nama_supplier" class="form-label">Nama Supplier</label>
            <input type="text" name="nama_supplier" id="nama_supplier" class="form-control" value="{{ old('nama_supplier') }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Barang</button>
        <a href="{{ route('jenis.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
