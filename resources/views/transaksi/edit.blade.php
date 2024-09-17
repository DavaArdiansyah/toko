<!-- resources/views/transaksi/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2 class="mb-4">Edit Transaksi</h2>
            <form action="{{ route('transaksi.update', $transaksi->kode_transaksi) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="kode_transaksi" class="form-label">Kode Transaksi</label>
                    <input type="text" class="form-control" id="kode_transaksi" name="kode_transaksi" value="{{ $transaksi->kode_transaksi }}" required>
                </div>
                <div class="mb-3">
                    <label for="kode_barang" class="form-label">Barang</label>
                    <select class="form-select" id="kode_barang" name="kode_barang" required>
                        @foreach($barangs as $barang)
                            <option value="{{ $barang->kode_barang }}" {{ $barang->kode_barang == $transaksi->kode_barang ? 'selected' : '' }}>
                                {{ $barang->nama_barang }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                    <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" value="{{ $transaksi->jumlah_barang }}" required>
                </div>
                <div class="mb-3">
                    <label for="total_harga" class="form-label">Total Harga</label>
                    <input type="number" class="form-control" id="total_harga" name="total_harga" value="{{ $transaksi->total_harga }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
