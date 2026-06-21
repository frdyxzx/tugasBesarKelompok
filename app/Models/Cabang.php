<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    protected $fillable = [
        'nama_cabang',
        'kota',
        'alamat',
        'telepon',
    ];
}
