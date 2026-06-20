<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['user', 'cabang'])
            ->latest()
            ->get();

        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $barangs = Barang::where('stok', '>', 0)->get();

        return view('transaksi.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|array',
            'jumlah' => 'required|array',
            'bayar' => 'required|numeric',
        ]);

        DB::beginTransaction();

        try {
            $totalHarga = 0;

            foreach ($request->barang_id as $index => $barangId) {
                $barang = Barang::findOrFail($barangId);
                $jumlah = $request->jumlah[$index];

                if ($barang->stok < $jumlah) {
                    return back()->with('error', 'Stok barang ' . $barang->nama_barang . ' tidak mencukupi.');
                }

                $totalHarga += $barang->harga_jual * $jumlah;
            }

            if ($request->bayar < $totalHarga) {
                return back()->with('error', 'Jumlah bayar kurang dari total harga.');
            }

            $transaksi = Transaksi::create([
                'cabang_id' => auth()->user()->cabang_id,
                'user_id' => auth()->id(),
                'kode_transaksi' => 'TRX-' . time(),
                'tanggal_transaksi' => now()->format('Y-m-d'),
                'total_harga' => $totalHarga,
                'bayar' => $request->bayar,
                'kembalian' => $request->bayar - $totalHarga,
            ]);

            foreach ($request->barang_id as $index => $barangId) {
                $barang = Barang::findOrFail($barangId);
                $jumlah = $request->jumlah[$index];
                $subtotal = $barang->harga_jual * $jumlah;

                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->id,
                    'barang_id' => $barang->id,
                    'jumlah' => $jumlah,
                    'harga_satuan' => $barang->harga_jual,
                    'subtotal' => $subtotal,
                ]);

                $barang->stok -= $jumlah;
                $barang->save();
            }

            DB::commit();

            return redirect()->route('transaksis.index')
                ->with('success', 'Transaksi berhasil disimpan.');

        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', 'Transaksi gagal: ' . $e->getMessage());
        }
    }
}
