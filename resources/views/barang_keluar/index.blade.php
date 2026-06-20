<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Barang Keluar
        </h2>
    </x-slot>

    <div class="bg-white p-6 rounded-xl shadow">
        <a href="{{ route('barang-keluars.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Tambah Barang Keluar
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
                    @foreach($barangKeluars as $barangKeluar)
                        <tr>
                            <td class="border p-3">{{ $loop->iteration }}</td>
                            <td class="border p-3">{{ $barangKeluar->tanggal_keluar }}</td>
                            <td class="border p-3">{{ $barangKeluar->barang?->nama_barang ?? '-' }}</td>
                            <td class="border p-3">{{ $barangKeluar->jumlah }}</td>
                            <td class="border p-3">{{ $barangKeluar->user?->name ?? '-' }}</td>
                            <td class="border p-3">{{ $barangKeluar->keterangan ?? '-' }}</td>
                            <td class="border p-3">
                                <form action="{{ route('barang-keluars.destroy', $barangKeluar->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('Yakin ingin menghapus data barang keluar ini?')"
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
