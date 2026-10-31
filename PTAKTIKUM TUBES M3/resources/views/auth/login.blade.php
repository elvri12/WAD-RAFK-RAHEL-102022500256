<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Supplier Bahan Baku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm p-4">
                    <h2 class="h4 fw-bold mb-3 border-bottom pb-2">Login Supplier</h2>

                    @if ($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif

                    <form action="{{ route('login.proses') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Username</label>
                            <input type="text" class="form-control" name="username"
                                   value="{{ old('username') }}" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Masuk</button>
                        <a href="{{ route('supplier.daftar') }}" class="btn btn-link w-100 mt-2">Kembali ke daftar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>