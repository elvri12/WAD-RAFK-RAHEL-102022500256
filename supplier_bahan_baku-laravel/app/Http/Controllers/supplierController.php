<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function daftar()
    {
        $suppliers = Supplier::orderBy('ID_Perusahaan')->get();
        return view('supplier.daftar', compact('suppliers'));
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ID_Perusahaan' => 'required|max:10|unique:supplier,ID_Perusahaan',
            'Nama_Supplier' => 'required|max:100',
            'Alamat'        => 'required|max:200',
            'No_Telepon'    => 'required|max:20',
        ]);

        Supplier::create($data);

        return redirect()->route('supplier.daftar')
            ->with('success', 'Supplier berhasil ditambahkan.');
    }

    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $data = $request->validate([
            'Nama_Supplier' => 'required|max:100',
            'Alamat'        => 'required|max:200',
            'No_Telepon'    => 'required|max:20',
        ]);

        $supplier->update($data);

        return redirect()->route('supplier.daftar')
            ->with('success', 'Supplier berhasil diperbarui.');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('supplier.daftar')
            ->with('success', 'Supplier berhasil dihapus.');
    }
}