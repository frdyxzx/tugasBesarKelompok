<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Kasir
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-blue-500 text-white p-6 rounded-xl shadow-lg">
            <h3 class="text-sm">🧾 Total Transaksi</h3>
            <p class="text-4xl font-bold mt-2">{{ $totalTransaksi }}</p>
        </div>

        <div class="bg-green-500 text-white p-6 rounded-xl shadow-lg">
            <h3 class="text-sm">💰 Pendapatan Hari Ini</h3>
            <p class="text-2xl font-bold mt-2">Rp {{ number_format($pendapatanHariIni, 0, ',', '.') }}</p>
        </div>

        <div class="bg-yellow-500 text-white p-6 rounded-xl shadow-lg">
            <h3 class="text-sm">📦 Barang Terjual</h3>
            <p class="text-4xl font-bold mt-2">{{ $barangTerjual }}</p>
        </div>

    </div>

    <div class="bg-white p-6 rounded-xl shadow mt-6">
        <h3 class="text-xl font-bold mb-4">
            👋 Selamat Datang Kasir
        </h3>

        <p class="text-gray-600">
            Halaman ini digunakan untuk melakukan transaksi penjualan dan melihat riwayat transaksi.
        </p>

        <hr class="my-4">

        <p><strong>Nama :</strong> {{ Auth::user()->name }}</p>
        <p><strong>Email :</strong> {{ Auth::user()->email }}</p>
        <p><strong>Role :</strong> Kasir</p>
    </div>
</x-app-layout>
