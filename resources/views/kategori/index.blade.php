<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kategori Barang
        </h2>
    </x-slot>

    <div class="bg-white p-6 rounded-xl shadow">
        <a href="{{ route('kategoris.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Tambah Kategori
        </a>

        <div class="mt-4 overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-3">No</th>
                        <th class="border p-3">Nama Kategori</th>
                        <th class="border p-3">Deskripsi</th>
                        <th class="border p-3">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($kategoris as $kategori)
                        <tr>
                            <td class="border p-3">{{ $loop->iteration }}</td>
                            <td class="border p-3">{{ $kategori->nama_kategori }}</td>
                            <td class="border p-3">{{ $kategori->deskripsi ?? '-' }}</td>
                            <td class="border p-3">
                                <div class="flex gap-2">
                                    <a href="{{ route('kategoris.edit', $kategori->id) }}"
                                       class="bg-yellow-500 text-white px-3 py-1 rounded">
                                        Edit
                                    </a>

                                    <form action="{{ route('kategoris.destroy', $kategori->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                onclick="return confirm('Yakin ingin menghapus kategori ini?')"
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
