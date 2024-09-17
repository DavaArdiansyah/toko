@extends('layouts.main')

@section('content')
    <h2 class="mb-4">Edit Jenis Barang</h2>

    <form action="{{ route('jenis.update', $jeni->kode_jenis) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="kode_jenis">Kode Jenis</label>
            <input type="text" name="kode_jenis" class="form-control" id="kode_jenis" value="{{ $jeni->kode_jenis }}" readonly>
        </div>

        <div class="form-group mb-3">
            <label for="nama_jenis">Nama Jenis</label>
            <input type="text" name="nama_jenis" class="form-control" id="nama_jenis" value="{{ $jeni->nama_jenis }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="kode_kategori">Kode Kategori</label>
            <select name="kode_kategori" id="kode_kategori" class="form-control">
                @foreach($kategori as $k)
                    <option value="{{ $k->kode_kategori }}" {{ $jeni->kode_kategori == $k->kode_kategori ? 'selected' : '' }}>
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection