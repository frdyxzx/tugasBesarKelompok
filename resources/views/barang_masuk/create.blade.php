<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Barang Masuk
        </h2>
    </x-slot>

    <div class="bg-white p-6 rounded-xl shadow max-w-3xl">
        <form action="{{ route('barang-masuks.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Barang</label>
                <select name="barang_id" class="w-full border rounded p-2" required>
                    <option value="">-- Pilih Barang --</option>
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->id }}">
                            {{ $barang->nama_barang }} - Stok: {{ $barang->stok }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Jumlah</label>
                <input type="number" name="jumlah" class="w-full border rounded p-2" min="1" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Keterangan</label>
                <textarea name="keterangan" rows="4" class="w-full border rounded p-2"></textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan
            </button>

            <a href="{{ route('barang-masuks.index') }}" class="ml-2 text-gray-600">
                Kembali
            </a>
        </form>
    </div>
</x-app-layout>
