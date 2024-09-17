<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/seodashlogo.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('layouts.sidebar2')
        <!--  Main wrapper -->
        <div class="body-wrapper">
            @include('layouts.header')
            <div class="container-fluid">
                {{-- <div class="card">
                    <div class="card-body">
                        <h5 class="card-title d-flex align-items-center gap-2 mb-4">Traffic Overview
                            <span>
                                <iconify-icon icon="solar:question-circle-bold" class="fs-7 d-flex text-muted" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-success" data-bs-title="Traffic Overview"></iconify-icon>
                            </span>
                        </h5>
                        <div id="traffic-overview"></div>
                    </div>
                </div> --}}
                @yield('content')
                {{-- @include('layouts.footer') --}}
            </div>
        </div>
    </div>
    <script>
        function calculateTotalHarga() {
            let totalHarga = 0;

            // Ambil semua input jumlah dari form
            document.querySelectorAll('[id^="jumlah_"]').forEach(function(input) {
                let kodeBarang = input.id.split('_')[1];
                let hargaBarang = parseFloat(document.querySelector(`#harga_${kodeBarang}`).value) || 0;
                let jumlah = parseInt(input.value) || 0;

                if (jumlah > 0) {
                    totalHarga += hargaBarang * jumlah;
                }
            });

            document.getElementById('total_harga').value = totalHarga.toFixed(2);
        }

        document.getElementById('form-transaksi').addEventListener('submit', function(event) {
            let totalBayar = parseFloat(document.getElementById('total_bayar').value) || 0;
            let totalHarga = parseFloat(document.getElementById('total_harga').value) || 0;

            // Pastikan nilai valid untuk mencegah kesalahan NaN
            if (isNaN(totalBayar) || isNaN(totalHarga) || totalBayar < 0) {
                alert('Harap masukkan data yang valid.');
                event.preventDefault();
                return;
            }

            // Cek apakah total bayar lebih kecil dari total harga
            if (totalBayar < totalHarga) {
                event.preventDefault(); // Mencegah form submit
                alert('Total bayar tidak boleh lebih kecil dari total harga.');
            }
        });

        // Event listener untuk update total harga ketika jumlah berubah
        document.querySelectorAll('[id^="jumlah_"]').forEach(function(input) {
            input.addEventListener('input', calculateTotalHarga);
        });

        // Hitung total harga ketika form pertama kali dibuka
        document.addEventListener('DOMContentLoaded', calculateTotalHarga);
    </script>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
