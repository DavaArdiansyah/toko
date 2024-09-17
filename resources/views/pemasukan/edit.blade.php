<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pemasukan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2 class="mb-4">Edit Pemasukan</h2>
            <form action="{{ route('pemasukan.update', $pemasukan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="kode_barang" class="form-label">Barang</label>
                    <select class="form-select" id="kode_barang" name="kode_barang" required>
                        @foreach($barangs as $barang)
                            <option value="{{ $barang->id }}" {{ $barang->id == $pemasukan->id_barang ? 'selected' : '' }}>
                                {{ $barang->nama_barang }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $pemasukan->jumlah }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
