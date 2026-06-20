<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Riwayat Transaksi
        </h2>
    </x-slot>

    <div class="bg-white p-6 rounded-xl shadow">
        <a href="{{ route('transaksis.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Tambah Transaksi
        </a>

        <div class="mt-4 overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-3">No</th>
                        <th class="border p-3">Kode</th>
                        <th class="border p-3">Tanggal</th>
                        <th class="border p-3">Kasir</th>
                        <th class="border p-3">Total</th>
                        <th class="border p-3">Bayar</th>
                        <th class="border p-3">Kembalian</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($transaksis as $transaksi)
                        <tr>
                            <td class="border p-3">{{ $loop->iteration }}</td>
                            <td class="border p-3">{{ $transaksi->kode_transaksi }}</td>
                            <td class="border p-3">{{ $transaksi->tanggal_transaksi }}</td>
                            <td class="border p-3">{{ $transaksi->user?->name ?? '-' }}</td>
                            <td class="border p-3">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                            <td class="border p-3">Rp {{ number_format($transaksi->bayar, 0, ',', '.') }}</td>
                            <td class="border p-3">Rp {{ number_format($transaksi->kembalian, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
