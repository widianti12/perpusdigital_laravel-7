<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = "buku";
    protected $fillable =[
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'gambar',
        'stok',
        'status',
        'KategoriID'
    ];

    public function peminjaman(): HasMany
    {
        return $this->hasMany(Peminjaman::class,'BukuID','id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriBuku::class, 'KategoriID', 'id');
    }

    public function ulasanbuku(): HasMany
    {
        return $this->hasMany(UlasanBuku::class,'BukuID','id');
    }
}
