<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UlasanBuku extends Model
{
    protected $table = "ulasan_buku";
    protected $fillable =[
        'ulasan',
        'rating',
        'UserID',
        'BukuID',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'BukuID', 'id');
    }
}
