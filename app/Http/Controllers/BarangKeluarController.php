<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluars = BarangKeluar::with(['barang', 'user'])->latest()->get();

        return view('barang_keluar.index', compact('barangKeluars'));
    }

    public function create()
    {
        $barangs = Barang::all();

        return view('barang_keluar.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'tanggal_keluar' => 'required|date',
            'jumlah' => 'required|numeric|min:1',
            'keterangan' => 'nullable',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        if ($barang->stok < $request->jumlah) {
            return back()->with('error', 'Stok tidak mencukupi.');
        }

        BarangKeluar::create([
            'barang_id' => $request->barang_id,
            'user_id' => auth()->id(),
            'tanggal_keluar' => $request->tanggal_keluar,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
        ]);

        $barang->stok = $barang->stok - $request->jumlah;
        $barang->save();

        return redirect()->route('barang-keluars.index')
            ->with('success', 'Data barang keluar berhasil ditambahkan.');
    }

    public function destroy(BarangKeluar $barangKeluar)
    {
        $barang = $barangKeluar->barang;

        if ($barang) {
            $barang->stok += $barangKeluar->jumlah;
            $barang->save();
        }

        $barangKeluar->delete();

        return redirect()->route('barang-keluars.index')
            ->with('success', 'Data barang keluar berhasil dihapus.');
    }
}
