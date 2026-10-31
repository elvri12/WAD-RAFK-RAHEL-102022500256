<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alamat Toko Vendor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-custom { background-color: #212529; }
        .navbar-custom .nav-link { color: rgba(255, 255, 255, 0.75); }
        .navbar-custom .nav-link:hover,
        .navbar-custom .nav-link.active { color: #fff; }
        .navbar-custom form .nav-link { background: none; border: 0; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">Vendor</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a @class(['nav-link', 'active' => request()->is('/')]) href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a @class(['nav-link', 'active' => request()->routeIs('supplier.daftar')])
                       href="{{ route('supplier.daftar') }}">Daftar Supplier</a>
                </li>
                @auth
                    <li class="nav-item">
                        <form action="{{ url('/logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link">Logout ({{ Auth::user()->username }})</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a @class(['nav-link', 'active' => request()->is('login')])
                           href="{{ url('/login') }}">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Alamat Toko Vendor</h1>
        @auth
            <a href="{{ route('supplier.create') }}" class="btn btn-primary">+ Tambah Vendor</a>
        @endauth
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive bg-white p-3 border rounded-1">
        <table class="table table-bordered table-striped align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th scope="col" class="text-center" style="width: 5%;">No</th>
                    <th scope="col" style="width: 15%;">ID Perusahaan</th>
                    <th scope="col" style="width: 25%;">Nama Supplier</th>
                    <th scope="col" style="width: 30%;">Alamat</th>
                    <th scope="col" style="width: 15%;">No Telepon</th>
                    @auth
                        <th scope="col" class="text-center" style="width: 15%;">Aksi</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @forelse ($suppliers as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->ID_Perusahaan }}</td>
                        <td>{{ $item->Nama_Supplier }}</td>
                        <td>{{ $item->Alamat }}</td>
                        <td>{{ $item->No_Telepon }}</td>
                        @auth
                            <td class="text-center">
                                <a href="{{ route('supplier.edit', $item->ID_Perusahaan) }}"
                                   class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('supplier.destroy', $item->ID_Perusahaan) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        @endauth
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada data vendor.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>