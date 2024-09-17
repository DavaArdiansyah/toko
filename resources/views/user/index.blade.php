@extends('layouts.main')
@section('content')
<h2 class="mb-4">Daftar Pengguna</h2>

<!-- Form Pencarian -->
<form action="{{ route('user.index') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Cari pengguna..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </div>
</form>

<a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah Pengguna</a>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>Kode User</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    @if($users->count())
        @foreach($users as $user)
            <tr>
                <td>{{ $user->kode_user }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="{{ route('user.edit', $user->kode_user) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('user.destroy', $user->kode_user) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pengguna ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="5" class="text-center">Pengguna tidak ditemukan.</td>
        </tr>
    @endif
    </tbody>
</table>

@endsection
