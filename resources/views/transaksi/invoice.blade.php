<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice Transaksi</title>
    <!-- Tambahkan CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .invoice-header {
            margin-bottom: 30px;
        }
        .invoice-table th, .invoice-table td {
            padding: 10px;
        }
        .total-section {
            text-align: right;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <div class="row invoice-header">
                <div class="col-sm-6">
                    <h4>Invoice</h4>
                    <p><strong>Kode Transaksi:</strong> {{ $transaksi->kode_transaksi }}</p>
                    <p><strong>Tanggal:</strong> {{ $transaksi->created_at->format('d M Y') }}</p>
                </div>
                <div class="col-sm-6 text-end">
                    <h4>Toko ABC</h4>
                    <p>Jl. Contoh Alamat No. 123</p>
                    <p>Kota, Provinsi, 12345</p>
                </div>
            </div>

            <!-- Tabel Detail Transaksi -->
            <table class="table table-bordered invoice-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi->detailTransaksi as $index => $detail)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $detail->barang->nama_barang }}</td>
                        <td>Rp. {{ number_format($detail->barang->harga_jual, 0, ',', '.') }}</td>
                        <td>{{ $detail->jumlah }}</td>
                        <td>Rp. {{ number_format($detail->total_harga, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Bagian Total -->
            <div class="row mt-4">
                <div class="col-sm-6"></div>
                <div class="col-sm-6 total-section">
                    <p><strong>Total Harga: </strong>Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                    <p><strong>Total Bayar: </strong>Rp. {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</p>
                    <p><strong>Kembalian: </strong>Rp. {{ number_format($transaksi->kembalian, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan JS Bootstrap (jika diperlukan) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

