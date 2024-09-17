<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" >
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2 class="mb-4">Edit Pengguna</h2>
            <form action="{{ route('user.update', $user->kode_user) }}" method="POST">
                @csrf
                @method('PUT')
                {{-- <div class="mb-3">
                    <label for="kode_user" class="form-label">Kode User</label>
                    <input type="text" class="form-control" id="kode_user" name="kode_user" value="{{ $user->kode_user }}" required readonly>
                </div> --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                </div>
                <div class="mb-3">
                    {{-- <label for="role" class="form-label">Pilih Role Untuk Pengguna</label> --}}
                    <select name="role" id="role" class="form-select">
                        <option selected disabled>Pilih Role Untuk Pengguna</option>
                        <option value="staf_gudang" {{$user->role == 'staf_gudang' ? 'selected' : ''}}>Staf Gudang</option>
                        <option value="kasir" {{$user->role == 'kasir' ? 'selected' : ''}}>Kasir</option>
                        <option value="kepala_toko" {{$user->role == 'kepala_toko' ? 'selected' : ''}}>Kepala Toko</option>
                      </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
