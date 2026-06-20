<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangMasuks = BarangMasuk::with(['barang', 'user'])->latest()->get();

        return view('barang_masuk.index', compact('barangMasuks'));
    }

    public function create()
    {
        $barangs = Barang::all();

        return view('barang_masuk.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'tanggal_masuk' => 'required|date',
            'jumlah' => 'required|numeric|min:1',
            'keterangan' => 'nullable',
        ]);

        BarangMasuk::create([
            'barang_id' => $request->barang_id,
            'user_id' => auth()->id(),
            'tanggal_masuk' => $request->tanggal_masuk,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
        ]);

        $barang = Barang::findOrFail($request->barang_id);
        $barang->stok += $request->jumlah;
        $barang->save();

        return redirect()->route('barang-masuks.index')
            ->with('success', 'Data barang masuk berhasil ditambahkan dan stok diperbarui.');
    }

    public function destroy(BarangMasuk $barangMasuk)
    {
        $barang = $barangMasuk->barang;

        if ($barang) {
            $barang->stok -= $barangMasuk->jumlah;

            if ($barang->stok < 0) {
                $barang->stok = 0;
            }

            $barang->save();
        }

        $barangMasuk->delete();

        return redirect()->route('barang-masuks.index')
            ->with('success', 'Data barang masuk berhasil dihapus dan stok diperbarui.');
    }
}
