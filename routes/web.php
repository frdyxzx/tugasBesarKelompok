<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('owner.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::resource('cabangs', \App\Http\Controllers\CabangController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('barangs', \App\Http\Controllers\BarangController::class);
    Route::resource('kategoris', \App\Http\Controllers\KategoriController::class);
    Route::resource('barang-masuks', \App\Http\Controllers\BarangMasukController::class);
    Route::resource('barang-keluars', \App\Http\Controllers\BarangKeluarController::class);
    Route::resource('transaksis', \App\Http\Controllers\TransaksiController::class);
    Route::get('/laporan/transaksi', [\App\Http\Controllers\LaporanTransaksiController::class, 'index'])
    ->name('laporan.transaksi');
    Route::get('/laporan/stok', [\App\Http\Controllers\LaporanStokController::class, 'index'])
    ->name('laporan.stok');
    Route::get('/laporan/transaksi/pdf', [\App\Http\Controllers\LaporanTransaksiController::class, 'cetakPdf'])
    ->name('laporan.transaksi.pdf');

    Route::get('/owner/dashboard', function () {

        $totalCabang = \App\Models\Cabang::count();
        $totalBarang = \App\Models\Barang::count();
        $totalTransaksi = \App\Models\Transaksi::count();
        $totalPegawai = \App\Models\User::count();

        $totalManajer = \App\Models\User::role('manajer')->count();

        $cabangTerbaru = \App\Models\Cabang::latest()->take(5)->get();

        return view('owner.dashboard', compact(
            'totalCabang',
            'totalBarang',
            'totalTransaksi',
            'totalPegawai',
            'totalManajer',
            'cabangTerbaru'
        ));

    })->name('owner.dashboard');

    Route::get('/manajer/dashboard', function () {
        return view('manajer.dashboard');
    })->name('manajer.dashboard');

    Route::get('/supervisor/dashboard', function () {

        $totalTransaksi = \App\Models\Transaksi::count();

        $totalPendapatan = \App\Models\Transaksi::sum('total_harga');

        $barangTerjual = \App\Models\DetailTransaksi::sum('jumlah');

        return view('supervisor.dashboard', compact(
            'totalTransaksi',
            'totalPendapatan',
            'barangTerjual'
        ));

    })->name('supervisor.dashboard');

    Route::get('/kasir/dashboard', function () {

        $kasirId = \Illuminate\Support\Facades\Auth::id();

        $totalTransaksi = \App\Models\Transaksi::where('user_id', $kasirId)->count();

        $pendapatanHariIni = \App\Models\Transaksi::where('user_id', $kasirId)
            ->whereDate('tanggal_transaksi', now()->format('Y-m-d'))
            ->sum('total_harga');

        $barangTerjual = \App\Models\DetailTransaksi::whereHas('transaksi', function ($query) use ($kasirId) {
            $query->where('user_id', $kasirId);
        })->sum('jumlah');

        return view('kasir.dashboard', compact(
            'totalTransaksi',
            'pendapatanHariIni',
            'barangTerjual'
        ));

    })->name('kasir.dashboard');

    Route::get('/gudang/dashboard', function () {

        $totalBarang = \App\Models\Barang::count();
        $totalBarangMasuk = \App\Models\BarangMasuk::count();
        $totalBarangKeluar = \App\Models\BarangKeluar::count();
        $stokMenipis = \App\Models\Barang::where('stok', '<=', 5)->count();

        return view('gudang.dashboard', compact(
            'totalBarang',
            'totalBarangMasuk',
            'totalBarangKeluar',
            'stokMenipis'
        ));

    })->name('gudang.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
