<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mini Market Jayusman</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-slate-100">
    <div class="flex min-h-screen">

        <aside class="w-72 bg-gradient-to-b from-slate-950 to-slate-900 text-white shadow-xl">
            <div class="p-6 border-b border-slate-700">
                <h1 class="text-2xl font-bold tracking-wide">Jayusman Mart</h1>
                <p class="text-sm text-slate-400 mt-1">Sistem Minimarket</p>
            </div>

            <nav class="p-4 space-y-2 text-sm font-medium">
                @role('owner')
                    <a href="{{ route('owner.dashboard') }}" class="block px-4 py-3 rounded-xl hover:bg-blue-600 transition">🏠 Dashboard</a>
                    <a href="{{ route('cabangs.index') }}" class="block px-4 py-3 rounded-xl hover:bg-blue-600 transition">🏪 Data Cabang</a>
                    <a href="{{ route('users.index') }}" class="block px-4 py-3 rounded-xl hover:bg-blue-600 transition">👥 Data Pegawai</a>
                    <a href="{{ route('laporan.transaksi') }}" class="block px-4 py-3 rounded-xl hover:bg-blue-600 transition">📊 Laporan Transaksi</a>
                    <a href="{{ route('laporan.stok') }}" class="block px-4 py-3 rounded-xl hover:bg-blue-600 transition">📦 Laporan Stok</a>
                @endrole

                @role('manajer')
                    <a href="{{ route('manajer.dashboard') }}" class="block px-4 py-3 rounded-xl hover:bg-blue-600 transition">🏠 Dashboard</a>
                    <a href="{{ route('barangs.index') }}" class="block px-4 py-3 rounded-xl hover:bg-blue-600 transition">📦 Data Barang</a>
                    <a href="{{ route('laporan.transaksi') }}" class="block px-4 py-3 rounded-xl hover:bg-blue-600 transition">📊 Laporan Transaksi</a>
                    <a href="{{ route('laporan.stok') }}" class="block px-4 py-3 rounded-xl hover:bg-blue-600 transition">📦 Laporan Stok</a>
                @endrole

                @role('gudang')
                    <a href="{{ route('gudang.dashboard') }}" class="block px-4 py-3 rounded-xl hover:bg-blue-600 transition">🏠 Dashboard</a>
                    <a href="{{ route('kategoris.index') }}" class="block px-4 py-3 rounded-xl hover:bg-blue-600 transition">🏷️ Kategori Barang</a>
                    <a href="{{ route('barangs.index') }}" class="block px-4 py-3 rounded-xl hover:bg-blue-600 transition">📦 Data Barang</a>
                    <a href="{{ route('barang-masuks.index') }}" class="block px-4 py-3 rounded-xl hover:bg-blue-600 transition">📥 Barang Masuk</a>
                    <a href="{{ route('barang-keluars.index') }}" class="block px-4 py-3 rounded-xl hover:bg-blue-600 transition">📤 Barang Keluar</a>
                    <a href="{{ route('laporan.stok') }}" class="block px-4 py-3 rounded-xl hover:bg-blue-600 transition">📊 Laporan Stok</a>
                @endrole

                @role('kasir')
                    <a href="{{ route('kasir.dashboard') }}" class="block px-4 py-3 rounded-xl hover:bg-blue-600 transition">🏠 Dashboard</a>
                    <a href="{{ route('transaksis.create') }}" class="block px-4 py-3 rounded-xl hover:bg-blue-600 transition">🧾 Transaksi</a>
                    <a href="{{ route('transaksis.index') }}" class="block px-4 py-3 rounded-xl hover:bg-blue-600 transition">📜 Riwayat Transaksi</a>
                @endrole

                @role('supervisor')
                    <a href="{{ route('supervisor.dashboard') }}" class="block px-4 py-3 rounded-xl hover:bg-blue-600 transition">🏠 Dashboard</a>
                    <a href="{{ route('laporan.transaksi') }}" class="block px-4 py-3 rounded-xl hover:bg-blue-600 transition">📊 Laporan Transaksi</a>
                    <a href="{{ route('laporan.stok') }}" class="block px-4 py-3 rounded-xl hover:bg-blue-600 transition">📦 Laporan Stok</a>
                @endrole
            </nav>
        </aside>

        <div class="flex-1">
            <header class="bg-white/90 backdrop-blur shadow-sm px-8 py-5 flex justify-between items-center">
                <div>
                    @isset($header)
                        {{ $header }}
                    @else
                        <h1 class="text-xl font-semibold text-slate-800">Dashboard</h1>
                    @endisset
                </div>

                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <p class="text-sm font-semibold text-slate-700">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-slate-400">Online</p>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="bg-red-500 text-white px-4 py-2 rounded-xl hover:bg-red-600 transition shadow">
                            Logout
                        </button>
                    </form>
                </div>
            </header>

            <main class="p-8">
                {{ $slot }}
            </main>
        </div>

    </div>
</body>
</html>
