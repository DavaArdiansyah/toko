@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Edit Retur Barang</h2>

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

    <form action="{{ route('retur_barang.update', $returBarang->kode_jenis) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="kode_jenis" class="form-label">Kode Jenis</label>
            <input type="text" name="kode_jenis" id="kode_jenis" class="form-control" value="{{ old('kode_jenis', $returBarang->kode_jenis) }}" required>
        </div>

        <div class="mb-3">
            <label for="kode_kategori" class="form-label">Kode Kategori</label>
            <input type="text" name="kode_kategori" id="kode_kategori" class="form-control" value="{{ old('kode_kategori', $returBarang->kode_kategori) }}" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" value="{{ old('stok', $returBarang->stok) }}" required>
        </div>

        <div class="mb-3">
            <label for="nama_supplier" class="form-label">Nama Supplier</label>
            <input type="text" name="nama_supplier" id="nama_supplier" class="form-control" value="{{ old('nama_supplier', $returBarang->nama_supplier) }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal', $returBarang->tanggal) }}" required>
        </div>

        <div class="mb-3">
            <label for="kode_user" class="form-label">Kode User</label>
            <select name="kode_user" id="kode_user" class="form-control" required>
                <option value="" selected disabled>Pilih User</option>
                @foreach ($users as $user)
                    <option value="{{ $user->kode_user }}" {{ $user->kode_user == $returBarang->kode_user ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Retur Barang</button>
    </form>
</div>
@endsection