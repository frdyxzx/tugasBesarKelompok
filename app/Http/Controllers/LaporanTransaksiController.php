<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanTransaksiController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::with(['user', 'cabang'])->latest();

        if ($request->tanggal_awal && $request->tanggal_akhir) {
            $query->whereBetween('tanggal_transaksi', [
                $request->tanggal_awal,
                $request->tanggal_akhir
            ]);
        }

        $transaksis = $query->get();
        $totalPendapatan = $transaksis->sum('total_harga');

        return view('laporan.transaksi', compact('transaksis', 'totalPendapatan'));
    }

    public function cetakPdf(Request $request)
    {
        $query = Transaksi::with(['user', 'cabang'])->latest();

        if ($request->tanggal_awal && $request->tanggal_akhir) {
            $query->whereBetween('tanggal_transaksi', [
                $request->tanggal_awal,
                $request->tanggal_akhir
            ]);
        }

        $transaksis = $query->get();
        $totalPendapatan = $transaksis->sum('total_harga');

        $pdf = Pdf::loadView('laporan.pdf_transaksi', compact('transaksis', 'totalPendapatan'));

        return $pdf->download('laporan-transaksi.pdf');
    }
}
