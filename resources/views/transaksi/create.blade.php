<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transaksi Penjualan
        </h2>
    </x-slot>

    <div class="bg-white p-6 rounded-xl shadow">

        <form action="{{ route('transaksis.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Barang</label>

                <select name="barang_id[]" class="w-full border rounded p-2" required>
                    <option value="">-- Pilih Barang --</option>

                    @foreach($barangs as $barang)
                        <option value="{{ $barang->id }}">
                            {{ $barang->nama_barang }}
                            - Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}
                            - Stok {{ $barang->stok }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Jumlah</label>

                <input type="number"
                       name="jumlah[]"
                       min="1"
                       class="w-full border rounded p-2"
                       required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Bayar</label>

                <input type="number"
                       name="bayar"
                       class="w-full border rounded p-2"
                       required>
            </div>

            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan Transaksi
            </button>

            <a href="{{ route('transaksis.index') }}"
               class="ml-2 text-gray-600">
                Kembali
            </a>

        </form>

    </div>
</x-app-layout>
