<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mini Market Jayusman</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-gray-100">
    <div class="flex min-h-screen">

        <aside class="w-64 bg-slate-900 text-white">
            <div class="p-6 text-2xl font-bold border-b border-slate-700">
                Jayusman Mart
            </div>

            <nav class="p-4 space-y-2">
                @role('owner')
                    <a href="{{ route('owner.dashboard') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                        🏠 Dashboard
                    </a>

                    <a href="{{ route('cabangs.index') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                        🏪 Data Cabang
                    </a>

                    <a href="#" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                        📊 Laporan Transaksi
                    </a>

                    <a href="#" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                        📦 Laporan Stok
                    </a>

                    <a href="{{ route('users.index') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                        👥 Data Pegawai
                    </a>
                @endrole
                @role('manajer')
                    <a href="{{ route('manajer.dashboard') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                        🏠 Dashboard
                    </a>

                    <a href="#" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                        📦 Data Barang
                    </a>

                    <a href="#" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                        🧾 Transaksi
                    </a>

                    <a href="#" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                        📊 Laporan
                    </a>
                @endrole
                @role('gudang')
                    <a href="{{ route('gudang.dashboard') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                        🏠 Dashboard
                    </a>

                    <a href="{{ route('kategoris.index') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                        🏷️ Kategori Barang
                    </a>

                    <a href="{{ route('barangs.index') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                        📦 Data Barang
                    </a>

                    <a href="{{ route('barang-masuks.index') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                        📥 Barang Masuk
                    </a>

                    <a href="{{ route('barang-keluars.index') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                        📤 Barang Keluar
                    </a>

                    <a href="#" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                        📊 Laporan Stok
                    </a>
                @endrole
                @role('kasir')
                    <a href="{{ route('kasir.dashboard') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                        🏠 Dashboard
                    </a>

                    <a href="{{ route('transaksis.create') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                        🧾 Transaksi
                    </a>

                    <a href="{{ route('transaksis.index') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                        📜 Riwayat Transaksi
                    </a>
                @endrole
            </nav>
        </aside>

        <div class="flex-1">
            <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
                <div>
                    @isset($header)
                        {{ $header }}
                    @else
                        <h1 class="text-xl font-semibold">Dashboard</h1>
                    @endisset
                </div>

                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-600">
                        {{ Auth::user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            Logout
                        </button>
                    </form>
                </div>
            </header>

            <main class="p-6">
                {{ $slot }}
            </main>
        </div>

    </div>
</body>
</html>
