@extends('layouts.main')
@section('content')
<h2 class="mb-4">Daftar Penjualan</h2>
    <a href="{{ route('penjualan.create') }}" class="btn btn-primary mb-3">Tambah Penjualan</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                {{-- <th>ID</th> --}}
                <th>Nomor Transaksi</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
                <th>Diskon</th>
                <th>Total Bayar</th>
                <th>ID User</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penjualan as $penjualan)
                <tr>
                    {{-- <td>{{ $penjualan->id }}</td> --}}
                    <td>{{ $penjualan->nomor_transaksi }}</td>
                    <td>{{ $penjualan->tanggal }}</td>
                    <td>{{ 'Rp. ' . number_format($penjualan->total_harga, 0, ',', '.') }}</td>
                    <td>{{ number_format($penjualan->diskon, 0, ',', '.') . '%' }}</td>
                    <td>{{ 'Rp. ' . number_format($penjualan->total_bayar, 0, ',', '.') }}</td>
                    <td>{{ $penjualan->user->name }}</td>
                    <td>
                        <a href="{{ route('penjualan.edit', $penjualan->nomor_transaksi) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('penjualan.destroy', $penjualan->nomor_transaksi) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
