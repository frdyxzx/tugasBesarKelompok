<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Barang
        </h2>
    </x-slot>

    <div class="bg-white p-6 rounded-xl shadow">
        <a href="{{ route('barangs.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Tambah Barang
        </a>

        <div class="mt-4 overflow-x-auto">
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
                        <th class="border p-3">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($barangs as $barang)
                        <tr>
                            <td class="border p-3">{{ $loop->iteration }}</td>
                            <td class="border p-3">{{ $barang->kode_barang }}</td>
                            <td class="border p-3">{{ $barang->nama_barang }}</td>
                            <td class="border p-3">{{ $barang->kategori?->nama_kategori ?? '-' }}</td>
                            <td class="border p-3">{{ $barang->cabang?->nama_cabang ?? '-' }}</td>
                            <td class="border p-3">Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}</td>
                            <td class="border p-3">{{ $barang->stok }}</td>
                            <td class="border p-3">
                                <div class="flex gap-2">
                                    <a href="{{ route('barangs.edit', $barang->id) }}"
                                       class="bg-yellow-500 text-white px-3 py-1 rounded">
                                        Edit
                                    </a>

                                    <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                onclick="return confirm('Yakin ingin menghapus barang ini?')"
                                                class="bg-red-500 text-white px-3 py-1 rounded">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
