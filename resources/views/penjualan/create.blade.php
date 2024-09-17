<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Tambah Penjualan</h2>
    <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nomor_transaksi" class="form-label">Nomor Transaksi</label>
            <input type="text" class="form-control" id="nomor_transaksi" name="nomor_transaksi" required>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="mb-3">
            <label for="total_harga" class="form-label">Total Harga</label>
            <input type="number" class="form-control" id="total_harga" name="total_harga" required>
        </div>
        <div class="mb-3">
            <label for="diskon" class="form-label">Diskon</label>
            <input type="number" class="form-control" id="diskon" name="diskon" required>
        </div>
        <div class="mb-3">
            <label for="total_bayar" class="form-label">Total Bayar</label>
            <input type="number" class="form-control" id="total_bayar" name="total_bayar" required>
        </div>
        <div class="mb-3">
            <label for="id_user" class="form-label">ID User</label>
            <select class="form-select" id="id_user" name="id_user" required>
                <option value="">Pilih User</option>
                @foreach($users as $user)
                    <option value="{{ $user->kode_user }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
