    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Alamat Toko Supplier')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('supplier.daftar') }}">Supplier App</a>
          <ul class="navbar-nav flex-row gap-3 align-items-center">
    <li class="nav-item"><a class="nav-link" href="{{ route('supplier.daftar') }}">Home</a></li>
    @auth
        <li class="nav-item"><a class="nav-link" href="{{ route('supplier.create') }}">Tambah</a></li>
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
            </form>
        </li>
    @else
        <li class="nav-item"><a class="btn btn-outline-primary btn-sm" href="{{ route('login') }}">Login</a></li>
    @endauth
</ul>
        </div>
    </nav>

    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>