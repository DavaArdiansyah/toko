@extends('layouts.main')

@section('content')
    <h2 class="mb-4">Tambah Barang</h2>

    <form action="{{ route('barang.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="kode_barang">Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control" id="kode_barang" required>
        </div>

        <div class="form-group mb-3">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" id="nama_barang" required>
        </div>

        <div class="form-group mb-3">
            <label for="kode_jenis">Jenis Barang</label>
            <select name="kode_jenis" id="kode_jenis" class="form-control" required>
                <option value="">Pilih Jenis Barang</option>
                @foreach ($jenis as $item)
                    <option value="{{ $item->kode_jenis }}">{{ $item->nama_jenis }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="harga_beli">Harga Beli</label>
            <input type="number" name="harga_beli" class="form-control" id="harga_beli" required>
        </div>

        <div class="form-group mb-3">
            <label for="harga_jual">Harga Jual</label>
            <input type="number" name="harga_jual" class="form-control" id="harga_jual" required>
        </div>

        <div class="form-group mb-3">
            <label for="stok">Stok</label>
            <input type="number" name="stok" class="form-control" id="stok" required>
        </div>

        <div class="form-group mb-3">
            <label for="diskon">Diskon (%)</label>
            <input type="number" name="diskon" class="form-control" id="diskon">
        </div>

        <div class="form-group mb-3">
            <label for="kode_user">Kode User</label>
            <select name="kode_user" id="kode_user" class="form-control" required>
                <option value="">Pilih User</option>
                @foreach ($user as $user)
                    <option value="{{ $user->kode_user }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
