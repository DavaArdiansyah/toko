@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Detail Pemasukan</h2>

    <a href="{{ route('detail_pemasukan.create') }}" class="btn btn-success mb-3">Tambah Detail Pemasukan</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode Transaksi</th>
                <th>Kode Barang</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $detail)
            <tr>
                <td>{{ $detail->kode_transaksi }}</td>
                <td>{{ $detail->kode_barang }}</td>
                <td>{{ $detail->jumlah }}</td>
                <td>{{ number_format($detail->total_harga, 2, ',', '.') }}</td>
                <td>
                    <a href="{{ route('detail_pemasukan.edit', $detail->id) }}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('detail_pemasukan.destroy', $detail->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
