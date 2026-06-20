<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Barang
        </h2>
    </x-slot>

    <div class="bg-white p-6 rounded-xl shadow max-w-4xl">

        <form action="{{ route('barangs.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <label class="block mb-1">Kategori</label>
                    <select name="kategori_id" class="w-full border rounded p-2" required>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}"
                                {{ $barang->kategori_id == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block mb-1">Cabang</label>
                    <select name="cabang_id" class="w-full border rounded p-2" required>
                        @foreach($cabangs as $cabang)
                            <option value="{{ $cabang->id }}"
                                {{ $barang->cabang_id == $cabang->id ? 'selected' : '' }}>
                                {{ $cabang->nama_cabang }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block mb-1">Kode Barang</label>
                    <input type="text"
                           name="kode_barang"
                           value="{{ $barang->kode_barang }}"
                           class="w-full border rounded p-2"
                           required>
                </div>

                <div>
                    <label class="block mb-1">Nama Barang</label>
                    <input type="text"
                           name="nama_barang"
                           value="{{ $barang->nama_barang }}"
                           class="w-full border rounded p-2"
                           required>
                </div>

                <div>
                    <label class="block mb-1">Harga Beli</label>
                    <input type="number"
                           name="harga_beli"
                           value="{{ $barang->harga_beli }}"
                           class="w-full border rounded p-2"
                           required>
                </div>

                <div>
                    <label class="block mb-1">Harga Jual</label>
                    <input type="number"
                           name="harga_jual"
                           value="{{ $barang->harga_jual }}"
                           class="w-full border rounded p-2"
                           required>
                </div>

                <div>
                    <label class="block mb-1">Stok</label>
                    <input type="number"
                           name="stok"
                           value="{{ $barang->stok }}"
                           class="w-full border rounded p-2"
                           required>
                </div>

            </div>

            <div class="mt-6">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Update
                </button>

                <a href="{{ route('barangs.index') }}"
                   class="ml-2 text-gray-600">
                    Kembali
                </a>
            </div>

        </form>

    </div>
</x-app-layout>
