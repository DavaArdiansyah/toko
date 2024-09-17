@extends('layouts.main')
@section('content')
<h2 class="mb-4">Daftar Transaksi</h2>
            <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Transaksi</th>
                        <th>Nama User</th>
                        <th>Tanggal Transaksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksis as $transaksi)
                        <tr>
                            <td>{{ $transaksi->kode_transaksi }}</td>
                            <td>{{ $transaksi->user->name }}</td>
                            <td>{{ $transaksi->created_at->format('M d y') }}</td>
                            <td><a href="{{route ('transaksi.show', $transaksi->kode_transaksi)}}">Detail</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
@endsection
