<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Barang Masuk
        </h2>
    </x-slot>

    <div class="bg-white p-6 rounded-xl shadow">
        <a href="{{ route('barang-masuks.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Tambah Barang Masuk
        </a>

        <div class="mt-4 overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-3">No</th>
                        <th class="border p-3">Tanggal</th>
                        <th class="border p-3">Barang</th>
                        <th class="border p-3">Jumlah</th>
                        <th class="border p-3">Petugas</th>
                        <th class="border p-3">Keterangan</th>
                        <th class="border p-3">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($barangMasuks as $barangMasuk)
                        <tr>
                            <td class="border p-3">{{ $loop->iteration }}</td>
                            <td class="border p-3">{{ $barangMasuk->tanggal_masuk }}</td>
                            <td class="border p-3">{{ $barangMasuk->barang?->nama_barang ?? '-' }}</td>
                            <td class="border p-3">{{ $barangMasuk->jumlah }}</td>
                            <td class="border p-3">{{ $barangMasuk->user?->name ?? '-' }}</td>
                            <td class="border p-3">{{ $barangMasuk->keterangan ?? '-' }}</td>
                            <td class="border p-3">
                                <form action="{{ route('barang-masuks.destroy', $barangMasuk->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('Yakin ingin menghapus data barang masuk ini? Stok akan dikurangi kembali.')"
                                            class="bg-red-500 text-white px-3 py-1 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
