```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Jayusman Mart</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-slate-950 via-slate-900 to-blue-900 min-h-screen">

<div class="min-h-screen flex items-center justify-center px-6">

    <div class="w-full max-w-6xl bg-white rounded-3xl shadow-2xl overflow-hidden">

        <div class="grid lg:grid-cols-2">

            <!-- Kiri -->
            <div class="bg-slate-900 text-white p-12 flex flex-col justify-between">

                <div>
                    <h1 class="text-5xl font-bold mb-4">
                        Jayusman Mart
                    </h1>

                    <p class="text-slate-300 text-lg">
                        Sistem Informasi Manajemen Minimarket
                    </p>
                </div>

                <div class="space-y-5 my-12">

                    <div class="bg-white/10 p-5 rounded-2xl">
                        🏪 Monitoring Cabang Minimarket
                    </div>

                    <div class="bg-white/10 p-5 rounded-2xl">
                        📦 Pengelolaan Barang dan Stok
                    </div>

                    <div class="bg-white/10 p-5 rounded-2xl">
                        🧾 Transaksi Penjualan Kasir
                    </div>

                    <div class="bg-white/10 p-5 rounded-2xl">
                        📊 Laporan Penjualan dan Stok
                    </div>

                </div>

                <p class="text-slate-400 text-sm">
                    © {{ date('Y') }} Jayusman Mart
                </p>

            </div>

            <!-- Kanan -->
            <div class="p-12 flex items-center">

                <div class="w-full">

                    <h2 class="text-4xl font-bold text-slate-800">
                        Login Sistem
                    </h2>

                    <p class="text-slate-500 mt-2 mb-8">
                        Masuk untuk mengakses sistem minimarket.
                    </p>

                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-5">
                            <label class="block mb-2 text-sm font-semibold text-slate-700">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="mb-5">
                            <label class="block mb-2 text-sm font-semibold text-slate-700">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                required
                                class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="flex justify-between items-center mb-6">

                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="remember">
                                <span class="text-sm text-slate-600">
                                    Ingat Saya
                                </span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                   class="text-blue-600 hover:underline text-sm">
                                    Lupa Password?
                                </a>
                            @endif

                        </div>

                        <button
                            type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition">
                            Login
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
```
