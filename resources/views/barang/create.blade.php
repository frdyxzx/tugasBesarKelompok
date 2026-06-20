<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Barang
        </h2>
    </x-slot>

    <div class="bg-white p-6 rounded-xl shadow max-w-4xl">

        <form action="{{ route('barangs.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <label class="block mb-1">Kategori</label>
                    <select name="kategori_id" class="w-full border rounded p-2" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block mb-1">Cabang</label>
                    <select name="cabang_id" class="w-full border rounded p-2" required>
                        <option value="">-- Pilih Cabang --</option>
                        @foreach($cabangs as $cabang)
                            <option value="{{ $cabang->id }}">
                                {{ $cabang->nama_cabang }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block mb-1">Kode Barang</label>
                    <input type="text"
                           name="kode_barang"
                           class="w-full border rounded p-2"
                           required>
                </div>

                <div>
                    <label class="block mb-1">Nama Barang</label>
                    <input type="text"
                           name="nama_barang"
                           class="w-full border rounded p-2"
                           required>
                </div>

                <div>
                    <label class="block mb-1">Harga Beli</label>
                    <input type="number"
                           name="harga_beli"
                           class="w-full border rounded p-2"
                           required>
                </div>

                <div>
                    <label class="block mb-1">Harga Jual</label>
                    <input type="number"
                           name="harga_jual"
                           class="w-full border rounded p-2"
                           required>
                </div>

                <div>
                    <label class="block mb-1">Stok</label>
                    <input type="number"
                           name="stok"
                           class="w-full border rounded p-2"
                           required>
                </div>

            </div>

            <div class="mt-6">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Simpan
                </button>

                <a href="{{ route('barangs.index') }}"
                   class="ml-2 text-gray-600">
                    Kembali
                </a>
            </div>

        </form>

    </div>
</x-app-layout>
