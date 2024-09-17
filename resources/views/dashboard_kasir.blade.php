@extends('layouts.main')

@section('content')
    <h1>Dashboard KASIR</h1>
    <div class="dashboard">
        <div class="stat-box">
            <a href="{{route('kasir.transaksi.new')}}" class="box">
                <p>transaksi</p>
            </a>
        </div>
    </div>
    {{-- <table class="table table-bordered">
        <thead>
        <tr>
            <th>Kode User</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th> --}}
            {{-- <th>Aksi</th> --}}
        {{-- </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->kode_user }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td> --}}
                {{-- <td>
                    <a href="{{ route('user.edit', $user->kode_user) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('user.destroy', $user->kode_user) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pengguna ini?')">Hapus</button>
                    </form>
                </td> --}}
            {{-- </tr>
        @endforeach
        </tbody>
    </table> --}}

    <style>
        .dashboard {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .stat-box {
            flex: 1;
            margin: 10px;
        }

        .stat-box .box {
            display: block;
            text-align: center;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            text-decoration: none;
            color: #343a40;
        }

        .stat-box .box h2 {
            font-size: 48px;
            margin: 0;
            color: #343a40;
        }

        .stat-box .box p {
            font-size: 18px;
            margin: 0;
            color: #6c757d;
        }

        .box:hover {
            background-color: #e9ecef;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .login-details {
            margin-top: 20px;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ced4da;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .login-details h3 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #343a40;
        }

        .login-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .login-details table th,
        .login-details table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        .login-details table th {
            width: 150px;
            color: #495057;
        }

        .login-details table td {
            color: #212529;
        }
    </style>
@endsection
