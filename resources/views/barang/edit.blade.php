@extends('layouts.main')

@section('content')
    <h2 class="mb-4">Edit Barang</h2>

    <form action="{{ route('barang.update', $barang->kode_barang) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="kode_barang">Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control" id="kode_barang" value="{{ $barang->kode_barang }}" disabled>
        </div>

        <div class="form-group mb-3">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" id="nama_barang" value="{{ $barang->nama_barang }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="kode_jenis">Jenis Barang</label>
            <select name="kode_jenis" id="kode_jenis" class="form-control" required>
                <option value="">Pilih Jenis Barang</option>
                @foreach ($jenis as $item)
                    <option value="{{ $item->kode_jenis }}" {{ $barang->kode_jenis == $item->kode_jenis ? 'selected' : '' }}>
                        {{ $item->nama_jenis }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="harga_beli">Harga Beli</label>
            <input type="number" name="harga_beli" class="form-control" id="harga_beli" value="{{ $barang->harga_beli }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="harga_jual">Harga Jual</label>
            <input type="number" name="harga_jual" class="form-control" id="harga_jual" value="{{ $barang->harga_jual }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="stok">Stok</label>
            <input type="number" name="stok" class="form-control" id="stok" value="{{ $barang->stok }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="diskon">Diskon (%)</label>
            <input type="number" name="diskon" class="form-control" id="diskon" value="{{ $barang->diskon }}">
        </div>

        <div class="form-group mb-3">
            <label for="kode_user">Kode User</label>
            <select name="kode_user" id="kode_user" class="form-control" required>
                <option value="">Pilih User</option>
                @foreach ($users as $user)
                    <option value="{{ $user->kode_user }}" {{ $barang->kode_user == $user->kode_user ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
