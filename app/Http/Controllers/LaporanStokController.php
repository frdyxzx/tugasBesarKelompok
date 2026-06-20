<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class LaporanStokController extends Controller
{
    public function index(Request $request)
    {
        $query = Barang::with(['kategori', 'cabang'])->latest();

        if ($request->status == 'menipis') {
            $query->where('stok', '<=', 5);
        }

        $barangs = $query->get();

        return view('laporan.stok', compact('barangs'));
    }
}
