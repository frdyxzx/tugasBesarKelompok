<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Laporan Transaksi
        </h2>
    </x-slot>

    <div class="bg-white p-6 rounded-xl shadow">
        <form method="GET" action="{{ route('laporan.transaksi') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <label class="block mb-1">Tanggal Awal</label>
                <input type="date" name="tanggal_awal" value="{{ request('tanggal_awal') }}" class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block mb-1">Tanggal Akhir</label>
                <input type="date" name="tanggal_akhir" value="{{ request('tanggal_akhir') }}" class="w-full border rounded p-2">
            </div>

            <div class="flex items-end">
                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Filter
                </button>
                <a href="{{ route('laporan.transaksi.pdf', request()->query()) }}"
                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                    Download PDF
                </a>
            </div>


        </form>

        <div class="mb-4 font-semibold">
            Total Pendapatan: Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-3">No</th>
                        <th class="border p-3">Tanggal</th>
                        <th class="border p-3">Kode</th>
                        <th class="border p-3">Cabang</th>
                        <th class="border p-3">Kasir</th>
                        <th class="border p-3">Total</th>
                        <th class="border p-3">Bayar</th>
                        <th class="border p-3">Kembalian</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($transaksis as $transaksi)
                        <tr>
                            <td class="border p-3">{{ $loop->iteration }}</td>
                            <td class="border p-3">{{ $transaksi->tanggal_transaksi }}</td>
                            <td class="border p-3">{{ $transaksi->kode_transaksi }}</td>
                            <td class="border p-3">{{ $transaksi->cabang?->nama_cabang ?? '-' }}</td>
                            <td class="border p-3">{{ $transaksi->user?->name ?? '-' }}</td>
                            <td class="border p-3">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                            <td class="border p-3">Rp {{ number_format($transaksi->bayar, 0, ',', '.') }}</td>
                            <td class="border p-3">Rp {{ number_format($transaksi->kembalian, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="border p-3 text-center">
                                Belum ada data transaksi
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
