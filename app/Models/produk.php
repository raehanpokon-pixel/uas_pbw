<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Pastikan nama tabel sesuai migration kamu
    protected $table = 'produks';

    protected $fillable = [
        'kategori_id',
        'nama_produk',
        'foto',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
