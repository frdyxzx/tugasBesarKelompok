<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Gudang
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        <div class="bg-blue-500 text-white p-6 rounded-xl shadow-lg">
            <h3 class="text-sm">📦 Total Barang</h3>
            <p class="text-4xl font-bold mt-2">{{ $totalBarang }}</p>
        </div>

        <div class="bg-green-500 text-white p-6 rounded-xl shadow-lg">
            <h3 class="text-sm">📥 Barang Masuk</h3>
            <p class="text-4xl font-bold mt-2">{{ $totalBarangMasuk }}</p>
        </div>

        <div class="bg-yellow-500 text-white p-6 rounded-xl shadow-lg">
            <h3 class="text-sm">📤 Barang Keluar</h3>
            <p class="text-4xl font-bold mt-2">{{ $totalBarangKeluar }}</p>
        </div>

        <div class="bg-red-500 text-white p-6 rounded-xl shadow-lg">
            <h3 class="text-sm">⚠️ Stok Menipis</h3>
            <p class="text-4xl font-bold mt-2">{{ $stokMenipis }}</p>
        </div>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">

        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-xl font-bold mb-4">
                👋 Selamat Datang Gudang
            </h3>

            <p class="text-gray-600">
                Dashboard ini digunakan untuk mengelola data barang, stok barang, barang masuk, dan barang keluar.
            </p>

            <hr class="my-4">

            <p><strong>Tanggal :</strong> {{ now()->format('d F Y') }}</p>
            <p class="mt-2">
                <strong>Status Sistem :</strong>
                <span class="text-green-600 font-semibold">Aktif</span>
            </p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-xl font-bold mb-4">
                📌 Informasi Gudang
            </h3>

            <p><strong>Nama :</strong> {{ Auth::user()->name }}</p>
            <p class="mt-2"><strong>Email :</strong> {{ Auth::user()->email }}</p>
            <p class="mt-2"><strong>Role :</strong> Gudang</p>
        </div>

    </div>
</x-app-layout>
