<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier - Supplier Bahan Baku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-sm p-4">
                    <h3 class="fw-bold mb-3 border-bottom pb-2">Edit Supplier</h3>

                    @if ($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif

                    <form action="{{ route('supplier.update', $supplier) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-semibold">ID Perusahaan</label>
                            <input type="text" class="form-control"
                                   value="{{ $supplier->ID_Perusahaan }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Supplier</label>
                            <input type="text" class="form-control" name="Nama_Supplier"
                                   value="{{ old('Nama_Supplier', $supplier->Nama_Supplier) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Alamat</label>
                            <textarea class="form-control" name="Alamat" rows="4"
                                      required>{{ old('Alamat', $supplier->Alamat) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">No Telepon</label>
                            <input type="text" class="form-control" name="No_Telepon"
                                   value="{{ old('No_Telepon', $supplier->No_Telepon) }}" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('supplier.daftar') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>