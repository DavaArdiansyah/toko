<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qasir: Solusi Kasir Modern untuk Bisnis Anda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .header-bg {
            /* background-image: url('../img/Aplikasi-kasir-toko.jpg');      */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 60vh;
            color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
        }

        .header-bg h1 {
            font-size: 4rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .header-bg p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }
        .header-bg a {
            padding: 0.75rem 2rem;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border-radius: 9999px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .header-bg a:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }
    </style>
</head>
<body class="bg-gray-100">
    <header class="bg-blue-600 text-white sticky top-0">
        <nav class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div class="text-2xl font-bold">Qasir</div>
            <div>
                <a href="#fitur" class="mx-3 hover:text-blue-200">Fitur</a>
                <a href="#harga" class="mx-3 hover:text-blue-200">Harga</a>
                <a href="#kontak" class="mx-3 hover:text-blue-200">Kontak</a>
                {{-- <a href="/dash" class="mx-3 hover:text-blue-200">Dashboard</a --}}
                <a href="/login" class="mx-3 hover:text-blue-200">Login</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="header-bg">
            <h1>Kelola Bisnis Anda dengan Mudah</h1>
            <p>Qasir: Solusi kasir modern yang memudahkan pengelolaan transaksi dan inventori</p>
            <a href="#">Mulai Sekarang</a>
        </section>

        <section id="fitur" class="bg-white py-16">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold mb-8 text-center">Tentang Kami</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-gray-100 p-6 rounded-lg">
                        <h3 class="text-xl font-semibold mb-4">Manajemen Inventori</h3>
                        <p>Kasir digital memudahkan transaksi bisnis modern. Sistem canggih ini mengoptimalkan proses penjualan dan inventori. Pemilik usaha dapat memantau kinerja secara real-time, meningkatkan efisiensi operasional. Antarmuka intuitif memungkinkan karyawan bekerja lebih cepat, mengurangi waktu tunggu pelanggan. Laporan terperinci membantu pengambilan keputusan strategis, mendorong pertumbuhan bisnis.</p>
                    </div>
                    <div class="bg-gray-100 p-6 rounded-lg">
                        <h3 class="text-xl font-semibold mb-4">Integrasi Pembayaran</h3>
                        <p>Integrasi pembayaran digital memperluas opsi transaksi, memuaskan preferensi pelanggan beragam. Manajemen stok otomatis mencegah kehabisan barang, mengoptimalkan pemesanan. Analisis data penjualan mengungkap tren konsumen, memungkinkan personalisasi penawaran. Keamanan tingkat tinggi melindungi informasi sensitif, membangun kepercayaan pelanggan.</p>
                    </div>
                    <div class="bg-gray-100 p-6 rounded-lg">
                        <h3 class="text-xl font-semibold mb-4">Tentang Kita</h3>
                        <p>Login: Pengguna (kasir) masuk ke sistem menggunakan akun yang telah terdaftar.

                            Input Data Produk: Barang-barang yang akan dijual dimasukkan ke dalam sistem, termasuk harga, deskripsi, dan stok.

                            Penerimaan Pesanan: Kasir menerima pesanan dari pelanggan, kemudian mencatatnya di sistem e-Kasir. Ini bisa dilakukan dengan memindai barcode produk atau mencari produk secara manual di database.

                            Penambahan Barang ke Keranjang: Setiap produk yang dipesan oleh pelanggan ditambahkan ke dalam keranjang belanja di sistem.

                            Penghitungan Total: Sistem secara otomatis menghitung total belanja berdasarkan barang-barang yang ada di keranjang, termasuk pajak dan diskon jika ada.

                            Pembayaran: Setelah total belanja dihitung, pelanggan melakukan pembayaran. E-Kasir dapat menerima berbagai metode pembayaran, seperti tunai, kartu kredit/debit, atau e-wallet.

                            Cetak Struk: Setelah pembayaran selesai, struk transaksi dicetak dan diberikan kepada pelanggan sebagai bukti pembelian.

                            Update Stok: Sistem e-Kasir akan secara otomatis memperbarui stok barang berdasarkan transaksi yang telah dilakukan.

                            Laporan Penjualan: Sistem e-Kasir juga dapat menghasilkan laporan penjualan harian, mingguan, atau bulanan untuk membantu pemilik bisnis dalam memantau performa penjualan dan mengelola inventaris.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="harga" class="py-16">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold mb-8 text-center">Pilihan Paket</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold mb-4">Paket Dasar</h3>
                        <p class="text-3xl font-bold mb-4">Rp 99.000<span class="text-sm font-normal">/bulan</span></p>
                        <ul class="mb-6">
                            <li class="mb-2">✅ 1 Perangkat</li>
                            <li class="mb-2">✅ Manajemen Inventori Dasar</li>
                            <li class="mb-2">✅ Laporan Bulanan</li>
                        </ul>
                        <a href="#" class="block text-center bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition duration-300">Pilih Paket</a>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md border-2 border-blue-600">
                        <h3 class="text-xl font-semibold mb-4">Paket Bisnis</h3>
                        <p class="text-3xl font-bold mb-4">Rp 199.000<span class="text-sm font-normal">/bulan</span></p>
                        <ul class="mb-6">
                            <li class="mb-2">✅ 3 Perangkat</li>
                            <li class="mb-2">✅ Manajemen Inventori Lanjutan</li>
                            <li class="mb-2">✅ Laporan Harian</li>
                            <li class="mb-2">✅ Dukungan Prioritas</li>
                        </ul>
                        <a href="#" class="block text-center bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition duration-300">Pilih Paket</a>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold mb-4">Paket Enterprise</h3>
                        <p class="text-3xl font-bold mb-4">Hubungi Kami</p>
                        <ul class="mb-6">
                            <li class="mb-2">✅ Perangkat Tak Terbatas</li>
                            <li class="mb-2">✅ Fitur Kustom</li>
                            <li class="mb-2">✅ Integrasi API</li>
                            <li class="mb-2">✅ Pelatihan Tim</li>
                        </ul>
                        <a href="#" class="block text-center bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition duration-300">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="kontak" class="bg-blue-600 text-white py-16">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold mb-8">Siap Meningkatkan Bisnis Anda?</h2>
                <p class="mb-8">Hubungi tim kami untuk demo gratis dan konsultasi</p>
                <a href="#" class="bg-white text-blue-600 py-2 px-6 rounded-full hover:bg-gray-200 transition duration-300">Hubungi Kami</a>
            </div>
        </section>
    </main>

    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2024 Qasir. Hak Cipta Dilindungi.</p>
        </div>
    </footer>
</body>
</html>
