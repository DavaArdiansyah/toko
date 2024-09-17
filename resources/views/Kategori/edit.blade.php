@extends('layouts.main')
@section('content')
    <h2 class="mb-4">Edit Kategori</h2>
    <form action="{{ route('kategori.update', $kategori->kode_kategori) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" id="nama_kategori"
                value="{{ $kategori->nama_kategori }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
