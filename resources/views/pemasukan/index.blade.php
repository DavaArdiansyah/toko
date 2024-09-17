@extends('layouts.main')
@section('content')
<h2 class="mb-4">Daftar Pemasukan</h2>
<!-- Form Pencarian -->
            <form action="{{ route('pemasukan.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari pengguna..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>
            <a href="{{ route('pemasukan.create') }}" class="btn btn-primary mb-3">Tambah Pemasukan</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pemasukans as $pemasukan)
                        <tr>
                            <td>{{ $pemasukan->barang->nama_barang }}</td>
                            <td>{{ number_format($pemasukan->jumlah) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
@endsection
