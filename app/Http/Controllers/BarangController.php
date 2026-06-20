<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Cabang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with(['kategori', 'cabang'])->latest()->get();

        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        $cabangs = Cabang::all();

        return view('barang.create', compact('kategoris', 'cabangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'cabang_id' => 'required',
            'kode_barang' => 'required|unique:barangs,kode_barang',
            'nama_barang' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        Barang::create($request->all());

        return redirect()->route('barangs.index')->with('success', 'Data barang berhasil ditambahkan.');
    }

    public function edit(Barang $barang)
    {
        $kategoris = Kategori::all();
        $cabangs = Cabang::all();

        return view('barang.edit', compact('barang', 'kategoris', 'cabangs'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'kategori_id' => 'required',
            'cabang_id' => 'required',
            'kode_barang' => 'required|unique:barangs,kode_barang,' . $barang->id,
            'nama_barang' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        $barang->update($request->all());

        return redirect()->route('barangs.index')->with('success', 'Data barang berhasil diperbarui.');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barangs.index')->with('success', 'Data barang berhasil dihapus.');
    }
}
