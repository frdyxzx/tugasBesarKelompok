<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'kategori_id',
        'cabang_id',
        'kode_barang',
        'nama_barang',
        'harga_beli',
        'harga_jual',
        'stok',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function cabang()
    {
        return $this->belongsTo(Cabang::class);
    }
}
