@extends('layouts.main')

@section('content')
    <div class="card p-4">
        <h2 class="mb-4">Tambah Kategori</h2>
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" id="nama_kategori" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
