<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Kategori Barang
        </h2>
    </x-slot>

    <div class="bg-white p-6 rounded-xl shadow max-w-3xl">
        <form action="{{ route('kategoris.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Nama Kategori</label>
                <input type="text"
                       name="nama_kategori"
                       class="w-full border rounded p-2"
                       required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Deskripsi</label>
                <textarea name="deskripsi"
                          rows="4"
                          class="w-full border rounded p-2"></textarea>
            </div>

            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan
            </button>

            <a href="{{ route('kategoris.index') }}"
               class="ml-2 text-gray-600">
                Kembali
            </a>
        </form>
    </div>
</x-app-layout>
