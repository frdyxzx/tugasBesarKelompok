<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Laporan Stok Barang
        </h2>
    </x-slot>

    <div class="bg-white p-6 rounded-xl shadow">

        <form method="GET" action="{{ route('laporan.stok') }}" class="mb-6">

            <label class="block mb-2">Filter Stok</label>

            <select name="status" class="border rounded p-2">
                <option value="">Semua Barang</option>
                <option value="menipis"
                    {{ request('status') == 'menipis' ? 'selected' : '' }}>
                    Stok Menipis
                </option>
            </select>

            <button class="bg-blue-600 text-white px-4 py-2 rounded ml-2">
                Filter
            </button>
        </form>

        <div class="overflow-x-auto">

            <table class="w-full border-collapse">

                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-3">No</th>
                        <th class="border p-3">Kode</th>
                        <th class="border p-3">Nama Barang</th>
                        <th class="border p-3">Kategori</th>
                        <th class="border p-3">Cabang</th>
                        <th class="border p-3">Harga Jual</th>
                        <th class="border p-3">Stok</th>
                        <th class="border p-3">Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($barangs as $barang)

                        <tr>
                            <td class="border p-3">{{ $loop->iteration }}</td>
                            <td class="border p-3">{{ $barang->kode_barang }}</td>
                            <td class="border p-3">{{ $barang->nama_barang }}</td>
                            <td class="border p-3">
                                {{ $barang->kategori?->nama_kategori ?? '-' }}
                            </td>
                            <td class="border p-3">
                                {{ $barang->cabang?->nama_cabang ?? '-' }}
                            </td>
                            <td class="border p-3">
                                Rp {{ number_format($barang->harga_jual,0,',','.') }}
                            </td>
                            <td class="border p-3">
                                {{ $barang->stok }}
                            </td>
                            <td class="border p-3">
                                @if($barang->stok <= 5)
                                    <span class="text-red-600 font-bold">
                                        Menipis
                                    </span>
                                @else
                                    <span class="text-green-600 font-bold">
                                        Aman
                                    </span>
                                @endif
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="border p-3 text-center">
                                Tidak ada data
                            </td>
                        </tr>

                    @endforelse
                </tbody>

            </table>

        </div>

    </div>
</x-app-layout>
