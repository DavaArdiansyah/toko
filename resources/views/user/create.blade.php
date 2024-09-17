<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title> 
       <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" >

</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2 class="mb-4">Tambah Pengguna</h2>
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                {{-- <div class="mb-3">
                    <label for="kode_user" class="form-label">Kode User</label>
                    <input type="text" class="form-control" id="kode_user" name="kode_user" required>
                </div> --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required minlength="8">
                </div>
                <div class="mb-3">
                    {{-- <label for="role" class="form-label">Pilih Role Untuk Pengguna</label> --}}
                    <select name="role" id="role" class="form-select">
                      <option selected disabled>Pilih Role Untuk Pengguna</option>
                      <option value="staf_gudang">Staf Gudang</option>
                      <option value="kasir">Kasir</option>
                      <option value="kepala_toko">Kepala Toko</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
